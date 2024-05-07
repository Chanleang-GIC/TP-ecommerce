<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php


Route::get('/upload', [ImageController::class, 'showUploadForm'])->name('image.upload.for\m');
Route::post('/upload', [ImageController::class, 'upload'])->name('image.upload');

