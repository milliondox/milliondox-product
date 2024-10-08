@extends('user.includes.Director-info') @section('content')
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
           Director's info 
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
           Director's info 
          </h2>
            </div>
             <!-- Container-fluid start-->
             <div class="container-fluid mian_director" style="margin-bottom:20px";>
          <div class="row">
        
    <div class="col-sm-7">
    
        <div class="director-info">
            <h2 class="dir_tile">Director’s Info</h2>
            @forelse($dr as $rd)
            <div class="tabs">
                <button class="tablinks" id="tab-btn-{{$rd->id}}" onclick="openTab(event, 'tab-{{$rd->id}}')" >
                    <div class="btn_img">
                        <div class="img_sall">
                        <img src="{{ asset('/' . $rd->drfile) }}" alt="img">
                        </div>
                        <span>{{$rd->dname}}</span>
                    </div>
                    @if($rd->status == "active")
                    <div class="stauts_nt active" >
                        <span>DSC {{$rd->status}}</span>
                    </div>
                    @elseif($rd->status == "e-soon")
                     <div class="stauts_nt e-soon" >
                        <span>DSC {{$rd->status}}</span>
                    </div>
                    @elseif($rd->status == "expire")
                   
                     <div class="stauts_nt expire" >
                        <span>DSC {{$rd->status}}</span>
                    </div>
                    @endif
                    
                    <div class="accress-info">
                        <a href="#">Access info 
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.91797 0.833252L7.08464 4.99992L2.91797 9.16659" stroke="#707EAE"/>
                            </svg>
                        </a>
                    </div>
                </button>
            </div>
            @empty
    <div>No director found.</div>
@endforelse
        </div>
    </div>


<div class="col-sm-5">
<div class="kyc-infoo">

<div class="tabs_col_head">
    <a data-bs-toggle="modal" data-bs-target="#add_director">
    <svg width="25" height="14" viewBox="0 0 25 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.41602 7.58329H2.91602V6.41663H6.41602V2.91663H7.58268V6.41663H11.0827V7.58329H7.58268V11.0833H6.41602V7.58329Z" fill="#7E7E7E"/>
<path d="M18.0007 1.16663C17.3818 1.16663 16.7883 1.41246 16.3507 1.85004C15.9132 2.28763 15.6673 2.88112 15.6673 3.49996C15.6673 4.1188 15.9132 4.71229 16.3507 5.14988C16.7883 5.58746 17.3818 5.83329 18.0007 5.83329C18.6195 5.83329 19.213 5.58746 19.6506 5.14988C20.0882 4.71229 20.334 4.1188 20.334 3.49996C20.334 2.88112 20.0882 2.28763 19.6506 1.85004C19.213 1.41246 18.6195 1.16663 18.0007 1.16663ZM20.9173 6.99996H15.084C14.6199 6.99996 14.1747 7.18433 13.8465 7.51252C13.5184 7.84071 13.334 8.28583 13.334 8.74996C13.334 10.052 13.8695 11.095 14.748 11.8008C15.6125 12.495 16.7722 12.8333 18.0007 12.8333C19.2292 12.8333 20.3888 12.495 21.2533 11.8008C22.1307 11.095 22.6673 10.052 22.6673 8.74996C22.6673 8.28583 22.4829 7.84071 22.1548 7.51252C21.8266 7.18433 21.3814 6.99996 20.9173 6.99996Z" fill="#7E7E7E"/>
</svg>Add a director 
    </a>

    <!-- model start -->
<div class="modal fade drop_coman_file have_title director_cosutom_des" id="add_director" tabindex="-1" role="dialog" aria-labelledby="add_director" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" style="font-weight:700">Add a director</h5>
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
                                    <h3>Add a director</h3>


                                    <form action="{{ route('storedirector') }}" method="POST" enctype="multipart/form-data" class="upload-form"> 
                                      @csrf
                                                                          
                          <div class="gropu_form">
                          <label for="fname">Director’s Name <span class="red_star">*</span></label>
                           <input placeholder="Type" type="text" id="dname" name="dname" required>
                          </div>                                                  

                          <div class="gropu_form ivoice-upload">
                          <label for="fname">Upload Photo <span class="red_star">*</span></label>

                          <div class="file-area">      
                                    <input type="file" class="dragfile" id="drfilepic" name="file"  required>    
                        
                          
  <div class="file-dummy">
    <div class="success">Great, your files are selected. Keep on.</div>
    <div class="default">
    <span class="upload_icon">
      
                          <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88"><title>file-upload</title><path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z"/></svg>
                          </span>  
                          Upload Photo
  </div>
  </div>
  <br>
            <div class="selected-file"></div>
</div> 
                          </div>

                          <div class="gropu_form">
                          <label for="start">Select Status <span class="red_star">*</span></label>
                          <div class="right_d_status-wrap">
                          <div class="right_d_status">
                            <div class="status_radio">

                            <div class="group_radio">
<div class="for_group radio">
    <input type="radio" id="expire1" name="status" value="expire" >
    <label for="expire1">Expired<span>Expiry Date</span></label>   
</div>
</div>
</div>
<div class="status_calander">
                          <input type="text" id="expireStatus" name="expiredate"   >
                          </div>
</div>

<div class="right_d_status">
                            <div class="status_radio">

                            <div class="group_radio">
<div class="for_group radio">
    <input type="radio" id="active1" name="status" value="active">
    <label for="active1">Active<span>Renewal Date</span></label>   
</div>
</div>
</div>
<div class="status_calander">
                          <input type="text" id="activeStatus" name="activedate" >
                          </div>
</div>

</div>

                          </div>

                          <div class="gropu_form">
                          <label for="fname">DSC’s Location <span class="red_star">*</span></label>
                          <select id="location" name="location" class="form-control" required>
                              <option value="" selected>Select DSC Location Type</option>
    <option value="PC Office">PC Office</option>
    <option value="Client Office">Client Office</option>
    <option value="Third Party Consultant Office">Third Party Consultant Office</option>
    
</select><br>
                          </div>

                          <div class="root_btn">                        
                          <button class="btn hvr-rotate"  style="border-radius:5px;" type="submit">Confirm</button>
</div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
<!-- model end -->

</div>


<div class="kyc-info fff">
<div class="column-tabs">
 @forelse($dr as $rd)
<div id="tab-{{$rd->id}}" class="tabcontent">

<div class="tabs">
  <button class="tab-link active">KYC Documents</button>
