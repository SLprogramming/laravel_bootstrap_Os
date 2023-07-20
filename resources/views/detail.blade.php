@extends('layout.nav',$badges)
@section('content')
<section
      class="container mt-3 p-3 bg-light border border-secondary shadow-sm p-3 mb-5 bg-body-tertiary rounded"
    >
      <div class="row">
        <div class="col-md-4">
          <img
            src="{{ asset('storage/images/products/'.$product->photo)}}"
            alt=""
            class="image-fluid"
            style="width: 100%"
          />
        </div>
        <div class="col-md-4">
          <h3>{{$product->prodct_name}}</h3>
          <h2 class="text-warning">{{$product->price}} - Ks</h2>
          <p>
            <span class="text-decoration-line-through">20,000 ks</span> - {{$product->discount}} %
          </p>
        
          <form action="{{url('/cart/add')}}" method="post">
            @csrf
            <input type="number" name="Qty" min="1" value="1" max="{{$product->Qty}}">
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <br>
            <input type="submit" value="Add to cart" class="btn btn-info mt-3">
          </form>
        </div>
        <div class="col-md-4">
          <p>Delivery</p>
          <p><i class="fas fa-location-dot"></i> Yangon , Bahan Township</p>
          <p>
            <i class="fas fa-taxi"></i> Home Delivery <br />
            2 ~ 5 days
          </p>
          <p><i class="fas fa-money-bill"></i> Cash on delivery available</p>
        </div>
      </div>
      <div class="row mt-4">
        <h3 class="text-start">Top Sell</h3>
        @foreach($products as $topProduct)
        <div class="col-md-3 mb-3">
          <div class="card text-center">
            <div
              class="bg-image hover-overlay ripple"
              data-mdb-ripple-color="light"
            >
              <img
                src="{{ asset('storage/images/products/'.$topProduct->photo) }}"
                class="img-fluid"
                width="100%"
              />
              <a href="{{url('/detail/'.$topProduct->id )}}">
                <div
                  class="mask"
                  style="background-color: rgba(251, 251, 251, 0.15)"
                ></div>
              </a>
            </div>
            <div class="card-body">
              <h5 class="card-title">{{$topProduct->prodct_name}}</h5>
              <p>{{$topProduct->price}} - Ks</p>
            </div>
          </div>
        </div>
        @endforeach
        
    </div>
    </section>
    
@endsection