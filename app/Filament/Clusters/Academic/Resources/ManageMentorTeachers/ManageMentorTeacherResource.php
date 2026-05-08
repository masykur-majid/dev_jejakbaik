<?php

namespace App\Filament\Clusters\Academic\Resources\ManageMentorTeachers;

use App\Filament\Clusters\Academic\AcademicCluster;
use App\Filament\Clusters\Academic\Resources\ManageMentorTeachers\Pages\CreateManageMentorTeacher;
use App\Filament\Clusters\Academic\Resources\ManageMentorTeachers\Pages\EditManageMentorTeacher;
use App\Filament\Clusters\Academic\Resources\ManageMentorTeachers\Pages\ListManageMentorTeachers;
use App\Filament\Clusters\Academic\Resources\ManageMentorTeachers\Pages\ViewManageMentorTeacher;
use App\Filament\Clusters\Academic\Resources\ManageMentorTeachers\RelationManagers\StudentsRelationManager;
use App\Filament\Clusters\Academic\Resources\ManageMentorTeachers\Schemas\ManageMentorTeacherForm;
use App\Filament\Clusters\Academic\Resources\ManageMentorTeachers\Schemas\ManageMentorTeacherInfolist;
use App\Filament\Clusters\Academic\Resources\ManageMentorTeachers\Tables\ManageMentorTeachersTable;
use App\Models\Teacher;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ManageMentorTeacherResource extends Resource
{
    protected static ?string $model = Teacher::class;

    public static function canAccess(): bool{
        return auth()->user()->hasRole('super_admin');
    }

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string| UnitEnum |null $navigationGroup = 'Akademik';

//    protected static ?string $cluster = AcademicCluster::class;
    
    protected static ?string $navigationLabel = 'Guru Wali';


    public static function form(Schema $schema): Schema
    {
        return ManageMentorTeacherForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ManageMentorTeacherInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ManageMentorTeachersTable::configure($table);
    }

    public static function getRelations(): array
    {
        
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListManageMentorTeachers::route('/'),
            //'create' => CreateManageMentorTeacher::route('/create'),
            'view' => ViewManageMentorTeacher::route('/{record}'),
            //'edit' => EditManageMentorTeacher::route('/{record}/edit'),
        ];
    }
}
