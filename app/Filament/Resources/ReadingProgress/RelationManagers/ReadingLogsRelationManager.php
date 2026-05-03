<?php
namespace App\Filament\Resources\ReadingProgress\RelationManagers;

use App\Filament\Resources\ReadingLogs\ReadingLogResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ReadingLogsRelationManager extends RelationManager
{
    protected static string $relationship = 'readingLogs';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Schema $form): Schema
    {
        return ReadingLogResource::form($form);
    }

    protected static ?string $relatedResource = ReadingLogResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make()
                    ->slideOver(),
            ]);
    }
}