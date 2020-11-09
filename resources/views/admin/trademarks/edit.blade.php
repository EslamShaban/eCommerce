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

        <form action="{{route('trademarks.update', $trademark->id)}}" method="post" enctype="multipart/form-data">

            @csrf
    
            <input type="hidden" name="_method" value="PUT"/>            
            
            <div class="form-group mb-3">
                <label for="tradmarkname_ar" >{{trans('admin.tradmarkname_ar')}}</label>
                <input type="text"  name="tradmarkname_ar" id="tradmarkname_ar" class="form-control" value="{{$trademark->tradmarkname_ar}}" placeholder="{{trans('admin.tradmarkname_ar')}}">
              </div>
              <div class="form-group mb-3">
                <label for="tradmarkname_en">{{trans('admin.tradmarkname_en')}}</label>
                <input type="text"  name="tradmarkname_en" id="tradmarkname_en" class="form-control" value="{{$trademark->tradmarkname_en}}" placeholder="{{trans('admin.tradmarkname_en')}}">
              </div>

              <div class="form-group mb-3">
                  <label for="logo" >{{trans('admin.trademark_logo')}}</label>
                  <input type="file"  name="logo" id="logo" class="form-control image">
                  @if(! empty($trademark->logo))
                    <img src="{{Storage::url($trademark->logo)}}" class="imgPreview img-thumbnail" style="width:50px; height:50px">
                  @endif
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