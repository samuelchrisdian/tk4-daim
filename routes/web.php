<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('dashboard');

    Route::prefix('master')->group(function () {
        Route::prefix('/user')->group(function () {
            Route::get('/index', [UserController::class, 'index'])->name('master-user-index');
            Route::get('/add', [UserController::class, 'add'])->name('master-user-add');
            Route::get('/edit/{user_id?}', [UserController::class, 'edit'])->name('master-user-edit');
            Route::get('/show/{user_id?}', [UserController::class, 'show'])->name('master-user-show');
            Route::post('/store', [UserController::class, 'store'])->name('master-user-store');
            Route::post('/update/{user_id?}', [UserController::class, 'update'])->name('master-user-update');
            Route::post('/activate/{user_id?}', [UserController::class, 'activate'])->name('master-user-activate');
            Route::post('/deactivate/{user_id?}', [UserController::class, 'deactivate'])->name('master-user-deactivate');
            Route::post('/reset/{user_id?}', [UserController::class, 'reset'])->name('master-user-reset');
            Route::post('/delete/{user_id?}', [UserController::class, 'delete'])->name('master-user-delete');
        });

        Route::prefix('/item')->group(function () {
            Route::get('/index', [ItemController::class, 'index'])->name('master-item-index');
            Route::get('/add', [ItemController::class, 'add'])->name('master-item-add');
            Route::get('/edit/{item_id?}', [ItemController::class, 'edit'])->name('master-item-edit');
            Route::get('/show/{item_id?}', [ItemController::class, 'show'])->name('master-item-show');
            Route::post('/store', [ItemController::class, 'store'])->name('master-item-store');
            Route::post('/update/{item_id?}', [ItemController::class, 'update'])->name('master-item-update');
            Route::post('/activate/{item_id?}', [ItemController::class, 'activate'])->name('master-item-activate');
            Route::post('/deactivate/{item_id?}', [ItemController::class, 'deactivate'])->name('master-item-deactivate');
            Route::post('/delete/{item_id?}', [ItemController::class, 'delete'])->name('master-item-delete');
        });

        Route::prefix('/role')->group(function () {
            Route::get('/index', [RoleController::class, 'index'])->name('master-role-index');
            Route::get('/add', [RoleController::class, 'add'])->name('master-role-add');
            Route::get('/edit/{role_id?}', [RoleController::class, 'edit'])->name('master-role-edit');
            Route::get('/show/{role_id?}', [RoleController::class, 'show'])->name('master-role-show');
            Route::post('/store', [RoleController::class, 'store'])->name('master-role-store');
            Route::post('/update/{role_id?}', [RoleController::class, 'update'])->name('master-role-update');
            Route::post('/activate/{role_id?}', [RoleController::class, 'activate'])->name('master-role-activate');
            Route::post('/deactivate/{role_id?}', [RoleController::class, 'deactivate'])->name('master-role-deactivate');
            Route::post('/delete/{role_id?}', [RoleController::class, 'delete'])->name('master-role-delete');
        });
    });
});

Auth::routes();
