<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
// Route::post('/inserts',function(Request $request){
//     $u = new User();
//     $u->name = 'points4host';
//     $u->first_name = 'ahmad';
//     $u->second_name = 'Sud';
//     $u->last_name = 'alrshidi';
//     //$u->email = 'email@email.com';
//     //$u->email_verified_at = 'alrshidi';
//     //$u->phone = '0540264425';
//     $u->password = '543hj68fjhfgkfgh';
//     $u->save();
//     //return dd($request);
//     //return json_encode ($request);

// })->name('insertss');

// Route::get('/updates',function(Request $request){

//     $flight = User::find(2);
//     $flight->name = 'werwer';
//     $flight->save();
//     //return dd($request);

// });

// Route::get('/destroy',function(Request $request){

//     User::destroy([8, 9, 10]);
//     //$flight = User::find(2);
//     //$flight->delete();
//     //return dd($request);

// });