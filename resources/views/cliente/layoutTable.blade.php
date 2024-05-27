<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $projeto ?></title>
   
    <link rel="shortcut icon" type="image/x-icon" href="{{asset(<?php echo $praxos_icone ?>)}}" /> 
            
              
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset("newLayout/plugins/fontawesome-free/css/all.min.css")}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset("newLayout/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{asset("newLayout/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{asset("newLayout/plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("newLayout/dist/css/adminlte.min.css")}}">
        
</head>

<body <?php if(isset($tes)){ if($tes=="SALVO"){?> onload="realod();" <?php }} ?>  >

     
    <div id="wrapper">

        <!-- Navigation -->
        
            <div class="navbar-header">
                
                <a class="navbar-brand" href="">
                    <img src="<?php echo asset($logo); ?>" height="80">
                </a>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-static-side -->
        
            <div class="col-xs-12">
                 @yield("conteudo")
            </div>
            
           @yield('post-script')
        
    </div>
    <!-- /#wrapper -->
   
 
    
   
 <footer class="main-footerd">
    <center>
        <?php 
            $util = new \App\Util\Util();

            echo $util ->Rodape();
        ?>
    </center>    
  </footer>

 

<!-- jQuery -->
<script src="{{asset("newLayout/plugins/jquery/jquery.min.js")}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset("newLayout/pglugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset("newLayout/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("newLayout/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("newLayout/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("newLayout/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
<script src="{{asset("newLayout/plugins/datatables-buttons/js/dataTables.buttons.min.js")}}"></script>
<script src="{{asset("newLayout/plugins/datatables-buttons/js/buttons.bootstrap4.min.js")}}"></script>
<script src="{{asset("newLayout/plugins/jszip/jszip.min.js")}}"></script>
<script src="{{asset("newLayout/plugins/pdfmake/pdfmake.min.js")}}"></script>
<script src="{{asset("newLayout/plugins/pdfmake/vfs_fonts.js")}}"></script>
<script src="{{asset("newLayout/plugins/datatables-buttons/js/buttons.html5.min.js")}}"></script>
<script src="{{asset("newLayout/plugins/datatables-buttons/js/buttons.print.min.js")}}"></script>   
<script src="{{asset("newLayout/plugins/datatables-buttons/js/buttons.colVis.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("newLayout/dist/js/adminlte.min.js")}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset("newLayout/dist/js/demo.js")}}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>

</html>
