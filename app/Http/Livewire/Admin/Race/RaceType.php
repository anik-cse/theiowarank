<?php

namespace App\Http\Livewire\Admin\Race;

use Livewire\Component;
use App\Models\RaceType as Types;
use Livewire\WithPagination;

class RaceType extends Component
{
    use WithPagination;
    public $modalFormVisible = false;
    public $type_name;
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
            'type_name' => 'required',
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
        Types::create($this->validate());
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
        Types::find($this->modelId)->update($this->validate());
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
        $data = Types::find($this->modelId);
        $this->type_name = $data->type_name;
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
    public function delete(Types $types)
    {
        $types->delete();
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
        $types = Types::paginate(10);
        return view('livewire.admin.race.race-type', compact('types'));
    }
}
