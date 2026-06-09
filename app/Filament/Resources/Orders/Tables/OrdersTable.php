<?php

namespace App\Filament\Resources\Orders\Tables;

use App\Enums\OrderPaymentMethod;
use App\Enums\OrderStatus;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\QueryBuilder\Constraints\DateConstraint;
use Filament\QueryBuilder\Constraints\NumberConstraint;
use Filament\QueryBuilder\Constraints\SelectConstraint;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\QueryBuilder;
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
                QueryBuilder::make()
                ->constraints([
                    SelectConstraint::make('payment_status')
                    ->options(OrderStatus::class),
                    SelectConstraint::make('payment_method')
                    ->options(OrderPaymentMethod::class),
                    NumberConstraint::make('total_amount'),
                    DateConstraint::make('created_at')
                ])
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
