(function ($) {
    "use strict";

    // loader
    $('.loader-wrapper').fadeOut('slow', function () {
        $(this).remove();
    });
    // tap top
    $('.tap-top').on('click', function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 600) {
            $('.tap-top').fadeIn();
        } else {
            $('.tap-top').fadeOut();
        }
    });
    $(document).on('click', function (e) {
        var outside_space = $(".outside");
        if (!outside_space.is(e.target) &&
            outside_space.has(e.target).length === 0) {
            $(".menu-to-be-close").removeClass("d-block");
            $('.menu-to-be-close').css('display', 'none');
        }
    })  

    $('.prooduct-details-box .close').on('click', function (e) {
        var order_details = $(this).closest('[class*=" col-"]').addClass('d-none');
    })

    if ($(".page-wrapper").hasClass("horizontal-wrapper")) {
        $(".sidebar-list").hover(
          function () {
            $(this).addClass("hoverd");
          },
          function () {
            $(this).removeClass("hoverd");
          }
        );
        $(window).on("scroll", function () {
          if ($(this).scrollTop() < 600) {
            $(".sidebar-list").removeClass("hoverd");
          }
        });
      }

    /*----------------------------------------
     passward show hide
     ----------------------------------------*/
    $('.show-hide').show();
    $('.show-hide span').addClass('show');

    $('.show-hide span').on('click', function () {
        if ($(this).hasClass('show')) {
            $('input[name="login[password]"]').attr('type', 'text');
            $(this).removeClass('show');
        } else {
            $('input[name="login[password]"]').attr('type', 'password');
            $(this).addClass('show');
        }
    });
    $('form button[type="submit"]').on('click', function () {
        $('.show-hide span').addClass('show');
        $('.show-hide').parent().find('input[name="login[password]"]').attr('type', 'password');
    });

    /*=====================
      02. Background Image js
      ==========================*/
    $(".bg-center").parent().addClass('b-center');
    $(".bg-img-cover").parent().addClass('bg-size');
    $('.bg-img-cover').each(function () {
        var el = $(this),
            src = el.attr('src'),
            parent = el.parent();
        parent.css({
            'background-image': 'url(' + src + ')',
            'background-size': 'cover',
            'background-position': 'center',
            'display': 'block'
        });
        el.hide();
    });

    $(".mega-menu-container").css("display", "none");
    $(".header-search").on('click', function () {
        $(".search-full").addClass("open");
    });
    $(".close-search").on('click', function () {
        $(".search-full").removeClass("open");
        $("body").removeClass("offcanvas");
    });
    $(".mobile-toggle").on('click', function () {
        $(".nav-menus").toggleClass("open");
    });
    $(".mobile-toggle-left").on('click', function () {
        $(".left-header").toggleClass("open");
    });
    $(".bookmark-search").on('click', function () {
        $(".form-control-search").toggleClass("open");
    })
    $(".filter-toggle").on('click', function () {
        $(".product-sidebar").toggleClass("open");
    });
    $(".toggle-data").on('click', function () {
        $(".product-wrapper").toggleClass("sidebaron");
    });

    $(".mobile-search").on('click', function () {
        $(".form-control").toggleClass("open");
    });

    $(".form-control-search input").keyup(function (e) {
        if (e.target.value) {
            $(".page-wrapper").addClass("offcanvas-bookmark");
        } else {
            $(".page-wrapper").removeClass("offcanvas-bookmark");
        }
    });
    $(".search-full input").keyup(function (e) {
        if (e.target.value) {
            $("body").addClass("offcanvas");
        } else {
            $("body").removeClass("offcanvas");
        }
    });

    $('body').keydown(function (e) {
        if (e.keyCode == 27) {
            $('.search-full input').val('');
            $('.form-control-search input').val('');
            $('.page-wrapper').removeClass('offcanvas-bookmark');
            $('.search-full').removeClass('open');
            $('.search-form .form-control-search').removeClass('open');
            $("body").removeClass("offcanvas");
        }
    });

    // $(".mode").on("click", function () {
    //     if (localStorage.getItem('body') === 'dark-only') {
    //       // Remove the 'dark-only' class from <body>
    //       $('body').removeClass('dark-only');
    //       // Change the button icon to indicate the light theme
    //       $('.mode i').removeClass("fa-lightbulb-o").addClass("fa-moon-o");

    //       $('.rolelabel').removeClass("col-form-label pt-0 rolelabel text-warning").addClass("col-form-label pt-0 rolelabel");
    //       // Clear the localStorage value
    //       localStorage.setItem('body', '');


    //     } else {
    //       // Add the 'dark-only' class to <body>
    //       $('body').addClass('dark-only');
    //       // Change the button icon to indicate the dark theme
    //       $('.mode i').removeClass("fa-moon-o").addClass("fa-lightbulb-o");

    //       $('.rolelabel').removeClass("col-form-label pt-0 rolelabel ").addClass("col-form-label pt-0 rolelabel text-warning");


    //       // Set the localStorage value to 'dark-only'
    //       localStorage.setItem('body', 'dark-only');


    //     }
    //   });
    
    

    
    
      
      
            
      



    // active link

    $(".chat-menu-icons .toogle-bar").on('click', function () {
        $(".chat-menu").toggleClass("show");
    });

    $(".mobile-title svg").on('click', function (){
        $(".header-mega").toggleClass("d-block");
    });

    // $(".onhover-dropdown").on("click", function () {
    //     $(this).children('.onhover-show-div').toggleClass("active");
    // });

    $(document).on("click", function(event) {
        // Check if the clicked element is not a descendant of .onhover-dropdown or .onhover-show-div
        if (!$(event.target).closest('.onhover-dropdown').length && !$(event.target).closest('.onhover-show-div').length) {
            $('.onhover-show-div').removeClass("active");
        }
    });
    
    $(".onhover-dropdown").on("click", function(event) {
        // Prevent event propagation to stop immediate triggering of window click event
        event.stopPropagation();
        $(this).children('.onhover-show-div').toggleClass("active");
    });

    // search input
    $(".serchbox").on("click", function (e) {
        $(".search-form").toggleClass("open");
        e.preventDefault();
    });

    //landing header //
    $(".toggle-menu").on('click', function (){
        $('.landing-menu').toggleClass('open');
    });
    $(".menu-back").on('click', function (){
        $('.landing-menu').toggleClass('open');
    });

    $(".md-sidebar-toggle").on('click', function (){
        $('.md-sidebar-aside').toggleClass('open');
    });

    // color selector
      $('.color-selector ul li ').on('click', function(e) {
        $(".color-selector ul li").removeClass("active");
        $(this).addClass("active");
      });




    // $(document).ready(function() {
    //     // Function to set active class on first load
    //     function setActiveClassOnFirstLoad() {
    //         // Add active class to the first sidebar-list item
    //         $('ul.sidebar-links li.sidebar-list:first').addClass('active');
    //     }
        
    //     // Call the function to set active class on first load
    //     setActiveClassOnFirstLoad();
    
    //     // Add click event listener to navigation links except the first one
    //     $('ul.sidebar-links li.sidebar-list:not(:first) a.sidebar-link').on('click', function() {
    //         // Remove active class from all sidebar-list items
    //         $('ul.sidebar-links li.sidebar-list').removeClass('active');
            
    //         // Add active class to the clicked navigation link's parent li element
    //         $(this).closest('li.sidebar-list').addClass('active');
            
    //         // Store the active link's identifier in session storage
    //         sessionStorage.setItem('activeLinkId', $(this).closest('li.sidebar-list').attr('id'));
    //     });
    
    //     // Function to set active class based on current URL
    //     function setActiveClassFromUrl() {
    //         // Get the current URL
    //         var currentUrl = window.location.href;
    
    //         // Loop through each navigation link
    //         $('ul.sidebar-links li.sidebar-list a.sidebar-link').each(function() {
    //             // Get the href attribute of the navigation link
    //             var navUrl = $(this).attr('href');
    
    //             // Check if the current URL contains the navigation URL
    //             if (currentUrl.indexOf(navUrl) !== -1) {
    //                 // Remove active class from all sidebar-list items
    //                 $('ul.sidebar-links li.sidebar-list').removeClass('active');
    
    //                 // Add active class to the closest parent li element
    //                 $(this).closest('li.sidebar-list').addClass('active');
    
    //                 // Store the active link's identifier in session storage
    //                 sessionStorage.setItem('activeLinkId', $(this).closest('li.sidebar-list').attr('id'));
    
    //                 // Exit the loop once active class is added
    //                 return false;
    //             }
    //         });
    //     }
    
    //     // Call the function to set active class based on current URL
    //     setActiveClassFromUrl();
    
    //     // Retrieve the active link's identifier from session storage and apply active class
    //     var activeLinkId = sessionStorage.getItem('activeLinkId');
    //     if (activeLinkId !== null) {
    //         $('#' + activeLinkId).addClass('active');
    //     }    

    // });
    
    





    $(document).ready(function() {
        // Function to set active class on first load
        function setActiveClassOnFirstLoad() {
            // Add active class to the first sidebar-list item
            $('ul.sidebar-links li.sidebar-list:first').addClass('active');
        }
        
        // Call the function to set active class on first load
        setActiveClassOnFirstLoad();
    
        // Add click event listener to navigation links
        $('ul.sidebar-links li.sidebar-list a.sidebar-link').on('click', function() {
            // Check if the clicked list item already has the active class
            var isActive = $(this).closest('li.sidebar-list').hasClass('active');
            
            // Remove active class from all sidebar-list items
            $('ul.sidebar-links li.sidebar-list').removeClass('active');
    
            // If the clicked list item didn't have the active class, add it
            if (!isActive) {
                $(this).closest('li.sidebar-list').addClass('active');
            }
            
            // Store the active link's identifier in session storage
            sessionStorage.setItem('activeLinkId', $(this).closest('li.sidebar-list').attr('id'));
        });
    
        // Function to set active class based on current URL
        function setActiveClassFromUrl() {
            // Get the current URL
            var currentUrl = window.location.href;
    
            // Loop through each navigation link
            $('ul.sidebar-links li.sidebar-list a.sidebar-link').each(function() {
                // Get the href attribute of the navigation link
                var navUrl = $(this).attr('href');
    
                // Check if the current URL contains the navigation URL
                if (currentUrl.indexOf(navUrl) !== -1) {
                    // Remove active class from all sidebar-list items
                    $('ul.sidebar-links li.sidebar-list').removeClass('active');
    
                    // Add active class to the closest parent li element
                    $(this).closest('li.sidebar-list').addClass('active');
    
                    // Store the active link's identifier in session storage
                    sessionStorage.setItem('activeLinkId', $(this).closest('li.sidebar-list').attr('id'));
    
                    // Exit the loop once active class is added
                    return false;
                }
            });
        }
    
        // Call the function to set active class based on current URL
        setActiveClassFromUrl();
    
        // Retrieve the active link's identifier from session storage and apply active class
        var activeLinkId = sessionStorage.getItem('activeLinkId');
        if (activeLinkId !== null) {
            $('#' + activeLinkId).addClass('active');
        }    
    });





    //extra
    $(document).ready(function() {
        // $('body').addClass('box-layout');
    });

    (function ($, window, document, undefined) {
        "use strict";
        var $ripple = $(".js-ripple");
        $ripple.on("click.ui.ripple", function (e) {
            var $this = $(this);
            var $offset = $this.parent().offset();
            var $circle = $this.find(".c-ripple__circle");
            var x = e.pageX - $offset.left;
            var y = e.pageY - $offset.top;
            $circle.css({
                top: y + "px",
                left: x + "px"
            });
            $this.addClass("is-active");
        });
        $ripple.on(
            "animationend webkitAnimationEnd oanimationend MSAnimationEnd",
            function (e) {
                $(this).removeClass("is-active");
            });

    })(jQuery, window, document);


