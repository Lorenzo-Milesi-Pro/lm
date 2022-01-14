<?php

namespace App\Http\Livewire\Components\Site\Sections;

use App\Models\Blog\Post;
use Livewire\Component;

class Posts extends Component
{
    public function render()
    {
        return view('livewire.components.site.sections.posts', [
            'posts' => Post::orderBy('updated_at', 'DESC')->take(3)->get()
        ]);
    }
}
