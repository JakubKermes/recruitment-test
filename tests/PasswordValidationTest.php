<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use App\UserValidator;

class PasswordValidationTest extends TestCase
{
    #[DataProvider("invalidPasswordProvider")]
    public function testInvalidPasswordCanNotPass(string $invalidPassword): void
    {
        $validator = new UserValidator();

        $this->assertFalse($validator->validatePassword($invalidPassword));
    }

    #[DataProvider("validPasswordProvider")]
    public function testValidPasswordCanPass(string $validPassword): void
    {
        $validator = new UserValidator();

        $this->assertTrue($validator->validatePassword($validPassword));
    }

    public static function invalidPasswordProvider(): array
    {
        return [
            ["noNumbers"],
            ["short"],
            ["NoSpecial123"],
            ["!@#!@#!#@#"],
            ["UPPERCASEONLY"],
            ["lowercaseonly"],
            ["123456789"],
            ["NoNumbers!@#"]
        ];
    }

    public static function validPasswordProvider(): array
    {
        return [
            ["ValidPassword123!"],
            ["OtherValid__Password123"]
        ];
    }

}