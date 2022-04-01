<?php

namespace App\Http\Livewire\Admin\Events;

use App\Models\Events;
use Livewire\Component;

class EventShow extends Component
{
    public function mount($id)
    {
        $event = Events::with('type', 'tier', 'country', 'races')->where('id', $id)->first();
        dd($event);
    }
    public function render()
    {
        return view('livewire.admin.events.event-show');
    }
}
