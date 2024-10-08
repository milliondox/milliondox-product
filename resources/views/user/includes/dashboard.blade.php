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
      <link rel="stylesheet" type="text/css" href="../assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/client-custom.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
     <script src="../assets/js/slick.js"></script>
    <script src="../assets/js/script.js"></script>

    <script src="../assets/js/theme-customizer/customizer.js">  </script>
    <!-- login js-->



    <script>
    $(document).ready(function() {
        $('#calendar').datepicker({
            inline: true,
            firstDay: 1,
            showOtherMonths: true,
            dayNamesMin: ['S', 'M', 'T', 'W', 'T', 'F', 'S']
        });
    });
</script>
    <script>
     $(document).ready( function() {
    $('#basic-12').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'collection',
                text: '<i class="fa fa-download"></i> Download',
                
                buttons: [
            {
                extend: 'excelHtml5',
                customize: function (xlsx) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    $('row c[r^="C"]', sheet).attr('s', '2');
                },
                 text: '<i class="fa fa-download"></i> Download As Excel',
            },
            {
                extend: 'csvHtml5',
                text: '<i class="fa fa-download"></i> Download As CSV', // Custom HTML content
            }
        ]
            }
        ]
        });       
    });
    </script>
    <script>
    var hour = (new Date()).getHours();
    var greting;
    var gretingClass;
    if (hour >= 5 && hour < 12) {
        greting = "Good morning";
        gretingClass = "morning";
    } else if (hour >= 12 && hour < 16) {
        greting = "Good afternoon";
        gretingClass = "afternoon";
    } else {
        greting = "Good evening";
        gretingClass = "evening";
    }

    var gretingElement = document.getElementById("greting");
    gretingElement.textContent = greting;
    gretingElement.classList.add(gretingClass);
        </script>

<script>
window.addEventListener('load', function() {
    // Hide the loading overlay once the window is loaded
    document.getElementById('loading-overlay').style.display = 'none';

    // Add a delay of 2000 milliseconds (2 seconds)
    setTimeout(function() {
        // Select the modal element by its ID and trigger its display
        var myModal = new bootstrap.Modal(document.getElementById('aniation_dash'),
        {
        backdrop: 'static'
    });
        myModal.show();
    }, 5000);
});
</script>

<script>
window.addEventListener('load', function() {
    // Hide the loading overlay once the window is loaded
    document.getElementById('loading-overlay').style.display = 'none';

    // Add a delay of 2000 milliseconds (2 seconds)
    setTimeout(function() {
        // Select the modal element by its ID and trigger its display
        var myModal = new bootstrap.Modal(document.getElementById('aniation_dash_status'),
        {
        backdrop: 'static'
    });
        myModal.show();
    }, 2000);
});
</script>

<script>
window.addEventListener('load', function() {
    // Hide the loading overlay once the window is loaded
    document.getElementById('loading-overlay').style.display = 'none';

    // Select the modal element by its ID and trigger its display
    var myModal = new bootstrap.Modal(document.getElementById('add_organistaion_details'), {
        backdrop: 'static'
    });
    myModal.show();
});
</script>


<script>
window.addEventListener('load', function() {
    var forEach = function(array, callback, scope) {
        for (var i = 0; i < array.length; i++) {
            callback.call(scope, i, array[i]);
        }
    };

    var max = 220; // Assuming a typical SVG path length
    forEach(document.querySelectorAll('.progresss'), function(index, value) {
        var percent = value.getAttribute('data-progresss');
        value.querySelector('.fill').setAttribute('style', 'stroke-dashoffset: ' + ((100 - percent) / 100) * max);
        value.querySelector('.value').innerHTML = percent + '%';
    });
});
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
$(document).ready(function() {
    $('#show_form_event').on('click', function() {
      $('.calander_fix').addClass('active');
      $('.calander_overlay_fix').addClass('active');
    });

    $('.calander_overlay_fix').on('click', function() {
      $('.calander_fix').removeClass('active');
      $('.calander_overlay_fix').removeClass('active');
    });

  });
  </script>


