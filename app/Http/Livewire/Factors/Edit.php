<?php

namespace App\Http\Livewire\Factors;

use Livewire\Component;
use App\Models\Factor;

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
     * The component's factor.
     *
     * @var \App\Models\Factor
     */
    public $factor;

    public $label;
    public $price;
    public $editable;
    
    /**
     * Validate and save factor.
     *
     * @param  array  $input
     * @return \App\Models\Factor
     */
    public function saveFactor()
    {
        $validatedData = $this->validate([
            'label' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'editable' => ['required', 'boolean'],
        ]);

        $this->factor->label = $this->label;
        $this->factor->price = $this->price;
        $this->factor->editable = $this->editable;
        $this->factor->save();

        if ($this->editable == 0) {
            \App\Models\UserFactor::where('factor_id', $this->factor->id)->delete();
        }

        $this->emit('saved');
    }

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount(Factor $factor)
    {
        $this->factor = $factor;
        $this->label = $factor->label;
        $this->price = $factor->price;
        $this->editable = $factor->editable;
    }

    public function render()
    {
        return view('livewire.factors.edit');
    }
}
