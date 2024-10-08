@extends('user.includes.promoter-wallet') @section('content')
<!-- tap on top starts-->
<div class="tap-top">
  <i data-feather="chevrons-up"></i>
</div>
<!-- tap on tap ends-->
<!-- Loader starts-->
<div class="loader-wrapper">
  <div class="dot"></div>
  <div class="dot"></div>
  <div class="dot"></div>
  <div class="dot"></div>
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
          <i class="status_toggle middle sidebar-toggle" data-feather="grid"></i>
        </div>
        <div class="logo-header-main">
          <a href="#">Milliondox</a>
        </div>
      </div>
      <div class="left-header col horizontal-wrapper ps-0">
        <div class="left-menu-header">
          <h2> Vault </h2>
        </div>
      </div>
      <div class="nav-right col-1 pull-right right-header p-0">
               <!-- Header Right Icon Start-->
               @include('user/includes.header-details')
       <!-- Header Right Icon Start-->
      </div>
    </div>
  </div>
  <!-- Page Header Ends-->
  <!-- Page Body Start-->
  <div class="page-body-wrapper">
    <!-- Page Sidebar Start--> @include('user/includes.client-sidebar')
    <!-- Page Sidebar Ends-->
    <div class="page-body">
      <!-- greeting -->
      <div class="mlb-menu-header container-fluid" style="display:none;">
        <h2>Vault </h2>
      </div>
      <!-- Container-fluid start-->
      <!-- <div class="bredcrum"><div class="container-fluid"><div class="row"><div class="col-sm-12"></div></div></div></div> -->
      <!-- Container-fluid start-->
      <div class="container-fluid">
      @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
        <div class="row">
          <div class="col-sm-12">
            <div class="welcome-volt">
              <div class="welome_volt_text">
                <h2>Welcome to the Vault</h2>
                <p>Store all your sensitive data securely here</p>                
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Container-fluid start-->
      <!-- Container-fluid start-->
      <div class="container-fluid">
        <div class="row raw_valut">
          <div class="col-sm-12">
            <div class="your_wallet welome_wallet">
      
       

             

              <!-- third step start -->
              <div class="welcome_volt_round_third"  id="tbbbbb" style="display:block;">

              <div class="valut_enteries">
                <div class="hearder-entres">
                    <div class="volt_headd">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M15.9987 2.66675C12.3227 2.66675 9.33203 5.65741 9.33203 9.33341V13.3334H7.9987C7.29145 13.3334 6.61318 13.6144 6.11308 14.1145C5.61298 14.6146 5.33203 15.2928 5.33203 16.0001V26.6667C5.33203 27.374 5.61298 28.0523 6.11308 28.5524C6.61318 29.0525 7.29145 29.3334 7.9987 29.3334H23.9987C24.7059 29.3334 25.3842 29.0525 25.8843 28.5524C26.3844 28.0523 26.6654 27.374 26.6654 26.6667V16.0001C26.6654 15.2928 26.3844 14.6146 25.8843 14.1145C25.3842 13.6144 24.7059 13.3334 23.9987 13.3334H22.6654V9.33341C22.6654 5.65741 19.6747 2.66675 15.9987 2.66675ZM11.9987 9.33341C11.9987 7.12808 13.7934 5.33341 15.9987 5.33341C18.204 5.33341 19.9987 7.12808 19.9987 9.33341V13.3334H11.9987V9.33341ZM17.332 23.6307V26.6667H14.6654V23.6307C14.1992 23.3638 13.8249 22.9618 13.5918 22.4779C13.3587 21.9939 13.2777 21.4507 13.3596 20.9198C13.4415 20.3889 13.6823 19.8953 14.0504 19.504C14.4184 19.1127 14.8965 18.8422 15.4214 18.7281C15.8113 18.6419 16.2155 18.6443 16.6044 18.7351C16.9932 18.826 17.3567 19.0029 17.668 19.253C17.9793 19.503 18.2306 19.8197 18.4032 20.1798C18.5758 20.5399 18.6654 20.9341 18.6654 21.3334C18.6646 21.7997 18.5409 22.2576 18.3069 22.6609C18.0728 23.0643 17.7366 23.3988 17.332 23.6307Z" fill="#575757"/>
