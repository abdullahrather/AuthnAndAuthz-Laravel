<?php

use App\Http\Controllers\ApplicationsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HeiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;

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

// Route::get('/welcome', function () {
//     return view('welcome');
// });

Route::get('/reload-captcha', [AuthController::class, 'reloadCaptcha'])->name('reload.captcha');


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
    Route::get('/', [AuthController::class, 'register'])->name('register');
    Route::post('/', [AuthController::class, 'registerPost'])->name('register.store');
});



Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'hei', 'as' => 'hei.'], function () {
        Route::get('/', [HeiController::class, 'index'])->name('create');
        Route::get('view', [HeiController::class, 'view'])->name('view');
        Route::get('delete/{id}', [HeiController::class, 'delete'])->name('delete');
        Route::get('edit/{id}', [HeiController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [HeiController::class, 'update'])->name('update');
        Route::post('/', [HeiController::class, 'store']);
    });

    Route::group(['prefix' => 'application', 'as' => 'application.'], function () {
        Route::get('/', [ApplicationsController::class, 'index'])->name('create');
        Route::get('view', [ApplicationsController::class, 'view'])->name('view');
        Route::get('delete/{id}', [ApplicationsController::class, 'delete'])->name('delete');
        Route::get('edit/{id}', [ApplicationsController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [ApplicationsController::class, 'update'])->name('update');
        Route::post('/', [ApplicationsController::class, 'store']);
    });

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', [UsersController::class, 'index'])->name('create');
        Route::get('view', [UsersController::class, 'view'])->name('view');
        Route::get('delete/{id}', [UsersController::class, 'delete'])->name('delete');
        Route::get('edit/{id}', [UsersController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [UsersController::class, 'update'])->name('update');
        Route::post('/', [UsersController::class, 'store']);
    });
});
