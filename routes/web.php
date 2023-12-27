<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\trainerController;
use App\Http\Controllers\memberController;

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

Route::get('trainer', [trainerController::class, 'index'])->name('trainer');

Route::post('trainer', [trainerController::class, 'store']);

Route::post('trainer/{id}', [trainerController::class, 'destroy'])->name('trainer.destroy');

Route::get('member', [memberController::class, 'index']);

Route::post('member/{id}', [memberController::class, 'destroy'])->name('member.destroy');

Route::post('member', [memberController::class, 'store']);
