<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return to_route('request.form');
});

Route::prefix('form')->group(function () {
   Route::get('/', [RequestController::class, 'index'])->name('request.form');
   Route::post('/', [RequestController::class, 'store'])->name('request.store');

   Route::get('/list', [RequestController::class, 'list'])->name('request.list');
});
