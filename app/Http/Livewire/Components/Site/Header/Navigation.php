<?php

namespace App\Http\Livewire\Components\Site\Header;

use Livewire\Component;

class Navigation extends Component
{
    public function render()
    {
        return view('livewire.components.site.header.navigation');
    }

    public function openMenu()
    {
        $this->emit('openMenu');
    }
}
