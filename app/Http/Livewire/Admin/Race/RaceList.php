<?php

namespace App\Http\Livewire\Admin\Race;

use App\Models\Events;
use App\Models\Race;
use App\Models\RaceLength;
use App\Models\RaceType;
use Livewire\Component;
use Livewire\WithPagination;

class RaceList extends Component
{
    public $search, $view;
    use WithPagination;
    public $modalFormVisible = false;
    public $name, $type, $length, $class, $event, $notes;
    public $modelId;
    public $property;
    public $search_event;
    protected $listeners = ['delete'];

     /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'type' => 'required',
            'length' => 'required',
            'class' => 'sometimes|nullable',
            'event' => 'sometimes|nullable',
            'notes' => 'sometimes|nullable',
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
        Race::create($this->validate());
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
        Race::find($this->modelId)->update($this->validate());
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
        $data = Race::find($this->modelId);
        $this->name = $data->name;
        $this->type = $data->type;
        $this->length = $data->length;
        $this->class = $data->class;
        $this->event = $data->event;
        $this->notes = $data->notes;
        $related_event = Events::find($data->event);
        $this->property = $related_event != '' ? $related_event->name : '';
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
    public function delete(Race $race)
    {
        $race->delete();
    }

    public function render()
    {
        $paginate = $this->view == ''? 5 : $this->view;
        $races = Race::leftjoin('events', 'races.event', '=', 'events.id')
                    ->leftjoin('race_types', 'races.type', '=', 'race_types.id')
                    ->leftjoin('race_lengths', 'races.length', '=', 'race_lengths.id')
                    ->select('races.id', 'races.name as name', 'races.class as class', 'events.name as event', 'race_types.type_name as type', 'race_lengths.length as length')
                    ->latest('races.created_at')
                    ->where('races.name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('events.name', 'LIKE', '%' . $this->search . '%')
                    ->paginate($paginate);
        $types = RaceType::all();
        $lengths = RaceLength::all();
        $events = Events::select('id', 'name')->where('name', 'LIKE', '%' . $this->search_event . '%')->get();
        return view('livewire.admin.race.race-list', compact('races', 'types', 'lengths', 'events'));
    }
}
