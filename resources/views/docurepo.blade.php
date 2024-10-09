@extends('user.includes.document-repository') @section('content')
 @include('script1')
 @include('script2')
    <!-- tap on top starts-->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>window.jQuery || document.write('<script src="{{ asset('assets/js/jquerylocal.js') }}"><\/script>')</script>

     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     

     <script>
    (function() {
        var script = document.createElement('script');
        script.src = 'https://code.jquery.com/jquery-3.7.1.min.js';
        script.async = true;
        document.head.appendChild(script);
    })();
</script>
<style>
    <style>
        .share_people {
            display: none;
            position: absolute;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            width: 200px;
        }
        .delete-button {
    border: 0;
    outline: none;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #373737;
    border-radius: 50px;
    padding: 6px;
    transition: all .25s ease-out;
}
    </style>
    


@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '{{ session('error') }}',
            confirmButtonText: 'OK'
        });
    </script>
@endif
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            var $sharePeople = $('.share_people');
            var $input = $('.sarhe_search input');
            var $showShare = $('#showShare');

            // Show share div when button is clicked
            $showShare.on('click', function() {
                $sharePeople.show();
                $input.focus(); // Optionally focus on input when div is shown
            });

            // Hide share div when clicking outside
            $(document).on('click', function(event) {
                if (!$(event.target).closest('.share_people, #showShare').length) {
                    $sharePeople.hide();
                }
            });

            // Stop propagation to prevent hiding when clicking inside the share_people div or input
            $sharePeople.on('click', function(event) {
                event.stopPropagation();
            });
        });
    </script>

     <script>
$(document).ready(function() {
    // Handle click event on elements with class 'chck_slect'
     $('body').on('click', '.chck_slect', function() {
   
        $('.check_boox').addClass('active');
    });

    // Handle change event on checkboxes
     $('body').on('change', 'input[name="fileCheckbox"]', function() {
   
        // Check if any checkbox is checked
        if ($('input[name="fileCheckbox"]:checked').length > 0) {
            // Add 'active' class to the 'retreve_inn' link
            $('.retreve_inn').addClass('active');
        } else {
            // Remove 'active' class from the 'retreve_inn' link if no checkboxes are checked
            $('.retreve_inn').removeClass('active');
        }
    });

    // Handle click event on 'done_chcel' link
      $('body').on('click', '.done_chcel', function() {
    
        // Remove 'active' class from all 'check_boox' elements
        $('.check_boox').removeClass('active');
        // Uncheck all checkboxes
        $('input[name="fileCheckbox"]').prop('checked', false);
        // Optionally, remove 'active' class from 'retreve_inn' link
        $('.retreve_inn').removeClass('active');
    });
});

 </script> 
 
 <script>
    $(document).ready(function() {
    $('body').on('keydown', '.tag-input', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            const textarea = this;
            const tagContainer = textarea.closest('.tag-container');
            const tagText = textarea.value.trim();
            if (tagText !== '') {
                const tag = document.createElement('div');
                tag.className = 'tag';
                tag.textContent = tagText;

                const removeTag = document.createElement('span');
                removeTag.className = 'remove-tag';
                removeTag.textContent = '✖';
                removeTag.addEventListener('click', function() {
                    tagContainer.removeChild(tag);
                    updateTags(tagContainer);
                });

                tag.appendChild(removeTag);
                tagContainer.insertBefore(tag, textarea);
                textarea.value = '';
                updateTags(tagContainer);
            }
        }
    });

    function updateTags(tagContainer) {
        const tags = [...tagContainer.querySelectorAll('.tag')]
            .map(tag => tag.textContent.replace('✖', '').trim());

        // Update the hidden input field associated with this tag container
        const hiddenInput = tagContainer.querySelector('.tagList');
        if (hiddenInput) {
            hiddenInput.value = tags.join(',');
        }
    }
});
    </script>
    

<script>
$(document).ready(function () {
    // Object to store selected files for each input by their unique IDs
    let fileData = {};

    // Variable to track the currently open modal ID
    let currentModalId = null;

    // Handle file input change
    $('body').on('change', '.dragfile', function () {
        const fileInput = this;
        const fileList = $(fileInput).closest('.file-area').next('.file-list');
        const inputId = $(fileInput).attr('id');

        // Initialize fileData for the input if not already present
        if (!fileData[inputId]) fileData[inputId] = [];

        handleFiles(fileInput, fileList, inputId);
    });

    // Handle drag and drop events
    $('.file-area').on('dragover', function (event) {
        event.preventDefault();
        $(this).addClass('green-outline');
    }).on('dragleave drop', function (event) {
        event.preventDefault();
        $(this).removeClass('green-outline');
    }).on('drop', function (event) {
        event.preventDefault();
        const fileInput = $(this).find('.dragfile')[0];
        const fileList = $(this).next('.file-list');
        fileInput.files = event.originalEvent.dataTransfer.files;
        const inputId = $(fileInput).attr('id');

        // Initialize fileData for the input if not already present
        if (!fileData[inputId]) fileData[inputId] = [];

        handleFiles(fileInput, fileList, inputId);
    });

    // Function to handle files and update the UI
    function handleFiles(fileInput, fileList, inputId) {
        const newFiles = Array.from(fileInput.files);
        fileData[inputId] = [...fileData[inputId], ...newFiles];
        fileList.empty();

        // Append each file to the file list
        fileData[inputId].forEach((file, index) => {
            const fileItem = $('<div>', { class: 'file-item' }).append(
                $('<span>').text(file.name),
                $('<button>', { class: 'remove-btn', 'data-file-index': index }).text('X').on('click', function () {
                    removeFile(fileInput, index, fileList, inputId);
                })
            );
            fileList.append(fileItem);
        });

        updateFileInput(fileInput, inputId);
    }

    // Function to remove a file from the input
    function removeFile(fileInput, index, fileList, inputId) {
        fileData[inputId].splice(index, 1);
        updateFileInput(fileInput, inputId);
        refreshFileList(fileList, fileInput, inputId);
    }

    // Function to refresh the file list in the UI
    function refreshFileList(fileList, fileInput, inputId) {
        fileList.empty();
        fileData[inputId].forEach((file, i) => {
            const fileItem = $('<div>', { class: 'file-item' }).append(
                $('<span>').text(file.name),
                $('<button>', { class: 'remove-btn', 'data-file-index': i }).text('X').on('click', function () {
                    removeFile(fileInput, i, fileList, inputId);
                })
            );
            fileList.append(fileItem);
        });
    }

    // Function to update the file input's file list
    function updateFileInput(fileInput, inputId) {
        const dataTransfer = new DataTransfer();
        fileData[inputId].forEach(file => dataTransfer.items.add(file));
        fileInput.files = dataTransfer.files;
    }

    // Clear file data and reset inputs when a modal is opened, unless reopening the same modal
    $('body').on('shown.bs.modal', '.modal', function () {
        const newModalId = $(this).attr('id');

        // If reopening the same modal, don't clear the file data
        if (currentModalId === newModalId) return;

        currentModalId = newModalId; // Update current modal ID

        $(this).find('.dragfile').each(function () {
            const fileInput = this;
            const fileList = $(fileInput).closest('.file-area').next('.file-list');
            const inputId = $(fileInput).attr('id');

            // Only clear if fileData exists for the input
            if (fileData[inputId] && fileData[inputId].length > 0) {
                fileData[inputId] = [];
                updateFileInput(fileInput, inputId);
                fileList.empty();
            }
        });
    });

    // Clear file data and reset input when closing the modal
    $('body').on('click', '.close', function () {
        const currentModal = $(this).closest('.modal');
        currentModal.find('.dragfile').each(function () {
            const fileInput = this;
            const fileList = $(fileInput).closest('.file-area').next('.file-list');
            const inputId = $(fileInput).attr('id');

            fileData[inputId] = [];
            updateFileInput(fileInput, inputId);
            fileList.empty();
        });
    });
});



</script>
    

 
    
<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropArea = document.querySelector('.left_side_wraap');
    let dragCounter = 0;

    // Function to check if any modal is currently open
    function isModalOpen() {
        return $('.modal:visible').length > 0;
    }

    // Add class when file is dragged over the div
    dropArea.addEventListener('dragenter', function(event) {
        event.preventDefault();
        if (isModalOpen()) return; // Stop script if another modal is open

        dragCounter++;
        dropArea.classList.add('left_side_wraap_active');
    });

    // Prevent default behavior to allow drop
    dropArea.addEventListener('dragover', function(event) {
        event.preventDefault();
    });

    // Remove class when the file is dragged out of the div
    dropArea.addEventListener('dragleave', function(event) {
        event.preventDefault();
        if (isModalOpen()) return; // Stop script if another modal is open

        dragCounter--;
        if (dragCounter === 0) {
            dropArea.classList.remove('left_side_wraap_active');
        }
    });

    // Handle file drop
    dropArea.addEventListener('drop', function(event) {
        event.preventDefault();
        if (isModalOpen()) return; // Stop script if another modal is open

        dragCounter = 0;
        dropArea.classList.remove('left_side_wraap_active');

        const files = event.dataTransfer.files;
        if (files.length > 0) {
            const file = files[0];

            // Automatically select the file in the input field
            autoSelectFile(file);

            // Open the modal
            $('#upload_filee').modal('show');
        }
    });

    function autoSelectFile(file) {
        const fileInput = document.querySelector('#upload_filee #file');
        if (fileInput) {
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            fileInput.files = dataTransfer.files;

            // Trigger the change event on the file input
            fileInput.dispatchEvent(new Event('change'));
        }
    }

    // Handle the file selection UI update
    $('#file').on('change', function() {
        if (this.files.length > 0) {
            $('.file-dummy .success').show();  // Show success message
            $('.file-dummy .default').hide();  // Hide the default message
        }
    });
});
</script>




    

    <div class="tap-top">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-up"><polyline points="17 11 12 6 7 11"></polyline><polyline points="17 18 12 13 7 18"></polyline></svg>
    </div>
    <!-- tap on tap ends-->
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"> </div>
      <div class="dot"></div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">

          <!-- Page Header Start-->
       
<div class="page-header">
    <div class="header-wrapper row m-0">
        <div class="header-logo-wrapper col-auto p-0">
            <div class="toggle-sidebar">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid status_toggle middle sidebar-toggle"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
            <!-- <i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i> -->
            </div>
            <div class="logo-header-main"><a href="#">Milliondox</a></div>
        </div>
        <div class="left-header col horizontal-wrapper ps-0">
            <div class="left-menu-header">
           <h2>
           <span id="greeting" class=""></span>
           Welcome to MillionDox!
          </h2>
            </div>
        </div>

        <div class="nav-right col-1 pull-right right-header p-0 depo-ress mmbbbbll">
            <div class="nav_right_logout">
            <div class="logout_repo">
             <ul>
<li>
         <div class="mode">
        <span class="slider"></span>
   </div>
</li>

                <li class="setting_munal">
<div class="repo_setting">
    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.64288 17.5706L6.30003 14.8277C6.11431 14.7563 5.93946 14.6706 5.77546 14.5706C5.61146 14.4706 5.4506 14.3634 5.29289 14.2492L2.74288 15.3206L0.385742 11.2492L2.59288 9.57773C2.5786 9.47773 2.57146 9.38145 2.57146 9.28888V8.71031C2.57146 8.61716 2.5786 8.52059 2.59288 8.42059L0.385742 6.74916L2.74288 2.67773L5.29289 3.74916C5.45003 3.63488 5.61431 3.52773 5.78574 3.42773C5.95717 3.32773 6.1286 3.24202 6.30003 3.17059L6.64288 0.427734H11.3572L11.7 3.17059C11.8857 3.24202 12.0609 3.32773 12.2255 3.42773C12.39 3.52773 12.5506 3.63488 12.7072 3.74916L15.2572 2.67773L17.6143 6.74916L15.4072 8.42059C15.4215 8.52059 15.4286 8.61716 15.4286 8.71031V9.28802C15.4286 9.38116 15.4143 9.47773 15.3857 9.57773L17.5929 11.2492L15.2357 15.3206L12.7072 14.2492C12.55 14.3634 12.3857 14.4706 12.2143 14.5706C12.0429 14.6706 11.8715 14.7563 11.7 14.8277L11.3572 17.5706H6.64288ZM9.04288 11.9992C9.87146 11.9992 10.5786 11.7063 11.1643 11.1206C11.75 10.5349 12.0429 9.82773 12.0429 8.99916C12.0429 8.17059 11.75 7.46345 11.1643 6.87773C10.5786 6.29202 9.87146 5.99916 9.04288 5.99916C8.20003 5.99916 7.48917 6.29202 6.91031 6.87773C6.33146 7.46345 6.04231 8.17059 6.04289 8.99916C6.04289 9.82773 6.33231 10.5349 6.91117 11.1206C7.49003 11.7063 8.2006 11.9992 9.04288 11.9992Z" fill="#BABABA"/>
</svg>
</div>
<ul class="setting_opt">
    
                    <li class="logout_out">
                    <a class="logou_inn" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
<svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.25 7C5.25 6.83424 5.31585 6.67527 5.43306 6.55806C5.55027 6.44085 5.70924 6.375 5.875 6.375H11.5V2.3125C11.5 1.0625 10.1801 0.125 9 0.125H3.0625C2.48253 0.12562 1.92649 0.356288 1.51639 0.766389C1.10629 1.17649 0.87562 1.73253 0.875 2.3125V11.6875C0.87562 12.2675 1.10629 12.8235 1.51639 13.2336C1.92649 13.6437 2.48253 13.8744 3.0625 13.875H9.3125C9.89247 13.8744 10.4485 13.6437 10.8586 13.2336C11.2687 12.8235 11.4994 12.2675 11.5 11.6875V7.625H5.875C5.70924 7.625 5.55027 7.55915 5.43306 7.44194C5.31585 7.32473 5.25 7.16576 5.25 7ZM16.9418 6.5582L13.8168 3.4332C13.6986 3.32094 13.5413 3.25928 13.3783 3.26137C13.2153 3.26345 13.0596 3.32912 12.9444 3.44437C12.8291 3.55962 12.7635 3.71534 12.7614 3.87831C12.7593 4.04129 12.8209 4.19863 12.9332 4.3168L14.991 6.375H11.5V7.625H14.991L12.9332 9.6832C12.8727 9.74066 12.8244 9.80965 12.791 9.88609C12.7576 9.96254 12.7398 10.0449 12.7387 10.1283C12.7377 10.2117 12.7533 10.2945 12.7847 10.3718C12.8162 10.4491 12.8628 10.5193 12.9217 10.5783C12.9807 10.6372 13.0509 10.6838 13.1282 10.7153C13.2055 10.7467 13.2883 10.7623 13.3717 10.7613C13.4551 10.7602 13.5375 10.7424 13.6139 10.709C13.6904 10.6756 13.7593 10.6273 13.8168 10.5668L16.9418 7.4418C17.0589 7.3246 17.1247 7.16569 17.1247 7C17.1247 6.83431 17.0589 6.6754 16.9418 6.5582Z" fill="#CEFFA8"/>
</svg> Log Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                
</ul>
                </li>
                
             </ul>
         </div>
</div>
<div class="nav_right_menu">
        <!-- Header Right Icon Start-->
        @include('user/includes.header-details')
       <!-- Header Right Icon Start-->
       </div>
        </div>
         </div>
</div>

      <!-- Page Header Ends-->


      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        
        <!-- Page Sidebar Start-->
        
        <div id="sidebarr" class="sidebar-wrapper Repo_dar_sidebar">
    <div class="iner-sidebar">
         <div class="logo-wrapper"><a href="{{url('/home')}}">
             <!--<img class="img-fluid for-light" src="/../assets/images/logo.png" style="height: 58px;margin-left: 73px;" alt="">-->
             <div class="mill"><span class="milliondox">
             <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M11 6H1M1 6L5.5 1.5M1 6L5.5 10.5" stroke="#C5C5C5"/>
</svg>   
             BACK TO DASHBOARD</span></div>
             </a>
            <div class="back-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
            <!-- <i data-feather="grid"></i> -->
            </div>
        </div>
        <div class="logo-icon-wrapper"><a href="">
                <div class="icon-box-sidebar"><i data-feather="grid"></i></div></a></div>
<!-- resp_logo -->
<div class="repo_by">
    <h2>Document <span>Repository</span></h2>
        <div class="by_iage">
            <span>By</span>
            <img class="img_dark_repo" src="../assets/images/repo_logo.png" alt="img">
            <img class="img_light_repo" src="../assets/images/repo_logo_dark.png" alt="img" style="display:none;">
</div>
</div>
<!-- resp_logo -->

<!-- progress bar start-->
<div class="storage_progress">
        <div class="progress-bar-container">
        <div class="progress-bar" id="progressBar"></div>
    </div>
<div class="progress-bar-text">1.7/3 GB utilized</div>
</div>

    <script>
        window.onload = function() {
            var progressBar = document.getElementById('progressBar');
            var utilized = 1.7;
            var total = 3;
            var percentage = (utilized / total) * 100;
            progressBar.style.width = percentage + '%';
        };
    </script>
    
<!-- progress bar end-->


                    <!-- Loader starts-->
                    <div class="comman_loderrs" id="client_loaders">
      <div class="loder_wraper_inn_pos">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"> </div>
      <div class="dot"></div>
    </div>

                            </div>
                            
  <script>
    $(document).ready(function() {
        // Show the loader when the page starts loading
        $("#client_loaders").show();

        // Hide the loader after showing for 2 seconds
        setTimeout(function() {
            $("#client_loaders").fadeOut("slow");
        }, 200); // 2000 milliseconds = 2 seconds
    });
</script>

    <!-- Loader ends-->

        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span>
                    
                        <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                    </div>
                    </li>






                    @php
$folders = $folders->sortBy('name');
@endphp

@if (!function_exists('buildSubfolders'))
    @php
    function buildSubfolders($folders, $parentName = null) {
        $html = '';
        foreach ($folders as $folder) {
            if ($folder->parent_name === $parentName) {
                $html .= '<li class="dropdown">';
                $html .= '<a href="#" class="folder-link" data-folder-path="' . $folder->path . '">';
                $html = '<svg class="d_fadee" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.635 3.5525L6.01912 3.9375H10.9375C11.2856 3.9375 11.6194 4.07578 11.8656 4.32192C12.1117 4.56806 12.25 4.9019 12.25 5.25V9.625C12.25 9.9731 12.1117 10.3069 11.8656 10.5531C11.6194 10.7992 11.2856 10.9375 10.9375 10.9375H3.0625C2.7144 10.9375 2.38056 10.7992 2.13442 10.5531C1.88828 10.3069 1.75 9.9731 1.75 9.625V3.9375C1.75 3.5894 1.88828 3.25556 2.13442 3.00942C2.38056 2.76328 2.7144 2.625 3.0625 2.625H4.16237C4.33483 2.62504 4.50558 2.65906 4.66487 2.72512C4.82417 2.79118 4.96888 2.88798 5.09075 3.01L5.635 3.5525ZM0.4375 3.9375C0.4375 3.24131 0.714062 2.57363 1.20634 2.08134C1.69863 1.58906 2.36631 1.3125 3.0625 1.3125H4.16237C4.50721 1.31246 4.84868 1.38036 5.16727 1.51233C5.48586 1.6443 5.77532 1.83775 6.01912 2.08162L6.5625 2.625H10.9375C11.6337 2.625 12.3014 2.90156 12.7937 3.39384C13.2859 3.88613 13.5625 4.55381 13.5625 5.25V9.625C13.5625 10.3212 13.2859 10.9889 12.7937 11.4812C12.3014 11.9734 11.6337 12.25 10.9375 12.25H3.0625C2.36631 12.25 1.69863 11.9734 1.20634 11.4812C0.714062 10.9889 0.4375 10.3212 0.4375 9.625V3.9375ZM4.15625 5.6875C3.9822 5.6875 3.81528 5.75664 3.69221 5.87971C3.56914 6.00278 3.5 6.1697 3.5 6.34375C3.5 6.5178 3.56914 6.68472 3.69221 6.80779C3.81528 6.93086 3.9822 7 4.15625 7H9.84375C10.0178 7 10.1847 6.93086 10.3078 6.80779C10.4309 6.68472 10.5 6.5178 10.5 6.34375C10.5 6.1697 10.4309 6.00278 10.3078 5.87971C10.1847 5.75664 10.0178 5.6875 9.84375 5.6875H4.15625Z" fill="#C5C5C5"/>
         </svg> ' . $folder->name . '</a>';

                $nestedSubfolders = $folders->filter(function($subfolder) use ($folder) {
                    return $subfolder->parent_name === $folder->name;
                });

                if ($nestedSubfolders->isNotEmpty()) {
                    $html .= '<ul class="dropdown-menu">';
                    $html .= buildSubfolders($nestedSubfolders, $folder->name);
                    $html .= '</ul>';
                }
                $html .= '</li>';
            }
        }
        return $html;
    }
    @endphp
@endif



   
<script>
    $(document).ready(function() {
    // Attach event listener to elements with the mainhomedata class
    $('body').on('click', '.mainhomedata', function(event) {
        event.preventDefault(); // Prevent the default action

        // Redirect to the specified URL
        window.location.href = '{{url('/docurepo')}}';
    });
});

</script>

<ul id="fresponsive" class="nav navbar-nav dropdown">
    <li class="dropdown main_dropdown">
    <b class="toggle_icconn "></b>
            <a href=""  class="dropdown-toggle mainhomedata" >
            <div class="folder-card">
                    <div class="folder-image">
                        <div class="folder_in">
                        <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M49.9259 2.10898C49.5062 2.12346 49.1017 2.26969 48.7697 2.52695L2.76969 38.4215C2.35115 38.7478 2.07939 39.2271 2.01419 39.7538C1.94899 40.2805 2.0957 40.8115 2.42204 41.2301C2.74838 41.6486 3.22762 41.9204 3.75433 41.9856C4.28105 42.0508 4.81209 41.9041 5.23063 41.5777L8.00016 39.4176V91.9996C8.00022 92.53 8.21095 93.0387 8.58601 93.4138C8.96107 93.7888 9.46975 93.9996 10.0002 93.9996H37.6642C37.8802 94.0353 38.1006 94.0353 38.3166 93.9996H61.6642C61.8802 94.0353 62.1006 94.0353 62.3166 93.9996H90.0002C90.5306 93.9996 91.0393 93.7888 91.4143 93.4138C91.7894 93.0387 92.0001 92.53 92.0002 91.9996V39.4176L94.7697 41.5777C94.9769 41.7393 95.214 41.8585 95.4673 41.9285C95.7206 41.9985 95.9852 42.018 96.246 41.9857C96.5068 41.9534 96.7587 41.8701 96.9874 41.7404C97.216 41.6108 97.4168 41.4374 97.5784 41.2302C97.74 41.0229 97.8592 40.7859 97.9292 40.5325C97.9991 40.2792 98.0185 40.0146 97.9862 39.7538C97.954 39.493 97.8706 39.2411 97.741 39.0125C97.6113 38.7839 97.4379 38.5831 97.2306 38.4215L82.0002 26.5387V11.9996H70.0002V17.1715L51.2306 2.52695C50.8585 2.23839 50.3965 2.09038 49.9259 2.10898ZM50.0002 6.64414L88.0002 36.2965V89.9996H64.0002V51.9996H36.0002V89.9996H12.0002V36.2965L50.0002 6.64414ZM74.0002 15.9996H78.0002V23.4176L74.0002 20.2926V15.9996ZM40.0002 55.9996H60.0002V89.9996H40.0002V55.9996Z" fill="#D1D5E1"/>
</svg>


                        <!-- <img src="../assets/images/solar_folder-bold.png"  id="folders" class="folder-icon" alt="Folder Icon"> -->
                        </div>
                        <div class="folder-title">
                        <span>Home</span>
                            </div>
                    </div>
                   
                </div>
                
            </a>
            
        </li>
        @foreach($folders->where('parent_name', null) as $parent)
            @php
                if (strpos($parent->name, '_') !== false) {
                    $dash_position_name = strpos($parent->name, '_');
                    $parent->name = substr($parent->name, $dash_position_name + 1);
                }
            @endphp
        <li class="dropdown main_dropdown">
            <b class="toggle_icconn" data-folder-path="{{ $parent->path }}"></b>
            <a href="#" class="dropdown-toggle folder-link" data-folder-path="{{ $parent->path }}">
                <div class="folder-card">
                    <div class="folder-image">
                        <div class="folder_in">
                            <svg class="d_fadee" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.635 3.5525L6.01912 3.9375H10.9375C11.2856 3.9375 11.6194 4.07578 11.8656 4.32192C12.1117 4.56806 12.25 4.9019 12.25 5.25V9.625C12.25 9.9731 12.1117 10.3069 11.8656 10.5531C11.6194 10.7992 11.2856 10.9375 10.9375 10.9375H3.0625C2.7144 10.9375 2.38056 10.7992 2.13442 10.5531C1.88828 10.3069 1.75 9.9731 1.75 9.625V3.9375C1.75 3.5894 1.88828 3.25556 2.13442 3.00942C2.38056 2.76328 2.7144 2.625 3.0625 2.625H4.16237C4.33483 2.62504 4.50558 2.65906 4.66487 2.72512C4.82417 2.79118 4.96888 2.88798 5.09075 3.01L5.635 3.5525ZM0.4375 3.9375C0.4375 3.24131 0.714062 2.57363 1.20634 2.08134C1.69863 1.58906 2.36631 1.3125 3.0625 1.3125H4.16237C4.50721 1.31246 4.84868 1.38036 5.16727 1.51233C5.48586 1.6443 5.77532 1.83775 6.01912 2.08162L6.5625 2.625H10.9375C11.6337 2.625 12.3014 2.90156 12.7937 3.39384C13.2859 3.88613 13.5625 4.55381 13.5625 5.25V9.625C13.5625 10.3212 13.2859 10.9889 12.7937 11.4812C12.3014 11.9734 11.6337 12.25 10.9375 12.25H3.0625C2.36631 12.25 1.69863 11.9734 1.20634 11.4812C0.714062 10.9889 0.4375 10.3212 0.4375 9.625V3.9375ZM4.15625 5.6875C3.9822 5.6875 3.81528 5.75664 3.69221 5.87971C3.56914 6.00278 3.5 6.1697 3.5 6.34375C3.5 6.5178 3.56914 6.68472 3.69221 6.80779C3.81528 6.93086 3.9822 7 4.15625 7H9.84375C10.0178 7 10.1847 6.93086 10.3078 6.80779C10.4309 6.68472 10.5 6.5178 10.5 6.34375C10.5 6.1697 10.4309 6.00278 10.3078 5.87971C10.1847 5.75664 10.0178 5.6875 9.84375 5.6875H4.15625Z" fill="#C5C5C5"/>
                            </svg>
                        </div>
                        <div class="folder-title">
                            <span>{{ $parent->name }}</span>
                        </div>
                    </div>
                </div>
            </a>
            <ul class="dropdown-menu" id="subfolders-{{ urlencode(str_replace(['/', ' '], '_', $parent->path)) }}"></ul>
        </li>
    @endforeach
