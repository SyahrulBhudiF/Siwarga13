<?php

namespace App\View\Components\etc;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class navBack extends Component
{
    /**
     * Create a new component instance.
     */
    public $head, $href;

    public function __construct($head, $href)
    {
        $this->head = $head;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.etc.nav-back');
    }
}
