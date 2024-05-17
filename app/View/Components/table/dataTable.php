<?php

namespace App\View\Components\table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class dataTable extends Component
{
    /**
     * Create a new component instance.
     */
    public $headers, $dt;

    public function __construct($headers, $dt)
    {
        $this->headers = $headers;
        $this->dt = $dt;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.data-table');
    }
}
