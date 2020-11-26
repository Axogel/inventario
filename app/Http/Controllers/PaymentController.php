<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use SimpleXMLElement;
use Exception;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all();
        return view('payment.index')->with("payments", $payments);
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
            $PAYMENTS = simplexml_load_string($safestring);
            $nodename = $PAYMENTS->getName();

            if($nodename == 'PAYMENTS'){
                Payment::where([
                    ['sid', '=', $PAYMENTS->attributes()->SID],
                    ['dob', '=', $PAYMENTS->attributes()->DOB],
                ])->delete();

                foreach ($PAYMENTS->children() as $payment) {
                    $temp = new Payment();
                    $temp->sid = $PAYMENTS->attributes()->SID;
                    $temp->dob = $PAYMENTS->attributes()->DOB;
                    $temp->store_code = $PAYMENTS->attributes()->STORECODE;
                    $temp->store_name = $PAYMENTS->attributes()->STORENAME;
                    $temp->tender = $payment->TENDER;
                    $temp->check_payments = $payment->CHECK;
                    $temp->card = $payment->CARD;
                    if($payment->EXP == '' || $payment->EXP == null)
                        $temp->exp = 0;
                    else
                        $temp->exp = $payment->EXP;
                    $temp->qty = $payment->QTY;
                    $temp->amount = $payment->AMOUNT;
                    $temp->total = $payment->TOTAL;
                    $temp->empployee_name = $payment->EMPPLOYEENAME;
                    $temp->empployee_id = $payment->EMPPLOYEEID;

                    $temp->save();
                }
                $success = array("message" => "Payments created successfully", "alert" => "success");
            }else{
                $success = array("message" => "Wrong file, please upload Payments xml file", "alert" => "danger");
            }
            return redirect()->route('payment.index')->with('success',$success);
        }
        catch (Exception $e) {
            $success = array("message" => "Wrong file, please upload a correct xml file", "alert" => "danger");
            return redirect()->route('payment.index')->with('success', $success);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Payment::find($id)->delete;
        return redirect()->route('payment.index')->with('success','Payment dropped.');
    }

    public function downloadpayment()
    {
        return response()->download(storage_path('/app/public/20201110_131483_payments.xml'));

    }
}
