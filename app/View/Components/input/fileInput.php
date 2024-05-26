<?php

namespace App\View\Components\input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class fileInput extends Component
{
    /**
     * Create a new component instance.
     */
    public $id, $accept, $multiple, $value, $name;

    public function __construct($id, $accept, $multiple, $value, $name)
    {
        $this->id = $id;
        $this->accept = $accept;
        $this->multiple = $multiple;
        $this->value = $value;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input.file-input');
    }
}
