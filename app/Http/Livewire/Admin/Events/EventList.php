<?php

namespace App\Http\Livewire\Admin\Events;

use Livewire\Component;
use App\Models\Events;
use Livewire\WithPagination;

class EventList extends Component
{
    public $search, $view;
    use WithPagination;
    protected $listeners = ['delete'];


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
    public function delete(Events $event)
    {
        $event->delete();
    }

    public function render()
    {
        $paginate = $this->view == ''? 5 : $this->view;
        $events = Events::leftjoin('event_types', 'events.type', '=', 'event_types.id')
                    ->leftjoin('countries', 'events.country', '=', 'countries.id')
                    ->select('events.id', 'events.name', 'events.city', 'events.region',
                    'events.type', 'event_types.name as type', 'countries.iso')
                    ->where('events.name', 'LIKE', '%' . $this->search . '%')
                    ->paginate($paginate);
        return view('livewire.admin.events.event-list', compact('events'));
    }
}
