<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comp;
use Illuminate\Support\Facades\Auth;

class CompController extends Controller
{
    public function index()
    {
        $comps = Comp::all();
        return view('comp.index')->with("comps", $comps);
    } 
    
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
                    ['id', '=', $COMPS->attributes()->ID],
                    ['dob', '=', $COMPS->attributes()->DOB],
                ])->delete();

                foreach ($COMPS->children() as $comp) {
                    $temp = new Comp();
                    $temp->id = $COMPS->attributes()->ID;
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
    public function edit($id)
    {
        $comp = Comp::find($id);
        return view('comp.edit', compact(['comp']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'dob' => 'required|date',
            'store_name' => 'required|string',
            'check_comps' => 'required|string',
            'name' => 'required|string|min:5',
            'employee' => 'required|string',
            'manager' => 'required|string',
            'comp_type' => 'required|string',
            'qty' => 'required|integer',
            'amount' => 'required|numeric',
            'emp_id' => 'required|integer',
            'man_id' => 'required|integer',
        ] , $message = [
            'required' => 'All fields are required.',]);
            
        $temp = Comp::find($id);
        $temp->dob =$request->get('dob');
        $temp->store_code =  $temp->store_code ;
        $temp->store_name = $request->get('store_name') ;
        $temp->check_comps = $request->get('check_comps');
        $temp->name = $request->get('name') ;
        $temp->employee =  $request->get('employee');
        $temp->manager = $request->get('manager') ;
        $temp->comp_type =  $request->get('comp_type');
        $temp->qty = $request->get('qty') ;
        $temp->amount = $request->get('amount') ;
        $temp->emp_id = $request->get('emp_id') ;
        $temp->man_id = $request->get('man_id') ;
        $temp->timestamps = true;
        $temp->update();
        $message = array("message" => "Comps updated successfully", "alert" => "success");

        return redirect()->route('comp.index')->with('success', $message);
    }
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
