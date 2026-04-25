<?php

namespace App\Service;

use App\Entity\User;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twilio\Rest\Client as TwilioClient;

class PasswordResetService
{
    private const RESET_LINK_TTL = '+60 minutes';

    public function __construct(
        private readonly MailerInterface $mailer,
        private readonly string $appSecret,
        private readonly string $mailerDsn = '',
        private readonly string $mailerFromAddress = '',
        private readonly string $twilioAccountSid = '',
        private readonly string $twilioAuthToken = '',
        private readonly string $twilioFromNumber = ''
    ) {
    }

    public function issueResetToken(User $user): string
    {
        $token = bin2hex(random_bytes(32));

        $user
            ->setResetPasswordCodeHash($this->hashToken($token))
            ->setResetPasswordExpiresAt(new \DateTime(self::RESET_LINK_TTL));

        return $token;
    }

    public function clearResetToken(User $user): void
    {
        $user
            ->setResetPasswordCodeHash(null)
            ->setResetPasswordExpiresAt(null);
    }

    public function isResetTokenValid(User $user, string $token): bool
    {
        $expiresAt = $user->getResetPasswordExpiresAt();
        $hash = $user->getResetPasswordCodeHash();

        if (null === $expiresAt || null === $hash) {
            return false;
        }

        if ($expiresAt < new \DateTimeImmutable()) {
            return false;
        }

        return hash_equals($hash, $this->hashToken($token));
    }

    public function sendResetLink(User $user, string $resetUrl): void
    {
        $this->sendByEmail($user, $resetUrl);
    }

    private function sendByEmail(User $user, string $resetUrl): void
    {
        if ('' === trim($this->mailerDsn) || str_starts_with($this->mailerDsn, 'null://')) {
            throw new \RuntimeException('Email sending is not configured yet. Set a real MAILER_DSN first.');
        }

        if ('' === trim($this->mailerFromAddress)) {
            throw new \RuntimeException('MAILER_FROM_ADDRESS is missing.');
        }

        $email = (new Email())
            ->from($this->mailerFromAddress)
            ->to((string) $user->getEmail())
            ->subject('Marketplace password reset')
            ->html(sprintf(
                '<p>Hello %s,</p><p>We received a request to reset your Marketplace password.</p><p><a href="%s">Reset your password</a></p><p>This link will expire in 60 minutes.</p><p>If you did not request it, you can ignore this message.</p>',
                htmlspecialchars($user->getNomComplet(), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'),
                htmlspecialchars($resetUrl, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')
            ))
            ->text(sprintf(
                "Hello %s,\n\nWe received a request to reset your Marketplace password.\n\nReset your password: %s\n\nThis link will expire in 60 minutes.\n\nIf you did not request it, you can ignore this message.",
                $user->getNomComplet(),
                $resetUrl
            ));

        $this->mailer->send($email);
    }

    private function sendBySms(User $user, string $code): void
    {
        if (
            '' === trim($this->twilioAccountSid)
            || '' === trim($this->twilioAuthToken)
            || '' === trim($this->twilioFromNumber)
        ) {
            throw new \RuntimeException('SMS sending is not configured yet. Add your Twilio credentials first.');
        }

        $phone = $user->getTelephone();
        if (null === $phone || '' === trim($phone)) {
            throw new \RuntimeException('This account does not have a phone number for SMS verification.');
        }

        $twilio = new TwilioClient($this->twilioAccountSid, $this->twilioAuthToken);
        $twilio->messages->create($this->formatPhoneForSms($phone), [
            'from' => $this->twilioFromNumber,
            'body' => sprintf('Your Marketplace verification code is %s. It expires in 15 minutes.', $code),
        ]);
    }

    private function hashToken(string $token): string
    {
        return hash('sha256', $this->appSecret . '|' . $token);
    }

    private function formatPhoneForSms(string $phone): string
    {
        $digits = preg_replace('/[^0-9]/', '', $phone) ?? '';

        if (8 === strlen($digits)) {
            return '+216' . $digits;
        }

        if (str_starts_with($digits, '216') && 11 === strlen($digits)) {
            return '+' . $digits;
        }

        if (str_starts_with($phone, '+')) {
            return $phone;
        }

        return '+' . $digits;
    }
}
