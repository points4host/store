<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequsetDataController extends Controller
{
    //
    public function index(){
        dd('this is my Data');
        /*
        // نقل المتغيرات
        /// الطريقة الاول
        //$taital = 'موقع الاول';
        //return view('home',compact('taital'));

        /// الطريقة الثانية
        return view('home',['taital' => $taital]);
        
        /// الطريقة الثالثة
        return view('home')->with('taital',$taital);

        /// الطريقة الثالثة
        $data = ['a'=> 'ahng','id'=>45]
        return view('home')->with($data);
        */
        /*
        $taital = 'تجربة';
        
        return view('home',['taital' => $taital]);
        */
    }
}
