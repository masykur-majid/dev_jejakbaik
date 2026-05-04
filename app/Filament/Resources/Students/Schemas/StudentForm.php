<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // TextInput::make('user_id')
                //     ->numeric(),
                TextInput::make('nisn')
                    ->placeholder('-')
                    ->regex('/^[0-9]+$/')
                    ->maxLength(10),
                TextInput::make('nis')
                    ->placeholder('-')
                    ->regex('/^[0-9]+$/'),
                TextInput::make('student_name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->suffix('@jejakbaik.web.id')
                    ->dehydrateStateUsing(fn ($state) => $state . '@jejakbaik.web.id')
                    ->required(),
                Select::make('current_grade')
                    ->required()
                    ->default('X')
                    ->options([
                        '7' => '7',
                        '8' => '8',
                        '9' => '9',
                        '10' => '10',
                        '11' => '12',
                        '12' => '12',
                    ]),
                Select::make('classgroup_id')
                    ->relationship('classgroup', 'class_name',fn (Builder $query) => $query->oldest()),
                Select::make('teacher_id')
                    ->relationship('teacher', 'teacher_name')
                    ->label('Monitor Teacher'),
            ])
            ->columns('1');
    }
}
