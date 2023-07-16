@extends('layout.nav',$badges)

@section('content')
<!-- banner -->
    <div
      id="carouselExampleInterval"
      class="carousel slide"
      data-mdb-ride="carousel"
    >
      <div class="carousel-inner">
        <div class="carousel-item active" data-mdb-interval="4000">
          <img
            src="./image/banner1.jpg"
            class="d-block w-100"
            alt="Wild Landscape"
            height="400px"
            width="auto"
          />
        </div>
        <div class="carousel-item" data-mdb-interval="3000">
          <img
            src="./image/banner2.jpg"
            class="d-block w-100"
            alt="Camera"
            height="400px"
            width="auto"
          />
        </div>
        <div class="carousel-item">
          <img
            src="./image/banner3.jpg"
            class="d-block w-100"
            alt="Exotic Fruits"
            height="400px"
            width="auto"
          />
        </div>
      </div>
      <button
        class="carousel-control-prev"
        data-mdb-target="#carouselExampleInterval"
        type="button"
        data-mdb-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        data-mdb-target="#carouselExampleInterval"
        type="button"
        data-mdb-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- banner -->

    <!-- brand -->
    <section class="container">
      <div class="row mt-4">
        
        <h3 class="text-center">Top Brand</h3>
        @foreach($products as $product)
          <div class="col-md-3">
            <div class="card text-center">
              <div
                class="bg-image hover-overlay ripple"
                data-mdb-ripple-color="light"
              >
                <img
                  src="{{ asset('storage/images/products/'.$product->photo) }}"
                  class="img-fluid"
                  width="100%"
                />
                <a href="{{ url('/detail/'.$product->id ) }}">
                  <div
                    class="mask"
                    style="background-color: rgba(251, 251, 251, 0.15)"
                  ></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title">{{$product->prodct_name}} </h5>
                <p> {{$product->price}} - Ks</p>
                <a href="{{url('/detail/'.$product->id ) }}" class="btn btn-primary">view detail</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      
    </section>
@endsection