<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Reservation extends Component
{
    public $reservation ;

    public $test ;

    public $restaurants ;

    public function mount($id)
    {
        $this->restaurants = Restaurant::all()->find($id);
        $user = Auth::user();
    }
    
    public function render()
    {
        return view('livewire.reservation');
    }
}
