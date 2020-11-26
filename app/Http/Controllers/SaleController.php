<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;
use SimpleXMLElement;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        return view('sale.index')->with("sales", $sales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['xmltext'=>'required']);

        $xml = $request->file('xmldata');
        $SALES = simplexml_load_file($xml);

        $nodename = $SALES->getName();

        if($nodename == 'CATEGORIES'){
            Sale::where([
                ['sid', '=', $SALES->attributes()->SID],
                ['dob', '=', $SALES->attributes()->DOB],
            ])->delete();
            foreach ($SALES->children() as $sale) {
                $temp = new Sale();
                $temp->sid = $SALES->attributes()->SID;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sale::find($id)->delete();
        return redirect()->route('sale.index')->with('success','Sale dropped.');
    }
}
