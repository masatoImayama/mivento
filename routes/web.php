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

use App\Http\Controllers\BoardController;
use App\Http\Controllers\EventController;

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    // この中に定義すれば、ログインユーザのみアクセス可能なルート定義が可能
    Route::redirect('/', 'boards');
    Route::get('/boards', [App\Http\Controllers\BoardController::class, 'index'])->name('boards');
    Route::get('/events', [App\Http\Controllers\EventController::class, 'index'])->name('events');
    Route::get('/event/{hash_key}', [App\Http\Controllers\EventController::class, 'edit'])->name('event.edit');
});

