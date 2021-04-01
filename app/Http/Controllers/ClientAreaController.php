<?php
namespace App\Http\Controllers;

use App\Address;
use App\Model\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientAreaController extends Controller
{
    //
    public function index()
    {
        $profile = Profile::where('user_id' , Auth::id())->get();
        $profile = $profile[0];
        
        return view('ClientArea.index',compact('profile'));
    }

    public function updateprofile(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'sex' => 'required',
            'phone' => 'required',
        ]);

        $profile = Profile::where('user_id' , Auth::id())->get();

        $profile = Profile::find($profile[0]->id);
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->sex = $request->sex;
        $profile->phone = $request->phone;
        $profile->save();

        return redirect('clientarea')->with('masg','ok');
    }

    public function EmailIndex()
    {
      return view('ClientArea.Email');
    }

    /***********/
    /*  Address  */
    public function Address()
    {
      $address = Address::find(Auth::id());
        return view('ClientArea.Address',compact('address'));
    }

    public function updateaddress(Request $request)
    {
        $request->validate([
            'country' => 'required',
            'city' => 'required',
            'taital' => 'required',
            'zip_code' => 'required|numeric',
        ]);

        $address = Address::find(Auth::id());
        $address->country = $request->country;
        $address->city = $request->city;
        $address->taital = $request->taital;
        $address->zip_code = $request->zip_code;
        $address->save();

        return redirect(route('clientarea.Address'))->with('masg','ok');
    }

    /*  Address  */
    public function Billing()
    {
        return view('ClientArea.Billing');
    }
}
