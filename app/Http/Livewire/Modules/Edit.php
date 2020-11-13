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
    public $description;
    
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
            'description' => ['nullable', 'string'],
        ]);

        $this->module->name = $this->name;
        $this->module->power = $this->power;
        $this->module->description = $this->description;
        $this->module->save();

        $this->emit('saved');
        
        // return redirect()->route('modules');
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
        $this->power = $module->power;
        $this->description = $module->description;
    }

    public function render()
    {
        return view('livewire.modules.edit');
    }
}
