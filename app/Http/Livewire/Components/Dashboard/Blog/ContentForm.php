<?php

namespace App\Http\Livewire\Components\Dashboard\Blog;

use App\Http\Livewire\Behaviours\WithModalBehaviour;
use App\Models\Blog\Post;
use App\Models\Content;
use Livewire\Component;
use JetBrains\PhpStorm\ArrayShape;

class ContentForm extends Component
{
    use WithModalBehaviour;

    public Post $parent;
    public ?Content $content = null;
    public string $type = 'classic';
    public ?string $body = null;
    public bool $publish = false;
    public bool $write = true;

    protected $listeners = [
        'open', 'close', 'newClassic',
    ];

    public function render()
    {
        return view('livewire.components.dashboard.blog.content-form');
    }

    public function store(): void
    {
        $this->validate($this->validationRules());

        $this->content->type = $this->type;
        $this->content->content = $this->body;
        $this->content->published_at = $this->publish ? now() : null;
        $this->content->blog_post_id = $this->parent->id;
        $this->content->save();
        $this->content->refresh();

        $this->emit('contentStored');
    }

    public function storeAndClose(): void
    {
        $this->store();
        $this->close();
    }

    protected function initialize(): void
    {
        $this->type = $this->content->type ?? 'classic';
        $this->body = $this->content->content ?? '';
        $this->publish = !is_null($this->content->published_at);
        $this->show = true;
    }

    public function open(int $post, ?int $content = null)
    {
        $this->parent = Post::findOrFail($post);
        $this->content = $content ? Content::find($content) : new Content();
        $this->initialize();
    }

    #[ArrayShape([
        'body'    => "string",
        'publish' => "string",
    ])] private function validationRules(): array
    {
        return [
            'type'    => 'nullable|string|max:255',
            'body'    => 'nullable',
            'publish' => 'nullable',
        ];
    }
}
