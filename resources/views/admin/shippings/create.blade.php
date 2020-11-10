@extends('admin.index')
@section('title')
   {{$title}}
@endsection
@section('content')

@push('script')

  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
  <!-- <script type="text/javascript" src='https://www.google.com/maps/embed/v1/place?key=AIzaSyA79kULkK4rP-vZ1XX8WKONiINE225cWKI'></script> -->
  <script type="text/javascript" src='{{url('design/adminlte/dist/js/locationpicker.jquery.js')}}'></script>

 <?php 
      $lat = !empty(old('lat')) ? old('lat') : '26.90147865970426';
      $lng = !empty(old('lng')) ? old('lng') : '29.839355468749993';
 ?>
  <script type="text/javascript">
      $('#us1').locationpicker({
          location: {
              latitude: {{$lat}},
              longitude: {{$lng}}
          },
          radius: 300,
          markerIcon: '{{url('design/adminlte/dist/img/map-marker-2-xl.png')}}',
          inputBinding: {
          latitudeInput: $('#lat'),
          longitudeInput: $('#lng'),
          //radiusInput: $('#us2-radius'),
          //locationNameInput: $('#address')
        }

      });
  </script>

@endpush

<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{trans('admin.create_new_shipping')}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{route('shippings.store')}}" method="post" enctype="multipart/form-data">

            @csrf
    
            <input type="hidden" id="lat" name="lat" value="{{$lat}}" >
            <input type="hidden" id="lng" name="lng" value="{{$lng}}" >

            <div class="form-group mb-3">
              <label for="shippingname_ar" >{{trans('admin.shippingname_ar')}}</label>
              <input type="text"  name="shippingname_ar" id="shippingname_ar" class="form-control" value="{{old('shippingname_ar')}}" placeholder="{{trans('admin.shippingname_ar')}}">
            </div>
            <div class="form-group mb-3">
              <label for="shippingname_en">{{trans('admin.shippingname_en')}}</label>
              <input type="text"  name="shippingname_en" id="shippingname_en" class="form-control" value="{{old('shippingname_en')}}" placeholder="{{trans('admin.shippingname_en')}}">
            </div>
            <div class="form-group mb-3">
              <label for="user_id">{{trans('admin.user_id')}}</label>
              <select name="user_id" id="user_id" class="form-control" value="{{old('user_id')}}">
                <option value="">{{trans('admin.user_id')}}</option>
                @foreach($users as $id=>$username)
                  <option  {{old('user_id') == $id ? 'selected' : '' }}  value="{{$id}}">{{$username}}</option>
                @endForeach
              </select>
            </div>
            <div class="form-group mb-3">
              <div id="us1" style="width: 100%; height: 400px;"></div>
            </div> 
            <div class="form-group mb-3">
                <label for="logo" >{{trans('admin.shipping_logo')}}</label>
                <input type="file"  name="logo" id="logo" class="form-control image" value="" placeholder="{{trans('admin.shipping_logo')}}">
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> {{trans('admin.create_new_shipping')}}</button>
              </div>
          </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

@endsection