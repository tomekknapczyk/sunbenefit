<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surcharge;

class SurchargeController extends Controller
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
     * Show surcharges list
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $surcharges = Surcharge::get();

        $data = [
            'surcharges' => $surcharges,
        ];

        return view('surcharges.index', $data);
    }

    /**
     * Show form to creeate new surcharge
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        return view('surcharges.create');
    }

    /**
     * Show surcharge edit form
     *
     * @return Illuminate\View\View
     */
    public function edit(Surcharge $surcharge)
    {
        $data = [
            'surcharge' => $surcharge,
        ];

        return view('surcharges.edit', $data);
    }
}
