<?php

namespace App\Http\Livewire\Employees;

use Livewire\Component;

class Factors extends Component
{
    /**
     * Collection of factors.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public $factors;


    public function render()
    {
        return view('livewire.employees.factors');
    }
}
