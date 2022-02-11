<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('home',[HomeController::class,'index']);
Route::group(array('as'=>'category.','prefix'=>'category'),function(){
    Route::get('/',[CategoryController::class,'index'])->name("index");
    Route::get('add',[CategoryController::class,'add'])->name("add");
    Route::post('add',[CategoryController::class,'adddb'])->name("add");
    Route::get('{cid}/delete/',[CategoryController::class,'delete'])->name("delete");
    Route::get('{cid}/update/',[CategoryController::class,'update'])->name("update");
    Route::post('{cid}/update/',[CategoryController::class,'updatedb'])->name("update");
});
Route::group(array('as'=>'brand.','prefix'=>'brand'),function(){
    Route::get('/',[BrandController::class,'index'])->name("index");
    Route::get('add',[BrandController::class,'add'])->name("add");
    Route::post('add',[BrandController::class,'adddb'])->name("add");
    Route::get('{cid}/delete/',[BrandController::class,'delete'])->name("delete");
    Route::get('{cid}/update/',[BrandController::class,'update'])->name("update");
    Route::post('{cid}/update/',[BrandController::class,'updatedb'])->name("update");
});
Route::group(array('as'=>'product.','prefix'=>'product'),function(){
    Route::get('/',[ProductController::class,'index'])->name("index");
    Route::get('add',[ProductController::class,'add'])->name("add");
    Route::post('add',[ProductController::class,'adddb'])->name("add");
    Route::get('{cid}/delete/',[ProductController::class,'delete'])->name("delete");
    Route::get('{cid}/update/',[ProductController::class,'update'])->name("update");
    Route::post('{cid}/update/',[ProductController::class,'updatedb'])->name("update");
    Route::post('{cid}/product/',[ProductController::class,'product'])->name("product");
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
