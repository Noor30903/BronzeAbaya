<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers VuthController;
/*mashael*/

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

Route::get('admin', [AuthController::class 'login_admin']);
Route::post('admin', [AuthController::class, 'auth_login_admin']);
Route::get('admin/logout', [AuthControllersiclass::class, 'logout_admin']);
/*mashael*/

Route::get('admin/admin/list', function () {
    return view('admin.admin.list');
});
/*mashael*/

Route::get('admin/login', function () {
    return view('admin.auth.login');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});
    
    