</svg>
<h2>Vault</h2>
</div>
<div class="search_nt">
<div class="svg_srch">
 <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 14.75L10.25 10.25M1.25 6.5C1.25 7.18944 1.3858 7.87213 1.64963 8.50909C1.91347 9.14605 2.30018 9.7248 2.78769 10.2123C3.2752 10.6998 3.85395 11.0865 4.49091 11.3504C5.12787 11.6142 5.81056 11.75 6.5 11.75C7.18944 11.75 7.87213 11.6142 8.50909 11.3504C9.14605 11.0865 9.7248 10.6998 10.2123 10.2123C10.6998 9.7248 11.0865 9.14605 11.3504 8.50909C11.6142 7.87213 11.75 7.18944 11.75 6.5C11.75 5.81056 11.6142 5.12787 11.3504 4.49091C11.0865 3.85395 10.6998 3.2752 10.2123 2.78769C9.7248 2.30018 9.14605 1.91347 8.50909 1.64963C7.87213 1.3858 7.18944 1.25 6.5 1.25C5.81056 1.25 5.12787 1.3858 4.49091 1.64963C3.85395 1.91347 3.2752 2.30018 2.78769 2.78769C2.30018 3.2752 1.91347 3.85395 1.64963 4.49091C1.3858 5.12787 1.25 5.81056 1.25 6.5Z" stroke="#BFBFBF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</div>
 <input type="search" class="" placeholder="Search for a template here" aria-controls="basic-1">
</div>
</div>

<div class="entery_body table-responsive">
@if($documents->isNotEmpty())
<table class="table table-striped" id="refreshtb">
<thead>
  <tr>
    <th>File name</th>
    
    <th>Last modified</th>

    <th>Action</th>

    <th>Shared</th>
  </tr>
  </thead>
  <tbody id="document-table-body">
  @foreach($documents as $document)
  <tr>
    <td>{{ $document->name }}</td>
  
    <td>{{ $document->created_at }}</td>
    <td>
  <a href="/documents/{{ $document->id }}/download"><span class="fa fa-download"></span></a>
                          </td>
                      </tr>
                      <td>
                      <button class="btn btn-primary share-btn" data-document-id="{{ $document->id }}">Share</button>
                      </td>
                  @endforeach         


      
     
    </tbody>
   

</table>
@else
<table class="table table-striped" id="refreshtb">
<thead>
  <tr>
    <th>File name</th>
    
    <th>Last modified</th>

    <th>Action</th>
    <th>Shared</th>
  </tr>
  </thead>
  <tbody id="document-table-body">
  @foreach($documents as $document)
  <tr>
    <td>{{ $document->name }}</td>
  
    <td>{{ $document->created_at }}</td>
    <td>
  <a href="/documents/{{ $document->id }}/download"><i class="fas fa-download"></i></a>
</td>
<td>
                      <button class="btn btn-primary share-btn" data-document-id="{{ $document->id }}">Share</button>
                      </td>
                      </tr>
                  @endforeach         


      
     
    </tbody>
   

</table>
@endif
<div class="comman_loderr" id="customLoader">
                            <div class="coverLoader">
                              <div class="custom-loader"></div>
                              </div>
                            </div>
                            <script>
    function showLoader() {
        document.getElementById('customLoader').style.display = 'block';
        // Set a timeout to hide the loader after 3 seconds
        setTimeout(function() {
            hideLoader();
        }, 3000);
    }

    function hideLoader() {
        document.getElementById('customLoader').style.display = 'none';
    }
</script>
<table class="table table-striped" id="hidetb" style="display: none;">
<thead class="dispnone">
  <tr>
  <th>File name</th>
    
    <th>Last modified</th>

    <th>Action</th>
  </tr>
  </thead>
<tbody id="document-table-bodys" >
  <tr class="new_data_show">
                  <form id="anotherForm" action="{{ route('submitDocu') }}" method="POST"  onsubmit="showLoader()" enctype="multipart/form-data">
      @csrf
    <td> <input type="file" name="anotherFile" id="anotherFile" class="form-control" required></td>
  
    <td> <input type="text" name="document_name" class="form-control" id="docu_name" placeholder="File Name" required></td>
    <td>
    <button type="submit" class="btn btn-primary"  id="hideform">Upload</button>
                          </td>
