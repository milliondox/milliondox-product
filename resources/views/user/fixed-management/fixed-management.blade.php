@extends('user.includes.fixed-management') @section('content')
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
           FA Management 
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
           FA Management 
          </h2>
            </div>
             <!-- Container-fluid start-->
             <div class="container-fluid mian_director main_contractt Fixed-management">
          <div class="row">  

<div class="col-md-6">
<div class="kyc-infoo">

<div class="kyc-info">
<div class="column-tabs">

<div class="tab active">
<div class="table_title">
                        <h2>Fixed Assets Management</h2>
</div>

  <div class="manage_co_nt">
  
   <div class="manage_co_wrap">
   
  <div class="hearder-entres">    
                      <div class="volt_headd-filter">
                        <button>
                          <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.59282 11.625H4.5V5.94909L0.5625 1.26159V0.375H11.25V1.25653L7.5 5.94403V9.71782L5.59282 11.625ZM5.25 10.875H5.28218L6.75 9.40718V5.68097L10.3948 1.125H1.42734L5.25 5.67591V10.875Z" fill="#868686"></path>
                          </svg> Apply Filter </button>
                          <a href=#" class="exprot_master"><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9.58073 5.00008L7.91406 3.33341V4.58341H4.16406V5.41675H7.91406V6.66675M0.414062 7.50008V2.50008C0.414062 2.27907 0.50186 2.06711 0.65814 1.91083C0.814421 1.75455 1.02638 1.66675 1.2474 1.66675H6.2474C6.46841 1.66675 6.68037 1.75455 6.83665 1.91083C6.99293 2.06711 7.08073 2.27907 7.08073 2.50008V3.75008H6.2474V2.50008H1.2474V7.50008H6.2474V6.25008H7.08073V7.50008C7.08073 7.72109 6.99293 7.93306 6.83665 8.08934C6.68037 8.24562 6.46841 8.33341 6.2474 8.33341H1.2474C1.02638 8.33341 0.814421 8.24562 0.65814 8.08934C0.50186 7.93306 0.414063 7.72109 0.414062 7.50008Z" fill="#898989"/>
</svg>Export Contract Master</a>
                      </div>
                    </div>

<div class="data_tabs">
<div class="tabs">

@foreach($fixed as $fix)
<button class="tablinks active" onclick="openTab(event, 'tab1{{$fix->id}}')">
<div class="btn_up_cont">
    <div class="up_lleft">
        <h2>{{$fix->asset_name}}</h2>
        <span>{{$fix->description}}</span>
</div>
<div class="up_right">
<span class="tangible">{{$fix->amc_contract}}</span>
<h3 class="location"><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5 5.625C4.69097 5.625 4.38887 5.53336 4.13192 5.36167C3.87497 5.18998 3.6747 4.94595 3.55644 4.66044C3.43818 4.37493 3.40723 4.06077 3.46752 3.75767C3.52781 3.45458 3.67663 3.17617 3.89515 2.95765C4.11367 2.73913 4.39208 2.59031 4.69517 2.53002C4.99827 2.46973 5.31243 2.50068 5.59794 2.61894C5.88345 2.7372 6.12748 2.93747 6.29917 3.19442C6.47086 3.45137 6.5625 3.75347 6.5625 4.0625C6.562 4.47675 6.39723 4.87389 6.10431 5.16681C5.81139 5.45973 5.41425 5.6245 5 5.625ZM5 3.125C4.81458 3.125 4.63332 3.17998 4.47915 3.283C4.32498 3.38601 4.20482 3.53243 4.13386 3.70374C4.06291 3.87504 4.04434 4.06354 4.08051 4.2454C4.11669 4.42726 4.20598 4.5943 4.33709 4.72541C4.4682 4.85653 4.63525 4.94581 4.8171 4.98199C4.99896 5.01816 5.18746 4.9996 5.35877 4.92864C5.53007 4.85768 5.67649 4.73752 5.7795 4.58335C5.88252 4.42918 5.9375 4.24792 5.9375 4.0625C5.93725 3.81394 5.8384 3.57562 5.66264 3.39986C5.48688 3.2241 5.24857 3.12525 5 3.125Z" fill="#979797"/>
<path d="M5 9.375L2.36375 6.26594C2.32712 6.21925 2.29087 6.17227 2.255 6.125C1.80469 5.53181 1.56141 4.80726 1.5625 4.0625C1.5625 3.15082 1.92467 2.27648 2.56932 1.63182C3.21398 0.987164 4.08832 0.625 5 0.625C5.91168 0.625 6.78603 0.987164 7.43068 1.63182C8.07534 2.27648 8.4375 3.15082 8.4375 4.0625C8.4386 4.80692 8.19543 5.53114 7.74532 6.12406L7.745 6.125C7.745 6.125 7.65125 6.24813 7.63719 6.26469L5 9.375ZM2.75407 5.74844C2.75407 5.74844 2.82688 5.84469 2.84344 5.86531L5 8.40875L7.15938 5.86187C7.17313 5.84469 7.24625 5.74781 7.24657 5.7475C7.61443 5.26285 7.81323 4.67095 7.8125 4.0625C7.8125 3.31658 7.51619 2.60121 6.98874 2.07376C6.4613 1.54632 5.74592 1.25 5 1.25C4.25408 1.25 3.53871 1.54632 3.01127 2.07376C2.48382 2.60121 2.1875 3.31658 2.1875 4.0625C2.18685 4.67132 2.38587 5.26357 2.75407 5.74844Z" fill="#979797"/>
</svg>{{$fix->asset_category}}</h3>
</div>
</div>
<div class="btn_btm_cont">
<div class="cont_text">
    <h3>{{$fix->invoice_no}}</h3>
</div>
</div>
</button>
@endforeach

</div>
</div>
</div>

  <div class="hearder-entress enteries_bottom">
                      <div class="sadd_filds">
                      <button class="hvr-rotate" id="addCustomDocButton" data-bs-toggle="modal" data-bs-target="#add_contract1"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.41797 7.58341H2.91797V6.41675H6.41797V2.91675H7.58464V6.41675H11.0846V7.58341H7.58464V11.0834H6.41797V7.58341Z" fill="#7E7E7E"></path>
</svg>Asset Check-in</button>



                      </div>
                    </div>
					

</div>
</div>

</div>
</div>
</div>
</div>


<div class="col-md-6">
<div class="director-info management-infoo">
  
@foreach($fixed as $fix)
<div id="tab1{{$fix->id}}" class="tabcontent">
<div class="contract-details">

