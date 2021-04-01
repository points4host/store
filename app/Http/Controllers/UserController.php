<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use App\Address;
use App\Model\Profile;
use App\Role;
use App\User;

class UserController extends Controller
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
            $perpage = 10;
        }
        $order_value = security_post($request->order_value);
        if($order_value == 'profiles.first_name' or $order_value == 'users.name' or $order_value == 'users.is_active'
        or $order_value == 'users.updated_at' or $order_value == 'profiles.sex'){
            $order_value = $order_value;
        }else{
            $order_value = 'profiles.id';
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


        $db = DB::table('profiles')
            ->join('users', 'profiles.user_id', '=', 'users.id')
            ->select('profiles.*', 'users.*')
            ->orderBy($order_value, $orderby)
            ->paginate($perpage);

        //dd($db);
        
        $url_pagination = $db->path().'?orderby='.$orderby.'&order_value='.$order_value.'&perpage='.$perpage.'&page=';

        return view('Admin.Pages.Users.Users_index',
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

        $role = Role::all();
        return view('Admin.Pages.Users.Users_Create',compact(['role_permission','role']));
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
            'name' => ['required', 'regex:/(^([A-Za-z0-9]+)(\d+)?$)/u','min:4', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ],[
            'name.regex' => Lang::get('validation.name_string'),
            'email.unique' => Lang::get('validation.email_use'),
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password),
        ]);

        Profile::create([
            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'sex' => $request->sex,
            'phone' => $request->phone,
        ]);
        Address::create([
            'user_id' => $user->id,
            'country' => $request->country,
            'city' => $request->city,
            'taital' => $request->taital,
            'zip_code' => $request->zip_code,

        ]);

        return redirect(route('user.index'))->with('masg','تم الاضافة بنجاح');
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
        $role = Role::all();
        $db = User::find($id);

        $db = DB::table('users')
        ->where('users.id', '=', $id)
        ->join('profiles', 'profiles.user_id', '=', 'users.id')
        ->join('addresses', 'addresses.user_id', '=', 'users.id')
        //->select('products.*', 'measurements.name as measurements_name')
        //->orderBy('products.id', 'DESC')
        ->get();
        $db = $db[0];


        return view('Admin.Pages.Users.Users_Edit',compact(['role_permission','db','role','id']));
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
        //
        $role_permission = PermissionController::check_permission(['administrator','user-add']);
        if($role_permission == false){dd('لا يمكن الوصول لهذة الصفحة');}
        
        //$db = User::find($id);

        $request->validate([
            'name' => ['required', 'regex:/(^([A-Za-z0-9]+)(\d+)?$)/u','min:4', 'max:100'],
            //'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
        ],[
            'name.regex' => Lang::get('validation.name_string'),
            //'email.unique' => Lang::get('validation.email_use'),
        ]);
        if(!empty($request->password)){
            $request->validate([
                'password' => ['required', 'string', 'min:8'],
            ]);
        }

        $r = User::find($id);
        $r->name = $request->name;
        //$r->email = $request->email;
        $r->role_id = $request->role_id;
        if(!empty($request->password)){
        $r->password = Hash::make($request->password);
        }
        $r->save();

        DB::table('profiles')
        ->where('user_id' , $id)
        ->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'sex' => $request->sex,
            'phone' => $request->phone,
        ]);

        DB::table('addresses')
        ->where('user_id' , $id)
        ->update([
            'country' => $request->country,
            'city' => $request->city,
            'taital' => $request->taital,
            'zip_code' => $request->zip_code,
        ]);
        
        return redirect(route('user.index'))->with('masg','تمت التعديل بنجاح');
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
        Profile::where('user_id', $id)->delete();
        Address::where('user_id',$id)->delete();
        $x = User::where('id',$id)->delete();
        if($x == 1){
            return response()->json(array('verify'=> 'success'), 200);
        }
        return response()->json(array('verify'=> 'error'), 200);
    }
}
