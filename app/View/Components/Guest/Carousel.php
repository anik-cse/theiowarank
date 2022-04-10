<?php

namespace App\View\Components\Guest;

use Illuminate\View\Component;
Use App\Models\Slider;

class Carousel extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $slides = Slider::with('media')->select('sliders.*', 'animations.css_class')
                    ->leftJoin('animations', 'sliders.animation_id', '=', 'animations.id')->get();
        return view('components.guest.carousel', compact('slides'));
    }
}
