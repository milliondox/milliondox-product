@extends('user.includes.Registrations-Licences') @section('content')
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
          <h2> Registrations & Licenses </h2>
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
        <h2> Registrations & Licenses </h2>
      </div>
      <!-- new code start -->
      <!-- Container-fluid start-->
      <div class="container-fluid Inc_Doc">
        <div class="row">
          <div class="col-md-4 col-sm-4">
          <a href="{{url('/user/incorporationdocs')}}" class="redirect_nt">
            <div class="head_profile">
              <div class="left_profile">
                <div class="icon_ap_nt">
                  <div class="svg_round">
                  <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10 4.08337V2.08337C10 0.983374 9.1 0.083374 8 0.083374H2C0.9 0.083374 0 0.983374 0 2.08337V16.0834C0 17.1834 0.9 18.0834 2 18.0834H18C19.1 18.0834 20 17.1834 20 16.0834V6.08337C20 4.98337 19.1 4.08337 18 4.08337H10ZM8 16.0834H2V14.0834H8V16.0834ZM8 12.0834H2V10.0834H8V12.0834ZM8 8.08337H2V6.08337H8V8.08337ZM8 4.08337H2V2.08337H8V4.08337ZM18 16.0834H10V6.08337H18V16.0834ZM16 8.08337H12V10.0834H16V8.08337ZM16 12.0834H12V14.0834H16V12.0834Z" fill="white"/>
</svg>
                  </div>
                  <h3>1 <span>/ 9</span>
                  </h3>
                </div>
                <h2> Incorporation Documents </h2>
              </div>
              <div class="right_pro_icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M18.75 12.75L3.75 12.75C3.55109 12.75 3.36032 12.671 3.21967 12.5303C3.07902 12.3897 3 12.1989 3 12C3 11.8011 3.07902 11.6103 3.21967 11.4697C3.36032 11.329 3.55109 11.25 3.75 11.25L18.75 11.25C18.9489 11.25 19.1397 11.329 19.2803 11.4697C19.421 11.6103 19.5 11.8011 19.5 12C19.5 12.1989 19.421 12.3897 19.2803 12.5303C19.1397 12.671 18.9489 12.75 18.75 12.75Z" fill="#5790FF"></path>
                  <path d="M18.4382 12L12.2177 5.78103C12.0768 5.6402 11.9977 5.44919 11.9977 5.25003C11.9977 5.05087 12.0768 4.85986 12.2177 4.71903C12.3585 4.5782 12.5495 4.49908 12.7487 4.49908C12.9478 4.49908 13.1388 4.5782 13.2797 4.71903L20.0297 11.469C20.0995 11.5387 20.1549 11.6215 20.1927 11.7126C20.2305 11.8037 20.25 11.9014 20.25 12C20.25 12.0987 20.2305 12.1964 20.1927 12.2875C20.1549 12.3786 20.0995 12.4614 20.0297 12.531L13.2797 19.281C13.1388 19.4219 12.9478 19.501 12.7487 19.501C12.5495 19.501 12.3585 19.4219 12.2177 19.281C12.0768 19.1402 11.9977 18.9492 11.9977 18.75C11.9977 18.5509 12.0768 18.3599 12.2177 18.219L18.4382 12Z" fill="#5790FF"></path>
                </svg>                
              </div>
            </div>
</a>
          </div>
          <div class="col-md-4 col-sm-4">
          <a href="{{url('/user/registrationslicences')}}" class="redirect_nt">
            <div class="head_profile nt_profile">
              <div class="left_profile">
                <div class="icon_ap_nt">
                  <div class="svg_round">
                  <svg width="16" height="21" viewBox="0 0 16 21" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8 11C7.16667 11 6.45833 10.7083 5.875 10.125C5.29167 9.54167 5 8.83333 5 8C5 7.16667 5.29167 6.45833 5.875 5.875C6.45833 5.29167 7.16667 5 8 5C8.83333 5 9.54167 5.29167 10.125 5.875C10.7083 6.45833 11 7.16667 11 8C11 8.83333 10.7083 9.54167 10.125 10.125C9.54167 10.7083 8.83333 11 8 11ZM8 19L3.325 20.55C2.99167 20.6667 2.68733 20.625 2.412 20.425C2.13667 20.225 1.99933 19.9583 2 19.625V13.275C1.36667 12.575 0.875 11.775 0.525 10.875C0.175 9.975 0 9.01667 0 8C0 5.76667 0.775 3.875 2.325 2.325C3.875 0.775 5.76667 0 8 0C10.2333 0 12.125 0.775 13.675 2.325C15.225 3.875 16 5.76667 16 8C16 9.01667 15.825 9.975 15.475 10.875C15.125 11.775 14.6333 12.575 14 13.275V19.625C14 19.9583 13.8623 20.225 13.587 20.425C13.3117 20.625 13.0077 20.6667 12.675 20.55L8 19ZM8 14C9.66667 14 11.0833 13.4167 12.25 12.25C13.4167 11.0833 14 9.66667 14 8C14 6.33333 13.4167 4.91667 12.25 3.75C11.0833 2.58333 9.66667 2 8 2C6.33333 2 4.91667 2.58333 3.75 3.75C2.58333 4.91667 2 6.33333 2 8C2 9.66667 2.58333 11.0833 3.75 12.25C4.91667 13.4167 6.33333 14 8 14ZM4 18.025L8 17L12 18.025V14.925C11.4167 15.2583 10.7873 15.521 10.112 15.713C9.43667 15.905 8.73267 16.0007 8 16C7.26667 16 6.56233 15.904 5.887 15.712C5.21167 15.52 4.58267 15.258 4 14.926V18.025Z" fill="#5790FF"/>
</svg>
                  </div>
                  <h3>6 <span>/ 12</span>
                  </h3>
                </div>
                <h2> Registrations & Licenses </h2>
              </div>
              <div class="right_pro_icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M18.75 12.75L3.75 12.75C3.55109 12.75 3.36032 12.671 3.21967 12.5303C3.07902 12.3897 3 12.1989 3 12C3 11.8011 3.07902 11.6103 3.21967 11.4697C3.36032 11.329 3.55109 11.25 3.75 11.25L18.75 11.25C18.9489 11.25 19.1397 11.329 19.2803 11.4697C19.421 11.6103 19.5 11.8011 19.5 12C19.5 12.1989 19.421 12.3897 19.2803 12.5303C19.1397 12.671 18.9489 12.75 18.75 12.75Z" fill="white" />
                  <path d="M18.4382 12L12.2177 5.78103C12.0768 5.6402 11.9977 5.44919 11.9977 5.25003C11.9977 5.05087 12.0768 4.85986 12.2177 4.71903C12.3585 4.5782 12.5495 4.49908 12.7487 4.49908C12.9478 4.49908 13.1388 4.5782 13.2797 4.71903L20.0297 11.469C20.0995 11.5387 20.1549 11.6215 20.1927 11.7126C20.2305 11.8037 20.25 11.9014 20.25 12C20.25 12.0987 20.2305 12.1964 20.1927 12.2875C20.1549 12.3786 20.0995 12.4614 20.0297 12.531L13.2797 19.281C13.1388 19.4219 12.9478 19.501 12.7487 19.501C12.5495 19.501 12.3585 19.4219 12.2177 19.281C12.0768 19.1402 11.9977 18.9492 11.9977 18.75C11.9977 18.5509 12.0768 18.3599 12.2177 18.219L18.4382 12Z" fill="white" />
                </svg>
              </div>
            </div>
</a>
          </div>
          <div class="col-md-4 col-sm-4">
          <a href="{{url('/user/MiscellaneousDocuments')}}" class="redirect_nt">
            <div class="head_profile">
              <div class="left_profile">
                <div class="icon_ap_nt">
                  <div class="svg_round">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M14.9954 13.7501L16.4987 19.2501H5.4987L7.00203 13.7501H14.9954ZM16.4987 11.9167H5.4987L3.66536 19.2501C3.704 19.7234 3.90956 20.1676 4.24537 20.5034C4.58117 20.8392 5.02537 21.0448 5.4987 21.0834H16.4987C16.9738 21.0497 17.4208 20.8458 17.7576 20.509C18.0944 20.1722 18.2984 19.7252 18.332 19.2501L16.4987 11.9167ZM20.1654 9.16675H1.83203V11.0001H20.1654V9.16675ZM9.16536 7.33341C9.40848 7.33341 9.64164 7.42999 9.81355 7.6019C9.98545 7.77381 10.082 8.00697 10.082 8.25008H11.9154C11.9154 8.00697 12.0119 7.77381 12.1839 7.6019C12.3558 7.42999 12.5889 7.33341 12.832 7.33341C13.0751 7.33341 13.3083 7.42999 13.4802 7.6019C13.6521 7.77381 13.7487 8.00697 13.7487 8.25008H15.582C15.4434 7.64763 15.1868 7.0786 14.8271 6.57578C14.4675 6.07296 14.0119 5.6463 13.4865 5.32041C13.6689 4.73645 13.7574 4.12722 13.7487 3.5155C13.7487 2.08091 13.338 0.916748 12.832 0.916748C12.326 0.916748 11.9154 2.08091 11.9154 3.5155C11.9139 3.91542 11.9492 4.31463 12.0208 4.70808C11.3483 4.54108 10.6452 4.5414 9.97295 4.709C10.046 4.31537 10.0825 3.91584 10.082 3.5155C10.082 2.08091 9.67136 0.916748 9.16536 0.916748C8.65936 0.916748 8.2487 2.08091 8.2487 3.5155C8.239 4.12768 8.32656 4.73752 8.50811 5.32225C7.98349 5.6482 7.5285 6.07469 7.16934 6.57716C6.81018 7.07964 6.55394 7.64819 6.41536 8.25008H8.2487C8.2487 8.00697 8.34528 7.77381 8.51718 7.6019C8.68909 7.42999 8.92225 7.33341 9.16536 7.33341Z" fill="white" />
                    </svg>
                  </div>
                  <h3>2 <span>/ 2</span>
                  </h3>
                </div>
                <h2> Miscellaneous Documents </h2>
              </div>
              <div class="right_pro_icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M18.75 12.75L3.75 12.75C3.55109 12.75 3.36032 12.671 3.21967 12.5303C3.07902 12.3897 3 12.1989 3 12C3 11.8011 3.07902 11.6103 3.21967 11.4697C3.36032 11.329 3.55109 11.25 3.75 11.25L18.75 11.25C18.9489 11.25 19.1397 11.329 19.2803 11.4697C19.421 11.6103 19.5 11.8011 19.5 12C19.5 12.1989 19.421 12.3897 19.2803 12.5303C19.1397 12.671 18.9489 12.75 18.75 12.75Z" fill="#5790FF" />
                  <path d="M18.4382 12L12.2177 5.78103C12.0768 5.6402 11.9977 5.44919 11.9977 5.25003C11.9977 5.05087 12.0768 4.85986 12.2177 4.71903C12.3585 4.5782 12.5495 4.49908 12.7487 4.49908C12.9478 4.49908 13.1388 4.5782 13.2797 4.71903L20.0297 11.469C20.0995 11.5387 20.1549 11.6215 20.1927 11.7126C20.2305 11.8037 20.25 11.9014 20.25 12C20.25 12.0987 20.2305 12.1964 20.1927 12.2875C20.1549 12.3786 20.0995 12.4614 20.0297 12.531L13.2797 19.281C13.1388 19.4219 12.9478 19.501 12.7487 19.501C12.5495 19.501 12.3585 19.4219 12.2177 19.281C12.0768 19.1402 11.9977 18.9492 11.9977 18.75C11.9977 18.5509 12.0768 18.3599 12.2177 18.219L18.4382 12Z" fill="#5790FF" />
                </svg>
              </div>
            </div>
</a>
          </div>
        </div>
      </div>
      <!-- Container-fluid end-->
      
     <!-- Container-fluid start-->
     <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
         
            <div class="Inc_table">
              <div class="row">
                <div class="col-sm-12 tba_history_rap">
                  <div class="filtr_tabble">
                    <div class="hearder-entres">
                      <div class="volt_headd-filter">
                        <button>
                          <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.59282 11.625H4.5V5.94909L0.5625 1.26159V0.375H11.25V1.25653L7.5 5.94403V9.71782L5.59282 11.625ZM5.25 10.875H5.28218L6.75 9.40718V5.68097L10.3948 1.125H1.42734L5.25 5.67591V10.875Z" fill="#868686" />
                          </svg> Apply Filter </button>
                      </div>
                      <div class="sadd_filds">
                      <button  class="hvr-rotate" id="addCustomDocButton">+ Add Custom Doc</button>
                      </div>
                    </div>
                    <div class="entery_body table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th></th>
                            <th>File name</th>
                            <th>Type</th>
                            <th>Size</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>



                        @if ($files->isEmpty())             
                  
    <tr class="" >
                          
                          <td>
                            <div class="finish">
                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_511_3356)">
                                  <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                                </g>
                                <defs>
                                  <clipPath id="clip0_511_3356">
                                    <rect width="15" height="15" fill="white" />
                                  </clipPath>
                                </defs>
                              </svg>
                            </div>
                            <div class="unfinish">
                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                                <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                              </svg>
                            </div>
                          </td>
                          <td>MSME (Micro Small Medium Enterprise)</td>
                          <td>
                           
                            <button class="btn btn-primary" style="border-radius:5px;" data-bs-toggle="modal" data-bs-target="#ArticleofAssociation">
                              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.25 12V5.8875L6.3 7.8375L5.25 6.75L9 3L12.75 6.75L11.7 7.8375L9.75 5.8875V12H8.25ZM4.5 15C4.0875 15 3.7345 14.8533 3.441 14.5597C3.1475 14.2662 3.0005 13.913 3 13.5V11.25H4.5V13.5H13.5V11.25H15V13.5C15 13.9125 14.8533 14.2657 14.5597 14.5597C14.2662 14.8538 13.913 15.0005 13.5 15H4.5Z" fill="#7E7E7E" />
                              </svg> Upload </button>
                            <div class="modal fade" id="ArticleofAssociation" tabindex="-1" role="dialog" aria-labelledby="ArticleofAssociation" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" style="font-weight:700"></h5>
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
                                    <h3>MSME (Micro Small Medium Enterprise)</h3>


                                    <form action="{{ route('reguploadss') }}" method="POST" enctype="multipart/form-data" class="upload-form"> 
                                      @csrf
                                                                          
                                    <div class="file-area">      
                                    <input type="file" class="dragfile" id="aoa-file" name="file" accept=".pdf,.doc,.docx" required>    
                          <input type="hidden" id="real_file_name" name="real_file_name" value="MSME (Micro Small Medium Enterprise)">
                          <input type="hidden" id="file_status" name="file_status" value="0">
  <div class="file-dummy">
    <div class="success">Great, your files are selected. Keep on.</div>
    <div class="default">
    <span class="upload_icon">
                          <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88"><title>file-upload</title><path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z"/></svg>
                          </span>  
                          Drag and Drop files here or <span class="fille">Choose File</span>
  </div>
  </div>
  <br><div class="selected-file"></div>
</div> 
                          <span class="basic-file">Note:- file|mimes:pdf,doc,docx|max size:2048kb</span>                             
                          <button class="btn btn-primary"  style="border-radius:5px;" type="submit">Upload</button>

                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                          </td>
                         
                          <td> </td>
                          <td>
                            
                          </td>

                        </tr>

           
                      
   

   


                        @else
                        @foreach($files as $file)
   
    <tr class="active">

                <td>
                    <div class="finish">
                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_511_3356)">
                                <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                            </g>
                            <defs>
                                <clipPath id="clip0_511_3356">
                                    <rect width="15" height="15" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div class="unfinish">
                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                            <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                        </svg>
                    </div>
                </td>
               <td>
             
                            {{$file->real_file_name}}
                        
</td>
                <td>
                   
                    
                        {{$file->file_type}}
                   
                   
                </td>
                @php
                $fileSizeKB = round($file->file_size / 1024, 2) ; // Convert bytes to KB and round to 2 decimal places
            @endphp
                            <td>{{$fileSizeKB }} KB </td>

                            <td>
                            <div class="dropdown" >
                              <button onclick="toggleDropdown()" class="dropbtn show_pp">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D" />
                                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D" />
                                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D" />
                                </svg>
                              </button>
                              <div id="myDropdown" class="dropdown-content"> <div class="down_del">
                                  <a class=" dropdown-itemm dnlod_nt" href="{{ route('download-reg-file', ['id' => $file->id]) }}">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M2.40625 12.25C2.00014 12.25 1.61066 12.0887 1.32349 11.8015C1.03633 11.5143 0.875 11.1249 0.875 10.7188V8.53125C0.875 8.3572 0.94414 8.19028 1.06721 8.06721C1.19028 7.94414 1.3572 7.875 1.53125 7.875C1.7053 7.875 1.87222 7.94414 1.99529 8.06721C2.11836 8.19028 2.1875 8.3572 2.1875 8.53125V10.7188C2.1875 10.8395 2.2855 10.9375 2.40625 10.9375H11.5938C11.6518 10.9375 11.7074 10.9145 11.7484 10.8734C11.7895 10.8324 11.8125 10.7768 11.8125 10.7188V8.53125C11.8125 8.3572 11.8816 8.19028 12.0047 8.06721C12.1278 7.94414 12.2947 7.875 12.4688 7.875C12.6428 7.875 12.8097 7.94414 12.9328 8.06721C13.0559 8.19028 13.125 8.3572 13.125 8.53125V10.7188C13.125 11.1249 12.9637 11.5143 12.6765 11.8015C12.3893 12.0887 11.9999 12.25 11.5938 12.25H2.40625Z" fill="white" />
                                      <path d="M6.34334 6.72788V1.75C6.34334 1.57595 6.41248 1.40903 6.53555 1.28596C6.65862 1.16289 6.82554 1.09375 6.99959 1.09375C7.17364 1.09375 7.34056 1.16289 7.46363 1.28596C7.5867 1.40903 7.65584 1.57595 7.65584 1.75V6.72788L9.37959 5.005C9.44049 4.9441 9.51279 4.89579 9.59236 4.86283C9.67193 4.82987 9.75722 4.81291 9.84334 4.81291C9.92947 4.81291 10.0148 4.82987 10.0943 4.86283C10.1739 4.89579 10.2462 4.9441 10.3071 5.005C10.368 5.0659 10.4163 5.1382 10.4493 5.21777C10.4822 5.29734 10.4992 5.38262 10.4992 5.46875C10.4992 5.55488 10.4822 5.64016 10.4493 5.71973C10.4163 5.7993 10.368 5.8716 10.3071 5.9325L7.46334 8.77625C7.40247 8.83721 7.33018 8.88556 7.25061 8.91856C7.17103 8.95155 7.08574 8.96853 6.99959 8.96853C6.91345 8.96853 6.82815 8.95155 6.74857 8.91856C6.669 8.88556 6.59671 8.83721 6.53584 8.77625L3.69209 5.9325C3.63119 5.8716 3.58288 5.7993 3.54992 5.71973C3.51696 5.64016 3.5 5.55488 3.5 5.46875C3.5 5.38262 3.51696 5.29734 3.54992 5.21777C3.58288 5.1382 3.63119 5.0659 3.69209 5.005C3.75299 4.9441 3.82529 4.89579 3.90486 4.86283C3.98443 4.82987 4.06972 4.81291 4.15584 4.81291C4.24197 4.81291 4.32725 4.82987 4.40682 4.86283C4.48639 4.89579 4.55869 4.9441 4.61959 5.005L6.34334 6.72788Z" fill="white" />
                                    </svg> Download </a>
                                  <a class="dropdown-itemm delet_nt" id="delete-{{ $file->id }}">
                                  <form method="POST" action="{{ route('filereg.delete', ['id' => $file->id]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            
                                                            <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?')">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A" />
                                    </svg> Delete
                                                            </button>
                                                        </form>
                                                       
                                                 </a>
                                </div>
                                <a class="dropdown-itemm rename_nt" data-bs-toggle="modal" data-bs-target="#edit_histry_1">
                                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.75 9.33323L6.41667 11.6666H12.25V9.33323H8.75ZM7.035 4.19406L1.75 9.47906V11.6666H3.9375L9.2225 6.38156L7.035 4.19406ZM10.9142 4.6899C11.1417 4.4624 11.1417 4.08323 10.9142 3.8674L9.54917 2.5024C9.4398 2.39389 9.29198 2.33301 9.13792 2.33301C8.98385 2.33301 8.83604 2.39389 8.72667 2.5024L7.65917 3.5699L9.84667 5.7574L10.9142 4.6899Z" fill="#8D8D8D" />
                                  </svg> Edit </a>
                                <a class="dropdown-itemm history_nt history_click_1">
                                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 5.3335V8.00016L9.66667 9.66683" stroke="#8D8D8D" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M2.89231 4.58076L2.39231 4.58276C2.39283 4.71456 2.44538 4.84082 2.53851 4.93408C2.63165 5.02734 2.75784 5.08005 2.88964 5.08076L2.89231 4.58076ZM4.58698 5.08876C4.65264 5.08906 4.71771 5.07643 4.77849 5.05159C4.83927 5.02674 4.89457 4.99017 4.94121 4.94396C4.98786 4.89775 5.02495 4.8428 5.05036 4.78225C5.07577 4.72171 5.089 4.65675 5.08931 4.59109C5.08962 4.52543 5.07699 4.46035 5.05214 4.39957C5.0273 4.33879 4.99072 4.2835 4.94451 4.23685C4.8983 4.19021 4.84335 4.15312 4.78281 4.12771C4.72226 4.1023 4.6573 4.08906 4.59164 4.08876L4.58698 5.08876ZM3.38364 2.88076C3.38329 2.81509 3.37001 2.75015 3.34456 2.68962C3.31911 2.62909 3.28199 2.57416 3.23531 2.52798C3.18863 2.4818 3.13332 2.44527 3.07252 2.42046C3.01172 2.39566 2.94664 2.38307 2.88098 2.38342C2.81531 2.38377 2.75037 2.39705 2.68984 2.4225C2.62931 2.44795 2.57438 2.48508 2.5282 2.53175C2.48202 2.57843 2.44549 2.63375 2.42068 2.69454C2.39588 2.75534 2.38329 2.82043 2.38364 2.88609L3.38364 2.88076ZM2.55164 7.19009C2.56122 7.12474 2.55776 7.05814 2.54146 6.99414C2.52516 6.93014 2.49634 6.87 2.45666 6.8172C2.41699 6.7644 2.36724 6.71998 2.31031 6.68651C2.25337 6.65305 2.19037 6.63119 2.12493 6.62221C2.0595 6.61322 1.99294 6.61729 1.92909 6.63418C1.86524 6.65107 1.80537 6.68044 1.75293 6.72059C1.70049 6.76075 1.65653 6.8109 1.62359 6.86814C1.59064 6.92538 1.56936 6.98858 1.56098 7.05409L2.55164 7.19009ZM12.575 3.42542C10.0283 0.878756 5.91298 0.852089 3.38298 3.38276L4.08964 4.08942C6.22298 1.95676 9.70498 1.96942 11.8683 4.13209L12.575 3.42542ZM3.42564 12.5748C5.97231 15.1214 10.0876 15.1481 12.6176 12.6174L11.911 11.9108C9.77764 14.0434 6.29564 14.0308 4.13231 11.8681L3.42564 12.5748ZM12.6176 12.6174C15.1476 10.0874 15.1216 5.97209 12.575 3.42542L11.8683 4.13209C14.031 6.29542 14.0436 9.77742 11.911 11.9108L12.6176 12.6174ZM3.38298 3.38276L2.53831 4.22676L3.24564 4.93342L4.08964 4.08942L3.38298 3.38276ZM2.88964 5.08076L4.58698 5.08876L4.59164 4.08876L2.89498 4.08076L2.88964 5.08076ZM3.39231 4.57809L3.38364 2.88076L2.38364 2.88609L2.39231 4.58276L3.39231 4.57809ZM1.56031 7.05342C1.42334 8.05514 1.52043 9.07498 1.84396 10.0329C2.1675 10.9907 2.70866 11.8606 3.42498 12.5741L4.13164 11.8674C3.52446 11.2629 3.06571 10.5259 2.79145 9.71422C2.51718 8.90253 2.43487 8.03829 2.55098 7.18942L1.56031 7.05342Z" fill="#8D8D8D" />
                                  </svg> View History </a>
                              </div>
                            </div>
                          </td>

            </tr>
<!-- model start -->
<div class="modal fade" id="edit_histry_1" tabindex="-1" role="dialog" aria-labelledby="edit_histry_1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" style="font-weight:700">Edit Doc</h5>

                                                <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
            <span aria-hidden="true"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"/>
<rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"/>
</svg>
</span>
          </button>
                                            </div>
                                            <div class="modal-body ediit_nnt">
                                            <h3>Edit Doc</h3>
                                            <form action="{{ route('regupdateFileName') }}" method="POST" enctype="multipart/form-data" class="upload-form"> 
                                      @csrf
                                      <input type="hidden" name="record_id" value="{{ $file->id }}">
                                              <div class="form-grouup">
<label for="fname">File  name:</label>
<input type="text" id="file_name" name="file_name" value="{{$file->file_name}}">
</div>
<div class="form-grouup">
<label for="lname">Doc File:</label>
<input type="file" id="aoa-file" name="file" accept=".pdf,.doc,.docx" >
<!-- <a class="download_nt" href="{{ asset('/' . $file->file_path) }}" download>Download Now</a> -->
</div>
<div class="form-grouup">
<label for="lname">Reason for Change :</label>
<input type="textarea" id="reasons_for_change" name="reasons_for_change" value="{{$file->reasons_for_change}}" accept=".pdf,.doc,.docx" required>
</div>
<div class="form-grouup">
<button type="submit" value="Submit">Submit</button>
</div>
</form>
                                            </div>
                                        </div>
                                    </div>
                             </div>

                         
     
@endforeach

@endif

    
    
@if ($chardoc->isEmpty())             
                  
<tr class="">
                            <td>
                              <div class="finish">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <g clip-path="url(#clip0_511_3356)">
                                    <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                                  </g>
                                  <defs>
                                    <clipPath id="clip0_511_3356">
                                      <rect width="15" height="15" fill="white" />
                                    </clipPath>
                                  </defs>
                                </svg>
                              </div>
                              <div class="unfinish">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                                  <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                                </svg>
                              </div>
                            </td>
                            <td>GST (Goods and Service Tax)</td>
                            <td>
                              <button class="btn btn-primary" style="border-radius:5px;" data-bs-toggle="modal" data-bs-target="#CharteredDoc">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M8.25 12V5.8875L6.3 7.8375L5.25 6.75L9 3L12.75 6.75L11.7 7.8375L9.75 5.8875V12H8.25ZM4.5 15C4.0875 15 3.7345 14.8533 3.441 14.5597C3.1475 14.2662 3.0005 13.913 3 13.5V11.25H4.5V13.5H13.5V11.25H15V13.5C15 13.9125 14.8533 14.2657 14.5597 14.5597C14.2662 14.8538 13.913 15.0005 13.5 15H4.5Z" fill="#7E7E7E" />
                                </svg> Upload </button>
                              <div class="modal fade" id="CharteredDoc" tabindex="-1" role="dialog" aria-labelledby="CharteredDoc" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" style="font-weight:700"></h5>
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
                                      <h3>GST (Goods and Service Tax)</h3>
                                      <form action="{{ route('regchartereddoc') }}"" method="POST" enctype="multipart/form-data" class="upload-form"> @csrf 
                                      <div class="file-area">
                                          <input type="file" id="chartered-doc-file" class="dragfile" name="file" accept=".pdf,.doc,.docx" required>
                                          <input type="hidden" id="real_file_name" name="real_file_name" value="GST (Goods and Service Tax)">
                                          <input type="hidden" id="file_status" name="file_status" value="0">
                                          <div class="file-dummy">
                                            <div class="success">Great, your files are selected. Keep on.</div>
                                            <div class="default">
                                              <span class="upload_icon">
                                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88">
                                                  <title>file-upload</title>
                                                  <path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z" />
                                                </svg>
                                              </span> Drag and Drop files here or <span class="fille">Choose File</span>
                                            </div>
                                          </div>
                                          <br><div class="selected-file"></div>
                                        </div>
                                        <span class="basic-file">Note:- file|mimes:pdf,doc,docx|max size:2048kb</span>
                                        <button class="btn btn-primary" style="border-radius:5px;" type="submit">Upload</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td></td>
                            <td>
                             
                            </td>
                          </tr>
              
                         
                                    
                 
              
                 
              
              
                                      @else
                  <!-- If records exist in the collection -->
                  @foreach($chardoc as $filess)
                  
                  <tr class="active">

<td>
    <div class="finish">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_511_3356)">
                <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
            </g>
            <defs>
                <clipPath id="clip0_511_3356">
                    <rect width="15" height="15" fill="white" />
                </clipPath>
            </defs>
        </svg>
    </div>
    <div class="unfinish">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
            <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
        </svg>
    </div>
</td>
<td>

            {{$filess->real_file_name}}
        
</td>
<td>
   
    
        {{$filess->file_type}}
   
   
</td>
@php
$fileSizeKB = round($filess->file_size / 1024, 2) ; // Convert bytes to KB and round to 2 decimal places
@endphp
            <td>{{$fileSizeKB }} KB </td>

            <td>
            <div class="dropdown" >
              <button onclick="toggleDropdown()" class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D" />
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D" />
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D" />
                </svg>
              </button>
              <div id="myDropdown" class="dropdown-content"> <div class="down_del">
                  <a class=" dropdown-itemm dnlod_nt"href="{{ route('download-reg1-file', ['id' => $filess->id]) }}">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M2.40625 12.25C2.00014 12.25 1.61066 12.0887 1.32349 11.8015C1.03633 11.5143 0.875 11.1249 0.875 10.7188V8.53125C0.875 8.3572 0.94414 8.19028 1.06721 8.06721C1.19028 7.94414 1.3572 7.875 1.53125 7.875C1.7053 7.875 1.87222 7.94414 1.99529 8.06721C2.11836 8.19028 2.1875 8.3572 2.1875 8.53125V10.7188C2.1875 10.8395 2.2855 10.9375 2.40625 10.9375H11.5938C11.6518 10.9375 11.7074 10.9145 11.7484 10.8734C11.7895 10.8324 11.8125 10.7768 11.8125 10.7188V8.53125C11.8125 8.3572 11.8816 8.19028 12.0047 8.06721C12.1278 7.94414 12.2947 7.875 12.4688 7.875C12.6428 7.875 12.8097 7.94414 12.9328 8.06721C13.0559 8.19028 13.125 8.3572 13.125 8.53125V10.7188C13.125 11.1249 12.9637 11.5143 12.6765 11.8015C12.3893 12.0887 11.9999 12.25 11.5938 12.25H2.40625Z" fill="white" />
                      <path d="M6.34334 6.72788V1.75C6.34334 1.57595 6.41248 1.40903 6.53555 1.28596C6.65862 1.16289 6.82554 1.09375 6.99959 1.09375C7.17364 1.09375 7.34056 1.16289 7.46363 1.28596C7.5867 1.40903 7.65584 1.57595 7.65584 1.75V6.72788L9.37959 5.005C9.44049 4.9441 9.51279 4.89579 9.59236 4.86283C9.67193 4.82987 9.75722 4.81291 9.84334 4.81291C9.92947 4.81291 10.0148 4.82987 10.0943 4.86283C10.1739 4.89579 10.2462 4.9441 10.3071 5.005C10.368 5.0659 10.4163 5.1382 10.4493 5.21777C10.4822 5.29734 10.4992 5.38262 10.4992 5.46875C10.4992 5.55488 10.4822 5.64016 10.4493 5.71973C10.4163 5.7993 10.368 5.8716 10.3071 5.9325L7.46334 8.77625C7.40247 8.83721 7.33018 8.88556 7.25061 8.91856C7.17103 8.95155 7.08574 8.96853 6.99959 8.96853C6.91345 8.96853 6.82815 8.95155 6.74857 8.91856C6.669 8.88556 6.59671 8.83721 6.53584 8.77625L3.69209 5.9325C3.63119 5.8716 3.58288 5.7993 3.54992 5.71973C3.51696 5.64016 3.5 5.55488 3.5 5.46875C3.5 5.38262 3.51696 5.29734 3.54992 5.21777C3.58288 5.1382 3.63119 5.0659 3.69209 5.005C3.75299 4.9441 3.82529 4.89579 3.90486 4.86283C3.98443 4.82987 4.06972 4.81291 4.15584 4.81291C4.24197 4.81291 4.32725 4.82987 4.40682 4.86283C4.48639 4.89579 4.55869 4.9441 4.61959 5.005L6.34334 6.72788Z" fill="white" />
                    </svg> Download </a>
                  <a class="dropdown-itemm delet_nt" id="delete-{{ $filess->id }}">
                  <form method="POST" action="{{ route('file1reg.delete', ['id' => $filess->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?')">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A" />
                                    </svg> Delete
                                                            </button>
                                                        </form>
                                                       
                                                 </a>
                    
                   
                </div>
                <a class="dropdown-itemm rename_nt" data-bs-toggle="modal" data-bs-target="#edit_histry_2">
                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.75 9.33323L6.41667 11.6666H12.25V9.33323H8.75ZM7.035 4.19406L1.75 9.47906V11.6666H3.9375L9.2225 6.38156L7.035 4.19406ZM10.9142 4.6899C11.1417 4.4624 11.1417 4.08323 10.9142 3.8674L9.54917 2.5024C9.4398 2.39389 9.29198 2.33301 9.13792 2.33301C8.98385 2.33301 8.83604 2.39389 8.72667 2.5024L7.65917 3.5699L9.84667 5.7574L10.9142 4.6899Z" fill="#8D8D8D" />
                  </svg> Edit </a>
                <a class="dropdown-itemm mainh1">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 5.3335V8.00016L9.66667 9.66683" stroke="#8D8D8D" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M2.89231 4.58076L2.39231 4.58276C2.39283 4.71456 2.44538 4.84082 2.53851 4.93408C2.63165 5.02734 2.75784 5.08005 2.88964 5.08076L2.89231 4.58076ZM4.58698 5.08876C4.65264 5.08906 4.71771 5.07643 4.77849 5.05159C4.83927 5.02674 4.89457 4.99017 4.94121 4.94396C4.98786 4.89775 5.02495 4.8428 5.05036 4.78225C5.07577 4.72171 5.089 4.65675 5.08931 4.59109C5.08962 4.52543 5.07699 4.46035 5.05214 4.39957C5.0273 4.33879 4.99072 4.2835 4.94451 4.23685C4.8983 4.19021 4.84335 4.15312 4.78281 4.12771C4.72226 4.1023 4.6573 4.08906 4.59164 4.08876L4.58698 5.08876ZM3.38364 2.88076C3.38329 2.81509 3.37001 2.75015 3.34456 2.68962C3.31911 2.62909 3.28199 2.57416 3.23531 2.52798C3.18863 2.4818 3.13332 2.44527 3.07252 2.42046C3.01172 2.39566 2.94664 2.38307 2.88098 2.38342C2.81531 2.38377 2.75037 2.39705 2.68984 2.4225C2.62931 2.44795 2.57438 2.48508 2.5282 2.53175C2.48202 2.57843 2.44549 2.63375 2.42068 2.69454C2.39588 2.75534 2.38329 2.82043 2.38364 2.88609L3.38364 2.88076ZM2.55164 7.19009C2.56122 7.12474 2.55776 7.05814 2.54146 6.99414C2.52516 6.93014 2.49634 6.87 2.45666 6.8172C2.41699 6.7644 2.36724 6.71998 2.31031 6.68651C2.25337 6.65305 2.19037 6.63119 2.12493 6.62221C2.0595 6.61322 1.99294 6.61729 1.92909 6.63418C1.86524 6.65107 1.80537 6.68044 1.75293 6.72059C1.70049 6.76075 1.65653 6.8109 1.62359 6.86814C1.59064 6.92538 1.56936 6.98858 1.56098 7.05409L2.55164 7.19009ZM12.575 3.42542C10.0283 0.878756 5.91298 0.852089 3.38298 3.38276L4.08964 4.08942C6.22298 1.95676 9.70498 1.96942 11.8683 4.13209L12.575 3.42542ZM3.42564 12.5748C5.97231 15.1214 10.0876 15.1481 12.6176 12.6174L11.911 11.9108C9.77764 14.0434 6.29564 14.0308 4.13231 11.8681L3.42564 12.5748ZM12.6176 12.6174C15.1476 10.0874 15.1216 5.97209 12.575 3.42542L11.8683 4.13209C14.031 6.29542 14.0436 9.77742 11.911 11.9108L12.6176 12.6174ZM3.38298 3.38276L2.53831 4.22676L3.24564 4.93342L4.08964 4.08942L3.38298 3.38276ZM2.88964 5.08076L4.58698 5.08876L4.59164 4.08876L2.89498 4.08076L2.88964 5.08076ZM3.39231 4.57809L3.38364 2.88076L2.38364 2.88609L2.39231 4.58276L3.39231 4.57809ZM1.56031 7.05342C1.42334 8.05514 1.52043 9.07498 1.84396 10.0329C2.1675 10.9907 2.70866 11.8606 3.42498 12.5741L4.13164 11.8674C3.52446 11.2629 3.06571 10.5259 2.79145 9.71422C2.51718 8.90253 2.43487 8.03829 2.55098 7.18942L1.56031 7.05342Z" fill="#8D8D8D" />
                  </svg> View History </a>
              </div>
            </div>
          </td>

