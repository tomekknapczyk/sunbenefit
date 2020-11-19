<?php

namespace App\Http\Livewire\Surcharges;

use Livewire\Component;
use App\Models\Surcharge;

class Edit extends Component
{
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'saved' => '$refresh',
    ];

    /**
     * The component's surcharge.
     *
     * @var \App\Models\Surcharge
     */
    public $surcharge;

    public $name;
    public $price;
    public $editable;
    public $type;
    
    /**
     * Validate and save surcharge.
     *
     * @param  array  $input
     * @return \App\Models\Surcharge
     */
    public function saveSurcharge()
    {
        $validatedData = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'type' => ['required'],
            'editable' => ['required', 'boolean'],
        ]);

        $this->surcharge->name = $this->name;
        $this->surcharge->price = $this->price;
        $this->surcharge->type = $this->type;
        $this->surcharge->editable = $this->editable;
        $this->surcharge->save();

        if ($this->editable == 0) {
            \App\Models\UserSurcharge::where('surcharge_id', $this->surcharge->id)->delete();
        }

        $this->emit('saved');
    }

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount(Surcharge $surcharge)
    {
        $this->surcharge = $surcharge;
        $this->name = $surcharge->name;
        $this->price = $surcharge->price;
        $this->type = $surcharge->type;
        $this->editable = $surcharge->editable;
    }

    public function render()
    {
        return view('livewire.surcharges.edit');
    }
}
