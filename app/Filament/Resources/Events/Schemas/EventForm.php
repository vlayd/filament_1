<?php

namespace App\Filament\Resources\Events\Schemas;

use App\Enums\EventStatus;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(null)
            ->components([
                Section::make(__('Event Details'))
                    ->schema([
                        FileUpload::make('background_image')
                            ->disk('public')
                            ->image()
                            ->label(__('Background image')),

                        Group::make([
                            TextInput::make('name')
                                ->required()
                                ->label(__('Name')),
                            TextInput::make('slug')
                                ->required()
                                ->label(__('Slug')),
                            TextInput::make('title')
                                ->required()
                                ->label(__('Title')),
                        ])->columns(3),

                        Textarea::make('description')
                            ->columnSpanFull()
                            ->label(__('Description')),

                        Group::make([
                            TextInput::make('location')
                                ->label(__('Location')),
                            ToggleButtons::make('status')
                                ->inline()
                                ->options(EventStatus::class)
                                ->required()
                                ->default('active')
                                ->label(__('Status')),
                        ])->columns(2),

                    ]),

            ]);
    }
}
