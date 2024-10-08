<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="/../assets/css/vendors/scrollbar.css">
<link rel="stylesheet" type="text/css" href="/../assets/css/vendors/datatables.css">
<link rel="stylesheet" type="text/css" href="/../assets/css/vendors/sweetalert2.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<!-- App css-->
<link rel="stylesheet" type="text/css" href="/../assets/css/style.css">
<link rel="stylesheet" type="text/css" href="../assets/css/custom.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Add the Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- Add the Flatpickr JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.min.css">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="/../assets/css/responsive.css">
<style>
 td{
        font-weight:500;
    }
    </style>
</head>
<body>
@yield('content')
<!-- latest jquery-->
<script src="/../assets/js/jquery-3.6.0.min.js"></script>
<!-- Bootstrap js-->
<script src="/../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<!-- feather icon js-->
<script src="/../assets/js/icons/feather-icon/feather.min.js"></script>
<script src="/../assets/js/icons/feather-icon/feather-icon.js"></script>
<!-- scrollbar js-->
<script src="/../assets/js/scrollbar/simplebar.js"></script>
<script src="/../assets/js/scrollbar/custom.js"></script>
<!-- Sidebar jquery-->
<script src="/../assets/js/config.js"></script>
<script src="/../assets/js/sidebar-menu.js"></script>
<script src="/../assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
<script src="/../assets/js/datatable/datatables/datatable.custom.js"></script>
<script src="/../assets/js/tooltip-init.js"></script>

<script src="/../assets/js/notify/bootstrap-notify.min.js"></script>
<script src="/../assets/js/notify/notify-script.js"></script>


<script src="/../assets/js/sweet-alert/sweetalert.min.js"></script>
<script src="/../assets/js/sweet-alert/app.js"></script>
<!-- Template js-->
<script src="/../assets/js/script.js"></script>
<script src="../assets/js/resizableColumns.min.js"></script>
    <script>
      $('table').resizableColumns();
      </script>
<script src="/../assets/js/theme-customizer/customizer.js">  </script>

<script>
    @if(session('success'))
        Swal.fire({
            title: 'Success',
            text: '{{ session('success') }}',
            icon: 'success',
        }).then(() => {
            window.location.href = '/employee/client'; // Redirect after clicking OK
        });
    @endif
</script>
<!-- login js-->
<!-- <link rel="stylesheet" type="text/css" href="https://dobtco.github.io/jquery-resizable-columns/dist/jquery.resizableColumns.css"> -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/store.js/1.3.14/store.min.js"></script>
<!-- <script src="https://dobtco.github.io/jquery-resizable-columns/dist/jquery.resizableColumns.js"></script> -->
<style>
    .qwe{
  table-layout: fixed;
  td, th{
    overflow: hidden;
    white-space: nowrap;
    -moz-text-overflow: ellipsis;        
       -ms-text-overflow: ellipsis;
        -o-text-overflow: ellipsis;
           text-overflow: ellipsis;
  }
}
</style>
<!-- <script>
                            $(document).ready( function() {
    
        $("#basic-1").resizableColumns({
    store: window.store
  });
    });
     </script> -->
</body>
</html>