</ul> 



<script>

document.addEventListener('DOMContentLoaded', function() {
    document.body.addEventListener('click', function(event) {
        var target = event.target;

        // Function to toggle submenu visibility
        function toggleSubMenu(element) {
            var subMenu = element.nextElementSibling;

            // Debugging logs
            console.log('Element clicked:', element);
            if (subMenu && subMenu.classList.contains('dropdown-menu')) {
                subMenu.classList.toggle('show');
                console.log('SubMenu toggled:', subMenu);
            } else {
                console.log('Next sibling is not a dropdown-menu');
            }
        }

        // Check if the clicked element is a dropdown link
        if (target.matches('.main_dropdown > a, .dropdown > a') || target.closest('.main_dropdown > a, .dropdown > a')) {
            event.preventDefault();
            var dropdownLink = target.closest('.main_dropdown > a, .dropdown > a');
            toggleSubMenu(dropdownLink);
        }

        // Check if the clicked element is a toggle icon
        else if (target.matches('.toggle_icconn') || target.closest('.toggle_icconn')) {
            event.preventDefault();
            var toggleIcon = target.closest('.toggle_icconn');

            // Find the nearest parent dropdown to ensure correct submenu is toggled
            var parentDropdown = toggleIcon.closest('.dropdown');
            if (parentDropdown) {
                var dropdownLink = parentDropdown.querySelector('a');
                if (dropdownLink) {
                    toggleSubMenu(dropdownLink);
                }
            }
            
            // Alert to ensure the click on toggle_icconn is working
            // alert('Toggle icon clicked!');
        }
    });
});






// comment for on togle and remove class on other li click

// document.addEventListener('DOMContentLoaded', function() {
//     var dropdowns = document.querySelectorAll('.main_dropdown > a');

//     dropdowns.forEach(function(dropdown) {
//         dropdown.addEventListener('click', function(event) {
//             event.preventDefault();

//             var subMenu = this.nextElementSibling;
//             var isAlreadyOpen = subMenu.classList.contains('show');

//             // Close any currently open dropdowns
//             dropdowns.forEach(function(otherDropdown) {
//                 var otherSubMenu = otherDropdown.nextElementSibling;
//                 if (otherSubMenu && otherSubMenu.classList.contains('dropdown-menu')) {
//                     otherSubMenu.classList.remove('show');
//                 }
//             });

//             // Toggle the clicked dropdown if it was not already open
//             if (!isAlreadyOpen && subMenu && subMenu.classList.contains('dropdown-menu')) {
//                 subMenu.classList.toggle('show');
//             }
//         });
//     });
// });
</script>


<!-- jQuery -->


<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


<!-- Your custom script -->







<script>
    $(document).ready(function() {
        $('.folder-link').on('click', function(e) {
            e.preventDefault(); // Prevent the default link behavior
            $('.folder-link').removeClass('active'); // Remove active class from all links
            $(this).addClass('active'); // Add active class to the clicked link
        });
    });
</script>



                <li class="sidebar-list empty_li" style="opacity:0; visiblity:hidden;">            
                        <span>empty<br>div<br>div</span>                    
                </li>        
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
  

        <div class="binn">
            
             <div class="have_feed">
            <div class="ineer_fiid">
                <span>Have a<br> Feedback ?</span>
                <a id="click_fees_for">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.5 15.5V2C0.5 1.5875 0.647 1.2345 0.941 0.941C1.235 0.6475 1.588 0.5005 2 0.5H14C14.4125 0.5 14.7657 0.647 15.0597 0.941C15.3538 1.235 15.5005 1.588 15.5 2V11C15.5 11.4125 15.3533 11.7657 15.0597 12.0597C14.7662 12.3537 14.413 12.5005 14 12.5H3.5L0.5 15.5ZM8 10.25C8.2125 10.25 8.39075 10.178 8.53475 10.034C8.67875 9.89 8.7505 9.712 8.75 9.5C8.7495 9.288 8.6775 9.11 8.534 8.966C8.3905 8.822 8.2125 8.75 8 8.75C7.7875 8.75 7.6095 8.822 7.466 8.966C7.3225 9.11 7.2505 9.288 7.25 9.5C7.2495 9.712 7.3215 9.89025 7.466 10.0347C7.6105 10.1792 7.7885 10.251 8 10.25ZM7.25 7.25H8.75V2.75H7.25V7.25Z" fill="white"/>
</svg>
                    Leave it here
                    <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.19938 0.599609L0.359375 1.49961L4.79938 5.99961L0.359375 10.4996L1.19938 11.3996L6.59938 5.99961L1.19938 0.599609Z" fill="white"/>
</svg>
</a>
            </div>
            
            <div class="thanks_feedback">
                <button id="click_stop">x</button>
                <h2><strong>THANKS</strong> for helping us improve MillionDox!</h2>
                <form action="" method="POST" enctype="multipart/form-data" class="for_check"> 
                @csrf
                   
                <div class="textara_ann">
<textarea placeholder="Write down your message" name="textarea" > </textarea>

</div>
<div class="root_btn">  
<div class="attach_ann">
<input type="file" id="aoa-file" name="file" accept="" >
<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_4033_7422)">
<path d="M14.4031 8.00033L8.26234 14.1411C7.40991 14.9717 6.26465 15.433 5.07454 15.4252C3.88443 15.4175 2.74527 14.9413 1.90372 14.0997C1.06217 13.2582 0.585965 12.119 0.578221 10.9289C0.570477 9.73882 1.03182 8.59356 1.86234 7.74113L8.18661 1.41686C8.75241 0.851063 9.51979 0.533203 10.3199 0.533203C11.1201 0.533203 11.8875 0.851063 12.4533 1.41686C13.0191 1.98265 13.3369 2.75004 13.3369 3.55019C13.3369 4.35035 13.0191 5.11773 12.4533 5.68353L6.31141 11.8254C6.02851 12.1083 5.64482 12.2672 5.24474 12.2672C4.84467 12.2672 4.46097 12.1083 4.17808 11.8254C3.89518 11.5425 3.73625 11.1588 3.73625 10.7587C3.73625 10.3586 3.89518 9.97496 4.17808 9.69206L10.1365 3.73366" stroke="#A3AED0" stroke-width="1.5"/>
</g>
<defs>
<clipPath id="clip0_4033_7422">
<rect width="16" height="16" fill="white"/>
</clipPath>
</defs>
</svg>
</div>

<button class="btn" style="border-radius:5px;" type="submit"> 
<svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.26927 11.5999L12.9026 6.61327C13.0229 6.56204 13.1254 6.47658 13.1975 6.36754C13.2696 6.25849 13.308 6.13065 13.308 5.99994C13.308 5.86922 13.2696 5.74139 13.1975 5.63234C13.1254 5.52329 13.0229 5.43783 12.9026 5.3866L1.26927 0.399935C1.16854 0.355998 1.05845 0.337831 0.948943 0.347071C0.839435 0.356311 0.733949 0.392668 0.642003 0.452863C0.550057 0.513058 0.474543 0.595197 0.422274 0.691869C0.370005 0.788541 0.342625 0.896705 0.342604 1.0066L0.335938 4.07994C0.335938 4.41327 0.582604 4.69994 0.915937 4.73994L10.3359 5.99994L0.915937 7.25327C0.582604 7.29994 0.335938 7.5866 0.335938 7.91994L0.342604 10.9933C0.342604 11.4666 0.829271 11.7933 1.26927 11.5999Z" fill="white"/>
</svg>
</button>
</div>

</form>
            </div>
        </div>
        
<ul class="setting_opt">
    <li><a data-bs-toggle="modal" data-bs-target="#bin_filee">
    <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M11.8346 1.33333H8.91797L8.08464 0.5H3.91797L3.08464 1.33333H0.167969V3H11.8346M1.0013 13.8333C1.0013 14.2754 1.1769 14.6993 1.48946 15.0118C1.80202 15.3244 2.22594 15.5 2.66797 15.5H9.33464C9.77666 15.5 10.2006 15.3244 10.5131 15.0118C10.8257 14.6993 11.0013 14.2754 11.0013 13.8333V3.83333H1.0013V13.8333Z" fill="#C5C5C5"/>
</svg>

Bin</a></li>

</ul>
</div>


    </div>
</div>

<script>
$(document).ready(function() {
    $('.for_check').on('submit', function(e) {
        e.preventDefault();

        // Create a FormData object to handle file upload
        var formData = new FormData(this);  // 'this' refers to the form element

        $.ajax({
            type: 'POST',
            url: "{{ route('saveFeedback') }}",
            data: formData,  // Pass the FormData object
            contentType: false,  // Prevent jQuery from automatically setting the content type
            processData: false,  // Prevent jQuery from processing the data
            success: function(response) {
                toastr.success(response.success); // Display success toaster message
                // alert(response.success);
                $('.for_check')[0].reset();  // Reset the form
                $('#click_stop').click();
            },
            error: function(response) {
                toastr.error("Something went wrong!!!");
                // alert('Error: ' + response.responseJSON.message);
            }
        });
    });
});
</script>

          <!-- Bin model start -->
        <div class="modal fade drop_coman_file have_title" id="bin_filee" tabindex="-1" role="dialog" aria-labelledby="bin_filee" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title bin_style" style="font-weight:700">
                        <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M11.8346 1.33333H8.91797L8.08464 0.5H3.91797L3.08464 1.33333H0.167969V3H11.8346M1.0013 13.8333C1.0013 14.2754 1.1769 14.6993 1.48946 15.0118C1.80202 15.3244 2.22594 15.5 2.66797 15.5H9.33464C9.77666 15.5 10.2006 15.3244 10.5131 15.0118C10.8257 14.6993 11.0013 14.2754 11.0013 13.8333V3.83333H1.0013V13.8333Z" fill="#C5C5C5"></path>
</svg>
                    Bin</h5>
                <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                    <span aria-hidden="true">
                        <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black" />
                            <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black" />
                        </svg>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Bin</h3>

 




<div class="modal-body">
    <h3>Bin</h3>

    <!-- Filter Section -->
    <div class="filter-section">
        <div class="roww">
            <p>The files in the trash will be accessible by the organization admin for 1 Year. Post that recovery of these deleted documents will not be possible.</p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="year-filter">Year</label>
                <select id="year-filter" >
                    <option value="">All</option>
                    @for($year = date('Y'); $year >= date('Y') - 10; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-md-4">
                <label for="month-filter">Month</label>
                <select id="month-filter" >
                    <option value="">All</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}">{{ date("F", mktime(0, 0, 0, $month, 1)) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="search-box">Search</label>
                <input type="text" id="search-box"  placeholder="Search by name">
            </div>
        </div>
    </div>

    <div class="custom_table_wraap">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Size</th>
                    <th>Deleted by</th>
                    <th>Deleted on</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="table-body">
                @foreach($files4 as $file)
                <tr data-date="{{ $file->updated_at }}">
                    <td>{{$file->file_name}}</td>
                    <td>{{ number_format($file->file_size / 1024, 2) }} KB</td>
                    <td>{{$file->user_name}}</td>
                    <td>{{$file->updated_at}}</td>
                    <td>
                        <!-- Dropdown for file actions -->
                        <div class="dropdown">
                            <button onclick="toggleDropdown()" class="dropbtn show_pp">
                               <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
                            </button>
                            <div id="myDropdown3" class="dropdown-content">
                                <form method="POST" action="{{ route('file.restorefile', ['id' => $file->id]) }}" class="restore-form-file">
                                    @csrf
                                    @method('PUT')
                                    <a class="dropdown-itemm rename_nt restore_button_file" data-id="{{ $file->id }}">
                                        <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.800781 4.39981C0.800781 3.92691 0.893951 3.45865 1.07497 3.02178C1.25598 2.5849 1.5213 2.18797 1.85576 1.85365C2.19022 1.51934 2.58727 1.2542 3.02423 1.07338C3.46119 0.892557 3.92949 0.799595 4.40238 0.799805C5.11433 0.800121 5.81019 1.01153 6.402 1.40729C6.9938 1.80306 7.45498 2.36541 7.72721 3.02325C7.99944 3.68109 8.0705 4.40488 7.93141 5.10311C7.79233 5.80134 7.44933 6.44265 6.9458 6.94595C6.44227 7.44926 5.80081 7.79197 5.10252 7.93075C4.40423 8.06953 3.68047 7.99814 3.02275 7.72562C2.36503 7.4531 1.80288 6.99167 1.40738 6.39969C1.01188 5.80771 0.800781 5.11175 0.800781 4.39981ZM5.91998 5.11661L5.20238 5.83421V4.59981C5.20238 4.31083 5.14545 4.02469 5.03484 3.75772C4.92423 3.49075 4.76211 3.24819 4.55773 3.04389C4.35336 2.83959 4.11074 2.67755 3.84373 2.56704C3.57672 2.45653 3.29056 2.3997 3.00158 2.39981H2.80158C2.69549 2.39981 2.59375 2.44195 2.51874 2.51696C2.44372 2.59198 2.40158 2.69372 2.40158 2.79981C2.40158 2.90589 2.44372 3.00763 2.51874 3.08265C2.59375 3.15766 2.69549 3.19981 2.80158 3.19981H3.00158C3.77518 3.19981 4.40158 3.82701 4.40158 4.59981V5.83421L3.68478 5.11661C3.60967 5.0416 3.50784 4.99951 3.4017 4.99958C3.29555 4.99966 3.19378 5.0419 3.11878 5.11701C3.04378 5.19211 3.00168 5.29394 3.00176 5.40009C3.00183 5.50623 3.04407 5.608 3.11918 5.68301L4.52078 7.08461C4.59597 7.15914 4.69764 7.20082 4.80351 7.20052C4.90938 7.20022 5.01082 7.15796 5.08558 7.08301L6.48558 5.68301C6.52277 5.64587 6.55228 5.60177 6.57243 5.55323C6.59258 5.50468 6.60297 5.45265 6.603 5.40009C6.60304 5.34753 6.59273 5.29548 6.57265 5.24691C6.55257 5.19834 6.52312 5.1542 6.48598 5.11701C6.44884 5.07981 6.40474 5.0503 6.3562 5.03016C6.30766 5.01001 6.25562 4.99962 6.20306 4.99958C6.15051 4.99955 6.09846 5.00986 6.04988 5.02994C6.00131 5.05002 5.95717 5.07947 5.91998 5.11661ZM8.80078 4.39981C8.8012 5.15354 8.60799 5.89475 8.23968 6.55237C7.87136 7.20998 7.34028 7.76196 6.69736 8.15537C6.05444 8.54878 5.32124 8.77044 4.56805 8.79909C3.81486 8.82775 3.06693 8.66243 2.39598 8.31901V12.7998C2.39598 13.2242 2.56455 13.6311 2.86461 13.9312C3.16467 14.2312 3.57163 14.3998 3.99598 14.3998H10.3984C10.6087 14.4001 10.817 14.359 11.0114 14.2787C11.2058 14.1984 11.3825 14.0806 11.5313 13.932C11.6801 13.7834 11.7982 13.6069 11.8788 13.4127C11.9593 13.2184 12.0008 13.0101 12.0008 12.7998V3.19981C12.0008 2.77546 11.8322 2.36849 11.5322 2.06843C11.2321 1.76838 10.8251 1.59981 10.4008 1.59981H7.79518C8.4468 2.38728 8.80278 3.37769 8.80158 4.39981M12.8008 4.79981H13.2008C13.3069 4.79981 13.4086 4.84195 13.4836 4.91696C13.5586 4.99198 13.6008 5.09372 13.6008 5.19981V6.39981C13.6008 6.50589 13.5586 6.60763 13.4836 6.68265C13.4086 6.75766 13.3069 6.79981 13.2008 6.79981H12.8008V4.79981ZM12.8008 7.5998H13.2008C13.3069 7.5998 13.4086 7.64195 13.4836 7.71696C13.5586 7.79198 13.6008 7.89372 13.6008 7.9998V9.19981C13.6008 9.30589 13.5586 9.40763 13.4836 9.48265C13.4086 9.55766 13.3069 9.5998 13.2008 9.5998H12.8008V7.5998ZM12.8008 10.3998H13.2008C13.3069 10.3998 13.4086 10.4419 13.4836 10.517C13.5586 10.592 13.6008 10.6937 13.6008 10.7998V11.9998C13.6008 12.1059 13.5586 12.2076 13.4836 12.2826C13.4086 12.3577 13.3069 12.3998 13.2008 12.3998H12.8008V10.3998Z" fill="#8D8D8D"/>
