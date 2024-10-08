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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Add the Flatpickr JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    @if(session('success'))
        Swal.fire('Success', '{{ session('success') }}', 'success');
    @endif

    @if(session('error'))
        Swal.fire('Error', '{{ session('error') }}', 'error');
    @endif
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.min.css">
<style>
 td{
        font-weight:500;
    }
    </style>

<script src="https://code.jquery.com/jquery-1.12.3.js"></script>

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"> -->

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="/../assets/css/responsive.css">
    
</head>
<body>
<script>
    @if(session('success'))
        Swal.fire('Success', '{{ session('success') }}', 'success');
    @endif

    @if(session('error'))
        Swal.fire('Error', '{{ session('error') }}', 'error');
    @endif
</script>
@yield('content')

<!-- latest jquery-->
<!-- <script src="/../assets/js/jquery-3.6.0.min.js"></script> -->
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
<!-- <script src="/../assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
<script src="/../assets/js/datatable/datatables/datatable.custom.js"></script> -->
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
        Swal.fire('Success', '{{ session('success') }}', 'success');
    @endif

    @if(session('error'))
        Swal.fire('Error', '{{ session('error') }}', 'error');
    @endif
</script>



@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
<script>
    // Check if there's a message in the session (set by the controller)
    var message = "{{ Session::get('message') }}";

    // Display SweetAlert popup if a message is available
    if (message) {
        Swal.fire({
            icon: message.includes('successfully') ? 'success' : 'error', // Use 'success' or 'error' icon based on the message content
            title: message,
            showConfirmButton: false,
            timer: 2000 // Set the popup to close after 2 seconds (adjust as needed)
        });
    }
</script>
</body>
</html>