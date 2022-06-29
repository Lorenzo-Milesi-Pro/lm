<?php

namespace App\Http\Livewire\Components\Dashboard\Blog;

use App\Models\Blog\Domain;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class DomainQuickForm extends Component
{
    public Domain $domain;

    protected $rules = [
        'domain.name' => 'required|unique:blog_domains,name',
    ];

    public function render(): View
    {
        return view('livewire.components.dashboard.blog.domain-quick-form');
    }

    public function mount()
    {
        $this->domain = new Domain();
    }

    public function store()
    {
        $this->validate();
        $this->domain->save();
        $this->emitUp('domainStoreEvent');
        $this->domain = new Domain();
    }
}
