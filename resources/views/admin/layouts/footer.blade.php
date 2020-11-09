<footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- AdminLTE App -->
<script src="{{url('/')}}/design/adminlte/dist/js/adminlte.min.js"></script>

<!-- jQuery -->
<script src="{{url('/')}}/design/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('/')}}/design/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{url('/')}}/design/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{url('/')}}/design/adminlte/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{url('/')}}/design/adminlte/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{url('/')}}/design/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{url('/')}}/design/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('/')}}/design/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{url('/')}}/design/adminlte/plugins/moment/moment.min.js"></script>
<script src="{{url('/')}}/design/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('/')}}/design/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{url('/')}}/design/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{url('/')}}/design/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{url('/')}}/design/adminlte/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('/')}}/design/adminlte/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('/')}}/design/adminlte/dist/js/demo.js"></script>


<!-- DataTables -->
<script src="{{url('/')}}/design/adminlte/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{url('/')}}/design/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="{{url('/')}}/design/adminlte/jstree/jstree.js"></script>
<script src="{{url('/')}}/design/adminlte/jstree/jstree.checkbox.js"></script>
<script src="{{url('/')}}/design/adminlte/jstree/jstree.wholerow.js"></script>



<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });

  function check_all(){

    $('input[class="item_checkbox"]:checkbox').each(function(){

      if($('input[class="checkall"]:checkbox:checked').length == 0){

        $(this).prop('checked', false);
        $('.delete_btn').addClass('disabled');

      }else{

        $(this).prop('checked', true);
        $('.delete_btn').removeClass('disabled');
      }


    });

  }

  function item_check(count){
    
      if($('input[class="item_checkbox"]:checkbox:checked').length == 0){

          $('.delete_btn').addClass('disabled');
          $('input[class="checkall"]:checkbox').prop('checked', false);

      }else{

          $('.delete_btn').removeClass('disabled');
      }

      if($('input[class="item_checkbox"]:checkbox:checked').length == count){

          $('input[class="checkall"]:checkbox').prop('checked', true);

      }
}

  function del_all(){

    $item_checked = $('input[class="item_checkbox"]:checkbox:checked').length;

    $('.record_count').text($item_checked )

    $('#multipledelete').modal('show');
  }

  function delete_items(){

    $('#form_data').submit();

}

function delete_this_item(item_id){

  $('#deleteOneItem_form').attr('action', "{{route('admin.destroy', "+item_id+")}}");

  $('#deleteOneItem').modal('show');

  
}


</script>
@stack('script')
</body>
</html>
