<?php

namespace App\View\Composers;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ThemeComposer
{
    public function __construct()
    {
        
    }

    public function compose(View $view)
    {
        $ip = request()->ip();
        $theme = Cache::get("theme:{$ip}") ?? 'light';
        $view->with('theme', $theme);
    }
}
