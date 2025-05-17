<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SekolahController;

Route::get('/', function () {
    return view('welcome');
});

Route::apiResource('sekolah', SekolahController::class);