<script type="text/javascript">
    $(document).ready(function() {

        var dataSelect = [

            @foreach (App\Country::all() as $country)
            {
                "text"      : "{{$country->{'countryname_'.session('lang')} }}",
                "children"  : [
                    @foreach ($country->malls()->get() as $mall)
                    {
                        "id"    : "{{$mall->id}}",
                        "text"  :  "{{$mall->{'mallname_'.session('lang')} }}",
                        @if(check_mall($mall->id, $Product->id))
                        "selected":true
                        @endif
                    },
                    @endforeach
                ],
            },
            @endforeach
        ];

        $('.mall_select2').select2({data:dataSelect});
    });
</script>

<div class="row">
    <div class="form-group mb-3 col-6">
        <label for="size">{{trans('admin.size')}}</label>
        <input type="text" name="size" id="size" class="form-control" value="{{$Product->size}}" placeholder="{{trans('admin.size')}}"/>
    </div>
    <div class="form-group mb-3 col-6">
        <label for="size_id">{{trans('admin.size_id')}}</label>
        <select name="size_id" id="size_id" class="form-control" value="{{$Product->size_id}}">
            <option value="">{{trans('admin.size_id')}}</option>
            @foreach ($sizes as $id=>$size)
                <option {{ $Product->size_id == $id ? 'selected' : ''}} value="{{$id}}">{{$size}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-3 col-6">
        <label for="weight">{{trans('admin.weight')}}</label>
        <input type="text" name="weight" id="weight" class="form-control" value="{{$Product->weight}}" placeholder="{{trans('admin.weight')}}"/>
    </div>
    <div class="form-group mb-3 col-6">
        <label for="weight_id">{{trans('admin.weight_id')}}</label>
        <select name="weight_id" id="weight_id" class="form-control" value="{{$Product->weight_id}}">
            <option value="">{{trans('admin.weight_id')}}</option>
            @foreach ($weights as $id=>$weight)
                <option {{ $Product->weight_id == $id ? 'selected' : ''}} value="{{$id}}">{{$weight}}</option>
            @endforeach
    
        </select>
    </div>

    <div class="form-group mb-3 col-4">
        <label for="color_id">{{trans('admin.color_id')}}</label>
        <select name="color_id" id="color_id" class="form-control" value="{{$Product->color_id}}">
            <option value="">{{trans('admin.color_id')}}</option>
            @foreach ($colors as $id=>$color)
                <option {{ $Product->color_id == $id ? 'selected' : ''}} value="{{$id}}">{{$color}}</option>
            @endforeach
    
        </select>
    </div>
    <div class="form-group mb-3 col-4">
        <label for="trademark_id">{{trans('admin.trademark_id')}}</label>
        <select name="trademark_id" id="trademark_id" class="form-control" value="{{$Product->trademark_id}}">
            <option value="">{{trans('admin.trademark_id')}}</option>
            @foreach ($trademarks as $id=>$trademark)
                <option {{ $Product->trademark_id == $id ? 'selected' : ''}} value="{{$id}}">{{$trademark}}</option>
            @endforeach
    
        </select>
    </div>
    <div class="form-group mb-3 col-4">
        <label for="manufactory_id">{{trans('admin.manufactory_id')}}</label>
        <select name="manufact_id" id="manufactory_id" class="form-control" value="{{{$Product->manufact_id}}}">
            <option value="">{{trans('admin.manufactory_id')}}</option>
            @foreach ($manufactories as $id=>$manufactory)
                <option  {{ $Product->manufact_id == $id ? 'selected' : ''}} value="{{$id}}">{{$manufactory}}</option>
            @endforeach
    
        </select>
    </div>

    
    <div class="form-group mb-3 col-12">
        <label for="malls">{{trans('admin.malls')}}</label>
        <select name="mall[]" id="malls" class="form-control mall_select2" multiple="multiple" style="width:100%">
    
        </select>
    </div>

</div>

