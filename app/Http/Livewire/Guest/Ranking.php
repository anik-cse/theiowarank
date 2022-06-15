<?php

namespace App\Http\Livewire\Guest;

use App\Models\Race;
use Livewire\Component;

class Ranking extends Component
{
    public $race_id;

    public function getResult($race_id)
    {
        $this->race_id = $race_id;
    }

    public function render()
    {
        $races = Race::with('events')->get();
        if ($this->race_id) {
            $race_results = Race::with('results', 'events')->where('id', $this->race_id)->first(); 
        }else{
            $race_results = Race::with('results', 'events')->where('id', $races->last()->id)->first();
        }
        // dd($race_results);
        return view('livewire.guest.ranking', compact('races', 'race_results'));
    }
}
