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
        $employees = User::role('przedstawiciel')->withTrashed()->where('id', '!=', auth()->user()->id)->orderBy('deleted_at', 'asc')->get();

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
}
