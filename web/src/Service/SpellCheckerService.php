<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class SpellCheckerService
{
    private HttpClientInterface $httpClient;
    private string $apiUrl = 'https://api.languagetoolplus.com/v2/check';

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function check(string $text, string $language = 'fr'): array
    {
        if (empty(trim($text))) {
            return ['success' => true, 'errors' => []];
        }

        try {
            $response = $this->httpClient->request('POST', $this->apiUrl, [
                'headers' => [
                    'User-Agent' => 'LocalTrade-App/1.0',
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'body' => http_build_query([
                    'text' => $text,
                    'language' => $language,
                    'enabledOnly' => 'false',
                ]),
            ]);

            $data = $response->toArray();
            
            return $this->parseErrors($data);
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
                'errors' => [],
            ];
        }
    }

    private function parseErrors(array $data): array
    {
        $errors = [];

        if (isset($data['matches']) && is_array($data['matches'])) {
            foreach ($data['matches'] as $match) {
                $errors[] = [
                    'message' => $match['message'] ?? '',
                    'shortMessage' => $match['shortMessage'] ?? '',
                    'offset' => $match['offset'] ?? 0,
                    'length' => $match['length'] ?? 0,
                    'context' => $match['context']['text'] ?? '',
                    'suggestions' => array_map(function($r) {
                        return $r['value'] ?? '';
                    }, $match['replacements'] ?? []),
                ];
            }
        }

        return [
            'success' => true,
            'errors' => $errors,
            'errorCount' => count($errors),
        ];
    }

    public function getHtmlHighlight(string $text, array $errors): string
    {
        if (empty($errors)) {
            return $text;
        }

        $offset = 0;
        $highlighted = $text;

        usort($errors, function($a, $b) {
            return $b['offset'] - $a['offset'];
        });

        foreach ($errors as $error) {
            $start = $error['offset'];
            $length = $error['length'];
            $before = substr($highlighted, 0, $start + $offset);
            $word = substr($highlighted, $start + $offset, $length);
            $after = substr($highlighted, $start + $offset + $length);
            
            $highlighted = $before . '<mark class="spell-error" title="' . htmlspecialchars($error['message']) . '">' . $word . '</mark>' . $after;
            $offset += strlen('<mark class="spell-error" title="' . htmlspecialchars($error['message']) . '"></mark>');
        }

        return $highlighted;
    }
}
