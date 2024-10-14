


<!-- Secretarial / Director Resignation DIR-11 form
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
    function fetchdirectorresignationdir11Data() {
        $.ajax({
            url: '{{ route('fetch-directorresignationdir11-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-directresi11-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-directresi11-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData31() {
        $.ajax({
            url: '{{ route('fetch-directorresignationdir11-data') }}',
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
    $('body').on('click', "#dir_11_fsubmit", function() {
        $('#dir_11f_pop').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#dir_11_fsubmit'); // Select the submit button

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
                            fetchdirectorresignationdir11Data();
                            refreshTableData31();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#director_DIR_11form_pop').modal('hide'); // Hide the modal
                            $('#entries-count-directresi11-td').text(response.count);
                            $('#total-size-directresi11-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#dir_11f_pop')[0].reset(); // Reset the form
                                $('#dir_11f_pop').find('input[type="file"]').each(function() {
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
                        fetchdirectorresignationdir11Data();
                            refreshTableData31();
                            
                            $('#director_DIR_11form_pop').modal('hide'); // Hide the modal
                            $('#entries-count-directresi11-td').text(response.count);
                            $('#total-size-directresi11-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#dir_11f_pop')[0].reset(); // Reset the form
                                $('#dir_11f_pop').find('input[type="file"]').each(function() {
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
                   fetchdirectorresignationdir11Data();
                            refreshTableData31();
                             
                            $('#director_DIR_11form_pop').modal('hide'); // Hide the modal
                            $('#entries-count-directresi11-td').text(response.count);
                            $('#total-size-directresi11-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#dir_11f_pop')[0].reset(); // Reset the form
                                $('#dir_11f_pop').find('input[type="file"]').each(function() {
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
    fetchdirectorresignationdir11Data();
    });



});
</script>


     <script>
$(document).ready(function() {
    function fetchdirectorresignationdir11FileData() {
        $.ajax({
            url: '{{ route('fetch-directorresignationdir11-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTabledir11form tbody');
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
         <button type="button" class="delete-button" id="delbtdtst31" data-unique_tb_id="${file.id}">
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
    
    

$('body').on('click', '#director_DIR_11form_countt', function() {
            fetchdirectorresignationdir11FileData();
        });
    fetchdirectorresignationdir11FileData();

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst31', function() {
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


<!-- Secretarial / Director Resignation DIR-11 form script end -->



<!-- Secretarial / Director Resignation DIR-12 form
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
    function fetchdirectorresignationdir12Data() {
        $.ajax({
            url: '{{ route('fetch-directorresignationdir12-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-directresi12-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-directresi12-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData32() {
        $.ajax({
            url: '{{ route('fetch-directorresignationdir12-data') }}',
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
        $('#dir_12f_pop').on('submit', function(e) {
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
                            fetchdirectorresignationdir12Data();
                            refreshTableData32();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#director_DIR_12form_pop').modal('hide'); // Hide the modal
                            $('#entries-count-directresi12-td').text(response.count);
                            $('#total-size-directresi12-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#dir_12f_pop')[0].reset(); // Reset the form
                                $('#dir_12f_pop').find('input[type="file"]').each(function() {
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
                        fetchdirectorresignationdir12Data();
                            refreshTableData32();
                           
                            $('#director_DIR_12form_pop').modal('hide'); // Hide the modal
                            $('#entries-count-directresi12-td').text(response.count);
                            $('#total-size-directresi12-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#dir_12f_pop')[0].reset(); // Reset the form
                                $('#dir_12f_pop').find('input[type="file"]').each(function() {
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
                   fetchdirectorresignationdir12Data();
                            refreshTableData32();
                             
                            $('#director_DIR_12form_pop').modal('hide'); // Hide the modal
                            $('#entries-count-directresi12-td').text(response.count);
                            $('#total-size-directresi12-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#dir_12f_pop')[0].reset(); // Reset the form
                                $('#dir_12f_pop').find('input[type="file"]').each(function() {
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
    fetchdirectorresignationdir12Data();
    });



});
</script>


     <script>
$(document).ready(function() {
    function fetchdirectorresignationdir12FileData() {
        $.ajax({
            url: '{{ route('fetch-directorresignationdir12-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTabledir12form tbody');
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
         <button type="button" class="delete-button" id="delbtdtst32" data-unique_tb_id="${file.id}">
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
    
 
$('body').on('click', '#director_DIR_12form_countt', function() {
            fetchdirectorresignationdir12FileData();
        });
    fetchdirectorresignationdir12FileData();

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst32', function() {
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

<!-- Secretarial / Director Resignation DIR-12 form script end -->



<!-- Secretarial / Deposit Undertakings Form DPT-3
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
    function fetchdepositundertakingsFormDPT3Data() {
        $.ajax({
            url: '{{ route('fetch-depositundertakingsFormDPT3-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-dirdpt3s-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-dirdpt3s-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData33() {
        $.ajax({
            url: '{{ route('fetch-depositundertakingsFormDPT3-data') }}',
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
    $('body').on('click', "#Undertakings_dpt_3_submits", function() {
        $('#Undertakings_dpt_3s').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#Undertakings_dpt_3_submits'); // Select the submit button

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
                            fetchdepositundertakingsFormDPT3Data();
                            refreshTableData33();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#Undertakings_dpt_3_pop').modal('hide'); // Hide the modal
                            $('#entries-count-dirdpt3s-td').text(response.count);
                            $('#total-size-dirdpt3s-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#Undertakings_dpt_3s')[0].reset(); // Reset the form
                                $('#Undertakings_dpt_3s').find('input[type="file"]').each(function() {
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
                        fetchdepositundertakingsFormDPT3Data();
                            refreshTableData33();
                            
                            $('#Undertakings_dpt_3_pop').modal('hide'); // Hide the modal
                            $('#entries-count-dirdpt3s-td').text(response.count);
                            $('#total-size-dirdpt3s-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#Undertakings_dpt_3s')[0].reset(); // Reset the form
                                $('#Undertakings_dpt_3s').find('input[type="file"]').each(function() {
                                    resetFileInput($(this)); // Reset file inputs
                                });
                                clearSelectedFile(); // Clear selected file div
                                clearBrowserCache(); // Clear browser cache
                                submitButton.prop('disabled', false); // Re-enable the submit button
                                isSubmitting = false; // Reset submitting flag
                    }
                },
                error: function() {
                    hideLoader(); // Hide loader if there is an error
                    $('.button-spinner').remove(); // Remove spinner from the button
                   fetchdepositundertakingsFormDPT3Data();
                            refreshTableData33();
                             toastr.error('File upload failed!'); // Display error toaster message
                            $('#Undertakings_dpt_3_pop').modal('hide'); // Hide the modal
                            $('#entries-count-dirdpt3s-td').text(response.count);
                            $('#total-size-dirdpt3s-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#Undertakings_dpt_3s')[0].reset(); // Reset the form
                                $('#Undertakings_dpt_3s').find('input[type="file"]').each(function() {
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
    fetchdepositundertakingsFormDPT3Data();
    });



});
</script>


     <script>
$(document).ready(function() {
    function fetchdepositundertakingsFormDPT3FileData() {
        $.ajax({
            url: '{{ route('fetch-depositundertakingsFormDPT3-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTabledirdpt3 tbody');
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
         <button type="button" class="delete-button" id="delbtdtst33" data-unique_tb_id="${file.id}">
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
    
    
    

$('body').on('click', '#Undertakings_dpt_3_countt', function() {
            fetchdepositundertakingsFormDPT3FileData();
        });
    fetchdepositundertakingsFormDPT3FileData();


});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst33', function() {
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

<!-- Secretarial / Deposit Undertakings Form DPT-3 script end -->




<!-- Auditor Exits ADT-3 form
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
    function fetchAuditorExitsADT3FormData() {
        $.ajax({
            url: '{{ route('fetch-AuditorExitsADT3Form-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-adt3form-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-adt3form-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData34() {
        $.ajax({
            url: '{{ route('fetch-AuditorExitsADT3Form-data') }}',
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
    $('body').on('click', "#adtexit_adt_submit", function() {
        $('#adtexit_adt').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#adtexit_adt_submit'); // Select the submit button

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
                            fetchAuditorExitsADT3FormData();
                            refreshTableData34();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#aduitexit_ADT_3_pop').modal('hide'); // Hide the modal
                            $('#entries-count-adt3form-td').text(response.count);
                            $('#total-size-adt3form-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#adtexit_adt')[0].reset(); // Reset the form
                                $('#adtexit_adt').find('input[type="file"]').each(function() {
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
                        fetchAuditorExitsADT3FormData();
                            refreshTableData34();
                           
                            $('#aduitexit_ADT_3_pop').modal('hide'); // Hide the modal
                            $('#entries-count-adt3form-td').text(response.count);
                            $('#total-size-adt3form-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#adtexit_adt')[0].reset(); // Reset the form
                                $('#adtexit_adt').find('input[type="file"]').each(function() {
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
                   fetchAuditorExitsADT3FormData();
                            refreshTableData34();
                             
                            $('#aduitexit_ADT_3_pop').modal('hide'); // Hide the modal
                            $('#entries-count-adt3form-td').text(response.count);
                            $('#total-size-adt3form-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#adtexit_adt')[0].reset(); // Reset the form
                                $('#adtexit_adt').find('input[type="file"]').each(function() {
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
    fetchAuditorExitsADT3FormData();
    });




});
</script>


     <script>
$(document).ready(function() {
    function fetchAuditorExitsADT3FormFileData() {
        $.ajax({
            url: '{{ route('fetch-AuditorExitsADT3Form-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableaudadt3 tbody');
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
         <button type="button" class="delete-button" id="delbtdtst34" data-unique_tb_id="${file.id}">
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
    
    
 

$('body').on('click', '#aduitexit_ADT_3_countt', function() {
            fetchAuditorExitsADT3FormFileData();
        });
    fetchAuditorExitsADT3FormFileData();

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst34', function() {
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

<!-- Secretarial / Auditor Exits ADT-3 form script end -->



<!-- Auditor Exits Resignation letter by auditor
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
    function fetchAuditorExitsResignletteraudFData() {
        $.ajax({
            url: '{{ route('fetch-AuditorExitsResignletteraudF-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-resiaud-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-resiaud-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData35() {
        $.ajax({
            url: '{{ route('fetch-AuditorExitsResignletteraudF-data') }}',
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
    $('body').on('click', "#auditexit_regni_submit", function() {
        $('#auditexit_regni').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#auditexit_regni_submit'); // Select the submit button

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
                            fetchAuditorExitsResignletteraudFData();
                            refreshTableData35();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#auditexit_regnisation_pop').modal('hide'); // Hide the modal
                            $('#entries-count-resiaud-td').text(response.count);
                            $('#total-size-resiaud-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#auditexit_regni')[0].reset(); // Reset the form
                                $('#auditexit_regni').find('input[type="file"]').each(function() {
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
                        fetchAuditorExitsResignletteraudFData();
                            refreshTableData35();
                            
                            $('#auditexit_regnisation_pop').modal('hide'); // Hide the modal
                            $('#entries-count-resiaud-td').text(response.count);
                            $('#total-size-resiaud-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#auditexit_regni')[0].reset(); // Reset the form
                                $('#auditexit_regni').find('input[type="file"]').each(function() {
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
                   fetchAuditorExitsResignletteraudFData();
                            refreshTableData35();
                             
                            $('#auditexit_regnisation_pop').modal('hide'); // Hide the modal
                            $('#entries-count-resiaud-td').text(response.count);
                            $('#total-size-resiaud-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#auditexit_regni')[0].reset(); // Reset the form
                                $('#auditexit_regni').find('input[type="file"]').each(function() {
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
    fetchAuditorExitsResignletteraudFData();
    });




});
</script>


     <script>
$(document).ready(function() {
    function fetchAuditorExitsResignletteraudFFileData() {
        $.ajax({
            url: '{{ route('fetch-AuditorExitsResignletteraudF-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableresiaud tbody');
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
         <button type="button" class="delete-button" id="delbtdtst35" data-unique_tb_id="${file.id}">
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
    
    
  
$('body').on('click', '#auditexit_regnisation_countt', function() {
            fetchAuditorExitsResignletteraudFFileData();
        });
    fetchAuditorExitsResignletteraudFFileData();

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst35', function() {
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


<!-- Secretarial / Auditor Exits Resignation letter by auditor script end -->




<!-- Auditor Exits Details of the grounds for seeking removal of auditor
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
    function fetchAuditorExitsResignDetofgroundsseekremaudFData() {
        $.ajax({
            url: '{{ route('fetch-AuditorExitsResignDetofgroundsseekremaudF-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-audiground-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-audiground-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData36() {
        $.ajax({
            url: '{{ route('fetch-AuditorExitsResignDetofgroundsseekremaudF-data') }}',
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
    $('body').on('click', "#auditexit_dgs_submit", function() {
        $('#auditexit_dgs').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#auditexit_dgs_submit'); // Select the submit button

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
                            fetchAuditorExitsResignDetofgroundsseekremaudFData();
                            refreshTableData36();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#auditexit_dgs_pop').modal('hide'); // Hide the modal
                            $('#entries-count-audiground-td').text(response.count);
                            $('#total-size-audiground-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#auditexit_dgs')[0].reset(); // Reset the form
                                $('#auditexit_dgs').find('input[type="file"]').each(function() {
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
                        fetchAuditorExitsResignDetofgroundsseekremaudFData();
                            refreshTableData36();
                            
                            $('#auditexit_dgs_pop').modal('hide'); // Hide the modal
                            $('#entries-count-audiground-td').text(response.count);
                            $('#total-size-audiground-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#auditexit_dgs')[0].reset(); // Reset the form
                                $('#auditexit_dgs').find('input[type="file"]').each(function() {
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
                   fetchAuditorExitsResignDetofgroundsseekremaudFData();
                            refreshTableData36();
                            
                            $('#auditexit_dgs_pop').modal('hide'); // Hide the modal
                            $('#entries-count-audiground-td').text(response.count);
                            $('#total-size-audiground-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#auditexit_dgs')[0].reset(); // Reset the form
                                $('#auditexit_dgs').find('input[type="file"]').each(function() {
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
    fetchAuditorExitsResignDetofgroundsseekremaudFData();
    });




});
</script>


     <script>
$(document).ready(function() {
    function fetchAuditorExitsResignDetofgroundsseekremaudFFileData() {
        $.ajax({
            url: '{{ route('fetch-AuditorExitsResignDetofgroundsseekremaudF-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablegroundaud tbody');
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
         <button type="button" class="delete-button" id="delbtdtst36" data-unique_tb_id="${file.id}">
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
 

$('body').on('click', '#auditexit_dgs_countt', function() {
            fetchAuditorExitsResignDetofgroundsseekremaudFFileData();
        });
    fetchAuditorExitsResignDetofgroundsseekremaudFFileData();

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst36', function() {
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


<!-- Secretarial / Auditor Exits Details of the grounds for seeking removal of auditor script end -->







<!-- Auditor Exits Special Resolution
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
    function fetchAuditorExitsSpecialResolFData() {
        $.ajax({
            url: '{{ route('fetch-AuditorExitsSpecialResolF-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-spiaud-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-spiaud-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData37() {
        $.ajax({
            url: '{{ route('fetch-AuditorExitsSpecialResolF-data') }}',
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
    $('body').on('click', "#auditexit_se_r_submit", function() {
        $('#auditexit_se_r').on('submit', function(e) {
            e.preventDefault();
            
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#auditexit_se_r_submit'); // Select the submit button

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
                            fetchAuditorExitsSpecialResolFData();
                            refreshTableData37();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#auditexit_se_r_pop').modal('hide'); // Hide the modal
                            $('#entries-count-spiaud-td').text(response.count);
                            $('#total-size-spiaud-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#auditexit_se_r')[0].reset(); // Reset the form
                                $('#auditexit_se_r').find('input[type="file"]').each(function() {
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
                        fetchAuditorExitsSpecialResolFData();
                            refreshTableData37();
                            
                            $('#auditexit_se_r_pop').modal('hide'); // Hide the modal
                            $('#entries-count-spiaud-td').text(response.count);
                            $('#total-size-spiaud-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#auditexit_se_r')[0].reset(); // Reset the form
                                $('#auditexit_se_r').find('input[type="file"]').each(function() {
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
                   fetchAuditorExitsSpecialResolFData();
                            refreshTableData37();
                            
                            $('#auditexit_se_r_pop').modal('hide'); // Hide the modal
                            $('#entries-count-spiaud-td').text(response.count);
                            $('#total-size-spiaud-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#auditexit_se_r')[0].reset(); // Reset the form
                                $('#auditexit_se_r').find('input[type="file"]').each(function() {
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
    fetchAuditorExitsSpecialResolFData();
    });




});
</script>


     <script>
$(document).ready(function() {
    function fetchAuditorExitsSpecialResolFFileData() {
        $.ajax({
            url: '{{ route('fetch-AuditorExitsSpecialResolF-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablespiaud tbody');
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
         <button type="button" class="delete-button" id="delbtdtst37" data-unique_tb_id="${file.id}">
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
    
    
    

$('body').on('click', '#auditexit_se_r_countt', function() {
            fetchAuditorExitsSpecialResolFFileData();
        });
    fetchAuditorExitsSpecialResolFFileData();

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst37', function() {
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

<!-- Secretarial / Auditor Exits Special Resolution script end -->




<!-- Auditor ExitsADT-2 (Application for removal of auditor(s) before expiry of term)
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
    function fetchAuditorExitsADT2FormData() {
        $.ajax({
            url: '{{ route('fetch-AuditorExitsADT2Form-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-audadt2s-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-audadt2s-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData38() {
        $.ajax({
            url: '{{ route('fetch-AuditorExitsADT2Form-data') }}',
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
    $('body').on('click', "#auditexit_ADT_submits", function() {
        $('#auditexit_ADTs').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#auditexit_ADT_submits'); // Select the submit button

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
                            fetchAuditorExitsADT2FormData();
                            refreshTableData38();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#auditexit_ADT_2_pop').modal('hide'); // Hide the modal
                            $('#entries-count-audadt2s-td').text(response.count);
                            $('#total-size-audadt2s-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#auditexit_ADTs')[0].reset(); // Reset the form
                                $('#auditexit_ADTs').find('input[type="file"]').each(function() {
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
                        fetchAuditorExitsADT2FormData();
                            refreshTableData38();
                           
                            $('#auditexit_ADT_2_pop').modal('hide'); // Hide the modal
                            $('#entries-count-audadt2s-td').text(response.count);
                            $('#total-size-audadt2s-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#auditexit_ADTs')[0].reset(); // Reset the form
                                $('#auditexit_ADTs').find('input[type="file"]').each(function() {
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
                   fetchAuditorExitsADT2FormData();
                            refreshTableData38();
                             
                            $('#auditexit_ADT_2_pop').modal('hide'); // Hide the modal
                            $('#entries-count-audadt2s-td').text(response.count);
                            $('#total-size-audadt2s-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#auditexit_ADTs')[0].reset(); // Reset the form
                                $('#auditexit_ADTs').find('input[type="file"]').each(function() {
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
    fetchAuditorExitsADT2FormData();
    });



});
</script>


     <script>
$(document).ready(function() {
    function fetchAuditorExitsADT2FormFileData() {
        $.ajax({
            url: '{{ route('fetch-AuditorExitsADT2Form-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableadt2auds tbody');
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
         <button type="button" class="delete-button" id="delbtdtst38" data-unique_tb_id="${file.id}">
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
  
$('body').on('click', '#auditexit_ADT_2_countt', function() {
            fetchAuditorExitsADT2FormFileData();
        });
    fetchAuditorExitsADT2FormFileData();

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst38', function() {
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


<!-- Secretarial / Auditor Exits ADT-2 (Application for removal of auditor(s) before expiry of term) script end -->





<!-- Charter documents / Director Details / Director 1 Aadhar KYC
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
    function fetchDirector1AadharKYCFData() {
        $.ajax({
            url: '{{ route('fetch-Director1AadharKYCF-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-aadhardir1-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-aadhardir1-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData39() {
        $.ajax({
            url: '{{ route('fetch-Director1AadharKYCF-data') }}',
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
    $('body').on('click', "#director1_aadhar_submit", function() {
        $('#director1_aadhar').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#director1_aadhar_submit'); // Select the submit button

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
                            fetchDirector1AadharKYCFData();
                            refreshTableData39();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#director1_aadhar_pop').modal('hide'); // Hide the modal
                            $('#entries-count-aadhardir1-td').text(response.count);
                            $('#total-size-aadhardir1-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#director1_aadhar')[0].reset(); // Reset the form
                                $('#director1_aadhar').find('input[type="file"]').each(function() {
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
                        fetchDirector1AadharKYCFData();
                            refreshTableData39();
                           
                            $('#director1_aadhar_pop').modal('hide'); // Hide the modal
                            $('#entries-count-aadhardir1-td').text(response.count);
                            $('#total-size-aadhardir1-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#director1_aadhar')[0].reset(); // Reset the form
                                $('#director1_aadhar').find('input[type="file"]').each(function() {
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
                   fetchDirector1AadharKYCFData();
                            refreshTableData39();
                            
                            $('#director1_aadhar_pop').modal('hide'); // Hide the modal
                            $('#entries-count-aadhardir1-td').text(response.count);
                            $('#total-size-aadhardir1-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#director1_aadhar')[0].reset(); // Reset the form
                                $('#director1_aadhar').find('input[type="file"]').each(function() {
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
    fetchDirector1AadharKYCFData();
    });

    

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchDirector1AadharKYCFFileData() {
        $.ajax({
            url: '{{ route('fetch-Director1AadharKYCF-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablechardir1aadhar tbody');
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
         <button type="button" class="delete-button" id="delbtdtst39" data-unique_tb_id="${file.id}">
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

  $('body').on('click', '#director1_aadhar_countt', function() {
            fetchDirector1AadharKYCFFileData();
        });
    fetchDirector1AadharKYCFFileData();

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst39', function() {
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

<!-- Charter documents / Director Details / Director 1 Aadhar KYC script end -->





<!-- Charter documents / Director Details / Director 1 Address Proof
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
    function fetchDirector1AddressProofFData() {
        $.ajax({
            url: '{{ route('fetch-Director1AddressProofF-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-addressproof-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-addressproof-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData40() {
        $.ajax({
            url: '{{ route('fetch-Director1AddressProofF-data') }}',
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
    $('body').on('click', "#director1_addressproof_submit", function() {
        $('#director1_addressproof').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#director1_addressproof_submit'); // Select the submit button

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
                            fetchDirector1AddressProofFData();
                            refreshTableData40();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#director1_addressproof_pop').modal('hide'); // Hide the modal
                            $('#entries-count-addressproof-td').text(response.count);
                            $('#total-size-addressproof-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#director1_addressproof')[0].reset(); // Reset the form
                                $('#director1_addressproof').find('input[type="file"]').each(function() {
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
                        fetchDirector1AddressProofFData();
                            refreshTableData40();
                           
                            $('#director1_addressproof_pop').modal('hide'); // Hide the modal
                            $('#entries-count-addressproof-td').text(response.count);
                            $('#total-size-addressproof-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#director1_addressproof')[0].reset(); // Reset the form
                                $('#director1_addressproof').find('input[type="file"]').each(function() {
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
                   fetchDirector1AddressProofFData();
                            refreshTableData40();
                            
                            $('#director1_addressproof_pop').modal('hide'); // Hide the modal
                            $('#entries-count-addressproof-td').text(response.count);
                            $('#total-size-addressproof-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#director1_addressproof')[0].reset(); // Reset the form
                                $('#director1_addressproof').find('input[type="file"]').each(function() {
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
    fetchDirector1AddressProofFData();
    });

   

});
</script>


     <script>
$(document).ready(function() {
    function fetchDirector1AddressProofFFileData() {
        $.ajax({
            url: '{{ route('fetch-Director1AddressProofF-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablechardir1address tbody');
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
         <button type="button" class="delete-button" id="delbtdtst40" data-unique_tb_id="${file.id}">
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
    // Call fetchBoardFileMinBookData initially when the page loads
    fetchDirector1AddressProofFFileData();

   $('body').on('click', '#director1_addressproof_countt', function() {
            fetchDirector1AddressProofFFileData();
        });
    fetchDirector1AddressProofFFileData();

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst40', function() {
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


<!-- Charter documents / Director Details / Director 1 Address Proof script end -->


<!-- Charter documents / Director Details / Director 1 Contact Details
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
    function fetchDirector1ContactDetailsFData() {
        $.ajax({
            url: '{{ route('fetch-Director1ContactDetailsF-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-contactp-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-contactp-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData41() {
        $.ajax({
            url: '{{ route('fetch-Director1ContactDetailsF-data') }}',
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
    $('body').on('click', "#director1_contactdetails_submit", function() {
        $('#director1_contactdetails').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#director1_contactdetails_submit'); // Select the submit button

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
                            fetchDirector1ContactDetailsFData();
                            refreshTableData41();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#director1_contactdetails_pop').modal('hide'); // Hide the modal
                            $('#entries-count-contactp-td').text(response.count);
                            $('#total-size-contactp-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#director1_contactdetails')[0].reset(); // Reset the form
                                $('#director1_contactdetails').find('input[type="file"]').each(function() {
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
                        fetchDirector1ContactDetailsFData();
                            refreshTableData41();
                            
                            $('#director1_contactdetails_pop').modal('hide'); // Hide the modal
                            $('#entries-count-contactp-td').text(response.count);
                            $('#total-size-contactp-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#director1_contactdetails')[0].reset(); // Reset the form
                                $('#director1_contactdetails').find('input[type="file"]').each(function() {
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
                   fetchDirector1ContactDetailsFData();
                            refreshTableData41();
                             
                            $('#director1_contactdetails_pop').modal('hide'); // Hide the modal
                            $('#entries-count-contactp-td').text(response.count);
                            $('#total-size-contactp-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#director1_contactdetails')[0].reset(); // Reset the form
                                $('#director1_contactdetails').find('input[type="file"]').each(function() {
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
    fetchDirector1ContactDetailsFData();
    });

    

   
});
</script>


     <script>
$(document).ready(function() {
    function fetchDirector1ContactDetailsFFileData() {
        $.ajax({
            url: '{{ route('fetch-Director1ContactDetailsF-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablechardir1contact tbody');
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
         <button type="button" class="delete-button" id="delbtdtst41" data-unique_tb_id="${file.id}">
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
    fetchDirector1ContactDetailsFFileData();
    
    
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

     $('body').on('click', '#director1_contactdetails_countt', function() {
            fetchDirector1ContactDetailsFFileData();
        });
    fetchDirector1ContactDetailsFFileData();

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst41', function() {
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



<!-- Charter documents / Director Details / Director 1 Contact Details script end -->



<!-- Charter documents / Director Details / Director 1 PAN KYC
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
    function fetchDirector1PANKYCFData() {
        $.ajax({
            url: '{{ route('fetch-Director1PANKYCF-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-pankycdir1-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-pankycdir1-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData42() {
        $.ajax({
            url: '{{ route('fetch-Director1PANKYCF-data') }}',
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
    $('body').on('click', "#director1_pan_submit", function() {
        $('#director1_pan').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#director1_pan_submit'); // Select the submit button

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
                            fetchDirector1PANKYCFData();
                            refreshTableData42();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#director1_pan_pop').modal('hide'); // Hide the modal
                            $('#entries-count-pankycdir1-td').text(response.count);
                            $('#total-size-pankycdir1-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#director1_pan')[0].reset(); // Reset the form
                                $('#director1_pan').find('input[type="file"]').each(function() {
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
                        fetchDirector1PANKYCFData();
                            refreshTableData42();
                           
                            $('#director1_pan_pop').modal('hide'); // Hide the modal
                            $('#entries-count-pankycdir1-td').text(response.count);
                            $('#total-size-pankycdir1-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#director1_pan')[0].reset(); // Reset the form
                                $('#director1_pan').find('input[type="file"]').each(function() {
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
                   fetchDirector1PANKYCFData();
                            refreshTableData42();
                             
                            $('#director1_pan_pop').modal('hide'); // Hide the modal
                            $('#entries-count-pankycdir1-td').text(response.count);
                            $('#total-size-pankycdir1-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#director1_pan')[0].reset(); // Reset the form
                                $('#director1_pan').find('input[type="file"]').each(function() {
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
    fetchDirector1PANKYCFData();
    });

    

   
});
</script>


     <script>
$(document).ready(function() {
    function fetchDirector1PANKYCFFileData() {
        $.ajax({
            url: '{{ route('fetch-Director1PANKYCF-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablechardir1pankyc tbody');
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
         <button type="button" class="delete-button" id="delbtdtst42" data-unique_tb_id="${file.id}">
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
$('body').on('click', '#director1_pan_countt', function() {
            fetchDirector1PANKYCFFileData();
        });
    fetchDirector1PANKYCFFileData();

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst42', function() {
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

<!-- Charter documents / Director Details / Director 1 PAN KYC script end -->



<!-- Charter documents / Director Details / Director 1 Photo
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
    function fetchDirector1PhotoFData() {
        $.ajax({
            url: '{{ route('fetch-Director1PhotoF-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-photodir1-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-photodir1-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData43() {
        $.ajax({
            url: '{{ route('fetch-Director1PhotoF-data') }}',
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
    $('body').on('click', "#director1_photo_submit", function() {
        $('#director1_photo').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#director1_photo_submit'); // Select the submit button

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
                            fetchDirector1PhotoFData();
                            refreshTableData43();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#director1_photo_pop').modal('hide'); // Hide the modal
                            $('#entries-count-photodir1-td').text(response.count);
                            $('#total-size-photodir1-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#director1_photo')[0].reset(); // Reset the form
                                $('#director1_photo').find('input[type="file"]').each(function() {
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
                        fetchDirector1PhotoFData();
                            refreshTableData43();
                           
                            $('#director1_photo_pop').modal('hide'); // Hide the modal
                            $('#entries-count-photodir1-td').text(response.count);
                            $('#total-size-photodir1-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#director1_photo')[0].reset(); // Reset the form
                                $('#director1_photo').find('input[type="file"]').each(function() {
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
                   fetchDirector1PhotoFData();
                            refreshTableData43();
                             
                            $('#director1_photo_pop').modal('hide'); // Hide the modal
                            $('#entries-count-photodir1-td').text(response.count);
                            $('#total-size-photodir1-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#director1_photo')[0].reset(); // Reset the form
                                $('#director1_photo').find('input[type="file"]').each(function() {
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
    fetchDirector1PhotoFData();
    
    
    });

    

   
});
</script>


     <script>
$(document).ready(function() {
    function fetchDirector1PhotoFFileData() {
        $.ajax({
            url: '{{ route('fetch-Director1PhotoF-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablechardir1photo tbody');
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
         <button type="button" class="delete-button" id="delbtdtst43" data-unique_tb_id="${file.id}">
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

     $('body').on('click', '#director1_photo_countt', function() {
            fetchDirector1PhotoFFileData();
        });
    fetchDirector1PhotoFFileData();

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst43', function() {
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

<!-- Charter documents / Director Details / Director 1 Photo script end -->



<!-- Charter documents / Director Details / Director 1 Signature image
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
    function fetchDirector1SignimgFData() {
        $.ajax({
            url: '{{ route('fetch-Director1SignimgF-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-signdir1-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-signdir1-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData44() {
        $.ajax({
            url: '{{ route('fetch-Director1SignimgF-data') }}',
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
    $('body').on('click', "#director1_signature_submit", function() {
        $('#director1_signature').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#director1_signature_submit'); // Select the submit button

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
                            fetchDirector1SignimgFData();
                            refreshTableData44();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#director1_signature_pop').modal('hide'); // Hide the modal
                            $('#entries-count-signdir1-td').text(response.count);
                            $('#total-size-signdir1-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#director1_signature')[0].reset(); // Reset the form
                                $('#director1_signature').find('input[type="file"]').each(function() {
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
                        fetchDirector1SignimgFData();
                            refreshTableData44();
                            
                            $('#director1_signature_pop').modal('hide'); // Hide the modal
                            $('#entries-count-signdir1-td').text(response.count);
                            $('#total-size-signdir1-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#director1_signature')[0].reset(); // Reset the form
                                $('#director1_signature').find('input[type="file"]').each(function() {
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
                   fetchDirector1SignimgFData();
                            refreshTableData44();
                             
                            $('#director1_signature_pop').modal('hide'); // Hide the modal
                            $('#entries-count-signdir1-td').text(response.count);
                            $('#total-size-signdir1-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#director1_signature')[0].reset(); // Reset the form
                                $('#director1_signature').find('input[type="file"]').each(function() {
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
    fetchDirector1SignimgFData();
    });



    
});
</script>


     <script>
$(document).ready(function() {
    function fetchDirector1SignimgFFileData() {
        $.ajax({
            url: '{{ route('fetch-Director1SignimgF-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablechardir1sign tbody');
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
 
 <a class="dropdown-itemm download_nt"  href="{{ url('/download-common-file/${file.id}') }}">
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
         <button type="button" class="delete-button" id="delbtdtst44" data-unique_tb_id="${file.id}">
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

    $('body').on('click', '#director1_signature_countt', function() {
            fetchDirector1SignimgFFileData();
        });
    fetchDirector1SignimgFFileData();

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst44', function() {
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

<!-- Charter documents / Director Details / Director 1 Signature image end -->










<!-- Charter documents / Director Details / Director 2 Aadhar KYC
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
    function fetchDirector2AadharKYCFData() {
        $.ajax({
            url: '{{ route('fetch-Director2AadharKYCF-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-aadhardir2-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-aadhardir2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData392() {
        $.ajax({
            url: '{{ route('fetch-Director2AadharKYCF-data') }}',
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
    $('body').on('click', "#director2_aadhar_submit", function() {
        $('#director2_aadhar').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#director2_aadhar_submit'); // Select the submit button

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
                            fetchDirector2AadharKYCFData();
                            refreshTableData392();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#director2_aadhar_pop').modal('hide'); // Hide the modal
                            $('#entries-count-aadhardir2-td').text(response.count);
                            $('#total-size-aadhardir2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#director2_aadhar')[0].reset(); // Reset the form
                                $('#director2_aadhar').find('input[type="file"]').each(function() {
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
                        fetchDirector2AadharKYCFData();
                            refreshTableData392();
                            
                            $('#director2_aadhar_pop').modal('hide'); // Hide the modal
                            $('#entries-count-aadhardir2-td').text(response.count);
                            $('#total-size-aadhardir2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#director2_aadhar')[0].reset(); // Reset the form
                                $('#director2_aadhar').find('input[type="file"]').each(function() {
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
                   fetchDirector2AadharKYCFData();
                            refreshTableData392();
                            
                            $('#director2_aadhar_pop').modal('hide'); // Hide the modal
                            $('#entries-count-aadhardir2-td').text(response.count);
                            $('#total-size-aadhardir2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#director2_aadhar')[0].reset(); // Reset the form
                                $('#director2_aadhar').find('input[type="file"]').each(function() {
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
    fetchDirector2AadharKYCFData();
    });

    

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchDirector2AadharKYCFFileData() {
        $.ajax({
            url: '{{ route('fetch-Director2AadharKYCF-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablechardir2aadhar tbody');
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
         <button type="button" class="delete-button" id="delbtdtst45" data-unique_tb_id="${file.id}">
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

  $('body').on('click', '#director2_aadhar_countt', function() {
            fetchDirector2AadharKYCFFileData();
        });
    fetchDirector2AadharKYCFFileData();

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst45', function() {
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

<!-- Charter documents / Director Details / Director 2 Aadhar KYC script end -->





<!-- Charter documents / Director Details / Director 2 Address Proof
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
    function fetchDirector2AddressProofFData() {
        $.ajax({
            url: '{{ route('fetch-Director2AddressProofF-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-addressproof2-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-addressproof2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData402() {
        $.ajax({
            url: '{{ route('fetch-Director2AddressProofF-data') }}',
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
    $('body').on('click', "#director2_addressproof_submit", function() {
        $('#director2_addressproof').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#director2_addressproof_submit'); // Select the submit button

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
                            fetchDirector2AddressProofFData();
                            refreshTableData402();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#director2_addressproof_pop').modal('hide'); // Hide the modal
                            $('#entries-count-addressproof2-td').text(response.count);
                            $('#total-size-addressproof2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#director2_addressproof')[0].reset(); // Reset the form
                                $('#director2_addressproof').find('input[type="file"]').each(function() {
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
                        fetchDirector2AddressProofFData();
                            refreshTableData402();
                            
                            $('#director2_addressproof_pop').modal('hide'); // Hide the modal
                            $('#entries-count-addressproof2-td').text(response.count);
                            $('#total-size-addressproof2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#director2_addressproof')[0].reset(); // Reset the form
                                $('#director2_addressproof').find('input[type="file"]').each(function() {
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
                   fetchDirector2AddressProofFData();
                            refreshTableData402();
                             
                            $('#director2_addressproof_pop').modal('hide'); // Hide the modal
                            $('#entries-count-addressproof2-td').text(response.count);
                            $('#total-size-addressproof2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#director2_addressproof')[0].reset(); // Reset the form
                                $('#director2_addressproof').find('input[type="file"]').each(function() {
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
    fetchDirector2AddressProofFData();
    });

    

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchDirector2AddressProofFFileData() {
        $.ajax({
            url: '{{ route('fetch-Director2AddressProofF-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablechardir2address tbody');
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
         <button type="button" class="delete-button" id="delbtdtst46" data-unique_tb_id="${file.id}">
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

   $('body').on('click', '#director2_addressproof_countt', function() {
            fetchDirector2AddressProofFFileData();
        });
    fetchDirector2AddressProofFFileData();

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst46', function() {
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


<!-- Charter documents / Director Details / Director 2 Address Proof script end -->


<!-- Charter documents / Director Details / Director 2 Contact Details
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
    function fetchDirector2ContactDetailsFData() {
        $.ajax({
            url: '{{ route('fetch-Director2ContactDetailsF-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-contactp2-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-contactp2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData412() {
        $.ajax({
            url: '{{ route('fetch-Director2ContactDetailsF-data') }}',
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
    $('body').on('click', "#director2_contactdetails_submit", function() {
        $('#director2_contactdetails').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#director2_contactdetails_submit'); // Select the submit button

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
                            fetchDirector2ContactDetailsFData();
                            refreshTableData412();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#director2_contactdetails_pop').modal('hide'); // Hide the modal
                            $('#entries-count-contactp2-td').text(response.count);
                            $('#total-size-contactp2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#director2_contactdetails')[0].reset(); // Reset the form
                                $('#director2_contactdetails').find('input[type="file"]').each(function() {
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
                        fetchDirector2ContactDetailsFData();
                            refreshTableData412();
                            
                            $('#director2_contactdetails_pop').modal('hide'); // Hide the modal
                            $('#entries-count-contactp2-td').text(response.count);
                            $('#total-size-contactp2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#director2_contactdetails')[0].reset(); // Reset the form
                                $('#director2_contactdetails').find('input[type="file"]').each(function() {
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
                   fetchDirector2ContactDetailsFData();
                            refreshTableData412();
                             
                            $('#director2_contactdetails_pop').modal('hide'); // Hide the modal
                            $('#entries-count-contactp2-td').text(response.count);
                            $('#total-size-contactp2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#director2_contactdetails')[0].reset(); // Reset the form
                                $('#director2_contactdetails').find('input[type="file"]').each(function() {
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
    fetchDirector2ContactDetailsFData();
    });

  

   
});
</script>


     <script>
$(document).ready(function() {
    function fetchDirector2ContactDetailsFFileData() {
        $.ajax({
            url: '{{ route('fetch-Director2ContactDetailsF-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablechardir2contact tbody');
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
         <button type="button" class="delete-button"id="delbtdtst47" data-unique_tb_id="${file.id}">
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

    $('body').on('click', '#director2_contactdetails_countt', function() {
            fetchDirector2ContactDetailsFFileData();
        });
    fetchDirector2ContactDetailsFFileData();

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst47', function() {
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

<!-- Charter documents / Director Details / Director 2 Contact Details script end -->



<!-- Charter documents / Director Details / Director 2 PAN KYC
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
    function fetchDirector2PANKYCFData() {
        $.ajax({
            url: '{{ route('fetch-Director2PANKYCF-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-pankycdir2-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-pankycdir2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData422() {
        $.ajax({
            url: '{{ route('fetch-Director2PANKYCF-data') }}',
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
    $('body').on('click', "#director2_pan_submit", function() {
        $('#director2_pan').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#director2_pan_submit'); // Select the submit button

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
                            fetchDirector2PANKYCFData();
                            refreshTableData422();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#director2_pan_pop').modal('hide'); // Hide the modal
                            $('#entries-count-pankycdir2-td').text(response.count);
                            $('#total-size-pankycdir2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#director2_pan')[0].reset(); // Reset the form
                                $('#director2_pan').find('input[type="file"]').each(function() {
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
                        fetchDirector2PANKYCFData();
                            refreshTableData422();
                           
                            $('#director2_pan_pop').modal('hide'); // Hide the modal
                            $('#entries-count-pankycdir2-td').text(response.count);
                            $('#total-size-pankycdir2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#director2_pan')[0].reset(); // Reset the form
                                $('#director2_pan').find('input[type="file"]').each(function() {
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
                   fetchDirector2PANKYCFData();
                            refreshTableData422();
                            
                            $('#director2_pan_pop').modal('hide'); // Hide the modal
                            $('#entries-count-pankycdir2-td').text(response.count);
                            $('#total-size-pankycdir2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#director2_pan')[0].reset(); // Reset the form
                                $('#director2_pan').find('input[type="file"]').each(function() {
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
    fetchDirector2PANKYCFData();
    });

  

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchDirector2PANKYCFFileData() {
        $.ajax({
            url: '{{ route('fetch-Director2PANKYCF-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablechardir2pankyc tbody');
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
         <button type="button" class="delete-button" id="delbtdtst48" data-unique_tb_id="${file.id}">
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

     $('body').on('click', '#director2_pan_countt', function() {
            fetchDirector2PANKYCFFileData();
        });
    fetchDirector2PANKYCFFileData();

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst48', function() {
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



<!-- Charter documents / Director Details / Director 2 PAN KYC script end -->



<!-- Charter documents / Director Details / Director 1 Photo
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
    function fetchDirector2PhotoFData() {
        $.ajax({
            url: '{{ route('fetch-Director2PhotoF-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-photodir2-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-photodir2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData432() {
        $.ajax({
            url: '{{ route('fetch-Director2PhotoF-data') }}',
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
    $('body').on('click', "#director2_photo_submit", function() {
        $('#director2_photo').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#director2_photo_submit'); // Select the submit button

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
                            fetchDirector2PhotoFData();
                            refreshTableData432();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#director2_photo_pop').modal('hide'); // Hide the modal
                            $('#entries-count-photodir2-td').text(response.count);
                            $('#total-size-photodir2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#director2_photo')[0].reset(); // Reset the form
                                $('#director2_photo').find('input[type="file"]').each(function() {
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
                        fetchDirector2PhotoFData();
                            refreshTableData432();
                            
                            $('#director2_photo_pop').modal('hide'); // Hide the modal
                            $('#entries-count-photodir2-td').text(response.count);
                            $('#total-size-photodir2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#director2_photo')[0].reset(); // Reset the form
                                $('#director2_photo').find('input[type="file"]').each(function() {
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
                   fetchDirector2PhotoFData();
                            refreshTableData432();
                            
                            $('#director2_photo_pop').modal('hide'); // Hide the modal
                            $('#entries-count-photodir2-td').text(response.count);
                            $('#total-size-photodir2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#director2_photo')[0].reset(); // Reset the form
                                $('#director2_photo').find('input[type="file"]').each(function() {
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
    fetchDirector2PhotoFData();
    });

  

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchDirector2PhotoFFileData() {
        $.ajax({
            url: '{{ route('fetch-Director2PhotoF-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablechardir2photo tbody');
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
         <button type="button" class="delete-button" id="delbtdtst49" data-unique_tb_id="${file.id}">
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
     $('body').on('click', '#director2_photo_countt', function() {
            fetchDirector2PhotoFFileData();
        });
    fetchDirector2PhotoFFileData();

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst49', function() {
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


<!-- Charter documents / Director Details / Director 2 Photo script end -->



<!-- Charter documents / Director Details / Director 2 Signature image
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
    function fetchDirector2SignimgFData() {
        $.ajax({
            url: '{{ route('fetch-Director2SignimgF-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-signdir2-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-signdir2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData442() {
        $.ajax({
            url: '{{ route('fetch-Director2SignimgF-data') }}',
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
    $('body').on('click', "#director2_signature_submit", function() {
        $('#director2_signature').on('submit', function(e) {
            e.preventDefault();
            
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#director2_signature_submit'); // Select the submit button

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
                            fetchDirector2SignimgFData();
                            refreshTableData442();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#director2_signature_pop').modal('hide'); // Hide the modal
                            $('#entries-count-signdir2-td').text(response.count);
                            $('#total-size-signdir2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#director2_signature')[0].reset(); // Reset the form
                                $('#director2_signature').find('input[type="file"]').each(function() {
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
                        fetchDirector2SignimgFData();
                            refreshTableData442();
                            
                            $('#director2_signature_pop').modal('hide'); // Hide the modal
                            $('#entries-count-signdir2-td').text(response.count);
                            $('#total-size-signdir2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#director2_signature')[0].reset(); // Reset the form
                                $('#director2_signature').find('input[type="file"]').each(function() {
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
                   fetchDirector2SignimgFData();
                            refreshTableData442();
                             
                            $('#director1_signature_pop').modal('hide'); // Hide the modal
                            $('#entries-count-signdir2-td').text(response.count);
                            $('#total-size-signdir2-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#director2_signature')[0].reset(); // Reset the form
                                $('#director2_signature').find('input[type="file"]').each(function() {
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
    fetchDirector2SignimgFData();
    });

    

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchDirector2SignimgFFileData() {
        $.ajax({
            url: '{{ route('fetch-Director2SignimgF-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablechardir2sign tbody');
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
         <button type="button" class="delete-button" id="delbtdtst50" data-unique_tb_id="${file.id}">
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
    
    $('body').on('click', '#director2_signature_countt', function() {
            fetchDirector2SignimgFFileData();
        });
    fetchDirector2SignimgFFileData();

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst50', function() {
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

<!-- Charter documents / Director Details / Director 2 Signature image end -->



<!-- Charter documents / Incorporation Articles of Association
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
    function fetchIncorporationArtofAssocFData() {
        $.ajax({
            url: '{{ route('fetch-IncorporationArtofAssocF-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-incarts-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-incarts-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData777() {
        $.ajax({
            url: '{{ route('fetch-IncorporationArtofAssocF-data') }}',
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
    $('body').on('click', "#inco_aoa_submit", function() {
        $('#inco_aoa').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#inco_aoa_submit'); // Select the submit button

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
                            fetchIncorporationArtofAssocFData();
                            refreshTableData777();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#inco_aoa_pop').modal('hide'); // Hide the modal
                            $('#entries-count-incarts-td').text(response.count);
                            $('#total-size-incarts-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#inco_aoa')[0].reset(); // Reset the form
                                $('#inco_aoa').find('input[type="file"]').each(function() {
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
                        fetchIncorporationArtofAssocFData();
                            refreshTableData777();
                           
                            $('#inco_aoa_pop').modal('hide'); // Hide the modal
                            $('#entries-count-incarts-td').text(response.count);
                            $('#total-size-incarts-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#inco_aoa')[0].reset(); // Reset the form
                                $('#inco_aoa').find('input[type="file"]').each(function() {
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
                   fetchIncorporationArtofAssocFData();
                            refreshTableData777();
                            
                            $('#inco_aoa_pop').modal('hide'); // Hide the modal
                            $('#entries-count-incarts-td').text(response.count);
                            $('#total-size-incarts-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#inco_aoa')[0].reset(); // Reset the form
                                $('#inco_aoa').find('input[type="file"]').each(function() {
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
    fetchIncorporationArtofAssocFData();
    });

   

   
});
</script>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log('jQuery is loaded and ready!');
        });
    </script>

     <script>
$(document).ready(function() {
    function fetchIncorporationArtofAssocFFileData() {
        $.ajax({
            url: '{{ route('fetch-IncorporationArtofAssocF-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableincart tbody');
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
         <button type="button" class="delete-button" id="delbtdtst51" data-unique_tb_id="${file.id}">
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

    $('body').on('click', '#inco_aoa_countt', function() {
            fetchIncorporationArtofAssocFFileData();
        });
    fetchIncorporationArtofAssocFFileData();

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst51', function() {
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

<!-- Charter documents / Incorporation Articles of Association end -->



<!-- Charter documents / Incorporation Certificate of incorporation
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
    function fetchIncorporationCertifofincorpFData() {
        $.ajax({
            url: '{{ route('fetch-IncorporationCertifofincorpF-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-incart0-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-incart0-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData1incart() {
        $.ajax({
            url: '{{ route('fetch-IncorporationCertifofincorpF-data') }}',
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
    $('body').on('click', "#inco_coi_submit", function() {
        $('#inco_coi').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#inco_coi_submit'); // Select the submit button

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
                            fetchIncorporationCertifofincorpFData();
                            refreshTableData1incart();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#inco_coi_pop').modal('hide'); // Hide the modal
                            $('#entries-count-incart0-td').text(response.count);
                            $('#total-size-incart0-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#inco_coi')[0].reset(); // Reset the form
                                $('#inco_coi').find('input[type="file"]').each(function() {
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
                        fetchIncorporationCertifofincorpFData();
                            refreshTableData1incart();
                            
                            $('#inco_coi_pop').modal('hide'); // Hide the modal
                            $('#entries-count-incart0-td').text(response.count);
                            $('#total-size-incart0-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#inco_coi')[0].reset(); // Reset the form
                                $('#inco_coi').find('input[type="file"]').each(function() {
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
                   fetchIncorporationCertifofincorpFData();
                            refreshTableData1incart();
                             
                            $('#inco_coi_pop').modal('hide'); // Hide the modal
                            $('#entries-count-incart0-td').text(response.count);
                            $('#total-size-incart0-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#inco_coi')[0].reset(); // Reset the form
                                $('#inco_coi').find('input[type="file"]').each(function() {
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
    fetchIncorporationCertifofincorpFData();
    });

   

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchIncorporationCertifofincorpFFileData() {
        $.ajax({
            url: '{{ route('fetch-IncorporationCertifofincorpF-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableincart1 tbody');
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
         <button type="button" class="delete-button" id="delbtdtst52" data-unique_tb_id="${file.id}">
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
    $('body').on('click', '#inco_coi_countt', function() {
            fetchIncorporationCertifofincorpFFileData();
        });
    fetchIncorporationCertifofincorpFFileData();

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst52', function() {
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

<!-- Charter documents / Incorporation Certificate of incorporation end -->


<!-- Charter documents / Incorporation Memorandum of Association script end -->


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
    function fetchCharterdocumentsIncorporationMemorandumofAssociationData() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsIncorporationMemorandumofAssociation-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-chardocmomdd-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-chardocmomdd-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData4421() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsIncorporationMemorandumofAssociation-data') }}',
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
    $('body').on('click', "#inco_Moa_submit", function() {
        $('#inco_Moa').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#inco_Moa_submit'); // Select the submit button

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
                            fetchCharterdocumentsIncorporationMemorandumofAssociationData();
                            refreshTableData4421();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#inco_Moa_pop').modal('hide'); // Hide the modal
                            $('#entries-count-chardocmomdd-td').text(response.count);
                            $('#total-size-chardocmomdd-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#inco_Moa')[0].reset(); // Reset the form
                                $('#inco_Moa').find('input[type="file"]').each(function() {
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
                        fetchCharterdocumentsIncorporationMemorandumofAssociationData();
                            refreshTableData4421();
                            
                            $('#inco_Moa_pop').modal('hide'); // Hide the modal
                            $('#entries-count-chardocmomdd-td').text(response.count);
                            $('#total-size-chardocmomdd-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#inco_Moa')[0].reset(); // Reset the form
                                $('#inco_Moa').find('input[type="file"]').each(function() {
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
                   fetchCharterdocumentsIncorporationMemorandumofAssociationData();
                            refreshTableData4421();
                            
                            $('#inco_Moa_pop').modal('hide'); // Hide the modal
                            $('#entries-count-chardocmomdd-td').text(response.count);
                            $('#total-size-chardocmomdd-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#inco_Moa')[0].reset(); // Reset the form
                                $('#inco_Moa').find('input[type="file"]').each(function() {
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
    fetchCharterdocumentsIncorporationMemorandumofAssociationData();
    });

   

   
});
</script>


     <script>
$(document).ready(function() {
    function fetchCharterdocumentsIncorporationMemorandumofAssociationFileData() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsIncorporationMemorandumofAssociation-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablecharmom1 tbody');
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
         <button type="button" class="delete-button" id="delbtdtst53" data-unique_tb_id="${file.id}">
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

    $('body').on('click', '#inco_Moa_countt', function() {
            fetchCharterdocumentsIncorporationMemorandumofAssociationFileData();
        });
    fetchCharterdocumentsIncorporationMemorandumofAssociationFileData();

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst53', function() {
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



<!-- Charter documents / Incorporation Memorandum of Association script end -->




<!-- Charter documents / Incorporation Partnership deed script end -->


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
    function fetchIncorporationPartnerdeedFData() {
        $.ajax({
            url: '{{ route('fetch-IncorporationPartnerdeedF-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-partnership_deed-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-partnership_deed-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData44210() {
        $.ajax({
            url: '{{ route('fetch-IncorporationPartnerdeedF-data') }}',
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
    $('body').on('click', "#inco_partnerdeep_submmit", function() {
        $('#inco_partnerdeep').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#inco_partnerdeep_submmit'); // Select the submit button

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
                            fetchIncorporationPartnerdeedFData();
                            refreshTableData44210();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#inco_partnerdeep_pop').modal('hide'); // Hide the modal
                            $('#entries-count-partnership_deed-td').text(response.count);
                            $('#total-size-partnership_deed-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#inco_partnerdeep')[0].reset(); // Reset the form
                                $('#inco_partnerdeep').find('input[type="file"]').each(function() {
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
                        fetchIncorporationPartnerdeedFData();
                            refreshTableData44210();
                            
                            $('#inco_partnerdeep_pop').modal('hide'); // Hide the modal
                            $('#entries-count-partnership_deed-td').text(response.count);
                            $('#total-size-partnership_deed-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#inco_partnerdeep')[0].reset(); // Reset the form
                                $('#inco_partnerdeep').find('input[type="file"]').each(function() {
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
                    fetchIncorporationPartnerdeedFData();
                            refreshTableData44210();
                             
                            $('#inco_partnerdeep_pop').modal('hide'); // Hide the modal
                            $('#entries-count-partnership_deed-td').text(response.count);
                            $('#total-size-partnership_deed-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#inco_partnerdeep')[0].reset(); // Reset the form
                                $('#inco_partnerdeep').find('input[type="file"]').each(function() {
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
    fetchIncorporationPartnerdeedFData();
    });

   

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchIncorporationPartnerdeedFFileData() {
        $.ajax({
            url: '{{ route('fetch-IncorporationPartnerdeedF-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablecharpartdeed tbody');
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
         <button type="button" class="delete-button" id="delbtdtst54" data-unique_tb_id="${file.id}">
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

    $('body').on('click', '#inco_partnerdeep_countt', function() {
            fetchIncorporationPartnerdeedFFileData();
        });
    fetchIncorporationPartnerdeedFFileData();

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst54', function() {
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



<!-- Charter documents / Incorporation Partnership deed script end -->





<!-- Charter documents / Incorporation LLP Agreement script end -->


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
    function fetchIncorporationLLPAgreementFData() {
        $.ajax({
            url: '{{ route('fetch-IncorporationLLPAgreementF-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-llp_agreement-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-llp_agreement-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData442101() {
        $.ajax({
            url: '{{ route('fetch-IncorporationLLPAgreementF-data') }}',
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
    $('body').on('click', "#inco_llpaggree_submit", function() {
        $('#inco_llpaggree').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#inco_llpaggree_submit'); // Select the submit button

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
                            fetchIncorporationLLPAgreementFData();
                            refreshTableData442101();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#inco_llpaggree_pop').modal('hide'); // Hide the modal
                            $('#entries-count-llp_agreement-td').text(response.count);
                            $('#total-size-llp_agreement-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#inco_llpaggree')[0].reset(); // Reset the form
                                $('#inco_llpaggree').find('input[type="file"]').each(function() {
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
                        fetchIncorporationLLPAgreementFData();
                            refreshTableData442101();
                            
                            $('#inco_llpaggree_pop').modal('hide'); // Hide the modal
                            $('#entries-count-llp_agreement-td').text(response.count);
                            $('#total-size-llp_agreement-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#inco_llpaggree')[0].reset(); // Reset the form
                                $('#inco_llpaggree').find('input[type="file"]').each(function() {
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
                    fetchIncorporationLLPAgreementFData();
                            refreshTableData442101();
                            
                            $('#inco_llpaggree_pop').modal('hide'); // Hide the modal
                            $('#entries-count-llp_agreement-td').text(response.count);
                            $('#total-size-llp_agreement-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#inco_llpaggree')[0].reset(); // Reset the form
                                $('#inco_llpaggree').find('input[type="file"]').each(function() {
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
    fetchIncorporationLLPAgreementFData();
    });

    

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchIncorporationLLPAgreementFFileData() {
        $.ajax({
            url: '{{ route('fetch-IncorporationLLPAgreementF-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablecharllpagree tbody');
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
         <button type="button" class="delete-button" id="delbtdtst55" data-unique_tb_id="${file.id}">
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

    $('body').on('click', '#inco_llpaggree_countt', function() {
            fetchIncorporationLLPAgreementFFileData();
        });
    fetchIncorporationLLPAgreementFFileData();

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst55', function() {
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



<!-- Charter documents / Incorporation LLP Agreement script end -->




<!-- Charter documents / Incorporation Trust Deed script end -->


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
    function fetchIncorporationTrustDeedFData() {
        $.ajax({
            url: '{{ route('fetch-IncorporationTrustDeedF-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-trust_deed-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-trust_deed-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData442102() {
        $.ajax({
            url: '{{ route('fetch-IncorporationTrustDeedF-data') }}',
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
    $('body').on('click', "#inco_trustdeed_submit", function() {
        $('#inco_trustdeed').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#inco_trustdeed_submit'); // Select the submit button

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
                            fetchIncorporationTrustDeedFData();
                            refreshTableData442102();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#inco_trustdeed_pop').modal('hide'); // Hide the modal
                            $('#entries-count-trust_deed-td').text(response.count);
                            $('#total-size-trust_deed-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#inco_trustdeed')[0].reset(); // Reset the form
                                $('#inco_trustdeed').find('input[type="file"]').each(function() {
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
                        fetchIncorporationTrustDeedFData();
                            refreshTableData442102();
                           
                            $('#inco_trustdeed_pop').modal('hide'); // Hide the modal
                            $('#entries-count-trust_deed-td').text(response.count);
                            $('#total-size-trust_deed-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#inco_trustdeed')[0].reset(); // Reset the form
                                $('#inco_trustdeed').find('input[type="file"]').each(function() {
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
                    fetchIncorporationTrustDeedFData();
                            refreshTableData442102();
                           
                            $('#inco_trustdeed_pop').modal('hide'); // Hide the modal
                            $('#entries-count-trust_deed-td').text(response.count);
                            $('#total-size-trust_deed-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#inco_trustdeed')[0].reset(); // Reset the form
                                $('#inco_trustdeed').find('input[type="file"]').each(function() {
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
    fetchIncorporationTrustDeedFData();
    });

    

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchIncorporationTrustDeedFFileData() {
        $.ajax({
            url: '{{ route('fetch-IncorporationTrustDeedF-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablechartrustdeed tbody');
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
         <button type="button" class="delete-button" id="delbtdtst56" data-unique_tb_id="${file.id}">
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
 

     $('body').on('click', '#inco_trustdeed_countt', function() {
            fetchIncorporationTrustDeedFFileData();
        });
    fetchIncorporationTrustDeedFFileData();

});
</script>


<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst56', function() {
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


<!-- Charter documents / Incorporation Trust Deed script end -->



<!-- Charter documents / Incorporation Share certificates script end -->


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
    function fetchIncorporationSharecertifFData() {
        $.ajax({
            url: '{{ route('fetch-IncorporationSharecertifF-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-share_certificates-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-share_certificates-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData442103() {
        $.ajax({
            url: '{{ route('fetch-IncorporationSharecertifF-data') }}',
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
    $('body').on('click', "#inco_sharecertificate_submit", function() {
        $('#inco_sharecertificate').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#inco_sharecertificate_submit'); // Select the submit button

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
                            fetchIncorporationSharecertifFData();
                            refreshTableData442103();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#inco_sharecertificate_pop').modal('hide'); // Hide the modal
                            $('#entries-count-share_certificates-td').text(response.count);
                            $('#total-size-share_certificates-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#fileUploadForm')[0].reset(); // Reset the form
                                $('#fileUploadForm').find('input[type="file"]').each(function() {
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
                        fetchIncorporationSharecertifFData();
                            refreshTableData442103();
                           
                            $('#inco_sharecertificate_pop').modal('hide'); // Hide the modal
                            $('#entries-count-share_certificates-td').text(response.count);
                            $('#total-size-share_certificates-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#inco_sharecertificate')[0].reset(); // Reset the form
                                $('#inco_sharecertificate').find('input[type="file"]').each(function() {
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
                    fetchIncorporationSharecertifFData();
                            refreshTableData442103();
                             
                            $('#inco_sharecertificate_pop').modal('hide'); // Hide the modal
                            $('#entries-count-share_certificates-td').text(response.count);
                            $('#total-size-share_certificates-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#inco_sharecertificate')[0].reset(); // Reset the form
                                $('#inco_sharecertificate').find('input[type="file"]').each(function() {
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
    fetchIncorporationSharecertifFData();
    });

   

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchIncorporationSharecertifFFileData() {
        $.ajax({
            url: '{{ route('fetch-IncorporationSharecertifF-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablecharshareit tbody');
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
         <button type="button" class="delete-button" id="delbtdtst57" data-unique_tb_id="${file.id}">
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

    $('body').on('click', '#inco_sharecertificate_countt', function() {
            fetchIncorporationSharecertifFFileData();
        });
    fetchIncorporationSharecertifFFileData();

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst57', function() {
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



<!-- Charter documents / Incorporation Share certificates script end -->



<!-- Charter documents / Registrations PAN certificate script start -->


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
    function fetchCharterdocumentsRegistrationsPANData() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsPAN-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-786-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableData786() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsPAN-data') }}',
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
    $('body').on('click', "#Regist_pan_submit", function() {
        $('#Regist_pan').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#Regist_pan_submit'); // Select the submit button

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
                            fetchCharterdocumentsRegistrationsPANData();
                            refreshTableData786();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#Regist_pan_pop').modal('hide'); // Hide the modal
                            $('#entries-count-786-td').text(response.count);
                            $('#total-size-786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#Regist_pan')[0].reset(); // Reset the form
                                $('#Regist_pan').find('input[type="file"]').each(function() {
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
                        fetchCharterdocumentsRegistrationsPANData();
                            refreshTableData786();
                            
                            $('#Regist_pan_pop').modal('hide'); // Hide the modal
                            $('#entries-count-786-td').text(response.count);
                            $('#total-size-786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#Regist_pan')[0].reset(); // Reset the form
                                $('#Regist_pan').find('input[type="file"]').each(function() {
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
                    fetchCharterdocumentsRegistrationsPANData();
                            refreshTableData786();
                             
                            $('#Regist_pan_pop').modal('hide'); // Hide the modal
                            $('#entries-count-786-td').text(response.count);
                            $('#total-size-786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#Regist_pan')[0].reset(); // Reset the form
                                $('#Regist_pan').find('input[type="file"]').each(function() {
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
    fetchCharterdocumentsRegistrationsPANData();
    });

   

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchCharterdocumentsRegistrationsPANFileData() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsPAN-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablecharregpan tbody');
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
         <button type="button" class="delete-button" id="delbtdtst58" data-unique_tb_id="${file.id}">
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
    

    $('body').on('click', '#Regist_pan_countt', function() {
            fetchCharterdocumentsRegistrationsPANFileData();
        });
    fetchCharterdocumentsRegistrationsPANFileData();

});
</script>


<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst58', function() {
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



<!-- Charter documents / Registrations PAN certificate script end -->



<!-- Charter documents / Registrations TAN certificate script start -->
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
    function fetchCharterdocumentsRegistrationsTANData() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsTAN-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-786tan-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-786tan-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableDatatan786() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsTAN-data') }}',
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
    $('body').on('click', "#Regist_tan_submit", function() {
        $('#Regist_tan').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#Regist_tan_submit'); // Select the submit button

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
                            fetchCharterdocumentsRegistrationsTANData();
                            refreshTableDatatan786();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#Regist_tan_pop').modal('hide'); // Hide the modal
                            $('#entries-count-786tan-td').text(response.count);
                            $('#total-size-786tan-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#Regist_tan')[0].reset(); // Reset the form
                                $('#Regist_tan').find('input[type="file"]').each(function() {
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
                        fetchCharterdocumentsRegistrationsTANData();
                            refreshTableDatatan786();
                            
                            $('#Regist_tan_pop').modal('hide'); // Hide the modal
                            $('#entries-count-786tan-td').text(response.count);
                            $('#total-size-786tan-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#Regist_tan')[0].reset(); // Reset the form
                                $('#Regist_tan').find('input[type="file"]').each(function() {
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
                    fetchCharterdocumentsRegistrationsTANData();
                            refreshTableDatatan786();
                             
                            $('#Regist_tan_pop').modal('hide'); // Hide the modal
                            $('#entries-count-786tan-td').text(response.count);
                            $('#total-size-786tan-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#Regist_tan')[0].reset(); // Reset the form
                                $('#Regist_tan').find('input[type="file"]').each(function() {
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
    fetchCharterdocumentsRegistrationsTANData();
    });

   

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchCharterdocumentsRegistrationsTANFileData() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsTAN-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTabletan786 tbody');
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
         <button type="button" class="delete-button" id="delbtdtst59" data-unique_tb_id="${file.id}">
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

    $('body').on('click', '#Regist_tan_countt', function() {
            fetchCharterdocumentsRegistrationsTANFileData();
        });
    fetchCharterdocumentsRegistrationsTANFileData();

});
</script>


<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst59', function() {
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
<!-- Charter documents / Registrations TAN certificate script end -->

<!-- Charter documents / Registrations GSTIN certificate script start -->
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
    function fetchCharterdocumentsRegistrationsGSTINData() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsGSTIN-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-gstin786-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-gstin786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableDatagstin786() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsGSTIN-data') }}',
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
    $('body').on('click', "#Regist_gstin_submit", function() {
        $('#Regist_gstin').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#Regist_gstin_submit'); // Select the submit button

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
                            fetchCharterdocumentsRegistrationsGSTINData();
                            refreshTableDatagstin786();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#Regist_gstin_pop').modal('hide'); // Hide the modal
                            $('#entries-count-gstin786-td').text(response.count);
                            $('#total-size-gstin786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#Regist_gstin')[0].reset(); // Reset the form
                                $('#Regist_gstin').find('input[type="file"]').each(function() {
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
                        fetchCharterdocumentsRegistrationsGSTINData();
                            refreshTableDatagstin786();
                            
                            $('#Regist_gstin_pop').modal('hide'); // Hide the modal
                            $('#entries-count-gstin786-td').text(response.count);
                            $('#total-size-gstin786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#Regist_gstin')[0].reset(); // Reset the form
                                $('#Regist_gstin').find('input[type="file"]').each(function() {
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
                    fetchCharterdocumentsRegistrationsGSTINData();
                            refreshTableDatagstin786();
                             
                            $('#Regist_gstin_pop').modal('hide'); // Hide the modal
                            $('#entries-count-gstin786-td').text(response.count);
                            $('#total-size-gstin786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#Regist_gstin')[0].reset(); // Reset the form
                                $('#Regist_gstin').find('input[type="file"]').each(function() {
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
    fetchCharterdocumentsRegistrationsGSTINData();
    });

   

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchCharterdocumentsRegistrationsGSTINFileData() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsGSTIN-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablegstin786 tbody');
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
         <button type="button" class="delete-button" id="delbtdtst60" data-unique_tb_id="${file.id}">
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

    $('body').on('click', '#Regist_gstin_countt', function() {
            fetchCharterdocumentsRegistrationsGSTINFileData();
        });
    fetchCharterdocumentsRegistrationsGSTINFileData();

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst60', function() {
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
<!-- Charter documents / Registrations GSTIN certificate script end -->

<!-- Charter documents / Registrations MSME certificate script start -->
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
    function fetchCharterdocumentsRegistrationsMSMEData() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsMSME-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-msme786-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-msme786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableDatamsme786() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsMSME-data') }}',
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
    $('body').on('click', "#Regist_msme_submit", function() {
        $('#Regist_msme').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#Regist_msme_submit'); // Select the submit button

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
                            fetchCharterdocumentsRegistrationsMSMEData();
                            refreshTableDatamsme786();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#Regist_msme_pop').modal('hide'); // Hide the modal
                            $('#entries-count-msme786-td').text(response.count);
                            $('#total-size-msme786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#Regist_msme')[0].reset(); // Reset the form
                                $('#Regist_msme').find('input[type="file"]').each(function() {
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
                        fetchCharterdocumentsRegistrationsMSMEData();
                            refreshTableDatamsme786();
                           
                            $('#Regist_msme_pop').modal('hide'); // Hide the modal
                            $('#entries-count-msme786-td').text(response.count);
                            $('#total-size-msme786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#Regist_msme')[0].reset(); // Reset the form
                                $('#Regist_msme').find('input[type="file"]').each(function() {
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
                    fetchCharterdocumentsRegistrationsMSMEData();
                            refreshTableDatamsme786();
                             
                            $('#Regist_msme_pop').modal('hide'); // Hide the modal
                            $('#entries-count-msme786-td').text(response.count);
                            $('#total-size-msme786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#Regist_msme')[0].reset(); // Reset the form
                                $('#Regist_msme').find('input[type="file"]').each(function() {
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
    fetchCharterdocumentsRegistrationsMSMEData();
    });

   

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchCharterdocumentsRegistrationsMSMEFileData() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsMSME-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablemsme786 tbody');
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
         <button type="button" class="delete-button" id="delbtdtst61" data-unique_tb_id="${file.id}">
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

    $('body').on('click', '#Regist_msme_countt', function() {
            fetchCharterdocumentsRegistrationsMSMEFileData();
        });
    fetchCharterdocumentsRegistrationsMSMEFileData();

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst61', function() {
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
<!-- Charter documents / Registrations MSME certificate script end -->

<!-- Charter documents / Registrations Trademark script start -->
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
    function fetchCharterdocumentsRegistrationsTrademarkData() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsTrademark-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-trademark786-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-trademark786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableDatatrademark786() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsTrademark-data') }}',
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
    $('body').on('click', "#Regist_trademark_submit", function() {
        $('#Regist_trademark').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#Regist_trademark_submit'); // Select the submit button

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
                            fetchCharterdocumentsRegistrationsTrademarkData();
                            refreshTableDatatrademark786();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#Regist_trademark_pop').modal('hide'); // Hide the modal
                            $('#entries-count-trademark786-td').text(response.count);
                            $('#total-size-trademark786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#Regist_trademark')[0].reset(); // Reset the form
                                $('#Regist_trademark').find('input[type="file"]').each(function() {
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
                        fetchCharterdocumentsRegistrationsTrademarkData();
                            refreshTableDatatrademark786();
                          
                            $('#Regist_trademark_pop').modal('hide'); // Hide the modal
                            $('#entries-count-trademark786-td').text(response.count);
                            $('#total-size-trademark786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#Regist_trademark')[0].reset(); // Reset the form
                                $('#Regist_trademark').find('input[type="file"]').each(function() {
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
                    fetchCharterdocumentsRegistrationsTrademarkData();
                            refreshTableDatatrademark786();
                             
                            $('#Regist_trademark_pop').modal('hide'); // Hide the modal
                            $('#entries-count-trademark786-td').text(response.count);
                            $('#total-size-trademark786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#Regist_trademark')[0].reset(); // Reset the form
                                $('#Regist_trademark').find('input[type="file"]').each(function() {
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
    fetchCharterdocumentsRegistrationsTrademarkData();
    });

   

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchCharterdocumentsRegistrationsTrademarkFileData() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsTrademark-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTabletrademark786 tbody');
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
         <button type="button" class="delete-button" id="delbtdtst62" data-unique_tb_id="${file.id}">
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
    
    $('body').on('click', '#Regist_trademark_countt', function() {
            fetchCharterdocumentsRegistrationsTrademarkFileData();
        });
    fetchCharterdocumentsRegistrationsTrademarkFileData();

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst62', function() {
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
<!-- Charter documents / Registrations Trademark script end -->

<!-- Charter documents / Registrations Provident Fund certificate script start -->
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
    function fetchCharterdocumentsRegistrationsPFCData() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsPFC-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-pfc786-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-pfc786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableDatapfc786() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsPFC-data') }}',
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
    $('body').on('click', "#Regist_profc_submit", function() {
        $('#Regist_profc').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#Regist_profc_submit'); // Select the submit button

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
                            fetchCharterdocumentsRegistrationsPFCData();
                            refreshTableDatapfc786();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#Regist_profc_pop').modal('hide'); // Hide the modal
                            $('#entries-count-pfc786-td').text(response.count);
                            $('#total-size-pfc786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#Regist_profc')[0].reset(); // Reset the form
                                $('#Regist_profc').find('input[type="file"]').each(function() {
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
                        fetchCharterdocumentsRegistrationsPFCData();
                            refreshTableDatapfc786();
                           
                            $('#Regist_profc_pop').modal('hide'); // Hide the modal
                            $('#entries-count-pfc786-td').text(response.count);
                            $('#total-size-pfc786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#Regist_profc')[0].reset(); // Reset the form
                                $('#Regist_profc').find('input[type="file"]').each(function() {
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
                    fetchCharterdocumentsRegistrationsPFCData();
                            refreshTableDatapfc786();
                             
                            $('#Regist_profc_pop').modal('hide'); // Hide the modal
                            $('#entries-count-pfc786-td').text(response.count);
                            $('#total-size-pfc786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#Regist_profc')[0].reset(); // Reset the form
                                $('#Regist_profc').find('input[type="file"]').each(function() {
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
    fetchCharterdocumentsRegistrationsPFCData();
    });

   

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchCharterdocumentsRegistrationsPFCFileData() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsPFC-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablepfc786 tbody');
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
         <button type="button" class="delete-button" id="delbtdtst63" data-unique_tb_id="${file.id}">
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
    
    $('body').on('click', '#Regist_profc_countt', function() {
            fetchCharterdocumentsRegistrationsPFCFileData();
        });
    fetchCharterdocumentsRegistrationsPFCFileData();

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst63', function() {
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
<!-- Charter documents / Registrations Provident Fund certificate script end -->

<!-- Charter documents / Registrations Employee State Insurance certificate script start -->
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
    function fetchCharterdocumentsRegistrationsESICData() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsESIC-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-esic786-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-esic786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableDataesic786() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsESIC-data') }}',
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
    $('body').on('click', "#Regist_esic_submit", function() {
        $('#Regist_esic').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#Regist_esic_submit'); // Select the submit button

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
                            fetchCharterdocumentsRegistrationsESICData();
                            refreshTableDataesic786();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#Regist_esic_pop').modal('hide'); // Hide the modal
                            $('#entries-count-esic786-td').text(response.count);
                            $('#total-size-esic786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#Regist_esic')[0].reset(); // Reset the form
                                $('#Regist_esic').find('input[type="file"]').each(function() {
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
                        fetchCharterdocumentsRegistrationsESICData();
                            refreshTableDataesic786();
                            
                            $('#Regist_esic_pop').modal('hide'); // Hide the modal
                            $('#entries-count-esic786-td').text(response.count);
                            $('#total-size-esic786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#Regist_esic')[0].reset(); // Reset the form
                                $('#Regist_esic').find('input[type="file"]').each(function() {
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
                    fetchCharterdocumentsRegistrationsESICData();
                            refreshTableDataesic786();
                             
                            $('#Regist_esic_pop').modal('hide'); // Hide the modal
                            $('#entries-count-esic786-td').text(response.count);
                            $('#total-size-esic786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#Regist_esic')[0].reset(); // Reset the form
                                $('#Regist_esic').find('input[type="file"]').each(function() {
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
    fetchCharterdocumentsRegistrationsESICData();
    });

   

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchCharterdocumentsRegistrationsESICFileData() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsESIC-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableesic786 tbody');
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
         <button type="button" class="delete-button" id="delbtdtst64" data-unique_tb_id="${file.id}">
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

    $('body').on('click', '#Regist_esic_countt', function() {
            fetchCharterdocumentsRegistrationsESICFileData();
        });
    fetchCharterdocumentsRegistrationsESICFileData();

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst64', function() {
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
<!-- Charter documents / Registrations Employee State Insurance certificate script end -->

<!-- Charter documents / Registrations Professional Tax certificate script start -->
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
    function fetchCharterdocumentsRegistrationsPTCData() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsPTC-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-ptc786-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-ptc786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableDataptc786() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsPTC-data') }}',
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
    $('body').on('click', "#Regist_protaxcer_submit", function() {
        $('#Regist_protaxcer').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#Regist_protaxcer_submit'); // Select the submit button

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
                            fetchCharterdocumentsRegistrationsPTCData();
                            refreshTableDataptc786();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#Regist_protaxcer_pop').modal('hide'); // Hide the modal
                            $('#entries-count-ptc786-td').text(response.count);
                            $('#total-size-ptc786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#Regist_protaxcer')[0].reset(); // Reset the form
                                $('#Regist_protaxcer').find('input[type="file"]').each(function() {
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
                        fetchCharterdocumentsRegistrationsPTCData();
                            refreshTableDataptc786();
                           
                            $('#Regist_protaxcer_pop').modal('hide'); // Hide the modal
                            $('#entries-count-ptc786-td').text(response.count);
                            $('#total-size-ptc786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#Regist_protaxcer')[0].reset(); // Reset the form
                                $('#Regist_protaxcer').find('input[type="file"]').each(function() {
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
                    fetchCharterdocumentsRegistrationsPTCData();
                            refreshTableDataptc786();
                            
                            $('#Regist_protaxcer_pop').modal('hide'); // Hide the modal
                            $('#entries-count-ptc786-td').text(response.count);
                            $('#total-size-ptc786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#Regist_protaxcer')[0].reset(); // Reset the form
                                $('#Regist_protaxcer').find('input[type="file"]').each(function() {
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
    fetchCharterdocumentsRegistrationsPTCData();
    });

   

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchCharterdocumentsRegistrationsPTCDataFileData() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsPTC-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableptc786 tbody');
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
         <button type="button" class="delete-button" id="delbtdtst65" data-unique_tb_id="${file.id}">
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

    $('body').on('click', '#Regist_protaxcer_countt', function() {
            fetchCharterdocumentsRegistrationsPTCDataFileData();
        });
    fetchCharterdocumentsRegistrationsPTCDataFileData();

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst65', function() {
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
<!-- Charter documents / Registrations Professional Tax certificate script end -->

<!-- Charter documents / Registrations Labour Welfare Fund certificate script start -->
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
    function fetchCharterdocumentsRegistrationsLWFCData() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsLWFC-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-lwfc786-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-lwfc786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableDatalwfc786() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsLWFC-data') }}',
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
    $('body').on('click', "#Regist_lwfc_submit", function() {
        $('#Regist_lwfc').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#Regist_lwfc_submit'); // Select the submit button

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
                            fetchCharterdocumentsRegistrationsLWFCData();
                            refreshTableDatalwfc786();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#Regist_lwfc_pop').modal('hide'); // Hide the modal
                            $('#entries-count-lwfc786-td').text(response.count);
                            $('#total-size-lwfc786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#Regist_lwfc')[0].reset(); // Reset the form
                                $('#Regist_lwfc').find('input[type="file"]').each(function() {
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
                        fetchCharterdocumentsRegistrationsLWFCData();
                            refreshTableDatalwfc786();
                            
                            $('#Regist_lwfc_pop').modal('hide'); // Hide the modal
                            $('#entries-count-lwfc786-td').text(response.count);
                            $('#total-size-lwfc786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#Regist_lwfc')[0].reset(); // Reset the form
                                $('#Regist_lwfc').find('input[type="file"]').each(function() {
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
                    fetchCharterdocumentsRegistrationsLWFCData();
                            refreshTableDatalwfc786();
                             
                            $('#Regist_lwfc_pop').modal('hide'); // Hide the modal
                            $('#entries-count-lwfc786-td').text(response.count);
                            $('#total-size-lwfc786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#Regist_lwfc')[0].reset(); // Reset the form
                                $('#Regist_lwfc').find('input[type="file"]').each(function() {
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
    fetchCharterdocumentsRegistrationsLWFCData();
    });

   

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchCharterdocumentsRegistrationsLWFCFileData() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsLWFC-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablelwfc786 tbody');
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
         <button type="button" class="delete-button" id="delbtdtst66" data-unique_tb_id="${file.id}">
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
    
    $('body').on('click', '#Regist_lwfc_countt', function() {
            fetchCharterdocumentsRegistrationsLWFCFileData();
        });
    fetchCharterdocumentsRegistrationsLWFCFileData();

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst66', function() {
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
<!-- Charter documents / Registrations Labour Welfare Fund certificate script end -->

<!-- Charter documents / Registrations POSH Policy script start -->
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
    function fetchCharterdocumentsRegistrationsPOSHPolicyData() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsPOSHPolicy-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-pp786-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-pp786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableDatapp786() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsPOSHPolicy-data') }}',
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
    $('body').on('click', "#Regist_posh_submit", function() {
        $('#Regist_posh').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#Regist_posh_submit'); // Select the submit button

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
                            fetchCharterdocumentsRegistrationsPOSHPolicyData();
                            refreshTableDatapp786();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#Regist_posh_pop').modal('hide'); // Hide the modal
                            $('#entries-count-pp786-td').text(response.count);
                            $('#total-size-pp786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#Regist_posh')[0].reset(); // Reset the form
                                $('#Regist_posh').find('input[type="file"]').each(function() {
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
                        fetchCharterdocumentsRegistrationsPOSHPolicyData();
                            refreshTableDatapp786();
                           
                            $('#Regist_posh_pop').modal('hide'); // Hide the modal
                            $('#entries-count-pp786-td').text(response.count);
                            $('#total-size-pp786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#Regist_posh')[0].reset(); // Reset the form
                                $('#Regist_posh').find('input[type="file"]').each(function() {
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
                    fetchCharterdocumentsRegistrationsPOSHPolicyData();
                            refreshTableDatapp786();
                             
                            $('#Regist_posh_pop').modal('hide'); // Hide the modal
                            $('#entries-count-pp786-td').text(response.count);
                            $('#total-size-pp786-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#Regist_posh')[0].reset(); // Reset the form
                                $('#Regist_posh').find('input[type="file"]').each(function() {
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
    fetchCharterdocumentsRegistrationsPOSHPolicyData();
    });

   

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchCharterdocumentsRegistrationsPOSHPolicyFileData() {
        $.ajax({
            url: '{{ route('fetch-CharterdocumentsRegistrationsPOSHPolicy-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablepp786 tbody');
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
 </a>  --}}
 
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
         <button type="button" class="delete-button" id="delbtdtst67" data-unique_tb_id="${file.id}">
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

    $('body').on('click', '#Regist_posh_countt', function() {
            fetchCharterdocumentsRegistrationsPOSHPolicyFileData();
        });
    fetchCharterdocumentsRegistrationsPOSHPolicyFileData();

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst67', function() {
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
<!-- Charter documents / Registrations POSH Policy script end -->



<!-- Secretarial / Auditor Appointment Board Resolution for the appointment of Auditor script start -->
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
    function fetchSecretarialAuditorAppointmentBRAAData() {
        $.ajax({
            url: '{{ route('fetch-SecretarialAuditorAppointmentBRAA-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-secbraa-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-secbraa-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableDatasecbraa786() {
        $.ajax({
            url: '{{ route('fetch-SecretarialAuditorAppointmentBRAA-data') }}',
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
    $('body').on('click', "#audit_res_submit", function() {
        $('#adt_res').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#audit_res_submit'); // Select the submit button

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
                            fetchSecretarialAuditorAppointmentBRAAData();
                            refreshTableDatasecbraa786();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#aduit_reso_pop').modal('hide'); // Hide the modal
                            $('#entries-count-secbraa-td').text(response.count);
                            $('#total-size-secbraa-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#adt_res')[0].reset(); // Reset the form
                                $('#adt_res').find('input[type="file"]').each(function() {
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
                        fetchSecretarialAuditorAppointmentBRAAData();
                            refreshTableDatasecbraa786();
                           
                            $('#aduit_reso_pop').modal('hide'); // Hide the modal
                            $('#entries-count-secbraa-td').text(response.count);
                            $('#total-size-secbraa-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#adt_res')[0].reset(); // Reset the form
                                $('#adt_res').find('input[type="file"]').each(function() {
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
                    fetchSecretarialAuditorAppointmentBRAAData();
                            refreshTableDatasecbraa786();
                             
                            $('#aduit_reso_pop').modal('hide'); // Hide the modal
                            $('#entries-count-secbraa-td').text(response.count);
                            $('#total-size-secbraa-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#adt_res')[0].reset(); // Reset the form
                                $('#adt_res').find('input[type="file"]').each(function() {
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
    fetchSecretarialAuditorAppointmentBRAAData();
    });

   

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchSecretarialAuditorAppointmentBRAAFileData() {
        $.ajax({
            url: '{{ route('fetch-SecretarialAuditorAppointmentBRAA-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablesecbraa tbody');
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
         <button type="button" class="delete-button" id="delbtdtst68" data-unique_tb_id="${file.id}">
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

    $('body').on('click', '#aduit_reso_countt', function() {
            fetchSecretarialAuditorAppointmentBRAAFileData();
        });
    fetchSecretarialAuditorAppointmentBRAAFileData();

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst68', function() {
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
<!-- Secretarial / Auditor Appointment Board Resolution for the appointment of Auditor script end -->


<!-- Secretarial / Auditor Appointment Intimation to auditor script start -->
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
    function fetchSecretarialAuditorAppointmentIAData() {
        $.ajax({
            url: '{{ route('fetch-SecretarialAuditorAppointmentIA-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-secIA-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-secIA-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableDatasecia786() {
        $.ajax({
            url: '{{ route('fetch-SecretarialAuditorAppointmentIA-data') }}',
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
    $('body').on('click', "#adt_inti_submit", function() {
        $('#adt_inti').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#adt_inti_submit'); // Select the submit button

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
                            fetchSecretarialAuditorAppointmentIAData();
                            refreshTableDatasecia786();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#audit_Intimation_pop').modal('hide'); // Hide the modal
                            $('#entries-count-secIA-td').text(response.count);
                            $('#total-size-secIA-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#adt_inti')[0].reset(); // Reset the form
                                $('#adt_inti').find('input[type="file"]').each(function() {
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
                        fetchSecretarialAuditorAppointmentIAData();
                            refreshTableDatasecia786();
                           
                            $('#audit_Intimation_pop').modal('hide'); // Hide the modal
                            $('#entries-count-secIA-td').text(response.count);
                            $('#total-size-secIA-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#adt_inti')[0].reset(); // Reset the form
                                $('#adt_inti').find('input[type="file"]').each(function() {
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
                    fetchSecretarialAuditorAppointmentIAData();
                            refreshTableDatasecia786();
                             
                            $('#audit_Intimation_pop').modal('hide'); // Hide the modal
                            $('#entries-count-secIA-td').text(response.count);
                            $('#total-size-secIA-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#adt_inti')[0].reset(); // Reset the form
                                $('#adt_inti').find('input[type="file"]').each(function() {
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
    fetchSecretarialAuditorAppointmentIAData();
    });

   

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchSecretarialAuditorAppointmentIAFileData() {
        $.ajax({
            url: '{{ route('fetch-SecretarialAuditorAppointmentIA-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableSecIA tbody');
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
         <button type="button" class="delete-button" id="delbtdtst69" data-unique_tb_id="${file.id}">
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
    
    $('body').on('click', '#audit_Intimation_countt', function() {
            fetchSecretarialAuditorAppointmentIAFileData();
        });
    fetchSecretarialAuditorAppointmentIAFileData();

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst69', function() {
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
<!-- Secretarial / Auditor Appointment Intimation to auditor script end -->


<!-- Secretarial / Auditor Appointment Letter of appointment script start -->
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
    function fetchSecretarialAuditorAppointmentLAData() {
        $.ajax({
            url: '{{ route('fetch-SecretarialAuditorAppointmentLA-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-secla-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-secla-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableDatasecla786() {
        $.ajax({
            url: '{{ route('fetch-SecretarialAuditorAppointmentLA-data') }}',
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
    $('body').on('click', "#adt_ltr_submit", function() {
        $('#adt_ltr').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#adt_ltr_submit'); // Select the submit button

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
                            fetchSecretarialAuditorAppointmentLAData();
                            refreshTableDatasecla786();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#audit_Letter_pop').modal('hide'); // Hide the modal
                            $('#entries-count-secla-td').text(response.count);
                            $('#total-size-secla-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#adt_ltr')[0].reset(); // Reset the form
                                $('#adt_ltr').find('input[type="file"]').each(function() {
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
                        fetchSecretarialAuditorAppointmentLAData();
                            refreshTableDatasecla786();
                           
                            $('#audit_Letter_pop').modal('hide'); // Hide the modal
                            $('#entries-count-secla-td').text(response.count);
                            $('#total-size-secla-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#adt_ltr')[0].reset(); // Reset the form
                                $('#adt_ltr').find('input[type="file"]').each(function() {
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
                    fetchSecretarialAuditorAppointmentLAData();
                            refreshTableDatasecla786();
                             
                            $('#audit_Letter_pop').modal('hide'); // Hide the modal
                            $('#entries-count-secla-td').text(response.count);
                            $('#total-size-secla-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#adt_ltr')[0].reset(); // Reset the form
                                $('#adt_ltr').find('input[type="file"]').each(function() {
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
    fetchSecretarialAuditorAppointmentLAData();
    });

   

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchSecretarialAuditorAppointmentLAFileData() {
        $.ajax({
            url: '{{ route('fetch-SecretarialAuditorAppointmentLA-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTableSecLA tbody');
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
         <button type="button" class="delete-button" id="delbtdtst70" data-unique_tb_id="${file.id}">
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

    $('body').on('click', '#audit_Letter_countt', function() {
            fetchSecretarialAuditorAppointmentLAFileData();
        });
    fetchSecretarialAuditorAppointmentLAFileData();

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst70', function() {
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
<!-- Secretarial / Auditor Appointment Letter of appointment script end -->



<!-- Secretarial / Auditor Appointment Certificate as per Rule 4 and consent by Auditor for his appointment script start -->
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
    function fetchSecretarialAuditorAppointmentCRCAAData() {
        $.ajax({
            url: '{{ route('fetch-SecretarialAuditorAppointmentCRCAA-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-seccrcaa-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-seccrcaa-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableDataseccrcaa786() {
        $.ajax({
            url: '{{ route('fetch-SecretarialAuditorAppointmentCRCAA-data') }}',
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
    $('body').on('click', "#adt_cr_submit", function() {
        $('#adt_cer').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#adt_cr_submit'); // Select the submit button

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
                            fetchSecretarialAuditorAppointmentCRCAAData();
                            refreshTableDataseccrcaa786();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#audit_Certificate_pop').modal('hide'); // Hide the modal
                            $('#entries-count-seccrcaa-td').text(response.count);
                            $('#total-size-seccrcaa-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#adt_cer')[0].reset(); // Reset the form
                                $('#adt_cer').find('input[type="file"]').each(function() {
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
                        fetchSecretarialAuditorAppointmentCRCAAData();
                            refreshTableDataseccrcaa786();
                            
                            $('#audit_Certificate_pop').modal('hide'); // Hide the modal
                            $('#entries-count-seccrcaa-td').text(response.count);
                            $('#total-size-seccrcaa-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#adt_cer')[0].reset(); // Reset the form
                                $('#adt_cer').find('input[type="file"]').each(function() {
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
                    fetchSecretarialAuditorAppointmentCRCAAData();
                            refreshTableDataseccrcaa786();
                             
                            $('#audit_Certificate_pop').modal('hide'); // Hide the modal
                            $('#entries-count-seccrcaa-td').text(response.count);
                            $('#total-size-seccrcaa-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#adt_cer')[0].reset(); // Reset the form
                                $('#adt_cer').find('input[type="file"]').each(function() {
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
    fetchSecretarialAuditorAppointmentCRCAAData();
    });

   

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchSecretarialAuditorAppointmentCRCAAFileData() {
        $.ajax({
            url: '{{ route('fetch-SecretarialAuditorAppointmentCRCAA-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablecrcaa tbody');
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
         <button type="button" class="delete-button" id="delbtdtst71" data-unique_tb_id="${file.id}">
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

    $('body').on('click', '#audit_Certificate_countt', function() {
            fetchSecretarialAuditorAppointmentCRCAAFileData();
        });
    fetchSecretarialAuditorAppointmentCRCAAFileData();

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst71', function() {
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
<!-- Secretarial / Auditor Appointment Certificate as per Rule 4 and consent by Auditor for his appointment script end -->


<!-- Secretarial / Auditor Appointment Acceptance letter for appointment script start -->
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
    function fetchSecretarialAuditorAppointmentALAData() {
        $.ajax({
            url: '{{ route('fetch-SecretarialAuditorAppointmentALA-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-secaaala-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-secaaala-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableDatasecaaala786() {
        $.ajax({
            url: '{{ route('fetch-SecretarialAuditorAppointmentALA-data') }}',
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
    $('body').on('click', "#adt_accp_pop_submit", function() {
        $('#adt_accp_pop').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#adt_accp_pop_submit'); // Select the submit button

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
                            fetchSecretarialAuditorAppointmentALAData();
                            refreshTableDatasecaaala786();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#audit_Acceptance_pop').modal('hide'); // Hide the modal
                            $('#entries-count-secaaala-td').text(response.count);
                            $('#total-size-secaaala-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#adt_accp_pop')[0].reset(); // Reset the form
                                $('#adt_accp_pop').find('input[type="file"]').each(function() {
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
                        fetchSecretarialAuditorAppointmentALAData();
                            refreshTableDatasecaaala786();
                            
                            $('#audit_Acceptance_pop').modal('hide'); // Hide the modal
                            $('#entries-count-secaaala-td').text(response.count);
                            $('#total-size-secaaala-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#adt_accp_pop')[0].reset(); // Reset the form
                                $('#adt_accp_pop').find('input[type="file"]').each(function() {
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
                    fetchSecretarialAuditorAppointmentALAData();
                            refreshTableDatasecaaala786();
                            
                            $('#audit_Acceptance_pop').modal('hide'); // Hide the modal
                            $('#entries-count-secaaala-td').text(response.count);
                            $('#total-size-secaaala-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#adt_accp_pop')[0].reset(); // Reset the form
                                $('#adt_accp_pop').find('input[type="file"]').each(function() {
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
    fetchSecretarialAuditorAppointmentALAData();
    });

   

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchSecretarialAuditorAppointmentALAFileData() {
        $.ajax({
            url: '{{ route('fetch-SecretarialAuditorAppointmentALA-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablesecaaala tbody');
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
         <button type="button" class="delete-button" id="delbtdtst72" data-unique_tb_id="${file.id}">
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

    $('body').on('click', '#audit_Acceptance_countt', function() {
            fetchSecretarialAuditorAppointmentALAFileData();
        });
    fetchSecretarialAuditorAppointmentALAFileData();

});
</script>
<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst72', function() {
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
<!-- Secretarial / Auditor Appointment Acceptance letter for appointment script end -->


<!-- Secretarial / Auditor Appointment Special Resolution script start -->
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
    function fetchSecretarialAuditorAppointmentSRData() {
        $.ajax({
            url: '{{ route('fetch-SecretarialAuditorAppointmentSR-data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('Fetched data:', response);

                // Update content inside the <span> with id="entries-countminbook-td"
                $('#entries-count-secaasr-td').text(response.count);

                

                // Update content inside the <span> with id="total-size-tdsecboard"
                $('#total-size-secaasr-td').text((response.totalSize / 1024).toFixed(2) + ' KB');

                
            },
            error: function(xhr, status, error) {
                console.error('Failed to fetch data:', status, error);
            }
        });
    }

    // Function to refresh table data
    function refreshTableDatasecaasr786() {
        $.ajax({
            url: '{{ route('fetch-SecretarialAuditorAppointmentSR-data') }}',
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
    $('body').on('click', "#adt_ress_p_submit", function() {
        $('#adt_ress_p').on('submit', function(e) {
            e.preventDefault();
            
            if (isSubmitting) return; // Prevent multiple submissions

                isSubmitting = true; // Set submitting flag

            var formData = new FormData(this);
            var submitButton = $('#adt_ress_p_submit'); // Select the submit button

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
                            fetchSecretarialAuditorAppointmentSRData();
                            refreshTableDatasecaasr786();
                            toastr.success('File uploaded successfully!'); // Display success toaster message
                            $('#audit_Resolution_pop').modal('hide'); // Hide the modal
                            $('#entries-count-secaasr-td').text(response.count);
                            $('#total-size-secaasr-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                            $('#adt_ress_p')[0].reset(); // Reset the form
                                $('#adt_ress_p').find('input[type="file"]').each(function() {
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
                        fetchSecretarialAuditorAppointmentSRData();
                            refreshTableDatasecaasr786();
                            
                            $('#audit_Resolution_pop').modal('hide'); // Hide the modal
                            $('#entries-count-secaasr-td').text(response.count);
                            $('#total-size-secaasr-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                        $('#adt_ress_p')[0].reset(); // Reset the form
                                $('#adt_ress_p').find('input[type="file"]').each(function() {
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
                    fetchSecretarialAuditorAppointmentSRData();
                            refreshTableDatasecaasr786();
                            
                            $('#audit_Resolution_pop').modal('hide'); // Hide the modal
                            $('#entries-count-secaasr-td').text(response.count);
                            $('#total-size-secaasr-td').text((response.totalSize / 1024).toFixed(2) + ' KB');
                    $('#adt_ress_p')[0].reset(); // Reset the form
                                $('#adt_ress_p').find('input[type="file"]').each(function() {
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
    fetchSecretarialAuditorAppointmentSRData();
    });

   

    
});
</script>


     <script>
$(document).ready(function() {
    function fetchSecretarialAuditorAppointmentSRFileData() {
        $.ajax({
            url: '{{ route('fetch-SecretarialAuditorAppointmentSR-file-data') }}',
            type: 'GET',
            success: function(response) {
                if (response && Array.isArray(response.files)) {
                    const tableBody = $('#filesTablesecaasr tbody');
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
         <button type="button" class="delete-button" id="delbtdtst73" data-unique_tb_id="${file.id}">
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

    $('body').on('click', '#audit_Resolution_countt', function() {
            fetchSecretarialAuditorAppointmentSRFileData();
        });
    fetchSecretarialAuditorAppointmentSRFileData();

});
</script>

<script>
    // sandeep soft delete operation start here
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#delbtdtst73', function() {
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
<!-- Secretarial / Auditor Appointment Special Resolution script end -->