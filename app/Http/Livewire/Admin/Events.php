<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Countries;
use App\Models\EventType;
use App\Models\Events as Event;
use Livewire\WithPagination;

class Events extends Component
{
    use WithPagination;
    public $modalFormVisible = false;
    public $name, $venue, $address_one, $address_two, $city, $region, $post_code, $country, $type, $organization, $email, $phone;
    public $start_day, $start_month, $start_year;
    public $end_day, $end_month, $end_year;
    public $start_date, $end_date;
    public $modelId;

    public $months = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');

    protected $listeners = ['delete'];
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
            'organization' => 'sometimes|nullable|max:255',
            'email' => 'required|email',
            'phone' => 'sometimes|nullable|regex:/[+]{1}[0-9]{11,14}/',
        ];
    }

    /**
     * The livewire mount function
     *
     * @return void
     */
    public function mount()
    {
        // Resets the pagination after reloading the page
        $this->resetPage();
    }

    /**
     * The create function.
     *
     * @return void
     */
    public function create()
    {
        $this->validate();
        Event::create([
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
            'organization' =>  $this->organization,
            'email' =>  $this->email,
            'phone' =>  $this->phone,
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Record added successfully?',
            'text' => '',
        ]);
    }

        /**
     * The update function.
     *
     * @return void
     */
    public function update()
    {
        $this->validate();
        Event::find($this->modelId)->update($this->validate());
        $this->reset();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Record updated successfully?',
            'text' => '',
        ]);
    }

    /**
     * Shows the form modal
     * in update mode.
     *
     * @param  mixed $id
     * @return void
     */
    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->modelId = $id;
        $this->modalFormVisible = true;
        $this->loadModel();
    }

    /**
     * Loads the model data
     * of this component.
     *
     * @return void
     */
    public function loadModel()
    {
        $data = Event::find($this->modelId);
        $this->length = $data->length;
    }

    /**
     * Delete confirmation.
     *
     * @param  mixed  $length
     * @return void
     */
    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => '',
            'id' => $id,
        ]);
    }

    /**
     * Delete the given type.
     *
     * @param  mixed  $type
     * @return void
     */
    public function delete(Event $event)
    {
        $event->delete();
    }

    /**
     * Shows the form modal
     * of the create function.
     *
     * @return void
     */
    public function createShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }


    public function render()
    {
        $countries = Countries::select('id', 'name')->get();
        $event_types = EventType::all();
        $events = Event::leftjoin('event_types', 'events.type', '=', 'event_types.id')
                    ->leftjoin('countries', 'events.country', '=', 'countries.id')
                    ->select('events.name', 'events.city', 'events.region', 'events.country',
                     'events.type', 'event_types.name as type', 'countries.iso')
                    ->get();
        return view('livewire.admin.events', compact('countries', 'event_types', 'events'));
    }
}
