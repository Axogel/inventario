<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    
        $sales = Sale::select('store_code', DB::raw('SUM(comp) as comp_sum'), DB::raw('SUM(promo) as promo_sum'))
        ->groupBy('store_code')
        ->get();

        $comps = Sale::sum('comp');
    
        $promos = Sale::sum('promo');
    
        return view('dashboardgrap', compact('sales', 'comps', 'promos'));
    }

    public function dashboardgrap()
    {   
     
        $sales = Sale::select('store_code', DB::raw('SUM(comp) as comp_sum'), DB::raw('SUM(promo) as promo_sum'))
        ->groupBy('store_code')
        ->get();

        $comps = Sale::sum('comp');
    
        $promos = Sale::sum('promo');
        
        return view('dashboardgrap', compact( "sales", "comps", "promos"));
    }
    public function dashboard()
    {
        $sales = Sale::select('store_code', DB::raw('SUM(comp) as comp_sum'), DB::raw('SUM(promo) as promo_sum'))
        ->groupBy('store_code')
        ->get();

        $comps = Sale::sum('comp');
    
        $promos = Sale::sum('promo');
    
        
        return view('dashboardgrap', compact( "sales", "comps", "promos"));
    }
}
