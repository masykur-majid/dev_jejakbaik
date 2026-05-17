<?php

namespace App\Filament\Clusters\Academic\Resources\ClassGroups\Pages;

use App\Filament\Clusters\Academic\Resources\ClassGroups\ClassGroupResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListClassGroups extends ListRecords
{
    protected static string $resource = ClassGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->slideOver()
                ->modalWidth('md'),
        ];
    }
}
