<?php

namespace App\View\Components\Guest;

use App\Models\Events;
use Illuminate\View\Component;

class LastEvent extends Component
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
        $last_event = Events::with('races')->latest('end_date')->first();
        return view('components.guest.last-event', compact('last_event'));
    }
}
