<?php

namespace App\Http\Controllers;

use App\Comp;
use Illuminate\Http\Request;
use SimpleXMLElement;
use Exception;

class CompController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comps = Comp::all();
        return view('comp.index')->with("comps", $comps);
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
        try {
            $xml = $request->file('xmldata');
            $rawstring = file_get_contents($xml);
            $safestring = mb_convert_encoding($rawstring,'UTF-8');
            $safestring = preg_replace("|&([^;]+?)[\s<&]|","&amp;$1 ",$safestring);
            $COMPS = simplexml_load_string($safestring);
            $nodename = $COMPS->getName();

            if($nodename == 'COMPS'){

                Comp::where([
                    ['sid', '=', $COMPS->attributes()->SID],
                    ['dob', '=', $COMPS->attributes()->DOB],
                ])->delete();

                foreach ($COMPS->children() as $comp) {
                    $temp = new Comp();
                    $temp->sid = $COMPS->attributes()->SID;
                    $temp->dob = $COMPS->attributes()->DOB;
                    $temp->store_code = $COMPS->attributes()->STORECODE;
                    $temp->store_name = $COMPS->attributes()->STORENAME;
                    $temp->check_comps = $comp->CHECK;
                    $temp->name = $comp->NAME;
                    $temp->employee = $comp->EMPLOYEE;
                    $temp->manager = $comp->MANAGER;
                    $temp->comp_type = $comp->COMPTYPE;
                    $temp->qty = $comp->QTY;
                    $temp->amount = $comp->AMOUNT;
                    $temp->emp_id = $comp->EMPID;
                    $temp->man_id = $comp->MANID;

                    $temp->save();
                }
                $success = array("message" => "Comps created successfully", "alert" => "success");
            }else{
                $success = array("message" => "Wrong file, please upload Comps xml file", "alert" => "danger");
            }
            return redirect()->route('comp.index')->with('success', $success);
        }
        catch (Exception $e) {
            $success = array("message" => "Wrong file, please upload a correct xml file", "alert" => "danger");
            return redirect()->route('comp.index')->with('success', $success);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comp  $comp
     * @return \Illuminate\Http\Response
     */
    public function show(Comp $comp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comp  $comp
     * @return \Illuminate\Http\Response
     */
    public function edit(Comp $comp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comp  $comp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comp $comp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comp  $comp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comp::find($id)->delete;
        return redirect()->route('comp.index')->with('success','Comp dropped.');
    }

    public function downloadcomp()
    {
        return response()->download(storage_path('/app/public/20201110_131483_comps.xml'));

    }
}
