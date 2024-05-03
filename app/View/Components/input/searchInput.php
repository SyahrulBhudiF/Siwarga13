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
    public $name, $placeholder, $id;

    public function __construct($name, $placeholder, $id)
    {
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input.search-input');
    }
}
