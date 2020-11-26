<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

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
        $xml = $request->get('xmltext');

        $SALES = new SimpleXMLElement($xml);
        $nodename = $SALES->getName();

        if($nodename == 'CATEGORIES'){
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
            $message = 'Sales created successfully';
        }else{
            $message = 'Wrong file, please upload Sales xml file';
        }

        return redirect()->route('sale.index')->with('success', $message);
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
    public function download()
    {
        return response()->download(storage_path('/app/public/20201110_131483_sales.xml'));

    }

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
