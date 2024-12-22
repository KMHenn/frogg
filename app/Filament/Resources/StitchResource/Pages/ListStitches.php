<?php

namespace App\Filament\Resources\StitchResource\Pages;

use App\Filament\Resources\StitchResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStitches extends ListRecords
{
    protected static string $resource = StitchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
