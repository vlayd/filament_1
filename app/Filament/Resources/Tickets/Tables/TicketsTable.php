<?php

namespace App\Filament\Resources\Tickets\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

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
                    ->badge()
                    ->sortable()
                    ->label(__('Stock')),
                TextColumn::make('sort')
                    ->numeric()
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
                Filter::make('price')
                    ->schema([
                        TextInput::make('min')
                            ->prefix('R$')
                            ->numeric(),
                        TextInput::make('max')
                            ->prefix('R$')
                            ->numeric(),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['min'],
                                fn(Builder $query, $price): Builder => $query
                                    ->where('price', '>=', round(floatval($price) * 100)),
                            )
                            ->when(
                                $data['max'],
                                fn(Builder $query, $price): Builder => $query
                                    ->where('price', '<=', round(floatval($price) * 100)),
                            );
                    })
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
