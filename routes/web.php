<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'mydashboard'])->name('dashboard');

    Route::get('/transactions', [DashboardController::class, 'getTransactions']);
    Route::get('/transactions1', [DashboardController::class, 'getTransactions1']);


    Route::get('purchase', [\App\Http\Controllers\PurchaseController::class, 'bill'])->name('purchase');
    Route::get('payments', [\App\Http\Controllers\PurchaseController::class, 'in'])->name('payments');
    Route::post('date', [QueryController::class, 'querydeposi'])->name('date');
    Route::get('getpaymentreport', [QueryController::class, 'queryindex'])->name('getpaymentreport');
    Route::get('getpurchasereport', [QueryController::class, 'billdate'])->name('getpurchasereport');

    Route::get('inventory', [\App\Http\Controllers\UserController::class,'indexuser'])->name('inventory');

    Route::get('profile/{username}', [UserController::class, 'profile'])->name('profile');
    Route::post('update', [UserController::class, 'updateuser'])->name('update');

});
Route::get('/logout', function(){
    Auth::logout();
    return view('auth.login')->with('success', 'Logout Successful');
});
