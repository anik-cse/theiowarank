<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Countries;

class Events extends Component
{
    public function render()
    {
        $countries = Countries::select('id', 'name')->get();
        return view('livewire.admin.events',['countries' => $countries]);
    }
}
