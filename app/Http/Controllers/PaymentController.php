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
                    $temp->employee_name = $payment->EMPLOYEENAME;
                    $temp->employee_id = $payment->EMPLOYEEID;

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
    public function edit($id)
    {
        $payment = Payment::find($id);
        return view('payment.edit')->with('payment', $payment);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

      $request->validate([
        'dob' => 'required|string',
        'store_name' => 'required|string',
        'check_promo' => 'required|string',
        'employee' => 'required|string|min:5',
        'manager' => 'required|string',
        'promo_type' => 'required|string',
        'qty' => 'required|string',
        'amount' => 'required|numeric',
        'emp_id' => 'required|string',
        'man_id' => 'required|string',
        'check_name' => 'required|string',
     ], $message = [
        'required' => 'All fields are required.',]);

        $temp = Payment::find($id);
        
        $temp->dob =$request->get('dob');
        $temp->store_code = $temp->store_code ;
        $temp->check_promo  =  $request->get('check_promo');
        $temp->check_name = $request->get('check_name') ;
        $temp->employee =  $request->get('employee');
        $temp->manager =  $request->get('manager') ;
        $temp->store_name =  $request->get('store_name');
        $temp->promo_type =  $request->get('promo_type') ;
        $temp->qty =  $request->get('qty');
        $temp->amount =  $request->get('amount');
        $temp->emp_id =  $request->get('emp_id') ;
        $temp->man_id =  $request->get('man_id') ;

        $temp->timestamps = true;
        $temp->update();
        $message = array("message" => "Payment updated successfully", "alert" => "success");

        return redirect()->route('payment.index')->with('success', $message);

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
