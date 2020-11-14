<div id="product_info" class="tab-pane fade active show">
    <h3>{{trans('admin.product_info')}}</h3>

    <div class="form-group mb-3">
        <label for="title">{{trans('admin.title')}}</label>
        <input type="text"  name="title" id="title" class="form-control" value="{{$Product->title}}" placeholder="{{trans('admin.title')}}">
    </div>
    <div class="form-group mb-3">
        <label for="content"> {{trans('admin.content')}} </label>
        <textarea rows='5' name="content" id="content" class="form-control" value="{{$Product->content}}" placeholder="{{trans('admin.content')}}"></textarea>
    </div>
</div>
