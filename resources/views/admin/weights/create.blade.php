@extends('admin.index')
@section('title')
   {{$title}}
@endsection

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{trans('admin.create_new_weight')}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{route('weights.store')}}" method="post">

            @csrf
    
            <div class="form-group mb-3">
              <label for="weightname_ar" >{{trans('admin.weightname_ar')}}</label>
              <input type="text"  name="weightname_ar" id="weightname_ar" class="form-control" value="{{old('weightname_ar')}}" placeholder="{{trans('admin.weightname_ar')}}">
            </div>
            <div class="form-group mb-3">
              <label for="weightname_en">{{trans('admin.weightname_en')}}</label>
              <input type="text"  name="weightname_en" id="weightname_en" class="form-control" value="{{old('weightname_en')}}" placeholder="{{trans('admin.weightname_en')}}">
            </div>

            <div class="col-3">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> {{trans('admin.create_new_weight')}}</button>
              </div>
          </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

@endsection