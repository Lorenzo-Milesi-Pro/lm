<?php

namespace App\Http\Livewire\Components\Dashboard\Blog;

use App\Models\Blog\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class PostIndex extends Component
{
    public Collection $posts;

    protected $listeners = ['postCreated'];

    public function mount()
    {
        $this->fetch();
    }

    public function render(): View
    {
        return view('livewire.components.dashboard.blog.post-index');
    }

    public function postCreated()
    {
        $this->fetch();
    }

    private function fetch()
    {
        $this->posts = Post::orderBy('updated_at', 'DESC')->get();
    }
}
