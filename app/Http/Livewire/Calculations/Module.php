<?php

namespace App\Http\Livewire\Calculations;

use Livewire\Component;

class Module extends Component
{
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'calcPrice' => 'refreshPrice',
    ];

    /**
     * Component module.
     *
     * @return \App\Models\Module
     */
    public $module;

    public function refreshPrice($power)
    {
        $this->power = $power;
        $this->module_price = $this->module->getPrice(auth()->user()->group()->first()->name, $this->power);
        $this->actual_power = $this->module_price[2];
        $this->qty = $this->module_price[3];
        $this->price = round($this->module_price[0] + ($this->module_price[0] * ($this->margin / 100)));
        $this->price_opt = round($this->module_price[1] + ($this->module_price[1] * ($this->margin / 100)));
    }

    public $margin;

    public $power = 4;
    public $price = 0;
    public $price_opt = 0;
    public $actual_power = 0;
    public $qty = 0;

    public $module_price;

    public function mount(){
        $this->refreshPrice($this->power);
    }

    public function render()
    {
        return view('livewire.calculations.module');
    }
}
