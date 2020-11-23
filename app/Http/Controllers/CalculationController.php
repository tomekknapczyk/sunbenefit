<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calculation;

class CalculationController extends Controller
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
     * Show calculations list
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        if ($this->authorize('list-all', Calculation::class)) {
            $calculations = Calculation::get();
        } else {
            $calculations = Calculation::where('user_id', auth()->user()->id)->get();
        }

        $data = [
            'calculations' => $calculations,
        ];

        return view('calculations.index', $data);
    }

    /**
     * Show form to creeate new calculation
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        if(!auth()->user()->calculator){
            notify()->error('Skonfiguruj swój kalkulator!', 'Błąd');
        
            return back();
        }

        if(!auth()->user()->calculator->module1 && !auth()->user()->calculator->module2 && !auth()->user()->calculator->module3){
            notify()->error('Musisz wybrać jakiś moduł w swoim kalkulatorze!', 'Błąd');
        
            return back();
        }
        $surcharges = \App\Models\Surcharge::get();

        $data = [
            'surcharges' => $surcharges,
        ];

        return view('calculations.create', $data);
    }

    /**
     * Show calculation edit form
     *
     * @return Illuminate\View\View
     */
    public function edit(Calculation $calculation)
    {
        $data = [
            'calculation' => $calculation,
        ];

        return view('calculations.edit', $data);
    }
}
