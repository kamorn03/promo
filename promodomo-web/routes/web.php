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


// show controller
Route::namespace('\App\Http\Controllers')->group(function () {
    Route::resource('/', 'ShowController');
});

Route::get('/show', function () {
    return view('show');
});

Route::get('/attach', function () {
    return view('attachshow');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
