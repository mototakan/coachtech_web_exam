<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

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

Route::get('/home', [todoController::class, 'index']);
Route::get('/', [TodoController::class, 'index'])->name('todo.index');
Route::post('/todo/create', [TodoController::class, 'create'])->name('todo.create');
Route::post('/todo/update{id}', [TodoController::class, 'update'])->name('todo.update');
Route::post('/todo/delete{id}', [TodoController::class, 'delete'])->name('todo.delete');
Route::get('/login', [AuthenticatedSessionController::class,'create']);
Route::post('/login', [AuthenticatedSessionController::class,'store']);
Route::get('/register',[RegisteredUserController::class,'create']);
Route::post('/register',[RegisteredUserController::class,'store']);
Route::post('/logout',[AuthenticatedSessionController::class,'destory']);
Route::get('/todo/find',[TodoController::class,'find']);
Route::get('/todo/search',[TodoController::class,'search']);
Route::get('/middleware', [TodoController::class, 'get']);
Route::post('/middleware', [TodoController::class, 'post']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


