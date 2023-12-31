<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorController;

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
Route::get('/calculator', [CalculatorController::class, 'index']);
Route::get('/services', function () {
    return view('services');
});
Route::get('/facility', function () {
    return view('facility');
});
Route::get('/referals', function () {
    return view('referals');
});
Route::post('/calculator', [CalculatorController::class, 'send']);
