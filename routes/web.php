<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticalController;
use App\Http\Controllers\ArticlesCRUD;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\CalledForUsController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SinglePageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// called all methode of article
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('/articles', ArticalController::class)->middleware('auth');
Route::resource('/create', ArticlesCRUD::class)->middleware('auth');
Route::get('/About', [AboutController::class, 'index'])->name('About.index')->middleware('auth');

Route::get('/calledForUs', [CalledForUsController::class, 'index'])->name('called.calledForUs')->middleware('auth');
Route::get('/messgesCard', [CalledForUsController::class, 'messgesCard'])->name('called.messgesCard')->middleware('auth');
Route::post('/store', [CalledForUsController::class, 'store'])->name('called.store')->middleware('auth');
Route::delete('/delete/{id}', [CalledForUsController::class, 'delete'])->name('called.delete')->middleware('auth');
Route::get('/edit/{id}', [CalledForUsController::class, 'edit'])->name('called.edit')->middleware('auth');
Route::PUT('/update/${id}', [CalledForUsController::class, 'update'])->name('called.update')->middleware('auth');

Route::resource('/admin', AdminController::class)->middleware('auth');

// user data
Route::resource('/profile', UserController::class)->middleware('auth');

// called the singlePage --> git
Route::get('/singlePage/{id}', [SinglePageController::class, 'single'])->name('singlePage')->middleware('auth');
Route::get('/category/{id}', [categoryController::class, 'show'])->name('category.show')->middleware('auth');

// called authintacions routes --> git
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('register');

// create acount and login acount --> post
Route::post('/createAcount', [RegisterController::class, 'create'])->name('createAcount');
Route::post('/login', [LoginController::class, 'login'])->name('loginAcount');
Route::get('/logout', [LoginController::class, 'logout'])->name('logoutAcount');
