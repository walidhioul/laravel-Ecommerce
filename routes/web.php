<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RoleManager;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified' ,'rolemanager:customer'])->name('dashboard');

Route::prefix('admin')
    ->middleware(['auth', 'verified','rolemanager:admin'])
    ->controller(AdminController::class)
    ->group(function () {
        Route::get('/dashboard', 'index')->name('admin');
        Route::get('/settings', 'setting')->name('admin.setting');
        Route::get('/manage/users', 'manage_user')->name('admin.manager.user');
        Route::get('/manage/stores', 'manage_stores')->name('admin.manager.stores');
        Route::get('/cart/history', 'cart_history')->name('admin.cart.history');
        Route::get('/order/history', 'order_history')->name('admin.order.history');


    });

Route::get('/vendor/dashboard', function () {
    return view('vendor');
})->middleware(['auth', 'verified' ,'rolemanager:vendor'])->name('vendor');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


/*notes 
add product ... routes of admin (video n°6)
*/
