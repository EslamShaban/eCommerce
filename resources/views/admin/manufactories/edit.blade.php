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
      $lat = !empty($manufactory->lat) ? $manufactory->lat : '26.90147865970426';
      $lng = !empty($manufactory->lng) ? $manufactory->lng : '29.839355468749993';
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
        }

      });
  </script>

@endpush
<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{trans('admin.edit_admin')}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <form action="{{route('manufactories.update', $manufactory->id)}}" method="post" enctype="multipart/form-data">

            @csrf
        
            <input type="hidden" id="lat" name="lat" value="{{$lat}}" >
            <input type="hidden" id="lng" name="lng" value="{{$lng}}" >

            <input type="hidden" name="_method" value="PUT"/>            
            
            <div class="form-group mb-3">
                <label for="manufactoryname_ar" >{{trans('admin.manufactoryname_ar')}}</label>
                <input type="text"  name="manufactoryname_ar" id="manufactoryname_ar" class="form-control" value="{{$manufactory->manufactoryname_ar}}" placeholder="{{trans('admin.manufactoryname_ar')}}">
              </div>
              <div class="form-group mb-3">
                <label for="manufactoryname_en">{{trans('admin.manufactoryname_en')}}</label>
                <input type="text"  name="manufactoryname_en" id="manufactoryname_en" class="form-control" value="{{$manufactory->manufactoryname_en}}" placeholder="{{trans('admin.manufactoryname_en')}}">
              </div>
              <div class="form-group mb-3">
                <label for="contact_name">{{trans('admin.contact_name')}}</label>
                <input type="text"  name="contact_name" id="contact_name" class="form-control" value="{{$manufactory->contact_name}}" placeholder="{{trans('admin.contact_name')}}">
              </div>
              <div class="form-group mb-3">
                <label for="mobile">{{trans('admin.mobile')}}</label>
                <input type="text"  name="mobile" id="mobile" class="form-control" value="{{$manufactory->mobile}}" placeholder="{{trans('admin.mobile')}}">
              </div> 
              <div class="form-group mb-3">
                <label for="address">{{trans('admin.address')}}</label>
                <input type="text"  name="address" id="address" class="form-control" value="{{$manufactory->address}}" placeholder="{{trans('admin.address')}}">
              </div>   
              <div class="form-group mb-3">
                <div id="us1" style="width: 100%; height: 400px;"></div>
              </div>
              <div class="form-group mb-3">
                <label for="email">{{trans('admin.email')}}</label>
                <input type="email"  name="email" id="email" class="form-control" value="{{$manufactory->email}}" placeholder="{{trans('admin.email')}}">
              </div>  
              <div class="form-group mb-3">
                <label for="facebook">{{trans('admin.facebook')}}</label>
                <input type="text"  name="facebook" id="facebook" class="form-control" value="{{$manufactory->facebook}}" placeholder="{{trans('admin.facebook')}}">
              </div>  
              <div class="form-group mb-3">
                <label for="twitter">{{trans('admin.twitter')}}</label>
                <input type="text"  name="twitter" id="twitter" class="form-control" value="{{$manufactory->twitter}}" placeholder="{{trans('admin.twitter')}}">
              </div>
              <div class="form-group mb-3">
                <label for="website">{{trans('admin.website')}}</label>
                <input type="text"  name="website" id="website" class="form-control" value="{{$manufactory->twitter}}" placeholder="{{trans('admin.website')}}">
              </div> 
              <div class="form-group mb-3">
                  <label for="logo" >{{trans('admin.manufactory_logo')}}</label>
                  <input type="file"  name="logo" id="logo" class="form-control image">
                  @if(! empty($manufactory->logo))
                    <img src="{{Storage::url($manufactory->logo)}}" class="imgPreview img-thumbnail" style="width:50px; height:50px">
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