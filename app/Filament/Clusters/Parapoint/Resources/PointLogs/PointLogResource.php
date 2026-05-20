<?php

namespace App\Filament\Clusters\Parapoint\Resources\PointLogs;

use App\Filament\Clusters\Parapoint\ParapointCluster;
use App\Filament\Clusters\Parapoint\Resources\PointLogs\Pages\CreateByConduct;
use App\Filament\Clusters\Parapoint\Resources\PointLogs\Pages\CreateByStudent;
use App\Filament\Clusters\Parapoint\Resources\PointLogs\Pages\CreatePointLog;
use App\Filament\Clusters\Parapoint\Resources\PointLogs\Pages\EditPointLog;
use App\Filament\Clusters\Parapoint\Resources\PointLogs\Pages\ListPointLogs;
use App\Filament\Clusters\Parapoint\Resources\PointLogs\Pages\ViewPointLog;
use App\Filament\Clusters\Parapoint\Resources\PointLogs\Schemas\PointLogForm;
use App\Filament\Clusters\Parapoint\Resources\PointLogs\Schemas\PointLogInfolist;
use App\Filament\Clusters\Parapoint\Resources\PointLogs\Tables\PointLogsTable;
use App\Models\PointLog;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PointLogResource extends Resource
{
    protected static ?string $model = PointLog::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    // protected static ?string $cluster = ParapointCluster::class;

    protected static string|UnitEnum|null $navigationGroup = 'ParaPoint';

    public static function infolist(Schema $schema): Schema
    {
        return PointLogInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PointLogsTable::configure($table);
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
            'index' => ListPointLogs::route('/'),
            'create-by-student' => CreateByStudent::route('/create/by-student'),
            'create-by-conduct' => CreateByConduct::route('/create/by-conduct'),
            'view' => ViewPointLog::route('/{record}'),
            'edit-by-student' => CreateByStudent::route('/{record}/edit/by-student'),
            'edit-by-conduct' => CreateByConduct::route('/{record}/edit/by-conduct'),
        ];
    }
}