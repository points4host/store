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

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('Web.redirect');


        //
        if(is_null(Auth::id())){
            // اذا لم يكون مسجل
            $cookei_id = Cookie::get('cart_id');
            $product = DB::table('cart_items')
            ->join('products', 'products.id', '=', 'cart_items.product_id')
            ->join('images', function ($join) {
                $join->on('cart_items.product_id', '=', 'images.product_id')
                     ->where('products.is_active', '=', 1)
                     ->where('images.is_master', '=', 0)
                     ->orderByDesc('images.is_master')
                     ->limit(1);
            })
            ->select('products.*', 'images.name as images_name', 'cart_items.*', 'cart_items.quantity as cart_items_quantity')
            ->where('cart_items.cookie_id', '=', $cookei_id)
            ->orderBy('cart_items.id', 'DESC')
            ->get();
        }else{

            $product = DB::table('cart_items')
            ->join('products', 'products.id', '=', 'cart_items.product_id')
            ->join('images', function ($join) {
                $join->on('cart_items.product_id', '=', 'images.product_id')
                     ->where('products.is_active', '=', 1)
                     ->where('images.is_master', '=', 0)
                     ->orderByDesc('images.is_master')
                     ->limit(1);
            })
            ->select('products.*', 'images.name as images_name', 'cart_items.*','cart_items.quantity as cart_items_quantity')
            ->where('cart_items.user_id', '=', Auth::id())
            ->orderBy('cart_items.id', 'DESC')
            ->get();
        }

        /*
        if(date('Y-m-d') <= date($product[0]->end_date) ){
            // العرض لم ينتهي بعد
        }else{
            // التخفيض انتها
        }
        */
        
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
            return response()->json(array('verify'=> 'error','count'=>1), 200);
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
                
                return response()->json(array('verify'=> 'success','count'=>1), 200);

            }else{
                // في حال وجود جلسة

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
            return response()->json(array('verify'=> 'success','count'=> $db_count), 200);


            }

        }else{
            $user_id = Auth::id();

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
            return response()->json(array('verify'=> 'success','count'=> $db_count), 200);
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
        CartItems::where('id', $id)->delete();
        return response()->json(array('verify'=> 'success'), 200);
    }
    public function cart_count()
    {
        //
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
        
        $r = CartItems::find($id);
            $r->quantity = $cart[0]->quantity + 1;
            $r->save();
        
        return response()->json(array('verify'=> 'success','id'=> $id,'count'=> ($cart[0]->quantity + 1)), 200);

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
        
        $r = CartItems::find($id);
            $r->quantity = $cart[0]->quantity - 1;
            $r->save();
        
        return response()->json(array('verify'=> 'success','id'=> $id,'count'=> ($cart[0]->quantity - 1)), 200);

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
    public function cart_go_redirect(Request $request,$id)
    {
        
        
        //dd($request->tap_id);

        if(is_null($request->tap_id)){
            if(!is_null($id)){

                $db = DB::table('invoices')
                ->where('token', '=', $id)
                ->get();

                if(isset($db)){
                    //dd($db);
                }
            }
        }

        /*
        GoSell::setPrivateKey("sk_test_XKokBfNWv6FIYuTMg5sLPjhJ");

        $retrieved_refund = GoSell\Refunds::retrieve($request->tap_id);

        dd($retrieved_refund);
        */
        
        
        //dd($request);
        /*
        if(!empty($id)){
            $db = DB::table('temporary_invoices')
                ->where('token', '=', $id)
                ->get();
            
            if(!empty($db)){
                //dd($db[0]->cookie_id);
                Invoice::create([
                    'token' => $id,
                    'user_id' => $db[0]->user_id,
                    'cookie_id' => $db[0]->cookie_id,
                    'customer_name' => $db[0]->customer_name,
                    'customer_email' => $db[0]->customer_email,
                    'customer_phone' => $db[0]->customer_phone,
                    'customer_address' => $db[0]->customer_address,
                    'invoice_details' => $db[0]->invoice_details,
                    'amount' => $db[0]->amount,
                    'status' => 1,
                    'tap_token' => $request->token,
                    'tap_id' => $request->tap_id
                ]);
            }
        }
        */
        return view('Web.redirect');
    }
    public function cart_go_response(Request $request)
    {
        
        if(!empty($request->callback_token)){
            $db = DB::table('temporary_invoices')
                ->where('token', '=', $request->callback_token)
                ->get();
            
            if(!empty($db)){

                if($request->callback_code == '000'){

                    Invoice::create([
                        'token' => $request->callback_token,
                        'user_id' => $db[0]->user_id,
                        'cookie_id' => $db[0]->cookie_id,
                        'customer_name' => $db[0]->customer_name,
                        'customer_email' => $db[0]->customer_email,
                        'customer_phone' => $db[0]->customer_phone,
                        'customer_address' => $db[0]->customer_address,
                        'invoice_details' => $db[0]->invoice_details,
                        'amount' => $request->callback_amount,
                        'status' => $request->callback_code,
                        'message_status' => $request->callback_message,
                        'tap_token' => $request->callback_tap_token,
                        'tap_id' => $request->callback_tap_id
                    ]);

                    // حذف الفاتورة القديمة

                }else{
                    // bbbb  temporary_invoices
                    $r = TemporaryInvoice::find($db->id);
                    $r->status = $request->callback_code;
                    $r->message_status = $request->callback_message;
                    $r->save();
                }
            }
        }
        return response()->json(array('verify'=> 'success'), 200);
    }
}
