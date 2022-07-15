<?php

use Hazem\CSVDataUploader\Validator\EmailValidator;
use Hazem\CSVDataUploader\Validator\InvalidValueException;
use Hazem\CSVDataUploader\Validator\StringValidator;
use Hazem\CSVDataUploader\Validator\ValidatorManager;
use Hazem\CSVDataUploader\Validator\ValidatorManagerInterface;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{
    private static ValidatorManagerInterface $validatorManager;

    public static function setUpBeforeClass(): void
    {
        self::$validatorManager = new ValidatorManager();
        self::$validatorManager->addValidator(new EmailValidator());
        self::$validatorManager->addValidator(new StringValidator());
    }

    public function testEmailValid(): void
    {
        self::$validatorManager->validate('wehbihazem@mail.com', ['email']);
        self::assertTrue(true);
    }

    public function testEmailInvalid(): void
    {
        $this->expectException(InvalidValueException::class);
        self::$validatorManager->validate('wehbihazem@wehbihazem@mail.com', ['email']);
    }

    public function testStringTooShort(): void
    {
        $this->expectException(InvalidValueException::class);
        $this->expectExceptionMessage('A string length must be > 100');
        self::$validatorManager->validate('too-short-string', ['string' => ['min_length' => 100]]);
    }

    public function testStringTooLong(): void
    {
        $this->expectException(InvalidValueException::class);
        $this->expectExceptionMessage('A string length must be < 10');
        self::$validatorManager->validate('wehbihazemddfweeferfrrfr', ['string' => ['max_length' => 10]]);
    }
}
