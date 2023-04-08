<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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
// php artisan serve

Route::group(['prefix' => ''], function() {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/about-us', [HomeController::class, 'about'])->name('home.about');
    Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
    Route::get('/category/{id}', [HomeController::class, 'category'])->name('home.category');
    Route::get('/detail/{product}', [HomeController::class, 'detail'])->name('home.detail');
    Route::get('/login', [HomeController::class, 'login'])->name('home.login');
    Route::post('/login', [HomeController::class, 'check_login']);
    Route::get('/register', [HomeController::class, 'register'])->name('home.register');
    Route::post('/register', [HomeController::class, 'check_register']);
    Route::get('/customer',[HomeController::class,'customer'])->name('home.customer')->middleware('checkpass');
    Route::get('/logout', [HomeController::class, 'logout'])->name('home.logout');
    Route::post('/contact', [HomeController::class, 'send_contact']);
});
Route::group(['prefix' => 'cart'], function() {
    Route::get('/view', [CartController::class, 'view'])->name('cart.view');
    Route::get('/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('/update/{id}/{quantity?}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/update-all', [CartController::class, 'updateAll'])->name('cart.updateAll');
    Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout')->middleware('cus');
    Route::post('/checkout', [CartController::class, 'order_checkout'])->middleware('cus');
    Route::get('/verify-order/{token}', [CartController::class, 'verifyOrder'])->name('cart.verify_order');
});



Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'check_login']);

Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
   
    
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('/',[AdminController::class,'index'])->name('admin.index');
    Route::group(['prefix'=>'category'],function(){
            Route::get('/',[CategoryController::class,'index'])->name('category.index');
            Route::get('/create',[CategoryController::class,'create'])->name('category.create');
            Route::post('/create',[CategoryController::class,'add'])->name('category.add');
            Route::get('/edit/{cat}', [CategoryController::class, 'edit'])->name('category.edit');
            Route::put('/update/{cat}', [CategoryController::class, 'update'])->name('category.update');       
            Route::delete('/delete/{cat}', [CategoryController::class, 'delete'])->name('category.delete');
          
        });
        Route::group(['prefix'=>'product'],function(){
            Route::get('/',[ProductController::class,'index'])->name('product.index');
            Route::get('/create',[ProductController::class,'create'])->name('product.create');
            Route::post('/create',[ProductController::class,'add'])->name('product.add');
            Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    
            Route::put('/update/{product}', [ProductController::class, 'update'])->name('product.update');
            
            Route::delete('/delete/{product}', [ProductController::class, 'delete'])->name('product.delete');
        });
    });
});