</div>

  <!-- Content for KYC Documents tab -->
  <ul class="kyc_list">
  @if($rd->aadharcard_filepath == Null) 
  <li >
    @else
    <li class="active">
      @endif
        <span>
        @if($rd->aadharcard_filepath == Null) 
        <div class="unfinish">
                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F"></path>
                            <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F"></circle>
                        </svg>
                    </div>
                    @else
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
                  
                 @endif  
                    
        Aadhaar Card</span>

        <div class="drop_coan_comand">
          @if($rd->aadharcard_filepath == Null)
        <button class="btn_command" style="border-radius:5px;" data-bs-toggle="modal" data-bs-target="#adarcard1{{$rd->id}}">
                              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.25 12V5.8875L6.3 7.8375L5.25 6.75L9 3L12.75 6.75L11.7 7.8375L9.75 5.8875V12H8.25ZM4.5 15C4.0875 15 3.7345 14.8533 3.441 14.5597C3.1475 14.2662 3.0005 13.913 3 13.5V11.25H4.5V13.5H13.5V11.25H15V13.5C15 13.9125 14.8533 14.2657 14.5597 14.5597C14.2662 14.8538 13.913 15.0005 13.5 15H4.5Z" fill="#7E7E7E" />
                              </svg> Upload </button>

                            <div class="modal fade drop_coman_file" id="adarcard1{{$rd->id}}" tabindex="-1" role="dialog" aria-labelledby="adarcard1" aria-hidden="true">
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
                                    <h3></h3>


                                    <form action="{{ route('dirupdate') }}" method="POST" enctype="multipart/form-data" class="upload-form"> 
                                      @csrf
                                                                          
                                    <div class="file-area">      
                                    <input type="file" class="dragfile" id="aadharcard_filepath" name="aadharcard_filepath" accept=".pdf,.doc,.docx" required>
                                    <input type="hidden" id="hidden_id" name="hidden_id" value="{{$rd->id}}">    
                          
  <div class="file-dummy">
    <div class="success">Great, your files are selected. Keep on.</div>
    <div class="default">
    <span class="upload_icon">
                          <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88"><title>file-upload</title><path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z"/></svg>
                          </span>  
                          Drag and Drop files here or <span class="fille">Choose File</span>
  </div>
  </div>
  <br>
            <div class="selected-file"></div>
</div> 
                          <span class="basic-file">Note:- file|mimes:pdf,doc,docx|max size:2048kb</span>                             
                          <button class="btn btn-primary btn-sm hvr-rotate"  style="border-radius:5px;" type="submit">Upload</button>

                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
          <!--  -->
          @else
        <div class="dropdown_coman_nt">
                                <button onclick="toggleDropdown()" class="dropbtn show_pp">
                                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                                    <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                                    <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                                  </svg>
                                </button>
                                <div id="myDropdown" class="dropdown-content"> <div class="down_del">
                                    <a class=" dropdown-itemm dnlod_nt" href="{{ route('download-aadhar-file', ['id' => $rd->id]) }}">
                                      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.40625 12.25C2.00014 12.25 1.61066 12.0887 1.32349 11.8015C1.03633 11.5143 0.875 11.1249 0.875 10.7188V8.53125C0.875 8.3572 0.94414 8.19028 1.06721 8.06721C1.19028 7.94414 1.3572 7.875 1.53125 7.875C1.7053 7.875 1.87222 7.94414 1.99529 8.06721C2.11836 8.19028 2.1875 8.3572 2.1875 8.53125V10.7188C2.1875 10.8395 2.2855 10.9375 2.40625 10.9375H11.5938C11.6518 10.9375 11.7074 10.9145 11.7484 10.8734C11.7895 10.8324 11.8125 10.7768 11.8125 10.7188V8.53125C11.8125 8.3572 11.8816 8.19028 12.0047 8.06721C12.1278 7.94414 12.2947 7.875 12.4688 7.875C12.6428 7.875 12.8097 7.94414 12.9328 8.06721C13.0559 8.19028 13.125 8.3572 13.125 8.53125V10.7188C13.125 11.1249 12.9637 11.5143 12.6765 11.8015C12.3893 12.0887 11.9999 12.25 11.5938 12.25H2.40625Z" fill="white"></path>
                                        <path d="M6.34334 6.72788V1.75C6.34334 1.57595 6.41248 1.40903 6.53555 1.28596C6.65862 1.16289 6.82554 1.09375 6.99959 1.09375C7.17364 1.09375 7.34056 1.16289 7.46363 1.28596C7.5867 1.40903 7.65584 1.57595 7.65584 1.75V6.72788L9.37959 5.005C9.44049 4.9441 9.51279 4.89579 9.59236 4.86283C9.67193 4.82987 9.75722 4.81291 9.84334 4.81291C9.92947 4.81291 10.0148 4.82987 10.0943 4.86283C10.1739 4.89579 10.2462 4.9441 10.3071 5.005C10.368 5.0659 10.4163 5.1382 10.4493 5.21777C10.4822 5.29734 10.4992 5.38262 10.4992 5.46875C10.4992 5.55488 10.4822 5.64016 10.4493 5.71973C10.4163 5.7993 10.368 5.8716 10.3071 5.9325L7.46334 8.77625C7.40247 8.83721 7.33018 8.88556 7.25061 8.91856C7.17103 8.95155 7.08574 8.96853 6.99959 8.96853C6.91345 8.96853 6.82815 8.95155 6.74857 8.91856C6.669 8.88556 6.59671 8.83721 6.53584 8.77625L3.69209 5.9325C3.63119 5.8716 3.58288 5.7993 3.54992 5.71973C3.51696 5.64016 3.5 5.55488 3.5 5.46875C3.5 5.38262 3.51696 5.29734 3.54992 5.21777C3.58288 5.1382 3.63119 5.0659 3.69209 5.005C3.75299 4.9441 3.82529 4.89579 3.90486 4.86283C3.98443 4.82987 4.06972 4.81291 4.15584 4.81291C4.24197 4.81291 4.32725 4.82987 4.40682 4.86283C4.48639 4.89579 4.55869 4.9441 4.61959 5.005L6.34334 6.72788Z" fill="white"></path>
                                      </svg> Download </a>
                                      <a class="dropdown-itemm delet_nt"  id="delete-{{ $rd ->id }}">
                                    <form method="POST" action="{{ route('aadhar.delete', ['id' => $rd->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?')">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A" />
                                    </svg> Delete
                                                            </button>
                                                        </form>  </a>
                                  </div>
                                  <!-- <a class="dropdown-itemm rename_nt" href="#" onclick="">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M8.75 9.33323L6.41667 11.6666H12.25V9.33323H8.75ZM7.035 4.19406L1.75 9.47906V11.6666H3.9375L9.2225 6.38156L7.035 4.19406ZM10.9142 4.6899C11.1417 4.4624 11.1417 4.08323 10.9142 3.8674L9.54917 2.5024C9.4398 2.39389 9.29198 2.33301 9.13792 2.33301C8.98385 2.33301 8.83604 2.39389 8.72667 2.5024L7.65917 3.5699L9.84667 5.7574L10.9142 4.6899Z" fill="#8D8D8D"></path>
                                    </svg> Edit </a>                                   -->
                                </div>
                              </div>
                              <!--  -->
