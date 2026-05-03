<?php

namespace App\Filament\Resources\ReadingLogs\Pages;

use App\Filament\Resources\ReadingLogs\ReadingLogResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditReadingLog extends EditRecord
{
    protected static string $resource = ReadingLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
