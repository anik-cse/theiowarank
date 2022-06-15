<?php

namespace App\View\Components\Guest;

use App\Models\Events as ModelsEvents;
use Illuminate\View\Component;

class Events extends Component
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
        $events = ModelsEvents::select('name')->limit(5)->get();
        return view('components.guest.events', compact('events'));
    }
}
