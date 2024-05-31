<?php

namespace App\View\Components\card;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cardNav extends Component
{
    /**
     * Create a new component instance.
     */
    public $asset, $title, $href;

    public function __construct($title, $asset, $href)
    {
        $this->asset = $asset;
        $this->title = $title;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.card-nav');
    }
}
