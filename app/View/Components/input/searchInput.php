<?php

namespace App\View\Components\input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class searchInput extends Component
{
    /**
     * Create a new component instance.
     */
    public $name, $placeholder;

    public function __construct($name, $placeholder)
    {
        $this->name = $name;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input.search-input');
    }
}
