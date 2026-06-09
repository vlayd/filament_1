<?php

namespace App\Filament\Resources\Speakers\Schemas;

use App\Models\Talk;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\TextSize;
use Filament\Support\Icons\Heroicon;

class SpeakerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(null)
            ->components([
                Section::make(__('Speaker Details'))
                    ->columns(4)
                    ->icon(Heroicon::OutlinedUser)
                    ->schema([
                        ImageEntry::make('photo')
                            ->extraImgAttributes(['class' => 'rounded-xl'])
                            ->hiddenLabel()
                            ->imageWidth(250)
                            ->imageHeight(250)
                            ->disk('public'),
                        Group::make([
                            TextEntry::make('name')
                                ->color('primary')
                                ->hiddenLabel()
                                ->size(TextSize::Large),
                            TextEntry::make('bio')
                                ->hiddenLabel()
                                ->html(),
                            RepeatableEntry::make('social_links')
                                ->label(__('Social links'))
                                ->grid(2)
                                ->schema([
                                    TextEntry::make('type')
                                        ->formatStateUsing(fn(?string $state): string => ucfirst($state))
                                        ->hiddenLabel(),
                                    TextEntry::make('link')
                                        ->color('primary')
                                        ->url(fn(?string $state): string => $state, shouldOpenInNewTab: true)
                                        ->hiddenLabel(),
                                ])
                        ])
                            ->columnSpan(3),
                    ]),
                Section::make(__('Talks'))
                    ->icon(Heroicon::OutlinedPresentationChartLine)
                    ->schema([
                        RepeatableEntry::make('talks')
                            ->columns(7)
                            ->hiddenLabel()
                            ->schema([
                                TextEntry::make('eventDay.event.name')
                                    ->label(__('Event')),
                                TextEntry::make('eventDay.date')
                                    ->formatStateUsing(fn(Talk $record): string => $record->eventDay->date->format('d/m/Y'))
                                    ->label(__('Date')),
                                TextEntry::make('title')
                                    ->columnSpan(2)
                                    ->label(__('Talk')),
                                TextEntry::make('start_time')
                                    ->label(__('Start time')),
                                TextEntry::make('end_time')
                                    ->label(__('End time')),
                                IconEntry::make('confirmed')
                                    ->label(__('Confirmed'))
                            ])
                    ])
            ]);
    }
}