</svg>
                                        Restore
                                    </a>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
    $('#year-filter, #month-filter, #search-box').on('change keyup', function() {
        filterTable();
    });

    function filterTable() {
        let year = $('#year-filter').val();
        let month = $('#month-filter').val();
        let searchQuery = $('#search-box').val().toLowerCase();

        $('#table-body tr').each(function() {
            let date = $(this).data('date');
            let fileName = $(this).find('td:first').text().toLowerCase();
            let fileDate = new Date(date);
            let showRow = true;

            if (year && fileDate.getFullYear() != year) {
                showRow = false;
            }

            if (month && (fileDate.getMonth() + 1) != month) {
                showRow = false;
            }

            if (searchQuery && !fileName.includes(searchQuery)) {
                showRow = false;
            }

            if (showRow) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
});

</script>
 <script>
    document.addEventListener('DOMContentLoaded', function () {
     

        // Handle restore button click
        document.querySelectorAll('.restore_button_file').forEach(button => {
            button.addEventListener('click', function () {
                const form = this.closest('.restore-form-file');
                const fileId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You want to restore this record!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, restore it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        // Show success message using SweetAlert
         @if(session('success'))
        toastr.success('{{ session('success') }}');
    @endif
    
     @if(session('success2'))
             toastr.success('{{ session('success2') }}');
        @endif
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



    <script>
        function showToast(message,type){
            $.notify({
                    message: message,
                },
                {
                    type: type,
                    allow_dismiss:true,
                    newest_on_top:true ,
                    showProgressbar:false,
                    spacing:10,
                    timer:1000,
                    placement:{
                        from:'top',
                        align:'right'
                    },
                    offset:{
                        x:30,
                        y:30
                    },
                    // delay:1000 ,
                    z_index:10000,
                    animate:{
                        enter:'flash',
                        exit:'flash'
                    }
                });
        }
    </script>



    <style>
        span.milliondox {
    color: white;
    font-size: 20px;
}
.mill {
    text-align: center;
}
    </style>

        
        <!-- Page Sidebar Ends-->
        
        <div class="page-body repo_page_body">
          <!-- greeting -->
          <div class="mlb-menu-header container-fluid" style="display:none;">
           <h2>
           Document Repository
          </h2>
            </div>

<!--comming soon toster start-->
<div class="tost_wrap">
<section id="toast" class="info">
  <div id="icon-wrapper">
    <div id="icon"></div>
  </div>
  <div id="toast-message">
<h4>Stay Tuned!</h4>
<p>Advanced search is coming soon.</p>
  </div>
  <button id="toast-close"></button>
  <div id="timer"></div>
</section>
</div>
<script>
const toast = document.querySelector("#toast");
const toastTimer = document.querySelector("#timer");
const closeToastBtn = document.querySelector("#toast-close");
const toastWrap = document.querySelector(".tost_wrap");
let countdown;

const closeToast = () => {
  toast.style.animation = "close 0.3s cubic-bezier(.87,-1,.57,.97) forwards";
  toastTimer.classList.remove("timer-animation");
  clearTimeout(countdown);
  toastWrap.classList.remove("active"); // Remove active class
}

const openToast = (type) => {
  toastWrap.classList.add("active"); // Add active class
  toast.classList = [type];
  toast.style.animation = "open 0.3s cubic-bezier(.47,.02,.44,2) forwards";
  toastTimer.classList.add("timer-animation");
  clearTimeout(countdown);
  countdown = setTimeout(() => {
    closeToast();
  }, 5000);
}

closeToastBtn.addEventListener("click", closeToast);
</script>
<!--comming soon toster end-->

 <!-- Container-fluid start-->
 <div class="container-fluid depo-ress">
        <div class="row">
          <div class="col-md-12">
         <div class="logout_repo">

         <div class="find_par"> 
         <div class="left-menu-header">
          <h2>
            <b><span class="greeting" id="greetings"></span><span class="greeting">, {{$user->name}}</span></b>
            Welcome to MillionDox!
          </h2>
        </div>  
        <script>
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
        var greetingElement = document.getElementById("greetings");

        // Check if the greeting element exists
        if (greetingElement) {
            // Set the greeting text content
            greetingElement.textContent = greeting;
        } else {
            console.error("Element with ID 'greeting' not found.");
        }
    </script>
				<!--	  
         <div class="filter_drop">
         <select id="fyear_one_f1" name="fyear_one" required="" onchange="fetchData(this.value)">
            <option value="" disabled="" selected="">Financial Year</option>
           
            <option value="2013-2014">2013-2014</option>
              <option value="2014-2015">2014-2015</option>
               <option value="2015-2016">2015-2016</option>
                <option value="2016-2017">2016-2017</option>
                 <option value="2017-2018">2017-2018</option>
                  <option value="2018-2019">2018-2019</option>
                   <option value="2019-2020">2019-2020</option>
                  
            <option value="2020-2021">2020-2021</option>
            <option value="2021-2022">2021-2022</option>
            <option value="2022-2023">2022-2023</option>
            <option value="2023-2024">2023-2024</option>
            <option value="2024-2025">2024-2025</option>
            <option value="2025-2026">2025-2026</option>
             <option value="2026-2027">2026-2027</option>

              <option value="2027-2028">2027-2028</option>
               <option value="2028-2029">2028-2029</option>
                <option value="2029-2030">2029-2030</option>
                 <option value="2030-2031">2030-2031</option>
                  <option value="2031-2032">2031-2032</option>
                   <option value="2032-2033">2032-2033</option>
                    <option value="2033-2034">2033-2034</option>
                     <option value="2034-2035">2034-2035</option>
                      <option value="2035-2036">2035-2036</option>
                       <option value="2036-2037">2036-2037</option>
        </select>
       
</div>
 <button type="button" name="Clear Filter" id="clear_filter">Clear Filter</button>
 -->
</div>
<script>
// document.getElementById('clear_filter').addEventListener('click', function() {
//     // Clear the dropdown selection
//     document.getElementById('fyear_one_f1').value = "";
    
//     // Optionally, clear the filtered data display
//     $('.filter_year_Data').html(''); // Clear the filtered data
// });

// function fetchData(financialYear) {
//     // Show loader
//     showLoader();

//     // Fetch and display filtered data
//     const url = `/get-union-results/${financialYear}`;
    
//     fetch(url)
//         .then(response => response.json())
//         .then(data => {
//             // Handle the data received from the server
//             console.log(data);

//             // Update the filtered data div with the new data
//             $('.filter_year_Data').html(generateFilteredDataHtml(data));

//             // Optionally, initialize DataTables
//             $('#filteredDataTable').DataTable({
//                 responsive: true
//             });

//             // Hide loader
//             hideLoader();
//         })
//         .catch(error => {
//             console.error('Error fetching data:', error);

//             // Hide loader in case of error
//             hideLoader();
//         });
// }

// function generateFilteredDataHtml(data) {
//     let html = `
//         <table class="table table-striped display" style="width:100%" id="filteredDataTable">
//             <thead>
//                 <tr>
//                     <th>File Name</th>
//                     <th>File Size</th>
//                     <th>Financial Year</th>
//                     <th>Month</th>
//                     <th>Tags</th>
//                     <th>Created At</th>
                   
//                 </tr>
//             </thead>
//             <tbody>
//     `;

//     data.forEach(item => {
//         const formattedFileSize = formatFileSize(item.file_size);
//         html += `
//             <tr>
//                 <td>${item.file_name}</td>
//                 <td>${formattedFileSize}</td>
//                 <td>${item.fyear}</td>
//                 <td>${item.Month}</td>
//                 <td>${item.Tags}</td>
//                 <td>${item.created_at}</td>
               
//             </tr>
//         `;
//     });

//     html += `
//             </tbody>
//         </table>
//     `;

//     return html;
// }

// // Helper function to format file size
// function formatFileSize(fileSize) {
//     const fileSizeInBytes = parseInt(fileSize, 10);
//     if (isNaN(fileSizeInBytes)) return fileSize;

//     const units = ['B', 'KB', 'MB', 'GB'];
//     let index = 0;
//     let formattedSize = fileSizeInBytes;

//     while (formattedSize >= 1024 && index < units.length - 1) {
//         formattedSize /= 1024;
//         index++;
//     }

//     return `${formattedSize.toFixed(2)} ${units[index]}`;
// }

// // Event delegation for download button click
// // document.body.addEventListener('click', function(event) {
// //     if (event.target.classList.contains('download_nt')) {
// //         event.preventDefault();

// //         // Get the file ID, source table, and name from the data attributes
// //         const fileId = event.target.getAttribute('data-file-id');
// //         const sourceTable = event.target.getAttribute('data-source-table');
// //         const fileName = event.target.getAttribute('data-file-name');

// //         // Construct the download URL using file ID and source table
// //         const downloadUrl = `/download-file/${sourceTable}/${fileId}`;

// //         // Create a temporary link element and trigger a click to start the download
// //         const link = document.createElement('a');
// //         link.href = downloadUrl;
// //         link.download = fileName;
// //         document.body.appendChild(link);
// //         link.click();
// //         document.body.removeChild(link);
// //     }
// // });

// function showLoader() {
//     const loader = document.createElement('div');
//     loader.id = 'loader';
//     loader.classList.add('loader');
//     document.body.appendChild(loader);
// }

// function hideLoader() {
//     const loader = document.getElementById('loader');
//     if (loader) {
//         document.body.removeChild(loader);
//     }
// }


</script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>


{{--
<ul>
<div class="nI-gNb-backdrop" data-testid="backdrop"></div>
             <li>
             <div class="nI-gNb-search-bar">
    <div class="nI-gNb-sb__main">
        <div class="nI-gNb-sb__full-view">
            <div class="nI-gNb-sb__keywords">
              <div class="suggestor-box flex-row flex-wrap bottom ">
                <input class="suggestor-input " placeholder="Enter keyword / designation / companies" tabindex="-1" type="text" value="">
              </div>
            </div>
    </div>
    <span class="nI-gNb-sb__placeholder">Search for a file</span>
    <button class="nI-gNb-sb__icon-wrapper" tabindex="0"><span class="ni-gnb-icn ni-gnb-icn-search">
    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 14.75L10.25 10.25M1.25 6.5C1.25 7.18944 1.3858 7.87213 1.64963 8.50909C1.91347 9.14605 2.30018 9.7248 2.78769 10.2123C3.2752 10.6998 3.85395 11.0865 4.49091 11.3504C5.12787 11.6142 5.81056 11.75 6.5 11.75C7.18944 11.75 7.87213 11.6142 8.50909 11.3504C9.14605 11.0865 9.7248 10.6998 10.2123 10.2123C10.6998 9.7248 11.0865 9.14605 11.3504 8.50909C11.6142 7.87213 11.75 7.18944 11.75 6.5C11.75 5.81056 11.6142 5.12787 11.3504 4.49091C11.0865 3.85395 10.6998 3.2752 10.2123 2.78769C9.7248 2.30018 9.14605 1.91347 8.50909 1.64963C7.87213 1.3858 7.18944 1.25 6.5 1.25C5.81056 1.25 5.12787 1.3858 4.49091 1.64963C3.85395 1.91347 3.2752 2.30018 2.78769 2.78769C2.30018 3.2752 1.91347 3.85395 1.64963 4.49091C1.3858 5.12787 1.25 5.81056 1.25 6.5Z" stroke="#BFBFBF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
    </span>
    <span>Search</span>
  </button>
  </div>
</div>

             </li>
</ul>
--}}

             <ul>
                
                 <li>
                     <div class="go_and_search">
                         <a class="g_searttcg" onclick="openToast('info')">
                             Advanced Search
                         <div class="gp_arrow">
                             <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.33317 6L14.6665 6M14.6665 6L9.6665 11M14.6665 6L9.6665 1" stroke="#1E1E1E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                         </div>
                         </a>
                     </div>
                 </li>

<li>
         <div class="mode">
        <span class="slider"></span>
   </div>
</li>

                <li class="setting_munal">
<div class="repo_setting">
    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.64288 17.5706L6.30003 14.8277C6.11431 14.7563 5.93946 14.6706 5.77546 14.5706C5.61146 14.4706 5.4506 14.3634 5.29289 14.2492L2.74288 15.3206L0.385742 11.2492L2.59288 9.57773C2.5786 9.47773 2.57146 9.38145 2.57146 9.28888V8.71031C2.57146 8.61716 2.5786 8.52059 2.59288 8.42059L0.385742 6.74916L2.74288 2.67773L5.29289 3.74916C5.45003 3.63488 5.61431 3.52773 5.78574 3.42773C5.95717 3.32773 6.1286 3.24202 6.30003 3.17059L6.64288 0.427734H11.3572L11.7 3.17059C11.8857 3.24202 12.0609 3.32773 12.2255 3.42773C12.39 3.52773 12.5506 3.63488 12.7072 3.74916L15.2572 2.67773L17.6143 6.74916L15.4072 8.42059C15.4215 8.52059 15.4286 8.61716 15.4286 8.71031V9.28802C15.4286 9.38116 15.4143 9.47773 15.3857 9.57773L17.5929 11.2492L15.2357 15.3206L12.7072 14.2492C12.55 14.3634 12.3857 14.4706 12.2143 14.5706C12.0429 14.6706 11.8715 14.7563 11.7 14.8277L11.3572 17.5706H6.64288ZM9.04288 11.9992C9.87146 11.9992 10.5786 11.7063 11.1643 11.1206C11.75 10.5349 12.0429 9.82773 12.0429 8.99916C12.0429 8.17059 11.75 7.46345 11.1643 6.87773C10.5786 6.29202 9.87146 5.99916 9.04288 5.99916C8.20003 5.99916 7.48917 6.29202 6.91031 6.87773C6.33146 7.46345 6.04231 8.17059 6.04289 8.99916C6.04289 9.82773 6.33231 10.5349 6.91117 11.1206C7.49003 11.7063 8.2006 11.9992 9.04288 11.9992Z" fill="#BABABA"/>
</svg>
</div>
<ul class="setting_opt">
    
                    <li class="logout_out">
                    <a class="logou_inn" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
<svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.25 7C5.25 6.83424 5.31585 6.67527 5.43306 6.55806C5.55027 6.44085 5.70924 6.375 5.875 6.375H11.5V2.3125C11.5 1.0625 10.1801 0.125 9 0.125H3.0625C2.48253 0.12562 1.92649 0.356288 1.51639 0.766389C1.10629 1.17649 0.87562 1.73253 0.875 2.3125V11.6875C0.87562 12.2675 1.10629 12.8235 1.51639 13.2336C1.92649 13.6437 2.48253 13.8744 3.0625 13.875H9.3125C9.89247 13.8744 10.4485 13.6437 10.8586 13.2336C11.2687 12.8235 11.4994 12.2675 11.5 11.6875V7.625H5.875C5.70924 7.625 5.55027 7.55915 5.43306 7.44194C5.31585 7.32473 5.25 7.16576 5.25 7ZM16.9418 6.5582L13.8168 3.4332C13.6986 3.32094 13.5413 3.25928 13.3783 3.26137C13.2153 3.26345 13.0596 3.32912 12.9444 3.44437C12.8291 3.55962 12.7635 3.71534 12.7614 3.87831C12.7593 4.04129 12.8209 4.19863 12.9332 4.3168L14.991 6.375H11.5V7.625H14.991L12.9332 9.6832C12.8727 9.74066 12.8244 9.80965 12.791 9.88609C12.7576 9.96254 12.7398 10.0449 12.7387 10.1283C12.7377 10.2117 12.7533 10.2945 12.7847 10.3718C12.8162 10.4491 12.8628 10.5193 12.9217 10.5783C12.9807 10.6372 13.0509 10.6838 13.1282 10.7153C13.2055 10.7467 13.2883 10.7623 13.3717 10.7613C13.4551 10.7602 13.5375 10.7424 13.6139 10.709C13.6904 10.6756 13.7593 10.6273 13.8168 10.5668L16.9418 7.4418C17.0589 7.3246 17.1247 7.16569 17.1247 7C17.1247 6.83431 17.0589 6.6754 16.9418 6.5582Z" fill="#CEFFA8"/>
</svg> Log Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                
</ul>
                </li>
                



             </ul>
         </div>
            <div class="Inc_table">
              <div class="row">
                <div class="col-sm-12 tba_history_rap">
                  <div class="filtr_tabble">

                    <div class="hearder-entres">
                      <div class="volt_headd-filter">
<span>Home</span>
                     <div class="go_and_search">
                         <a class="g_searttcg" target="_blank" onclick="openToast('info')">
                             Advanced Search
                         <div class="gp_arrow">
                             <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.33317 6L14.6665 6M14.6665 6L9.6665 11M14.6665 6L9.6665 1" stroke="#1E1E1E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                         </div>
                         </a>
                     </div>
                      </div>

                      </div>
					
					<!-- Content start-->
					
          <div class="entry_body_wraap">         
         <div class="entery_body table-responsive left_side_wraap">
             
             <div class="drag_file_left_panel">
                 
                 <div class="upload-wrapper">
    <div class="cloud-icon">
<svg viewBox="0 0 640 512" xmlns="http://www.w3.org/2000/svg"><path d="M537.6 226.6C541.7 215.9 544 204.2 544 192c0-53-43-96-96-96c-19.69 0-38.09 6-53.31 16.2C367 64.2 315.3 32 256 32C167.6 32 96 103.6 96 192c0 2.703 .1094 5.445 .2031 8.133C40.2 219.8 0 273.2 0 336C0 415.5 64.5 480 144 480H512c70.69 0 128-57.3 128-128C640 290.1 596 238.4 537.6 226.6zM215 255l88-88C305.6 164.5 311.5 160 320 160s14.4 4.467 16.97 7.031l88 88c9.375 9.375 9.375 24.56 0 33.94s-24.56 9.375-33.94 0L344 241.9V392c0 13.25-10.75 24-24 24s-24-10.75-24-24V241.9L248.1 288.1c-9.375 9.375-24.56 9.375-33.94 0S205.7 264.4 215 255z"/></svg>
    </div>
    <div class="upload-text">
        <p>Drop files to upload them to</p>
        <p class="drive"><img src="https://img.icons8.com/ios-filled/50/ffffff/google-drive.png" /> My Drive</p>
    </div>
</div>

             </div>
             
        <div class="table_title">

<div class="filter-buttons-ff">
    
<div class="lg_coman folder-file-button active">
  All
  </div>

<div class="lg_coman folder-view-button">
  Folders
  </div>
  <div class="lg_coman file-view-button">
  Path & Files 
  </div>
</div>


<script>
// $(document).ready(function() {
//   const $folderViewButton = $('.folder-view-button');
//   const $fileViewButton = $('.file-view-button');
//   const $listt = $('.folder_comman_file');

//   // Retrieve the last active view from sessionStorage
//   const lastActiveView = sessionStorage.getItem('activeView');

//   // Apply the active class based on the stored value
//   if (lastActiveView === 'folders') {
//     $folderViewButton.addClass('active');
//     $fileViewButton.removeClass('active');
//     $listt.removeClass('file-view-filter').addClass('folder-view-filter');
//   } else if (lastActiveView === 'files') {
//     $fileViewButton.addClass('active');
//     $folderViewButton.removeClass('active');
//     $listt.removeClass('folder-view-filter').addClass('file-view-filter');
//   }

//   $folderViewButton.on('click', function() {
//     $listt.removeClass('file-view-filter').addClass('folder-view-filter');
//     $folderViewButton.addClass('active');
//     $fileViewButton.removeClass('active');
//     // Store the active view in sessionStorage
//     sessionStorage.setItem('activeView', 'folders');
//   });

//   $fileViewButton.on('click', function() {
//     $listt.removeClass('folder-view-filter').addClass('file-view-filter');
//     $fileViewButton.addClass('active');
//     $folderViewButton.removeClass('active');
//     // Store the active view in sessionStorage
//     sessionStorage.setItem('activeView', 'files');
//   });
// });



// $(document).ready(function() {
//     const $allViewButton = $('.folder-file-button');
//     const $folderViewButton = $('.folder-view-button');
//     const $fileViewButton = $('.file-view-button');
//     const $list = $('.folder_comman_file');
  
//     if ($allViewButton.length && $folderViewButton.length && $fileViewButton.length && $list.length) {
//       $allViewButton.on('click', function() {
//         $list.removeClass('folder-view-filter file-view-filter').addClass('folder-file-filter');
//         $allViewButton.addClass('active');
//         $folderViewButton.removeClass('active');
//         $fileViewButton.removeClass('active');

//          if ($('.folder-container .custom_table_wraap.nestfile').length === 0) {
//             $('#folds').show();
//         } else {
//             $('#folds').hide();
//         }
//       });
  
//       $folderViewButton.on('click', function() {
//         $list.removeClass('file-view-filter folder-file-filter').addClass('folder-view-filter');
//         $folderViewButton.addClass('active');
//         $allViewButton.removeClass('active');
//         $fileViewButton.removeClass('active');

//         if ($('.folder-container .custom_table_wraap.nestfile').length === 0) {
//             $('#folds').show();
//         } else {
//             $('#folds').hide();
//         }
//       });
  
//       $fileViewButton.on('click', function() {
//         $list.removeClass('folder-view-filter folder-file-filter').addClass('file-view-filter');
//         $fileViewButton.addClass('active');
//         $allViewButton.removeClass('active');
//         $folderViewButton.removeClass('active');
//         // You can add any specific logic for file view here if needed
//       });
//     } else {
//       console.error('One or more elements not found.');
//     }
//   });


$(document).ready(function() {
  const $allViewButton = $('.folder-file-button');
  const $folderViewButton = $('.folder-view-button');
  const $fileViewButton = $('.file-view-button');
  const $list = $('.folder_comman_file');

  // Retrieve the last active view from sessionStorage
  const lastActiveView = sessionStorage.getItem('activeView');

  // If no active view is stored, set 'all' as default
  if (!lastActiveView) {
    sessionStorage.setItem('activeView', 'all');
  }

  // Apply the active class based on the stored value or default to 'all'
  if (lastActiveView === 'folders') {
    $folderViewButton.addClass('active');
    $allViewButton.removeClass('active');
    $fileViewButton.removeClass('active');
    $list.removeClass('file-view-filter folder-file-filter').addClass('folder-view-filter');
  } else if (lastActiveView === 'files') {
    $fileViewButton.addClass('active');
    $allViewButton.removeClass('active');
    $folderViewButton.removeClass('active');
    $list.removeClass('folder-view-filter folder-file-filter').addClass('file-view-filter');
  } else {
    // Default to 'all' view
    $allViewButton.addClass('active');
    $folderViewButton.removeClass('active');
    $fileViewButton.removeClass('active');
    $list.removeClass('folder-view-filter file-view-filter').addClass('folder-file-filter');
  }

  // Ensure all view buttons are functional and interact as expected
  if ($allViewButton.length && $folderViewButton.length && $fileViewButton.length && $list.length) {
    $allViewButton.on('click', function() {
      $list.removeClass('folder-view-filter file-view-filter').addClass('folder-file-filter');
      $allViewButton.addClass('active');
      $folderViewButton.removeClass('active');
      $fileViewButton.removeClass('active');
      sessionStorage.setItem('activeView', 'all');

      // Show/hide folder-specific element
      if ($('.folder-container .custom_table_wraap.nestfile').length === 0) {
        $('#folds').show();
      } else {
        $('#folds').hide();
      }
    });

    $folderViewButton.on('click', function() {
      $list.removeClass('file-view-filter folder-file-filter').addClass('folder-view-filter');
      $folderViewButton.addClass('active');
      $allViewButton.removeClass('active');
      $fileViewButton.removeClass('active');
      sessionStorage.setItem('activeView', 'folders');

      // Show/hide folder-specific element
      if ($('.folder-container .custom_table_wraap.nestfile').length === 0) {
        $('#folds').show();
      } else {
        $('#folds').hide();
      }
    });

    $fileViewButton.on('click', function() {
      $list.removeClass('folder-view-filter folder-file-filter').addClass('file-view-filter');
      $fileViewButton.addClass('active');
      $allViewButton.removeClass('active');
      $folderViewButton.removeClass('active');
      sessionStorage.setItem('activeView', 'files');

      // Additional logic for file view
    });
  } else {
    console.error('One or more elements not found.');
  }
});


</script>
  

            <div class="folder_filter_wrap">
<div class="select_filter">
  <select id="sortOptions" name="sortOptions" class="sort-options">
  <option value="a-to-z">A → Z</option>
  <option value="z-to-a">Z → A</option>
  <!--<option value="recent">Recently Used</option>-->
</select>
</div>
<script>
$(document).ready(function() {
    // Function to check the URL and toggle the select_filter div
    function checkUrl() {
        var currentUrl = window.location.href;

        // Check if the URL matches exactly and has no parameters
        if (currentUrl === 'https://milliondox.in/docurepo#') {
            // Hide the select_filter div
            $('.select_filter').hide();
        }

        // If URL contains parameters (anything after '?folder='), show the select_filter div
        if (currentUrl.includes('?folder=')) {
            // Show the select_filter div
            $('.select_filter').show();
        }
    }

    // Run the check every second (1000 milliseconds)
    setInterval(checkUrl, 100);
});


</script>
            <div class="filter-buttons">
  <div class="lg_coman list-view-button">
  <svg width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.332031 1.08333C0.332031 0.928624 0.39349 0.780251 0.502886 0.670854C0.612282 0.561458 0.760655 0.5 0.915365 0.5H1.4987C1.65341 0.5 1.80178 0.561458 1.91118 0.670854C2.02057 0.780251 2.08203 0.928624 2.08203 1.08333C2.08203 1.23804 2.02057 1.38642 1.91118 1.49581C1.80178 1.60521 1.65341 1.66667 1.4987 1.66667H0.915365C0.760655 1.66667 0.612282 1.60521 0.502886 1.49581C0.39349 1.38642 0.332031 1.23804 0.332031 1.08333ZM3.2487 1.08333C3.2487 0.928624 3.31016 0.780251 3.41955 0.670854C3.52895 0.561458 3.67732 0.5 3.83203 0.5H9.08203C9.23674 0.5 9.38511 0.561458 9.49451 0.670854C9.60391 0.780251 9.66537 0.928624 9.66537 1.08333C9.66537 1.23804 9.60391 1.38642 9.49451 1.49581C9.38511 1.60521 9.23674 1.66667 9.08203 1.66667H3.83203C3.67732 1.66667 3.52895 1.60521 3.41955 1.49581C3.31016 1.38642 3.2487 1.23804 3.2487 1.08333ZM0.332031 4C0.332031 3.84529 0.39349 3.69692 0.502886 3.58752C0.612282 3.47812 0.760655 3.41667 0.915365 3.41667H1.4987C1.65341 3.41667 1.80178 3.47812 1.91118 3.58752C2.02057 3.69692 2.08203 3.84529 2.08203 4C2.08203 4.15471 2.02057 4.30308 1.91118 4.41248C1.80178 4.52187 1.65341 4.58333 1.4987 4.58333H0.915365C0.760655 4.58333 0.612282 4.52187 0.502886 4.41248C0.39349 4.30308 0.332031 4.15471 0.332031 4ZM3.2487 4C3.2487 3.84529 3.31016 3.69692 3.41955 3.58752C3.52895 3.47812 3.67732 3.41667 3.83203 3.41667H9.08203C9.23674 3.41667 9.38511 3.47812 9.49451 3.58752C9.60391 3.69692 9.66537 3.84529 9.66537 4C9.66537 4.15471 9.60391 4.30308 9.49451 4.41248C9.38511 4.52187 9.23674 4.58333 9.08203 4.58333H3.83203C3.67732 4.58333 3.52895 4.52187 3.41955 4.41248C3.31016 4.30308 3.2487 4.15471 3.2487 4ZM0.332031 6.91667C0.332031 6.76196 0.39349 6.61358 0.502886 6.50419C0.612282 6.39479 0.760655 6.33333 0.915365 6.33333H1.4987C1.65341 6.33333 1.80178 6.39479 1.91118 6.50419C2.02057 6.61358 2.08203 6.76196 2.08203 6.91667C2.08203 7.07138 2.02057 7.21975 1.91118 7.32915C1.80178 7.43854 1.65341 7.5 1.4987 7.5H0.915365C0.760655 7.5 0.612282 7.43854 0.502886 7.32915C0.39349 7.21975 0.332031 7.07138 0.332031 6.91667ZM3.2487 6.91667C3.2487 6.76196 3.31016 6.61358 3.41955 6.50419C3.52895 6.39479 3.67732 6.33333 3.83203 6.33333H9.08203C9.23674 6.33333 9.38511 6.39479 9.49451 6.50419C9.60391 6.61358 9.66537 6.76196 9.66537 6.91667C9.66537 7.07138 9.60391 7.21975 9.49451 7.32915C9.38511 7.43854 9.23674 7.5 9.08203 7.5H3.83203C3.67732 7.5 3.52895 7.43854 3.41955 7.32915C3.31016 7.21975 3.2487 7.07138 3.2487 6.91667Z" fill="#979797"/>
</svg>
  </div>
  <div class="lg_coman grid-view-button active">
  <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="5.59917" height="3.19952" rx="1" fill="#979797"/>
<rect y="3.99951" width="5.59917" height="3.19952" rx="1" fill="#979797"/>
<rect x="6.40234" width="5.59917" height="3.19952" rx="1" fill="#979797"/>
<rect x="6.40234" y="3.99951" width="5.59917" height="3.19952" rx="1" fill="#979797"/>
</svg>
  </div>
</div>

<div class="side_filder_add">
    <!-- footer add folder or file button start -->
<div class="ba-we-love-subscribers-wrap">
    <div class="ba-we-love-subscribers popup-ani">
        <div class="sadd_filds bottom_flide_folder">
            <button class="hvr-rotatee" id="create_folder" data-bs-toggle="modal" data-bs-target="#create_folderr">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M1.8962 4.82C1.83203 5.15733 1.83203 5.5625 1.83203 6.371V12.8335C1.83203 16.2902 1.83203 18.0191 2.90636 19.0925C3.97978 20.1668 5.70861 20.1668 9.16536 20.1668H12.832C16.2888 20.1668 18.0176 20.1668 19.091 19.0925C20.1654 18.0191 20.1654 16.2902 20.1654 12.8335V10.815C20.1654 8.40233 20.1654 7.19508 19.4595 6.41133C19.3948 6.33898 19.3263 6.27014 19.2542 6.20508C18.4704 5.50016 17.2632 5.50016 14.8505 5.50016H14.5077C13.4508 5.50016 12.9219 5.50016 12.4287 5.35991C12.1581 5.28255 11.8972 5.17428 11.6514 5.03725C11.204 4.78883 10.83 4.41391 10.082 3.66683L9.57786 3.16266C9.3267 2.9115 9.20203 2.78683 9.07003 2.67683C8.50231 2.20625 7.80589 1.91778 7.0717 1.84908C6.9012 1.8335 6.72336 1.8335 6.36953 1.8335C5.56011 1.8335 5.15586 1.8335 4.81853 1.89766C4.09422 2.03445 3.42795 2.38637 2.90664 2.90751C2.38534 3.42865 2.03321 4.09573 1.8962 4.82ZM11.2279 9.16683C11.2279 8.98449 11.3003 8.80962 11.4292 8.68069C11.5582 8.55176 11.733 8.47933 11.9154 8.47933H16.4987C16.681 8.47933 16.8559 8.55176 16.9848 8.68069C17.1138 8.80962 17.1862 8.98449 17.1862 9.16683C17.1862 9.34917 17.1138 9.52403 16.9848 9.65296C16.8559 9.7819 16.681 9.85433 16.4987 9.85433H11.9154C11.733 9.85433 11.5582 9.7819 11.4292 9.65296C11.3003 9.52403 11.2279 9.34917 11.2279 9.16683Z" fill="#1E1E1E"/>
</svg> Create a folder</button>
            <button class="hvr-rotatee" id="upload_file" data-bs-toggle="modal" data-bs-target="#upload_filee">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M12.0004 15.7501C12.1993 15.7501 12.39 15.6711 12.5307 15.5304C12.6713 15.3897 12.7504 15.199 12.7504 15.0001V4.02707L14.4304 5.98807C14.5598 6.13924 14.744 6.23281 14.9424 6.24819C15.1408 6.26357 15.3372 6.19949 15.4884 6.07007C15.6395 5.94064 15.7331 5.75647 15.7485 5.55805C15.7639 5.35964 15.6998 5.16324 15.5704 5.01207L12.5704 1.51207C12.5 1.42973 12.4125 1.36363 12.3141 1.31831C12.2157 1.27298 12.1087 1.24951 12.0004 1.24951C11.892 1.24951 11.785 1.27298 11.6866 1.31831C11.5882 1.36363 11.5008 1.42973 11.4304 1.51207L8.43036 5.01207C8.36628 5.08692 8.31756 5.17367 8.287 5.26735C8.25644 5.36103 8.24463 5.45981 8.25224 5.55805C8.25986 5.6563 8.28675 5.75208 8.33138 5.83993C8.37601 5.92778 8.43751 6.00598 8.51236 6.07007C8.58722 6.13415 8.67396 6.18287 8.76764 6.21343C8.86132 6.24399 8.9601 6.2558 9.05835 6.24819C9.15659 6.24057 9.25237 6.21368 9.34022 6.16905C9.42808 6.12442 9.50628 6.06292 9.57036 5.98807L11.2504 4.02807V15.0001C11.2504 15.4141 11.5864 15.7501 12.0004 15.7501Z" fill="#1E1E1E"/>
<path d="M16 9C15.298 9 14.947 9 14.694 9.169C14.5852 9.24179 14.4918 9.33522 14.419 9.444C14.25 9.697 14.25 10.048 14.25 10.75V15C14.25 15.5967 14.0129 16.169 13.591 16.591C13.169 17.0129 12.5967 17.25 12 17.25C11.4033 17.25 10.831 17.0129 10.409 16.591C9.98705 16.169 9.75 15.5967 9.75 15V10.75C9.75 10.048 9.75 9.697 9.581 9.444C9.50821 9.33522 9.41478 9.24179 9.306 9.169C9.053 9 8.702 9 8 9C5.172 9 3.757 9 2.879 9.879C2 10.757 2 12.17 2 14.999V15.999C2 18.829 2 20.242 2.879 21.121C3.757 22 5.172 22 8 22H16C18.828 22 20.243 22 21.121 21.121C22 20.242 22 18.828 22 16V15C22 12.171 22 10.757 21.121 9.879C20.243 9 18.828 9 16 9Z" fill="#1E1E1E"/>
</svg>
 Upload file</button>
 
             <button class="hvr-rotatee" id="open_repo_filter">
<svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M12.5396 2.49356C12.1348 2.42492 11.5821 2.41964 10.5859 2.41964C8.89895 2.41964 7.69948 2.4214 6.7913 2.54284C5.90072 2.66164 5.38943 2.88605 5.01718 3.25742C4.64493 3.62967 4.42141 4.14008 4.30261 5.02538C4.18116 5.93004 4.1794 7.12158 4.1794 8.80066V12.3207C4.1794 13.9981 4.18116 15.1896 4.30261 16.0943C4.42141 16.9796 4.64493 17.49 5.01718 17.8631C5.38943 18.2345 5.89984 18.458 6.78514 18.5768C7.6898 18.6991 8.88135 18.7 10.5595 18.7H14.0796C15.7578 18.7 16.9502 18.6982 17.8549 18.5768C18.7393 18.458 19.2497 18.2345 19.622 17.8622C19.9942 17.49 20.2178 16.9796 20.3366 16.0943C20.458 15.1905 20.4598 13.9981 20.4598 12.3199V11.9353C20.4598 10.5836 20.451 9.94293 20.3066 9.45979H17.5522C16.5551 9.45979 15.7411 9.45979 15.0969 9.37355C14.4255 9.28291 13.8429 9.08755 13.3774 8.62202C12.9118 8.15649 12.7165 7.57479 12.6258 6.90158C12.5396 6.25916 12.5396 5.44427 12.5396 4.44632V2.49356ZM13.8596 3.17646V4.39968C13.8596 5.45571 13.8614 6.18084 13.9344 6.72557C14.0048 7.25183 14.1315 7.50967 14.3111 7.68832C14.4897 7.86784 14.7476 7.99456 15.2738 8.06496C15.8185 8.13801 16.5437 8.13977 17.5997 8.13977H19.3773C19.0396 7.8182 18.6964 7.50252 18.3477 7.19286L14.8637 4.05736C14.535 3.75692 14.2003 3.46323 13.8596 3.17646ZM10.7135 1.09961C11.9324 1.09961 12.72 1.09961 13.4442 1.37682C14.1685 1.6549 14.7511 2.17939 15.6531 2.99165L15.7473 3.07613L19.2304 6.21164L19.3404 6.3102C20.3823 7.24743 21.0564 7.85376 21.4181 8.6669C21.7807 9.48004 21.7807 10.3865 21.7798 11.7874V12.3691C21.7798 13.9866 21.7798 15.2679 21.6451 16.2703C21.5061 17.3016 21.2139 18.1368 20.5557 18.7959C19.8966 19.4542 19.0614 19.7463 18.03 19.8854C17.0268 20.02 15.7464 20.02 14.1289 20.02H10.5103C8.89279 20.02 7.61148 20.02 6.60914 19.8854C5.57776 19.7463 4.74262 19.4542 4.08348 18.7959C3.42523 18.1368 3.13306 17.3016 2.99402 16.2703C2.85938 15.267 2.85938 13.9866 2.85938 12.3691V8.75138C2.85938 7.1339 2.85938 5.85259 2.99402 4.85025C3.13306 3.81887 3.42523 2.98373 4.08348 2.3246C4.7435 1.66546 5.58039 1.37418 6.61618 1.23513C7.62292 1.10049 8.91039 1.10049 10.5367 1.10049H10.5859L10.7135 1.09961Z" fill="#1E1E1E"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M18.0002 17.8753C18.0996 17.8753 18.195 17.8358 18.2653 17.7654C18.3357 17.6951 18.3752 17.5997 18.3752 17.5003V12.0138L19.2152 12.9943C19.2799 13.0699 19.372 13.1166 19.4712 13.1243C19.5704 13.132 19.6686 13.1 19.7442 13.0353C19.8198 12.9706 19.8666 12.8785 19.8742 12.7793C19.8819 12.6801 19.8499 12.5819 19.7852 12.5063L18.2852 10.7563C18.25 10.7151 18.2063 10.6821 18.1571 10.6594C18.1079 10.6367 18.0543 10.625 18.0002 10.625C17.946 10.625 17.8925 10.6367 17.8433 10.6594C17.7941 10.6821 17.7504 10.7151 17.7152 10.7563L16.2152 12.5063C16.1831 12.5437 16.1588 12.5871 16.1435 12.6339C16.1282 12.6808 16.1223 12.7301 16.1261 12.7793C16.1299 12.8284 16.1434 12.8763 16.1657 12.9202C16.188 12.9641 16.2188 13.0032 16.2562 13.0353C16.2936 13.0673 16.337 13.0917 16.3838 13.107C16.4307 13.1222 16.4801 13.1281 16.5292 13.1243C16.5783 13.1205 16.6262 13.1071 16.6701 13.0848C16.714 13.0625 16.7531 13.0317 16.7852 12.9943L17.6252 12.0143V17.5003C17.6252 17.7073 17.7932 17.8753 18.0002 17.8753Z" fill="#1E1E1E"/>
<path d="M20 14.5C19.649 14.5 19.4735 14.5 19.347 14.5845C19.2926 14.6209 19.2459 14.6676 19.2095 14.722C19.125 14.8485 19.125 15.024 19.125 15.375V17.5C19.125 17.7984 19.0065 18.0845 18.7955 18.2955C18.5845 18.5065 18.2984 18.625 18 18.625C17.7016 18.625 17.4155 18.5065 17.2045 18.2955C16.9935 18.0845 16.875 17.7984 16.875 17.5V15.375C16.875 15.024 16.875 14.8485 16.7905 14.722C16.7541 14.6676 16.7074 14.6209 16.653 14.5845C16.5265 14.5 16.351 14.5 16 14.5C14.586 14.5 13.8785 14.5 13.4395 14.9395C13 15.3785 13 16.085 13 17.4995V17.9995C13 19.4145 13 20.121 13.4395 20.5605C13.8785 21 14.586 21 16 21H20C21.414 21 22.1215 21 22.5605 20.5605C23 20.121 23 19.414 23 18V17.5C23 16.0855 23 15.3785 22.5605 14.9395C22.1215 14.5 21.414 14.5 20 14.5Z" fill="#1E1E1E"/>
<ellipse cx="5.28012" cy="15.8387" rx="5.28012" ry="5.28012" fill="#1E1E1E"/>
<path d="M3.61418 17.7988V13.4788H4.15418L6.40718 16.8538V13.4788H6.94718V17.7988H6.40718L4.15418 14.4208V17.7988H3.61418Z" fill="#E7E7E7"/>
</svg>
 Upload Pre-Defined File</button>
 
        </div>
    </div>
    <div class="ba-we-love-subscribers-fab" id="tretreter">
        <div class="wrap">
            <div class="img-fab img">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.41797 7.58341H2.91797V6.41675H6.41797V2.91675H7.58464V6.41675H11.0846V7.58341H7.58464V11.0834H6.41797V7.58341Z" fill="#7E7E7E"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to handle click on .ba-we-love-subscribers-fab
    $(".ba-we-love-subscribers-fab").click(function (event) {
        event.stopPropagation(); // Prevents the click from propagating to the document body
        $('.ba-we-love-subscribers-fab .wrap').toggleClass("ani");
        $('.ba-we-love-subscribers').toggleClass("open");
        $('.ba-we-love-subscribers-fab').toggleClass("grayy");
        $('.img-fab.img').toggleClass("close");
    });

    // Click outside handler to remove classes
    $(document).click(function (event) {
        // Check if the clicked element is NOT .ba-we-love-subscribers-fab or its descendants
        if (!$(event.target).closest('.ba-we-love-subscribers-fab').length) {
            // Remove classes here
            $('.ba-we-love-subscribers-fab .wrap').removeClass("ani");
            $('.ba-we-love-subscribers').removeClass("open");
            $('.ba-we-love-subscribers-fab').removeClass("grayy");
            $('.img-fab.img').removeClass("close");
        }
    });
</script>
<!-- footer add folder or file button end -->
</div>

<!-- filter_open button start -->
<a class="opn_redriect_filter" target="_blank" onclick="openToast('info')">
<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_3290_3371)">
<path d="M9.15381 10.8213L13.1538 14.8213M5.82048 12.1546C6.43331 12.1546 7.04015 12.0339 7.60633 11.7994C8.17252 11.5649 8.68697 11.2211 9.12031 10.7878C9.55365 10.3544 9.89739 9.84 10.1319 9.27381C10.3664 8.70763 10.4871 8.10079 10.4871 7.48796C10.4871 6.87512 10.3664 6.26829 10.1319 5.7021C9.89739 5.13591 9.55365 4.62146 9.12031 4.18812C8.68697 3.75478 8.17252 3.41104 7.60633 3.17652C7.04015 2.942 6.43331 2.82129 5.82048 2.82129C4.5828 2.82129 3.39581 3.31295 2.52064 4.18812C1.64547 5.06329 1.15381 6.25028 1.15381 7.48796C1.15381 8.72563 1.64547 9.91262 2.52064 10.7878C3.39581 11.663 4.5828 12.1546 5.82048 12.1546Z" stroke="#2C2C2C" stroke-width="1.5"/>
<path d="M13.5455 0V2.45455H16V3.54545H13.5455V6H12.4545V3.54545H10V2.45455H12.4545V0H13.5455Z" fill="#1E1E1E"/>
</g>
<defs>
<clipPath id="clip0_3290_3371">
<rect width="16" height="16" fill="white" transform="translate(0.153809 0.154297)"/>
</clipPath>
</defs>
</svg>
</a>

{{--
 <button id="open_repo_filter">
 <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="11" cy="11" r="10.5" fill="#CEFFA8" stroke="#1E1E1E"/>
<path d="M17.6654 15.4034C17.6654 15.5361 17.6127 15.6632 17.5189 15.757C17.4252 15.8508 17.298 15.9034 17.1654 15.9034H13.7654C13.654 16.3187 13.4088 16.6856 13.0676 16.9473C12.7265 17.209 12.3086 17.3508 11.8787 17.3508C11.4488 17.3508 11.0309 17.209 10.6898 16.9473C10.3486 16.6856 10.1034 16.3187 9.99203 15.9034H4.83203C4.69942 15.9034 4.57225 15.8508 4.47848 15.757C4.38471 15.6632 4.33203 15.5361 4.33203 15.4034C4.33203 15.2708 4.38471 15.1437 4.47848 15.0499C4.57225 14.9561 4.69942 14.9034 4.83203 14.9034H9.99203C10.1034 14.4882 10.3486 14.1213 10.6898 13.8596C11.0309 13.5979 11.4488 13.4561 11.8787 13.4561C12.3086 13.4561 12.7265 13.5979 13.0676 13.8596C13.4088 14.1213 13.654 14.4882 13.7654 14.9034H17.1654C17.298 14.9034 17.4252 14.9561 17.5189 15.0499C17.6127 15.1437 17.6654 15.2708 17.6654 15.4034ZM17.6654 6.59678C17.6654 6.72939 17.6127 6.85657 17.5189 6.95034C17.4252 7.0441 17.298 7.09678 17.1654 7.09678H15.532C15.4207 7.51203 15.1754 7.87894 14.8343 8.14063C14.4932 8.40231 14.0753 8.54415 13.6454 8.54415C13.2154 8.54415 12.7975 8.40231 12.4564 8.14063C12.1153 7.87894 11.8701 7.51203 11.7587 7.09678H4.83203C4.76637 7.09678 4.70135 7.08385 4.64069 7.05872C4.58003 7.0336 4.52491 6.99677 4.47848 6.95034C4.43205 6.90391 4.39522 6.84879 4.37009 6.78812C4.34496 6.72746 4.33203 6.66244 4.33203 6.59678C4.33203 6.53112 4.34496 6.4661 4.37009 6.40544C4.39522 6.34478 4.43205 6.28966 4.47848 6.24323C4.52491 6.1968 4.58003 6.15997 4.64069 6.13484C4.70135 6.10972 4.76637 6.09678 4.83203 6.09678H11.7587C11.8701 5.68153 12.1153 5.31462 12.4564 5.05294C12.7975 4.79125 13.2154 4.64941 13.6454 4.64941C14.0753 4.64941 14.4932 4.79125 14.8343 5.05294C15.1754 5.31462 15.4207 5.68153 15.532 6.09678H17.1654C17.2313 6.09589 17.2967 6.10821 17.3578 6.13302C17.4188 6.15783 17.4743 6.19462 17.5209 6.24123C17.5675 6.28784 17.6043 6.34332 17.6291 6.40439C17.6539 6.46545 17.6663 6.53087 17.6654 6.59678ZM17.6654 10.9968C17.6663 11.0627 17.6539 11.1281 17.6291 11.1892C17.6043 11.2502 17.5675 11.3057 17.5209 11.3523C17.4743 11.3989 17.4188 11.4357 17.3578 11.4605C17.2967 11.4854 17.2313 11.4977 17.1654 11.4968H9.36537C9.254 11.912 9.00876 12.2789 8.66765 12.5406C8.32654 12.8023 7.90862 12.9442 7.4787 12.9442C7.04877 12.9442 6.63086 12.8023 6.28975 12.5406C5.94864 12.2789 5.70339 11.912 5.59203 11.4968H4.83203C4.69942 11.4968 4.57225 11.4441 4.47848 11.3503C4.38471 11.2566 4.33203 11.1294 4.33203 10.9968C4.33203 10.8642 4.38471 10.737 4.47848 10.6432C4.57225 10.5495 4.69942 10.4968 4.83203 10.4968H5.59203C5.70339 10.0815 5.94864 9.71462 6.28975 9.45294C6.63086 9.19125 7.04877 9.04941 7.4787 9.04941C7.90862 9.04941 8.32654 9.19125 8.66765 9.45294C9.00876 9.71462 9.254 10.0815 9.36537 10.4968H17.1654C17.298 10.4968 17.4252 10.5495 17.5189 10.6432C17.6127 10.737 17.6654 10.8642 17.6654 10.9968Z" fill="#1E1E1E"/>
</svg>
</button>
--}}

<!-- filter_open button end -->

</div>
</div>

 <div class="comman_loderr" id="client_loader" style="display: none;">
      <div class="loder_wraper_inn_pos">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"> </div>
      <div class="dot"></div>
    </div>

                            </div>

<div class="folder_comman_file">
    <div class="main_folder">
        <div class="filter_year_Data">
            
        </div>
    <div class="nonfilter_year_data">
        <div class="folder-container list_gr_id"  id="foldercont">
            <!--<div class="loader" style="display: none;">Loading...</div>-->
            <div class="folder-contents"></div>
        </div>
       
        <div class="file-container" id="filecont" >
            
            <div class="file-contents"></div>
        </div>
        </div>
        </div>

        </div>

    </div>
    
    {{--

	<div class="entery_body table-responsive side_panel_wraap">
	
    <div class="wrap_side_nnt">
<div class="clode_fltr">
<button id="close_repo_filter">
<svg width="29" height="22" viewBox="0 0 29 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="11" cy="11" r="10.5" stroke="#CEFFA8"/>
<path d="M17.6663 15.4025C17.6663 15.5351 17.6137 15.6623 17.5199 15.756C17.4261 15.8498 17.299 15.9025 17.1663 15.9025H13.7663C13.655 16.3177 13.4097 16.6846 13.0686 16.9463C12.7275 17.208 12.3096 17.3498 11.8797 17.3498C11.4498 17.3498 11.0318 17.208 10.6907 16.9463C10.3496 16.6846 10.1044 16.3177 9.99301 15.9025H4.83301C4.7004 15.9025 4.57322 15.8498 4.47945 15.756C4.38569 15.6623 4.33301 15.5351 4.33301 15.4025C4.33301 15.2699 4.38569 15.1427 4.47945 15.0489C4.57322 14.9552 4.7004 14.9025 4.83301 14.9025H9.99301C10.1044 14.4872 10.3496 14.1203 10.6907 13.8586C11.0318 13.5969 11.4498 13.4551 11.8797 13.4551C12.3096 13.4551 12.7275 13.5969 13.0686 13.8586C13.4097 14.1203 13.655 14.4872 13.7663 14.9025H17.1663C17.299 14.9025 17.4261 14.9552 17.5199 15.0489C17.6137 15.1427 17.6663 15.2699 17.6663 15.4025ZM17.6663 6.59581C17.6663 6.72841 17.6137 6.85559 17.5199 6.94936C17.4261 7.04313 17.299 7.09581 17.1663 7.09581H15.533C15.4216 7.51106 15.1764 7.87797 14.8353 8.13965C14.4942 8.40134 14.0763 8.54318 13.6463 8.54318C13.2164 8.54318 12.7985 8.40134 12.4574 8.13965C12.1163 7.87797 11.871 7.51106 11.7597 7.09581H4.83301C4.76735 7.09581 4.70233 7.08287 4.64167 7.05775C4.581 7.03262 4.52588 6.99579 4.47945 6.94936C4.43303 6.90293 4.3962 6.84781 4.37107 6.78715C4.34594 6.72649 4.33301 6.66147 4.33301 6.59581C4.33301 6.53015 4.34594 6.46513 4.37107 6.40446C4.3962 6.3438 4.43303 6.28868 4.47945 6.24225C4.52588 6.19582 4.581 6.15899 4.64167 6.13387C4.70233 6.10874 4.76735 6.09581 4.83301 6.09581H11.7597C11.871 5.68056 12.1163 5.31364 12.4574 5.05196C12.7985 4.79028 13.2164 4.64844 13.6463 4.64844C14.0763 4.64844 14.4942 4.79028 14.8353 5.05196C15.1764 5.31364 15.4216 5.68056 15.533 6.09581H17.1663C17.2323 6.09491 17.2977 6.10723 17.3587 6.13204C17.4198 6.15685 17.4753 6.19365 17.5219 6.24025C17.5685 6.28686 17.6053 6.34234 17.6301 6.40341C17.6549 6.46448 17.6672 6.5299 17.6663 6.59581ZM17.6663 10.9958C17.6672 11.0617 17.6549 11.1271 17.6301 11.1882C17.6053 11.2493 17.5685 11.3047 17.5219 11.3514C17.4753 11.398 17.4198 11.4348 17.3587 11.4596C17.2977 11.4844 17.2323 11.4967 17.1663 11.4958H9.36634C9.25498 11.9111 9.00973 12.278 8.66862 12.5397C8.32751 12.8013 7.9096 12.9432 7.47967 12.9432C7.04975 12.9432 6.63184 12.8013 6.29073 12.5397C5.94962 12.278 5.70437 11.9111 5.59301 11.4958H4.83301C4.7004 11.4958 4.57322 11.4431 4.47945 11.3494C4.38569 11.2556 4.33301 11.1284 4.33301 10.9958C4.33301 10.8632 4.38569 10.736 4.47945 10.6423C4.57322 10.5485 4.7004 10.4958 4.83301 10.4958H5.59301C5.70437 10.0806 5.94962 9.71364 6.29073 9.45196C6.63184 9.19027 7.04975 9.04844 7.47967 9.04844C7.9096 9.04844 8.32751 9.19027 8.66862 9.45196C9.00973 9.71364 9.25498 10.0806 9.36634 10.4958H17.1663C17.299 10.4958 17.4261 10.5485 17.5199 10.6423C17.6137 10.736 17.6663 10.8632 17.6663 10.9958Z" fill="#CEFFA8"/>
<path d="M24.333 15.166L28.4997 10.9993L24.333 6.83268V15.166Z" fill="#CEFFA8"/>
</svg>
</button>
</div>

<div class="tabs">
<button class="tab-link active" onclick="openTabbb('kyc')">General</button>
<button class="tab-link" onclick="openTabbb('dsc')">Periodic</button>
<button class="tab-link" onclick="openTabbb('dsce')">Type 3</button>
</div>
</div>

<!-- start -->
<div class="tab_ccontent">
<div id="tab-kyc" class="tab active">

 <!--
<div class="gropu_form">
  <div class="forat_filoter_clear">
   <label for="Division">Sort by</label>
   <div class="clear_filteer">
   <a id="go_clear" style="display: none;">Clear</a>
  </div>
  </div>
  <select id="sort_by" name="sort_by" required="">
  <option value="" disabled="" selected="">select</option>
    <option value="Relevance">Relevance</option>
    <option value="upload">Latest upload</option>
    <option value="size">size</option>
  </select>
    </div>
    -->

    <div class="rap_repaert">
        <h2 class="app_tile">Formats</h2>
<!-- repeat me -->
<div class="rop_check">
<input type="checkbox" id="check1" name="check1" value="">
<label for="check1">
<div class="left_embers_detail">
<h3>pdf</h3>
</div>
</label>
</div>
<!-- repeat me -->

<!-- repeat me -->
<div class="rop_check">
<input type="checkbox" id="check2" name="check2" value="">
<label for="check2">
<div class="left_embers_detail">
<h3>doc</h3>
</div>
</label>
</div>
<!-- repeat me -->

<!-- repeat me -->
<div class="rop_check">
<input type="checkbox" id="check3" name="check3" value="">
<label for="check3">
<div class="left_embers_detail">
<h3>mp4</h3>
</div>
</label>
</div>
<!-- repeat me -->

<!-- repeat me -->
<div class="rop_check">
<input type="checkbox" id="check4" name="check4" value="">
<label for="check4">
<div class="left_embers_detail">
<h3>Stared files</h3>
</div>
</label>
</div>
<!-- repeat me -->

</div>


</div>
<div id="tab-dsc" class="tab">

<div class="new_sllert">
  <select id="fyear_one_f1" name="fyear_one" required="" onchange="fetchData(this.value)">
            <option value="" disabled="" selected="">Financial Year</option>
            <option value="2013-2014">2013-2014</option>
              <option value="2014-2015">2014-2015</option>
               <option value="2015-2016">2015-2016</option>
                <option value="2016-2017">2016-2017</option>
                 <option value="2017-2018">2017-2018</option>
                  <option value="2018-2019">2018-2019</option>
                   <option value="2019-2020">2019-2020</option>
                  
            <option value="2020-2021">2020-2021</option>
            <option value="2021-2022">2021-2022</option>
            <option value="2022-2023">2022-2023</option>
            <option value="2023-2024">2023-2024</option>
            <option value="2024-2025">2024-2025</option>
            <option value="2025-2026">2025-2026</option>
             <option value="2026-2027">2026-2027</option>

              <option value="2027-2028">2027-2028</option>
               <option value="2028-2029">2028-2029</option>
                <option value="2029-2030">2029-2030</option>
                 <option value="2030-2031">2030-2031</option>
                  <option value="2031-2032">2031-2032</option>
                   <option value="2032-2033">2032-2033</option>
                    <option value="2033-2034">2033-2034</option>
                     <option value="2034-2035">2034-2035</option>
                      <option value="2035-2036">2035-2036</option>
                       <option value="2036-2037">2036-2037</option>
        </select>
  </div>
  
<div class="radio_two_calander">
    <div class="two_radio_repeat">
        <input type="radio" id="single" name="calendar" value="single" checked>       
        <label for="single">Select Single</label>
         </div>
        <div class="two_radio_repeat">
        <input type="radio" id="range" name="calendar" value="range">
        <label for="range">Select Range</label>
         </div>
    </div>
    <div id="calendar-container" class="calendar-container new_range_custom_calander">
        <!-- Calendars will be dynamically inserted here -->
    </div>

    <!-- Include Flatpickr JS from CDN -->
 
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const singleRadio = document.getElementById('single');
            const rangeRadio = document.getElementById('range');
            const calendarContainer = document.getElementById('calendar-container');

            function loadSingleCalendar() {
                // Clear the container
                calendarContainer.innerHTML = '';

                // Create and insert the single date calendar
                const singleCalendar = document.createElement('div');
                singleCalendar.id = 'single-calendar';
                calendarContainer.appendChild(singleCalendar);

                // Initialize the calendar
                flatpickr('#single-calendar', {
                    inline: true
                });
            }

            function loadRangeCalendar() {
                // Clear the container
                calendarContainer.innerHTML = '';

                 // Create and insert the range date calendar
                const rangeCalendar = document.createElement('div');
                rangeCalendar.id = 'range-calendar';
                calendarContainer.appendChild(rangeCalendar);

                // Initialize the range calendar
                flatpickr('#range-calendar', {
                    mode: 'range',
                    inline: true
                });
            }

            // Event listeners for radio buttons
            singleRadio.addEventListener('change', function() {
                if (this.checked) {
                    loadSingleCalendar();
                }
            });

            rangeRadio.addEventListener('change', function() {
                if (this.checked) {
                    loadRangeCalendar();
                }
            });

            // Load the default calendar on page load
            loadSingleCalendar();
        });
    </script>

<!-- month calander start -->
<div class="main_month_calander">
    <div class="repate_calander active">
    <span>Jan</span>
</div>
<div class="repate_calander">
    <span>Feb</span>
</div>
<div class="repate_calander">
    <span>Mar</span>
</div>
<div class="repate_calander">
    <span>Apr</span>
</div>
<div class="repate_calander">
    <span>May</span>
</div>
<div class="repate_calander">
    <span>June</span>
</div>
<div class="repate_calander">
    <span>July</span>
</div>
<div class="repate_calander">
    <span>Aug</span>
</div>
<div class="repate_calander">
    <span>Sept</span>
</div>
<div class="repate_calander">
    <span>Oct</span>
</div>
<div class="repate_calander">
    <span>Nov</span>
</div>
<div class="repate_calander">
    <span>Dec</span>
</div>
</div>
<!-- month calander end -->

<!-- quater calander start -->
<div class=" main_quatot_calander">
    <div class="repate_quoter_calander active">
    <span>Q1</span>
</div>
<div class="repate_quoter_calander">
    <span>Q2</span>
</div>
<div class="repate_quoter_calander">
    <span>Q3</span>
</div>
<div class="repate_quoter_calander">
    <span>Q4</span>
</div>
</div>
<!-- quater calander end -->

<!-- list month start -->
<div class="list_month">
    <ul>
        <li class="active">HF1 <span>April-September</span></li>
        <li>HF2 <span>October-March</span></li>
    </ul>
</div>
<!-- list month start -->

</div>

<div id="tab-dsce" class="tab">

</div>

</div>
<!-- end -->

	</div>
	
	--}}
	
	
	
<div class="side_panel_wraap_overlay"></div>	
<div class="entery_body table-responsive side_panel_wraap">
	
<div class="wrap_side_nnt">
<div class="clode_fltr">
<button id="close_repo_filter">
<svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.375 6.375H13.875C14.0408 6.375 14.1997 6.44085 14.3169 6.55806C14.4342 6.67527 14.5 6.83424 14.5 7C14.5 7.16576 14.4342 7.32473 14.3169 7.44194C14.1997 7.55915 14.0408 7.625 13.875 7.625H1.375C1.20924 7.625 1.05027 7.55915 0.933058 7.44194C0.815848 7.32473 0.75 7.16576 0.75 7C0.75 6.83424 0.815848 6.67527 0.933058 6.55806C1.05027 6.44085 1.20924 6.375 1.375 6.375Z" fill="#E7E7E7"/>
<path d="M1.63487 7.00079L6.81862 12.1833C6.93598 12.3006 7.00191 12.4598 7.00191 12.6258C7.00191 12.7918 6.93598 12.9509 6.81862 13.0683C6.70126 13.1856 6.54209 13.2516 6.37612 13.2516C6.21015 13.2516 6.05098 13.1856 5.93362 13.0683L0.308617 7.44329C0.250413 7.38523 0.204235 7.31626 0.172727 7.24033C0.141219 7.1644 0.125 7.083 0.125 7.00079C0.125 6.91858 0.141219 6.83718 0.172727 6.76125C0.204235 6.68532 0.250413 6.61635 0.308617 6.55829L5.93362 0.933289C6.05098 0.815931 6.21015 0.75 6.37612 0.75C6.54209 0.75 6.70126 0.815931 6.81862 0.933289C6.93598 1.05065 7.00191 1.20982 7.00191 1.37579C7.00191 1.54176 6.93598 1.70093 6.81862 1.81829L1.63487 7.00079Z" fill="#E7E7E7"/>
</svg>
</button>
<span>Upload Pre-Defined File</span>
</div>

</div>

<!-- start -->
<div class="tab_ccontent">
<div id="search-container">
    <div class="search_iconn">
    <input type="text" id="search-input" placeholder="Search for a Pre-Defined File" onkeyup="filterList()">
    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M16.5 16.5L11.5 11.5M1.5 7.33333C1.5 8.09938 1.65088 8.85792 1.94404 9.56565C2.23719 10.2734 2.66687 10.9164 3.20854 11.4581C3.75022 11.9998 4.39328 12.4295 5.10101 12.7226C5.80875 13.0158 6.56729 13.1667 7.33333 13.1667C8.09938 13.1667 8.85792 13.0158 9.56565 12.7226C10.2734 12.4295 10.9164 11.9998 11.4581 11.4581C11.9998 10.9164 12.4295 10.2734 12.7226 9.56565C13.0158 8.85792 13.1667 8.09938 13.1667 7.33333C13.1667 6.56729 13.0158 5.80875 12.7226 5.10101C12.4295 4.39328 11.9998 3.75022 11.4581 3.20854C10.9164 2.66687 10.2734 2.23719 9.56565 1.94404C8.85792 1.65088 8.09938 1.5 7.33333 1.5C6.56729 1.5 5.80875 1.65088 5.10101 1.94404C4.39328 2.23719 3.75022 2.66687 3.20854 3.20854C2.66687 3.75022 2.23719 4.39328 1.94404 5.10101C1.65088 5.80875 1.5 6.56729 1.5 7.33333Z" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>

    </div>
    <div class="CATEGORIES_list">
        <h2>CATEGORIES</h2>
    </div>
    <ul id="search-list">
        <li><span>Book-Keeping / Bank Account Statements</span><button data-bs-toggle="modal" data-bs-target="#bankaccstatement_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Book-Keeping / Fixed Deposit Statements</span><button data-bs-toggle="modal" data-bs-target="#fixeddepositstatement_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Book-Keeping / Credit Card Statements</span><button data-bs-toggle="modal" data-bs-target="#creditcardstatement_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Book-Keeping / Mutual Fund Statements</span><button data-bs-toggle="modal" data-bs-target="#mutualfundstatement_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>

<!---->

        <li><span>Finance / Charter documents / Director Details / Director 1 / Photo</span><button data-bs-toggle="modal" data-bs-target="#director1_photo_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Finance / Charter documents / Director Details / Director 1 /  Signature image</span><button data-bs-toggle="modal" data-bs-target="#director1_signature_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Finance / Charter documents / Director Details / Director 1 /  Aadhar KYC</span><button data-bs-toggle="modal" data-bs-target="#director1_aadhar_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Finance / Charter documents / Director Details / Director 1 /  PAN KYC</span><button data-bs-toggle="modal" data-bs-target="#director1_pan_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Finance / Charter documents / Director Details / Director 1 /  Address Proof</span><button data-bs-toggle="modal" data-bs-target="#director1_addressproof_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Finance / Charter documents / Director Details / Director 1 / Contact Details</span><button data-bs-toggle="modal" data-bs-target="#director1_contactdetails_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>

<!---->
        <li><span>Finance / Charter documents / Director Details / Director 2 / Photo</span><button data-bs-toggle="modal" data-bs-target="#director2_photo_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Finance / Charter documents / Director Details / Director 2 /  Signature image</span><button data-bs-toggle="modal" data-bs-target="#director2_signature_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Finance / Charter documents / Director Details / Director 2 /  Aadhar KYC</span><button data-bs-toggle="modal" data-bs-target="#director2_aadhar_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Finance / Charter documents / Director Details / Director 2 /  PAN KYC</span><button data-bs-toggle="modal" data-bs-target="#director2_pan_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Finance / Charter documents / Director Details / Director 2 /  Address Proof</span><button data-bs-toggle="modal" data-bs-target="#director2_addressproof_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Finance / Charter documents / Director Details / Director 2 / Contact Details</span><button data-bs-toggle="modal" data-bs-target="#director2_contactdetails_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>

<!---->

        <li><span>Finance / Charter documents / Incorporation / Memorandum of Association</span><button data-bs-toggle="modal" data-bs-target="#inco_Moa_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Finance / Charter documents / Incorporation / Articles of Association</span><button data-bs-toggle="modal" data-bs-target="#inco_aoa_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Finance / Charter documents / Incorporation / Certificate of incorporation</span><button data-bs-toggle="modal" data-bs-target="#inco_coi_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Finance / Charter documents / Incorporation / Partnership deed</span><button data-bs-toggle="modal" data-bs-target="#inco_partnerdeep_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Finance / Charter documents / Incorporation / LLP Agreement</span><button data-bs-toggle="modal" data-bs-target="#inco_llpaggree_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Finance / Charter documents / Incorporation / Trust Deed</span><button data-bs-toggle="modal" data-bs-target="#inco_trustdeed_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Finance / Charter documents / Incorporation / Share certificates</span><button data-bs-toggle="modal" data-bs-target="#inco_sharecertificate_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>

<!---->

        <li><span>Finance / Charter documents / Registrations / PAN certificate</span><button data-bs-toggle="modal" data-bs-target="#Regist_pan_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Finance / Charter documents / Registrations / TAN certificate</span><button data-bs-toggle="modal" data-bs-target="#Regist_tan_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Finance / Charter documents / Registrations / GSTIN certificate</span><button data-bs-toggle="modal" data-bs-target="#Regist_gstin_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Finance / Charter documents / Registrations / MSME certificate</span><button data-bs-toggle="modal" data-bs-target="#Regist_msme_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Finance / Charter documents / Registrations / Trademark</span><button data-bs-toggle="modal" data-bs-target="#Regist_trademark_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Finance / Charter documents / Registrations / Provident Fund certificate</span><button data-bs-toggle="modal" data-bs-target="#Regist_profc_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Finance / Charter documents / Registrations / Employee State Insurance certificate</span><button data-bs-toggle="modal" data-bs-target="#Regist_esic_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Finance / Charter documents / Registrations / Professional Tax certificate</span><button data-bs-toggle="modal" data-bs-target="#Regist_protaxcer_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Finance / Charter documents / Registrations / Labour Welfare Fund certificate</span><button data-bs-toggle="modal" data-bs-target="#Regist_lwfc_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Finance / Charter documents / Registrations / POSH Policy</span><button data-bs-toggle="modal" data-bs-target="#Regist_posh_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>

<!---->

        <li><span>Legal / Secretarial / Annual Filings / AoC-4 (Annual Filing Statement Form)</span><button data-bs-toggle="modal" data-bs-target="#filling_AoC_4_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Annual Filings / AoC-4 (CFS) (Form for filing consolidated financial statements and other documents with the Registrar)</span><button data-bs-toggle="modal" data-bs-target="#filling_AoC_4_cfs_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Annual Filings / MGT-7/ (Annual Return of a company)</span><button data-bs-toggle="modal" data-bs-target="#filling_MGT_7_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Annual Filings / MGT-7A (Annual Return of a small company)</span><button data-bs-toggle="modal" data-bs-target="#filling_MGT_7a_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>

<!---->

        <li><span>Legal / Secretarial / Annual General Meeting / Notices</span><button data-bs-toggle="modal" data-bs-target="#anual_Notices_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Annual General Meeting / Minute Book</span><button data-bs-toggle="modal" data-bs-target="#anual_minut_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Annual General Meeting / Attendance sheet</span><button data-bs-toggle="modal" data-bs-target="#anual_atandence_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Annual General Meeting / Resolutions</span><button data-bs-toggle="modal" data-bs-target="#anual_Resolutions_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>

<!---->

        <li><span>Legal / Secretarial / Auditor Appointment / Board Resolution for the appointment of Auditor</span><button data-bs-toggle="modal" data-bs-target="#aduit_reso_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Auditor Appointment / Intimation to auditor</span><button data-bs-toggle="modal" data-bs-target="#audit_Intimation_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Auditor Appointment / Letter of appointment</span><button data-bs-toggle="modal" data-bs-target="#audit_Letter_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Auditor Appointment / Certificate as per Rule 4 and consent by Auditor for his appointment</span><button data-bs-toggle="modal" data-bs-target="#audit_Certificate_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Auditor Appointment / Acceptance letter for appointment</span><button data-bs-toggle="modal" data-bs-target="#audit_Acceptance_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Auditor Appointment / Special Resolution</span><button data-bs-toggle="modal" data-bs-target="#audit_Resolution_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>

<!---->

        <li><span>Legal / Secretarial / Auditor Exits / ADT-3 form</span><button data-bs-toggle="modal" data-bs-target="#aduitexit_ADT_3_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Auditor Exits / Resignation letter by auditor</span><button data-bs-toggle="modal" data-bs-target="#auditexit_regnisation_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Auditor Exits / Details of the grounds for seeking removal of auditor</span><button data-bs-toggle="modal" data-bs-target="#auditexit_dgs_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Auditor Exits / Special Resolution</span><button data-bs-toggle="modal" data-bs-target="#auditexit_se_r_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Auditor Exits / ADT-2 (Application for removal of auditor(s) before expiry of term)</span><button data-bs-toggle="modal" data-bs-target="#auditexit_ADT_2_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>

<!---->

        <li><span>Legal / Secretarial / Board Meetings / Notices</span><button data-bs-toggle="modal" data-bs-target="#board_Notices_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Board Meetings / Minute Book</span><button data-bs-toggle="modal" data-bs-target="#board_minut_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Board Meetings / Attendance sheet</span><button data-bs-toggle="modal" data-bs-target="#board_atandence_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Board Meetings / Resolutions</span><button data-bs-toggle="modal" data-bs-target="#board_Resolutions_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>

<!---->

        <li><span>Legal / Secretarial / Deposit Undertakings /Form DPT-3</span><button data-bs-toggle="modal" data-bs-target="#Undertakings_dpt_3_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>

<!---->

        <li><span>Legal / Secretarial / Director Appointments / DIR-3 KYC</span><button data-bs-toggle="modal" data-bs-target="#director_DIR_3_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Director Appointments / DIR-6 form</span><button data-bs-toggle="modal" data-bs-target="#director_DIR_6_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Director Appointments / DIR-12 form</span><button data-bs-toggle="modal" data-bs-target="#director_DIR_12_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>

<!---->

        <li><span>Legal / Secretarial / Director Resignation / DIR-11 form</span><button data-bs-toggle="modal" data-bs-target="#director_DIR_11form_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Director Resignation / DIR-12 form</span><button data-bs-toggle="modal" data-bs-target="#director_DIR_12form_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>

<!---->

        <li><span>Legal / Secretarial / Extra Ordinary General Meeting / Notices</span><button data-bs-toggle="modal" data-bs-target="#ordinary_Notices_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Extra Ordinary General Meeting / Minute Book</span><button data-bs-toggle="modal" data-bs-target="#ordinary_minut_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Extra Ordinary General Meeting / Attendance sheet</span><button data-bs-toggle="modal" data-bs-target="#ordinary_atandence_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Extra Ordinary General Meeting / Resolutions</span><button data-bs-toggle="modal" data-bs-target="#ordinary_Resolutions_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>

<!---->

        <li><span>Legal / Secretarial / Incorporation / RUN Form (Reserve Unique Name)</span><button data-bs-toggle="modal" data-bs-target="#inco_run_form_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Incorporation / INC-9 (Declaration of Subscribers and First Directors)</span><button data-bs-toggle="modal" data-bs-target="#inco_INC_9_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Incorporation / SPICe+Part B (Simplified Proforma for Incorporating Company Electronically)</span><button data-bs-toggle="modal" data-bs-target="#inco_SPICe_Part_B_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Incorporation / INC-33 SPICe MoA (e-Momorandum of Association)</span><button data-bs-toggle="modal" data-bs-target="#inco_INC_33_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Incorporation / INC-34 SPICe MoA (e-Articles of Association)</span><button data-bs-toggle="modal" data-bs-target="#inco_INC_34_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Incorporation / INC-35 AGILE-PRO-s</span><button data-bs-toggle="modal" data-bs-target="#inco_INC_35_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Incorporation / INC-22 (Notice of situation or change of situation of registered office)</span><button data-bs-toggle="modal" data-bs-target="#inco_INC_22_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Incorporation / INC-20A (Commencement of Business)</span><button data-bs-toggle="modal" data-bs-target="#inco_INC_20A_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>

<!---->

        <li><span>Legal / Secretarial / Statutory Registers / Register of Members</span><button data-bs-toggle="modal" data-bs-target="#StautoryReg_meber_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Statutory Registers / Register of Other Security Holders</span><button data-bs-toggle="modal" data-bs-target="#StautoryReg_security_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Statutory Registers / Foreign Register</span><button data-bs-toggle="modal" data-bs-target="#StautoryReg_forginreg_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Statutory Registers / Register of Directors and KMP</span><button data-bs-toggle="modal" data-bs-target="#StautoryReg_kmp_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Statutory Registers / Register of Charges</span><button data-bs-toggle="modal" data-bs-target="#StautoryReg_regchnage_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Statutory Registers / Register of Deposits</span><button data-bs-toggle="modal" data-bs-target="#StautoryReg_dep_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Statutory Registers / Register of Loans, Guarantees and Securities</span><button data-bs-toggle="modal" data-bs-target="#StautoryReg_lgs_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Statutory Registers / Register of Investments not held in Company’s name</span><button data-bs-toggle="modal" data-bs-target="#StautoryReg_icn_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Statutory Registers / Register of Contracts in which Directors are interested</span><button data-bs-toggle="modal" data-bs-target="#StautoryReg_cdi_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Statutory Registers / Register of Sweat Equity Shares</span><button data-bs-toggle="modal" data-bs-target="#StautoryReg_sewat_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Statutory Registers / Register of Employee Stock Options</span><button data-bs-toggle="modal" data-bs-target="#StautoryReg_stock_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Statutory Registers / Register of Securities Bought Back</span><button data-bs-toggle="modal" data-bs-target="#StautoryReg_bought_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Statutory Registers / Register of Renewed or Duplicate Share Certificates</span><button data-bs-toggle="modal" data-bs-target="#StautoryReg_share_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Statutory Registers / Register of SBO</span><button data-bs-toggle="modal" data-bs-target="#StautoryReg_sbo_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>
        <li><span>Legal / Secretarial / Statutory Registers / Register of Postal Ballot</span><button data-bs-toggle="modal" data-bs-target="#StautoryReg_ballot_pop"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#CEFFA8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg></button></li>


    </ul>
</div>
</div>

<script>
function filterList() {
    const searchInput = document.getElementById('search-input').value.toLowerCase();
    const listItems = document.querySelectorAll('#search-list li');

    listItems.forEach((item) => {
        const text = item.querySelector('span').textContent.toLowerCase(); // Get text from the span only
        if (text.includes(searchInput)) {
            item.style.display = ''; // Show the matching item
            item.style.order = '0'; // Keep matching items in order
        } else {
            item.style.display = 'none'; // Hide non-matching items
        }
    });
}

</script>
<!-- end -->

	</div>
	
	
	
	
	</div>

<div class="nav-path"><span></span></div>

<script>
$(document).ready(function() {
  const $listViewButton = $('.list-view-button');
  const $gridViewButton = $('.grid-view-button');
  const $list = $('.list_gr_id');

  if ($listViewButton.length && $gridViewButton.length && $list.length) {
    $listViewButton.on('click', function() {
      $list.removeClass('grid-view-filter').addClass('list-view-filter');
      $listViewButton.addClass('active');
      $gridViewButton.removeClass('active');
    });

    $gridViewButton.on('click', function() {
      $list.removeClass('list-view-filter').addClass('grid-view-filter');
      $gridViewButton.addClass('active');
      $listViewButton.removeClass('active');
    });
  } else {
    console.error('One or more elements not found.');
  }
});
</script>
 <script>


//   $('body').on('click', '.close', function() {
//             window.location.reload();
//         });
// </script>

<script>
$(document).ready(function() {
    $('body').on('click', '.close', function() {
        // Find the closest modal
        var $modal = $(this).closest('.modal');
        
        // Reset the form within the modal
        $modal.find('form')[0].reset();
        
        // Remove the 'green-outline' class from the '.file-area' div
        $modal.find('.file-area').removeClass('green-outline');
        
        // Empty the content of the '.selected-file' div
        $modal.find('.selected-file').empty();
        
        // Remove the '.tag' div
        $modal.find('.tag').remove();
        
          // Remove the '.file-item' div
        $modal.find('.file-item').remove();

    });
});
</script>






 <!-- Content start-->

<!-- footer add folder or file button start -->
<!-- create folder model start -->
<div class="modal fade drop_coman_file have_title" id="create_folderr" tabindex="-1" role="dialog" aria-labelledby="create_folderr" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-weight:700">Create Folder</h5>
                <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                    <span aria-hidden="true">
                        <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black" />
                            <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black" />
                        </svg>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Create Folder</h3>
                <form id="create-folder-form" action="{{ route('create.folder') }}" method="POST">
                    @csrf
                            <div class="label_wrap">
                    <label>Path :</label>
                    <script>
    $(document).ready(function() {
        // Function to get query parameter by name
        function getQueryParamd(param) {
            var urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }

        // Function to update the folder path
        function updateFolderPathd() {
            var folder = getQueryParamd('folder');

            if (folder) {
                folder = decodeURIComponent(folder); // Decode if folder exists
                // console.log("Folder parameter: " + folder);

                // Set the folder value to data-my-folder attribute
                $('#parent-folderd').attr('data-my-folder', folder);
                
                // Set the folder value in the input field using a template literal style
                $('#parent-folderd').val(`${folder}`); // Using template literal syntax
            }
        }

        // Call updateFolderPath immediately to set initial value
        updateFolderPathd();

        // Fetch the URL parameter every second
        setInterval(updateFolderPathd, 100);
    });
</script>
                    <input type="text" id="parent-folderd" name="parent_folder" value="" readonly disable>
</div><div class="gropu_form">
        <label for="fyear">Financial Year</label>
        <select id="fyear" name="fyear" required="">
            <option value="" disabled="" selected="">select</option>
            <option value="2013-2014">2013-2014</option>
              <option value="2014-2015">2014-2015</option>
               <option value="2015-2016">2015-2016</option>
                <option value="2016-2017">2016-2017</option>
                 <option value="2017-2018">2017-2018</option>
                  <option value="2018-2019">2018-2019</option>
                   <option value="2019-2020">2019-2020</option>
                  
            <option value="2020-2021">2020-2021</option>
            <option value="2021-2022">2021-2022</option>
            <option value="2022-2023">2022-2023</option>
            <option value="2023-2024">2023-2024</option>
            <option value="2024-2025">2024-2025</option>
            <option value="2025-2026">2025-2026</option>
             <option value="2026-2027">2026-2027</option>

              <option value="2027-2028">2027-2028</option>
               <option value="2028-2029">2028-2029</option>
                <option value="2029-2030">2029-2030</option>
                 <option value="2030-2031">2030-2031</option>
                  <option value="2031-2032">2031-2032</option>
                   <option value="2032-2033">2032-2033</option>
                    <option value="2033-2034">2033-2034</option>
                     <option value="2034-2035">2034-2035</option>
                      <option value="2035-2036">2035-2036</option>
                       <option value="2036-2037">2036-2037</option>
        </select>
    </div>

    <div class="gropu_form">
        <label for="Month">Month</label>
        <select id="Month" name="Month" required="">
            <option value="" disabled="" selected="">select</option>
            <option value="January">January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
        </select>
    </div>
                    <div class="gropu_form">
                          <label for="fname">All Locations</label>
                          <div class="all_locations">
                          <ul  class="nav navbar-nav dropdown customulli">
<li class="dropdown">
            <a href="#" class="dropdown-toggle folder-link selected-folder" id="autohome" data-folder-path="">
            <div class="folder-card">
                    <div class="folder-image">
                        <div class="folder_in">
                        <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M49.9259 2.10898C49.5062 2.12346 49.1017 2.26969 48.7697 2.52695L2.76969 38.4215C2.35115 38.7478 2.07939 39.2271 2.01419 39.7538C1.94899 40.2805 2.0957 40.8115 2.42204 41.2301C2.74838 41.6486 3.22762 41.9204 3.75433 41.9856C4.28105 42.0508 4.81209 41.9041 5.23063 41.5777L8.00016 39.4176V91.9996C8.00022 92.53 8.21095 93.0387 8.58601 93.4138C8.96107 93.7888 9.46975 93.9996 10.0002 93.9996H37.6642C37.8802 94.0353 38.1006 94.0353 38.3166 93.9996H61.6642C61.8802 94.0353 62.1006 94.0353 62.3166 93.9996H90.0002C90.5306 93.9996 91.0393 93.7888 91.4143 93.4138C91.7894 93.0387 92.0001 92.53 92.0002 91.9996V39.4176L94.7697 41.5777C94.9769 41.7393 95.214 41.8585 95.4673 41.9285C95.7206 41.9985 95.9852 42.018 96.246 41.9857C96.5068 41.9534 96.7587 41.8701 96.9874 41.7404C97.216 41.6108 97.4168 41.4374 97.5784 41.2302C97.74 41.0229 97.8592 40.7859 97.9292 40.5325C97.9991 40.2792 98.0185 40.0146 97.9862 39.7538C97.954 39.493 97.8706 39.2411 97.741 39.0125C97.6113 38.7839 97.4379 38.5831 97.2306 38.4215L82.0002 26.5387V11.9996H70.0002V17.1715L51.2306 2.52695C50.8585 2.23839 50.3965 2.09038 49.9259 2.10898ZM50.0002 6.64414L88.0002 36.2965V89.9996H64.0002V51.9996H36.0002V89.9996H12.0002V36.2965L50.0002 6.64414ZM74.0002 15.9996H78.0002V23.4176L74.0002 20.2926V15.9996ZM40.0002 55.9996H60.0002V89.9996H40.0002V55.9996Z" fill="#D1D5E1"/>
</svg>


                        <!-- <img src="../assets/images/solar_folder-bold.png"  id="folders" class="folder-icon" alt="Folder Icon"> -->
                        </div>
                        <div class="folder-title">
                        <span>Home</span>
                            </div>
                    </div>
                  
                </div>
                
            </a>
            
        </li>
        @foreach($folders->where('parent_name', null) as $parent)
        <li class="dropdown">
            <a href="#" class="dropdown-toggle folder-link" data-folder-path="{{ $parent->path }}">
                <div class="folder-card">
                    <div class="folder-image">
                        <div class="folder_in">
                            <svg class="d_fadee" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.635 3.5525L6.01912 3.9375H10.9375C11.2856 3.9375 11.6194 4.07578 11.8656 4.32192C12.1117 4.56806 12.25 4.9019 12.25 5.25V9.625C12.25 9.9731 12.1117 10.3069 11.8656 10.5531C11.6194 10.7992 11.2856 10.9375 10.9375 10.9375H3.0625C2.7144 10.9375 2.38056 10.7992 2.13442 10.5531C1.88828 10.3069 1.75 9.9731 1.75 9.625V3.9375C1.75 3.5894 1.88828 3.25556 2.13442 3.00942C2.38056 2.76328 2.7144 2.625 3.0625 2.625H4.16237C4.33483 2.62504 4.50558 2.65906 4.66487 2.72512C4.82417 2.79118 4.96888 2.88798 5.09075 3.01L5.635 3.5525ZM0.4375 3.9375C0.4375 3.24131 0.714062 2.57363 1.20634 2.08134C1.69863 1.58906 2.36631 1.3125 3.0625 1.3125H4.16237C4.50721 1.31246 4.84868 1.38036 5.16727 1.51233C5.48586 1.6443 5.77532 1.83775 6.01912 2.08162L6.5625 2.625H10.9375C11.6337 2.625 12.3014 2.90156 12.7937 3.39384C13.2859 3.88613 13.5625 4.55381 13.5625 5.25V9.625C13.5625 10.3212 13.2859 10.9889 12.7937 11.4812C12.3014 11.9734 11.6337 12.25 10.9375 12.25H3.0625C2.36631 12.25 1.69863 11.9734 1.20634 11.4812C0.714062 10.9889 0.4375 10.3212 0.4375 9.625V3.9375ZM4.15625 5.6875C3.9822 5.6875 3.81528 5.75664 3.69221 5.87971C3.56914 6.00278 3.5 6.1697 3.5 6.34375C3.5 6.5178 3.56914 6.68472 3.69221 6.80779C3.81528 6.93086 3.9822 7 4.15625 7H9.84375C10.0178 7 10.1847 6.93086 10.3078 6.80779C10.4309 6.68472 10.5 6.5178 10.5 6.34375C10.5 6.1697 10.4309 6.00278 10.3078 5.87971C10.1847 5.75664 10.0178 5.6875 9.84375 5.6875H4.15625Z" fill="#C5C5C5"/>
                            </svg>
                        </div>
                        <div class="folder-title">
                            <span>{{ $parent->name }}</span>
                        </div>
                    </div>
                </div>
            </a>
            <ul class="dropdown-menu" id="subfolders-{{ urlencode(str_replace(['/', ' '], '_', $parent->path)) }}"></ul>
        </li>
    @endforeach
</ul>
        
                          </div>
                          </div>

                          <div class="gropu_form mainpath">
                          <label for="fname"></label>
                       <div class="select_path_view">
    <b>selected path:</b>
<div class="nav-path"></div>
</div>
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Folder Name</label>
                          <input type="text" name="folder_name" class="dragfile" placeholder="Enter Folder Name" required>
                          </div>

                          <div class="upp_input">
                          <button class="btn btn-primary" id="createfolderbtn" style="border-radius:5px;" type="submit">Create</button>
</div>
                    
                </form>

     <meta name="csrf-token" content="{{ csrf_token() }}">

<script defer>
function getQueryParamf(param) {
    const queryString = window.location.search.substring(1);
    const params = queryString.split('&');
    for (let i = 0; i < params.length; i++) {
        const pair = params[i].split('=');
        if (pair[0] === param) {
            return pair[1] ? decodeURIComponent(pair[1]) : null;
        }
    }
    return null;
}
document.addEventListener('DOMContentLoaded', function() {
    // Custom function to parse query parameters
    function getQueryParam(param) {
        const params = new URLSearchParams(window.location.search);
        return params.get(param);
    }
    // Retrieve and decode the folder path from the URL parameters
    const folderPath = getQueryParam('folder');

    if (folderPath) {
        const decodedFolderPath = decodeURIComponent(folderPath);
        // Trigger a success alert with the decoded folder path
        // Swal.fire({
        //     title: 'Success!',
        //     text: `Navigated to folder: ${decodedFolderPath}`,
        //     icon: 'success',
        //     confirmButtonText: 'OK'
        // });
        // Fetch the folder contents and navigate to the folder
    }
});

// Now use it inside your event listener
$(document).on('change', '#sortOptions', function() {
    let sortOption = $(this).val();   // Get the selected sorting option
     const encodedString = getQueryParamf('folder');
     const decodedString = decodeURIComponent(encodedString);
     

    $.ajax({
        url: '/fetch-folder-contents',  // Adjust the URL to your route
        method: 'GET',
        data: {
            folderName: decodedString,
            sortOption: sortOption
        },
        beforeSend: function() {
            // Optionally show a loader while fetching the data
            $('.folder-contents').html('<p>Loading...</p>');
        },
        success: function(response) {
            // Update folder contents with the response
            $('.folder-contents').html(response.folderHtml);
        },
        error: function() {
            // Handle any errors
            $('.folder-contents').html('<p>Something went wrong. Please try again.</p>');
        }
    });
});


$(document).on('change', '#sortOptions', function() {
    let sortOption = $(this).val();   // Get the selected sorting option
    const encodedString = getQueryParamf('folder');
    const decodedString = decodeURIComponent(encodedString);

    $.ajax({
        url: '/fetch-subfolders2',  // Adjust the URL to your route
        method: 'GET',
        data: {
            folderName: decodedString,
            sortOption: sortOption
        },
        beforeSend: function() {
            // Show loader before sending request
            $('.loader').show();  // Display the loader
            $('.folder-contents').html(''); // Clear previous contents
        },
        success: function(response) {
            console.log(response.html);
            // Update folder contents with the response
            $('.folder-contents').html(response.html);
        },
        error: function() {
            // Handle any errors
            $('.folder-contents').html('<p>Something went wrong. Please try again.</p>');
        },
        complete: function() {
            // Hide loader after request completes (whether success or error)
            $('.loader').hide();  // Hide the loader
        }
    });
});




//   document.addEventListener('DOMContentLoaded', function() {
//         // Custom function to parse query parameters
//         function getQueryParam(param) {
//             const queryString = window.location.search.substring(1);
//             const params = queryString.split('&');
//             for (let i = 0; i < params.length; i++) {
//                 const pair = params[i].split('=');
//                 if (pair[0] === param) {
//                     return pair[1] ? decodeURIComponent(pair[1]) : null;
//                 }
//             }
//             return null;
//         }

        // Retrieve the folder path from the URL parameters
    //     const folderPath = getQueryParam('folder');
        
    //       const decodedFolderPath = decodeURIComponent(folderPath);

    //     if (folderPath) {
    //         // Decode the folder path to handle any encoded characters
    //         const decodedFolderPath = decodeURIComponent(folderPath);

    //         // Trigger a success alert with the decoded folder path
    //         // Swal.fire({
    //         //     title: 'Success!',
    //         //     text: `Navigated to folder: ${decodedFolderPath}`,
    //         //     icon: 'success',
    //         //     confirmButtonText: 'OK'
    //         // });
            

    //         // Fetch the folder contents and navigate to the folder
            
    //     }
    // });

   

$(document).ready(function() {
    function showLoader() {
        $('.comman_loderr').show();
        $('.folder-contents, .file-container').hide();
    }

    function hideLoader() {
        $('.comman_loderr').hide();
        $('.folder-contents, .file-container').show();
    }



    //  // Function to fetch subfolders and handle incorporation table appending
    function fetchSubfolders(folderPath, callback) {
        $.ajax({
            url: '/fetch-subfolders',
            method: 'GET',
            data: { path: folderPath },
            success: function(response) {
                const subfolderHtml = response.html;
                const $parentFolder = $(`[data-folder-path="${folderPath}"]`).parent();
                const $dropdownMenu = $parentFolder.find('.dropdown-menu');
                // Clear existing content and populate with new subfolder HTML
                $dropdownMenu.html(subfolderHtml);
                // Fetch folder contents and ensure visibility
                fetchFolderContents2(folderPath, false);
                // Invoke callback with the latest folder path if provided
                // if (callback) callback(response.latestFolderPath);
            },
            error: function(xhr) {
                console.error('Error fetching subfolder data:', xhr.responseText);
            }
        });
    }

function updateFolderList(newFolderPath) {
    if (newFolderPath) {
        openNewFolder(newFolderPath);
    }
}

function openNewFolder(folderPath) {
    const $newFolderLink = $(`[data-folder-path="${folderPath}"]`);
    if ($newFolderLink.length) {
        fetchSubfolders(folderPath, updateFolderList);
    } else {
        console.warn(`Folder link not found for path: ${folderPath}`);
    }
}

 function updateBreadcrumb(folderPath) {
    function getQueryParam(param) {
        const params = new URLSearchParams(window.location.search);
        return params.get(param);
    }

    // Retrieve the folder path from the URL parameters
    const folderPaths = getQueryParam('folder');
    const decodedFolderPath = folderPaths ? decodeURIComponent(folderPaths) : null;
    const pathToUse = decodedFolderPath || folderPath;

    // let breadcrumbHtml = '';
    // const folderNames = pathToUse.split('/');
    // let fullPath = '';

    // folderNames.forEach((folderName, index) => {
    //     fullPath += (index > 0 ? '/' : '') + folderName;

    //     if (index === folderNames.length - 1) {
            
    //         if (strpos(${folderName}, '_') !== false) {
    //             // Find the position of the '-' character
    //              let dash_position_name = strpos(${folderName}, '_');
                
    //             // Get the substring after the '-'
    //             let replacedName = substr(${folderName}, dash_position_name + 1);
    //             ${folderName} = replacedName ;
                
    //         }
    //         else{
    //             ${folderName} = ${folderName};
    //         }
            
            
    //         breadcrumbHtml += `<span>${folderName}</span>`;
    //     } else {
    //         breadcrumbHtml += `<a href="#" class="breadcrumb-link" data-folder-path="${fullPath}">${folderName}</a> <span>/</span>`;
    //     }
    // });
    
            let breadcrumbHtml = '';
            const folderNames = pathToUse.split('/');
            let fullPath = '';
            
            folderNames.forEach((folderName, index) => {
                fullPath += (index > 0 ? '/' : '') + folderName;
            
                // Check if the folderName contains '2024-2025October240_'
                const pattern = /^\d{4}-\d{4}(January|February|March|April|May|June|July|August|September|October|November|December)\d{1,}_/;
            
                if (pattern.test(folderName)) {
                    // Extract the substring after '2024-2025October240_'
                    let underscorePosition = folderName.indexOf('_');
                    folderName = folderName.slice(underscorePosition + 1);
                }
            
                if (index === folderNames.length - 1) {
                    // Add the last part of the breadcrumb as a plain span
                    breadcrumbHtml += `<span>${folderName}</span>`;
                } else {
                    // Add intermediate breadcrumb links
                    breadcrumbHtml += `<a href="#" class="breadcrumb-link" data-folder-path="${fullPath}">${folderName}</a> <span>/</span>`;
                }
            });
            
            
 if (!breadcrumbHtml.trim() || breadcrumbHtml === '<span></span>') {
        breadcrumbHtml = '<span>Home</span>'; // Set to Home if breadcrumb is empty
    }

    // Update the breadcrumb navigation path
    $('.nav-path').html(breadcrumbHtml);
    console.log("FDgfdgfdgdfgfd :" + breadcrumbHtml); // Log the actual breadcrumbHtml

    // Show or hide select_path_view based on breadcrumb content
    if (!breadcrumbHtml.trim() || breadcrumbHtml === '<span>Home</span>') {
        // Hide the select_path_view if breadcrumbHtml is empty or is just "Home"
        $('.select_path_view').hide();
    } else {
        // Show the select_path_view if breadcrumbHtml has content
        $('.select_path_view').show();
    }


    // Attach click event handler to breadcrumb links
    $(document).off('click', '.breadcrumb-link').on('click', '.breadcrumb-link', function(e) {
        e.preventDefault();
        const folderPath = $(this).data('folder-path');
 console.log("gjkhgjhgfgjjhghjghjgjhgjhgjhgjhgjhghjghjgjhgjyg: "+folderPath);
        console.log("Navigating to folder: " + folderPath);
        navigateToFolder(folderPath); // Function to handle navigation
    });
}

function toggleLabelWrap() {
    if ($('#parent-folder').val() || $('#parent-folders').val()) {
        $('.label_wrap').show();
    } else {
        $('.label_wrap').hide();
    }
}

// $(document).on('click', '.breadcrumb-link', function(e) {
//     e.preventDefault();
//     var folderPath = $(this).data('folder-path');
//     navigateToFolder(folderPath);
// });

$(document).on('click', '.breadcrumb-link', function(e) {
    e.preventDefault(); // Ensure this is used only when you intend to stop the browser's default behavior
    const folderPath = $(this).data('folder-path');
    console.log("gjkhgjhgfgjjhghjghjgjhgjhgjhgjhgjhghjghjgjhgjyg: "+folderPath);
    navigateToFolder(folderPath);
});

$(document).on('click', '.folder-link', function(e) {
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var folderPath = $this.data('folder-path');
    
    
    
    // Remove 'selected-folder' class from all folder links and toggle icons
    $('.folder-link').removeClass('selected-folder');
    $('.toggle_icconn').removeClass('selected-folder');

    // Toggle 'selected-folder' class on the clicked element
    if ($this.hasClass('selected-folder')) {
        $this.removeClass('selected-folder');
    } else {
        navigateToFolder(folderPath);
        $this.addClass('selected-folder');
    }
});

$(document).on('click', '.toggle_icconn', function(e) {
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var folderPath = $this.data('folder-path');
    
    

    // Remove 'active' class from all other toggle icons
    $('.toggle_icconn').removeClass('active');
    
    // Toggle 'active' class on the clicked element
    if ($this.hasClass('active')) {
        $this.removeClass('active'); // Remove 'active' class if it's already active
    } else {
        navigateToFolder1(folderPath);
        $this.addClass('active'); // Add 'active' class
    }
});


function navigateToFolder1(folderPath) {
  
    openNewFolder(folderPath);
    
    $('li a').removeClass('active');
    $(`[data-folder-path="${folderPath}"]`).addClass('active');
    $('#parent-folder, #parent-folders').val(folderPath);
    toggleLabelWrap();
}

function navigateToFolder(folderPath) {
    showLoader();

    // Decode the folder path to remove unwanted encoding
    folderPath = decodeURIComponent(folderPath);

   
        updateBreadcrumb(folderPath);
        fetchFolderContents(folderPath, false);
        openNewFolder(folderPath);
        $('li a').removeClass('selected-folder');
        $(`[data-folder-path="${folderPath}"]`).addClass('selected-folder');
        $('#parent-folder, #parent-folders').val(folderPath);
        toggleLabelWrap();
        
        // Save breadcrumb to session (implement this part as needed)

        // Trigger a success alert with the folder path
      

 

    if (folderPath) {
        const newUrl = new URL(window.location);
        newUrl.searchParams.set('folder', encodeURIComponent(folderPath));
        window.history.pushState({ path: newUrl.href }, '', newUrl.href);
    }
}

// Listen for browser navigation (back/forward buttons)
window.addEventListener('popstate', function(event) {
    // Check if the event has state information (this is your folderPath)
    if (event.state && event.state.folderPath) {
        // Update the page based on the state stored in the history
        updateBreadcrumb(event.state.folderPath);
        fetchSubfolders(event.state.folderPath);
    } else {
        // Handle the case where there's no state (for example, the initial page load)
        const initialFolderPath = getQueryParamSKY('folder') || '/'; // Default to root if no folder is in the URL
        updateBreadcrumb(initialFolderPath);
        fetchSubfolders(initialFolderPath);
    }
});
function getQueryParamSKY(param) {
    const params = new URLSearchParams(window.location.search);
    return params.get(param);
}


function bindFolderClickEvents() {
    $('.folder-link').off('click').on('click', function(e) {
        e.preventDefault();
        var folderPath = $(this).data('folder-path');
        navigateToFolder(folderPath);
    });
}
 function fetchFolderContents(folderPath) {
        showLoader(); // Ensure the loader is shown when the request starts
       
         function getQueryParam(param) {
            const queryString = window.location.search.substring(1);
            const params = queryString.split('&');
            for (let i = 0; i < params.length; i++) {
                const pair = params[i].split('=');
                if (pair[0] === param) {
                    return pair[1] ? decodeURIComponent(pair[1]) : null;
                }
            }
            return null;
        }

        // Retrieve the folder path from the URL parameters
        const folderPaths = getQueryParam('folder');
        
          const decodedFolderPath = folderPaths ? decodeURIComponent(folderPaths) : null;
        const pathToUse = decodedFolderPath ? decodedFolderPath : folderPath;
        
        // Directly use the folderPath as it's already decoded when passed from above
        $.ajax({
            url: '/fetch-folder-contents',
            method: 'GET',
            data: { folderName: pathToUse },  // Use the folderPath as is
            success: function(response) {
                $('.folder-contents').html(response.folderHtml);
                $('.file-container').html(response.fileHtml);

                clearAppendedTables();

                if (pathToUse === 'Legal/Secretarial/Board Meetings' && !incorporationTableAppended) {
                    insertIncorporationTable();
                    incorporationTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Annual General Meeting' && !meetingTableAppended) {
                    insertMeetingTable();
                    meetingTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Extra Ordinary General Meeting' && !orderTableAppended) {
                    insertOrderTable();
                    orderTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Incorporation' && !incTableAppended) {
                    insertINCTable();
                    incTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Annual Filings' && !annTableAppended) {
                    insertANNTable();
                    annTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Director Appointments' && !directTableAppended) {
                    insertDirectTable();
                    directTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Director Resignation' && !directexitTableAppended) {
                    insertDirectexitTable();
                    directexitTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Auditor Appointment' && !auditappTableAppended) {
                    insertauditappTable();
                    auditappTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Auditor Exits' && !auditexitTableAppended) {
                    insertauditexitTable();
                    auditexitTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Statutory Registers' && !staturegiTableAppended) {
                    insertstaturegiTable();
                    staturegiTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Deposit Undertakings' && !undertakingTableAppended) {
                    insertundertakingTable();
                    undertakingTableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Book-Keeping/Bank Account Statements' && !bankAccountStatementsTableAppended) {
                    insertbankAccountStatementsTable();
                    bankAccountStatementsTableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Book-Keeping/Fixed Deposit Statements' && !bankFixedDepositStatementsTableAppended) {
                    insertbankFixedDepositStatementsTable();
                    bankFixedDepositStatementsTableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Book-Keeping/Credit Card Statements' && !bankCreditCardStatementsTableAppended) {
                    insertbankCreditCardStatementsTable();
                    bankCreditCardStatementsTableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Book-Keeping/Mutual Fund Statements' && !bankMutualFundStatementsTableAppended) {
                    insertbankMutualFundStatementsTable();
                    bankMutualFundStatementsTableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Charter documents/Director Details/Director 1' && !charterdocumentsDirectordetatilsDirector1TableAppended) {
                    insertcharterdocumentsDirectordetatilsDirector1Table();
                    charterdocumentsDirectordetatilsDirector1TableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Charter documents/Director Details/Director 2' && !charterdocumentsDirectordetatilsDirector2TableAppended) {
                    insertcharterdocumentsDirectordetatilsDirector2Table();
                    charterdocumentsDirectordetatilsDirector2TableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Charter documents/Incorporation' && !charterdocumentsIncorporationTableAppended) {
                    insertcharterdocumentsIncorporationTableAppendedTable();
                    charterdocumentsIncorporationTableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Charter documents/Registrations' && !charterdocumentsRegistrationsTableAppended) {
                    insertcharterdocumentsRegistrationsTableAppendedTable();
                    charterdocumentsRegistrationsTableAppended = true;
                }

                bindFolderClickEvents();
                updateBreadcrumb(pathToUse);
                hideLoader(); // Hide loader after contents are updated
            },
            error: function(xhr) {
                console.error('Error fetching folder contents:', xhr.responseText);
                hideLoader(); // Hide loader in case of error
            }
        });
    }
//   $('#sortOptions').on('change', function() {
//     const folderPath = getQueryParamf('folder');
//     fetchFolderContents(folderPath);  // Call the function with the selected sorting option
//     });
    
    function fetchFolderContents2(folderPath) {
        // showLoader(); // Ensure the loader is shown when the request starts
       
         function getQueryParam(param) {
            const queryString = window.location.search.substring(1);
            const params = queryString.split('&');
            for (let i = 0; i < params.length; i++) {
                const pair = params[i].split('=');
                if (pair[0] === param) {
                    return pair[1] ? decodeURIComponent(pair[1]) : null;
                }
            }
            return null;
        }

        // Retrieve the folder path from the URL parameters
        const folderPaths = getQueryParam('folder');
        
          const decodedFolderPath = folderPaths ? decodeURIComponent(folderPaths) : null;
        const pathToUse = decodedFolderPath ? decodedFolderPath : folderPath;
        // Directly use the folderPath as it's already decoded when passed from above
        $.ajax({
            url: '/fetch-folder-contents',
            method: 'GET',
            data: { folderName: pathToUse },  // Use the folderPath as is
            success: function(response) {
                $('.folder-contents').html(response.folderHtml);
                $('.file-container').html(response.fileHtml);
                
                // console.log("path to use in fetch folder content 2 : "+pathToUse);
                
                // let pathToUse = 'Accounting & Taxation /Charter documents /Director Details /Director 1';

                // Split the string by '/' and trim spaces
                
                // const parts = pathToUse.split('/').map(part => part.trim());
    
                // let incrementalPaths = [];
                
                // // Loop through the parts and create incremental paths
                // let currentPath = '';
                // // console.log("parts is ss: "+parts);
                
                // parts.forEach((part, index) => {
                //     // Append the current part to the growing path
                //     currentPath = currentPath ? currentPath + '/' + part : part;
                //     // console.log("nanananananananaaaaaaaa:::::: "+currentPath);
                    
                //     const element = $(`.toggle_icconn[data-folder-path="${currentPath}"]`);
                //     // const element = $(`b.toggle_icconn[data-folder-path="${currentPath}"]`);

                // if (element.length) {
                // // Add the 'show' class to its sibling <ul> element with class 'dropdown-menu'
                // element.closest('li').find('ul.dropdown-menu').addClass('show');
                // // element.closest('li').find('a.folder-link').addClass('show');
                    
                // }
    
                // // Ensure the click event is attached only once and click the element programmatically
                // if (!element.hasClass('clicked-once')) {
                //     element.addClass('clicked-once').on('click', function() {
                //         // console.log("Element clicked once!");
                //     }).trigger('click'); // Trigger the click programmatically
                // }
                // // 
                
                
                    
                //     // Push the incremental path to the array
                //     // incrementalPaths.push(currentPath);
                // });
                
                // $(`a[data-folder-path="${pathToUse}"]`).addClass('selected-folder');
                
                
                
                // console.log(incrementalPaths);

                
                
                // -------------------------------------------------

                clearAppendedTables();

                if (pathToUse === 'Legal/Secretarial/Board Meetings' && !incorporationTableAppended) {
                    insertIncorporationTable();
                    incorporationTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Annual General Meeting' && !meetingTableAppended) {
                    insertMeetingTable();
                    meetingTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Extra Ordinary General Meeting' && !orderTableAppended) {
                    insertOrderTable();
                    orderTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Incorporation' && !incTableAppended) {
                    insertINCTable();
                    incTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Annual Filings' && !annTableAppended) {
                    insertANNTable();
                    annTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Director Appointments' && !directTableAppended) {
                    insertDirectTable();
                    directTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Director Resignation' && !directexitTableAppended) {
                    insertDirectexitTable();
                    directexitTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Auditor Appointment' && !auditappTableAppended) {
                    insertauditappTable();
                    auditappTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Auditor Exits' && !auditexitTableAppended) {
                    insertauditexitTable();
                    auditexitTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Statutory Registers' && !staturegiTableAppended) {
                    insertstaturegiTable();
                    staturegiTableAppended = true;
                } else if (pathToUse === 'Legal/Secretarial/Deposit Undertakings' && !undertakingTableAppended) {
                    insertundertakingTable();
                    undertakingTableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Book-Keeping/Bank Account Statements' && !bankAccountStatementsTableAppended) {
                    insertbankAccountStatementsTable();
                    bankAccountStatementsTableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Book-Keeping/Fixed Deposit Statements' && !bankFixedDepositStatementsTableAppended) {
                    insertbankFixedDepositStatementsTable();
                    bankFixedDepositStatementsTableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Book-Keeping/Credit Card Statements' && !bankCreditCardStatementsTableAppended) {
                    insertbankCreditCardStatementsTable();
                    bankCreditCardStatementsTableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Book-Keeping/Mutual Fund Statements' && !bankMutualFundStatementsTableAppended) {
                    insertbankMutualFundStatementsTable();
                    bankMutualFundStatementsTableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Charter documents/Director Details/Director 1' && !charterdocumentsDirectordetatilsDirector1TableAppended) {
                    insertcharterdocumentsDirectordetatilsDirector1Table();
                    charterdocumentsDirectordetatilsDirector1TableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Charter documents/Director Details/Director 2' && !charterdocumentsDirectordetatilsDirector2TableAppended) {
                    insertcharterdocumentsDirectordetatilsDirector2Table();
                    charterdocumentsDirectordetatilsDirector2TableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Charter documents/Incorporation' && !charterdocumentsIncorporationTableAppended) {
                    insertcharterdocumentsIncorporationTableAppendedTable();
                    charterdocumentsIncorporationTableAppended = true;
                } else if (pathToUse === 'Accounting & Taxation/Charter documents/Registrations' && !charterdocumentsRegistrationsTableAppended) {
                    insertcharterdocumentsRegistrationsTableAppendedTable();
                    charterdocumentsRegistrationsTableAppended = true;
                }

                bindFolderClickEvents();
                updateBreadcrumb(pathToUse);
                // hideLoader(); // Hide loader after contents are updated
            },
            error: function(xhr) {
                console.error('Error fetching folder contents:', xhr.responseText);
                // hideLoader(); // Hide loader in case of error
            }
        });
    }


    var incorporationTableAppended = false;
    var meetingTableAppended = false;
    var orderTableAppended = false;
    var incTableAppended = false;
    var annTableAppended = false;
    var directTableAppended = false;
    var directexitTableAppended = false;
    var auditappTableAppended = false;
    var auditexitTableAppended = false;
    var staturegiTableAppended = false;
    var undertakingTableAppended = false;
    var bankAccountStatementsTableAppended = false;
    var bankFixedDepositStatementsTableAppended = false;
    var bankCreditCardStatementsTableAppended = false;
    var bankMutualFundStatementsTableAppended = false;
    var charterdocumentsDirectordetatilsDirector1TableAppended = false;
    var charterdocumentsDirectordetatilsDirector2TableAppended = false;
    var charterdocumentsIncorporationTableAppended = false;
    var charterdocumentsRegistrationsTableAppended = false;
    



// Define the folder-to-function mappings and appended status
const tableFunctions = {
    'Legal/Secretarial/Board Meetings': ['insertIncorporationTable', 'incorporationTableAppended'],
    'Legal/Secretarial/Annual General Meeting': ['insertMeetingTable', 'meetingTableAppended'],
    'Legal/Secretarial/Extra Ordinary General Meeting': ['insertOrderTable', 'orderTableAppended'],
    'Legal/Secretarial/Incorporation': ['insertINCTable', 'incTableAppended'],
    'Legal/Secretarial/Annual Filings': ['insertANNTable', 'annTableAppended'],
    'Legal/Secretarial/Director Appointments': ['insertDirectTable', 'directTableAppended'],
    'Legal/Secretarial/Director Resignation': ['insertDirectexitTable', 'directexitTableAppended'],
    'Legal/Secretarial/Auditor Appointment': ['insertauditappTable', 'auditappTableAppended'],
    'Legal/Secretarial/Auditor Exits': ['insertauditexitTable', 'auditexitTableAppended'],
    'Legal/Secretarial/Statutory Registers': ['insertstaturegiTable', 'staturegiTableAppended'],
    'Legal/Secretarial/Deposit Undertakings': ['insertundertakingTable', 'undertakingTableAppended'],
    'Accounting & Taxation/Book-Keeping/Bank Account Statements': ['insertbankAccountStatementsTable', 'bankAccountStatementsTableAppended'],
    'Accounting & Taxation/Book-Keeping/Fixed Deposit Statements': ['insertbankFixedDepositStatementsTable', 'bankFixedDepositStatementsTableAppended'],
    'Accounting & Taxation/Book-Keeping/Credit Card Statements': ['insertbankCreditCardStatementsTable', 'bankCreditCardStatementsTableAppended'],
    'Accounting & Taxation/Book-Keeping/Mutual Fund Statements': ['insertbankMutualFundStatementsTable', 'bankMutualFundStatementsTableAppended'],
    'Accounting & Taxation/Charter documents/Director Details/Director 1': ['insertcharterdocumentsDirectordetatilsDirector1Table', 'charterdocumentsDirectordetatilsDirector1TableAppended'],
    'Accounting & Taxation/Charter documents/Director Details/Director 2': ['insertcharterdocumentsDirectordetatilsDirector2Table', 'charterdocumentsDirectordetatilsDirector2TableAppended'],
    'Accounting & Taxation/Charter documents/Incorporation': ['insertcharterdocumentsIncorporationTable', 'charterdocumentsIncorporationTableAppended'],
    'Accounting & Taxation/Charter documents/Registrations': ['insertcharterdocumentsRegistrationsTable', 'charterdocumentsRegistrationsTableAppended']
};

// Function to check if the table is already appended
function isTableAppended(folderPath) {
    const tableFuncEntry = tableFunctions[folderPath];
    if (tableFuncEntry) {
        const flagName = tableFuncEntry[1];
        return JSON.parse(localStorage.getItem(flagName) || 'false');
    }
    return false;
}

// Function to set table appended status in localStorage
function setTableAppended(folderPath, status) {
    const tableFuncEntry = tableFunctions[folderPath];
    if (tableFuncEntry) {
        const flagName = tableFuncEntry[1];
        localStorage.setItem(flagName, JSON.stringify(status));
    }
}

// Clear appended table status
function clearAppendedTables() {
    for (let folderPath in tableFunctions) {
        const flagName = tableFunctions[folderPath][1];
        localStorage.removeItem(flagName);
    }
}

// Function to handle table insertion
function handleFolderPath(folderPath) {
    console.log("Handling folder path:", folderPath);
    clearAppendedTables();

    if (folderPath === 'Legal/Secretarial/Board Meetings' && !incorporationTableAppended) {
        console.log("Inserting Incorporation Table");
        insertIncorporationTable();
        incorporationTableAppended = true;
    } else if (folderPath === 'Legal/Secretarial/Annual General Meeting' && !meetingTableAppended) {
        console.log("Inserting Meeting Table");
        insertMeetingTable();
        meetingTableAppended = true;
    } else if (folderPath === 'Legal/Secretarial/Extra Ordinary General Meeting' && !orderTableAppended) {
        console.log("Inserting Order Table");
        insertOrderTable();
        orderTableAppended = true;
    } else if (folderPath === 'Legal/Secretarial/Incorporation' && !incTableAppended) {
        console.log("Inserting INC Table");
        insertINCTable();
        incTableAppended = true;
    } else if (folderPath === 'Legal/Secretarial/Annual Filings' && !annTableAppended) {
        console.log("Inserting ANN Table");
        insertANNTable();
        annTableAppended = true;
    } else if (folderPath === 'Legal/Secretarial/Director Appointments' && !directTableAppended) {
        console.log("Inserting Direct Table");
        insertDirectTable();
        directTableAppended = true;
    } else if (folderPath === 'Legal/Secretarial/Director Resignation' && !directexitTableAppended) {
        console.log("Inserting Direct Exit Table");
        insertDirectexitTable();
        directexitTableAppended = true;
    } else if (folderPath === 'Legal/Secretarial/Auditor Appointment' && !auditappTableAppended) {
        console.log("Inserting Audit App Table");
        insertauditappTable();
        auditappTableAppended = true;
    } else if (folderPath === 'Legal/Secretarial/Auditor Exits' && !auditexitTableAppended) {
        console.log("Inserting Audit Exit Table");
        insertauditexitTable();
        auditexitTableAppended = true;
    } else if (folderPath === 'Legal/Secretarial/Statutory Registers' && !staturegiTableAppended) {
        console.log("Inserting Statutory Registers Table");
        insertstaturegiTable();
        staturegiTableAppended = true;
    } else if (folderPath === 'Legal/Secretarial/Deposit Undertakings' && !undertakingTableAppended) {
        console.log("Inserting Undertaking Table");
        insertundertakingTable();
        undertakingTableAppended = true;
    } else if (folderPath === 'Accounting & Taxation/Book-Keeping/Bank Account Statements' && !bankAccountStatementsTableAppended) {
        console.log("Inserting Bank Account Statements Table");
        insertbankAccountStatementsTable();
        bankAccountStatementsTableAppended = true;
    } else if (folderPath === 'Accounting & Taxation/Book-Keeping/Fixed Deposit Statements' && !bankFixedDepositStatementsTableAppended) {
        console.log("Inserting Fixed Deposit Statements Table");
        insertbankFixedDepositStatementsTable();
        bankFixedDepositStatementsTableAppended = true;
    } else if (folderPath === 'Accounting & Taxation/Book-Keeping/Credit Card Statements' && !bankCreditCardStatementsTableAppended) {
        console.log("Inserting Credit Card Statements Table");
        insertbankCreditCardStatementsTable();
        bankCreditCardStatementsTableAppended = true;
    } else if (folderPath === 'Accounting & Taxation/Book-Keeping/Mutual Fund Statements' && !bankMutualFundStatementsTableAppended) {
        console.log("Inserting Mutual Fund Statements Table");
        insertbankMutualFundStatementsTable();
        bankMutualFundStatementsTableAppended = true;
    } else if (folderPath === 'Accounting & Taxation/Charter documents/Director Details/Director 1' && !charterdocumentsDirectordetatilsDirector1TableAppended) {
        console.log("Inserting Director 1 Table");
        insertcharterdocumentsDirectordetatilsDirector1Table();
        charterdocumentsDirectordetatilsDirector1TableAppended = true;
    } else if (folderPath === 'Accounting & Taxation/Charter documents/Director Details/Director 2' && !charterdocumentsDirectordetatilsDirector2TableAppended) {
        console.log("Inserting Director 2 Table");
        insertcharterdocumentsDirectordetatilsDirector2Table();
        charterdocumentsDirectordetatilsDirector2TableAppended = true;
    } else if (folderPath === 'Accounting & Taxation/Charter documents/Incorporation' && !charterdocumentsIncorporationTableAppended) {
        console.log("Inserting Incorporation Table");
        insertcharterdocumentsIncorporationTableAppendedTable();
        charterdocumentsIncorporationTableAppended = true;
    } else if (folderPath === 'Accounting & Taxation/Charter documents/Registrations' && !charterdocumentsRegistrationsTableAppended) {
        console.log("Inserting Registrations Table");
        insertcharterdocumentsRegistrationsTableAppendedTable();
        charterdocumentsRegistrationsTableAppended = true;
    }
}

// Fetch folder contents

    function clearAppendedTables() {
        incorporationTableAppended = false;
        meetingTableAppended = false;
        orderTableAppended = false;
        incTableAppended = false;
        annTableAppended = false;
        directTableAppended = false;
        directexitTableAppended = false;
        auditappTableAppended = false;
        auditexitTableAppended = false;
        staturegiTableAppended = false;
        undertakingTableAppended = false;
        bankAccountStatementsTableAppended = false;
        bankFixedDepositStatementsTableAppended = false;
        bankCreditCardStatementsTableAppended = false;
        bankMutualFundStatementsTableAppended = false;
        charterdocumentsDirectordetatilsDirector1TableAppended = false;
        charterdocumentsDirectordetatilsDirector2TableAppended = false;
        charterdocumentsIncorporationTableAppended = false;
        charterdocumentsRegistrationsTableAppended = false;
    }
    
    
    
     function insertcharterdocumentsRegistrationsTableAppendedTable() {
        const tableHtml = `
            @include('Charter_documents_Registrations')
        `;
        $('.file-container').append(tableHtml);
    }
    
    
     function insertcharterdocumentsIncorporationTableAppendedTable() {
        const tableHtml = `
            @include('Charter_documents_Incorporation')
        `;
        $('.file-container').append(tableHtml);
    }
    
    function insertcharterdocumentsDirectordetatilsDirector2Table() {
        const tableHtml = `
            @include('Charter_documents_Director_Details_Director_2')
        `;
        $('.file-container').append(tableHtml);
    }
    
     function insertcharterdocumentsDirectordetatilsDirector1Table() {
        const tableHtml = `
            @include('Charter_documents_Director_Details_Director_1')
        `;
        $('.file-container').append(tableHtml);
    }
    
    function insertbankMutualFundStatementsTable() {
        const tableHtml = `
            @include('Book-Keeping_Mutual_Fund_Statements')
        `;
        $('.file-container').append(tableHtml);
    }
    
     function insertbankCreditCardStatementsTable() {
        const tableHtml = `
            @include('Book-Keeping_Credit_Card_Statements')
        `;
        $('.file-container').append(tableHtml);
    }
    
    function insertbankFixedDepositStatementsTable() {
        const tableHtml = `
            @include('Book-Keeping_Fixed_Deposit_Statements')
        `;
        $('.file-container').append(tableHtml);
    }
    
    function insertbankAccountStatementsTable() {
        const tableHtml = `
            @include('Book-Keeping_Bank_Account_Statements')
        `;
        $('.file-container').append(tableHtml);
    }

    function insertundertakingTable() {
        const tableHtml = `
            @include('Secretarial_Deposit_Undertakings')
        `;
        $('.file-container').append(tableHtml);
    }

    function insertstaturegiTable() {
        const tableHtml = `
            @include('Secretarial_Statutory_Registers')
        `;
        $('.file-container').append(tableHtml);
    }

    function insertauditexitTable() {
        const tableHtml = `
            @include('Secretarial_Auditor_Exits')
        `;
        $('.file-container').append(tableHtml);
    }

    function insertauditappTable() {
        const tableHtml = `
            @include('Secretarial_Auditor_Appointment')
        `;
        $('.file-container').append(tableHtml);
    }

    function insertDirectexitTable() {
        const tableHtml = `
            @include('Secretarial_Director_Exits')
        `;
        $('.file-container').append(tableHtml);
    }

    function insertDirectTable() {
        const tableHtml = `
            @include('Secretarial_Director_Appointments')
        `;
        $('.file-container').append(tableHtml);
    }

    function insertANNTable() {
        const tableHtml = `
            @include('Secretarial_Annual_Filings')
        `;
        $('.file-container').append(tableHtml);
    }

    function insertINCTable() {
        const tableHtml = `
            @include('Secretarial_Incorporation')
        `;
        $('.file-container').append(tableHtml);
    }

    function insertOrderTable() {
        const tableHtml = `
            @include('Secretarial_Extra_Ordinary_General_Meeting')
        `;
        $('.file-container').append(tableHtml);
    }

    function insertMeetingTable() {
        const tableHtml = `
            @include('Secretarial_Annual_General_Meeting')
        `;
        $('.file-container').append(tableHtml);
    }

    function insertIncorporationTable() {
        const tableHtml = `
            @include('Secretarial_Board_Meetings')
        `;
        $('.file-container').append(tableHtml);
    }

    $('.hidebdnotice').on('click', function() {
        alert('hello');
        console.log("clicked");
    });

    $('#create-folder-form').on('submit', function(e) {
        e.preventDefault();
        var $submitButton = $(this).find('button[type="submit"]');
        $submitButton.prop('disabled', true).append('<span class="button-spinner"></span>');
        var formData = $(this).serialize();
        
        var parentFolderValue = $('#parent-folder').val();

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            success: function(response) {
                setTimeout(function() {
                    $('.button-spinner').remove();
                    toastr.success(response.message);
                    if (response.success) {
                        $('#create_folder').modal('hide');
                        fetchFolderContents(parentFolderValue);
                        $('#create_folderr').modal('hide');
                        if (!parentFolderValue) {
                            $("#fresponsive").load(" #fresponsive > *");
                        } else {
                            fetchSubfolders(parentFolderValue, function(latestFolderPath) {
                                // Additional actions if needed after fetching subfolders
                            });
                        }
                        $('.ba-we-love-subscribers').removeClass("open");
                        $('.ba-we-love-subscribers-fab').removeClass("gray");
                        $('.img-fab.img').removeClass("close");
                    }
                    $('input[name="folder_name"]').val('');
                    $submitButton.prop('disabled', false);
                }, 5000); // Show loader for 5 seconds
            },
            error: function(xhr) {
                $('.button-spinner').remove();
                let response = JSON.parse(xhr.responseText);
                toastr.error('Error: ' + response.message);
                $('input[name="folder_name"]').val('');
                $submitButton.prop('disabled', false);
                $('.ba-we-love-subscribers').removeClass("open");
                $('.ba-we-love-subscribers-fab').removeClass("gray");
                $('.img-fab.img').removeClass("close");
            }
        });
    });

 $('#upload-file-form').on('submit', function(e) {
    e.preventDefault();
    var $submitButton = $(this).find('button[type="submit"]');
    $submitButton.prop('disabled', true).append('<span class="button-spinner"></span>'); // Disable and append spinner

    var formData = new FormData(this);

    $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            $('.button-spinner').remove(); // Remove spinner

            if (response.success) {
                // toastr.success('File uploaded successfully!'); // Display success toaster message
                if (response.successMessages.length) {
                    response.successMessages.forEach(function(msg) {
                        toastr.success(msg);
                    });
                }
                if (response.errorMessages.length) {
                    response.errorMessages.forEach(function(msg) {
                        toastr.warning(msg);
                    });
                }
                $('#upload_file').modal('hide');
                $('#upload_filee').modal('hide');
                fetchFolderContents($('#parent-folder').val());
                resetFileInput($('input[name="file"]'));
                window.location.reload(true);
                exit;
            } else {
                toastr.error('Failed to upload file: ' + response.message);
                
            }
            
            $submitButton.prop('disabled', false); // Re-enable submit button
        },
        error: function(xhr) {
            $('.button-spinner').remove(); // Remove spinner
            $submitButton.prop('disabled', false); // Re-enable submit button

            if (xhr.status === 400 || xhr.status === 500) {
                let response = JSON.parse(xhr.responseText);
                toastr.error('Error: ' + response.message);
                
            } else {
                toastr.error('An unknown error occurred.');
               
            }
        }
    });
});


    function resetFileInput($fileInput) {
        $fileInput.val('');
        var fileArea = $fileInput.closest('.modal-content');
        var selectedFileDiv = fileArea.find('.selected-file');
        selectedFileDiv.text('');

        fileArea.removeClass('green-outline');
        fileArea.css('outline', '2px dashed #D2DBE5');
        $fileInput.closest('.file-dummy').find('.fille').css('display', 'inline');
    }

    function fetchFirstParentFolderContents() {
        var firstParentPath = $('.folder-link:first').data('folder-path');
        if (firstParentPath) {
            fetchFolderContents(firstParentPath);
        } else {
            $('.folder-contents').html('No folders available.');
            $('.file-contents').html('No files available.');
        }
    }

    fetchFirstParentFolderContents();
    bindFolderClickEvents();

    var firstFolderPath = '{{ $folders->where("parent_name", null)->first()->path ?? '' }}';
    const encodedString = getQueryParamf('folder');
    const decodedString = decodeURIComponent(encodedString);
    
    $('#parent-folder').val(folder );
    $('#parent-folders').val(firstFolderPath);

    toggleLabelWrap();
});

