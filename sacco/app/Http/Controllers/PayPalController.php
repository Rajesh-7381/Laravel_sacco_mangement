<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
class PayPalController extends Controller
{
    //
    public function paypal(Request $request) {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
    
        $orderAmount = max(floatval($request->price), 0.01); // Ensure a minimum amount of 0.01, replace with your logic
    
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('success'),
                "cancel_url" => route('cancel')
            ],
            "purchase_units" => [
                [
                    "reference_id" => "default",
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => number_format($orderAmount, 2) // Format the amount to two decimal places
                    ]
                ]
            ]
        ]);
    
        // dd($response);
        if(isset($response['id']) && $response['id']!=null){
            foreach($response['links'] as $link){
                if($link['rel'] ==='approve'){
                    return redirect()->away($link['href']);
                }
            }
        }
        // return view('admin.paypal.paypal');
    }
    
    public function cancel(){
        // return view('admin.paypal.paypal');
    }
    public function success(Request $request){
        // return view('admin.paypal.paypal');
    }
}
