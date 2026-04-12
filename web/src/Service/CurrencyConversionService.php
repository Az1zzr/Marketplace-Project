<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CurrencyConversionService
{
    private const API_URL = 'https://open.er-api.com/v6/latest/TND';

    private ?array $cachedRates = null;

    public function __construct(private readonly HttpClientInterface $httpClient)
    {
    }

    public function getPriceConversions(float $amountTnd): array
    {
        $rates = $this->fetchRates();

        if (null === $rates) {
            return [
                'available' => false,
                'sourceLabel' => 'ExchangeRate-API',
                'updatedAt' => null,
                'currencies' => [],
            ];
        }

        return [
            'available' => true,
            'sourceLabel' => 'ExchangeRate-API',
            'updatedAt' => $rates['updatedAt'],
            'currencies' => [
                [
                    'code' => 'EUR',
                    'label' => 'Euro',
                    'amount' => round($amountTnd * $rates['EUR'], 2),
                ],
                [
                    'code' => 'USD',
                    'label' => 'Dollar',
                    'amount' => round($amountTnd * $rates['USD'], 2),
                ],
            ],
        ];
    }

    private function fetchRates(): ?array
    {
        if (null !== $this->cachedRates) {
            return $this->cachedRates;
        }

        try {
            $response = $this->httpClient->request('GET', self::API_URL, [
                'timeout' => 10,
            ]);

            $data = $response->toArray(false);
            if (($data['result'] ?? null) !== 'success') {
                return $this->cachedRates = null;
            }

            if (!isset($data['rates']['EUR'], $data['rates']['USD'])) {
                return $this->cachedRates = null;
            }

            $updatedAt = null;
            if (isset($data['time_last_update_utc']) && is_string($data['time_last_update_utc'])) {
                try {
                    $updatedAt = new \DateTimeImmutable($data['time_last_update_utc']);
                } catch (\Exception) {
                    $updatedAt = null;
                }
            }

            return $this->cachedRates = [
                'EUR' => (float) $data['rates']['EUR'],
                'USD' => (float) $data['rates']['USD'],
                'updatedAt' => $updatedAt,
            ];
        } catch (\Throwable) {
            return $this->cachedRates = null;
        }
    }
}
