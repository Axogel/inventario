<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mix;

class MixController extends Controller
{
    public function index()
    {
        $mixes = Mix::all();
        return view('mix.index')->with("mixes", $mixes);
    }
    public function store(Request $request)
    {
        try {
            $xml = $request->file('xmldata');
            $rawstring = file_get_contents($xml);
            $safestring = mb_convert_encoding($rawstring,'UTF-8');
            $safestring = preg_replace("|&([^;]+?)[\s<&]|","&amp;$1 ",$safestring);
            $MIXES = simplexml_load_string($safestring);
            $nodename = $MIXES->getName();

            if($nodename == 'SALESMIX'){

                Mix::where([
                    ['id', '=', $MIXES->attributes()->ID],
                    ['dob', '=', $MIXES->attributes()->DOB],
                ])->delete();

                foreach ($MIXES->children() as $mix) {
                    $temp = new Mix();
                    $temp->id = $MIXES->attributes()->ID;
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
                $success = array("message" => "Sales Mix created successfully", "alert" => "success");
            }else{
                $success = array("message" => "Wrong file, please upload a Sales Mix xml file", "alert" => "danger");
            }

            return redirect()->route('mix.index')->with('success', $success);
        }
        catch (Exception $e) {
            $success = array("message" => "Wrong file, please upload a correct xml file", "alert" => "danger");
            return redirect()->route('mix.index')->with('success', $success);
        }
    }
    public function destroy($id)
    {
        Mix::find($id)->delete;
        return redirect()->route('mix.index')->with('success','Mix dropped.');
    }

    public function downloadmix()
    {
        return response()->download(storage_path('/app/public/20201110_131483_mix.xml'));

    }
}
