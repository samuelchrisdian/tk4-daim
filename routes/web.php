<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductionController;
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

    Route::prefix('dashboard')->group(function () {
        Route::get('/index', [DashboardController::class, 'index'])->name('dashboard-index');
        Route::get('/chart', [DashboardController::class, 'chart'])->name('dashboard-chart');
    });
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

    Route::prefix('transaction')->group(function () {
        Route::prefix('/order')->group(function () {
            Route::get('/index', [OrderController::class, 'index'])->name('transaction-order-index');
            Route::get('/add', [OrderController::class, 'add'])->name('transaction-order-add');
            Route::get('/edit/{order_id?}', [OrderController::class, 'edit'])->name('transaction-order-edit');
            Route::get('/show/{order_id?}', [OrderController::class, 'show'])->name('transaction-order-show');
            Route::post('/store', [OrderController::class, 'store'])->name('transaction-order-store');
            Route::post('/update/{order_id?}', [OrderController::class, 'update'])->name('transaction-order-update');
            Route::post('/activate/{order_id?}', [OrderController::class, 'activate'])->name('transaction-order-activate');
            Route::post('/deactivate/{order_id?}', [OrderController::class, 'deactivate'])->name('transaction-order-deactivate');
            Route::post('/delete/{order_id?}', [OrderController::class, 'delete'])->name('transaction-order-delete');
        });

        Route::prefix('/production')->group(function () {
            Route::get('/index', [ProductionController::class, 'index'])->name('transaction-production-index');
            Route::get('/add', [ProductionController::class, 'add'])->name('transaction-production-add');
            Route::get('/edit/{production_id?}', [ProductionController::class, 'edit'])->name('transaction-production-edit');
            Route::get('/show/{production_id?}', [ProductionController::class, 'show'])->name('transaction-production-show');
            Route::post('/store', [ProductionController::class, 'store'])->name('transaction-production-store');
            Route::post('/update/{production_id?}', [ProductionController::class, 'update'])->name('transaction-production-update');
            Route::post('/activate/{production_id?}', [ProductionController::class, 'activate'])->name('transaction-production-activate');
            Route::post('/deactivate/{production_id?}', [ProductionController::class, 'deactivate'])->name('transaction-production-deactivate');
            Route::post('/delete/{production_id?}', [ProductionController::class, 'delete'])->name('transaction-production-delete');
        });
    });
});

Auth::routes();
