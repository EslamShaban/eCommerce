@extends('admin.index')
@section('title')
   {{$title}}
@endsection

@section('content')
    
<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{trans('admin.sizes')}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <a href="{{route('sizes.create')}}" class="btn btn-info"><i class="fa fa-plus"></i> <span>{{trans('admin.create_new_size')}}</span></a>
      <a href="#" class="btn btn-primary"><i class="fa fa-print"></i> <span>{{trans('admin.print')}}</span></a>
      <a href="#" class="btn btn-success"><i class="fa fa-file"></i> <span>{{trans('admin.export_excel')}}</span></a>
      <a href="#" class="btn btn-danger delete_btn disabled" onclick="del_all()"><i class="fa fa-trash"></i> <span>{{trans('admin.delete_all')}}</span></a>

      <br><br>
      
      <form action="{{aurl('sizes/destroy/all')}}" id="form_data" >

        @csrf

        <input type="hidden" name="_method" value="DELETE"/>

        <table id="example1" class="table table-bordered table-striped table-responsive">
          <thead>
          <tr>
            <th><input type="checkbox"  class="checkall" onclick="check_all()" /></th>
            <th>#</th>
            <th>{{trans('admin.sizename_ar')}}</th>
            <th>{{trans('admin.sizename_en')}}</th>
            <th>{{trans('admin.department_id')}}</th>
            <th>{{trans('admin.is_public')}}</th>
            <th>{{trans('admin.created_at')}}</th>
            <th>{{trans('admin.updated_at')}}</th>
            <th>{{trans('admin.action')}}</th>
          </tr>
          </thead>
          <tbody>
              @php
                  $i=0; 
              @endphp
              @foreach($Sizes as $size)
                  @php
                    $i++;
                  @endphp
                  <tr style="height:10px">
                    <td><input type="checkbox" class="item_checkbox" name="item[]" onclick="item_check('{{$Sizes->count()}}')" value="{{$size->id}}" /></td>
                    <td>{{$i}}</td>
                    <td>{{$size->sizename_ar}}</td>
                    <td>{{$size->sizename_en}}</td>
                    <?php $depname = 'depname_'.session('lang')?>
                    <td>{{$size->department->$depname}}</td>
                    <td>{{trans('admin.' . $size->is_public)}}</td>
                    <td>{{$size->created_at}}</td>
                    <td>{{$size->updated_at}}</td>
                    <td>
                      <a href="{{route('sizes.edit', $size->id)}}" class="btn btn-info"><i class="fa fa-edit"></i> </a>
                      <a href="#" class="btn btn-danger" onclick="delete_this_item('{{$size->id}}')"><i class="fa fa-trash"></i> </a>
                    </td>
                  </tr>
              @endforeach

          

          </tbody>
        </table>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

  <!-- Modal -->

<!-- The Modal -->
<div class="modal" id="multipledelete">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">{{trans('admin.delete')}}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <h2>{{ trans('admin.ask_delete_item') }} <span class="record_count"> 5 </span> {{ trans('admin.record') }}</h2>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.no') }}</button>
        <input type="submit" value="{{trans('admin.yes')}}"  class="btn btn-danger" onclick="delete_items()" />
      </div>

    </div>
  </div>
</div>

<div class="modal" id="deleteOneItem">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">{{trans('admin.delete')}}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form action="" method="post" id="deleteOneItem_form">
        @csrf
        <input type="hidden" name="_method" value="delete"/>
        <!-- Modal body -->
        <div class="modal-body">
          <h2>{{ trans('admin.delete_this') }}</h2>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.no') }}</button>
          <input type="submit" value="{{trans('admin.yes')}}"  class="btn btn-danger" onclick="delete_items()" />
        </div>
      </form>
    </div>
  </div>
</div>

@endsection