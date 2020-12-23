<?php

namespace App\Http\Livewire\Calculations;

use Livewire\Component;

class Chart extends Component
{
    public $consumption;
    public $production;
    public $pvPower;

    // Chart data
    public $chart_consumption = [];
    public $chart_production = [];

    protected $listeners = ['setChartData' => 'setChartData'];

    /**
     * Set chart data
     *
     * @return void
     */
    public function setChartData($data)
    {
        $this->consumption = $data[1];
        $this->pvPower = $data[0];

        $consumption[0] = round($this->consumption * 0.11, 1);
        $consumption[1] = round($this->consumption * 0.105, 1);
        $consumption[2] = round($this->consumption * 0.09, 1);
        $consumption[3] = round($this->consumption * 0.08, 1);
        $consumption[4] = round($this->consumption * 0.07, 1);
        $consumption[5] = round($this->consumption * 0.053, 1);
        $consumption[6] = round($this->consumption * 0.058, 1);
        $consumption[7] = round($this->consumption * 0.054, 1);
        $consumption[8] = round($this->consumption * 0.08, 1);
        $consumption[9] = round($this->consumption * 0.09, 1);
        $consumption[10] = round($this->consumption * 0.10, 1);
        $consumption[11] = round($this->consumption * 0.11, 1);

        $production[0] = round($this->pvPower * 30, 1);
        $production[1] = round($this->pvPower * 30, 1);
        $production[2] = round($this->pvPower * 85, 1);
        $production[3] = round($this->pvPower * 115, 1);
        $production[4] = round($this->pvPower * 120, 1);
        $production[5] = round($this->pvPower * 130, 1);
        $production[6] = round($this->pvPower * 140, 1);
        $production[7] = round($this->pvPower * 135, 1);
        $production[8] = round($this->pvPower * 112, 1);
        $production[9] = round($this->pvPower * 75, 1);
        $production[10] = round($this->pvPower * 48, 1);
        $production[11] = round($this->pvPower * 30, 1);

        $this->production = array_sum($production);
        $this->chart_consumption = $consumption;
        $this->chart_production = $production;
        $this->emit('updateChart');
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {
        $this->setChartData([$this->pvPower, $this->consumption]);
    }

    public function render()
    {
        return view('livewire.calculations.chart');
    }
}
