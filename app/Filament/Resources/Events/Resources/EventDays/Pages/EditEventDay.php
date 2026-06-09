<?php

namespace App\Filament\Resources\Events\Resources\EventDays\Pages;

use App\Filament\Resources\Events\Resources\EventDays\EventDayResource;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;
use Filament\Support\Icons\Heroicon;

class EditEventDay extends EditRecord
{
    protected static string $resource = EventDayResource::class;

    public function hasCombinedRelationManagerTabsWithContent(): bool
    {
        return true;
    }

    public function getContentTabIcon(): string|BackedEnum|Htmlable|null
    {
        return Heroicon::OutlinedPencil;
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
