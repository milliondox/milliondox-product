<!-- file script start for board folder -->




<!-- board notice script start -->

<script>
    $(document).ready(function () {
        function showLoader() {
            $('.comman_loderr').show();
        }

        function hideLoader() {
            $('.comman_loderr').hide();
        }

        let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

        function fetchBoardNoticeData() {
            $.ajax({
                url: '{{ route('fetch-board-notice-data') }}',
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    console.log('Fetched data:', response);

                    // Update content inside the <span> with id="entries-count-tdsecboard"
                    $('#entries-count-td').text(response.count);

                    console.log($('#entries-count-td').text());

                    // Update content inside the <span> with id="total-size-tdsecboard"
                    $('#total-size-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                    console.log($('#total-size-td').text());
                },
                error: function (xhr, status, error) {
                    console.error('Failed to fetch data:', status, error);
                }
            });
        }

        function refreshTableData() {
            $.ajax({
                url: '{{ route('fetch-board-notice-data') }}',
                type: 'GET',
                success: function (response) {
                    // Assuming 'response' contains updated HTML for table
                    $('#tablerefreshdata').html(response);
                    console.log(response);
                    console.log('Table data refreshed successfully');
                },
                error: function (xhr, status, error) {
                    // Handle errors here
                    console.error('Error:', error);
                }
            });
        }

          $('body').on('click', "#dfgfdgfdgfdg", function() {
        $('#fileUploadForm').on('submit', function(e) {
            e.preventDefault();
            
             if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#dfgfdgfdgfdg'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchBoardNoticeData();
                            refreshTableData();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#board_Notices_pop').modal('hide'); // Hide the modal
                            $('#entries-count-td').text(response.count);
                        $('#total-size-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#fileUploadForm')[0].reset(); // Reset the form
                        $('#fileUploadForm').find('input[type="file"]').each(function () {
                            resetFileInput($(this)); // Reset file inputs
                        });
                        clearSelectedFile(); // Clear selected file div
                        clearBrowserCache();
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchBoardNoticeData();
                        refreshTableData();
                      
                        $('#board_Notices_pop').modal('hide'); // Hide the modal
                        $('#entries-count-td').text(response.count);
                    $('#total-size-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fileUploadForm')[0].reset(); // Reset the form
                    $('#fileUploadForm').find('input[type="file"]').each(function () {
                        resetFileInput($(this)); // Reset file inputs
                    });
                    clearSelectedFile(); // Clear selected file div
                    clearBrowserCache();
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchBoardNoticeData();
                    refreshTableData();
                  
                    $('#board_Notices_pop').modal('hide'); // Hide the modal
                        $('#entries-count-td').text(response.count);
                    $('#total-size-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fileUploadForm')[0].reset(); // Reset the form
                    $('#fileUploadForm').find('input[type="file"]').each(function () {
                        resetFileInput($(this)); // Reset file inputs
                    });
                    clearSelectedFile(); // Clear selected file div
                    clearBrowserCache();
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
        fetchBoardNoticeData();
    });
    
    });
    
</script>
    


     
 <script>
    $(document).ready(function() {
     function fetchBoardFileNoticeData(location) {
        
        $.ajax({
            url: '{{ route('fetch-board-file-notice-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableboard tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                          const createdAt = new Date(file.created_at);

    // Format the date (e.g., 'MM/DD/YYYY')
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                            <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                      {{--      <a class="dropdown-itemm share_nt" >
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst1" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                            <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Unexpected response format:', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }




function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
    
    
    
    
    
    // Use event delegation to handle click on #board_Notices_countt
   
        $('body').on('click', '#board_Notices_countt', function() {
            const location  = $(this).data('location');
            fetchBoardFileNoticeData(location);
        });
    });
$(document).ready(function() {
    $('#moveToDataRoomBtn').on('click', function() {
        // Open the modal
        $('#dataRoomModal').modal('show');

        // Fetch existing data rooms and populate the select dropdown
        $.ajax({
            url: '{{ route("fetch-existing-datarooms") }}',
            method: 'GET',
            success: function(response) {
                // Clear existing options
                $('#dataRoomSelect').empty();

                // Populate the dropdown with fetched data rooms
                response.dataRooms.forEach(function(dataRoom) {
                    $('#dataRoomSelect').append('<option value="' + dataRoom.id + '">' + dataRoom.name + '</option>');
                });
            },
            error: function(error) {
                console.error('Error fetching data rooms:', error);
            }
        });
    });

    // Handle the move files confirmation button click
    $('#confirmMoveBtn').on('click', function() {
        var selectedDataRoomId = $('#dataRoomSelect').val();
        var selectedFileIds = $('#selectedFileIds').val(); // Ensure this value is set correctly

        // Send the AJAX request to move the files
        $.ajax({
            url: '{{ route("move-files-to-dataroom") }}',
            method: 'POST',
            data: {
                file_ids: selectedFileIds,
                dataroom_id: selectedDataRoomId
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Handle success message
                console.log(response.message);
                $('#dataRoomModal').modal('hide'); // Close the modal after successful move
            },
            error: function(error) {
                console.error('Error moving files:', error);
            }
        });
    });
});


 </script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst1', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);
                                
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>

  
<!-- board notice script end -->

<!-- board minbook script start -->



<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchBoardMinBookData() {
        $.ajax({
            url: '{{ route('fetch-board-minbook-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-countminbook-td').text(response.count);

                console.log($('#entries-countminbook-td').text(response.count));

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-sizeminbook-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                console.log($('#total-sizeminbook-td').text((response.totalSize / 1024).toFixed(2) + ' KB'));
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData1() {
        $.ajax({
            url: '{{ route('fetch-board-minbook-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#minsub155", function() {
        $('#fileUploadForm155').on('submit', function(e) {
            e.preventDefault();
            
             if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#minsub155'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchBoardMinBookData();
                            refreshTableData1();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#board_minut_pop').modal('hide'); // Hide the modal
                            $('#entries-countminbook-td').text(response.count);
                            $('#total-sizeminbook-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#fileUploadForm155')[0].reset(); // Reset the form
                                $('#fileUploadForm155').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchBoardMinBookData();
                        refreshTableData1();
                        
                        $('#board_minut_pop').modal('hide'); // Hide the modal
                        $('#entries-countminbook-td').text(response.count);
                        $('#total-sizeminbook-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#fileUploadForm155')[0].reset(); // Reset the form
                                $('#fileUploadForm155').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchBoardMinBookData();
                    refreshTableData1();
                   
                    $('#board_minut_pop').modal('hide'); // Hide the modal
                    $('#entries-countminbook-td').text(response.count);
                    $('#total-sizeminbook-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fileUploadForm155')[0].reset(); // Reset the form
                                $('#fileUploadForm155').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
            fetchBoardMinBookData();
    });
    
        
   




});
</script>

   <script>
$(document).ready(function() {
  
  

  
  
  
  
  function fetchBoardFileMinBookData(location) {
      $.ajax({
          url: '{{ route('fetch-board-file-minbook-data') }}',
          type: 'GET',
          data: { location: location },
          success: function(response) {
              if (response && Array.isArray(response.files)) {
                  const tableBody = $('#filesTableboardminbook tbody');
                  tableBody.empty();

                  response.files.forEach(file => {
                      const fileName = file.file_name.split('/').pop();
                      const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                       const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                      const row = `
                          <tr>
                           <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                              <td>${file.fyear}</td>
                              <td>${file.month}</td>
                              <td>${fileSize}</td>
                              <td>${formattedDate}</td>
                              <td>
                                  <div class="qucik_axec_ain">
                                      <div class="quick_access">
                                    {{--      <a class="dropdown-itemm share_nt">
<svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
</svg>
</a> --}}

<a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
<svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_380_4)">
<path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
<path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
</g>
<defs>
<clipPath id="clip0_380_4">
<rect width="13" height="12" fill="white"/>
</clipPath>
</defs>
</svg>
</a>
       <button type="button" class="delete-button board-file-minbook" id="delbtdtst2" data-unique_tb_id="${file.id}">
                                                          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                  </svg> 
                                                          </button> 
                                                          
                                                          <div class="dropdown">
  <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                   <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
                                      </div>
                                  </div>
                              </td>
                          </tr>
                      `;
                      tableBody.append(row);
                  });
              } else {
                  console.error('Invalid response format', response);
              }
          },
          error: function(xhr, status, error) {
              console.error('Error fetching board file min book data:', error);
          }
      });
  }
  
function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });

    $('body').on('click', '#board_minut_countt', function() {
        const location  = $(this).data('location');
            fetchBoardFileMinBookData(location);
        });

});
// Use event delegation to handle click on #board_Notices_countt
   
      
  
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst2', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>



<!-- board minbook script start -->


<!-- board attandence sheet script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }

 let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }
    // Function to fetch board min book data
    function fetchBoardAttendencesheetData() {
        $.ajax({
            url: '{{ route('fetch-board-as-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-countboardas-td').text(response.count);

                console.log($('#entries-countboardas-td').text(response.count));

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-sizeboardas-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                console.log($('#total-sizeboardas-td').text((response.totalSize / 1024).toFixed(2) + ' KB'));
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData2() {
        $.ajax({
            url: '{{ route('fetch-board-as-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#minsub2", function() {
        $('#fileUploadForm2').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#minsub2'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchBoardAttendencesheetData();
                            refreshTableData2();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#board_atandence_pop').modal('hide'); // Hide the modal
                            $('#entries-countboardas-td').text(response.count);
                            $('#total-sizeboardas-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#fileUploadForm2')[0].reset(); // Reset the form
                                $('#fileUploadForm2').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchBoardAttendencesheetData();
                        refreshTableData2();
                       
                        $('#board_atandence_pop').modal('hide'); // Hide the modal
                        $('#entries-countboardas-td').text(response.count);
                        $('#total-sizeboardas-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#fileUploadForm2')[0].reset(); // Reset the form
                                $('#fileUploadForm2').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchBoardAttendencesheetData();
                    refreshTableData2();
                    
                    $('#board_atandence_pop').modal('hide'); // Hide the modal
                    $('#entries-countboardas-td').text(response.count);
                    $('#total-sizeboardas-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fileUploadForm2')[0].reset(); // Reset the form
                                $('#fileUploadForm2').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
            fetchBoardAttendencesheetData();
    });
    
    


  
});
</script>

   <script>
   $(document).ready(function() {
       function fetchBoardFileAttendencesheetData(location) {
           $.ajax({
               url: '{{ route('fetch-board-file-as-data') }}',
               type: 'GET',
               data: { location: location }, // Pass the location parameter
               success: function(response) {
                   if (response && Array.isArray(response.files)) {
                       const tableBody = $('#filesTableas tbody');
                       tableBody.empty();
   
                       response.files.forEach(file => {
                           const fileName = file.file_name.split('/').pop();
                           const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                                        const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                           const row = `
                               <tr>
                                <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                   <td>${file.fyear}</td>
                                   <td>${file.month}</td>
                                   <td>${fileSize}</td>
                                   <td>${formattedDate}</td>
                                    <td>
                                       <div class="qucik_axec_ain">
                                           <div class="quick_access">
                                          {{--     <a class="dropdown-itemm share_nt">
    <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
    </svg>
    </a> --}}
    
    <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
    <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
    <g clip-path="url(#clip0_380_4)">
    <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
    <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
    </g>
    <defs>
    <clipPath id="clip0_380_4">
    <rect width="13" height="12" fill="white"/>
    </clipPath>
    </defs>
    </svg>
    </a>
            <button type="button" class="delete-button board-as" id="delbtdtst3" data-unique_tb_id="${file.id}">
                                                               <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                         <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                       </svg> 
                                                               </button> 
                                                               
                                                               <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                   <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
                                           </div>
                                       </div>
                                   </td>
                               </tr>
                           `;
                           tableBody.append(row);
                       });
                   } else {
                       console.error('Invalid response format', response);
                   }
               },
               error: function(xhr, status, error) {
                   console.error('Error fetching board file min book data:', error);
               }
           });
       }
   
   
function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
    
     
        $('body').on('click', '#board_atandence_countt', function() {
            const location  = $(this).data('location');
            fetchBoardFileAttendencesheetData(location);
        });
   
   
   });
    
   </script>
  

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst3', function() {
        var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                               
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>


<!-- board attandence sheet script end -->



<!-- board resolution sheet script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchBoardResolutionData() {
        $.ajax({
            url: '{{ route('fetch-board-reso-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-countboardreso-td').text(response.count);

                console.log($('#entries-countboardreso-td').text(response.count));

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-sizeboardreso-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                console.log($('#total-sizeboardreso-td').text((response.totalSize / 1024).toFixed(2) + ' KB'));
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData3() {
        $.ajax({
            url: '{{ route('fetch-board-reso-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#minsub3", function() {
        $('#fileUploadForm3').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#minsub3'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchBoardResolutionData();
                            refreshTableData3();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#board_Resolutions_pop').modal('hide'); // Hide the modal
                            $('#entries-countboardreso-td').text(response.count);
                            $('#total-sizeboardreso-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#fileUploadForm3')[0].reset(); // Reset the form
                                $('#fileUploadForm3').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchBoardResolutionData();
                        refreshTableData3();
                       
                        $('#board_Resolutions_pop').modal('hide'); // Hide the modal
                        $('#entries-countboardreso-td').text(response.count);
                        $('#total-sizeboardreso-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#fileUploadForm3')[0].reset(); // Reset the form
                                $('#fileUploadForm3').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchBoardResolutionData();
                    refreshTableData3();
                   
                    $('#board_Resolutions_pop').modal('hide'); // Hide the modal
                    $('#entries-countboardreso-td').text(response.count);
                    $('#total-sizeboardreso-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fileUploadForm3')[0].reset(); // Reset the form
                                $('#fileUploadForm3').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
      
    fetchBoardResolutionData();
    });
    
   

   

   
});
</script>

<script>
$(document).ready(function() {
    function fetchBoardFileResolutionData(location) {
        $.ajax({
            url: '{{ route('fetch-board-file-reso-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablereso tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                                                        const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                             <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                 <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                           {{-- <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button board-reso" id="delbtdtst4" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                            <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                   <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching board file min book data:', error);
            }
        });
    }




function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
        $('body').on('click', '#board_Resolutions_countt', function() {
            const location  = $(this).data('location');
            fetchBoardFileResolutionData(location);
        });
  
  

});
  // Call fetchBoardFileMinBookData initially when the page loads
  
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst4', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);
                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>


<!-- board resolution sheet script end -->



<!-- book-keeping bank statement script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchBankAccsData() {
        $.ajax({
            url: '{{ route('fetch-bank-accs-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-countbankstatement-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-sizebankstatement-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData4() {
        $.ajax({
            url: '{{ route('fetch-bank-accs-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#bankaccstatementsubmit", function() {
        $('#bankaccstatement').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#bankaccstatementsubmit'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchBankAccsData();
                            refreshTableData4();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#bankaccstatement_pop').modal('hide'); // Hide the modal
                            $('#entries-countbankstatement-td').text(response.count);
                            $('#total-sizebankstatement-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                           $('#bankaccstatement')[0].reset(); // Reset the form
                                $('#bankaccstatement').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchBankAccsData();
                        refreshTableData4();
                       
                        $('#bankaccstatement_pop').modal('hide'); // Hide the modal
                        $('#entries-countbankstatement-td').text(response.count);
                        $('#total-sizebankstatement-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#bankaccstatement')[0].reset(); // Reset the form
                                $('#bankaccstatement').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchBankAccsData();
                    refreshTableData4();
                   
                    $('#bankaccstatement_pop').modal('hide'); // Hide the modal
                    $('#entries-countbankstatement-td').text(response.count);
                    $('#total-sizebankstatement-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#bankaccstatement')[0].reset(); // Reset the form
                                $('#bankaccstatement').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
         // Initial data fetch on page load
    fetchBankAccsData();
    });
    
    
   

   
});
</script>



<script>
$(document).ready(function() {
    function fetchBankFileAccsData(selectedBank = '') {
        $.ajax({
            url: '{{ route('fetch-bank-file-accs-data') }}',
            type: 'GET',
            success: function(response) {
                const tableWrapper = $('.dodododo');
                const khaliclass = $('.khaliclass');
                const tableBody = $('#filesTablebankaccount tbody');

                if (response && Array.isArray(response.files)) {
                    tableBody.empty();

                    // Filter data based on selected bank
                    const filteredFiles = response.files.filter(file => 
                        selectedBank === '' || file.bank_name === selectedBank
                    );

                    if (filteredFiles.length === 0 && selectedBank) {
                        // Show SweetAlert2 message
                        Swal.fire({
                            icon: 'info',
                            title: 'No Data Available',
                            text: 'No data available for the selected bank: ' + selectedBank
                        });

                        // Show message inside the table body
                        tableBody.html('<tr><td colspan="7" class="text-center">No data available for the selected bank.</td></tr>');
                        tableWrapper.hide(); // Hide the table wrapper div
                        khaliclass.show(); // Show the khaliclass div
                    } else {
                        // Append filtered data to the table
                        filteredFiles.forEach(file => {
                            const fileName = file.file_name.split('/').pop();
                            const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                                                                           const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                            const row = `
                                <tr>
                                 <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                    <td>${file.bank_name}</td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                    <td>${file.fyear}</td>
                                    <td>${file.month}</td>
                                    <td>${fileSize}</td>
                                    <td>${formattedDate}</td>
                                    <td>
                                        <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                           {{-- <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button bank-acc-statment" id="delbtdtst5" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                            <div class="dropdown">
                <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                   <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
                                        </div>
                                    </div>
                                </tr>
                            `;
                            tableBody.append(row);
                        });
                        tableWrapper.show(); // Show the table wrapper div
                        khaliclass.hide(); // Hide the khaliclass div
                    }
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching bank file account data:', error);
            }
        });
    }

    // Initial fetch of data
    fetchBankFileAccsData($('.choose_bank').val());
    
  function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });

    // Event listener for bank selection
    $('body').on('change', '.choose_bank', function() {
        const selectedBank = $(this).val();
        fetchBankFileAccsData(selectedBank);
    });
});

</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst5', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>

<!-- book-keeping bank statement script end -->

<!-- board script end -->




<!-- Secretarial / Annual General Meeting notice script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchMeetNoticeData() {
        $.ajax({
            url: '{{ route('fetch-meet-notice-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-genmeet-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-genmeet-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData5() {
        $.ajax({
            url: '{{ route('fetch-meet-notice-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#meet", function() {
        $('#fileUploadFormmeet').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#meet'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchMeetNoticeData();
                            refreshTableData5();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#anual_Notices_pop').modal('hide'); // Hide the modal
                            $('#entries-count-genmeet-td').text(response.count);
                            $('#total-size-genmeet-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#fileUploadFormmeet')[0].reset(); // Reset the form
                                $('#fileUploadFormmeet').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchMeetNoticeData();
                            refreshTableData5();
                           
                            $('#anual_Notices_pop').modal('hide'); // Hide the modal
                            $('#entries-count-genmeet-td').text(response.count);
                            $('#total-size-genmeet-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#fileUploadFormmeet')[0].reset(); // Reset the form
                                $('#fileUploadFormmeet').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchMeetNoticeData();
                            refreshTableData5();
                           
                            $('#anual_Notices_pop').modal('hide'); // Hide the modal
                            $('#entries-count-genmeet-td').text(response.count);
                            $('#total-size-genmeet-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fileUploadFormmeet')[0].reset(); // Reset the form
                                $('#fileUploadFormmeet').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
         // Initial data fetch on page load
    fetchMeetNoticeData();
    });
    
    
    
    

   

 
});
</script>


     <script>
$(document).ready(function() {
    function fetchMeetFileNoticeData(location) {
        $.ajax({
            url: '{{ route('fetch-meet-file-notice-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableasnomeet tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                                                                                             const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                                <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                 <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                          {{--  <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button meet-file-notice-datas" id="delbtdtst6" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                                             <div class="dropdown">
                <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                   <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching board file min book data:', error);
            }
        });
    }

function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
    
    

 $('body').on('click', '#anual_Notices_countt', function() {
    const location  = $(this).data('location');
            fetchMeetFileNoticeData(location);
        });
    fetchMeetFileNoticeData(location);

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst6', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>

<!-- Secretarial / Annual General Meeting notice script end -->



<!-- Secretarial / Annual General Meeting Minute Book script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchMeetMinBookData() {
        $.ajax({
            url: '{{ route('fetch-meet-minbook-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-genmeet1-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-genmeet1-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData6() {
        $.ajax({
            url: '{{ route('fetch-meet-minbook-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#meet1", function() {
        $('#fileUploadFormmeet1').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#meet1'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchMeetMinBookData();
                            refreshTableData6();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#anual_minut_pop').modal('hide'); // Hide the modal
                            $('#entries-count-genmeet1-td').text(response.count);
                            $('#total-size-genmeet1-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#fileUploadFormmeet1')[0].reset(); // Reset the form
                                $('#fileUploadFormmeet1').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchMeetMinBookData();
                            refreshTableData6();
                            
                            $('#anual_minut_pop').modal('hide'); // Hide the modal
                            $('#entries-count-genmeet1-td').text(response.count);
                            $('#total-size-genmeet1-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#fileUploadFormmeet1')[0].reset(); // Reset the form
                                $('#fileUploadFormmeet1').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchMeetMinBookData();
                            refreshTableData6();
                            
                            $('#anual_minut_pop').modal('hide'); // Hide the modal
                            $('#entries-count-genmeet1-td').text(response.count);
                            $('#total-size-genmeet1-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fileUploadFormmeet1')[0].reset(); // Reset the form
                                $('#fileUploadFormmeet1').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
        // Initial data fetch on page load
    fetchMeetMinBookData();
    });
    
    
     

    

});
</script>


     <script>
$(document).ready(function() {
    function fetchMeetFileMinBookData(location) {
        $.ajax({
            url: '{{ route('fetch-meet-file-minbook-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablemeetminbook tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                                                                                                            const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                                <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                 <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                          {{--  <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button meet-file-minbook-datas" id="delbtdtst7" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                             <div class="dropdown">
                <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                   <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching board file min book data:', error);
            }
        });
    }

function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
    
    
$('body').on('click', '#anual_minut_countt', function() {
    const location  = $(this).data('location');
            fetchMeetFileMinBookData(location);
        });
    fetchMeetFileMinBookData(location);
    

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst7', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>


<!-- Secretarial / Annual General Meeting Minute Book script end -->



<!-- Secretarial / Annual General Meeting Attendance sheet script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchMeetASData() {
        $.ajax({
            url: '{{ route('fetch-meet-as-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-genmeet2-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-genmeet2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData7() {
        $.ajax({
            url: '{{ route('fetch-meet-as-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#meet2", function() {
        $('#fileUploadFormmeet2').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#meet2'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchMeetASData();
                            refreshTableData7();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#anual_atandence_pop').modal('hide'); // Hide the modal
                            $('#entries-count-genmeet2-td').text(response.count);
                            $('#total-size-genmeet2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#fileUploadFormmeet2')[0].reset(); // Reset the form
                                $('#fileUploadFormmeet2').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchMeetASData();
                            refreshTableData7();
                           
                            $('#anual_atandence_pop').modal('hide'); // Hide the modal
                            $('#entries-count-genmeet2-td').text(response.count);
                            $('#total-size-genmeet2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#fileUploadFormmeet2')[0].reset(); // Reset the form
                                $('#fileUploadFormmeet2').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchMeetASData();
                            refreshTableData7();
                            
                            $('#anual_atandence_pop').modal('hide'); // Hide the modal
                            $('#entries-count-genmeet2-td').text(response.count);
                            $('#total-size-genmeet2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fileUploadFormmeet2')[0].reset(); // Reset the form
                                $('#fileUploadFormmeet2').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
        
        // Initial data fetch on page load
    fetchMeetASData();
    });
    
    

    

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchMeetFileASData(location) {
        $.ajax({
            url: '{{ route('fetch-meet-file-as-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablemeet2 tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                        
                                                                                                                               const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
    
    
                        const row = `
                            <tr>
                                <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                         {{--   <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button meet-file-as-datas" id="delbtdtst8" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                            <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                   <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
        
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching board file min book data:', error);
            }
        });
    }

function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
    
    

    $('body').on('click', '#anual_atandence_countt', function() {
        const location  = $(this).data('location');
            fetchMeetFileASData(location);
        });
    fetchMeetFileASData(location);

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst8', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>

<!-- Secretarial / Annual General Meeting Attendance sheet script end -->


<!-- Secretarial / Annual General Meeting Resolutions script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchMeetRESOData() {
        $.ajax({
            url: '{{ route('fetch-meet-reso-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-genmeet3-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-genmeet3-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData8() {
        $.ajax({
            url: '{{ route('fetch-meet-reso-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#meet3", function() {
        $('#fileUploadFormmeet3').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#meet3'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchMeetRESOData();
                            refreshTableData8();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#anual_Resolutions_pop').modal('hide'); // Hide the modal
                            $('#entries-count-genmeet3-td').text(response.count);
                            $('#total-size-genmeet3-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#fileUploadFormmeet3')[0].reset(); // Reset the form
                                $('#fileUploadFormmeet3').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchMeetRESOData();
                            refreshTableData8();
                            
                            $('#anual_Resolutions_pop').modal('hide'); // Hide the modal
                            $('#entries-count-genmeet3-td').text(response.count);
                            $('#total-size-genmeet3-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#fileUploadFormmeet3')[0].reset(); // Reset the form
                                $('#fileUploadFormmeet3').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchMeetRESOData();
                            refreshTableData8();
                             
                            $('#anual_Resolutions_pop').modal('hide'); // Hide the modal
                            $('#entries-count-genmeet3-td').text(response.count);
                            $('#total-size-genmeet3-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fileUploadFormmeet3')[0].reset(); // Reset the form
                                $('#fileUploadFormmeet3').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
        // Initial data fetch on page load
    fetchMeetRESOData();
    });
    
     

    

   
});
</script>


     <script>
$(document).ready(function() {
    function fetchMeetFileRESOData(location) {
        $.ajax({
            url: '{{ route('fetch-meet-file-reso-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablemeet3 tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                                                                                                                                                 const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                                <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                       {{--     <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button meet-file-reso-datas" id="delbtdtst9" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                            <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                   <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
        
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching board file min book data:', error);
            }
        });
    }

 function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });

   $('body').on('click', '#anual_Resolutions_countt', function() {
    const location  = $(this).data('location');
            fetchMeetFileRESOData(location);
        });
    fetchMeetFileRESOData(location);

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst9', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>

<!-- Secretarial / Annual General Meeting Resolutions script end -->



<!-- Secretarial / Extra Ordinary General Meeting Notices script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchOrderNoticeData() {
        $.ajax({
            url: '{{ route('fetch-order-notice-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-order-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-order-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData9() {
        $.ajax({
            url: '{{ route('fetch-order-notice-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#order", function() {
        $('#fileUploadFormorder').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#order'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchOrderNoticeData();
                            refreshTableData9();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#ordinary_Notices_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order-td').text(response.count);
                            $('#total-size-order-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#fileUploadFormorder')[0].reset(); // Reset the form
                                $('#fileUploadFormorder').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchOrderNoticeData();
                            refreshTableData9();
                           
                            $('#ordinary_Notices_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order-td').text(response.count);
                            $('#total-size-order-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#fileUploadFormorder')[0].reset(); // Reset the form
                                $('#fileUploadFormorder').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchOrderNoticeData();
                            refreshTableData9();
                             
                            $('#ordinary_Notices_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order-td').text(response.count);
                            $('#total-size-order-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fileUploadFormorder')[0].reset(); // Reset the form
                                $('#fileUploadFormorder').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
         // Initial data fetch on page load
    fetchOrderNoticeData();
    });
    
     

   

  
});
</script>


     <script>
$(document).ready(function() {
    function fetchOrderFileNoticeData(location) {
        $.ajax({
            url: '{{ route('fetch-order-file-notice-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableorder tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                                                                                                                                                                       const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                                <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                       {{--     <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button order-file-notice-data" id="delbtdtst10" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                             <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
        
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching board file min book data:', error);
            }
        });
    }
    
 function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
    
    
    
 $('body').on('click', '#ordinary_Notices_countt', function() {
    const location  = $(this).data('location');
            fetchOrderFileNoticeData(location);
        });
    fetchOrderFileNoticeData(location);

    

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst10', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>


<!-- Secretarial / Extra Ordinary General Meeting Notices script end -->


<!-- Secretarial / Extra Ordinary General Meeting Minute Book script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchOrderMinBookData() {
        $.ajax({
            url: '{{ route('fetch-order-minbook-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-order1-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-order1-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData10() {
        $.ajax({
            url: '{{ route('fetch-order-minbook-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#order1", function() {
        $('#fileUploadFormorder1').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#order1'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchOrderMinBookData();
                            refreshTableData10();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#ordinary_minut_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order1-td').text(response.count);
                            $('#total-size-order1-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#fileUploadFormorder1')[0].reset(); // Reset the form
                                $('#fileUploadFormorder1').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchOrderMinBookData();
                            refreshTableData10();
                             
                            $('#ordinary_minut_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order1-td').text(response.count);
                            $('#total-size-order1-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#fileUploadFormorder1')[0].reset(); // Reset the form
                                $('#fileUploadFormorder1').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchOrderMinBookData();
                            refreshTableData10();
                            
                            $('#ordinary_minut_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order1-td').text(response.count);
                            $('#total-size-order1-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fileUploadFormorder1')[0].reset(); // Reset the form
                                $('#fileUploadFormorder1').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
        
    // Initial data fetch on page load
    fetchOrderMinBookData();
    });
    
    
      



    
});
</script>


     <script>
$(document).ready(function() {
    function fetchOrderFileMinBookData(location) {
        $.ajax({
            url: '{{ route('fetch-order-file-minbook-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableorder1 tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                         const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                                <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                         {{--   <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button order-file-minbook-data" id="delbtdtst11" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                             <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
        
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching board file min book data:', error);
            }
        });
    }

function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
    
    
    
    
    $('body').on('click', '#ordinary_minut_countt', function() {
        const location  = $(this).data('location');
            fetchOrderFileMinBookData(location);
        });
    fetchOrderFileMinBookData(location);

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst11', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>

<!-- Secretarial / Extra Ordinary General Meeting Minute Book script end -->



<!-- Secretarial / Extra Ordinary General Meeting Attendance sheet script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchOrderAttendData() {
        $.ajax({
            url: '{{ route('fetch-order-attend-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-order2-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-order2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData11() {
        $.ajax({
            url: '{{ route('fetch-order-attend-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#order33", function() {
        $('#fileUploadFormorder33').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#order33'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchOrderAttendData();
                            refreshTableData11();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#ordinary_atandence_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order2-td').text(response.count);
                            $('#total-size-order2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#fileUploadFormorder33')[0].reset(); // Reset the form
                                $('#fileUploadFormorder33').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchOrderAttendData();
                            refreshTableData11();
                            
                            $('#ordinary_atandence_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order2-td').text(response.count);
                            $('#total-size-order2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#fileUploadFormorder33')[0].reset(); // Reset the form
                                $('#fileUploadFormorder33').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchOrderAttendData();
                            refreshTableData11();
                            
                            $('#ordinary_atandence_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order2-td').text(response.count);
                            $('#total-size-order2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fileUploadFormorder33')[0].reset(); // Reset the form
                                $('#fileUploadFormorder33').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
          // Initial data fetch on page load
    fetchOrderAttendData();
    });
    
    
     

  

   
});
</script>


     <script>
$(document).ready(function() {
    function fetchOrderFileAttendData(location) {
        $.ajax({
            url: '{{ route('fetch-order-file-attend-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableorder3 tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                        const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                                <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                        {{--    <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button order-file-attend-data" id="delbtdtst12" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                             <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
        
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching board file min book data:', error);
            }
        });
    }
    
function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
    
    
    
    $('body').on('click', '#ordinary_atandence_countt', function() {
        const location  = $(this).data('location');
            fetchOrderFileAttendData(location);
        });
    fetchOrderFileAttendData(location);

 

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst12', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>


<!-- Secretarial / Extra Ordinary General Meeting Attendance sheet script end -->

<!-- Secretarial / Extra Ordinary General Meeting Resolutions script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchOrderRESOData() {
        $.ajax({
            url: '{{ route('fetch-order-reso-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-order31-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-order31-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData121() {
        $.ajax({
            url: '{{ route('fetch-order-reso-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#order31", function() {
        $('#fileUploadFormorder31').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#order31'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchOrderRESOData();
                            refreshTableData121();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#ordinary_Resolutions_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order31-td').text(response.count);
                            $('#total-size-order31-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#fileUploadFormorder31')[0].reset(); // Reset the form
                                $('#fileUploadFormorder31').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchOrderRESOData();
                            refreshTableData121();
                             
                            $('#ordinary_Resolutions_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order31-td').text(response.count);
                            $('#total-size-order31-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#fileUploadFormorder31')[0].reset(); // Reset the form
                                $('#fileUploadFormorder31').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchOrderRESOData();
                            refreshTableData121();
                            
                            $('#ordinary_Resolutions_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order31-td').text(response.count);
                            $('#total-size-order31-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fileUploadFormorder31')[0].reset(); // Reset the form
                                $('#fileUploadFormorder31').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
          // Initial data fetch on page load
    fetchOrderRESOData();
    });
    
    
     

  

   
});
</script>


     <script>
$(document).ready(function() {
    function fetchOrderFileRESOData(location) {
        $.ajax({
            url: '{{ route('fetch-order-file-reso-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableorder41 tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                                         const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                                <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                       {{--     <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button order-file-reso-data" id="delbtdtst13" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                            <div class="dropdown">
                <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
        
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching board file min book data:', error);
            }
        });
    }
    
    
    
  function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
    
    
    $('body').on('click', '#ordinary_Resolutions_countt', function() {
        const location  = $(this).data('location');
            fetchOrderFileRESOData(location);
        });
    fetchOrderFileRESOData(location);

   

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst13', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>


<!-- Secretarial / Extra Ordinary General Meeting Resolutions script end -->




<!-- Secretarial / Incorporation RUN Form (Reserve Unique Name) script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchInnerRunsData() {
        $.ajax({
            url: '{{ route('fetch-inner-runs-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-order30-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-order30-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData13() {
        $.ajax({
            url: '{{ route('fetch-inner-runs-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#inner1", function() {
        $('#fileUploadForminner').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#inner1'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchInnerRunsData();
                            refreshTableData13();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#inco_run_form_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order30-td').text(response.count);
                            $('#total-size-order30-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#fileUploadForminner')[0].reset(); // Reset the form
                                $('#fileUploadForminner').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchInnerRunsData();
                            refreshTableData13();
                             
                            $('#inco_run_form_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order30-td').text(response.count);
                            $('#total-size-order30-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#fileUploadForminner')[0].reset(); // Reset the form
                                $('#fileUploadForminner').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchInnerRunsData();
                            refreshTableData13();
                             
                            $('#inco_run_form_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order30-td').text(response.count);
                            $('#total-size-order30-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fileUploadForminner')[0].reset(); // Reset the form
                                $('#fileUploadForminner').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
         // Initial data fetch on page load
    fetchInnerRunsData();
    });

   

    // Optionally, fetch data periodically using setInterval
  
});
</script>


     <script>
$(document).ready(function() {
    function fetchInnerFileRunsData(location) {
        $.ajax({
            url: '{{ route('fetch-inner-file-runs-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableinner1 tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                        const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                                <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                               <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                       {{--     <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst14" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                               <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
        
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching board file min book data:', error);
            }
        });
    }

function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
    // Fetch data every 5 seconds
    $('body').on('click', '#inco_run_form_countt', function() {
        const location  = $(this).data('location');
            fetchInnerFileRunsData(location);
        });
    fetchInnerFileRunsData(location);

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst14', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>

<!-- Secretarial / Incorporation RUN Form (Reserve Unique Name) script end -->



<!-- Secretarial / Incorporation INC-9 (Declaration of Subscribers and First Directors) script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchInnerINC9Data() {
        $.ajax({
            url: '{{ route('fetch-inner-inc9-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-order32-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-order32-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData14() {
        $.ajax({
            url: '{{ route('fetch-inner-inc9-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#innerinc9", function() {
        $('#fileUploadForminner2').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#innerinc9'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchInnerINC9Data();
                            refreshTableData14();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#inco_INC_9_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order32-td').text(response.count);
                            $('#total-size-order32-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#fileUploadForminner2')[0].reset(); // Reset the form
                                $('#fileUploadForminner2').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchInnerINC9Data();
                            refreshTableData14();
                            
                            $('#inco_INC_9_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order32-td').text(response.count);
                            $('#total-size-order32-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#fileUploadForminner2')[0].reset(); // Reset the form
                                $('#fileUploadForminner2').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchInnerINC9Data();
                            refreshTableData14();
                             
                            $('#inco_INC_9_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order32-td').text(response.count);
                            $('#total-size-order32-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fileUploadForminner2')[0].reset(); // Reset the form
                                $('#fileUploadForminner2').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
          // Initial data fetch on page load
    fetchInnerINC9Data();
    });

  

});
</script>


     <script>
$(document).ready(function() {
    function fetchInnerFile9Data(location) {
        $.ajax({
            url: '{{ route('fetch-inner-file-inc9-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableinc9 tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                        const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                                <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                        {{--    <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst15" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                              <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
        
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching board file min book data:', error);
            }
        });
    }

 function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
    
    
   
$('body').on('click', '#inco_INC_9_countt', function() {
    const location  = $(this).data('location');
            fetchInnerFile9Data(location);
        });
    fetchInnerFile9Data(location);

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst15', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>

<!-- Secretarial / Incorporation INC-9 (Declaration of Subscribers and First Directors) script end -->



<!-- Secretarial / Incorporation SPICe+Part B (Simplified Proforma for Incorporating Company Electronically) script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchInnerspiceData() {
        $.ajax({
            url: '{{ route('fetch-inner-spice-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-order33-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-order33-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData15() {
        $.ajax({
            url: '{{ route('fetch-inner-spice-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#innerspice", function() {
        $('#fileUploadForminner3').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#innerspice'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchInnerspiceData();
                            refreshTableData15();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#inco_SPICe_Part_B_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order33-td').text(response.count);
                            $('#total-size-order33-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#fileUploadForminner3')[0].reset(); // Reset the form
                                $('#fileUploadForminner3').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchInnerspiceData();
                            refreshTableData15();
                            
                            $('#inco_SPICe_Part_B_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order33-td').text(response.count);
                            $('#total-size-order33-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#fileUploadForminner3')[0].reset(); // Reset the form
                                $('#fileUploadForminner3').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchInnerspiceData();
                            refreshTableData15();
                            
                            $('#inco_SPICe_Part_B_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order33-td').text(response.count);
                            $('#total-size-order33-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fileUploadForminner3')[0].reset(); // Reset the form
                                $('#fileUploadForminner3').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
        // Initial data fetch on page load
    fetchInnerspiceData();
    });

    

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchInnerFilespiceData(location) {
        $.ajax({
            url: '{{ route('fetch-inner-file-spice-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablespiceinner tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                        const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                                <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                         {{--   <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst16" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                              <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
        
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching board file min book data:', error);
            }
        });
    }

function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
    
    

   $('body').on('click', '#inco_SPICe_Part_B_countt', function() {
    const location  = $(this).data('location');
            fetchInnerFilespiceData(location);
        });
    fetchInnerFilespiceData(location);

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst16', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>


<!-- Secretarial / Incorporation SPICe+Part B (Simplified Proforma for Incorporating Company Electronically) script end -->



<!-- Secretarial / Incorporation INC-33 SPICe MoA (e-Momorandum of Association)
script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchInnerINC33Data() {
        $.ajax({
            url: '{{ route('fetch-inner-inc33-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-order34-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-order34-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData16() {
        $.ajax({
            url: '{{ route('fetch-inner-inc33-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#inc33", function() {
        $('#fileUploadForminc33').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#inc33'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchInnerINC33Data();
                            refreshTableData16();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#inco_INC_33_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order34-td').text(response.count);
                            $('#total-size-order34-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#fileUploadForminc33')[0].reset(); // Reset the form
                                $('#fileUploadForminc33').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchInnerINC33Data();
                            refreshTableData16();
                            
                            $('#inco_INC_33_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order34-td').text(response.count);
                            $('#total-size-order34-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#fileUploadForminc33')[0].reset(); // Reset the form
                                $('#fileUploadForminc33').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchInnerINC33Data();
                            refreshTableData16();
                             
                            $('#inco_INC_33_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order34-td').text(response.count);
                            $('#total-size-order34-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fileUploadForminc33')[0].reset(); // Reset the form
                                $('#fileUploadForminc33').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
        // Initial data fetch on page load
    fetchInnerINC33Data();
    });

    

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchInnerFileINC33Data(location) {
        $.ajax({
            url: '{{ route('fetch-inner-file-inc33-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableinnerinc331 tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                        const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                                <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                          {{--  <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst17" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                            <div class="dropdown">
                <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
        
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching board file min book data:', error);
            }
        });
    }

  function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
    
    
   
$('body').on('click', '#inco_INC_33_countt', function() {
    const location  = $(this).data('location');
            fetchInnerFileINC33Data(location);
        });
    fetchInnerFileINC33Data(location);
    

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst17', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>


<!-- Secretarial / Incorporation INC-33 SPICe MoA (e-Momorandum of Association) script end -->


<!-- Secretarial / Incorporation INC-34 SPICe MoA (e-Articles of Association)
script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchInnerINC34Data() {
        $.ajax({
            url: '{{ route('fetch-inner-inc34-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-order35t-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-order35t-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData17() {
        $.ajax({
            url: '{{ route('fetch-inner-inc34-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#inc34", function() {
        $('#fileUploadForminnerinc34').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#inc34'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchInnerINC34Data();
                            refreshTableData17();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#inco_INC_34_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order35t-td').text(response.count);
                            $('#total-size-order35t-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#fileUploadForminnerinc34')[0].reset(); // Reset the form
                                $('#fileUploadForminnerinc34').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchInnerINC34Data();
                            refreshTableData17();
                             
                            $('#inco_INC_34_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order35t-td').text(response.count);
                            $('#total-size-order35t-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#fileUploadForminnerinc34')[0].reset(); // Reset the form
                                $('#fileUploadForminnerinc34').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchInnerINC34Data();
                            refreshTableData17();
                             
                            $('#inco_INC_34_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order35t-td').text(response.count);
                            $('#total-size-order35t-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fileUploadForminnerinc34')[0].reset(); // Reset the form
                                $('#fileUploadForminnerinc34').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
         // Initial data fetch on page load
    fetchInnerINC34Data();
    });

   

   
});
</script>


     <script>
$(document).ready(function() {
    function fetchInnerFileINC34Data(location) {
        $.ajax({
            url: '{{ route('fetch-inner-file-inc34-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableinnerinc334st tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                        const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                                <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                         {{--   <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst18" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                             <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
        
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching board file min book data:', error);
            }
        });
    }

function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
    
    
 

    $('body').on('click', '#inco_INC_34_countt', function() {
        const location  = $(this).data('location');
            fetchInnerFileINC34Data(location);
        });
    fetchInnerFileINC34Data(location);

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst18', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>


<!-- Secretarial / Incorporation INC-34 SPICe MoA (e-Articles of Association) script end -->

<!-- Secretarial / Incorporation INC-35 AGILE-PRO-s
script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchInnerINC35Data() {
        $.ajax({
            url: '{{ route('fetch-inner-inc35-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-order36t-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-order36t-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData18() {
        $.ajax({
            url: '{{ route('fetch-inner-inc35-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#inc35", function() {
        $('#fileUploadForminnerinc35').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#inc35'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchInnerINC35Data();
                            refreshTableData18();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#inco_INC_35_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order36t-td').text(response.count);
                            $('#total-size-order36t-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#fileUploadForminnerinc35')[0].reset(); // Reset the form
                                $('#fileUploadForminnerinc35').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchInnerINC35Data();
                            refreshTableData18();
                             
                            $('#inco_INC_35_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order36t-td').text(response.count);
                            $('#total-size-order36t-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#fileUploadForminnerinc35')[0].reset(); // Reset the form
                                $('#fileUploadForminnerinc35').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchInnerINC35Data();
                            refreshTableData18();
                             
                            $('#inco_INC_35_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order36t-td').text(response.count);
                            $('#total-size-order36t-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fileUploadForminnerinc35')[0].reset(); // Reset the form
                                $('#fileUploadForminnerinc35').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
         // Initial data fetch on page load
    fetchInnerINC35Data();
    });

   

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchInnerFileINC35Data(location) {
        $.ajax({
            url: '{{ route('fetch-inner-file-inc35-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableinnerinc335st tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                        const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                                <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                        {{--    <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst19" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                             <div class="dropdown">
                <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
        
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching board file min book data:', error);
            }
        });
    }

function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
    
  

    $('body').on('click', '#inco_INC_35_countt', function() {
        const location  = $(this).data('location');
            fetchInnerFileINC35Data(location);
        });
    fetchInnerFileINC35Data(location);

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst19', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>


<!-- Secretarial / Incorporation INC-35 AGILE-PRO-s script end -->

<!-- Secretarial / Incorporation INC-22 (Notice of situation or change of situation of registered office)
script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchInnerINC22Data() {
        $.ajax({
            url: '{{ route('fetch-inner-inc22-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-order37t-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-order37t-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData19() {
        $.ajax({
            url: '{{ route('fetch-inner-inc22-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#inc22", function() {
        $('#fileUploadForminnerinc22').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#inc22'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchInnerINC22Data();
                            refreshTableData19();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#inco_INC_22_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order37t-td').text(response.count);
                            $('#total-size-order37t-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#fileUploadForminnerinc22')[0].reset(); // Reset the form
                                $('#fileUploadForminnerinc22').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchInnerINC22Data();
                            refreshTableData19();
                             
                            $('#inco_INC_22_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order37t-td').text(response.count);
                            $('#total-size-order37t-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#fileUploadForminnerinc22')[0].reset(); // Reset the form
                                $('#fileUploadForminnerinc22').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchInnerINC22Data();
                            refreshTableData19();
                            
                            $('#inco_INC_22_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order37t-td').text(response.count);
                            $('#total-size-order37t-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fileUploadForminnerinc22')[0].reset(); // Reset the form
                                $('#fileUploadForminnerinc22').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
        
          // Initial data fetch on page load
    fetchInnerINC22Data();
    });

  

});
</script>


     <script>
$(document).ready(function() {
    function fetchInnerFileINC22Data(location) {
        $.ajax({
            url: '{{ route('fetch-inner-file-inc22-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableLegend tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                        const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                                <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                          {{--  <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst20" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                             <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
        
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching board file min book data:', error);
            }
        });
    }

function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
   

    $('body').on('click', '#inco_INC_22_countt', function() {
        const location  = $(this).data('location');
            fetchInnerFileINC22Data(location);
        });
    fetchInnerFileINC22Data(location);

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst20', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>

<!-- Secretarial / Incorporation INC-22 (Notice of situation or change of situation of registered office) script end -->



<!-- Secretarial / Incorporation INC-20A (Commencement of Business)
script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchInnerINC20AData() {
        $.ajax({
            url: '{{ route('fetch-inner-inc20a-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-order38t-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-order38t-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData20() {
        $.ajax({
            url: '{{ route('fetch-inner-inc20a-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#inc20a", function() {
        $('#fileUploadForminc20a').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#inc20a'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchInnerINC20AData();
                            refreshTableData20();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#inco_INC_20A_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order38t-td').text(response.count);
                            $('#total-size-order38t-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#fileUploadForminc20a')[0].reset(); // Reset the form
                                $('#fileUploadForminc20a').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchInnerINC20AData();
                            refreshTableData20();
                            
                            $('#inco_INC_20A_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order38t-td').text(response.count);
                            $('#total-size-order38t-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#fileUploadForminc20a')[0].reset(); // Reset the form
                                $('#fileUploadForminc20a').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchInnerINC20AData();
                            refreshTableData20();
                            
                            $('#inco_INC_20A_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order38t-td').text(response.count);
                            $('#total-size-order38t-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fileUploadForminc20a')[0].reset(); // Reset the form
                                $('#fileUploadForminc20a').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
          // Initial data fetch on page load
    fetchInnerINC20AData();
    });

  

   
});
</script>


     <script>
$(document).ready(function() {
    function fetchInnerFileINC20AData(location) {
        $.ajax({
            url: '{{ route('fetch-inner-file-inc20a-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableinc20at tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                        const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                                <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                
                               <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                       {{--     <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst21" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                            <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
        
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching board file min book data:', error);
            }
        });
    }

  function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
    
    
   
$('body').on('click', '#inco_INC_20A_countt', function() {
    const location  = $(this).data('location');
            fetchInnerFileINC20AData(location);
        });
    fetchInnerFileINC20AData(location);
   

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst21', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>

<!-- Secretarial / Incorporation INC-20A (Commencement of Business) script end -->


<!-- Secretarial / Annual Filings AoC-4 (Annual Filing Statement Form)
script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchAnnAoc4AfsAData() {
        $.ajax({
            url: '{{ route('fetch-ann-aoc4afs-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-order399t-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-order399t-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData21() {
        $.ajax({
            url: '{{ route('fetch-ann-aoc4afs-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#ann1", function() {
        $('#fileUploadFormann1').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#ann1'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchAnnAoc4AfsAData();
                            refreshTableData21();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#filling_AoC_4_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order399t-td').text(response.count);
                            $('#total-size-order399t-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#fileUploadFormann1')[0].reset(); // Reset the form
                                $('#fileUploadFormann1').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchAnnAoc4AfsAData();
                            refreshTableData21();
                            
                            $('#filling_AoC_4_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order399t-td').text(response.count);
                            $('#total-size-order399t-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#fileUploadFormann1')[0].reset(); // Reset the form
                                $('#fileUploadFormann1').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchAnnAoc4AfsAData();
                            refreshTableData21();
                            
                            $('#filling_AoC_4_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order39t-td').text(response.count);
                            $('#total-size-order39t-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fileUploadFormann1')[0].reset(); // Reset the form
                                $('#fileUploadFormann1').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
        // Initial data fetch on page load
    fetchAnnAoc4AfsAData();
    });

    

   
});
</script>


     <script>
$(document).ready(function() {
    function fetchAnnFileAoc4AfsData(location) {
        $.ajax({
            url: '{{ route('fetch-ann-file-aoc4afs-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableann1 tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                        const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                                <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                        {{--    <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst22" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                              <div class="dropdown">
                <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
        
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching board file min book data:', error);
            }
        });
    }

function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
    
    
$('body').on('click', '#filling_AoC_4_countt', function() {
    const location  = $(this).data('location');
            fetchAnnFileAoc4AfsData(location);
        });
    fetchAnnFileAoc4AfsData(location);
   

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst22', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>

<!-- Secretarial / Annual Filings AoC-4 (Annual Filing Statement Form) script end -->


<!-- Secretarial / Annual Filings AoC-4 (CFS) (Form for filing consolidated financial statements and other documents with the Registrar)
script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchAnnAoc4CfsAData() {
        $.ajax({
            url: '{{ route('fetch-ann-aoc4cfs-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-order400tt-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-order400tt-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData22() {
        $.ajax({
            url: '{{ route('fetch-ann-aoc4cfs-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#ann2", function() {
        $('#fileUploadFormann2').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#ann2'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchAnnAoc4CfsAData();
                            refreshTableData22();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#filling_AoC_4_cfs_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order400tt-td').text(response.count);
                            $('#total-size-order400tt-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#fileUploadFormann2')[0].reset(); // Reset the form
                                $('#fileUploadFormann2').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchAnnAoc4CfsAData();
                            refreshTableData22();
                             
                            $('#filling_AoC_4_cfs_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order400tt-td').text(response.count);
                            $('#total-size-order400tt-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#fileUploadFormann2')[0].reset(); // Reset the form
                                $('#fileUploadFormann2').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchAnnAoc4CfsAData();
                            refreshTableData22();
                            
                            $('#filling_AoC_4_cfs_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order400tt-td').text(response.count);
                            $('#total-size-order400tt-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fileUploadFormann2')[0].reset(); // Reset the form
                                $('#fileUploadFormann2').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
        
            // Initial data fetch on page load
    fetchAnnAoc4CfsAData();
    });




});
</script>


     <script>
$(document).ready(function() {
    function fetchAnnFileAoc4CfsData(location) {
        $.ajax({
            url: '{{ route('fetch-ann-file-aoc4cfs-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableann2 tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                        const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                                <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                       {{--     <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst23" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                              <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
        
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching board file min book data:', error);
            }
        });
    }
    
    
    
 function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });


$('body').on('click', '#filling_AoC_4_cfs_countt', function() {
    const location  = $(this).data('location');
            fetchAnnFileAoc4CfsData(location);
        });
    fetchAnnFileAoc4CfsData(location);

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst23', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>


<!-- Secretarial / Annual Filings AoC-4 (CFS) (Form for filing consolidated financial statements and other documents with the Registrar) script end -->



<!-- Secretarial / Annual Filings MGT-7A (Annual Return of a small company)
script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchAnnmgt7aData() {
        $.ajax({
            url: '{{ route('fetch-ann-mgt7a-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-order402tt-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-order402tt-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData24() {
        $.ajax({
            url: '{{ route('fetch-ann-mgt7a-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#ann4", function() {
        $('#fileUploadFormann4').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#ann4'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchAnnmgt7aData();
                            refreshTableData24();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#filling_MGT_7a_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order402tt-td').text(response.count);
                            $('#total-size-order402tt-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#fileUploadFormann4')[0].reset(); // Reset the form
                                $('#fileUploadFormann4').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchAnnmgt7aData();
                            refreshTableData24();
                             
                            $('#filling_MGT_7a_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order402tt-td').text(response.count);
                            $('#total-size-order402tt-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#fileUploadFormann4')[0].reset(); // Reset the form
                                $('#fileUploadFormann4').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchAnnmgt7aData();
                            refreshTableData24();
                            
                            $('#filling_MGT_7a_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order402tt-td').text(response.count);
                            $('#total-size-order402tt-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fileUploadFormann4')[0].reset(); // Reset the form
                                $('#fileUploadFormann4').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
            // Initial data fetch on page load
    fetchAnnmgt7aData();
    });




});
</script>


     <script>
$(document).ready(function() {
    function fetchAnnFilemgt7aData(location) {
        $.ajax({
            url: '{{ route('fetch-ann-file-mgt7a-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableann4 tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                        const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                                <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                        {{--    <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst24" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                             <div class="dropdown">
                <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
        
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching board file min book data:', error);
            }
        });
    }

    // Call fetchBoardFileMinBookData initially when the page loads
    
    
   function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
    
    
    

$('body').on('click', '#filling_MGT_7a_countt', function() {
    const location  = $(this).data('location');
            fetchAnnFilemgt7aData(location);
        });
    fetchAnnFilemgt7aData(location);

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst24', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>


<!-- Secretarial / Annual Filings MGT-7A (Annual Return of a small company) script end -->




<!-- Secretarial / MGT-7/ (Annual Return of a company)
script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchAnnmgt7Data() {
        $.ajax({
            url: '{{ route('fetch-ann-mgt7-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-order401tt-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-order401tt-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData2499() {
        $.ajax({
            url: '{{ route('fetch-ann-mgt7-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#ann3", function() {
        $('#fileUploadFormann3').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#ann3'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                       
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchAnnmgt7aData();
                            refreshTableData24();
                            
                            $('#filling_MGT_7a_pop').modal('hide'); // Hide the modal
                            $('#entries-count-order402tt-td').text(response.count);
                            $('#total-size-order402tt-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fileUploadFormann4')[0].reset(); // Reset the form
                                $('#fileUploadFormann4').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
            // Initial data fetch on page load
    fetchAnnmgt7Data();
    });




});
</script>


     <script>
$(document).ready(function() {
    function fetchAnnFilemgt7Data(location) {
        $.ajax({
            url: '{{ route('fetch-ann-file-mgt7-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableann3 tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                        const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                                <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                        {{--    <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst2399" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                             <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
        
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching board file min book data:', error);
            }
        });
    }

    // Call fetchBoardFileMinBookData initially when the page loads
    
    
   function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
    
    
    

$('body').on('click', '#filling_MGT_7_counttd', function() {
    const location  = $(this).data('location');
            fetchAnnFilemgt7Data(location);
        });
    fetchAnnFilemgt7Data(location);

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst2399', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>


<!-- Secretarial / MGT-7/ (Annual Return of a company) script end -->


<!-- Secretarial / Director Appointments DIR-3  Din KYC
script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchdirectorappointmentsdir3dinData() {
        $.ajax({
            url: '{{ route('fetch-directorappointments-dir3din-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-directdirno3-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-directdirno3-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData2599() {
        $.ajax({
            url: '{{ route('fetch-directorappointments-dir3din-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#dir_3din_submit", function() {
         $('#dir_3din_pop').on('submit', function(e) {
        e.preventDefault();
        
        if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

        var formData = new FormData(this);
        var submitButton = $('#dir_3din_submit'); // Select the submit button

        submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                   
                } else {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                }
                
            },
            error: function() {
                  toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
               
            }
        });
    });
        // Initial data fetch on page load
    fetchdirectorappointmentsdir3dinData();
});



});
</script>


     <script>
$(document).ready(function() {
    function fetchdirectorappointmentsdir3dinFileData(location) {
        $.ajax({
            url: '{{ route('fetch-directorappointments-file-dir3din-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTabledir3din tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                        const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                                <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                         {{--   <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst2599" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                            <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
        
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching board file min book data:', error);
            }
        });
    }

    // Call fetchBoardFileMinBookData initially when the page loads


function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
    
    
$('body').on('click', '#director_DIR_3_countt_din', function() {
    const location  = $(this).data('location');
            fetchdirectorappointmentsdir3dinFileData(location);
        });
    fetchdirectorappointmentsdir3dinFileData(location);

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst2599', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>

<!-- Secretarial / Director Appointments DIR-3 Din KYC script end -->



<!-- Secretarial / Director Appointments DIR-3 KYC
script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchdirectorappointmentsdir3Data() {
        $.ajax({
            url: '{{ route('fetch-directorappointments-dir3-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-directdir3-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-directdir3-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData25() {
        $.ajax({
            url: '{{ route('fetch-directorappointments-dir3-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#dir_3_submit", function() {
         $('#dir_3_pop').on('submit', function(e) {
        e.preventDefault();
        
        if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

        var formData = new FormData(this);
        var submitButton = $('#dir_3_submit'); // Select the submit button

        submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                    setTimeout(function() {
                        hideLoader(); // Hide loader
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchdirectorappointmentsdir3Data();
                        refreshTableData25();
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        $('#director_DIR_3_pop').modal('hide'); // Hide the modal
                        $('#entries-count-directdir3-td').text(response.count);
                        $('#total-size-directdir3-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#dir_3_pop')[0].reset(); // Reset the form
                                $('#dir_3_pop').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }, 1500); // 1500 milliseconds = 1.5 seconds
                } else {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                    fetchdirectorappointmentsdir3Data();
                    refreshTableData25();
                   
                    $('#director_DIR_3_pop').modal('hide'); // Hide the modal
                    $('#entries-count-directdir3-td').text(response.count);
                    $('#total-size-directdir3-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#dir_3_pop')[0].reset(); // Reset the form
                                $('#dir_3_pop').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            },
            error: function() {
                  toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                hideLoader(); // Hide loader if there is an error
                $('.button-spinner').remove(); // Remove spinner from the button
                fetchdirectorappointmentsdir3Data();
                refreshTableData25();
               
                $('#director_DIR_3_pop').modal('hide'); // Hide the modal
                $('#entries-count-directdir3-td').text(response.count);
                $('#total-size-directdir3-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                $('#dir_3_pop')[0].reset(); // Reset the form
                                $('#dir_3_pop').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
            }
        });
    });
        // Initial data fetch on page load
    fetchdirectorappointmentsdir3Data();
});



});
</script>


     <script>
$(document).ready(function() {
    function fetchdirectorappointmentsdir3FileData(location) {
        $.ajax({
            url: '{{ route('fetch-directorappointments-file-dir3-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTabledir3 tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                        const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                                <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                         {{--   <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst25" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                            <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
        
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching board file min book data:', error);
            }
        });
    }

    // Call fetchBoardFileMinBookData initially when the page loads


function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
    
    
$('body').on('click', '#director_DIR_3_countt', function() {
    const location  = $(this).data('location');
            fetchdirectorappointmentsdir3FileData(location);
        });
    fetchdirectorappointmentsdir3FileData(location);

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst25', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>

<!-- Secretarial / Director Appointments DIR-3 KYC script end -->


<!-- Secretarial / Director Appointments DIR-6 form
script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchdirectorappointmentsdir6Data() {
        $.ajax({
            url: '{{ route('fetch-directorappointments-dir6-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-directdir6-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-directdir6-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData26() {
        $.ajax({
            url: '{{ route('fetch-directorappointments-dir6-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#dir_6_submit", function() {
        $('#dir_6_pop').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#dir_6_submit'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchdirectorappointmentsdir6Data();
                            refreshTableData26();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#director_DIR_6_pop').modal('hide'); // Hide the modal
                            $('#entries-count-directdir6-td').text(response.count);
                            $('#total-size-directdir6-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#dir_6_pop')[0].reset(); // Reset the form
                                $('#dir_6_pop').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchdirectorappointmentsdir6Data();
                            refreshTableData26();
                            
                            $('#director_DIR_6_pop').modal('hide'); // Hide the modal
                            $('#entries-count-directdir6-td').text(response.count);
                            $('#total-size-directdir6-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#dir_6_pop')[0].reset(); // Reset the form
                                $('#dir_6_pop').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                   fetchdirectorappointmentsdir6Data();
                            refreshTableData26();
                             
                            $('#director_DIR_6_pop').modal('hide'); // Hide the modal
                            $('#entries-count-directdir6-td').text(response.count);
                            $('#total-size-directdir6-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#dir_6_pop')[0].reset(); // Reset the form
                                $('#dir_6_pop').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
            // Initial data fetch on page load
    fetchdirectorappointmentsdir6Data();
    });



});
</script>


     <script>
$(document).ready(function() {
    function fetchdirectorappointmentsdir6FileData(location) {
        $.ajax({
            url: '{{ route('fetch-directorappointments-file-dir6-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTabledir6 tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                        const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                                <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                     {{--       <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst26" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                              <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
        
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching board file min book data:', error);
            }
        });
    }

    // Call fetchBoardFileMinBookData initially when the page loads
function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
    
    

$('body').on('click', '#director_DIR_6_countt', function() {
    const location  = $(this).data('location');
            fetchdirectorappointmentsdir6FileData(location);
        });
    fetchdirectorappointmentsdir6FileData(location);

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst26', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>

<!-- Secretarial / Director Appointments DIR-6 form script end -->




<!-- Secretarial / Director Appointments DIR-12 form
script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchdirectorappointmentsdir12Data() {
        $.ajax({
            url: '{{ route('fetch-directorappointments-dir12-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-directdir12-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-directdir12-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData27() {
        $.ajax({
            url: '{{ route('fetch-directorappointments-dir12-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#dir_12_submit", function() {
        $('#dir_12_pop').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#dir_12_submit'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchdirectorappointmentsdir12Data();
                            refreshTableData27();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#director_DIR_12_pop').modal('hide'); // Hide the modal
                            $('#entries-count-directdir12-td').text(response.count);
                            $('#total-size-directdir12-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#dir_12_pop')[0].reset(); // Reset the form
                                $('#dir_12_pop').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchdirectorappointmentsdir12Data();
                            refreshTableData27();
                             
                            $('#director_DIR_12_pop').modal('hide'); // Hide the modal
                            $('#entries-count-directdir12-td').text(response.count);
                            $('#total-size-directdir12-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#dir_12_pop')[0].reset(); // Reset the form
                                $('#dir_12_pop').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                   fetchdirectorappointmentsdir12Data();
                            refreshTableData27();
                            
                            $('#director_DIR_12_pop').modal('hide'); // Hide the modal
                            $('#entries-count-directdir12-td').text(response.count);
                            $('#total-size-directdir12-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#dir_12_pop')[0].reset(); // Reset the form
                                $('#dir_12_pop').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
            // Initial data fetch on page load
    fetchdirectorappointmentsdir12Data();
    });




});
</script>


     <script>
$(document).ready(function() {
    function fetchdirectorappointmentsdir12FileData(location) {
        $.ajax({
            url: '{{ route('fetch-directorappointments-file-dir12-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTabledirectdir12 tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                        const createdAt = new Date(file.created_at);

    // Format the date as 'dd/mm/yyyy'
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                                <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                        {{--    <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst27" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                              <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
        
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Invalid response format', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching board file min book data:', error);
            }
        });
    }

    // Call fetchBoardFileMinBookData initially when the page loads
    
function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });

$('body').on('click', '#director_DIR_12_countt', function() {
    const location  = $(this).data('location');
            fetchdirectorappointmentsdir12FileData(location);
        });
    fetchdirectorappointmentsdir12FileData(location);

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst27', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>


<!-- Secretarial / Director Appointments DIR-12 form script end -->


<!-- Book-Keeping / Credit Card Statements Add Credit Card Statements
script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchcreditcardstatementData() {
        $.ajax({
            url: '{{ route('fetch-creditcardstatement-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-crecard-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-crecard-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData28() {
        $.ajax({
            url: '{{ route('fetch-creditcardstatement-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#creditcardstatementsubmit", function() {
        $('#creditcardstatement').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#creditcardstatementsubmit'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchcreditcardstatementData();
                            refreshTableData28();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#creditcardstatement_pop').modal('hide'); // Hide the modal
                            $('#entries-count-crecard-td').text(response.count);
                            $('#total-size-crecard-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#creditcardstatement')[0].reset(); // Reset the form
                                $('#creditcardstatement').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchcreditcardstatementData();
                            refreshTableData28();
                            
                            $('#creditcardstatement_pop').modal('hide'); // Hide the modal
                            $('#entries-count-crecard-td').text(response.count);
                            $('#total-size-crecard-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#creditcardstatement')[0].reset(); // Reset the form
                                $('#creditcardstatement').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                   fetchcreditcardstatementData();
                            refreshTableData28();
                             
                            $('#creditcardstatement_pop').modal('hide'); // Hide the modal
                            $('#entries-count-crecard-td').text(response.count);
                            $('#total-size-crecard-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#creditcardstatement')[0].reset(); // Reset the form
                                $('#creditcardstatement').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
         // Initial data fetch on page load
    fetchcreditcardstatementData();
    });

   

    
});
</script>


     <script>
// $(document).ready(function() {
//     function fetchcreditcardstatementFileData(selectedBank = '') {
//         $.ajax({
//             url: '{{ route('fetch-creditcardstatement-file-data') }}',
//             type: 'GET',
//             success: function(response) {
//                 const tableWrapper = $('.dodododo');
//                 const khaliclass = $('.khaliclass');
//                 const tableBody = $('#filesTablecrecard tbody');

//                 if (response && Array.isArray(response.files)) {
//                     tableBody.empty();

//                     // Filter data based on selected bank
//                     const filteredFiles = response.files.filter(file => 
//                         selectedBank === '' || file.bank_name === selectedBank
//                     );

//                     if (filteredFiles.length === 0 && selectedBank) {
//                         // Show SweetAlert2 message
//                         Swal.fire({
//                             icon: 'info',
//                             title: 'No Data Available',
//                             text: 'No data available for the selected bank: ' + selectedBank
//                         });

//                         // Show message inside the table body
//                         tableBody.html('<tr><td colspan="7" class="text-center">No data available  cbcvbcvfor the selected bank.</td></tr>');
//                         tableWrapper.hide(); // Hide the table wrapper div
//                         khaliclass.show(); // Show the khaliclass div
//                     } else {
//                         // Append filtered data to the table
//                         filteredFiles.forEach(file => {
//                             const fileName = file.file_name.split('/').pop();
//                             const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
//                             const createdAt = new Date(file.created_at);

//     // Format the date as 'dd/mm/yyyy'
//     const formattedDate = createdAt.toLocaleDateString('en-GB', {
//         day: '2-digit',
//         month: '2-digit',
//         year: 'numeric',
//     });
//                             const row = `
//                             <tr>
//                                 <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
//                                 <td>${fileName}</td>
//                                 <td>${file.descp}</td>
//                                 <td>${file.fyear}</td>
//                                 <td>${file.month}</td>
//                                 <td>${fileSize}</td>
//                                 <td>${formattedDate}</td>
//                                 <td>
//                                     <div class="qucik_axec_ain">
//                                         <div class="quick_access">
//                                          {{--   <a class="dropdown-itemm share_nt">
//  <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
//  <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
//  </svg>
//  </a> --}}
 
//  <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
//  <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
//  <g clip-path="url(#clip0_380_4)">
//  <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
//  <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
//  </g>
//  <defs>
//  <clipPath id="clip0_380_4">
//  <rect width="13" height="12" fill="white"/>
//  </clipPath>
//  </defs>
//  </svg>
//  </a>
//          <button type="button" class="delete-button" id="delbtdtst28" data-unique_tb_id="${file.id}">
//                                                             <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
//                                       <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
//                                     </svg> 
//                                                             </button> 
                                                            
//                                                             <div class="dropdown">
//               <button class="dropbtn show_pp">
//                 <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
//                   <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
//                   <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
//                   <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
//                 </svg>
//               </button>
//               <div id="myDropdown3" class="dropdown-content"> 
//                 <a class="dropdown-itemm chck_slect">
//                   Select Files </a>
//             </div>
//         </div>
        
//                                         </div>
//                                     </div>
//                                 </td>
//                             </tr>
//                         `;
//                         tableBody.append(row);
//                     });
//                     tableWrapper.show(); // Show the table wrapper div
//                         khaliclass.hide(); // Hide the khaliclass div
//                 } else {
//                     console.error('Invalid response format', response);
//                 }
//             },
//             error: function(xhr, status, error) {
//                 console.error('Error fetching board file min book data:', error);
//             }
//         });
//     }
//     fetchcreditcardstatementFileData($('#choose_bank22').val());
// function toggleMoveToDataRoomButton() {
//         const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
//         if (anyChecked) {
//             $('.movecontainer').show();
//         } else {
//             $('.movecontainer').hide();
//         }
//     }

//     // Event listener for checkboxes
//     $('body').on('change', 'input[name="fileCheckbox"]', function() {
//         toggleMoveToDataRoomButton();
//     });

//     // Click event for "Move to Data Room" button
//     $('.movebtn').on('click', function() {
//         // Get selected files
//         const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
//             return $(this).val();
//         }).get();

//         // Show a modal to select an existing data room or create a new one
//         showDataRoomModal(selectedFiles);
//     // });

//     // $('body').on('change', '.choose_bank1', function() {
//     //     // alert('fdgfdgfd');
//     //     const selectedBank = $(this).val();
//     //     fetchcreditcardstatementFileData(selectedBank);
//     // });
//   $('body').on('change', '#choose_bank22', function() {
//         const selectedBank = $(this).val();
//         fetchcreditcardstatementFileData(selectedBank);
//         if (selectedBank) {
//             alert("Selected Bank: " + selectedBank); // Alert the selected value
//         }
//     });

// });
</script>

<script>
$(document).ready(function() {
    $('body').on('change', '#choose_bank22', function() {
        const selectedBank = $(this).val();
        
        if (selectedBank) {
            // AJAX call to fetch data based on the selected bank
            $.ajax({
                url: '{{ route('fetch-creditcardstatement-file-data') }}', // Adjust the route as necessary
                type: 'GET',
                data: { bank: selectedBank }, // Send the selected bank
                success: function(response) {
                    const tableWrapper = $('.dodododo');
                    const khaliclass = $('.khaliclass');
                    const tableBody = $('#filesTablecrecard tbody');
                    
                    // Clear previous data
                    tableBody.empty();
                    
                    if (response && Array.isArray(response.files)) {
                        // Filter data based on selected bank
                        const filteredFiles = response.files.filter(file => 
                            selectedBank === '' || file.bank_name === selectedBank
                        );

                        if (filteredFiles.length === 0) {
                            // Show SweetAlert2 message
                            Swal.fire({
                                icon: 'info',
                                title: 'No Data Available',
                                text: 'No data available for the selected bank: ' + selectedBank
                            });

                            // Show message inside the table body
                            tableBody.html('');
                            tableWrapper.hide(); // Hide the table wrapper div
                            khaliclass.show(); // Show the khaliclass div
                        } else {
                            // Append filtered data to the table
                            filteredFiles.forEach(file => {
                                const fileName = file.file_name.split('/').pop();
                                const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                                const createdAt = new Date(file.created_at);

                                // Format the date as 'dd/mm/yyyy'
                                const formattedDate = createdAt.toLocaleDateString('en-GB', {
                                    day: '2-digit',
                                    month: '2-digit',
                                    year: 'numeric',
                                });

                                // Create a table row for each file
                                const row = `
                                    <tr>
                                        <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                        <td>${file.fyear}</td>
                                        <td>${file.month}</td>
                                        <td>${fileSize}</td>
                                        <td>${formattedDate}</td>
                                        <td>
                                            <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                         {{--   <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst28" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                            <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
        
                                        </div>
                                    </div>
                                        </td>
                                    </tr>
                                `;

                                tableBody.append(row);
                            });

                            tableWrapper.show(); // Show the table wrapper div
                            khaliclass.hide(); // Hide the khaliclass div
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX request failed:', error);
                }
            });
        } else {
            Swal.fire({
                icon: 'info',
                title: 'No Data Available',
                text: 'No bank selected. Please choose a bank to view data.'
            });

            $('.dodododo').hide(); // Hide the table wrapper div
            $('.khaliclass').show(); // Show the khaliclass div
        }
    });
    function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
});
</script>




<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst28', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>

<!-- Book-Keeping / Credit Card Statements Add Credit Card Statements script end -->



<!-- Book-Keeping / Fixed Deposit Statements Fixed Deposit Account Statement
script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchfixeddepoiststatementData() {
        $.ajax({
            url: '{{ route('fetch-fixeddepoiststatement-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-fxdp-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-fxdp-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData29() {
        $.ajax({
            url: '{{ route('fetch-fixeddepoiststatement-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#fixeddepositstatementsubmit", function() {
        $('#fixeddepositstatement').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#fixeddepositstatementsubmit'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchfixeddepoiststatementData();
                            refreshTableData29();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#fixeddepositstatement_pop').modal('hide'); // Hide the modal
                            $('#entries-count-fxdp-td').text(response.count);
                            $('#total-size-fxdp-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#fixeddepositstatement')[0].reset(); // Reset the form
                                $('#fixeddepositstatement').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchfixeddepoiststatementData();
                            refreshTableData29();
                            
                            $('#fixeddepositstatement_pop').modal('hide'); // Hide the modal
                            $('#entries-count-fxdp-td').text(response.count);
                            $('#total-size-fxdp-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#fixeddepositstatement')[0].reset(); // Reset the form
                                $('#fixeddepositstatement').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                   fetchfixeddepoiststatementData();
                            refreshTableData29();
                            
                            $('#fixeddepositstatement_pop').modal('hide'); // Hide the modal
                            $('#entries-count-fxdp-td').text(response.count);
                            $('#total-size-fxdp-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#fixeddepositstatement')[0].reset(); // Reset the form
                                $('#fixeddepositstatement').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
        // Initial data fetch on page load
    fetchfixeddepoiststatementData();
    });

    

    
});
</script>


     <script>
// $(document).ready(function(selectedBank = '') {
//     function fetchfixeddepoiststatementFileData() {
//         $.ajax({
//             url: '{{ route('fetch-fixeddepoiststatement-file-data') }}',
//             type: 'GET',
//             success: function(response) {
            
//     const tableWrapper = $('.dodododo');
//                 const khaliclass = $('.khaliclass');
//                 const tableBody = $('#filesTablefxdp tbody');

//                 if (response && Array.isArray(response.files)) {
//                     tableBody.empty();

//                     // Filter data based on selected bank
//                     const filteredFiles = response.files.filter(file => 
//                         selectedBank === '' || file.bank_name === selectedBank
//                     );

//                     if (filteredFiles.length === 0 && selectedBank) {
//                         // Show SweetAlert2 message
//                         Swal.fire({
//                             icon: 'info',
//                             title: 'No Data Available',
//                             text: 'No data available for the selected bank: ' + selectedBank
//                         });

//                         // Show message inside the table body
//                         tableBody.html('<tr><td colspan="7" class="text-center">No data available for the selected bank.</td></tr>');
//                         tableWrapper.hide(); // Hide the table wrapper div
//                         khaliclass.show(); // Show the khaliclass div
//                     } else {
//                         // Append filtered data to the table
//                         filteredFiles.forEach(file => {
//                             const fileName = file.file_name.split('/').pop();
//                             const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
//                                                                           const createdAt = new Date(file.created_at);

//     // Format the date as 'dd/mm/yyyy'
//     const formattedDate = createdAt.toLocaleDateString('en-GB', {
//         day: '2-digit',
//         month: '2-digit',
//         year: 'numeric',
//     });
//                         const row = `
//                             <tr>
//                                 <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
//                                 <td class="file_nammmee">${fileName}</td>
//                                 <td class="file_dess">${file.descp}</td>
//                                 <td>${file.fyear}</td>
//                                 <td>${file.month}</td>
//                                 <td>${fileSize}</td>
//                                 <td>${formattedDate}</td>
//                                 <td>
//                                     <div class="qucik_axec_ain">
//                                         <div class="quick_access">
//                                         {{--    <a class="dropdown-itemm share_nt">
//  <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
//  <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
//  </svg>
//  </a> --}}
 
//  <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
//  <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
//  <g clip-path="url(#clip0_380_4)">
//  <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
//  <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
//  </g>
//  <defs>
//  <clipPath id="clip0_380_4">
//  <rect width="13" height="12" fill="white"/>
//  </clipPath>
//  </defs>
//  </svg>
//  </a>
//          <button type="button" class="delete-button" id="delbtdtst29" data-unique_tb_id="${file.id}">
//                                                             <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
//                                       <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
//                                     </svg> 
//                                                             </button> 
                                                            
//                                                              <div class="dropdown">
//                 <button class="dropbtn show_pp">
//                 <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
//                   <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
//                   <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
//                   <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
//                 </svg>
//               </button>
//               <div id="myDropdown3" class="dropdown-content"> 
//                 <a class="dropdown-itemm chck_slect">
//                   Select Files </a>
//             </div>
//         </div>
        
//                                         </div>
//                                     </div>
//                                 </td>
//                             </tr>
//                         `;
//                         tableBody.append(row);
//                     });
//                     tableWrapper.show(); // Show the table wrapper div
//                         khaliclass.hide(); // Hide the khaliclass div
//                 } else {
//                     console.error('Invalid response format', response);
//                 }
//             },
//             error: function(xhr, status, error) {
//                 console.error('Error fetching board file min book data:', error);
//             }
//         });
//     }
//     fetchfixeddepoiststatementFileData($('#choose_bankfd').val());
// function toggleMoveToDataRoomButton() {
//         const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
//         if (anyChecked) {
//             $('.movecontainer').show();
//         } else {
//             $('.movecontainer').hide();
//         }
//     }

//     // Event listener for checkboxes
//     $('body').on('change', 'input[name="fileCheckbox"]', function() {
//         toggleMoveToDataRoomButton();
//     });

//     // Click event for "Move to Data Room" button
//     $('.movebtn').on('click', function() {
//         // Get selected files
//         const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
//             return $(this).val();
//         }).get();

//         // Show a modal to select an existing data room or create a new one
//         showDataRoomModal(selectedFiles);
//     });
  

//   $('body').on('click', '#fixeddepositstatement_countt', function() {
//             fetchfixeddepoiststatementFileData();
//         });
//     fetchfixeddepoiststatementFileData();
//     $('body').on('change', '#choose_bankfd', function() {
//         const selectedBank = $(this).val();
//         fetchfixeddepoiststatementFileData(selectedBank);
//     });

// });
</script>
<script>
$(document).ready(function() {
    $('body').on('change', '#choose_bankfd', function() {
        const selectedBank = $(this).val();
        
        if (selectedBank) {
            // AJAX call to fetch data based on the selected bank
            $.ajax({
                url: '{{ route('fetch-fixeddepoiststatement-file-data') }}', // Adjust the route as necessary
                type: 'GET',
                data: { bank: selectedBank }, // Send the selected bank
                success: function(response) {
                    const tableWrapper = $('.dodododo');
                    const khaliclass = $('.khaliclass');
                    const tableBody = $('#filesTablefxdp tbody');
                    
                    // Clear previous data
                    tableBody.empty();
                    
                    if (response && Array.isArray(response.files)) {
                        // Filter data based on selected bank
                        const filteredFiles = response.files.filter(file => 
                            selectedBank === '' || file.bank_name === selectedBank
                        );

                        if (filteredFiles.length === 0) {
                            // Show SweetAlert2 message
                            Swal.fire({
                                icon: 'info',
                                title: 'No Data Available',
                                text: 'No data available for the selected bank: ' + selectedBank
                            });

                            // Show message inside the table body
                            tableBody.html('');
                            tableWrapper.hide(); // Hide the table wrapper div
                            khaliclass.show(); // Show the khaliclass div
                        } else {
                            // Append filtered data to the table
                            filteredFiles.forEach(file => {
                                const fileName = file.file_name.split('/').pop();
                                const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                                const createdAt = new Date(file.created_at);

                                // Format the date as 'dd/mm/yyyy'
                                const formattedDate = createdAt.toLocaleDateString('en-GB', {
                                    day: '2-digit',
                                    month: '2-digit',
                                    year: 'numeric',
                                });

                                // Create a table row for each file
                                const row = `
                                    <tr>
                                        <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                        <td>${fileName}</td>
                                        <td>${file.descp}</td>
                                        <td>${file.fyear}</td>
                                        <td>${file.month}</td>
                                        <td>${fileSize}</td>
                                        <td>${formattedDate}</td>
                                        <td>
                                            <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                        {{--    <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst29" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                             <div class="dropdown">
              <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
        
                                        </div>
                                    </div>
                                        </td>
                                    </tr>
                                `;

                                tableBody.append(row);
                            });

                            tableWrapper.show(); // Show the table wrapper div
                            khaliclass.hide(); // Hide the khaliclass div
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX request failed:', error);
                }
            });
        } else {
            Swal.fire({
                icon: 'info',
                title: 'No Data Available',
                text: 'No bank selected. Please choose a bank to view data.'
            });

            $('.dodododo').hide(); // Hide the table wrapper div
            $('.khaliclass').show(); // Show the khaliclass div
        }
    });
    function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst29', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>


<!-- Book-Keeping / Fixed Deposit Statements Fixed Deposit Account Statement script end -->


<!-- Book-Keeping / Mutual Fund Statements Add Mutual Fund Statements
script start -->


<script>
$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
    }
    
     let isSubmitting = false; // Track submission state

        function resetFileInput($fileInput) {
            $fileInput.val('');
            const fileArea = $fileInput.closest('.ivoice-upload').find('.file-area');
            const selectedFileDiv = fileArea.siblings('.selected-file');
            selectedFileDiv.text('');
            fileArea.removeClass('green-outline');
            fileArea.css('outline', '2px dashed #D2DBE5');
            fileArea.find('.file-dummy').css('display', 'inline');
        }

        function clearSelectedFile() {
            $('.selected-file').text(''); // Clear the content of all elements with class 'selected-file'
        }

        function clearBrowserCache() {
            localStorage.clear(); // Clear all local storage data
            sessionStorage.clear(); // Clear all session storage data
        }

    // Function to fetch board min book data
    function fetchmutualfundstatementData() {
        $.ajax({
            url: '{{ route('fetch-mutualfundstatement-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-mufund-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-mufund-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData30() {
        $.ajax({
            url: '{{ route('fetch-mutualfundstatement-data') }}',
            type: 'GET',
            success: function(response) {
                // Assuming 'response' contains updated HTML for table
                $('#tablerefreshdata').html(response);
                console.log(response);
                console.log('Table data refreshed successfully');
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    // Form submission event handler
    $('body').on('click', "#mutualfundstatementsubmit", function() {
        $('#mutualfundstatement').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#mutualfundstatementsubmit'); // Select the submit button

            submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable the submit button and show the loader

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Show loader for 1.5 seconds
                        toastr.success('File uploaded successfully!'); // Display success toaster message
                        window.location.reload(true);
                        exit;
                        setTimeout(function() {
                            hideLoader(); // Hide loader
                            $('.button-spinner').remove(); // Remove spinner from the button
                            fetchmutualfundstatementData();
                            refreshTableData30();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#mutualfundstatement_pop').modal('hide'); // Hide the modal
                            $('#entries-count-mufund-td').text(response.count);
                            $('#total-size-mufund-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#mutualfundstatement')[0].reset(); // Reset the form
                                $('#mutualfundstatement').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                        }, 1500); // 1500 milliseconds = 1.5 seconds
                    } else {
                          toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                        hideLoader(); // Hide loader if there is an error
                        $('.button-spinner').remove(); // Remove spinner from the button
                        fetchmutualfundstatementData();
                            refreshTableData30();
                             
                            $('#mutualfundstatement_pop').modal('hide'); // Hide the modal
                            $('#entries-count-mufund-td').text(response.count);
                            $('#total-size-mufund-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#mutualfundstatement')[0].reset(); // Reset the form
                                $('#mutualfundstatement').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                      toastr.error('Failed to upload file.'); // Display error toaster message
                     window.location.reload(true);
                        exit;
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                   fetchmutualfundstatementData();
                            refreshTableData30();
                            
                            $('#mutualfundstatement_pop').modal('hide'); // Hide the modal
                            $('#entries-count-mufund-td').text(response.count);
                            $('#total-size-mufund-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#mutualfundstatement')[0].reset(); // Reset the form
                                $('#mutualfundstatement').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                }
            });
        });
        // Initial data fetch on page load
    fetchmutualfundstatementData();
    });

    

    
});
</script>


     <script>
// $(document).ready(function() {
//     function fetchmutualfundstatementFileData() {
//         $.ajax({
//             url: '{{ route('fetch-mutualfundstatement-file-data') }}',
//             type: 'GET',
//             success: function(response) {
//                 if (response && Array.isArray(response.files)) {
//                     const tableBody = $('#filesTablemufund tbody');
//                     tableBody.empty();

//                     response.files.forEach(file => {
//                         const fileName = file.file_name.split('/').pop();
//                         const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                        
//                         const createdAt = new Date(file.created_at);

//     // Format the date as 'dd/mm/yyyy'
//     const formattedDate = createdAt.toLocaleDateString('en-GB', {
//         day: '2-digit',
//         month: '2-digit',
//         year: 'numeric',
//     });
//                         const row = `
//                             <tr>
//                                 <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
//                                 <td class="file_nammmee">${fileName}</td>
//                                 <td class="file_dess">${file.descp}</td>
//                                 <td>${file.fyear}</td>
//                                 <td>${file.month}</td>
//                                 <td>${fileSize}</td>
//                                 <td>${formattedDate}</td>
//                                 <td>
//                                     <div class="qucik_axec_ain">
//                                         <div class="quick_access">
//                                       {{--     <a class="dropdown-itemm share_nt">
//  <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
//  <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
//  </svg>
//  </a> --}}
 
//  <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
//  <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
//  <g clip-path="url(#clip0_380_4)">
//  <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
//  <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
//  </g>
//  <defs>
//  <clipPath id="clip0_380_4">
//  <rect width="13" height="12" fill="white"/>
//  </clipPath>
//  </defs>
//  </svg>
//  </a>
//          <button type="button" class="delete-button" id="delbtdtst30" data-unique_tb_id="${file.id}">
//                                                             <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
//                                       <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
//                                     </svg> 
//                                                             </button> 
                                                            
//                                                              <div class="dropdown">
//               <button class="dropbtn show_pp">
//                 <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
//                   <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
//                   <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
//                   <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
//                 </svg>
//               </button>
//               <div id="myDropdown3" class="dropdown-content"> 
//                 <a class="dropdown-itemm chck_slect">
//                   Select Files </a>
//             </div>
//         </div>
        
//                                         </div>
//                                     </div>
//                                 </td>
//                             </tr>
//                         `;
//                         tableBody.append(row);
//                     });
//                 } else {
//                     console.error('Invalid response format', response);
//                 }
//             },
//             error: function(xhr, status, error) {
//                 console.error('Error fetching board file min book data:', error);
//             }
//         });
//     }
// function toggleMoveToDataRoomButton() {
//         const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
//         if (anyChecked) {
//             $('.movecontainer').show();
//         } else {
//             $('.movecontainer').hide();
//         }
//     }

//     // Event listener for checkboxes
//     $('body').on('change', 'input[name="fileCheckbox"]', function() {
//         toggleMoveToDataRoomButton();
//     });

//     // Click event for "Move to Data Room" button
//     $('.movebtn').on('click', function() {
//         // Get selected files
//         const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
//             return $(this).val();
//         }).get();

//         // Show a modal to select an existing data room or create a new one
//         showDataRoomModal(selectedFiles);
//     });
   
//  $('body').on('click', '#mutualfundstatement_countt', function() {
//             fetchmutualfundstatementFileData();
//         });
//     fetchmutualfundstatementFileData();
   
// });
</script>
<script>
$(document).ready(function() {
    $('body').on('change', '#choose_bankmf', function() {
        const selectedBank = $(this).val();
        
        if (selectedBank) {
            // AJAX call to fetch data based on the selected bank
            $.ajax({
                url: '{{ route('fetch-mutualfundstatement-file-data') }}', // Adjust the route as necessary
                type: 'GET',
                data: { bank: selectedBank }, // Send the selected bank
                success: function(response) {
                    const tableWrapper = $('.dodododo');
                    const khaliclass = $('.khaliclass');
                    const tableBody = $('#filesTablemufund tbody');
                    
                    // Clear previous data
                    tableBody.empty();
                    
                    if (response && Array.isArray(response.files)) {
                        // Filter data based on selected bank
                        const filteredFiles = response.files.filter(file => 
                            selectedBank === '' || file.bank_name === selectedBank
                        );

                        if (filteredFiles.length === 0) {
                            // Show SweetAlert2 message
                            Swal.fire({
                                icon: 'info',
                                title: 'No Data Available',
                                text: 'No data available for the selected bank: ' + selectedBank
                            });

                            // Show message inside the table body
                            tableBody.html('');
                            tableWrapper.hide(); // Hide the table wrapper div
                            khaliclass.show(); // Show the khaliclass div
                        } else {
                            // Append filtered data to the table
                            filteredFiles.forEach(file => {
                                const fileName = file.file_name.split('/').pop();
                                const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                                const createdAt = new Date(file.created_at);

                                // Format the date as 'dd/mm/yyyy'
                                const formattedDate = createdAt.toLocaleDateString('en-GB', {
                                    day: '2-digit',
                                    month: '2-digit',
                                    year: 'numeric',
                                });

                                // Create a table row for each file
                                const row = `
                                    <tr>
                                        <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                        <td>${fileName}</td>
                                        <td>${file.descp}</td>
                                        <td>${file.fyear}</td>
                                        <td>${file.month}</td>
                                        <td>${fileSize}</td>
                                        <td>${formattedDate}</td>
                                        <td>
                                             <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                       {{--     <a class="dropdown-itemm share_nt">
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst30" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                             <div class="dropdown">
                <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
        </div>
        
                                        </div>
                                    </div>
                                        </td>
                                    </tr>
                                `;

                                tableBody.append(row);
                            });

                            tableWrapper.show(); // Show the table wrapper div
                            khaliclass.hide(); // Hide the khaliclass div
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX request failed:', error);
                }
            });
        } else {
            Swal.fire({
                icon: 'info',
                title: 'No Data Available',
                text: 'No bank selected. Please choose a bank to view data.'
            });

            $('.dodododo').hide(); // Hide the table wrapper div
            $('.khaliclass').show(); // Show the khaliclass div
        }
    });
    function toggleMoveToDataRoomButton() {
        const anyChecked = $('input[name="fileCheckbox"]:checked').length > 0;
        if (anyChecked) {
            $('.movecontainer').show();
        } else {
            $('.movecontainer').hide();
        }
    }

    // Event listener for checkboxes
    $('body').on('change', 'input[name="fileCheckbox"]', function() {
        toggleMoveToDataRoomButton();
    });

    // Click event for "Move to Data Room" button
    $('.movebtn').on('click', function() {
        // Get selected files
        const selectedFiles = $('input[name="fileCheckbox"]:checked').map(function() {
            return $(this).val();
        }).get();

        // Show a modal to select an existing data room or create a new one
        showDataRoomModal(selectedFiles);
    });
});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst30', function() {
            var id = $(this).data('unique_tb_id'); 
            var button = $(this);

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the AJAX request if the user confirms
                    $.ajax({
                        url: '/softdeleteCommonFile/' + id, // The route you defined in web.php
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                button.closest('tr').remove();
                                window.location.reload(true);

                               

                                // fetchBoardFileMinBookData();
                                // $('#unique_tb_id').closest('.board-file-minbook').remove(); // Example: remove the button
                            } else {
                                // fetchBoardFileMinBookData();
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // fetchBoardFileMinBookData();
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    // sandeep soft delete operation end here
</script>


<!-- Book-Keeping / Mutual Fund Statements Add Mutual Fund Statements script end -->




    <!-- sandeep start here 1 October 2024 secretrial statury register-->
    <script>
        $(document).ready(function() {
           function fetchSecretarialStatutoryRegistersRMFileData(location) {
                $.ajax({
                    url: '{{ route('fetch-SecretarialStatutoryRegistersRM-file-data') }}',
                    type: 'GET',
                    data: { location: location }, // Pass the location parameter
                    success: function(response) {
                        if (response && Array.isArray(response.files)) {
                            const tableBody = $('#filesTableRegisterMember tbody');
                            tableBody.empty();

                            response.files.forEach(file => {
                                const fileName = file.file_name.split('/').pop();
                                const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                                const createdAt = new Date(file.created_at);

                                    // Format the date (e.g., 'MM/DD/YYYY')
                                    const formattedDate = createdAt.toLocaleDateString('en-GB', {
                                        day: '2-digit',
                                        month: '2-digit',
                                        year: 'numeric',
                                    });
                                const row = `
                                    <tr>
                                    <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                        <td class="file_nammmee">${fileName}</td>
                                        <td class="file_dess">${file.descp}</td>
                                        <td>${file.fyear}</td>
                                        <td>${file.month}</td>
                                        <td>${fileSize}</td>
                                        <td>${formattedDate}</td>
                                        <td>
                                            <div class="qucik_axec_ain">
                                                <div class="quick_access">
                                            {{--      <a class="dropdown-itemm share_nt" >
                                            <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
                                            </svg>
                                            </a> --}}
                                            
                                            <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
                                            <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_380_4)">
                                            <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
                                            <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
                                            </g>
                                            <defs>
                                            <clipPath id="clip0_380_4">
                                            <rect width="13" height="12" fill="white"/>
                                            </clipPath>
                                            </defs>
                                            </svg>
                                            </a>
                                            <button type="button" class="delete-button" id="delbtdtst1" data-unique_tb_id="${file.id}">
                                                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                                                        </svg> 
                                                                                                </button> 
                                                                                                
                                                                    <div class="dropdown">
                                                            <button class="dropbtn show_pp">
                                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                                                                <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                                                                <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                                                                </svg>
                                                            </button>
                                                            <div id="myDropdown3" class="dropdown-content"> 
                                                                <a class="dropdown-itemm chck_slect">
                                                                Select Files </a>
                                                                <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                                                                View </a>
                                                            </div>
                    
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    `;
                                    tableBody.append(row);
                                });
                            } else {
                                console.error('Unexpected response format:', response);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Failed to fetch data:', status, error);
                        }
                    });
            }
    
    
            $('body').on('click', '#StautoryReg_meber_countt', function() {
                const location  = $(this).data('location');
                fetchSecretarialStatutoryRegistersRMFileData(location);
            });
   
    
    
           function fetchSecretarialStatutoryRegistersROSHFileData(location) {
            
            $.ajax({
                url: '{{ route('fetch-SecretarialStatutoryRegistersROSH-file-data') }}',
                type: 'GET',
                data: { location: location }, // Pass the location parameter
                success: function(response) {
                    if (response && Array.isArray(response.files)) {
                        const tableBody = $('#filesTableROSH tbody');
                        tableBody.empty();

                        response.files.forEach(file => {
                            const fileName = file.file_name.split('/').pop();
                            const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                            const createdAt = new Date(file.created_at);

                        // Format the date (e.g., 'MM/DD/YYYY')
                        const formattedDate = createdAt.toLocaleDateString('en-GB', {
                            day: '2-digit',
                            month: '2-digit',
                            year: 'numeric',
                        });
                        const row = `
                            <tr>
                            <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                      {{--      <a class="dropdown-itemm share_nt" >
                                        <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
                                        </svg>
                                        </a> --}}
                                        
                                        <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
                                        <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_380_4)">
                                        <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
                                        <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_380_4">
                                        <rect width="13" height="12" fill="white"/>
                                        </clipPath>
                                        </defs>
                                        </svg>
                                        </a>
                                        <button type="button" class="delete-button" id="delbtdtst1" data-unique_tb_id="${file.id}">
                                                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                                                    </svg> 
                                                                                            </button> 
                                                                                            
                                                                                            <div class="dropdown">
                                                                <button class="dropbtn show_pp">
                                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                                                                    <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                                                                    <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                                                                    </svg>
                                                                </button>
                                                                <div id="myDropdown3" class="dropdown-content"> 
                                                                    <a class="dropdown-itemm chck_slect">
                                                                    Select Files </a>
                                                                    <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                                                                    View </a>
                                                                </div>
            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Unexpected response format:', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
            });
          }
    
  
            $('body').on('click', '#StautoryReg_security_countt', function() {
                const location  = $(this).data('location');
                fetchSecretarialStatutoryRegistersROSHFileData(location);
            });
  
    
    
    function fetchSecretarialStatutoryRegistersFRFileData(location) {
        
        $.ajax({
            url: '{{ route('fetch-SecretarialStatutoryRegistersFR-file-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableFR tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                          const createdAt = new Date(file.created_at);

    // Format the date (e.g., 'MM/DD/YYYY')
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                            <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                      {{--      <a class="dropdown-itemm share_nt" >
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst1" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                            <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Unexpected response format:', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }
    
   
        $('body').on('click', '#StautoryReg_forginreg_countt', function() {
            const location  = $(this).data('location');
            fetchSecretarialStatutoryRegistersFRFileData(location);
        });
   
    
    function fetchSecretarialStatutoryRegistersRDKFileData(location) {
        
        $.ajax({
            url: '{{ route('fetch-SecretarialStatutoryRegistersRDK-file-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableRDKMP tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                          const createdAt = new Date(file.created_at);

    // Format the date (e.g., 'MM/DD/YYYY')
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                            <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                      {{--      <a class="dropdown-itemm share_nt" >
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst1" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                            <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Unexpected response format:', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }
    
   
        $('body').on('click', '#StautoryReg_kmp_countt', function() {
            const location  = $(this).data('location');
            fetchSecretarialStatutoryRegistersRDKFileData(location);
        });
  
    
    function fetchSecretarialStatutoryRegistersRCFileData(location) {
        
        $.ajax({
            url: '{{ route('fetch-SecretarialStatutoryRegistersRC-file-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableRC tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                          const createdAt = new Date(file.created_at);

    // Format the date (e.g., 'MM/DD/YYYY')
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                            <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                      {{--      <a class="dropdown-itemm share_nt" >
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst1" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                            <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Unexpected response format:', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }
    
 
        $('body').on('click', '#StautoryReg_regchnage_countt', function() {
            const location  = $(this).data('location');
            fetchSecretarialStatutoryRegistersRCFileData(location);
        });

    
    
    function fetchSecretarialStatutoryRegistersRDFileData(location) {
        
        $.ajax({
            url: '{{ route('fetch-SecretarialStatutoryRegistersRD-file-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableRD tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                          const createdAt = new Date(file.created_at);

    // Format the date (e.g., 'MM/DD/YYYY')
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                            <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                      {{--      <a class="dropdown-itemm share_nt" >
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst1" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                            <div class="dropdown">
                <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Unexpected response format:', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }
    
   
        $('body').on('click', '#StautoryReg_dep_countt', function() {
            const location  = $(this).data('location');
            fetchSecretarialStatutoryRegistersRDFileData(location);
        });
 
    
    function fetchSecretarialStatutoryRegistersRLGSFileData(location) {
        
        $.ajax({
            url: '{{ route('fetch-SecretarialStatutoryRegistersRLGS-file-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableRLGS tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                          const createdAt = new Date(file.created_at);

    // Format the date (e.g., 'MM/DD/YYYY')
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                            <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                      {{--      <a class="dropdown-itemm share_nt" >
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst1" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                            <div class="dropdown">
                <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Unexpected response format:', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }
    
  
        $('body').on('click', '#StautoryReg_lgs_countt', function() {
            const location  = $(this).data('location');
            fetchSecretarialStatutoryRegistersRLGSFileData(location);
        });
  
    
    
    function fetchSecretarialStatutoryRegistersRCDFileData(location) {
        
        $.ajax({
            url: '{{ route('fetch-SecretarialStatutoryRegistersRCD-file-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableRCD tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                          const createdAt = new Date(file.created_at);

    // Format the date (e.g., 'MM/DD/YYYY')
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                            <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                      {{--      <a class="dropdown-itemm share_nt" >
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst1" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                            <div class="dropdown">
                <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Unexpected response format:', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }
    
  
        $('body').on('click', '#StautoryReg_icn_countt', function() {
            const location  = $(this).data('location');
            fetchSecretarialStatutoryRegistersRCDFileData(location);
        });
   
    
    
    function fetchSecretarialStatutoryRegistersRCDIFileData(location) {
        
        $.ajax({
            url: '{{ route('fetch-SecretarialStatutoryRegistersRCDI-file-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableRCDI tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                          const createdAt = new Date(file.created_at);

    // Format the date (e.g., 'MM/DD/YYYY')
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                            <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                      {{--      <a class="dropdown-itemm share_nt" >
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst1" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                            <div class="dropdown">
                <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Unexpected response format:', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }
    
   
        $('body').on('click', '#StautoryReg_cdi_countt', function() {
            const location  = $(this).data('location');
            fetchSecretarialStatutoryRegistersRCDIFileData(location);
        });
   
    
    
    function fetchSecretarialStatutoryRegistersRSESFileData(location) {
        
        $.ajax({
            url: '{{ route('fetch-SecretarialStatutoryRegistersRSES-file-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableRSES tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                          const createdAt = new Date(file.created_at);

    // Format the date (e.g., 'MM/DD/YYYY')
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                            <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                      {{--      <a class="dropdown-itemm share_nt" >
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst1" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                            <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Unexpected response format:', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }
    
   
        $('body').on('click', '#StautoryReg_sewat_countt', function() {
            const location  = $(this).data('location');
            fetchSecretarialStatutoryRegistersRSESFileData(location);
        });

    
    function fetchSecretarialStatutoryRegistersRESOFileData(location) {
        
        $.ajax({
            url: '{{ route('fetch-SecretarialStatutoryRegistersRESO-file-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableRESO tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                          const createdAt = new Date(file.created_at);

    // Format the date (e.g., 'MM/DD/YYYY')
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                            <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                      {{--      <a class="dropdown-itemm share_nt" >
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst1" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                            <div class="dropdown">
                <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Unexpected response format:', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }
    
    
        $('body').on('click', '#StautoryReg_stock_countt', function() {
            const location  = $(this).data('location');
            fetchSecretarialStatutoryRegistersRESOFileData(location);
        });
  
    
    
    function fetchSecretarialStatutoryRegistersRSBBFileData(location) {
        
        $.ajax({
            url: '{{ route('fetch-SecretarialStatutoryRegistersRSBB-file-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableRSBB tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                          const createdAt = new Date(file.created_at);

    // Format the date (e.g., 'MM/DD/YYYY')
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                            <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                      {{--      <a class="dropdown-itemm share_nt" >
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst1" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                            <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Unexpected response format:', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }
    
  
        $('body').on('click', '#StautoryReg_bought_countt', function() {
            const location  = $(this).data('location');
            fetchSecretarialStatutoryRegistersRSBBFileData(location);
        });
   
    
    
    function fetchSecretarialStatutoryRegistersRRDSCFileData(location) {
        
        $.ajax({
            url: '{{ route('fetch-SecretarialStatutoryRegistersRRDSC-file-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableRRDSC tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                          const createdAt = new Date(file.created_at);

    // Format the date (e.g., 'MM/DD/YYYY')
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                            <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                      {{--      <a class="dropdown-itemm share_nt" >
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst1" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                            <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Unexpected response format:', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }
    
 
        $('body').on('click', '#StautoryReg_share_countt', function() {
            const location  = $(this).data('location');
            fetchSecretarialStatutoryRegistersRRDSCFileData(location);
        });
   
    
    
    function fetchSecretarialStatutoryRegistersSBOFileData(location) {
        
        $.ajax({
            url: '{{ route('fetch-SecretarialStatutoryRegistersSBO-file-data') }}',
            type: 'GET',
            data: { location: location }, // Pass the location parameter
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableSBO tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                          const createdAt = new Date(file.created_at);

    // Format the date (e.g., 'MM/DD/YYYY')
    const formattedDate = createdAt.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
    });
                        const row = `
                            <tr>
                            <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                      {{--      <a class="dropdown-itemm share_nt" >
 <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
 <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
 </svg>
 </a> --}}
 
 <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
 <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
 <g clip-path="url(#clip0_380_4)">
 <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
 <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
 </g>
 <defs>
 <clipPath id="clip0_380_4">
 <rect width="13" height="12" fill="white"/>
 </clipPath>
 </defs>
 </svg>
 </a>
         <button type="button" class="delete-button" id="delbtdtst1" data-unique_tb_id="${file.id}">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> 
                                                            </button> 
                                                            
                                                            <div class="dropdown">
               <button class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> 
                <a class="dropdown-itemm chck_slect">
                  Select Files </a>
                  <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                  View </a>
            </div>
            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    console.error('Unexpected response format:', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }
    
   
        $('body').on('click', '#StautoryReg_sbo_countt', function() {
            const location  = $(this).data('location');
            fetchSecretarialStatutoryRegistersSBOFileData(location);
        });
   
    
    
    function fetchSecretarialStatutoryRegistersRPBFileData(location , real_file_name) {
        // Show loading message before fetching data
        $('#filesTableRPB tbody').html('<tr><td colspan="8" style="text-align:center;" >Loading...</td></tr>');

        $.ajax({
            url: '{{ route('fetch-SecretarialStatutoryRegistersRPB-file-data') }}',
            type: 'GET',
            data: { location: location,
                real_file_name: real_file_name
             }, // Pass the location parameter
            success: function(response) {
                
                if (response && Array.isArray(response.files) && response.files.length > 0) {
                    const tableBody = $('#filesTableRPB tbody');
                    tableBody.empty();

                    response.files.forEach(file => {
                        const fileName = file.file_name.split('/').pop();
                        const fileSize = (file.file_size / 1024).toFixed(2) + ' KB';
                        const createdAt = new Date(file.created_at);

                        // Format the date (e.g., 'MM/DD/YYYY')
                        const formattedDate = createdAt.toLocaleDateString('en-GB', {
                            day: '2-digit',
                            month: '2-digit',
                            year: 'numeric',
                        });
                        const row = `
                            <tr>
                            <td class="check_boox"><input type="checkbox" name="fileCheckbox" value="${fileName}"></td>
                                <td class="file_nammmee">${fileName}</td>
                                <td class="file_dess">${file.descp}</td>
                                <td>${file.fyear}</td>
                                <td>${file.month}</td>
                                <td>${fileSize}</td>
                                <td>${formattedDate}</td>
                                <td>
                                    <div class="qucik_axec_ain">
                                        <div class="quick_access">
                                      {{--      <a class="dropdown-itemm share_nt" >
                                        <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.668 4.33301C11.7746 4.33301 12.6613 3.43967 12.6613 2.33301C12.6613 1.22634 11.7746 0.333008 10.668 0.333008C9.5613 0.333008 8.66797 1.22634 8.66797 2.33301C8.66797 3.43967 9.5613 4.33301 10.668 4.33301ZM5.33464 4.33301C6.4413 4.33301 7.32797 3.43967 7.32797 2.33301C7.32797 1.22634 6.4413 0.333008 5.33464 0.333008C4.22797 0.333008 3.33464 1.22634 3.33464 2.33301C3.33464 3.43967 4.22797 4.33301 5.33464 4.33301ZM5.33464 5.66634C3.7813 5.66634 0.667969 6.44634 0.667969 7.99967V9.66634H10.0013V7.99967C10.0013 6.44634 6.88797 5.66634 5.33464 5.66634ZM10.668 5.66634C10.4746 5.66634 10.2546 5.67967 10.0213 5.69967C10.7946 6.25967 11.3346 7.01301 11.3346 7.99967V9.66634H15.3346V7.99967C15.3346 6.44634 12.2213 5.66634 10.668 5.66634Z" fill="#8D8D8D"/>
                                        </svg>
                                        </a> --}}
                                        
                                        <a class="dropdown-itemm download_nt" href="{{ url('/download-common-file/${file.id}') }}">
                                        <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_380_4)">
                                                <path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#8D8D8D"/>
                                                <path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#8D8D8D"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_380_4">
                                                 <rect width="13" height="12" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        </a>
                                        <button type="button" class="delete-button" id="delbtdtst1" data-unique_tb_id="${file.id}">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                            </svg> 
                                        </button> 
                                                            
                                                            <div class="dropdown">
                                            <button class="dropbtn show_pp">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                                            <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                                            <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                                            </svg>
                                        </button>
                                        <div id="myDropdown3" class="dropdown-content"> 
                                            <a class="dropdown-itemm chck_slect">
                                            Select Files </a>
                                            <a class="dropdown-itemm open_eye_pdf" href="{{ url('/showfile/${file.id}') }}" target="_blank">
                                            View </a>
                                        </div>
            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                } else {
                    // Show "No data found" message if files array is empty
                    $('#filesTableRPB tbody').html('<tr><td colspan="8" style="text-align:center;" > No data found. </td></tr>');
                    // console.error('Unexpected response format:', response);
                }
            },
            error: function(xhr, status, error) {
                $('#filesTableRPB tbody').html(`
                    <tr>
                        <td colspan="8" style="text-align:center;">
                            Something went wrong. Please try again ...
                            <a class="type_number getparm" 
                                    data-location=${location}
                                    data-real_file_name=${real_file_name}
                                    
                                    id="StautoryReg_ballot_countt" type="button">
                                Refresh
                            </a>
                        </td>
                    </tr>
                `);


                // console.error('Failed to fetch data:', status, error);
            }
        });
    }
    
   
        $('body').on('click', '#StautoryReg_ballot_countt', function() {
            const location  = $(this).data('location');
            const real_file_name  = $(this).data('real_file_name');
             $('.common_title').html(real_file_name);

            fetchSecretarialStatutoryRegistersRPBFileData( location , real_file_name );
        });
    
    });


</script>