</div>
@endif
    </li>
    @if($rd->pancard_filepath == Null) 
  <li >
    @else
    <li class="active">
      @endif
        <span>
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
        PAN Card</span>

        <div class="drop_coan_comand">
        @if($rd->pancard_filepath == Null)
        <button class="btn_command" style="border-radius:5px;" data-bs-toggle="modal" data-bs-target="#pancard{{$rd->id}}">
                              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.25 12V5.8875L6.3 7.8375L5.25 6.75L9 3L12.75 6.75L11.7 7.8375L9.75 5.8875V12H8.25ZM4.5 15C4.0875 15 3.7345 14.8533 3.441 14.5597C3.1475 14.2662 3.0005 13.913 3 13.5V11.25H4.5V13.5H13.5V11.25H15V13.5C15 13.9125 14.8533 14.2657 14.5597 14.5597C14.2662 14.8538 13.913 15.0005 13.5 15H4.5Z" fill="#7E7E7E" />
                              </svg> Upload </button>
                            <div class="modal fade drop_coman_file" id="pancard{{$rd->id}}" tabindex="-1" role="dialog" aria-labelledby="pancard" aria-hidden="true">
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
                                  


                                    <form action="{{ route('dirupdate2') }}" method="POST" enctype="multipart/form-data" class="upload-form"> 
                                      @csrf
                                                                          
                                    <div class="file-area">      
                                    <input type="file" class="dragfile" id="pancard_filepath" name="pancard_filepath" accept=".pdf,.doc,.docx" required>
                                    <input type="hidden" id="hidden_id" name="hidden_id" value="{{$rd->id}}"> 
  <div class="file-dummy">
    <div class="success">Great, your files are selected. Keep on.</div>
    <div class="default">
    <span class="upload_icon">
                          <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88"><title>file-upload</title><path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z"/></svg>
                          </span>  
                          Drag and Drop files here or <span class="fille">Choose File</span>
  </div>
  </div>
  <br>
            <div class="selected-file"></div>
</div> 
                          <span class="basic-file">Note:- file|mimes:pdf,doc,docx|max size:2048kb</span>                             
                          <button class="btn btn-primary btn-sm hvr-rotate"  style="border-radius:5px;" type="submit">Upload</button>

                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>

          <!--  -->
          @else
        <div class="dropdown_coman_nt">
          
                                <button onclick="toggleDropdown()" class="dropbtn show_pp">
                                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                                    <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                                    <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                                  </svg>
                                </button>
                                <div id="myDropdown" class="dropdown-content"> <div class="down_del">
                                    <a class=" dropdown-itemm dnlod_nt" href="{{ route('download-pan-file', ['id' => $rd->id]) }}">
                                      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.40625 12.25C2.00014 12.25 1.61066 12.0887 1.32349 11.8015C1.03633 11.5143 0.875 11.1249 0.875 10.7188V8.53125C0.875 8.3572 0.94414 8.19028 1.06721 8.06721C1.19028 7.94414 1.3572 7.875 1.53125 7.875C1.7053 7.875 1.87222 7.94414 1.99529 8.06721C2.11836 8.19028 2.1875 8.3572 2.1875 8.53125V10.7188C2.1875 10.8395 2.2855 10.9375 2.40625 10.9375H11.5938C11.6518 10.9375 11.7074 10.9145 11.7484 10.8734C11.7895 10.8324 11.8125 10.7768 11.8125 10.7188V8.53125C11.8125 8.3572 11.8816 8.19028 12.0047 8.06721C12.1278 7.94414 12.2947 7.875 12.4688 7.875C12.6428 7.875 12.8097 7.94414 12.9328 8.06721C13.0559 8.19028 13.125 8.3572 13.125 8.53125V10.7188C13.125 11.1249 12.9637 11.5143 12.6765 11.8015C12.3893 12.0887 11.9999 12.25 11.5938 12.25H2.40625Z" fill="white"></path>
                                        <path d="M6.34334 6.72788V1.75C6.34334 1.57595 6.41248 1.40903 6.53555 1.28596C6.65862 1.16289 6.82554 1.09375 6.99959 1.09375C7.17364 1.09375 7.34056 1.16289 7.46363 1.28596C7.5867 1.40903 7.65584 1.57595 7.65584 1.75V6.72788L9.37959 5.005C9.44049 4.9441 9.51279 4.89579 9.59236 4.86283C9.67193 4.82987 9.75722 4.81291 9.84334 4.81291C9.92947 4.81291 10.0148 4.82987 10.0943 4.86283C10.1739 4.89579 10.2462 4.9441 10.3071 5.005C10.368 5.0659 10.4163 5.1382 10.4493 5.21777C10.4822 5.29734 10.4992 5.38262 10.4992 5.46875C10.4992 5.55488 10.4822 5.64016 10.4493 5.71973C10.4163 5.7993 10.368 5.8716 10.3071 5.9325L7.46334 8.77625C7.40247 8.83721 7.33018 8.88556 7.25061 8.91856C7.17103 8.95155 7.08574 8.96853 6.99959 8.96853C6.91345 8.96853 6.82815 8.95155 6.74857 8.91856C6.669 8.88556 6.59671 8.83721 6.53584 8.77625L3.69209 5.9325C3.63119 5.8716 3.58288 5.7993 3.54992 5.71973C3.51696 5.64016 3.5 5.55488 3.5 5.46875C3.5 5.38262 3.51696 5.29734 3.54992 5.21777C3.58288 5.1382 3.63119 5.0659 3.69209 5.005C3.75299 4.9441 3.82529 4.89579 3.90486 4.86283C3.98443 4.82987 4.06972 4.81291 4.15584 4.81291C4.24197 4.81291 4.32725 4.82987 4.40682 4.86283C4.48639 4.89579 4.55869 4.9441 4.61959 5.005L6.34334 6.72788Z" fill="white"></path>
                                      </svg> Download </a>
                                      <a class="dropdown-itemm delet_nt"  id="delete-{{ $rd ->id }}">
                                    <form method="POST" action="{{ route('pan.delete', ['id' => $rd->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?')">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A" />
                                    </svg> Delete
                                                            </button>
                                                        </form>  </a>
                                  </div>
                                  <!-- <a class="dropdown-itemm rename_nt" href="#" onclick="">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M8.75 9.33323L6.41667 11.6666H12.25V9.33323H8.75ZM7.035 4.19406L1.75 9.47906V11.6666H3.9375L9.2225 6.38156L7.035 4.19406ZM10.9142 4.6899C11.1417 4.4624 11.1417 4.08323 10.9142 3.8674L9.54917 2.5024C9.4398 2.39389 9.29198 2.33301 9.13792 2.33301C8.98385 2.33301 8.83604 2.39389 8.72667 2.5024L7.65917 3.5699L9.84667 5.7574L10.9142 4.6899Z" fill="#8D8D8D"></path>
                                    </svg> Edit </a>                                   -->
                                </div>
                              </div>
                              <!--  -->
                              
