<?php

namespace App\Tests\Service;

use App\Service\SpellCheckerService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class SpellCheckerServiceTest extends TestCase
{
    public function testCheckUsesRequestedLanguageAndParsesErrors(): void
    {
        $capturedOptions = [];
        $client = new MockHttpClient(function (string $method, string $url, array $options) use (&$capturedOptions): MockResponse {
            $capturedOptions = $options;

            return new MockResponse(json_encode([
                'matches' => [[
                    'message' => 'Possible typo.',
                    'shortMessage' => 'Typo',
                    'offset' => 8,
                    'length' => 4,
                    'context' => ['text' => 'This is eror.'],
                    'replacements' => [['value' => 'error']],
                ]],
            ]), ['response_headers' => ['content-type: application/json']]);
        });

        $result = (new SpellCheckerService($client))->check('This is eror.', 'auto');
        $body = $capturedOptions['body'];
        if (is_string($body)) {
            parse_str($body, $body);
        }

        self::assertSame('This is eror.', $body['text']);
        self::assertSame('auto', $body['language']);
        self::assertTrue($result['success']);
        self::assertSame(1, $result['errorCount']);
        self::assertSame('Possible typo.', $result['errors'][0]['message']);
        self::assertSame(['error'], $result['errors'][0]['suggestions']);
    }

    public function testCheckReturnsFailureWhenLanguageToolIsUnavailable(): void
    {
        $client = new MockHttpClient([
            new MockResponse('Service unavailable', ['http_code' => 503]),
            new MockResponse('Service unavailable', ['http_code' => 503]),
        ]);

        $result = (new SpellCheckerService($client))->check('bonjour je sui content', 'auto');

        self::assertFalse($result['success']);
        self::assertSame([], $result['errors']);
        self::assertArrayHasKey('error', $result);
    }
}
