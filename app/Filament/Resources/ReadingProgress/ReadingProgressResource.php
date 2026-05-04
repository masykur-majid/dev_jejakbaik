<?php

namespace App\Filament\Resources\ReadingProgress;

use App\Filament\Resources\ReadingProgress\Pages\CreateReadingProgress;
use App\Filament\Resources\ReadingProgress\Pages\EditReadingProgress;
use App\Filament\Resources\ReadingProgress\Pages\ListReadingProgress;
use App\Filament\Resources\ReadingProgress\Pages\ViewReadingProgress;
use App\Filament\Resources\ReadingProgress\RelationManagers\ReadingLogsRelationManager;
use App\Filament\Resources\ReadingProgress\Schemas\ReadingProgressForm;
use App\Filament\Resources\ReadingProgress\Schemas\ReadingProgressInfolist;
use App\Filament\Resources\ReadingProgress\Tables\ReadingProgressTable;
use App\Models\ReadingProgress;
use App\Models\Student;
use Auth;
use BackedEnum;
use Daljo25\FilamentTablerIcons\Enums\TablerIcon;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;

class ReadingProgressResource extends Resource
{
    protected static ?string $model = ReadingProgress::class;

    protected static string|BackedEnum|null $navigationIcon = TablerIcon::Timeline;

    protected static string|UnitEnum|null $navigationGroup = 'Morning Literacy';

    protected static ?string $navigationLabel = 'Reading Progress';

    public static function form(Schema $schema): Schema
    {
        return ReadingProgressForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ReadingProgressInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReadingProgressTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            ReadingLogsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListReadingProgress::route('/'),
            //'create' => CreateReadingProgress::route('/create'),
            'view' => ViewReadingProgress::route('/{record}'),
            //'edit' => EditReadingProgress::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        
        $user = auth()->user();
        
        return parent::getEloquentQuery()
                ->when($user->hasRole('siswa'), fn ($query) => $query->whereRelation('student', 'user_id', $user->id));
    }
}
