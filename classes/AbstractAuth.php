<?php

declare(strict_types=1);

namespace LoginSystem;

abstract class AbstractAuth implements AuthInterface
{
    protected Database $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function isLoggedIn(): bool
    {
        return isset($_SESSION['user']);
    }

    public function logout(): void
    {
        unset($_SESSION['user']);
        session_destroy();
    }
}
