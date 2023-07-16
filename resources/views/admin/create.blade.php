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
            <form class="form-group mb-5 border mt-3 p-3 shadow-sm rounded" action="{{url('/admin/add')}}" method="post" >
                @csrf
                <h3 class="text-success">Create New Admin</h3>
                <input type="text" name="name" id="" placeholder="Enter name" class="form-control my-2 @error('name') is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback position-relative">{{$message}}</div>
                @enderror
                <input type="text" name="email" id="" placeholder="Email" class="form-control my-2 @error('email') is-invalid @enderror">
                @error('email')
                <div class="invalid-feedback position-relative">{{$message}}</div>
                @enderror
                <input type="text" name="password" id="" placeholder="password" class="form-control my-2 @error('password') is-invalid @enderror">
                @error('password')
                <div class="invalid-feedback position-relative">{{$message}}</div>
                @enderror
                <input type="submit" value="Save" class="btn btn-primary">
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</section>
@endsection