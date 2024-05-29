<?php

namespace App\View\Components\input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class imageInput extends Component
{
    /**
     * Create a new component instance.
     */
    public $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input.image-input');
    }
}
