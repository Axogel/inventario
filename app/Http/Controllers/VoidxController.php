<?php

namespace App\Http\Controllers;

use App\Models\Voidx;
use Illuminate\Http\Request;

class VoidxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voids = Voidx::all();
        return view('voidx.index')->with("voids", $voids);
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
            $VOIDS = simplexml_load_string($safestring);
            $nodename = $VOIDS->getName();
            if($nodename == 'VOIDS'){
                Voidx::where([
                    ['id', '=', $VOIDS->attributes()->ID],
                    ['dob', '=', $VOIDS->attributes()->DOB],
                ])->delete();
                foreach ($VOIDS->children() as $void) {
                    $temp = new Voidx();
         
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
        catch (Exception $e) {
            $success = array("message" => "Wrong file, please upload a correct xml file", "alert" => "danger");
            return redirect()->route('voidx.index')->with('success', $success);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Voidx $voidx)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voidx $voidx)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voidx $voidx)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Voidx::find($id)->delete();
        return redirect()->route('voidx.index')->with('success','Void dropped.');
    }
    
    public function downloadvoidx()
    {
        return response()->download(storage_path('/app/public/20201110_131483_voids.xml'));

    }

}
