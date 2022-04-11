<?php

namespace App\Http\Livewire\Admin\Riders;

use App\Models\RiderClass;
use App\Models\Riders;
use Livewire\Component;

class RiderEdit extends Component
{
    public $first_name, $last_name, $home_region, $class, $team, $email, $phone;
    public $birth_date, $birth_month, $birth_year;

    public $months = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');

    public function mount($id)
    {
        $rider = Riders::where('id', $id)->first();
        $this->first_name = $rider->first_name;
        $this->last_name = $rider->last_name;
        $this->home_region = $rider->home_region;
        $this->class = $rider->class;
        $this->team = $rider->team;
        $this->email = $rider->email;
        $this->phone = $rider->phone;
        $this->birth_date = date('d', strtotime($rider->birthday));
        $this->birth_month = (int)date('m', strtotime($rider->birthday));
        $this->birth_year = date('Y', strtotime($rider->birthday));
    }
    public function render()
    {
        $riders = Riders::select('first_name', 'last_name', 'home_region', 'class')->latest('created_at')->limit(10)->get();
        $class = RiderClass::select('class_name')->get();
        return view('livewire.admin.riders.rider-edit', compact('riders', 'classes'));
    }
}
