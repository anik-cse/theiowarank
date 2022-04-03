<?php

namespace App\Http\Livewire\Admin\Events;

use App\Models\Events;
use Livewire\Component;

class EventShow extends Component
{
    public $event;

    public function mount($id)
    {
        $event = Events::with('type_info', 'tier_info', 'country_info', 'races')->where('id', $id)->first();
        // dd($event);
        $this->event = $event;
    }
    public function render()
    {
        return view('livewire.admin.events.event-show');
    }
}
