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
    public $asset, $title, $id;

    public function __construct($id, $asset, $title)
    {
        $this->asset = $asset;
        $this->title = $title;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.card-beranda');
    }
}
