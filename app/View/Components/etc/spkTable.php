<?php

namespace App\View\Components\etc;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class spkTable extends Component
{
    /**
     * Create a new component instance.
     */
    public $dataSpk;
    public function __construct($dataSpk)
    {
        $this->dataSpk = $dataSpk;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.etc.spk-table');
    }
}
