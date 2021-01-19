<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show users list
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $employees = User::role('przedstawiciel')->withTrashed()->where('id', '!=', auth()->user()->id)->with('group')->orderBy('deleted_at', 'asc')->get();

        $data = [
            'employees' => $employees,
        ];

        return view('employees.index', $data);
    }

    /**
     * Show form to creeate new User
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $groups = \App\Models\Group::get();

        $data = [
            'groups' => $groups,
        ];

        return view('employees.create', $data);
    }

    /**
     * Show form to edit User calculator
     *
     * @return Illuminate\View\View
     */
    public function calculator()
    {
        $modules = \App\Models\Module::get();
        $surcharges = \App\Models\Surcharge::where('editable', 1)->get();
        $factors = \App\Models\Factor::where('editable', 1)->get();

        $data = [
            'modules' => $modules,
            'surcharges' => $surcharges,
            'factors' => $factors,
        ];

        return view('employees.calculator', $data);
    }

    /**
     * Show employee edit form
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $employee = User::withTrashed()->find($id);

        $data = [
            'employee' => $employee,
        ];

        return view('employees.edit', $data);
    }
}
