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


</body>

</html>