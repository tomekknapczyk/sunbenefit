<?php

namespace App\Http\Livewire\Modules;

use Livewire\Component;
use App\Models\Module;

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
     * The component's module.
     *
     * @var Module
     */
    public $module;

    public $name;
    public $power;
    public $warranty;
    public $efficiency;
    public $performance;
    public $pmax;
    public $length;
    public $width;
    public $frame;
    public $area;
    public $mpower;
    public $description;

    protected $messages = [
        'name.required' => 'Nazwa jest wymagana.',
        'power.required' => 'Moc jest wymagana.',
        'power.numeric' => 'Moc musi być liczbą',
        'efficiency.numeric' => 'Sprawność musi być liczbą',
        'performance.numeric' => 'Wydajność musi być liczbą',
        'pmax.numeric' => 'P max musi być liczbą',
        'length.numeric' => 'Długość musi być liczbą',
        'width.numeric' => 'Szerokość musi być liczbą',
        'frame.numeric' => 'Ramka musi być liczbą',
        'area.numeric' => 'Powierzchnia musi być liczbą',
        'mpower.numeric' => 'Moc z m2 musi być liczbą',
    ];
    
    /**
     * Validate and save module.
     *
     * @param  array  $input
     * @return \App\Models\Module
     */
    public function saveModule()
    {
        $validatedData = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'power' => ['required', 'numeric'],
            'warranty' => ['nullable', 'string', 'max:255'],
            'efficiency' => ['nullable', 'numeric'],
            'performance' => ['nullable', 'numeric'],
            'pmax' => ['nullable', 'numeric'],
            'length' => ['required', 'numeric', 'min:0'],
            'width' => ['required', 'numeric', 'min:0'],
            'frame' => ['required', 'numeric', 'min:0'],
            'area' => ['nullable', 'numeric'],
            'mpower' => ['nullable', 'numeric'],
            'description' => ['nullable', 'string'],
        ]);

        $this->module->name = $this->name;
        $this->module->power = $this->power;
        $this->module->warranty = $this->warranty;
        $this->module->efficiency = $this->efficiency;
        $this->module->performance = $this->performance;
        $this->module->pmax = $this->pmax;
        $this->module->length = $this->length;
        $this->module->width = $this->width;
        $this->module->frame = $this->frame;
        $this->module->area = $this->area;
        $this->module->mpower = $this->mpower;
        $this->module->description = $this->description;
        $this->module->save();

        $this->emit('saved');
        
        // return redirect()->route('modules');
    }

    /**
     * Calculates area
     *
     * @return void
     */
    public function calcArea()
    {
        $this->area = round(($this->length * $this->width) / 1000000, 2);
        $this->calcMpower();
    }

    /**
     * Calculates mpower based on area
     *
     * @return void
     */
    public function calcMpower()
    {
        if ($this->area) {
            $this->mpower = round($this->power / $this->area, 2);
        } else {
            $this->mpower = 0;
        }
    }

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount(Module $module)
    {
        $this->module = $module;
        $this->name = $module->name;
        $this->power = $module->power?$module->power:'0.00';
        $this->warranty = $module->warranty;
        $this->efficiency = $module->efficiency?$module->efficiency:'0.00';
        $this->performance = $module->performance?$module->performance:'0.00';
        $this->pmax = $module->pmax?$module->pmax:'0.00';
        $this->length = $module->length?$module->length:'0';
        $this->width = $module->width?$module->width:'0';
        $this->frame = $module->frame?$module->frame:'0';
        $this->area = $module->area?$module->area:'0.00';
        $this->mpower = $module->mpower?$module->mpower:'0.00';
        $this->description = $module->description;
    }

    public function render()
    {
        return view('livewire.modules.edit');
    }
}
