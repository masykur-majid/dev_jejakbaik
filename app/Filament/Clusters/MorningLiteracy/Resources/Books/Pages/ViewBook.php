<?php

namespace App\Filament\Clusters\MorningLiteracy\Resources\Books\Pages;

use App\Filament\Clusters\MorningLiteracy\Resources\Books\BookResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBook extends ViewRecord
{
    protected static string $resource = BookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