<div class="btn_up_cont">
    <div class="up_lleft">
        <h2>{{$fix->asset_name}} </h2>
        <span>Asset ID: <b>{{$fix->asset_id}}</b></span>
        <span>Location: <b>{{$fix->loc}}</b></span>
</div>
<div class="up_right">
<a href="{{ route('download-fixed-file', ['id' => $fix->id]) }}" class="view-cont">Download Asset<svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.3691 4.38178C5.53296 4.54584 5.625 4.76824 5.625 5.00011C5.625 5.23199 5.53296 5.45438 5.3691 5.61845L2.06977 8.91895C1.98849 9.00019 1.89201 9.06462 1.78583 9.10857C1.67965 9.15252 1.56586 9.17513 1.45094 9.1751C1.33602 9.17508 1.22224 9.15242 1.11608 9.10841C1.00992 9.06441 0.913467 8.99993 0.832229 8.91866C0.750989 8.83738 0.686554 8.7409 0.642603 8.63472C0.598651 8.52854 0.576044 8.41474 0.576071 8.29982C0.576097 8.18491 0.59876 8.07112 0.642761 7.96496C0.686763 7.8588 0.751243 7.76235 0.83252 7.68111L3.51294 5.00011L0.831936 2.31911C0.748328 2.23844 0.681623 2.14192 0.635716 2.03518C0.589808 1.92845 0.565618 1.81365 0.564554 1.69747C0.56349 1.58129 0.585575 1.46606 0.62952 1.3585C0.673465 1.25095 0.738389 1.15322 0.820507 1.07103C0.902624 0.988832 1.00029 0.923815 1.1078 0.879768C1.21531 0.835722 1.33052 0.813528 1.4467 0.814483C1.56289 0.815437 1.67772 0.839521 1.78449 0.885327C1.89126 0.931134 1.98785 0.997747 2.0686 1.08128L5.3691 4.38178Z" fill="#5790FF"/>
</svg></a>
<div class="dropdown">
                              <button onclick="toggleDropdown()" class="dropbtn show_pp">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                                </svg>
                              </button>
                              <div id="myDropdown" class="dropdown-content"> <div class="down_del">
                                  <!-- <a class=" dropdown-itemm dnlod_nt" href="#">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M2.40625 12.25C2.00014 12.25 1.61066 12.0887 1.32349 11.8015C1.03633 11.5143 0.875 11.1249 0.875 10.7188V8.53125C0.875 8.3572 0.94414 8.19028 1.06721 8.06721C1.19028 7.94414 1.3572 7.875 1.53125 7.875C1.7053 7.875 1.87222 7.94414 1.99529 8.06721C2.11836 8.19028 2.1875 8.3572 2.1875 8.53125V10.7188C2.1875 10.8395 2.2855 10.9375 2.40625 10.9375H11.5938C11.6518 10.9375 11.7074 10.9145 11.7484 10.8734C11.7895 10.8324 11.8125 10.7768 11.8125 10.7188V8.53125C11.8125 8.3572 11.8816 8.19028 12.0047 8.06721C12.1278 7.94414 12.2947 7.875 12.4688 7.875C12.6428 7.875 12.8097 7.94414 12.9328 8.06721C13.0559 8.19028 13.125 8.3572 13.125 8.53125V10.7188C13.125 11.1249 12.9637 11.5143 12.6765 11.8015C12.3893 12.0887 11.9999 12.25 11.5938 12.25H2.40625Z" fill="white"></path>
                                      <path d="M6.34334 6.72788V1.75C6.34334 1.57595 6.41248 1.40903 6.53555 1.28596C6.65862 1.16289 6.82554 1.09375 6.99959 1.09375C7.17364 1.09375 7.34056 1.16289 7.46363 1.28596C7.5867 1.40903 7.65584 1.57595 7.65584 1.75V6.72788L9.37959 5.005C9.44049 4.9441 9.51279 4.89579 9.59236 4.86283C9.67193 4.82987 9.75722 4.81291 9.84334 4.81291C9.92947 4.81291 10.0148 4.82987 10.0943 4.86283C10.1739 4.89579 10.2462 4.9441 10.3071 5.005C10.368 5.0659 10.4163 5.1382 10.4493 5.21777C10.4822 5.29734 10.4992 5.38262 10.4992 5.46875C10.4992 5.55488 10.4822 5.64016 10.4493 5.71973C10.4163 5.7993 10.368 5.8716 10.3071 5.9325L7.46334 8.77625C7.40247 8.83721 7.33018 8.88556 7.25061 8.91856C7.17103 8.95155 7.08574 8.96853 6.99959 8.96853C6.91345 8.96853 6.82815 8.95155 6.74857 8.91856C6.669 8.88556 6.59671 8.83721 6.53584 8.77625L3.69209 5.9325C3.63119 5.8716 3.58288 5.7993 3.54992 5.71973C3.51696 5.64016 3.5 5.55488 3.5 5.46875C3.5 5.38262 3.51696 5.29734 3.54992 5.21777C3.58288 5.1382 3.63119 5.0659 3.69209 5.005C3.75299 4.9441 3.82529 4.89579 3.90486 4.86283C3.98443 4.82987 4.06972 4.81291 4.15584 4.81291C4.24197 4.81291 4.32725 4.82987 4.40682 4.86283C4.48639 4.89579 4.55869 4.9441 4.61959 5.005L6.34334 6.72788Z" fill="white"></path>
                                    </svg> Download </a> -->
                                    <a class="dropdown-itemm rename_nt" data-bs-toggle="modal" data-bs-target="#edit_fix{{$fix->id}}">
                                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.75 9.33323L6.41667 11.6666H12.25V9.33323H8.75ZM7.035 4.19406L1.75 9.47906V11.6666H3.9375L9.2225 6.38156L7.035 4.19406ZM10.9142 4.6899C11.1417 4.4624 11.1417 4.08323 10.9142 3.8674L9.54917 2.5024C9.4398 2.39389 9.29198 2.33301 9.13792 2.33301C8.98385 2.33301 8.83604 2.39389 8.72667 2.5024L7.65917 3.5699L9.84667 5.7574L10.9142 4.6899Z" fill="#8D8D8D"></path>
                                  </svg> Edit </a>
                                  </div>



                                  <a class="dropdown-itemm delet_nt" id="delete-{{ $fix->id }}">
                                  <form method="POST" action="{{ route('filefixed.delete', ['id' => $fix->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?')">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2 9.5V10.5H10V3.5L6 1.5L2 3.5V4.5M6.5 7H2" stroke="#707070" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M3.5 5.5L2 7L3.5 8.5" stroke="#707070" stroke-linecap="round" stroke-linejoin="round"/>
