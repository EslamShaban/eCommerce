@extends('admin.index')
@section('title')
   {{$title}}
@endsection

<div class="modal" id="delete_dep">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">{{trans('admin.delete')}}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form action="" method="POST" id="deletedep_form">
        @csrf
        <input type="hidden" name="_method" value="DELETE"/>
        <!-- Modal body -->
        <div class="modal-body">
          <h2>{{ trans('admin.delete_this') }}</h2> <span id="dep_name"></span>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.no') }}</button>
          <input type="submit" value="{{trans('admin.yes')}}"  class="btn btn-danger" />
        </div>
      </form>
    </div>
  </div>
</div>

@push('script')
    <script type="text/javascript">

      $(document).ready(function(){

        $('#jstree').jstree({
          'core' : {
              'data' :  {!! load_dep() !!},
              "themes" : {
              "variant" : "large"
            }
          },
          "plugins" : [ "wholerow"]
        });
      });

      $('#jstree').on("changed.jstree", function (e, data) {
  
        var i, j, r=[];
        var name = [];
        for(i=0,j=data.selected.length ; i<j ; i++){

          r.push(data.instance.get_node(data.selected[i]).id);
          name.push(data.instance.get_node(data.selected[i]).text);

        }

        $('#deletedep_form').attr('action', "{{ aurl('departements')}}/" + r.join(', '))
        $('#dep_name').text(name.join(', '));


        if(r.join(', ') != ''){

          $('.showbtn').removeClass('d-none');

          $('.edit_dep').attr('href', "{{ aurl('departements')}}/" + r.join(', ') + '/edit')

        }else{

          $('.showbtn').addClass('d-none');

        }
      });
    </script>
@endpush

@section('content')
    
<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{trans('admin.departements')}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <a href="" class="btn btn-info edit_dep showbtn d-none"><i class="fa fa-edit"></i> {{trans('admin.edit_admin')}}</a>
      <a href="" data-toggle="modal" data-target="#delete_dep" class="btn btn-danger del_dep showbtn d-none"><i class="fa fa-trash"></i> {{trans('admin.delete')}}</a>

      <div id="jstree"></div>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->


@endsection