// Language
var tnum = 'en';

$(document).ready(function () {

    if (localStorage.getItem("primary") != null) {
        var primary_val = localStorage.getItem("primary");
        $("#ColorPicker1").val(primary_val);
        var secondary_val = localStorage.getItem("secondary");
        $("#ColorPicker2").val(secondary_val);
    }


    $(document).on('click', function (e) {
        $('.translate_wrapper, .more_lang').removeClass('active');
    });
    $('.translate_wrapper .current_lang').on('click', function (e) {
        e.stopPropagation();
        $(this).parent().toggleClass('active');

        setTimeout(function () {
            $('.more_lang').toggleClass('active');
        }, 5);
    });


    //togle js
    $(".setting_munal").click(function(){
        $(".setting_opt").toggleClass("active");
      });

      
    // good morning dashboard script
    // var hour = (new Date()).getHours();
    // var greeting;
    // var greetingClass;
    // if (hour >= 5 && hour < 12) {
    //     greeting = "Good morning";
    //     greetingClass = "morning";
    // } else if (hour >= 12 && hour < 16) {
    //     greeting = "Good afternoon";
    //     greetingClass = "afternoon";
    // } else {
    //     greeting = "Good evening";
    //     greetingClass = "evening";
    // }

    // var greetingElement = document.getElementById("greeting");
    // greetingElement.textContent = greeting;
    // greetingElement.classList.add(greetingClass);

    // Get the current hour
var hour = (new Date()).getHours();
var greeting;

// Determine the greeting based on the current hour
if (hour >= 5 && hour < 12) {
    greeting = "Good morning";
} else if (hour >= 12 && hour < 16) {
    greeting = "Good afternoon";
} else {
    greeting = "Good evening";
}

// Get the greeting element by its ID
var greetingElement = document.getElementById("greeting");

// Check if the greeting element exists
if (greetingElement) {
    // Set the greeting text content
    greetingElement.textContent = greeting;
} else {
    console.error("Element with ID 'greeting' not found.");
}
    






    /*TRANSLATE*/
    translate(tnum);

    $('.more_lang .lang').on('click', function () {
        $(this).addClass('selected').siblings().removeClass('selected');
        $('.more_lang').removeClass('active');

        var i = $(this).find('i').attr('class');
        var lang = $(this).attr('data-value');
        var tnum = lang;
        translate(tnum);

        $('.current_lang .lang-txt').text(lang);
        $('.current_lang i').attr('class', i);


    });
});

