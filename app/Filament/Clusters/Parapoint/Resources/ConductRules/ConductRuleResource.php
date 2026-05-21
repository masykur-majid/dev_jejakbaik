<?php

namespace App\Filament\Clusters\Parapoint\Resources\ConductRules;

use App\Filament\Clusters\Parapoint\ParapointCluster;
use App\Filament\Clusters\Parapoint\Resources\ConductRules\Pages\CreateConductRule;
use App\Filament\Clusters\Parapoint\Resources\ConductRules\Pages\EditConductRule;
use App\Filament\Clusters\Parapoint\Resources\ConductRules\Pages\ListConductRules;
use App\Filament\Clusters\Parapoint\Resources\ConductRules\Pages\ViewConductRule;
use App\Filament\Clusters\Parapoint\Resources\ConductRules\Schemas\ConductRuleForm;
use App\Filament\Clusters\Parapoint\Resources\ConductRules\Schemas\ConductRuleInfolist;
use App\Filament\Clusters\Parapoint\Resources\ConductRules\Tables\ConductRulesTable;
use App\Models\ConductRule;
use BackedEnum;
use Daljo25\FilamentTablerIcons\Enums\TablerIcon;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ConductRuleResource extends Resource
{
    protected static ?string $model = ConductRule::class;

    protected static string|BackedEnum|null $navigationIcon = TablerIcon::Notebook;

    // protected static ?string $cluster = ParapointCluster::class;

    protected static string|UnitEnum|null $navigationGroup = "ParaPoint";

    public static function form(Schema $schema): Schema
    {
        return ConductRuleForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ConductRuleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ConductRulesTable::configure($table);
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
            'index' => ListConductRules::route('/'),
            'create' => CreateConductRule::route('/create'),
            'view' => ViewConductRule::route('/{record}'),
            'edit' => EditConductRule::route('/{record}/edit'),
        ];
    }
}
