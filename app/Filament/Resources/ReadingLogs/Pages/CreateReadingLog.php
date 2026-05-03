<?php

namespace App\Filament\Resources\ReadingLogs\Pages;

use App\Filament\Resources\ReadingLogs\ReadingLogResource;
use Filament\Resources\Pages\CreateRecord;

class CreateReadingLog extends CreateRecord
{
    protected static string $resource = ReadingLogResource::class;
}
