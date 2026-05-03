<?php

namespace App\Filament\Resources\ReadingLogs\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ReadingLogInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('readingProgress.id')
                    ->label('Reading progress'),
                TextEntry::make('date_read')
                    ->date(),
                TextEntry::make('start_page')
                    ->numeric(),
                TextEntry::make('end_page')
                    ->numeric(),
                TextEntry::make('total_page_read')
                    ->numeric(),
                TextEntry::make('summary')
                    ->columnSpanFull(),
                IconEntry::make('verified')
                    ->boolean(),
                TextEntry::make('teacher_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