function translate(tnum, index) {
    for(var i=1;i<=9;i++){
        $('.lan-'+i).text(trans[i-1][tnum]);
    }
}

var trans = [{
        en: 'General',
        pt: 'Geral',
        es: 'Generalo',
        fr: 'GÃ©nÃ©rale',
        de: 'Generel',
        cn: 'ä¸€èˆ¬',
        ae: 'Ø­Ø¬Ù†Ø±Ø§Ù„ Ù„ÙˆØ§Ø¡'
    }, {
        en: 'Dashboards,widgets & layout.',
        pt: 'PainÃ©is, widgets e layout.',
        es: 'Paneloj, fenestraÄµoj kaj aranÄo.',
        fr: "Tableaux de bord, widgets et mise en page.",
        de: 'Dashboards, widgets en lay-out.',
        cn: 'ä»ªè¡¨æ¿ï¼Œå°å·¥å…·å’Œå¸ƒå±€ã€‚',
        ae: 'Ù„ÙˆØ­Ø§Øª Ø§Ù„Ù…Ø¹Ù„ÙˆÙ…Ø§Øª ÙˆØ§Ù„Ø£Ø¯ÙˆØ§Øª ÙˆØ§Ù„ØªØ®Ø·ÙŠØ·.'
    }, {
        en: 'Dashboards',
        pt: 'PainÃ©is',
        es: 'Paneloj',
        fr: 'Tableaux',
        de: 'Dashboards',
        cn: ' ä»ªè¡¨æ¿ ',
        ae: 'ÙˆØ­Ø§Øª Ø§Ù„Ù‚ÙŠØ§Ø¯Ø© '
    }, {
        en: 'Default',
        pt: 'PadrÃ£o',
        es: 'Vaikimisi',
        fr: 'DÃ©faut',
        de: 'Standaard',
        cn: 'é›»å­å•†å‹™',
        ae: 'ÙˆØ¥ÙØªØ±Ø§Ø¶ÙŠ'
    }, {
        en: 'Ecommerce',
        pt: 'ComÃ©rcio eletrÃ´nico',
        es: 'Komerco',
        fr: 'Commerce Ã©lectronique',
        de: 'E-commerce',
        cn: 'é›»å­å•†å‹™',
        ae: 'ÙˆØ§Ù„ØªØ¬Ø§Ø±Ø© Ø§Ù„Ø¥Ù„ÙƒØªØ±ÙˆÙ†ÙŠØ©'
    }, {
        en: 'Widgets',
        pt: 'Ferramenta',
        es: 'Vidin',
        fr: 'Widgets',
        de: 'Widgets',
        cn: 'å°éƒ¨ä»¶',
        ae: 'ÙˆØ§Ù„Ø­Ø§Ø¬ÙŠØ§Øª'
    }, {
        en: 'Page layout',
        pt: 'Layout da pÃ¡gina',
        es: 'PaÄa aranÄo',
        fr: 'Tableaux',
        de: 'Mise en page',
        cn: 'é é¢ä½ˆå±€',
        ae: 'ÙˆØªØ®Ø·ÙŠØ· Ø§Ù„ØµÙØ­Ø©'
    }, {
        en: 'Applications',
        pt: 'FormulÃ¡rios',
        es: 'Aplikoj',
        fr: 'Applications',
        de: 'Toepassingen',
        cn: 'æ‡‰ç”¨é ˜åŸŸ',
        ae: 'ÙˆØ§Ù„ØªØ·Ø¨ÙŠÙ‚Ø§Øª'
    }, {
        en: 'Ready to use Apps',
        pt: 'Pronto para usar aplicativos',
        es: 'Preta uzi Apps',
        fr: ' Applications prÃªtes Ã  lemploi ',
        de: 'Klaar om apps te gebruiken',
        cn: 'ä»ªè¡¨æ¿',
        ae: 'Ø¬Ø§Ù‡Ø² Ù„Ø§Ø³ØªØ®Ø¯Ø§Ù… Ø§Ù„ØªØ·Ø¨ÙŠÙ‚Ø§Øª'
    },

];

})(jQuery);

