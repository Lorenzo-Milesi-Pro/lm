<?php

namespace App\Http\Livewire\Components\Dashboard\Blog;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class DomainManager extends Component
{
    public function render(): View
    {
        return view('livewire.components.dashboard.blog.domain-manager');
    }

    public function create()
    {
        $this->emitTo(DomainForm::class, 'open');
    }
}
