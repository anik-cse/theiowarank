<?php

namespace App\Http\Livewire\Admin\Events;

use Livewire\Component;
use App\Models\EventTier as Tier;
use Livewire\WithPagination;

class EventTier extends Component
{
    use WithPagination;
    public $modalFormVisible = false;
    public $name;
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
            'name' => 'required|integer',
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
        Tier::create($this->validate());
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
        Tier::find($this->modelId)->update($this->validate());
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
        $data = Tier::find($this->modelId);
        $this->name = $data->name;
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
    public function delete(Tier $tier)
    {
        $tier->delete();
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
        $tiers = Tier::paginate(10);
        return view('livewire.admin.events.event-tier', compact('tiers'));
    }
}
