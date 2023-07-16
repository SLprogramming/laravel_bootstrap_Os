<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create() {
        return view('products.create');
    }
    public function list() {
        $products = Product::all();
        return view('products.list',compact('products'));
    }
    public function edit($id) {
        $product = Product::findOrFail($id);

        return view('products.edit',compact('product'));
    }
    public function productAdd(Request $request) {

        $validated = $request->validate([
            'product_name' => 'required',
            'size' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'qty' => 'required',
            'color' => 'required',
            'photo' => 'required',
        ]);

        $image = $request->file('photo');
        $image_name = uniqid()."_".$image->getClientOriginalName();
        Storage::disk('local')->putFileAs('/public/images/products/',$image,$image_name);
        $product = new Product;
        $product->photo = $image_name;
        $product->prodct_name = $request->product_name;
        $product->size = $request->size;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->Qty = $request->qty;
        $product->user_id = auth()->user()->id;
        $product->color = $request->color;
        $product->save();
        return redirect()->route('product_list');
    }
    public function delete($id) {
        $product = Product::findOrFail($id);
        unlink(storage_path('app/public/images/products/'.$product->photo));
        $product->delete();
        return redirect()->route('product_list');
    }
    public function productUpdate( Request $request,$id) {
        $product = Product::findOrFail($id);
        $validated = $request->validate([
            'product_name' => 'required',
            'size' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'qty' => 'required',
            'color' => 'required',
            'photo' => 'required',
        ]);
        if(!empty($request->photo)) {
            $image = $request->file('photo');
            $image_name = uniqid()."_".$image->getClientOriginalName();
            Storage::disk('local')->putFileAs('/public/images/products/',$image,$image_name);
            unlink(storage_path('app/public/images/products/'.$request->old_photo));
        }else {
            $image_name = $request->old_photo;
        }

        $product->photo =$image_name;
        $product->prodct_name = $request->product_name;
        $product->size = $request->size;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->Qty = $request->qty;
        $product->user_id = auth()->user()->id;
        $product->color = $request->color;
        $product->save();
        return redirect()->route('product_list');
    }
}