function toggleFullScreen() {
    if ((document.fullScreenElement && document.fullScreenElement !== null) ||
        (!document.mozFullScreen && !document.webkitIsFullScreen)) {
        if (document.documentElement.requestFullScreen) {
            document.documentElement.requestFullScreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
            document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
    }
}




        

   // Add event listener to input file elements with class 'dragfile'
    document.querySelectorAll('.dragfile').forEach(function(input) {
        input.addEventListener('change', function() {
            console.log('File input changed');
            var fileInput = input;
            var fileArea = input.closest('.modal-content');
            console.log('File Area:', fileArea);

            if (fileInput.files.length > 0) {
                console.log('File selected:', fileInput.files[0].name);
                var selectedFileDiv = fileArea.querySelector('.selected-file');
                console.log('Selected file div:', selectedFileDiv);
                selectedFileDiv.textContent = fileInput.files[0].name;
                fileArea.classList.add('green-outline');
                // Add style to modal content when file is chosen
                fileArea.style.outline = '2px dashed green';

                // Hide the span when file is chosen
                input.closest('.file-dummy').querySelector('.fille').style.display = 'none';
            } else {
                fileArea.classList.remove('green-outline');
                // Add style to modal content when file is not chosen
                fileArea.style.outline = '2px dashed #D2DBE5';

                // Show the span when file is not chosen
                input.closest('.file-dummy').querySelector('.fille').style.display = 'inline';
            }
        });
    });
    
    




    
    
    //     document.querySelectorAll('.dragfile').forEach(function(input) {
    //     input.addEventListener('change', function() {
    //         var fileInput = input;
    //         var fileArea = fileInput.closest('.file-area');
    //         var fileDummy = fileArea.querySelector('.file-dummy');
    //         var selectedFileDiv = fileArea.querySelector('.selected-file');
    
    //         if (fileInput.files.length > 0) {
    //             selectedFileDiv.textContent = fileInput.files[0].name;
    //             fileArea.classList.add('green-outline');
    //             fileArea.style.outline = '2px dashed green';
    //             fileDummy.querySelector('.fille').style.display = 'none';
    //         } else {
    //             selectedFileDiv.textContent = '';
    //             fileArea.classList.remove('green-outline');
    //             fileArea.style.outline = '2px dashed #D2DBE5';
    //             fileDummy.querySelector('.fille').style.display = 'inline';
    //         }
    //     });
    // });
    
    
          $(document).ready(function() {
            // Function to simulate clearing content and focusing textarea
            function simulateBackspace() {
                $('textarea').each(function() {
                    var $textarea = $(this);
                    // Focus the textarea and clear the content
                    $textarea.focus();
                    $textarea.val(''); // Simulate pressing backspace by clearing content
                    $textarea.trigger('input'); // Trigger input event to update placeholder
                });
            }

            // Call the function on document ready
            simulateBackspace();

            // Optionally, handle the change event to keep placeholder visible
            $('textarea').on('change', function() {
                $(this).trigger('input');
            });
        });
 

$( document ).ready(function() {

$('.mmaiin_wallet_wrap').slick({
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  dots: false,
  fade: true,
  cssEase: 'linear',
  autoplay: true,
  autoplaySpeed: 4000
});

});

$(document).ready(function() {
    $('#click_fees_for').on('click', function() {
        $('.thanks_feedback').addClass('active'); // Add 'active' class
    });

    $('#click_stop').on('click', function() {
        $('.thanks_feedback').removeClass('active'); // Remove 'active' class
    });
});



$('body').on('click touchend', '.toggle-password', function(e) {
    e.preventDefault(); // Prevent default action for touch events
    var input = $(this).siblings('input[type="password"], input[type="text"]');
    var icon = $(this).find('i');

    // Toggle visibility
    if (input.attr('type') === 'password') {
        input.attr('type', 'text');
        icon.removeClass('fa-eye-slash').addClass('fa-eye');
    } else {
        input.attr('type', 'password');
        icon.removeClass('fa-eye').addClass('fa-eye-slash');
    }
});

		



setInterval(() => {
    if (window.location.pathname !== '/login' && window.location.pathname !== '/register') {
        fetch('/check-session', {
            method: 'GET',
            credentials: 'same-origin', // Include session cookie
            headers: {
                'X-Requested-With': 'XMLHttpRequest' // Indicate AJAX request
            }
        })
        .then(response => {
            if (response.status === 401) {
                // If session expired, redirect to the login page
                window.location.href = '/login';
            }
        })
        .catch(error => {
            console.error('Error checking session:', error);
        });
    }
}, 5000); // Check every 5 seconds

    