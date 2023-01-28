<?php

use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OverallsaleController;
use App\Http\Controllers\Admin\AirController;
use App\Http\Controllers\Admin\RodtepController;
use App\Http\Controllers\Admin\WasteScrapController;
use App\Http\Controllers\Admin\DomesticController;
use App\Http\Controllers\Admin\ImportedController;
use App\Http\Controllers\Admin\SwsController;
use App\Http\Controllers\Admin\BcdController;
use App\Http\Controllers\Admin\CgstController;
use App\Http\Controllers\Admin\IgstController;
use App\Http\Controllers\Admin\SgstController;
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
// Route::redirect('/','admin');
Route::redirect('/','admin/login');
Route::view('/register/create', 'auth.register')->name('admin.register');
Route::resources([
    'users' => UserController::class,
]);
Route::post('/overall-sale-store', [OverallsaleController::class, 'store'])->name('overall-sale-store');
Route::post('/imported-store', [ImportedController::class, 'store'])->name('imported-store');
Route::get('/imported-create/{id}', [ImportedController::class, 'create'])->name('imported-create');
Route::get('/domestic-create/{id}', [DomesticController::class, 'create'])->name('domestic-create');
Route::post('/domestic-store', [DomesticController::class, 'store'])->name('domestic-store');


Route::group(['prefix' => 'admin', 'middleware'=> 'auth:sanctum'], function(){
    Route::get('profile',[ProfileController::class,'getProfile'])->name('admin.profile');
    Route::get('/dashboard',[AdminDashboard::class,'getDashboard'])->name('admin.dashboard');
    Route::resources([
       // 'users' => UserController::class,
        'overall-sale' => OverallsaleController::class,
        'air' => AirController::class,
        'waste-scrap' => WasteScrapController::class,
        'rodtep' => RodtepController::class,
        'domestic' => DomesticController::class,
        'imported' => ImportedController::class,
        'sws' => SwsController::class,
        'bcd' => BcdController::class,
        'igst' => IgstController::class,
        'sgst' => SgstController::class,
        'cgst' => CgstController::class,
    ]);
});

Route::get('clear', function () {
    Artisan::call('optimize:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('clear-compiled');
    return 'Cleared.';
});