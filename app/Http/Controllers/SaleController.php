<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::all();
        return view('sale.index')->with("sales", $sales);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $xml = $request->file('xmldata');
            $rawstring = file_get_contents($xml);
            $safestring = mb_convert_encoding($rawstring,'UTF-8');
            $safestring = preg_replace("|&([^;]+?)[\s<&]|","&amp;$1 ",$safestring);
            $SALES = simplexml_load_string($safestring);

            $nodename = $SALES->getName();

            if($nodename == 'CATEGORIES'){
                Sale::where([
                    ['id', '=', $SALES->attributes()->ID],
                    ['dob', '=', $SALES->attributes()->DOB],
                ])->delete();
                foreach ($SALES->children() as $sale) {
                    $temp = new Sale();
                    $temp->id = $SALES->attributes()->ID;
                    $temp->dob = $SALES->attributes()->DOB;
                    $temp->store_code = $SALES->attributes()->STORECODE;
                    $temp->store_name = $SALES->attributes()->STORENAME;
                    $temp->name = $sale->NAME;
                    $temp->id_sale = $sale->ID;
                    $temp->net_sale = $sale->NETSALES;
                    $temp->comp = $sale->COMPS;
                    $temp->promo = $sale->PROMOS;
                    $temp->void = $sale->VOIDS;
                    if($sale->TAXES == '' || $sale->TAXES == null)
                        $temp->taxes = 0;
                    else
                        $temp->taxes = $sale->TAXES;
                    $temp->grs_sale = $sale->GRSSALES;

                    $temp->save();
                }
                $success = array("message" => "Sales created successfully", "alert" => "success");
            }else{
                $success = array("message" => "Wrong file, please upload Sales xml file", "alert" => "danger");
            }
            return redirect()->route('sale.index')->with('success',$success);
        }
        catch (Exception $e) {
            $success = array("message" => "Wrong file, please upload a correct xml file", "alert" => "danger");
            return redirect()->route('sale.index')->with('success', $success);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $dateStart = date($request->dateStart);
        $dateEnd = $request->dateEnd;
        if($request->dateStart != null){
            //$sales = Sale::whereBetween('dob',[$dateStart,$dateEnd]);
            $sales = DB::table('sales')
           ->whereBetween('dob', [$dateStart, $dateEnd])
           ->get();
        }else{
            $sales = Sale::where('store_code', $id)->get()->toarray();
        }
        return $sales;
    }
    public function download()
    {
        return response()->download(storage_path('/app/public/20201110_131483_sales.xml'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sales = Sale::find($id);
        $stores = DB::table('sales')->groupBy(['store_code', 'id'])->get();
        $comps = DB::table('comps')->groupBy(['name', 'id'])->get();
        $promos = DB::table('promos')->groupBy(['store_code', 'id'])->get();
        $voidxes = DB::table('voidxes')->groupBy(['store_code', 'id'])->get();
        
        return view('sale.edit', compact(['sales', 'stores','comps','promos','voidxes']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        '*' => 'required',
     ], $message = [
        'required' => 'All fields are required.',]);
        $temp = Sale::find($id);
        $temp->dob = $request->get('dob');
        $temp->store_code =  $request->get('store');
        $temp->store_name = $request->get('store_name');
        $temp->name =  $request->get('name');
        $temp->id_sale =   $temp->id_sale ;
        $temp->net_sale = $temp->net_sale;
        $temp->comp = $request->get('comp');
        $temp->promo = $request->get('promo');
        $temp->void = $request->get('void');
        $temp->taxes =  $request->get('taxes');
        $temp->timestamps = true;
        $temp->update();

        return redirect()->route('sale.index')->with('success','Sale update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Sale::find($id)->delete();
        return redirect()->route('sale.index')->with('success','Sale dropped.');
    }
}
