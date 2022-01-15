<?php

namespace App\Http\Livewire\Behaviours;

trait WithModalBehaviour
{
    public bool $show = false;

    public function open()
    {
        $this->show = true;
    }

    public function close()
    {
        $this->show = false;
    }
}
