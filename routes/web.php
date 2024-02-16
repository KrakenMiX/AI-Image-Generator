<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AipromptController;
use App\Http\Controllers\Community;
use App\Http\Controllers\Gallery;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoadingController;

/*
|--------------------------------------------------------------------------
| Informasi Kelompok
|--------------------------------------------------------------------------
|
| Anggota Kelompok:
| 
| 10121161 - Hanif Ahmad Syauqi
| 10121157 - Ilmi Faturrahman G.
| 10122790 - Rafly Maulana Z.
| 10121145 - Alfatihnaman Badharija P.M.
|
*/

// AUTHENTICATION
Route::get('/', [LoginController::class, 'index'])->name('index');
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');

// GENERATE AI
Route::get('aiprompt', [AipromptController::class, 'index'])->name('aiprompt')->middleware('auth');
Route::post('generate', [AipromptController::class, 'generateImage'])->name('generate');
Route::get('result', [AipromptController::class, 'image'])->name('airesult');
Route::get('download', [AipromptController::class, 'download'])->name('download');
Route::get('loading', [LoadingController::class, 'index'])->name('loading');
Route::get('post_result', [AipromptController::class, 'post_result'])->name('post_result');

// 
Route::get('gallery', [Gallery::class, 'index'])->name('gallery');
Route::get('gallery/detail', [Gallery::class, 'detail'])->name('gallerydetail');
Route::get('gallery/post', [Gallery::class, 'post'])->name('gallerypost');
Route::get('gallery/delete', [Gallery::class, 'delete'])->name('gallerydelete');
Route::get('community', [Community::class, 'index'])->name('community');
Route::get('community/detail', [Community::class, 'detail'])->name('communitydetail');
