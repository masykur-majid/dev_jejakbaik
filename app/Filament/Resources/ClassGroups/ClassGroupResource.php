<?php

namespace App\Filament\Resources\ClassGroups;

use App\Filament\Clusters\Academic\AcademicCluster;
use App\Filament\Resources\ClassGroups\Pages\CreateClassGroup;
use App\Filament\Resources\ClassGroups\Pages\EditClassGroup;
use App\Filament\Resources\ClassGroups\Pages\ListClassGroups;
use App\Filament\Resources\ClassGroups\Pages\ViewClassGroup;
use App\Filament\Resources\ClassGroups\RelationManagers\StudentsRelationManager;
use App\Filament\Resources\ClassGroups\Schemas\ClassGroupForm;
use App\Filament\Resources\ClassGroups\Schemas\ClassGroupInfolist;
use App\Filament\Resources\ClassGroups\Tables\ClassGroupsTable;
use App\Models\ClassGroup;
use BackedEnum;
use Daljo25\FilamentTablerIcons\Enums\TablerIcon;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ClassGroupResource extends Resource
{
    protected static ?string $model = ClassGroup::class;

    protected static string|BackedEnum|null $navigationIcon = TablerIcon::ChalkboardTeacher;

    protected static ?string $navigationLabel = 'Class';

    protected static string| UnitEnum |null $navigationGroup = 'Akademik';
    
    // protected static ?string $cluster = AcademicCluster::class;
    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Schema $schema): Schema
    {
        return ClassGroupForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ClassGroupInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ClassGroupsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            StudentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListClassGroups::route('/'),
            //'create' => CreateClassGroup::route('/create'),
            'view' => ViewClassGroup::route('/{record}'),
            //'edit' => EditClassGroup::route('/{record}/edit'),
            'manage' => Pages\ManageClassMembers::route('/{record}/manage'),
        ];
    }

    public static function getPermissions(): array
    {
        return [
            'manageMembers', // Izin kustom kita
        ];
    }
}
