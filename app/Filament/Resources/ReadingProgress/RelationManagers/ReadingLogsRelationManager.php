<?php
namespace App\Filament\Resources\ReadingProgress\RelationManagers;

use App\Filament\Resources\ReadingLogs\ReadingLogResource;
use Auth;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReadingLogsRelationManager extends RelationManager
{
    protected static string $relationship = 'readingLogs';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Schema $form): Schema
    {
        return ReadingLogResource::form($form);
    }

    protected static ?string $relatedResource = ReadingLogResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->heading('Reading Logs')
            ->description('Klik tombbol (+ New Reading Log) untuk menambahkan catatan aktivitas membaca kalian')
            ->columns([
                TextColumn::make('readingProgress.id')
                    ->searchable()
                    ->hidden(),
                TextColumn::make('date_read')
                    ->date(),
                TextColumn::make('start_page')
                    ->numeric()
                    ->extraHeaderAttributes(['class' => 'whitespace-normal']),
                TextColumn::make('total_page_read')
                    ->numeric()
                    ->extraHeaderAttributes(['class' => 'whitespace-normal']),
                TextColumn::make('end_page')
                    ->numeric()
                    ->extraHeaderAttributes(['class' => 'whitespace-normal']),
                IconColumn::make('verified')
                    ->boolean()
                    ->falseIcon(Heroicon::XCircle)
                    ->falseColor('danger')
                    ->trueIcon(Heroicon::CheckBadge)
                    ->trueColor('success'),
                TextColumn::make('summary')
                    ->numeric()
                    ->wrap()
                    ->words(10)
                    ->lineClamp(2),
                TextColumn::make('teacher_note')
                    ->numeric()
                    ->wrap()
                    ->width('20%')
                    ->lineClamp(2),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('date_read', 'desc')
            ->filters([
                //
            ])
            ->recordActions([
                //ViewAction::make(),
                EditAction::make()
                    ->label(function (){
                        if(Auth::user()->hasRole('siswa')){
                            return 'Revise';
                        }
                        return 'Review & Verify';
                    })
                    ->slideOver()
                    ->after(fn ($livewire) => $livewire->dispatch('refreshReadingProgress')),

            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                CreateAction::make()
                    ->slideOver()
                    ->after(fn ($livewire) => $livewire->dispatch('refreshReadingProgress'))
            ]);
    }

    
}