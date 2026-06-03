<?php

namespace App\Enums;

use BackedEnum;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

enum UserRole: string implements HasLabel, HasColor, HasIcon
{
    case Administrator = 'administrator';
    case Participant = 'participant';

    public function getLabel(): string|Htmlable|null
    {
        return match ($this) {
            self::Administrator => __('Administrator'),
            self::Participant => __('Participant'),
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Administrator => 'primary',
            self::Participant => 'gray',
        };
    }

    public function getIcon(): string|BackedEnum|Htmlable|null
    {
        return match ($this) {
            self::Administrator => Heroicon::ShieldCheck,
            self::Participant => Heroicon::User,
        };
    }
}
