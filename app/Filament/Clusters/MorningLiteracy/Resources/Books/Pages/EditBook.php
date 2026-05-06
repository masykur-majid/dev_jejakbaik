<?php

namespace App\Filament\Clusters\MorningLiteracy\Resources\Books\Pages;

use App\Filament\Clusters\MorningLiteracy\Resources\Books\BookResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditBook extends EditRecord
{
    protected static string $resource = BookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
