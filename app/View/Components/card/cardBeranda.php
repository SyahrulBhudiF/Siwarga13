<?php

namespace App\View\Components\card;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cardBeranda extends Component
{
    /**
     * Create a new component instance.
     */
    public $asset, $title;

    public function __construct($asset, $title)
    {
        $this->asset = $asset;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.card-beranda');
    }
}
