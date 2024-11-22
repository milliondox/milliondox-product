<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="tivo admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Tivo admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('assets/images/favicon/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon/favicon.png') }}" type="image/x-icon">
    <title>Milliondox</title>

    <!-- website font start -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <!-- website font end -->

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/font-awesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/scrollbar.css') }}">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">
    <!-- Add the Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Add the Flatpickr JavaScript -->
     <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/client-custom.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/masteradmin.css') }}">
    {{-- {{ asset('assets/css/vendors/bootstrap.css') }} --}}
    
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

  </head>
  <body class="master_adin_panel">
   @yield('content')
   <!-- latest jquery-->
    <!-- <script src="../assets/js/jquery-3.6.0.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- scrollbar js-->
    <script src="{{ asset('assets/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/scrollbar/custom.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
    <!-- <script src="../assets/js/tooltip-init.js"></script> -->
    <!-- Template js-->
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/theme-customizer/customizer.js') }}">  </script>    
    <!-- login js-->
        
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/store.js/1.3.14/store.min.js"></script>

    <script>
    $(document).ready(function() {
        $('body').removeClass('dark-only');
    });
    </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  // Daily Activity Chart
  const dailyActivityCtx = document.getElementById('dailyActivityChart').getContext('2d');
  const dailyActivityChart = new Chart(dailyActivityCtx, {
    type: 'bar',
    data: {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      datasets: [{
        data: [2, 3, 2.5, 3.5, 4, 2.7, 3.2, 2.8, 3.1, 3.6, 4.1, 3.5, 2.9, 3.3],
        backgroundColor: '#5790FF',
        borderRadius: 10,
        borderSkipped: false,
        barThickness: 10, // Set the width of the bars
        maxBarThickness: 15  // Limit the maximum width of bars
      }]
    },
    options: {
      plugins: {
        legend: { display: false }
      },
      responsive: true,
      maintainAspectRatio: false,
      layout: {
        padding: {
          left: 10,
          right: 10,
          top: 10,
          bottom: 10
        }
      },
      scales: {
        x: {
          display: false,  // Show the X-axis
          // No need for barPercentage/categoryPercentage if using barThickness
        },
        y: {
          display: false,
          beginAtZero: true
        }
      },
      elements: {
        bar: {
          borderRadius: 5,  // Optional: smooth edges for the bars
          borderSkipped: false
        }
      }
    }
  });

  // Daily Transactions Chart
  const dailyTransactionsCtx = document.getElementById('dailyTransactionsChart').getContext('2d');
  const dailyTransactionsChart = new Chart(dailyTransactionsCtx, {
    type: 'bar',
    data: {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      datasets: [{
        data: [30, 33, 50, 32, 28, 35, 34, 31, 30, 86, 33, 32, 31, 29],
        backgroundColor: '#9ADB67',
        borderRadius: 10,
        borderSkipped: false,
        barThickness: 10, // Set the width of the bars
        maxBarThickness: 15  // Limit the maximum width of bars
      }]
    },
    options: {
      plugins: {
        legend: { display: false }
      },
      responsive: true,
      maintainAspectRatio: false,
      layout: {
        padding: {
          left: 10,
          right: 10,
          top: 10,
          bottom: 10
        }
      },
      scales: {
        x: {
          display: false,  // Show the X-axis
          // No need for barPercentage/categoryPercentage if using barThickness
        },
        y: {
          display: false,
          beginAtZero: true
        }
      },
      elements: {
        bar: {
          borderRadius: 5,  // Optional: smooth edges for the bars
          borderSkipped: false
        }
      }
    }
  });
</script>





    
  </body>
</html>