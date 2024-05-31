<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class umkmForm extends Component
{
    /**
     * Create a new component instance.
     */
    public string $action;
    public object|string $umkm;

    public function __construct($action, $umkm)
    {
        $this->umkm = $umkm;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.umkm-form');
    }
}
