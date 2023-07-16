@extends('layout.admin_nav')
@section('content')

<div class="row mt-3">

        <div class="col-1"></div>
        <div class="col-10">
        <a href="{{url('/product/create')}}" class="btn btn-primary mb-2">Create New</a>
            <table class="table table-hover table-secondary align-middle mb-0 bg-white" >
                <thead class="bg-light">
                    <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Size</th>
                    <th>Qty</th>
                    <th>Discount</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)

                  
                    <tr>
                      <td>
                          <div class="d-flex align-items-center">
                          <img
                              src="{{asset('storage/images/products/'.$product->photo)}}"
                              alt=""
                              style="width: 45px; height: 45px"
                           
                              />
                          <div class="ms-3">
                              <p class="fw-bold mb-1">{{$product->prodct_name}}</p>
                             
                          </div>
                          </div>
                      </td>
                      <td>
                          <p class=" d-inline " >{{$product->price}} Ks</p>
                      </td>
                      <td>
                          <span class=" d-inline">{{$product->size}}</span>
                      </td>
                      <td>{{$product->Qty}}</td>
                      <td>{{$product->discount}}</td>
                      <td>
                          <a href="{{url('/product/edit/'.$product->id)}}" class="btn btn-primary btn-sm btn-rounded">
                          Edit
                          </a>
                          @if(auth()->user()->role=="superadmin")
                          <a href="{{url('/product/delete/'.$product->id)}}" class="btn btn-danger btn-sm btn-rounded">
                          Delete
                          </a>
                          @endif
                         
                      </td>
                    </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-1"></div>
    </div>
@endsection