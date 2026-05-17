<?php

namespace App\Filament\Clusters\Academic\Resources\ClassGroups\Pages;

use App\Filament\Clusters\Academic\Resources\ClassGroups\ClassGroupResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewClassGroup extends ViewRecord
{
    protected static string $resource = ClassGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->label('Manage Members')
                ->slideOver(),
        ];
    }
}
