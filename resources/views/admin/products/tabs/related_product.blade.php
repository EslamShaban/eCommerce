@push('script')
    <script type="text/javascript">

        $(document).ready(function(){

            $(document).on('click', '.do_search', function(){

                var search = $('.search').val();

                if(search != '' || search != null){

                    $.ajax({

                    url: "{{ aurl('products/search') }}",
                    dataType: "json",
                    type: "post",
                    data: {_token: '{{ csrf_token()}}', search: search, id:{{$Product->id}}},
                    beforeSend: function(){
                        $('.loading_data').removeClass('d-none');
                    },success: function(data){

                        var item = '';
                        if(data.status == true){
                            if(data.count > 0){
                                $.each(data.result, function(index, value){
                                    item += "<li><label><input type='checkbox' name='related[]' value='"+value.id+"' /> " + value.title + "</label></li>";
                                });
                            }
                            $('.items').html(item);
                            $('.loading_data').addClass('d-none');

                        }

                    },error: function(data){

                    }
                    });

                }

            });
        });

    </script>
@endpush

<div id="related_product" class="tab-pane fade">
    <h3>{{trans('admin.related_product')}}</h3>
    <div class="col-12">
        <form class="form-inline">

            <div class="row">
                                
                <input type="text" ame="search" class="form-control col-6 search" placeholder="Search" value={{old('search')}}>
                <i class="fa fa-spinner fa-lg mt-2 mr-3 loading_data d-none"></i>
                <i class="fa fa-search fa-lg mt-2 mr-3 do_search"></i>
            </div>

        </form>

        <div class="">
            <ol class="items">

            </ol>
            <hr>
            <ol>
                @foreach ($Product->related()->get() as $related)
                    <li>
                        <label>
                            <input type='checkbox' checked name='related[]' value= "{{$related->related_product}}" /> {{ $related->product->title}}
                        </label>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
</div>