<?php

namespace App\Http\Livewire\Calculations;

use Livewire\Component;

class Show extends Component
{
    /**
     * Collection of calculations.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public $calculations;

    public $attachments;

    public function mount()
    {
        $this->attachments = \App\Models\Attachment::get();
    }

    public function render()
    {
        return view('livewire.calculations.show');
    }
}
