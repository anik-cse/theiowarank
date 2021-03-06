<?php

namespace App\Http\Livewire\Admin\Riders;

use App\Models\Riders;
use Livewire\Component;
use Livewire\WithPagination;

class RiderList extends Component
{
    public $search, $view, $sortby, $orderby;
    use WithPagination;

    public function sortBy($sortby, $orderby)
    {
        $this->sortby = $sortby;
        $this->orderby = $orderby;
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
    public function delete(Riders $riders)
    {
        $riders->delete();
    }

    public function render()
    {
        $paginate = $this->view == ''? 5 : $this->view;
        $sortby = $this->sortby == ''? 'first_name' : $this->sortby;
        $orderby = $this->orderby == ''? 'asc' : $this->orderby;
        $riders = Riders::select('id', 'first_name', 'last_name', 'home_region', 'team')
                        ->where('first_name', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('team', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('home_region', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('class', 'LIKE', '%' . $this->search . '%')
                        ->orderBy($sortby, $orderby)
                        ->paginate($paginate);
        return view('livewire.admin.riders.rider-list', compact('riders'));
    }
}
