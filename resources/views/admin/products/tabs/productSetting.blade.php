@push('script')
    <script type="text/javascript">
        $('.datepicker').datepicker({
            rtl:'{{session('lang')=='ar' ? true : ''}}',
            language:'{{session('lang')}}',
            autoclose:false,
            todayBtn:'linked',
            clearBtn:true,
            format:'yyyy-mm-dd',
            todayHighlight:true,
        });

        $(document).on('change', '.status', function(){

            var status = $('.status option:selected').val();

            if(status == 'refused'){
                $('.reason').removeClass('d-none');
            }else{
                $('.reason').addClass('d-none');
            }

        });
    </script>
@endpush
<div id="product_setting" class="tab-pane fade">
    <h3>{{trans('admin.product_setting')}}</h3>
    <div class="row">
        <div class="form-group mb-4 col-lg-3 col-md-4 col-sm-6">
            <label for="price">{{trans('admin.price')}}</label>
            <input type="text"  name="price" id="price" class="form-control" value="{{$Product->price}}" placeholder="{{trans('admin.price')}}">
        </div>
        <div class="form-group mb-4 col-lg-3 col-md-4 col-sm-6">
            <label for="stock">{{trans('admin.stock')}}</label>
            <input type="number"  name="stock" id="stock" class="form-control" value="{{$Product->stock}}" placeholder="{{trans('admin.stock')}}">
        </div> 
        <div class="form-group mb-4 col-lg-3 col-md-4 col-sm-6">
            <label for="start_at"> {{trans('admin.start_at')}} </label>
            <input type="text"  name="start_at" id="start_at" class="form-control datepicker" value="{{$Product->start_at}}" placeholder="{{trans('admin.start_at')}}">
        </div>
        <div class="form-group mb-4 col-lg-3 col-md-4 col-sm-6">
            <label for="end_at"> {{trans('admin.end_at')}} </label>
            <input type="text"  name="end_at" id="end_at" class="form-control datepicker" value="{{$Product->end_at}}" placeholder="{{trans('admin.end_at')}}">
        </div>
        
        <div class="form-group mb-4 col-lg-4 col-md-4 col-sm-6">
            <label for="price_offer">{{trans('admin.price_offer')}}</label>
            <input type="text"  name="price_offer" id="price_offer" class="form-control " value="{{$Product->price_offer}}" placeholder="{{trans('admin.price_offer')}}">
        </div>
        <div class="form-group mb-4 col-lg-4 col-md-4 col-sm-6">
            <label for="start_offer_at"> {{trans('admin.start_offer_at')}} </label>
            <input type="text"  name="start_offer_at" id="start_offer_at" class="form-control datepicker" value="{{$Product->start_offer_at}}" placeholder="{{trans('admin.start_offer_at')}}">
        </div>
        <div class="form-group mb-4 col-lg-4 col-md-4 col-sm-6">
            <label for="end_offer_at"> {{trans('admin.end_offer_at')}} </label>
            <input type="text"  name="end_offer_at" id="end_offer_at" class="form-control datepicker" value="{{$Product->end_offer_at}}" placeholder="{{trans('admin.end_offer_at')}}">
        </div>
        <div class="form-group mb-4 col-12">
            <label for="status">{{trans('admin.status')}}</label>
            <select name="status" id="status" class="form-control status" value="{{$Product->status}}">
                <option value="">{{trans('admin.status')}}</option>
                <option  {{$Product->status == 'pending' ? 'selected' : ''}} value="pending">{{trans('admin.pending')}}</option>
                <option  {{$Product->status == 'active' ? 'selected' : ''}} value="active">{{trans('admin.active')}}</option>
                <option  {{$Product->status == 'refused' ? 'selected' : ''}} value="refused">{{trans('admin.refused')}}</option>
    
            </select>
        </div>
        <div class="form-group mb-4 col-12 reason {{$Product->status !== "refused" ? "d-none" : ''}}">
            <label for="reason"> {{trans('admin.refused_reason')}} </label>
            <textarea rows='5' name="reason" id="reason" class="form-control" value="{{$Product->reason}}" placeholder="{{trans('admin.refused_reason')}}"></textarea>
        </div>
    </div>
</div>