</form>
                      </tr>
  </tbody>
</table>
<div class="tabs_col_head">
    <button id="add_more">
    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.41797 7.58341H2.91797V6.41675H6.41797V2.91675H7.58464V6.41675H11.0846V7.58341H7.58464V11.0834H6.41797V7.58341Z" fill="#7E7E7E"></path>
</svg>Add
</button>
</div>

</div>
            </div>

              </div>
              <!-- third step end -->


            </div>
          </div>

        </div>
      </div>
      <div class="alert p-2 inpt_wrap">
@if (session('success'))
    <div class="alert alert-success" id="successMessage">
        {{ session('success') }}
    </div>
@endif


</div>
<script>
    $(document).ready(function() {
        // Function to hide success message after 2 seconds
        setTimeout(function() {
            $('#successMessage').fadeOut('slow', function() {
                $(this).remove();
            });
        }, 2000);

        
    });
</script>
      <!-- Container-fluid end-->
    </div>
  </div>
</div> 

<script>
    document.getElementById('hideform').addEventListener('click', function() {
        // Show the table body
        document.getElementById('hidetb').style.display = 'none';
    
    // Show the button with id 'add_more'
    document.getElementById('add_more').style.display = 'flex';
    });
</script>
<script>
  document.getElementById('add_more').addEventListener('click', function() {
    document.getElementById('add_more').style.display = 'none';
        // Show the table body
        document.getElementById('hidetb').style.display = 'table';
    
    // Show the button with id 'add_more'
   
    });
</script>
<style>
  .welcome_volt_round_third .tabs_col_head {
    justify-content: end;
    margin: 20px 0px 0px;
}

.welcome_volt_round_third .tabs_col_head #add_more {
    background: #E6EBF6;
    text-align: center;
    color: #7E7E7E;
    font-size: 15px;
    font-weight: 500;
    letter-spacing: -0.02em;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: auto;
    padding: 10px 20px;
    border: 0;
}

.welcome_volt_round_third .tabs_col_head #add_more svg {
    width: 20px;
    height: 20px;
    margin: 0px 5px 0px 0px;
}
.welcome_volt_round_third td a {
    font-size: 12px; 
    color: #000;
}
.dark-only .welcome_volt_round_third td a {
    color: #FFF;
}
thead.dispnone {
    display: none;
}
.alert{
    margin-top: 20px;
    text-align: center;
}
  </style>
  <script>
  $(document).ready(function() {
    // Function to fetch and update table data
    function refreshTableData() {
      $.ajax({
        url: '{{ route("fetchDocuments") }}', // Replace with your route for refreshing table data
        method: 'GET',
        success: function(response) {
          // Update the table body with the fetched data
          $('#document-table-body').html(response);
        }
      });
    }

    // Call refreshTableData function every half second
    setInterval(refreshTableData, 50000000);
  });
</script>
<script>
    const fileDropArea = document.getElementById("fileDropArea");
    const fileInput = document.getElementById("keyfile");
    const fileNameDisplay = document.getElementById("fileName");

    fileDropArea.addEventListener("dragover", function(event) {
        event.preventDefault();
        fileDropArea.classList.add("dragover");
    });

    fileDropArea.addEventListener("dragleave", function(event) {
        event.preventDefault();
        fileDropArea.classList.remove("dragover");
    });

    fileDropArea.addEventListener("drop", function(event) {
        event.preventDefault();
        fileDropArea.classList.remove("dragover");
        const file = event.dataTransfer.files[0];
        handleFile(file);
    });

    fileDropArea.addEventListener("click", function() {
        fileInput.click();
    });

    fileInput.addEventListener("change", function(event) {
        const file = event.target.files[0];
        handleFile(file);
    });

    function handleFile(file) {
        fileDropArea.style.border = "2px dashed lightgreen";
        fileNameDisplay.textContent = "Selected file: " + file.name;
    }
</script>

<style>
    .your_kkey {
        padding: 20px;
        border: 2px dashed #ccc;
        text-align: center;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .your_kkey.dragover {
        border: 2px dashed lightgreen;
    }
    div#fileName {
        text-align: center;
    }

    #keyfile {
        display: none;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />

@endsection