<?php

namespace App\Http\Livewire\Calculations;

use Livewire\Component;

class Discount extends Component
{
    public $projekt;
    public $uziemienie;
    public $acdc;

    public $def_projekt;
    public $def_uziemienie;
    public $def_acdc;
    public $def;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {
        $this->projekt = auth()->user()->getFactorByName('projekt')->toArray();
        $this->uziemienie = auth()->user()->getFactorByName('uziemienie')->toArray();
        $this->acdc = auth()->user()->getFactorByName('acdc')->toArray();

        $this->def_projekt = $this->projekt['price'];
        $this->def_uziemienie = $this->uziemienie['price'];
        $this->def_acdc = $this->acdc['price'];

        $this->def = $this->def_projekt + $this->def_uziemienie + $this->def_acdc;

        $options = $this->projekt['price'] + $this->uziemienie['price'] + $this->acdc['price'];
    }

    /**
     * Update component.
     *
     * @return void
     */
    public function updated()
    {
        if (\is_numeric($this->projekt['price']) && \is_numeric($this->uziemienie['price']) && \is_numeric($this->acdc['price'])) {
            $options = $this->projekt['price'] + $this->uziemienie['price'] + $this->acdc['price'];
            $this->emit('discount:update', $options);
        }
    }

    /**
     * Calculates discount
     *
     * @return void $this->discount
     */
    public function getDiscountProperty()
    {
        $val = $this->def;

        if (\is_numeric($this->projekt['price'])) {
            $val -= $this->projekt['price'];
        }
        
        if (\is_numeric($this->uziemienie['price'])) {
            $val -= $this->uziemienie['price'];
        }

        if (\is_numeric($this->acdc['price'])) {
            $val -= $this->acdc['price'];
        }

        return round($val,2);
    }

    public function render()
    {
        return view('livewire.calculations.discount');
    }
}
