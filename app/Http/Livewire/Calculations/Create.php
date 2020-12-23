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
     * Edited calculation id.
     */
    public $calculation;

    /**
     * Form fields
     */
    public $company = 0;
    public $name = '-';
    public $nip;
    public $address = '-';
    public $city = '-';
    public $zipCode = '-';
    public $phone = '-';
    public $email = 'a@b.pl';
    public $investAddress = '-';
    public $investZipCode = '-';
    public $investCity = '-';
    public $samePlace = true;

    public $consumption = 4000;
    public $fees = 250;
    public $pvPower = 2;
    public $ppoz = 1500;
    public $solar = false;

    /**
     * Form factors
     */
    public $powerPrice = 1;
    public $perfect = 1;
    public $options = 0;

    /**
     * Credit
     */
    public $deposit = 0;
    public $years = 0;

    /**
     * Surcharges
     */
    public $calcSurcharges = [];
    public $calcSurchargesQty = [];

    public $selectedModule = 0;
    public $selectedName = null;
    public $selectedKwp = 0;
    public $selectedQty = 0;
    public $selectedPrice = 0;
    public $selectedPower = 0;
    public $selectedWarranty = 0;

    public $financingMethod;

    protected $rules = [
        'name'                  => ['required', 'string', 'max:255'],
        'nip'                   => ['nullable', 'string', 'max:12'],
        'address'               => ['required', 'string', 'max:255'],
        'city'                  => ['required', 'string', 'max:255'],
        'zipCode'               => ['required', 'string', 'max:10'],
        'phone'                 => ['required', 'string', 'max:15'],
        'email'                 => ['required', 'email', 'max:255'],
        'investAddress'         => ['required', 'string', 'max:255'],
        'investZipCode'         => ['required', 'string', 'max:10'],
        'investCity'            => ['required', 'string', 'max:255'],
        'consumption'           => ['required', 'numeric'],
        'deposit'               => ['nullable', 'numeric'],
        'years'                 => ['nullable', 'numeric'],
        'calcSurcharges.*'      => ['boolean', 'required'],
        'calcSurchargesQty.*'   => ['required', 'numeric', 'min:1'],
        'financingMethod'       => ['required'],
    ];

    protected $messages = [
        'name.required' => 'Nazwa jest wymagana',
        'address.required' => 'Adres jest wymagany',
        'city.required' => 'Miasto jest wymagane',
        'zipCode.required' => 'Kod pocztowy jest wymagany',
        'phone.required' => 'Numer telefonu jest wymagany',
        'email.required' => 'Adres email jest wymagany',
        'investAddress.required' => 'Adres inwestycji jest wymagany',
        'investZipCode.required' => 'Kod pocztowy inwestycji jest wymagany',
        'investCity.required' => 'Miasto inwestycji jest wymagany',
        'consumption.required' => 'Zużycie jest wymagane',
        'calcSurcharges.*.required' => 'Ilość jest wymagana',
        'calcSurchargesQty.*.min' => 'Minimalna ilość to :min',
        'financingMethod.required' => 'Sposób finansowania jest wymagany',
    ];

    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'selected:update' => 'updateSelectedInfo',
    ];

    /**
     * Calculates surcharges sum
     *
     * @return void
     */
    public function updateCompany()
    {
        $this->emit('company:change', $this->company);
    }

    /**
     * Calculates consumption based on fees
     *
     * @return void
     */
    public function calcConsumption()
    {
        if ($this->fees && $this->powerPrice) {
            if (\is_numeric($this->fees) && \is_numeric($this->powerPrice) && \is_numeric($this->pvPower)) {
                $this->consumption = round($this->fees / ($this->powerPrice / 12));
                $this->emit('setChartData', [$this->pvPower, $this->consumption]);
            }
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
        if ($this->consumption && $this->powerPrice) {
            if (\is_numeric($this->consumption) && \is_numeric($this->powerPrice) && \is_numeric($this->pvPower)) {
                $this->fees = round($this->consumption * ($this->powerPrice / 12));
                $this->emit('setChartData', [$this->pvPower, $this->consumption]);
            }
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
        if ($this->consumption && $this->fees && $this->perfect) {
            if (\is_numeric($this->consumption) && \is_numeric($this->fees) && \is_numeric($this->perfect)) {
                return round($this->consumption / 1000 / $this->perfect, 2);
            }
        }

        return 0;
    }

    /**
     * Calculates surcharges sum
     *
     * @return void
     */
    public function calcSurcharges()
    {
        $this->emit('surcharges:change', [$this->surcharges, $this->calcSurcharges, $this->calcSurchargesQty]);
    }

    /**
     * Calculates perfect power of PV based on consumption
     *
     * @return void
     */
    public function calcPrice()
    {
        if (\is_numeric($this->pvPower) && \is_numeric($this->consumption)) {
            $this->emit('setChartData', [$this->pvPower, $this->consumption]);
            $this->emit('pvPower:change', $this->pvPower);
            // $this->emit('surcharges:change', [$this->surcharges, $this->calcSurcharges, $this->calcSurchargesQty]);
        }
    }

    /**
     * Calculates Deposit
     *
     * @return void
     */
    public function calcDeposit()
    {
        if (\is_numeric($this->deposit)) {
            $this->emit('deposit:change', $this->deposit);
        }
    }

    /**
     * Calculates Years
     *
     * @return void
     */
    public function calcYears()
    {
        if (\is_numeric($this->years)) {
            $this->emit('years:change', $this->years);
        }
    }

    /**
     * Solar Edge change
     *
     * @return void
     */
    public function calcSolar()
    {
        $this->solar = !$this->solar;
        $this->emit('solar:change', $this->solar);
    }

    /**
     * Set invest address same as investor address if same place
     *
     * @return void
     */
    public function changeAddress()
    {
        if ($this->samePlace) {
            $this->investAddress = $this->address;
        }
    }

    /**
     * Set invest city same as investor city if same place
     *
     * @return void
     */
    public function changeCity()
    {
        if ($this->samePlace) {
            $this->investCity = $this->city;
        }
    }

    /**
     * Set invest zip code same as investor zip code if same place
     *
     * @return void
     */
    public function changeZipCode()
    {
        if ($this->samePlace) {
            $this->investZipCode = $this->zipCode;
        }
    }

    /**
     * Set invest place
     *
     * @return void
     */
    public function changeSamePlace()
    {
        if ($this->samePlace) {
            $this->investAddress = '';
            $this->investCity = '';
            $this->investZipCode = '';
        } else {
            $this->investAddress = $this->address;
            $this->investCity = $this->city;
            $this->investZipCode = $this->zipCode;
        }

        $this->samePlace = !$this->samePlace;
    }

    /**
     * Update selected module info
     *
     * @return void
     */
    public function updateSelectedInfo($data)
    {
        $this->selectedPrice = $data[0];
        $this->selectedPower = $data[1];
        $this->selectedQty = $data[2];
        $this->selectedName = $data[3];
        $this->selectedKwp = $data[4];
        $this->selectedWarranty = $data[5];
    }

    public function updated($propertyName)
    {
        // $this->validateOnly($propertyName);
    }

    public function saveCalculation()
    {
        $this->validate();

        if ($this->calculation) {
            $edited = \App\Models\Calculation::where('id', $this->calculation)->first();

            if ($edited->getRawOriginal('status') != 1) {
                notify()->error('Nie można edytować wybranej wyceny', 'Błąd');
        
                return back();
            }

            \Storage::delete('wyceny/'. $edited->code . '.pdf');
            \Storage::delete('protokoly/'. $edited->code . '.pdf');
            \Storage::delete('opisy/'. $edited->code . '.pdf');
            
            $edited->delete();
        }

        $code = 'wycena_' . time();

        $calculation = \App\Models\Calculation::create([
            'code' => $code,
            'user_id' => auth()->user()->id,
            'status' => 1,
            'name' => $this->name,
            'address' => $this->address,
            'zip_code' => $this->zipCode,
            'city' => $this->city,
            'nip' => $this->nip,
            'phone' => $this->phone,
            'email' => $this->email,
            'invest_address' => $this->investAddress,
            'invest_zip_code' => $this->investZipCode,
            'invest_city' => $this->investCity,
            'same_place' => $this->samePlace,
            'company' => $this->company,
            'deposit' => $this->deposit,
            'years' => $this->years,
            'pv_power' => $this->pvPower,
            'solar' => $this->solar,
            'options' => $this->options,
            'financing_method' => $this->financingMethod,
            'final_price' => $this->selectedPrice,
            'final_power' => $this->selectedPower,
            'module_id' => $this->selectedModule,
            'module_name' => $this->selectedName,
            'module_power' => $this->selectedKwp,
            'module_qty' => $this->selectedQty,
            'module_warranty' => $this->selectedWarranty,
            'calc_surcharges' => $this->calcSurcharges,
            'calc_surcharges_qty' => $this->calcSurchargesQty,
        ]);

        $pdf = \PDF::loadView('pdf.agreement', compact('calculation'))->setPaper([0, 0, 595.28, 841.89], 'portrait');

        \Storage::put('wyceny/' . $code . '.pdf', $pdf->output());

        $pdf = \PDF::loadView('pdf.protokol', compact('calculation'))->setPaper([0, 0, 595.28, 841.89], 'portrait');

        \Storage::put('protokoly/' . $code . '.pdf', $pdf->output());

        $pdf = \PDF::loadView('pdf.opis', compact('calculation'))->setPaper([0, 0, 595.28, 841.89], 'portrait');

        \Storage::put('opisy/' . $code . '.pdf', $pdf->output());
        
        notify()->success('Wycena została zapisana!', 'Sukces');
        
        return redirect()->route('calculations');
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {
        foreach ($this->surcharges as $surcharge) {
            if (!array_key_exists($surcharge->id, $this->calcSurcharges)) {
                $this->calcSurcharges[$surcharge->id] = 0;
            }

            if ($surcharge->type == 'unit') {
                if (!array_key_exists($surcharge->id, $this->calcSurchargesQty)) {
                    $this->calcSurchargesQty[$surcharge->id] = 1;
                }
            }
        }

        $this->calculator = auth()->user()->calculator;
        $this->powerPrice = auth()->user()->getFactorByName('cena_pradu')->price;
        $this->perfect = auth()->user()->getFactorByName('perfect_power')->price;
        $this->ppoz = auth()->user()->getFactorByName('cena_65')->price;
        $this->options = auth()->user()->getFactorByName('projekt')->price + auth()->user()->getFactorByName('uziemienie')->price + auth()->user()->getFactorByName('acdc')->price;
        // $this->calcConsumption();
    }

    public function render()
    {
        return view('livewire.calculations.create');
    }
}
