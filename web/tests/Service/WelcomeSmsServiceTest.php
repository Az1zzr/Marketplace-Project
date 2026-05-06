<?php

namespace App\Tests\Service;

use App\Entity\User;
use App\Service\InputValidationService;
use App\Service\WelcomeSmsService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Notifier\Message\SentMessage;
use Symfony\Component\Notifier\Message\SmsMessage;
use Symfony\Component\Notifier\TexterInterface;

class WelcomeSmsServiceTest extends TestCase
{
    public function testSendWelcomeMessageFormatsTheSmsForTunisia(): void
    {
        $capturedMessage = null;

        $texter = $this->createMock(TexterInterface::class);
        $texter
            ->expects(self::once())
            ->method('send')
            ->with(self::callback(function (SmsMessage $message) use (&$capturedMessage): bool {
                $capturedMessage = $message;

                return true;
            }))
            ->willReturnCallback(static fn (SmsMessage $message) => new SentMessage($message, 'test://transport'));

        $service = new WelcomeSmsService($texter, new InputValidationService());

        $user = (new User())
            ->setPrenom('Sarra')
            ->setNom('Ben Salah')
            ->setTelephone('+216 55 123 456');

        $service->sendWelcomeMessage($user);

        self::assertInstanceOf(SmsMessage::class, $capturedMessage);
        self::assertSame('+21655123456', $capturedMessage->getPhone());
        self::assertStringContainsString('Welcome to MarketHub, Sarra!', $capturedMessage->getSubject());
    }
}
