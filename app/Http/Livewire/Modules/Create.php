<?php

namespace App\Http\Livewire\Modules;

use Livewire\Component;
use App\Models\Module;

class Create extends Component
{
    public $name;
    public $power;
    public $description;

    protected $messages = [
        'power.required' => 'Moc jest wymagana.',
        'name.required' => 'Nazwa jest wymagana.',
        'power.numeric' => 'Moc musi być liczbą',
    ];

    /**
     * Validate and create a new module.
     *
     * @param  array  $input
     * @return \App\Models\Module
     */
    public function createModule()
    {
        $validatedData = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'power' => ['required', 'numeric'],
            'description' => ['nullable', 'string'],
        ]);

        $module = Module::create([
            'name' => $this->name,
            'power' => $this->power,
            'description' => $this->description,
        ]);

        notify()->success('Moduł utworzony!', 'Sukces');
        
        return redirect()->route('modules');
    }

    public function render()
    {
        return view('livewire.modules.create');
    }
}
