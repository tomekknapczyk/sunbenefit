<?php

namespace App\Http\Livewire\Employees;

use Livewire\Component;
use App\Models\User;
use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Support\Facades\Hash;

class Create extends Component
{
    use PasswordValidationRules;

    public $groups;
    public $code;
    public $name;
    public $lastname;
    public $phone;
    public $email;
    public $password;
    public $password_confirmation;
    public $group = 'A';
    public $editable = false;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'code' => ['nullable', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'group' => ['required', 'string'],
            'password' => $this->passwordRules(),
            'editable' => ['required', 'boolean'],
        ]);
    }

    /**
     * Validate and create a new user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function createUser()
    {
        $validatedData = $this->validate([
            'code' => ['nullable', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'group' => ['required', 'string'],
            'password' => $this->passwordRules(),
            'editable' => ['required', 'boolean'],
        ]);

        $user = User::create([
            'kod' => $this->code,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'phone' => $this->phone,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $user->assignRole('przedstawiciel');

        $user->assignGroup($this->group);
        
        if ($this->editable == 1) {
            $user->givePermissionTo('edit margin');
        }

        notify()->success('Przedstawiciel utworzony!', 'Sukces');
        
        return redirect()->route('employees');
    }
    
    public function render()
    {
        return view('livewire.employees.create');
    }
}
