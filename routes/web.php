<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubCategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [App\Http\Controllers\CategoryController::class, 'index']);
Route::post('/', [App\Http\Controllers\CategoryController::class, 'StoreCategory'])->name('store.category');


Route::get('/', [App\Http\Controllers\SubCategoryController::class, 'AddSubCategory']);
Route::post('/subcategory', [App\Http\Controllers\SubCategoryController::class, 'StoreSubCategory'])->name('store.subcategory');
Route::get('/subcategory/{category_id}', [App\Http\Controllers\SubCategoryController::class, 'GetSubCategory']);

// Route::get('/subcategory/ajax/{category_id}' , 'GetSubCategory');
