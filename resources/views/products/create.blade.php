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
            
            <form class="form-group mb-5 border mt-3 p-3 shadow-sm rounded" action="{{url('/product/add')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <h3 class="text-success">Create New Product</h3>
                <input type="text" name="product_name" id="" placeholder="product name" class="form-control my-3 @error('product_name') is-invalid @enderror">
                @error('product_name')
                <div class="invalid-feedback position-relative  ">{{$message}}</div>
                @enderror
               
                <input type="text" name="size" id="" placeholder="size" class="form-control my-3  ">
                @error('size')
                <div class="invalid-feedback position-relative ">{{$message}}</div>
                @enderror
                <input type="text" name="price" id="" placeholder="price" class="form-control my-3  ">
                @error('price')
                <div class="invalid-feedback position-relative ">{{$message}}</div>
                @enderror
                <input type="text" name="discount" id="" placeholder="discount" class="form-control my-3  ">
                @error('discount')
                <div class="invalid-feedback position-relative ">{{$message}}</div>
                @enderror
                <input type="text" name="qty" id="" placeholder="Qty" class="form-control my-3 ">
                @error('qty')
                <div class="invalid-feedback position-relative ">{{$message}}</div>
                @enderror
                <input type="color" name="color" id="" placeholder="color" class="form-control my-3 ">

                <input type="file"  name="photo" class="form-control my-3 " >
                @error('photo')
                <div class="invalid-feedback position-relative ">{{$message}}</div>
                @enderror
                
                <input type="submit" value="create" class="btn btn-primary">
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</section>
@endsection

