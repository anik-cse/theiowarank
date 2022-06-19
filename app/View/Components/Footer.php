<?php

namespace App\View\Components;

use App\Models\Events;
use App\Models\Race;
use App\Models\Riders;
use Illuminate\View\Component;

class Footer extends Component
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
        $players = Riders::count();
        $events = Events::count();
        $races = Race::count();
        return view('components.footer', compact('players', 'events', 'races'));
    }
}
