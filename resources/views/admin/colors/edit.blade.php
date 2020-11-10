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

        <form action="{{route('colors.update', $color->id)}}" method="post">

            @csrf
    
            <input type="hidden" name="_method" value="PUT"/>            
            
            <div class="form-group mb-3">
                <label for="colorname_ar" >{{trans('admin.name')}}</label>
                <input type="text"  name="colorname_ar" id="colorname_ar" class="form-control" value="{{$color->colorname_ar}}" placeholder="{{trans('admin.colorname_ar')}}">
            </div>
            <div class="form-group mb-3">
                <label for="colorname_en">{{trans('admin.colorname_en')}}</label>
                <input type="text"  name="colorname_en" id="colorname_en" class="form-control" value="{{$color->colorname_en}}" placeholder="{{trans('admin.colorname_en')}}">
              </div>
              <div class="form-group mb-3">
                <label for="color">{{trans('admin.color')}}</label>
                <input type="color"  name="color" id="color" class="form-control" value="{{$color->color}}" placeholder="{{trans('admin.color')}}">
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