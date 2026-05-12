<?php

namespace App\Service;

use App\Entity\User;
use Twilio\Rest\Client as TwilioClient;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception as PHPMailerException;

class PasswordResetService
{
    // ── Gmail credentials ────────────────────────────────────────────────────
    private const GMAIL_USER = 'maramsoltani175@gmail.com';
    private const GMAIL_PASS = 'alsmqwnccmlwhpgk'; // app password sans espaces

    public function __construct(
        private readonly string $appSecret,
        private readonly string $twilioAccountSid,
        private readonly string $twilioAuthToken,
        private readonly string $twilioFromNumber,
    ) {
    }

    public function issueResetCode(User $user): string
    {
        $code = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        $user
            ->setResetPasswordCodeHash($this->hashCode($code))
            ->setResetPasswordExpiresAt(new \DateTime('+15 minutes'));

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
        $hash      = $user->getResetPasswordCodeHash();

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
            $phone  = $user->getTelephone() ?? '';
            $suffix = mb_substr($phone, -2);
            return '*** *** ' . $suffix;
        }

        $email = $user->getEmail() ?? '';
        $parts = explode('@', $email, 2);
        if (2 !== count($parts)) {
            return $email;
        }

        $namePart = $parts[0];
        $visible  = mb_substr($namePart, 0, 2);

        return $visible . str_repeat('*', max(1, mb_strlen($namePart) - 2)) . '@' . $parts[1];
    }

    private function sendByEmail(User $user, string $code): void
    {
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug  = SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = self::GMAIL_USER;
            $mail->Password   = self::GMAIL_PASS;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer'       => false,
                    'verify_peer_name'  => false,
                    'allow_self_signed' => true,
                ],
            ];
            $mail->CharSet = 'UTF-8';

            $mail->setFrom(self::GMAIL_USER, 'Marketplace');
            $mail->addAddress((string) $user->getEmail(), $user->getNomComplet());

            $mail->isHTML(false);
            $mail->Subject = 'Marketplace - Code de vérification';
            $mail->Body    = sprintf(
                "Bonjour %s,\n\nVotre code de vérification Marketplace est : %s\n\nCe code expire dans 15 minutes.\n\nSi vous n'avez pas fait cette demande, ignorez ce message.",
                $user->getNomComplet(),
                $code
            );

            $mail->send();

        } catch (PHPMailerException $e) {
            throw new \RuntimeException(
                sprintf('Impossible d\'envoyer l\'email : %s', $mail->ErrorInfo)
            );
        }
    }

    private function sendBySms(User $user, string $code): void
    {
        if (
            '' === trim($this->twilioAccountSid)
            || '' === trim($this->twilioAuthToken)
            || '' === trim($this->twilioFromNumber)
        ) {
            throw new \RuntimeException('SMS sending is not configured yet.');
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