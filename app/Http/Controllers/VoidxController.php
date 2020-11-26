<?php

namespace App\Http\Controllers;

use App\Voidx;
use Illuminate\Http\Request;
use SimpleXMLElement;

class VoidxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voids = Voidx::all();
        return view('voidx.index')->with("voids", $voids);
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
        $VOIDS = simplexml_load_file($xml);
        $nodename = $VOIDS->getName();

        if($nodename == 'VOIDS'){
            Voidx::where([
                ['sid', '=', $VOIDS->attributes()->SID],
                ['dob', '=', $VOIDS->attributes()->DOB],
            ])->delete();
            foreach ($VOIDS->children() as $void) {
                $temp = new Voidx();
                $temp->sid = $VOIDS->attributes()->SID;
                $temp->dob = $VOIDS->attributes()->DOB;
                $temp->store_code = $VOIDS->attributes()->STORECODE;
                $temp->store_name = $VOIDS->attributes()->STORENAME;
                $temp->check_void = $void->CHECK;
                $temp->item = $void->ITEM;
                $temp->reason = $void->REASON;
                $temp->manager = $void->MANAGER;
                $temp->time = $void->TIME;
                $temp->server = $void->SERVER;
                $temp->amount = $void->AMOUNT;
                $temp->manager_id = $void->MANAGERID;
                $temp->server_id = $void->SERVERID;

                $temp->save();
            }
            $success = array("message" => "Voids created successfully", "alert" => "success");
        }else{
            $success = array("message" => "Wrong file, please upload Voids xml file", "alert" => "danger");
        }

        return redirect()->route('voidx.index')->with('success',$success);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Voidx  $voidx
     * @return \Illuminate\Http\Response
     */
    public function show(Voidx $voidx)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Voidx  $voidx
     * @return \Illuminate\Http\Response
     */
    public function edit(Voidx $voidx)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voidx  $voidx
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voidx $voidx)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voidx  $voidx
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Voidx::find($id)->delete();
        return redirect()->route('voidx.index')->with('success','Void dropped.');
    }
}
