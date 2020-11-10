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
     * Collection of groups.
     *
     * @param  array  $models
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public $groups;

    /**
     * Selected group
     *
     * @var mixed
     */
    public $group = "A";

    /**
     * Selected user
     *
     * @var mixed
     */
    public $selectedUser;

    /**
     * Indicates if user status changing is being confirmed.
     *
     * @var bool
     */
    public $changingStatus = false;

    /**
     * Indicates if user group changing is being confirmed.
     *
     * @var bool
     */
    public $changingGroup = false;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {
        $this->groups = \App\Models\Group::get();
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

    /**
     * Confirm that the admin would like to change user status.
     *
     * @param  mixed  $user
     * @return void
     */
    public function confirmChangingStatus($id)
    {
        $this->selectedUser = User::withTrashed()->findOrFail($id);
        $this->changingStatus = true;
    }

    /**
     * Confirm that the admin would like to change user group.
     *
     * @param  mixed  $user
     * @return void
     */
    public function confirmChangingGroup($id)
    {
        $this->selectedUser = User::withTrashed()->findOrFail($id);
        $this->group = $this->selectedUser->group->first()->name;
        $this->changingGroup = true;
    }

    /**
     * Change user status
     *
     * @param  mixed  $user
     * @return void
     */
    public function changeUserStatus()
    {
        if ($this->selectedUser->trashed()) {
            $this->selectedUser->restore();
        } else {
            $this->selectedUser->delete();
        }

        $this->changingStatus = false;
        $this->selectedUser = null;

        $this->emit('userStatusChanged');
    }

    /**
     * Change user group
     *
     * @param  mixed  $user
     * @return void
     */
    public function changeUserGroup()
    {
        $this->selectedUser->assingGroup($this->group);
        $this->changingGroup = false;
        $this->selectedUser = null;

        $this->emit('userStatusChanged');
    }
}
