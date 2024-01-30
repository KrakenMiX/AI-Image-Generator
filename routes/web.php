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

Route::get('/', [AipromptController::class, 'index'])->name('aiprompt');
Route::post('generate', [AipromptController::class, 'generateImage'])->name('generate');
Route::get('result', [AipromptController::class, 'image'])->name('airesult');
Route::get('download', [AipromptController::class, 'download'])->name('download');
