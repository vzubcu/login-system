<?php

declare(strict_types=1);

namespace LoginSystem;

class User
{
    public int $id;
    public string $username;
    public string $password;

    public function __construct(int $id, string $username, string $password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }
}
