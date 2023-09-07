
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController,UserController, SaleController,PromoController,PaymentController,CompController,MixController,RegionController,VoidxController,SiteController};



Route::get('/download', [SaleController::class,'download'])->name('download');
Route::get('/downloadcomp',[CompController::class,'downloadcomp'] )->name('downloadcomp');
Route::get('/downloadvoidx',[VoidxController::class,'downloadvoidx'] )->name('downloadvoidx');
Route::get('/downloadpromo', [PromoController::class,'downloadpromo'])->name('downloadpromo');
Route::get('/downloadpayment',[PaymentController::class,'downloadpayment'] )->name('downloadpayment');
Route::get('/downloadmix',[MixController::class,'downloadmix'])->name('downloadmix');
