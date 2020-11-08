@extends('admin.index')
@section('title')
   {{$title}}
@endsection

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{trans('admin.create_new_country')}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{route('countries.store')}}" method="post" enctype="multipart/form-data">

            @csrf
    
            <div class="form-group mb-3">
              <label for="countryname_ar" >{{trans('admin.countryname_ar')}}</label>
              <input type="text"  name="countryname_ar" id="countryname_ar" class="form-control" value="{{old('countryname_ar')}}" placeholder="{{trans('admin.countryname_ar')}}">
            </div>
            <div class="form-group mb-3">
              <label for="countryname_en">{{trans('admin.countryname_en')}}</label>
              <input type="text"  name="countryname_en" id="countryname_en" class="form-control" value="{{old('countryname_en')}}" placeholder="{{trans('admin.countryname_en')}}">
            </div>
            <div class="form-group mb-3">
                <label for="mob">{{trans('admin.mob')}}</label>
                <input type="text"  name="mob" id="mob" class="form-control" value="{{old('mob')}}" placeholder="{{trans('admin.mob')}}">
            </div>
            <div class="form-group mb-3">
                <label for="code">{{trans('admin.code')}}</label>
                <input type="text"  name="code" id="code" class="form-control" value="{{old('code')}}" placeholder="{{trans('admin.code')}}">
            </div>
            <div class="form-group mb-3">
                <label for="logo" >{{trans('admin.country_logo')}}</label>
                <input type="file"  name="logo" id="logo" class="form-control image" value="" placeholder="{{trans('admin.country_logo')}}">
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> {{trans('admin.create_new_country')}}</button>
              </div>
          </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

@endsection