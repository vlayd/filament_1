<?php

namespace App\Filament\Resources\Events\Resources\EventDays\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EventDayForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(null)
            ->components([
                Section::make(__('Event Day Details'))
                ->schema([
                    FileUpload::make('image')
                        ->disk('public')
                        ->image()
                        ->label(__('Image')),
                    DatePicker::make('date')
                        ->required()
                        ->label(__('Date')),
                    Textarea::make('description')
                        ->columnSpanFull()
                        ->label(__('Description')),
                ]),
            ]);
    }
}
