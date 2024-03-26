<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomepageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [WelcomeController::class, 'welcome']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', function(){
    $menus = ["Home", "Product", "Category", "Blog"];
    $title = "Awesome App";
    $purchasedItems = ["Book", "Pecil", "Eraser"];
    // return view('frontend.home', compact("menus","title","purchasedItems"));
    return view('frontend.home',["menus"=>$menus, "title"=>$title, "purchasedItems"=>$purchasedItems]);
});

Route::get('/todo', [TodoController::class, 'index']);
Route::get('/todo/add', [TodoController::class, 'add']);
Route::get('/todo/edit', [TodoController::class, 'edit']);
Route::post('/todo/store', [TodoController::class, 'store']);



Route::get('/', [HomepageController::class, 'renderHome'])->name('homepage');

require __DIR__.'/auth.php';
