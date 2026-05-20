<?php

namespace App\Filament\Clusters\Parapoint\Resources\PointLogs\Tables;

use Daljo25\FilamentTablerIcons\Enums\TablerIcon;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PointLogsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->label('Reported At')
                    ->dateTime()
                    ->sortable()
                    ->since(),
                TextColumn::make('subject_type')
                    ->searchable()
                    ->formatStateUsing(function (string $state) {
                        // 1. Bersihkan string. 
                        // Jika isinya 'App\Models\ConductRule', akan dipotong jadi 'ConductRule'
                        // Jika isinya sudah 'conduct', akan tetap jadi 'conduct'
                        $cleanState = class_basename($state); 

                        // 2. Ubah menjadi huruf kecil semua agar pengecekan match di bawah ini akurat
                        $lowerState = strtolower($cleanState);

                        // 3. Terjemahkan ke bahasa manusia yang rapi
                        return match ($lowerState) {
                            'conductrule', 'conduct' => 'Conduct',
                            'student' => 'Student',
                            default => $state, // Jika tidak cocok, tampilkan apa adanya sesuai DB
                        };
                    })
                    ->badge()
                    ->icon(function (String $state){
                        $cleanstate = strtolower(class_basename($state));
                        return match($cleanstate){
                             'conductrule', 'conduct' => TablerIcon::Gavel,
                            'student' => Heroicon::UserCircle,
                            default => HeroIcon::InformationCircle,
                        };
                    }),
                TextColumn::make('subject_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('teacher.teacher_name')
                    ->searchable(),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