// Simulating document loading
$(window).on('load', function() {
    // After everything is loaded, hide the loader
    hideLoader();
});

</script>
<!-- Ensure you have jQuery included -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
   
   
<style>
        .label_wrap {
            display: none;
        }
    </style>
            </div>
        </div>
    </div>
</div>

<!-- 12 sept commonfiles delete start here sandeep-->

<script>
    $(document).ready(function() {
        // When the delete button is clicked
        $(document).on('click', '#commondelbtdtst', function() {
            var id = $(this).data('unique_file_id'); 
            var button = $(this);

           
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
                    
                    $.ajax({
                        url: '/deleteCustomFile/' + id, 
                        type: 'POST', // Method type
                        data: {
                            id: id, // Data to be sent to the server
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            if(response.success) {
                                toastr.success(response.success);
                                // button.closest('tr').remove();
                                window.location.reload(true);

                            } else {
                                toastr.error(response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            toastr.error(error);
                        }
                    });
                }
            });
        });
    });
    
    // sandeep soft delete operation commonfiles end here
    
</script>



<!-- create folder model end -->

<!-- upload file model start -->
<div class="modal fade drop_coman_file have_title" id="upload_filee" tabindex="-1" role="dialog" aria-labelledby="upload_filee" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-weight:700">Upload File</h5>
                <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                    <span aria-hidden="true">
                        <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black" />
                            <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black" />
                        </svg>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Upload File</h3>
                <form id="upload-file-form" action="{{ route('upload.file') }}" method="POST" enctype="multipart/form-data">

                    @csrf

        <div class="label_wrap">
                    <label>Path :</label>
                    
