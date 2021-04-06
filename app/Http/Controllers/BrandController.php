<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $role_permission = PermissionController::check_permission(['administrator','user-show']);
        
        $perpage = intval($request->perpage);
        if($perpage == 0){
            $perpage = 5;
        }
        $order_value = security_post($request->order_value);
        if($order_value == 'brands.name' or $order_value == 'brands.is_active'
        ){
            $order_value = $order_value;
        }else{
            $order_value = 'brands.id';
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

        $db = DB::table('brands')
            ->select('brands.*')
            ->orderBy($order_value, $orderby)
            ->paginate($perpage);
        
        $url_pagination = $db->path().'?orderby='.$orderby.'&order_value='.$order_value.'&perpage='.$perpage.'&page=';

        return view('Admin.Pages.Brand.Brand_Index',
        compact(['db','role_permission','perpage','url_pagination','order_value','html_orderby','css_orderby']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $role_permission = PermissionController::check_permission(['administrator','user-add']);
        

        return view('Admin.Pages.Brand.Brand_Create',compact(['role_permission']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role_permission = PermissionController::check_permission(['administrator','user-add']);
        if($role_permission == false){dd('لا يمكن الوصول لهذة الصفحة');}


        $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'imageFile' => 'required',
            'imageFile.*' => 'mimes:jpeg,jpg,png,wepq|max:20480'
        ],[
            'imageFile.required' => 'يرجى أختيار صورة على الاقل',
            'imageFile.*' => 'الامتدادت المسموح بها هي : jpeg,jpg,png,wepq'
        ]);

        $img = $request->file('imageFile');
        $name_img = md5(time()).".".$img->getClientOriginalExtension();
        $img->move(public_path().'/uploads/', $name_img);

        Brand::create([
            'name' => $request->name,
            'image' => $name_img,
            'is_active' => $request->is_active,
        ]);

        return redirect(route('brand.index'))->with('masg','تمت الإضافة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role_permission = PermissionController::check_permission(['administrator','user-add']);
        $db = Brand::find($id);
        
        return view('Admin.Pages.Brand.Brand_Edit',compact(['role_permission','db']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role_permission = PermissionController::check_permission(['administrator','user-add']);
        if($role_permission == false){dd('لا يمكن الوصول لهذة الصفحة');}

        $request->validate([
            'name' => ['required', 'max:150'],
            'is_active' => [ 'integer']
        ]);


        $img = $request->file('imageFile');

        
        if(!is_null($img)){
            
            $request->validate([
                'imageFile' => 'required',
                'imageFile.*' => 'mimes:jpeg,jpg,png,wepq|max:20480'
            ],[
                'imageFile.required' => 'يرجى أختيار صورة على الاقل',
                'imageFile.*' => 'الامتدادت المسموح بها هي : jpeg,jpg,png,wepq'
            ]);

            $img = $request->file('imageFile');
            $name_img = md5(time()).".".$img->getClientOriginalExtension();
            $img->move(public_path().'/uploads/', $name_img);
            $db = Brand::find($id);
            File::delete('uploads/'.$db->image);
        }

        $r = Brand::find($id);
        $r->name = $request->name;
        $r->is_active = $request->is_active;
        if(!is_null($img)){
            $r->image = $name_img;
        }
        $r->save();

        return redirect(route('brand.index'))->with('masg','تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
