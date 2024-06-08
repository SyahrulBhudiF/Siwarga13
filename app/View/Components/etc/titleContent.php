<?php

namespace App\View\Components\etc;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class titleContent extends Component
{
    /**
     * Create a new component instance.
     */
    public string $title, $desc;

    public function __construct($title, $desc)
    {
        $this->title = $title;
        $this->desc = $desc;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.etc.title-content');
    }
}
