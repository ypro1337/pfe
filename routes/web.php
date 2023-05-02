<?php

use App\Http\Controllers\StructureController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SessionsController;
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

Route::get('/', function () {
    return view('login');
})->middleware('guest');
Route::post('login', [LoginController::class, 'authenticate'])->name('login')->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
Route::get('logout', [SessionsController::class, 'destroy'])->middleware('auth'); //added cause cant logout when not admin

Route::resource('structures',StructureController::class, ['except' => [
    'edit','update'
]])->middleware('adminauth');
Route::get('structures/{slug}/edit', [StructureController::class, 'edit'])->name('structures.edit')->middleware('adminauth');
Route::put('structures/{slug}/edit', [StructureController::class, 'update'])->name('structures.update')->middleware('adminauth');
//TODO add authenticate instead of first route and add authenticate middleware in sections that require connection
