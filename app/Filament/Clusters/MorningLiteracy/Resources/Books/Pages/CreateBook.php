<?php

namespace App\Filament\Clusters\MorningLiteracy\Resources\Books\Pages;

use App\Filament\Clusters\MorningLiteracy\Resources\Books\BookResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBook extends CreateRecord
{
    protected static string $resource = BookResource::class;
}
