<?php

namespace App\Http\Livewire\Components\Site\Sections;

use App\Models\Blog\Post;
use App\Pipes\Post\Active;
use App\Pipes\Post\ExceptToolbox;
use App\Pipes\Post\MostRecent;
use Illuminate\Pipeline\Pipeline;
use Livewire\Component;

class Posts extends Component
{
    public function render()
    {
        $posts = app(Pipeline::class)
            ->send(Post::query())
            ->through([
                ExceptToolbox::class,
                Active::class,
                MostRecent::class,
            ])
            ->thenReturn()
            ->take(3)
            ->get();

        return view('livewire.components.site.sections.posts', compact('posts'));
    }
}
