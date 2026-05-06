<?php

namespace App\Tests\Service;

use App\Service\InputValidationService;
use PHPUnit\Framework\TestCase;

class InputValidationServiceTest extends TestCase
{
    public function testValidateTunisianPhoneAcceptsLocalFormat(): void
    {
        $service = new InputValidationService();

        self::assertTrue($service->validateTunisianPhone('55123456')['valid']);
    }

    public function testValidateTunisianPhoneAcceptsCountryCodeFormat(): void
    {
        $service = new InputValidationService();

        self::assertTrue($service->validateTunisianPhone('+216 55 123 456')['valid']);
    }

    public function testNormalizePhoneStripsCountryCode(): void
    {
        $service = new InputValidationService();

        self::assertSame('55123456', $service->normalizePhone('+216 55 123 456'));
    }

    public function testValidateMessageContentRejectsBlankMessages(): void
    {
        $service = new InputValidationService();

        self::assertFalse($service->validateMessageContent('   ')['valid']);
    }

    public function testValidateMessageContentAcceptsRegularMessages(): void
    {
        $service = new InputValidationService();

        self::assertTrue($service->validateMessageContent('Hello fournisseur, I need more details.')['valid']);
    }
}