</svg> Asset Check-out </button>
                                                        </form> </a>
                                  <a class="dropdown-itemm Transfer">
                                  <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.5 2H2.5V10H9.5V4H7.5V2ZM1.5 1.496C1.5 1.222 1.7235 1 1.9995 1H8L10.5 3.5V10.4965C10.5005 10.5622 10.488 10.6273 10.4633 10.6881C10.4386 10.749 10.4021 10.8043 10.356 10.8511C10.3099 10.8978 10.2551 10.9351 10.1946 10.9606C10.1341 10.9862 10.0692 10.9995 10.0035 11H1.9965C1.86519 10.9991 1.73951 10.9465 1.64661 10.8537C1.55371 10.7609 1.50105 10.6353 1.5 10.504V1.496ZM6 5.5V4L8 6L6 8V6.5H4V5.5H6Z" fill="#707070"/>
</svg> Asset Transfer </a>
                                
                              </div>
                            </div>
</div>
</div>

                                  <!-- model start -->
                                  <div class="modal fade drop_coman_file have_title" id="edit_fix{{$fix->id}}" tabindex="-1" role="dialog" aria-labelledby="edit_fix{{$fix->id}}" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" style="font-weight:700">Edit Check-in</h5>
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
                                    <h3>Edit Check-in</h3>


                                    <form action="{{ route('upfixedsassetstore') }}" method="POST" enctype="multipart/form-data" class="upload-form rers_pages_hide edit_full_scrool"> 
                                      @csrf
                                               
                                      <div class="rers_pagesa">
										<div class="pagea">

                                    <div class="file-area">      
                                    <input type="file" class="dragfile" id="file" name="file"  >    
                         
  <div class="file-dummy">
    <div class="success">Great, your files are selected. Keep on.</div>
    <div class="default">
    <span class="upload_icon">
      
                          <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88"><title>file-upload</title><path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z"/></svg>
                          </span>  
                          Upload a file <span class="fille">Choose File</span>
  </div>
  </div>
  <br><div class="selected-file"></div>
</div> 
                          <span class="basic-file">Note:- file|mimes:pdf,doc,docx|max size:2048kb</span>  
                          <div class="doenload_previous">
                            <a href="{{ route('download-fixed-file', ['id' => $fix->id]) }}">Download Previous File</a>
</div>
                          <input  type="hidden" id="fixed_id" name="fixed_id" value="{{ $fix->id}}" >  
<hr class="cusrom_hr"/>
                          <div class="gropu_form">
                          <label for="fname">Asset Name <span class="red_star">*</span></label>
                           <input placeholder="Type" type="text" id="asset_name" name="asset_name" value="{{ $fix->asset_name}}" >
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Asset ID</label>
                           <input placeholder="Type" type="text" id="asset_id" name="asset_id" value="{{ $fix->asset_id}}">
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Location <span class="red_star">*</span></label>
                           <input placeholder="Type" type="text" id="loc" name="loc" value="{{ $fix->loc}}">
                          </div>

 
                          <div class="gropu_form test-areaa">
                          <label for="fname">Description</label>
                          <textarea name="description" > {{ $fix->description}}</textarea>
                          </div>



                          <div class="select_group row">
                          <div class="gropu_form col-sm-6">
                          <label for="con_type">Asset Category <span class="red_star">*</span></label>
  <select id="asset_category" name="asset_category" required>
  <option value="" disabled Selected>select</option>
  <option value="Volvo" {{ $fix->asset_category === 'Volvo' ? ' selected' : '' }}>Volvo</option>
    <option value="Saab" {{ $fix->asset_category === 'Saab' ? ' selected' : '' }}>Saab</option>
    <option value="Fiat" {{ $fix->asset_category === 'Fiat' ? ' selected' : '' }}>Fiat</option>
    <option value="Audi" {{ $fix->asset_category === 'Audi' ? ' selected' : '' }}>Audi</option>
  </select>
                          </div>

                          <div class="gropu_form col-sm-6">
                          <label for="Division">Asset Class <span class="red_star">*</span></label>
  <select id="Division" name="division" required>
  <option value="" disabled Selected>select</option>
  <option value="Volvo" {{ $fix->division === 'Volvo' ? ' selected' : '' }}>Volvo</option>
    <option value="Saab" {{ $fix->division === 'Saab' ? ' selected' : '' }}>Saab</option>
    <option value="Fiat" {{ $fix->division === 'Fiat' ? ' selected' : '' }}>Fiat</option>
    <option value="Audi" {{ $fix->division === 'Audi' ? ' selected' : '' }}>Audi</option>
  </select>
                          </div>
</div>

</div>

<div class="pagea">

<div class="gropu_form">
                          <label for="start">Date of Purchase <span class="red_star">*</span></label>
<input type="date" id="date_of_purchase" name="date_of_purchase"  value="{{ $fix->date_of_purchase}}"  />
                          </div>

                          
                          <div class="gropu_form">
                          <label for="start">Date Put to Use <span class="red_star">*</span></label>
<input type="date" id="date_put_to_use" name="date_put_to_use"  value="{{ $fix->date_put_to_use}}" />
                          </div>


                          <div class="gropu_form">
                          <label for="fname">Asset Life <span class="red_star">*</span></label>
                          <div class="input_year">
                           <input placeholder="0" type="number" id="asset_life" name="asset_life" value="{{ $fix->asset_life}}">
                           <label for="Years">Years</label>
