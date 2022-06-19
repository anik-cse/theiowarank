<?php

namespace App\Http\Livewire\Admin\Riders;

use App\Models\RiderClass;
use App\Models\Riders;
use Livewire\Component;

class RiderEdit extends Component
{
    public $rider_id, $first_name, $last_name, $home_region, $class, $team, $email, $phone;
    public $birth_date, $birth_month, $birth_year;

    public $months = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');

    /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'home_region' => 'required|max:255',
            'class' => 'sometimes|nullable|max:255',
            'team' => 'sometimes|nullable',
            'email' => 'nullable|email',
            'phone' => 'sometimes|nullable|regex:/[+]{1}[0-9]{11,14}/',
            'birth_date' => 'nullable|required_with:birth_month|required_with:birth_year|numeric',
            'birth_month' => 'nullable|required_with:birth_date|required_with:birth_year|numeric',
            'birth_year' => 'nullable|required_with:birth_month|required_with:birth_date|numeric',
        ];
    }

    public function mount($id)
    {
        $rider = Riders::where('id', $id)->first();
        $this->rider_id = $rider->id;
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

     /**
     * The create function.
     *
     * @return void
     */
    public function update($id)
    {
        $this->validate();
        if ($this->birth_date && $this->birth_month && $this->birth_year) {
            $birthday = $this->birth_date . "-" . $this->birth_month . "-" . $this->birth_year;
        }else{
            $birthday = '';
        }

        $rider = Riders::find($id);
        $rider->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'home_region' => $this->home_region,
            'class' => $this->class,
            'team' => $this->team,
            'email' => $this->email,
            'team' => $this->team,
            'phone' => $this->phone,
            'birthday' => $birthday,
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Record added successfully?',
            'text' => '',
        ]);
    }

    public function render()
    {
        $riders = Riders::select('first_name', 'last_name', 'home_region', 'class')->latest('created_at')->limit(10)->get();
        $classes = RiderClass::select('class_name')->get();
        return view('livewire.admin.riders.rider-edit', compact('riders', 'classes'));
    }
}
