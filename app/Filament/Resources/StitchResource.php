<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StitchResource\Pages;
use App\Filament\Resources\StitchResource\RelationManagers;
use App\Models\Stitch;
use App\Models\User;
use App\Support\Enums\CrochetRegions;
use App\Support\Enums\ProjectTypes;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StitchResource extends Resource
{
    protected static ?string $model = Stitch::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        $user = auth()->user();
        if(!$user instanceof User){
            throw new \Exception('No user found');
        }

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_us')
                    ->label('Name (US)')
                    ->toggleable()
                    ->toggledHiddenByDefault($user->default_region === CrochetRegions::UK),
                Tables\Columns\TextColumn::make('name_uk')
                    ->label('Name (UK)')
                    ->toggleable()
                    ->toggledHiddenByDefault($user->default_region === CrochetRegions::US),
                Tables\Columns\TextColumn::make('abbreviation_us')
                    ->label('Abbreviation (US)')
                    ->toggleable()
                    ->toggledHiddenByDefault($user->default_region === CrochetRegions::UK),
                Tables\Columns\TextColumn::make('abbreviation_uk')
                    ->label('Abbreviation (UK)')
                    ->toggleable()
                    ->toggledHiddenByDefault( $user->default_region === CrochetRegions::US),
                Tables\Columns\TextColumn::make('type')
                ->formatStateUsing(fn($state) => $state->label())
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                ->multiple()
                ->options(fn()=>ProjectTypes::getSelectOptions()),

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStitches::route('/'),
            'create' => Pages\CreateStitch::route('/create'),
            'edit' => Pages\EditStitch::route('/{record}/edit'),
        ];
    }
}
