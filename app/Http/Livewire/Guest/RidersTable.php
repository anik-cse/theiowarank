<?php

namespace App\Http\Livewire\Guest;

use App\Models\Riders;
use Livewire\Component;
use Livewire\WithPagination;

class RidersTable extends Component
{
    public $search, $view, $sortby, $orderby;
    use WithPagination;

    public function sortBy($sortby, $orderby)
    {
        $this->sortby = $sortby;
        $this->orderby = $orderby;
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
        return view('livewire.guest.riders-table', compact('riders'));
    }
}
