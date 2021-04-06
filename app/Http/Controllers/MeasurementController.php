<?php

namespace App\Http\Controllers;

use App\Measurement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MeasurementController extends Controller
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
        if($order_value == 'measurements.name' or $order_value == 'measurements.is_active'
        ){
            $order_value = $order_value;
        }else{
            $order_value = 'measurements.id';
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

        $db = DB::table('measurements')
            ->select('measurements.*')
            ->orderBy($order_value, $orderby)
            ->paginate($perpage);
        
        $url_pagination = $db->path().'?orderby='.$orderby.'&order_value='.$order_value.'&perpage='.$perpage.'&page=';

        return view('Admin.Pages.Measurement.Measurement_Index',
        compact(['db','role_permission','perpage','url_pagination','order_value','html_orderby','css_orderby']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role_permission = PermissionController::check_permission(['administrator','user-add']);
        

        return view('Admin.Pages.Measurement.Measurement_Create',compact(['role_permission']));
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

        Measurement::create([
            'name' => $request->name,
            'is_active' => $request->is_active,
        ]);

        return redirect(route('measurement.index'))->with('masg','تمت الإضافة بنجاح');
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
        $db = Measurement::find($id);
        
        return view('Admin.Pages.Measurement.Measurement_Edit',compact(['role_permission','db']));
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
        
        $r = Measurement::find($id);
        $r->name = $request->name;
        $r->is_active = $request->is_active;
        $r->save();

        return redirect(route('measurement.index'))->with('masg','تم التعديل بنجاح');
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
