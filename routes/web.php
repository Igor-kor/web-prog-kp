<?php

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

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/coins', [App\Http\Controllers\Coin\CoinsController::class, 'getCoins'])->name('coins');
Route::get('/coin/{id}', [App\Http\Controllers\Coin\CoinsController::class, 'getCoin'])->name('coin');
Route::get('/marks', [App\Http\Controllers\Mark\MarksController::class, 'getMarks'])->name('marks');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/mycollectcoin', function () {
    return view('coins.my_coins');
})->middleware('auth')->name('mycollectcoin');

require __DIR__.'/auth.php';


