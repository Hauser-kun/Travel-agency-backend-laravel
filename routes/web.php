<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'account'], function() {

    // Guest routes 
    Route::group(['middleware' => 'guest'],function() {

        Route::get('/login', [AccountController::class, 'login'])->name('account.login');
        Route::post('/authenticate', [AccountController::class, 'authenticate'])->name('account.authenticate');
    });

    // Auth routes 

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
        Route::get('/logout', [AccountController::class, 'logout'])->name('account.logout');
        Route::get('/blogs',[DashboardController::class, 'blogs'])->name('account.blogs');
        Route::get('/news',[DashboardController::class, 'news'])->name('account.news');
        Route::get('/packages',[DashboardController::class, 'packages'])->name('account.packages');
        Route::get('/createBlogs',[DashboardController::class, 'createBlogs'])->name('account.createBlogs');
        Route::post('/createBlogs',[DashboardController::class, 'addBlogs'])->name('account.addBlogs');
        Route::get('/createNews',[DashboardController::class, 'createNews'])->name('account.createNews');
        Route::post('/createNews',[DashboardController::class, 'addNews'])->name('account.addNews');
        Route::get('/editBlogs/{BlogId}',[DashboardController::class, 'editBlog'])->name('account.editBlog');
        Route::put('/updateBlogs/{BlogId}',[DashboardController::class, 'updateBlog'])->name('account.updateBlog');
        Route::get('/editNews/{NewsId}',[DashboardController::class, 'editNews'])->name('account.editNews');
        Route::put('/updateNews/{NewsId}',[DashboardController::class, 'updateNews'])->name('account.updateNews');
        Route::delete('/deleteBlogs/{BlogId}',[DashboardController::class, 'deleteBlog'])->name('account.deleteBlog');
        Route::delete('/deleteNews/{BlogId}',[DashboardController::class, 'deleteNews'])->name('account.deleteNews');
        Route::get('/createPackage', [DashboardController::class, 'createPackage'])->name('account.createPackage');
        Route::post('/addPackages', [DashboardController::class, 'addPackages'])->name('account.addPackages');

    });
});
