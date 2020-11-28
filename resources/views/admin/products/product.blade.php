@extends('admin.index')
@section('title')
   {{$title}}
@endsection

@section('content')

@push('script')

  <script type="text/javascript">
    $(document).ready(function() {

      $(document).on('click', '.copy_product', function(){

          $.ajax({

            url: "{{aurl('products/copy/' . $Product->id)}}",
            datatype: "json",
            type:"post",
            data:{_token: '{{ csrf_token() }}'},
            beforeSend:function(){
              $('.loading_copy').removeClass('d-none');
              $('.error_message').addClass('d-none');
              $('.success_message').html('').addClass('d-none');
            },success:function(data){

              if(data.status == true){
                $('.loading_copy').addClass('d-none');
                $('.error_message').addClass('d-none');
                $('.success_message').html('<h1>'+ data.success +'</h1>').removeClass('d-none');
                setTimeout(function(){
                    window.location.href = "{{aurl('products')}}/" + data.id + "/edit";
                },5000);
              }

            },error:function(response){
              $('.loading_copy').addClass('d-none');

              var error_list = '';
              $.each(response.responseJSON.errors, function(index, value){

                error_list +='<li>' + value + '</li>';

              });

              $('.validate_message').html(error_list);
              $('.error_message').removeClass('d-none');
              
            }
            
          });

          return false;

          });  
        $(document).on('click', '.save_and_continue', function(){

          var form_data = $('#product_form').serialize();

          $.ajax({

            url: "{{aurl('products/' . $Product->id)}}",
            datatype: "json",
            type:"post",
            data:form_data,
            beforeSend:function(){
              $('.loading_save_product').removeClass('d-none');
              $('.error_message').addClass('d-none');
              $('.success_message').html('').addClass('d-none');
            },success:function(data){

              if(data.status == true){
                $('.loading_save_product').addClass('d-none');
                $('.error_message').addClass('d-none');
                $('.success_message').html('<h1>'+ data.success +'</h1>').removeClass('d-none');
              }

            },error:function(response){
              $('.loading_save_product').addClass('d-none');

              var error_list = '';
              $.each(response.responseJSON.errors, function(index, value){

                error_list +='<li>' + value + '</li>';

              });

              $('.validate_message').html(error_list);
              $('.error_message').removeClass('d-none');
              
            }
            
          });

          return false;

        });      

    });
  </script>
@endpush

<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{trans('admin.create_new_product')}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <form action="{{route('products.update', $Product->id)}}" method="POST" id="product_form" enctype="multipart/form-data">

            @csrf

            <input type="hidden" name="_method" value="PUT"/> 

            <a href="" class="btn btn-primary save"> {{trans('admin.save')}} <i class="fa fa-save"></i></a>
            <a href="" class="btn btn-success save_and_continue"> {{trans('admin.save_and_continue')}} 
              <i class="fa fa-save"></i>
              <i class="fa fa-spin fa-spinner loading_save_product d-none"></i>
            </a>
            <a href="" class="btn btn-info copy_product"> 
              {{trans('admin.copy_product')}} 
              <i class="fa fa-copy"></i>
              <i class="fa fa-spin fa-spinner loading_copy d-none"></i>

            </a>
            <a href="" data-toggle="modal" data-target="#deleteProduct" class="btn btn-danger delete"> {{trans('admin.delete')}} <i class="fa fa-trash"></i></a>
            
            <hr>

            <div class="alert alert-danger error_message d-none">
              <ul class="validate_message">

              </ul>
            </div>

            <div class="alert alert-success success_message d-none"> </div>
            
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#product_info">{{trans('admin.product_info')}} <i class="fa fa-info"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#department">{{trans('admin.department')}} <i class="fa fa-list"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#product_setting">{{trans('admin.product_setting')}} <i class="fa fa-cog"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#product_media">{{trans('admin.product_media')}} <i class="fa fa-image"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#product_size_weight">{{trans('admin.product_size_weight')}} <i class="fa fa-info-circle"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#other_data">{{trans('admin.other_data')}} <i class="fa fa-database"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#related_product">{{trans('admin.related_product')}} <i class="fa fa-list"></i></a>
              </li>
            </ul>
          
            <div class="tab-content">

              @include('admin.products.tabs.productInfo')
              @include('admin.products.tabs.productDepartment')
              @include('admin.products.tabs.productSetting')
              @include('admin.products.tabs.productMedia')
              @include('admin.products.tabs.productSizeandWeight')
              @include('admin.products.tabs.productOtherdata')
              @include('admin.products.tabs.related_product')


            </div>

            <hr>
            
            <a href="" class="btn btn-primary save"> {{trans('admin.save')}} <i class="fa fa-save"></i></a>
            <a href="" class="btn btn-success save_and_continue"> {{trans('admin.save_and_continue')}} 
              <i class="fa fa-save"></i>
              <i class="fa fa-spin fa-spinner loading_save_product d-none"></i>
            </a>
            <a href="" class="btn btn-info copy_product"> {{trans('admin.copy_product')}} <i class="fa fa-copy"></i></a>
            <a href="" data-toggle="modal" data-target="#deleteProduct" class="btn btn-danger delete"> {{trans('admin.delete')}} <i class="fa fa-trash"></i></a>
            
    
          </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  <div class="modal" id="deleteProduct">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">{{trans('admin.delete')}}</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <form action="{{route('products.destroy', $Product->id)}}" method="post" id="deleteOneItem_form">
          @csrf
          <input type="hidden" name="_method" value="delete"/>
          <!-- Modal body -->
          <div class="modal-body">
            <h2>{{ trans('admin.delete_this') }} {{$Product->title}} </h2>
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
@endsection

