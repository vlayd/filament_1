<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->label(__('User id')),
                TextInput::make('order_number')
                    ->required()
                    ->label(__('Order number')),
                TextInput::make('total_amount')
                    ->required()
                    ->numeric()
                    ->label(__('Total amount')),
                TextInput::make('payment_method')
                    ->required()
                    ->label(__('Payment method')),
                TextInput::make('payment_status')
                    ->required()
                    ->default('pending')
                    ->label(__('Payment status')),
                TextInput::make('payment_id')
                    ->label(__('Payment id')),
                Textarea::make('payment_qr_code_image')
                    ->columnSpanFull()
                    ->label(__('Payment qr code image')),
                Textarea::make('payment_qr_code_payload')
                    ->columnSpanFull()
                    ->label(__('Payment qr code payload')),
                DateTimePicker::make('payment_qr_code_expiration_date')
                    ->label(__('Payment qr code expiration date')),
                DateTimePicker::make('paid_at')
                    ->label(__('Paid at')),
            ]);
    }
}
