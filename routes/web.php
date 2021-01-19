<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SurchargeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\CalculationController;
use App\Http\Controllers\FactorController;
use App\Http\Controllers\AttachmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/pracownicy', [EmployeeController::class, 'index'])->name('employees')->middleware('can:list user');
    Route::get('/nowy-pracownik', [EmployeeController::class, 'create'])->name('create_employee')->middleware('can:create user');
    Route::get('/konfiguracja-kalkulatora', [EmployeeController::class, 'calculator'])->name('calculator');
    Route::get('/edycja-pracownika/{id}', [EmployeeController::class, 'edit'])->name('edit_employee')->middleware('can:edit employee');

    Route::get('/moduly', [ModuleController::class, 'index'])->name('modules')->middleware('can:list module');
    Route::get('/nowy-modul', [ModuleController::class, 'create'])->name('create_module')->middleware('can:create module');
    Route::get('/edycja-modulu/{module}', [ModuleController::class, 'edit'])->name('edit_module')->middleware('can:edit module');

    Route::get('/doplaty', [SurchargeController::class, 'index'])->name('surcharges')->middleware('can:list surcharge');
    Route::get('/nowa-doplata', [SurchargeController::class, 'create'])->name('create_surcharge')->middleware('can:create surcharge');
    Route::get('/edycja-doplaty/{surcharge}', [SurchargeController::class, 'edit'])->name('edit_surcharge')->middleware('can:edit surcharge');

    Route::get('/wspolczynniki', [FactorController::class, 'index'])->name('factors')->middleware('can:list factors');
    Route::get('/edycja-wspolczynnika/{factor}', [FactorController::class, 'edit'])->name('edit_factor')->middleware('can:edit factors');

    Route::get('/dokumenty', [DocumentController::class, 'index'])->name('documents');
    Route::get('/nowy-dokument', [DocumentController::class, 'create'])->name('create_document')->middleware('can:create document');
    Route::get('/pobierz-dokument/{filename}', [DocumentController::class, 'getDocument'])->name('getDocument');

    Route::get('/zalaczniki', [AttachmentController::class, 'index'])->name('attachments');
    Route::get('/nowy-zalacznik', [AttachmentController::class, 'create'])->name('create_attachment')->middleware('can:create attachment');
    Route::get('/pobierz-zalacznik/{filename}', [AttachmentController::class, 'getAttachment'])->name('getAttachment');

    Route::get('/wyceny', [CalculationController::class, 'index'])->name('calculations');
    Route::get('/nowa-wycena', [CalculationController::class, 'create'])->name('create_calculation');
    Route::get('/edycja-wyceny/{calculation}', [CalculationController::class, 'edit'])->name('edit_calculation');
    Route::get('/edycja-aum/{calculation}', [CalculationController::class, 'editAum'])->name('edit_calculation_aum');
    Route::get('/lista-wycen', [CalculationController::class, 'all'])->name('all_calculations');
    Route::get('/pobierz-umowe/{filename}', [CalculationController::class, 'getAgreement'])->name('getAgreement');
    Route::get('/pobierz-opis/{filename}', [CalculationController::class, 'getDesc'])->name('getDesc');
    Route::get('/pobierz-protokol/{filename}', [CalculationController::class, 'getProtocol'])->name('getProtocol');
    Route::get('/pobierz-aum/{filename}', [CalculationController::class, 'getAum'])->name('getAum');

    // Route::get('/test', [CalculationController::class, 'test'])->name('test'); // tesdt pdfa
});
