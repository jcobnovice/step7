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
Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//商品情報画面のルーティング
Route::get('/products', [productsController::class, 'index'])->name('products.index');

//商品情報登録画面のルーティング
Route::get('/create', [productsController::class, 'create'])->name('products.create');
//商品情報登録画面送信ボタンのルーティング
Route::post('/cerate', [productsController::class, 'registSubmit'])->name('submit');

//詳細画面のルーティング
Route::get('/detail/{id}', [productsController::class, 'detail'])->name('products.detail');

//編集画面のルーティング
Route::get('/edit/{id}', [productsController::class, 'edit'])->name('products.edit');
//編集更新のルーティング
Route::POST('/edit/{id}', [productsController::class, 'updateSubmit'])->name('update');

//検索機能のルーティング
Route::get('/search', [productsController::class, 'search'])->name('search');

//削除ボタンのルーティング
Route::DELETE('/products/delete/{id}', [productsController::class, 'delete'])->name('delete');