</div>
@endif
    </li>

    @if($rd->voterid_filepath == Null) 
  <li >
    @else
    <li class="active">
      @endif
        <span>
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
        Voter ID</span>

        <div class="drop_coan_comand">
        @if($rd->voterid_filepath == Null)
        <button class="btn_command" style="border-radius:5px;" data-bs-toggle="modal" data-bs-target="#votercard{{$rd->id}}">
                              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.25 12V5.8875L6.3 7.8375L5.25 6.75L9 3L12.75 6.75L11.7 7.8375L9.75 5.8875V12H8.25ZM4.5 15C4.0875 15 3.7345 14.8533 3.441 14.5597C3.1475 14.2662 3.0005 13.913 3 13.5V11.25H4.5V13.5H13.5V11.25H15V13.5C15 13.9125 14.8533 14.2657 14.5597 14.5597C14.2662 14.8538 13.913 15.0005 13.5 15H4.5Z" fill="#7E7E7E" />
                              </svg> Upload </button>
                            <div class="modal fade drop_coman_file" id="votercard{{$rd->id}}" tabindex="-1" role="dialog" aria-labelledby="votercard" aria-hidden="true">
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
                                  <form action="{{ route('dirupdate1') }}" method="POST" enctype="multipart/form-data" class="upload-form"> 
                                      @csrf
                                                                          
                                    <div class="file-area">      
                                    <input type="file" class="dragfile" id="voterid_filepath" name="voterid_filepath" accept=".pdf,.doc,.docx" required>
                                    <input type="hidden" id="hidden_id" name="hidden_id" value="{{$rd->id}}">
  <div class="file-dummy">
    <div class="success">Great, your files are selected. Keep on.</div>
    <div class="default">
    <span class="upload_icon">
                          <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88"><title>file-upload</title><path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z"/></svg>
                          </span>  
                          Drag and Drop files here or <span class="fille">Choose File</span>
  </div>
  </div>
  <br>
            <div class="selected-file"></div>
</div> 
                          <span class="basic-file">Note:- file|mimes:pdf,doc,docx|max size:2048kb</span>                             
                          <button class="btn btn-primary btn-sm hvr-rotate"  style="border-radius:5px;" type="submit">Upload</button>

                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
          <!--  -->
          @else
        <div class="dropdown_coman_nt">
                                <button onclick="toggleDropdown()" class="dropbtn show_pp">
                                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                                    <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                                    <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                                  </svg>
                                </button>
                                <div id="myDropdown" class="dropdown-content"> <div class="down_del">
                                    <a class=" dropdown-itemm dnlod_nt" href="{{ route('download-voter-file', ['id' => $rd->id]) }}">
                                      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.40625 12.25C2.00014 12.25 1.61066 12.0887 1.32349 11.8015C1.03633 11.5143 0.875 11.1249 0.875 10.7188V8.53125C0.875 8.3572 0.94414 8.19028 1.06721 8.06721C1.19028 7.94414 1.3572 7.875 1.53125 7.875C1.7053 7.875 1.87222 7.94414 1.99529 8.06721C2.11836 8.19028 2.1875 8.3572 2.1875 8.53125V10.7188C2.1875 10.8395 2.2855 10.9375 2.40625 10.9375H11.5938C11.6518 10.9375 11.7074 10.9145 11.7484 10.8734C11.7895 10.8324 11.8125 10.7768 11.8125 10.7188V8.53125C11.8125 8.3572 11.8816 8.19028 12.0047 8.06721C12.1278 7.94414 12.2947 7.875 12.4688 7.875C12.6428 7.875 12.8097 7.94414 12.9328 8.06721C13.0559 8.19028 13.125 8.3572 13.125 8.53125V10.7188C13.125 11.1249 12.9637 11.5143 12.6765 11.8015C12.3893 12.0887 11.9999 12.25 11.5938 12.25H2.40625Z" fill="white"></path>
                                        <path d="M6.34334 6.72788V1.75C6.34334 1.57595 6.41248 1.40903 6.53555 1.28596C6.65862 1.16289 6.82554 1.09375 6.99959 1.09375C7.17364 1.09375 7.34056 1.16289 7.46363 1.28596C7.5867 1.40903 7.65584 1.57595 7.65584 1.75V6.72788L9.37959 5.005C9.44049 4.9441 9.51279 4.89579 9.59236 4.86283C9.67193 4.82987 9.75722 4.81291 9.84334 4.81291C9.92947 4.81291 10.0148 4.82987 10.0943 4.86283C10.1739 4.89579 10.2462 4.9441 10.3071 5.005C10.368 5.0659 10.4163 5.1382 10.4493 5.21777C10.4822 5.29734 10.4992 5.38262 10.4992 5.46875C10.4992 5.55488 10.4822 5.64016 10.4493 5.71973C10.4163 5.7993 10.368 5.8716 10.3071 5.9325L7.46334 8.77625C7.40247 8.83721 7.33018 8.88556 7.25061 8.91856C7.17103 8.95155 7.08574 8.96853 6.99959 8.96853C6.91345 8.96853 6.82815 8.95155 6.74857 8.91856C6.669 8.88556 6.59671 8.83721 6.53584 8.77625L3.69209 5.9325C3.63119 5.8716 3.58288 5.7993 3.54992 5.71973C3.51696 5.64016 3.5 5.55488 3.5 5.46875C3.5 5.38262 3.51696 5.29734 3.54992 5.21777C3.58288 5.1382 3.63119 5.0659 3.69209 5.005C3.75299 4.9441 3.82529 4.89579 3.90486 4.86283C3.98443 4.82987 4.06972 4.81291 4.15584 4.81291C4.24197 4.81291 4.32725 4.82987 4.40682 4.86283C4.48639 4.89579 4.55869 4.9441 4.61959 5.005L6.34334 6.72788Z" fill="white"></path>
                                      </svg> Download </a>
                                      <a class="dropdown-itemm delet_nt"  id="delete-{{ $rd ->id }}">
                                    <form method="POST" action="{{ route('voter.delete', ['id' => $rd->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?')">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A" />
                                    </svg> Delete
                                                            </button>
                                                        </form>  </a>
                                  </div>
                                  <!-- <a class="dropdown-itemm rename_nt" href="#" onclick="">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M8.75 9.33323L6.41667 11.6666H12.25V9.33323H8.75ZM7.035 4.19406L1.75 9.47906V11.6666H3.9375L9.2225 6.38156L7.035 4.19406ZM10.9142 4.6899C11.1417 4.4624 11.1417 4.08323 10.9142 3.8674L9.54917 2.5024C9.4398 2.39389 9.29198 2.33301 9.13792 2.33301C8.98385 2.33301 8.83604 2.39389 8.72667 2.5024L7.65917 3.5699L9.84667 5.7574L10.9142 4.6899Z" fill="#8D8D8D"></path>
                                    </svg> Edit </a>                                   -->
                                </div>
                              </div>
                              <!--  -->
