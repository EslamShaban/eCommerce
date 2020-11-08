@extends('admin.index')
@section('title')
   {{$title}}
@endsection

@section('content')

@push('script')
    <script type="text/javascript">
      $(document).ready(function(){

        var country     = $('.country_id option:selected').val();
        var city        = $('.city_id').data('old');

              if(country > 0){
                $.ajax({

                url: "{{ aurl('states/create') }}",
                type: "get",
                dataType: "html",
                data:{country_id:country, city_id:city},
                success: function(data){
                  $('.city_id').html(data);
                }

                });
              }

            $(document).on('change', '.country_id', function(){

              var country = $('.country_id option:selected').val();

              if(country > 0){

                $.ajax({

                  url: "{{ aurl('states/create') }}",
                  type: "get",
                  dataType: "html",
                  data:{country_id:country},
                  success: function(data){
                    $('.city_id').html(data);
                  }

                });

              }

            });

            });
    </script>
@endpush

<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{trans('admin.create_new_state')}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{route('states.store')}}" method="post" >

            @csrf
    
            <div class="form-group mb-3">
              <label for="statename_ar" >{{trans('admin.statename_ar')}}</label>
              <input type="text"  name="statename_ar" id="statename_ar" class="form-control" value="{{old('statename_ar')}}" placeholder="{{trans('admin.statename_ar')}}">
            </div>
            <div class="form-group mb-3">
              <label for="statename_en">{{trans('admin.statename_en')}}</label>
              <input type="text"  name="statename_en" id="statename_en" class="form-control" value="{{old('statename_en')}}" placeholder="{{trans('admin.statename_en')}}">
            </div>
            <div class="form-group mb-3">
              <label for="country_id">{{trans('admin.country_id')}}</label>
              <select name="country_id" id="country_id" class="form-control country_id" value="{{old('country_id')}}">
                <option value="">{{trans('admin.country_id')}}</option>
                @foreach($countries as $id=>$countryname)
                  <option class="country_option" {{old('country_id') == $id ? 'selected' : '' }}  value="{{$id}}">{{$countryname}}</option>
                @endForeach
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="city_id">{{trans('admin.city_id')}}</label>
              <select name="city_id" id="city_id" class="form-control city_id" data-old="{{old('city_id')}}" value="{{old('city_id')}}">
                <option value="">{{trans('admin.city_id')}}</option>

              </select>
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> {{trans('admin.create_new_state')}}</button>
              </div>
          </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

@endsection