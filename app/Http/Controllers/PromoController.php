<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promos = Promo::all();
        return view('promo.index')->with("promos", $promos);
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
            $PROMOS = simplexml_load_string($safestring);

            $nodename = $PROMOS->getName();

            if($nodename == 'PROMOS'){
                Promo::where([
                    ['id', '=', $PROMOS->attributes()->ID],
                    ['dob', '=', $PROMOS->attributes()->DOB],
                ])->delete();

                foreach ($PROMOS->children() as $promo) {
                    $temp = new Promo();
                    $temp->id = $PROMOS->attributes()->ID;
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
                $success = array("message" => "Promos created successfully", "alert" => "success");
            }else{
                $success = array("message" => "Wrong file, please upload Promos xml file", "alert" => "danger");
            }
            return redirect()->route('promo.index')->with('success',$success);
        }
        catch (Exception $e) {
            $success = array("message" => "Wrong file, please upload a correct xml file", "alert" => "danger");
            return redirect()->route('promo.index')->with('success', $success);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Promo $promo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $promo = Promo::find($id);
        return view('promo.edit')->with('promo', $promo);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promo $promo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
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
