<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::apiResource("Users",UserController::class);
Route::middleware('auth:sanctum')->apiResource("Brands",BrandController::class);
Route::middleware('auth:sanctum')->apiResource("Category",CategoryController::class);
Route::middleware('auth:sanctum')->apiResource("SubCategory",SubCategoryController::class);
Route::middleware('auth:sanctum')->apiResource("Product",ProductController::class);
Route::post("login",[UserController::class,"login"])->name("user.login");
Route::middleware("auth:sanctum")->post("logout",[UserController::class,"logout"])->name("user.logout");
