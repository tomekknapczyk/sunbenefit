<?php

namespace App\Http\Livewire\Employees;

use Livewire\Component;

class Factor extends Component
{
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'factorChanged' => '$refresh',
    ];

    public $price;

    /**
     * The component's factor.
     *
     * @var \App\Models\Factor
     */
    public $factor;

    /**
     * The component's user factor.
     *
     * @var \App\Models\UserFactor
     */
    public $userFactor;

    /**
     * Validate and save calculator.
     *
     * @return void
     */
    public function saveFactor()
    {
        $validatedData = $this->validate([
            'price' => ['nullable', 'min:0', 'numeric'],
        ]);

        if (!$this->userFactor) {
            $factor = new \App\Models\UserFactor;
            $factor->user_id = auth()->user()->id;
            $factor->factor_id = $this->factor->id;
            $this->userFactor = $factor;
        }

        $this->userFactor->price = $this->price;
        $this->userFactor->save();

        $this->emit('factorChanged');
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {
        $factor = auth()->user()->getFactor($this->factor->id);
        
        if (!$factor) {
            $this->userFactor = null;
            $this->price = $this->factor->price;
        } else {
            $this->userFactor = $factor;
            $this->price = $factor->price;
        }
    }
    public function render()
    {
        return view('livewire.employees.factor');
    }
}
