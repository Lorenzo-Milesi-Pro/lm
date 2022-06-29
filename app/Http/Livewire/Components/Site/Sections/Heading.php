<?php

namespace App\Http\Livewire\Components\Site\Sections;

use Livewire\Component;

class Heading extends Component
{
    public ?string $section;

    public ?string $title;

    public ?string $description;

    public function render()
    {
        return view('livewire.components.site.sections.heading');
    }
}
