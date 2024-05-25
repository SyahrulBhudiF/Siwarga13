<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class pengumumanForm extends Component
{
    /**
     * Create a new component instance.
     */
    public string $action;
    public object|string $pengumuman;

    public function __construct($action, $pengumuman)
    {
        $this->pengumuman = $pengumuman;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.pengumuman-form');
    }
}
