<?php

namespace App\Http\Controllers;

use App\Comp;
use Illuminate\Http\Request;
use SimpleXMLElement;

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
        $this->validate($request,['xmltext'=>'required']);
        $xml = $request->get('xmltext');

        $COMPS = new SimpleXMLElement($xml);
        $nodename = $COMPS->getName();

        if($nodename == 'COMPS'){
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
            $message = 'Comps created successfully';
        }else{
            $message = 'Wrong file, please upload Comps xml file';
        }
        return redirect()->route('comp.index')->with('success', $message);
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
}
