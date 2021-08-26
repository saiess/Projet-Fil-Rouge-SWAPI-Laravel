<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\FavourieController;
use App\Http\Controllers\PostController;
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

//Route::get('/swap', function () {
//    return view('user.swap');
//})->name('swap');

//Route::get('/products', function () {
//    return view('user.product');
//})->name('products');

Route::get('/faqs', function () {
    return view('user.FAQs');
})->name('faqs');
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [UserController::class,'profile'])->middleware('auth')->name('profile');
Route::get('/otherprofile/{id}', [UserController::class,'otherprofile'])->middleware('auth')->name('otherprofile');
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/post/{id}', [AdminController::class, 'pagePost'])->name('pagePost');
    Route::get('/report', [AdminController::class, 'pageReport'])->name('pageReport');
    Route::get('/messages', [AdminController::class, 'pageMessage'])->name('pageMessage');
    Route::resource('/', AdminController::class);
});
Route::post('/user', [UserController::class, 'store'])->name('userupdate')->middleware('auth');
//Route::get("inner-join", [UserController::class, "profile"]);
Route::resource('/post', PostController::class);
//Route::resource('/favourie', FavourieController::class);
//Route::post('/post/{one_post}', [PostController::class, 'show'])->name('onepost.show');
//Route::get('/allposts', [PostController::class,'showposts'])->name('showposts');
Route::get('/favourite/{idpost}', [FavourieController::class,'postID'])->name('favpost');
