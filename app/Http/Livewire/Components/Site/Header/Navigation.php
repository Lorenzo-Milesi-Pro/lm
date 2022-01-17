<?php

namespace App\Http\Livewire\Components\Site\Header;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Navigation extends Component
{
    public function render(): View
    {
        return view('livewire.components.site.header.navigation');
    }

    public function openMenu(): void
    {
        $this->emit('openMenu');
    }
}
