<?php

namespace App\Http\Livewire\Employees;

use Livewire\Component;

class Calculator extends Component
{
    public $module_1 = 0;
    public $module_2 = 0;
    public $module_3 = 0;
    public $margin_1 = '0.00';
    public $margin_2 = '0.00';
    public $margin_3 = '0.00';

    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'modulesChanged' => '$refresh',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'module_1' => ['nullable'],
            'module_2' => ['nullable'],
            'module_3' => ['nullable'],
            'margin_1' => ['min:0', 'max:10000', 'numeric'],
            'margin_2' => ['min:0', 'max:10000', 'numeric'],
            'margin_3' => ['min:0', 'max:10000', 'numeric'],
        ]);
    }

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount()
    {
        if (auth()->user()->calculator) {
            $this->margin_1 = auth()->user()->calculator->margin_1;
            $this->margin_2 = auth()->user()->calculator->margin_2;
            $this->margin_3 = auth()->user()->calculator->margin_3;
            $this->module_1 = auth()->user()->calculator->module_id_1;
            $this->module_2 = auth()->user()->calculator->module_id_2;
            $this->module_3 = auth()->user()->calculator->module_id_3;
        }
    }

    /**
     * Validate and save calculator.
     *
     * @return void
     */
    public function saveCalculator()
    {
        $validatedData = $this->validate([
            'module_1' => ['nullable'],
            'module_2' => ['nullable'],
            'module_3' => ['nullable'],
            'margin_1' => ['min:0', 'max:10000', 'numeric'],
            'margin_2' => ['min:0', 'max:10000', 'numeric'],
            'margin_3' => ['min:0', 'max:10000', 'numeric'],
        ]);

        $calculator = auth()->user()->calculator;

        if (!$calculator) {
            $calculator = new \App\Models\Calculator;
            $calculator->user_id = auth()->user()->id;
        }

        $calculator->margin_1 = $this->margin_1;
        $calculator->margin_2 = $this->margin_2;
        $calculator->margin_3 = $this->margin_3;
        $calculator->module_id_1 = $this->module_1;
        $calculator->module_id_2 = $this->module_2;
        $calculator->module_id_3 = $this->module_3;
        $calculator->save();

        $this->emit('modulesChanged');
    }

    /**
     * Collection of modules.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public $modules;

    public function render()
    {
        return view('livewire.employees.calculator');
    }
}
