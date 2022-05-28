<?php

namespace App\Http\Livewire\Components\Dashboard\Blog;

use App\Http\Livewire\Behaviours\WithModalBehaviour;
use App\Models\Blog\Domain;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Str;

class DomainForm extends Component
{
    use WithModalBehaviour;

    public string $name = '';

    protected $listeners = ['open', 'close'];

    protected $rules = [
        'name' => 'required|string|min:3|max:255|unique:blog_domains'
    ];

    public function render(): View
    {
        return view('livewire.components.dashboard.blog.domain-form');
    }

    public function store(): void
    {
        $this->validate();
        $domain = new Domain();
        $domain->name = $this->name;
        $domain->slug = Str::slug($this->name);
        $domain->save();
        $this->emit('domainCreated');
        $this->close();
    }
}
