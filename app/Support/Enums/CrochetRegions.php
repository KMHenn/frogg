<?php

namespace App\Support\Enums;

use App\Support\Traits\IsSelectOptions;

enum CrochetRegions:string
{
    use IsSelectOptions;

    case US = 'us';
    case UK = 'uk';

    public function label(): string{
        return match ($this) {
            self::US => 'US',
            self::UK => 'UK',
            default => throw new \Exception('Unknown enumeration')
        };
    }
}
