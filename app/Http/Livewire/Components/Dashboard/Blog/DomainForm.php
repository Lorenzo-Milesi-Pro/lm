<?php

namespace App\Http\Livewire\Components\Dashboard\Blog;

use App\Http\Livewire\Behaviours\WithModalBehaviour;
use App\Models\Blog\Domain;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class DomainForm extends Component
{
    use WithModalBehaviour;

    public Domain $domain;

    protected $listeners = ['open', 'close'];

    protected $rules = [
        'domain.name' => 'required|unique:blog_domains'
    ];

    public function render(): View
    {
        return view('livewire.components.dashboard.blog.domain-form');
    }

    public function store(): void
    {
        $this->validate();
        $this->domain->save();
        $this->emit('domainCreated');
        $this->close();
    }
}
