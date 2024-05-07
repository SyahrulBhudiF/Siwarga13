<?php

namespace App\View\Components\input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class textInput extends Component
{
    /**
     * Create a new component instance.
     */
    public string $placeholder, $id, $value;

    public function __construct($placeholder, $id, $value)
    {
        $this->placeholder = $placeholder;
        $this->id = $id;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input.text-input');
    }
}
