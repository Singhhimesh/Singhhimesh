<?php

use App\Http\Controllers\EmployeeController;
use App\Models\EmployeeModel;
use Illuminate\Support\Facades\Route;

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


Auth::routes();
// Route::get("home",array(EmployeeController::class,'index'))->name('home');


Route::middleware(['auth'])->group(function () {
    Route::resource("home", App\Http\Controllers\EmployeeController::class);
});
