<?php

namespace App\Service;

use App\Entity\User;
use Symfony\Component\Notifier\Message\SmsMessage;
use Symfony\Component\Notifier\TexterInterface;

class WelcomeSmsService
{
    public function __construct(
        private readonly TexterInterface $texter,
        private readonly InputValidationService $inputValidationService
    ) {
    }

    public function sendWelcomeMessage(User $user): void
    {
        $normalizedPhone = $this->inputValidationService->normalizePhone($user->getTelephone());
        if (null === $normalizedPhone || '' === $normalizedPhone) {
            throw new \RuntimeException('A phone number is required to send the welcome SMS.');
        }

        $sms = new SmsMessage(
            '+216' . $normalizedPhone,
            sprintf('Welcome to MarketHub, %s! Your account is ready.', $user->getPrenom() ?: $user->getNomComplet())
        );

        $this->texter->send($sms);
    }
}
