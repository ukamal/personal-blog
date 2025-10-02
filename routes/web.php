<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubMenuController;

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

Route::get('/', function () {
    // return view('welcome');
    return view('frontend.layouts.index');
});

Route::get('/dashboard', function () {
    // return view('dashboard');
    return view('backend.admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/password-change', [ProfileController::class, 'PasswordChange'])->name('password-change');
    Route::post('/password-update', [ProfileController::class, 'UpdatePassword'])->name('update-password');

    Route::controller(SocialController::class)->prefix('social')->group(function(){
        Route::get('/view','view')->name('view_social');
        Route::get('/add','add')->name('add_social');
        Route::post('/store','store')->name('social_store');
        Route::get('/edit/{id}','edit')->name('edit_social');
        Route::post('/update/{id}','update')->name('social_update');
        Route::get('/delete/{id}','deleteSocial')->name('delete_social');
    });


    Route::controller(MenuController::class)->prefix('menu')->group(function(){
        Route::get('/view','view')->name('view_menu');
        Route::get('/add','add')->name('add_menu');
        Route::post('/store','store')->name('menu_store');
        Route::get('/edit/{id}','edit')->name('edit_menu');
        Route::post('/update/{id}','update')->name('menu_update');
        Route::get('/delete/{id}','deletemenu')->name('delete_menu');
    });

    Route::controller(SubMenuController::class)->prefix('submenu')->group(function(){
        Route::get('/view','view')->name('view_sub_menu');
        Route::get('/add','add')->name('add_sub_menu');
        Route::post('/store','store')->name('sub_menu_store');
        Route::get('/edit/{id}','edit')->name('edit_sub_menu');
        Route::post('/update/{id}','update')->name('sub_menu_update');
        Route::get('/delete/{id}','deleteSubMenu')->name('delete_sub_menu');
    });

    Route::controller(SliderController::class)->prefix('slider')->group(function(){
        Route::get('/view','view')->name('view_slider');
        Route::get('/add','add')->name('add_slider');
        Route::post('/store','store')->name('slider_store');
        Route::get('/edit/{id}','edit')->name('edit_slider');
        Route::post('/update/{id}','update')->name('slider_update');
        Route::get('/delete/{id}','deleteSubslider')->name('delete_slider');
    });

});

require __DIR__.'/auth.php';
