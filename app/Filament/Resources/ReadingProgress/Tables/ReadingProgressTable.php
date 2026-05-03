<?php

namespace App\Filament\Resources\ReadingProgress\Tables;

use Auth;
use Daljo25\FilamentTablerIcons\Enums\TablerIcon;
use Faker\Core\Color;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReadingProgressTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student.student_name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('book.title')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'reading' => 'primary',
                        'finished' => 'success',
                        'dropped' => 'gray',
                    }),
                TextColumn::make('current_page')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('started_at')
                    ->date()
                    ->sortable(),
                TextColumn::make('finished_at')
                    ->date()
                    ->placeholder('-')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('updated_at', 'desc')
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make()
                    ->label(
                        function(){
                            if(Auth::user()->hasRole('siswa')){
                                return 'Reading Log';
                            }
                        }
                    )
                    ->icon(
                        function(){
                            if(Auth::user()->hasRole('siswa')){
                                return TablerIcon::EditCircle;
                            }
                        }
                    )
                    ->color('success'),
                EditAction::make()
                    ->slideOver()
                    ->modalWidth('md'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
