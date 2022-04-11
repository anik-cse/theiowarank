<?php

namespace App\Http\Livewire\Admin\Race;

use App\Models\Race;
use Livewire\Component;
use Livewire\WithPagination;

class RaceList extends Component
{
    public $search, $view;
    use WithPagination;


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
                    ->select('races.name as name', 'races.calss as class', 'events.name as event', 'race_types.type_name as type', 'race_lengths.length as length')
                    ->latest('races.created_at')
                    ->where('races.name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('events.name', 'LIKE', '%' . $this->search . '%')
                    ->paginate($paginate);
        return view('livewire.admin.race.race-list', compact('races'));
    }
}
