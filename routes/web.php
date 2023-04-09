<?php

use App\Http\Controllers\StructureController;
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
    return view('welcome');
});

Route::resource('structures',StructureController::class, ['except' => [
    'edit','update'
]]);
Route::get('structures/{slug}/edit', [StructureController::class, 'edit'])->name('structures.edit');
Route::put('structures/{slug}/edit', [StructureController::class, 'update'])->name('structures.update');
