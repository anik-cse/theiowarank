<?php

namespace App\View\Components\Guest;

use App\Models\Events;
use Illuminate\View\Component;

class LatestEvent extends Component
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
        $events = Events::select('name', 'start_date', 'end_date', 'venue')->latest('created_at')->limit(5)->get();
        return view('components.guest.latest-event', compact('events'));
    }
}
