@extends('admin.index')
@section('title')
   {{$title}}
@endsection

@section('content')

@push('script')
    <script type="text/javascript">

      $(document).ready(function(){

        $('#jstree').jstree({
          'core' : {
              'data' : {!! load_dep(old('department_id')) !!},
              "themes" : {
              "variant" : "large"
            }
          },

          "plugins" : [ "wholerow" ]
        });
      });
      
    $('#jstree').on("changed.jstree", function (e, data) {
  
      var i, j, r=[];

      for(i=0,j=data.selected.length ; i<j ; i++){

        r.push(data.instance.get_node(data.selected[i]).id);

      }

      $('.department_id').val(r.join(', '));

    });
    </script>
@endpush

<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{trans('admin.create_new_size')}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{route('sizes.store')}}" method="post">

            @csrf
    
            <div class="form-group mb-3">
              <label for="sizename_ar" >{{trans('admin.sizename_ar')}}</label>
              <input type="text"  name="sizename_ar" id="sizename_ar" class="form-control" value="{{old('sizename_ar')}}" placeholder="{{trans('admin.sizename_ar')}}">
            </div>
            <div class="form-group mb-3">
              <label for="sizename_en">{{trans('admin.sizename_en')}}</label>
              <input type="text"  name="sizename_en" id="sizename_en" class="form-control" value="{{old('sizename_en')}}" placeholder="{{trans('admin.sizename_en')}}">
            </div>

            <div id="jstree"></div>

            <input type="hidden" name="department_id" class="department_id" value="{{old('department_id')}}">

            <div class="form-group mb-3">

              <label for="is_public">{{trans('admin.is_public')}}</label>
              <select class="form-control"  name="is_public" id="is_public" value="{{old('is_public')}}">
                <option value="">.............</option>
                <option value="yes">{{trans('admin.yes')}}</option>
                <option value="no">{{trans('admin.no')}}</option>

              </select>
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> {{trans('admin.create_new_size')}}</button>
              </div>
          </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

@endsection