<?php

namespace App\View\Components\etc;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class subMenu extends Component
{
    /**
     * Create a new component instance.
     */
    public string $head;
    public function __construct($head)
    {
        $this->head = $head;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.etc.sub-menu');
    }
}
