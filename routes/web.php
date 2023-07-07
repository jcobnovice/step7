<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CompaniesController;

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products', [productsController::class, 'index'])->name('products.index');
Route::get('/create', [productsController::class, 'create'])->name('products.create');
//Route::get('/show/{id}', [productsController::class, 'show'])->name('produsts.show');
Route::get('/detail/{id}', [productsController::class, 'detail'])->name('products.detail');
Route::get('/edit/{id}', [productsController::class, 'edit'])->name('products.edit');
Route::post('/store', [productsController::class, 'store'])->name('products.store');