</div>
@endif
    </li>

    @if($rd->passpost_filepath == Null) 
  <li >
    @else
    <li class="active">
      @endif
        <span>
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
        Passport</span>

        <div class="drop_coan_comand">
        @if($rd->passpost_filepath == Null)
        <button class="btn_command" style="border-radius:5px;" data-bs-toggle="modal" data-bs-target="#passport{{$rd->id}}">
                              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.25 12V5.8875L6.3 7.8375L5.25 6.75L9 3L12.75 6.75L11.7 7.8375L9.75 5.8875V12H8.25ZM4.5 15C4.0875 15 3.7345 14.8533 3.441 14.5597C3.1475 14.2662 3.0005 13.913 3 13.5V11.25H4.5V13.5H13.5V11.25H15V13.5C15 13.9125 14.8533 14.2657 14.5597 14.5597C14.2662 14.8538 13.913 15.0005 13.5 15H4.5Z" fill="#7E7E7E" />
                              </svg> Upload </button>
                            <div class="modal fade drop_coman_file" id="passport{{$rd->id}}" tabindex="-1" role="dialog" aria-labelledby="passport" aria-hidden="true">
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
                                  <form action="{{ route('dirupdate3') }}" method="POST" enctype="multipart/form-data" class="upload-form"> 
                                      @csrf
                                                                          
                                    <div class="file-area">      
                                    <input type="file" class="dragfile" id="passport_filepath" name="passport_filepath" accept=".pdf,.doc,.docx" required>
                                    <input type="hidden" id="hidden_id" name="hidden_id" value="{{$rd->id}}">
  <div class="file-dummy">
    <div class="success">Great, your files are selected. Keep on.</div>
    <div class="default">
    <span class="upload_icon">
                          <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88"><title>file-upload</title><path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z"/></svg>
                          </span>  
                          Drag and Drop files here or <span class="fille">Choose File</span>
  </div>
  </div>
  <br>
            <div class="selected-file"></div>
</div> 
                          <span class="basic-file">Note:- file|mimes:pdf,doc,docx|max size:2048kb</span>                             
                          <button class="btn btn-primary btn-sm hvr-rotate"  style="border-radius:5px;" type="submit">Upload</button>

                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
          <!--  -->
          @else
        <div class="dropdown_coman_nt">
                                <button onclick="toggleDropdown()" class="dropbtn show_pp">
                                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                                    <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                                    <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                                  </svg>
                                </button>
                                <div id="myDropdown" class="dropdown-content"> <div class="down_del">
                                    <a class=" dropdown-itemm dnlod_nt" href="{{ route('download-passport-file', ['id' => $rd->id]) }}">
                                      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.40625 12.25C2.00014 12.25 1.61066 12.0887 1.32349 11.8015C1.03633 11.5143 0.875 11.1249 0.875 10.7188V8.53125C0.875 8.3572 0.94414 8.19028 1.06721 8.06721C1.19028 7.94414 1.3572 7.875 1.53125 7.875C1.7053 7.875 1.87222 7.94414 1.99529 8.06721C2.11836 8.19028 2.1875 8.3572 2.1875 8.53125V10.7188C2.1875 10.8395 2.2855 10.9375 2.40625 10.9375H11.5938C11.6518 10.9375 11.7074 10.9145 11.7484 10.8734C11.7895 10.8324 11.8125 10.7768 11.8125 10.7188V8.53125C11.8125 8.3572 11.8816 8.19028 12.0047 8.06721C12.1278 7.94414 12.2947 7.875 12.4688 7.875C12.6428 7.875 12.8097 7.94414 12.9328 8.06721C13.0559 8.19028 13.125 8.3572 13.125 8.53125V10.7188C13.125 11.1249 12.9637 11.5143 12.6765 11.8015C12.3893 12.0887 11.9999 12.25 11.5938 12.25H2.40625Z" fill="white"></path>
                                        <path d="M6.34334 6.72788V1.75C6.34334 1.57595 6.41248 1.40903 6.53555 1.28596C6.65862 1.16289 6.82554 1.09375 6.99959 1.09375C7.17364 1.09375 7.34056 1.16289 7.46363 1.28596C7.5867 1.40903 7.65584 1.57595 7.65584 1.75V6.72788L9.37959 5.005C9.44049 4.9441 9.51279 4.89579 9.59236 4.86283C9.67193 4.82987 9.75722 4.81291 9.84334 4.81291C9.92947 4.81291 10.0148 4.82987 10.0943 4.86283C10.1739 4.89579 10.2462 4.9441 10.3071 5.005C10.368 5.0659 10.4163 5.1382 10.4493 5.21777C10.4822 5.29734 10.4992 5.38262 10.4992 5.46875C10.4992 5.55488 10.4822 5.64016 10.4493 5.71973C10.4163 5.7993 10.368 5.8716 10.3071 5.9325L7.46334 8.77625C7.40247 8.83721 7.33018 8.88556 7.25061 8.91856C7.17103 8.95155 7.08574 8.96853 6.99959 8.96853C6.91345 8.96853 6.82815 8.95155 6.74857 8.91856C6.669 8.88556 6.59671 8.83721 6.53584 8.77625L3.69209 5.9325C3.63119 5.8716 3.58288 5.7993 3.54992 5.71973C3.51696 5.64016 3.5 5.55488 3.5 5.46875C3.5 5.38262 3.51696 5.29734 3.54992 5.21777C3.58288 5.1382 3.63119 5.0659 3.69209 5.005C3.75299 4.9441 3.82529 4.89579 3.90486 4.86283C3.98443 4.82987 4.06972 4.81291 4.15584 4.81291C4.24197 4.81291 4.32725 4.82987 4.40682 4.86283C4.48639 4.89579 4.55869 4.9441 4.61959 5.005L6.34334 6.72788Z" fill="white"></path>
                                      </svg> Download </a>
                                      <a class="dropdown-itemm delet_nt"  id="delete-{{ $rd ->id }}">
                                    <form method="POST" action="{{ route('passport.delete', ['id' => $rd->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?')">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A" />
                                    </svg> Delete
                                                            </button>
                                                        </form>  </a>
                                  </div>
                                  <!-- <a class="dropdown-itemm rename_nt" href="#" onclick="">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M8.75 9.33323L6.41667 11.6666H12.25V9.33323H8.75ZM7.035 4.19406L1.75 9.47906V11.6666H3.9375L9.2225 6.38156L7.035 4.19406ZM10.9142 4.6899C11.1417 4.4624 11.1417 4.08323 10.9142 3.8674L9.54917 2.5024C9.4398 2.39389 9.29198 2.33301 9.13792 2.33301C8.98385 2.33301 8.83604 2.39389 8.72667 2.5024L7.65917 3.5699L9.84667 5.7574L10.9142 4.6899Z" fill="#8D8D8D"></path>
                                    </svg> Edit </a>                                   -->
                                </div>
                              </div>
                              <!--  -->
</div>
@endif
    </li>
    

<!-- new li start-->
<li class="customli" id="customdocs{{$rd->id}}"  style="display:none;">
<form action="{{ route('customdocupss') }}" method="POST" enctype="multipart/form-data" class="upload-form"> 
@csrf
        <input type="text" name="file_name" class="form-control" placeholder="File Name" id="file_name" required><br>
        <input type="file" name="custom_file" class="form-control" id="custom_file" required><br>
        <input type="hidden" name="director_id" class="form-control" id="director_id" value="{{$rd->id}}"><br>
        <button type="submit" name="upload" id="upload" value="Upload" class="btn btn-primary hvr-rotate">Upload</button>
        </form>
    </li>
