<?php

use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('page.crm.welcome');
});


Route::prefix('backend')->group(function () {
    Route::get('/',  [UserController::class, 'index'])->name('get-user-index');
    
    Route::prefix('user')->group(function () {
        Route::get('/',  [UserController::class, 'index'])->name('get-user-index');
        Route::get('/create',  [UserController::class, 'create'])->name('get-user-create');
        Route::post('/',  [UserController::class, 'store'])->name('post-user-store');
        Route::get('/{id}/edit',  [UserController::class, 'edit'])->name('get-user-edit');
        Route::get('/{id}/show',  [UserController::class, 'show'])->name('get-user-show');
    });

    Route::prefix('role')->group(function () {
        Route::get('/',  [RoleController::class, 'index'])->name('get-role-index');
        Route::get('/create',  [RoleController::class, 'create'])->name('get-role-create');
        Route::post('/',  [RoleController::class, 'store'])->name('post-role-store');
        Route::get('/{id}/edit',  [RoleController::class, 'edit'])->name('get-role-edit');
        Route::get('/{id}/show',  [RoleController::class, 'show'])->name('get-role-show');
    });
    
    Route::prefix('permission')->group(function () {
        Route::get('/',  [PermissionController::class, 'index'])->name('get-permission-index');
        Route::get('/create',  [PermissionController::class, 'create'])->name('get-permission-create');
        Route::post('/',  [PermissionController::class, 'store'])->name('post-permission-store');
        Route::get('/{id}/edit',  [PermissionController::class, 'edit'])->name('get-permission-edit');
        Route::get('/{id}/show',  [PermissionController::class, 'show'])->name('get-permission-show');
    });
});