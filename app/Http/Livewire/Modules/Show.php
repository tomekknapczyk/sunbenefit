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
            
            $calcs_1 = \App\Models\Calculator::where('module_id_1', $this->selectedModule->id)->get();
            $calcs_2 = \App\Models\Calculator::where('module_id_2', $this->selectedModule->id)->get();
            $calcs_3 = \App\Models\Calculator::where('module_id_3', $this->selectedModule->id)->get();
            
            foreach($calcs_1 as $calc){
                $calc->module_id_1 = null;
                $calc->save();
            }

            foreach($calcs_2 as $calc){
                $calc->module_id_2 = null;
                $calc->save();
            }

            foreach($calcs_3 as $calc){
                $calc->module_id_3 = null;
                $calc->save();
            }
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