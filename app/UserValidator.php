<?php
declare(strict_types=1);

namespace App;

class UserValidator
{
    public function validateEmail(string $email): bool
    {
        $filter = "/^[a-z0-9]*[a-z]+[a-z0-9]*@[a-z0-9]+\.[a-z]{2,}$/i";

        return (bool)preg_match($filter, $email);
    }

    public function validatePassword(string $password): bool
    {
        if (strlen($password) < 8) {
            return false;
        }

        $filter = "/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[\W_])[0-9A-Za-z\W_]*$/";

        return (bool)preg_match($filter, $password);
    }
}
