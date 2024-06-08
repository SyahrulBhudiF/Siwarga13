<?php

namespace App\View\Components\etc;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class slider extends Component
{
    /**
     * Create a new component instance.
     */
    public $dt;

    public function __construct($dt)
    {
        $this->dt = $dt;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.etc.slider');
    }
}
