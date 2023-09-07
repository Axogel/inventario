<?php
use Illuminate\Support\Facades\Route;
use App\Mail\Transfer;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\{HomeController,UserController, SaleController,PromoController,PaymentController,CompController,MixController,RegionController,VoidxController,SiteController};



Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard',[HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboardgrap',[HomeController::class, 'dashboardgrap'])->name('dashboardgrap');
    Route::get('/profile',[UserController::class, 'profile'] )->name('profile');
    Route::patch('credentials', [UserController::class, 'postCredentials'] )->name('credentials');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/tours', function(){
        return view('jumbotron');
    });
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::get('/sale/{id}/show',[SaleController::class, 'show'] );
});
Route::middleware([Authenticate::class])->group(function () {
    Route::resource('promo',PromoController::class);
    Route::resource('sale',SaleController::class);
    Route::resource('payment', PaymentController::class);
    Route::resource('comp', CompController::class);
    Route::resource('mix', MixController::class);
    Route::resource('voidx', VoidxController::class);
    Route::resource('region', RegionController::class);
    Route::resource('site', SiteController::class);
    
});