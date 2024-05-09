<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class civilliantForm extends Component
{
    /**
     * Create a new component instance.
     */
    public string $action;
    public object $warga;

    public function __construct($warga, $action)
    {
        $this->warga = $warga;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.civilliant-form');
    }
}
