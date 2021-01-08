<?php

namespace App\Http\Livewire\Calculations;

use Livewire\Component;

class Show extends Component
{
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'calculationDeleted' => '$refresh',
    ];

    /**
     * Collection of calculations.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public $calculations;

    public $attachments;

    /**
     * Selected calculation
     *
     * @var mixed
     */
    public $selectedCalculation;

    /**
     * Indicates if calculation deleting is being confirmed.
     *
     * @var bool
     */
    public $deleteCalculation = false;

    /**
     * Confirm that the user would like delete calculation.
     *
     * @param  integer  $id
     * @return void
     */
    public function confirmDeleteCalculation($id)
    {
        $this->selectedCalculation = \App\Models\Calculation::findOrFail($id);
        $this->deleteCalculation = true;
    }

    /**
    * delete calculation
    *
    * @return void
    */
    public function deleteCalculation()
    {
        if ($this->selectedCalculation->getRawOriginal('status') != 1 || $this->selectedCalculation->user_id != auth()->user()->id) {
            $this->deleteCalculation = false;
            $this->selectedCalculation = null;
            $this->emit('deleteError');

            return;
        }

        \Storage::delete('wyceny/'. $this->selectedCalculation->code_slug() . '.pdf');
        \Storage::delete('protokoly/'. $this->selectedCalculation->code_slug() . '.pdf');
        \Storage::delete('opisy/'. $this->selectedCalculation->code_slug() . '.pdf');
        \Storage::delete('aum/'. $this->selectedCalculation->code_slug() . '.pdf');
        
        $this->selectedCalculation->delete();
        $this->deleteCalculation = false;
        $this->selectedCalculation = null;

        $this->emit('calculationDeleted');
    }

    public function mount()
    {
        $this->attachments = \App\Models\Attachment::get();
    }

    public function render()
    {
        return view('livewire.calculations.show');
    }
}
