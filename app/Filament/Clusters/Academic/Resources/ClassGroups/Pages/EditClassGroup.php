<?php

namespace App\Filament\Clusters\Academic\Resources\ClassGroups\Pages;

use App\Filament\Clusters\Academic\Resources\ClassGroups\ClassGroupResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditClassGroup extends EditRecord
{
    protected static string $resource = ClassGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
