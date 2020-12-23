<?php

namespace App\Http\Livewire\Calculations;

use Livewire\Component;

class Compare extends Component
{
    /**
     * Component module1.
     *
     * @return \App\Models\Module
     */
    public $module1;

    /**
     * Component module2.
     *
     * @return \App\Models\Module
     */
    public $module2;

    /**
     * Component module3.
     *
     * @return \App\Models\Module
     */
    public $module3;

    public function render()
    {
        return view('livewire.calculations.compare');
    }
}