</div>
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Asset Make <span class="red_star">*</span></label>
                           <input placeholder="Type" type="text" id="asset_make" name="asset_make" value="{{ $fix->asset_make}}">
                          </div>



                          <div class="gropu_form">
                          <label for="fname">Purchase Price <span class="red_star">*</span></label>
                          <div class="input_year">
                          <label for="Years">₹</label>
                           <input placeholder="Type" type="text" id="purchase_price" name="purchase_price" value="{{ $fix->purchase_price}}">
                          </div>
                          </div>
                          

                          <div class="gropu_form">
                          <label for="fname">AMC Contract</label>
                          <div class="search_nt">
                        <!-- <div class="svg_srch">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 14.75L10.25 10.25M1.25 6.5C1.25 7.18944 1.3858 7.87213 1.64963 8.50909C1.91347 9.14605 2.30018 9.7248 2.78769 10.2123C3.2752 10.6998 3.85395 11.0865 4.49091 11.3504C5.12787 11.6142 5.81056 11.75 6.5 11.75C7.18944 11.75 7.87213 11.6142 8.50909 11.3504C9.14605 11.0865 9.7248 10.6998 10.2123 10.2123C10.6998 9.7248 11.0865 9.14605 11.3504 8.50909C11.6142 7.87213 11.75 7.18944 11.75 6.5C11.75 5.81056 11.6142 5.12787 11.3504 4.49091C11.0865 3.85395 10.6998 3.2752 10.2123 2.78769C9.7248 2.30018 9.14605 1.91347 8.50909 1.64963C7.87213 1.3858 7.18944 1.25 6.5 1.25C5.81056 1.25 5.12787 1.3858 4.49091 1.64963C3.85395 1.91347 3.2752 2.30018 2.78769 2.78769C2.30018 3.2752 1.91347 3.85395 1.64963 4.49091C1.3858 5.12787 1.25 5.81056 1.25 6.5Z" stroke="#BFBFBF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</div>
                    <input type="search" class="" placeholder="Search" aria-controls="basic-1"> -->
                    <select id="amc_contract" name="amc_contract" required>
    <option value="" disabled selected>Select </option>
    @foreach($contractNamesArray as $contractName)
        <option value="{{ $contractName }}" {{ $fix->amc_contract === $contractName ? ' selected' : '' }}>{{ $contractName }}</option>
    @endforeach
</select>
</div>
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Insurance Contract</label>
                          <div class="search_nt">
                        <!-- <div class="svg_srch">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 14.75L10.25 10.25M1.25 6.5C1.25 7.18944 1.3858 7.87213 1.64963 8.50909C1.91347 9.14605 2.30018 9.7248 2.78769 10.2123C3.2752 10.6998 3.85395 11.0865 4.49091 11.3504C5.12787 11.6142 5.81056 11.75 6.5 11.75C7.18944 11.75 7.87213 11.6142 8.50909 11.3504C9.14605 11.0865 9.7248 10.6998 10.2123 10.2123C10.6998 9.7248 11.0865 9.14605 11.3504 8.50909C11.6142 7.87213 11.75 7.18944 11.75 6.5C11.75 5.81056 11.6142 5.12787 11.3504 4.49091C11.0865 3.85395 10.6998 3.2752 10.2123 2.78769C9.7248 2.30018 9.14605 1.91347 8.50909 1.64963C7.87213 1.3858 7.18944 1.25 6.5 1.25C5.81056 1.25 5.12787 1.3858 4.49091 1.64963C3.85395 1.91347 3.2752 2.30018 2.78769 2.78769C2.30018 3.2752 1.91347 3.85395 1.64963 4.49091C1.3858 5.12787 1.25 5.81056 1.25 6.5Z" stroke="#BFBFBF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</div>
                    <input type="search" class="" placeholder="Search" aria-controls="basic-1"> -->
                    <select id="insurance_contract" name="insurance_contract" required>
    <option value="" disabled selected>Select </option>
    @foreach($contractNamesArray as $contractName)
        <option value="{{ $contractName }}" {{ $fix->insurance_contract ===  $contractName ? ' selected' : '' }}>{{ $contractName }}</option>
    @endforeach
</select>
</div>
                          </div>
                          <hr class="cusrom_hr"/>

                          <div class="gropu_form ivoice-upload">
                          <label for="fname">Invoice <span class="red_star">*</span></label>

                          <div class="file-area">      
                                    <input type="file" class="dragfile" id="inovice_file" name="inovice_file" accept=".pdf,.doc,.docx" >    
                          
  <div class="file-dummy">
    <div class="success">Great, your files are selected. Keep on.</div>
    <div class="default">

    <span class="upload_icon">
      
                          <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88"><title>file-upload</title><path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z"/></svg>
                          </span>  
                          Upload Invoice
  </div>
  </div>
  <br><div class="selected-file"></div>
</div> 

                          </div>
                          <div class="doenload_previous">
                            <a href="{{ route('download-fixed1-file', ['id' => $fix->id]) }}">Download Previous Invoice</a>
</div>
<hr class="cusrom_hr"/>
                          <div class="gropu_form">
                          <label for="start">Invoice Date</label>
                          <input type="date" id="invoice_date" name="invoice_date" value="{{$fix->invoice_date}}" />
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Invoice Number</label>
                           <input placeholder="Type" type="text" id="in_no" value="{{$fix->	invoice_no}}"  name="in_no">
                          </div>


</div>

</div>

                          <div class="wrpa_bbtna">
                <div class="root_btn">                        
                          <button class="btn btn-primary"  style="border-radius:5px;" type="submit">Save</button>
</div>
</div>

                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
<!-- model end -->


<div class="description_bio">
    <span class="biio">Description</span>
    <div class="bio_conntent">
        <p>{{$fix->description}}</p>

    </div>
</div>
<div class="form_data">
    <div class="row align-dtat">
        <div class= "col-sm-12">
            <div class="for_roow">

 <div class="row">
 <div class="col-sm-6">
    <div class="form_group">
        <label>Asset Category</label>
        <span>{{$fix->asset_category}}</span>
</div>
</div>
<div class="col-sm-6">
<div class="form_group">
        <label>Asset Class</label>
        <span>{{$fix->asset_name}}</span>
</div>
</div>
</div>

<div class="row">
 <div class="col-sm-6">
 <div class="form_group">
        <label>Date of Purchase</label>
        <span>{{$fix->date_of_purchase}}</span>
</div>
</div>
<div class="col-sm-6">
<div class="form_group">
        <label>Date Put to Use</label>
        <span>{{$fix->date_put_to_use}}</span>
</div>
</div>
</div>

<div class="row">
 <div class="col-sm-6">
 <div class="form_group">
        <label>Asset Life</label>
        <span>{{$fix->asset_life}}</span>
</div>
</div>
<div class="col-sm-6">
<div class="form_group">
        <label>Asset make</label>
        <span>...</span>
</div>
</div>
</div>

<div class="row">
 <div class="col-sm-6">
 <div class="form_group">
        <label>Purchase Price</label>
        <span>₹ {{$fix->purchase_price}}</span>
</div>
</div>
<div class="col-sm-6">
<div class="form_group">
        <label></label>
        <span></span>
</div>
</div>
</div>



</div>
</div>

</div>
</div>

