@push('script')
  <script type="text/javascript">

    $(document).ready(function(){

      $('#jstree').jstree({
        'core' : {
            'data' :  {!! load_dep($Product->department_id) !!},
            "themes" : {
            "variant" : "large"
          }
        },
        "plugins" : [ "wholerow"]
      });
    });

    $('#jstree').on("changed.jstree", function (e, data) {

      var i, j, r=[];
      for(i=0,j=data.selected.length ; i<j ; i++){

        r.push(data.instance.get_node(data.selected[i]).id);

      }

      $('.department_id').val(r.join(', '));

      var department = r.join(', ');

      $.ajax({
        
        url: "{{ aurl('load/weight/size')}}",
        dataType: 'html',
        type: 'post',
        data:{_token:'{{ csrf_token()}}', dep_id: department, product_id: {{$Product->id}}},
        success: function(data){
          $('.shipping_info').html(data);
        }
        
      });
    });
  </script>
@endpush
<div id="department" class="tab-pane fade">
    <h3>{{trans('admin.department')}}</h3>

    <div id="jstree"></div>

    <input type="hidden" name="department_id" class="department_id">
</div>