@extends('layout.admin_nav')
@section('content')
<div class="row mt-3">

        <div class="col-1"></div>
        <div class="col-10">
        <a href="{{url('/admin/create')}}" class="btn btn-primary mb-2">Create New</a>
            <table class="table table-hover table-secondary align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>                     
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($admins as $admin)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                        
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">{{$admin->name}}</p>
                                
                                </div>
                            </div>
                        </td>
                        <td>
                          <p class=" d-inline " >{{$admin->email}}</p>
                        </td>
                        <td>
                            <span class=" d-inline">{{$admin->role}}</span>
                        </td>
                      
                        <td>
                            <a href="{{url('/admin/edit/'.$admin->id)}}" class="btn btn-primary btn-sm btn-rounded">
                            Edit
                            </a>
                            <a href="{{url('/admin/delete/'.$admin->id)}}" class="btn btn-danger btn-sm btn-rounded">
                            Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        <div class="col-1"></div>
    </div>
@endsection