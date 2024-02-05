<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AipromptController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Kelompok X
|
*/

//REGISTER
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

//LOGIN
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('aiprompt', [AipromptController::class, 'index'])->name('aiprompt')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::post('generate', [AipromptController::class, 'generateImage'])->name('generate');
Route::get('result', [AipromptController::class, 'image'])->name('airesult');
Route::get('download', [AipromptController::class, 'download'])->name('download');