<!-- new li end-->

  </ul>
  <div class="tabs_col_head">
  <a class="custdoc hvr-rotate"  onclick="toggleCustomLi('{{$rd->id}}')">
    <!-- <a data-bs-toggle="modal" data-bs-target="#add_file_one"> -->
    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.41797 7.58341H2.91797V6.41675H6.41797V2.91675H7.58464V6.41675H11.0846V7.58341H7.58464V11.0834H6.41797V7.58341Z" fill="#7E7E7E"/>
</svg>Add a Document 
    </a>
</div>

<!-- accordian start for dsc -->
<div class="accordion">
  <div class="accordion-item">
    <div class="accordion-header">DSC Details<svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.70431 5.70657C5.51681 5.89384 5.26264 5.99902 4.99764 5.99902C4.73264 5.99902 4.47847 5.89384 4.29097 5.70657L0.518971 1.9359C0.426126 1.84302 0.352488 1.73275 0.302258 1.6114C0.252027 1.49005 0.22619 1.36 0.22622 1.22867C0.226251 1.09733 0.252151 0.967293 0.302438 0.845969C0.352725 0.724645 0.426416 0.614415 0.519304 0.52157C0.612193 0.428725 0.722459 0.355085 0.843807 0.304855C0.965155 0.254625 1.09521 0.228787 1.22654 0.228818C1.35787 0.228849 1.48792 0.254748 1.60924 0.305036C1.73056 0.355323 1.84079 0.429015 1.93364 0.521903L4.99764 3.58524L8.06164 0.521236C8.15384 0.425683 8.26415 0.34945 8.38613 0.296984C8.50811 0.244518 8.63931 0.216872 8.77209 0.215656C8.90487 0.21444 9.03656 0.23968 9.15948 0.289903C9.2824 0.340126 9.39409 0.414325 9.48802 0.508173C9.58196 0.602022 9.65627 0.713638 9.7066 0.83651C9.75694 0.959382 9.78231 1.09105 9.78122 1.22383C9.78013 1.35661 9.7526 1.48784 9.70025 1.60987C9.6479 1.7319 9.57177 1.84228 9.47631 1.93457L5.70431 5.70657Z" fill="#858585"/>
</svg></div>
    <div class="accordion-content">
	  <!-- Content for DSC Details tab start -->
	  
<div class="status_int">
<div class="status_inner">
<div class="left-status">
<span>Current Status</span>
<h2>{{$rd->status}}</h2>
</div>
<div class="right-status">
<a  data-bs-toggle="modal" data-bs-target="#update_s_1{{$rd->id}}">Update Status</a>
<!-- model start -->
<div class="modal fade drop_coman_file have_title director_cosutom_des" id="update_s_1{{$rd->id}}" tabindex="-1" role="dialog" aria-labelledby="update_s_1{{$rd->id}}" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" style="font-weight:700">Update Status <span class="clinet_name">{{$rd->dname}}</span></h5>
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
                                    <h3>Update Status</h3>


                                    <form action="{{ route('updatedirectordt') }}" method="POST" enctype="multipart/form-data" class="upload-form"> 
                                      @csrf
                                                                          

                          <div class="gropu_form">
                          <label for="start">Select Status</label>
                          <div class="right_d_status-wrap">
                          <div class="right_d_status">
                            <div class="status_radio">
                            <input type="hidden" id="dr_id" name="dr_id" value="{{$rd->id}}" />
                            <div class="group_radio">
<div class="for_group radio">
    <input type="radio" id="expiree1" name="status" value="expire" {{ $rd->status == 'expire' ? 'checked' : '' }}>
    <label for="expiree1">Expired<span>Expiry Date</span></label>   
</div>
</div>
</div>
<div class="status_calander">
                          <input type="date" id="expiredate" name="expiredate" value="{{$rd->expiredate}}" />
                          </div>
</div>

<div class="right_d_status">
                            <div class="status_radio">

                            <div class="group_radio">
<div class="for_group radio">
    <input type="radio" id="activee1" name="status" value="active" {{ $rd->status == 'active' ? 'checked' : '' }}>
    <label for="activee1">Active<span>Renewal Date</span></label>   
</div>
</div>
</div>
<div class="status_calander">
                          <input type="date" id="activedate" name="activedate" value="{{$rd->activedate}}" >
                          </div>
</div>

</div>

                          </div>

                          <div class="gropu_form">
                          <label for="fname">DSC’s Location</label>
                          <select id="location" name="location" class="form-control" required>
                          <option value="" disabled Selected>select</option>
    <option value="PC Office" {{ $rd->location === 'PC Office' ? ' selected' : '' }}>PC Office</option>
    <option value="Client Office" {{ $rd->location === 'Client Office' ? ' selected' : '' }}>Client Office</option>
    <option value="Third Party Consultant Office" {{ $rd->location === 'Third Party Consultant Office' ? ' selected' : '' }}>Third Party Consultant Office</option>
    
</select><br>
                          </div>

                          <div class="root_btn">                        
                          <button class="btn hvr-rotate"  style="border-radius:5px;" type="submit">Confirm</button>
</div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
<!-- model end -->

</div>
</div>
<div class="st_btm">
<span>Location: {{ ucfirst($rd->location) }}</span>
    <span>Expiry {{$rd->expiredate}}</span>
