<?php

namespace App\Filament\Clusters\Parapoint\Resources\StudentPoints\Pages;

use App\Filament\Clusters\Parapoint\Resources\PointLogs\PointLogResource;
use App\Filament\Clusters\Parapoint\Resources\StudentPoints\StudentPointResource;
use App\Models\PointLogDetail;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Colors\Color;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ListStudentPoints extends ListRecords
{
    protected static string $resource = StudentPointResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('create_by_student')
            ->label('By Student')
            ->icon('tabler-user')
            ->color(Color::Indigo)
            ->url(PointLogResource::getUrl('create-by-student')),

        Action::make('create_by_conduct')
            ->label('By Conduct')
            ->icon('tabler-file-description')
            ->color(Color::Purple)
            ->url(PointLogResource::getUrl('create-by-conduct')),
        ];
    }
    
}
