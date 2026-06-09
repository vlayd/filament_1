<?php

namespace App\Filament\Resources\Events\Resources\EventDays;

use App\Filament\Resources\Events\EventResource;
use App\Filament\Resources\Events\Resources\EventDays\Pages\CreateEventDay;
use App\Filament\Resources\Events\Resources\EventDays\Pages\EditEventDay;
use App\Filament\Resources\Events\Resources\EventDays\RelationManagers\TalksRelationManager;
use App\Filament\Resources\Events\Resources\EventDays\Schemas\EventDayForm;
use App\Filament\Resources\Events\Resources\EventDays\Tables\EventDaysTable;
use App\Models\EventDay;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Support\Htmlable;
use Override;

class EventDayResource extends Resource
{
    protected static ?string $model = EventDay::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $parentResource = EventResource::class;

    protected static ?string $recordTitleAttribute = 'date';

    public static function getModelLabel(): string
    {
        return __('Event Day');
    }

    public static function getRecordTitle(?Model $record): string|Htmlable|null
    {
        return $record->date->format('d/m/y');
    }

    public static function form(Schema $schema): Schema
    {
        return EventDayForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EventDaysTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            TalksRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'create' => CreateEventDay::route('/create'),
            'edit' => EditEventDay::route('/{record}/edit'),
        ];
    }
}
