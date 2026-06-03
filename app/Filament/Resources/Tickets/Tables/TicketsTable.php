<?php

namespace App\Filament\Resources\Tickets\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class TicketsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->reorderable('sort')
            ->columns([
                TextColumn::make('event.name')
                    ->searchable()
                    ->label(__('Event')),
                TextColumn::make('name')
                    ->searchable()
                    ->label(__('Name')),
                TextColumn::make('price')
                    ->money('BRL')
                    ->sortable()
                    ->label(__('Price')),
                TextColumn::make('stock')
                    ->numeric()
                    ->alignCenter()
                    ->badge()
                    ->sortable()
                    ->label(__('Stock')),
                TextColumn::make('sort')
                    ->numeric()
                    ->alignCenter()
                    ->badge()
                    ->sortable()
                    ->label(__('Sort')),
                ToggleColumn::make('vip')
                    ->label(__('Vip')),
                ToggleColumn::make('active')
                    ->label(__('Active')),
                TextColumn::make('created_at')
                    ->label(__('Created at')),
                TextColumn::make('updated_at')
                    ->label(__('Updated at')),
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
