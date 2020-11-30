<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function dashboardgrap()
    {   
        $sales = DB::table('sales')->groupBy('store_code')->get();

        $comps = DB::table('sales')->select( DB::raw( 'SUM(comp) as suma'))
                    ->groupBy('store_code')
                    ->get()->toarray();
        
        Sale::sum("comp");
        return view('dashboardgrap', compact( "sales", "comps"));
    }
    public function index()
    {
        return redirect()->route('dashboard');
    }
    public function index2()
    {
        return view('index2');
    }
    public function index3()
    {
        return view('index3');
    }
    public function index4()
    {
        return view('index4');
    }
    public function index5()
    {
        return view('index5');
    }
    public function chat()
    {
        return view('chat');
    }
    public function chat2()
    {
        return view('chat2');
    }
    public function chat3()
    {
        return view('chat3');
    }
    public function contact()
    {
        return view('contact-list');
    }
    public function contact2()
    {
        return view('contact-list2');
    }
    public function manager()
    {
        return view('file-manager');
    }
    public function managerlist()
    {
        return view('file-manager-list');
    }
    public function todolist()
    {
        return view('todo-list');
    }
    public function todolist2()
    {
        return view('todo-list2');
    }
    public function todolist3()
    {
        return view('todo-list3');
    }
    public function usersl1()
    {
        return view('users-list-1');
    }
    public function usersl2()
    {
        return view('users-list-2');
    }
    public function usersl3()
    {
        return view('users-list-3');
    }
    public function usersl4()
    {
        return view('users-list-4');
    }
    public function calendar()
    {
        return view('calendar');
    }
    public function dragula()
    {
        return view('dragula');
    }
    public function cookies()
    {
        return view('cookies');
    }
    public function imagec()
    {
        return view('image-comparison');
    }
    public function imgcrop()
    {
        return view('img-crop');
    }
    public function pagesess()
    {
        return view('page-sessiontimeout');
    }
    public function notify()
    {
        return view('notify');
    }
    public function sweetalert()
    {
        return view('sweetalert');
    }
    public function rangeslider()
    {
        return view('rangeslider');
    }
    public function counters()
    {
        return view('counters');
    }
    public function loaders()
    {
        return view('loaders');
    }
    public function timel()
    {
        return view('time-line');
    }
    public function rating()
    {
        return view('rating');
    }
    public function widgets1()
    {
        return view('widgets-1');
    }
    public function widgets2()
    {
        return view('widgets-2');
    }
    public function forme()
    {
        return view('form-elements');
    }
    public function advancerf()
    {
        return view('advanced-forms');
    }
    public function formw()
    {
        return view('form-wizard');
    }
    public function  wysiwyag()
    {
        return view('wysiwyag');
    }
    public function  formsizes()
    {
        return view('form-sizes');
    }
    public function  formt()
    {
        return view('form-treeview');
    }
    public function  chartch()
    {
        return view('chart-chartist');
    }
    public function  chartm()
    {
        return view('chart-morris');
    }
    public function  charta()
    {
        return view('chart-apex');
    }
    public function  chartpeity()
    {
        return view('chart-peity');
    }
    public function  chartechart()
    {
        return view('chart-echart');
    }
    public function  chartflot()
    {
        return view('chart-flot');
    }
    public function  chartc3()
    {
        return view('chart-c3');
    }
    public function  maps()
    {
        return view('maps');
    }
    public function  maps2()
    {
        return view('maps2');
    }
    public function  maps3()
    {
        return view('maps3');
    }
    public function  tables()
    {
        return view('tables');
    }
    public function  datatable()
    {
        return view('datatable');
    }
    public function  accordion()
    {
        return view('accordion');
    }
    public function  alerts()
    {
        return view('alerts');
    }
    public function  avatars()
    {
        return view('avatars');
    }
    public function  badge()
    {
        return view('badge');
    }
    public function  breadcrumbs()
    {
        return view('breadcrumbs');
    }
    public function  buttons()
    {
        return view('buttons');
    }
    public function  cards()
    {
        return view('cards');
    }
    public function  cardsimage()
    {
        return view('cards-image');
    }
    public function  carousel()
    {
        return view('carousel');
    }
    public function  dropdown()
    {
        return view('dropdown');
    }
    public function  footers()
    {
        return view('footers');
    }
    public function  headers()
    {
        return view('headers');
    }
    public function  jumbotron()
    {
        return view('jumbotron');
    }
    public function  list()
    {
        return view('list');
    }
    public function  mediaobject()
    {
        return view('media-object');
    }
    public function  modal()
    {
        return view('modal');
    }
    public function  navigation()
    {
        return view('navigation');
    }
    public function  pagination()
    {
        return view('pagination');
    }
    public function  panels()
    {
        return view('panels');
    }
    public function  popover()
    {
        return view('popover');
    }
    public function  progress()
    {
        return view('progress');
    }
    public function  tabs()
    {
        return view('tabs');
    }
    public function  tags()
    {
        return view('tags');
    }
    public function  tooltip()
    {
        return view('tooltip');
    }
    public function  icons()
    {
        return view('icons');
    }
    public function  icons2()
    {
        return view('icons2');
    }
    public function  icons3()
    {
        return view('icons3');
    }
    public function  icons4()
    {
        return view('icons4');
    }
    public function  icons5()
    {
        return view('icons5');
    }
    public function  icons6()
    {
        return view('icons6');
    }
    public function  icons7()
    {
        return view('icons7');
    }
    public function  icons8()
    {
        return view('icons8');
    }
    public function  icons9()
    {
        return view('icons9');
    }
    public function  icons10()
    {
        return view('icons10');
    }
    public function  icons11()
    {
        return view('icons11');
    }
    public function  profile1()
    {
        return view('profile-1');
    }
    public function  profile2()
    {
        return view('profile-2');
    }
    public function  profile3()
    {
        return view('profile-3');
    }
    public function  editprofile()
    {
        return view('editprofile');
    }
    public function  emailcompose()
    {
        return view('email-compose');
    }
    public function  emailinbox()
    {
        return view('email-inbox');
    }
    public function  emailread()
    {
        return view('email-read');
    }
    public function  pricing()
    {
        return view('pricing');
    }
    public function  pricing2()
    {
        return view('pricing-2');
    }
    public function  pricing3()
    {
        return view('pricing-3');
    }
    public function  invoicelist()
    {
        return view('invoice-list');
    }
    public function  invoice1()
    {
        return view('invoice-1');
    }
    public function  invoice2()
    {
        return view('invoice-2');
    }
    public function  invoice3()
    {
        return view('invoice-3');
    }
    public function  invoiceadd()
    {
        return view('invoice-add');
    }
    public function  invoiceedit()
    {
        return view('invoice-edit');
    }
    public function  blog()
    {
        return view('blog');
    }
    public function  blog2()
    {
        return view('blog-2');
    }
    public function  blog3()
    {
        return view('blog-3');
    }
    public function  blogstyles()
    {
        return view('blog-styles');
    }
    public function  gallery()
    {
        return view('gallery');
    }
    public function  faq()
    {
        return view('faq');
    }
    public function  terms()
    {
        return view('terms');
    }
    public function  empty()
    {
        return view('empty');
    }
    public function  search()
    {
        return view('search');
    }
    public function  shop()
    {
        return view('shop');
    }
    public function  shopdes()
    {
        return view('shop-des');
    }
    public function   cart()
    {
        return view('cart');
    }
    public function  elementcolors()
    {
        return view('element-colors');
    }
    public function  elementflex()
    {
        return view('element-flex');
    }
    public function  elementheight()
    {
        return view('element-height');
    }
    public function  elementtypography()
    {
        return view('element-typography');
    }
    public function  elementwidth()
    {
        return view('element-width');
    }
    public function  elementborder()
    {
        return view('elements-border');
    }
    public function  elementdisplay()
    {
        return view('elements-display');
    }
    public function  elementmargin()
    {
        return view('elements-margin');
    }
    public function  elementpaddning()
    {
        return view('elements-paddning');
    }

    public function dashboard()
    {
        $sales = Sale::all();
        return view('index')->with("sales", $sales);
    }
}
