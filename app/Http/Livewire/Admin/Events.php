<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Countries;
use App\Models\EventType;

class Events extends Component
{
    public $months = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');

    public function render()
    {
        $countries = Countries::select('id', 'name')->get();
        $event_types = EventType::all();
        return view('livewire.admin.events',['countries' => $countries, 'event_types' => $event_types]);
    }
}
