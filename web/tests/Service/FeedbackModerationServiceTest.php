<?php

namespace App\Tests\Service;

use App\Service\FeedbackModerationService;
use App\Service\ProfanityFilterService;
use PHPUnit\Framework\TestCase;

class FeedbackModerationServiceTest extends TestCase
{
    public function testFallsBackToWordListForCleanTextWhenModelIsMissing(): void
    {
        $service = new FeedbackModerationService(dirname(__DIR__, 2), new ProfanityFilterService());

        $result = $service->moderate('The delivery was late but the driver stayed polite.');

        self::assertFalse($result['flagged']);
        self::assertSame('word_list_fallback', $result['source']);
    }

    public function testFallsBackToWordListForProfanityWhenModelIsMissing(): void
    {
        $service = new FeedbackModerationService(dirname(__DIR__, 2), new ProfanityFilterService());

        $result = $service->moderate('Ce vendeur est con.');

        self::assertTrue($result['flagged']);
        self::assertSame('word_list_fallback', $result['source']);
        self::assertSame(['con'], $result['matchedWords']);
    }

    public function testBuildsLocalModelMessage(): void
    {
        $service = new FeedbackModerationService(dirname(__DIR__, 2), new ProfanityFilterService());

        $message = $service->buildErrorMessage([
            'source' => 'self_trained_model',
            'matchedWords' => [],
        ], 'comment');

        self::assertSame('Your comment was flagged as inappropriate by the local moderation model.', $message);
    }
}
