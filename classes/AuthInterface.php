<?php

declare(strict_types=1);

namespace LoginSystem;

interface AuthInterface
{
    public function login(string $username, string $password): bool;
    public function isLoggedIn(): bool;
    public function logout(): void;
}
