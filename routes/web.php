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
    Route::prefix('banner')->group(function () {
        // hiển thị danh sách danh mục
        Route::get('/', [App\Http\Controllers\Backend\BannerController::class, 'get_Banner'])->name('admin.Banner');
        // thêm danh mục
        Route::get('create', [App\Http\Controllers\Backend\BannerController::class, 'createBanner'])->name('admin.createBanner');
        Route::post('create', [App\Http\Controllers\Backend\BannerController::class, 'post'])->name('admin.postBanner');
        // chỉnh sửa danh mục
        Route::get('update-{id}', [App\Http\Controllers\Backend\BannerController::class, 'get_update_Banner'])->name('admin.getUpdateBanner');
        Route::post('update-{id}', [App\Http\Controllers\Backend\BannerController::class, 'update_Banner'])->name('admin.updateBanner');

        // xóa danh mục
        Route::get('delete-{id}', [App\Http\Controllers\Backend\BannerController::class, 'deleteBanner'])->name('admin.deleteBanner');

        // tìm kiếm danh mục
        Route::get('search', [App\Http\Controllers\Backend\BannerController::class, 'search'])->name('admin.Banner.search');
    });
    // product ???
    Route::prefix('products')->group(function () {
        // get product
        Route::get('list', [App\Http\Controllers\Backend\ProductController::class, 'showProductList'])->name('admin.showProductList');
        // Route::get('search', [App\Http\Controllers\Backend\ProductController::class, 'search'])->name('admin.product.search');
        // post product
        Route::get('create', [App\Http\Controllers\Backend\ProductController::class, 'createProduct'])->name('admin.createProduct');
        Route::post('create', [App\Http\Controllers\Backend\ProductController::class, 'post'])->name('admin.addProduct');

        // update Product
        Route::get('list/update/{id}', [App\Http\Controllers\Backend\ProductController::class, 'getUpdateProduct'])->name('admin.getUpdateProduct');
        Route::post('list/update/{id}', [App\Http\Controllers\Backend\ProductController::class, 'updateProduct'])->name('admin.updateProduct');

        // delete product
        Route::get('list/delete/{id}', [App\Http\Controllers\Backend\ProductController::class, 'deleteProduct'])->name('admin.deleteProduct');
    });
});

Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'home'])->name('home');
Route::get('/san-pham', [App\Http\Controllers\Frontend\CollectionController::class , 'collectionAll'])->name('collection_all');
Route::get('/san-pham-{id}-{slug}', [App\Http\Controllers\Frontend\CollectionController::class, 'collectionCategory'])->name('collection_categories');
Route::get('/san-pham/{id}-{slug}', [App\Http\Controllers\Frontend\DetailsController::class, 'show_details'])->name('show_details');
Route::get('/gio-hang', [App\Http\Controllers\Frontend\ShoppingCartController::class, 'shopping_cart'])->name('shopping_cart');
Route::post('them-gio-hang', [App\Http\Controllers\Frontend\ShoppingCartController::class, 'addCartAjax'])->name('addCart.ajax');
Route::POST('/xoa-gio-hang', [App\Http\Controllers\Frontend\ShoppingCartController::class, 'deleteAjax'])->name('deleteCart.ajax');
Route::get('/thanh-toan', [App\Http\Controllers\Frontend\ShoppingCartController::class, 'payment'])->name('show_payment');