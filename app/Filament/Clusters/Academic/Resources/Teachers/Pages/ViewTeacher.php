<?php

namespace App\Filament\Clusters\Academic\Resources\Teachers\Pages;

use App\Filament\Clusters\Academic\Resources\Teachers\TeacherResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTeacher extends ViewRecord
{
    protected static string $resource = TeacherResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->label('Edit Teacher Data'),
        ];
    }
}
