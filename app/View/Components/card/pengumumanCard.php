<?php

namespace App\View\Components\card;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class pengumumanCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $pengumuman;

    public function __construct($pengumuman)
    {
        $this->pengumuman = $pengumuman;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.pengumuman-card');
    }
}
