<?php

use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/admin')->group(function () {
        Route::get('/index', [HomeController::class, 'index'])->name('admin.index');
        Route::get('/roles', [RoleController::class, 'index']);
        Route::get('/role/create', [RoleController::class, 'create']);
        Route::post('/role', [RoleController::class, 'store']);
        Route::get('/role/{role}/edit', [RoleController::class, 'edit']);
        Route::patch('/role/{role}', [RoleController::class, 'update']);

        Route::get('/permissions', [PermissionController::class, 'index']);
        Route::get('/permission/create', [PermissionController::class, 'create']);
        Route::post('/permission', [PermissionController::class, 'store']);
        Route::get('/permission/{permission}/edit', [PermissionController::class, 'edit']);
        Route::patch('/permission/{permission}', [PermissionController::class, 'update']);
        Route::post('/delete/{user}', [PermissionController::class, 'delete']);
        Route::get('/users', [UserController::class, 'lists']);
        Route::post('/user/{user}', [PermissionController::class, 'update']);
    });

    Route::get('/aboutme',  [UserController::class, 'index']);
    Route::prefix('aboutme')->group(function () {
        Route::post('/name/{user}', [UserController::class, 'name']);
        Route::post('/photo/{user}', [UserController::class, 'photo']);
        Route::post('/updatePassword/{user}', [UserController::class, 'updatePassword']);
        
    });
    Route::prefix('/user')->group(function () {
        Route::get('/show', [UserController::class, 'show']);
        Route::post('/register', [UserController::class, 'store']);
    });
   
});

require __DIR__ . '/auth.php';
