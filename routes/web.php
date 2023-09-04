<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserOrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;

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
    return view('frontend.login');
});

Route::get('/dashboard', function () {
    return view('frontend.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/order', [UserOrderController::class, 'order'])->name('order');
    Route::put('/make-order', [UserOrderController::class, 'makeOrder'])->name('makeOrder');
    Route::get('/orders', [UserOrderController::class, 'orders'])->name('orders');
});

Route::middleware('admin.auth')->group(function () {
    Route::get('/user-info', [UserDashboardController::class, 'userinfo'])->name('userinfo');
});

require __DIR__ . '/auth.php';
