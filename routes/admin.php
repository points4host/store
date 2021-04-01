<?php
namespace App\Http\Middleware;
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

// لوحة التحكم  أو قروب لراوت

Route::group(['prefix' => 'admin','middleware' => ['web','AdminControlPanelMiddleware']],function(){
    // Home
    Route::get('/', function () {
        return view('Admin.Home');
    });


    Route::resource('calendar', 'CalendarController');

    // Users
    Route::resource('user', 'UserController');
    /*
    Route::get('/users','UserController@index')->name('user.index');
    Route::get('/users/add','UserController@add')->name('user.add');
    Route::post('/users/create','UserController@create')->name('user.create');

    Route::get('/users/edite/{id}','UserController@edite')->name('user.edite');
    Route::post('/users/delete/{id}','UserController@delete')->name('user.delete');
    */




    
    //Permission
    Route::get('/permission','PermissionController@index')->name('permission.index');   // index

    // show  لم يتم الاضافة

    Route::get('/permission/add','PermissionController@add')->name('permission.add'); // create
    Route::post('/permission/create','PermissionController@create')->name('permission.create'); // store

    Route::get('/permission/edite/{id}','PermissionController@edite')->name('permission.edite'); // edit
    Route::post('/permission/update','PermissionController@update')->name('permission.update'); // update
    
    Route::post('/permission/delete/{id}','PermissionController@delete')->name('permission.delete'); // destroy


    // Product
    Route::resource('product', 'ProductController');
    Route::get('/product/image_destroy/{id}','ProductController@image_destroy')->name('product.image_destroy'); // destroy

    Route::get('/product/duplication/{id}','ProductController@duplication')->name('product.duplication'); // destroy



    Route::resource('brand', 'BrandController');
    Route::resource('measurement', 'MeasurementController');
    // Category
    //Route::post('/category/delete/{id}','CategoryController@delete')->name('category.delete'); // destroy
    Route::resource('category', 'CategoryController');
});
