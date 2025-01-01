<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\PasswordChangeController;
use App\Http\Controllers\User\RoleController;
use App\Http\Controllers\User\UserController;
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

//Admin Login
Route::get('admin-login', [LoginController::class, 'index'])->name('admin.show.login');
Route::post('login-check', [LoginController::class, 'loginCheck'])->name('admin.login');

//Member Login
Route::get('member-login', [LoginController::class, 'showMemberLoginForm'])->name('member.show.login');
Route::post('member-login-check', [LoginController::class, 'memberLoginCheck'])->name('member.login');

//Private Routes
Route::middleware(['preventBackHistory', 'admin'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

    //password change
    Route::get('/user-password-change', [PasswordChangeController::class, 'showPasswordChangeForm'])->name('user.showPasswordChangeForm');
    Route::put('/user-password/update',  [PasswordChangeController::class, 'updateUserPassword'])->name('user.updateUserPassword');

    //Access Control Routes
    Route::group(['prefix' => 'access-control'], function () {

        //Role
        Route::controller(RoleController::class)->group(function () {
            Route::get('/role/index', 'index')->name('role.index');
            Route::get('/role/create', 'create')->name('role.create');
            Route::post('/role/store', 'store')->name('role.store');
            Route::get('/role/{role_id}/edit', 'edit')->name('role.edit');
            Route::put('/role/{role_id}/update', 'update')->name('role.update');
            Route::put('/role/update-status', 'updateStatus')->name('role.update.status');
        });

        //Admin User
        Route::controller(UserController::class)->group(function () {
            Route::get('/user/index', 'index')->name('user.index');
            Route::get('/user/create', 'create')->name('user.create');
            Route::post('/user/store', 'store')->name('user.store');
            Route::get('/user/{user_id}/edit', 'edit')->name('user.edit');
            Route::put('/user/{user_id}/update', 'update')->name('user.update');
            Route::put('/user/update-status', 'updateStatus')->name('user.update.status');
        });
    });
});
