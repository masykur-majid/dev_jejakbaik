<?php

namespace App\Filament\Clusters\Academic\Resources\Students\Pages;

use App\Filament\Clusters\Academic\Resources\Students\StudentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStudents extends ListRecords
{
    protected static string $resource = StudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->slideOver()
                ->modalWidth('md')
                ->modalHeading('Add new Students'),
        ];
    }
}
