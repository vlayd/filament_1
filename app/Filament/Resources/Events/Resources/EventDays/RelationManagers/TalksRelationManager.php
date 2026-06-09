<?php

namespace App\Filament\Resources\Events\Resources\EventDays\RelationManagers;

use App\Models\Talk;
use Filament\Actions\ActionGroup;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class TalksRelationManager extends RelationManager
{
    protected static string $relationship = 'talks';

    public static function getTabComponent(Model $ownerRecord, string $pageClass): Tab
    {
        return parent::getTabComponent($ownerRecord, $pageClass)
            ->label(__('Talks'))
            ->icon(Heroicon::OutlinedPresentationChartLine);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(null)
            ->components([
                Select::make('speaker_id')
                    ->label(__('Speaker'))
                    ->relationship('speaker', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('title')
                    ->label(__('Title'))
                    ->required(),
                Textarea::make('description')
                    ->label(__('Description'))
                    ->columnSpanFull(),
                TimePicker::make('start_time')
                    ->seconds(false)
                    ->label(__('Start time')),
                TimePicker::make('end_time')
                    ->seconds(false)
                    ->label(__('End time')),
                Toggle::make('confirmed')
                    ->label(__('Confirmed'))
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->heading(__('Talks'))
            ->modelLabel(__('Talk'))
            ->recordTitleAttribute('title')
            ->columns([
                ImageColumn::make('speaker.photo')
                    ->label(__('Speaker Photo'))
                    ->disk('public')
                    ->circular(),
                TextColumn::make('speaker.name')
                    ->label(__('Speaker Name'))
                    ->searchable(),
                TextColumn::make('title')
                    ->label(__('Title'))
                    ->searchable(),
                TextColumn::make('start_end_time')
                    ->state(fn(Talk $record): string => $record->start_time . '|' . $record->end_time)
                    ->label(__('Time')),
                ToggleColumn::make('confirmed')
                    ->label(__('Confirmed')),
                TextColumn::make('created_at')
                    ->label(__('Created at')),
                TextColumn::make('updated_at')
                    ->label(__('Updated at')),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()
                ->slideOver()
                ->modalWidth(Width::Medium),
                AssociateAction::make(),
            ])
            ->recordActions([
                ActionGroup::make([
                    EditAction::make()
                    ->slideOver()
                    ->modalWidth(Width::Medium),
                    DissociateAction::make(),
                    DeleteAction::make(),
                ])

            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
