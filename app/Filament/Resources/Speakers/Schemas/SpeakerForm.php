<?php

namespace App\Filament\Resources\Speakers\Schemas;

use App\Enums\SocialLinkType;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Repeater\TableColumn;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class SpeakerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(null)
            ->components([
                Section::make(__('Speaker Details'))
                    ->schema([
                        FileUpload::make('photo')
                            ->avatar()
                            ->disk('public')
                            ->label(__('Photo')),
                        Group::make([
                            TextInput::make('name')
                                ->required()
                                ->label(__('Name')),
                            RichEditor::make('bio')
                                ->columnSpanFull()
                                ->label(__('Bio')),
                            Repeater::make('social_links')
                            ->reorderable(false)
                            ->table([
                                TableColumn::make(__('Type')),
                                TableColumn::make(__('Link')),
                            ])
                            ->schema([
                                Select::make('type')
                                    ->required()
                                    ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                    ->options(SocialLinkType::class),
                                TextInput::make('link')
                                    ->required()
                                    ->url(),
                            ])
                            ->columnSpanFull()
                            ->label(__('Social links')),
                        ])->columnSpan(5),
                    ])->columns(6),
            ]);
    }
}
