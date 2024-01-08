<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        Artisan::call('verificar:productos_vencidos');

    }
    public function index()
    {
    

    
        return view('dashboardgrap');
    }

    public function dashboardgrap()
    {   
    
        return view('dashboardgrap');
    }
    public function dashboard()
    {

        return view('dashboardgrap');
    }
}
