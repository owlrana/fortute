<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type='text/javascript' src="{{url('admin/js/bootstrap.min.js')}}"></script>
<script type='text/javascript' src="{{url('admin/js/app.min.js')}}"></script>
<script type='text/javascript' src="{{url('admin/js/dataTables.bootstrap.min.js')}}"></script>
<script type='text/javascript' src="{{url('admin/js/jquery.dataTables.min.js')}}"></script>
 <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });
      });
    </script>

