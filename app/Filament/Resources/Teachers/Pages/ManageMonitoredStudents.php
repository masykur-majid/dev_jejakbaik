<?php

namespace App\Filament\Resources\Teachers\Pages;

use App\Filament\Resources\Teachers\TeacherResource;
use App\Livewire\StudentsMonitoredByThisTeacher;
use App\Livewire\StudentsMonitoredNotByThisTeacher;
use Daljo25\FilamentTablerIcons\Enums\TablerIcon;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Livewire;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ManageMonitoredStudents extends EditRecord
{
    public static function canAccess(array $parameters = []): bool
    {
        return auth()->user()->can('manage_teacher');
    }

    protected static string $resource = TeacherResource::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Teacher Information')
                    ->schema([
                        TextInput::make('nuptk')
                            ->placeholder('-')
                            ->regex('/^[0-9]+$/'),
                        TextInput::make('teacher_name')
                            ->required(),
                        TextInput::make('email')
                            ->label('Email address')
                            ->email()
                            ->required(),
                        Actions::make([
                            Action::make('save')
                                ->label('Update Teacher Information')
                                ->color('primary')
                                ->icon(TablerIcon::DeviceFloppyFilled)
                                ->action('save')
                        ])  
                        ->columnSpanFull()
                        ->alignEnd()
                    ])
                    ->columns(3),
                
                Section::make('add / remove monitored students')
                    ->icon(TablerIcon::ReplaceUser)
                    ->description('Add or remove students as the member of this class. The add/remove process will be saved directly, you didn\'t need to press any button.')
                    ->schema([
                        Livewire::make(StudentsMonitoredByThisTeacher::class, ['record'=>$this->record])->key('student-members'),
                        Livewire::make(StudentsMonitoredNotByThisTeacher::class, ['record'=>$this->record])->key('not-member')
                    ])
                    ->columns(2),
                
            ])
            ->columns(1);
    }

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }

   
}
