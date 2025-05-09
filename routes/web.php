<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackgroundController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ToDoController;


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

Auth::routes();


Route::get('/', function () {
    return view('welcome');
});

Route::post('/complete-session', function (Request $request) {
    $user = Auth::user();
    if ($user) {
        $user->points += 10; // Add 10 points per session
        $user->save();
        return response()->json(['success' => true, 'points' => $user->points]);
    }
    return response()->json(['success' => false], 401);
});

// routes/web.php
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/complete-session', [HomeController::class, 'completeSession'])->middleware('auth');
// Route::post('/update-background', [UserController::class, 'updateBackground']);

Route::post('/update-background', [UserController::class, 'updateBackground'])->middleware('auth');
Route::get('/motoboosters', function () {
    return view('motoboosters');
})->name('motoboosters');

Route::get('/skillboosters', function () {
    return view('skillboosters');
})->name('skillboosters');

Route::get('/mindboosters', function () {
    return view('mindboosters');
})->name('mindboosters');

Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
Route::put('/todos/{todo}', [TodoController::class, 'update'])->name('todos.update');
Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');
// Route::get('/todos/history', [TodoController::class, 'history'])->name('todos.history');
// Route::get('/todos/history', [TodoController::class, 'history']);
Route::get('/history', [TodoController::class, 'showHistory'])->name('history');