<div class="incove_nt">
  <div class="show_invoice">
    <a href="{{ route('download-fixed1-file', ['id' => $fix->id]) }}">INVOICE<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_1164_1888)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.03066 5.47006C8.17111 5.61069 8.25 5.80131 8.25 6.00006C8.25 6.19881 8.17111 6.38944 8.03066 6.53006L5.20266 9.35906C5.13299 9.4287 5.05029 9.48392 4.95928 9.5216C4.86827 9.55927 4.77073 9.57865 4.67223 9.57863C4.57373 9.5786 4.4762 9.55918 4.38521 9.52146C4.29422 9.48375 4.21154 9.42848 4.14191 9.35881C4.07228 9.28915 4.01705 9.20645 3.97937 9.11544C3.9417 9.02443 3.92232 8.92689 3.92235 8.82839C3.92237 8.72989 3.94179 8.63235 3.97951 8.54136C4.01722 8.45037 4.07249 8.3677 4.14216 8.29806L6.43966 6.00006L4.14166 3.70206C4.07 3.63291 4.01282 3.55018 3.97347 3.45869C3.93412 3.36721 3.91339 3.26881 3.91247 3.16922C3.91156 3.06964 3.93049 2.97087 3.96816 2.87868C4.00583 2.78649 4.06148 2.70273 4.13186 2.63227C4.20225 2.56182 4.28596 2.50609 4.37812 2.46834C4.47027 2.43058 4.56902 2.41156 4.6686 2.41238C4.76819 2.4132 4.86661 2.43384 4.95813 2.4731C5.04966 2.51237 5.13244 2.56946 5.20166 2.64106L8.03066 5.47006Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_1164_1888">
<rect width="12" height="12" fill="white" transform="matrix(0 -1 1 0 0 12)"/>
</clipPath>
</defs>
</svg>
</a>
</div>
<div class="date_data">
  <span><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M3.33333 5.83325C3.21528 5.83325 3.11639 5.79325 3.03667 5.71325C2.95694 5.63325 2.91694 5.53436 2.91667 5.41658C2.91667 5.29853 2.95667 5.19964 3.03667 5.11992C3.11667 5.0402 3.21556 5.0002 3.33333 4.99992C3.45139 4.99992 3.55042 5.03992 3.63042 5.11992C3.71042 5.19992 3.75028 5.29881 3.75 5.41658C3.75 5.53464 3.71 5.63367 3.63 5.71367C3.55 5.79367 3.45111 5.83353 3.33333 5.83325ZM5 5.83325C4.88194 5.83325 4.78306 5.79325 4.70333 5.71325C4.62361 5.63325 4.58361 5.53436 4.58333 5.41658C4.58333 5.29853 4.62333 5.19964 4.70333 5.11992C4.78333 5.0402 4.88222 5.0002 5 4.99992C5.11806 4.99992 5.21708 5.03992 5.29708 5.11992C5.37708 5.19992 5.41694 5.29881 5.41667 5.41658C5.41667 5.53464 5.37667 5.63367 5.29667 5.71367C5.21667 5.79367 5.11778 5.83353 5 5.83325ZM6.66667 5.83325C6.54861 5.83325 6.44972 5.79325 6.37 5.71325C6.29028 5.63325 6.25028 5.53436 6.25 5.41658C6.25 5.29853 6.29 5.19964 6.37 5.11992C6.45 5.0402 6.54889 5.0002 6.66667 4.99992C6.78472 4.99992 6.88375 5.03992 6.96375 5.11992C7.04375 5.19992 7.08361 5.29881 7.08333 5.41658C7.08333 5.53464 7.04333 5.63367 6.96333 5.71367C6.88333 5.79367 6.78444 5.83353 6.66667 5.83325ZM2.08333 9.16658C1.85417 9.16658 1.65806 9.08506 1.495 8.922C1.33194 8.75895 1.25028 8.5627 1.25 8.33325V2.49992C1.25 2.27075 1.33167 2.07464 1.495 1.91159C1.65833 1.74853 1.85444 1.66686 2.08333 1.66659H2.5V0.833252H3.33333V1.66659H6.66667V0.833252H7.5V1.66659H7.91667C8.14583 1.66659 8.34208 1.74825 8.50542 1.91159C8.66875 2.07492 8.75028 2.27103 8.75 2.49992V8.33325C8.75 8.56242 8.66847 8.75867 8.50542 8.922C8.34236 9.08533 8.14611 9.16686 7.91667 9.16658H2.08333ZM2.08333 8.33325H7.91667V4.16659H2.08333V8.33325ZM2.08333 3.33325H7.91667V2.49992H2.08333V3.33325Z" fill="#E5E5E5"/>
</svg>
{{$fix->invoice_date}}
</span>
  <span><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8.75 3.28117H7.03906L7.33633 1.6464C7.3586 1.52405 7.33136 1.39786 7.26059 1.2956C7.18983 1.19333 7.08134 1.12336 6.95898 1.10109C6.83663 1.07882 6.71044 1.10606 6.60818 1.17682C6.50591 1.24759 6.43595 1.35608 6.41367 1.47843L6.08594 3.28117H4.53906L4.83633 1.6464C4.84736 1.58582 4.84635 1.52366 4.83335 1.46347C4.82036 1.40328 4.79563 1.34623 4.76059 1.2956C4.72555 1.24496 4.68088 1.20172 4.62913 1.16835C4.57738 1.13497 4.51957 1.11212 4.45898 1.10109C4.3984 1.09006 4.33624 1.09107 4.27605 1.10407C4.21586 1.11706 4.15881 1.14178 4.10818 1.17682C4.05754 1.21186 4.0143 1.25653 3.98093 1.30828C3.94755 1.36003 3.9247 1.41785 3.91367 1.47843L3.58594 3.28117H1.875C1.75068 3.28117 1.63145 3.33055 1.54354 3.41846C1.45564 3.50637 1.40625 3.6256 1.40625 3.74992C1.40625 3.87424 1.45564 3.99347 1.54354 4.08137C1.63145 4.16928 1.75068 4.21867 1.875 4.21867H3.41563L3.13164 5.78117H1.25C1.12568 5.78117 1.00645 5.83055 0.918544 5.91846C0.830636 6.00637 0.78125 6.1256 0.78125 6.24992C0.78125 6.37424 0.830636 6.49347 0.918544 6.58137C1.00645 6.66928 1.12568 6.71867 1.25 6.71867H2.96094L2.66367 8.35343C2.65239 8.41413 2.65322 8.47646 2.6661 8.53684C2.67898 8.59722 2.70365 8.65446 2.73872 8.70527C2.77378 8.75609 2.81853 8.79948 2.87041 8.83295C2.92229 8.86642 2.98027 8.88931 3.04102 8.90031C3.06876 8.9049 3.09688 8.90686 3.125 8.90617C3.23477 8.9061 3.34103 8.86751 3.42527 8.79712C3.5095 8.72674 3.56636 8.62902 3.58594 8.52101L3.91406 6.71867H5.46094L5.16367 8.35343C5.15239 8.41413 5.15322 8.47646 5.1661 8.53684C5.17898 8.59722 5.20365 8.65446 5.23872 8.70527C5.27378 8.75609 5.31853 8.79948 5.37041 8.83295C5.42229 8.86642 5.48027 8.88931 5.54102 8.90031C5.56883 8.90558 5.59708 8.9082 5.62539 8.90812C5.73516 8.90805 5.84142 8.86946 5.92566 8.79907C6.00989 8.72869 6.06675 8.63098 6.08633 8.52296L6.41406 6.71867H8.125C8.24932 6.71867 8.36855 6.66928 8.45646 6.58137C8.54436 6.49347 8.59375 6.37424 8.59375 6.24992C8.59375 6.1256 8.54436 6.00637 8.45646 5.91846C8.36855 5.83055 8.24932 5.78117 8.125 5.78117H6.58437L6.86836 4.21867H8.75C8.87432 4.21867 8.99355 4.16928 9.08146 4.08137C9.16936 3.99347 9.21875 3.87424 9.21875 3.74992C9.21875 3.6256 9.16936 3.50637 9.08146 3.41846C8.99355 3.33055 8.87432 3.28117 8.75 3.28117ZM5.63164 5.78117H4.08437L4.36836 4.21867H5.91563L5.63164 5.78117Z" fill="#E5E5E5"/>
