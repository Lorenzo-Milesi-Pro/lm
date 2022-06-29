<?php

namespace App\View\Components\Icons;

use Illuminate\View\Component;

abstract class HeroIcon extends Component
{
    public function __construct(
        public int $thickness = 2,
    ) {
    }
}