<script>
    $(document).ready(function() {
        // Function to get query parameter by name
        function getQueryParam(param) {
            var urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }

        // Function to update the folder path
        function updateFolderPath() {
            var folder = getQueryParam('folder');

            if (folder) {
                folder = decodeURIComponent(folder); // Decode if folder exists
                // console.log("Folder parameter: " + folder);

                // Set the folder value to data-my-folder attribute
                $('#parent-folderlll').attr('data-my-folder', folder);
                
                // Set the folder value in the input field using a template literal style
                $('#parent-folderlll').val(`${folder}`); // Using template literal syntax
            }
        }

        // Call updateFolderPath immediately to set initial value
        updateFolderPath();

        // Fetch the URL parameter every second
        setInterval(updateFolderPath, 100);
    });
</script>
                    
                    
                    <!--<input type="text" id="parent-folderlll" name="parent_folder"  value="" readonly >-->
                    
                    
                     <input type="hidden" id="parent-folderlll" name="parent_folder" data-my-folder="" value="" readonly >
                
                
</div>
<div class="gropu_form">
        <label for="fyear">Financial Year</label>
        <select id="fyear" name="fyear" required="">
            <option value="" disabled="" selected="">select</option>
            <option value="2013-2014">2013-2014</option>
              <option value="2014-2015">2014-2015</option>
               <option value="2015-2016">2015-2016</option>
                <option value="2016-2017">2016-2017</option>
                 <option value="2017-2018">2017-2018</option>
                  <option value="2018-2019">2018-2019</option>
                   <option value="2019-2020">2019-2020</option>
                  
            <option value="2020-2021">2020-2021</option>
            <option value="2021-2022">2021-2022</option>
            <option value="2022-2023">2022-2023</option>
            <option value="2023-2024">2023-2024</option>
            <option value="2024-2025">2024-2025</option>
            <option value="2025-2026">2025-2026</option>
             <option value="2026-2027">2026-2027</option>

              <option value="2027-2028">2027-2028</option>
               <option value="2028-2029">2028-2029</option>
                <option value="2029-2030">2029-2030</option>
                 <option value="2030-2031">2030-2031</option>
                  <option value="2031-2032">2031-2032</option>
                   <option value="2032-2033">2032-2033</option>
                    <option value="2033-2034">2033-2034</option>
                     <option value="2034-2035">2034-2035</option>
                      <option value="2035-2036">2035-2036</option>
                       <option value="2036-2037">2036-2037</option>
        </select>
    </div>

    <div class="gropu_form">
        <label for="Month">Month</label>
        <select id="Month" name="Month" required="">
            <option value="" disabled="" selected="">select</option>
            <option value="January">January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
        </select>
    </div>
                          <div class="gropu_form">
                          <label for="fname">All Locations</label>
                          <div class="all_locations">
                          <ul  class="nav navbar-nav dropdown customulli">
