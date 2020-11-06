<?php

namespace App\Http\Livewire\Employees;

use Livewire\Component;
use App\Models\User;

class Show extends Component
{
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'userStatusChanged' => '$refresh',
    ];

    /**
     * Collection of employees.
     *
     * @param  array  $models
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public $employees;

    /**
     * Selected user
     *
     * @var mixed
     */
    public $selectedUser;

    /**
     * Indicates if user deletion is being confirmed.
     *
     * @var bool
     */
    public $confirm = false;

    /**
     * Confirm that the admin would like to deactivate user.
     *
     * @param  mixed  $user
     * @return void
     */
    public function confirmDeactivation($id)
    {
        $this->selectedUser = User::withTrashed()->findOrFail($id);
        $this->confirm = true;
    }

    /**
     * Change user status
     *
     * @param  mixed  $user
     * @return void
     */
    public function changeUserActive()
    {
        if ($this->selectedUser->trashed()) {
            $this->selectedUser->restore();
        } else {
            $this->selectedUser->delete();
        }

        $this->confirm = false;
        $this->selectedUser = null;

        $this->emit('userStatusChanged');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('livewire.employees.show');
    }
}
