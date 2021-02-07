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

Route::group(['middleware' => ['auth', 'web']], function() {
    // この中に定義すれば、ログインユーザのみアクセス可能なルート定義が可能
    Route::redirect('/', 'boards');

    Route::get('/boards', [App\Http\Controllers\BoardController::class, 'index'])->name('boards');
    Route::get('/board_form/{hash_key?}', [App\Http\Controllers\BoardController::class, 'boardForm'])->name('board_form');
    Route::post('/board_confirm', [App\Http\Controllers\BoardController::class, 'boardConfirm'])->name('board_confirm');
    Route::post('/board_regist', [App\Http\Controllers\BoardController::class, 'boardRegist'])->name('board_regist'); 
    Route::post('/board_status_change', [App\Http\Controllers\BoardController::class, 'statusChange'])->name('board_status_change');
    Route::post('/board_delete', [App\Http\Controllers\BoardController::class, 'boardDelete'])->name('board_delete');


    Route::get('/events/{hash_key}', [App\Http\Controllers\EventController::class, 'index'])->name('events');
    Route::get('/event_form/{board_hash_key}/{event_hash_key?}', [App\Http\Controllers\EventController::class, 'eventForm'])->name('event_form');
    Route::post('/event_confirm', [App\Http\Controllers\EventController::class, 'eventConfirm'])->name('event_confirm');
    Route::post('/event_regist', [App\Http\Controllers\EventController::class, 'eventRegist'])->name('event_regist'); 
    Route::post('/event_status_change', [App\Http\Controllers\EventController::class, 'statusChange'])->name('event_status_change');
    Route::post('/event_delete', [App\Http\Controllers\EventController::class, 'eventDelete'])->name('event_delete');

});

Route::get('/entry/{any}', function () {
    return view('front.index');
})->where('any', '.*');

