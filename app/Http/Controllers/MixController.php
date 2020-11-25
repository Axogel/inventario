<?php

namespace App\Http\Controllers;

use App\Mix;
use Illuminate\Http\Request;
use SimpleXMLElement;

class MixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mixes = Mix::all();
        return view('mix.index')->with("mixes", $mixes);
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

        $MIXES = new SimpleXMLElement($xml);
        $nodename = $MIXES->getName();

        if($nodename == 'SALESMIX'){
            foreach ($MIXES->children() as $mix) {
                $temp = new Mix();
                $temp->sid = $MIXES->attributes()->SID;
                $temp->dob = $MIXES->attributes()->DOB;
                $temp->store_code = $MIXES->attributes()->STORECODE;
                $temp->store_name = $MIXES->attributes()->STORENAME;
                $temp->item_id = $mix->ITEMID;
                $temp->name = $mix->NAME;
                $temp->qty_sold = $mix->QTYSOLD;
                $temp->item_price = $mix->ITEMPRICE;
                $temp->total_price = $mix->TOTALPRICE;
                $temp->tax = $mix->TAX;
                $temp->cost_price = $mix->COSTPRICE;
                $temp->profit = $mix->PROFIT;

                $temp->save();
            }
            $message = 'Sales Mix created successfully';
        }else{
            $message = 'Wrong file, please upload Sales Mix xml file';
        }

        return redirect()->route('mix.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mix  $mix
     * @return \Illuminate\Http\Response
     */
    public function show(Mix $mix)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mix  $mix
     * @return \Illuminate\Http\Response
     */
    public function edit(Mix $mix)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mix  $mix
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mix $mix)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mix  $mix
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mix::find($id)->delete;
        return redirect()->route('mix.index')->with('success','Mix dropped.');
    }
}
