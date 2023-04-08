<?php

namespace App\View\Components;

use Illuminate\View\Component;

class midd extends Component
{
    public $tilte;
    public $data;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tilte,$data)
    {
        $this->title = $tilte;
        $this->data  = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data = $this->data;
        return view('components.midd');
    }
}
