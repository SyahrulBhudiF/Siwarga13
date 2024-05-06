<?php

namespace App\View\Components\input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class checkboxInput extends Component
{
    /**
     * Create a new component instance.
     */
    public string $id, $name, $value;
    public bool $checked;

    public function __construct($id, $name, $value, $checked)
    {
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public
    function render(): View|Closure|string
    {
        return view('components.input.checkbox-input');
    }
}
