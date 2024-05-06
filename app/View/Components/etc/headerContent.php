<?php

namespace App\View\Components\etc;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class headerContent extends Component
{
    /**
     * Create a new component instance.
     */
    public string $head, $desc;

    public function __construct($head, $desc)
    {
        $this->head = $head;
        $this->desc = $desc;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.etc.header-content');
    }
}
