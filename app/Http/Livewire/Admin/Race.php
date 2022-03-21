<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Race as Races;
use App\Models\RaceType;
use App\Models\RaceLength;
use Livewire\WithPagination;

class Race extends Component
{
    use WithPagination;
    public $modalFormVisible = false;
    public $name, $type, $length, $class, $notes;
    public $modelId;
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
        Races::create($this->validate());
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
        Races::find($this->modelId)->update($this->validate());
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
        $data = Races::find($this->modelId);
        $this->name = $data->name;
        $this->type = $data->type;
        $this->length = $data->length;
        $this->class = $data->class;
        $this->notes = $data->notes;
    }

    /**
     * Delete confirmation.
     *
     * @param  mixed  $types
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
    public function delete(Races $races)
    {
        $races->delete();
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
        $races = Races::leftjoin('race_types', 'races.type', '=', 'race_types.id')
                    ->leftjoin('race_lengths', 'races.length', '=', 'race_lengths.id')
                    ->select('races.*', 'race_types.type_name', 'race_lengths.length as length_name')
                    ->get();
        $types = RaceType::all();
        $lengths = RaceLength::all();
        return view('livewire.admin.race', compact('races', 'types', 'lengths'));
    }
}
