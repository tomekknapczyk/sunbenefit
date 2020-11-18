<?php

namespace App\Http\Livewire\Surcharges;

use Livewire\Component;
use App\Models\Surcharge;

class Create extends Component
{
    public $name;
    public $price;
    public $editable = 0;
    public $type = 'kwp';

    /**
     * Validate and create a new module.
     *
     * @param  array  $input
     * @return \App\Models\Surcharge
     */
    public function createSurcharge()
    {
        $validatedData = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'type' => ['required'],
            'editable' => ['required', 'boolean'],
        ]);

        $module = Surcharge::create([
            'name' => $this->name,
            'price' => $this->price,
            'type' => $this->type,
            'editable' => $this->editable,
        ]);

        notify()->success('Dopłata utworzona!', 'Sukces');
        
        return redirect()->route('surcharges');
    }

    public function render()
    {
        return view('livewire.surcharges.create');
    }
}
