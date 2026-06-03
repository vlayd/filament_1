<?php

namespace App\Enums;

use BackedEnum;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

enum OrderStatus: string implements HasColor, HasIcon, HasLabel
{
    case Pending = 'pending';
    case Received = 'received';
    case Cancelled = 'cancelled';
    case Confirmed = 'confirmed';
    case Overdue = 'overdue';
    case Refunded = 'refunded';

    public function getLabel(): string|Htmlable|null
    {
        return match ($this) {
            self::Pending => __('Pending'),
            self::Received => __('Received'),
            self::Cancelled => __('Cancelled'),
            self::Confirmed => __('Confirmed'),
            self::Overdue => __('Overdue'),
            self::Refunded => __('Refunded'),
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Pending => 'warning',
            self::Received => 'success',
            self::Cancelled => 'danger',
            self::Confirmed => 'info',
            self::Overdue => 'danger',
            self::Refunded => 'success',
        };
    }

    public function getIcon(): string|BackedEnum|Htmlable|null
    {
        return match ($this) {
            self::Pending => Heroicon::OutlinedClock,
            self::Received => Heroicon::OutlinedCheckCircle,
            self::Cancelled => Heroicon::OutlinedXCircle,
            self::Confirmed => Heroicon::OutlinedCheck,
            self::Overdue => Heroicon::OutlinedExclamationCircle,
            self::Refunded => Heroicon::OutlinedArrowUturnLeft,
        };
    }
}
