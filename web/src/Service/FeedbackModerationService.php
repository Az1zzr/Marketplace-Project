<?php

namespace App\Service;

use Symfony\Component\Process\Process;

class FeedbackModerationService
{
    private const DEFAULT_THRESHOLD = 0.60;
    private const MODEL_ARTIFACT_RELATIVE_PATH = 'var/ml/feedback_toxicity_bundle.joblib';
    private const PREDICT_SCRIPT_RELATIVE_PATH = 'ml/predict_feedback_toxicity.py';

    public function __construct(
        private readonly string $projectDir,
        private readonly ProfanityFilterService $profanityFilter,
        private readonly ?array $pythonCommands = null
    ) {
    }

    public function moderate(?string $text): array
    {
        $text = trim((string) $text);
        if ('' === $text) {
            return [
                'flagged' => false,
                'source' => 'empty_text',
                'score' => 0.0,
                'threshold' => self::DEFAULT_THRESHOLD,
                'matchedWords' => [],
            ];
        }

        $modelResult = $this->runLocalModel($text);
        if (null !== $modelResult) {
            return $modelResult;
        }

        return $this->buildWordListFallback($text);
    }

    public function buildErrorMessage(array $moderation, string $fieldLabel): string
    {
        return sprintf("You can't write bad words to users in your %s.", $fieldLabel);
    }

    private function runLocalModel(string $text): ?array
    {
        $modelPath = $this->projectDir . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, self::MODEL_ARTIFACT_RELATIVE_PATH);
        $scriptPath = $this->projectDir . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, self::PREDICT_SCRIPT_RELATIVE_PATH);

        if (!is_file($modelPath) || !is_file($scriptPath)) {
            return null;
        }

        foreach ($this->getPythonCommands() as $command) {
            $process = new Process([
                ...$command,
                $scriptPath,
                '--model',
                $modelPath,
            ], $this->projectDir);

            $process->setInput($text);
            $process->setTimeout(20);
            $process->run();

            if (!$process->isSuccessful()) {
                continue;
            }

            $payload = json_decode(trim($process->getOutput()), true);
            if (!is_array($payload) || !array_key_exists('flagged', $payload)) {
                continue;
            }

            return [
                'flagged' => (bool) $payload['flagged'],
                'source' => 'self_trained_model',
                'score' => (float) ($payload['toxicity_probability'] ?? 0.0),
                'threshold' => (float) ($payload['threshold'] ?? self::DEFAULT_THRESHOLD),
                'matchedWords' => [],
            ];
        }

        return null;
    }

    private function buildWordListFallback(string $text): array
    {
        $matchedWords = $this->profanityFilter->getProfanityWords($text);

        return [
            'flagged' => [] !== $matchedWords,
            'source' => 'word_list_fallback',
            'score' => [] !== $matchedWords ? 1.0 : 0.0,
            'threshold' => self::DEFAULT_THRESHOLD,
            'matchedWords' => $matchedWords,
        ];
    }

    private function getPythonCommands(): array
    {
        if (null !== $this->pythonCommands) {
            return $this->pythonCommands;
        }

        $commands = [];
        $venvPythonPath = $this->projectDir . DIRECTORY_SEPARATOR . '.venv' . DIRECTORY_SEPARATOR
            . ('\\' === DIRECTORY_SEPARATOR ? 'Scripts' . DIRECTORY_SEPARATOR . 'python.exe' : 'bin' . DIRECTORY_SEPARATOR . 'python');

        if (is_file($venvPythonPath)) {
            $commands[] = [$venvPythonPath];
        }

        return [
            ...$commands,
            ['python'],
            ['python3'],
            ['py', '-3'],
            ['py'],
        ];
    }
}
