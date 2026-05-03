<?php

namespace App\Filament\Resources\ReadingLogs;

use App\Filament\Resources\ReadingLogs\Pages\CreateReadingLog;
use App\Filament\Resources\ReadingLogs\Pages\EditReadingLog;
use App\Filament\Resources\ReadingLogs\Pages\ListReadingLogs;
use App\Filament\Resources\ReadingLogs\Pages\ViewReadingLog;
use App\Filament\Resources\ReadingLogs\Schemas\ReadingLogForm;
use App\Filament\Resources\ReadingLogs\Schemas\ReadingLogInfolist;
use App\Filament\Resources\ReadingLogs\Tables\ReadingLogsTable;
use App\Models\ReadingLog;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ReadingLogResource extends Resource
{
    protected static ?string $model = ReadingLog::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return ReadingLogForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ReadingLogInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReadingLogsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListReadingLogs::route('/'),
            //'create' => CreateReadingLog::route('/create'),
           // 'view' => ViewReadingLog::route('/{record}'),
            //'edit' => EditReadingLog::route('/{record}/edit'),
        ];
    }
}
