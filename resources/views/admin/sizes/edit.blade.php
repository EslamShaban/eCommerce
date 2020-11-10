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
              'data' : {!! load_dep($size->department_id) !!},
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
      <h3 class="card-title">{{trans('admin.edit_admin')}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <form action="{{route('sizes.update', $size->id)}}" method="post">

            @csrf
    
            <input type="hidden" name="_method" value="PUT"/>            
            
            <div class="form-group mb-3">
                <label for="sizename_ar" >{{trans('admin.name')}}</label>
                <input type="text"  name="sizename_ar" id="sizename_ar" class="form-control" value="{{$size->sizename_ar}}" placeholder="{{trans('admin.sizename_ar')}}">
            </div>
            <div class="form-group mb-3">
                <label for="sizename_en">{{trans('admin.sizename_en')}}</label>
                <input type="text"  name="sizename_en" id="sizename_en" class="form-control" value="{{$size->sizename_en}}" placeholder="{{trans('admin.sizename_en')}}">
            </div>
            
            <div id="jstree"></div>

            <input type="hidden" name="department_id" class="department_id" value="{{$size->department_id}}">
  
            <div class="form-group mb-3">

              <label for="is_public">{{trans('admin.is_public')}}</label>
              <select class="form-control"  name="is_public" id="is_public" value="{{$size->is_public}}">
                <option value="">.............</option>
                <option {{ $size->is_public == 'yes' ? 'selected' : '' }} value="yes">{{trans('admin.yes')}}</option>
                <option {{ $size->is_public == 'no' ? 'selected' : '' }} value="no">{{trans('admin.no')}}</option>

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