</tr>
<!-- model start -->
<div class="modal fade" id="edit_histry_2" tabindex="-1" role="dialog" aria-labelledby="edit_histry_2" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" style="font-weight:700">Edit Doc</h5>

                                                <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
            <span aria-hidden="true"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"/>
<rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"/>
</svg>
</span>
          </button>
                                            </div>
                                            <div class="modal-body ediit_nnt">
                                            <h3>Edit Doc</h3>
                                            <form action="{{ route('regupdateFileName1') }}" method="POST" enctype="multipart/form-data" class="upload-form"> 
                                      @csrf
                                      <input type="hidden" name="record_id1" value="{{ $filess->id }}">
                                              <div class="form-grouup">
<label for="fname">File  name:</label>
<input type="text" id="file_name" name="file_name" value="{{$filess->file_name}}">
</div>
<div class="form-grouup">
<label for="lname">Doc File:</label>
<input type="file" id="aoa-file" name="file" accept=".pdf,.doc,.docx" >

</div>
<div class="form-grouup">
<label for="lname">Reason for Change :</label>
<input type="textarea" id="reasons_for_change" name="reasons_for_change" value="{{$filess->reasons_for_change}}" accept=".pdf,.doc,.docx" required>
</div>
<div class="form-grouup">
<button type="submit" value="Submit">Submit</button>
</div>
</form>
                                            </div>
                                        </div>
                                    </div>
                             </div>

                             <!-- model end -->
              
                         
              @endforeach
              @endif




              @if ($coi->isEmpty())             
                  
              <tr class="">
                            <td>
                              <div class="finish">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <g clip-path="url(#clip0_511_3356)">
                                    <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                                  </g>
                                  <defs>
                                    <clipPath id="clip0_511_3356">
                                      <rect width="15" height="15" fill="white" />
                                    </clipPath>
                                  </defs>
                                </svg>
                              </div>
                              <div class="unfinish">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                                  <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                                </svg>
                              </div>
                            </td>
                            <td>STARTUP/DPIIT Certificate</td>
                            <td>
                              <button class="btn btn-primary" style="border-radius:5px;" data-bs-toggle="modal" data-bs-target="#coimodel">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M8.25 12V5.8875L6.3 7.8375L5.25 6.75L9 3L12.75 6.75L11.7 7.8375L9.75 5.8875V12H8.25ZM4.5 15C4.0875 15 3.7345 14.8533 3.441 14.5597C3.1475 14.2662 3.0005 13.913 3 13.5V11.25H4.5V13.5H13.5V11.25H15V13.5C15 13.9125 14.8533 14.2657 14.5597 14.5597C14.2662 14.8538 13.913 15.0005 13.5 15H4.5Z" fill="#7E7E7E" />
                                </svg> Upload </button>
                              <div class="modal fade" id="coimodel" tabindex="-1" role="dialog" aria-labelledby="coimodel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" style="font-weight:700"></h5>
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
                                      <h3>STARTUP/DPIIT Certificate</h3>
                                      <form action="{{ route('regcoidoc') }}"" method="POST" enctype="multipart/form-data" class="upload-form"> @csrf
                                       <div class="file-area">
                                        <input type="file" class="dragfile" id="certificate-of-incorporation" name="file" accept=".pdf,.doc,.docx" required>
                                        <input type="hidden" id="real_file_name" name="real_file_name" value="STARTUP/DPIIT Certificate">
                                        <input type="hidden" id="file_status" name="file_status" value="0">
                                          <div class="file-dummy">
                                            <div class="success">Great, your files are selected. Keep on.</div>
                                            <div class="default">
                                              <span class="upload_icon">
                                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88">
                                                  <title>file-upload</title>
                                                  <path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z" />
                                                </svg>
                                              </span> Drag and Drop files here or <span class="fille">Choose File</span>
                                            </div>
                                          </div>
                                          <br><div class="selected-file"></div>
                                        </div>
                                        <span class="basic-file">Note:- file|mimes:pdf,doc,docx|max size:2048kb</span>
                                        <button class="btn btn-primary" style="border-radius:5px;" type="submit">Upload</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td></td>
                            <td>
                              
                            </td>
                          </tr>
                                           
                                                      
                                   
                                
                                   
                                
                                
                                                        @else
                                    <!-- If records exist in the collection -->
                                    @foreach($coi as $file)
                                    
                                    <tr class="active">

<td>
    <div class="finish">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_511_3356)">
                <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
            </g>
            <defs>
                <clipPath id="clip0_511_3356">
                    <rect width="15" height="15" fill="white" />
                </clipPath>
            </defs>
        </svg>
    </div>
    <div class="unfinish">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
            <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
        </svg>
    </div>
</td>
<td>

            {{$file->real_file_name}}
        
</td>
<td>
   
    
        {{$file->file_type}}
   
   
</td>
@php
$fileSizeKB = round($file->file_size / 1024, 2) ; // Convert bytes to KB and round to 2 decimal places
@endphp
            <td>{{$fileSizeKB }} KB </td>

            <td>
            <div class="dropdown" >
              <button onclick="toggleDropdown()" class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D" />
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D" />
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D" />
                </svg>
              </button>
              <div id="myDropdown" class="dropdown-content"> <div class="down_del">
                  <a class=" dropdown-itemm dnlod_nt"href="{{ route('download-reg2-file', ['id' => $file->id]) }}">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M2.40625 12.25C2.00014 12.25 1.61066 12.0887 1.32349 11.8015C1.03633 11.5143 0.875 11.1249 0.875 10.7188V8.53125C0.875 8.3572 0.94414 8.19028 1.06721 8.06721C1.19028 7.94414 1.3572 7.875 1.53125 7.875C1.7053 7.875 1.87222 7.94414 1.99529 8.06721C2.11836 8.19028 2.1875 8.3572 2.1875 8.53125V10.7188C2.1875 10.8395 2.2855 10.9375 2.40625 10.9375H11.5938C11.6518 10.9375 11.7074 10.9145 11.7484 10.8734C11.7895 10.8324 11.8125 10.7768 11.8125 10.7188V8.53125C11.8125 8.3572 11.8816 8.19028 12.0047 8.06721C12.1278 7.94414 12.2947 7.875 12.4688 7.875C12.6428 7.875 12.8097 7.94414 12.9328 8.06721C13.0559 8.19028 13.125 8.3572 13.125 8.53125V10.7188C13.125 11.1249 12.9637 11.5143 12.6765 11.8015C12.3893 12.0887 11.9999 12.25 11.5938 12.25H2.40625Z" fill="white" />
                      <path d="M6.34334 6.72788V1.75C6.34334 1.57595 6.41248 1.40903 6.53555 1.28596C6.65862 1.16289 6.82554 1.09375 6.99959 1.09375C7.17364 1.09375 7.34056 1.16289 7.46363 1.28596C7.5867 1.40903 7.65584 1.57595 7.65584 1.75V6.72788L9.37959 5.005C9.44049 4.9441 9.51279 4.89579 9.59236 4.86283C9.67193 4.82987 9.75722 4.81291 9.84334 4.81291C9.92947 4.81291 10.0148 4.82987 10.0943 4.86283C10.1739 4.89579 10.2462 4.9441 10.3071 5.005C10.368 5.0659 10.4163 5.1382 10.4493 5.21777C10.4822 5.29734 10.4992 5.38262 10.4992 5.46875C10.4992 5.55488 10.4822 5.64016 10.4493 5.71973C10.4163 5.7993 10.368 5.8716 10.3071 5.9325L7.46334 8.77625C7.40247 8.83721 7.33018 8.88556 7.25061 8.91856C7.17103 8.95155 7.08574 8.96853 6.99959 8.96853C6.91345 8.96853 6.82815 8.95155 6.74857 8.91856C6.669 8.88556 6.59671 8.83721 6.53584 8.77625L3.69209 5.9325C3.63119 5.8716 3.58288 5.7993 3.54992 5.71973C3.51696 5.64016 3.5 5.55488 3.5 5.46875C3.5 5.38262 3.51696 5.29734 3.54992 5.21777C3.58288 5.1382 3.63119 5.0659 3.69209 5.005C3.75299 4.9441 3.82529 4.89579 3.90486 4.86283C3.98443 4.82987 4.06972 4.81291 4.15584 4.81291C4.24197 4.81291 4.32725 4.82987 4.40682 4.86283C4.48639 4.89579 4.55869 4.9441 4.61959 5.005L6.34334 6.72788Z" fill="white" />
                    </svg> Download </a>
                  <a class="dropdown-itemm delet_nt" id="delete-{{ $file->id }}">
                  <form method="POST" action="{{ route('file2reg.delete', ['id' => $file->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?')">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A" />
                                    </svg> Delete
                                                            </button>
                                                        </form>
                                                       
                                                 </a>
                    
                   
                </div>
                <a class="dropdown-itemm rename_nt" data-bs-toggle="modal" data-bs-target="#edit_histry_3">
                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.75 9.33323L6.41667 11.6666H12.25V9.33323H8.75ZM7.035 4.19406L1.75 9.47906V11.6666H3.9375L9.2225 6.38156L7.035 4.19406ZM10.9142 4.6899C11.1417 4.4624 11.1417 4.08323 10.9142 3.8674L9.54917 2.5024C9.4398 2.39389 9.29198 2.33301 9.13792 2.33301C8.98385 2.33301 8.83604 2.39389 8.72667 2.5024L7.65917 3.5699L9.84667 5.7574L10.9142 4.6899Z" fill="#8D8D8D" />
                  </svg> Edit </a>
                <a class="dropdown-itemm history_nt history_click_2">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 5.3335V8.00016L9.66667 9.66683" stroke="#8D8D8D" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M2.89231 4.58076L2.39231 4.58276C2.39283 4.71456 2.44538 4.84082 2.53851 4.93408C2.63165 5.02734 2.75784 5.08005 2.88964 5.08076L2.89231 4.58076ZM4.58698 5.08876C4.65264 5.08906 4.71771 5.07643 4.77849 5.05159C4.83927 5.02674 4.89457 4.99017 4.94121 4.94396C4.98786 4.89775 5.02495 4.8428 5.05036 4.78225C5.07577 4.72171 5.089 4.65675 5.08931 4.59109C5.08962 4.52543 5.07699 4.46035 5.05214 4.39957C5.0273 4.33879 4.99072 4.2835 4.94451 4.23685C4.8983 4.19021 4.84335 4.15312 4.78281 4.12771C4.72226 4.1023 4.6573 4.08906 4.59164 4.08876L4.58698 5.08876ZM3.38364 2.88076C3.38329 2.81509 3.37001 2.75015 3.34456 2.68962C3.31911 2.62909 3.28199 2.57416 3.23531 2.52798C3.18863 2.4818 3.13332 2.44527 3.07252 2.42046C3.01172 2.39566 2.94664 2.38307 2.88098 2.38342C2.81531 2.38377 2.75037 2.39705 2.68984 2.4225C2.62931 2.44795 2.57438 2.48508 2.5282 2.53175C2.48202 2.57843 2.44549 2.63375 2.42068 2.69454C2.39588 2.75534 2.38329 2.82043 2.38364 2.88609L3.38364 2.88076ZM2.55164 7.19009C2.56122 7.12474 2.55776 7.05814 2.54146 6.99414C2.52516 6.93014 2.49634 6.87 2.45666 6.8172C2.41699 6.7644 2.36724 6.71998 2.31031 6.68651C2.25337 6.65305 2.19037 6.63119 2.12493 6.62221C2.0595 6.61322 1.99294 6.61729 1.92909 6.63418C1.86524 6.65107 1.80537 6.68044 1.75293 6.72059C1.70049 6.76075 1.65653 6.8109 1.62359 6.86814C1.59064 6.92538 1.56936 6.98858 1.56098 7.05409L2.55164 7.19009ZM12.575 3.42542C10.0283 0.878756 5.91298 0.852089 3.38298 3.38276L4.08964 4.08942C6.22298 1.95676 9.70498 1.96942 11.8683 4.13209L12.575 3.42542ZM3.42564 12.5748C5.97231 15.1214 10.0876 15.1481 12.6176 12.6174L11.911 11.9108C9.77764 14.0434 6.29564 14.0308 4.13231 11.8681L3.42564 12.5748ZM12.6176 12.6174C15.1476 10.0874 15.1216 5.97209 12.575 3.42542L11.8683 4.13209C14.031 6.29542 14.0436 9.77742 11.911 11.9108L12.6176 12.6174ZM3.38298 3.38276L2.53831 4.22676L3.24564 4.93342L4.08964 4.08942L3.38298 3.38276ZM2.88964 5.08076L4.58698 5.08876L4.59164 4.08876L2.89498 4.08076L2.88964 5.08076ZM3.39231 4.57809L3.38364 2.88076L2.38364 2.88609L2.39231 4.58276L3.39231 4.57809ZM1.56031 7.05342C1.42334 8.05514 1.52043 9.07498 1.84396 10.0329C2.1675 10.9907 2.70866 11.8606 3.42498 12.5741L4.13164 11.8674C3.52446 11.2629 3.06571 10.5259 2.79145 9.71422C2.51718 8.90253 2.43487 8.03829 2.55098 7.18942L1.56031 7.05342Z" fill="#8D8D8D" />
                  </svg> View History </a>
              </div>
            </div>
          </td>

</tr>
                                
                                            <!-- model start -->
<div class="modal fade" id="edit_histry_3" tabindex="-1" role="dialog" aria-labelledby="edit_histry_3" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" style="font-weight:700">Edit Doc</h5>

                                                <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
            <span aria-hidden="true"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"/>
<rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"/>
</svg>
</span>
          </button>
                                            </div>
                                            <div class="modal-body ediit_nnt">
                                            <h3>Edit Doc</h3>
                                            <form action="{{ route('regupdateFileName2') }}" method="POST" enctype="multipart/form-data" class="upload-form"> 
                                      @csrf
                                      <input type="hidden" name="record_id1" value="{{ $file->id }}">
                                              <div class="form-grouup">
<label for="fname">File  name:</label>
<input type="text" id="file_name" name="file_name" value="{{$file->file_name}}">
</div>
<div class="form-grouup">
<label for="lname">Doc File:</label>
<input type="file" id="aoa-file" name="file" accept=".pdf,.doc,.docx" >

</div>
<div class="form-grouup">
<label for="lname">Reason for Change :</label>
<input type="textarea" id="reasons_for_change" name="reasons_for_change" value="{{$file->reasons_for_change}}" accept=".pdf,.doc,.docx" required>
</div>
<div class="form-grouup">
<button type="submit" value="Submit">Submit</button>
</div>
</form>
                                            </div>
                                        </div>
                                    </div>
                             </div>

                             <!-- model end -->
                                           
                                    
                                @endforeach
                                @endif
                  




                                @if ($pan->isEmpty())             
                  
                                <tr class="">
                            <td>
                              <div class="finish">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <g clip-path="url(#clip0_511_3356)">
                                    <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                                  </g>
                                  <defs>
                                    <clipPath id="clip0_511_3356">
                                      <rect width="15" height="15" fill="white" />
                                    </clipPath>
                                  </defs>
                                </svg>
                              </div>
                              <div class="unfinish">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                                  <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                                </svg>
                              </div>
                            </td>
                            <td>Gumastha licence</td>
                            <td>
                              <button class="btn btn-primary" style="border-radius:5px;" data-bs-toggle="modal" data-bs-target="#panmodel">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M8.25 12V5.8875L6.3 7.8375L5.25 6.75L9 3L12.75 6.75L11.7 7.8375L9.75 5.8875V12H8.25ZM4.5 15C4.0875 15 3.7345 14.8533 3.441 14.5597C3.1475 14.2662 3.0005 13.913 3 13.5V11.25H4.5V13.5H13.5V11.25H15V13.5C15 13.9125 14.8533 14.2657 14.5597 14.5597C14.2662 14.8538 13.913 15.0005 13.5 15H4.5Z" fill="#7E7E7E" />
                                </svg> Upload </button>
                              <div class="modal fade" id="panmodel" tabindex="-1" role="dialog" aria-labelledby="panmodel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" style="font-weight:700"></h5>
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
                                      <h3>Gumastha licence</h3>
                                      <form action="{{ route('regpandoc') }}"" method="POST" enctype="multipart/form-data" class="upload-form"> @csrf 
                                      <div class="file-area">
                                        <input type="file" class="dragfile" id="permanent-account-number" name="file" accept=".pdf,.doc,.docx" required>
                                        <input type="hidden" id="real_file_name" name="real_file_name" value="Gumastha licence">
                                        <input type="hidden" id="file_status" name="file_status" value="0">
                                          <div class="file-dummy">
                                            <div class="success">Great, your files are selected. Keep on.</div>
                                            <div class="default">
                                              <span class="upload_icon">
                                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88">
                                                  <title>file-upload</title>
                                                  <path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z" />
                                                </svg>
                                              </span> Drag and Drop files here or <span class="fille">Choose File</span>
                                            </div>
                                          </div>
                                          <br><div class="selected-file"></div>
                                        </div>
                                        <span class="basic-file">Note:- file|mimes:pdf,doc,docx|max size:2048kb</span>
                                        <button class="btn btn-primary" style="border-radius:5px;" type="submit">Upload</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td></td>
                            <td>
                              
                            </td>
                          </tr>          
                                                          
                                       
                                    
                                       
                                    
                                    
                                                            @else
                                        <!-- If records exist in the collection -->
                                        @foreach($pan as $file)
                                       
                                        <tr class="active">

<td>
    <div class="finish">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_511_3356)">
                <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
            </g>
            <defs>
                <clipPath id="clip0_511_3356">
                    <rect width="15" height="15" fill="white" />
                </clipPath>
            </defs>
        </svg>
    </div>
    <div class="unfinish">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
            <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
        </svg>
    </div>
</td>
<td>

            {{$file->real_file_name}}
        
</td>
<td>
   
    
        {{$file->file_type}}
   
   
</td>
@php
$fileSizeKB = round($file->file_size / 1024, 2) ; // Convert bytes to KB and round to 2 decimal places
@endphp
            <td>{{$fileSizeKB }} KB </td>

            <td>
            <div class="dropdown" >
              <button onclick="toggleDropdown()" class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D" />
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D" />
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D" />
                </svg>
              </button>
              <div id="myDropdown" class="dropdown-content"> <div class="down_del">
                  <a class=" dropdown-itemm dnlod_nt" href="{{ route('download-reg3-file', ['id' => $file->id]) }}">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M2.40625 12.25C2.00014 12.25 1.61066 12.0887 1.32349 11.8015C1.03633 11.5143 0.875 11.1249 0.875 10.7188V8.53125C0.875 8.3572 0.94414 8.19028 1.06721 8.06721C1.19028 7.94414 1.3572 7.875 1.53125 7.875C1.7053 7.875 1.87222 7.94414 1.99529 8.06721C2.11836 8.19028 2.1875 8.3572 2.1875 8.53125V10.7188C2.1875 10.8395 2.2855 10.9375 2.40625 10.9375H11.5938C11.6518 10.9375 11.7074 10.9145 11.7484 10.8734C11.7895 10.8324 11.8125 10.7768 11.8125 10.7188V8.53125C11.8125 8.3572 11.8816 8.19028 12.0047 8.06721C12.1278 7.94414 12.2947 7.875 12.4688 7.875C12.6428 7.875 12.8097 7.94414 12.9328 8.06721C13.0559 8.19028 13.125 8.3572 13.125 8.53125V10.7188C13.125 11.1249 12.9637 11.5143 12.6765 11.8015C12.3893 12.0887 11.9999 12.25 11.5938 12.25H2.40625Z" fill="white" />
                      <path d="M6.34334 6.72788V1.75C6.34334 1.57595 6.41248 1.40903 6.53555 1.28596C6.65862 1.16289 6.82554 1.09375 6.99959 1.09375C7.17364 1.09375 7.34056 1.16289 7.46363 1.28596C7.5867 1.40903 7.65584 1.57595 7.65584 1.75V6.72788L9.37959 5.005C9.44049 4.9441 9.51279 4.89579 9.59236 4.86283C9.67193 4.82987 9.75722 4.81291 9.84334 4.81291C9.92947 4.81291 10.0148 4.82987 10.0943 4.86283C10.1739 4.89579 10.2462 4.9441 10.3071 5.005C10.368 5.0659 10.4163 5.1382 10.4493 5.21777C10.4822 5.29734 10.4992 5.38262 10.4992 5.46875C10.4992 5.55488 10.4822 5.64016 10.4493 5.71973C10.4163 5.7993 10.368 5.8716 10.3071 5.9325L7.46334 8.77625C7.40247 8.83721 7.33018 8.88556 7.25061 8.91856C7.17103 8.95155 7.08574 8.96853 6.99959 8.96853C6.91345 8.96853 6.82815 8.95155 6.74857 8.91856C6.669 8.88556 6.59671 8.83721 6.53584 8.77625L3.69209 5.9325C3.63119 5.8716 3.58288 5.7993 3.54992 5.71973C3.51696 5.64016 3.5 5.55488 3.5 5.46875C3.5 5.38262 3.51696 5.29734 3.54992 5.21777C3.58288 5.1382 3.63119 5.0659 3.69209 5.005C3.75299 4.9441 3.82529 4.89579 3.90486 4.86283C3.98443 4.82987 4.06972 4.81291 4.15584 4.81291C4.24197 4.81291 4.32725 4.82987 4.40682 4.86283C4.48639 4.89579 4.55869 4.9441 4.61959 5.005L6.34334 6.72788Z" fill="white" />
                    </svg> Download </a>
                  <a class="dropdown-itemm delet_nt" id="delete-{{ $file->id }}">
                  <form method="POST" action="{{ route('file3reg.delete', ['id' => $file->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?')">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A" />
                                    </svg> Delete
                                                            </button>
                                                        </form>
                                                       
                                                 </a>
                    
                   
                </div>
                <a class="dropdown-itemm rename_nt" data-bs-toggle="modal" data-bs-target="#edit_histry_4">
                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.75 9.33323L6.41667 11.6666H12.25V9.33323H8.75ZM7.035 4.19406L1.75 9.47906V11.6666H3.9375L9.2225 6.38156L7.035 4.19406ZM10.9142 4.6899C11.1417 4.4624 11.1417 4.08323 10.9142 3.8674L9.54917 2.5024C9.4398 2.39389 9.29198 2.33301 9.13792 2.33301C8.98385 2.33301 8.83604 2.39389 8.72667 2.5024L7.65917 3.5699L9.84667 5.7574L10.9142 4.6899Z" fill="#8D8D8D" />
                  </svg> Edit </a>
                <a class="dropdown-itemm history_nt history_click_3">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 5.3335V8.00016L9.66667 9.66683" stroke="#8D8D8D" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M2.89231 4.58076L2.39231 4.58276C2.39283 4.71456 2.44538 4.84082 2.53851 4.93408C2.63165 5.02734 2.75784 5.08005 2.88964 5.08076L2.89231 4.58076ZM4.58698 5.08876C4.65264 5.08906 4.71771 5.07643 4.77849 5.05159C4.83927 5.02674 4.89457 4.99017 4.94121 4.94396C4.98786 4.89775 5.02495 4.8428 5.05036 4.78225C5.07577 4.72171 5.089 4.65675 5.08931 4.59109C5.08962 4.52543 5.07699 4.46035 5.05214 4.39957C5.0273 4.33879 4.99072 4.2835 4.94451 4.23685C4.8983 4.19021 4.84335 4.15312 4.78281 4.12771C4.72226 4.1023 4.6573 4.08906 4.59164 4.08876L4.58698 5.08876ZM3.38364 2.88076C3.38329 2.81509 3.37001 2.75015 3.34456 2.68962C3.31911 2.62909 3.28199 2.57416 3.23531 2.52798C3.18863 2.4818 3.13332 2.44527 3.07252 2.42046C3.01172 2.39566 2.94664 2.38307 2.88098 2.38342C2.81531 2.38377 2.75037 2.39705 2.68984 2.4225C2.62931 2.44795 2.57438 2.48508 2.5282 2.53175C2.48202 2.57843 2.44549 2.63375 2.42068 2.69454C2.39588 2.75534 2.38329 2.82043 2.38364 2.88609L3.38364 2.88076ZM2.55164 7.19009C2.56122 7.12474 2.55776 7.05814 2.54146 6.99414C2.52516 6.93014 2.49634 6.87 2.45666 6.8172C2.41699 6.7644 2.36724 6.71998 2.31031 6.68651C2.25337 6.65305 2.19037 6.63119 2.12493 6.62221C2.0595 6.61322 1.99294 6.61729 1.92909 6.63418C1.86524 6.65107 1.80537 6.68044 1.75293 6.72059C1.70049 6.76075 1.65653 6.8109 1.62359 6.86814C1.59064 6.92538 1.56936 6.98858 1.56098 7.05409L2.55164 7.19009ZM12.575 3.42542C10.0283 0.878756 5.91298 0.852089 3.38298 3.38276L4.08964 4.08942C6.22298 1.95676 9.70498 1.96942 11.8683 4.13209L12.575 3.42542ZM3.42564 12.5748C5.97231 15.1214 10.0876 15.1481 12.6176 12.6174L11.911 11.9108C9.77764 14.0434 6.29564 14.0308 4.13231 11.8681L3.42564 12.5748ZM12.6176 12.6174C15.1476 10.0874 15.1216 5.97209 12.575 3.42542L11.8683 4.13209C14.031 6.29542 14.0436 9.77742 11.911 11.9108L12.6176 12.6174ZM3.38298 3.38276L2.53831 4.22676L3.24564 4.93342L4.08964 4.08942L3.38298 3.38276ZM2.88964 5.08076L4.58698 5.08876L4.59164 4.08876L2.89498 4.08076L2.88964 5.08076ZM3.39231 4.57809L3.38364 2.88076L2.38364 2.88609L2.39231 4.58276L3.39231 4.57809ZM1.56031 7.05342C1.42334 8.05514 1.52043 9.07498 1.84396 10.0329C2.1675 10.9907 2.70866 11.8606 3.42498 12.5741L4.13164 11.8674C3.52446 11.2629 3.06571 10.5259 2.79145 9.71422C2.51718 8.90253 2.43487 8.03829 2.55098 7.18942L1.56031 7.05342Z" fill="#8D8D8D" />
                  </svg> View History </a>
              </div>
            </div>
          </td>

</tr>
                                    
                                                <!-- model start -->
<div class="modal fade" id="edit_histry_4" tabindex="-1" role="dialog" aria-labelledby="edit_histry_4" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" style="font-weight:700">Edit Doc</h5>

                                                <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
            <span aria-hidden="true"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"/>
<rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"/>
</svg>
</span>
          </button>
                                            </div>
                                            <div class="modal-body ediit_nnt">
                                            <h3>Edit Doc</h3>
                                            <form action="{{ route('regupdateFileName3') }}" method="POST" enctype="multipart/form-data" class="upload-form"> 
                                      @csrf
                                      <input type="hidden" name="record_id1" value="{{ $file->id }}">
                                              <div class="form-grouup">
<label for="fname">File  name:</label>
<input type="text" id="file_name" name="file_name" value="{{$file->file_name}}">
</div>
<div class="form-grouup">
<label for="lname">Doc File:</label>
<input type="file" id="aoa-file" name="file" accept=".pdf,.doc,.docx" >

</div>
<div class="form-grouup">
<label for="lname">Reason for Change :</label>
<input type="textarea" id="reasons_for_change" name="reasons_for_change" value="{{$file->reasons_for_change}}" accept=".pdf,.doc,.docx" required>
</div>
<div class="form-grouup">
<button type="submit" value="Submit">Submit</button>
</div>
</form>
                                            </div>
                                        </div>
                                    </div>
                             </div>

                             <!-- model end -->

                                               
                                        
                                    @endforeach
                                    @endif
  
                         

                                    @if ($tan->isEmpty())             
                  
                                    <tr class="">
                            <td>
                              <div class="finish">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <g clip-path="url(#clip0_511_3356)">
                                    <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                                  </g>
                                  <defs>
                                    <clipPath id="clip0_511_3356">
                                      <rect width="15" height="15" fill="white" />
                                    </clipPath>
                                  </defs>
                                </svg>
                              </div>
                              <div class="unfinish">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                                  <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                                </svg>
                              </div>
                            </td>
                            <td>Import Export Code</td>
                            <td>
                              <button class="btn btn-primary" style="border-radius:5px;" data-bs-toggle="modal" data-bs-target="#tanmodel">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M8.25 12V5.8875L6.3 7.8375L5.25 6.75L9 3L12.75 6.75L11.7 7.8375L9.75 5.8875V12H8.25ZM4.5 15C4.0875 15 3.7345 14.8533 3.441 14.5597C3.1475 14.2662 3.0005 13.913 3 13.5V11.25H4.5V13.5H13.5V11.25H15V13.5C15 13.9125 14.8533 14.2657 14.5597 14.5597C14.2662 14.8538 13.913 15.0005 13.5 15H4.5Z" fill="#7E7E7E" />
                                </svg> Upload </button>
                              <div class="modal fade" id="tanmodel" tabindex="-1" role="dialog" aria-labelledby="tanmodel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" style="font-weight:700"></h5>
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
                                      <h3>Import Export Code</h3>
                                      <form action="{{ route('regtandoc') }}"" method="POST" enctype="multipart/form-data" class="upload-form"> @csrf 
                                      <div class="file-area">
                                        <input type="file" class="dragfile" id="tax-collection-account-number" name="file" accept=".pdf,.doc,.docx" required>
                                        <input type="hidden" id="real_file_name" name="real_file_name" value="Import Export Code">
                                        <input type="hidden" id="file_status" name="file_status" value="0">
                                          <div class="file-dummy">
                                            <div class="success">Great, your files are selected. Keep on.</div>
                                            <div class="default">
                                              <span class="upload_icon">
                                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88">
                                                  <title>file-upload</title>
                                                  <path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z" />
                                                </svg>
                                              </span> Drag and Drop files here or <span class="fille">Choose File</span>
                                            </div>
                                          </div>
                                          <br><div class="selected-file"></div>
                                        </div>
                                        <span class="basic-file">Note:- file|mimes:pdf,doc,docx|max size:2048kb</span>
                                        <button class="btn btn-primary" style="border-radius:5px;" type="submit">Upload</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td></td>
                            <td>
                             
                            </td>
                          </tr>       
                                            
                         
                      
                         
                      
                      
                                              @else
                          <!-- If records exist in the collection -->
                          @foreach($tan as $file)
                         
                          <tr class="active">

