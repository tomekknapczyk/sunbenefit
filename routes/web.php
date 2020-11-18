<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SurchargeController;
use App\Http\Controllers\DocumentController;

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

    Route::get('/pracownicy', [EmployeeController::class, 'index'])->name('employees')->middleware('can:list users');
    Route::get('/nowy-pracownik', [EmployeeController::class, 'create'])->name('create_employee')->middleware('can:create users');

    Route::get('/moduly', [ModuleController::class, 'index'])->name('modules')->middleware('can:list modules');
    Route::get('/nowy-modul', [ModuleController::class, 'create'])->name('create_module')->middleware('can:create module');
    Route::get('/edycja-modulu/{module}', [ModuleController::class, 'edit'])->name('edit_module')->middleware('can:edit module');

    Route::get('/doplaty', [SurchargeController::class, 'index'])->name('surcharges')->middleware('can:list surcharges');
    Route::get('/nowa-doplata', [SurchargeController::class, 'create'])->name('create_surcharge')->middleware('can:create surcharge');
    Route::get('/edycja-doplaty/{surcharge}', [SurchargeController::class, 'edit'])->name('edit_surcharge')->middleware('can:edit surcharge');

    Route::get('/dokumenty', [DocumentController::class, 'index'])->name('documents');
    Route::get('/nowy-dokument', [DocumentController::class, 'create'])->name('create_document')->middleware('can:create document');
});
