<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProductController::class, 'index'])->name('product.index'); //главная страница

Route::group(
    ['prefix' => 'product'],
    function () {

        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit'); //Страница редактирования товара

        Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update'); //Отправить изменения товара

        Route::get('/create', [ProductController::class, 'create'])->name('product.create'); //Страница создания товара

        Route::post('/store', [ProductController::class, 'store'])->name('product.store'); // Сохранение товара

        Route::post('/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy'); // Удаление товара

    }
);

//Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/cart/add', [ProductController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [OrderController::class, 'showCart'])->name('cart.show');
Route::post('/order', [OrderController::class, 'createOrder'])->name('order.create');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
