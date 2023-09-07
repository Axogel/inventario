<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::all();
        return view('payment.index')->with("payments", $payments);
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
            $PAYMENTS = simplexml_load_string($safestring);
            $nodename = $PAYMENTS->getName();

            if($nodename == 'PAYMENTS'){
                Payment::where([
                    ['id', '=', $PAYMENTS->attributes()->ID],
                    ['dob', '=', $PAYMENTS->attributes()->DOB],
                ])->delete();

                foreach ($PAYMENTS->children() as $payment) {
                    $temp = new Payment();
                    $temp->id = $PAYMENTS->attributes()->ID;
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
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
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
