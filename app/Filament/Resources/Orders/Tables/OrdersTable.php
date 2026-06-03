<?php

namespace App\Filament\Resources\Orders\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->searchable()
                    ->label(__('User')),
                TextColumn::make('order_number')
                    ->searchable()
                    ->label(__('Order number')),
                TextColumn::make('total_amount')
                    ->numeric()
                    ->sortable()
                    ->label(__('Total amount')),
                TextColumn::make('payment_status')
                    ->searchable()
                    ->label(__('Payment status')),
                TextColumn::make('paid_at')
                    ->dateTime()
                    ->sortable()
                    ->label(__('Paid at')),
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
