<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackgroundController;

Route::middleware('auth')->group(function () {
    Route::get('/backgrounds', [BackgroundController::class, 'index'])->name('backgrounds.index');
    Route::post('/backgrounds', [BackgroundController::class, 'update'])->name('backgrounds.update');
});

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/timer', [TimerController::class, 'index'])->middleware('auth');
