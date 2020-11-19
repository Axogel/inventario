<?php

namespace App\Http\Controllers;

use App\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promos = Promo::all();
        return view('promo.index')->with("promos", $promos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $promos = Promo::all();

        return view('promo.create')->with("promos", $promos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'xmltext'=>'required']);

        $promo = new Promo();
        $xml = simplexml_load_string($request->get('xmltext'));

        foreach ($xml->promos->promo as $element) {
            foreach($element as $key => $val) {
                echo "{$key}: {$val}";
            }
        }

        // $promo->sid;
        // $promo->dob;
        // $promo->store_code;
        // $promo->store_name;
        // $promo->check_promo;
        // $promo->check_name;
        // $promo->employee;
        // $promo->manager;
        // $promo->promo_type;
        // $promo->qty;
        // $promo->amount;
        // $promo->emp_id;
        // $promo->man_id;

        //$promo->save();

        return redirect()->route('promo.index')->with('success', 'Promo has created');
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
        $promo = Promo::find($id);
        return view('promo.edit')->with('promo', $promo);
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
        Promo::find($id)->delete();
        return redirect()->route('promo.index')->with('success','Promo dropped.');
    }
}
