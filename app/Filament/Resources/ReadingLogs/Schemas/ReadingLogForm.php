<?php

namespace App\Filament\Resources\ReadingLogs\Schemas;

use Auth;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Livewire;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class ReadingLogForm
{   
    public static function configure(Schema $schema): Schema
    {
        
        return $schema
            ->components([
                TextInput::make('reading_progress_id')
                    ->required()
                    ->default(function ($livewire){
                        if(method_exists($livewire, 'getOwnerRecord')){    
                            return $livewire->getOwnerRecord()->current_page;
                        }
                        return 0;
                    })
                    ->dehydrated()
                    ->hidden(),
                DatePicker::make('date_read')
                    ->required()
                    ->default(now())
                    ->dehydrated(),
                TextInput::make('start_page')
                    ->required()
                    ->numeric()
                    ->live(onBlur:true)
                    ->default(function ($livewire){
                        if(method_exists($livewire, 'getOwnerRecord')){    
                            return $livewire->getOwnerRecord()->current_page;
                        }
                        return 0;
                    })
                    ->afterStateUpdated(
                        function (Set $set, Get $get){
                            self::calculateTotalPages($set, $get);
                        }
                    )
                    ->disabled()
                    ->dehydrated(),
                TextInput::make('end_page')
                    ->required()
                    ->live(onBlur:true)
                    ->afterStateUpdated(
                        function (Set $set, Get $get){
                            self::calculateTotalPages($set, $get);
                        }
                    )
                    ->numeric()
                    ->dehydrated(),
                TextInput::make('total_page_read')
                    ->required()
                    ->numeric()
                    ->disabled()
                    ->default(0)
                    ->dehydrated()
                    ->reactive(),
                Textarea::make('summary')
                    ->required()
                    ->rows(3)
                    ->autosize()
                    ->columnSpanFull(),
                Toggle::make('verified')
                    ->default(false)
                    ->dehydrated()
                    ->hidden(fn () => Auth::user()->hasRole('siswa')),
                // TextInput::make('teacher_id')
                //     ->default
                       
                //     })
                // ->hidden(fn () => Auth::user()->hasRole('siswa')),
                Textarea::make('teacher_note')
                    ->columnSpanFull()
                    ->disabled(fn () => Auth::user()->hasRole('siswa')),
            ])
            ->columns(1);
    }

    public static function calculateTotalPages(Set $set, Get $get): void
    {
        $start = (int) $get('start_page');
        $end = (int) $get('end_page');

        if ($end >= $start) {
            $set('total_page_read', $end - $start + 1);
        } else {
            $set('total_page_read', 0);
        }
    }
}
