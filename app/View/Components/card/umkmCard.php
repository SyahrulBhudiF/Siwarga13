<?php

namespace App\View\Components\card;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class umkmCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $umkm;

    public function __construct($umkm)
    {
        $this->umkm = $umkm;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.umkm-card');
    }
}
