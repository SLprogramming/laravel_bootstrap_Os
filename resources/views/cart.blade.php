@extends('layout.nav',$badges)
@section('content')
<section class="container">
      <h3 class="text-center">Your Cart</h3>
      <div class="row">
        <form action="{{url('/checkout')}}" method="post">
          @csrf
        @foreach($carts as $cart)
        <div class="card mt-3">
          <div class="row">
            <div class="col-md-2">
              <img src="{{asset('storage/images/products/'.$cart->photo)}}" alt="" style="height: 150px" />
            </div>
            <div class="col-md-6 pt-4">
              <h5>{{$cart->prodct_name}}</h5>
              <h6>{{$cart->price}} Ks</h6>
              <input type="color" value="{{$cart->color}}" disabled />
            </div>
            <div class="col-md-4">
              <div class="row mt-5">
                <div class="col-md-6">
                 
                  <p>Quantity <strong>{{$cart->Qty}}</strong> </p>
                </div>
                <div class="col-md-6 d-flex justify-content-around">
                  <h6>price:{{$cart->price*$cart->Qty}} Ks</h6>
                  <i class="fa-solid fa-trash-can"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <input type="hidden" name="price[]" value="{{$cart->price*$cart->Qty}}">
        <input type="hidden" name="Qty[]" value="{{$cart->Qty}}">
        <input type="hidden" name="product_id[]" value="{{$cart->id}}">
        @endforeach
        <div class="row">
        <input type="submit" class="btn btn-primary mt-3 col-md-12" value="Check out">
        </div>
        
       </form>
      </div>
    </section>
@endsection