<li class="dropdown">
            <a href="#" class="dropdown-toggle folder-link selected-folder" id="autohome" data-folder-path="">
            <div class="folder-card">
                    <div class="folder-image">
                        <div class="folder_in">
                        <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M49.9259 2.10898C49.5062 2.12346 49.1017 2.26969 48.7697 2.52695L2.76969 38.4215C2.35115 38.7478 2.07939 39.2271 2.01419 39.7538C1.94899 40.2805 2.0957 40.8115 2.42204 41.2301C2.74838 41.6486 3.22762 41.9204 3.75433 41.9856C4.28105 42.0508 4.81209 41.9041 5.23063 41.5777L8.00016 39.4176V91.9996C8.00022 92.53 8.21095 93.0387 8.58601 93.4138C8.96107 93.7888 9.46975 93.9996 10.0002 93.9996H37.6642C37.8802 94.0353 38.1006 94.0353 38.3166 93.9996H61.6642C61.8802 94.0353 62.1006 94.0353 62.3166 93.9996H90.0002C90.5306 93.9996 91.0393 93.7888 91.4143 93.4138C91.7894 93.0387 92.0001 92.53 92.0002 91.9996V39.4176L94.7697 41.5777C94.9769 41.7393 95.214 41.8585 95.4673 41.9285C95.7206 41.9985 95.9852 42.018 96.246 41.9857C96.5068 41.9534 96.7587 41.8701 96.9874 41.7404C97.216 41.6108 97.4168 41.4374 97.5784 41.2302C97.74 41.0229 97.8592 40.7859 97.9292 40.5325C97.9991 40.2792 98.0185 40.0146 97.9862 39.7538C97.954 39.493 97.8706 39.2411 97.741 39.0125C97.6113 38.7839 97.4379 38.5831 97.2306 38.4215L82.0002 26.5387V11.9996H70.0002V17.1715L51.2306 2.52695C50.8585 2.23839 50.3965 2.09038 49.9259 2.10898ZM50.0002 6.64414L88.0002 36.2965V89.9996H64.0002V51.9996H36.0002V89.9996H12.0002V36.2965L50.0002 6.64414ZM74.0002 15.9996H78.0002V23.4176L74.0002 20.2926V15.9996ZM40.0002 55.9996H60.0002V89.9996H40.0002V55.9996Z" fill="#D1D5E1"/>