</svg> 
{{$fix->invoice_no}}
</span>
</div>
</div>


<div class="contract-wrap">

<div class="contract-iner">
  <div class="contact-title">
    <h2>AMC Contract</h2>
    <span>{{$fix->amc_contract}}</span>
</div>
<div class="start-end_date">
<div class="start-date_nt">
  <span>
  Start Date
  <b>{{$fix->date_of_purchase}}</b>
</span>
</div>
<div class="end-date_nt">
<span>
End Date
  <b>{{$fix->date_put_to_use}}</b>
</span>
</div>
</div>
</div>  


<div class="contract-iner">
  <div class="contact-title">
    <h2>Insurance Contract</h2>
    <span>{{$fix->insurance_contract}}</span>
</div>
<div class="start-end_date">
<div class="start-date_nt">
  <span>
  Start Date
  <b>{{$fix->date_of_purchase}}</b>
</span>
</div>
<div class="end-date_nt">
<span>
End Date
  <b>{{$fix->date_put_to_use}}</b>
</span>
</div>
</div>
</div>  
</div>
</div>
</div>
@endforeach

</div>
</div>
</div>

</div>
</div>


<!-- model start -->
<div class="modal fade drop_coman_file have_title" id="add_contract1" tabindex="-1" role="dialog" aria-labelledby="add_contract1" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" style="font-weight:700">Asset Check-in</h5>
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
                                    <h3>Asset Check-in</h3>


                                    <form action="{{ route('fixedsassetstore') }}" method="POST" enctype="multipart/form-data" class="upload-form rers_pages_hide"> 
                                      @csrf
                                               
                                      <div class="rers_pages">
										<div class="page page1">

                                    <div class="file-areaa">      
                                    <input type="file" class="dragfilee" id="filee" name="file"  required>    
                         
  <div class="file-dummyy">
    <div class="success">Great, your files are selected. Keep on.</div>
    <div class="default">
    <span class="upload_icon">
      
                          <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88"><title>file-upload</title><path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z"/></svg>
                          </span>  
                          Upload a file <span class="fillee">Choose File</span>
  </div>
  </div>
  <br><div class="selected-filee"></div>
</div> 
                          <span class="basic-file">Note:- file|mimes:pdf,doc,docx|max size:2048kb</span>    
<hr class="cusrom_hr"/>
                          <div class="gropu_form">
                          <label for="fname">Asset Name <span class="red_star">*</span></label>
                           <input placeholder="Type" type="text" id="asset_name" name="asset_name" required>
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Asset ID</label>
                           <input placeholder="Type" type="text" id="asset_id" name="asset_id" required>
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Location <span class="red_star">*</span></label>
                           <input placeholder="Type" type="text" id="loc" name="loc" required>
                          </div>

 
                          <div class="gropu_form test-areaa">
                          <label for="fname">Description <span class="red_star">*</span></label>
                          <textarea name="description" required> </textarea>
                          </div>



                          <div class="select_group row">
                          <div class="gropu_form col-sm-6">
                          <label for="con_type">Asset Category <span class="red_star">*</span></label>
  <select id="asset_category" name="asset_category" required>
  <option value="" disabled Selected>select</option>
    <option value="volvo">Volvo</option>
    <option value="saab">Saab</option>
    <option value="fiat">Fiat</option>
    <option value="audi">Audi</option>
  </select>
                          </div>

                          <div class="gropu_form col-sm-6">
                          <label for="Division">Asset Class <span class="red_star">*</span></label>
  <select id="Division" name="division" required>
  <option value="" disabled Selected>select</option>
    <option value="volvo">Volvo</option>
    <option value="saab">Saab</option>
    <option value="fiat">Fiat</option>
    <option value="audi">Audi</option>
  </select>
                          </div>
</div>

</div>

<div class="page page2 hidden">

<div class="gropu_form">
                          <label for="start">Date of Purchase <span class="red_star">*</span></label>
<input type="date" id="date_of_purchase" name="date_of_purchase"  required  />
                          </div>

                          
                          <div class="gropu_form">
                          <label for="start">Date Put to Use <span class="red_star">*</span></label>
<input type="date" id="date_put_to_use" name="date_put_to_use"  required />
                          </div>


                          <div class="gropu_form">
                          <label for="fname">Asset Life <span class="red_star">*</span></label>
                          <div class="input_year">
                           <input placeholder="0" type="number" id="asset_life" name="asset_life" required>
                           <label for="Years">Years</label>
