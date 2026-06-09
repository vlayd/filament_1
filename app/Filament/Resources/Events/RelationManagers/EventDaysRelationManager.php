<?php

namespace App\Filament\Resources\Events\RelationManagers;

use App\Filament\Resources\Events\Resources\EventDays\EventDayResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class EventDaysRelationManager extends RelationManager
{
    protected static string $relationship = 'eventDays';

    protected static ?string $relatedResource = EventDayResource::class;

    public static function getTabComponent(Model $ownerRecord, string $pageClass): Tab
    {
        return parent::getTabComponent($ownerRecord, $pageClass)
            ->label(__('Event Days'))
            ->icon(Heroicon::OutlinedCalendar);
    }

    public function table(Table $table): Table
    {
        return $table
            ->heading(__('Event Days'))
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
