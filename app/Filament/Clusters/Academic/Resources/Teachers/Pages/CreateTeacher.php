<?php

namespace App\Filament\Clusters\Academic\Resources\Teachers\Pages;

use App\Filament\Clusters\Academic\Resources\Teachers\TeacherResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTeacher extends CreateRecord
{
    protected static string $resource = TeacherResource::class;
}
