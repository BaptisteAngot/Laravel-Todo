<?php

use App\Http\Controllers\TodoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/todo')->group(function () {
    Route::get('/all',[TodoController::class,'all']);
    Route::get('/{id}',[TodoController::class,'getOne']);
    Route::get('/create',[TodoController::class,'create']);
    Route::get('/update/{id}',[TodoController::class,'update']);
    Route::get('/delete/{id}',[TodoController::class,'delete']);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
