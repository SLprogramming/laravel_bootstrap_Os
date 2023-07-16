@extends('layout.nav',$badges)
@section('content')
<div class="container mt-3">
    <div class="row ">
        <div class="col-3  p-2 px-4">
            <div class="bg-light shadow p-2 py-3 rounded text-center">
            <i class="fa-solid fa-phone fs-1"></i>
            
            <p>09-123-456-789</p>
            <p>09-987-654-321</p>
            </div>
        </div>
        <div class="col-3  p-2 px-4">
            <div class="bg-light shadow p-2 py-3 rounded text-center">
            <i class="fa-solid fa-envelope fs-1"></i>
           
            <p>SLprogramming@gmail.com</p>
            <p>joesat@gmail.com</p>
            </div>
        </div>
        <div class="col-3  p-2 px-4">
            <div class="bg-light shadow p-2 py-3 rounded text-center">
            <i class="fa-solid fa-location-dot fs-1"></i>
            
            <p>Street 42c x 92f</p>
            <p>MahaAungMyay Mandalay</p>
            </div>
        </div>
        <div class="col-3  p-2 px-4">
            <div class="bg-light shadow p-2 py-3 rounded text-center">
            <i class="fa-solid fa-bell fs-1"></i>
           
            <p>9:00 AM to </p>
            <p>6:00 PM</p>
            </div>
        </div>
        
    </div>
    <h4 class="mb-0 mt-2 text-center fs-2">Contact Us</h4>
    <div class="row mt-1">
        <div class="col-6 pt-5">
            <form class="form-group" action="{{url('/contact/send')}}" method="post">
                @csrf
                <input type="text" name="name" class="form-control my-2 @error('name') is-invalid @enderror" placeholder="Enter your name">
                @error('name')
                <div class="invalid-feedback position-relative">{{$message}}</div>
                @enderror
                <input type="text" name="email" class="form-control my-2 @error('email') is-invalid @enderror" placeholder="Enter your email">
                @error('email')
                <div class="invalid-feedback position-relative">{{$message}}</div>
                @enderror
                <textarea name="content" class="form-control my-2 @error('content') is-invalid @enderror" id="" cols="30" rows="10" placeholder="Message"></textarea>
                @error('content')
                <div class="invalid-feedback position-relative">{{$message}}</div>
                @enderror
                <input type="submit" class="btn btn-success" value="Send">
                
            </form>
        </div>
        <div class="col-6 ">
        <img src="./image/contact.avif" alt=""  width="100%" />
        </div>
    </div>
</div>
@endsection