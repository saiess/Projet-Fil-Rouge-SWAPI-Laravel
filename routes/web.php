<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SwapController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/profile', ProfileController::class)->middleware('auth');
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/post', [AdminController::class, 'pagePost'])->name('pagePost');
    Route::get('/report', [AdminController::class, 'pageReport'])->name('pageReport');
    Route::get('/messages', [AdminController::class, 'pageMessage'])->name('pageMessage');
    Route::resource('/', AdminController::class);
});
Route::post('/user', [UserController::class, 'store'])->name('userupdate')->middleware('auth');
Route::resource('/products', ProductController::class);
Route::resource('/swap', SwapController::class);
Route::resource('/faqs', FaqsController::class);
// Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('test');
