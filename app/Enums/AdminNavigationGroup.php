<?php

namespace App\Enums;

use BackedEnum;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

enum AdminNavigationGroup implements HasIcon, HasLabel
{
    case EventManagement;
    case Sales;
    case System;

    public function getLabel(): string|Htmlable|null
    {
        return match ($this) {
            self::EventManagement => __('Event Management'),
            self::Sales => __('Sales'),
            self::System => __('System'),
        };
    }

    public function getIcon(): string|BackedEnum|Htmlable|null
    {
        return match ($this) {
            self::EventManagement => Heroicon::OutlinedCalendar,
            self::Sales => Heroicon::OutlinedShoppingCart,
            self::System => Heroicon::OutlinedCog,
        };
    }
}
