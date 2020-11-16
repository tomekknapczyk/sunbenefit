<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // \App\Models\PriceList::first()->assignGroup('A');
        // $a = \App\Models\Module::first()->priceListsByName('A');

        return view('dashboard');
    }
}
