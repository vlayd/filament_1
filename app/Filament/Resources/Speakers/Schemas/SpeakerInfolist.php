<?php

namespace App\Filament\Resources\Speakers\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SpeakerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label(__('Name')),
                TextEntry::make('bio')
                    ->placeholder('-')
                    ->columnSpanFull()
                    ->label(__('Bio')),
                TextEntry::make('photo')
                    ->placeholder('-')
                    ->label(__('Photo')),
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
