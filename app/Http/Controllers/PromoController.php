<?php

namespace App\Http\Controllers;

use App\Promo;
use Illuminate\Http\Request;
use SimpleXMLElement;

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
        // $promos = Promo::all();

        // return view('promo.create')->with("promos", $promos);
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

        $PROMOS = new SimpleXMLElement($xml);
        $nodename = $PROMOS->getName();

        if($nodename == 'PROMOS'){
            foreach ($PROMOS->children() as $promo) {
                $temp = new Promo();
                $temp->sid = $PROMOS->attributes()->SID;
                $temp->dob = $PROMOS->attributes()->DOB;
                $temp->store_code = $PROMOS->attributes()->STORECODE;
                $temp->check_promo = $promo->CHECK;
                if($promo->CHECKNAME == '' || $promo->CHECKNAME == null)
                    $temp->check_name = 0;
                else
                    $temp->check_name = $promo->CHECKNAME;
                $temp->employee = $promo->EMPLOYEE;
                $temp->manager = $promo->MANAGER;
                $temp->store_name = $PROMOS->attributes()->STORENAME;
                $temp->promo_type = $promo->PROMOTYPE;
                $temp->qty = $promo->QTY;
                $temp->amount = $promo->AMOUNT;
                $temp->emp_id = $promo->EMPID;
                $temp->man_id = $promo->MANID;

                $temp->save();
            }
            $message = 'Promos created successfully';
        }else{
            $message = 'Wrong file, please upload Promos xml file';
        }

        return redirect()->route('promo.index')->with('success',$message);
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

    public function downloadpromo()
    {
        return response()->download(storage_path('/app/public/20201110_131483_promos.xml'));

    }
}
