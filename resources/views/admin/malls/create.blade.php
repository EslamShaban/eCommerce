@extends('admin.index')
@section('title')
   {{$title}}
@endsection
@section('content')

@push('script')

  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
  <script type="text/javascript" src='https://www.google.com/maps/embed/v1/place?key=AIzaSyA79kULkK4rP-vZ1XX8WKONiINE225cWKI'></script>
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
          locationNameInput: $('#address')
        },
        enableAutocomplete: true

      });
  </script>

@endpush

<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{trans('admin.create_new_mall')}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{route('malls.store')}}" method="post" enctype="multipart/form-data">

            @csrf
    
            <input type="hidden" id="lat" name="lat" value="{{$lat}}" >
            <input type="hidden" id="lng" name="lng" value="{{$lng}}" >

            <div class="form-group mb-3">
              <label for="mallname_ar" >{{trans('admin.mallname_ar')}}</label>
              <input type="text"  name="mallname_ar" id="mallname_ar" class="form-control" value="{{old('mallname_ar')}}" placeholder="{{trans('admin.mallname_ar')}}">
            </div>
            <div class="form-group mb-3">
              <label for="mallname_en">{{trans('admin.mallname_en')}}</label>
              <input type="text"  name="mallname_en" id="mallname_en" class="form-control" value="{{old('mallname_en')}}" placeholder="{{trans('admin.mallname_en')}}">
            </div>
            <div class="form-group mb-3">
              <label for="country_id">{{trans('admin.country_id')}}</label>
              <select name="country_id" id="country_id" class="form-control" value="{{old('country_id')}}">
                <option value="">{{trans('admin.country_id')}}</option>
                @foreach($countries as $id=>$countryname)
                  <option value="{{$id}}">{{$countryname}}</option>
                @endForeach
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="contact_name">{{trans('admin.contact_name_mall')}}</label>
              <input type="text"  name="contact_name" id="contact_name" class="form-control" value="{{old('contact_name')}}" placeholder="{{trans('admin.contact_name_mall')}}">
            </div>
            <div class="form-group mb-3">
              <label for="mobile">{{trans('admin.mobile')}}</label>
              <input type="text"  name="mobile" id="mobile" class="form-control" value="{{old('mobile')}}" placeholder="{{trans('admin.mobile')}}">
            </div> 
            <div class="form-group mb-3">
              <label for="address">{{trans('admin.address')}}</label>
              <input type="text"  name="address" id="address" class="form-control" value="{{old('address')}}" placeholder="{{trans('admin.address')}}">
            </div>   
            <div class="form-group mb-3">
              <div id="us1" style="width: 100%; height: 400px;"></div>
            </div>
            <div class="form-group mb-3">
              <label for="email">{{trans('admin.email')}}</label>
              <input type="email"  name="email" id="email" class="form-control" value="{{old('email')}}" placeholder="{{trans('admin.email')}}">
            </div>  
            <div class="form-group mb-3">
              <label for="facebook">{{trans('admin.facebook')}}</label>
              <input type="text"  name="facebook" id="facebook" class="form-control" value="{{old('facebook')}}" placeholder="{{trans('admin.facebook')}}">
            </div>  
            <div class="form-group mb-3">
              <label for="twitter">{{trans('admin.twitter')}}</label>
              <input type="text"  name="twitter" id="twitter" class="form-control" value="{{old('twitter')}}" placeholder="{{trans('admin.twitter')}}">
            </div>  
            <div class="form-group mb-3">
              <label for="website">{{trans('admin.website')}}</label>
              <input type="text"  name="website" id="website" class="form-control" value="{{old('website')}}" placeholder="{{trans('admin.website')}}">
            </div> 
            <div class="form-group mb-3">
                <label for="logo" >{{trans('admin.mall_logo')}}</label>
                <input type="file"  name="logo" id="logo" class="form-control image" value="" placeholder="{{trans('admin.mall_logo')}}">
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> {{trans('admin.create_new_mall')}}</button>
              </div>
          </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

@endsection