<td>
    <div class="finish">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_511_3356)">
                <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
            </g>
            <defs>
                <clipPath id="clip0_511_3356">
                    <rect width="15" height="15" fill="white" />
                </clipPath>
            </defs>
        </svg>
    </div>
    <div class="unfinish">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
            <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
        </svg>
    </div>
</td>
<td>

            {{$file->real_file_name}}
        
</td>
<td>
   
    
        {{$file->file_type}}
   
   
</td>
@php
$fileSizeKB = round($file->file_size / 1024, 2) ; // Convert bytes to KB and round to 2 decimal places
@endphp
            <td>{{$fileSizeKB }} KB </td>

            <td>
            <div class="dropdown" >
              <button onclick="toggleDropdown()" class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D" />
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D" />
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D" />
                </svg>
              </button>
              <div id="myDropdown" class="dropdown-content"> <div class="down_del">
                  <a class=" dropdown-itemm dnlod_nt" href="{{ route('download-reg4-file', ['id' => $file->id]) }}">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M2.40625 12.25C2.00014 12.25 1.61066 12.0887 1.32349 11.8015C1.03633 11.5143 0.875 11.1249 0.875 10.7188V8.53125C0.875 8.3572 0.94414 8.19028 1.06721 8.06721C1.19028 7.94414 1.3572 7.875 1.53125 7.875C1.7053 7.875 1.87222 7.94414 1.99529 8.06721C2.11836 8.19028 2.1875 8.3572 2.1875 8.53125V10.7188C2.1875 10.8395 2.2855 10.9375 2.40625 10.9375H11.5938C11.6518 10.9375 11.7074 10.9145 11.7484 10.8734C11.7895 10.8324 11.8125 10.7768 11.8125 10.7188V8.53125C11.8125 8.3572 11.8816 8.19028 12.0047 8.06721C12.1278 7.94414 12.2947 7.875 12.4688 7.875C12.6428 7.875 12.8097 7.94414 12.9328 8.06721C13.0559 8.19028 13.125 8.3572 13.125 8.53125V10.7188C13.125 11.1249 12.9637 11.5143 12.6765 11.8015C12.3893 12.0887 11.9999 12.25 11.5938 12.25H2.40625Z" fill="white" />
                      <path d="M6.34334 6.72788V1.75C6.34334 1.57595 6.41248 1.40903 6.53555 1.28596C6.65862 1.16289 6.82554 1.09375 6.99959 1.09375C7.17364 1.09375 7.34056 1.16289 7.46363 1.28596C7.5867 1.40903 7.65584 1.57595 7.65584 1.75V6.72788L9.37959 5.005C9.44049 4.9441 9.51279 4.89579 9.59236 4.86283C9.67193 4.82987 9.75722 4.81291 9.84334 4.81291C9.92947 4.81291 10.0148 4.82987 10.0943 4.86283C10.1739 4.89579 10.2462 4.9441 10.3071 5.005C10.368 5.0659 10.4163 5.1382 10.4493 5.21777C10.4822 5.29734 10.4992 5.38262 10.4992 5.46875C10.4992 5.55488 10.4822 5.64016 10.4493 5.71973C10.4163 5.7993 10.368 5.8716 10.3071 5.9325L7.46334 8.77625C7.40247 8.83721 7.33018 8.88556 7.25061 8.91856C7.17103 8.95155 7.08574 8.96853 6.99959 8.96853C6.91345 8.96853 6.82815 8.95155 6.74857 8.91856C6.669 8.88556 6.59671 8.83721 6.53584 8.77625L3.69209 5.9325C3.63119 5.8716 3.58288 5.7993 3.54992 5.71973C3.51696 5.64016 3.5 5.55488 3.5 5.46875C3.5 5.38262 3.51696 5.29734 3.54992 5.21777C3.58288 5.1382 3.63119 5.0659 3.69209 5.005C3.75299 4.9441 3.82529 4.89579 3.90486 4.86283C3.98443 4.82987 4.06972 4.81291 4.15584 4.81291C4.24197 4.81291 4.32725 4.82987 4.40682 4.86283C4.48639 4.89579 4.55869 4.9441 4.61959 5.005L6.34334 6.72788Z" fill="white" />
                    </svg> Download </a>
                  <a class="dropdown-itemm delet_nt" id="delete-{{ $file->id }}">
                  <form method="POST" action="{{ route('file4reg.delete', ['id' => $file->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?')">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A" />
                                    </svg> Delete
                                                            </button>
                                                        </form>
                                                       
                                                 </a>
                    
                   
                </div>
                <a class="dropdown-itemm rename_nt" data-bs-toggle="modal" data-bs-target="#edit_histry_5">
                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.75 9.33323L6.41667 11.6666H12.25V9.33323H8.75ZM7.035 4.19406L1.75 9.47906V11.6666H3.9375L9.2225 6.38156L7.035 4.19406ZM10.9142 4.6899C11.1417 4.4624 11.1417 4.08323 10.9142 3.8674L9.54917 2.5024C9.4398 2.39389 9.29198 2.33301 9.13792 2.33301C8.98385 2.33301 8.83604 2.39389 8.72667 2.5024L7.65917 3.5699L9.84667 5.7574L10.9142 4.6899Z" fill="#8D8D8D" />
                  </svg> Edit </a>
                <a class="dropdown-itemm history_nt history_click_4">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 5.3335V8.00016L9.66667 9.66683" stroke="#8D8D8D" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M2.89231 4.58076L2.39231 4.58276C2.39283 4.71456 2.44538 4.84082 2.53851 4.93408C2.63165 5.02734 2.75784 5.08005 2.88964 5.08076L2.89231 4.58076ZM4.58698 5.08876C4.65264 5.08906 4.71771 5.07643 4.77849 5.05159C4.83927 5.02674 4.89457 4.99017 4.94121 4.94396C4.98786 4.89775 5.02495 4.8428 5.05036 4.78225C5.07577 4.72171 5.089 4.65675 5.08931 4.59109C5.08962 4.52543 5.07699 4.46035 5.05214 4.39957C5.0273 4.33879 4.99072 4.2835 4.94451 4.23685C4.8983 4.19021 4.84335 4.15312 4.78281 4.12771C4.72226 4.1023 4.6573 4.08906 4.59164 4.08876L4.58698 5.08876ZM3.38364 2.88076C3.38329 2.81509 3.37001 2.75015 3.34456 2.68962C3.31911 2.62909 3.28199 2.57416 3.23531 2.52798C3.18863 2.4818 3.13332 2.44527 3.07252 2.42046C3.01172 2.39566 2.94664 2.38307 2.88098 2.38342C2.81531 2.38377 2.75037 2.39705 2.68984 2.4225C2.62931 2.44795 2.57438 2.48508 2.5282 2.53175C2.48202 2.57843 2.44549 2.63375 2.42068 2.69454C2.39588 2.75534 2.38329 2.82043 2.38364 2.88609L3.38364 2.88076ZM2.55164 7.19009C2.56122 7.12474 2.55776 7.05814 2.54146 6.99414C2.52516 6.93014 2.49634 6.87 2.45666 6.8172C2.41699 6.7644 2.36724 6.71998 2.31031 6.68651C2.25337 6.65305 2.19037 6.63119 2.12493 6.62221C2.0595 6.61322 1.99294 6.61729 1.92909 6.63418C1.86524 6.65107 1.80537 6.68044 1.75293 6.72059C1.70049 6.76075 1.65653 6.8109 1.62359 6.86814C1.59064 6.92538 1.56936 6.98858 1.56098 7.05409L2.55164 7.19009ZM12.575 3.42542C10.0283 0.878756 5.91298 0.852089 3.38298 3.38276L4.08964 4.08942C6.22298 1.95676 9.70498 1.96942 11.8683 4.13209L12.575 3.42542ZM3.42564 12.5748C5.97231 15.1214 10.0876 15.1481 12.6176 12.6174L11.911 11.9108C9.77764 14.0434 6.29564 14.0308 4.13231 11.8681L3.42564 12.5748ZM12.6176 12.6174C15.1476 10.0874 15.1216 5.97209 12.575 3.42542L11.8683 4.13209C14.031 6.29542 14.0436 9.77742 11.911 11.9108L12.6176 12.6174ZM3.38298 3.38276L2.53831 4.22676L3.24564 4.93342L4.08964 4.08942L3.38298 3.38276ZM2.88964 5.08076L4.58698 5.08876L4.59164 4.08876L2.89498 4.08076L2.88964 5.08076ZM3.39231 4.57809L3.38364 2.88076L2.38364 2.88609L2.39231 4.58276L3.39231 4.57809ZM1.56031 7.05342C1.42334 8.05514 1.52043 9.07498 1.84396 10.0329C2.1675 10.9907 2.70866 11.8606 3.42498 12.5741L4.13164 11.8674C3.52446 11.2629 3.06571 10.5259 2.79145 9.71422C2.51718 8.90253 2.43487 8.03829 2.55098 7.18942L1.56031 7.05342Z" fill="#8D8D8D" />
                  </svg> View History </a>
              </div>
            </div>
          </td>

</tr>
                      
                                  <!-- model start -->
<div class="modal fade" id="edit_histry_5" tabindex="-1" role="dialog" aria-labelledby="edit_histry_5" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" style="font-weight:700">Edit Doc</h5>

                                                <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
            <span aria-hidden="true"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"/>
<rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"/>
</svg>
</span>
          </button>
                                            </div>
                                            <div class="modal-body ediit_nnt">
                                            <h3>Edit Doc</h3>
                                            <form action="{{ route('regupdateFileName4') }}" method="POST" enctype="multipart/form-data" class="upload-form"> 
                                      @csrf
                                      <input type="hidden" name="record_id1" value="{{ $file->id }}">
                                              <div class="form-grouup">
<label for="fname">File  name:</label>
<input type="text" id="file_name" name="file_name" value="{{$file->file_name}}">
</div>
<div class="form-grouup">
<label for="lname">Doc File:</label>
<input type="file" id="aoa-file" name="file" accept=".pdf,.doc,.docx" >

</div>
<div class="form-grouup">
<label for="lname">Reason for Change :</label>
<input type="textarea" id="reasons_for_change" name="reasons_for_change" value="{{$file->reasons_for_change}}" accept=".pdf,.doc,.docx" required>
</div>
<div class="form-grouup">
<button type="submit" value="Submit">Submit</button>
</div>
</form>
                                            </div>
                                        </div>
                                    </div>
                             </div>

                             <!-- model end -->

                                  
                          
                      @endforeach
                      @endif




                      @if ($inc->isEmpty())             
                  
                      <tr class="">
                            <td>
                              <div class="finish">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <g clip-path="url(#clip0_511_3356)">
                                    <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                                  </g>
                                  <defs>
                                    <clipPath id="clip0_511_3356">
                                      <rect width="15" height="15" fill="white" />
                                    </clipPath>
                                  </defs>
                                </svg>
                              </div>
                              <div class="unfinish">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                                  <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                                </svg>
                              </div>
                            </td>
                            <td>FSSAI License</td>
                            <td>
                              <button class="btn btn-primary" style="border-radius:5px;" data-bs-toggle="modal" data-bs-target="#incmodel">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M8.25 12V5.8875L6.3 7.8375L5.25 6.75L9 3L12.75 6.75L11.7 7.8375L9.75 5.8875V12H8.25ZM4.5 15C4.0875 15 3.7345 14.8533 3.441 14.5597C3.1475 14.2662 3.0005 13.913 3 13.5V11.25H4.5V13.5H13.5V11.25H15V13.5C15 13.9125 14.8533 14.2657 14.5597 14.5597C14.2662 14.8538 13.913 15.0005 13.5 15H4.5Z" fill="#7E7E7E" />
                                </svg> Upload </button>
                              <div class="modal fade" id="incmodel" tabindex="-1" role="dialog" aria-labelledby="incmodel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" style="font-weight:700"></h5>
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
                                      <h3>FSSAI License</h3>
                                      <form action="{{ route('regincdoc') }}"" method="POST" enctype="multipart/form-data" class="upload-form"> @csrf 
                                      <div class="file-area">
                                        <input type="file" class="dragfile" id="commencement-of-business" name="file" accept=".pdf,.doc,.docx" required>
                                        <input type="hidden" id="real_file_name" name="real_file_name" value="FSSAI License">
                                        <input type="hidden" id="file_status" name="file_status" value="0">
                                          <div class="file-dummy">
                                            <div class="success">Great, your files are selected. Keep on.</div>
                                            <div class="default">
                                              <span class="upload_icon">
                                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88">
                                                  <title>file-upload</title>
                                                  <path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z" />
                                                </svg>
                                              </span> Drag and Drop files here or <span class="fille">Choose File</span>
                                            </div>
                                          </div>
                                          <br><div class="selected-file"></div>
                                        </div>
                                        <span class="basic-file">Note:- file|mimes:pdf,doc,docx|max size:2048kb</span>
                                        <button class="btn btn-primary" style="border-radius:5px;" type="submit">Upload</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td></td>
                            <td>
                             
                            </td>
                          </tr>     
                          
       
    
       
    
    
                            @else
        <!-- If records exist in the collection -->
        @foreach($inc as $file)
        
        <tr class="active">

<td>
    <div class="finish">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_511_3356)">
                <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
            </g>
            <defs>
                <clipPath id="clip0_511_3356">
                    <rect width="15" height="15" fill="white" />
                </clipPath>
            </defs>
        </svg>
    </div>
    <div class="unfinish">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
            <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
        </svg>
    </div>
</td>
<td>

            {{$file->real_file_name}}
        
</td>
<td>
   
    
        {{$file->file_type}}
   
   
</td>
@php
$fileSizeKB = round($file->file_size / 1024, 2) ; // Convert bytes to KB and round to 2 decimal places
@endphp
            <td>{{$fileSizeKB }} KB </td>

            <td>
            <div class="dropdown" >
              <button onclick="toggleDropdown()" class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D" />
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D" />
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D" />
                </svg>
              </button>
              <div id="myDropdown" class="dropdown-content"> <div class="down_del">
                  <a class=" dropdown-itemm dnlod_nt" href="{{ route('download-reg5-file', ['id' => $file->id]) }}">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M2.40625 12.25C2.00014 12.25 1.61066 12.0887 1.32349 11.8015C1.03633 11.5143 0.875 11.1249 0.875 10.7188V8.53125C0.875 8.3572 0.94414 8.19028 1.06721 8.06721C1.19028 7.94414 1.3572 7.875 1.53125 7.875C1.7053 7.875 1.87222 7.94414 1.99529 8.06721C2.11836 8.19028 2.1875 8.3572 2.1875 8.53125V10.7188C2.1875 10.8395 2.2855 10.9375 2.40625 10.9375H11.5938C11.6518 10.9375 11.7074 10.9145 11.7484 10.8734C11.7895 10.8324 11.8125 10.7768 11.8125 10.7188V8.53125C11.8125 8.3572 11.8816 8.19028 12.0047 8.06721C12.1278 7.94414 12.2947 7.875 12.4688 7.875C12.6428 7.875 12.8097 7.94414 12.9328 8.06721C13.0559 8.19028 13.125 8.3572 13.125 8.53125V10.7188C13.125 11.1249 12.9637 11.5143 12.6765 11.8015C12.3893 12.0887 11.9999 12.25 11.5938 12.25H2.40625Z" fill="white" />
                      <path d="M6.34334 6.72788V1.75C6.34334 1.57595 6.41248 1.40903 6.53555 1.28596C6.65862 1.16289 6.82554 1.09375 6.99959 1.09375C7.17364 1.09375 7.34056 1.16289 7.46363 1.28596C7.5867 1.40903 7.65584 1.57595 7.65584 1.75V6.72788L9.37959 5.005C9.44049 4.9441 9.51279 4.89579 9.59236 4.86283C9.67193 4.82987 9.75722 4.81291 9.84334 4.81291C9.92947 4.81291 10.0148 4.82987 10.0943 4.86283C10.1739 4.89579 10.2462 4.9441 10.3071 5.005C10.368 5.0659 10.4163 5.1382 10.4493 5.21777C10.4822 5.29734 10.4992 5.38262 10.4992 5.46875C10.4992 5.55488 10.4822 5.64016 10.4493 5.71973C10.4163 5.7993 10.368 5.8716 10.3071 5.9325L7.46334 8.77625C7.40247 8.83721 7.33018 8.88556 7.25061 8.91856C7.17103 8.95155 7.08574 8.96853 6.99959 8.96853C6.91345 8.96853 6.82815 8.95155 6.74857 8.91856C6.669 8.88556 6.59671 8.83721 6.53584 8.77625L3.69209 5.9325C3.63119 5.8716 3.58288 5.7993 3.54992 5.71973C3.51696 5.64016 3.5 5.55488 3.5 5.46875C3.5 5.38262 3.51696 5.29734 3.54992 5.21777C3.58288 5.1382 3.63119 5.0659 3.69209 5.005C3.75299 4.9441 3.82529 4.89579 3.90486 4.86283C3.98443 4.82987 4.06972 4.81291 4.15584 4.81291C4.24197 4.81291 4.32725 4.82987 4.40682 4.86283C4.48639 4.89579 4.55869 4.9441 4.61959 5.005L6.34334 6.72788Z" fill="white" />
                    </svg> Download </a>
                  <a class="dropdown-itemm delet_nt" id="delete-{{ $file->id }}">
                  <form method="POST" action="{{ route('file5reg.delete', ['id' => $file->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?')">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A" />
                                    </svg> Delete
                                                            </button>
                                                        </form>
                                                       
                                                 </a>
                    
                   
                </div>
                <a class="dropdown-itemm rename_nt" data-bs-toggle="modal" data-bs-target="#edit_histry_6">
                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.75 9.33323L6.41667 11.6666H12.25V9.33323H8.75ZM7.035 4.19406L1.75 9.47906V11.6666H3.9375L9.2225 6.38156L7.035 4.19406ZM10.9142 4.6899C11.1417 4.4624 11.1417 4.08323 10.9142 3.8674L9.54917 2.5024C9.4398 2.39389 9.29198 2.33301 9.13792 2.33301C8.98385 2.33301 8.83604 2.39389 8.72667 2.5024L7.65917 3.5699L9.84667 5.7574L10.9142 4.6899Z" fill="#8D8D8D" />
                  </svg> Edit </a>
                <a class="dropdown-itemm history_nt history_click_5">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 5.3335V8.00016L9.66667 9.66683" stroke="#8D8D8D" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M2.89231 4.58076L2.39231 4.58276C2.39283 4.71456 2.44538 4.84082 2.53851 4.93408C2.63165 5.02734 2.75784 5.08005 2.88964 5.08076L2.89231 4.58076ZM4.58698 5.08876C4.65264 5.08906 4.71771 5.07643 4.77849 5.05159C4.83927 5.02674 4.89457 4.99017 4.94121 4.94396C4.98786 4.89775 5.02495 4.8428 5.05036 4.78225C5.07577 4.72171 5.089 4.65675 5.08931 4.59109C5.08962 4.52543 5.07699 4.46035 5.05214 4.39957C5.0273 4.33879 4.99072 4.2835 4.94451 4.23685C4.8983 4.19021 4.84335 4.15312 4.78281 4.12771C4.72226 4.1023 4.6573 4.08906 4.59164 4.08876L4.58698 5.08876ZM3.38364 2.88076C3.38329 2.81509 3.37001 2.75015 3.34456 2.68962C3.31911 2.62909 3.28199 2.57416 3.23531 2.52798C3.18863 2.4818 3.13332 2.44527 3.07252 2.42046C3.01172 2.39566 2.94664 2.38307 2.88098 2.38342C2.81531 2.38377 2.75037 2.39705 2.68984 2.4225C2.62931 2.44795 2.57438 2.48508 2.5282 2.53175C2.48202 2.57843 2.44549 2.63375 2.42068 2.69454C2.39588 2.75534 2.38329 2.82043 2.38364 2.88609L3.38364 2.88076ZM2.55164 7.19009C2.56122 7.12474 2.55776 7.05814 2.54146 6.99414C2.52516 6.93014 2.49634 6.87 2.45666 6.8172C2.41699 6.7644 2.36724 6.71998 2.31031 6.68651C2.25337 6.65305 2.19037 6.63119 2.12493 6.62221C2.0595 6.61322 1.99294 6.61729 1.92909 6.63418C1.86524 6.65107 1.80537 6.68044 1.75293 6.72059C1.70049 6.76075 1.65653 6.8109 1.62359 6.86814C1.59064 6.92538 1.56936 6.98858 1.56098 7.05409L2.55164 7.19009ZM12.575 3.42542C10.0283 0.878756 5.91298 0.852089 3.38298 3.38276L4.08964 4.08942C6.22298 1.95676 9.70498 1.96942 11.8683 4.13209L12.575 3.42542ZM3.42564 12.5748C5.97231 15.1214 10.0876 15.1481 12.6176 12.6174L11.911 11.9108C9.77764 14.0434 6.29564 14.0308 4.13231 11.8681L3.42564 12.5748ZM12.6176 12.6174C15.1476 10.0874 15.1216 5.97209 12.575 3.42542L11.8683 4.13209C14.031 6.29542 14.0436 9.77742 11.911 11.9108L12.6176 12.6174ZM3.38298 3.38276L2.53831 4.22676L3.24564 4.93342L4.08964 4.08942L3.38298 3.38276ZM2.88964 5.08076L4.58698 5.08876L4.59164 4.08876L2.89498 4.08076L2.88964 5.08076ZM3.39231 4.57809L3.38364 2.88076L2.38364 2.88609L2.39231 4.58276L3.39231 4.57809ZM1.56031 7.05342C1.42334 8.05514 1.52043 9.07498 1.84396 10.0329C2.1675 10.9907 2.70866 11.8606 3.42498 12.5741L4.13164 11.8674C3.52446 11.2629 3.06571 10.5259 2.79145 9.71422C2.51718 8.90253 2.43487 8.03829 2.55098 7.18942L1.56031 7.05342Z" fill="#8D8D8D" />
                  </svg> View History </a>
              </div>
            </div>
          </td>

</tr>
    
                <!-- model start -->
<div class="modal fade" id="edit_histry_6" tabindex="-1" role="dialog" aria-labelledby="edit_histry_6" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" style="font-weight:700">Edit Doc</h5>

                                                <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
            <span aria-hidden="true"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"/>
<rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"/>
</svg>
</span>
          </button>
                                            </div>
                                            <div class="modal-body ediit_nnt">
                                            <h3>Edit Doc</h3>
                                            <form action="{{ route('regupdateFileName5') }}" method="POST" enctype="multipart/form-data" class="upload-form"> 
                                      @csrf
                                      <input type="hidden" name="record_id1" value="{{ $file->id }}">
                                              <div class="form-grouup">
<label for="fname">File  name:</label>
<input type="text" id="file_name" name="file_name" value="{{$file->file_name}}">
</div>
<div class="form-grouup">
<label for="lname">Doc File:</label>
<input type="file" id="aoa-file" name="file" accept=".pdf,.doc,.docx" >

</div>
<div class="form-grouup">
<label for="lname">Reason for Change :</label>
<input type="textarea" id="reasons_for_change" name="reasons_for_change" value="{{$file->reasons_for_change}}" accept=".pdf,.doc,.docx" required>
</div>
<div class="form-grouup">
<button type="submit" value="Submit">Submit</button>
</div>
</form>
                                            </div>
                                        </div>
                                    </div>
                             </div>

                             <!-- model end -->
                
        
    @endforeach
    @endif






    @if ($spicedoc->isEmpty())             
                  
    <tr class="">
                            <td>
                              <div class="finish">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <g clip-path="url(#clip0_511_3356)">
                                    <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                                  </g>
                                  <defs>
                                    <clipPath id="clip0_511_3356">
                                      <rect width="15" height="15" fill="white" />
                                    </clipPath>
                                  </defs>
                                </svg>
                              </div>
                              <div class="unfinish">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                                  <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                                </svg>
                              </div>
                            </td>
                            <td>Shop and Establishment Act</td>
                            <td>
                              <button class="btn btn-primary" style="border-radius:5px;" data-bs-toggle="modal" data-bs-target="#spicemodel">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M8.25 12V5.8875L6.3 7.8375L5.25 6.75L9 3L12.75 6.75L11.7 7.8375L9.75 5.8875V12H8.25ZM4.5 15C4.0875 15 3.7345 14.8533 3.441 14.5597C3.1475 14.2662 3.0005 13.913 3 13.5V11.25H4.5V13.5H13.5V11.25H15V13.5C15 13.9125 14.8533 14.2657 14.5597 14.5597C14.2662 14.8538 13.913 15.0005 13.5 15H4.5Z" fill="#7E7E7E" />
                                </svg> Upload </button>
                              <div class="modal fade" id="spicemodel" tabindex="-1" role="dialog" aria-labelledby="spicemodel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" style="font-weight:700"></h5>
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
                                      <h3>Shop and Establishment Act</h3>
                                      <form action="{{ route('regspicedoc') }}"" method="POST" enctype="multipart/form-data" class="upload-form"> @csrf 
                                      <div class="file-area">
                                        <input type="file" class="dragfile" id="spice-forms" name="file" accept=".pdf,.doc,.docx" required>
                                        <input type="hidden" id="real_file_name" name="real_file_name" value="Shop and Establishment Act">
                                        <input type="hidden" id="file_status" name="file_status" value="0">
                                          <div class="file-dummy">
                                            <div class="success">Great, your files are selected. Keep on.</div>
                                            <div class="default">
                                              <span class="upload_icon">
                                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88">
                                                  <title>file-upload</title>
                                                  <path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z" />
                                                </svg>
                                              </span> Drag and Drop files here or <span class="fille">Choose File</span>
                                            </div>
                                          </div>
                                          <br><div class="selected-file"></div>
                                        </div>
                                        <span class="basic-file">Note:- file|mimes:pdf,doc,docx|max size:2048kb</span>
                                        <button class="btn btn-primary" style="border-radius:5px;" type="submit">Upload</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td></td>
                            <td>
                              
                            </td>
                          </tr> 
   

   


                        @else
    <!-- If records exist in the collection -->
    @foreach($spicedoc as $file)
    
    <tr class="active">

<td>
    <div class="finish">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_511_3356)">
                <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
            </g>
            <defs>
                <clipPath id="clip0_511_3356">
                    <rect width="15" height="15" fill="white" />
                </clipPath>
            </defs>
        </svg>
    </div>
    <div class="unfinish">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
            <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
        </svg>
    </div>
</td>
<td>

            {{$file->real_file_name}}
        
</td>
<td>
   
    
        {{$file->file_type}}
   
   
</td>
@php
$fileSizeKB = round($file->file_size / 1024, 2) ; // Convert bytes to KB and round to 2 decimal places
@endphp
            <td>{{$fileSizeKB }} KB </td>

            <td>
            <div class="dropdown" >
              <button onclick="toggleDropdown()" class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D" />
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D" />
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D" />
                </svg>
              </button>
              <div id="myDropdown" class="dropdown-content"> <div class="down_del">
                  <a class=" dropdown-itemm dnlod_nt" href="{{ route('download-reg6-file', ['id' => $file->id]) }}">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M2.40625 12.25C2.00014 12.25 1.61066 12.0887 1.32349 11.8015C1.03633 11.5143 0.875 11.1249 0.875 10.7188V8.53125C0.875 8.3572 0.94414 8.19028 1.06721 8.06721C1.19028 7.94414 1.3572 7.875 1.53125 7.875C1.7053 7.875 1.87222 7.94414 1.99529 8.06721C2.11836 8.19028 2.1875 8.3572 2.1875 8.53125V10.7188C2.1875 10.8395 2.2855 10.9375 2.40625 10.9375H11.5938C11.6518 10.9375 11.7074 10.9145 11.7484 10.8734C11.7895 10.8324 11.8125 10.7768 11.8125 10.7188V8.53125C11.8125 8.3572 11.8816 8.19028 12.0047 8.06721C12.1278 7.94414 12.2947 7.875 12.4688 7.875C12.6428 7.875 12.8097 7.94414 12.9328 8.06721C13.0559 8.19028 13.125 8.3572 13.125 8.53125V10.7188C13.125 11.1249 12.9637 11.5143 12.6765 11.8015C12.3893 12.0887 11.9999 12.25 11.5938 12.25H2.40625Z" fill="white" />
                      <path d="M6.34334 6.72788V1.75C6.34334 1.57595 6.41248 1.40903 6.53555 1.28596C6.65862 1.16289 6.82554 1.09375 6.99959 1.09375C7.17364 1.09375 7.34056 1.16289 7.46363 1.28596C7.5867 1.40903 7.65584 1.57595 7.65584 1.75V6.72788L9.37959 5.005C9.44049 4.9441 9.51279 4.89579 9.59236 4.86283C9.67193 4.82987 9.75722 4.81291 9.84334 4.81291C9.92947 4.81291 10.0148 4.82987 10.0943 4.86283C10.1739 4.89579 10.2462 4.9441 10.3071 5.005C10.368 5.0659 10.4163 5.1382 10.4493 5.21777C10.4822 5.29734 10.4992 5.38262 10.4992 5.46875C10.4992 5.55488 10.4822 5.64016 10.4493 5.71973C10.4163 5.7993 10.368 5.8716 10.3071 5.9325L7.46334 8.77625C7.40247 8.83721 7.33018 8.88556 7.25061 8.91856C7.17103 8.95155 7.08574 8.96853 6.99959 8.96853C6.91345 8.96853 6.82815 8.95155 6.74857 8.91856C6.669 8.88556 6.59671 8.83721 6.53584 8.77625L3.69209 5.9325C3.63119 5.8716 3.58288 5.7993 3.54992 5.71973C3.51696 5.64016 3.5 5.55488 3.5 5.46875C3.5 5.38262 3.51696 5.29734 3.54992 5.21777C3.58288 5.1382 3.63119 5.0659 3.69209 5.005C3.75299 4.9441 3.82529 4.89579 3.90486 4.86283C3.98443 4.82987 4.06972 4.81291 4.15584 4.81291C4.24197 4.81291 4.32725 4.82987 4.40682 4.86283C4.48639 4.89579 4.55869 4.9441 4.61959 5.005L6.34334 6.72788Z" fill="white" />
                    </svg> Download </a>
                  <a class="dropdown-itemm delet_nt" id="delete-{{ $file->id }}">
                  <form method="POST" action="{{ route('file6reg.delete', ['id' => $file->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?')">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A" />
                                    </svg> Delete
                                                            </button>
                                                        </form>
                                                       
                                                 </a>
                    
                   
                </div>
                <a class="dropdown-itemm rename_nt" data-bs-toggle="modal" data-bs-target="#edit_histry_7">
                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.75 9.33323L6.41667 11.6666H12.25V9.33323H8.75ZM7.035 4.19406L1.75 9.47906V11.6666H3.9375L9.2225 6.38156L7.035 4.19406ZM10.9142 4.6899C11.1417 4.4624 11.1417 4.08323 10.9142 3.8674L9.54917 2.5024C9.4398 2.39389 9.29198 2.33301 9.13792 2.33301C8.98385 2.33301 8.83604 2.39389 8.72667 2.5024L7.65917 3.5699L9.84667 5.7574L10.9142 4.6899Z" fill="#8D8D8D" />
                  </svg> Edit </a>
                <a class="dropdown-itemm history_nt history_click_6">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 5.3335V8.00016L9.66667 9.66683" stroke="#8D8D8D" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M2.89231 4.58076L2.39231 4.58276C2.39283 4.71456 2.44538 4.84082 2.53851 4.93408C2.63165 5.02734 2.75784 5.08005 2.88964 5.08076L2.89231 4.58076ZM4.58698 5.08876C4.65264 5.08906 4.71771 5.07643 4.77849 5.05159C4.83927 5.02674 4.89457 4.99017 4.94121 4.94396C4.98786 4.89775 5.02495 4.8428 5.05036 4.78225C5.07577 4.72171 5.089 4.65675 5.08931 4.59109C5.08962 4.52543 5.07699 4.46035 5.05214 4.39957C5.0273 4.33879 4.99072 4.2835 4.94451 4.23685C4.8983 4.19021 4.84335 4.15312 4.78281 4.12771C4.72226 4.1023 4.6573 4.08906 4.59164 4.08876L4.58698 5.08876ZM3.38364 2.88076C3.38329 2.81509 3.37001 2.75015 3.34456 2.68962C3.31911 2.62909 3.28199 2.57416 3.23531 2.52798C3.18863 2.4818 3.13332 2.44527 3.07252 2.42046C3.01172 2.39566 2.94664 2.38307 2.88098 2.38342C2.81531 2.38377 2.75037 2.39705 2.68984 2.4225C2.62931 2.44795 2.57438 2.48508 2.5282 2.53175C2.48202 2.57843 2.44549 2.63375 2.42068 2.69454C2.39588 2.75534 2.38329 2.82043 2.38364 2.88609L3.38364 2.88076ZM2.55164 7.19009C2.56122 7.12474 2.55776 7.05814 2.54146 6.99414C2.52516 6.93014 2.49634 6.87 2.45666 6.8172C2.41699 6.7644 2.36724 6.71998 2.31031 6.68651C2.25337 6.65305 2.19037 6.63119 2.12493 6.62221C2.0595 6.61322 1.99294 6.61729 1.92909 6.63418C1.86524 6.65107 1.80537 6.68044 1.75293 6.72059C1.70049 6.76075 1.65653 6.8109 1.62359 6.86814C1.59064 6.92538 1.56936 6.98858 1.56098 7.05409L2.55164 7.19009ZM12.575 3.42542C10.0283 0.878756 5.91298 0.852089 3.38298 3.38276L4.08964 4.08942C6.22298 1.95676 9.70498 1.96942 11.8683 4.13209L12.575 3.42542ZM3.42564 12.5748C5.97231 15.1214 10.0876 15.1481 12.6176 12.6174L11.911 11.9108C9.77764 14.0434 6.29564 14.0308 4.13231 11.8681L3.42564 12.5748ZM12.6176 12.6174C15.1476 10.0874 15.1216 5.97209 12.575 3.42542L11.8683 4.13209C14.031 6.29542 14.0436 9.77742 11.911 11.9108L12.6176 12.6174ZM3.38298 3.38276L2.53831 4.22676L3.24564 4.93342L4.08964 4.08942L3.38298 3.38276ZM2.88964 5.08076L4.58698 5.08876L4.59164 4.08876L2.89498 4.08076L2.88964 5.08076ZM3.39231 4.57809L3.38364 2.88076L2.38364 2.88609L2.39231 4.58276L3.39231 4.57809ZM1.56031 7.05342C1.42334 8.05514 1.52043 9.07498 1.84396 10.0329C2.1675 10.9907 2.70866 11.8606 3.42498 12.5741L4.13164 11.8674C3.52446 11.2629 3.06571 10.5259 2.79145 9.71422C2.51718 8.90253 2.43487 8.03829 2.55098 7.18942L1.56031 7.05342Z" fill="#8D8D8D" />
                  </svg> View History </a>
              </div>
            </div>
          </td>

