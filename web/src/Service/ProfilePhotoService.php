<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProfilePhotoService
{
    private const IMAGE_MODERATION_API_URL = 'https://router.huggingface.co/hf-inference/models/Falconsai/nsfw_image_detection';

    public function __construct(
        private readonly string $projectDir,
        private readonly InputValidationService $inputValidationService,
        private readonly \Symfony\Contracts\HttpClient\HttpClientInterface $httpClient,
        private readonly string $huggingfaceApiKey = '',
        private readonly string $appEnv = 'dev'
    ) {
    }

    public function assertUploadedPhotoIsAllowed(UploadedFile $uploadedFile): void
    {
        $validation = $this->inputValidationService->validateImageUpload($uploadedFile->getMimeType(), $uploadedFile->getSize());
        if (!$validation['valid']) {
            throw new \RuntimeException($validation['message']);
        }

        $moderation = $this->verifyImageSafety($uploadedFile);
        if (!$moderation['valid']) {
            throw new \RuntimeException($moderation['message']);
        }
    }

    public function storePhoto(UploadedFile $uploadedFile): string
    {
        $uploadDir = $this->projectDir . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'profiles';

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $filename = uniqid('photo_', true) . '.' . ($uploadedFile->guessExtension() ?? 'jpg');
        $uploadedFile->move($uploadDir, $filename);

        return 'uploads/profiles/' . $filename;
    }

    public function deleteStoredPhoto(?string $photoPath): void
    {
        if (null === $photoPath || '' === trim($photoPath)) {
            return;
        }

        $relativePath = ltrim($photoPath, '/\\');
        $absolutePath = $this->projectDir . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $relativePath);

        if (is_file($absolutePath)) {
            @unlink($absolutePath);
        }
    }

    private function verifyImageSafety(UploadedFile $uploadedFile): array
    {
        if ('' === trim($this->huggingfaceApiKey)) {
            return $this->handleModerationFailure('Image moderation API is not configured right now.');
        }

        try {
            $response = $this->httpClient->request('POST', self::IMAGE_MODERATION_API_URL, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->huggingfaceApiKey,
                    'Content-Type' => $uploadedFile->getMimeType() ?: 'application/octet-stream',
                ],
                'body' => fopen($uploadedFile->getPathname(), 'rb'),
                'timeout' => 20,
            ]);

            $statusCode = $response->getStatusCode();

            if (401 === $statusCode || 403 === $statusCode) {
                return $this->handleModerationFailure('Image moderation API credentials were rejected.');
            }

            if ($statusCode >= 500) {
                return $this->handleModerationFailure('Sensitive-image verification is temporarily unavailable.');
            }

            $content = trim($response->getContent(false));
        } catch (\Throwable) {
            return $this->handleModerationFailure('Unable to verify whether the selected profile image is sensitive. Please try again.');
        }

        if ('' === $content) {
            return $this->handleModerationFailure('Unexpected response from the image moderation API.');
        }

        $data = json_decode($content, true);
        if (!is_array($data)) {
            return $this->handleModerationFailure('Unexpected response from the image moderation API.');
        }

        if (isset($data['error'])) {
            return $this->handleModerationFailure('Sensitive-image verification is temporarily unavailable.');
        }

        $predictions = $data;
        if (isset($data[0]) && is_array($data[0]) && isset($data[0][0])) {
            $predictions = $data[0];
        }

        foreach ($predictions as $prediction) {
            if (!is_array($prediction)) {
                continue;
            }

            $label = strtolower((string) ($prediction['label'] ?? ''));
            $score = (float) ($prediction['score'] ?? 0);

            if ($score >= 0.35 && preg_match('/nsfw|sexual|explicit|porn|hentai|sexy/', $label)) {
                return ['valid' => false, 'message' => 'The selected image looks sensitive or inappropriate for a profile photo.'];
            }
        }

        return ['valid' => true, 'message' => ''];
    }

    private function handleModerationFailure(string $message): array
    {
        if ($this->shouldBypassModerationFailure()) {
            return ['valid' => true, 'message' => ''];
        }

        return ['valid' => false, 'message' => $message];
    }

    private function shouldBypassModerationFailure(): bool
    {
        // Keep development and automated tests usable when the external provider is unavailable.
        return in_array($this->appEnv, ['dev', 'test'], true);
    }
}