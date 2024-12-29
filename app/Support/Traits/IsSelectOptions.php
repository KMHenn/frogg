<?php

namespace App\Support\Traits;

trait IsSelectOptions
{
    public static function getSelectOptions():array{
        $options = [];
        foreach(self::cases() as $case){
            $options[$case->value] = $case->label();
        }

        return $options;
    }
}
