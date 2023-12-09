<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\OrderManagementController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController as ProductFront;
use App\Http\Controllers\DashboardController as UserDashboardController;
use App\Http\Controllers\StaticPagesController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\OrderController;

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

Route::get('admin', [AuthController::class, 'login_admin']);

Route::post('admin', [AuthController::class, 'auth_login_admin']);

Route::get('admin/logout', [AuthController::class, 'logout_admin']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/login', [AuthController::class,'login_user']);

Route::post('/register', [AuthController::class,'register_user']);

Route::get('/logout', [AuthController::class,'logout']);

Route::group (['middleware' => 'user'],function () {

    Route::get('account/list', [UserDashboardController::class, 'list'])->name('account');
    Route::post('account/list', [UserDashboardController::class, 'edit'])->name('user.edit');

    Route::get('cart/list', [CartController::class, 'list']);
    Route::get('cart/add/{id}', [CartController::class, 'insert']);
    Route::post('cart/updateQuantity', [CartController::class,'updateQuantity'])->name('cart.updateQuantity');

    Route::get('cart/delete/{id}', [CartController::class, 'delete']);
    
    Route::get('checkout/list', [OrderController::class, 'list']);
    Route::post('checkout/add', [OrderController::class, 'insert']);
    
    Route::post('item/add/{id}', [ProductFront::class, 'insert']);

    Route::get('wishlist/list', [WishListController::class, 'list']);
    Route::get('wishlist/add/{id}', [WishListController::class, 'insert']);
    Route::get('wishlist/delete/{id}', [WishListController::class, 'delete']);
    
});

Route::group (['middleware' => 'admin'], function () {

    Route::get('admin/dashboard', [OrderManagementController::class, 'list']);
    Route::post('admin/dashboard/update/{id}', [OrderManagementController::class, 'update'])->name('admin.dashboard.update');

    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'insert']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);

    Route::get('admin/category/list', [CategoryController::class, 'list']);
    Route::get('admin/category/add', [CategoryController::class, 'add']);
    Route::post('admin/category/add', [CategoryController::class, 'insert']);
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('admin/category/edit/{id}', [CategoryController::class, 'update']);
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);

    Route::get('admin/sub_category/list', [SubCategoryController::class, 'list']);
    Route::get('admin/sub_category/add', [SubCategoryController::class, 'add']);
    Route::post('admin/sub_category/add', [SubCategoryController::class, 'insert']);
    Route::get('admin/sub_category/edit/{id}', [SubCategoryController::class, 'edit']);
    Route::post('admin/sub_category/edit/{id}', [SubCategoryController::class, 'update']);
    Route::get('admin/sub_category/delete/{id}', [SubCategoryController::class, 'delete']);

    Route::post('admin/get_sub_category', [SubCategoryController::class, 'get_sub_category']);

    Route::get('admin/color/list', [ColorController::class, 'list']);
    Route::get('admin/color/add', [ColorController::class, 'add']);
    Route::post('admin/color/add', [ColorController::class, 'insert']);
    Route::get('admin/color/edit/{id}', [ColorController::class, 'edit']);
    Route::post('admin/color/edit/{id}', [ColorController::class, 'update']);
    Route::get('admin/color/delete/{id}', [ColorController::class, 'delete']);

    Route::get('admin/product/list', [ProductController::class, 'list']);
    Route::get('admin/product/add', [ProductController::class, 'add']);
    Route::post('admin/product/add', [ProductController::class, 'insert']);
    Route::get('admin/product/edit/{id}', [ProductController::class, 'edit']);
    Route::post('admin/product/edit/{id}', [ProductController::class, 'update']);
    
    Route::get('admin/product/image_delete/{id}', [ProductController::class, 'image_delete']);
    Route::post(' admin/product_image_sortable', [ProductController::class, 'product_image_sortable']);
});

Route::get('/', [HomeController::class, 'home']);
Route::get('/about', [StaticPagesController::class, 'aboutUs'])->name('about');
Route::get('/search', [ProductFront::class, 'show_search']);

Route::get('product/list', [ProductFront::class, 'show'])->name('shop');
Route::get('{category?}/{subcategory?}', [ProductFront::class, 'getCategory']);

Route::get('item/list/{id}', [ProductFront::class, 'show_item']);
