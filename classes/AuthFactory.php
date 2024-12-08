<?php

declare(strict_types=1);

namespace LoginSystem;

class AuthFactory
{
    public static function create(): AuthInterface
    {
        return new Auth(new Database());
    }
}
