<?php

namespace App\Http\Livewire\Admin\Riders;

use App\Models\Riders;
use Livewire\Component;

class RiderDetails extends Component
{
    public Riders $rider;
    
    public function render()
    {
        return view('livewire.admin.riders.rider-details');
    }
}
