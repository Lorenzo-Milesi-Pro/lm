<?php

namespace App\Http\Livewire\Components\Dashboard\Blog;

use App\Models\Blog\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class PostIndex extends Component
{
    public Collection $posts;

    public function mount()
    {
        $this->posts = Post::all();
    }

    public function render(): View
    {
        return view('livewire.components.dashboard.blog.post-index');
    }
}
