<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiGeneratorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api-generator', [ApiGeneratorController::class, 'form'])->name('api.form');
Route::post('/api-generator/generate', [ApiGeneratorController::class, 'generate'])->name('api.generate');

