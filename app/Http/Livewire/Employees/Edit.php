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
    public $editable;

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
            'password' => ['exclude_unless:pass,1', 'string', new Password, 'confirmed'],
            'editable' => ['required', 'boolean'],
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

        if ($this->editable == 0) {
            $this->employee->revokePermissionTo('edit margin');

            $this->employee->calculator->margin_1 = 0;
            $this->employee->calculator->margin_2 = 0;
            $this->employee->calculator->margin_3 = 0;
            $this->employee->calculator->save();
        } else {
            $this->employee->givePermissionTo('edit margin');
        }

        notify()->success('Przedstawiciel zapisany!', 'Sukces');
        
        return redirect()->route('employees');
    }

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount($id)
    {
        $this->employee = User::withTrashed()->find($id);
        $this->code = $this->employee->kod;
        $this->name = $this->employee->name;
        $this->lastname = $this->employee->lastname;
        $this->phone = $this->employee->phone;
        $this->email = $this->employee->email;
        $this->editable = $this->employee->hasPermissionTo('edit margin');
    }

    public function render()
    {
        return view('livewire.employees.edit');
    }
}
