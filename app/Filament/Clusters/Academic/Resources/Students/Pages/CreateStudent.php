<?php

namespace App\Filament\Clusters\Academic\Resources\Students\Pages;

use App\Filament\Clusters\Academic\Resources\Students\StudentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateStudent extends CreateRecord
{
    protected static string $resource = StudentResource::class;
}