</div>
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Asset Make <span class="red_star">*</span></label>
                           <input placeholder="Type" type="text" id="asset_make" name="asset_make" required>
                          </div>



                          <div class="gropu_form">
                          <label for="fname">Purchase Price <span class="red_star">*</span></label>
                          <div class="input_year">
                          <label for="Years">₹</label>
                           <input placeholder="Type" type="text" id="purchase_price" name="purchase_price" required>
                          </div>
                          </div>
                          

                          <div class="gropu_form">
                          <label for="fname">AMC Contract</label>
                          <div class="search_nt">
                        <!-- <div class="svg_srch">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 14.75L10.25 10.25M1.25 6.5C1.25 7.18944 1.3858 7.87213 1.64963 8.50909C1.91347 9.14605 2.30018 9.7248 2.78769 10.2123C3.2752 10.6998 3.85395 11.0865 4.49091 11.3504C5.12787 11.6142 5.81056 11.75 6.5 11.75C7.18944 11.75 7.87213 11.6142 8.50909 11.3504C9.14605 11.0865 9.7248 10.6998 10.2123 10.2123C10.6998 9.7248 11.0865 9.14605 11.3504 8.50909C11.6142 7.87213 11.75 7.18944 11.75 6.5C11.75 5.81056 11.6142 5.12787 11.3504 4.49091C11.0865 3.85395 10.6998 3.2752 10.2123 2.78769C9.7248 2.30018 9.14605 1.91347 8.50909 1.64963C7.87213 1.3858 7.18944 1.25 6.5 1.25C5.81056 1.25 5.12787 1.3858 4.49091 1.64963C3.85395 1.91347 3.2752 2.30018 2.78769 2.78769C2.30018 3.2752 1.91347 3.85395 1.64963 4.49091C1.3858 5.12787 1.25 5.81056 1.25 6.5Z" stroke="#BFBFBF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</div> -->
<select id="amc_contract" name="amc_contract" required>
    <option value="" disabled selected>Select </option>
    @foreach($contractNamesArray as $contractName)
        <option value="{{ $contractName }}">{{ $contractName }}</option>
    @endforeach
</select>
</div>
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Insurance Contract</label>
                          <div class="search_nt">
                        <!-- <div class="svg_srch">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 14.75L10.25 10.25M1.25 6.5C1.25 7.18944 1.3858 7.87213 1.64963 8.50909C1.91347 9.14605 2.30018 9.7248 2.78769 10.2123C3.2752 10.6998 3.85395 11.0865 4.49091 11.3504C5.12787 11.6142 5.81056 11.75 6.5 11.75C7.18944 11.75 7.87213 11.6142 8.50909 11.3504C9.14605 11.0865 9.7248 10.6998 10.2123 10.2123C10.6998 9.7248 11.0865 9.14605 11.3504 8.50909C11.6142 7.87213 11.75 7.18944 11.75 6.5C11.75 5.81056 11.6142 5.12787 11.3504 4.49091C11.0865 3.85395 10.6998 3.2752 10.2123 2.78769C9.7248 2.30018 9.14605 1.91347 8.50909 1.64963C7.87213 1.3858 7.18944 1.25 6.5 1.25C5.81056 1.25 5.12787 1.3858 4.49091 1.64963C3.85395 1.91347 3.2752 2.30018 2.78769 2.78769C2.30018 3.2752 1.91347 3.85395 1.64963 4.49091C1.3858 5.12787 1.25 5.81056 1.25 6.5Z" stroke="#BFBFBF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</div> -->
<select id="insurance_contract" name="insurance_contract" required>
    <option value="" disabled selected>Select </option>
    @foreach($contractNamesArray as $contractName)
        <option value="{{ $contractName }}">{{ $contractName }}</option>
    @endforeach
</select>
</div>
                          </div>
                          <hr class="cusrom_hr"/>

                          <!-- </div> -->

  <!-- <div class="page page3 hidden"> -->

                          <div class="gropu_form ivoice-upload">
                          <label for="fname">Invoice <span class="red_star">*</span></label>

                          <div class="file-areaa">      
                                    <input type="file" class="dragfilee" id="inovice_file" name="inovice_file" accept=".pdf,.doc,.docx" required>    
                          
  <div class="file-dummyy">
    <div class="success">Great, your files are selected. Keep on.</div>
    <div class="default">
    <span class="upload_icon">
      
                          <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88"><title>file-upload</title><path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z"/></svg>
                          </span>  
                          Upload Invoice
  </div>
  </div>
  <br><div class="selected-filee"></div>
</div> 
                          </div>

                          <div class="gropu_form">
                          <label for="start">Invoice Date</label>
                          <input type="date" id="invoice_date" name="invoice_date" required />
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Invoice Number</label>
                           <input placeholder="Type" type="text" id="invoice_no" name="invoice_no" required>
                          </div>


</div>

</div>

                          <div class="wrpa_bbtn">
                          <div class="next_pre">
                  <button type="button" id="backBtn" class="hidden">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="0.5" y="-0.5" width="29" height="29" rx="14.5" transform="matrix(1 0 0 -1 0 29)" stroke="black" />
                      <path d="M9.21345 15.5415H21.3339C21.4947 15.5415 21.6488 15.4776 21.7624 15.3639C21.8761 15.2502 21.9399 15.0959 21.9399 14.9351C21.9399 14.7742 21.8761 14.62 21.7624 14.5063C21.6488 14.3925 21.4947 14.3287 21.3339 14.3287H9.21345C9.05272 14.3287 8.89857 14.3925 8.78492 14.5063C8.67127 14.62 8.60742 14.7742 8.60742 14.9351C8.60742 15.0959 8.67127 15.2502 8.78492 15.3639C8.89857 15.4776 9.05272 15.5415 9.21345 15.5415Z" fill="black" />
                      <path d="M9.46402 14.9349L14.4904 9.90645C14.6042 9.79264 14.6681 9.63817 14.6681 9.47711C14.6681 9.31614 14.6042 9.16167 14.4904 9.04775C14.3766 8.93394 14.2222 8.87 14.0613 8.87C13.9004 8.87 13.746 8.93394 13.6322 9.04775L8.17804 14.5056C8.1216 14.562 8.07682 14.6289 8.04627 14.7026C8.01573 14.7762 8 14.8552 8 14.9349C8 15.0147 8.01573 15.0937 8.04627 15.1674C8.07682 15.2411 8.1216 15.308 8.17804 15.3643L13.6322 20.8222C13.746 20.936 13.9004 21 14.0613 21C14.2222 21 14.3766 20.936 14.4904 20.8222C14.6042 20.7083 14.6681 20.5538 14.6681 20.3928C14.6681 20.2318 14.6042 20.0773 14.4904 19.9635L9.46402 14.9349Z" fill="black" />
                    </svg>
                  </button>

                  <button type="button" id="nextBtn">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="29.5" y="29.5" width="29" height="29" rx="14.5" transform="rotate(180 29.5 29.5)" stroke="black" />
                      <path d="M20.7866 15.5415H8.66608C8.50532 15.5415 8.35124 15.4776 8.2376 15.3639C8.12386 15.2502 8.06006 15.0959 8.06006 14.9351C8.06006 14.7742 8.12386 14.62 8.2376 14.5063C8.35124 14.3925 8.50532 14.3287 8.66608 14.3287H20.7866C20.9473 14.3287 21.1014 14.3925 21.2151 14.5063C21.3287 14.62 21.3926 14.7742 21.3926 14.9351C21.3926 15.0959 21.3287 15.2502 21.2151 15.3639C21.1014 15.4776 20.9473 15.5415 20.7866 15.5415Z" fill="black" />
                      <path d="M20.536 14.9349L15.5096 9.90645C15.3958 9.79264 15.3319 9.63817 15.3319 9.47711C15.3319 9.31614 15.3958 9.16167 15.5096 9.04775C15.6234 8.93394 15.7778 8.87 15.9387 8.87C16.0996 8.87 16.254 8.93394 16.3678 9.04775L21.822 14.5056C21.8784 14.562 21.9232 14.6289 21.9537 14.7026C21.9843 14.7762 22 14.8552 22 14.9349C22 15.0147 21.9843 15.0937 21.9537 15.1674C21.9232 15.2411 21.8784 15.308 21.822 15.3643L16.3678 20.8222C16.254 20.936 16.0996 21 15.9387 21C15.7778 21 15.6234 20.936 15.5096 20.8222C15.3958 20.7083 15.3319 20.5538 15.3319 20.3928C15.3319 20.2318 15.3958 20.0773 15.5096 19.9635L20.536 14.9349Z" fill="black" />
                    </svg>
                  </button>
                </div>

                <div class="root_btn">                        
                          <button class="btn btn-primary"  style="border-radius:5px;" type="submit">Check-In</button>
