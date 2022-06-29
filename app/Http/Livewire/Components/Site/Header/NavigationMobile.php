<?php

namespace App\Http\Livewire\Components\Site\Header;

use Livewire\Component;

class NavigationMobile extends Component
{
    const IN = 'slideInDown';

    const OUT = 'slideOutUp';

    protected $listeners = ['openMenu'];

    public string $animation = self::OUT;

    public bool $hidden = true;

    public function render()
    {
        return view('livewire.components.site.header.navigation-mobile');
    }

    public function closeMenu()
    {
        $this->animation = self::OUT;
        $this->hidden = true;
    }

    public function openMenu()
    {
        $this->hidden = false;
        $this->animation = self::IN;
    }
}
