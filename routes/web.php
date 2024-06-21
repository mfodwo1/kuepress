<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderDetail;
use App\Http\Controllers\StoreController;
use App\Livewire\OrderSuccess;
use Illuminate\Support\Facades\Route;

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
Route::get('categories/{designCategory}/', [HomeController::class, 'filter'])->name('filter');
Route::get('design/{design}/', [HomeController::class, 'details'])->name('details');
Route::get('cart/', [StoreController::class, 'viewCart'])->name('cart.details');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/order-success/{order}', OrderSuccess::class)->name('order.success');

    Route::get('/orders-details', [OrderDetail::class, 'index'])->name('order-detail');

});