</tr>

            <!-- model start -->
<div class="modal fade" id="edit_histry_7" tabindex="-1" role="dialog" aria-labelledby="edit_histry_7" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" style="font-weight:700">Edit Doc</h5>

                                                <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
            <span aria-hidden="true"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"/>
<rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"/>
</svg>
</span>
          </button>
                                            </div>
                                            <div class="modal-body ediit_nnt">
                                            <h3>Edit Doc</h3>
                                            <form action="{{ route('regupdateFileName6') }}" method="POST" enctype="multipart/form-data" class="upload-form"> 
                                      @csrf
                                      <input type="hidden" name="record_id1" value="{{ $file->id }}">
                                              <div class="form-grouup">
<label for="fname">File  name:</label>
<input type="text" id="file_name" name="file_name" value="{{$file->file_name}}">
</div>
<div class="form-grouup">
<label for="lname">Doc File:</label>
<input type="file" id="aoa-file" name="file" accept=".pdf,.doc,.docx" >

</div>
<div class="form-grouup">
<label for="lname">Reason for Change :</label>
<input type="textarea" id="reasons_for_change" name="reasons_for_change" value="{{$file->reasons_for_change}}" accept=".pdf,.doc,.docx" required>
</div>
<div class="form-grouup">
<button type="submit" value="Submit">Submit</button>
</div>
</form>
                                            </div>
                                        </div>
                                    </div>
                             </div>

           
    
@endforeach
@endif




<!--- 1 new row -->

@if ($pfdoc->isEmpty())             
                  
                  <tr class="">
                                          <td>
                                            <div class="finish">
                                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_511_3356)">
                                                  <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                                                </g>
                                                <defs>
                                                  <clipPath id="clip0_511_3356">
                                                    <rect width="15" height="15" fill="white" />
                                                  </clipPath>
                                                </defs>
                                              </svg>
                                            </div>
                                            <div class="unfinish">
                                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                                                <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                                              </svg>
                                            </div>
                                          </td>
                                          <td>Provident Fund (PF)</td>
                                          <td>
                                            <button class="btn btn-primary" style="border-radius:5px;" data-bs-toggle="modal" data-bs-target="#provinent_fund">
                                              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.25 12V5.8875L6.3 7.8375L5.25 6.75L9 3L12.75 6.75L11.7 7.8375L9.75 5.8875V12H8.25ZM4.5 15C4.0875 15 3.7345 14.8533 3.441 14.5597C3.1475 14.2662 3.0005 13.913 3 13.5V11.25H4.5V13.5H13.5V11.25H15V13.5C15 13.9125 14.8533 14.2657 14.5597 14.5597C14.2662 14.8538 13.913 15.0005 13.5 15H4.5Z" fill="#7E7E7E" />
                                              </svg> Upload </button>
                                            <div class="modal fade" id="provinent_fund" tabindex="-1" role="dialog" aria-labelledby="provinent_fund" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" style="font-weight:700"></h5>
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
                                                    <h3>Provident Fund (PF)</h3>
                                                    <form action="{{ route('regpfdoc') }}"" method="POST" enctype="multipart/form-data" class="upload-form"> @csrf 
                                                    <div class="file-area">
                                                      <input type="file" class="dragfile" id="spice-forms" name="file" accept=".pdf,.doc,.docx" required>
                                                      <input type="hidden" id="real_file_name" name="real_file_name" value="Provident Fund (PF)">
                                                      <input type="hidden" id="file_status" name="file_status" value="0">
                                                        <div class="file-dummy">
                                                          <div class="success">Great, your files are selected. Keep on.</div>
                                                          <div class="default">
                                                            <span class="upload_icon">
                                                              <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88">
                                                                <title>file-upload</title>
                                                                <path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z" />
                                                              </svg>
                                                            </span> Drag and Drop files here or <span class="fille">Choose File</span>
                                                          </div>
                                                        </div>
                                                        <br><div class="selected-file"></div>
                                                      </div>
                                                      <span class="basic-file">Note:- file|mimes:pdf,doc,docx|max size:2048kb</span>
                                                      <button class="btn btn-primary" style="border-radius:5px;" type="submit">Upload</button>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </td>
                                          <td></td>
                                          <td>
                                            
                                          </td>
                                        </tr> 
                 
              
                 
              
              
                                      @else
                  <!-- If records exist in the collection -->
                  @foreach($pfdoc as $file)
                  
                  <tr class="active">
              
              <td>
                  <div class="finish">
                      <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <g clip-path="url(#clip0_511_3356)">
                              <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                          </g>
                          <defs>
                              <clipPath id="clip0_511_3356">
                                  <rect width="15" height="15" fill="white" />
                              </clipPath>
                          </defs>
                      </svg>
                  </div>
                  <div class="unfinish">
                      <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                          <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                      </svg>
                  </div>
              </td>
              <td>
              
                          {{$file->real_file_name}}
                      
              </td>
              <td>
                 
                  
                      {{$file->file_type}}
                 
                 
              </td>
              @php
              $fileSizeKB = round($file->file_size / 1024, 2) ; // Convert bytes to KB and round to 2 decimal places
              @endphp
                          <td>{{$fileSizeKB }} KB </td>
              
                          <td>
                          <div class="dropdown" >
                            <button onclick="toggleDropdown()" class="dropbtn show_pp">
                              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D" />
                                <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D" />
                                <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D" />
                              </svg>
                            </button>
                            <div id="myDropdown" class="dropdown-content"> <div class="down_del">
                                <a class=" dropdown-itemm dnlod_nt" href="{{ route('download-reg6pfdoc-file', ['id' => $file->id]) }}">
                                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.40625 12.25C2.00014 12.25 1.61066 12.0887 1.32349 11.8015C1.03633 11.5143 0.875 11.1249 0.875 10.7188V8.53125C0.875 8.3572 0.94414 8.19028 1.06721 8.06721C1.19028 7.94414 1.3572 7.875 1.53125 7.875C1.7053 7.875 1.87222 7.94414 1.99529 8.06721C2.11836 8.19028 2.1875 8.3572 2.1875 8.53125V10.7188C2.1875 10.8395 2.2855 10.9375 2.40625 10.9375H11.5938C11.6518 10.9375 11.7074 10.9145 11.7484 10.8734C11.7895 10.8324 11.8125 10.7768 11.8125 10.7188V8.53125C11.8125 8.3572 11.8816 8.19028 12.0047 8.06721C12.1278 7.94414 12.2947 7.875 12.4688 7.875C12.6428 7.875 12.8097 7.94414 12.9328 8.06721C13.0559 8.19028 13.125 8.3572 13.125 8.53125V10.7188C13.125 11.1249 12.9637 11.5143 12.6765 11.8015C12.3893 12.0887 11.9999 12.25 11.5938 12.25H2.40625Z" fill="white" />
                                    <path d="M6.34334 6.72788V1.75C6.34334 1.57595 6.41248 1.40903 6.53555 1.28596C6.65862 1.16289 6.82554 1.09375 6.99959 1.09375C7.17364 1.09375 7.34056 1.16289 7.46363 1.28596C7.5867 1.40903 7.65584 1.57595 7.65584 1.75V6.72788L9.37959 5.005C9.44049 4.9441 9.51279 4.89579 9.59236 4.86283C9.67193 4.82987 9.75722 4.81291 9.84334 4.81291C9.92947 4.81291 10.0148 4.82987 10.0943 4.86283C10.1739 4.89579 10.2462 4.9441 10.3071 5.005C10.368 5.0659 10.4163 5.1382 10.4493 5.21777C10.4822 5.29734 10.4992 5.38262 10.4992 5.46875C10.4992 5.55488 10.4822 5.64016 10.4493 5.71973C10.4163 5.7993 10.368 5.8716 10.3071 5.9325L7.46334 8.77625C7.40247 8.83721 7.33018 8.88556 7.25061 8.91856C7.17103 8.95155 7.08574 8.96853 6.99959 8.96853C6.91345 8.96853 6.82815 8.95155 6.74857 8.91856C6.669 8.88556 6.59671 8.83721 6.53584 8.77625L3.69209 5.9325C3.63119 5.8716 3.58288 5.7993 3.54992 5.71973C3.51696 5.64016 3.5 5.55488 3.5 5.46875C3.5 5.38262 3.51696 5.29734 3.54992 5.21777C3.58288 5.1382 3.63119 5.0659 3.69209 5.005C3.75299 4.9441 3.82529 4.89579 3.90486 4.86283C3.98443 4.82987 4.06972 4.81291 4.15584 4.81291C4.24197 4.81291 4.32725 4.82987 4.40682 4.86283C4.48639 4.89579 4.55869 4.9441 4.61959 5.005L6.34334 6.72788Z" fill="white" />
                                  </svg> Download </a>
                                <a class="dropdown-itemm delet_nt" id="delete-{{ $file->id }}">
                                <form method="POST" action="{{ route('file6regpfdoc.delete', ['id' => $file->id]) }}">
                                                          @csrf
                                                          @method('DELETE')
                                                          <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?')">
                                                                          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A" />
                                                  </svg> Delete
                                                                          </button>
                                                                      </form>
                                                                     
                                                               </a>
                                  
                                 
                              </div>
                              <a class="dropdown-itemm rename_nt" data-bs-toggle="modal" data-bs-target="#edit_histry_8">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M8.75 9.33323L6.41667 11.6666H12.25V9.33323H8.75ZM7.035 4.19406L1.75 9.47906V11.6666H3.9375L9.2225 6.38156L7.035 4.19406ZM10.9142 4.6899C11.1417 4.4624 11.1417 4.08323 10.9142 3.8674L9.54917 2.5024C9.4398 2.39389 9.29198 2.33301 9.13792 2.33301C8.98385 2.33301 8.83604 2.39389 8.72667 2.5024L7.65917 3.5699L9.84667 5.7574L10.9142 4.6899Z" fill="#8D8D8D" />
                                </svg> Edit </a>
                              <a class="dropdown-itemm history_nt history_click_08">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M8 5.3335V8.00016L9.66667 9.66683" stroke="#8D8D8D" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round" />
                                  <path d="M2.89231 4.58076L2.39231 4.58276C2.39283 4.71456 2.44538 4.84082 2.53851 4.93408C2.63165 5.02734 2.75784 5.08005 2.88964 5.08076L2.89231 4.58076ZM4.58698 5.08876C4.65264 5.08906 4.71771 5.07643 4.77849 5.05159C4.83927 5.02674 4.89457 4.99017 4.94121 4.94396C4.98786 4.89775 5.02495 4.8428 5.05036 4.78225C5.07577 4.72171 5.089 4.65675 5.08931 4.59109C5.08962 4.52543 5.07699 4.46035 5.05214 4.39957C5.0273 4.33879 4.99072 4.2835 4.94451 4.23685C4.8983 4.19021 4.84335 4.15312 4.78281 4.12771C4.72226 4.1023 4.6573 4.08906 4.59164 4.08876L4.58698 5.08876ZM3.38364 2.88076C3.38329 2.81509 3.37001 2.75015 3.34456 2.68962C3.31911 2.62909 3.28199 2.57416 3.23531 2.52798C3.18863 2.4818 3.13332 2.44527 3.07252 2.42046C3.01172 2.39566 2.94664 2.38307 2.88098 2.38342C2.81531 2.38377 2.75037 2.39705 2.68984 2.4225C2.62931 2.44795 2.57438 2.48508 2.5282 2.53175C2.48202 2.57843 2.44549 2.63375 2.42068 2.69454C2.39588 2.75534 2.38329 2.82043 2.38364 2.88609L3.38364 2.88076ZM2.55164 7.19009C2.56122 7.12474 2.55776 7.05814 2.54146 6.99414C2.52516 6.93014 2.49634 6.87 2.45666 6.8172C2.41699 6.7644 2.36724 6.71998 2.31031 6.68651C2.25337 6.65305 2.19037 6.63119 2.12493 6.62221C2.0595 6.61322 1.99294 6.61729 1.92909 6.63418C1.86524 6.65107 1.80537 6.68044 1.75293 6.72059C1.70049 6.76075 1.65653 6.8109 1.62359 6.86814C1.59064 6.92538 1.56936 6.98858 1.56098 7.05409L2.55164 7.19009ZM12.575 3.42542C10.0283 0.878756 5.91298 0.852089 3.38298 3.38276L4.08964 4.08942C6.22298 1.95676 9.70498 1.96942 11.8683 4.13209L12.575 3.42542ZM3.42564 12.5748C5.97231 15.1214 10.0876 15.1481 12.6176 12.6174L11.911 11.9108C9.77764 14.0434 6.29564 14.0308 4.13231 11.8681L3.42564 12.5748ZM12.6176 12.6174C15.1476 10.0874 15.1216 5.97209 12.575 3.42542L11.8683 4.13209C14.031 6.29542 14.0436 9.77742 11.911 11.9108L12.6176 12.6174ZM3.38298 3.38276L2.53831 4.22676L3.24564 4.93342L4.08964 4.08942L3.38298 3.38276ZM2.88964 5.08076L4.58698 5.08876L4.59164 4.08876L2.89498 4.08076L2.88964 5.08076ZM3.39231 4.57809L3.38364 2.88076L2.38364 2.88609L2.39231 4.58276L3.39231 4.57809ZM1.56031 7.05342C1.42334 8.05514 1.52043 9.07498 1.84396 10.0329C2.1675 10.9907 2.70866 11.8606 3.42498 12.5741L4.13164 11.8674C3.52446 11.2629 3.06571 10.5259 2.79145 9.71422C2.51718 8.90253 2.43487 8.03829 2.55098 7.18942L1.56031 7.05342Z" fill="#8D8D8D" />
                                </svg> View History </a>
                            </div>
                          </div>
                        </td>
              
              </tr>
              
                          <!-- model start -->
              <div class="modal fade" id="edit_histry_8" tabindex="-1" role="dialog" aria-labelledby="edit_histry_8" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                              <h5 class="modal-title" style="font-weight:700">Edit Doc</h5>
              
                                                              <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                          <span aria-hidden="true"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"/>
              <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"/>
              </svg>
              </span>
                        </button>
                                                          </div>
                                                          <div class="modal-body ediit_nnt">
                                                          <h3>Edit Doc</h3>
                                                          <form action="{{ route('regupdateFileName6pfdoc') }}" method="POST" enctype="multipart/form-data" class="upload-form"> 
                                                    @csrf
                                                    <input type="hidden" name="record_id1" value="{{ $file->id }}">
                                                            <div class="form-grouup">
              <label for="fname">File  name:</label>
              <input type="text" id="file_name" name="file_name" value="{{$file->file_name}}">
              </div>
              <div class="form-grouup">
              <label for="lname">Doc File:</label>
              <input type="file" id="aoa-file" name="file" accept=".pdf,.doc,.docx" >
              
              </div>
              <div class="form-grouup">
              <label for="lname">Reason for Change :</label>
              <input type="textarea" id="reasons_for_change" name="reasons_for_change" value="{{$file->reasons_for_change}}" accept=".pdf,.doc,.docx" required>
              </div>
              <div class="form-grouup">
              <button type="submit" value="Submit">Submit</button>
              </div>
              </form>
                                                          </div>
                                                      </div>
                                                  </div>
                                           </div>
              
                         
                  
              @endforeach
              @endif



              <!--- end new row -->



              <!--- 2 new row -->

@if ($esidoc->isEmpty())             
                  
                  <tr class="">
                                          <td>
                                            <div class="finish">
                                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_511_3356)">
                                                  <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                                                </g>
                                                <defs>
                                                  <clipPath id="clip0_511_3356">
                                                    <rect width="15" height="15" fill="white" />
                                                  </clipPath>
                                                </defs>
                                              </svg>
                                            </div>
                                            <div class="unfinish">
                                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                                                <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                                              </svg>
                                            </div>
                                          </td>
                                          <td>Employee State Insurance (ESI)</td>
                                          <td>
                                            <button class="btn btn-primary" style="border-radius:5px;" data-bs-toggle="modal" data-bs-target="#es_insurance">
                                              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.25 12V5.8875L6.3 7.8375L5.25 6.75L9 3L12.75 6.75L11.7 7.8375L9.75 5.8875V12H8.25ZM4.5 15C4.0875 15 3.7345 14.8533 3.441 14.5597C3.1475 14.2662 3.0005 13.913 3 13.5V11.25H4.5V13.5H13.5V11.25H15V13.5C15 13.9125 14.8533 14.2657 14.5597 14.5597C14.2662 14.8538 13.913 15.0005 13.5 15H4.5Z" fill="#7E7E7E" />
                                              </svg> Upload </button>
                                            <div class="modal fade" id="es_insurance" tabindex="-1" role="dialog" aria-labelledby="es_insurance" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" style="font-weight:700"></h5>
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
                                                    <h3>Employee State Insurance (ESI)</h3>
                                                    <form action="{{ route('regesidoc') }}"" method="POST" enctype="multipart/form-data" class="upload-form"> @csrf 
                                                    <div class="file-area">
                                                      <input type="file" class="dragfile" id="spice-forms" name="file" accept=".pdf,.doc,.docx" required>
                                                      <input type="hidden" id="real_file_name" name="real_file_name" value="Employee State Insurance (ESI)">
                                                      <input type="hidden" id="file_status" name="file_status" value="0">
                                                        <div class="file-dummy">
                                                          <div class="success">Great, your files are selected. Keep on.</div>
                                                          <div class="default">
                                                            <span class="upload_icon">
                                                              <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88">
                                                                <title>file-upload</title>
                                                                <path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z" />
                                                              </svg>
                                                            </span> Drag and Drop files here or <span class="fille">Choose File</span>
                                                          </div>
                                                        </div>
                                                        <br><div class="selected-file"></div>
                                                      </div>
                                                      <span class="basic-file">Note:- file|mimes:pdf,doc,docx|max size:2048kb</span>
                                                      <button class="btn btn-primary" style="border-radius:5px;" type="submit">Upload</button>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </td>
                                          <td></td>
                                          <td>
                                            
                                          </td>
                                        </tr> 
                 
              
                 
              
              
                                      @else
                  <!-- If records exist in the collection -->
                  @foreach($esidoc as $file)
                  
                  <tr class="active">
              
              <td>
                  <div class="finish">
                      <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <g clip-path="url(#clip0_511_3356)">
                              <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                          </g>
                          <defs>
                              <clipPath id="clip0_511_3356">
                                  <rect width="15" height="15" fill="white" />
                              </clipPath>
                          </defs>
                      </svg>
                  </div>
                  <div class="unfinish">
                      <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                          <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                      </svg>
                  </div>
              </td>
              <td>
              
                          {{$file->real_file_name}}
                      
              </td>
              <td>
                 
                  
                      {{$file->file_type}}
                 
                 
              </td>
              @php
              $fileSizeKB = round($file->file_size / 1024, 2) ; // Convert bytes to KB and round to 2 decimal places
              @endphp
                          <td>{{$fileSizeKB }} KB </td>
              
                          <td>
                          <div class="dropdown" >
                            <button onclick="toggleDropdown()" class="dropbtn show_pp">
                              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D" />
                                <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D" />
                                <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D" />
                              </svg>
                            </button>
                            <div id="myDropdown" class="dropdown-content"> <div class="down_del">
                                <a class=" dropdown-itemm dnlod_nt" href="{{ route('download-reg6esi-file', ['id' => $file->id]) }}">
                                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.40625 12.25C2.00014 12.25 1.61066 12.0887 1.32349 11.8015C1.03633 11.5143 0.875 11.1249 0.875 10.7188V8.53125C0.875 8.3572 0.94414 8.19028 1.06721 8.06721C1.19028 7.94414 1.3572 7.875 1.53125 7.875C1.7053 7.875 1.87222 7.94414 1.99529 8.06721C2.11836 8.19028 2.1875 8.3572 2.1875 8.53125V10.7188C2.1875 10.8395 2.2855 10.9375 2.40625 10.9375H11.5938C11.6518 10.9375 11.7074 10.9145 11.7484 10.8734C11.7895 10.8324 11.8125 10.7768 11.8125 10.7188V8.53125C11.8125 8.3572 11.8816 8.19028 12.0047 8.06721C12.1278 7.94414 12.2947 7.875 12.4688 7.875C12.6428 7.875 12.8097 7.94414 12.9328 8.06721C13.0559 8.19028 13.125 8.3572 13.125 8.53125V10.7188C13.125 11.1249 12.9637 11.5143 12.6765 11.8015C12.3893 12.0887 11.9999 12.25 11.5938 12.25H2.40625Z" fill="white" />
                                    <path d="M6.34334 6.72788V1.75C6.34334 1.57595 6.41248 1.40903 6.53555 1.28596C6.65862 1.16289 6.82554 1.09375 6.99959 1.09375C7.17364 1.09375 7.34056 1.16289 7.46363 1.28596C7.5867 1.40903 7.65584 1.57595 7.65584 1.75V6.72788L9.37959 5.005C9.44049 4.9441 9.51279 4.89579 9.59236 4.86283C9.67193 4.82987 9.75722 4.81291 9.84334 4.81291C9.92947 4.81291 10.0148 4.82987 10.0943 4.86283C10.1739 4.89579 10.2462 4.9441 10.3071 5.005C10.368 5.0659 10.4163 5.1382 10.4493 5.21777C10.4822 5.29734 10.4992 5.38262 10.4992 5.46875C10.4992 5.55488 10.4822 5.64016 10.4493 5.71973C10.4163 5.7993 10.368 5.8716 10.3071 5.9325L7.46334 8.77625C7.40247 8.83721 7.33018 8.88556 7.25061 8.91856C7.17103 8.95155 7.08574 8.96853 6.99959 8.96853C6.91345 8.96853 6.82815 8.95155 6.74857 8.91856C6.669 8.88556 6.59671 8.83721 6.53584 8.77625L3.69209 5.9325C3.63119 5.8716 3.58288 5.7993 3.54992 5.71973C3.51696 5.64016 3.5 5.55488 3.5 5.46875C3.5 5.38262 3.51696 5.29734 3.54992 5.21777C3.58288 5.1382 3.63119 5.0659 3.69209 5.005C3.75299 4.9441 3.82529 4.89579 3.90486 4.86283C3.98443 4.82987 4.06972 4.81291 4.15584 4.81291C4.24197 4.81291 4.32725 4.82987 4.40682 4.86283C4.48639 4.89579 4.55869 4.9441 4.61959 5.005L6.34334 6.72788Z" fill="white" />
                                  </svg> Download </a>
                                <a class="dropdown-itemm delet_nt" id="delete-{{ $file->id }}">
                                <form method="POST" action="{{ route('file6regesi.delete', ['id' => $file->id]) }}">
                                                          @csrf
                                                          @method('DELETE')
                                                          <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?')">
                                                                          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A" />
                                                  </svg> Delete
                                                                          </button>
                                                                      </form>
                                                                     
                                                               </a>
                                  
                                 
                              </div>
                              <a class="dropdown-itemm rename_nt" data-bs-toggle="modal" data-bs-target="#edit_histry_9">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M8.75 9.33323L6.41667 11.6666H12.25V9.33323H8.75ZM7.035 4.19406L1.75 9.47906V11.6666H3.9375L9.2225 6.38156L7.035 4.19406ZM10.9142 4.6899C11.1417 4.4624 11.1417 4.08323 10.9142 3.8674L9.54917 2.5024C9.4398 2.39389 9.29198 2.33301 9.13792 2.33301C8.98385 2.33301 8.83604 2.39389 8.72667 2.5024L7.65917 3.5699L9.84667 5.7574L10.9142 4.6899Z" fill="#8D8D8D" />
                                </svg> Edit </a>
                              <a class="dropdown-itemm history_nt history_click_09">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M8 5.3335V8.00016L9.66667 9.66683" stroke="#8D8D8D" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round" />
                                  <path d="M2.89231 4.58076L2.39231 4.58276C2.39283 4.71456 2.44538 4.84082 2.53851 4.93408C2.63165 5.02734 2.75784 5.08005 2.88964 5.08076L2.89231 4.58076ZM4.58698 5.08876C4.65264 5.08906 4.71771 5.07643 4.77849 5.05159C4.83927 5.02674 4.89457 4.99017 4.94121 4.94396C4.98786 4.89775 5.02495 4.8428 5.05036 4.78225C5.07577 4.72171 5.089 4.65675 5.08931 4.59109C5.08962 4.52543 5.07699 4.46035 5.05214 4.39957C5.0273 4.33879 4.99072 4.2835 4.94451 4.23685C4.8983 4.19021 4.84335 4.15312 4.78281 4.12771C4.72226 4.1023 4.6573 4.08906 4.59164 4.08876L4.58698 5.08876ZM3.38364 2.88076C3.38329 2.81509 3.37001 2.75015 3.34456 2.68962C3.31911 2.62909 3.28199 2.57416 3.23531 2.52798C3.18863 2.4818 3.13332 2.44527 3.07252 2.42046C3.01172 2.39566 2.94664 2.38307 2.88098 2.38342C2.81531 2.38377 2.75037 2.39705 2.68984 2.4225C2.62931 2.44795 2.57438 2.48508 2.5282 2.53175C2.48202 2.57843 2.44549 2.63375 2.42068 2.69454C2.39588 2.75534 2.38329 2.82043 2.38364 2.88609L3.38364 2.88076ZM2.55164 7.19009C2.56122 7.12474 2.55776 7.05814 2.54146 6.99414C2.52516 6.93014 2.49634 6.87 2.45666 6.8172C2.41699 6.7644 2.36724 6.71998 2.31031 6.68651C2.25337 6.65305 2.19037 6.63119 2.12493 6.62221C2.0595 6.61322 1.99294 6.61729 1.92909 6.63418C1.86524 6.65107 1.80537 6.68044 1.75293 6.72059C1.70049 6.76075 1.65653 6.8109 1.62359 6.86814C1.59064 6.92538 1.56936 6.98858 1.56098 7.05409L2.55164 7.19009ZM12.575 3.42542C10.0283 0.878756 5.91298 0.852089 3.38298 3.38276L4.08964 4.08942C6.22298 1.95676 9.70498 1.96942 11.8683 4.13209L12.575 3.42542ZM3.42564 12.5748C5.97231 15.1214 10.0876 15.1481 12.6176 12.6174L11.911 11.9108C9.77764 14.0434 6.29564 14.0308 4.13231 11.8681L3.42564 12.5748ZM12.6176 12.6174C15.1476 10.0874 15.1216 5.97209 12.575 3.42542L11.8683 4.13209C14.031 6.29542 14.0436 9.77742 11.911 11.9108L12.6176 12.6174ZM3.38298 3.38276L2.53831 4.22676L3.24564 4.93342L4.08964 4.08942L3.38298 3.38276ZM2.88964 5.08076L4.58698 5.08876L4.59164 4.08876L2.89498 4.08076L2.88964 5.08076ZM3.39231 4.57809L3.38364 2.88076L2.38364 2.88609L2.39231 4.58276L3.39231 4.57809ZM1.56031 7.05342C1.42334 8.05514 1.52043 9.07498 1.84396 10.0329C2.1675 10.9907 2.70866 11.8606 3.42498 12.5741L4.13164 11.8674C3.52446 11.2629 3.06571 10.5259 2.79145 9.71422C2.51718 8.90253 2.43487 8.03829 2.55098 7.18942L1.56031 7.05342Z" fill="#8D8D8D" />
                                </svg> View History </a>
                            </div>
                          </div>
                        </td>
              
              </tr>
              
                          <!-- model start -->
              <div class="modal fade" id="edit_histry_8" tabindex="-1" role="dialog" aria-labelledby="edit_histry_8" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                              <h5 class="modal-title" style="font-weight:700">Edit Doc</h5>
              
                                                              <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                          <span aria-hidden="true"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"/>
              <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"/>
              </svg>
              </span>
                        </button>
                                                          </div>
                                                          <div class="modal-body ediit_nnt">
                                                          <h3>Edit Doc</h3>
                                                          <form action="{{ route('regupdateFileName6esi') }}" method="POST" enctype="multipart/form-data" class="upload-form"> 
                                                    @csrf
                                                    <input type="hidden" name="record_id1" value="{{ $file->id }}">
                                                            <div class="form-grouup">
              <label for="fname">File  name:</label>
              <input type="text" id="file_name" name="file_name" value="{{$file->file_name}}">
              </div>
              <div class="form-grouup">
              <label for="lname">Doc File:</label>
              <input type="file" id="aoa-file" name="file" accept=".pdf,.doc,.docx" >
              
              </div>
              <div class="form-grouup">
              <label for="lname">Reason for Change :</label>
              <input type="textarea" id="reasons_for_change" name="reasons_for_change" value="{{$file->reasons_for_change}}" accept=".pdf,.doc,.docx" required>
              </div>
              <div class="form-grouup">
              <button type="submit" value="Submit">Submit</button>
              </div>
              </form>
                                                          </div>
                                                      </div>
                                                  </div>
                                           </div>
              
                         
                  
              @endforeach
              @endif



              <!--- end new row -->



              <!--- 3 new row -->

