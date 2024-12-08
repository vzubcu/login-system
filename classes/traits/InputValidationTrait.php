<?php

declare(strict_types=1);

namespace LoginSystem\traits;

trait InputValidationTrait
{
    public function validateInput(string $input): string
    {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }
}
