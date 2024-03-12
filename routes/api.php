<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// Route::get('/categories', [Controller::class, 'getCategory'], function() {
//     return "Get all categories";
// });
// Route::post('/categories', function (Request $request) {
//     return "Create 1 category";
// });
// Route::get('/categories/{categoryId}', function (Request $request) {
//     return "Get 1 category by categoryID";

// });
// Route::patch('/categories/{categoryId}', function (Request $request) {
//     return "Update 1 category";
// });

// Route::delete('/categories/{categoryId}', function (Request $request) {
//     return "Delete 1 category";
// });


Route::get('/getproductbycategory', [ProductController::class, 'getproductbycategory']);
Route::get('/getallpromotedproducts', [ProductController::class, 'getallpromotedproducts']);
Route::get('/getproductbyid', [ProductController::class, 'getproductbyid']);
Route::get('/getproductbyidwithoutcategory', [ProductController::class, 'getProductByIdWithoutCategory']);
Route::get('/getproductbyname/{name}', [ProductController::class, 'getproductbyname']);
Route::get('/getallproducts', [ProductController::class, 'getallproducts']);
Route::get('/getproductbycategoryandbrand', [ProductController::class, 'getproductbycategoryandbrand']);
Route::get('/getallproductsbybrand', [ProductController::class, 'getallproductsbybrand']);
Route::get('/getbrandid', [BrandController::class, 'getbrandid']);


Route::delete('/products/{product_id}', [ProductController::class, 'deleteProduct']);

Route::patch('/products/{product_id}', [ProductController::class, 'updateProduct']);

Route::post('/createProduct', [ProductController::class, 'createProduct'])->middleware('can.create.category');

Route::post('/register', [AuthController::class, 'register']);

// Login
Route::post('/login1', [AuthController::class, 'login1']);

// Verify OTP
Route::get('/verify-otp', [AuthController::class, 'verifyOTP'])->name('verify.otp');
Route::middleware('auth:api')->get('/profile', [AuthController::class, 'getProfile']);
Route::get('/getallproducts', [ProductController::class, 'getallproducts'])->middleware('can.create.category');
// Route::get('/getallproducts', [ProductController::class, 'getallproducts'])->middleware('auth:api');



Route::get('/categories', [CategoryController::class, 'getCategories']);
Route::post('/createcategory', [CategoryController::class, 'createCategory']);
Route::delete('/category/{categoryId}', [CategoryController::class, 'deleteCategory']);
Route::patch('/categories/{categoryId}', [CategoryController::class, 'updateCategory']);
Route::get('/getcategorybyid', [CategoryController::class, 'getcategorybyid']);



Route::delete('/deleteuser', [AuthController::class, 'deleteUser']);
Route::middleware('auth:api')->delete('/deleteuser', [AuthController::class, 'deleteUser']);
Route::middleware('auth:api')->get('/user',function (Request $request){
    return $request->user();
});


// Verify OTP

// Route::get('/products/{productId}', function (Request $request) {
//     return "Get 1 product";

// });
// Route::patch('/products/{productId}', function (Request $request) {
//     return "Update 1 product";
// });

// Route::delete('/products/{productId}', function (Request $request) {
//     return "Delete 1 product";
// });

// Route::get('/categories/{categoryId/products}', function (Request $request) {
//     return "Get all products belong to categoryId";
// });

