<?php

namespace App\Filament\Resources\Tickets\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TicketForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(null)
            ->components([
                Flex::make([
                    Section::make(__('Ticket Details'))
                        ->schema([
                            Select::make('event_id')
                                ->relationship('event', 'name')
                                ->required()
                                ->label(__('Event id')),
                            TextInput::make('name')
                                ->required()
                                ->label(__('Name')),
                            Textarea::make('description')
                                ->columnSpanFull()
                                ->label(__('Description')),
                            Repeater::make('benefits')
                                ->simple(TextInput::make('benefit'))
                                ->columnSpanFull()
                                ->label(__('Benefits')),
                        ]),
                    Section::make(__('Pricing & availability'))
                        ->schema([
                            TextInput::make('price')
                                ->required()
                                ->numeric()
                                ->prefix('R$')
                                ->label(__('Price')),
                            TextInput::make('stock')
                                ->required()
                                ->numeric()
                                ->label(__('Stock')),
                            TextInput::make('sort')
                                ->required()
                                ->numeric()
                                ->default(0)
                                ->label(__('Sort')),
                            Toggle::make('vip')
                                ->label(__('Vip')),
                            Toggle::make('active')
                                ->label(__('Active')),
                        ])
                        ->extraAttributes([
                            'style' => 'min-width: 320px;'
                        ])
                        ->grow(false),
                ])
            ]);
    }
}
