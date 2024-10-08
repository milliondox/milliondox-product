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
    <script src="../assets/js/script.js"></script>
  
    <script src="../assets/js/theme-customizer/customizer.js">  </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://www.jquery-az.com/jquery/js/intlTelInput/intlTelInput.js"></script>
<!-- <link href="https://www.jquery-az.com/jquery/css/intlTelInput/demo.css" rel="stylesheet" /> -->
<link href="https://www.jquery-az.com/jquery/css/intlTelInput/intlTelInput.css" rel="stylesheet" />

    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/store.js/1.3.14/store.min.js"></script>

    <!-- <script>
    document.getElementById('downloadForm').addEventListener('submit', function() {
        setTimeout(function() {
            location.reload();
        }, 1000); // Reload after 1 second (1000 milliseconds)
    });
</script> -->
 

<script>
// Assuming you're using jQuery for AJAX
$(document).ready(function() {
        // Assuming you're using jQuery for AJAX
        $('#submitForm').submit(function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Perform AJAX request
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Call the function to handle form submission success
                        handleFormSubmissionSuccess();
                    } else {
                        // Display error message
                        // $('.inpt_wrap').append('<div class="alert alert-danger">' + response.message + '</div>');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors if any
                    // $('.inpt_wrap').append('<div class="alert alert-danger">' + error + '</div>');
                }
            });
        });

        // Function to handle form submission success
        function handleFormSubmissionSuccess() {
            // Hide the current step
            $('#sfsdfsd').hide();

            // Show the next step
            $('#tbbbbb').show();
        }
    });
</script>
<script>
    $(document).ready(function() {
        
  
       function fetchDocuments() {
            $.ajax({
                type: 'GET',
                url: '{{ route('fetchDocuments') }}',
                success: function(response) {
                    // Clear existing table rows
                    $('#document-table-body').empty();

                    // Iterate over the documents in the response and append rows to the table
                    response.documents.forEach(function(document) {
                        var newRow = '<tr>' +
                        '<td>' + document.name + '</td>' +
        '<td>' + document.created_at + '</td>' +
        '<td>' +
        '<a href="/documents/' + document.id + '/download"><i class="fas fa-download"></i></a>' +
        '</td>' +
        '<td>' +
        '<button class="btn btn-primary share-btn" data-document-id="' + document.id + '">Share</button>' +
        '</td>' +
        '</tr>';
                        $('#document-table-body').append(newRow);
                    });
                },
                error: function(xhr, status, error) {
                    // Handle error (optional)
                    console.error(error);
                }
            });
        }

        // Initial call to fetch and display documents
        fetchDocuments();

        // Set interval to fetch and update documents every 5 seconds
        setInterval(fetchDocuments, 1000);

        // Handle form submission
        $('#anotherForm').submit(function(event) {
    event.preventDefault();
    
    var formData = new FormData($(this)[0]);
    
    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.success) {
                // Clear the form fields
                $('#anotherForm')[0].reset();
                
                // Show success message
                var successMessage = '<div class="alert alert-success">' + response.message + '</div>';
                $('.inpt_wrap').append(successMessage);
                
                // Auto-hide success message after 2 seconds
                setTimeout(function() {
                    $(successMessage).fadeOut('slow', function() {
                        $(this).remove();
                    });
                }, 2000);
            } else {
                // Show error message
                var errorMessage = '<div class="alert alert-danger">' + response.message + '</div>';
                $('.inpt_wrap').append(errorMessage);
                
                // Auto-hide error message after 2 seconds
                setTimeout(function() {
                    $(errorMessage).fadeOut('slow', function() {
                        $(this).remove();
                    });
                }, 2000);
            }
        },
        error: function(xhr, status, error) {
            // Show error message if ajax request fails
            var errorMessage = '<div class="alert alert-danger">' + error + '</div>';
            $('.inpt_wrap').append(errorMessage);
            
            // Auto-hide error message after 2 seconds
            setTimeout(function() {
                $(errorMessage).fadeOut('slow', function() {
                    $(this).remove();
                });
            }, 2000);
        }
    });
});


    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    var timer;
    var timeLeft = 60;

    function startTimer() {
        timer = setInterval(function() {
            var minutes = Math.floor(timeLeft / 60);
            var seconds = timeLeft % 60;
            document.getElementById("timer").innerHTML = "Resend OTP in: " + minutes + ":" + (seconds < 10 ? "0" : "") + seconds;

            if (timeLeft <= 0) {
                clearInterval(timer);
                document.getElementById("timer").innerHTML = "<a href='{{url('/user/wallet')}}'>Resend OTP</a>";
            } else {
                timeLeft--;
            }
        }, 1000);
    }

    function nextInput(current) {
        var maxLength = parseInt(current.getAttribute('maxlength'));
        var next = current.nextElementSibling;

        if (current.value.length >= maxLength) {
            if (next && next.tagName.toLowerCase() === 'input') {
                next.focus();
            }
        }
    }

    startTimer();
</script>

<script>
    $(document).ready(function() {
        $('.share-btn').click(function(e) {
            e.preventDefault();
            var documentId = $(this).data('document-id');
            $.ajax({
                url: '/documents/' + documentId + '/share',
                method: 'GET',
                success: function(response) {
                    alert('Shared link generated: ' + response.shared_link);
                },
                error: function(xhr, status, error) {
                    alert('Failed to generate shared link');
                }
            });
        });
    });
</script>

  </body>
</html>