<?php

namespace App\Support\Enums;

use App\Support\Traits\IsSelectOptions;

enum ProjectStatuses:string
{
    use IsSelectOptions;

    case TODO = 'todo';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';
    case DROPPED = 'dropped';

    public function label(): string{
        return match ($this) {
            self::TODO => 'ToDo',
            self::IN_PROGRESS => 'In Progress',
            self::COMPLETED => 'Completed',
            self::DROPPED => 'Dropped',
            default => throw new \Exception('Unknown status')
        };
    }
}
