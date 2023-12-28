<?php

use Illuminate\Support\Facades\Route;
use App\Mail\Transfer;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\{HomeController,UsersController, SaleController,PromoController,PaymentController,CompController,MixController,RegionController,VoidxController,SiteController};
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

//Home Page
Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('index');


//Dashboard login Users
include 'auth.php';


//Upload 
include 'upload.php';

//actions the dasboard
include 'actionCrud.php';

//actions downloads
include 'download.php';


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
