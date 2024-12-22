<?php

namespace App\Support\Enums;

use App\Support\Traits\IsSelectOptions;

enum ProjectTypes:string
{
    use IsSelectOptions;

    case KNIT = 'knit';
    case CROCHET = 'crochet';

    public function label(): string{
        return match ($this) {
            self::KNIT => 'Knit',
            self::CROCHET => 'Crochet',
            default => throw new \Exception('Unknown Project Type')
        };
    }
}
