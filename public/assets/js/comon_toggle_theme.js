// $(document).ready(function () {
//     // Check the localStorage for 'body' and 'mode' states and apply them on page load
//     if (localStorage.getItem('body') === 'dark-only') {
//       $('body').addClass('dark-only');
//       $('.mode i').removeClass("fa-moon-o").addClass("fa-lightbulb-o");
//       $('.rolelabel').addClass("text-warning");
//       $('.mode').addClass('active_mod');
//     } else {
//       $('body').removeClass('dark-only');
//       $('.mode i').removeClass("fa-lightbulb-o").addClass("fa-moon-o");
//       $('.rolelabel').removeClass("text-warning");
//       $('.mode').removeClass('active_mod');
//     }
  
//     // Handle click event on .mode
//     $(".mode").on("click", function () {
//       if (localStorage.getItem('body') === 'dark-only') {
//         // Remove the 'dark-only' class from <body>
//         $('body').removeClass('dark-only');
//         // Change the button icon to indicate the light theme
//         $('.mode i').removeClass("fa-lightbulb-o").addClass("fa-moon-o");
//         $('.rolelabel').removeClass("col-form-label pt-0 rolelabel text-warning").addClass("col-form-label pt-0 rolelabel");
//         // Remove the 'active_mod' class from .mode
//         $('.mode').removeClass('active_mod');
//         // Clear the localStorage value
//         localStorage.setItem('body', '');
//         localStorage.setItem('mode', '');
//       } else {
//         // Add the 'dark-only' class to <body>
//         $('body').addClass('dark-only');
//         // Change the button icon to indicate the dark theme
//         $('.mode i').removeClass("fa-moon-o").addClass("fa-lightbulb-o");
//         $('.rolelabel').addClass("text-warning");
//         // Add the 'active_mod' class to .mode
//         $('.mode').addClass('active_mod');
//         // Set the localStorage value to 'dark-only' and 'active_mod'
//         localStorage.setItem('body', 'dark-only');
//         localStorage.setItem('mode', 'active_mod');
//       }
//     });
//   });






// $(document).ready(function () {
//     // Check if 'body' is not set in localStorage and set it to 'dark-only' by default
//     if (localStorage.getItem('body') === null) {
//         localStorage.setItem('body', 'dark-only'); // Set dark mode as default
//     }
    
//     // Apply the stored theme mode on page load
//     if (localStorage.getItem('body') === 'dark-only') {
//         $('body').addClass('dark-only');
//         $('.mode i').removeClass("fa-moon-o").addClass("fa-lightbulb-o");
//         $('.rolelabel').addClass("text-warning");
//         $('.mode').addClass('active_mod');
//     } else {
//         $('body').removeClass('dark-only');
//         $('.mode i').removeClass("fa-lightbulb-o").addClass("fa-moon-o");
//         $('.rolelabel').removeClass("text-warning");
//         $('.mode').removeClass('active_mod');
//     }

//     // Handle click event on .mode
//     $(".mode").on("click", function () {
//         if (localStorage.getItem('body') === 'dark-only') {
//             // Remove the 'dark-only' class from <body>
//             $('body').removeClass('dark-only');
//             // Change the button icon to indicate the light theme
//             $('.mode i').removeClass("fa-lightbulb-o").addClass("fa-moon-o");
//             $('.rolelabel').removeClass("text-warning");
//             // Remove the 'active_mod' class from .mode
//             $('.mode').removeClass('active_mod');
//             // Clear the localStorage value
//             localStorage.setItem('body', ''); // Remove the dark mode preference
//         } else {
//             // Add the 'dark-only' class to <body>
//             $('body').addClass('dark-only');
//             // Change the button icon to indicate the dark theme
//             $('.mode i').removeClass("fa-moon-o").addClass("fa-lightbulb-o");
//             $('.rolelabel').addClass("text-warning");
//             // Add the 'active_mod' class to .mode
//             $('.mode').addClass('active_mod');
//             // Set the localStorage value to 'dark-only'
//             localStorage.setItem('body', 'dark-only');
//         }
//     });
// });




$(document).ready(function () {
    // Check if 'body' is not set in localStorage and set it to 'dark-only' by default
    if (localStorage.getItem('body') === null) {
        localStorage.setItem('body', 'dark-only'); // Set dark mode as default
    }

    // Apply the stored theme mode on page load
    if (localStorage.getItem('body') === 'dark-only') {
        $('body').addClass('dark-only');
        $('.mode i').removeClass("fa-moon-o").addClass("fa-lightbulb-o");
        $('.rolelabel').addClass("text-warning");
        $('.mode').removeClass('active_mod'); // Switcher is inactive in dark mode
    } else {
        $('body').removeClass('dark-only');
        $('.mode i').removeClass("fa-lightbulb-o").addClass("fa-moon-o");
        $('.rolelabel').removeClass("text-warning");
        $('.mode').addClass('active_mod'); // Switcher is active in light mode
    }

    // Handle click event on .mode
    $(".mode").on("click", function () {
        if (localStorage.getItem('body') === 'dark-only') {
            // Switch to light mode
            $('body').removeClass('dark-only');
            $('.mode i').removeClass("fa-lightbulb-o").addClass("fa-moon-o");
            $('.rolelabel').removeClass("text-warning");
            $('.mode').addClass('active_mod'); // Activate switcher in light mode
            localStorage.setItem('body', ''); // Clear dark mode preference
        } else {
            // Switch to dark mode
            $('body').addClass('dark-only');
            $('.mode i').removeClass("fa-moon-o").addClass("fa-lightbulb-o");
            $('.rolelabel').addClass("text-warning");
            $('.mode').removeClass('active_mod'); // Deactivate switcher in dark mode
            localStorage.setItem('body', 'dark-only');
        }
    });
});


  
  
  
  
  
  
  