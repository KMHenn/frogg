<?php

namespace App\Filament\Resources\StitchResource\Pages;

use App\Filament\Resources\StitchResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStitch extends EditRecord
{
    protected static string $resource = StitchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
