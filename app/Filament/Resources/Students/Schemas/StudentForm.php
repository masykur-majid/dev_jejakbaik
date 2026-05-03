<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

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
                    ->email()
                    ->required(),
                Radio::make('current_grade')
                    ->required()
                    ->inline()
                    ->default('X')
                    ->options([
                        'X' => 'X',
                        'XI' => 'XI',
                        'XII' => 'XII',
                    ]),
                Select::make('classgroup_id')
                    ->relationship('classgroup', 'class_name'),
                Select::make('teacher_id')
                    ->relationship('teacher', 'teacher_name')
                    ->label('Monitor Teacher'),
            ])
            ->columns('1');
    }
}
