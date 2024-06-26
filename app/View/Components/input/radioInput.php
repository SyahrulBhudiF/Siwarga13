<?php

namespace App\View\Components\input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class radioInput extends Component
{
    /**
     * Create a new component instance.
     */
    public string $name, $value, $id, $fn;
    public bool $checked;

    public function __construct($name, $value, $id, $checked, $fn = '')
    {
        $this->name = $name;
        $this->value = $value;
        $this->id = $id;
        $this->checked = $checked;
        $this->fn = $fn;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input.radio-input');
    }
}
