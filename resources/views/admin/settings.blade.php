@extends('admin.index')
@section('title')
   {{$title}}
@endsection

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{trans('admin.settings')}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="settings" method="post" enctype="multipart/form-data">

            @csrf
    
            <div class="form-group mb-3">
              <label for="sitename_ar" >{{trans('admin.sitename_ar')}}</label>
              <input type="text"  name="sitename_ar" id="sitename_ar" class="form-control" value="{{setting()->sitename_ar}}" placeholder="{{trans('admin.sitename_ar')}}">
            </div>
            <div class="form-group mb-3">
              <label for="sitename_en" >{{trans('admin.sitename_en')}}</label>
              <input type="text"  name="sitename_en" id="sitename_en" class="form-control" value="{{setting()->sitename_en}}" placeholder="{{trans('admin.sitename_en')}}">
            </div>
            <div class="form-group mb-3">
              <label for="logo" >{{trans('admin.logo')}}</label>
              <input type="file"  name="logo" id="logo" class="form-control image" value="{{setting()->logo}}" placeholder="{{trans('admin.logo')}}">
              @if(! empty(setting()->logo))
               <img src="{{Storage::url(setting()->logo)}}"  class="imgPreview img-thumbnail" style="width:50px; height:50px">
              @endif
            </div>
            <div class="form-group mb-3">
              <label for="icon" >{{trans('admin.icon')}}</label>
              <input type="file"  name="icon" id="icon" class="form-control image" value="{{setting()->icon}}" placeholder="{{trans('admin.icon')}}">
              @if(! empty(setting()->icon))
                <img src="{{Storage::url(setting()->icon)}}" class="imgPreview img-thumbnail" style="width:50px; height:50px">
              @endif
            </div>
            <div class="form-group mb-3">
              <label for="email">{{trans('admin.email')}}</label>
              <input type="email"  name="email" id="email" class="form-control" value="{{setting()->email}}" placeholder="{{trans('admin.email')}}">
            </div>
            <div class="form-group mb-3">
              <label for="description" >{{trans('admin.description')}}</label>
              <textarea rows='5' name="description" id="description" class="form-control" value="{{setting()->description}}" placeholder="{{trans('admin.description')}}"></textarea>
            </div>
            <div class="form-group mb-3">
              <label for="keywords" >{{trans('admin.keywords')}}</label>
              <textarea rows='5' name="keywords" id="keywords" class="form-control" value="{{setting()->keywords}}" placeholder="{{trans('admin.keywords')}}"></textarea>
            </div>
            <div class="form-group mb-3">
              <label for="main_lang">{{trans('admin.main_lang')}}</label>
              <select name="main_lang" id="main_lang" class="form-control" value="{{old('main_lang')}}">
                <option value="">{{trans('admin.main_lang')}}</option>
                <option {{setting()->main_lang == 'ar' ? 'selected' : ''}} value="ar">{{trans('admin.ar')}}</option>
                <option {{setting()->main_lang == 'en' ? 'selected' : ''}} value="en">{{trans('admin.en')}}</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="status">{{trans('admin.status')}}</label>
              <select name="status" id="status" class="form-control" value="{{old('status')}}">
                <option value="">{{trans('admin.status')}}</option>
                <option {{setting()->status == 'open' ? 'selected' : ''}} value="open">{{trans('admin.open')}}</option>
                <option {{setting()->status == 'close' ? 'selected' : ''}} value="close">{{trans('admin.close')}}</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="message_maintenance" >{{trans('admin.message_maintenance')}}</label>
              <textarea rows='5' name="message_maintenance" id="message_maintenance" class="form-control" value="{{setting()->message_maintenance}}" placeholder="{{trans('admin.message_maintenance')}}"></textarea>
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> {{trans('admin.save')}}</button>
              </div>
          </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

@endsection