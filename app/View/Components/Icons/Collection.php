<?php

namespace App\View\Components\Icons;

use Illuminate\Contracts\View\View;

class Collection extends HeroIcon
{
    public function render(): View
    {
        return view('components.icons.collection');
    }
}
