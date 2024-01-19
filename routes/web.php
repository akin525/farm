<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;

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

    Route::get('exportuser', [\App\Http\Controllers\ExportController::class, 'exportusers'])->name('exportuser');
    Route::get('exportpay', [\App\Http\Controllers\ExportController::class, 'exportalllpayment'])->name('exportpay');
    Route::get('exportpur', [\App\Http\Controllers\ExportController::class, 'exportalllpurchase'])->name('exportpur');
    Route::get('exportsale', [\App\Http\Controllers\ExportController::class, 'exportalllsales'])->name('exportsale');
    Route::get('exportin', [\App\Http\Controllers\ExportController::class, 'exportin'])->name('exportin');
    Route::get('exportcus', [\App\Http\Controllers\ExportController::class, 'exportcustomer'])->name('exportcus');
    Route::get('exportfarm', [\App\Http\Controllers\ExportController::class, 'exportfarm'])->name('exportfarm');
    Route::get('exportactive', [\App\Http\Controllers\ExportController::class, 'exportactive'])->name('exportactive');

    Route::get('createsales', [SaleController::class, 'create'])->name('createsales');
    Route::post('/sales', [SaleController::class,'store'])->name('sales.store');
// Add other routes as needed

    Route::get('allsales', [SaleController::class, 'allsales'])->name('allsales');

    Route::get('/inventory/create', [InventoryController::class, 'create'])->name('inventory/create');
    Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory');
    Route::get('/allinventory', [InventoryController::class, 'allinventory'])->name('allinventory');
    Route::post('/update', [InventoryController::class, 'updateinventory'])->name('update');
// Add other routes as needed
    Route::get('/get-product-details', [InventoryController::class, 'getRemainingQuantity']);



    Route::get('createfarm', [FarmController::class, 'creaefarmindex'])->name('createfarm');
    Route::post('farm', [FarmController::class, 'store'])->name('farm');

    Route::get('allcustomer', [\App\Http\Controllers\CustomerController::class, 'index'])->name('allcustomer');
    Route::post('createcustomer', [\App\Http\Controllers\CustomerController::class, 'store'])->name('createcustomer');
    Route::post('editcustomer', [\App\Http\Controllers\CustomerController::class, 'editstore'])->name('editcustomer');
    Route::post('deletecustomer', [\App\Http\Controllers\CustomerController::class, 'deletestore'])->name('deletecustomer');

    Route::get('/farm-activities', [\App\Http\Controllers\FarmActivityController::class, 'index'])->name('farm_activities.index');
    Route::post('/activities', [\App\Http\Controllers\FarmActivityController::class, 'store'])->name('activities');


    Route::get('employee', [\App\Http\Controllers\EmployeeController::class, 'create'])->name('employee');
    Route::post('employ', [\App\Http\Controllers\EmployeeController::class, 'store'])->name('employ');

});
Route::get('/logout', function(){
    Auth::logout();
    return view('auth.login')->with('success', 'Logout Successful');
});
