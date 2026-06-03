<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum SocialLinkType: string implements HasLabel
{
    case Twitter = 'twitter';
    case Github = 'github';

    public function getLabel(): string|Htmlable|null
    {
        return __($this->name);
    }
}
