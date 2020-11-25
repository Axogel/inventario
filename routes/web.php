<?php

use Illuminate\Support\Facades\Route;
use App\Mail\Transfer;

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

// Route::get('/', 'HomeController@index')->name('index');

//********************** AUTHENTICATION ************************//
//Auth::routes(); //-- pack: register and login
// Authentication Routes
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login')->name('login_post');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// // Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// // Password Reset Routes
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset/{token}', 'Auth\ResetPasswordController@resetPassword')->name('password.update');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Auth::routes();
//********************** END AUTHENTICATION ************************//

Route::get('/', 'HomeController@index')->name('index');


//******************side-menu***************************************//

Route::get('/sales-summary', 'UploadController@salessummary')->name('salessummary');
Route::get('/comps', 'UploadController@comps')->name('comps');
Route::get('/voids', 'UploadController@voids')->name('voids');
Route::get('/promos', 'UploadController@promos')->name('promos');
Route::get('/payments', 'UploadController@payments')->name('payments');
Route::get('/mix', 'UploadController@mix')->name('mix');

Route::get('/index', 'HomeController@index')->name('index');
Route::get('/index2', 'HomeController@index2')->name('index2');
Route::get('/index3', 'HomeController@index3')->name('index3');
Route::get('/index4', 'HomeController@index4')->name('index4');
Route::get('/index5', 'HomeController@index5')->name('index5');
Route::get('/chat', 'HomeController@chat')->name('chat');
Route::get('/chat2', 'HomeController@chat2')->name('chat2');
Route::get('/chat3', 'HomeController@chat3')->name('chat3');
Route::get('/contact-list', 'HomeController@contact')->name('contact');
Route::get('/contact-list2', 'HomeController@contact2')->name('contact2');
Route::get('/file-manager', 'HomeController@manager')->name('manager');
Route::get('/file-manager-list', 'HomeController@managerlist')->name('managerlist');
Route::get('/todo-list', 'HomeController@todolist')->name('todolist');
Route::get('/todo-list2', 'HomeController@todolist2')->name('todolist2');
Route::get('/todo-list3', 'HomeController@todolist3')->name('todolist3');
Route::get('/users-list-1', 'HomeController@usersl1')->name('usersl1');
Route::get('/users-list-2', 'HomeController@usersl2')->name('usersl2');
Route::get('/users-list-3', 'HomeController@usersl3')->name('usersl3');
Route::get('/users-list-4', 'HomeController@usersl4')->name('usersl4');
Route::get('/calendar', 'HomeController@calendar')->name('calendar');
Route::get('/dragula', 'HomeController@dragula')->name('dragula');
Route::get('/cookies', 'HomeController@cookies')->name('cookies');
Route::get('/image-comparison', 'HomeController@imagec')->name('imagec');
Route::get('/img-crop', 'HomeController@imgcrop')->name('imgcrop');
Route::get('/page-sessiontimeout', 'HomeController@pagesess')->name('pagesess');
Route::get('/notify', 'HomeController@notify')->name('notify');
Route::get('/sweetalert', 'HomeController@sweetalert')->name('sweetalert');
Route::get('/rangeslider', 'HomeController@rangeslider')->name('rangeslider');
Route::get('/counters', 'HomeController@counters')->name('counters');
Route::get('/loaders', 'HomeController@loaders')->name('loaders');
Route::get('/time-line', 'HomeController@timel')->name('timel');
Route::get('/rating', 'HomeController@rating')->name('rating');
Route::get('/widgets-1', 'HomeController@widgets1')->name('widgets1');
Route::get('/widgets-2', 'HomeController@widgets2')->name('widgets2');
Route::get('/form-elements', 'HomeController@forme')->name('forme');
Route::get('/advanced-forms', 'HomeController@advancerf')->name('advancerf');
Route::get('/form-wizard', 'HomeController@formw')->name('formw');
Route::get('/wysiwyag', 'HomeController@wysiwyag')->name('wysiwyag');
Route::get('/form-sizes', 'HomeController@formsizes')->name('formsizes');
Route::get('/form-treeview', 'HomeController@formt')->name('formt');
Route::get('/chart-chartist', 'HomeController@chartch')->name('chartch');
Route::get('/chart-morris', 'HomeController@chartm')->name('chartm');
Route::get('/chart-apex', 'HomeController@charta')->name('charta');
Route::get('/chart-peity', 'HomeController@chartpeity')->name('chartpeity');
Route::get('/chart-echart', 'HomeController@chartechart')->name('chartechart');
Route::get('/chart-flot', 'HomeController@chartflot')->name('chartflot');
Route::get('/chart-c3', 'HomeController@chartc3')->name('chartc3');
Route::get('/maps', 'HomeController@maps')->name('maps');
Route::get('/maps2', 'HomeController@maps2')->name('maps2');
Route::get('/maps3', 'HomeController@maps3')->name('maps3');
Route::get('/tables', 'HomeController@tables')->name('tables');
Route::get('/datatable', 'HomeController@datatable')->name('datatable');
Route::get('/accordion', 'HomeController@accordion')->name('accordion');
Route::get('/alerts', 'HomeController@alerts')->name('alerts');
Route::get('/avatars', 'HomeController@avatars')->name('avatars');
Route::get('/badge', 'HomeController@badge')->name('badge');
Route::get('/breadcrumbs', 'HomeController@breadcrumbs')->name('breadcrumbs');
Route::get('/buttons', 'HomeController@buttons')->name('buttons');
Route::get('/cards', 'HomeController@cards')->name('cards');
Route::get('/cards-image', 'HomeController@cardsimage')->name('cardsimage');
Route::get('/carousel', 'HomeController@carousel')->name('carousel');
Route::get('/dropdown', 'HomeController@dropdown')->name('dropdown');
Route::get('/footers', 'HomeController@footers')->name('footers');
Route::get('/headers', 'HomeController@headers')->name('headers');
Route::get('/jumbotron', 'HomeController@jumbotron')->name('jumbotron');
Route::get('/list', 'HomeController@list')->name('list');
Route::get('/media-object', 'HomeController@mediaobject')->name('mediaobject');
Route::get('/modal', 'HomeController@modal')->name('modal');
Route::get('/navigation', 'HomeController@navigation')->name('navigation');
Route::get('/pagination', 'HomeController@pagination')->name('pagination');
Route::get('/panels', 'HomeController@panels')->name('panels');
Route::get('/popover', 'HomeController@popover')->name('popover');
Route::get('/progress', 'HomeController@progress')->name('progress');
Route::get('/tabs', 'HomeController@tabs')->name('tabs');
Route::get('/tags', 'HomeController@tags')->name('tags');
Route::get('/tooltip', 'HomeController@tooltip')->name('tooltip');
Route::get('/icons', 'HomeController@icons')->name('icons');
Route::get('/icons2', 'HomeController@icons2')->name('icons2');
Route::get('/icons3', 'HomeController@icons3')->name('icons3');
Route::get('/icons4', 'HomeController@icons4')->name('icons4');
Route::get('/icons5', 'HomeController@icons5')->name('icons5');
Route::get('/icons6', 'HomeController@icons6')->name('icons6');
Route::get('/icons7', 'HomeController@icons7')->name('icons7');
Route::get('/icons8', 'HomeController@icons8')->name('icons8');
Route::get('/icons9', 'HomeController@icons9')->name('icons9');
Route::get('/icons10', 'HomeController@icons10')->name('icons10');
Route::get('/icons11', 'HomeController@icons11')->name('icons11');
Route::get('/profile-1', 'HomeController@profile1')->name('profile1');
Route::get('/profile-2', 'HomeController@profile2')->name('profile2');
Route::get('/profile-3', 'HomeController@profile3')->name('profile3');
Route::get('/editprofile', 'HomeController@editprofile')->name('editprofile');
Route::get('/email-compose', 'HomeController@emailcompose')->name('emailcompose');
Route::get('/email-inbox', 'HomeController@emailinbox')->name('emailinbox');
Route::get('/email-read', 'HomeController@emailread')->name('emailread');
Route::get('/pricing', 'HomeController@pricing')->name('pricing');
Route::get('/pricing-2', 'HomeController@pricing2')->name('pricing2');
Route::get('/pricing-3', 'HomeController@pricing3')->name('pricing3');
Route::get('/invoice-list', 'HomeController@invoicelist')->name('invoicelist');
Route::get('/invoice-1', 'HomeController@invoice1')->name('invoice1');
Route::get('/invoice-2', 'HomeController@invoice2')->name('invoice2');
Route::get('/invoice-3', 'HomeController@invoice3')->name('invoice3');
Route::get('/invoice-add', 'HomeController@invoiceadd')->name('invoiceadd');
Route::get('/invoice-edit', 'HomeController@invoiceedit')->name('invoiceedit');
Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/blog-2', 'HomeController@blog2')->name('blog2');
Route::get('/blog-3', 'HomeController@blog3')->name('blog3');
Route::get('/blog-styles', 'HomeController@blogstyles')->name('blogstyles');
Route::get('/gallery', 'HomeController@blogstyles')->name('gallery');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/terms', 'HomeController@terms')->name('terms');
Route::get('/empty', 'HomeController@empty')->name('empty');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/shop', 'HomeController@shop')->name('shop');
Route::get('/shop-des', 'HomeController@shopdes')->name('shopdes');
Route::get('/cart', 'HomeController@cart')->name('cart');
Route::get('/element-colors', 'HomeController@elementcolors')->name('elementcolors');
Route::get('/element-flex', 'HomeController@elementflex')->name('elementflex');
Route::get('/element-height', 'HomeController@elementheight')->name('elementheight');
Route::get('/element-typography', 'HomeController@elementtypography')->name('elementtypography');
Route::get('/element-width', 'HomeController@elementwidth')->name('elementwidth');
Route::get('/elements-border', 'HomeController@elementborder')->name('elementborder');
Route::get('/elements-display', 'HomeController@elementdisplay')->name('elementdisplay');
Route::get('/elements-margin', 'HomeController@elementmargin')->name('elementmargin');
Route::get('/elements-paddning', 'HomeController@elementpaddning')->name('elementpaddning');

//****************** end side-menu***************************************//

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
});
//-- admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/tours', function(){
        return view('jumbotron');
    });
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::resource('users','UsersController');
});

Route::group(['middleware' => ['auth', 'superadmin']], function () {
    Route::resource('promo','PromoController');
    Route::resource('sale','SaleController');
    Route::resource('payment', 'PaymentController');
    Route::resource('comp', 'CompController');
    Route::resource('mix', 'MixController');
    Route::resource('voidx', 'VoidxController');
    Route::resource('region', 'RegionController');
    Route::resource('site', 'SiteController');
});

Route::get('/datatable', function(){
    return view('datatable');
});
