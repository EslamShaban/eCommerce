@extends('admin.index')
@section('title')
   {{$title}}
@endsection

@section('content')

@push('script')

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      
      $('.js-example-basic-single').select2();

    });
  </script>
@endpush

<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{trans('admin.create_new_product')}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">

            @csrf
              
            <a href="" class="btn btn-primary save"> {{trans('admin.save')}} <i class="fa fa-save"></i></a>
            <a href="" class="btn btn-success save_and_continue"> {{trans('admin.save_and_continue')}} <i class="fa fa-save"></i></a>
            <a href="" class="btn btn-info copy_product"> {{trans('admin.copy_product')}} <i class="fa fa-copy"></i></a>
            <a href="" class="btn btn-danger delete"> {{trans('admin.delete')}} <i class="fa fa-trash"></i></a>
            
            <hr>
            
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
            </ul>
          
            <div class="tab-content">

              @include('admin.products.tabs.productInfo')
              @include('admin.products.tabs.productDepartment')
              @include('admin.products.tabs.productSetting')
              @include('admin.products.tabs.productMedia')
              @include('admin.products.tabs.productSizeandWeight')
              @include('admin.products.tabs.productOtherdata')
             

            </div>

            <hr>

            <a href="" class="btn btn-primary save"> {{trans('admin.save')}} <i class="fa fa-save"></i></a>
            <a href="" class="btn btn-success save_and_continue"> {{trans('admin.save_and_continue')}} <i class="fa fa-save"></i></a>
            <a href="" class="btn btn-info copy_product"> {{trans('admin.copy_product')}} <i class="fa fa-copy"></i></a>
            <a href="" class="btn btn-danger delete"> {{trans('admin.delete')}} <i class="fa fa-trash"></i></a>
            
            
    
          </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

@endsection