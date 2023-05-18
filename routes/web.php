<?php

use App\Http\Controllers\Api\V1\DocumentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return view('errors.404');
});

Route::get('/', function () {
    return redirect('login');
});

Route::middleware(['auth', 'isResponsable'])->group(function () {
    Route::get('/home', [App\Http\Controllers\Api\V1\HomeController::class, 'index'])->name('home');
    Route::resource('document', DocumentController::class);
});

Auth::routes(['verify' => true]);
