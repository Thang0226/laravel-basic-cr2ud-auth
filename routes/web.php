<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', [TaskController::class, 'index'])
    ->name('tasks.index');

Route::get('/tasks/create', [TaskController::class,'create'])
    ->name('tasks.create')
    ->middleware('auth');

Route::post('/tasks', [TaskController::class,'store'])
    ->name('tasks.store')
    ->middleware('auth');

Route::put('/tasks/{id}', [TaskController::class,'update'])
    ->name('tasks.update')
    ->middleware('auth');

Route::get('/tasks/{id}/edit', [TaskController::class,'edit'])
    ->name('tasks.edit')
    ->middleware('auth');

Route::delete('/tasks/{id}', [TaskController::class,'destroy'])
    ->name('tasks.destroy')
    ->middleware('auth');

Route::get('/tasks/{id}', [TaskController::class,'show'])
    ->name('tasks.show');
