<?php

use App\Http\Controllers\EmployeeApiController;
use App\Models\EmployeeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// getting the student data using the api
// Route::get('students', [EmployeeApiController::class,"index"]);
Route::resource('/students',App\Http\Controllers\EmployeeApiController::class);
