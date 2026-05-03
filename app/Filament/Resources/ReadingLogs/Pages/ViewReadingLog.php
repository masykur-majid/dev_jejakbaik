<?php

namespace App\Filament\Resources\ReadingLogs\Pages;

use App\Filament\Resources\ReadingLogs\ReadingLogResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewReadingLog extends ViewRecord
{
    protected static string $resource = ReadingLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
