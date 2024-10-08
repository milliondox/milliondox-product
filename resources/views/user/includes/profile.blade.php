<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="tivo admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Tivo admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <title>Milliondox</title>
    
    <!-- website font start -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <!-- website font end -->
    
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/scrollbar.css">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.css">
    <!-- Add the Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Add the Flatpickr JavaScript -->
     <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" type="text/css" href="/../assets/css/vendors/datatables.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/client-custom.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
  </head>
  <body>
   @yield('content')
   <!-- latest jquery-->
    <!-- <script src="../assets/js/jquery-3.6.0.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
    <!-- Bootstrap js-->
    <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="../assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="../assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="../assets/js/scrollbar/simplebar.js"></script>
    <script src="../assets/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="../assets/js/config.js"></script>
    <script src="../assets/js/sidebar-menu.js"></script>
    <!-- <script src="../assets/js/tooltip-init.js"></script> -->
    <!-- Template js-->
    <script src="/../assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="/../assets/js/datatable/datatables/datatable.custom.js"></script>
    <script src="../assets/js/script.js"></script>

    <script>
    // Function to open specific tab content
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        evt.currentTarget.className += " active";
        document.getElementById(tabName).style.display = "block";
    }
    
    // Open the default tab on page load
    document.getElementById("defaultOpen").click();
</script>

<script> 

$(document).ready(function() {
    var pageCount = $('.page').length;
    var currentPageIndex = 0;
    
    $('#nextBtn').click(function() {
        if (currentPageIndex < pageCount - 1) {
            $('.page').eq(currentPageIndex).addClass('prev').removeClass('next');
            currentPageIndex++;
            updatePageVisibility();
        }
    });

    $('#backBtn').click(function() {
        if (currentPageIndex > 0) {
            $('.page').eq(currentPageIndex).addClass('next').removeClass('prev');
            currentPageIndex--;
            updatePageVisibility();
        }
    });

    function updatePageVisibility() {
        var marginLeft = -currentPageIndex * 100;
        $('.page').removeClass('show').addClass('hidden');
        $('.page').eq(currentPageIndex).removeClass('hidden').addClass('show');
        $('.page-container').css('margin-left', marginLeft + '%');
        $('#backBtn').toggleClass('hidden', currentPageIndex === 0);
        $('#nextBtn').toggleClass('hidden', currentPageIndex === pageCount - 1);

        if (currentPageIndex === pageCount - 1) {
            $('.wrpa_bbtn').addClass('active');
        } else {
            $('.wrpa_bbtn').removeClass('active');
        }

    }
});


$(document).ready(function() {
    var pageCount = $('.pagee').length;
    var currentPageIndex = 0;
    
    $('#nextBtnn').click(function() {
        if (currentPageIndex < pageCount - 1) {
            $('.pagee').eq(currentPageIndex).addClass('prev').removeClass('next');
            currentPageIndex++;
            updatePageVisibility();
        }
    });

    $('#backBtnn').click(function() {
        if (currentPageIndex > 0) {
            $('.pagee').eq(currentPageIndex).addClass('next').removeClass('prev');
            currentPageIndex--;
            updatePageVisibility();
        }
    });

    function updatePageVisibility() {
        var marginLeft = -currentPageIndex * 100;
        $('.pagee').removeClass('show').addClass('hidden');
        $('.pagee').eq(currentPageIndex).removeClass('hidden').addClass('show');
        $('.page-container').css('margin-left', marginLeft + '%');
        $('#backBtnn').toggleClass('hidden', currentPageIndex === 0);
        $('#nextBtnn').toggleClass('hidden', currentPageIndex === pageCount - 1);

        if (currentPageIndex === pageCount - 1) {
            $('.wrpa_bbtnn').addClass('active');
        } else {
            $('.wrpa_bbtnn').removeClass('active');
        }

    }
});







$("#plus_more").click(function(){
  $(".repeat_exp").show();
});
$("#minus_min").click(function(){
  $(".repeat_exp").hide();
});

$("#plus_more1").click(function(){
  $(".repeat_exp").show();
});
$("#minus_min1").click(function(){
  $(".repeat_exp").hide();
});

</script> 

    <script src="../assets/js/theme-customizer/customizer.js">  </script>
    <!-- login js-->

        
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/store.js/1.3.14/store.min.js"></script>
  </body>
</html>