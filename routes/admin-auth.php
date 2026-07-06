<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\TransactionController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('guest:admin')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('admin.register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('admin.login');
    Route::post('login', [LoginController::class, 'store']);

});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin.admin.index');
    Route::delete('/admin/{id}', [AdminController::class, 'destroyAdmin'])->name('admin.admin.index.destroy');


    Route::get('/pengguna', [AdminController::class, 'pengguna'])->name('admin.user.pengguna');
    Route::delete('/pengguna/{id}', [AdminController::class, 'destroy'])->name('admin.user.pengguna.destroy');

    Route::get('/transactions', [TransactionController::class, 'index'])->name('admin.transactions.index');
    Route::post('/transactions/update-status/{id}/{status}', [TransactionController::class, 'updateStatus'])->name('admin.transactions.updateStatus');

    Route::get('products/create', [ProductAdminController::class, 'create'])->name('admin.products.create');
    Route::get('/products', [ProductAdminController::class, 'index'])->name('admin.products.index');
    Route::post('/products', [ProductAdminController::class, 'store'])->name('admin.products.store');   
    Route::get('/products/{id}/edit', [ProductAdminController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{id}', [ProductAdminController::class, 'update'])->name('admin.products.update');
    Route::delete('admin/products/{id}', [ProductAdminController::class, 'destroy'])->name('admin.products.destroy');

    Route::get('/setting', [FooterController::class, 'index'])->name('admin.setting.footer');
    Route::post('/setting', [FooterController::class, 'update'])->name('admin.setting.update');
    
    Route::post('logout', [LoginController::class, 'destroy'])->name('admin.logout');
    
});

