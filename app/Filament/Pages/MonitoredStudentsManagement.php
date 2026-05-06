<?php

namespace App\Filament\Pages;

use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Pages\Page;
use Filament\Tables\Concerns\InteractsWithTable;

class MonitoredStudentsManagement extends Page
{
    use HasPageShield;
    protected string $view = 'filament.pages.monitored-students-management';
}
