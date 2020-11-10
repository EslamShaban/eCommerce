@extends('admin.index')
@section('title')
   {{$title}}
@endsection

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{trans('admin.create_new_color')}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{route('colors.store')}}" method="post">

            @csrf
    
            <div class="form-group mb-3">
              <label for="colorname_ar" >{{trans('admin.colorname_ar')}}</label>
              <input type="text"  name="colorname_ar" id="colorname_ar" class="form-control" value="{{old('colorname_ar')}}" placeholder="{{trans('admin.colorname_ar')}}">
            </div>
            <div class="form-group mb-3">
              <label for="colorname_en">{{trans('admin.colorname_en')}}</label>
              <input type="text"  name="colorname_en" id="colorname_en" class="form-control" value="{{old('colorname_en')}}" placeholder="{{trans('admin.colorname_en')}}">
            </div>
            <div class="form-group mb-3">
              <label for="color">{{trans('admin.color')}}</label>
              <input type="color"  name="color" id="color" class="form-control" value="{{old('color')}}" placeholder="{{trans('admin.color')}}">
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> {{trans('admin.create_new_color')}}</button>
              </div>
          </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

@endsection