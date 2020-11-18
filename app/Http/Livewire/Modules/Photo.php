<?php

namespace App\Http\Livewire\Modules;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Photo extends Component
{
    use WithFileUploads;

    public $photo;

    /**
     * The component's module.
     *
     * @var Module
     */
    public $module;

    public function save()
    {
        $this->validate([
            'photo' => 'image|max:2048',
        ]);

        $name = Str::snake($this->module->name."_".time()).'.'.$this->photo->extension();
        
        if ($this->module->file_name) {
            Storage::delete('photos/'.$this->module->file_name);
        }

        $this->photo->storeAs('photos', $name);
        $this->module->file_name = $name;
        $this->module->save();

        $this->emit('saved_photo');
    }

    public function render()
    {
        return view('livewire.modules.photo');
    }
}
