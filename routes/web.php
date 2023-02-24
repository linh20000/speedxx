<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('admin/login', [App\Http\Controllers\Backend\LoginController::class, 'showLogin'])->name('admin.showlogin');
Route::get('admin', [App\Http\Controllers\Backend\LoginController::class, 'showLogin'])->name('admin.showlogin');
// đăng nhập 
Route::post('admin/login', [App\Http\Controllers\Backend\LoginController::class, 'login'])->name('admin.login');
// Đăng xuất trang quản lí
Route::get('/admin/logout',[App\Http\Controllers\Backend\LoginController::class,'logout'])->name('admin.logout');


// 
Route::prefix('admin')->middleware('auth')->group(function () {
    // Trang chủ admin
    Route::get('/showDashbroad', [App\Http\Controllers\Backend\LoginController::class, 'showHome'])->name('admin.home');

    // Danh mục 
    Route::prefix('category')->group(function() {
        
        // hiển thị danh sách danh mục
        Route::get('/', [App\Http\Controllers\Backend\CategoryController::class, 'get_category'])->name('admin.category');
        // thêm danh mục
        Route::get('create', [App\Http\Controllers\Backend\CategoryController::class, 'createCategory'])->name('admin.createCategory');
        Route::post('create', [App\Http\Controllers\Backend\CategoryController::class, 'post'])->name('admin.postCategory');
        // chỉnh sửa danh mục
        Route::get('update-{id}', [App\Http\Controllers\Backend\CategoryController::class, 'get_update_category'])->name('admin.getUpdateCategory');
        Route::post('update-{id}', [App\Http\Controllers\Backend\CategoryController::class, 'update_category'])->name('admin.updateCategory');

        // xóa danh mục
        Route::get('delete-{id}', [App\Http\Controllers\Backend\CategoryController::class, 'deleteCategory'])->name('admin.deleteCategory');

        // tìm kiếm danh mục
        Route::get('search', [App\Http\Controllers\Backend\CategoryController::class,'search'])->name('admin.category.search');
    });
});

Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'home'])->name('home');
Route::get('/trang-chu', [App\Http\Controllers\Frontend\HomeController::class, 'home'])->name('home');