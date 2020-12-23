<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factor;

class FactorController extends Controller
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
     * Show factors list
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $factors = Factor::get();

        $data = [
            'factors' => $factors,
        ];

        return view('factors.index', $data);
    }

    /**
     * Show factor edit form
     *
     * @return Illuminate\View\View
     */
    public function edit(Factor $factor)
    {
        $data = [
            'factor' => $factor,
        ];

        return view('factors.edit', $data);
    }
}
