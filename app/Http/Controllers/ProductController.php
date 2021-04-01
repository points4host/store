<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Image;
use App\Measurement;
use App\Product;
use App\SubProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $role_permission = PermissionController::check_permission(['administrator','user-show']);
        
        $perpage = intval($request->perpage);
        if($perpage == 0){
            $perpage = 10;
        }
        $order_value = security_post($request->order_value);
        if($order_value == 'products.name' or $order_value == 'products.is_active'
        or $order_value == 'products.quantity' or $order_value == 'products.unit_price'
        or $order_value == 'products.quantity_sold'){
            $order_value = $order_value;
        }else{
            $order_value = 'products.id';
        }

        // ASC OR desc
        $orderby = $request->orderby;
        if($orderby == 'asc'){
            $orderby = 'asc';
            $html_orderby = 'desc';
            $css_orderby = 'css_asc';
        }else{
            $orderby = 'desc';
            $html_orderby = 'asc';
            $css_orderby = 'css_desc';
        }

        $db = DB::table('products')
            ->orderBy($order_value, $orderby)
            ->paginate($perpage);
        
        $url_pagination = $db->path().'?orderby='.$orderby.'&order_value='.$order_value.'&perpage='.$perpage.'&page=';

        return view('Admin.Pages.Product.Product_index',
        compact(['db','role_permission','perpage','url_pagination','order_value','html_orderby','css_orderby']));
    }
    public function create()
    {
        //
        $role_permission = PermissionController::check_permission(['administrator','user-add']);
        $category = Category::all();
        $brand = Brand::all();
        $measurement = Measurement::all();

        return view('Admin.Pages.Product.Product_Create',compact(['role_permission','category','brand','measurement']));
    }
    public function store(Request $request)
    {
        //
        $request->validate([
            'imageFile' => 'required',
            'imageFile.*' => 'mimes:jpeg,jpg,png,wepq|max:20480'
        ],[
            'imageFile.required' => 'يرجى أختيار صورة على الاقل',
            'imageFile.*' => 'الامتدادت المسموح بها هي : jpeg,jpg,png,wepq'
        ]);
        
        $request->validate([
            'name' => ['required', 'max:200'],
            'quantity' => ['required'],
            'unit_price' => ['required'],
            'sub' => ['required'],
        ],[
            'name.required' => 'يرجى تعبيئة حقل أسم المنتج',
            'quantity.required' => 'يرجى كتابة الكمية للمنتج',
            'unit_price.required' => 'يرجى كتابة سعر المنتج',
            'sub.required' => 'يرجى أختيار تصنيف واحد على الاقل',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->is_active,
            //'number' => $request->number,
            'quantity' => $request->quantity,
            'weight' => $request->weight,
            'measurement_id' => $request->measurement,
            'seo_keywords' => $request->seo_keywords,
            'unit_price' => $request->unit_price,
            'brand_id' => $request->brand,
            'is_shipping' => $request->is_shipping,
            'is_tax' => $request->is_tax,
            'is_discount_active' => $request->is_discount_active,
            'price_after_discount' => $request->price_after_discount,
            'show_quantity' => $request->show_quantity,
            'max_orders' => $request->max_orders,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'discount' => $request->discount
        ]);

        foreach ($request->sub as $value) {
            SubProduct::create([
                'category_id' => $value,
                'product_id' => $product->id,
            ]);
        }

        $x = 0;
        foreach($request->file('imageFile') as $file)
        {
            $name = md5(time().$x).".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/', $name);  
            
            
            $master_img = 0;
            if(!empty($request->master_img[$x])){
                $master_img = 1;
            }
            $fileModal = Image::create([
                'name' => $name,
                'is_active' => 1,
                'order' => $request->img_order[$x],
                'is_master' => $master_img,
                'product_id' => $product->id,
            ]);
            $fileModal->save();
            $x++;
        }
        
        return redirect(route('product.index'))->with('masg','تمت الإضافة بنجاح');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $role_permission = PermissionController::check_permission(['administrator','user-add']);
        $db = Product::find($id);
        $category = Category::all();
        $measurement = Measurement::all();
        $select_subproduct = SubProduct::where('product_id',$id)
            ->get();


        $image = Image::where('product_id', $id)->get();
        
        $brand = Brand::all();
        
        $subproduct = array();
        foreach($select_subproduct as $key){
            $subproduct[] = $key->category_id;
        }
        return view('Admin.Pages.Product.Product_Edit',compact(['role_permission','db','category','subproduct','image','brand','measurement']));
    }
    public function update(Request $request, $id)
    {
        $role_permission = PermissionController::check_permission(['administrator','user-add']);
        if($role_permission == false){dd('لا يمكن الوصول لهذة الصفحة');}

        
        //
        $request->validate([
            'imageFile.*' => 'mimes:jpeg,jpg,png|max:20480'
        ],[
            'imageFile.*' => 'تحقق من الامتداد'
        ]);
        
        $request->validate([
            'name' => ['required', 'max:200'],
            'quantity' => ['required'],
            'unit_price' => ['required'],
            'sub' => ['required'],
        ],[
            'name.required' => 'يرجى تعبيئة حقل أسم المنتج',
            'quantity.required' => 'يرجى كتابة الكمية للمنتج',
            'unit_price.required' => 'يرجى كتابة سعر المنتج',
            'sub.required' => 'يرجى أختيار تصنيف واحد على الاقل',
        ]);

        $r = Product::find($id);
        $r->name = $request->name;
        $r->description = $request->description;
        $r->is_active = $request->is_active;
        //$r->number = $request->number;
        $r->quantity = $request->quantity;
        $r->weight = $request->weight;
        $r->measurement_id = $request->measurement;
        $r->brand_id = $request->brand;
        $r->seo_keywords = $request->seo_keywords;
        $r->unit_price = $request->unit_price;
        $r->is_shipping = $request->is_shipping;
        $r->is_tax = $request->is_tax;
        $r->is_discount_active = $request->is_discount_active;
        $r->price_after_discount = $request->price_after_discount;
        $r->show_quantity = $request->show_quantity;
        $r->max_orders = $request->max_orders;
        $r->start_date = $request->start_date;
        $r->end_date = $request->end_date;
        $r->discount = $request->discount;
        $r->save();
        
        SubProduct::where('product_id', $id)->delete();
        foreach ($request->sub as $value) {
            SubProduct::create([
                'category_id' => $value,
                'product_id' => $id,
            ]);
            // احصائية المنتجات
            //DB::table('categories')->where('id', $value)->decrement('number_products', $request->old_quantity);
            //DB::table('categories')->where('id', $value)->increment('number_products', $request->quantity);
        }

        
        if(!empty($request->file('imageFile'))){
            $x = 0;
            foreach($request->file('imageFile') as $file)
            {
                $name = md5(time().$x).".".$file->getClientOriginalExtension();
                $file->move(public_path().'/uploads/', $name);  
                
                $master_img = 0;
                if(!empty($request->master_img[$x])){
                    $master_img = 1;
                }
                $fileModal = Image::create([
                    'name' => $name,
                    'is_active' => 1,
                    'order' => $request->img_order[$x],
                    'is_master' => $master_img,
                    'product_id' => $id,
                ]);
                $fileModal->save();
                $x++;
            }
        }
        return redirect(route('product.index'))->with('masg','تمت التعديل بنجاح');
    }
    public function destroy($id)
    {
        //
        $image = Image::where('product_id', $id)->get();
        if(!empty($image)) {
            foreach($image as $file){
                $z = File::delete('uploads/'.$file->name);
                Image::destroy($file->id);
                if(!$z){
                    return response()->json(array('verify'=> 'error'), 200);
                }
            }
        }
        SubProduct::where('product_id', $id)->delete();
        $x = Product::where('id',$id)->delete();
        if($x == 1){
            return response()->json(array('verify'=> 'success'), 200);
        }
        return response()->json(array('verify'=> 'error'), 200);
    }
    public function image_destroy($id)
    {
        //
        $image = Image::find($id);
        $r = Image::destroy($id);
            if($r == 1){
                File::delete('uploads/'.$image->name);
                return response()->json(array('verify'=> 'success'), 200);
            }
        return response()->json(array('verify'=> 'error'), 200);
    }
    public function duplication($id)
    {
        //
        
        $db = Product::find($id);
        
        $product = Product::create([
            'name' => $db->name . ' - نسخة جديدة',
            'description' => $db->description,
            'is_active' => $db->is_active,
            //'number' => $db->number,
            'quantity' => $db->quantity,
            'weight' => $db->weight,
            'measurement_id' => $db->measurement_id,
            'seo_keywords' => $db->seo_keywords,
            'unit_price' => $db->unit_price,
            'brand_id' => $db->brand_id,
            'is_shipping' => $db->is_shipping,
            'is_tax' => $db->is_tax,
            'is_discount_active' => $db->is_discount_active,
            'price_after_discount' => $db->price_after_discount,
            'show_quantity' => $db->show_quantity,
            'max_orders' => $db->max_orders,
            'start_date' => $db->start_date,
            'end_date' => $db->end_date,
            'discount' => $db->discount
        ]);

        $SubProduct = SubProduct::where('product_id', $id)->get();
        
        foreach ($SubProduct as $value) {
            SubProduct::create([
                'category_id' => $value->category_id,
                'product_id' => $product->id,
            ]);
        }
        // imageFile
        $imageFile = Image::where('product_id', $id)->get();
        $x =0;
        foreach ($imageFile as $img) {
            $file_ext = array_reverse(explode(".",$img->name));
            $new_name = md5(time().$x.'copy').".".$file_ext["0"];
            
            $addImg = Image::create([
                'name' => $new_name,
                'product_id' => $product->id,
                'is_active' => $img->is_active,
                'order' => $img->order,
                'is_master' => $img->is_master,
            ]);
            if($addImg->exists){
                File::copy('uploads/'.$img->name, 'uploads/'.$new_name);
            }
            $x++;
        }
        return response()->json(array('verify'=> 'success'), 200);

        /// يحتاج تحسينات
    }
}
