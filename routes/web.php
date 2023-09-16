<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RouteSignedController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserOrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('frontend.login');
    });
});

// Route::get('/temp', function () {
//     $url = URL::temporarySignedRoute('share-entry', now()->addHour(), [
//         'cid' => 5
//     ]);
//     return $url;
// });

Route::get('/submit/{cid}', [UserDashboardController::class, 'empData'])->name('share-entry')->middleware('signed');
Route::post('/submited', [UserDashboardController::class, 'storeEmpData'])->name('submited');
Route::delete('/delete-empdetails/{id}', [RouteSignedController::class, 'delete']);
Route::get('/edit-emp/{id}', [RouteSignedController::class, 'edit']);
Route::put('/update-emp/{id}', [RouteSignedController::class, 'update']);

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
    Route::get('/customers', [RouteSignedController::class, 'sendTempRoute'])->name('customers');
    Route::post('/send-mail', [RouteSignedController::class, 'sendMailRoute']);
});

require __DIR__ . '/auth.php';
