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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/client-custom.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
</head>

<body>
    @yield('content')
    <!-- latest jquery-->
    <!-- <script src="../assets/js/jquery-3.6.0.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
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
    <script src="{{ asset('assets/js/comon_toggle_theme.js') }}"></script>
    <script src="{{ asset('assets/js/theme-customizer/customizer.js') }}"> </script>
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
        // document.querySelectorAll('.divisn_only').forEach(div => {
        //   const spans = Array.from(div.querySelectorAll('span:not(.count_divison)'));
        //   const countDiv = div.querySelector('.count_divison');

        //   if (spans.length > 3) {
        //     // Show only the first three spans
        //     spans.slice(3).forEach(span => span.style.display = 'none');
        //     // Show and update the count_divison span
        //     countDiv.style.display = 'inline';
        //     countDiv.textContent = `+${spans.length - 3}`;
        //   } else {
        //     // Hide the count_divison span if the number of spans is <= 3
        //     countDiv.style.display = 'none';
        //   }
        // });

        document.querySelectorAll('.divisn_only').forEach(div => {
            const spans = Array.from(div.querySelectorAll('span:not(.count_divison)'));
            const countDiv = div.querySelector('.count_divison');

            // Create the tooltip
            const tooltip = document.createElement('div');
            tooltip.className = 'custom-tooltip';
            div.appendChild(tooltip);

            if (spans.length > 3) {
                // Show only the first three spans
                spans.slice(3).forEach(span => span.style.display = 'none');

                // Show and update the count_divison span
                countDiv.style.display = 'inline';
                countDiv.textContent = `+${spans.length - 3}`;

                // Update tooltip content
                tooltip.textContent = spans.slice(3).map(span => span.textContent).join(', ');

                // Show tooltip on hover
                countDiv.addEventListener('mouseenter', () => {
                    tooltip.style.opacity = '1';
                    tooltip.style.visibility = 'visible';
                });

                // Hide tooltip when not hovering
                countDiv.addEventListener('mouseleave', () => {
                    tooltip.style.opacity = '0';
                    tooltip.style.visibility = 'hidden';
                });
            } else {
                // Hide the count_divison span if the number of spans is <= 3
                countDiv.style.display = 'none';
            }
        });
    </script>

    <script>
        function applyColors() {
            document.querySelectorAll('.divi_ass_wrap span').forEach(span => {
                const randomColor = (isDarkMode) => {
                    if (isDarkMode) {
                        // Generate darker shades for dark mode
                        const r = Math.floor(Math.random() * 50) + 50; // Values between 50 and 100
                        const g = Math.floor(Math.random() * 50) + 50;
                        const b = Math.floor(Math.random() * 50) + 50;
                        return {
                            r,
                            g,
                            b,
                            rgb: `rgb(${r}, ${g}, ${b})`
                        };
                    } else {
                        // Generate lighter shades for light mode
                        const r = Math.floor(Math.random() * 30) + 225; // Values between 225 and 255
                        const g = Math.floor(Math.random() * 30) + 225;
                        const b = Math.floor(Math.random() * 30) + 225;
                        return {
                            r,
                            g,
                            b,
                            rgb: `rgb(${r}, ${g}, ${b})`
                        };
                    }
                };

                const isDarkMode = document.body.classList.contains('dark-only');
                const bgColor = randomColor(isDarkMode);
                const borderColor = randomColor(isDarkMode);

                // Calculate brightness for contrast
                const brightness = (bgColor.r * 299 + bgColor.g * 587 + bgColor.b * 114) / 1000; // Perceived brightness formula
                const textColor = brightness > 186 ? '#434343' : '#FFF'; // Use black for light backgrounds, white for dark backgrounds

                // Apply colors to the span
                span.style.borderColor = borderColor.rgb;
                span.style.backgroundColor = bgColor.rgb;
                span.style.color = textColor;
            });
        }

        // Initial call to apply colors
        applyColors();

        // Monitor changes to the body class
        const observer = new MutationObserver(() => {
            applyColors(); // Reapply colors when the class changes
        });

        // Observe changes to the `class` attribute of the body
        observer.observe(document.body, {
            attributes: true,
            attributeFilter: ['class']
        });
    </script>

    <script>
        document.querySelectorAll('.partner_count').forEach(div => {
            const boldTags = Array.from(div.querySelectorAll('b:not(.count)'));
            const countTag = div.querySelector('.count');

            if (boldTags.length > 1) {
                // Show only the first <b>
                boldTags.slice(1).forEach(b => b.style.display = 'none');

                // Generate tooltip content with the remaining names
                const remainingNames = boldTags.slice(1).map(b => b.textContent.trim()).join(', ');

                // Set the count <b>
                countTag.style.display = 'inline';
                countTag.textContent = `+ ${boldTags.length - 1}`;

                // Remove any existing tooltip
                const existingTooltip = countTag.querySelector('.custom-tooltip');
                if (existingTooltip) existingTooltip.remove();

                // Create a custom tooltip
                const tooltip = document.createElement('div');
                tooltip.className = 'custom-tooltip';
                tooltip.innerHTML = remainingNames;

                // Append tooltip to the countTag
                countTag.appendChild(tooltip);

                // Show tooltip on hover
                countTag.addEventListener('mouseenter', () => {
                    tooltip.style.opacity = '1';
                    tooltip.style.visibility = 'visible';
                });

                // Hide tooltip when not hovering
                countTag.addEventListener('mouseleave', () => {
                    tooltip.style.opacity = '0';
                    tooltip.style.visibility = 'hidden';
                });
            } else {
                // Hide the count <b> if there's only one <b>
                countTag.style.display = 'none';
            }
        });
    </script>


    <!-- signature tooltip -->
    <script>
        document.querySelectorAll('.Authrized_Signatory').forEach(div => {
            const boldTags = Array.from(div.querySelectorAll('b:not(.count)'));
            const countTag = div.querySelector('.count');

            if (boldTags.length > 0) {
                // Hide all <b> tags
                boldTags.forEach(b => b.style.display = 'none');

                // Generate tooltip content with all names
                const allNames = boldTags.map(b => b.textContent.trim()).join(', ');

                // Set the count <b> to display "+n" with a tooltip
                countTag.style.display = 'inline';
                countTag.textContent = `+ ${boldTags.length}`;

                // Remove any existing tooltip
                const existingTooltip = countTag.querySelector('.custom-tooltip');
                if (existingTooltip) existingTooltip.remove();

                // Create a custom tooltip
                const tooltip = document.createElement('div');
                tooltip.className = 'custom-tooltip';
                tooltip.innerHTML = allNames;

                // Append tooltip to the countTag
                countTag.appendChild(tooltip);

                // Show tooltip on hover
                countTag.addEventListener('mouseenter', () => {
                    tooltip.style.opacity = '1';
                    tooltip.style.visibility = 'visible';
                });

                // Hide tooltip when not hovering
                countTag.addEventListener('mouseleave', () => {
                    tooltip.style.opacity = '0';
                    tooltip.style.visibility = 'hidden';
                });
            } else {
                // Hide the count <b> if there are no <b> tags
                countTag.style.display = 'none';
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAllCheckbox = document.querySelector('.sleect_all'); // Select the "select all" checkbox
            const individualCheckboxes = document.querySelectorAll('.sleect_individual'); // Select all "individual" checkboxes

            // Add event listener to "select all" checkbox
            selectAllCheckbox.addEventListener('change', function() {
                const isChecked = this.checked; // Check the current state of the "select all" checkbox
                individualCheckboxes.forEach(checkbox => {
                    checkbox.checked = isChecked; // Set the state of each individual checkbox to match the "select all" checkbox
                });
            });

            // Add event listeners to individual checkboxes to update "select all" state
            individualCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const allChecked = Array.from(individualCheckboxes).every(cb => cb.checked); // Check if all individual checkboxes are checked
                    selectAllCheckbox.checked = allChecked; // Update the "select all" checkbox state
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Toggle the dropdown-content when button is clicked
            $('body').on('click', '.dropbtn', function(e) {
                // Prevent body click from immediately closing the dropdown
                e.stopPropagation();

                // Get the dropdown content of the clicked button
                var dropdownContent = $(this).siblings('.dropdown-content');

                // Close any currently open dropdowns by removing the active class from all dropdown-content
                $('.dropdown-content').not(dropdownContent).removeClass('active');

                // Toggle the active class on the clicked dropdown-content
                dropdownContent.toggleClass('active');
            });

            // Close dropdown-content if clicking outside
            $('body').on('click', function() {
                $('.dropdown-content').removeClass('active');
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#addacustomer').on('click', function() {
                $('.addcustomer_fix').addClass('active');
                $('.addcustomer_overlay_fix').addClass('active');
            });

            $('.addcustomer_overlay_fix').on('click', function() {
                $('.addcustomer_fix').removeClass('active');
                $('.addcustomer_overlay_fix').removeClass('active');
            });
        });


        $(document).on('click', function(event) {
            // Check if the click is outside of .opload and .opload_wrap_opt
            if (!$(event.target).closest('.opload, .opload_wrap_opt').length) {
                $('.opload_wrap_opt').removeClass('active');
            }
        });

        $('.opload').on('click', function(event) {
            // Prevent the click from propagating to the document
            event.stopPropagation();
            $('.opload_wrap_opt').toggleClass('active');
        });
    </script>

    <script>
        // Select all input elements with the class 'emppicd'
        document.querySelectorAll('.emppicd').forEach(function(input) {
            input.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        // Find the closest .dont_show div and update the .previewd image inside it
                        const previewImg = event.target.closest('.inner_file_edit').querySelector('.previewd');
                        if (previewImg) {
                            previewImg.src = e.target.result;
                        }
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {

            // Toggle behavior on button click
            $(".show_content").click(function() {
                // Slide up or down the div       
                $("#contract_detail_bottom").slideToggle();

                // Toggle the active class on the button
                $(this).toggleClass("active");
            });

            // Toggle behavior on button click
            $("#upload_contact_managge").click(function() {
                // Slide up or down the div       
                $(".append_bootm_contarct").slideToggle();
            });

        });
    </script>

    <!-- show multiple files names in popup list script -->
    <script>
        $(document).ready(function() {
            var fileData = {};

            // Handle file input change
            $('body').on('change', '#contracts', function() {
                const fileInput = this;
                const fileList = $(fileInput).closest('.file-area').next('.file-list');
                const inputId = $(fileInput).attr('id');

                if (!fileData[inputId]) fileData[inputId] = [];

                // Append new files to fileData
                const newFiles = Array.from(fileInput.files);
                fileData[inputId] = [...fileData[inputId], ...newFiles];

                refreshFileList(fileList, inputId);
                updateFileInput(fileInput, inputId);
            });
            

            // Handle drag and drop events
            $('.file-area').on('dragover', function(event) {
                event.preventDefault();
            }).on('dragleave', function() {
                // No additional functionality here as per the request
            }).on('drop', function(event) {
                event.preventDefault();

                const fileInput = $(this).find('#contracts')[0];
                const fileList = $(this).next('.file-list');
                const inputId = $(fileInput).attr('id');

                if (!fileData[inputId]) fileData[inputId] = [];
                const droppedFiles = Array.from(event.originalEvent.dataTransfer.files);

                // Append dropped files to the fileData array
                fileData[inputId] = [...fileData[inputId], ...droppedFiles];

                // Update the file input before refreshing the list
                updateFileInput(fileInput, inputId);
                refreshFileList(fileList, inputId);
            });

            // Function to refresh the file list in the UI
            function refreshFileList(fileList, inputId) {
                fileList.empty();

                fileData[inputId].forEach((file, index) => {
                    const fileItem = $('<div>', {
                        class: 'file-item'
                    }).append(
                        $('<span>').text(file.name),
                        $('<button>', {
                            class: 'remove-btn',
                            'data-file-index': index
                        }).on('click', function() {
                            removeFile(index, fileList, inputId);
                        })
                    );

                    // Create the SVG using plain JavaScript
                    const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                    svg.setAttribute("width", "11");
                    svg.setAttribute("height", "11");
                    svg.setAttribute("viewBox", "0 0 11 11");
                    svg.setAttribute("fill", "none");
                    svg.setAttribute("xmlns", "http://www.w3.org/2000/svg");

                    const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
                    path.setAttribute("d", "M1.24264 9.72799L9.72792 1.24271M9.72792 9.72799L1.24264 1.24271");
                    path.setAttribute("stroke", "#FF0000");
                    path.setAttribute("stroke-width", "1.66");
                    path.setAttribute("stroke-miterlimit", "10");
                    path.setAttribute("stroke-linecap", "round");
                    path.setAttribute("stroke-linejoin", "round");

                    svg.appendChild(path);

                    // Append the SVG to the button
                    fileItem.find('.remove-btn').append(svg);

                    fileList.append(fileItem);
                });

            }

            // Function to remove a file from the input
            function removeFile(index, fileList, inputId) {
                fileData[inputId].splice(index, 1);
                refreshFileList(fileList, inputId);
                updateFileInput($(`#${inputId}`)[0], inputId);
            }

            // Function to update the file input's file list
            function updateFileInput(fileInput, inputId) {
                const dataTransfer = new DataTransfer();
                fileData[inputId].forEach(file => dataTransfer.items.add(file));
                fileInput.files = dataTransfer.files;
            }

            // Initialize file data for the file input
            $('#contracts').each(function() {
                const inputId = $(this).attr('id');
                fileData[inputId] = [];
            });
        });
    </script>

    <!-- show single file names in popup list script -->
    <!-- show single file names in popup list script -->
    <script>
        $(document).ready(function() {
            var fileData = {};

            // Handle file input change
            $('body').on('change', '#excel_file', function() {
                const fileInput = this;
                const fileList = $(fileInput).closest('.file-area').next('.file-list');
                const inputId = $(fileInput).attr('id');

                // Only one file allowed for #excel_file
                const newFile = fileInput.files[0];
                fileData[inputId] = [newFile];

                refreshFileList(fileList, inputId);
                updateFileInput(fileInput, inputId);
            });

            // Handle drag and drop events
            $('.file-area').on('dragover', function(event) {
                event.preventDefault();
            }).on('drop', function(event) {
                event.preventDefault();

                const fileInput = $(this).find('#excel_file')[0];
                const fileList = $(this).next('.file-list');
                const inputId = $(fileInput).attr('id');

                // Only one file allowed for #excel_file
                const droppedFile = event.originalEvent.dataTransfer.files[0];
                fileData[inputId] = [droppedFile];

                updateFileInput(fileInput, inputId);
                refreshFileList(fileList, inputId);
            });

            // Function to refresh the file list in the UI
            function refreshFileList(fileList, inputId) {
                fileList.empty();

                fileData[inputId].forEach((file, index) => {
                    const fileItem = $('<div>', {
                        class: 'file-item'
                    }).append(
                        $('<span>').text(file.name),
                        $('<button>', {
                            class: 'remove-btn',
                            'data-file-index': index
                        }).on('click', function() {
                            removeFile(index, fileList, inputId);
                        })
                    );

                    // Create the SVG using plain JavaScript
                    const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                    svg.setAttribute("width", "11");
                    svg.setAttribute("height", "11");
                    svg.setAttribute("viewBox", "0 0 11 11");
                    svg.setAttribute("fill", "none");
                    svg.setAttribute("xmlns", "http://www.w3.org/2000/svg");

                    const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
                    path.setAttribute("d", "M1.24264 9.72799L9.72792 1.24271M9.72792 9.72799L1.24264 1.24271");
                    path.setAttribute("stroke", "#FF0000");
                    path.setAttribute("stroke-width", "1.66");
                    path.setAttribute("stroke-miterlimit", "10");
                    path.setAttribute("stroke-linecap", "round");
                    path.setAttribute("stroke-linejoin", "round");

                    svg.appendChild(path);

                    // Append the SVG to the button
                    fileItem.find('.remove-btn').append(svg);

                    fileList.append(fileItem);
                });

            }

            // Function to remove a file from the input
            function removeFile(index, fileList, inputId) {
                fileData[inputId] = [];
                refreshFileList(fileList, inputId);
                updateFileInput($(`#${inputId}`)[0], inputId);
            }

            // Function to update the file input's file list
            function updateFileInput(fileInput, inputId) {
                const dataTransfer = new DataTransfer();
                fileData[inputId].forEach(file => dataTransfer.items.add(file));
                fileInput.files = dataTransfer.files;
            }

            // Initialize file data for the file input
            $('#excel_file').each(function() {
                const inputId = $(this).attr('id');
                fileData[inputId] = [];
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.drag_file_signature').on('change', function(event) {
                const file = event.target.files[0];
                const $fileAreaCover = $(this).closest('.file-area_cover');
                const $signaturePre = $fileAreaCover.next('.show_signature_pre');

                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        // Create the preview content
                        const previewHTML = `
                    <div class="preview-wrapper">
                        <img src="${e.target.result}" alt="Selected File" class="preview-image">
                    </div>
                                            <button type="button" class="remove-btn">
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.24264 9.72799L9.72792 1.24271M9.72792 9.72799L1.24264 1.24271" stroke="#FF0000" stroke-width="1.66" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>`;
                        $signaturePre.html(previewHTML).show();
                        $fileAreaCover.hide();
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Handle the remove button click
            $(document).on('click', '.remove-btn', function() {
                const $signaturePre = $(this).closest('.show_signature_pre');
                const $fileAreaCover = $signaturePre.prev('.file-area_cover');
                const $fileInput = $fileAreaCover.find('input');

                // Clear the input and reset views
                $fileInput.val('');
                $signaturePre.hide().empty();
                $fileAreaCover.show();
            });
        });
    </script>

<script>
    $(document).ready(function () {
    $('.sarrt_contract').click(function () {
        $('.contract_main_show').addClass('hidden');
        $('.main_contractt_detail').addClass('smart_contract_active');
        setTimeout(function () {
            $('.contract_main_show').hide();
            $('.main_smart_contract').show().removeClass('hidden');
        }, 500); // Matches CSS transition duration
    });

    $('.hide_smart_contract').click(function () {
        $('.main_smart_contract').addClass('hidden');
        $('.main_contractt_detail').removeClass('smart_contract_active');
        setTimeout(function () {
            $('.main_smart_contract').hide();
            $('.contract_main_show').show().removeClass('hidden');
        }, 500); // Matches CSS transition duration
    });
});

</script>

<script>
$(document).ready(function () {
    // Handle next button click
    $('.next-step-smart').click(function () {
        const currentStep = $(this).closest('.smart_step_1, .smart_step_2, .smart_step_3, .smart_step_4'); // Find the current step
        const nextStep = currentStep.next(); // Find the next step

        if (nextStep.length) {
            currentStep.addClass('hidden'); // Fade out the current step
            setTimeout(function () {
                currentStep.hide(); // Hide the current step
                nextStep.show().removeClass('hidden'); // Show and fade in the next step
            }, 500); // Match the CSS transition duration
        }
    });

    // Handle previous button click
    $('.prev-step-smart').click(function () {
        const currentStep = $(this).closest('.smart_step_1, .smart_step_2, .smart_step_3, .smart_step_4'); // Find the current step
        const prevStep = currentStep.prev(); // Find the previous step

        if (prevStep.length) {
            currentStep.addClass('hidden'); // Fade out the current step
            setTimeout(function () {
                currentStep.hide(); // Hide the current step
                prevStep.show().removeClass('hidden'); // Show and fade in the previous step
            }, 500); // Match the CSS transition duration
        }
    });

    // Enable the "Next" button in step 2 when a value is selected
    $('#template').change(function () {
        const selectedValue = $(this).val();
        if (selectedValue) {
            $(this).closest('.smart_step_2').find('.next-step-smart').prop('disabled', false);
        }
    });
});

</script>


<script>
        const templateSelect = document.getElementById('template');
        const dynamicFieldsContainer = document.getElementById('dynamic-fields');

        const templates = {
            1: {
                template: `
                    <p><strong>THIS NON-DISCLOSURE AGREEMENT</strong> ("the Agreement") dated this <span class="preview-date">____________________</span> day of <span class="preview-year">____________________</span>.<br><br></p>
	<p><strong>BETWEEN:</strong></p>
	<p><span class="preview-fname">____________________</span> of <span class="preview-lname">____________________</span><br>(the "Employer")</p>
	<p>OF THE FIRST PART</p>
	<p><strong>- AND -</strong><br></p>
	<p><span class="preview-secfname">____________________</span> of <span class="preview-seclname">____________________</span><br>(the "Employee")</p>
	<p>OF THE SECOND PART</p>
	<p><strong>BACKGROUND:</strong></p>
	<ol start="1">
		<li value="1"><span>The Employee is currently or may be employed as an employee with the Employer for the position of: <span class="preview-postion">____________________</span>. In addition to this responsibility or position (the "Employment"), this Agreement also covers any position or responsibility now or later held with the Employer.</span><br></li>
		<li value="2"><span>The Employee will receive from the Employer, or develop on the behalf of the Employer, Confidential Information as a result of the Employment (the "Permitted Purpose").</span><br></li>
	</ol>
	<p><strong>IN CONSIDERATION OF</strong> and as a condition of the Employer employing the Employee and the Employer providing the Confidential Information to the Employee in addition to other valuable consideration, the receipt and sufficiency of which consideration is hereby acknowledged, the parties to this Agreement agree as follows:</p>
	<ol start="1">
		<li class="lh"><strong><u><span>Confidential Information</span></u></strong><strong><u><br></u></strong></li>
		<li value="1"><span>All written and oral information and materials disclosed or provided by the Employer to the Employee under this Agreement constitute Confidential Information regardless of whether such information was provided before or after the date of this Agreement or how it was provided to the Employee.</span><br></li>
		<li value="2"><span>The Employee acknowledges that in any position the Employee may hold, in and as a result of the Employee's employment by the Employer, the Employee will, or may, be making use of, acquiring or adding to information about certain matters and things which are confidential to the Employer and which information is the exclusive property of the Employer.</span><br></li>
		<li value="3"><span>'Confidential Information' means all data and information relating to the business and management of the Employer, including but not limited to, the following:</span><br>
			<ol start="1" class="list-style-type-lower-alpha">
				<li value="1"><span>'Business Operations' which includes internal personnel and financial information of the Employer, vendor names and other vendor information (including vendor characteristics, services and agreements), purchasing and internal cost information, internal services and operational manuals, external business contacts including those stored on social media accounts or other similar platforms or databases operated by the Employer, and the manner and methods of conducting the Employer's business;</span><br></li>
				<li value="2"><span>'Customer Information' which includes names of customers of the Employer, their representatives, all customer contact information, contracts and their contents and parties, customer services, data provided by customers and the type, quantity and specifications of products and services purchased, leased, licensed or received by customers of the Employer;</span><br></li>
				<li value="3"><span>'Intellectual Property' which includes information relating to the Employer's proprietary rights prior to any public disclosure of such information, including but not limited to the nature of the proprietary rights, production data, technical and engineering data, technical concepts, test data and test results, simulation results, the status and details of research and development of products and services, and information regarding acquiring, protecting, enforcing and licensing proprietary rights (including patents, copyrights and trade secrets);</span><br></li>
				<li value="4"><span>'Service Information' which includes all data and information relating to the services provided by the Employer, including but not limited to, plans, schedules, manpower, inspection, and training information;</span><br></li>
				<li value="5"><span>'Product Information' which includes all specifications for products of the Employer as well as work product resulting from or related to work or projects performed or to be performed for the Employer or for clients of the Employer, of any type or form in any stage of actual or anticipated research and development;</span><br></li>
				<li value="6"><span>'Production Processes' which includes processes used in the creation, production and manufacturing of the work product of the Employer, including but not limited to, formulas, patterns, moulds, models, methods, techniques, specifications, processes, procedures, equipment, devices, programs, and designs;</span><br></li>
				<li value="7"><span>'Accounting Information' which includes, without limitation, all financial statements, annual reports, balance sheets, company asset information, company liability information, revenue and expense reporting, profit and loss reporting, cash flow reporting, accounts receivable, accounts payable, inventory reporting, purchasing information and payroll information of the Employer;</span><br></li>
				<li value="8"><span>'Marketing and Development Information' which includes marketing and development plans of the Employer, price and cost data, price and fee amounts, pricing and billing policies, quoting procedures, marketing techniques and methods of obtaining business, forecasts and forecast assumptions and volumes, and future plans and potential strategies of the Employer which have been or are being discussed;</span><br></li>
				<li value="9"><span>'Computer Technology' which includes all scientific and technical information or material of the Employer, pertaining to any machine, appliance or process, including but not limited to, specifications, proposals, models, designs, formulas, test results and reports, analyses, simulation results, tables of operating conditions, materials, components, industrial skills, operating and testing procedures, shop practices, know-how and show-how;</span><br></li>
				<li value="10"><span>'Proprietary Computer Code' which includes all sets of statements, instructions or programs of the Employer, whether in human readable or machine readable form, that are expressed, fixed, embodied or stored in any manner and that can be used directly or indirectly in a computer ('Computer Programs'); any report format, design or drawing created or produced by such Computer Programs; and all documentation, design specifications and charts, and operating procedures which support the Computer Programs; and</span><br></li>
				<li value="11"><span>Confidential Information will also include any information that has been disclosed by a third party to the Employer and is protected by a non-disclosure agreement entered into between the third party and the Employer.</span><br></li>
			</ol>
		</li>
		<li value="4"><span>Confidential Information will not include the following information:</span><br>
			<ol start="1" class="list-style-type-lower-alpha">
				<li value="1"><span>Information that is generally known in the industry of the Employer;</span><br></li>
				<li value="2"><span>Information that is now or subsequently becomes generally available to the public through no wrongful act of the Employee;</span><br></li>
				<li value="3"><span>Information rightly in the possession of the Employee prior to the disclosure to the Employee by the Employer;</span><br></li>
				<li value="4"><span>Information that is independently created by the Employee without direct or indirect use of the Confidential Information; or</span><br></li>
				<li value="5"><span>Information that the Employee rightfully obtains from a third party who has the right to transfer or disclose it.</span><br></li>
			</ol>
		</li>
	</ol>
	<li class="lh"><strong><u><span>Obligations of Non-Disclosure</span></u></strong></li>
<li value="5"><span>Except as otherwise provided in this Agreement, the Employee must not disclose the Confidential Information.</span></li>
<li value="6"><span>Except as otherwise provided in this Agreement, the Confidential Information will remain the exclusive property of the Employer and will only be used by the Employee for the Permitted Purpose. The Employee will not use the Confidential Information for any purpose that might be directly or indirectly detrimental to the Employer or any associated affiliates or subsidiaries.</span></li>
<li value="7"><span>The obligations to ensure and prevent the disclosure of the Confidential Information imposed on the Employee in this Agreement and any obligations to provide notice under this Agreement will survive the expiration or termination, as the case may be, of this Agreement and those obligations will last indefinitely.</span></li>
<li value="8"><span>The Employee may disclose any of the Confidential Information:</span>
    <ol start="1" class="list-style-type-lower-alpha">
        <li value="1"><span>to such agents, representatives and advisors of the Employee that have a need to know for the Permitted Purpose provided that:</span>
            <ol start="1" class="list-style-type-lower-roman">
                <li value="1"><span>the Employee has informed such personnel of the confidential nature of the Confidential Information;</span></li>
                <li value="2"><span>such personnel agree to be legally bound to the same burdens of non-disclosure and non-use as the Employee;</span></li>
                <li value="3"><span>the Employee agrees to take all necessary steps to ensure that the terms of this Agreement are not violated by such personnel; and</span></li>
                <li value="4"><span>the Employee agrees to be responsible for and indemnify the Employer for any breach of this Agreement by their personnel.</span></li>
            </ol>
        </li>
        <li value="2"><span>to a third party where the Employer has consented in writing to such disclosure; and</span></li>
        <li value="3"><span>to the extent required by law or by the request or requirement of any judicial, legislative, administrative or other governmental body.</span></li>
    </ol>
</li>
<li class="lh"><strong><u><span>Avoiding Conflict of Opportunities</span></u></strong></li>
<li value="9"><span>It is understood and agreed that any business opportunity relating to or similar to the Employer's current or anticipated business opportunities coming to the attention of the Employee during the Employee's employment is an opportunity belonging to the Employer. Accordingly, the Employee will advise the Employer of the opportunity and cannot pursue the opportunity, directly or indirectly, without the written consent of the Employer.</span></li>
<li value="10"><span>Without the written consent of the Employer, the Employee further agrees not to directly or indirectly, engage or participate in any other business activities which the Employer, in its reasonable discretion, determines to be in conflict with the best interests of the Employer.</span></li>
<li class="lh"><strong><u><span>Ownership and Title</span></u></strong></li>
<li value="11"><span>The Employee acknowledges and agrees that all rights, title and interest in any Confidential Information will remain the exclusive property of the Employer. Accordingly, the Employee specifically agrees and acknowledges that the Employee will have no interest in the Confidential Information, including, without limitation, no interest in know-how, copyright, trade mark or trade names, notwithstanding the fact that the Employee may have created or contributed to the creation of that Confidential Information.</span></li>
<li value="12"><span>The Employee does hereby waive any moral rights that the Employee may have with respect to the Confidential Information.</span></li>
<li value="13"><span>The Confidential Information will not include anything developed or produced by the Employee during the term of this Agreement, including but not limited to intellectual property, process, design, development, creation, research, invention, know-how, trade name, trade mark or copyright that:</span>
    <ol start="1" class="list-style-type-lower-alpha">
        <li value="1"><span>was developed without the use of any equipment, supplies, facility or Confidential Information of the Employer;</span></li>
        <li value="2"><span>was developed entirely on the Employee's own time;</span></li>
        <li value="3"><span>does not relate to the actual business or reasonably anticipated business of the Employer;</span></li>
        <li value="4"><span>does not relate to the actual or demonstrably anticipated processes, research, or development of the Employer; and</span></li>
        <li value="5"><span>does not result from any work performed by the Employee for the Employer.</span></li>
    </ol>
</li>
<li value="14"><span>The Employee agrees to immediately disclose to the Employer all Confidential Information developed in whole or in part by the Employee during the term of the Employment and to assign to the Employer any right, title or interest the Employee may have in the Confidential Information. The Employee agrees to execute any instruments and to do all other things reasonably requested by the Employer (both during and after the term of the Employment) in order to vest more fully in the Employer all ownership rights in those items transferred by the Employee to the Employer.</span></li>
<li class="lh"><strong><u><span>Remedies</span></u></strong></li>
<li value="15"><span>The Employee agrees and acknowledges that the Confidential Information is of a proprietary and confidential nature and that any disclosure of the Confidential Information to a third party in breach of this Agreement cannot be reasonably or adequately compensated for in money damages and would cause irreparable injury to the Employer. Accordingly, the Employee agrees that the Employer is entitled to, in addition to all other rights and remedies available to it at law or in equity, an injunction restraining the Employee and any agents of the Employee, from directly or indirectly committing or engaging in any act restricted by this Agreement in relation to the Confidential Information.</span></li>
<li class="lh"><strong><u><span>Return of Confidential Information</span></u></strong></li>
<li value="16"><span>The Employee agrees that, upon request of the Employer, or in the event that the Employee ceases to require use of the Confidential Information, or upon expiration or termination of this Agreement, or the expiration or termination of the Employment, the Employee will turn over to the Employer all documents, disks or other computer media, or other material in the possession or control of the Employee that:</span>
    <ol start="1" class="list-style-type-lower-alpha">
        <li value="1"><span> may contain or be derived from ideas, concepts, creations, or trade secrets and other proprietary and Confidential Information as defined in this Agreement; or</span></li>
        <li value="2"><span>is connected with or derived from the Employee's services to the Employer.</span></li>
    </ol>
</li>
<li class="lh"><strong><u><span>Notices</span></u></strong></li>
<li value="17"><span>In the event that the Employee is required in a civil, criminal or regulatory proceeding to disclose any part of the Confidential Information, the Employee will give to the Employer prompt written notice of such request so the Employer may seek an appropriate remedy or alternatively to waive the Employee's compliance with the provisions of this Agreement in regards to the request.</span></li>
<li value="18"><span>If the Employee loses or makes unauthorised disclosure of any of the Confidential Information, the Employee will immediately notify the Employer and take all reasonable steps necessary to retrieve the lost or improperly disclosed Confidential Information.</span></li>
<li value="19"><span>Any notices or delivery required in this Agreement will be deemed completed when hand-delivered, delivered by agent, or seven days after being placed in the post, postage prepaid, to the parties at the addresses contained in this Agreement or as the parties may later designate in writing.</span></li>
<li value="20"><span>The addresses for any notice to be delivered to any of the parties to this Agreement are as follows:</span>
    <ol start="1" class="list-style-type-lower-alpha">
        <li value="1"><span>Name: ____________________<br>Address: ____________________________________________________________</span></li>
        <li value="2"><span>Name: ____________________<br>Address: ____________________________________________________________</span></li>
    </ol>
</li>
<li class="lh"><strong><u><span>Representations</span></u></strong></li>
<li value="21"><span>In providing the Confidential Information, the Employer makes no representations, either expressly or impliedly as to its adequacy, sufficiency, completeness, correctness or its lack of defect of any kind, including any patent or trade mark infringement that may result from the use of such information.</span></li>
<li class="lh"><strong><u><span>Termination</span></u></strong></li>
<li value="22"><span>This Agreement will automatically terminate on the date that the Employee's Employment with the Employer terminates or expires, as the case may be. Except as otherwise provided in this Agreement, all rights and obligations under this Agreement will terminate at that time.</span></li>
<li class="lh"><strong><u><span>Assignment</span></u></strong></li>
<li value="23"><span>Except where a party has changed its corporate name or merged with another corporation, this Agreement may not be assigned or otherwise transferred by either party in whole or part without the prior written consent of the other party to this Agreement.</span></li>
<li class="lh"><strong><u><span>Governing Law</span></u></strong></li>
<li value="24"><span>This Agreement will be governed by and construed in accordance with the laws of the jurisdiction where the Employer has its principal office.</span></li>
<li class="lh"><strong><u><span>Entire Agreement</span></u></strong></li>
<li value="25"><span>This Agreement contains the entire understanding between the parties with respect to its subject matter and supersedes all prior or contemporaneous understandings, agreements, representations, and warranties. No modification or amendment to this Agreement will be effective unless made in writing and signed by both parties.</span></li>
                `,
                fields: [
            { section: 'Parties:', id: 'date', label: 'Date', type: 'date' },
            { section: 'Parties:', id: 'year', label: 'Year', type: 'number' },
            { section: 'Parties:', id: 'fname', label: 'First Party:', type: 'text' },
            { section: 'Parties:', id: 'secfname', label: 'Second Party:', type: 'text' }
        ]
            },
            // Add other templates as necessary
          2: {
                template: `
                    <h2>Agreement Template</h2>
                    <p><strong>THIS AGREEMENT</strong> ("Agreement") is made on <span class="preview-date">[date]</span>.</p>
                    <p><strong>PARTY A:</strong> <span class="preview-fname">[fname]</span>.</p>
                    <p><strong>PARTY B:</strong> <span class="preview-secfname">[secfname]</span>.</p>
                    <p>They agree to collaborate on the project titled <span class="preview-project">[project]</span>.</p>
                `,
                fields: [
                    { id: 'date', label: 'Date', type: 'date' },
                    { id: 'project', label: 'Project Name', type: 'text' },
                    { id: 'fname', label: 'Party A Name', type: 'text' },
                    { id: 'secfname', label: 'Party B Name', type: 'text' }
                ]
            },
            3: {
                template: `
                    <h2>Contract Template</h2>
                    <p>This contract is between <span class="preview-fname">[fname]</span> and <span class="preview-secfname">[secfname]</span>.</p>
                    <p>Project: <span class="preview-project">[project]</span>.</p>
                    <p>Signed on: <span class="preview-date">[date]</span>.</p>
                `,
                fields: [
                    { id: 'date', label: 'Date', type: 'date' },
                    { id: 'project', label: 'Project Name', type: 'text' },
                    { id: 'fname', label: 'First Party Name', type: 'text' },
                    { id: 'secfname', label: 'Second Party Name', type: 'text' }
                ]
            }
            
        };

        const loadFields = (templateId) => {
    const template = templates[templateId];
    dynamicFieldsContainer.innerHTML = '';

    let currentSection = null;

    // Render fields dynamically
    template.fields.forEach(field => {
        if (field.section !== currentSection) {
            // Add a section heading if the section changes
            const sectionHeading = document.createElement('h3');
            sectionHeading.textContent = field.section;
            dynamicFieldsContainer.appendChild(sectionHeading);
            currentSection = field.section;
        }

        // Create field container
        const fieldDiv = document.createElement('div');
        fieldDiv.classList.add('form-group');

        // Create label
        const label = document.createElement('label');
        label.setAttribute('for', field.id);
        label.innerHTML = field.label;

        // Create input
        const input = document.createElement('input');
        input.type = field.type;
        input.id = field.id;
        input.addEventListener('input', updatePreview);

        // Append label and input to field container
        fieldDiv.appendChild(label);
        fieldDiv.appendChild(input);

        // Append field container to main container
        dynamicFieldsContainer.appendChild(fieldDiv);
    });
        };

        const updatePreview = () => {
            const selectedTemplateId = templateSelect.value;
            const template = templates[selectedTemplateId];
            let updatedContent = template.template;

            template.fields.forEach(field => {
                const value = document.getElementById(field.id)?.value || '';
                updatedContent = updatedContent.replace(new RegExp(`\\[${field.id}\\]`, 'g'), value);
            });

            document.querySelector('.preview-content').innerHTML = updatedContent;
        };

        window.onload = () => {
            loadFields(1);
            updatePreview();
        };

        templateSelect.addEventListener('change', (e) => {
            const selectedTemplateId = e.target.value;
            loadFields(selectedTemplateId);
            updatePreview();
        });
    </script>

    <script>
        document.getElementById('template').addEventListener('change', function () {
    const selectedOption = this.options[this.selectedIndex].text;
    const headings = document.querySelectorAll('.title-heading');
    
    // Update all headings with the selected option's text
    headings.forEach(heading => {
        heading.textContent = selectedOption;
    });
});

    </script>

</body>

</html>