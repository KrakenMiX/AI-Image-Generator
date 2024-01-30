<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AipromptController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Kelompok X
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('aiprompt', [AipromptController::class, 'index'])->name('aiprompt');
Route::get('airesult', [AipromptController::class, 'image'])->name('airesult');
