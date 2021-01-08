<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calculation;
use Illuminate\Support\Str;

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
        $calculations = Calculation::where('user_id', auth()->user()->id)->latest()->get();

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

        $calculations = Calculation::latest()->get();

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

        $data = [
            'calculation' => $calculation,
            'surcharges' => $surcharges,
        ];

        return view('calculations.edit', $data);
    }

    /**
     * Show calculation aum edit form
     *
     * @return Illuminate\View\View
     */
    public function editAum(Calculation $calculation)
    {
        if($calculation->getRawOriginal('status') != 1){
            notify()->error('Nie można edytować wybranej wyceny', 'Błąd');
        
            return back();
        }

        $data = [
            'calculation' => $calculation
        ];

        return view('calculations.edit-aum', $data);
    }

    public function getAgreement($filename){
        $url = storage_path('app/wyceny/'.$filename);

        $exists = \Storage::disk('local')->exists('wyceny/'.$filename);

        if (!$exists) {
            $calculation_code = \explode('.',$filename);
            $code = Str::of($calculation_code[0])->replace('_', '/');
            $calculation = \App\Models\Calculation::where('code', $code)->first();

            if (!$calculation) {
                notify()->error('Nie można pobrać wyceny', 'Błąd');
                return back();
            }

            $data = [
                'calculation' => $calculation
            ];

            $pdf = \PDF::loadView('pdf.agreement', $data)->setPaper([0, 0, 595.28, 841.89], 'portrait');

            \Storage::put('wyceny/'.$filename, $pdf->output());
        }   

        return response()->file($url);
    }

    public function getDesc($filename){
        $url = storage_path('app/opisy/'.$filename);

        $exists = \Storage::disk('local')->exists('opisy/'.$filename);

        if (!$exists) {
            $calculation_code = \explode('.', $filename);
            $code = Str::of($calculation_code[0])->replace('_', '/');
            $calculation = \App\Models\Calculation::where('code', $code)->first();

            if (!$calculation) {
                notify()->error('Nie można pobrać opisu', 'Błąd');
                return back();
            }

            $data = [
                'calculation' => $calculation
            ];

            $pdf = \PDF::loadView('pdf.opis', $data)->setPaper([0, 0, 595.28, 841.89], 'portrait');

            \Storage::put('opisy/'.$filename, $pdf->output());
        }

        return response()->file($url);
    }

    public function getProtocol($filename){
        $url = storage_path('app/protokoly/'.$filename);

        $exists = \Storage::disk('local')->exists('protokoly/'.$filename);

        if (!$exists) {
            $calculation_code = \explode('.', $filename);
            $code = Str::of($calculation_code[0])->replace('_', '/');
            $calculation = \App\Models\Calculation::where('code', $code)->first();

            if (!$calculation) {
                notify()->error('Nie można pobrać protokołu', 'Błąd');
                return back();
            }

            $data = [
                'calculation' => $calculation
            ];

            $pdf = \PDF::loadView('pdf.protokol', $data)->setPaper([0, 0, 595.28, 841.89], 'portrait');

            \Storage::put('protokoly/'.$filename, $pdf->output());
        }

        return response()->file($url);
    }

    public function getAum($filename){
        $url = storage_path('app/aum/'.$filename);

        $exists = \Storage::disk('local')->exists('aum/'.$filename);

        if (!$exists) {
            $calculation_code = \explode('.',$filename);
            $code = Str::of($calculation_code[0])->replace('_', '/');
            $calculation = \App\Models\Calculation::where('code', $code)->with('aum')->first();

            if (!$calculation) {
                notify()->error('Nie można pobrać arkusza', 'Błąd');
                return back();
            }

            $data = [
                'calculation' => $calculation
            ];

            $pdf = \PDF::loadView('pdf.aum', $data)->setPaper([0, 0, 595.28, 841.89], 'portrait');

            \Storage::put('aum/'.$filename, $pdf->output());
        }   

        return response()->file($url);
    }

    // public function test()
    // {
    //     $calculation = \App\Models\Calculation::where('id', 26)->with('aum', 'user')->first();

    //     $data = [
    //         'calculation' => $calculation
    //     ];

    //     // $pdf = \PDF::loadView('pdf.agreement', $data)->setPaper([0, 0, 595.28, 841.89], 'portrait');
    //     // $pdf = \PDF::loadView('pdf.opis', $data)->setPaper([0, 0, 595.28, 841.89], 'portrait');
    //     // $pdf = \PDF::loadView('pdf.protokol', $data)->setPaper([0, 0, 595.28, 841.89], 'portrait');
    //     $pdf = \PDF::loadView('pdf.aum', $data)->setPaper([0, 0, 595.28, 841.89], 'portrait');
    //     return $pdf->stream();
    // }
}
