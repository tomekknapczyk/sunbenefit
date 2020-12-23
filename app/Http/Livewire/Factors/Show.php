<?php

namespace App\Http\Livewire\Factors;

use Livewire\Component;
use App\Models\Factor;

class Show extends Component
{

    /**
     * Collection of factors.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public $factors;


    public function render()
    {
        return view('livewire.factors.show');
    }
}
