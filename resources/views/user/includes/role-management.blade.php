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
    


//     <script>
// function openTab(evt, tabName) {
//   // Hide all tab contents
//   var tabcontents = document.querySelectorAll('.tabcontent');
//   tabcontents.forEach(tabcontent => {
//     tabcontent.style.display = 'none';
//   });

//   // Remove 'active' class from all tab links
//   var tablinks = document.querySelectorAll('.tablinks');
//   tablinks.forEach(tablink => {
//     tablink.classList.remove('active');
//   });

//   // Show the selected tab content and add 'active' class to the clicked tab link
//   document.getElementById(tabName).style.display = 'block';
//   evt.currentTarget.classList.add('active');
// }

// // Open the first tab by default
// document.querySelector('.tablinks').click();

// </script>

//     <script>
//   function openTabbb(tabName) {
//     var tabss = document.querySelectorAll('.tab');
//     var tabLinkss = document.querySelectorAll('.tab-link');

//     tabss.forEach(function(tab) {
//       tab.classList.remove('active');
//     });

//     tabLinkss.forEach(function(link) {
//       link.classList.remove('active');
//     });

//     document.getElementById('tab-' + tabName).classList.add('active');
//     event.currentTarget.classList.add('active');
//   }
// </script>


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

  // Automatically activate the first inner tab within the selected outer tab
  var firstInnerTabLink = document.querySelector('#' + tabName + ' .tab-link:first-child');
  if (firstInnerTabLink) {
    firstInnerTabLink.click();
  }
}

// Open the first outer tab by default
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
$(window).on('load', function() {
    // Hide the loading overlay once the window is loaded
    $('#loading-overlay').hide();

    // Add a delay of 1000 milliseconds (1 second)
    setTimeout(function() {
        // Select the modal element by its ID and trigger its display
        var myModal = new bootstrap.Modal($('#aniation_dash')[0], {
            backdrop: 'static'
        }); // Access DOM element with jQuery
        myModal.show();
    }, 1000);
});
</script>

        <script>

// Select all password fields
document.querySelectorAll('.password-field').forEach(function(passwordField) {
    passwordField.addEventListener('input', function() {
        const password = this.value;
        const validationMessage = getPasswordValidationMessage(password);
        
        // Find the related password strength message element
        const messageElement = this.closest('.gropu_form').querySelector('.password-strength-text');
        messageElement.textContent = validationMessage;

        // Update the color based on the validation result
        if (validationMessage === '') {
            messageElement.style.color = 'green';
            messageElement.textContent = 'Your password is strong.';
        } else {
            messageElement.style.color = 'red';
        }
    });
});

function getPasswordValidationMessage(password) {
    if (password.length < 8) {
        return 'Password cannot be less than 8 characters.';
    }
    if (/([a-zA-Z])\1{2,}/.test(password)) {
        return 'Your password contains repetitive characters. Please use a different password.';
    }
    if (/(\d)\1{2,}/.test(password)) {
        return 'Your password contains continuous numbers. Please use a different password.';
    }
    if (!/[A-Z]/.test(password)) {
        return 'Your password must include at least one uppercase letter.';
    }
    if (!/[a-z]/.test(password)) {
        return 'Your password must include at least one lowercase letter.';
    }
    if (!/[0-9]/.test(password)) {
        return 'Your password must include at least one number.';
    }
    if (!/[^A-Za-z0-9]/.test(password)) {
        return 'Your password must include at least one special character.';
    }

    return ''; // No message means the password is strong
}


    </script>
    



    <script src="../assets/js/theme-customizer/customizer.js">  </script>
    <!-- login js-->

        
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/store.js/1.3.14/store.min.js"></script>
  </body>
</html>