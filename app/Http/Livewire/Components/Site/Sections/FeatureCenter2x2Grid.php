<?php

namespace App\Http\Livewire\Components\Site\Sections;

use Livewire\Component;

class FeatureCenter2x2Grid extends Component
{
    public ?string $section;

    public ?string $title;

    public ?string $description;

    public function render()
    {
        return view('livewire.components.site.sections.feature-center2x2-grid');
    }
}
