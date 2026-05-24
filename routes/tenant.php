<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\TenantApp\ProfileController;
use App\Http\Controllers\TenantApp\UserController;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    //tenanct login hunni bitikai yo page ma aauxa means '/' url ma redirect hunxa
    Route::get('/', function () {
        return view('tenantApp.welcome');
    });


    Route::get('/dashboard', function () {
        return view('tenantApp.dashboard');
    })->middleware(['auth', 'verified'])->name('tenant.dashboard');
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('tenant.profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('tenant.profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('tenant.profile.destroy');

        Route::group(['middleware' => ['role:admin']], function () {

            Route::resource('user', UserController::class);
        });
    });

    require __DIR__ . '/tenant-auth.php';
});
