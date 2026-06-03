<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum OrderPaymentMethod: string implements HasLabel
{
    case Pix = 'pix';

    public function getLabel(): string|Htmlable|null
    {
        return match ($this) {
            self::Pix => __('Pix'),
        };
    }
}
