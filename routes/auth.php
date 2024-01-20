<?php
use Illuminate\Support\Facades\Route;
use App\Mail\Transfer;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\{DivisaController, FacturaController, HomeController,UserController,InventarioController, LibroDiarioController, LibroMayorController, OrdenEntregaController};



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
});
Route::middleware([Authenticate::class])->group(function () {

    Route::resource('factura', FacturaController::class);
    Route::get('factura/create/new', [FacturaController::class, 'new'])->name('factura.new');

    Route::resource('libroMayor', LibroMayorController::class);
    Route::resource('libroDiario', LibroDiarioController::class);

    Route::get('factura/create/{id}', [FacturaController::class, 'create'])->name('factura.crear');
    Route::resource('divisas', DivisaController::class);


    Route::resource('inventario', InventarioController::class);
    Route::resource('orden', OrdenEntregaController::class);
    Route::get('orden/create/{id}', [OrdenEntregaController::class, 'create'])->name('orden.crear');
    Route::get('alquilado', [InventarioController::class, 'alquilado'])->name('alquilado.index');
    Route::get('disponible', [InventarioController::class, 'disponible'])->name('disponible.index');

 
    
    
});