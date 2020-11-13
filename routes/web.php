<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ModuleController;

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

});
