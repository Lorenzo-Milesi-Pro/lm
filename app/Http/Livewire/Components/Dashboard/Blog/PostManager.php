<?php

namespace App\Http\Livewire\Components\Dashboard\Blog;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class PostManager extends Component
{
    public function render(): View
    {
        return view('livewire.components.dashboard.blog.post-manager');
    }

    public function create()
    {
        $this->emitTo(PostForm::class, 'open');
    }
}
