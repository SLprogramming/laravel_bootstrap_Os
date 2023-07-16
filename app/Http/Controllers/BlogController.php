<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Contact;
use App\Models\Order;
use Auth;

class BlogController extends Controller
{
    
    public function home() {
        $products = Product::all();
       
        if(auth::check()) {
            $badge = DB::table('users')
            ->join('carts','carts.user_id','=','users.id')
            ->where('users.id','=',auth::user()->id)
            ->get()
            ->count();
            $badges = [$badge];
        }else{
            $badges = [0];
        }
       
        
        return view('index',compact('badges','products'));
    }
    public function detail($id) {
        $product = Product::find($id);
        $products = Product::all();
        if(auth::check()) {
            $badge = DB::table('users')
            ->join('carts','carts.user_id','=','users.id')
            ->where('users.id','=',auth::user()->id)
            ->get()
            ->count();
            $badges = [$badge];
        }else{
            $badges = [0];
        }
        return view('detail',compact('badges','product','products'));
    }
    public function contact() {
        if(auth::check()) {
            $badge = DB::table('users')
            ->join('carts','carts.user_id','=','users.id')
            ->where('users.id','=',auth::user()->id)
            ->get()
            ->count();
            $badges = [$badge];
        }else{
            $badges = [0];
        }
        return view('contact',compact('badges'));
    }
    public function cart() {
        $carts = DB::table('carts')
        ->join('products','products.id','=','carts.product_id')
        ->select('products.*','carts.Qty')
        ->where('carts.user_id','=',auth()->user()->id)
        ->get();
        if(auth::check()) {
            $badge = DB::table('users')
            ->join('carts','carts.user_id','=','users.id')
            ->where('users.id','=',auth::user()->id)
            ->get()
            ->count();
            $badges = [$badge];
        }else{
            $badges = [0];
        }
        return view('cart',compact('carts','badges'));
    }
    public function checkout(Request $request) {
        $check=[];
        
        for($i=0;$i < count($request->product_id);$i++) {
            $check[] = [
                "product_id" => $request->product_id[$i],
                "Qty" => $request->Qty[$i],
                "user_id" => auth()->user()->id,
                "price" => $request->price[$i],
                "order_id" => time(),
            ];
            Cart::where('product_id','=',$request->product_id[$i])->where('user_id','=',auth()->user()->id)->delete();
        };
        Order::insert($check);
        return redirect('/cart');
    }
    public function cartAdd(Request $request) {
        
        $cart = new Cart;
        $cart->Qty = $request->Qty;
        $cart->product_id =  $request->product_id;
        $cart->user_id=auth()->user()->id;
        $cart->save();
        return back();


    }
    public function contackSend(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'content' => 'required',
           
        ]);
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->content;
        $contact->save();
        return back();
    }
}
