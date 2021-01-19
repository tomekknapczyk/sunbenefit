<?php

namespace App\Http\Livewire\Employees;

use Livewire\Component;
use App\Models\User;
use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class Edit extends Component
{
    public $code;
    public $name;
    public $lastname;
    public $phone;
    public $email;
    public $password;
    public $password_confirmation;
    public $pass;

    /**
     * The component's employee.
     *
     * @var User
     */
    public $employee;

    /**
     * Validate and update user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function updateEmployee()
    {
        $validatedData = $this->validate([
            'code' => ['nullable', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($this->employee->id)],
            'password' => ['exclude_unless:pass,1', 'string', new Password, 'confirmed']
        ]);

        $this->employee->name = $this->name;
        $this->employee->lastname = $this->lastname;
        $this->employee->kod = $this->code;
        $this->employee->phone = $this->phone;
        $this->employee->name = $this->name;
        $this->employee->email = $this->email;

        if ($this->pass == 1) {
            $this->employee->password = Hash::make($this->password);
        }

        $this->employee->save();

        notify()->success('Przedstawiciel zapisany!', 'Sukces');
        
        return redirect()->route('employees');
    }

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount(User $employee)
    {
        $this->employee = $employee;
        $this->code = $employee->kod;
        $this->name = $employee->name;
        $this->lastname = $employee->lastname;
        $this->phone = $employee->phone;
        $this->email = $employee->email;
    }

    public function render()
    {
        return view('livewire.employees.edit');
    }
}