@if ($ptdoc->isEmpty())             
                  
                  <tr class="">
                                          <td>
                                            <div class="finish">
                                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_511_3356)">
                                                  <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                                                </g>
                                                <defs>
                                                  <clipPath id="clip0_511_3356">
                                                    <rect width="15" height="15" fill="white" />
                                                  </clipPath>
                                                </defs>
                                              </svg>
                                            </div>
                                            <div class="unfinish">
                                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                                                <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                                              </svg>
                                            </div>
                                          </td>
                                          <td>Professional Tax</td>
                                          <td>
                                            <button class="btn btn-primary" style="border-radius:5px;" data-bs-toggle="modal" data-bs-target="#professional_tax">
                                              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.25 12V5.8875L6.3 7.8375L5.25 6.75L9 3L12.75 6.75L11.7 7.8375L9.75 5.8875V12H8.25ZM4.5 15C4.0875 15 3.7345 14.8533 3.441 14.5597C3.1475 14.2662 3.0005 13.913 3 13.5V11.25H4.5V13.5H13.5V11.25H15V13.5C15 13.9125 14.8533 14.2657 14.5597 14.5597C14.2662 14.8538 13.913 15.0005 13.5 15H4.5Z" fill="#7E7E7E" />
                                              </svg> Upload </button>
                                            <div class="modal fade" id="professional_tax" tabindex="-1" role="dialog" aria-labelledby="professional_tax" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" style="font-weight:700"></h5>
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
                                                    <h3>Professional Tax</h3>
                                                    <form action="{{ route('regptdoc') }}"" method="POST" enctype="multipart/form-data" class="upload-form"> @csrf 
                                                    <div class="file-area">
                                                      <input type="file" class="dragfile" id="spice-forms" name="file" accept=".pdf,.doc,.docx" required>
                                                      <input type="hidden" id="real_file_name" name="real_file_name" value="Professional Tax">
                                                      <input type="hidden" id="file_status" name="file_status" value="0">
                                                        <div class="file-dummy">
                                                          <div class="success">Great, your files are selected. Keep on.</div>
                                                          <div class="default">
                                                            <span class="upload_icon">
                                                              <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88">
                                                                <title>file-upload</title>
                                                                <path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z" />
                                                              </svg>
                                                            </span> Drag and Drop files here or <span class="fille">Choose File</span>
                                                          </div>
                                                        </div>
                                                        <br><div class="selected-file"></div>
                                                      </div>
                                                      <span class="basic-file">Note:- file|mimes:pdf,doc,docx|max size:2048kb</span>
                                                      <button class="btn btn-primary" style="border-radius:5px;" type="submit">Upload</button>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </td>
                                          <td></td>
                                          <td>
                                            
                                          </td>
                                        </tr> 
                 
              
                 
              
              
                                      @else
                  <!-- If records exist in the collection -->
                  @foreach($ptdoc as $file)
                  
                  <tr class="active">
              
              <td>
                  <div class="finish">
                      <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <g clip-path="url(#clip0_511_3356)">
                              <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                          </g>
                          <defs>
                              <clipPath id="clip0_511_3356">
                                  <rect width="15" height="15" fill="white" />
                              </clipPath>
                          </defs>
                      </svg>
                  </div>
                  <div class="unfinish">
                      <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                          <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                      </svg>
                  </div>
              </td>
              <td>
              
                          {{$file->real_file_name}}
                      
              </td>
              <td>
                 
                  
                      {{$file->file_type}}
                 
                 
              </td>
              @php
              $fileSizeKB = round($file->file_size / 1024, 2) ; // Convert bytes to KB and round to 2 decimal places
              @endphp
                          <td>{{$fileSizeKB }} KB </td>
              
                          <td>
                          <div class="dropdown" >
                            <button onclick="toggleDropdown()" class="dropbtn show_pp">
                              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D" />
                                <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D" />
                                <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D" />
                              </svg>
                            </button>
                            <div id="myDropdown" class="dropdown-content"> <div class="down_del">
                                <a class=" dropdown-itemm dnlod_nt" href="{{ route('download-reg6pt-file', ['id' => $file->id]) }}">
                                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.40625 12.25C2.00014 12.25 1.61066 12.0887 1.32349 11.8015C1.03633 11.5143 0.875 11.1249 0.875 10.7188V8.53125C0.875 8.3572 0.94414 8.19028 1.06721 8.06721C1.19028 7.94414 1.3572 7.875 1.53125 7.875C1.7053 7.875 1.87222 7.94414 1.99529 8.06721C2.11836 8.19028 2.1875 8.3572 2.1875 8.53125V10.7188C2.1875 10.8395 2.2855 10.9375 2.40625 10.9375H11.5938C11.6518 10.9375 11.7074 10.9145 11.7484 10.8734C11.7895 10.8324 11.8125 10.7768 11.8125 10.7188V8.53125C11.8125 8.3572 11.8816 8.19028 12.0047 8.06721C12.1278 7.94414 12.2947 7.875 12.4688 7.875C12.6428 7.875 12.8097 7.94414 12.9328 8.06721C13.0559 8.19028 13.125 8.3572 13.125 8.53125V10.7188C13.125 11.1249 12.9637 11.5143 12.6765 11.8015C12.3893 12.0887 11.9999 12.25 11.5938 12.25H2.40625Z" fill="white" />
                                    <path d="M6.34334 6.72788V1.75C6.34334 1.57595 6.41248 1.40903 6.53555 1.28596C6.65862 1.16289 6.82554 1.09375 6.99959 1.09375C7.17364 1.09375 7.34056 1.16289 7.46363 1.28596C7.5867 1.40903 7.65584 1.57595 7.65584 1.75V6.72788L9.37959 5.005C9.44049 4.9441 9.51279 4.89579 9.59236 4.86283C9.67193 4.82987 9.75722 4.81291 9.84334 4.81291C9.92947 4.81291 10.0148 4.82987 10.0943 4.86283C10.1739 4.89579 10.2462 4.9441 10.3071 5.005C10.368 5.0659 10.4163 5.1382 10.4493 5.21777C10.4822 5.29734 10.4992 5.38262 10.4992 5.46875C10.4992 5.55488 10.4822 5.64016 10.4493 5.71973C10.4163 5.7993 10.368 5.8716 10.3071 5.9325L7.46334 8.77625C7.40247 8.83721 7.33018 8.88556 7.25061 8.91856C7.17103 8.95155 7.08574 8.96853 6.99959 8.96853C6.91345 8.96853 6.82815 8.95155 6.74857 8.91856C6.669 8.88556 6.59671 8.83721 6.53584 8.77625L3.69209 5.9325C3.63119 5.8716 3.58288 5.7993 3.54992 5.71973C3.51696 5.64016 3.5 5.55488 3.5 5.46875C3.5 5.38262 3.51696 5.29734 3.54992 5.21777C3.58288 5.1382 3.63119 5.0659 3.69209 5.005C3.75299 4.9441 3.82529 4.89579 3.90486 4.86283C3.98443 4.82987 4.06972 4.81291 4.15584 4.81291C4.24197 4.81291 4.32725 4.82987 4.40682 4.86283C4.48639 4.89579 4.55869 4.9441 4.61959 5.005L6.34334 6.72788Z" fill="white" />
                                  </svg> Download </a>
                                <a class="dropdown-itemm delet_nt" id="delete-{{ $file->id }}">
                                <form method="POST" action="{{ route('file6regpt.delete', ['id' => $file->id]) }}">
                                                          @csrf
                                                          @method('DELETE')
                                                          <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?')">
                                                                          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A" />
                                                  </svg> Delete
                                                                          </button>
                                                                      </form>
                                                                     
                                                               </a>
                                  
                                 
                              </div>
                              <a class="dropdown-itemm rename_nt" data-bs-toggle="modal" data-bs-target="#edit_histry_10">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M8.75 9.33323L6.41667 11.6666H12.25V9.33323H8.75ZM7.035 4.19406L1.75 9.47906V11.6666H3.9375L9.2225 6.38156L7.035 4.19406ZM10.9142 4.6899C11.1417 4.4624 11.1417 4.08323 10.9142 3.8674L9.54917 2.5024C9.4398 2.39389 9.29198 2.33301 9.13792 2.33301C8.98385 2.33301 8.83604 2.39389 8.72667 2.5024L7.65917 3.5699L9.84667 5.7574L10.9142 4.6899Z" fill="#8D8D8D" />
                                </svg> Edit </a>
                              <a class="dropdown-itemm history_nt history_click_010">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M8 5.3335V8.00016L9.66667 9.66683" stroke="#8D8D8D" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round" />
                                  <path d="M2.89231 4.58076L2.39231 4.58276C2.39283 4.71456 2.44538 4.84082 2.53851 4.93408C2.63165 5.02734 2.75784 5.08005 2.88964 5.08076L2.89231 4.58076ZM4.58698 5.08876C4.65264 5.08906 4.71771 5.07643 4.77849 5.05159C4.83927 5.02674 4.89457 4.99017 4.94121 4.94396C4.98786 4.89775 5.02495 4.8428 5.05036 4.78225C5.07577 4.72171 5.089 4.65675 5.08931 4.59109C5.08962 4.52543 5.07699 4.46035 5.05214 4.39957C5.0273 4.33879 4.99072 4.2835 4.94451 4.23685C4.8983 4.19021 4.84335 4.15312 4.78281 4.12771C4.72226 4.1023 4.6573 4.08906 4.59164 4.08876L4.58698 5.08876ZM3.38364 2.88076C3.38329 2.81509 3.37001 2.75015 3.34456 2.68962C3.31911 2.62909 3.28199 2.57416 3.23531 2.52798C3.18863 2.4818 3.13332 2.44527 3.07252 2.42046C3.01172 2.39566 2.94664 2.38307 2.88098 2.38342C2.81531 2.38377 2.75037 2.39705 2.68984 2.4225C2.62931 2.44795 2.57438 2.48508 2.5282 2.53175C2.48202 2.57843 2.44549 2.63375 2.42068 2.69454C2.39588 2.75534 2.38329 2.82043 2.38364 2.88609L3.38364 2.88076ZM2.55164 7.19009C2.56122 7.12474 2.55776 7.05814 2.54146 6.99414C2.52516 6.93014 2.49634 6.87 2.45666 6.8172C2.41699 6.7644 2.36724 6.71998 2.31031 6.68651C2.25337 6.65305 2.19037 6.63119 2.12493 6.62221C2.0595 6.61322 1.99294 6.61729 1.92909 6.63418C1.86524 6.65107 1.80537 6.68044 1.75293 6.72059C1.70049 6.76075 1.65653 6.8109 1.62359 6.86814C1.59064 6.92538 1.56936 6.98858 1.56098 7.05409L2.55164 7.19009ZM12.575 3.42542C10.0283 0.878756 5.91298 0.852089 3.38298 3.38276L4.08964 4.08942C6.22298 1.95676 9.70498 1.96942 11.8683 4.13209L12.575 3.42542ZM3.42564 12.5748C5.97231 15.1214 10.0876 15.1481 12.6176 12.6174L11.911 11.9108C9.77764 14.0434 6.29564 14.0308 4.13231 11.8681L3.42564 12.5748ZM12.6176 12.6174C15.1476 10.0874 15.1216 5.97209 12.575 3.42542L11.8683 4.13209C14.031 6.29542 14.0436 9.77742 11.911 11.9108L12.6176 12.6174ZM3.38298 3.38276L2.53831 4.22676L3.24564 4.93342L4.08964 4.08942L3.38298 3.38276ZM2.88964 5.08076L4.58698 5.08876L4.59164 4.08876L2.89498 4.08076L2.88964 5.08076ZM3.39231 4.57809L3.38364 2.88076L2.38364 2.88609L2.39231 4.58276L3.39231 4.57809ZM1.56031 7.05342C1.42334 8.05514 1.52043 9.07498 1.84396 10.0329C2.1675 10.9907 2.70866 11.8606 3.42498 12.5741L4.13164 11.8674C3.52446 11.2629 3.06571 10.5259 2.79145 9.71422C2.51718 8.90253 2.43487 8.03829 2.55098 7.18942L1.56031 7.05342Z" fill="#8D8D8D" />
                                </svg> View History </a>
                            </div>
                          </div>
                        </td>
              
              </tr>
              
                          <!-- model start -->
              <div class="modal fade" id="edit_histry_10" tabindex="-1" role="dialog" aria-labelledby="edit_histry_10" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                              <h5 class="modal-title" style="font-weight:700">Edit Doc</h5>
              
                                                              <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                          <span aria-hidden="true"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"/>
              <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"/>
              </svg>
              </span>
                        </button>
                                                          </div>
                                                          <div class="modal-body ediit_nnt">
                                                          <h3>Edit Doc</h3>
                                                          <form action="{{ route('regupdateFileName6pt') }}" method="POST" enctype="multipart/form-data" class="upload-form"> 
                                                    @csrf
                                                    <input type="hidden" name="record_id1" value="{{ $file->id }}">
                                                            <div class="form-grouup">
              <label for="fname">File  name:</label>
              <input type="text" id="file_name" name="file_name" value="{{$file->file_name}}">
              </div>
              <div class="form-grouup">
              <label for="lname">Doc File:</label>
              <input type="file" id="aoa-file" name="file" accept=".pdf,.doc,.docx" >
              
              </div>
              <div class="form-grouup">
              <label for="lname">Reason for Change :</label>
              <input type="textarea" id="reasons_for_change" name="reasons_for_change" value="{{$file->reasons_for_change}}" accept=".pdf,.doc,.docx" required>
              </div>
              <div class="form-grouup">
              <button type="submit" value="Submit">Submit</button>
              </div>
              </form>
                                                          </div>
                                                      </div>
                                                  </div>
                                           </div>
              
                         
                  
              @endforeach
              @endif



              <!--- end new row -->



              <!--- 4 new row -->

@if ($tldoc->isEmpty())             
                  
                  <tr class="">
                                          <td>
                                            <div class="finish">
                                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_511_3356)">
                                                  <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                                                </g>
                                                <defs>
                                                  <clipPath id="clip0_511_3356">
                                                    <rect width="15" height="15" fill="white" />
                                                  </clipPath>
                                                </defs>
                                              </svg>
                                            </div>
                                            <div class="unfinish">
                                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                                                <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                                              </svg>
                                            </div>
                                          </td>
                                          <td>Trade license</td>
                                          <td>
                                            <button class="btn btn-primary" style="border-radius:5px;" data-bs-toggle="modal" data-bs-target="#trade_licence">
                                              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.25 12V5.8875L6.3 7.8375L5.25 6.75L9 3L12.75 6.75L11.7 7.8375L9.75 5.8875V12H8.25ZM4.5 15C4.0875 15 3.7345 14.8533 3.441 14.5597C3.1475 14.2662 3.0005 13.913 3 13.5V11.25H4.5V13.5H13.5V11.25H15V13.5C15 13.9125 14.8533 14.2657 14.5597 14.5597C14.2662 14.8538 13.913 15.0005 13.5 15H4.5Z" fill="#7E7E7E" />
                                              </svg> Upload </button>
                                            <div class="modal fade" id="trade_licence" tabindex="-1" role="dialog" aria-labelledby="trade_licence" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" style="font-weight:700"></h5>
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
                                                    <h3>Trade license</h3>
                                                    <form action="{{ route('regtldoc') }}"" method="POST" enctype="multipart/form-data" class="upload-form"> @csrf 
                                                    <div class="file-area">
                                                      <input type="file" class="dragfile" id="spice-forms" name="file" accept=".pdf,.doc,.docx" required>
                                                      <input type="hidden" id="real_file_name" name="real_file_name" value="Trade license">
                                                      <input type="hidden" id="file_status" name="file_status" value="0">
                                                        <div class="file-dummy">
                                                          <div class="success">Great, your files are selected. Keep on.</div>
                                                          <div class="default">
                                                            <span class="upload_icon">
                                                              <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88">
                                                                <title>file-upload</title>
                                                                <path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z" />
                                                              </svg>
                                                            </span> Drag and Drop files here or <span class="fille">Choose File</span>
                                                          </div>
                                                        </div>
                                                        <br><div class="selected-file"></div>
                                                      </div>
                                                      <span class="basic-file">Note:- file|mimes:pdf,doc,docx|max size:2048kb</span>
                                                      <button class="btn btn-primary" style="border-radius:5px;" type="submit">Upload</button>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </td>
                                          <td></td>
                                          <td>
                                            
                                          </td>
                                        </tr> 
                 
              
                 
              
              
                                      @else
                  <!-- If records exist in the collection -->
                  @foreach($tldoc as $file)
                  
                  <tr class="active">
              
              <td>
                  <div class="finish">
                      <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <g clip-path="url(#clip0_511_3356)">
                              <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                          </g>
                          <defs>
                              <clipPath id="clip0_511_3356">
                                  <rect width="15" height="15" fill="white" />
                              </clipPath>
                          </defs>
                      </svg>
                  </div>
                  <div class="unfinish">
                      <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                          <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                      </svg>
                  </div>
              </td>
              <td>
              
                          {{$file->real_file_name}}
                      
              </td>
              <td>
                 
                  
                      {{$file->file_type}}
                 
                 
              </td>
              @php
              $fileSizeKB = round($file->file_size / 1024, 2) ; // Convert bytes to KB and round to 2 decimal places
              @endphp
                          <td>{{$fileSizeKB }} KB </td>
              
                          <td>
                          <div class="dropdown" >
                            <button onclick="toggleDropdown()" class="dropbtn show_pp">
                              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D" />
                                <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D" />
                                <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D" />
                              </svg>
                            </button>
                            <div id="myDropdown" class="dropdown-content"> <div class="down_del">
                                <a class=" dropdown-itemm dnlod_nt" href="{{ route('download-reg6tl-file', ['id' => $file->id]) }}">
                                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.40625 12.25C2.00014 12.25 1.61066 12.0887 1.32349 11.8015C1.03633 11.5143 0.875 11.1249 0.875 10.7188V8.53125C0.875 8.3572 0.94414 8.19028 1.06721 8.06721C1.19028 7.94414 1.3572 7.875 1.53125 7.875C1.7053 7.875 1.87222 7.94414 1.99529 8.06721C2.11836 8.19028 2.1875 8.3572 2.1875 8.53125V10.7188C2.1875 10.8395 2.2855 10.9375 2.40625 10.9375H11.5938C11.6518 10.9375 11.7074 10.9145 11.7484 10.8734C11.7895 10.8324 11.8125 10.7768 11.8125 10.7188V8.53125C11.8125 8.3572 11.8816 8.19028 12.0047 8.06721C12.1278 7.94414 12.2947 7.875 12.4688 7.875C12.6428 7.875 12.8097 7.94414 12.9328 8.06721C13.0559 8.19028 13.125 8.3572 13.125 8.53125V10.7188C13.125 11.1249 12.9637 11.5143 12.6765 11.8015C12.3893 12.0887 11.9999 12.25 11.5938 12.25H2.40625Z" fill="white" />
                                    <path d="M6.34334 6.72788V1.75C6.34334 1.57595 6.41248 1.40903 6.53555 1.28596C6.65862 1.16289 6.82554 1.09375 6.99959 1.09375C7.17364 1.09375 7.34056 1.16289 7.46363 1.28596C7.5867 1.40903 7.65584 1.57595 7.65584 1.75V6.72788L9.37959 5.005C9.44049 4.9441 9.51279 4.89579 9.59236 4.86283C9.67193 4.82987 9.75722 4.81291 9.84334 4.81291C9.92947 4.81291 10.0148 4.82987 10.0943 4.86283C10.1739 4.89579 10.2462 4.9441 10.3071 5.005C10.368 5.0659 10.4163 5.1382 10.4493 5.21777C10.4822 5.29734 10.4992 5.38262 10.4992 5.46875C10.4992 5.55488 10.4822 5.64016 10.4493 5.71973C10.4163 5.7993 10.368 5.8716 10.3071 5.9325L7.46334 8.77625C7.40247 8.83721 7.33018 8.88556 7.25061 8.91856C7.17103 8.95155 7.08574 8.96853 6.99959 8.96853C6.91345 8.96853 6.82815 8.95155 6.74857 8.91856C6.669 8.88556 6.59671 8.83721 6.53584 8.77625L3.69209 5.9325C3.63119 5.8716 3.58288 5.7993 3.54992 5.71973C3.51696 5.64016 3.5 5.55488 3.5 5.46875C3.5 5.38262 3.51696 5.29734 3.54992 5.21777C3.58288 5.1382 3.63119 5.0659 3.69209 5.005C3.75299 4.9441 3.82529 4.89579 3.90486 4.86283C3.98443 4.82987 4.06972 4.81291 4.15584 4.81291C4.24197 4.81291 4.32725 4.82987 4.40682 4.86283C4.48639 4.89579 4.55869 4.9441 4.61959 5.005L6.34334 6.72788Z" fill="white" />
                                  </svg> Download </a>
                                <a class="dropdown-itemm delet_nt" id="delete-{{ $file->id }}">
                                <form method="POST" action="{{ route('file6regtl.delete', ['id' => $file->id]) }}">
                                                          @csrf
                                                          @method('DELETE')
                                                          <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?')">
                                                                          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A" />
                                                  </svg> Delete
                                                                          </button>
                                                                      </form>
                                                                     
                                                               </a>
                                  
                                 
                              </div>
                              <a class="dropdown-itemm rename_nt" data-bs-toggle="modal" data-bs-target="#edit_histry_11">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M8.75 9.33323L6.41667 11.6666H12.25V9.33323H8.75ZM7.035 4.19406L1.75 9.47906V11.6666H3.9375L9.2225 6.38156L7.035 4.19406ZM10.9142 4.6899C11.1417 4.4624 11.1417 4.08323 10.9142 3.8674L9.54917 2.5024C9.4398 2.39389 9.29198 2.33301 9.13792 2.33301C8.98385 2.33301 8.83604 2.39389 8.72667 2.5024L7.65917 3.5699L9.84667 5.7574L10.9142 4.6899Z" fill="#8D8D8D" />
                                </svg> Edit </a>
                              <a class="dropdown-itemm history_nt history_click_011">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M8 5.3335V8.00016L9.66667 9.66683" stroke="#8D8D8D" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round" />
                                  <path d="M2.89231 4.58076L2.39231 4.58276C2.39283 4.71456 2.44538 4.84082 2.53851 4.93408C2.63165 5.02734 2.75784 5.08005 2.88964 5.08076L2.89231 4.58076ZM4.58698 5.08876C4.65264 5.08906 4.71771 5.07643 4.77849 5.05159C4.83927 5.02674 4.89457 4.99017 4.94121 4.94396C4.98786 4.89775 5.02495 4.8428 5.05036 4.78225C5.07577 4.72171 5.089 4.65675 5.08931 4.59109C5.08962 4.52543 5.07699 4.46035 5.05214 4.39957C5.0273 4.33879 4.99072 4.2835 4.94451 4.23685C4.8983 4.19021 4.84335 4.15312 4.78281 4.12771C4.72226 4.1023 4.6573 4.08906 4.59164 4.08876L4.58698 5.08876ZM3.38364 2.88076C3.38329 2.81509 3.37001 2.75015 3.34456 2.68962C3.31911 2.62909 3.28199 2.57416 3.23531 2.52798C3.18863 2.4818 3.13332 2.44527 3.07252 2.42046C3.01172 2.39566 2.94664 2.38307 2.88098 2.38342C2.81531 2.38377 2.75037 2.39705 2.68984 2.4225C2.62931 2.44795 2.57438 2.48508 2.5282 2.53175C2.48202 2.57843 2.44549 2.63375 2.42068 2.69454C2.39588 2.75534 2.38329 2.82043 2.38364 2.88609L3.38364 2.88076ZM2.55164 7.19009C2.56122 7.12474 2.55776 7.05814 2.54146 6.99414C2.52516 6.93014 2.49634 6.87 2.45666 6.8172C2.41699 6.7644 2.36724 6.71998 2.31031 6.68651C2.25337 6.65305 2.19037 6.63119 2.12493 6.62221C2.0595 6.61322 1.99294 6.61729 1.92909 6.63418C1.86524 6.65107 1.80537 6.68044 1.75293 6.72059C1.70049 6.76075 1.65653 6.8109 1.62359 6.86814C1.59064 6.92538 1.56936 6.98858 1.56098 7.05409L2.55164 7.19009ZM12.575 3.42542C10.0283 0.878756 5.91298 0.852089 3.38298 3.38276L4.08964 4.08942C6.22298 1.95676 9.70498 1.96942 11.8683 4.13209L12.575 3.42542ZM3.42564 12.5748C5.97231 15.1214 10.0876 15.1481 12.6176 12.6174L11.911 11.9108C9.77764 14.0434 6.29564 14.0308 4.13231 11.8681L3.42564 12.5748ZM12.6176 12.6174C15.1476 10.0874 15.1216 5.97209 12.575 3.42542L11.8683 4.13209C14.031 6.29542 14.0436 9.77742 11.911 11.9108L12.6176 12.6174ZM3.38298 3.38276L2.53831 4.22676L3.24564 4.93342L4.08964 4.08942L3.38298 3.38276ZM2.88964 5.08076L4.58698 5.08876L4.59164 4.08876L2.89498 4.08076L2.88964 5.08076ZM3.39231 4.57809L3.38364 2.88076L2.38364 2.88609L2.39231 4.58276L3.39231 4.57809ZM1.56031 7.05342C1.42334 8.05514 1.52043 9.07498 1.84396 10.0329C2.1675 10.9907 2.70866 11.8606 3.42498 12.5741L4.13164 11.8674C3.52446 11.2629 3.06571 10.5259 2.79145 9.71422C2.51718 8.90253 2.43487 8.03829 2.55098 7.18942L1.56031 7.05342Z" fill="#8D8D8D" />
                                </svg> View History </a>
                            </div>
                          </div>
                        </td>
              
              </tr>
              
                          <!-- model start -->
              <div class="modal fade" id="edit_histry_11" tabindex="-1" role="dialog" aria-labelledby="edit_histry_11" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                              <h5 class="modal-title" style="font-weight:700">Edit Doc</h5>
              
                                                              <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                          <span aria-hidden="true"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"/>
              <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"/>
              </svg>
              </span>
                        </button>
                                                          </div>
                                                          <div class="modal-body ediit_nnt">
                                                          <h3>Edit Doc</h3>
                                                          <form action="{{ route('regupdateFileName6tl') }}" method="POST" enctype="multipart/form-data" class="upload-form"> 
                                                    @csrf
                                                    <input type="hidden" name="record_id1" value="{{ $file->id }}">
                                                            <div class="form-grouup">
              <label for="fname">File  name:</label>
              <input type="text" id="file_name" name="file_name" value="{{$file->file_name}}">
              </div>
              <div class="form-grouup">
              <label for="lname">Doc File:</label>
              <input type="file" id="aoa-file" name="file" accept=".pdf,.doc,.docx" >
              
              </div>
              <div class="form-grouup">
              <label for="lname">Reason for Change :</label>
              <input type="textarea" id="reasons_for_change" name="reasons_for_change" value="{{$file->reasons_for_change}}" accept=".pdf,.doc,.docx" required>
              </div>
              <div class="form-grouup">
              <button type="submit" value="Submit">Submit</button>
              </div>
              </form>
                                                          </div>
                                                      </div>
                                                  </div>
                                           </div>
              
                         
                  
              @endforeach
              @endif



              <!--- end new row -->


              
              <!--- 5 new row -->

@if ($urdoc->isEmpty())             
                  
                  <tr class="">
                                          <td>
                                            <div class="finish">
                                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_511_3356)">
                                                  <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                                                </g>
                                                <defs>
                                                  <clipPath id="clip0_511_3356">
                                                    <rect width="15" height="15" fill="white" />
                                                  </clipPath>
                                                </defs>
                                              </svg>
                                            </div>
                                            <div class="unfinish">
                                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                                                <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                                              </svg>
                                            </div>
                                          </td>
                                          <td>Udyam registration</td>
                                          <td>
                                            <button class="btn btn-primary" style="border-radius:5px;" data-bs-toggle="modal" data-bs-target="#udyam">
                                              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.25 12V5.8875L6.3 7.8375L5.25 6.75L9 3L12.75 6.75L11.7 7.8375L9.75 5.8875V12H8.25ZM4.5 15C4.0875 15 3.7345 14.8533 3.441 14.5597C3.1475 14.2662 3.0005 13.913 3 13.5V11.25H4.5V13.5H13.5V11.25H15V13.5C15 13.9125 14.8533 14.2657 14.5597 14.5597C14.2662 14.8538 13.913 15.0005 13.5 15H4.5Z" fill="#7E7E7E" />
                                              </svg> Upload </button>
                                            <div class="modal fade" id="udyam" tabindex="-1" role="dialog" aria-labelledby="udyam" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" style="font-weight:700"></h5>
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
                                                    <h3>Udyam registration</h3>
                                                    <form action="{{ route('regurdoc') }}" method="POST" enctype="multipart/form-data" class="upload-form"> @csrf 
                                                      <div class="file-area">
                                                      <input type="file" class="dragfile" id="spice-forms" name="file" accept=".pdf,.doc,.docx" required>
                                                      <input type="hidden" id="real_file_name" name="real_file_name" value="Udyam registration">
                                                      <input type="hidden" id="file_status" name="file_status" value="0">
                                                        <div class="file-dummy">
                                                          <div class="success">Great, your files are selected. Keep on.</div>
                                                          <div class="default">
                                                            <span class="upload_icon">
                                                              <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88">
                                                                <title>file-upload</title>
                                                                <path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z" />
                                                              </svg>
                                                            </span> Drag and Drop files here or <span class="fille">Choose File</span>
                                                          </div>
                                                        </div>
                                                        <br><div class="selected-file"></div>
                                                      </div>
                                                      <span class="basic-file">Note:- file|mimes:pdf,doc,docx|max size:2048kb</span>
                                                      <button class="btn btn-primary" style="border-radius:5px;" type="submit">Upload</button>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </td>
                                          <td></td>
                                          <td>
                                            
                                          </td>
                                        </tr> 
                 
              
                 
              
              
                                      @else
                  <!-- If records exist in the collection -->
                  @foreach($urdoc as $file)
                  
                  <tr class="active">
              
              <td>
                  <div class="finish">
                      <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <g clip-path="url(#clip0_511_3356)">
                              <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                          </g>
                          <defs>
                              <clipPath id="clip0_511_3356">
                                  <rect width="15" height="15" fill="white" />
                              </clipPath>
                          </defs>
                      </svg>
                  </div>
                  <div class="unfinish">
                      <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                          <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                      </svg>
                  </div>
              </td>
              <td>
              
                          {{$file->real_file_name}}
                      
              </td>
              <td>
                 
                  
                      {{$file->file_type}}
                 
                 
              </td>
              @php
              $fileSizeKB = round($file->file_size / 1024, 2) ; // Convert bytes to KB and round to 2 decimal places
              @endphp
                          <td>{{$fileSizeKB }} KB </td>
              
                          <td>
                          <div class="dropdown" >
                            <button onclick="toggleDropdown()" class="dropbtn show_pp">
                              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D" />
                                <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D" />
                                <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D" />
                              </svg>
                            </button>
                            <div id="myDropdown" class="dropdown-content"> <div class="down_del">
                                <a class=" dropdown-itemm dnlod_nt" href="{{ route('download-reg6ur-file', ['id' => $file->id]) }}">
                                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.40625 12.25C2.00014 12.25 1.61066 12.0887 1.32349 11.8015C1.03633 11.5143 0.875 11.1249 0.875 10.7188V8.53125C0.875 8.3572 0.94414 8.19028 1.06721 8.06721C1.19028 7.94414 1.3572 7.875 1.53125 7.875C1.7053 7.875 1.87222 7.94414 1.99529 8.06721C2.11836 8.19028 2.1875 8.3572 2.1875 8.53125V10.7188C2.1875 10.8395 2.2855 10.9375 2.40625 10.9375H11.5938C11.6518 10.9375 11.7074 10.9145 11.7484 10.8734C11.7895 10.8324 11.8125 10.7768 11.8125 10.7188V8.53125C11.8125 8.3572 11.8816 8.19028 12.0047 8.06721C12.1278 7.94414 12.2947 7.875 12.4688 7.875C12.6428 7.875 12.8097 7.94414 12.9328 8.06721C13.0559 8.19028 13.125 8.3572 13.125 8.53125V10.7188C13.125 11.1249 12.9637 11.5143 12.6765 11.8015C12.3893 12.0887 11.9999 12.25 11.5938 12.25H2.40625Z" fill="white" />
                                    <path d="M6.34334 6.72788V1.75C6.34334 1.57595 6.41248 1.40903 6.53555 1.28596C6.65862 1.16289 6.82554 1.09375 6.99959 1.09375C7.17364 1.09375 7.34056 1.16289 7.46363 1.28596C7.5867 1.40903 7.65584 1.57595 7.65584 1.75V6.72788L9.37959 5.005C9.44049 4.9441 9.51279 4.89579 9.59236 4.86283C9.67193 4.82987 9.75722 4.81291 9.84334 4.81291C9.92947 4.81291 10.0148 4.82987 10.0943 4.86283C10.1739 4.89579 10.2462 4.9441 10.3071 5.005C10.368 5.0659 10.4163 5.1382 10.4493 5.21777C10.4822 5.29734 10.4992 5.38262 10.4992 5.46875C10.4992 5.55488 10.4822 5.64016 10.4493 5.71973C10.4163 5.7993 10.368 5.8716 10.3071 5.9325L7.46334 8.77625C7.40247 8.83721 7.33018 8.88556 7.25061 8.91856C7.17103 8.95155 7.08574 8.96853 6.99959 8.96853C6.91345 8.96853 6.82815 8.95155 6.74857 8.91856C6.669 8.88556 6.59671 8.83721 6.53584 8.77625L3.69209 5.9325C3.63119 5.8716 3.58288 5.7993 3.54992 5.71973C3.51696 5.64016 3.5 5.55488 3.5 5.46875C3.5 5.38262 3.51696 5.29734 3.54992 5.21777C3.58288 5.1382 3.63119 5.0659 3.69209 5.005C3.75299 4.9441 3.82529 4.89579 3.90486 4.86283C3.98443 4.82987 4.06972 4.81291 4.15584 4.81291C4.24197 4.81291 4.32725 4.82987 4.40682 4.86283C4.48639 4.89579 4.55869 4.9441 4.61959 5.005L6.34334 6.72788Z" fill="white" />
                                  </svg> Download </a>
                                <a class="dropdown-itemm delet_nt" id="delete-{{ $file->id }}">
                                <form method="POST" action="{{ route('file6regur.delete', ['id' => $file->id]) }}">
                                                          @csrf
                                                          @method('DELETE')
                                                          <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?')">
                                                                          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A" />
                                                  </svg> Delete
                                                                          </button>
                                                                      </form>
                                                                     
                                                               </a>
                                  
                                 
                              </div>
                              <a class="dropdown-itemm rename_nt" data-bs-toggle="modal" data-bs-target="#edit_histry_12">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M8.75 9.33323L6.41667 11.6666H12.25V9.33323H8.75ZM7.035 4.19406L1.75 9.47906V11.6666H3.9375L9.2225 6.38156L7.035 4.19406ZM10.9142 4.6899C11.1417 4.4624 11.1417 4.08323 10.9142 3.8674L9.54917 2.5024C9.4398 2.39389 9.29198 2.33301 9.13792 2.33301C8.98385 2.33301 8.83604 2.39389 8.72667 2.5024L7.65917 3.5699L9.84667 5.7574L10.9142 4.6899Z" fill="#8D8D8D" />
                                </svg> Edit </a>
                              <a class="dropdown-itemm history_nt history_click_012">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M8 5.3335V8.00016L9.66667 9.66683" stroke="#8D8D8D" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round" />
                                  <path d="M2.89231 4.58076L2.39231 4.58276C2.39283 4.71456 2.44538 4.84082 2.53851 4.93408C2.63165 5.02734 2.75784 5.08005 2.88964 5.08076L2.89231 4.58076ZM4.58698 5.08876C4.65264 5.08906 4.71771 5.07643 4.77849 5.05159C4.83927 5.02674 4.89457 4.99017 4.94121 4.94396C4.98786 4.89775 5.02495 4.8428 5.05036 4.78225C5.07577 4.72171 5.089 4.65675 5.08931 4.59109C5.08962 4.52543 5.07699 4.46035 5.05214 4.39957C5.0273 4.33879 4.99072 4.2835 4.94451 4.23685C4.8983 4.19021 4.84335 4.15312 4.78281 4.12771C4.72226 4.1023 4.6573 4.08906 4.59164 4.08876L4.58698 5.08876ZM3.38364 2.88076C3.38329 2.81509 3.37001 2.75015 3.34456 2.68962C3.31911 2.62909 3.28199 2.57416 3.23531 2.52798C3.18863 2.4818 3.13332 2.44527 3.07252 2.42046C3.01172 2.39566 2.94664 2.38307 2.88098 2.38342C2.81531 2.38377 2.75037 2.39705 2.68984 2.4225C2.62931 2.44795 2.57438 2.48508 2.5282 2.53175C2.48202 2.57843 2.44549 2.63375 2.42068 2.69454C2.39588 2.75534 2.38329 2.82043 2.38364 2.88609L3.38364 2.88076ZM2.55164 7.19009C2.56122 7.12474 2.55776 7.05814 2.54146 6.99414C2.52516 6.93014 2.49634 6.87 2.45666 6.8172C2.41699 6.7644 2.36724 6.71998 2.31031 6.68651C2.25337 6.65305 2.19037 6.63119 2.12493 6.62221C2.0595 6.61322 1.99294 6.61729 1.92909 6.63418C1.86524 6.65107 1.80537 6.68044 1.75293 6.72059C1.70049 6.76075 1.65653 6.8109 1.62359 6.86814C1.59064 6.92538 1.56936 6.98858 1.56098 7.05409L2.55164 7.19009ZM12.575 3.42542C10.0283 0.878756 5.91298 0.852089 3.38298 3.38276L4.08964 4.08942C6.22298 1.95676 9.70498 1.96942 11.8683 4.13209L12.575 3.42542ZM3.42564 12.5748C5.97231 15.1214 10.0876 15.1481 12.6176 12.6174L11.911 11.9108C9.77764 14.0434 6.29564 14.0308 4.13231 11.8681L3.42564 12.5748ZM12.6176 12.6174C15.1476 10.0874 15.1216 5.97209 12.575 3.42542L11.8683 4.13209C14.031 6.29542 14.0436 9.77742 11.911 11.9108L12.6176 12.6174ZM3.38298 3.38276L2.53831 4.22676L3.24564 4.93342L4.08964 4.08942L3.38298 3.38276ZM2.88964 5.08076L4.58698 5.08876L4.59164 4.08876L2.89498 4.08076L2.88964 5.08076ZM3.39231 4.57809L3.38364 2.88076L2.38364 2.88609L2.39231 4.58276L3.39231 4.57809ZM1.56031 7.05342C1.42334 8.05514 1.52043 9.07498 1.84396 10.0329C2.1675 10.9907 2.70866 11.8606 3.42498 12.5741L4.13164 11.8674C3.52446 11.2629 3.06571 10.5259 2.79145 9.71422C2.51718 8.90253 2.43487 8.03829 2.55098 7.18942L1.56031 7.05342Z" fill="#8D8D8D" />
                                </svg> View History </a>
                            </div>
                          </div>
                        </td>
              
              </tr>
              
                          <!-- model start -->
              <div class="modal fade" id="edit_histry_12" tabindex="-1" role="dialog" aria-labelledby="edit_histry_12" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                              <h5 class="modal-title" style="font-weight:700">Edit Doc</h5>
              
                                                              <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                          <span aria-hidden="true"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"/>
              <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"/>
              </svg>
              </span>
                        </button>
                                                          </div>
                                                          <div class="modal-body ediit_nnt">
                                                          <h3>Edit Doc</h3>
                                                          <form action="{{ route('regupdateFileName6ur') }}" method="POST" enctype="multipart/form-data" class="upload-form"> 
                                                    @csrf
                                                    <input type="hidden" name="record_id1" value="{{ $file->id }}">
                                                            <div class="form-grouup">
              <label for="fname">File  name:</label>
              <input type="text" id="file_name" name="file_name" value="{{$file->file_name}}">
              </div>
              <div class="form-grouup">
              <label for="lname">Doc File:</label>
              <input type="file" id="aoa-file" name="file" accept=".pdf,.doc,.docx" >
              
              </div>
              <div class="form-grouup">
              <label for="lname">Reason for Change :</label>
              <input type="textarea" id="reasons_for_change" name="reasons_for_change" value="{{$file->reasons_for_change}}" accept=".pdf,.doc,.docx" required>
              </div>
              <div class="form-grouup">
              <button type="submit" value="Submit">Submit</button>
              </div>
              </form>
                                                          </div>
                                                      </div>
                                                  </div>
                                           </div>
              
                         
                  
              @endforeach
              @endif



              <!--- end new row -->
                       
                          <!-- new table tr start -->
                          <!-- data save field tr start-->
                          @foreach($customdoc as $file)
    
    <tr class="active">

