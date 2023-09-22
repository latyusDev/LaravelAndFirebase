<?php

use App\Http\Controllers\Firebase\FirebaseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(FirebaseController::class)->group(function(){
    Route::get('/index',  'index');
    Route::get('/index/{key}',  'show');
    Route::get('/update/{key}',  'update');
    Route::get('/destroy/{key}',  'destroy');
    Route::get('/store',  'store');

});
Route::get('/', function () {
    return view('welcome');
});
