<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\UserValidator;
use PHPUnit\Framework\Attributes\DataProvider;

class EmailValidationTest extends TestCase
{
    #[DataProvider("invalidEmailProvider")]
    public function testInvalidEmailCannotPass(string $invalidEmail)
    {
        $validator = new UserValidator();

        $this->assertFalse($validator->validateEmail($invalidEmail));
    }

    #[DataProvider("validEmailProvider")]
    public function testValidEmailCanPass($validEmail)
    {
        $validator = new UserValidator();

        $this->assertTrue($validator->validateEmail($validEmail));
    }


    public static function invalidEmailProvider(): array
    {
        return [
            ["admin.example.com"],
            ["@example.com"],
            ["1@example.com"],
            ["admin@.com"],
            ["admin@example.c"]
        ];
    }

    public static function validEmailProvider(): array
    {
        return [
            ["admin@example.com"],
            ["admin123@example123.com"],
            ["a@e.io"],
        ];
    }

}