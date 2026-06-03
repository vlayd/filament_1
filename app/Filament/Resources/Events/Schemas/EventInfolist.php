<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class EventInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label(__('Name')),
                TextEntry::make('title')
                    ->label(__('Title')),
                TextEntry::make('slug')
                    ->label(__('Slug')),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull()
                    ->label(__('Description')),
                ImageEntry::make('background_image')
                    ->placeholder('-')
                    ->label(__('Background image')),
                TextEntry::make('location')
                    ->placeholder('-')
                    ->label(__('Location')),
                TextEntry::make('status')
                    ->label(__('Status')),
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
