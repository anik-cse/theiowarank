<?php

namespace App\Http\Livewire\Admin\Events;

use App\Models\Events;
use App\Models\Countries;
use App\Models\EventTier;
use App\Models\EventType;
use Livewire\Component;

class EventEdit extends Component
{
    public $name, $venue, $address_one, $address_two, $city, $region, $post_code, $country, $type, $tier, $organization, $email, $phone;
    public $start_day, $start_month, $start_year;
    public $end_day, $end_month, $end_year;
    public $start_date, $end_date;
    public $event;

    public $months = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');

     /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'start_day' => 'required|numeric',
            'start_month' => 'required|numeric',
            'start_year' => 'required|numeric',
            'end_day' => 'required|numeric',
            'end_month' => 'required|numeric',
            'end_year' => 'required|numeric',
            'venue' => 'required|max:255',
            'address_one' => 'required',
            'address_two' => 'sometimes|nullable',
            'city' => 'required',
            'region' => 'required',
            'post_code' => 'required',
            'country' => 'required',
            'type' => 'sometimes|nullable',
            'tier' => 'required|integer',
            'organization' => 'sometimes|nullable|max:255',
            'email' => 'required|email',
            'phone' => 'sometimes|nullable|regex:/[+]{1}[0-9]{11,14}/',
        ];
    }

    public function mount($id)
    {
        $event = Events::find($id);
        $this->name = $event->name;
        $this->start_day = date('d', strtotime($event->start_date));
        $this->start_month = (int)date('m', strtotime($event->start_date));
        $this->start_year = date('Y', strtotime($event->start_date));
        $this->end_day = date('d', strtotime($event->end_date));
        $this->end_month = (int)date('m', strtotime($event->end_date));
        $this->end_year = date('Y', strtotime($event->end_date));
        $this->venue = $event->venue;
        $this->address_one = $event->address_one;
        $this->address_two = $event->address_two;
        $this->city = $event->city;
        $this->region = $event->region;
        $this->post_code = $event->post_code;
        $this->country = $event->country;
        $this->type = $event->type;
        $this->tier = $event->tier;
        $this->organization = $event->organization;
        $this->email = $event->email;
        $this->phone = $event->phone;
        $this->event = $event;
    }

    
    /**
     * The update function.
     *
     * @return void
     */
    public function update()
    {
        $this->validate();
        $this->event->update([
            'name' => $this->name,
            'start_date' => $this->start_day . "-" . $this->start_month . "-" . $this->start_year,
            'end_date' =>  $this->end_day . "-" . $this->end_month . "-" . $this->end_year,
            'venue' =>  $this->venue,
            'address_one' =>  $this->address_one,
            'address_two' =>  $this->address_two,
            'city' =>  $this->city,
            'region' =>  $this->region,
            'post_code' =>  $this->post_code,
            'country' =>  $this->country,
            'type' =>  $this->type,
            'tier' =>  $this->tier,
            'organization' =>  $this->organization,
            'email' =>  $this->email,
            'phone' =>  $this->phone,
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Record updated successfully?',
            'text' => '',
        ]);
    }

    public function render()
    {
        $countries = Countries::select('id', 'name')->get();
        $event_types = EventType::all();
        $event_tiers = EventTier::all();
        $latest_events = Events::leftjoin('event_types', 'events.type', '=', 'event_types.id')
                ->leftjoin('countries', 'events.country', '=', 'countries.id')
                ->select('events.name', 'events.city', 'events.region', 'events.country',
                'events.type', 'event_types.name as type', 'countries.iso')
                ->latest('events.created_at')->limit(10)->get();
        return view('livewire.admin.events.event-edit', compact('latest_events', 'countries', 'event_tiers', 'event_types'));
    }
}
