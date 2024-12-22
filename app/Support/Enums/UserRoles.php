<?php

namespace App\Support\Enums;

use App\Support\Traits\IsSelectOptions;

enum UserRoles: string
{
    use IsSelectOptions;
    case ADMINISTRATOR = 'administrator';
    case USER = 'user';

    public function label(): string
    {
        return match ($this) {
            self::ADMINISTRATOR => 'Administrator',
            self::USER => 'User',
            default => throw new \Exception('Unknown enumeration')
        };
    }
}
