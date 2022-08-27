<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UseController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;

Route::get('homeAdmin', [HomeController::class, 'homeAdmin'])->name('admin.homeAdmin');
Route::get('homeUse', [HomeController::class, 'homeUse'])->name('admin.homeUse');

//route đăng ký, đăng nhập admin và regiters
Route::get('admin/login', [UseController::class, 'login'])->name('admin.login');
Route::post('admin/Adminlogin', [UseController::class, 'checklogin']);
Route::get('admin/AdminLogout', [UseController::class, 'adminLogout'])->name('admin.AdminLogout');
Route::get('use/dangky', [UseController::class, 'dangky'])->name('use.dangky');
Route::post('use/dangky', [UseController::class, 'gui_dangky'])->name('use.formdangky');
Route::get('use/login', [UseController::class, 'loginuse'])->name('use.login');
Route::post('use/login', [UseController::class, 'post_loginuse']);
Route::get('logout', [UseController::class, 'logout'])->name('use.logout');


Route::group(['prefix' => 'admin','middleware' =>'auth'], function () {
    Route::resources([
        'category' => CategoryController::class,
        'product' => ProductController::class,
        'tag' => TagController::class,
        'post' => PostController::class,
        'orders' =>OrderController::class,
        'orderDetail' =>OrderDetailController::class,
    ]);

    //comment
    Route::post('comments/{post_id}', [CommentController::class, 'store'])->name('comments.store');
    Route::get('comments/{id}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::put('comments/{id}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');

    //slug
    Route::get('blog/{slug}', [BlogController::class, 'getslug'])->where('slug', '[\w\d\-\_]+')->name('blog.getslug');
});

Route::group(['prefix' => 'use'], function () {
    Route::get('homeUse', [HomeController::class, 'homeUse'])->name('use.homeUse');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//gio hang

Route::group(['prefix' => 'cart'], function () {
    Route::get('/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('/clean', [CartController::class, 'clean'])->name('cart.clean');
    Route::get('/view', [CartController::class, 'view'])->name('cart.cartView');
    Route::get('/hoaDon', [CartController::class, 'hoaDon'])->name('cart.hoaDon');
    Route::post('/posthoaDon', [CartController::class, 'posthoaDon'])->name('cart.posthoaDon');
});

//ho sơ
Route::get('/profile', [UseController::class, 'profile'])->name('use.profile');
Route::post('/postProfile/{id}', [UseController::class, 'postProfile'])->name('use.postProfile');
Route::get('/get-password', [UseController::class, 'getPassword'])->name('changePasswordPage');
Route::post('/change-password/{id}', [UseController::class, 'changePassword'])->name('changePasswordForm');