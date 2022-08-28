<?php

use App\Http\Controllers\UserController;
use App\Http\Livewire\Admin\DashboardAdmin;
use App\Http\Livewire\Customer\DashboardCustomer;
use App\Http\Livewire\Supplier\DashboardSupplier;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'cekUser'])->name('dashboard');
});

Route::middleware(['middleware' => 'auth'])->group(function () {
    // AKses Admin
    Route::group(['middleware' => 'role:Admin', 'prefix' => 'admin', 'as' => 'Admin.'], function () {
        Route::get('Dashboard', DashboardAdmin::class)->name('Dashboard-Admin');
    });
    Route::group(['middleware' => 'role:Supplier', 'prefix' => 'Supplier', 'as' => 'Supplier.'], function () {
        Route::get('Dashboard', DashboardSupplier::class)->name('Dashboard-Supplier');
    });
    Route::group(['middleware' => 'role:Customer', 'prefix' => 'Customer', 'as' => 'Customer.'], function () {
        Route::get('Dashboard', DashboardCustomer::class)->name('Dashboard-Admin');
    });
});
