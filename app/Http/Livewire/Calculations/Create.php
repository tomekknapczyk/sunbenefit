<?php

namespace App\Http\Livewire\Calculations;

use Livewire\Component;

class Create extends Component
{
    /**
     * Collection of surcharges.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public $surcharges;

    /**
     * User calculator.
     *
     * @return \App\Models\Calculator
     */
    public $calculator;

    /**
     * Form fields
     */
    public $name = '-';
    public $nip;
    public $address = '-';
    public $city = '-';
    public $zip_code = '-';
    public $phone = '-';
    public $email = 'a@b.pl';
    public $invest_address = '-';
    public $invest_zip_code = '-';
    public $invest_city = '-';

    public $consumption = 4000;
    public $fees = 250;
    public $pv_power = 0;

    /**
     * Form factors
     */
    protected $power_price = 0.75;
    protected $perfect = 0.8;

    /**
     * Credit
     */
    public $deposit = 0;
    public $years = 10;

    /**
     * Surcharges
     */
    public $calc_surcharges = [];
    public $calc_surcharges_qty = [];

    public $selected_module = 2;

    protected $rules = [
        'name'                  => ['required', 'string', 'max:255'],
        'nip'                   => ['nullable', 'numeric', 'max:14'],
        'address'               => ['required', 'string', 'max:255'],
        'city'                  => ['required', 'string', 'max:255'],
        'zip_code'              => ['required', 'string', 'max:10'],
        'phone'                 => ['required', 'string', 'max:15'],
        'email'                 => ['required', 'email', 'max:255'],
        'invest_address'        => ['required', 'string', 'max:255'],
        'invest_zip_code'       => ['required', 'string', 'max:10'],
        'invest_city'           => ['required', 'string', 'max:255'],
        'consumption'           => ['required', 'numeric'],
        'deposit'               => ['nullable', 'numeric'],
        'years'                 => ['nullable', 'numeric'],
        'calc_surcharges.*'     => ['boolean', 'required'],
        'calc_surcharges_qty.*' => ['required', 'numeric', 'min:1'],
    ];

    protected $messages = [
        'name.required' => 'Nazwa jest wymagana.',
        'address.required' => 'Adres jest wymagany',
        'city.required' => 'Miasto jest wymagane',
        'zip_code.required' => 'Kod pocztowy jest wymagany',
        'phone.required' => 'Numer telefonu jest wymagany',
        'email.required' => 'Adres email jest wymagany',
        'invest_address.required' => 'Adres inwestycji jest wymagany',
        'invest_zip_code.required' => 'Kod pocztowy inwestycji jest wymagany',
        'invest_city.required' => 'Miasto inwestycji jest wymagany',
        'consumption.required' => 'Zużycie jest wymagane',
        'calc_surcharges_qty.*.required' => 'Ilość jest wymagana',
        'calc_surcharges_qty.*.min' => 'Minimalna ilość to :min',
    ];

    /**
     * Calculates consumption based on fees
     *
     * @return void
     */
    public function calcConsumption()
    {
        if ($this->fees) {
            $this->consumption = round($this->fees / ($this->power_price / 12), 2);
        } else {
            $this->consumption = 0;
        }
    }

    /**
     * Calculates fees based on consumption
     *
     * @return void
     */
    public function calcFees()
    {
        if ($this->consumption) {
            $this->fees = round($this->consumption * ($this->power_price / 12), 2);
        } else {
            $this->fees = 0;
        }
    }

    /**
     * Calculates perfect power of PV based on consumption
     *
     * @return void $this->perfectPower
     */
    public function getPerfectPowerProperty()
    {
        if ($this->consumption && $this->fees) {
            return round($this->consumption / 1000 / $this->perfect, 2);
        }

        return 0;
    }

    /**
     * Calculates perfect power of PV based on consumption
     *
     * @return void $this->perfectPower
     */
    public function calcPrice()
    {
        $this->emit('calcPrice', $this->pv_power);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveCalculation()
    {
        $validatedData = $this->validate([
            'name'                  => ['required', 'string', 'max:255'],
            'nip'                   => ['nullable', 'numeric', 'max:14'],
            'address'               => ['required', 'string', 'max:255'],
            'city'                  => ['required', 'string', 'max:255'],
            'zip_code'              => ['required', 'string', 'max:10'],
            'phone'                 => ['required', 'string', 'max:15'],
            'email'                 => ['required', 'email', 'max:255'],
            'invest_address'        => ['required', 'string', 'max:255'],
            'invest_zip_code'       => ['required', 'string', 'max:10'],
            'invest_city'           => ['required', 'string', 'max:255'],
            'consumption'           => ['required', 'numeric'],
            'deposit'               => ['nullable', 'numeric'],
            'years'                 => ['nullable', 'numeric'],
            'calc_surcharges.*'     => ['boolean', 'required'],
            'calc_surcharges_qty.*' => ['required', 'numeric', 'min:1'],
        ]);

        dd($this);
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {
        foreach ($this->surcharges as $surcharge) {
            $this->calc_surcharges[$surcharge->id] = 0;

            if ($surcharge->type == 'unit') {
                $this->calc_surcharges_qty[$surcharge->id] = 1;
            }
        }

        $this->calculator = auth()->user()->calculator;
    }

    public function render()
    {
        return view('livewire.calculations.create');
    }
}
