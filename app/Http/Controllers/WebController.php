<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Image;
use App\Product;
use App\SubProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    //
    public function index(){
        //$product = Product::all();

        $product = DB::table('products')
            ->join('images', function ($join) {
                $join->on('products.id', '=', 'images.product_id')
                     ->where('products.is_active', '=', 1)
                     ->where('images.is_master', '=', 1)
                     ->orderByDesc('images.is_master')
                     ->limit(1);
            })
            ->join('measurements', 'products.measurement_id', '=', 'measurements.id')
            ->select('products.*', 'images.name as images_name', 'measurements.name as measurements_name')
            ->orderBy('products.id', 'DESC')
            ->get();
            
        return view('Web.index',compact(['product']));
    }
    public function product($id){

        $product = DB::table('products')
            ->where('products.id', '=', $id)
            ->join('measurements', 'products.measurement_id', '=', 'measurements.id')
            ->select('products.*', 'measurements.name as measurements_name')
            ->orderBy('products.id', 'DESC')
            ->get();
        $product = $product[0];


        $select_subproduct = SubProduct::where('product_id',$id)->get();
        $image = Image::where('product_id', $id)->get();

        $brand = Brand::find($product->brand_id);
            
        return view('Web.Product_Index',compact(['product','image','brand']));
    }
    public function category($id){
        
        $category = DB::table('categories')
            ->where('categories.id', '=', $id)
            //->join('categories', 'products.measurement_id', '=', 'categories.id')
            //->select('products.*', 'images.name as images_name', 'measurements.name as measurements_name')
            //->orderBy('products.id', 'DESC')
            ->get();
        //dd($category[0]->sub);

        
        if(count($category) == 0){
            
            return;
        }

        if($category[0]->sub == 0){
            $get_cat = [];
            $cat_array = array();
            array_push($cat_array, $category[0]->id);

            $cat = Category::where('sub', $id)->get();
            foreach($cat as $val){
                array_push($cat_array, $val->id);
            }

            $sub_cat = SubProduct::whereIn('category_id', $cat_array)->get();
            $array = array();
            foreach($sub_cat as $x){
                array_push($array, $x->product_id);
            }

        }else{
            $get_cat = Category::find($category[0]->sub);
            $sub_cat = SubProduct::where('category_id', $id)->get();
            $array = array();
            foreach($sub_cat as $val){
                array_push($array, $val->product_id);
            }
        }

        $product = DB::table('products')
            ->whereIn('products.id', array_unique($array))
            ->join('images', function ($join) {
                $join->on('products.id', '=', 'images.product_id')
                     ->where('products.is_active', '=', 1)
                     ->where('images.is_master', '=', 1)
                     ->orderByDesc('images.is_master')
                     ->limit(1);
            })
            ->join('measurements', 'products.measurement_id', '=', 'measurements.id')
            ->select('products.*', 'images.name as images_name', 'measurements.name as measurements_name')
            ->orderBy('products.id', 'DESC')
            ->get();

        $category = $category[0];
        
        return view('Web.Category',compact(['product','category','get_cat']));
    }
}
