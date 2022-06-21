<?php

namespace App\Http\Livewire\Components\Site\Sections;

use App\Models\Blog\Post;
use Livewire\Component;

class Posts extends Component
{
    public function render()
    {
        return view('livewire.components.site.sections.posts', [
            'posts' => Post::whereNotNull('published_at')->orderBy('updated_at', 'DESC')->take(3)->get()
        ]);
    }
}
