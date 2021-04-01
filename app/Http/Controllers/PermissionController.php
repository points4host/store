<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{

    // الاستعلام عن الصلاحيات
    public static function check_permission(array $val)
    {
        // محاولة اتخفيف الاستعلام حتى يصبح مراه واحدة مع AdminControlPanelMiddleware
        $p = Permission::select('role_id','slug')
            ->where('role_id',Auth::user()->role_id)
            ->whereIn('slug', $val)
            ->get();
        
            if (count($p) > 0) {
                return true;
            }

        return false;
    }
    public function index(Request $request)
    {
        $role_permission = $this->check_permission(['administrator']);

        $perpage = intval($request->perpage);
        if($perpage == 0){
            $perpage = 5;
        }

        $order_value = security_post($request->order_value);
        if($order_value == 'display_name'){
            $order_value = $order_value;
        }else{
            $order_value = 'id';
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

        $role = Role::orderBy($order_value, $orderby)->paginate($perpage);

        $url_pagination = $role->path().'?orderby='.$orderby.'&order_value='.$order_value.'&perpage='.$perpage.'&page=';

        return view('Admin.Pages.Permission.Permission_index',
        compact(['role','role_permission','perpage','url_pagination','order_value','html_orderby','css_orderby']));
    }
    public function add()
    {
        $role_permission = $this->check_permission(['administrator']);

        $permission = array();

        return view('Admin.Pages.Permission.Permission_Add',compact(['role_permission','permission']));
    }
    public function create(Request $request)
    {
        $role_permission = $this->check_permission(['administrator']);
        if($role_permission == false){dd('لا يمكن الوصول لهذة الصفحة');}

        $x = $request->validate([
            'display_name' => ['required', 'string', 'max:150'],
            'description' => [ 'max:255']
        ]);

        $r = Role::create([
            'display_name' => $request->display_name,
            'description' => $request->description,
            'is_active' => $request->is_active,
        ]);

        if($request->is_active == 1){
            Permission::create([
                'slug' => $request->basic_validity,
                'role_id' => $r->id,
            ]);
            if(isset($request->permission) ){
                foreach($request->permission as $permission){

                    $p = Permission::create([
                        'slug' => $permission,
                        'role_id' => $r->id,
                    ]);
                }
            }
            
        }
        return redirect(route('permission.index'))->with('masg','تمت الإضافة بنجاح');
    }
    public function edite($id ='')
    {
        $role_permission = $this->check_permission(['administrator']);

        $role = Role::find($id);
        $select_permission = Permission::select('slug')
            ->where('role_id',$id)
            ->get();
        
        $permission = array();
        foreach($select_permission as $key){
            $permission[] = $key->slug;
        }

        // لابد من النظر في تسريع الاستعلام عن المصفوفة

        return view('Admin.Pages.Permission.Permission_Edite',compact(['role_permission','role','permission','id']));
    }
    public function update(Request $request)
    {
        $role_permission = $this->check_permission(['administrator']);
        if($role_permission == false){dd('لا يمكن الوصول لهذة الصفحة');}
        
        $request->validate([
            'display_name' => ['required', 'max:150'],
            'is_active' => [ 'integer']
        ]);
        
        $r = Role::find($request->id);
        $r->display_name = $request->display_name;
        $r->description = $request->description;
        $r->is_active = $request->is_active;
        $r->save();

        Permission::where('role_id', $request->id)->delete();

        if($request->is_active == 1){
            Permission::create([
                'slug' => $request->basic_validity,
                'role_id' => $request->id,
            ]);
            if(isset($request->permission) ){
                foreach($request->permission as $permission){

                    Permission::create([
                        'slug' => $permission,
                        'role_id' => $request->id,
                    ]);
                }
            }
        }

        return redirect(route('permission.index'))->with('masg','تم التعديل بنجاح');
    }
    public function delete ($id)
    {
        $role_permission = $this->check_permission(['administrator']);

        if($role_permission == 1 && intval($id) != 0){

            $r = Role::destroy($id);
            if($r == 1){
                return response()->json(array('verify'=> 'success'), 200);
            }
        }
        
        return response()->json(array('verify'=> 'error'), 200);

    }
}
