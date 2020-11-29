<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Shipping extends Component
{
    public $freeShipContent = 'From all orders over ';

    public $freeReturnContent = 'Return money within 30 days';

    public $secureContent = 'You"re in safe hands';

    public $price;

    /**
     * Create a new component instance.
     *
     * @param string $price
     * @param null $name
     */
    public function __construct($price = '', $name = null)
    {
        $this->price = $price;
        $this->freeShipContent  .= '$' . "{$price}";
        $this->secureContent .= $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.shipping');
    }
}
