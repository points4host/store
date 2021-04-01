<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
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
        if($order_value == 'categories.name' or $order_value == 'categories.sub' or $order_value == 'categories.is_active'
        ){
            $order_value = $order_value;
        }else{
            $order_value = 'categories.id';
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


        $db = DB::table('categories')
            //->join('users', 'profiles.user_id', '=', 'users.id')
            ->select('categories.*')
            ->orderBy($order_value, $orderby)
            ->paginate($perpage);

        //dd($db);
        
        $url_pagination = $db->path().'?orderby='.$orderby.'&order_value='.$order_value.'&perpage='.$perpage.'&page=';

        return view('Admin.Pages.Category.Category_index',
        compact(['db','role_permission','perpage','url_pagination','order_value','html_orderby','css_orderby']));
        //$profiles = Profile::all();
        //return view('Admin.Pages.Users_index',compact(['profiles','role_permission']));
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
        $category = Category::where('sub',0)
        ->get();

        return view('Admin.Pages.Category.Category_Create',compact(['role_permission','category']));
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

        $x = $request->validate([
            'name' => ['required', 'string', 'max:150']
        ]);

        $r = Category::create([
            'name' => $request->name,
            'sub' => $request->sub,
            'arranging' => 0,
            'is_active' => $request->is_active,
        ]);

        return redirect(route('category.index'))->with('masg','تمت الإضافة بنجاح');
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
        $db = Category::find($id);
        $category = Category::where('sub',0)
        ->get();
        return view('Admin.Pages.Category.Category_Edit',compact(['role_permission','category','db']));
    }
    public function update(Request $request, $id)
    {
        $role_permission = PermissionController::check_permission(['administrator','user-add']);
        if($role_permission == false){dd('لا يمكن الوصول لهذة الصفحة');}

        $request->validate([
            'name' => ['required', 'max:150'],
            'sub' => [ 'integer'],
            'is_active' => [ 'integer']
        ]);
        
        $r = Category::find($id);
        $r->name = $request->name;
        $r->sub = $request->sub;
        $r->is_active = $request->is_active;
        $r->save();

        return redirect(route('category.index'))->with('masg','تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role_permission = PermissionController::check_permission(['administrator','user-add']);
        if($role_permission == false){dd('لا يمكن الوصول لهذة الصفحة');}

        if($role_permission == 1 && intval($id) != 0){

            $r = Category::destroy($id);
            if($r == 1){
                return response()->json(array('verify'=> 'success'), 200);
            }
        }
        return response()->json(array('verify'=> 'error'), 200);
    }
}
