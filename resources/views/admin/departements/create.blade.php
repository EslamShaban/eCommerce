@extends('admin.index')
@section('title')
   {{$title}}
@endsection
@push('script')
    <script type="text/javascript">

      $(document).ready(function(){

        $('#jstree').jstree({
          'core' : {
              'data' : {!! load_dep(old('parent')) !!},
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

      $('.parent_id').val(r.join(', '));

    });
    </script>
@endpush
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{trans('admin.create_new_dep')}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{route('departements.store')}}" method="post" enctype="multipart/form-data">

            @csrf
    
            <div class="form-group mb-3">
              <label for="depname_ar" >{{trans('admin.depname_ar')}}</label>
              <input type="text"  name="depname_ar" id="depname_ar" class="form-control" value="{{old('depname_ar')}}" placeholder="{{trans('admin.depname_ar')}}">
            </div>
            <div class="form-group mb-3">
              <label for="depname_en">{{trans('admin.depname_en')}}</label>
              <input type="text"  name="depname_en" id="depname_en" class="form-control" value="{{old('depname_en')}}" placeholder="{{trans('admin.depname_en')}}">
            </div>
            <div id="jstree"></div>
            <input type="hidden" name="parent" class="parent_id" value="{{old('parent')}}">
            <div class="form-group mb-3">
              <label for="description" >{{trans('admin.description')}}</label>
              <textarea rows='5' name="description" id="description" class="form-control" value="{{old('description')}}" placeholder="{{trans('admin.description')}}"></textarea>
            </div>
            <div class="form-group mb-3">
              <label for="keywords" >{{trans('admin.keywords')}}</label>
              <textarea rows='5' name="keywords" id="keywords" class="form-control" value="{old('keywords')}}" placeholder="{{trans('admin.keywords')}}"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="icon" >{{trans('admin.icon')}}</label>
                <input type="file"  name="icon" id="icon" class="form-control image" value="" placeholder="{{trans('admin.dep_icon')}}">
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> {{trans('admin.create_new_dep')}}</button>
              </div>
          </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

@endsection