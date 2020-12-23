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
        'discount:update' => 'updateOptions',
        'pvPower:change' => 'updatePvPower',
        'surcharges:change' => 'updateSurchargesValue',
        'deposit:change' => 'updateDeposit',
        'years:change' => 'updateYears',
        'solar:change' => 'updateSolar',
        'company:change' => 'updateCompany',
        'selected_id:update' => 'updateId',
    ];

    public function updateOptions($price)
    {
        $this->options = $price;

        $this->refreshPrice();
    }

    public function updatePvPower($power)
    {
        $this->pvPower = $power;
        
        $this->refreshPrice();
    }

    public function updateDeposit($deposit)
    {
        $this->deposit = $deposit;

        $this->refreshPrice();
    }

    public function updateYears($years)
    {
        $this->years = $years;

        $this->refreshPrice();
    }

    public function updateSolar($solar)
    {
        $this->solar = $solar;

        $this->refreshPrice();
    }

    public function updateSurchargesValue($data)
    {
        $this->surcharges = $data[0];
        $this->calcSurcharges = $data[1];
        $this->calcSurchargesQty = $data[2];

        $this->refreshPrice();
    }

    public function updateSurcharges()
    {
        $sum = 0;

        foreach ($this->surcharges as $surcharge) {
            if ($this->calcSurcharges[$surcharge['id']]) {
                $user_surharge = auth()->user()->getSurcharge($surcharge['id']);

                if ($user_surharge) {
                    $price = $user_surharge->price;
                } else {
                    $price = $surcharge['price'];
                }

                if ($surcharge['type'] == 'once') {
                    $sum += $price;
                } elseif ($surcharge['type'] == 'kwp') {
                    $sum += $price * $this->actual_power;
                } elseif ($surcharge['type'] == 'module') {
                    $sum += $price * $this->qty;
                } else {
                    $sum += $price * $this->calcSurchargesQty[$surcharge['id']];
                }
            }
        }

        $this->surchargesSum = $sum;
    }

    public function updateCompany($company)
    {
        $this->company = $company;

        $this->refreshPrice();
    }

    public function select()
    {
        $this->refreshPrice();
        $this->selected = true;
        $this->emit('selected_id:update', $this->nr);
        $this->emit('selected:update', [$this->price, $this->actual_power, $this->qty, $this->module->name]);
    }

    public function updateId($id)
    {
        if ($this->nr != $id) {
            $this->selected = false;
        }
    }

    /**
     * Component module.
     *
     * @return \App\Models\Module
     */
    public $module;

    public $nr;

    public $company = 0;

    public $margin;
    public $pvPower = 0;
    public $ppoz;
    public $options;

    public $solar = false;
    public $surchargesSum = 0;

    public $surcharges = [];
    public $calcSurcharges = [];
    public $calcSurchargesQty = [];

    public $price = 0;
    public $actual_power = 0;
    public $qty = 0;

    public $deposit = 0;
    public $years = 0;
    public $dotation = 0;
    public $tax_relief = 0;
    public $price_with_deposit = 0;
    public $price_with_dotation = 0;
    public $price_with_relief = 0;

    public $installment = 0;
    public $installment2 = 0;
    public $installment_final = 0;

    public $selected = false;
    

    public function refreshPrice()
    {
        $module_info = $this->module->getPrice(auth()->user()->group()->first()->name, $this->pvPower);
        $this->actual_power = $module_info[2];
        $this->qty = $module_info[3];
        if (!$this->solar) {
            $this->price = round($module_info[0] + ($module_info[0] * ($this->margin / 100)));
        } else {
            $this->price = round($module_info[1] + ($module_info[1] * ($this->margin / 100)));
        }

        // vat 8% i 23%
        if ($this->company) {
            $base_price = $this->price / 1.08;
            $this->price = round($base_price * 1.23);
        }

        $this->updateSurcharges();

        $this->price += $this->options + $this->surchargesSum;

        if ($this->pvPower >= 6.5) {
            $this->price += $this->ppoz;
        }

        $this->price_with_deposit = $this->price - $this->deposit;
        $this->price_with_dotation = $this->price_with_deposit - $this->dotation->price;
        $this->price_with_relief = round($this->price_with_dotation * ($this->tax_relief->price / 100));

        $this->calcInstallment();

        if ($this->selected) {
            $this->emit('selected:update', [$this->price, $this->actual_power, $this->qty, $this->module->name]);
        }
    }

    public function calcInstallment()
    {
        if ($this->years) {
            $this->installment = round($this->price_with_deposit/($this->years * 12) + 0.0022 * $this->price_with_deposit);
            $this->installment2 = round($this->price_with_dotation/($this->years * 12) + 0.0022 * $this->price_with_dotation);
            $this->installment_final = round(($this->price_with_dotation - $this->price_with_relief)/($this->years * 12) + 0.0022 * ($this->price_with_dotation - $this->price_with_relief));
        }
    }

    public function mount()
    {
        $this->dotation = auth()->user()->getFactorByName('dotacja');
        $this->tax_relief = auth()->user()->getFactorByName('ulga');
        $this->refreshPrice();
    }

    public function render()
    {
        return view('livewire.calculations.module');
    }
}
