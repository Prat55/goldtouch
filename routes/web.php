<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RouteSignedController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserOrderController;
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

//? Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('frontend.login');
    });

    Route::get('/order', [UserOrderController::class, 'order'])->name('order');
    Route::put('/makeorder', [UserOrderController::class, 'userOrder'])->name('makeOrder');
});

//? Public Routes
Route::get('/submit/{cid}', [UserDashboardController::class, 'empData'])->name('share-entry')->middleware('signed');
Route::post('/submited', [UserDashboardController::class, 'storeEmpData'])->name('submited');
Route::delete('/delete-empdetails/{id}', [RouteSignedController::class, 'delete']);
Route::get('/edit-emp/{id}', [RouteSignedController::class, 'edit']);
Route::put('/update-emp/{id}', [RouteSignedController::class, 'update']);

//? Dashboard route
Route::get('/dashboard', [AdminDashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

//? User Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/make-order', [UserOrderController::class, 'makeUserOrder'])->name('userorder');
    Route::put('/ordered', [UserOrderController::class, 'makeOrder'])->name('usermakeOrder');
    Route::get('/orders', [UserOrderController::class, 'orders'])->name('orders');
    Route::post('/change-profile/{id}', [UserDashboardController::class, 'updateProfileImg']);
    Route::post('/assign/{id}', [UserOrderController::class, 'assign']);
});

//? Admin Routes
Route::middleware('admin.auth')->group(function () {
    Route::get('/user-info', [UserDashboardController::class, 'userinfo'])->name('userinfo');
    Route::post('/send-mail', [RouteSignedController::class, 'sendMailRoute']);
    // Route::get('/orders', [UserOrderController::class, 'orders'])->name('orders');
    Route::get('/task', [AdminDashboardController::class, 'sendTask'])->name('sendTask');
    Route::post('/send-task/{order_id}', [AdminDashboardController::class, 'sendorderTask']);
    Route::get('/calender' , [AdminDashboardController::class, 'calender'])->name('calender');
});

require __DIR__ . '/auth.php';