<td>
    <div class="finish">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_511_3356)">
                <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
            </g>
            <defs>
                <clipPath id="clip0_511_3356">
                    <rect width="15" height="15" fill="white" />
                </clipPath>
            </defs>
        </svg>
    </div>
    <div class="unfinish">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
            <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
        </svg>
    </div>
</td>
<td>

            {{$file->real_file_name}}
        
</td>
<td>
   
    
        {{$file->file_type}}
   
   
</td>
@php
$fileSizeKB = round($file->file_size / 1024, 2) ; // Convert bytes to KB and round to 2 decimal places
@endphp
            <td>{{$fileSizeKB }} KB </td>

            <td>
            <div class="dropdown" >
              <button onclick="toggleDropdown()" class="dropbtn show_pp">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D" />
                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D" />
                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D" />
                </svg>
              </button>
              <div id="myDropdown" class="dropdown-content"> <div class="down_del">
                  <a class=" dropdown-itemm dnlod_nt" href="{{ route('download-reg7-file', ['id' => $file->id]) }}">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M2.40625 12.25C2.00014 12.25 1.61066 12.0887 1.32349 11.8015C1.03633 11.5143 0.875 11.1249 0.875 10.7188V8.53125C0.875 8.3572 0.94414 8.19028 1.06721 8.06721C1.19028 7.94414 1.3572 7.875 1.53125 7.875C1.7053 7.875 1.87222 7.94414 1.99529 8.06721C2.11836 8.19028 2.1875 8.3572 2.1875 8.53125V10.7188C2.1875 10.8395 2.2855 10.9375 2.40625 10.9375H11.5938C11.6518 10.9375 11.7074 10.9145 11.7484 10.8734C11.7895 10.8324 11.8125 10.7768 11.8125 10.7188V8.53125C11.8125 8.3572 11.8816 8.19028 12.0047 8.06721C12.1278 7.94414 12.2947 7.875 12.4688 7.875C12.6428 7.875 12.8097 7.94414 12.9328 8.06721C13.0559 8.19028 13.125 8.3572 13.125 8.53125V10.7188C13.125 11.1249 12.9637 11.5143 12.6765 11.8015C12.3893 12.0887 11.9999 12.25 11.5938 12.25H2.40625Z" fill="white" />
                      <path d="M6.34334 6.72788V1.75C6.34334 1.57595 6.41248 1.40903 6.53555 1.28596C6.65862 1.16289 6.82554 1.09375 6.99959 1.09375C7.17364 1.09375 7.34056 1.16289 7.46363 1.28596C7.5867 1.40903 7.65584 1.57595 7.65584 1.75V6.72788L9.37959 5.005C9.44049 4.9441 9.51279 4.89579 9.59236 4.86283C9.67193 4.82987 9.75722 4.81291 9.84334 4.81291C9.92947 4.81291 10.0148 4.82987 10.0943 4.86283C10.1739 4.89579 10.2462 4.9441 10.3071 5.005C10.368 5.0659 10.4163 5.1382 10.4493 5.21777C10.4822 5.29734 10.4992 5.38262 10.4992 5.46875C10.4992 5.55488 10.4822 5.64016 10.4493 5.71973C10.4163 5.7993 10.368 5.8716 10.3071 5.9325L7.46334 8.77625C7.40247 8.83721 7.33018 8.88556 7.25061 8.91856C7.17103 8.95155 7.08574 8.96853 6.99959 8.96853C6.91345 8.96853 6.82815 8.95155 6.74857 8.91856C6.669 8.88556 6.59671 8.83721 6.53584 8.77625L3.69209 5.9325C3.63119 5.8716 3.58288 5.7993 3.54992 5.71973C3.51696 5.64016 3.5 5.55488 3.5 5.46875C3.5 5.38262 3.51696 5.29734 3.54992 5.21777C3.58288 5.1382 3.63119 5.0659 3.69209 5.005C3.75299 4.9441 3.82529 4.89579 3.90486 4.86283C3.98443 4.82987 4.06972 4.81291 4.15584 4.81291C4.24197 4.81291 4.32725 4.82987 4.40682 4.86283C4.48639 4.89579 4.55869 4.9441 4.61959 5.005L6.34334 6.72788Z" fill="white" />
                    </svg> Download </a>
                  <a class="dropdown-itemm delet_nt" id="delete-{{ $file->id }}">
                  <form method="POST" action="{{ route('file7reg.delete', ['id' => $file->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?')">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A" />
                                    </svg> Delete
                                                            </button>
                                                        </form>
                                                       
                                                 </a>
                    
                   
                </div>
                <a class="dropdown-itemm rename_nt" data-bs-toggle="modal" data-bs-target="#edit_histry_8{{$file->id}}">
                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.75 9.33323L6.41667 11.6666H12.25V9.33323H8.75ZM7.035 4.19406L1.75 9.47906V11.6666H3.9375L9.2225 6.38156L7.035 4.19406ZM10.9142 4.6899C11.1417 4.4624 11.1417 4.08323 10.9142 3.8674L9.54917 2.5024C9.4398 2.39389 9.29198 2.33301 9.13792 2.33301C8.98385 2.33301 8.83604 2.39389 8.72667 2.5024L7.65917 3.5699L9.84667 5.7574L10.9142 4.6899Z" fill="#8D8D8D" />
                  </svg> Edit </a>
                <a class="dropdown-itemm history_nt history_click_7" id="his{{$file->id}}">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 5.3335V8.00016L9.66667 9.66683" stroke="#8D8D8D" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M2.89231 4.58076L2.39231 4.58276C2.39283 4.71456 2.44538 4.84082 2.53851 4.93408C2.63165 5.02734 2.75784 5.08005 2.88964 5.08076L2.89231 4.58076ZM4.58698 5.08876C4.65264 5.08906 4.71771 5.07643 4.77849 5.05159C4.83927 5.02674 4.89457 4.99017 4.94121 4.94396C4.98786 4.89775 5.02495 4.8428 5.05036 4.78225C5.07577 4.72171 5.089 4.65675 5.08931 4.59109C5.08962 4.52543 5.07699 4.46035 5.05214 4.39957C5.0273 4.33879 4.99072 4.2835 4.94451 4.23685C4.8983 4.19021 4.84335 4.15312 4.78281 4.12771C4.72226 4.1023 4.6573 4.08906 4.59164 4.08876L4.58698 5.08876ZM3.38364 2.88076C3.38329 2.81509 3.37001 2.75015 3.34456 2.68962C3.31911 2.62909 3.28199 2.57416 3.23531 2.52798C3.18863 2.4818 3.13332 2.44527 3.07252 2.42046C3.01172 2.39566 2.94664 2.38307 2.88098 2.38342C2.81531 2.38377 2.75037 2.39705 2.68984 2.4225C2.62931 2.44795 2.57438 2.48508 2.5282 2.53175C2.48202 2.57843 2.44549 2.63375 2.42068 2.69454C2.39588 2.75534 2.38329 2.82043 2.38364 2.88609L3.38364 2.88076ZM2.55164 7.19009C2.56122 7.12474 2.55776 7.05814 2.54146 6.99414C2.52516 6.93014 2.49634 6.87 2.45666 6.8172C2.41699 6.7644 2.36724 6.71998 2.31031 6.68651C2.25337 6.65305 2.19037 6.63119 2.12493 6.62221C2.0595 6.61322 1.99294 6.61729 1.92909 6.63418C1.86524 6.65107 1.80537 6.68044 1.75293 6.72059C1.70049 6.76075 1.65653 6.8109 1.62359 6.86814C1.59064 6.92538 1.56936 6.98858 1.56098 7.05409L2.55164 7.19009ZM12.575 3.42542C10.0283 0.878756 5.91298 0.852089 3.38298 3.38276L4.08964 4.08942C6.22298 1.95676 9.70498 1.96942 11.8683 4.13209L12.575 3.42542ZM3.42564 12.5748C5.97231 15.1214 10.0876 15.1481 12.6176 12.6174L11.911 11.9108C9.77764 14.0434 6.29564 14.0308 4.13231 11.8681L3.42564 12.5748ZM12.6176 12.6174C15.1476 10.0874 15.1216 5.97209 12.575 3.42542L11.8683 4.13209C14.031 6.29542 14.0436 9.77742 11.911 11.9108L12.6176 12.6174ZM3.38298 3.38276L2.53831 4.22676L3.24564 4.93342L4.08964 4.08942L3.38298 3.38276ZM2.88964 5.08076L4.58698 5.08876L4.59164 4.08876L2.89498 4.08076L2.88964 5.08076ZM3.39231 4.57809L3.38364 2.88076L2.38364 2.88609L2.39231 4.58276L3.39231 4.57809ZM1.56031 7.05342C1.42334 8.05514 1.52043 9.07498 1.84396 10.0329C2.1675 10.9907 2.70866 11.8606 3.42498 12.5741L4.13164 11.8674C3.52446 11.2629 3.06571 10.5259 2.79145 9.71422C2.51718 8.90253 2.43487 8.03829 2.55098 7.18942L1.56031 7.05342Z" fill="#8D8D8D" />
                  </svg> View History </a>
              </div>
            </div>
          </td>

</tr>

            <!-- model start -->
<div class="modal fade" id="edit_histry_8{{$file->id}}" tabindex="-1" role="dialog" aria-labelledby="edit_histry_8{{$file->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" style="font-weight:700">Edit Doc</h5>

                                                <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
            <span aria-hidden="true"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"/>
<rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"/>
</svg>
</span>
          </button>
                                            </div>
                                            <div class="modal-body ediit_nnt">
                                            <h3>Edit Doc</h3>
                                            <form action="{{ route('regupdateFileName7') }}" method="POST" enctype="multipart/form-data" class="upload-form"> 
                                      @csrf
                                      <input type="hidden" name="record_id1" value="{{ $file->id }}">
                                              <div class="form-grouup">
<label for="fname">File  name:</label>
<input type="text" id="file_name" name="file_name" value="{{$file->file_name}}">
</div>
<div class="form-grouup">
<label for="lname">Doc File:</label>
<input type="file" id="aoa-file" name="file" accept=".pdf,.doc,.docx" >

</div>
<div class="form-grouup">
<label for="lname">Reason for Change :</label>
<input type="textarea" id="reasons_for_change" name="reasons_for_change" value="{{$file->reasons_for_change}}" accept=".pdf,.doc,.docx" required>
</div>
<div class="form-grouup">
<button type="submit" value="Submit">Submit</button>
</div>
</form>
                                            </div>
                                        </div>
                                    </div>
                             </div>

           
    
@endforeach
    <!-- data save field tr end-->

<tr class="next-table" style="display:none">

<td>
    <div class="finish">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_511_3356)">
                <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black"></path>
            </g>
            <defs>
                <clipPath id="clip0_511_3356">
                    <rect width="15" height="15" fill="white"></rect>
                </clipPath>
            </defs>
        </svg>
    </div>
    <div class="unfinish">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F"></path>
            <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F"></circle>
        </svg>
    </div>
</td>
<td>
<form action="{{ route('regcustomdoc') }}"" method="POST" enctype="multipart/form-data" class="upload-form"> @csrf
<input type="text" id="file_name" name="file_name"  required><br>
 
</td>
<td>

<input type="file" id="file"  name="file" required>
 
   
</td>
                            <td class="btnset">
                            
                            <button class="btn" type="submit" value="Submit"> <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.25 12V5.8875L6.3 7.8375L5.25 6.75L9 3L12.75 6.75L11.7 7.8375L9.75 5.8875V12H8.25ZM4.5 15C4.0875 15 3.7345 14.8533 3.441 14.5597C3.1475 14.2662 3.0005 13.913 3 13.5V11.25H4.5V13.5H13.5V11.25H15V13.5C15 13.9125 14.8533 14.2657 14.5597 14.5597C14.2662 14.8538 13.913 15.0005 13.5 15H4.5Z" fill="#7E7E7E"></path>
                              </svg> Upload</button>
                              <button class="btn" id="cancelbtn" type="button" value="Cancel">
    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 1L15 15M1 15L15 1" stroke="black" stroke-width="2"/>
    </svg>
</button>
</form> 
                            </td>

            <td>
            
          </td>

</tr>          
         <!-- new table tr end -->               
                          
                        </tbody>
                      </table>


                    </div>                   
                  </div>
                  <script>
                    document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('addCustomDocButton').addEventListener('click', function() {
        document.querySelector('.next-table').style.display = 'table-row';
    });

                // Add event listener to the "Cancel" button in each row
                document.addEventListener('click', function(event) {
    // Check if the clicked element or its parent has the id 'cancelbtn'
    if (event.target.closest('#cancelbtn')) {
        // Hide the row when the "Cancel" button is clicked
        event.target.closest('.next-table').style.display = 'none';
    }
});

});

                  </script>
                 
                    <!------ HISTORY SECRTION START------->
                    @foreach($files as $file)
                    <div class="history_main history_main_1">
                  <div class="history_inner">
                    <div class="close_nt">
                    <button id="closeBtn"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"></rect>
                                            <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"></rect>
                                          </svg></button>
                        </div>
                    <div class="history_head">
                        <h2>History</h2>
                        <h3>{{ $file->real_file_name}}</h3>
                        </div>
                        <div class="histy_body">
                            <ul>
                                <li class="Renamed">
<div class="icon_nrt">
<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.5 7.99995L5.5 9.99995H10.5V7.99995H7.5ZM6.03 3.59495L1.5 8.12495V9.99995H3.375L7.905 5.46995L6.03 3.59495ZM9.355 4.01995C9.55 3.82495 9.55 3.49995 9.355 3.31495L8.185 2.14495C8.09126 2.05194 7.96455 1.99976 7.8325 1.99976C7.70045 1.99976 7.57375 2.05194 7.48 2.14495L6.565 3.05995L8.44 4.93495L9.355 4.01995Z" fill="white"/>
</svg>
                        </div>
                        @if($file->activities)
    <div class="action_history">
        @php
            $formattedDate = \Carbon\Carbon::parse($file->update_dates)->format('d M, Y | H:i');
        @endphp

        @foreach(explode('.', $file->activities) as $activity)
            @if(trim($activity) == 'File updated' || trim($activity) == 'File name changed')
                <div class="ah_head">                                
                    <h3>{{ trim($activity) }}</h3>
                    <b>.</b>
                    <span>{{ $formattedDate }}</span>
                </div>
            @endif
        @endforeach

        <div class="profile_ah">
            <div class="pro_imnn">
                <img src="../assets/images/alok.png" alt="img">
            </div>
            <div class="profile_title">
                <h3>{{ $file->user_name }}</h3>    
            </div>
        </div>
    </div>
@endif

                                </li>

                                

                                <li class="Uploaded">
<div class="icon_nrt">
<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_511_1657)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.00015 6.56241C5.08303 6.56241 5.16252 6.52948 5.22112 6.47088C5.27973 6.41227 5.31265 6.33279 5.31265 6.24991V1.67782L6.01265 2.49491C6.06658 2.5579 6.14332 2.59688 6.22599 2.60329C6.30866 2.6097 6.3905 2.583 6.45348 2.52907C6.51647 2.47515 6.55546 2.39841 6.56187 2.31573C6.56828 2.23306 6.54158 2.15123 6.48765 2.08824L5.23765 0.629907C5.20831 0.595601 5.17189 0.568058 5.13089 0.549172C5.08989 0.530287 5.04529 0.520508 5.00015 0.520508C4.95501 0.520508 4.91041 0.530287 4.86941 0.549172C4.82841 0.568058 4.79199 0.595601 4.76265 0.629907L3.51265 2.08824C3.48595 2.11943 3.46565 2.15557 3.45292 2.19461C3.44018 2.23364 3.43526 2.2748 3.43843 2.31573C3.44161 2.35667 3.45281 2.39658 3.47141 2.43318C3.49 2.46979 3.51563 2.50237 3.54682 2.52907C3.57801 2.55578 3.61415 2.57607 3.65318 2.58881C3.69222 2.60154 3.73338 2.60646 3.77431 2.60329C3.81525 2.60012 3.85516 2.58891 3.89176 2.57032C3.92837 2.55172 3.96095 2.5261 3.98765 2.49491L4.68765 1.67824V6.24991C4.68765 6.42241 4.82765 6.56241 5.00015 6.56241Z" fill="white"/>
<path d="M6.66536 3.75C6.37286 3.75 6.22661 3.75 6.1212 3.82042C6.07587 3.85074 6.03694 3.88968 6.00661 3.935C5.9362 4.04042 5.9362 4.18667 5.9362 4.47917V6.25C5.9362 6.49864 5.83742 6.7371 5.66161 6.91291C5.48579 7.08873 5.24734 7.1875 4.9987 7.1875C4.75006 7.1875 4.5116 7.08873 4.33578 6.91291C4.15997 6.7371 4.0612 6.49864 4.0612 6.25V4.47917C4.0612 4.18667 4.0612 4.04042 3.99078 3.935C3.96045 3.88968 3.92152 3.85074 3.8762 3.82042C3.77078 3.75 3.62453 3.75 3.33203 3.75C2.1537 3.75 1.56411 3.75 1.19828 4.11625C0.832031 4.48208 0.832031 5.07083 0.832031 6.24958V6.66625C0.832031 7.84542 0.832031 8.43417 1.19828 8.80042C1.56411 9.16667 2.1537 9.16667 3.33203 9.16667H6.66536C7.8437 9.16667 8.43328 9.16667 8.79911 8.80042C9.16536 8.43417 9.16536 7.845 9.16536 6.66667V6.25C9.16536 5.07125 9.16536 4.48208 8.79911 4.11625C8.43328 3.75 7.8437 3.75 6.66536 3.75Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_511_1657">
<rect width="10" height="10" fill="white"/>
</clipPath>
</defs>
</svg>
                        </div>
                        <div class="action_history">
                            <div class="ah_head">                                
                            <h3>Uploaded</h3>
                            <b>.</b>
                            <span>{{ \Carbon\Carbon::parse($file->created_at)->format('d M, Y | H:i') }}</span>
                            </div>
                            <div class="Reason">                                
                            <h3>Reason</h3>                          
                            <span>"{{ $file->reasons_for_change}}"</span>
                            </div>
                        
                            <div class="profile_ah">
                                <div class="pro_imnn">
                                    <img src="../assets/images/alok.png" alt="img">
                        </div>
                        <div class="profile_title">
                    <h3>{{ $file->user_name}}</h3>    
                    </div>

                        </div>

                        </div>
                                </li>

                               

                               

                            </ul>
                        </div>
                        </div>
                        </div>
                        @endforeach
                  <!------ HISTORY SECRTION END------->


                    <!------ HISTORY SECRTION START------->
                    @foreach($chardoc as $file)
                    <div class="history_main h1main">
                  <div class="history_inner">
                    <div class="close_nt">
                    <button id="closeBtns"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"></rect>
                                            <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"></rect>
                                          </svg></button>
                        </div>
                        <div class="history_head">
                        <h2>History</h2>
                        <h3>{{ $file->real_file_name}}</h3>
                        </div>
                        <div class="histy_body">
                            <ul>
                                <li class="Renamed">
<div class="icon_nrt">
<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.5 7.99995L5.5 9.99995H10.5V7.99995H7.5ZM6.03 3.59495L1.5 8.12495V9.99995H3.375L7.905 5.46995L6.03 3.59495ZM9.355 4.01995C9.55 3.82495 9.55 3.49995 9.355 3.31495L8.185 2.14495C8.09126 2.05194 7.96455 1.99976 7.8325 1.99976C7.70045 1.99976 7.57375 2.05194 7.48 2.14495L6.565 3.05995L8.44 4.93495L9.355 4.01995Z" fill="white"/>
</svg>
                        </div>
                        @if($file->activities)
    <div class="action_history">
        @php
            $formattedDate = \Carbon\Carbon::parse($file->update_dates)->format('d M, Y | H:i');
        @endphp

        @foreach(explode('.', $file->activities) as $activity)
            @if(trim($activity) == 'File updated' || trim($activity) == 'File name changed')
                <div class="ah_head">                                
                    <h3>{{ trim($activity) }}</h3>
                    <b>.</b>
                    <span>{{ $formattedDate }}</span>
                </div>
            @endif
        @endforeach

        <div class="profile_ah">
            <div class="pro_imnn">
                <img src="../assets/images/alok.png" alt="img">
            </div>
            <div class="profile_title">
                <h3>{{ $file->user_name }}</h3>    
            </div>
        </div>
    </div>
@endif

                                </li>

                                

                                <li class="Uploaded">
<div class="icon_nrt">
<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_511_1657)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.00015 6.56241C5.08303 6.56241 5.16252 6.52948 5.22112 6.47088C5.27973 6.41227 5.31265 6.33279 5.31265 6.24991V1.67782L6.01265 2.49491C6.06658 2.5579 6.14332 2.59688 6.22599 2.60329C6.30866 2.6097 6.3905 2.583 6.45348 2.52907C6.51647 2.47515 6.55546 2.39841 6.56187 2.31573C6.56828 2.23306 6.54158 2.15123 6.48765 2.08824L5.23765 0.629907C5.20831 0.595601 5.17189 0.568058 5.13089 0.549172C5.08989 0.530287 5.04529 0.520508 5.00015 0.520508C4.95501 0.520508 4.91041 0.530287 4.86941 0.549172C4.82841 0.568058 4.79199 0.595601 4.76265 0.629907L3.51265 2.08824C3.48595 2.11943 3.46565 2.15557 3.45292 2.19461C3.44018 2.23364 3.43526 2.2748 3.43843 2.31573C3.44161 2.35667 3.45281 2.39658 3.47141 2.43318C3.49 2.46979 3.51563 2.50237 3.54682 2.52907C3.57801 2.55578 3.61415 2.57607 3.65318 2.58881C3.69222 2.60154 3.73338 2.60646 3.77431 2.60329C3.81525 2.60012 3.85516 2.58891 3.89176 2.57032C3.92837 2.55172 3.96095 2.5261 3.98765 2.49491L4.68765 1.67824V6.24991C4.68765 6.42241 4.82765 6.56241 5.00015 6.56241Z" fill="white"/>
<path d="M6.66536 3.75C6.37286 3.75 6.22661 3.75 6.1212 3.82042C6.07587 3.85074 6.03694 3.88968 6.00661 3.935C5.9362 4.04042 5.9362 4.18667 5.9362 4.47917V6.25C5.9362 6.49864 5.83742 6.7371 5.66161 6.91291C5.48579 7.08873 5.24734 7.1875 4.9987 7.1875C4.75006 7.1875 4.5116 7.08873 4.33578 6.91291C4.15997 6.7371 4.0612 6.49864 4.0612 6.25V4.47917C4.0612 4.18667 4.0612 4.04042 3.99078 3.935C3.96045 3.88968 3.92152 3.85074 3.8762 3.82042C3.77078 3.75 3.62453 3.75 3.33203 3.75C2.1537 3.75 1.56411 3.75 1.19828 4.11625C0.832031 4.48208 0.832031 5.07083 0.832031 6.24958V6.66625C0.832031 7.84542 0.832031 8.43417 1.19828 8.80042C1.56411 9.16667 2.1537 9.16667 3.33203 9.16667H6.66536C7.8437 9.16667 8.43328 9.16667 8.79911 8.80042C9.16536 8.43417 9.16536 7.845 9.16536 6.66667V6.25C9.16536 5.07125 9.16536 4.48208 8.79911 4.11625C8.43328 3.75 7.8437 3.75 6.66536 3.75Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_511_1657">
<rect width="10" height="10" fill="white"/>
</clipPath>
</defs>
</svg>
                        </div>
                        <div class="action_history">
                            <div class="ah_head">                                
                            <h3>Uploaded</h3>
                            <b>.</b>
                            <span>{{ \Carbon\Carbon::parse($file->created_at)->format('d M, Y | H:i') }}</span>
                            </div>
                            <div class="Reason">                                
                            <h3>Reason</h3>
                            <span>"{{ $file->reasons_for_change}}"</span>
                            </div>
                            <div class="profile_ah">
                                <div class="pro_imnn">
                                    <img src="../assets/images/alok.png" alt="img">
                        </div>
                        <div class="profile_title">
                    <h3>{{ $file->user_name}}</h3>    
                    </div>

                        </div>

                        </div>
                                </li>

                               

                               

                            </ul>
                        </div>
                        </div>
                        </div>
                        @endforeach
                  <!------ HISTORY SECRTION END------->
                   <!------ HISTORY SECRTION START------->
                   @foreach($coi as $file)
                   <div class="history_main history_main_2">
                  <div class="history_inner">
                    <div class="close_nt">
                    <button id="closeBtn2"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"></rect>
                                            <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"></rect>
                                          </svg></button>
                        </div>
                        <div class="history_head">
                        <h2>History</h2>
                        <h3>{{ $file->real_file_name}}</h3>
                        </div>
                        <div class="histy_body">
                            <ul>
                                <li class="Renamed">
<div class="icon_nrt">
<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.5 7.99995L5.5 9.99995H10.5V7.99995H7.5ZM6.03 3.59495L1.5 8.12495V9.99995H3.375L7.905 5.46995L6.03 3.59495ZM9.355 4.01995C9.55 3.82495 9.55 3.49995 9.355 3.31495L8.185 2.14495C8.09126 2.05194 7.96455 1.99976 7.8325 1.99976C7.70045 1.99976 7.57375 2.05194 7.48 2.14495L6.565 3.05995L8.44 4.93495L9.355 4.01995Z" fill="white"/>
</svg>
                        </div>
                        @if($file->activities)
    <div class="action_history">
        @php
            $formattedDate = \Carbon\Carbon::parse($file->update_dates)->format('d M, Y | H:i');
        @endphp

        @foreach(explode('.', $file->activities) as $activity)
            @if(trim($activity) == 'File updated' || trim($activity) == 'File name changed')
                <div class="ah_head">                                
                    <h3>{{ trim($activity) }}</h3>
                    <b>.</b>
                    <span>{{ $formattedDate }}</span>
                </div>
            @endif
        @endforeach

        <div class="profile_ah">
            <div class="pro_imnn">
                <img src="../assets/images/alok.png" alt="img">
            </div>
            <div class="profile_title">
                <h3>{{ $file->user_name }}</h3>    
            </div>
        </div>
    </div>
@endif

                                </li>

                                

                                <li class="Uploaded">
<div class="icon_nrt">
<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_511_1657)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.00015 6.56241C5.08303 6.56241 5.16252 6.52948 5.22112 6.47088C5.27973 6.41227 5.31265 6.33279 5.31265 6.24991V1.67782L6.01265 2.49491C6.06658 2.5579 6.14332 2.59688 6.22599 2.60329C6.30866 2.6097 6.3905 2.583 6.45348 2.52907C6.51647 2.47515 6.55546 2.39841 6.56187 2.31573C6.56828 2.23306 6.54158 2.15123 6.48765 2.08824L5.23765 0.629907C5.20831 0.595601 5.17189 0.568058 5.13089 0.549172C5.08989 0.530287 5.04529 0.520508 5.00015 0.520508C4.95501 0.520508 4.91041 0.530287 4.86941 0.549172C4.82841 0.568058 4.79199 0.595601 4.76265 0.629907L3.51265 2.08824C3.48595 2.11943 3.46565 2.15557 3.45292 2.19461C3.44018 2.23364 3.43526 2.2748 3.43843 2.31573C3.44161 2.35667 3.45281 2.39658 3.47141 2.43318C3.49 2.46979 3.51563 2.50237 3.54682 2.52907C3.57801 2.55578 3.61415 2.57607 3.65318 2.58881C3.69222 2.60154 3.73338 2.60646 3.77431 2.60329C3.81525 2.60012 3.85516 2.58891 3.89176 2.57032C3.92837 2.55172 3.96095 2.5261 3.98765 2.49491L4.68765 1.67824V6.24991C4.68765 6.42241 4.82765 6.56241 5.00015 6.56241Z" fill="white"/>
<path d="M6.66536 3.75C6.37286 3.75 6.22661 3.75 6.1212 3.82042C6.07587 3.85074 6.03694 3.88968 6.00661 3.935C5.9362 4.04042 5.9362 4.18667 5.9362 4.47917V6.25C5.9362 6.49864 5.83742 6.7371 5.66161 6.91291C5.48579 7.08873 5.24734 7.1875 4.9987 7.1875C4.75006 7.1875 4.5116 7.08873 4.33578 6.91291C4.15997 6.7371 4.0612 6.49864 4.0612 6.25V4.47917C4.0612 4.18667 4.0612 4.04042 3.99078 3.935C3.96045 3.88968 3.92152 3.85074 3.8762 3.82042C3.77078 3.75 3.62453 3.75 3.33203 3.75C2.1537 3.75 1.56411 3.75 1.19828 4.11625C0.832031 4.48208 0.832031 5.07083 0.832031 6.24958V6.66625C0.832031 7.84542 0.832031 8.43417 1.19828 8.80042C1.56411 9.16667 2.1537 9.16667 3.33203 9.16667H6.66536C7.8437 9.16667 8.43328 9.16667 8.79911 8.80042C9.16536 8.43417 9.16536 7.845 9.16536 6.66667V6.25C9.16536 5.07125 9.16536 4.48208 8.79911 4.11625C8.43328 3.75 7.8437 3.75 6.66536 3.75Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_511_1657">
<rect width="10" height="10" fill="white"/>
</clipPath>
</defs>
</svg>
                        </div>
                        <div class="action_history">
                            <div class="ah_head">                                
                            <h3>Uploaded</h3>
                            <b>.</b>
                            <span>{{ \Carbon\Carbon::parse($file->created_at)->format('d M, Y | H:i') }}</span>
                            </div>
                            <div class="Reason">                                
                            <h3>Reason</h3>
                            <span>"{{ $file->reasons_for_change}}"</span>
                            </div>
                            <div class="profile_ah">
                                <div class="pro_imnn">
                                    <img src="../assets/images/alok.png" alt="img">
                        </div>
                        <div class="profile_title">
                    <h3>{{ $file->user_name}}</h3>    
                    </div>

                        </div>

                        </div>
                                </li>

                               

                               

                            </ul>
                        </div>
                        </div>
                        </div>
                        @endforeach
                  <!------ HISTORY SECRTION END------->
 <!------ HISTORY SECRTION START------->
 @foreach($pan as $file)
 <div class="history_main history_main_3">
                  <div class="history_inner">
                    <div class="close_nt">
                    <button id="closeBtn3"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"></rect>
                                            <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"></rect>
                                          </svg></button>
                        </div>
                        <div class="history_head">
                        <h2>History</h2>
                        <h3>{{ $file->real_file_name}}</h3>
                        </div>
                        <div class="histy_body">
                            <ul>
                                <li class="Renamed">
