<?php

namespace App\Http\Livewire\Components\Dashboard\Blog;

use App\Models\Blog\Domain;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class DomainIndex extends Component
{
    public Collection $domains;

    protected $listeners = ['domainCreated'];

    public function mount()
    {
        $this->fetch();
    }

    public function render(): View
    {
        return view('livewire.components.dashboard.blog.domain-index');
    }

    public function domainCreated()
    {
        $this->fetch();
    }

    protected function fetch(): void
    {
        $this->domains = Domain::orderBy('name')->get();
    }
}
