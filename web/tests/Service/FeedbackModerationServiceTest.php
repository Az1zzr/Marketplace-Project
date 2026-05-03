<?php

namespace App\Tests\Service;

use App\Service\FeedbackModerationService;
use App\Service\ProfanityFilterService;
use PHPUnit\Framework\TestCase;

class FeedbackModerationServiceTest extends TestCase
{
    public function testFallsBackToWordListForCleanTextWhenModelIsMissing(): void
    {
        $service = new FeedbackModerationService($this->createTemporaryProjectDir(), new ProfanityFilterService());

        $result = $service->moderate('The delivery was late but the driver stayed polite.');

        self::assertFalse($result['flagged']);
        self::assertSame('word_list_fallback', $result['source']);
    }

    public function testFallsBackToWordListForProfanityWhenModelIsMissing(): void
    {
        $service = new FeedbackModerationService($this->createTemporaryProjectDir(), new ProfanityFilterService());

        $result = $service->moderate('Ce vendeur est con.');

        self::assertTrue($result['flagged']);
        self::assertSame('word_list_fallback', $result['source']);
        self::assertSame(['con'], $result['matchedWords']);
    }

    public function testUsesLocalModelWhenAvailable(): void
    {
        $projectDir = $this->createTemporaryProjectDir();
        $mlDir = $projectDir . DIRECTORY_SEPARATOR . 'ml';
        $modelDir = $projectDir . DIRECTORY_SEPARATOR . 'var' . DIRECTORY_SEPARATOR . 'ml';

        self::assertTrue(mkdir($mlDir, 0777, true));
        self::assertTrue(mkdir($modelDir, 0777, true));

        self::assertNotFalse(file_put_contents($modelDir . DIRECTORY_SEPARATOR . 'feedback_toxicity_bundle.joblib', 'fake model'));
        self::assertNotFalse(file_put_contents(
            $mlDir . DIRECTORY_SEPARATOR . 'predict_feedback_toxicity.py',
            <<<'PHP'
<?php
echo json_encode([
    'flagged' => true,
    'toxicity_probability' => 0.87,
    'threshold' => 0.6,
]);
PHP
        ));

        $service = new FeedbackModerationService($projectDir, new ProfanityFilterService(), [[PHP_BINARY]]);

        $result = $service->moderate('model should decide this text');

        self::assertTrue($result['flagged']);
        self::assertSame('self_trained_model', $result['source']);
        self::assertSame(0.87, $result['score']);
        self::assertSame(0.6, $result['threshold']);
        self::assertSame([], $result['matchedWords']);
    }

    public function testBuildsLocalModelMessage(): void
    {
        $service = new FeedbackModerationService(dirname(__DIR__, 2), new ProfanityFilterService());

        $message = $service->buildErrorMessage([
            'source' => 'self_trained_model',
            'matchedWords' => [],
        ], 'comment');

        self::assertSame("You can't write bad words to users in your comment.", $message);
    }

    private function createTemporaryProjectDir(): string
    {
        $path = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'feedback_moderation_' . bin2hex(random_bytes(6));

        self::assertTrue(mkdir($path));

        return $path;
    }
}
