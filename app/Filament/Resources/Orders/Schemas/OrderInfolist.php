<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class OrderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user.name')
                    ->label(__('User')),
                TextEntry::make('order_number')
                    ->label(__('Order number')),
                TextEntry::make('total_amount')
                    ->numeric()
                    ->label(__('Total amount')),
                TextEntry::make('payment_method')
                    ->label(__('Payment method')),
                TextEntry::make('payment_status')
                    ->label(__('Payment status')),
                TextEntry::make('payment_id')
                    ->placeholder('-')
                    ->label(__('Payment id')),
                ImageEntry::make('payment_qr_code_image')
                    ->placeholder('-')
                    ->columnSpanFull()
                    ->label(__('Payment qr code image')),
                TextEntry::make('payment_qr_code_payload')
                    ->placeholder('-')
                    ->columnSpanFull()
                    ->label(__('Payment qr code payload')),
                TextEntry::make('payment_qr_code_expiration_date')
                    ->dateTime()
                    ->placeholder('-')
                    ->label(__('Payment qr code expiration date')),
                TextEntry::make('paid_at')
                    ->dateTime()
                    ->placeholder('-')
                    ->label(__('Paid at')),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-')
                    ->label(__('Created at')),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-')
                    ->label(__('Updated at')),
            ]);
    }
}