<script>
$(document).ready(function(){
    $("#show_form").click(function(){
        $("#eventFormddd").addClass("active");
        $(this).hide();
    });

    $("#close").click(function(){
        $("#eventFormddd").removeClass("active");
        $("#show_form").css("display", "flex");
    });

    $("#show_formm").click(function(){
        $("#eventFormdddd").addClass("active");
        $(this).hide();
    });

    $("#closee").click(function(){
        $("#eventFormdddd").removeClass("active");
        $("#show_formm").css("display", "flex");
    });
    
    //edit form task

// Smooth scroll within the sidebar to #event_edit_form when .his_edit_event is clicked
$(".his_edit_event").click(function() {
    // Add the 'active' class to #event_edit
    $("#event_edit").addClass("active");

    // Find the scrollable sidebar container with the class .calander_fix
    var $sidebar = $(".calander_fix");

    // Define an offset to scroll a little past the top, making the form more centered
    var offset = 100; // Adjust this value as needed to control the top spacing

    // Smooth scroll to the form with the id 'event_edit_form' inside the sidebar
    $sidebar.animate({
        scrollTop: $sidebar.scrollTop() + $(".event_edit_form").position().top - offset
    }, 500); // Scroll duration is set to 500 milliseconds
});
    
        $("#closee_edit_event").click(function(){
        $("#event_edit").removeClass("active");
    });
    
        //edit form event
        $("#his_edit_event_ar").click(function(){
        $("#eventFormddd_edit").addClass("active");
    });
    
        $("#close_event_edit_ar").click(function(){
        $("#eventFormddd_edit").removeClass("active");
    });

});

 // Event listeners to toggle selected state of event type buttons
    $(document).on('click', '.event-type-btn', function() {
        $('.event-type-btn.active').removeClass('active');
        $(this).addClass('active');
        $('#eventType').val($(this).attr('data-value'));
    });
</script>

<script>
// document.querySelectorAll('.active_greenn').forEach(function(element) {
//   element.addEventListener('click', function() {
//     this.closest('li').classList.toggle('active');
//   });
// });


// document.addEventListener('DOMContentLoaded', function() {
//     const activeButtons = document.querySelectorAll('.active_greenn');
//     const mainRepoUl = document.querySelector('.main_repo_ul');

//     // Function to update visibility of mainRepoUl
//     function updateUlVisibility() {
//         const anyActive = Array.from(mainRepoUl.querySelectorAll('li'))
//                               .some(li => li.classList.contains('active'));
        
//         if (anyActive) {
//             mainRepoUl.classList.add('show');
//         } else {
//             mainRepoUl.classList.remove('show');
//         }
//     }

//     // Attach click event listeners to .active_greenn buttons
//     activeButtons.forEach(button => {
//         button.addEventListener('click', function() {
//             const parentLi = this.closest('li');
//             parentLi.classList.toggle('active');
//             updateUlVisibility();
//         });
//     });

//     // Initial call to set visibility based on current state
//     updateUlVisibility();
// });

$(document).ready(function() {
    const $activeButtons = $('.active_greenn');
    const $mainRepoUl = $('.main_repo_ul');

    // Function to update visibility of $mainRepoUl
    function updateUlVisibility() {
        const anyActive = $mainRepoUl.find('li.active').length > 0;
        
        if (anyActive) {
            $mainRepoUl.addClass('show');
        } else {
            $mainRepoUl.removeClass('show');
        }
    }

    // Attach click event listeners to .active_greenn buttons
    $activeButtons.on('click', function() {
        const $parentLi = $(this).closest('li');
        $parentLi.toggleClass('active');
        updateUlVisibility();
    });

    // Initial call to set visibility based on current state
    updateUlVisibility();
});

</script>

<script>


  // Select all elements with the class 'nt_cl_accress'
  document.querySelectorAll(".nt_cl_accress").forEach(function(element) {
    element.addEventListener("click", function(event) {
      event.preventDefault(); // Prevent the default action of the anchor click

      const accessLink = event.currentTarget; // Get the clicked element
      const repoContainer = accessLink.closest(".accress_denied"); // Find the closest parent with the class 'accress_denied'

      // Add 'accres_acvtive' class to the container and 'active' class to the link, change text
      repoContainer.classList.add("accres_acvtive");
      accessLink.classList.add("active");
      accessLink.textContent = "Access Denied";

      // Remove 'accres_acvtive' class and 'active' class after 3 seconds
      setTimeout(function() {
        repoContainer.classList.remove("accres_acvtive");
        accessLink.classList.remove("active");

        // Maintain 'accress_denied' class and revert text back to "Access"
        accessLink.textContent = "Access";
      }, 3000);
    });
  });


</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Select the file input and image elements
    const fileInput = document.getElementById('profile_picture');
    const previewImage = document.getElementById('previewImage');

    // Event listener for file input change
    fileInput.addEventListener('change', function(event) {
        // Check if a file is selected
        if (event.target.files && event.target.files[0]) {
            // Create a FileReader to read the file
            const reader = new FileReader();

            // Define the onload event for the FileReader
            reader.onload = function(e) {
                // Set the image src to the file's data URL
                previewImage.src = e.target.result;
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(event.target.files[0]);
        }
    });
});
</script>

        
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/store.js/1.3.14/store.min.js"></script>
  </body>
</html>