@extends('user.includes.trash') @section('content')
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
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
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
            <div class="logo-header-main"><a href="#">Milliondox</a></div>
        </div>
        <div class="left-header col horizontal-wrapper ps-0">
            <div class="left-menu-header">
           <h2>
           Trash
          </h2>
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
        <!-- Page Sidebar Start-->
        @include('user/includes.client-sidebar')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <!-- greeting -->
          <div class="mlb-menu-header container-fluid" style="display:none;">
           <h2>
           Trash
          </h2>
            </div>

             <!-- Container-fluid start-->
      <div class="container-fluid soop">
        <div class="row">
   

          <div class="col-md-12">
         
            <div class="Inc_table">
              <div class="row">
                <div class="col-sm-12 tba_history_rap">
                  <div class="filtr_tabble">
                    <div class="table_title">
                        <h2>Trash</h2>
</div>
                    <div class="entery_body table-responsive">

                    <div class="column-tabs">
                      

<div class="tabs">
  <button class="tab-link active" onclick="openTabbb('kyc')">Deleted</button>
  <button class="tab-link" onclick="openTabbb('dsc')">Restore Requests @if($totalCount == 0)<span ></span>@else<span id="totalCount">{{$totalCount}}</span>@endif</button>
</div>

<div id="tab-kyc" class="tab active">
    <div class="table_wrap_vtr">
<table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Serial no</th>
                            <th>File name</th>
                            <th>Deleted by</th>
                            <th>Date of deletion</th>
                            <th>Time of deletion</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($filess as $file)
                      <tr>
					  <td>{{$file->id}}</td>
					   <td>{{$file->file_name}}</td>
					    <td>{{$file->user_name}}</td>
						 <td>{{ \Carbon\Carbon::parse($file->updated_at)->format('Y-m-d') }}</td> 
                         <td>{{ \Carbon\Carbon::parse($file->updated_at)->format('H:i:s') }}</td> 
                           
					  </tr>  
					  @endforeach
                        </tbody>
                      </table>
                      </div>

</div>

<div id="tab-dsc" class="tab">

<div class="table_wrap_vtr filtr_tabble ">
<table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Serial no</th>
                            <th>File name</th>
                            <th>Deleted by</th>
                            <th>Date of deletion</th>
                            <th>Time of deletion</th>
							              <th></th>
                          </tr>
                        </thead>
                        <tbody>
                      <tr>
					   @foreach($files as $file)
                      <tr>
					  <td>{{$file->id}}</td>
					   <td>{{$file->file_name}}</td>
					    <td>{{$file->user_name}}</td>
						 <td>{{ \Carbon\Carbon::parse($file->updated_at)->format('Y-m-d') }}</td> 
                         <td>{{ \Carbon\Carbon::parse($file->updated_at)->format('H:i:s') }}</td> 
					  
              <td style="text-align:right;">
            <div class="dropdown">
              <button onclick="toggleDropdown()" class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                </svg>
              </button>
              <div id="myDropdown3" class="dropdown-content">
                  
<ul class="action">
    <!-- Delete form -->
     <li class="restore" id="restore-{{ $file->id }}">
        <form method="POST" action="{{ route('file.restore', ['id' => $file->id]) }}" class="restore-form">
            @csrf
            @method('PUT')
          
            
            <a class="dropdown-itemm restore-button" data-id="{{ $file->id }}">
                   Approve </a>
        </form>
    </li>
    <li class="delete" id="delete-{{ $file->id }}">
        <form method="POST" action="{{ route('file.deleteboardnotic', ['id' => $file->id]) }}" class="delete-form">
            @csrf
            @method('DELETE')
            
               <a class="delete-button dropdown-itemm" data-id="{{ $file->id }}">
                   Reject </a>
          
        </form>
    </li>
    <!-- Restore button -->
   
</ul>
              
                
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
              </div>
            </div> 
          </div>
        </div>
        <!-- Container-fluid start-->


        </div>
      </div>
    </div>

<style>
     .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 180px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        right: 0;
        border: 1px solid #CCD4E5;
        border-radius: 10px;
        padding: 10px;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
        display: block;
    }


    .dropdown-content a.dropdown-itemm {
        padding: 10px 10px;
        color: #707070;
        font-weight: 500;
        display: flex;
        align-items: center;
        letter-spacing: normal;
    }

    .dropdown-content a.dropdown-itemm svg {
        margin: 0px 7px 0px 0px;
        display: flex;
        width: 16px;
        height: 16px;
    }
    </style>
    
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Handle delete button click
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function () {
                const form = this.closest('.delete-form');
                const fileId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this record!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        // Handle restore button click
        document.querySelectorAll('.restore-button').forEach(button => {
            button.addEventListener('click', function () {
                const form = this.closest('.restore-form');
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
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonColor: '#3085d6'
            });
        @endif
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




    @endsection
   
