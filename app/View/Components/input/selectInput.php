<?php

namespace App\View\Components\input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class selectInput extends Component
{
    /**
     * Create a new component instance.
     */
    public string $id, $placeholder, $value;
    public array $options;

    public function __construct($id, $placeholder, $value, $options)
    {
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input.select-input');
    }
}
