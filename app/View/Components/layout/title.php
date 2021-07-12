<?php

namespace App\View\Components\layout;

use Illuminate\View\Component;

class title extends Component
{
    public $item, $color;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($item, $color)
    {
        $this->item = $item;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout.title');
    }
}
