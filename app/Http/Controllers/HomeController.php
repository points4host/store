<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Profile;
use App\Permission;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function funcAhmed($val)
    {
        $p = Permission::select('role_id','slug')
            ->where('role_id',Auth::user()->role_id)
            ->whereIn('slug', $val)
            ->get();

            if (count($p) > 0) {
                return true;
            }

        return false;

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $time_start = $this->microtime_float();
        //$x = auth()->user()->hasRoles(['administrator','admin']);

        // Permission::select('role_id','slug')
        //     ->where('role_id',Auth::user()->role_id)
        //     ->whereIn('slug', ['administrator','admin'])
        //     ->get();
        $this->funcAhmed(['administrator','admin']);
        $time_end   = $this->microtime_float();
        $time = $time_end - $time_start;

        $time_start = $this->microtime_float();
        auth()->user()->hasRoles(['administrator','admin']);
        
        $time_end   = $this->microtime_float();
        $time2 = $time_end - $time_start;

        return $time."<br /> <br />".$time2;

    }

    public function microtime_float()
    {
        list($usec,$sec) = explode(" ",microtime());
        return ((float)$usec + (float)$sec);
    }
}




// //return view('home')->withProfiles(Profile::all());