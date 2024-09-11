<?php
declare(strict_types=1);

class UserValidator
{
    public function validateEmail(string $email): bool
    {
        $filter = "/^[a-z0-9]*[a-z]+[a-z0-9]*@[a-z0-9]+\.[a-z]{2,}$/i";

        return preg_match($filter, $email);
    }

    public function validatePassword(string $password): bool
    {
        if (strlen($password) < 8) {
            return false;
        }

        $filter = "/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[\W_])[0-9A-Za-z\W_]*$/";

        return preg_match($filter, $password);
    }
}
