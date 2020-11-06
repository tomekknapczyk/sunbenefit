<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
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
     * Show application dashboard
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Show employees list
     *
     * @return Illuminate\View\View
     */
    public function employees()
    {
        $employees = User::role('przedstawiciel')->withTrashed()->where('id', '!=', auth()->user()->id)->get();

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
        return view('employees.create');
    }
}
