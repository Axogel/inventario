<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UserController, SaleController,InventarioController,PromoController,PaymentController,CompController,MixController,RegionController,VoidxController,SiteController};

Route::get('inventario/{id}/edit' , [InventarioController::class, 'edit'])->name('inventario.edit');
Route::get('inventario/{id}/destroy' , [InventarioController::class, 'destroy'])->name('inventario.destroy');
Route::get('user/{id}/edit' , [UserController::class, 'edit'])->name('user.edit');
Route::get('user/{id}/destroy' , [UserController::class, 'destroy'])->name('user.destroy');
Route::get('comp/{id}/edit' , [CompController::class, 'edit'])->name('comp.edit');
Route::get('comp/{id}/destroy' , [CompController::class, 'destroy'])->name('comp.destroy');
Route::get('site/{id}/edit' , [SiteController::class, 'edit'])->name('site.edit');
Route::get('site/{id}/destroy' , [SiteController::class, 'destroy'])->name('site.destroy');
Route::get('voidx/{id}/edit' , [VoidxController::class, 'edit'])->name('voidx.edit');
Route::get('voidx/{id}/destroy' , [VoidxController::class, 'destroy'])->name('voidx.destroy');
Route::get('payment/{id}/edit' , [PaymentController::class, 'edit'])->name('payment.edit');
Route::get('payment/{id}/destroy' , [PaymentController::class, 'destroy'])->name('payment.destroy');
Route::get('mix/{id}/edit' , [MixController::class, 'edit'])->name('mix.edit');
Route::get('mix/{id}/destroy' , [MixController::class, 'destroy'])->name('mix.destroy');
Route::get('promo/{id}/edit' , [PromoController::class, 'edit'])->name('promo.edit');
Route::get('promo/{id}/destroy' , [PromoController::class, 'destroy'])->name('promo.destroy');
Route::get('region/{id}/edit', [RegionController::class, 'edit'])->name('region.edit');
Route::delete('region/{id}', [RegionController::class, 'destroy'])->name('region.destroy');
Route::get('sales/{id}/edit', [SaleController::class, 'edit'])->name('sales.edit');
Route::get('sales/{id}', [SaleController::class, 'destroy'])->name('sales.destroy');
