<?php

namespace App\Http\Livewire\Employees;

use Livewire\Component;

class Surcharge extends Component
{
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'surchargeChanged' => '$refresh',
    ];

    public $price;

    /**
     * The component's surcharge.
     *
     * @var \App\Models\Surcharge
     */
    public $surcharge;

    /**
     * The component's user surcharge.
     *
     * @var \App\Models\UserSurcharge
     */
    public $userSurcharge;

    /**
     * Validate and save calculator.
     *
     * @return void
     */
    public function saveSurcharge()
    {
        $validatedData = $this->validate([
            'price' => ['nullable', 'min:0', 'numeric'],
        ]);

        if (!$this->userSurcharge) {
            $surcharge = new \App\Models\UserSurcharge;
            $surcharge->user_id = auth()->user()->id;
            $surcharge->surcharge_id = $this->surcharge->id;
            $this->userSurcharge = $surcharge;
        }

        $this->userSurcharge->price = $this->price;
        $this->userSurcharge->save();

        $this->emit('surchargeChanged');
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {
        $surcharge = auth()->user()->getSurcharge($this->surcharge->id);
        
        if (!$surcharge) {
            $this->userSurcharge = null;
            $this->price = $this->surcharge->price;
        } else {
            $this->userSurcharge = $surcharge;
            $this->price = $surcharge->price;
        }
    }

    public function render()
    {
        return view('livewire.employees.surcharge');
    }
}
