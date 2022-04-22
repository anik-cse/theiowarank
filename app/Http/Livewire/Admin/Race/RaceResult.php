<?php

namespace App\Http\Livewire\Admin\Race;

use App\Models\Events;
use App\Models\Race;
use Livewire\Component;
use App\Models\RaceResult as Result;
use App\Models\Riders;
use Livewire\WithPagination;

class RaceResult extends Component
{
    use WithPagination;
    public $modalFormVisible = false;
    public $event, $race, $racer, $place;
    public $modelId;
    public $event_name, $search_event;
    public $race_name, $search_race;
    public $full_name, $search_rider;

    protected $listeners = ['delete'];
     /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'race' => 'required',
            'racer' => 'required',
            'place' => 'required',
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
        Result::create($this->validate());
        $this->modalFormVisible = false;
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
        Result::find($this->modelId)->update($this->validate());
        $this->modalFormVisible = false;
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
        $data = Result::find($this->modelId);
        $this->race = $data->race;
        $this->event = $data->event;
        $this->racer = $data->racer;
        $this->place = $data->place;

        $race = Race::find($data->race);
        $this->race_name = $race->name;
        $event = Events::find($race->event);
        $this->event_name = $event->name;
        $rider = Riders::find($data->racer);
        $this->full_name = $rider->first_name.' '.$rider->last_name;
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
    public function delete(Result $result)
    {
        $result->delete();
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
        $events = Events::select('id', 'name')->where('name', 'LIKE', '%' . $this->search_event . '%')->get();
        $races = Race::select('id', 'name')->where('event', $this->event)
                            ->where('name', 'LIKE', '%' . $this->search_race . '%')->get();
        $racers = Riders::select('id', 'first_name', 'last_name')->whereRaw("concat(first_name, ' ', last_name) like '%" .$this->search_rider. "%' ")->get();
        $results = Result::leftjoin('races', 'race_results.race', '=', 'races.id')
                    ->leftjoin('race_types', 'races.type', '=','race_types.id')
                    ->leftjoin('race_lengths', 'races.length', '=','race_lengths.id')
                    ->leftjoin('events', 'races.event', '=','events.id')
                    ->leftjoin('event_tiers', 'events.tier', '=','event_tiers.id')
                    ->leftjoin('riders', 'race_results.racer', '=','riders.id')
                    ->select('race_results.id', 'race_results.place','races.name as race_name', 'races.class as race_class', 'events.name as event_name',
                            'events.start_date as event_date','event_tiers.name as event_tier','race_types.type_name as race_type_name', 'race_lengths.length as race_length',
                            'riders.first_name as rider_first_name', 'riders.last_name as rider_last_name', 'riders.class as racer_class')
                    ->get();
        return view('livewire.admin.race.race-result', compact('races', 'events', 'racers', 'results'));
    }
}