</div>
</div>
{{--
<div class="dyc_report">
    <h3>DSC Record</h3>
    <ul class="dsc_list">

        <li class="renew">
    <div class="rnew_left">
<div class="icon_rn">
<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.5 6.25006H4.2375C5.04585 5.00777 6.23401 4.05996 7.62489 3.54793C9.01577 3.03589 10.5349 2.98705 11.9558 3.40868C13.3767 3.83031 14.6233 4.69984 15.5097 5.88764C16.3962 7.07545 16.8751 8.51793 16.875 10.0001H18.125C18.1267 8.3285 17.6128 6.69708 16.6534 5.32826C15.694 3.95944 14.3358 2.91985 12.7639 2.35123C11.192 1.78262 9.48297 1.71266 7.86987 2.1509C6.25677 2.58914 4.81809 3.51424 3.75 4.80007V2.50007H2.5V7.50006H7.5V6.25006ZM12.5 13.7501H15.7625C14.9542 14.9924 13.766 15.9402 12.3751 16.4522C10.9842 16.9642 9.46513 17.0131 8.04423 16.5914C6.62334 16.1698 5.37674 15.3003 4.49027 14.1125C3.60379 12.9247 3.12491 11.4822 3.125 10.0001H1.875C1.87328 11.6716 2.38717 13.3031 3.34659 14.6719C4.306 16.0407 5.66426 17.0803 7.23614 17.6489C8.80803 18.2175 10.517 18.2875 12.1301 17.8492C13.7432 17.411 15.1819 16.4859 16.25 15.2001V17.5001H17.5V12.5001H12.5V13.7501Z" fill="black"/>
</svg>
</div>
<div class="rnew_text">
<h4>Renewed</h4>
<span>by <u>Arun Manchandani</u></span>
</div>

</div>
<div class="exp_date">
    <span>13/02/2023</span>
</div>
</li>

    <li class="expirred">
    <div class="rnew_left">
<div class="icon_rn">
<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_572_1673)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.17406 0.00189399C7.0101 -0.0234371 5.85463 0.205589 4.78833 0.672984C3.72203 1.14038 2.77059 1.83488 2.00045 2.70799C1.2303 3.5811 0.660006 4.61179 0.329377 5.7281C-0.00125271 6.84441 -0.0842481 8.01942 0.0861851 9.17112C0.256618 10.3228 0.676372 11.4234 1.31614 12.3961C1.95591 13.3688 2.80028 14.1902 3.79029 14.8028C4.78031 15.4155 5.89211 15.8046 7.04808 15.9432C8.20405 16.0817 9.37632 15.9663 10.4831 15.6049C10.6722 15.5431 10.829 15.4087 10.919 15.2313C11.009 15.0539 11.0249 14.848 10.9631 14.6589C10.9013 14.4698 10.7669 14.313 10.5895 14.223C10.4121 14.133 10.2062 14.1171 10.0171 14.1789C8.81437 14.5716 7.52321 14.6048 6.30192 14.2744C5.08064 13.944 3.98234 13.2643 3.1417 12.3188C2.30106 11.3733 1.75464 10.2029 1.56945 8.95139C1.38426 7.69983 1.56835 6.42143 2.09915 5.27297C2.62994 4.12451 3.48436 3.15592 4.55763 2.48599C5.63089 1.81606 6.87634 1.47391 8.14122 1.50151C9.40611 1.5291 10.6354 1.92524 11.6785 2.64134C12.7215 3.35745 13.5329 4.36238 14.0131 5.53289C14.0885 5.71695 14.234 5.8635 14.4175 5.9403C14.5084 5.97832 14.6058 5.99808 14.7043 5.99844C14.8028 5.9988 14.9004 5.97976 14.9916 5.94239C15.0827 5.90503 15.1656 5.85009 15.2355 5.78069C15.3054 5.7113 15.3609 5.62882 15.399 5.53795C15.437 5.44709 15.4567 5.34963 15.4571 5.25113C15.4575 5.15264 15.4384 5.05503 15.4011 4.96389C14.8101 3.52319 13.8115 2.28627 12.5277 1.40486C11.244 0.523449 9.7309 0.0358595 8.17406 0.00189399ZM8.74906 3.74989C8.74906 3.55098 8.67004 3.36022 8.52939 3.21956C8.38874 3.07891 8.19797 2.99989 7.99906 2.99989C7.80015 2.99989 7.60938 3.07891 7.46873 3.21956C7.32808 3.36022 7.24906 3.55098 7.24906 3.74989V7.68989L5.21506 9.72289C5.14137 9.79156 5.08227 9.87436 5.04128 9.96636C5.00029 10.0584 4.97825 10.1577 4.97647 10.2584C4.97469 10.3591 4.99322 10.4591 5.03094 10.5525C5.06866 10.6459 5.1248 10.7307 5.19602 10.8019C5.26724 10.8732 5.35208 10.9293 5.44546 10.967C5.53885 11.0047 5.63888 11.0233 5.73958 11.0215C5.84029 11.0197 5.9396 10.9977 6.0316 10.9567C6.1236 10.9157 6.2064 10.8566 6.27506 10.7829L8.52906 8.52989L8.74906 8.30989V3.74989ZM14.9991 14.9999C14.9991 15.2651 14.8937 15.5195 14.7062 15.707C14.5186 15.8945 14.2643 15.9999 13.9991 15.9999C13.7338 15.9999 13.4795 15.8945 13.292 15.707C13.1044 15.5195 12.9991 15.2651 12.9991 14.9999C12.9991 14.7347 13.1044 14.4803 13.292 14.2928C13.4795 14.1053 13.7338 13.9999 13.9991 13.9999C14.2643 13.9999 14.5186 14.1053 14.7062 14.2928C14.8937 14.4803 14.9991 14.7347 14.9991 14.9999ZM14.7491 8.74989C14.7491 8.55098 14.67 8.36022 14.5294 8.21956C14.3887 8.07891 14.198 7.99989 13.9991 7.99989C13.8001 7.99989 13.6094 8.07891 13.4687 8.21956C13.3281 8.36022 13.2491 8.55098 13.2491 8.74989V12.2499C13.2491 12.4488 13.3281 12.6396 13.4687 12.7802C13.6094 12.9209 13.8001 12.9999 13.9991 12.9999C14.198 12.9999 14.3887 12.9209 14.5294 12.7802C14.67 12.6396 14.7491 12.4488 14.7491 12.2499V8.74989Z" fill="black"/>
</g>
<defs>
<clipPath id="clip0_572_1673">
<rect width="16" height="16" fill="white"/>
</clipPath>
</defs>
</svg>
</div>
<div class="rnew_text">
<h4>Expired</h4>
</div>

</div>
<div class="exp_date">
    <span>13/02/2023</span>
</div>
        </li>

        <li class="issued">
    <div class="rnew_left">
<div class="icon_rn">
<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_573_1689)">
<path d="M14.4013 7.73345C14.5117 7.61497 14.5718 7.45827 14.569 7.29635C14.5661 7.13443 14.5005 6.97994 14.386 6.86543C14.2715 6.75092 14.117 6.68533 13.9551 6.68247C13.7932 6.67961 13.6365 6.73972 13.518 6.85012L8.543 11.8251L6.48467 9.76678C6.36619 9.65638 6.20949 9.59628 6.04757 9.59914C5.88565 9.60199 5.73116 9.66759 5.61665 9.7821C5.50214 9.89661 5.43655 10.0511 5.43369 10.213C5.43083 10.3749 5.49094 10.5316 5.60134 10.6501L8.10134 13.1501C8.21852 13.2672 8.37738 13.3329 8.543 13.3329C8.70863 13.3329 8.86748 13.2672 8.98467 13.1501L14.4013 7.73345Z" fill="black"/>
<path d="M9.9987 0.833252C15.0612 0.833252 19.1654 4.93742 19.1654 9.99992C19.1654 15.0624 15.0612 19.1666 9.9987 19.1666C4.9362 19.1666 0.832031 15.0624 0.832031 9.99992C0.832031 4.93742 4.9362 0.833252 9.9987 0.833252ZM2.08203 9.99992C2.08203 12.0996 2.91611 14.1132 4.40077 15.5978C5.88543 17.0825 7.89907 17.9166 9.9987 17.9166C12.0983 17.9166 14.112 17.0825 15.5966 15.5978C17.0813 14.1132 17.9154 12.0996 17.9154 9.99992C17.9154 7.90029 17.0813 5.88665 15.5966 4.40199C14.112 2.91733 12.0983 2.08325 9.9987 2.08325C7.89907 2.08325 5.88543 2.91733 4.40077 4.40199C2.91611 5.88665 2.08203 7.90029 2.08203 9.99992Z" fill="black"/>
</g>
<defs>
<clipPath id="clip0_573_1689">
<rect width="20" height="20" fill="white"/>
</clipPath>
</defs>
</svg>
</div>
<div class="rnew_text">
<h4>Issued</h4>
<span>by <u>Aditya Jajoo</u></span>
</div>

</div>
<div class="exp_date">
    <span>13/02/2023</span>
</div>
        </li>

