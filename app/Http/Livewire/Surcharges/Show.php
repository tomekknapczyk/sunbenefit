<?php

namespace App\Http\Livewire\Surcharges;

use Livewire\Component;
use App\Models\Surcharge;

class Show extends Component
{
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'surchargeDeleted' => '$refresh',
    ];

    /**
     * Collection of surcharges.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public $surcharges;

    /**
     * Selected surcharge
     *
     * @var mixed
     */
    public $selectedSurcharge;

    /**
     * Indicates if surcharge deleting is being confirmed.
     *
     * @var bool
     */
    public $deleteSurcharge = false;

    /**
     * Confirm that the admin would like to change user status.
     *
     * @param  integer  $id
     * @return void
     */
    public function confirmDeleteSurcharge($id)
    {
        $this->selectedSurcharge = Surcharge::findOrFail($id);
        $this->deleteSurcharge = true;
    }

     /**
     * Change module status
     *
     * @return void
     */
    public function deleteSurcharge()
    {
        $this->selectedSurcharge->delete();
        $this->deleteSurcharge = false;
        $this->selectedSurcharge = null;

        $this->emit('surchargeDeleted');
    }

    public function render()
    {
        return view('livewire.surcharges.show');
    }
}
