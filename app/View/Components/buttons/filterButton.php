<?php

namespace App\View\Components\buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class filterButton extends Component
{
    /**
     * Create a new component instance.
     */
    public string $id;
    public array $dt;

    public function __construct($id, $dt)
    {
        $this->id = $id;
        $this->dt = $dt;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.buttons.filter-button');
    }
}
