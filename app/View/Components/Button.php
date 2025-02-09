<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $color;
    public $url;
    public $text;
    public $type;

    public function __construct($color = 'blue', $url = '#', $text = 'Button', $type = 'button')
    {
        $this->color = $color;
        $this->url = $url;
        $this->text = $text;
        $this->type = $type;
    }

    public function render()
    {
        return view('components.button');
    }
}