<div class="icon_nrt">
<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.5 7.99995L5.5 9.99995H10.5V7.99995H7.5ZM6.03 3.59495L1.5 8.12495V9.99995H3.375L7.905 5.46995L6.03 3.59495ZM9.355 4.01995C9.55 3.82495 9.55 3.49995 9.355 3.31495L8.185 2.14495C8.09126 2.05194 7.96455 1.99976 7.8325 1.99976C7.70045 1.99976 7.57375 2.05194 7.48 2.14495L6.565 3.05995L8.44 4.93495L9.355 4.01995Z" fill="white"/>
</svg>
                        </div>
                        @if($file->activities)
    <div class="action_history">
        @php
            $formattedDate = \Carbon\Carbon::parse($file->update_dates)->format('d M, Y | H:i');
        @endphp

        @foreach(explode('.', $file->activities) as $activity)
            @if(trim($activity) == 'File updated' || trim($activity) == 'File name changed')
                <div class="ah_head">                                
                    <h3>{{ trim($activity) }}</h3>
                    <b>.</b>
                    <span>{{ $formattedDate }}</span>
                </div>
            @endif
        @endforeach

        <div class="profile_ah">
            <div class="pro_imnn">
                <img src="../assets/images/alok.png" alt="img">
            </div>
            <div class="profile_title">
                <h3>{{ $file->user_name }}</h3>    
            </div>
        </div>
    </div>
@endif

                                </li>

                                

                                <li class="Uploaded">
<div class="icon_nrt">
<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_511_1657)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.00015 6.56241C5.08303 6.56241 5.16252 6.52948 5.22112 6.47088C5.27973 6.41227 5.31265 6.33279 5.31265 6.24991V1.67782L6.01265 2.49491C6.06658 2.5579 6.14332 2.59688 6.22599 2.60329C6.30866 2.6097 6.3905 2.583 6.45348 2.52907C6.51647 2.47515 6.55546 2.39841 6.56187 2.31573C6.56828 2.23306 6.54158 2.15123 6.48765 2.08824L5.23765 0.629907C5.20831 0.595601 5.17189 0.568058 5.13089 0.549172C5.08989 0.530287 5.04529 0.520508 5.00015 0.520508C4.95501 0.520508 4.91041 0.530287 4.86941 0.549172C4.82841 0.568058 4.79199 0.595601 4.76265 0.629907L3.51265 2.08824C3.48595 2.11943 3.46565 2.15557 3.45292 2.19461C3.44018 2.23364 3.43526 2.2748 3.43843 2.31573C3.44161 2.35667 3.45281 2.39658 3.47141 2.43318C3.49 2.46979 3.51563 2.50237 3.54682 2.52907C3.57801 2.55578 3.61415 2.57607 3.65318 2.58881C3.69222 2.60154 3.73338 2.60646 3.77431 2.60329C3.81525 2.60012 3.85516 2.58891 3.89176 2.57032C3.92837 2.55172 3.96095 2.5261 3.98765 2.49491L4.68765 1.67824V6.24991C4.68765 6.42241 4.82765 6.56241 5.00015 6.56241Z" fill="white"/>
<path d="M6.66536 3.75C6.37286 3.75 6.22661 3.75 6.1212 3.82042C6.07587 3.85074 6.03694 3.88968 6.00661 3.935C5.9362 4.04042 5.9362 4.18667 5.9362 4.47917V6.25C5.9362 6.49864 5.83742 6.7371 5.66161 6.91291C5.48579 7.08873 5.24734 7.1875 4.9987 7.1875C4.75006 7.1875 4.5116 7.08873 4.33578 6.91291C4.15997 6.7371 4.0612 6.49864 4.0612 6.25V4.47917C4.0612 4.18667 4.0612 4.04042 3.99078 3.935C3.96045 3.88968 3.92152 3.85074 3.8762 3.82042C3.77078 3.75 3.62453 3.75 3.33203 3.75C2.1537 3.75 1.56411 3.75 1.19828 4.11625C0.832031 4.48208 0.832031 5.07083 0.832031 6.24958V6.66625C0.832031 7.84542 0.832031 8.43417 1.19828 8.80042C1.56411 9.16667 2.1537 9.16667 3.33203 9.16667H6.66536C7.8437 9.16667 8.43328 9.16667 8.79911 8.80042C9.16536 8.43417 9.16536 7.845 9.16536 6.66667V6.25C9.16536 5.07125 9.16536 4.48208 8.79911 4.11625C8.43328 3.75 7.8437 3.75 6.66536 3.75Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_511_1657">
<rect width="10" height="10" fill="white"/>
</clipPath>
</defs>
</svg>
                        </div>
                        <div class="action_history">
                            <div class="ah_head">                                
                            <h3>Uploaded</h3>
                            <b>.</b>
                            <span>{{ \Carbon\Carbon::parse($file->created_at)->format('d M, Y | H:i') }}</span>
                            </div>
                            <div class="Reason">                                
                            <h3>Reason</h3>
                      
                            <span>"{{ $file->reasons_for_change}}"</span>
                            </div>
                            <div class="profile_ah">
                                <div class="pro_imnn">
                                    <img src="../assets/images/alok.png" alt="img">
                        </div>
                        <div class="profile_title">
                    <h3>{{ $file->user_name}}</h3>    
                    </div>

                        </div>

                        </div>
                                </li>

                               

                               

                            </ul>
                        </div>
                        </div>
                        </div>
                        @endforeach
                  <!------ HISTORY SECRTION END------->

                   <!------ HISTORY SECRTION START------->
                   @foreach($tan as $file)
 <div class="history_main history_main_4">
                  <div class="history_inner">
                    <div class="close_nt">
                    <button id="closeBtn4"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"></rect>
                                            <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"></rect>
                                          </svg></button>
                        </div>
                        <div class="history_head">
                        <h2>History</h2>
                        <h3>{{ $file->real_file_name}}</h3>
                        </div>
                        <div class="histy_body">
                            <ul>
                                <li class="Renamed">
<div class="icon_nrt">
<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.5 7.99995L5.5 9.99995H10.5V7.99995H7.5ZM6.03 3.59495L1.5 8.12495V9.99995H3.375L7.905 5.46995L6.03 3.59495ZM9.355 4.01995C9.55 3.82495 9.55 3.49995 9.355 3.31495L8.185 2.14495C8.09126 2.05194 7.96455 1.99976 7.8325 1.99976C7.70045 1.99976 7.57375 2.05194 7.48 2.14495L6.565 3.05995L8.44 4.93495L9.355 4.01995Z" fill="white"/>
</svg>
                        </div>
                        @if($file->activities)
    <div class="action_history">
        @php
            $formattedDate = \Carbon\Carbon::parse($file->update_dates)->format('d M, Y | H:i');
        @endphp

        @foreach(explode('.', $file->activities) as $activity)
            @if(trim($activity) == 'File updated' || trim($activity) == 'File name changed')
                <div class="ah_head">                                
                    <h3>{{ trim($activity) }}</h3>
                    <b>.</b>
                    <span>{{ $formattedDate }}</span>
                </div>
            @endif
        @endforeach

        <div class="profile_ah">
            <div class="pro_imnn">
                <img src="../assets/images/alok.png" alt="img">
            </div>
            <div class="profile_title">
                <h3>{{ $file->user_name }}</h3>    
            </div>
        </div>
    </div>
@endif

                                </li>

                                

                                <li class="Uploaded">
<div class="icon_nrt">
<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_511_1657)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.00015 6.56241C5.08303 6.56241 5.16252 6.52948 5.22112 6.47088C5.27973 6.41227 5.31265 6.33279 5.31265 6.24991V1.67782L6.01265 2.49491C6.06658 2.5579 6.14332 2.59688 6.22599 2.60329C6.30866 2.6097 6.3905 2.583 6.45348 2.52907C6.51647 2.47515 6.55546 2.39841 6.56187 2.31573C6.56828 2.23306 6.54158 2.15123 6.48765 2.08824L5.23765 0.629907C5.20831 0.595601 5.17189 0.568058 5.13089 0.549172C5.08989 0.530287 5.04529 0.520508 5.00015 0.520508C4.95501 0.520508 4.91041 0.530287 4.86941 0.549172C4.82841 0.568058 4.79199 0.595601 4.76265 0.629907L3.51265 2.08824C3.48595 2.11943 3.46565 2.15557 3.45292 2.19461C3.44018 2.23364 3.43526 2.2748 3.43843 2.31573C3.44161 2.35667 3.45281 2.39658 3.47141 2.43318C3.49 2.46979 3.51563 2.50237 3.54682 2.52907C3.57801 2.55578 3.61415 2.57607 3.65318 2.58881C3.69222 2.60154 3.73338 2.60646 3.77431 2.60329C3.81525 2.60012 3.85516 2.58891 3.89176 2.57032C3.92837 2.55172 3.96095 2.5261 3.98765 2.49491L4.68765 1.67824V6.24991C4.68765 6.42241 4.82765 6.56241 5.00015 6.56241Z" fill="white"/>
<path d="M6.66536 3.75C6.37286 3.75 6.22661 3.75 6.1212 3.82042C6.07587 3.85074 6.03694 3.88968 6.00661 3.935C5.9362 4.04042 5.9362 4.18667 5.9362 4.47917V6.25C5.9362 6.49864 5.83742 6.7371 5.66161 6.91291C5.48579 7.08873 5.24734 7.1875 4.9987 7.1875C4.75006 7.1875 4.5116 7.08873 4.33578 6.91291C4.15997 6.7371 4.0612 6.49864 4.0612 6.25V4.47917C4.0612 4.18667 4.0612 4.04042 3.99078 3.935C3.96045 3.88968 3.92152 3.85074 3.8762 3.82042C3.77078 3.75 3.62453 3.75 3.33203 3.75C2.1537 3.75 1.56411 3.75 1.19828 4.11625C0.832031 4.48208 0.832031 5.07083 0.832031 6.24958V6.66625C0.832031 7.84542 0.832031 8.43417 1.19828 8.80042C1.56411 9.16667 2.1537 9.16667 3.33203 9.16667H6.66536C7.8437 9.16667 8.43328 9.16667 8.79911 8.80042C9.16536 8.43417 9.16536 7.845 9.16536 6.66667V6.25C9.16536 5.07125 9.16536 4.48208 8.79911 4.11625C8.43328 3.75 7.8437 3.75 6.66536 3.75Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_511_1657">
<rect width="10" height="10" fill="white"/>
</clipPath>
</defs>
</svg>
                        </div>
                        <div class="action_history">
                            <div class="ah_head">                                
                            <h3>Uploaded</h3>
                            <b>.</b>
                            <span>{{ \Carbon\Carbon::parse($file->created_at)->format('d M, Y | H:i') }}</span>
                            </div>
                            <div class="Reason">                                
                            <h3>Reason</h3>                            
                            <span>"{{ $file->reasons_for_change}}"</span>
                            </div>
                            <div class="profile_ah">
                                <div class="pro_imnn">
                                    <img src="../assets/images/alok.png" alt="img">
                        </div>
                        <div class="profile_title">
                    <h3>{{ $file->user_name}}</h3>    
                    </div>

                        </div>

                        </div>
                                </li>

                               

                               

                            </ul>
                        </div>
                        </div>
                        </div>
                        @endforeach
                  <!------ HISTORY SECRTION END------->

                   <!------ HISTORY SECRTION START------->
                   @foreach($inc as $file)
 <div class="history_main history_main_5">
                  <div class="history_inner">
                    <div class="close_nt">
                    <button id="closeBtn5"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"></rect>
                                            <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"></rect>
                                          </svg></button>
                        </div>
                        <div class="history_head">
                        <h2>History</h2>
                        <h3>{{ $file->real_file_name}}</h3>
                        </div>
                        <div class="histy_body">
                            <ul>
                                <li class="Renamed">
<div class="icon_nrt">
<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.5 7.99995L5.5 9.99995H10.5V7.99995H7.5ZM6.03 3.59495L1.5 8.12495V9.99995H3.375L7.905 5.46995L6.03 3.59495ZM9.355 4.01995C9.55 3.82495 9.55 3.49995 9.355 3.31495L8.185 2.14495C8.09126 2.05194 7.96455 1.99976 7.8325 1.99976C7.70045 1.99976 7.57375 2.05194 7.48 2.14495L6.565 3.05995L8.44 4.93495L9.355 4.01995Z" fill="white"/>
</svg>
                        </div>
                        @if($file->activities)
    <div class="action_history">
        @php
            $formattedDate = \Carbon\Carbon::parse($file->update_dates)->format('d M, Y | H:i');
        @endphp

        @foreach(explode('.', $file->activities) as $activity)
            @if(trim($activity) == 'File updated' || trim($activity) == 'File name changed')
                <div class="ah_head">                                
                    <h3>{{ trim($activity) }}</h3>
                    <b>.</b>
                    <span>{{ $formattedDate }}</span>
                </div>
            @endif
        @endforeach

        <div class="profile_ah">
            <div class="pro_imnn">
                <img src="../assets/images/alok.png" alt="img">
            </div>
            <div class="profile_title">
                <h3>{{ $file->user_name }}</h3>    
            </div>
        </div>
    </div>
@endif

                                </li>

                                

                                <li class="Uploaded">
<div class="icon_nrt">
<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_511_1657)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.00015 6.56241C5.08303 6.56241 5.16252 6.52948 5.22112 6.47088C5.27973 6.41227 5.31265 6.33279 5.31265 6.24991V1.67782L6.01265 2.49491C6.06658 2.5579 6.14332 2.59688 6.22599 2.60329C6.30866 2.6097 6.3905 2.583 6.45348 2.52907C6.51647 2.47515 6.55546 2.39841 6.56187 2.31573C6.56828 2.23306 6.54158 2.15123 6.48765 2.08824L5.23765 0.629907C5.20831 0.595601 5.17189 0.568058 5.13089 0.549172C5.08989 0.530287 5.04529 0.520508 5.00015 0.520508C4.95501 0.520508 4.91041 0.530287 4.86941 0.549172C4.82841 0.568058 4.79199 0.595601 4.76265 0.629907L3.51265 2.08824C3.48595 2.11943 3.46565 2.15557 3.45292 2.19461C3.44018 2.23364 3.43526 2.2748 3.43843 2.31573C3.44161 2.35667 3.45281 2.39658 3.47141 2.43318C3.49 2.46979 3.51563 2.50237 3.54682 2.52907C3.57801 2.55578 3.61415 2.57607 3.65318 2.58881C3.69222 2.60154 3.73338 2.60646 3.77431 2.60329C3.81525 2.60012 3.85516 2.58891 3.89176 2.57032C3.92837 2.55172 3.96095 2.5261 3.98765 2.49491L4.68765 1.67824V6.24991C4.68765 6.42241 4.82765 6.56241 5.00015 6.56241Z" fill="white"/>
<path d="M6.66536 3.75C6.37286 3.75 6.22661 3.75 6.1212 3.82042C6.07587 3.85074 6.03694 3.88968 6.00661 3.935C5.9362 4.04042 5.9362 4.18667 5.9362 4.47917V6.25C5.9362 6.49864 5.83742 6.7371 5.66161 6.91291C5.48579 7.08873 5.24734 7.1875 4.9987 7.1875C4.75006 7.1875 4.5116 7.08873 4.33578 6.91291C4.15997 6.7371 4.0612 6.49864 4.0612 6.25V4.47917C4.0612 4.18667 4.0612 4.04042 3.99078 3.935C3.96045 3.88968 3.92152 3.85074 3.8762 3.82042C3.77078 3.75 3.62453 3.75 3.33203 3.75C2.1537 3.75 1.56411 3.75 1.19828 4.11625C0.832031 4.48208 0.832031 5.07083 0.832031 6.24958V6.66625C0.832031 7.84542 0.832031 8.43417 1.19828 8.80042C1.56411 9.16667 2.1537 9.16667 3.33203 9.16667H6.66536C7.8437 9.16667 8.43328 9.16667 8.79911 8.80042C9.16536 8.43417 9.16536 7.845 9.16536 6.66667V6.25C9.16536 5.07125 9.16536 4.48208 8.79911 4.11625C8.43328 3.75 7.8437 3.75 6.66536 3.75Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_511_1657">
<rect width="10" height="10" fill="white"/>
</clipPath>
</defs>
</svg>
                        </div>
                        <div class="action_history">
                            <div class="ah_head">                                
                            <h3>Uploaded</h3>
                            <b>.</b>
                            <span>{{ \Carbon\Carbon::parse($file->created_at)->format('d M, Y | H:i') }}</span>
                            </div>
                            <div class="Reason">                                
                            <h3>Reason</h3>
                            <span>"{{ $file->reasons_for_change}}"</span>
                            </div>
                            <div class="profile_ah">
                                <div class="pro_imnn">
                                    <img src="../assets/images/alok.png" alt="img">
                        </div>
                        <div class="profile_title">
                    <h3>{{ $file->user_name}}</h3>    
                    </div>

                        </div>

                        </div>
                                </li>

                               

                               

                            </ul>
                        </div>
                        </div>
                        </div>
                        @endforeach
                  <!------ HISTORY SECRTION END------->
                   <!------ HISTORY SECRTION START------->
                   @foreach($spicedoc as $file)
 <div class="history_main history_main_6">
                  <div class="history_inner">
                    <div class="close_nt">
                    <button id="closeBtn6"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"></rect>
                                            <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"></rect>
                                          </svg></button>
                        </div>
                        <div class="history_head">
                        <h2>History</h2>
                        <h3>{{ $file->real_file_name}}</h3>
                        </div>
                        <div class="histy_body">
                            <ul>
                                <li class="Renamed">
<div class="icon_nrt">
<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.5 7.99995L5.5 9.99995H10.5V7.99995H7.5ZM6.03 3.59495L1.5 8.12495V9.99995H3.375L7.905 5.46995L6.03 3.59495ZM9.355 4.01995C9.55 3.82495 9.55 3.49995 9.355 3.31495L8.185 2.14495C8.09126 2.05194 7.96455 1.99976 7.8325 1.99976C7.70045 1.99976 7.57375 2.05194 7.48 2.14495L6.565 3.05995L8.44 4.93495L9.355 4.01995Z" fill="white"/>
</svg>
                        </div>
                        @if($file->activities)
    <div class="action_history">
        @php
            $formattedDate = \Carbon\Carbon::parse($file->update_dates)->format('d M, Y | H:i');
        @endphp

        @foreach(explode('.', $file->activities) as $activity)
            @if(trim($activity) == 'File updated' || trim($activity) == 'File name changed')
                <div class="ah_head">                                
                    <h3>{{ trim($activity) }}</h3>
                    <b>.</b>
                    <span>{{ $formattedDate }}</span>
                </div>
            @endif
        @endforeach

        <div class="profile_ah">
            <div class="pro_imnn">
                <img src="../assets/images/alok.png" alt="img">
            </div>
            <div class="profile_title">
                <h3>{{ $file->user_name }}</h3>    
            </div>
        </div>
    </div>
@endif

                                </li>

                                

                                <li class="Uploaded">
<div class="icon_nrt">
<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_511_1657)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.00015 6.56241C5.08303 6.56241 5.16252 6.52948 5.22112 6.47088C5.27973 6.41227 5.31265 6.33279 5.31265 6.24991V1.67782L6.01265 2.49491C6.06658 2.5579 6.14332 2.59688 6.22599 2.60329C6.30866 2.6097 6.3905 2.583 6.45348 2.52907C6.51647 2.47515 6.55546 2.39841 6.56187 2.31573C6.56828 2.23306 6.54158 2.15123 6.48765 2.08824L5.23765 0.629907C5.20831 0.595601 5.17189 0.568058 5.13089 0.549172C5.08989 0.530287 5.04529 0.520508 5.00015 0.520508C4.95501 0.520508 4.91041 0.530287 4.86941 0.549172C4.82841 0.568058 4.79199 0.595601 4.76265 0.629907L3.51265 2.08824C3.48595 2.11943 3.46565 2.15557 3.45292 2.19461C3.44018 2.23364 3.43526 2.2748 3.43843 2.31573C3.44161 2.35667 3.45281 2.39658 3.47141 2.43318C3.49 2.46979 3.51563 2.50237 3.54682 2.52907C3.57801 2.55578 3.61415 2.57607 3.65318 2.58881C3.69222 2.60154 3.73338 2.60646 3.77431 2.60329C3.81525 2.60012 3.85516 2.58891 3.89176 2.57032C3.92837 2.55172 3.96095 2.5261 3.98765 2.49491L4.68765 1.67824V6.24991C4.68765 6.42241 4.82765 6.56241 5.00015 6.56241Z" fill="white"/>
<path d="M6.66536 3.75C6.37286 3.75 6.22661 3.75 6.1212 3.82042C6.07587 3.85074 6.03694 3.88968 6.00661 3.935C5.9362 4.04042 5.9362 4.18667 5.9362 4.47917V6.25C5.9362 6.49864 5.83742 6.7371 5.66161 6.91291C5.48579 7.08873 5.24734 7.1875 4.9987 7.1875C4.75006 7.1875 4.5116 7.08873 4.33578 6.91291C4.15997 6.7371 4.0612 6.49864 4.0612 6.25V4.47917C4.0612 4.18667 4.0612 4.04042 3.99078 3.935C3.96045 3.88968 3.92152 3.85074 3.8762 3.82042C3.77078 3.75 3.62453 3.75 3.33203 3.75C2.1537 3.75 1.56411 3.75 1.19828 4.11625C0.832031 4.48208 0.832031 5.07083 0.832031 6.24958V6.66625C0.832031 7.84542 0.832031 8.43417 1.19828 8.80042C1.56411 9.16667 2.1537 9.16667 3.33203 9.16667H6.66536C7.8437 9.16667 8.43328 9.16667 8.79911 8.80042C9.16536 8.43417 9.16536 7.845 9.16536 6.66667V6.25C9.16536 5.07125 9.16536 4.48208 8.79911 4.11625C8.43328 3.75 7.8437 3.75 6.66536 3.75Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_511_1657">
<rect width="10" height="10" fill="white"/>
</clipPath>
</defs>
</svg>
                        </div>
                        <div class="action_history">
                            <div class="ah_head">                                
                            <h3>Uploaded</h3>
                            <b>.</b>
                            <span>{{ \Carbon\Carbon::parse($file->created_at)->format('d M, Y | H:i') }}</span>
                            </div>
                            <div class="Reason">                                
                            <h3>Reason</h3>
                            <span>"{{ $file->reasons_for_change}}"</span>
                            </div>
                            <div class="profile_ah">
                                <div class="pro_imnn">
                                    <img src="../assets/images/alok.png" alt="img">
                        </div>
                        <div class="profile_title">
                    <h3>{{ $file->user_name}}</h3>    
                    </div>

                        </div>

                        </div>
                                </li>

                               

                               

                            </ul>
                        </div>
                        </div>
                        </div>
                        @endforeach
                         <!------ HISTORY SECRTION END------->

                   <!------ Provident Fund HISTORY SECRTION START------->
                   @foreach($pfdoc as $file)
 <div class="history_main history_main_08">
                  <div class="history_inner">
                    <div class="close_nt">
                    <button id="closeBtn08"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"></rect>
                                            <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"></rect>
                                          </svg></button>
                        </div>
                        <div class="history_head">
                        <h2>History</h2>
                        <h3>{{ $file->real_file_name}}</h3>
                        </div>
                        <div class="histy_body">
                            <ul>
                                <li class="Renamed">
<div class="icon_nrt">
<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.5 7.99995L5.5 9.99995H10.5V7.99995H7.5ZM6.03 3.59495L1.5 8.12495V9.99995H3.375L7.905 5.46995L6.03 3.59495ZM9.355 4.01995C9.55 3.82495 9.55 3.49995 9.355 3.31495L8.185 2.14495C8.09126 2.05194 7.96455 1.99976 7.8325 1.99976C7.70045 1.99976 7.57375 2.05194 7.48 2.14495L6.565 3.05995L8.44 4.93495L9.355 4.01995Z" fill="white"/>
</svg>
                        </div>
                        @if($file->activities)
    <div class="action_history">
        @php
            $formattedDate = \Carbon\Carbon::parse($file->update_dates)->format('d M, Y | H:i');
        @endphp

        @foreach(explode('.', $file->activities) as $activity)
            @if(trim($activity) == 'File updated' || trim($activity) == 'File name changed')
                <div class="ah_head">                                
                    <h3>{{ trim($activity) }}</h3>
                    <b>.</b>
                    <span>{{ $formattedDate }}</span>
                </div>
            @endif
        @endforeach

        <div class="profile_ah">
            <div class="pro_imnn">
                <img src="../assets/images/alok.png" alt="img">
            </div>
            <div class="profile_title">
                <h3>{{ $file->user_name }}</h3>    
            </div>
        </div>
    </div>
@endif

                                </li>

                                

                                <li class="Uploaded">
<div class="icon_nrt">
<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_511_1657)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.00015 6.56241C5.08303 6.56241 5.16252 6.52948 5.22112 6.47088C5.27973 6.41227 5.31265 6.33279 5.31265 6.24991V1.67782L6.01265 2.49491C6.06658 2.5579 6.14332 2.59688 6.22599 2.60329C6.30866 2.6097 6.3905 2.583 6.45348 2.52907C6.51647 2.47515 6.55546 2.39841 6.56187 2.31573C6.56828 2.23306 6.54158 2.15123 6.48765 2.08824L5.23765 0.629907C5.20831 0.595601 5.17189 0.568058 5.13089 0.549172C5.08989 0.530287 5.04529 0.520508 5.00015 0.520508C4.95501 0.520508 4.91041 0.530287 4.86941 0.549172C4.82841 0.568058 4.79199 0.595601 4.76265 0.629907L3.51265 2.08824C3.48595 2.11943 3.46565 2.15557 3.45292 2.19461C3.44018 2.23364 3.43526 2.2748 3.43843 2.31573C3.44161 2.35667 3.45281 2.39658 3.47141 2.43318C3.49 2.46979 3.51563 2.50237 3.54682 2.52907C3.57801 2.55578 3.61415 2.57607 3.65318 2.58881C3.69222 2.60154 3.73338 2.60646 3.77431 2.60329C3.81525 2.60012 3.85516 2.58891 3.89176 2.57032C3.92837 2.55172 3.96095 2.5261 3.98765 2.49491L4.68765 1.67824V6.24991C4.68765 6.42241 4.82765 6.56241 5.00015 6.56241Z" fill="white"/>
<path d="M6.66536 3.75C6.37286 3.75 6.22661 3.75 6.1212 3.82042C6.07587 3.85074 6.03694 3.88968 6.00661 3.935C5.9362 4.04042 5.9362 4.18667 5.9362 4.47917V6.25C5.9362 6.49864 5.83742 6.7371 5.66161 6.91291C5.48579 7.08873 5.24734 7.1875 4.9987 7.1875C4.75006 7.1875 4.5116 7.08873 4.33578 6.91291C4.15997 6.7371 4.0612 6.49864 4.0612 6.25V4.47917C4.0612 4.18667 4.0612 4.04042 3.99078 3.935C3.96045 3.88968 3.92152 3.85074 3.8762 3.82042C3.77078 3.75 3.62453 3.75 3.33203 3.75C2.1537 3.75 1.56411 3.75 1.19828 4.11625C0.832031 4.48208 0.832031 5.07083 0.832031 6.24958V6.66625C0.832031 7.84542 0.832031 8.43417 1.19828 8.80042C1.56411 9.16667 2.1537 9.16667 3.33203 9.16667H6.66536C7.8437 9.16667 8.43328 9.16667 8.79911 8.80042C9.16536 8.43417 9.16536 7.845 9.16536 6.66667V6.25C9.16536 5.07125 9.16536 4.48208 8.79911 4.11625C8.43328 3.75 7.8437 3.75 6.66536 3.75Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_511_1657">
<rect width="10" height="10" fill="white"/>
</clipPath>
</defs>
</svg>
                        </div>
                        <div class="action_history">
                            <div class="ah_head">                                
                            <h3>Uploaded</h3>
                            <b>.</b>
                            <span>{{ \Carbon\Carbon::parse($file->created_at)->format('d M, Y | H:i') }}</span>
                            </div>
                            <div class="Reason">                                
                            <h3>Reason</h3>
                            <span>"{{ $file->reasons_for_change}}"</span>
                            </div>
                            <div class="profile_ah">
                                <div class="pro_imnn">
                                    <img src="../assets/images/alok.png" alt="img">
                        </div>
                        <div class="profile_title">
                    <h3>{{ $file->user_name}}</h3>    
                    </div>

                        </div>

                        </div>
                                </li>

                               

                               

                            </ul>
                        </div>
                        </div>
                        </div>
                        @endforeach
                         <!------ Provident Fund HISTORY SECRTION END------->

                         <!------ Employee State Insurance HISTORY SECRTION START------->
                   @foreach($esidoc as $file)
 <div class="history_main history_main_09">
                  <div class="history_inner">
                    <div class="close_nt">
                    <button id="closeBtn09"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"></rect>
                                            <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"></rect>
                                          </svg></button>
                        </div>
                        <div class="history_head">
                        <h2>History</h2>
                        <h3>{{ $file->real_file_name}}</h3>
                        </div>
                        <div class="histy_body">
                            <ul>
                                <li class="Renamed">
<div class="icon_nrt">
<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.5 7.99995L5.5 9.99995H10.5V7.99995H7.5ZM6.03 3.59495L1.5 8.12495V9.99995H3.375L7.905 5.46995L6.03 3.59495ZM9.355 4.01995C9.55 3.82495 9.55 3.49995 9.355 3.31495L8.185 2.14495C8.09126 2.05194 7.96455 1.99976 7.8325 1.99976C7.70045 1.99976 7.57375 2.05194 7.48 2.14495L6.565 3.05995L8.44 4.93495L9.355 4.01995Z" fill="white"/>
</svg>
                        </div>
                        @if($file->activities)
    <div class="action_history">
        @php
            $formattedDate = \Carbon\Carbon::parse($file->update_dates)->format('d M, Y | H:i');
        @endphp

        @foreach(explode('.', $file->activities) as $activity)
            @if(trim($activity) == 'File updated' || trim($activity) == 'File name changed')
                <div class="ah_head">                                
                    <h3>{{ trim($activity) }}</h3>
                    <b>.</b>
                    <span>{{ $formattedDate }}</span>
                </div>
            @endif
        @endforeach

        <div class="profile_ah">
            <div class="pro_imnn">
                <img src="../assets/images/alok.png" alt="img">
            </div>
            <div class="profile_title">
                <h3>{{ $file->user_name }}</h3>    
            </div>
        </div>
    </div>
@endif

                                </li>

                                

                                <li class="Uploaded">
