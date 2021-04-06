<?php

use App\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('per', function () {



//     $time_start = $this->microtime_float();
//     // $x = auth()->user()->hasRoles(['administrator','admin']);

//     $p = Permission::select('role_id','slug')
//             ->where('role_id',Auth::user()->role_id)
//             ->whereIn('slug', ['administrator','admin'])
//             ->get();

//     $time_end   = $this->microtime_float();
//     $time = $time_end - $time_start;

    

//     return $time;

// });
/*
Route::get('/', function () {
    return view('Web.index');
});
*/

/// بداية كود الواجهة الرئيسية

Route::get('/','WebController@index')->name('Web.index');

// عرض التصنيفات
Route::get('/product/{id}','WebController@product')->name('Web.product');

// عرض المنتج
Route::get('/category/{id}','WebController@category')->name('Web.category');


// منطقة العميل
Route::group(['prefix' => 'clientarea','middleware' => 'auth'],function(){

    Route::get('/','ClientAreaController@index')->name('clientarea.index');
    Route::post('/updateprofile','ClientAreaController@updateprofile')->name('clientarea.updateprofile');

    Route::get('/email','ClientAreaController@EmailIndex')->name('clientarea.EmailIndex');

    Route::get('/address','ClientAreaController@Address')->name('clientarea.Address');
    Route::post('/updateaddress','ClientAreaController@updateaddress')->name('clientarea.updateaddress');

    Route::get('/billing','ClientAreaController@Billing')->name('clientarea.Billing');
});


Route::resource('cart', 'CartController');
Route::post('/add_store/{id}','CartController@add_store')->name('cart.add_store');
Route::get('/cart_count','CartController@cart_count')->name('cart.cart_count');
Route::post('/cart_increase/{id}','CartController@increase')->name('cart.increase');
Route::post('/cart_decrease/{id}','CartController@decrease')->name('cart.decrease');
Route::post('/cart_go_pay','CartController@cart_go_pay')->name('cart.go_pay');
Route::get('/cart_redirect/{id}','CartController@cart_redirect')->name('cart.redirect');
/// نهاية كود الواجهة الرئيسية


Route::get('/test1',function(){
    return 'test 1';
})->name('test1');

Route::get('/test2/{id}',function($id){
    return $id;
})->name('test2');

Route::get('/test3/{id?}',function($id =''){
    return 'id = '.$id;
})->name('test3');

Route::get('/test4',function(){
    return 'test4 to Login';
})->middleware('auth');

Route::group(['prefix' => 'users','middleware' => 'auth'],function(){
    Route::get('/', function () {
        return 'users add';
    });
    #Route::get('add','UesreControllers@functionname');
});



Route::get('reguset_data','RequsetDataController@index');

Route::resource('ahmad_data','AhmadController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::get('/price/{id}', function ($id) {
    return view('Web.price'.$id);
});

Route::get('/cart2', function () {

    $prais = 10;
    $cart_total = 30;
    $cart_tex = 15;
    return view('Web.cart',compact(['prais','cart_total','cart_tex']));

});


Route::get('/pay','PaymentController@add')->name('pay');

Route::get('payment', 'PaymentController@index');
Route::get('charge', 'PaymentController@charge');

Route::get('pay1', 'PaymentController@pay1');
Route::get('charge1', 'PaymentController@charge1');
Route::get('pay2', 'PaymentController@pay2');

// Route::get('payment', 'PaymentController@payment')->name('payment');
// Route::get('payment', 'PaymentController@payment')->name('payment');
// Route::get('cancel', 'PaymentController@cancel')->name('payment.cancel');
// Route::get('payment/success', 'PaymentController@success')->name('payment.success');

