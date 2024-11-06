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
    <script src="../assets/js/comon_toggle_theme.js"></script>

    <!-- <script>
    // Function to set the progress
    function setProgress(value) {
        var progressBar = document.getElementById("progress");
        progressBar.style.width = value + "%";
    }

    // Example usage: set progress to 60%
    setProgress(75); // Change this value to set the progress
</script> -->

<script>
  $(".save_start .hide_save").click(function(){
  $(".cmpy_content.save_start").hide();
});

$(".save_start .hide_save").click(function(){
  $(".cmpy_content.edit_start").show();
});

$(".edit_start .hide_cancle").click(function(){
  $(".cmpy_content.save_start").show();
});

$(".edit_start .hide_cancle").click(function(){
  $(".cmpy_content.edit_start").hide();
});

  </script>

<script>
document.addEventListener("DOMContentLoaded", function() {
  // Get all copy buttons
  var copyButtons = document.querySelectorAll(".copy");

  // Attach click event listener to each copy button
  copyButtons.forEach(function(button) {
    button.addEventListener("click", function() {
      // Get the text content of the adjacent td element
      var textToCopy = button.parentElement.textContent.trim();

      // Create a textarea element to hold the text temporarily
      var textarea = document.createElement("textarea");
      textarea.value = textToCopy;

      // Append the textarea to the body
      document.body.appendChild(textarea);

      // Select the content of the textarea
      textarea.select();
      
      // Copy the selected text
      document.execCommand("copy");

      // Remove the textarea from the DOM
      document.body.removeChild(textarea);

      // Store the original button text and icon
      var originalButtonText = button.textContent;
      var originalButtonIcon = button.innerHTML;

      // Update the button text to provide visual feedback
      button.innerHTML = originalButtonIcon + " Copied!";

      // Reset the button text after 1.5 seconds
      setTimeout(function() {
        button.innerHTML = originalButtonIcon + " " + originalButtonText;
      }, 1500);
    });
  });
});
</script>

<script>

$(document).ready(function() {
    // On click of .show_ediits, add active class to all .copy_save within the same list structure
    $('.show_ediits').on('click', function() {
        $('.gst_saved_data ul li').each(function() {
            $(this).find('.copy_save').addClass('active');
        });
    });

    // On click of .cick_edit_gstin, add active class to .save_gst_no, .copy_gst_no, and the <li> itself
    $('.cick_edit_gstin').on('click', function() {
        var $li = $(this).closest('li');
        $li.find('.save_gst_no').addClass('active');
        $li.find('.copy_gst_no').addClass('active');
        $li.addClass('active');
    });

    // On click of .Add_GSTIN, add active class to .new_addpned
    $('.Add_GSTIN').on('click', function() {
        $('.new_addpned').addClass('active');
    });

    // On click of .cross_gst, remove active class from .new_addpned
    $('.cross_gst').on('click', function() {
        $('.new_addpned').removeClass('active');
    });
});

        $('.copy_gst_no').on('click', function() {
        // Find the closest .gst_nomver and target the .saved_filed inside it
        var gstNumber = $(this).closest('.gst_nomver').find('.saved_filed').text();
        
        // Create a temporary input element to copy the text
        var tempInput = $('<input>');
        $('body').append(tempInput);
        tempInput.val(gstNumber).select();
        document.execCommand('copy');
        tempInput.remove();
    });

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
$('body').on('click', '.director_full_edit', function() {
    // Find the closest accordion-item from the clicked button
    const accordionItem = $(this).closest('.accordion-item');

    if (accordionItem.length) {
        // Remove 'readonly' attribute from inputs inside the current accordion-item
        accordionItem.find('input').removeAttr('readonly');

        // Add 'active' class to .director_full_submit button
        accordionItem.find('.director_full_submit').addClass('active');

         accordionItem.find('.name_form_rj').hide();


        // Hide the .director_full_edit button
        $(this).addClass('active');
    }
});

// Add 'active' class on .accordion-item.open_default and scroll to .employ_master_top_form inside the modal when .add_dir_pop is clicked
$('body').on('click', '.add_dir_pop', function() {
    // Add 'active' class to the .accordion-item.open_default element
    $('.accordion-item.open_default').addClass('active');

    // Target the scrollable container in the modal (usually .modal-body)
    var $modalBody = $(this).closest('.modal').find('.modal-body');

    // Smooth scroll to the form with the class 'employ_master_top_form' inside the modal
    $modalBody.animate({
        scrollTop: $modalBody.scrollTop() + $('.employ_master_top_form').position().top
    }, 500); // Scroll duration is set to 500 milliseconds
});


// Remove 'active' class on .accordion-item.open_default when .director_full_del_row is clicked
$('body').on('click', '.director_full_del_row', function() {
    $('.accordion-item.open_default').removeClass('active');
});



    </script>
    

    <script src="../assets/js/theme-customizer/customizer.js">  </script>
    <!-- login js-->

        
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/store.js/1.3.14/store.min.js"></script>
  </body>
</html>