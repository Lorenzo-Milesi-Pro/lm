<?php

namespace App\View\Components\Icons;

use Illuminate\Contracts\View\View;

class Newspaper extends HeroIcon
{
    public function render(): View
    {
        return view('components.icons.newspaper');
    }
}
