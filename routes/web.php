<?php

use App\Http\Controllers\BiokitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('mobile', function () {
    return view('mobile.index');
});

Route::post('mobile/degradation', [BiokitController::class, 'newDegradation'])->name('mobile.degradation');
