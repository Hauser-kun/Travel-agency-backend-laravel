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


Route::group(['prefix' => 'account'], function () {

    // Guest routes 
    Route::group(['middleware' => 'guest'], function () {

        Route::get('/login', [AccountController::class, 'login'])->name('account.login');
        Route::post('/authenticate', [AccountController::class, 'authenticate'])->name('account.authenticate');
    });

    // Auth routes 

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
        Route::get('/logout', [AccountController::class, 'logout'])->name('account.logout');
        
        // Blogs Routes 
        Route::get('/blogs', [DashboardController::class, 'blogs'])->name('account.blogs');
        Route::get('/createBlogs', [DashboardController::class, 'createBlogs'])->name('account.createBlogs');
        Route::post('/createBlogs', [DashboardController::class, 'addBlogs'])->name('account.addBlogs');
        Route::get('/editBlogs/{BlogId}', [DashboardController::class, 'editBlog'])->name('account.editBlog');
        Route::put('/updateBlogs/{BlogId}', [DashboardController::class, 'updateBlog'])->name('account.updateBlog');
        Route::delete('/deleteBlogs/{BlogId}', [DashboardController::class, 'deleteBlog'])->name('account.deleteBlog');
        
        
        // News Route 
        Route::get('/news', [DashboardController::class, 'news'])->name('account.news');
        Route::get('/createNews', [DashboardController::class, 'createNews'])->name('account.createNews');
        Route::post('/createNews', [DashboardController::class, 'addNews'])->name('account.addNews');
        Route::get('/editNews/{NewsId}', [DashboardController::class, 'editNews'])->name('account.editNews');
        Route::put('/updateNews/{NewsId}', [DashboardController::class, 'updateNews'])->name('account.updateNews');
        Route::delete('/deleteNews/{NewsId}', [DashboardController::class, 'deleteNews'])->name('account.deleteNews');


        // Package routes 
        Route::get('/packages', [DashboardController::class, 'packages'])->name('account.packages');
        Route::get('/createPackage', [DashboardController::class, 'createPackage'])->name('account.createPackage');
        Route::post('/addPackages', [DashboardController::class, 'addPackages'])->name('account.addPackages');
        Route::get('/editPackages/{packageId}', [DashboardController::class, 'editPackages'])->name('account.editPackages');
        Route::put('/updatePackages/{packageId}', [DashboardController::class, 'updatePackages'])->name('account.updatePackages');
        Route::delete('/deletepackage/{packageId}', [DashboardController::class, 'deletepackage'])->name('account.deletepackage');


        // Tour Places Routes 
        Route::get('/places', [DashboardController::class, 'places'])->name('account.places');
        Route::get('/createPlaces', [DashboardController::class, 'createPlaces'])->name('account.createPlaces');
        Route::post('/addPlaces', [DashboardController::class, 'addPlaces'])->name('account.addPlaces');
        Route::get('/editPlaces/{placeId}', [DashboardController::class, 'editPlaces'])->name('account.editPlaces');
        Route::put('/updatePlaces/{packageId}', [DashboardController::class, 'updatePlaces'])->name('account.updatePlaces');
        Route::delete('/deleteplaces/{packageId}', [DashboardController::class, 'deleteplaces'])->name('account.deleteplaces');


        // Users Route 
        Route::get('/users', [DashboardController::class, 'users'])->name('account.users');
        Route::get('/createUsers', [DashboardController::class, 'createUsers'])->name('account.createUsers');
        Route::post('/addUsers', [DashboardController::class, 'addUsers'])->name('account.addUsers');
        Route::get('/editUsers/{userId}', [DashboardController::class, 'editUsers'])->name('account.editUsers');
        Route::delete('/deleteUsers/{userId}', [DashboardController::class, 'deleteUsers'])->name('account.deleteUsers');
        Route::put('/updateUser/{userId}', [DashboardController::class, 'updateUser'])->name('account.updateUser');
    });
});
