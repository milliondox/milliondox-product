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
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
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
  <script src="../assets/js/theme-customizer/customizer.js"> </script>
  <!-- login js-->


  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/store.js/1.3.14/store.min.js"></script>

  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#contarct_table').DataTable({
        paging: true, // Enable pagination
        searching: false, // Enable search bar
        ordering: false, // Enable column sorting
        lengthChange: false, // Hide "Show entries" dropdown
        pageLength: 6, // Set default number of rows to display
        info: false // Hide "Showing X to Y of Z entries" text
      });
    });
  </script>

  <script>
    document.querySelectorAll('.divisn_only').forEach(div => {
      const spans = Array.from(div.querySelectorAll('span:not(.count_divison)'));
      const countDiv = div.querySelector('.count_divison');

      if (spans.length > 3) {
        // Show only the first three spans
        spans.slice(3).forEach(span => span.style.display = 'none');
        // Show and update the count_divison span
        countDiv.style.display = 'inline';
        countDiv.textContent = `+${spans.length - 3}`;
      } else {
        // Hide the count_divison span if the number of spans is <= 3
        countDiv.style.display = 'none';
      }
    });
  </script>

  <script>
document.querySelectorAll('.divi_ass_wrap span').forEach(span => {
    // Generate random light shades
    const randomColor = () => {
        const r = Math.floor(Math.random() * 56) + 200; // Values between 200 and 255
        const g = Math.floor(Math.random() * 56) + 200;
        const b = Math.floor(Math.random() * 56) + 200;
        return { r, g, b, rgb: `rgb(${r}, ${g}, ${b})` };
    };

    const bgColor = randomColor();
    const borderColor = randomColor();

    // Calculate brightness for contrast
    const brightness = (bgColor.r * 299 + bgColor.g * 587 + bgColor.b * 114) / 1000; // Perceived brightness formula
    const textColor = brightness > 186 ? '#000' : '#FFF'; // Use black for light backgrounds, white for dark backgrounds

    // Apply colors to the span
    span.style.borderColor = borderColor.rgb;
    span.style.backgroundColor = bgColor.rgb;
    span.style.color = textColor;
});

  </script>

  <script>
//     document.querySelectorAll('.partner_count').forEach(div => {
//     const boldTags = Array.from(div.querySelectorAll('b:not(.count)'));
//     const countTag = div.querySelector('.count');

//     if (boldTags.length > 1) {
//         // Show only the first <b>
//         boldTags.slice(1).forEach(b => b.style.display = 'none');
//         // Show and update the count <b>
//         countTag.style.display = 'inline';
//         countTag.textContent = `+ ${boldTags.length - 1}`;
//     } else {
//         // Hide the count <b> if there's only one <b>
//         countTag.style.display = 'none';
//     }
// });

document.querySelectorAll('.partner_count').forEach(div => {
    const boldTags = Array.from(div.querySelectorAll('b:not(.count)'));
    const countTag = div.querySelector('.count');

    if (boldTags.length > 1) {
        // Show only the first <b>
        boldTags.slice(1).forEach(b => b.style.display = 'none');

        // Generate tooltip content with the remaining names
        const remainingNames = boldTags.slice(1).map(b => b.textContent.trim()).join(', ');
        
        // Set the count <b> with tooltip
        countTag.style.display = 'inline';
        countTag.textContent = `+ ${boldTags.length - 1}`;
        countTag.setAttribute('title', remainingNames); // Add tooltip using title attribute
    } else {
        // Hide the count <b> if there's only one <b>
        countTag.style.display = 'none';
    }
});


  </script>


</body>

</html>