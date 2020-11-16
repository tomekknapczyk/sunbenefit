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
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public $employees;

    /**
     * Collection of groups.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public $groups;

    /**
     * Selected group
     *
     * @var string
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
     * @param  integer  $id
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
     * @param  integer  $id
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
     * @return void
     */
    public function changeUserGroup()
    {
        $this->selectedUser->assignGroup($this->group);
        $this->changingGroup = false;
        $this->selectedUser = null;

        $this->emit('userStatusChanged');
    }
}
