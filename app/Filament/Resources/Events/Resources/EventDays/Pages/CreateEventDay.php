<?php

namespace App\Filament\Resources\Events\Resources\EventDays\Pages;

use App\Filament\Resources\Events\Resources\EventDays\EventDayResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEventDay extends CreateRecord
{
    protected static string $resource = EventDayResource::class;
}
