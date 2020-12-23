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
     * Show user calculations list
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {
        $calculations = Calculation::where('user_id', auth()->user()->id)->get();

        $data = [
            'calculations' => $calculations,
        ];

        return view('calculations.index', $data);
    }

    /**
     * Show all calculations list
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\View\View
     */
    public function all(Request $request)
    {
        $this->authorize('list-all', Calculation::class);

        $calculations = Calculation::get();

        $data = [
            'calculations' => $calculations,
        ];

        return view('calculations.all', $data);
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
        $surcharges = \App\Models\Surcharge::get();

        if($calculation->getRawOriginal('status') != 1){
            notify()->error('Nie można edytować wybranej wyceny', 'Błąd');
        
            return back();
        }

        // $calculator = auth()->user()->calculator()->first();

        // if($calculation->module_id !== $calculator->module_id_1 && $calculation->module_id !== $calculator->module_id_2 && $calculation->module_id !== $calculator->module_id_3){
        //     notify()->error('W kalkulatorze nie masz dostępnego modułu '.$calculation->module_name.'!', 'Błąd');
        
        //     return back();
        // }

        $data = [
            'calculation' => $calculation,
            'surcharges' => $surcharges,
        ];

        return view('calculations.edit', $data);
    }

    public function getAgreement($filename){
        $url = storage_path('app/wyceny/'.$filename);

        return response()->file($url);
    }

    public function getDesc($filename){
        $url = storage_path('app/opisy/'.$filename);

        return response()->file($url);
    }

    public function getProtocol($filename){
        $url = storage_path('app/protokoly/'.$filename);

        return response()->file($url);
    }

    public function test()
    {
        $calculation = \App\Models\Calculation::where('id', 7)->first();

        $data = [
            'calculation' => $calculation
        ];

        // $pdf = \PDF::loadView('pdf.agreement', $data)->setPaper([0, 0, 595.28, 841.89], 'portrait');
        // $pdf = \PDF::loadView('pdf.opis', $data)->setPaper([0, 0, 595.28, 841.89], 'portrait');
        $pdf = \PDF::loadView('pdf.protokol', $data)->setPaper([0, 0, 595.28, 841.89], 'portrait');
        return $pdf->stream();
    }
}
