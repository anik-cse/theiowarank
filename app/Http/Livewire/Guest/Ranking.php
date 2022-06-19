<?php

namespace App\Http\Livewire\Guest;

use App\Models\Events;
use App\Models\Race;
use Livewire\Component;

class Ranking extends Component
{
    public $race_id, $event_id;

    public function getResult($race_id)
    {
        $this->race_id = $race_id;
    }

    public function render()
    {
        $events = Events::all();
        if ($this->event_id!=0) {
            $races = Race::with('events')->where('event', $this->event_id)->get();
        }else{
            $races = Race::with('events')->get();
        }
        
        if ($this->race_id) {
            $race_results = Race::with('results', 'events')->where('id', $this->race_id)->first(); 
        }else{
            $race_results = Race::with('results', 'events')->first();
        }
        // dd($race_results);
        return view('livewire.guest.ranking', compact('events','races', 'race_results'));
    }
}
