@push('script')

    <script type="text/javascript">
        var x=1;
        $(document).on('click', '.add_input', function(){

            var max_input = 10;
            
            if(x < max_input){
                $(".div_inputs").append(

                    '<div class="row">' + 
                        '<div class="form-group mb-3 col-5">' + 
                            '<label for="key">{{trans("admin.key")}}</label>' +
                            '<input type="text"  name="key[]" id="key" class="form-control"/>'+
                        '</div>'+
                        '<div class="form-group mb-3 col-5">'+
                            '<label for="value">{{trans("admin.value")}}</label>'+
                            '<input type="text"  name="value[]" id="value" class="form-control"/>'+
                        '</div>'+
                        '<div class="form-group mb-3 mt-4 col-2">'+
                            ' <a href="#" class="remove_input btn btn-danger"><i class="fa fa-trash"></i></a>'+
                        '</div>'+
                    '</div>'  
                    );

                x++;
            }

        });

        $(document).on('click', '.remove_input', function(){


            $(this).parent('div').parent('div').remove();
            
            x--;

            return false;
        });
    </script>

@endpush

<div id="other_data" class="tab-pane fade">
    <h3>{{trans('admin.other_data')}}</h3>

    <div class="div_inputs">
        @foreach ($Product->other_data()->get() as $other)
            <div class="row">
                <div class="form-group mb-3 col-5">
                    <label for="key">{{trans('admin.key')}}</label>
                    <input type="text"  name="key[]" id="key" class="form-control" value="{{ $other->data_key }} "/>
                </div>
                <div class="form-group mb-3 col-5">
                    <label for="value">{{trans('admin.value')}}</label>
                    <input type="text"  name="value[]" id="value" class="form-control" value="{{ $other->data_value }}" />
                </div>
                <div class="form-group mb-3 mt-4 col-2">
                    <a href="#" data-id="{{$other->id}}" class="remove_input btn btn-danger"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        @endforeach
       @if(empty($Product->other_data()->get()[0]))
        <div class="row">
                <div class="form-group mb-3 col-5">
                    <label for="key">{{trans('admin.key')}}</label>
                    <input type="text"  name="key[]" id="key" class="form-control" />
                </div>
                <div class="form-group mb-3 col-5">
                    <label for="value">{{trans('admin.value')}}</label>
                    <input type="text"  name="value[]" id="value" class="form-control" />
                </div>
                <div class="form-group mb-3 mt-4 col-2">
                    <a href="#" class="remove_input btn btn-danger"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        @endif
    </div>

    <hr>

    <div class="add_input btn btn-primary" style="display: block;width: 50px;margin: auto;"><i class="fa fa-plus"></i></div>


</div>