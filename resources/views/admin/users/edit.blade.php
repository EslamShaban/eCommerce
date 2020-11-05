@extends('admin.index')
@section('title')
   {{$title}}
@endsection

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{trans('admin.edit_admin')}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <form action="{{route('users.update', $user->id)}}" method="post">

            @csrf
    
            <input type="hidden" name="_method" value="PUT"/>            
            
            <div class="form-group mb-3">
                <label for="name" >{{trans('admin.name')}}</label>
                <input type="text"  name="name" id="name" class="form-control" value="{{$user->name}}" placeholder="{{trans('admin.name')}}">
            </div>
            <div class="form-group mb-3">
                <label for="email">{{trans('admin.email')}}</label>
                <input type="email"  name="email" id="email" class="form-control" value="{{$user->email}}" placeholder="{{trans('admin.email')}}">
              </div>
            <div class="form-group mb-3">
                <label for="password">{{trans('admin.password')}}</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="{{trans('admin.password')}}">
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> {{trans('admin.edit_admin')}}</button>
              </div>
          </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

@endsection