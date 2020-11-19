<?php

namespace App\Http\Livewire\Employees;

use Livewire\Component;

class Surcharges extends Component
{
    /**
     * Collection of surcharges.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public $surcharges;


    public function render()
    {
        return view('livewire.employees.surcharges');
    }
}
