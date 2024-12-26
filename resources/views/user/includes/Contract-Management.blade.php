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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
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
    <script src="../assets/js/comon_toggle_theme.js"></script>
    
    <script>
function openTab(evt, tabName) {
  // Hide all tab contents
  var tabcontents = document.querySelectorAll('.tabcontent');
  tabcontents.forEach(tabcontent => {
    tabcontent.style.display = 'none';
  });

  // Remove 'active' class from all tab links
  var tablinks = document.querySelectorAll('.tablinks');
  tablinks.forEach(tablink => {
    tablink.classList.remove('active');
  });

  // Show the selected tab content and add 'active' class to the clicked tab link
  document.getElementById(tabName).style.display = 'block';
  evt.currentTarget.classList.add('active');
}

// Open the first tab by default
document.querySelector('.tablinks').click();

</script>


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
  function openTabbbbb(tabName) {
    var tabssss = document.querySelectorAll('.tab3');
    var tabLinkssss = document.querySelectorAll('.tab-link');

    tabssss.forEach(function(tab) {
      tab.classList.remove('active');
    });

    tabLinkssss.forEach(function(link) {
      link.classList.remove('active');
    });

    document.getElementById('tab-' + tabName).classList.add('active');
    event.currentTarget.classList.add('active');
  }
</script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
  const accordionItems = document.querySelectorAll('.accordion-item');

  accordionItems.forEach(item => {
    const header = item.querySelector('.accordion-header');
    const content = item.querySelector('.accordion-content');

    header.addEventListener('click', () => {
      const isOpen = item.classList.contains('open');

      accordionItems.forEach(item => {
        item.classList.remove('open');
        item.querySelector('.accordion-content').style.maxHeight = '0';
      });

      if (!isOpen) {
        item.classList.add('open');
        content.style.maxHeight = content.scrollHeight + 'px';
      }
    });
  });
});

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

</script> 

<script> 

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

</script> 

<script> 

$(document).ready(function() {
    var pageCount = $('.pageee').length;
    var currentPageIndex = 0;
    
    $('#nextBtnnn').click(function() {
        if (currentPageIndex < pageCount - 1) {
            $('.pageee').eq(currentPageIndex).addClass('prev').removeClass('next');
            currentPageIndex++;
            updatePageVisibility();
        }
    });

    $('#backBtnnn').click(function() {
        if (currentPageIndex > 0) {
            $('.pageee').eq(currentPageIndex).addClass('next').removeClass('prev');
            currentPageIndex--;
            updatePageVisibility();
        }
    });

    function updatePageVisibility() {
        var marginLeft = -currentPageIndex * 100;
        $('.pageee').removeClass('show').addClass('hidden');
        $('.pageee').eq(currentPageIndex).removeClass('hidden').addClass('show');
        $('.page-container').css('margin-left', marginLeft + '%');
        $('#backBtnnn').toggleClass('hidden', currentPageIndex === 0);
        $('#nextBtnnn').toggleClass('hidden', currentPageIndex === pageCount - 1);

        if (currentPageIndex === pageCount - 1) {
            $('.wrpa_bbtnnn').addClass('active');
        } else {
            $('.wrpa_bbtnnn').removeClass('active');
        }

    }
});

</script> 

<script> 

$(document).ready(function() {
    var pageCount = $('.pageeee').length;
    var currentPageIndex = 0;
    
    $('#nextBtnnnn').click(function() {
        if (currentPageIndex < pageCount - 1) {
            $('.pageeee').eq(currentPageIndex).addClass('prev').removeClass('next');
            currentPageIndex++;
            updatePageVisibility();
        }
    });

    $('#backBtnnnn').click(function() {
        if (currentPageIndex > 0) {
            $('.pageeee').eq(currentPageIndex).addClass('next').removeClass('prev');
            currentPageIndex--;
            updatePageVisibility();
        }
    });

    function updatePageVisibility() {
        var marginLeft = -currentPageIndex * 100;
        $('.pageeee').removeClass('show').addClass('hidden');
        $('.pageeee').eq(currentPageIndex).removeClass('hidden').addClass('show');
        $('.page-container').css('margin-left', marginLeft + '%');
        $('#backBtnnnn').toggleClass('hidden', currentPageIndex === 0);
        $('#nextBtnnnn').toggleClass('hidden', currentPageIndex === pageCount - 1);

        if (currentPageIndex === pageCount - 1) {
            $('.wrpa_bbtnnnn').addClass('active');
        } else {
            $('.wrpa_bbtnnnn').removeClass('active');
        }

    }
});

</script> 

<script>
$(document).ready(function() {
    $('body').on('click', '.close', function() {
        // Find the closest modal
        var $modal = $(this).closest('.modal');
        
        // Reset the form within the modal
        $modal.find('form')[0].reset();
        
        // Remove the 'green-outline' class from the '.modal-content' div
        $modal.find('.modal-content').removeClass('green-outline');
        
        // Remove the 'green-outline' class from the '.file-area' div
        $modal.find('.file-area').removeClass('green-outline');
        
        // Empty the content of the '.selected-file' div
        $modal.find('.selected-file').empty();
        
    });
});
</script>



    <script src="../assets/js/theme-customizer/customizer.js">  </script>
    <!-- login js-->

        
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/store.js/1.3.14/store.min.js"></script>


  </body>
</html>