</ul>
</div> --}}
	  <!-- Content for DSC Details tab end -->
    </div>
  </div>
</div>
<!-- accordian end for dsc -->

<!-- new custom doc li start -->
<h2 class="custom_li_doc_title">Custom Document</h2>
{{-- Display matching custom documents --}}
    @foreach($customDirectorStores as $cd)
        @if($cd->director_id == $rd->id)
            <ul class="kyc_list custom_li_doc">
                <li class="active">
                    <span>
                        <div class="finish">
                            <!-- SVG code for the finish icon -->
                        </div>
                        {{$cd->file_name}}
                    </span>
                    <div class="drop_coan_comand">
   
   <div class="dropdown_coman_nt">
                           <button onclick="toggleDropdown()" class="dropbtn show_pp">
                             <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                               <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                               <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                             </svg>
                           </button>
                           <div id="myDropdown" class="dropdown-content"> <div class="down_del">
                           <a class=" dropdown-itemm dnlod_nt" href="{{ route('download-custom-file', ['id' => $cd->id]) }}">
                                      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.40625 12.25C2.00014 12.25 1.61066 12.0887 1.32349 11.8015C1.03633 11.5143 0.875 11.1249 0.875 10.7188V8.53125C0.875 8.3572 0.94414 8.19028 1.06721 8.06721C1.19028 7.94414 1.3572 7.875 1.53125 7.875C1.7053 7.875 1.87222 7.94414 1.99529 8.06721C2.11836 8.19028 2.1875 8.3572 2.1875 8.53125V10.7188C2.1875 10.8395 2.2855 10.9375 2.40625 10.9375H11.5938C11.6518 10.9375 11.7074 10.9145 11.7484 10.8734C11.7895 10.8324 11.8125 10.7768 11.8125 10.7188V8.53125C11.8125 8.3572 11.8816 8.19028 12.0047 8.06721C12.1278 7.94414 12.2947 7.875 12.4688 7.875C12.6428 7.875 12.8097 7.94414 12.9328 8.06721C13.0559 8.19028 13.125 8.3572 13.125 8.53125V10.7188C13.125 11.1249 12.9637 11.5143 12.6765 11.8015C12.3893 12.0887 11.9999 12.25 11.5938 12.25H2.40625Z" fill="white"></path>
                                        <path d="M6.34334 6.72788V1.75C6.34334 1.57595 6.41248 1.40903 6.53555 1.28596C6.65862 1.16289 6.82554 1.09375 6.99959 1.09375C7.17364 1.09375 7.34056 1.16289 7.46363 1.28596C7.5867 1.40903 7.65584 1.57595 7.65584 1.75V6.72788L9.37959 5.005C9.44049 4.9441 9.51279 4.89579 9.59236 4.86283C9.67193 4.82987 9.75722 4.81291 9.84334 4.81291C9.92947 4.81291 10.0148 4.82987 10.0943 4.86283C10.1739 4.89579 10.2462 4.9441 10.3071 5.005C10.368 5.0659 10.4163 5.1382 10.4493 5.21777C10.4822 5.29734 10.4992 5.38262 10.4992 5.46875C10.4992 5.55488 10.4822 5.64016 10.4493 5.71973C10.4163 5.7993 10.368 5.8716 10.3071 5.9325L7.46334 8.77625C7.40247 8.83721 7.33018 8.88556 7.25061 8.91856C7.17103 8.95155 7.08574 8.96853 6.99959 8.96853C6.91345 8.96853 6.82815 8.95155 6.74857 8.91856C6.669 8.88556 6.59671 8.83721 6.53584 8.77625L3.69209 5.9325C3.63119 5.8716 3.58288 5.7993 3.54992 5.71973C3.51696 5.64016 3.5 5.55488 3.5 5.46875C3.5 5.38262 3.51696 5.29734 3.54992 5.21777C3.58288 5.1382 3.63119 5.0659 3.69209 5.005C3.75299 4.9441 3.82529 4.89579 3.90486 4.86283C3.98443 4.82987 4.06972 4.81291 4.15584 4.81291C4.24197 4.81291 4.32725 4.82987 4.40682 4.86283C4.48639 4.89579 4.55869 4.9441 4.61959 5.005L6.34334 6.72788Z" fill="white"></path>
                                      </svg> Download </a>
                                      <a class="dropdown-itemm delet_nt"  id="delete-{{ $cd ->id }}">
                                    <form method="POST" action="{{ route('customfilecd.delete', ['id' => $cd->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?')">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A" />
                                    </svg> Delete
                                                            </button>
                                                        </form>  </a>
                             </div>
                                                 
                           </div>
                         </div>
                       
</div>
                </li>
            </ul>
        @endif
    @endforeach
<!-- new custom doc li end -->

</div>


@empty
    <div>No director found.</div>
@endforelse
</div>

</div>

</div>


</div>

</div>

<!-- Container-fluid start-->

        </div>
      </div>
    </div>

   
    <script>
    function openTab(event, tabId) {
        // Hide all tab contents
        document.querySelectorAll('.tabcontent').forEach(tab => {
            tab.style.display = 'none';
        });

        // Remove 'active' class from all tab buttons
        document.querySelectorAll('.tablinks').forEach(btn => {
            btn.classList.remove('active');
        });

        // Show the selected tab content
        document.getElementById(tabId).style.display = 'block';

        // Add 'active' class to the clicked tab button
        event.currentTarget.classList.add('active');

        // Call a function to update the record for the selected tab
        updateRecord(tabId);
    }

    function updateRecord(tabId) {
        // You can use AJAX here to update the record associated with the selected tab
        // Example AJAX request:
        /*
        fetch('/update-record', {
            method: 'POST',
            body: JSON.stringify({ tabId: tabId }),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            // Handle response
        })
        .catch(error => {
            // Handle error
        });
        */
    }
</script>
<style>
  .status_int .status_inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
}
.flatpickr-day.disabled, .flatpickr-day.disabled:hover {
    cursor: not-allowed;
    color: darkslategray !important;
}
button.delete-button {
    background: transparent;
    border: none;
    display: inline-flex;
}

.custom_li_doc_title {
    display: flex;
    border-bottom: 1px solid #E7E7E7;
    border: 0;
    background: transparent;
    font-size: 15px;
    font-weight: 500;
    letter-spacing: -0.02em;
    padding: 10px 0px;
    position: relative;
    text-align: center;
    justify-content: center;
    margin-top: 40px;
}

.custom_li_doc_title::after {
    content: "";
    height: 2px;
    bottom: 0;
    left: 0;
    width: 100%;
    background: #5790FF;
    position: absolute;
    border-radius: 50px;
    transition: all .25s ease-out;
}

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
<script>
$("#expireStatus").flatpickr({
    enableTime: false,
    dateFormat: "Y-m-d", // Set the date format to "YYYY-MM-DD"
    maxDate: "today"
});

$("#activeStatus").flatpickr({
  enableTime: false,
    dateFormat: "Y-m-d", // Set the date format to "YYYY-MM-DD"
    minDate: "today" // Disable dates before today
});
</script>

    @endsection
   
