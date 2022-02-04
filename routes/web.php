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
Route::get('/coin/{id}', function ($id) {
    return view('coins.coin_page',['id'=>$id]);
})->name('coin');
Route::get('/coinuser/{id}', function ($id) {
    return view('coins.coin_user_page',['id'=>$id]);
})->name('coinuser');
Route::get('/coinusernew/{id}', function ($id) {
    return view('coins.new_coin_user',['id'=>$id]);
})->middleware('auth')->name('coinusernew');
Route::get('/new_coin', function () {
    return view('coins.new_coin');
})->middleware('auth')->name('new_coin');
Route::get('/coin/{id}/edit', function ($id) {
    return view('coins.edit_coin',['id'=>$id]);
})->middleware('auth')->name('coin');
Route::get('/coinuser/{id}/edit', function ($id) {
    return view('coins.edit_coin_user',['id'=>$id]);
})->middleware('auth')->name('coinuser');

Route::get('/marks', [App\Http\Controllers\Mark\MarksController::class, 'getMarks'])->name('marks');
Route::get('/mark/{id}', function ($id) {
    return view('marks.mark_page',['id'=>$id]);
})->name('mark');
Route::get('/new_mark', function () {
    return view('marks.new_mark');
})->middleware('auth')->name('new_mark');
Route::get('/mark/{id}/edit', function ($id) {
    return view('marks.edit_mark',['id'=>$id]);
})->middleware('auth')->name('mark');


Route::get('/mycollectcoin', function () {
    return view('coins.my_coins');
})->middleware('auth')->name('mycollectcoin');

Route::get('/collectuser/{id}', function ($id) {
    return view('coins.user_coins',['id'=>$id]);
})->middleware('auth')->name('collectuser');

Route::get('/mycollectmark', function () {
    return view('marks.my_marks');
})->middleware('auth')->name('mycollectmark');
Route::get('/markusernew/{id}', function ($id) {
    return view('marks.new_mark_user',['id'=>$id]);
})->name('markusernew');
Route::get('/markuser/{id}', function ($id) {
    return view('marks.mark_user_page',['id'=>$id]);
})->name('markuser');
Route::get('/markuser/{id}/edit', function ($id) {
    return view('marks.edit_mark_user',['id'=>$id]);
})->middleware('auth')->name('markuser');

require __DIR__.'/auth.php';


