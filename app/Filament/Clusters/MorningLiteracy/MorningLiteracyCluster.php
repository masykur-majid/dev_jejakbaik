<?php

namespace App\Filament\Clusters\MorningLiteracy;

use BackedEnum;
use Filament\Clusters\Cluster;
use Filament\Pages\Enums\SubNavigationPosition;
use Filament\Support\Icons\Heroicon;
use Daljo25\FilamentTablerIcons\Enums\TablerIcon;


class MorningLiteracyCluster extends Cluster
{
    protected static string|BackedEnum|null $navigationIcon = TablerIcon::Books;
    protected static ?string $navigationLabel = "Morning Literacy";
    protected static ?SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

}
