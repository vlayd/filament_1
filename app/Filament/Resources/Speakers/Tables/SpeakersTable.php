<?php

namespace App\Filament\Resources\Speakers\Tables;

use App\Models\EventDay;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class SpeakersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('photo')
                    ->disk('public')
                    ->circular()
                    ->label(__('Photo')),

                TextColumn::make('name')
                    ->label(__('Name')),

                TextColumn::make('bio')
                    ->searchable()
                    ->label(__('Bio'))
                    ->limit(50),

                TextColumn::make('created_at')
                    ->label(__('Created at')),

                TextColumn::make('updated_at')
                    ->label(__('Updated at')),

            ])
            ->filters([
                SelectFilter::make('eventDays')
                    ->label(__('Event days'))
                    ->relationship('talks.eventDay', 'date')
                    ->preload()
                    ->searchable()
                    ->multiple()
                    ->getOptionLabelFromRecordUsing(fn(EventDay $record) => $record->date->format('d/m/y'))
                    ->indicateUsing(function (array $data) {

                        $values = data_get($data, 'values', []);

                        return EventDay::whereIn('id', $values)
                            ->pluck('date')
                            ->map(fn($date) => $date->format('d/m/y'))
                            ->toArray();

                    }),
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
