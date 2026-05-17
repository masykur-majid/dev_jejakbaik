<?php

namespace App\Filament\Clusters\Academic\Resources\Teachers\Pages;

use App\Filament\Clusters\Academic\Resources\Teachers\TeacherResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTeacher extends EditRecord
{
    protected static string $resource = TeacherResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
