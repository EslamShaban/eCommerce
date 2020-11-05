@extends('admin.index')
@section('title')
   {{$title}}
@endsection

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{trans('admin.create_new_admin')}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{route('admin.store')}}" method="post">

            @csrf
    
            <div class="form-group mb-3">
                <label for="name" >{{trans('admin.name')}}</label>
                <input type="text"  name="name" id="name" class="form-control" value="{{old('name')}}" placeholder="{{trans('admin.name')}}">
            </div>
            <div class="form-group mb-3">
                <label for="email">{{trans('admin.email')}}</label>
                <input type="email"  name="email" id="email" class="form-control" value="{{old('email')}}" placeholder="{{trans('admin.email')}}">
              </div>
            <div class="form-group mb-3">
                <label for="password">{{trans('admin.password')}}</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="{{trans('admin.password')}}">
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> {{trans('admin.create_new_admin')}}</button>
              </div>
          </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

@endsection