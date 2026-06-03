<?php

namespace App\Filament\Resources\Tickets\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TicketInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('event.name')
                    ->label(__('Event')),
                TextEntry::make('name')
                    ->label(__('Name')),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull()
                    ->label(__('Description')),
                TextEntry::make('price')
                    ->money()
                    ->label(__('Price')),
                TextEntry::make('stock')
                    ->numeric()
                    ->label(__('Stock')),
                TextEntry::make('sort')
                    ->numeric()
                    ->label(__('Sort')),
                IconEntry::make('vip')
                    ->boolean()
                    ->label(__('Vip')),
                IconEntry::make('active')
                    ->boolean()
                    ->label(__('Active')),
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