</div>
</div>

                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
<!-- model end -->


<!-- Container-fluid start-->

        </div>
      </div>
    </div>

    @endsection
   
    <style>
          button.delete-button {
    background: transparent;
    border: none;
    display: inline-flex;
}
      .rers_pages_hide {
    padding: 0px;
    overflow: hidden;
}
 .rers_pages {
    display: flex;
}
.rers_pages .page {
    flex: 0 0 100%;
    transition: all 0.5s ease;
}
.rers_pages .page {
    margin: 0;
    opacity: 1;
}

.rers_pages .prev.hidden {
    margin-left: -100%;
    opacity: 0;
}
 .rers_pages  .next.hidden {
    margin-left: 0;
    opacity: 0;
}
.next_pre {
    display: block;
    text-align: end;
    padding: 20px 0px 0px;
}
.next_pre button {
    background: transparent;
    box-shadow: none;
    outline: none;
    border: 0;
    font-size: 16px;
    text-decoration: underline;
    color: #0066FF;
}
.next_pre button {
    background: transparent !important;
    box-shadow: none !IMPORTANT;
    outline: none;
    border: 0 !IMPORTANT;
    font-size: 16px !important;
    text-decoration: underline;
    color: #0066FF !IMPORTANT;
    padding: 0 !important;
    display: inline-block !IMPORTANT;
}

.next_pre button svg {
    width: 30px !IMPORTANT;
    height: 30px !important;
    opacity: 1 !important;
    margin: 0 !important;
}
.next_pre button svg path {
    fill: #0066FF;
}
.next_pre button svg rect {
    stroke: #0066FF;
}

.next_pre button.hidden {
    display: none !important;
}
.drop_coman_file.have_title .rers_pages .page .gropu_form.test-areaa {
    display: flex;
    gap: 0;
}

.drop_coman_file.have_title .rers_pages .page .gropu_form.test-areaa label {
    flex: 1;
    padding: 0;
}

.drop_coman_file.have_title .rers_pages .page .gropu_form.test-areaa textarea {
    flex: 2;
    width: 100%;
}
.wrpa_bbtn {
    display: flex;
    align-items: center;
    justify-content: end;
    gap: 0px 20px;
    padding: 20px 0px 0px;
}

.wrpa_bbtn .root_btn {
    padding: 0 !important;
}

.wrpa_bbtn .next_pre {
    padding: 0;
}
.wrpa_bbtn .root_btn {
    display: none !important;
}

.wrpa_bbtn.active .root_btn {
    display: block !IMPORTANT;
}

/****file upload css new for invoice only start*****/
.drop_coman_file .modal-content .modal-body .file-areaa {
    border: 0;
    width: 100%;
    padding: 0;
    min-height: unset;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    outline-offset: -2px;
}
.drop_coman_file .file-areaa input[type=file] {
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
.drop_coman_file .modal-content .modal-body .file-areaa .file-dummyy {
    background: transparent;
    border: 0;
    width: 100%;
    padding: 30px;
    padding-top: 10px;
    text-align: center;
    transition: background 0.3s ease-in-out;
}
.drop_coman_file .file-dummyy .default {
    font-weight: 600;
    color: #9f9f9f;
    font-size: 16px;
}
.drop_coman_file .modal-content .modal-body .file-dummyy .upload_icon {
    margin: 10px 0px 10px;
    display: flex;
    justify-content: center;
}
.drop_coman_file .file-areaa .upload_icon svg {
    position: relative;
    margin: 0;
    width: 30px;
    height: 30px;
    top: unset;
    fill: #9f9f9f;
}
.drop_coman_file .file-dummyy .default .fille {
    border-bottom: 1px solid #9f9f9f;
    display: inline-block;
    font-weight: 600;
    letter-spacing: 0;
}
.selected-filee {
    position: absolute;
    color: green;
    padding: 85px 0 0 0;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 200px;
}
.drop_coman_file.have_title .modal-content .gropu_form.ivoice-upload .file-areaa {
    width: 100%;
    flex: 2 !important;
}

.drop_coman_file.have_title .modal-content .gropu_form.ivoice-upload .file-areaa .file-dummyy {
    padding: 20px 0px 20px;
}

.drop_coman_file.have_title .modal-content .gropu_form.ivoice-upload .file-areaa .default {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
}

.drop_coman_file.have_title .modal-content .gropu_form.ivoice-upload .file-areaa .default .upload_icon svg {
    width: 22px;
    height: 22px;
}

.drop_coman_file.have_title .modal-content .gropu_form.ivoice-upload  .selected-filee {
    padding: 47px 0px 0px;
    font-size: 13px;
}
.drop_coman_file.have_title .modal-content .file-areaa {
    outline: 2px dashed #D2DBE5;
}
/****file upload css new for invoice only end*****/

      </style>