</svg>


                        <!-- <img src="../assets/images/solar_folder-bold.png"  id="folders" class="folder-icon" alt="Folder Icon"> -->
                        </div>
                        <div class="folder-title">
                        <span>Home</span>
                            </div>
                    </div>
                  
                </div>
                
            </a>
            
        </li>
        @foreach($folders->where('parent_name', null) as $parent)
        <li class="dropdown">
            <a href="#" class="dropdown-toggle folder-link" data-folder-path="{{ $parent->path }}">
                <div class="folder-card">
                    <div class="folder-image">
                        <div class="folder_in">
                            <svg class="d_fadee" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.635 3.5525L6.01912 3.9375H10.9375C11.2856 3.9375 11.6194 4.07578 11.8656 4.32192C12.1117 4.56806 12.25 4.9019 12.25 5.25V9.625C12.25 9.9731 12.1117 10.3069 11.8656 10.5531C11.6194 10.7992 11.2856 10.9375 10.9375 10.9375H3.0625C2.7144 10.9375 2.38056 10.7992 2.13442 10.5531C1.88828 10.3069 1.75 9.9731 1.75 9.625V3.9375C1.75 3.5894 1.88828 3.25556 2.13442 3.00942C2.38056 2.76328 2.7144 2.625 3.0625 2.625H4.16237C4.33483 2.62504 4.50558 2.65906 4.66487 2.72512C4.82417 2.79118 4.96888 2.88798 5.09075 3.01L5.635 3.5525ZM0.4375 3.9375C0.4375 3.24131 0.714062 2.57363 1.20634 2.08134C1.69863 1.58906 2.36631 1.3125 3.0625 1.3125H4.16237C4.50721 1.31246 4.84868 1.38036 5.16727 1.51233C5.48586 1.6443 5.77532 1.83775 6.01912 2.08162L6.5625 2.625H10.9375C11.6337 2.625 12.3014 2.90156 12.7937 3.39384C13.2859 3.88613 13.5625 4.55381 13.5625 5.25V9.625C13.5625 10.3212 13.2859 10.9889 12.7937 11.4812C12.3014 11.9734 11.6337 12.25 10.9375 12.25H3.0625C2.36631 12.25 1.69863 11.9734 1.20634 11.4812C0.714062 10.9889 0.4375 10.3212 0.4375 9.625V3.9375ZM4.15625 5.6875C3.9822 5.6875 3.81528 5.75664 3.69221 5.87971C3.56914 6.00278 3.5 6.1697 3.5 6.34375C3.5 6.5178 3.56914 6.68472 3.69221 6.80779C3.81528 6.93086 3.9822 7 4.15625 7H9.84375C10.0178 7 10.1847 6.93086 10.3078 6.80779C10.4309 6.68472 10.5 6.5178 10.5 6.34375C10.5 6.1697 10.4309 6.00278 10.3078 5.87971C10.1847 5.75664 10.0178 5.6875 9.84375 5.6875H4.15625Z" fill="#C5C5C5"/>
                            </svg>
                        </div>
                        <div class="folder-title">
                            <span>{{ $parent->name }}</span>
                        </div>
                    </div>
                </div>
            </a>
            <ul class="dropdown-menu" id="subfolders-{{ urlencode(str_replace(['/', ' '], '_', $parent->path)) }}"></ul>
        </li>
    @endforeach
