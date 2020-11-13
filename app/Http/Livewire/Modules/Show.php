<?php

namespace App\Http\Livewire\Modules;

use Livewire\Component;
use App\Models\Module;

class Show extends Component
{
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'modelStatusChanged' => '$refresh',
    ];

    /**
     * Collection of modules.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public $modules;

    /**
     * Selected module
     *
     * @var mixed
     */
    public $selectedModule;

    /**
     * Indicates if user status changing is being confirmed.
     *
     * @var bool
     */
    public $changingStatus = false;

    /**
     * Confirm that the admin would like to change user status.
     *
     * @param  integer  $id
     * @return void
     */
    public function confirmChangingStatus($id)
    {
        $this->selectedModule = Module::withTrashed()->findOrFail($id);
        $this->changingStatus = true;
    }

     /**
     * Change module status
     *
     * @return void
     */
    public function changeModuleStatus()
    {
        if ($this->selectedModule->trashed()) {
            $this->selectedModule->restore();
        } else {
            $this->selectedModule->delete();
        }

        $this->changingStatus = false;
        $this->selectedModule = null;

        $this->emit('modelStatusChanged');
    }

    public function render()
    {
        return view('livewire.modules.show');
    }
}