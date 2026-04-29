<?php

namespace App\Service;

use App\Entity\User;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twilio\Rest\Client as TwilioClient;

class PasswordResetService
{
    public function __construct(
        private readonly MailerInterface $mailer,
        private readonly string $appSecret,
        private readonly string $mailerDsn,
        private readonly string $mailerFromAddress,
        private readonly string $twilioAccountSid,
    ) {
    }

    public function issueResetCode(User $user): string
    {
        $code = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        $user
            ->setResetPasswordCodeHash($this->hashCode($code))
            ->setResetPasswordExpiresAt(new \DateTime('+15 minutes')); //lena badlt DateTimeImmutable

        return $code;
    }

    public function clearResetCode(User $user): void
    {
        $user
            ->setResetPasswordCodeHash(null)
            ->setResetPasswordExpiresAt(null);
    }

    public function isResetCodeValid(User $user, string $code): bool
    {
        $expiresAt = $user->getResetPasswordExpiresAt();
        $hash = $user->getResetPasswordCodeHash();

        if (null === $expiresAt || null === $hash) {
            return false;
        }

        if ($expiresAt < new \DateTimeImmutable()) {
            return false;
        }

        return hash_equals($hash, $this->hashCode($code));
    }

    public function sendResetCode(User $user, string $channel, string $code): void
    {
        if ('email' === $channel) {
            $this->sendByEmail($user, $code);

            return;
        }

        if ('sms' === $channel) {
            $this->sendBySms($user, $code);

            return;
        }

        throw new \RuntimeException('Unsupported verification channel.');
    }

    public function maskContact(User $user, string $channel): string
    {
        if ('sms' === $channel) {
            $phone = $user->getTelephone() ?? '';
            $suffix = mb_substr($phone, -2);

            return '*** *** ' . $suffix;
        }

        $email = $user->getEmail() ?? '';
        $parts = explode('@', $email, 2);
        if (2 !== count($parts)) {
            return $email;
        }

        $namePart = $parts[0];
        $visible = mb_substr($namePart, 0, 2);

        return $visible . str_repeat('*', max(1, mb_strlen($namePart) - 2)) . '@' . $parts[1];
    }

    private function sendByEmail(User $user, string $code): void
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
            ->subject('Marketplace password reset code')
            ->text(sprintf(
                "Hello %s,\n\nYour Marketplace verification code is: %s\nThis code will expire in 15 minutes.\n\nIf you did not request it, you can ignore this message.",
                $user->getNomComplet(),
                $code
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

    private function hashCode(string $code): string
    {
        return hash('sha256', $this->appSecret . '|' . $code);
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
