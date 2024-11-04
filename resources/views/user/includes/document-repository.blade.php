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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/repo-client.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
 <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>window.jQuery || document.write('<script src="{{ asset('assets/js/jquerylocal.js') }}"><\/script>')</script>

    <script>
        $(document).ready(function() {
            console.log('jQuery is loaded and ready!');
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    if (typeof jQuery === 'undefined') {
        document.write('<script src="{{ asset('assets/js/jquerylocal.js') }}"><\/script>');
    }
</script>

  <script>
    (function() {
        var script = document.createElement('script');
        script.src = 'https://code.jquery.com/jquery-3.7.1.min.js';
        script.async = true;
        document.head.appendChild(script);
    })();
</script>

 <script>
        document.addEventListener('DOMContentLoaded', function() {
            let clicked = 0;

            const element = document.getElementById('autohome');
            element.addEventListener('click', function() {
                clicked++;
                if (clicked === 2) {
                    // alert('Double Clicked!');
                }
            });

            function simulateClick() {
                var event = new MouseEvent('click', {
                    'view': window,
                    'bubbles': true,
                    'cancelable': true
                });
                element.dispatchEvent(event);
            }

            // Simulate double click by clicking twice in quick succession
            simulateClick();
            setTimeout(simulateClick, 50); // Delay to ensure it's registered as a double click

            setTimeout(function() {
                if (clicked < 2) {
                    // alert('Not double clicked!');
                }
            }, 200); // Wait a bit to ensure click events are processed
        });
        
    </script>
<script>
  
</script>
  </head>
  <body class="custom_reverse_dark">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>window.jQuery || document.write('<script src="{{ asset('assets/js/jquerylocal.js') }}"><\/script>')</script>

    <script>
        $(document).ready(function() {
            console.log('jQuery is loaded and ready!');
        });
    </script>
   @yield('content')
   <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    if (typeof jQuery === 'undefined') {
        document.write('<script src="{{ asset('assets/js/jquerylocal.js') }}"><\/script>');
    }
</script>
<script>
    (function() {
        var script = document.createElement('script');
        script.src = 'https://code.jquery.com/jquery-3.7.1.min.js';
        script.async = true;
        document.head.appendChild(script);
    })();
</script>

   
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>window.jQuery || document.write('<script src="{{ asset('assets/js/jquerylocal.js') }}"><\/script>')</script>

   <!-- latest jquery-->
    <!-- <script src="../assets/js/jquery-3.6.0.min.js"></script> -->
   
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
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
    <script src="https://rawgit.com/stadnikEV/slide-v/master/dist/slide-v.min.js"></script>
  
    <!-- login js-->
    


    <script>
  function openTabbb(tabName) {
    var tabss = document.querySelectorAll('.tab');
    var tabLinkss = document.querySelectorAll('.tab-link');

    tabss.forEach(function(tab) {
      tab.classList.remove('active');
    });

    tabLinkss.forEach(function(link) {
      link.classList.remove('active');
    });

    document.getElementById('tab-' + tabName).classList.add('active');
    event.currentTarget.classList.add('active');
  }
</script>

<script>
  const mySlideV = new SlideV()

const next = document.querySelector('.next')
const prev = document.querySelector('.prev')

next.addEventListener('click', () => { mySlideV.next() })
prev.addEventListener('click', () => { mySlideV.prev() })
  </script>
        
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/store.js/1.3.14/store.min.js"></script>


    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->



    
  </body>
</html>