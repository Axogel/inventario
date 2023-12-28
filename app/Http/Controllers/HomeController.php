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
