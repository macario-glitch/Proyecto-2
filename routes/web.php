<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Empleados;

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

Route::middleware(['auth:sanctum','verified'])->group(function (){
    Route::get('/empleados',Empleados::class);
    Route::get('/dashboard',Function(){
        return view('dashboard');
    })->name('dashboard');
});