</ul>
        
                          </div>
                          </div>

                          <div class="gropu_form">
                          <label for="fname"></label>
                          
                          <div class="select_path_view">
    <b>selected path:</b>
<div class="nav-path"></div>
</div>

                          </div>

                          <div class="gropu_form ivoice-upload">
                          <label for="fname">Upload File</label>

                          <div class="file-area">      
                          <input type="file" class="dragfile" id="file" name="files[]" multiple  required>    
                          
  <div class="file-dummy">
    <div class="success">Great, your files are selected. Keep on.</div>
    <div class="default">
    <span class="upload_icon">
      
                          <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88"><title>file-upload</title><path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z"></path></svg>
                          </span>  
                          Upload
  </div>
  </div>
  <div class="selected-file"></div>
</div> 
                          </div>
                          
        <div class="gropu_form test-area">
        <label for="desc">Description</label>
         <div class="tag-container">
            <textarea name="desc" placeholder="Description" style="height: 68px;"></textarea>
        </div>
    </div>


                    <div class="upp_input">
                    <button class="btn btn-primary" style="border-radius:5px;" type="submit">Upload</button>
</div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- upload file model end -->

</div>
                  </div>                 
                </div>               
              </div>
            </div> 
          </div>
        </div>
        <!-- Container-fluid start-->


        </div>
      </div>
    </div>
    
<!--<div class="modal fade" id="dataRoomModal" tabindex="-1" aria-labelledby="dataRoomModalLabel" aria-hidden="true">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h5 class="modal-title" id="dataRoomModalLabel">Move Files to Data Room</h5>-->
<!--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                 <div class="mb-3">-->
<!--                        <label for="existingDataRoom" class="form-label">Select Existing Data Room</label>-->
<!--                        <select id="existingDataRoom" class="form-select">-->
<!--                            @if($commondataroom->isEmpty())-->
<!--                                <option value="" disabled>No data available</option>-->
<!--                            @else-->
<!--                                @foreach($commondataroom as $dataroom)-->
<!--                                    <option value="{{ $dataroom->id }}">{{ $dataroom->name }}</option>-->
<!--                                @endforeach-->
<!--                            @endif-->
<!--                        </select>-->


<!--                    </div>-->
<!--                <form id="dataRoomForm" action="{{ route('createDataRoom') }}" method="POST">-->
<!--                    @csrf-->
<!--                    <div class="mb-3">-->
<!--                        <label for="newDataRoomName" class="form-label">Or Create New Data Room</label>-->
<!--                        <input type="text" id="newDataRoomName" name="name" class="form-control" placeholder="Enter Data Room Name">-->
<!--                    </div>-->
<!--                    <button type="submit" id="moveFilesBtn" class="btn btn-primary">Move Files</button>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


<!-- upload file model start  board_Notices_pop-->

<div class="modal fade depo-ress" id="dataRoomModal" tabindex="-1" aria-labelledby="dataRoomModalLabel" aria-hidden="true">
<div class="drop_coman_file have_title">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-weight:700">Move Files to Data Room</h5>
                <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                    <span aria-hidden="true">
                        <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black" />
                            <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black" />
                        </svg>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Move Files to Data Room</h3>
			<div class="gropu_form">
            <label for="existingDataRoom" class="form-label">Select Existing Data Room</label>
                        <select id="existingDataRoom">
                            @if($commondataroom->isEmpty())
                                <option value="" disabled>No data available</option>
                            @else
                                @foreach($commondataroom as $dataroom)
                                    <option value="{{ $dataroom->id }}">{{ $dataroom->name }}</option>
                                @endforeach
                            @endif
                        </select>
    </div>
	
                <form id="dataRoomForm" action="{{ route('createDataRoom') }}" method="POST">
<div class="gropu_form">
                          <label for="newDataRoomName" class="form-label">Or Create New Data Room</label>
                         <input type="text" id="newDataRoomName" name="name" placeholder="Enter Data Room Name">
                          </div>



                    <div class="upp_input">
					 <button type="submit" id="moveFilesBtn" class="btn btn-primary" style="border-radius:5px;">Move Files</button>					 
</div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- upload file model end -->


                                  



    <script>
    // Show create folder modal
    $('#create_folder_button').click(function () {
        $('#create_folder_modal').modal('show');
    });

    // Show upload file modal
    $('#upload_file_button').click(function () {
        $('#upload_file_modal').modal('show');
    });



</script>

<style>
  /* Add this CSS to your stylesheet */
  .button-spinner {
    display: inline-block;
    width: 16px;
    height: 16px;
    border: 2px solid #b1d794;
    border-radius: 50%;
    border-top-color: #6A924B;
    animation: spin 1s linear infinite;
    vertical-align: middle;
}
.depo-ress .drop_coman_file button.btn {
    transition: all .25s ease-out;
}
/*.depo-ress .drop_coman_file button.btn[disabled] {*/
/*    font-size: 0;*/
/*}*/

@keyframes spin {
    to {
        transform: rotate(360deg);
    }
}

#navbarCollapse .dropdown a.dropdown-toggle {
    width: 100%;
    background: transparent;
    color: #C5C5C5;
    box-shadow: none;
    outline: none;
    border: 0;
    border-radius: 10px;
    padding: 12px 18px 12px 1px;
    display: flex;
    align-items: center;
    gap: 0px 3px;
}
.drop_coman_file button.btn {
 
    margin: 0 auto !important;
    max-width: fit-content !important;
}
.drop_coman_file.have_title .modal-content .gropu_form.ivoice-upload {
    position: relative;
}
ul.dropdown-menu {
    background-color: #141414;
    width: 100%;
    box-shadow: none;
    z-index: 1;
    border: 0;
    position: relative !important;
    transform: none !important;
    margin: 0;
    display: block ! IMPORTANT;
}

ul.dropdown-menu {
    list-style: none;
    animation: 0;
    padding: 0;
    max-height: 0;
    overflow: auto;
    opacity: 0;
    visibility: visible;
    transition: all 0.75s ease-out;
}

ul.dropdown-menu.show {
    max-height: 100000px;
    opacity: 1;
    visibility: visible;
}

ul.dropdown-menu::-webkit-scrollbar {
    width: 1px;
  }
  
ul.dropdown-menu::-webkit-scrollbar-track {
    background: #f1f1f1;
  }
  
 ul.dropdown-menu::-webkit-scrollbar-thumb {
    background: #CEFFA8;
  }
  
ul.dropdown-menu li {
    border-bottom: 0;
}

ul.dropdown-menu li a {
    width: 100%;
    background: transparent;
    color: #CEFFA8;
    box-shadow: none;
    outline: none;
    border: 0;
    border-radius: 10px;
    padding: 12px 18px;
    display: flex;
    align-items: center;
    gap: 0px 3px;
    font-size: 14px;
}

ul.dropdown-menu li ul.dropdown-menu {
    border: 0;
    box-shadow: none;
    margin: 0;
}

a.dropdown-toggles {
    width: 100%;
    background: transparent;
    color: #CEFFA8;
    box-shadow: none;
    outline: none;
    border: 0;
    border-radius: 10px;
    padding: 12px 18px;
    display: flex;
    align-items: center;
    gap: 0px 3px;
}

.logout_repo {
    display: flex;
    justify-content: space-between;
}

.logout_repo li.logout_out .logou_inn {
    display: flex;
    align-items: center;
    color: #CEFFA8;
    font-weight: 500;
    gap: 0px 5px;
}

.logout_repo li.logout_out svg {
    width: 30px !important;
    height: 30px !IMPORTANT;
}

li.filefile {
    color: white;
    background: gray;
    padding: 0px;
    border: 2px solid gray;
    border-radius: 10px;
}

.filecontents {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

 .filecontents h4,  .filecontents{
    color: #A7A7A7;
    font-weight: 400;
    font-size: 19px;
    margin: 0;
}

.filecontents span {
    color: #A7A7A7;
    font-weight: 400;
    font-size: 14px;
    margin: 0;
}


 .file-container {
    margin: 40px 0px 0px;
}

 .file-container table {
    margin: 10px 0px 0px;
}

.file-container table th {
    background: #161616;
    color: #FFF;
}

 .file-container table tbody tr {
    border-color: #313131;
}

 .file-container table tr td {
    padding: 15px 10px 15px 10px;
}

 .file-container table tbody a svg {
    width: 18px;
    height: 18px;
}


.file-container table tbody .delete-button svg {
    width: 20px;
    height: 20px;
}
.funtion_buttnss {
    display: flex;
    justify-content: end;
    gap: 0px 10px;
}

 .file-container table tr th {
    padding: 12px 10px 12px 10px;
}
input#parent-folder {
    border: none;
}
input#parent-folders {
    border: none;
}

.label_wrap {
    display: none !important;
    align-items: center;
    justify-content: flex-start;
    width: 100%;
    margin: 20px 0px 0px;
}

.label_wrap label {
    margin: 0;
    color: #000000;
}


.label_wrap input {
    color: #999;
    width: 100%;
    flex: 1;
}


/**new css have to paste in css file start****/

.folder-container .folder-contents {
    display: flex;
    flex-wrap: wrap;
    flex-direction: column-reverse;
}

 .custom_table_wraap {
    display: block;
    margin: 0px 0px 50px 0px;
    /*overflow: auto;*/
}

 .custom_table_wraap table th {
    background: #161616;
    color: #FFF;
        position: relative;
}

 .custom_table_wraap table tbody tr {
    border-bottom: 1px solid #363636;
}

.custom_table_wraap table  .btndd {
    box-shadow: none;
    border: 0;
    outline: none;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #373737;
    border-radius: 50px !IMPORTANT;
    padding: 7px;
    transition: all .25s ease-out;
}
.custom_table_wraap table .btndd:hover {
    background: #161616;
}

.dark-only .custom_table_wraap table .btndd {
    background: #f0f6ea;
}

.dark-only .custom_table_wraap table .btndd:hover {
    background: #d5dfcc;
}


 .custom_table_wraap table .btndd svg {
    width: 23px;
    height: 23px;
}

.custom_table_wraap table td {
    background: transparent;
    color: #989898;
}
.folder_comman_file .file-container .custom_table_wraap {
    display: block;
    margin: 15px 0px 0px 0px;
}

.folder_comman_file .file-container .file-container .custom_table_wraap {
    display: none;
}
/**new css have to paste in css file end****/
.filter_year_Data {
    padding: 0px 0 10px 0;
    /*border: 2px solid;*/
    /*border-radius: 10px;*/
    margin: 0 0 10px 0;
}

</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



<script>
    $(document).ready(function() {
        $(document).on('click', '.click_folder_dot', function() {
            const folderId = $(this).data('folder-id');
            const dropdown = $('#myDropdown2-' + folderId);

            // Close all dropdowns except the one being opened
            $('.dropdown-content').not(dropdown).removeClass('active');

            // Toggle the active class on the corresponding dropdown
            dropdown.toggleClass('active');
        });

        // Close dropdowns when clicking outside
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.click_folder_dot').length) {
                $('.dropdown-content').removeClass('active');
            }
        });

        // Prevent dropdown from closing when clicking inside
        $('.dropdown-content').on('click', function(event) {
            event.stopPropagation();
        });
    });
</script>

<script>
    function check() {
  var checkBox = document.getElementById("checbox");
  var text1 = document.getElementsByClassName("addTimeDateDiv");

  for (var i = 0; i < text1.length; i++) {
    if (checkBox.checked == true) {
      text1[i].style.display = "block";
    } else if (checkBox.checked == false) {
      text1[i].style.display = "none";
    }
  }
}
check();

</script>

<script>
$(document).ready(function() {
    $('#open_repo_filter').on('click', function() {
      $('.side_panel_wraap').addClass('active');
         $('.side_panel_wraap_overlay').addClass('active');
    });

    $('#close_repo_filter').on('click', function() {
      $('.side_panel_wraap').removeClass('active');
       $('.side_panel_wraap_overlay').removeClass('active');
    });
    
     $('.side_panel_wraap_overlay').on('click', function() {
      $('.side_panel_wraap').removeClass('active');
       $(this).removeClass('active');
    });

  });
  </script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var clearButton = document.getElementById("go_clear");
    var selectBox = document.getElementById("sort_by");
    var checkboxes = document.querySelectorAll(".rop_check input[type='checkbox']");

    console.log("DOM fully loaded and parsed");

    function showClearButton() {
        clearButton.style.display = "inline";
        console.log("Clear button shown");
    }

    function hideClearButton() {
        clearButton.style.display = "none";
        console.log("Clear button hidden");
    }

    function clearSelections() {
        selectBox.selectedIndex = 0;
        checkboxes.forEach(function(checkbox)
 {
            checkbox.checked = false;
        });
        hideClearButton();
        console.log("Selections cleared");
    }

    selectBox.addEventListener("change", function() {
        showClearButton();
        console.log("Select box changed");
    });

    checkboxes.forEach(function(checkbox)
 {
        checkbox.addEventListener("change", function() {
            showClearButton();
            console.log("Checkbox changed");
        });
    });

    clearButton.addEventListener("click", function() {
        clearSelections();
        console.log("Clear button clicked");
    });
});



  </script>
  
  <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchBarMain = document.querySelector('.nI-gNb-sb__main');
            const searchBar = document.querySelector('.nI-gNb-search-bar');
            const backdrop = document.querySelector('.nI-gNb-backdrop');

            searchBarMain.addEventListener('click', function () {
                searchBarMain.classList.add('nI-gNb-sb__main--expand');
                searchBar.classList.add('nI-gNb-sb__main--expand-backgrpund');
                backdrop.classList.add('nI-gNb-backdrop--show');
            });

            backdrop.addEventListener('click', function () {
                searchBarMain.classList.remove('nI-gNb-sb__main--expand');
                searchBar.classList.remove('nI-gNb-sb__main--expand-backgrpund');
                backdrop.classList.remove('nI-gNb-backdrop--show');
            });
        });
    </script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/store.js/1.3.14/store.min.js"></script>




<script>
document.addEventListener("DOMContentLoaded", function() {
    var startX = 0;
    var startWidth = 0;
    var minWidth = 280;
    var maxWidth = 350;

    var sidebarr = document.getElementById('sidebarr');
    var pageBody = document.querySelector('.page-wrapper .page-body');
    var pageHeader = document.querySelector('.page-wrapper .page-header');

    var resizer = document.createElement('div');
    resizer.id = 'resizer';
    resizer.style.width = '10px';
    resizer.style.right = '0';
    resizer.style.top = '0';
    resizer.style.bottom = '0';
    resizer.style.cursor = 'col-resize';
    resizer.style.position = 'absolute';
    resizer.style.zIndex = '90';
    sidebarr.appendChild(resizer);

    // Function to find and style all spans within dropdown menus
    function styleDropdownSpans(newWidth) {
        var dropdownMenus = document.querySelectorAll('.page-wrapper.compact-wrapper .page-body-wrapper .Repo_dar_sidebar .navbar-nav li.dropdown');

        dropdownMenus.forEach(function(menu) {
            // Find spans within the current dropdown
            var spans = menu.querySelectorAll('span');
            spans.forEach(function(span) {
                styleSpan(span, newWidth);
            });

            // Find spans within nested dropdown menus
            var nestedMenus = menu.querySelectorAll('.dropdown-menu');
            nestedMenus.forEach(function(nestedMenu) {
                var nestedSpans = nestedMenu.querySelectorAll('span');
                nestedSpans.forEach(function(span) {
                    styleSpan(span, newWidth);
                });
            });
        });
    }

    // Helper function to style a single span
    function styleSpan(span, sidebarWidth) {
        var spanWidth = sidebarWidth - 120; // Adjust this based on your layout
        spanWidth = Math.max(180, Math.min(spanWidth, 260)); // Ensure span width stays within range of 180 to 260
        span.style.width = spanWidth + 'px';
        span.style.overflow = 'hidden';
        span.style.textOverflow = 'ellipsis';
        span.style.whiteSpace = 'nowrap';
    }

    resizer.addEventListener('mousedown', function(event) {
        startX = event.clientX;
        startWidth = sidebarr.offsetWidth;

        // Apply user-select: none; to prevent text selection
        document.body.style.userSelect = 'none';

        document.addEventListener('mousemove', resize);
        document.addEventListener('mouseup', stopResize);
    });

    function resize(event) {
        var newWidth = startWidth + (event.clientX - startX);
        if (newWidth > minWidth && newWidth < maxWidth) {
            sidebarr.style.width = newWidth + 'px';
            pageBody.style.marginLeft = newWidth + 'px';
            pageHeader.style.width = `calc(100% - ${newWidth}px)`;

            // Style all dropdown spans again with the new sidebar width
            styleDropdownSpans(newWidth);

            console.log('newWidth:', newWidth); // Debugging log
        }
    }

    function stopResize() {
        // Remove user-select: none; after resizing
        document.body.style.userSelect = '';

        document.removeEventListener('mousemove', resize);
        document.removeEventListener('mouseup', stopResize);
    }

    // Initial styling of dropdown spans with the initial sidebar width
    styleDropdownSpans(sidebarr.offsetWidth);
});
</script>
<script>
    $(document).ready(function() {
        // Function to check if all required fields are filled
        function areAllRequiredFieldsFilled(form) {
            let allFilled = true;

            form.find('[required]').each(function() {
                const $field = $(this);
                const type = $field.attr('type');

                if (type === 'text' || type === 'email' || type === 'number' || $field.is('textarea')) {
                    if ($field.val().trim() === '') {
                        allFilled = false;
                        return false; // Exit loop
                    }
                }

                if ($field.is('select')) {
                    if ($field.val() === null || $field.val() === '') {
                        allFilled = false;
                        return false; // Exit loop
                    }
                }
            });

            form.find('input[type="file"][required]').each(function() {
                if ($(this)[0].files.length === 0) {
                    allFilled = false;
                    return false; // Exit loop
                }
            });

            return allFilled;
        }

        // Function to update the state of the submit button
        function updateSubmitButtonState() {
            $('form').each(function() {
                const form = $(this);
                const submitButton = form.find('button[type="submit"], input[type="submit"]');
                if (areAllRequiredFieldsFilled(form)) {
                    submitButton.prop('disabled', false);
                } else {
                    submitButton.prop('disabled', true);
                }
            });
        }

        // Initial check to disable submit button
        updateSubmitButtonState();

        // Attach event listeners to form fields
        $('body').on('input change', 'form [required]', function() {
            updateSubmitButtonState();
        });

        $('body').on('change', 'form input[type="file"][required]', function() {
            updateSubmitButtonState();
        });

        // Prevent form submission if not all required fields are filled
        $('body').on('submit', 'form', function(e) {
            const form = $(this);
            if (!areAllRequiredFieldsFilled(form)) {
                e.preventDefault();
                toastr.error('Please fill out all required fields before submitting.'); // Display error toaster message
            } else {
                // Disable the submit button after form submission to prevent double submit
                const submitButton = form.find('button[type="submit"], input[type="submit"]');
                submitButton.prop('disabled', true);
            }
        });
    });
</script>

<script>
// Event delegation for sorting when clicking on any .table-striped thead th
$('body').on('click', '.table-striped thead th', function() {
    var table = $(this).closest('table'); // Get the current table
    var rows = table.find('tbody > tr').get();
    var index = $(this).index(); // Column index
    var isAsc = $(this).hasClass('asc'); // Check if already sorted ascending

    // Remove sorting classes from other headers in the current table
    table.find('th').removeClass('asc desc');

    // Add appropriate class for sorting direction
    if (isAsc) {
        $(this).removeClass('asc').addClass('desc');
    } else {
        $(this).removeClass('desc').addClass('asc');
    }

    // Sort rows based on the selected column and direction
    rows.sort(function(a, b) {
        var A = $(a).children('td').eq(index).text().toUpperCase();
        var B = $(b).children('td').eq(index).text().toUpperCase();
        if (isAsc) {
            return A < B ? 1 : -1; // Descending
        } else {
            return A > B ? 1 : -1; // Ascending
        }
    });

    // Append sorted rows back to the table
    $.each(rows, function(index, row) {
        table.children('tbody').append(row);
    });
});

</script>

<script>


// Function to check the conditions and toggle the 'only_all' class
function checkFolderConditions() {
    const hasFolderEmptyy = $('.folder-container .folder_emptyy').length && $('.file-container .folder_emptyy').length;
    const hasNestfile = $('.file-container .nestfile').length;

    if (hasFolderEmptyy && !hasNestfile) {
        $('.folder_comman_file').addClass('only_all');
    } else {
        $('.folder_comman_file').removeClass('only_all');
    }
}

// Initialize MutationObserver to watch for changes in the .file-container and .folder-container
const observer = new MutationObserver(function(mutationsList) {
    // Call the check function whenever a mutation occurs
    checkFolderConditions();
});

// Configuration for the observer (to watch child elements being added or removed)
const config = { childList: true, subtree: true };

// Start observing .file-container and .folder-container for changes
observer.observe(document.querySelector('.file-container'), config);
observer.observe(document.querySelector('.folder-container'), config);

// Initial check when the script first runs
checkFolderConditions();


</script>


@endsection
   
