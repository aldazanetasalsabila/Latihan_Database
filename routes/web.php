<?php

use App\Http\Controllers\ProductController; // Pastikan ini di-import
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('products.index'); 
});
Route::resource('products', ProductController::class); // Pastikan ini sudah products