<div class="icon_nrt">
<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_511_1657)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.00015 6.56241C5.08303 6.56241 5.16252 6.52948 5.22112 6.47088C5.27973 6.41227 5.31265 6.33279 5.31265 6.24991V1.67782L6.01265 2.49491C6.06658 2.5579 6.14332 2.59688 6.22599 2.60329C6.30866 2.6097 6.3905 2.583 6.45348 2.52907C6.51647 2.47515 6.55546 2.39841 6.56187 2.31573C6.56828 2.23306 6.54158 2.15123 6.48765 2.08824L5.23765 0.629907C5.20831 0.595601 5.17189 0.568058 5.13089 0.549172C5.08989 0.530287 5.04529 0.520508 5.00015 0.520508C4.95501 0.520508 4.91041 0.530287 4.86941 0.549172C4.82841 0.568058 4.79199 0.595601 4.76265 0.629907L3.51265 2.08824C3.48595 2.11943 3.46565 2.15557 3.45292 2.19461C3.44018 2.23364 3.43526 2.2748 3.43843 2.31573C3.44161 2.35667 3.45281 2.39658 3.47141 2.43318C3.49 2.46979 3.51563 2.50237 3.54682 2.52907C3.57801 2.55578 3.61415 2.57607 3.65318 2.58881C3.69222 2.60154 3.73338 2.60646 3.77431 2.60329C3.81525 2.60012 3.85516 2.58891 3.89176 2.57032C3.92837 2.55172 3.96095 2.5261 3.98765 2.49491L4.68765 1.67824V6.24991C4.68765 6.42241 4.82765 6.56241 5.00015 6.56241Z" fill="white"/>
<path d="M6.66536 3.75C6.37286 3.75 6.22661 3.75 6.1212 3.82042C6.07587 3.85074 6.03694 3.88968 6.00661 3.935C5.9362 4.04042 5.9362 4.18667 5.9362 4.47917V6.25C5.9362 6.49864 5.83742 6.7371 5.66161 6.91291C5.48579 7.08873 5.24734 7.1875 4.9987 7.1875C4.75006 7.1875 4.5116 7.08873 4.33578 6.91291C4.15997 6.7371 4.0612 6.49864 4.0612 6.25V4.47917C4.0612 4.18667 4.0612 4.04042 3.99078 3.935C3.96045 3.88968 3.92152 3.85074 3.8762 3.82042C3.77078 3.75 3.62453 3.75 3.33203 3.75C2.1537 3.75 1.56411 3.75 1.19828 4.11625C0.832031 4.48208 0.832031 5.07083 0.832031 6.24958V6.66625C0.832031 7.84542 0.832031 8.43417 1.19828 8.80042C1.56411 9.16667 2.1537 9.16667 3.33203 9.16667H6.66536C7.8437 9.16667 8.43328 9.16667 8.79911 8.80042C9.16536 8.43417 9.16536 7.845 9.16536 6.66667V6.25C9.16536 5.07125 9.16536 4.48208 8.79911 4.11625C8.43328 3.75 7.8437 3.75 6.66536 3.75Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_511_1657">
<rect width="10" height="10" fill="white"/>
</clipPath>
</defs>
</svg>
                        </div>
                        <div class="action_history">
                            <div class="ah_head">                                
                            <h3>Uploaded</h3>
                            <b>.</b>
                            <span>{{ \Carbon\Carbon::parse($file->created_at)->format('d M, Y | H:i') }}</span>
                            </div>
                            <div class="Reason">                                
                            <h3>Reason</h3>
                            <span>"{{ $file->reasons_for_change}}"</span>
                            </div>
                            <div class="profile_ah">
                                <div class="pro_imnn">
                                    <img src="../assets/images/alok.png" alt="img">
                        </div>
                        <div class="profile_title">
                    <h3>{{ $file->user_name}}</h3>    
                    </div>

                        </div>

                        </div>
                                </li>

                               

                               

                            </ul>
                        </div>
                        </div>
                        </div>
                        @endforeach
                         <!------ Employee State Insurance HISTORY SECRTION END------->


                        <!------ Professional Tax HISTORY SECRTION START------->
                   @foreach($ptdoc as $file)
 <div class="history_main history_main_010">
                  <div class="history_inner">
                    <div class="close_nt">
                    <button id="closeBtn010"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"></rect>
                                            <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"></rect>
                                          </svg></button>
                        </div>
                        <div class="history_head">
                        <h2>History</h2>
                        <h3>{{ $file->real_file_name}}</h3>
                        </div>
                        <div class="histy_body">
                            <ul>
                                <li class="Renamed">
<div class="icon_nrt">
<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.5 7.99995L5.5 9.99995H10.5V7.99995H7.5ZM6.03 3.59495L1.5 8.12495V9.99995H3.375L7.905 5.46995L6.03 3.59495ZM9.355 4.01995C9.55 3.82495 9.55 3.49995 9.355 3.31495L8.185 2.14495C8.09126 2.05194 7.96455 1.99976 7.8325 1.99976C7.70045 1.99976 7.57375 2.05194 7.48 2.14495L6.565 3.05995L8.44 4.93495L9.355 4.01995Z" fill="white"/>
</svg>
                        </div>
                        @if($file->activities)
    <div class="action_history">
        @php
            $formattedDate = \Carbon\Carbon::parse($file->update_dates)->format('d M, Y | H:i');
        @endphp

        @foreach(explode('.', $file->activities) as $activity)
            @if(trim($activity) == 'File updated' || trim($activity) == 'File name changed')
                <div class="ah_head">                                
                    <h3>{{ trim($activity) }}</h3>
                    <b>.</b>
                    <span>{{ $formattedDate }}</span>
                </div>
            @endif
        @endforeach

        <div class="profile_ah">
            <div class="pro_imnn">
                <img src="../assets/images/alok.png" alt="img">
            </div>
            <div class="profile_title">
                <h3>{{ $file->user_name }}</h3>    
            </div>
        </div>
    </div>
@endif

                                </li>

                                

                                <li class="Uploaded">
<div class="icon_nrt">
<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_511_1657)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.00015 6.56241C5.08303 6.56241 5.16252 6.52948 5.22112 6.47088C5.27973 6.41227 5.31265 6.33279 5.31265 6.24991V1.67782L6.01265 2.49491C6.06658 2.5579 6.14332 2.59688 6.22599 2.60329C6.30866 2.6097 6.3905 2.583 6.45348 2.52907C6.51647 2.47515 6.55546 2.39841 6.56187 2.31573C6.56828 2.23306 6.54158 2.15123 6.48765 2.08824L5.23765 0.629907C5.20831 0.595601 5.17189 0.568058 5.13089 0.549172C5.08989 0.530287 5.04529 0.520508 5.00015 0.520508C4.95501 0.520508 4.91041 0.530287 4.86941 0.549172C4.82841 0.568058 4.79199 0.595601 4.76265 0.629907L3.51265 2.08824C3.48595 2.11943 3.46565 2.15557 3.45292 2.19461C3.44018 2.23364 3.43526 2.2748 3.43843 2.31573C3.44161 2.35667 3.45281 2.39658 3.47141 2.43318C3.49 2.46979 3.51563 2.50237 3.54682 2.52907C3.57801 2.55578 3.61415 2.57607 3.65318 2.58881C3.69222 2.60154 3.73338 2.60646 3.77431 2.60329C3.81525 2.60012 3.85516 2.58891 3.89176 2.57032C3.92837 2.55172 3.96095 2.5261 3.98765 2.49491L4.68765 1.67824V6.24991C4.68765 6.42241 4.82765 6.56241 5.00015 6.56241Z" fill="white"/>
<path d="M6.66536 3.75C6.37286 3.75 6.22661 3.75 6.1212 3.82042C6.07587 3.85074 6.03694 3.88968 6.00661 3.935C5.9362 4.04042 5.9362 4.18667 5.9362 4.47917V6.25C5.9362 6.49864 5.83742 6.7371 5.66161 6.91291C5.48579 7.08873 5.24734 7.1875 4.9987 7.1875C4.75006 7.1875 4.5116 7.08873 4.33578 6.91291C4.15997 6.7371 4.0612 6.49864 4.0612 6.25V4.47917C4.0612 4.18667 4.0612 4.04042 3.99078 3.935C3.96045 3.88968 3.92152 3.85074 3.8762 3.82042C3.77078 3.75 3.62453 3.75 3.33203 3.75C2.1537 3.75 1.56411 3.75 1.19828 4.11625C0.832031 4.48208 0.832031 5.07083 0.832031 6.24958V6.66625C0.832031 7.84542 0.832031 8.43417 1.19828 8.80042C1.56411 9.16667 2.1537 9.16667 3.33203 9.16667H6.66536C7.8437 9.16667 8.43328 9.16667 8.79911 8.80042C9.16536 8.43417 9.16536 7.845 9.16536 6.66667V6.25C9.16536 5.07125 9.16536 4.48208 8.79911 4.11625C8.43328 3.75 7.8437 3.75 6.66536 3.75Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_511_1657">
<rect width="10" height="10" fill="white"/>
</clipPath>
</defs>
</svg>
                        </div>
                        <div class="action_history">
                            <div class="ah_head">                                
                            <h3>Uploaded</h3>
                            <b>.</b>
                            <span>{{ \Carbon\Carbon::parse($file->created_at)->format('d M, Y | H:i') }}</span>
                            </div>
                            <div class="Reason">                                
                            <h3>Reason</h3>
                            <span>"{{ $file->reasons_for_change}}"</span>
                            </div>
                            <div class="profile_ah">
                                <div class="pro_imnn">
                                    <img src="../assets/images/alok.png" alt="img">
                        </div>
                        <div class="profile_title">
                    <h3>{{ $file->user_name}}</h3>    
                    </div>

                        </div>

                        </div>
                                </li>

                               

                               

                            </ul>
                        </div>
                        </div>
                        </div>
                        @endforeach
                         <!------ Professional Tax HISTORY SECRTION END------->

                   <!------ Trade license HISTORY SECRTION START------->
                   @foreach($tldoc as $file)
 <div class="history_main history_main_011">
                  <div class="history_inner">
                    <div class="close_nt">
                    <button id="closeBtn011"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"></rect>
                                            <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"></rect>
                                          </svg></button>
                        </div>
                        <div class="history_head">
                        <h2>History</h2>
                        <h3>{{ $file->real_file_name}}</h3>
                        </div>
                        <div class="histy_body">
                            <ul>
                                <li class="Renamed">
<div class="icon_nrt">
<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.5 7.99995L5.5 9.99995H10.5V7.99995H7.5ZM6.03 3.59495L1.5 8.12495V9.99995H3.375L7.905 5.46995L6.03 3.59495ZM9.355 4.01995C9.55 3.82495 9.55 3.49995 9.355 3.31495L8.185 2.14495C8.09126 2.05194 7.96455 1.99976 7.8325 1.99976C7.70045 1.99976 7.57375 2.05194 7.48 2.14495L6.565 3.05995L8.44 4.93495L9.355 4.01995Z" fill="white"/>
</svg>
                        </div>
                        @if($file->activities)
    <div class="action_history">
        @php
            $formattedDate = \Carbon\Carbon::parse($file->update_dates)->format('d M, Y | H:i');
        @endphp

        @foreach(explode('.', $file->activities) as $activity)
            @if(trim($activity) == 'File updated' || trim($activity) == 'File name changed')
                <div class="ah_head">                                
                    <h3>{{ trim($activity) }}</h3>
                    <b>.</b>
                    <span>{{ $formattedDate }}</span>
                </div>
            @endif
        @endforeach

        <div class="profile_ah">
            <div class="pro_imnn">
                <img src="../assets/images/alok.png" alt="img">
            </div>
            <div class="profile_title">
                <h3>{{ $file->user_name }}</h3>    
            </div>
        </div>
    </div>
@endif

                                </li>

                                

                                <li class="Uploaded">
<div class="icon_nrt">
<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_511_1657)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.00015 6.56241C5.08303 6.56241 5.16252 6.52948 5.22112 6.47088C5.27973 6.41227 5.31265 6.33279 5.31265 6.24991V1.67782L6.01265 2.49491C6.06658 2.5579 6.14332 2.59688 6.22599 2.60329C6.30866 2.6097 6.3905 2.583 6.45348 2.52907C6.51647 2.47515 6.55546 2.39841 6.56187 2.31573C6.56828 2.23306 6.54158 2.15123 6.48765 2.08824L5.23765 0.629907C5.20831 0.595601 5.17189 0.568058 5.13089 0.549172C5.08989 0.530287 5.04529 0.520508 5.00015 0.520508C4.95501 0.520508 4.91041 0.530287 4.86941 0.549172C4.82841 0.568058 4.79199 0.595601 4.76265 0.629907L3.51265 2.08824C3.48595 2.11943 3.46565 2.15557 3.45292 2.19461C3.44018 2.23364 3.43526 2.2748 3.43843 2.31573C3.44161 2.35667 3.45281 2.39658 3.47141 2.43318C3.49 2.46979 3.51563 2.50237 3.54682 2.52907C3.57801 2.55578 3.61415 2.57607 3.65318 2.58881C3.69222 2.60154 3.73338 2.60646 3.77431 2.60329C3.81525 2.60012 3.85516 2.58891 3.89176 2.57032C3.92837 2.55172 3.96095 2.5261 3.98765 2.49491L4.68765 1.67824V6.24991C4.68765 6.42241 4.82765 6.56241 5.00015 6.56241Z" fill="white"/>
<path d="M6.66536 3.75C6.37286 3.75 6.22661 3.75 6.1212 3.82042C6.07587 3.85074 6.03694 3.88968 6.00661 3.935C5.9362 4.04042 5.9362 4.18667 5.9362 4.47917V6.25C5.9362 6.49864 5.83742 6.7371 5.66161 6.91291C5.48579 7.08873 5.24734 7.1875 4.9987 7.1875C4.75006 7.1875 4.5116 7.08873 4.33578 6.91291C4.15997 6.7371 4.0612 6.49864 4.0612 6.25V4.47917C4.0612 4.18667 4.0612 4.04042 3.99078 3.935C3.96045 3.88968 3.92152 3.85074 3.8762 3.82042C3.77078 3.75 3.62453 3.75 3.33203 3.75C2.1537 3.75 1.56411 3.75 1.19828 4.11625C0.832031 4.48208 0.832031 5.07083 0.832031 6.24958V6.66625C0.832031 7.84542 0.832031 8.43417 1.19828 8.80042C1.56411 9.16667 2.1537 9.16667 3.33203 9.16667H6.66536C7.8437 9.16667 8.43328 9.16667 8.79911 8.80042C9.16536 8.43417 9.16536 7.845 9.16536 6.66667V6.25C9.16536 5.07125 9.16536 4.48208 8.79911 4.11625C8.43328 3.75 7.8437 3.75 6.66536 3.75Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_511_1657">
<rect width="10" height="10" fill="white"/>
</clipPath>
</defs>
</svg>
                        </div>
                        <div class="action_history">
                            <div class="ah_head">                                
                            <h3>Uploaded</h3>
                            <b>.</b>
                            <span>{{ \Carbon\Carbon::parse($file->created_at)->format('d M, Y | H:i') }}</span>
                            </div>
                            <div class="Reason">                                
                            <h3>Reason</h3>
                            <span>"{{ $file->reasons_for_change}}"</span>
                            </div>
                            <div class="profile_ah">
                                <div class="pro_imnn">
                                    <img src="../assets/images/alok.png" alt="img">
                        </div>
                        <div class="profile_title">
                    <h3>{{ $file->user_name}}</h3>    
                    </div>

                        </div>

                        </div>
                                </li>

                               

                               

                            </ul>
                        </div>
                        </div>
                        </div>
                        @endforeach
                         <!------ Trade license HISTORY SECRTION END------->

                                            <!------ Udyam registration HISTORY SECRTION START------->
                   @foreach($urdoc as $file)
 <div class="history_main history_main_012">
                  <div class="history_inner">
                    <div class="close_nt">
                    <button id="closeBtn012"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"></rect>
                                            <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"></rect>
                                          </svg></button>
                        </div>
                        <div class="history_head">
                        <h2>History</h2>
                        <h3>{{ $file->real_file_name}}</h3>
                        </div>
                        <div class="histy_body">
                            <ul>
                                <li class="Renamed">
<div class="icon_nrt">
<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.5 7.99995L5.5 9.99995H10.5V7.99995H7.5ZM6.03 3.59495L1.5 8.12495V9.99995H3.375L7.905 5.46995L6.03 3.59495ZM9.355 4.01995C9.55 3.82495 9.55 3.49995 9.355 3.31495L8.185 2.14495C8.09126 2.05194 7.96455 1.99976 7.8325 1.99976C7.70045 1.99976 7.57375 2.05194 7.48 2.14495L6.565 3.05995L8.44 4.93495L9.355 4.01995Z" fill="white"/>
</svg>
                        </div>
                        @if($file->activities)
    <div class="action_history">
        @php
            $formattedDate = \Carbon\Carbon::parse($file->update_dates)->format('d M, Y | H:i');
        @endphp

        @foreach(explode('.', $file->activities) as $activity)
            @if(trim($activity) == 'File updated' || trim($activity) == 'File name changed')
                <div class="ah_head">                                
                    <h3>{{ trim($activity) }}</h3>
                    <b>.</b>
                    <span>{{ $formattedDate }}</span>
                </div>
            @endif
        @endforeach

        <div class="profile_ah">
            <div class="pro_imnn">
                <img src="../assets/images/alok.png" alt="img">
            </div>
            <div class="profile_title">
                <h3>{{ $file->user_name }}</h3>    
            </div>
        </div>
    </div>
@endif

                                </li>

                                

                                <li class="Uploaded">
<div class="icon_nrt">
<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_511_1657)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.00015 6.56241C5.08303 6.56241 5.16252 6.52948 5.22112 6.47088C5.27973 6.41227 5.31265 6.33279 5.31265 6.24991V1.67782L6.01265 2.49491C6.06658 2.5579 6.14332 2.59688 6.22599 2.60329C6.30866 2.6097 6.3905 2.583 6.45348 2.52907C6.51647 2.47515 6.55546 2.39841 6.56187 2.31573C6.56828 2.23306 6.54158 2.15123 6.48765 2.08824L5.23765 0.629907C5.20831 0.595601 5.17189 0.568058 5.13089 0.549172C5.08989 0.530287 5.04529 0.520508 5.00015 0.520508C4.95501 0.520508 4.91041 0.530287 4.86941 0.549172C4.82841 0.568058 4.79199 0.595601 4.76265 0.629907L3.51265 2.08824C3.48595 2.11943 3.46565 2.15557 3.45292 2.19461C3.44018 2.23364 3.43526 2.2748 3.43843 2.31573C3.44161 2.35667 3.45281 2.39658 3.47141 2.43318C3.49 2.46979 3.51563 2.50237 3.54682 2.52907C3.57801 2.55578 3.61415 2.57607 3.65318 2.58881C3.69222 2.60154 3.73338 2.60646 3.77431 2.60329C3.81525 2.60012 3.85516 2.58891 3.89176 2.57032C3.92837 2.55172 3.96095 2.5261 3.98765 2.49491L4.68765 1.67824V6.24991C4.68765 6.42241 4.82765 6.56241 5.00015 6.56241Z" fill="white"/>
<path d="M6.66536 3.75C6.37286 3.75 6.22661 3.75 6.1212 3.82042C6.07587 3.85074 6.03694 3.88968 6.00661 3.935C5.9362 4.04042 5.9362 4.18667 5.9362 4.47917V6.25C5.9362 6.49864 5.83742 6.7371 5.66161 6.91291C5.48579 7.08873 5.24734 7.1875 4.9987 7.1875C4.75006 7.1875 4.5116 7.08873 4.33578 6.91291C4.15997 6.7371 4.0612 6.49864 4.0612 6.25V4.47917C4.0612 4.18667 4.0612 4.04042 3.99078 3.935C3.96045 3.88968 3.92152 3.85074 3.8762 3.82042C3.77078 3.75 3.62453 3.75 3.33203 3.75C2.1537 3.75 1.56411 3.75 1.19828 4.11625C0.832031 4.48208 0.832031 5.07083 0.832031 6.24958V6.66625C0.832031 7.84542 0.832031 8.43417 1.19828 8.80042C1.56411 9.16667 2.1537 9.16667 3.33203 9.16667H6.66536C7.8437 9.16667 8.43328 9.16667 8.79911 8.80042C9.16536 8.43417 9.16536 7.845 9.16536 6.66667V6.25C9.16536 5.07125 9.16536 4.48208 8.79911 4.11625C8.43328 3.75 7.8437 3.75 6.66536 3.75Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_511_1657">
<rect width="10" height="10" fill="white"/>
</clipPath>
</defs>
</svg>
                        </div>
                        <div class="action_history">
                            <div class="ah_head">                                
                            <h3>Uploaded</h3>
                            <b>.</b>
                            <span>{{ \Carbon\Carbon::parse($file->created_at)->format('d M, Y | H:i') }}</span>
                            </div>
                            <div class="Reason">                                
                            <h3>Reason</h3>
                            <span>"{{ $file->reasons_for_change}}"</span>
                            </div>
                            <div class="profile_ah">
                                <div class="pro_imnn">
                                    <img src="../assets/images/alok.png" alt="img">
                        </div>
                        <div class="profile_title">
                    <h3>{{ $file->user_name}}</h3>    
                    </div>

                        </div>

                        </div>
                                </li>

                               

                               

                            </ul>
                        </div>
                        </div>
                        </div>
                        @endforeach
                         <!------ Udyam registration HISTORY SECRTION END------->

                         <!------ Custom HISTORY SECRTION START------->
                        @foreach($customdoc as $file)
 <div class="history_main history_main_7" id="target{{$file->id}}" style="display:none;">
                  <div class="history_inner">
                    <div class="close_nt">
                    <button id="closeBtn{{$file->id}}" class="dispnonebtn"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"></rect>
                                            <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"></rect>
                                          </svg></button>
                        </div>
                        <div class="history_head">
                        <h2>History</h2>
                        <h3>{{ $file->real_file_name}}</h3>
                        </div>
                        <div class="histy_body">
                            <ul>
                                <li class="Renamed">
<div class="icon_nrt">
<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.5 7.99995L5.5 9.99995H10.5V7.99995H7.5ZM6.03 3.59495L1.5 8.12495V9.99995H3.375L7.905 5.46995L6.03 3.59495ZM9.355 4.01995C9.55 3.82495 9.55 3.49995 9.355 3.31495L8.185 2.14495C8.09126 2.05194 7.96455 1.99976 7.8325 1.99976C7.70045 1.99976 7.57375 2.05194 7.48 2.14495L6.565 3.05995L8.44 4.93495L9.355 4.01995Z" fill="white"/>
</svg>
                        </div>
                        @if($file->activities)
    <div class="action_history">
        @php
            $formattedDate = \Carbon\Carbon::parse($file->update_dates)->format('d M, Y | H:i');
        @endphp

        @foreach(explode('.', $file->activities) as $activity)
            @if(trim($activity) == 'File updated' || trim($activity) == 'File name changed')
                <div class="ah_head">                                
                    <h3>{{ trim($activity) }}</h3>
                    <b>.</b>
                    <span>{{ $formattedDate }}</span>
                </div>
            @endif
        @endforeach

        <div class="profile_ah">
            <div class="pro_imnn">
                <img src="../assets/images/alok.png" alt="img">
            </div>
            <div class="profile_title">
                <h3>{{ $file->user_name }}</h3>    
            </div>
        </div>
    </div>
@endif

                                </li>

                                

                                <li class="Uploaded">
<div class="icon_nrt">
<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_511_1657)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.00015 6.56241C5.08303 6.56241 5.16252 6.52948 5.22112 6.47088C5.27973 6.41227 5.31265 6.33279 5.31265 6.24991V1.67782L6.01265 2.49491C6.06658 2.5579 6.14332 2.59688 6.22599 2.60329C6.30866 2.6097 6.3905 2.583 6.45348 2.52907C6.51647 2.47515 6.55546 2.39841 6.56187 2.31573C6.56828 2.23306 6.54158 2.15123 6.48765 2.08824L5.23765 0.629907C5.20831 0.595601 5.17189 0.568058 5.13089 0.549172C5.08989 0.530287 5.04529 0.520508 5.00015 0.520508C4.95501 0.520508 4.91041 0.530287 4.86941 0.549172C4.82841 0.568058 4.79199 0.595601 4.76265 0.629907L3.51265 2.08824C3.48595 2.11943 3.46565 2.15557 3.45292 2.19461C3.44018 2.23364 3.43526 2.2748 3.43843 2.31573C3.44161 2.35667 3.45281 2.39658 3.47141 2.43318C3.49 2.46979 3.51563 2.50237 3.54682 2.52907C3.57801 2.55578 3.61415 2.57607 3.65318 2.58881C3.69222 2.60154 3.73338 2.60646 3.77431 2.60329C3.81525 2.60012 3.85516 2.58891 3.89176 2.57032C3.92837 2.55172 3.96095 2.5261 3.98765 2.49491L4.68765 1.67824V6.24991C4.68765 6.42241 4.82765 6.56241 5.00015 6.56241Z" fill="white"/>
<path d="M6.66536 3.75C6.37286 3.75 6.22661 3.75 6.1212 3.82042C6.07587 3.85074 6.03694 3.88968 6.00661 3.935C5.9362 4.04042 5.9362 4.18667 5.9362 4.47917V6.25C5.9362 6.49864 5.83742 6.7371 5.66161 6.91291C5.48579 7.08873 5.24734 7.1875 4.9987 7.1875C4.75006 7.1875 4.5116 7.08873 4.33578 6.91291C4.15997 6.7371 4.0612 6.49864 4.0612 6.25V4.47917C4.0612 4.18667 4.0612 4.04042 3.99078 3.935C3.96045 3.88968 3.92152 3.85074 3.8762 3.82042C3.77078 3.75 3.62453 3.75 3.33203 3.75C2.1537 3.75 1.56411 3.75 1.19828 4.11625C0.832031 4.48208 0.832031 5.07083 0.832031 6.24958V6.66625C0.832031 7.84542 0.832031 8.43417 1.19828 8.80042C1.56411 9.16667 2.1537 9.16667 3.33203 9.16667H6.66536C7.8437 9.16667 8.43328 9.16667 8.79911 8.80042C9.16536 8.43417 9.16536 7.845 9.16536 6.66667V6.25C9.16536 5.07125 9.16536 4.48208 8.79911 4.11625C8.43328 3.75 7.8437 3.75 6.66536 3.75Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_511_1657">
<rect width="10" height="10" fill="white"/>
</clipPath>
</defs>
</svg>
                        </div>
                        <div class="action_history">
                            <div class="ah_head">                                
                            <h3>Uploaded</h3>
                            <b>.</b>
                            <span>{{ \Carbon\Carbon::parse($file->created_at)->format('d M, Y | H:i') }}</span>
                            </div>
                            <div class="Reason">                                
                            <h3>Reason</h3>
                            <span>"{{ $file->reasons_for_change}}"</span>
                            </div>
                            
                            <div class="profile_ah">
                                <div class="pro_imnn">
                                    <img src="../assets/images/alok.png" alt="img">
                        </div>
                        <div class="profile_title">
                    <h3>{{ $file->user_name}}</h3>    
                    </div>

                        </div>




                        </div>
                                </li>

                               

                               

                            </ul>
                        </div>
                        </div>
                        </div>
                        @endforeach
                  <!------ Custom HISTORY SECRTION END------->

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
    button.delete-button {
    background: transparent;
    border: none;
    display: inline-flex;
}
    .upload-btn {
      background-color: #4CAF50;
      color: white;
      padding: 6px 10px;
      border: none;
      cursor: pointer;
    }

    .file-name {
      cursor: pointer;
    }

    .filess {
      background: #5790FF;
      border: 2px solid #5790FF;
      border-radius: 7px;
      font-weight: 600;
      color: white;
      padding: 8px;
    }

    /* Dropdown button */
    .dropbtn {
      background-color: #3498db;
      color: white;
      padding: 10px;
      font-size: 16px;
      border: none;
    }

    /* Dropdown content (hidden by default) */
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

    .dropdown-content .down_del {
      border-bottom: 1px solid #CCD4E5;
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

    .dropdown-content .down_del .dnlod_nt {
      background: #5790FF;
      border-radius: 10px;
      color: #FFF !important;
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


    .filtr_tabble table tr td button.btn {
    background: #E6EBF6 !important;
    color: #7E7E7E;
    border: 0;
    display: flex;
    align-items: center;
    padding: 7px 15px;
}
.file-area {
    width: 100%;
    min-height: 200px;
    border: 2px dashed #D2DBE5;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 15px;
    padding: 20px;
    position: relative;
}
.file-area input[type=file] {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    opacity: 0;
    cursor: pointer;
    z-index: 1;
}
.filtr_tabble .modal-body button.btn {
    padding: 10px 30px;
    margin: 15px 0px 0px;
}

.file-dummy {
    width: 100%;
    padding: 30px;
    background: rgba(255,255,255,0.2);
    border: 2px dashed rgba(255,255,255,0.2);
    text-align: center;
    transition: background 0.3s ease-in-out;
}
.success {
    display: none;
}
.file-dummy .default {
    font-weight: 600;
    color: #9f9f9f;
    font-size: 16px;
}
.file-dummy .upload_icon {
    display: flex;
    justify-content: center;
    margin: 0px 0px 3px;
}
.file-area .upload_icon svg {
    position: relative;
    margin: 0;
    width: 40px;
    height: 40px;
    top: unset;
    fill: #9f9f9f;
}
.file-dummy .default .fille {
    border-bottom: 1px solid #9f9f9f;
}

.filtr_tabble .modal-body h3 {
    font-size: 14px;
    margin: 0px 0px 14px 0px;
}

.filtr_tabble .modal-header button.close {
    background: transparent;
    width: 35px;
    height: 35px;
}

.filtr_tabble .modal-header button.close span svg {
    width: 100%;
    height: 100%;
}
.filtr_tabble .entery_body::-webkit-scrollbar {
  width: 1px;
}

.filtr_tabble .entery_body::-webkit-scrollbar-track {
  background: #f1f1f1;
}

.filtr_tabble .entery_body::-webkit-scrollbar-thumb {
  background: #888;
}
.dark-only .filtr_tabble .modal-header button.close {
    background: transparent;
    box-shadow: none;
    outline: none;
    border: 0;
}

.dark-only .filtr_tabble .modal-header button.close svg {
    filter: invert(1);
}

.dark-only .dropdown-content {
    background-color: #282d3b;
    border-color: #A3AED0;
}

.dark-only .dropdown-content a.dropdown-itemm {
    color: #A3AED0;
}
.ediit_nnt input[type=file] {
    position: relative;
    opacity: 1;
    visibility: visible;
    left: unset;
    bottom: unset;
    top: unset;
    right: unset;
}
  </style>
 <script>
    function toggleDropdown() {
      var dropdown = document.getElementById("myDropdown");
      if (dropdown.style.display === "block") {
        dropdown.style.display = "none";
      } else {
        dropdown.style.display = "block";
      }
    }

    $(document).ready(function(){
    $('.dropdown-itemm.history_click_1').click(function(){
    $('.history_main_1').addClass('highlight');
  });

  $('#closeBtn').click(function(){
    $('.history_main_1').removeClass('highlight');
  });

});

  </script>
  <script>
     $(document).ready(function(){
    $('.dropdown-itemm.mainh1').click(function(){
    $('.h1main').addClass('highlight');
  });

  $('#closeBtns').click(function(){
    $('.h1main').removeClass('highlight');
  });

});
  </script>
  <script>
       $(document).ready(function(){
    $('.dropdown-itemm.history_click_2').click(function(){
    $('.history_main_2').addClass('highlight');
  });

  $('#closeBtn2').click(function(){
    $('.history_main_2').removeClass('highlight');
  });

});
  </script>
   <script>
       $(document).ready(function(){
    $('.dropdown-itemm.history_click_3').click(function(){
    $('.history_main_3').addClass('highlight');
  });

  $('#closeBtn3').click(function(){
    $('.history_main_3').removeClass('highlight');
  });

});
  </script>
   <script>
       $(document).ready(function(){
    $('.dropdown-itemm.history_click_4').click(function(){
    $('.history_main_4').addClass('highlight');
  });

  $('#closeBtn4').click(function(){
    $('.history_main_4').removeClass('highlight');
  });

});
  </script>
   <script>
       $(document).ready(function(){
    $('.dropdown-itemm.history_click_5').click(function(){
    $('.history_main_5').addClass('highlight');
  });

  $('#closeBtn5').click(function(){
    $('.history_main_5').removeClass('highlight');
  });

});
  </script>

<script>
       $(document).ready(function(){
    $('.dropdown-itemm.history_click_6').click(function(){
    $('.history_main_6').addClass('highlight');
  });

  $('#closeBtn6').click(function(){
    $('.history_main_6').removeClass('highlight');
  });

});
  </script>

<script>
       $(document).ready(function(){
    $('.dropdown-itemm.history_click_08').click(function(){
    $('.history_main_08').addClass('highlight');
  });

  $('#closeBtn08').click(function(){
    $('.history_main_08').removeClass('highlight');
  });

});
  </script>

<script>
       $(document).ready(function(){
    $('.dropdown-itemm.history_click_09').click(function(){
    $('.history_main_09').addClass('highlight');
  });

  $('#closeBtn09').click(function(){
    $('.history_main_09').removeClass('highlight');
  });

});
  </script>

<script>
       $(document).ready(function(){
    $('.dropdown-itemm.history_click_010').click(function(){
    $('.history_main_010').addClass('highlight');
  });

  $('#closeBtn010').click(function(){
    $('.history_main_010').removeClass('highlight');
  });

});
  </script>

<script>
       $(document).ready(function(){
    $('.dropdown-itemm.history_click_011').click(function(){
    $('.history_main_011').addClass('highlight');
  });

  $('#closeBtn011').click(function(){
    $('.history_main_011').removeClass('highlight');
  });

});
  </script>

<script>
       $(document).ready(function(){
    $('.dropdown-itemm.history_click_012').click(function(){
    $('.history_main_012').addClass('highlight');
  });

  $('#closeBtn012').click(function(){
    $('.history_main_012').removeClass('highlight');
  });

});
  </script>

<!-- <script>
       $(document).ready(function(){
    $('.dropdown-itemm.history_click_7').click(function(){
    $('.history_main_7').addClass('highlight');
  });

  $('#closeBtn7').click(function(){
    $('.history_main_7').removeClass('highlight');
  });

});
  </script> -->
  <script>
   document.addEventListener('DOMContentLoaded', function() {
    // Get all elements with class 'history_click_7'
    var historyItems = document.querySelectorAll('.history_click_7');

    // Loop through each element
    historyItems.forEach(function(item) {
        // Add click event listener to each element
        item.addEventListener('click', function() {
            // Get the ID of the target element
            var targetId = 'target' + this.id.substring(3); // Extract numeric part from id
            
            // Show the target element
            var targetElement = document.getElementById(targetId);
            targetElement.style.display = 'block';
        });

        // Add click event listener to close buttons
        var closeBtnId = 'closeBtn' + item.id.substring(3); // Extract numeric part from id
        var closeBtn = document.getElementById(closeBtnId);
        closeBtn.addEventListener('click', function() {
            // Get the ID of the target element
            var targetId = 'target' + this.id.substring(8); // Extract numeric part from id
            
            // Hide the target element
            var targetElement = document.getElementById(targetId);
            targetElement.style.display = 'none';
        });
    });
});


  </script>

<script>
    $(document).ready(function() {
        $('.dispnonebtn').click(function() {
            var targetId = $(this).attr('id').replace('closeBtn', 'target');
            $('#' + targetId).hide();
        });
    });
</script>
  @endsection