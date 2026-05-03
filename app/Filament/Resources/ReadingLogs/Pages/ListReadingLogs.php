<?php

namespace App\Filament\Resources\ReadingLogs\Pages;

use App\Filament\Resources\ReadingLogs\ReadingLogResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListReadingLogs extends ListRecords
{
    protected static string $resource = ReadingLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->slideOver()
                ->modalWidth('md'),
        ];
    }
}
