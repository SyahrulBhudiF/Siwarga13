<?php

namespace App\View\Components\card;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class dokumentasiCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $dokumentasi;

    public function __construct($dokumentasi)
    {
        $this->dokumentasi = $dokumentasi;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.dokumentasi-card');
    }
}
