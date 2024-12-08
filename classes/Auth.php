<?php

declare(strict_types=1);

namespace LoginSystem;

use LoginSystem\Database; // Asigură-te că importul este prezent
use LoginSystem\traits\InputValidationTrait;

class Auth extends AbstractAuth
{
    use InputValidationTrait;

    public function login(string $username, string $password): bool
    {
        $username = $this->validateInput($username);
        $password = $this->validateInput($password);

        foreach ($this->db->getUsers() as $user) {
            // Comparăm username și verificăm parola criptată
            if ($user['username'] === $username && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $username;
                return true;
            }
        }

        return false; // Returnăm false dacă autentificarea eșuează
    }
}
