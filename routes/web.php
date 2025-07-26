<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ProfileController;

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

});

require __DIR__.'/auth.php';
