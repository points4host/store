<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{

    
    /*
    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true); //set it to 'false' when go live
    }
*/
    public function index()
    {
        $prais = 10;
        $cart_total = 30;
        $cart_tex = 15;
        return view('Web.cart',compact(['prais','cart_total','cart_tex']));
        //return view('payment');
    }
    public function charge()
    {
        
        return view('Web.Payment.Charge');
    }
    public function pay1()
    {
        return view('Web.Payment.Payment1');
    }
    public function charge1()
    {
        return view('Web.Payment.Charge1');
    }
    public function pay2()
    {
        return view('Web.Payment.Payment2');
    }
}
