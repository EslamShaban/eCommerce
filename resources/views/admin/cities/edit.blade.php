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

        <form action="{{route('cities.update', $city->id)}}" method="post" enctype="multipart/form-data">

            @csrf
    
            <input type="hidden" name="_method" value="PUT"/>            
            
            <div class="form-group mb-3">
              <label for="cityname_ar" >{{trans('admin.cityname_ar')}}</label>
              <input type="text"  name="cityname_ar" id="cityname_ar" class="form-control" value="{{$city->cityname_ar}}" placeholder="{{trans('admin.cityname_ar')}}">
            </div>
            <div class="form-group mb-3">
              <label for="cityname_en">{{trans('admin.cityname_en')}}</label>
              <input type="text"  name="cityname_en" id="cityname_en" class="form-control" value="{{$city->cityname_en}}" placeholder="{{trans('admin.cityname_en')}}">
            </div>
            <div class="form-group mb-3">
              <label for="country_id">{{trans('admin.country_id')}}</label>
              <select name="country_id" id="country_id" class="form-control" value="{{old('country_id')}}">
                <option value="">{{trans('admin.country_id')}}</option>
                @foreach($countries as $id=>$countryname)
                  <option {{$city->country->id == $id ? 'selected' : ''}} value="{{$id}}">{{$countryname}}</option>
                @endForeach
              </select>
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