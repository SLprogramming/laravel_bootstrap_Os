<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'BlogController@home');
Route::get('/detail/{id}','BlogController@detail');
Route::get('/contact','BlogController@contact');
Route::post('/contact/send','BlogController@contackSend');


// product




Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// admin 


Route::group(['middleware'=>['auth']],function () {
    Route::get('/cart','BlogController@cart');
    Route::post('/cart/add','BlogController@cartAdd');
    Route::post('/checkout','BlogController@checkout');
    Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class,'logout']);
});
Route::group(['middleware'=>['adminOrNot']],function () {
    Route::get('/product/create','ProductController@create')->name('new-product');
    Route::get('/product/list','ProductController@list')->name('product_list');
    Route::get('/product/edit/{id}','ProductController@edit');
    Route::post('/product/add','ProductController@productAdd');
    Route::post('product/update/{id}','ProductController@productUpdate');
    
});
Route::group(['middleware'=>['superAdmin']],function () {
    Route::get('/product/delete/{id}','ProductController@delete');
    Route::get('/admin/list',"UserController@adminList");
    Route::get('/admin/create',"UserController@adminCreate");
    Route::get('/admin/delete/{id}',"UserController@adminDelete");
    Route::post('/admin/add',"UserController@adminAdd");
    Route::get('/admin/edit/{id}',"UserController@adminEdit");
    Route::post('/admin/update/{id}',"UserController@adminUpdate");
});

Route::get('/test',function() {


    $user = DB::table('users')
    ->join('products','products.user_id','=','users.id')
    ->select('products.*','users.name')
    ->get();
  
         $badges = DB::table('users')
        ->join('carts','carts.user_id','=','users.id')
        ->where('users.id','=',auth::user()->id)
        ->get()
        ->count();
        dd($badges);
});