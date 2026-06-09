<?php

namespace App\Filament\Resources\Events\Resources\EventDays\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EventDaysTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->disk('public')
                    ->label(__('Image')),
                TextColumn::make('date')
                    ->date()
                    ->sortable()
                    ->label(__('Date')),
                TextColumn::make('created_at')
                    ->label(__('Created at')),
                TextColumn::make('updated_at')
                    ->label(__('Updated at')),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make()
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
