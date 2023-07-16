@extends('layout.admin_nav')
@section('content')
<style>
    body {
        overflow-x: hidden;
    }
</style>
<section>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form class="form-group mb-5 border mt-3 p-3 shadow-sm rounded" enctype="multipart/form-data" action="{{url('product/update/'.$product->id)}}" method="post" >
                @csrf
                <h3 class="text-success">Edit Product</h3>
                <input type="text" name="product_name" value="{{$product->prodct_name}}"  placeholder="product name" class="form-control @error('product_name') is-invalid @enderror my-2">
                @error('product_name')
                <div class="invalid-feedback position-relative  ">{{$message}}</div>
                @enderror
               
                <input type="text" name="size" value="{{$product->size}}"  placeholder="size" class="form-control my-2 @error('size') is-invalid @enderror">
                @error('size')
                <div class="invalid-feedback position-relative ">{{$message}}</div>
                @enderror
                
                <input type="text" name="price"  value="{{ $product->price }}" placeholder="price" class="form-control my-2 @error('price') is-invalid @enderror">
                @error('price')
                <div class="invalid-feedback position-relative ">{{$message}}</div>
                @enderror
                <input type="text" name="discount" value="{{$product->discount}}" placeholder="discount" class="form-control my-2 @error('discount') is-invalid @enderror">
                @error('discount')
                <div class="invalid-feedback position-relative ">{{$message}}</div>
                @enderror
                <input type="text" name="qty"  value="{{$product->Qty}}" placeholder="Qty" class="form-control my-2 @error('qty') is-invalid @enderror">
                @error('qty')
                <div class="invalid-feedback position-relative ">{{$message}}</div>
                @enderror
                <input type="color" name="color"  value="{{$product->color}}" placeholder="color" class="form-control my-2 @error('color') is-invalid @enderror">
                @error('color')
                <div class="invalid-feedback position-relative ">{{$message}}</div>
                @enderror
                <img  src="{{asset('storage/images/products/'.$product->photo)}}" width="100px" height="100px" alt="">
               
                <input type="file"  name="photo"  class="form-control my-2 @error('photo') is-invalid @enderror" >
                @error('photo')
                <div class="invalid-feedback position-relative ">{{$message}}</div>
                @enderror
                <input type="hidden" value="{{$product->photo}}" name="old_photo">
                
                <input type="submit" value="update" class="btn btn-primary">
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</section>
@endsection