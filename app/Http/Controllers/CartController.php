<?php

namespace App\Http\Controllers;


use App\CartItems;
use App\Invoice;
use App\Product;
use App\TemporaryInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use TapPayments\GoSell;
//use Tap\TapPayment\Facade\TapPayment;
//use Tap\Essam\TapPayment;
//use essam/laravel-tap-payment;

/// essam/laravel-tap-payment
//use essam\laravel_tap_payment as FOOxs;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test_store_add()
    {
        GoSell::setPrivateKey("sk_live_C2nXZyVi1sqA7wSHjfWUGOTN");
        $charges_all = GoSell\Charges::all([
            "period"=> [
              "date"=> [
                "from"=> time() - (30 * 24 * 60 * 60),//last 30 days
                "to"=> time() + (30 * 24 * 60 * 60)//next 30 days
              ]
            ],
            "status"=> "",
            "starting_after"=> "",
            "limit"=> 25
          ]);
          dd($charges_all);
          /*
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.tap.company/v2/charges/chg_TS014820210308g4FO0304006",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_POSTFIELDS => "{}",
          CURLOPT_HTTPHEADER => array(
            "authorization: Bearer sk_live_C2nXZyVi1sqA7wSHjfWUGOTN",
          ),
        ));
        

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            dd($err);
        } else {
            $json_response = json_decode($response);
            dd($json_response);
        }
        */
        //GoSell::setPrivateKey("sk_test_XKokBfNWv6FIYuTMg5sLPjhJ");
        //$retrieved_charge = GoSell\Charges::retrieve($charge_created->id);
        //var_dump($retrieved_charge);

        /*
        $invoice = TapPayment::findCharge($id);
        $invoice = GoSell::fin
        */
        //$obj = new namespace\cart_tap_payment;
        /*
        $bar = new FOOxs\Payment(['secret_api_Key'=> 'gjgfjhjfhj']);
        $TapPay = new laravel_tap_payment();
        $TapPay->card([
            'number' => '5123450000000008',
            'exp_month' => 05,
            'exp_year' => 21,
            'cvc' => 100,
         ]);
         
         return $TapPay->charge([
                 'amount' => 200,
                 'currency' => 'AED',
                 'threeDSecure' => 'true',
                 'description' => 'test description',
                 'statement_descriptor' => 'sample',
                 'customer' => [
                    'first_name' => 'customer',
                    'email' => 'customer@gmail.com',
                 ],
                 'post' => [
                    'url' => null
                 ],
                 'redirect' => [
                    'url' => url('check_payment.php')
                 ]
            ]);
            */
    }
    public function test_store_response(Request $request){
        /*
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.tap.company/v2/charges/$charge_id",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_POSTFIELDS => "{}",
          CURLOPT_HTTPHEADER => array(
            "authorization: Bearer ".$this->CONFIG_VARS['secret_api_Key']." ",
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            dd($err);
        } else {
            $json_response = json_decode($response);
            dd($json_response);
        }
        */

    }
    public function index()
    {
        //
        $cart_products = 0;

        if(is_null(Auth::id())){
            // اذا لم يكون مسجل
            $cookei_id = Cookie::get('cart_id');
            $product = DB::table('cart_items')
            ->join('products', 'products.id', '=', 'cart_items.product_id')
            ->join('images', function ($join) {
                $join->on('cart_items.product_id', '=', 'images.product_id')
                     ->where('products.is_active', '=', 1)
                     ->where('images.is_master', '=', 1)
                     ->orderByDesc('images.is_master')
                     ->limit(1);
            })
            ->select('products.*', 'images.name as images_name', 'cart_items.*','cart_items.quantity as cart_items_quantity')
            ->where('cart_items.cookie_id', '=', $cookei_id)
            ->orderBy('cart_items.id', 'DESC')
            ->get();
        }else{

            $product = DB::table('cart_items')
            ->join('products', 'products.id', '=', 'cart_items.product_id')
            ->join('images', function ($join) {
                $join->on('cart_items.product_id', '=', 'images.product_id')
                     ->where('products.is_active', '=', 1)
                     ->where('images.is_master', '=', 1)
                     ->orderByDesc('images.is_master')
                     ->limit(1);
            })
            ->select('products.*', 'images.name as images_name', 'cart_items.*','cart_items.quantity as cart_items_quantity')
            ->where('cart_items.user_id', '=', Auth::id())
            ->orderBy('cart_items.id', 'DESC')
            ->get();


            //$last_names = array_column($product, 'last_name', 'id');
            //$result = array_unique($product);

            //dd($product);
            $get_id_product = array();
            foreach ($product as $xv) {
                array_push($get_id_product,$xv->product_id);
            }

            $id_product = array_unique($get_id_product);

            
           $new_product = array();


            foreach ($id_product as $value) {
                $items_quantity =0;
                foreach ($product as $pr) {
                    
                    if($value == $pr->product_id ){
                        
                        $items_quantity = $items_quantity + $pr->cart_items_quantity;
                        $pr_id = $pr->id;
                        $pr_name = $pr->name;
                        $pr_discount = $pr->discount;
                        $pr_unit_price = $pr->unit_price;
                        $pr_quantity = $pr->quantity;
                        $pr_quantity_sold = $pr->quantity_sold;
                        $pr_is_shipping = $pr->is_shipping;
                        $pr_is_active = $pr->is_active;
                        $pr_is_tax = $pr->is_tax;
                        $pr_price_after_discount = $pr->price_after_discount;
                        $pr_is_discount_active = $pr->is_discount_active;
                        $pr_start_date = $pr->start_date;
                        $pr_end_date = $pr->end_date;
                        $pr_max_orders = $pr->max_orders;
                        $pr_images_name = $pr->images_name;
                        $pr_user_id = $pr->user_id;
                        $pr_cookie_id = $pr->cookie_id;
                        $pr_product_id = $pr->product_id;
                    }
                }
                //dd($pr->id);
                $new_product[] = [
                    'id' => $pr_id,
                    'name' => $pr_name,
                    'discount' => $pr_discount,
                    'unit_price' => $pr_unit_price,
                    'quantity' => $pr_quantity,
                    'quantity_sold' => $pr_quantity_sold,
                    'is_shipping' => $pr_is_shipping,
                    'is_active' => $pr_is_active,
                    'is_tax' => $pr_is_tax,
                    'price_after_discount' => $pr_price_after_discount,
                    'is_discount_active' => $pr_is_discount_active,
                    'start_date' => $pr_start_date,
                    'end_date' => $pr_end_date,
                    'max_orders' => $pr_max_orders,
                    'images_name' => $pr_images_name,
                    'user_id' => $pr_user_id,
                    'cookie_id' => $pr_cookie_id,
                    'product_id' => $pr_product_id,
                    'cart_items_quantity' => $items_quantity,
                ];

                //array_push($new_product, $o);
            }
            //$obj= (object) array();
            //dd($new_product);
            //$product = (object) array();
            $product = $new_product;
            //dd($product);
/*
$product = DB::table('cart_items')
            ->join('products', 'products.id', '=', 'cart_items.product_id')
            ->join('images', function ($join) {
                $join->on('cart_items.product_id', '=', 'images.product_id')
                     ->where('products.is_active', '=', 1)
                     ->where('images.is_master', '=', 1)
                     ->orderByDesc('images.is_master')
                     ->limit(1);
            })
            ->select('products.*', 'images.name as images_name', 'cart_items.*',DB::raw("SUM(cart_items.quantity) as 'cart_items_quantity'"))
            ->groupBy('cart_items.product_id')
            ->where('cart_items.user_id', '=', Auth::id())
            ->orderBy('cart_items.id', 'DESC')
            ->get();
*/
/*
            $product = DB::table('cart_items')
            ->select('cart_items.product_id,cart_items.user_id',DB::raw('SUM(cart_items.quantity) as cart_items_quantity'))
            
            ->groupBy('cart_items.product_id')
            ->where('cart_items.user_id', '=', Auth::id())
            //->orderBy('cart_items.id', 'DESC')
            ->get();
            dd($product);
            */
        }

        /*
        if(date('Y-m-d') <= date($product[0]->end_date) ){
            // العرض لم ينتهي بعد
        }else{
            // التخفيض انتها
        }
        */
        /*
        $cart_total_price = 0;
        foreach ($product as $value) {
            if($value->is_discount_active == 1){
                if(date('Y-m-d') <= date($value->end_date) ){
                    // العرض لم ينتهي بعد
                    $cart_total_price = ($value->price_after_discount * $value->cart_items_quantity) + $cart_total_price;
                }else{
                    // التخفيض انتها
                    $cart_total_price = ($value->unit_price * $value->cart_items_quantity) + $cart_total_price;
                }
            }else{
                $cart_total_price = ($value->unit_price * $value->cart_items_quantity) + $cart_total_price;
            }
        }*/
        $cart_total_price = 0;
        foreach ($product as $value) {
            if($value['is_discount_active'] == 1){
                if(date('Y-m-d') <= date($value['end_date']) ){
                    // العرض لم ينتهي بعد
                    $cart_total_price = ($value['price_after_discount'] * $value['cart_items_quantity']) + $cart_total_price;
                }else{
                    // التخفيض انتها
                    $cart_total_price = ($value['unit_price'] * $value['cart_items_quantity']) + $cart_total_price;
                }
            }else{
                $cart_total_price = ($value['unit_price'] * $value['cart_items_quantity']) + $cart_total_price;
            }
        }
        return view('Web.cart',compact(['product','cart_total_price']));
    }
    public function create()
    {
        //
    }
    public function add_store(Request $request,$id)
    {
        $user_id = 0;
        $cookei_id = 0;
        
        $prod = Product::find($id);
        
        if(is_null($prod)){
            return response()->json(array('verify'=> 'error'), 200);
        }
        if(($prod->quantity - 1) > 0 ){
            
        }else{
            return response()->json(array('verify'=> 'error'), 200);
        }

        if(is_null(Auth::id())){
            // اذا لم يكون مسجل
            $cookei_id = Cookie::get('cart_id');
            if(is_null($cookei_id)){
                // انشاء جلسة جديدة
                $cookei_id = md5(time().'setid');
                Cookie::queue("cart_id", $cookei_id, 999999999);

                CartItems::create([
                    'user_id' => $user_id,
                    'cookie_id' => $cookei_id,
                    'product_id' => $id,
                    'quantity' => 1,
                ]);
                
                return response()->json(array('verify'=> 'success'), 200);

            }else{
                // في حال وجود جلسة

                /*
                $db = DB::table('cart_items')
                ->where('cookie_id', '=', $cookei_id)
                ->where('product_id', '=', $id)
                ->get();
            
            if(count($db) == 0 ){
                CartItems::create([
                    'user_id' => 0,
                    'cookie_id' => $cookei_id,
                    'product_id' => $id,
                    'quantity' => 1,
                ]);
            }else{
                $r = CartItems::find($db[0]->id);
                $r->quantity = $db[0]->quantity + 1;
                $r->save();
            }

            $db_count = DB::table('cart_items')
            ->where('cookie_id', '=', $cookei_id)
            ->count();
            */
            CartItems::create([
                'user_id' => 0,
                'cookie_id' => $cookei_id,
                'product_id' => $id,
                'quantity' => 1,
            ]);
            return response()->json(array('verify'=> 'success'), 200);
            }

        }else{
            $user_id = Auth::id();
            /*
            $db = DB::table('cart_items')
                ->where('user_id', '=', 1)
                ->where('product_id', '=', $id)
                ->get();

            if(count($db) == 0 ){
                CartItems::create([
                    'user_id' => $user_id,
                    'cookie_id' => 0,
                    'product_id' => $id,
                    'quantity' => 1,
                ]);
            }else{
                //
                $r = CartItems::find($db[0]->id);
                $r->quantity = $db[0]->quantity + 1;
                $r->save();
            }
            
            $db_count = DB::table('cart_items')
                ->where('user_id', '=', $user_id)
                ->count();
            */
            CartItems::create([
                'user_id' => $user_id,
                'cookie_id' => 0,
                'product_id' => $id,
                'quantity' => 1,
            ]);
            return response()->json(array('verify'=> 'success','count'=> 1), 200);
        }

        // اضافة المنتج للقاعدة

        /*
        $site_cookie = array("id"=>35);
        $zz = json_decode(Cookie::get('mysite_search'));
        Cookie::queue("mysite_search", json_encode($site_cookie), 999999999);
        */
        //dd($zz->Peter);
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
        if(is_null(Auth::id())){
            $cookei_id = Cookie::get('cart_id');
            CartItems::where('product_id', $id)
            ->where('cookie_id', $cookei_id)
            ->delete();
        }else{
            CartItems::where('product_id', $id)
            ->where('user_id', Auth::id())
            ->delete();
        }
        
        return response()->json(array('verify'=> 'success'), 200);
    }
    public function cart_count()
    {
        // SELECT SUM(Quantity) AS TotalItemsOrdered FROM OrderDetails;
        // السلة
        if(is_null(Auth::id())){
            $cookei_id = Cookie::get('cart_id');
            $db_count = DB::table('cart_items')
            ->where('cookie_id', '=', $cookei_id)
            ->count();
        }else{
            $db_count = DB::table('cart_items')
            ->where('user_id', '=', Auth::id())
            ->count();
        }
        return response()->json(array('verify'=> 'success','count'=>$db_count), 200);

    }
    public function increase($id)
    {
        //
        $cart = DB::table('cart_items')
        ->join('products', 'products.id', '=', 'cart_items.product_id')
        ->select('products.*', 'cart_items.*','products.quantity as products_quantity')
        ->where('cart_items.id', '=', $id)
        ->get();

        $count_products = $cart[0]->products_quantity - $cart[0]->quantity_sold;

        if($count_products <= 0 ){
           //return 'لا تتوفر منتجات';
           return response()->json(array('verify'=> 'error','mesg'=>'لا تتوفر منتجات'), 200);
        }
        
        $total_quantity = DB::table('cart_items')
        ->select(DB::raw('SUM(quantity) as total_quantity'))
        ->where('product_id', $cart[0]->product_id)
        ->where('user_id', Auth::id())
        ->get();

        $r = CartItems::find($id);
            $r->quantity = $cart[0]->quantity + 1;
            $r->save();
        
        return response()->json(array('verify'=> 'success','id'=> $id,'count'=> ($total_quantity[0]->total_quantity + 1)), 200);

    }
    public function decrease($id)
    {
        $cart = DB::table('cart_items')
        ->join('products', 'products.id', '=', 'cart_items.product_id')
        ->select('products.*', 'cart_items.*','products.quantity as products_quantity')
        ->where('cart_items.id', '=', $id)
        ->get();

        $count_products = $cart[0]->quantity - 1;

        if($count_products <= 0 ){
           //return 'لا تتوفر منتجات';
           return response()->json(array('verify'=> 'error','mesg'=>'لا تتوفر منتجات'), 200);
        }

        $total_quantity = DB::table('cart_items')
        ->select(DB::raw('SUM(quantity) as total_quantity'))
        ->where('product_id', $cart[0]->product_id)
        ->where('user_id', Auth::id())
        ->get();

        $r = CartItems::find($id);
            $r->quantity = $cart[0]->quantity - 1;
            $r->save();
        
        return response()->json(array('verify'=> 'success','id'=> $id,'count'=> ($total_quantity[0]->total_quantity - 1)), 200);

    }
    public function cart_go_pay(Request $request)
    {
        $cookei_id = 0;
        $user_id = 0;
        if(is_null(Auth::id())){
            $cookei_id = Cookie::get('cart_id');
            $cart_Invoice = DB::table('cart_items')
                ->join('products', 'products.id', '=', 'cart_items.product_id')
                ->select('products.*', 'cart_items.*','products.quantity as products_quantity')
                ->where('cookie_id', '=', $cookei_id)
                ->get();
        }else{
            $cart_Invoice = DB::table('cart_items')
                ->join('products', 'products.id', '=', 'cart_items.product_id')
                ->select('products.*', 'cart_items.*')
                ->where('user_id', '=', Auth::id())
                ->get();
        }
        
        foreach($cart_Invoice as $val)
        {
            $products_price =0;
            if($val->is_discount_active == 1){
                if(date('Y-m-d') <= date($val->end_date) ){
                    // العرض لم ينتهي بعد
                    $products_price = $val->price_after_discount;
                }else{
                    // التخفيض انتها
                    $products_price = $val->unit_price;
                }
            }else{
                $products_price = $val->unit_price;
            }

            $cart_items[] = array($val->name,$products_price,$val->quantity);  
        }

        $temporary_invoices = TemporaryInvoice::create([
            'token' => $request->token_temporary_invoices,
            'user_id' => $user_id,
            'cookie_id' => $cookei_id,
            'customer_name' => $request->payInput_name,
            'customer_email' => '',
            'customer_phone' => $request->payInput_phone,
            'customer_address' => $request->payInput_address,
            'invoice_details' => json_encode($cart_items),
            'amount' => $request->cart_total_price,
            'status' => 0
        ]);
        
        
        return response()->json(array('verify'=> 'success','token'=>$temporary_invoices), 200);

    }
    public function cart_redirect(Request $request,$id)
    {
        
        $status_invoices = 0;
        if(isset($request->tap_id)){
            GoSell::setPrivateKey("sk_test_4j5fKwQntD3HRluopkEWcO0d");
            $retrieved_charge = GoSell\Charges::retrieve($request->tap_id);

            if(isset($retrieved_charge->metadata->token)){

                $db = DB::table('temporary_invoices')
                    ->where('token', '=', $retrieved_charge->metadata->token)
                    ->get();

                if(!empty($db)){

                    if($retrieved_charge->response->code == '000'){

                        Invoice::create([
                            'token' => $retrieved_charge->metadata->token,
                            'user_id' => $db[0]->user_id,
                            'cookie_id' => $db[0]->cookie_id,
                            'customer_name' => $db[0]->customer_name,
                            'customer_email' => $db[0]->customer_email,
                            'customer_phone' => $db[0]->customer_phone,
                            'customer_address' => $db[0]->customer_address,
                            'invoice_details' => $db[0]->invoice_details,
                            'amount' => $retrieved_charge->amount,
                            'status' => $retrieved_charge->response->code,
                            'message_status' => $retrieved_charge->response->message,
                            'tap_token' => $request->token,
                            'tap_id' => $retrieved_charge->id
                        ]);
                        
                        $status_invoices = 1;
                        // حذف الفاتورة القديمة
                        //dd('ok');
                    }else{
                        // مشكلة في الطلب code
                        $status_invoices = 0;
                        $r = TemporaryInvoice::find($db->id);
                        $r->status = $retrieved_charge->response->code;
                        $r->message_status = $retrieved_charge->response->message;
                        $r->save();
                    }
                }else{
                    // مفتاح token غير صحيح
                    $status_invoices = 0;
                }

                
                /* 
                $charges_all = GoSell\Charges::all([
                    "period"=> [
                    "date"=> [
                        "from"=> time() - (30 * 24 * 60 * 60),//last 30 days
                        "to"=> time() + (30 * 24 * 60 * 60)//next 30 days
                    ]
                    ],
                    "status"=> "",
                    "starting_after"=> "",
                    "limit"=> 25
                ]);
                dd($charges_all);
                */
                return view('Web.redirect',compact(['status_invoices']));
            }
        }
        
        return abort(404);
        // return abort(403, 'Unauthorized action.');
    }
}
