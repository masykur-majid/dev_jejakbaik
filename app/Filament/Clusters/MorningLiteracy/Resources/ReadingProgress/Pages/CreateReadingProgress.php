<?php

namespace App\Filament\Clusters\MorningLiteracy\Resources\ReadingProgress\Pages;

use App\Filament\Clusters\MorningLiteracy\Resources\ReadingProgress\ReadingProgressResource;
use Filament\Resources\Pages\CreateRecord;

class CreateReadingProgress extends CreateRecord
{
    protected static string $resource = ReadingProgressResource::class;
}
