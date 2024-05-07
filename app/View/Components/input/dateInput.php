<?php

namespace App\View\Components\input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class dateInput extends Component
{
    /**
     * Create a new component instance.
     */
    public string $id, $placeholder, $value;

    public function __construct($id, $placeholder, $value)
    {
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input.date-input');
    }
}
