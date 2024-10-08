@extends('user.includes.dashboard') @section('content')
<!-- jquery added by sk -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
 <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>

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
            <b><span class="greeting" id="greeting"></span><span class="greeting">, {{$user->name}}</span></b>
            Welcome to MillionDoxx!
          </h2>
        </div>
      </div>
      <div class="nav-right col-1 pull-right right-header p-0">

        <!-- Header Right Icon Start-->
        @include('user/includes.header-details')
        <div class="tic_tet nt_hhode">
          <a href="{{url('/user/tickting')}}">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M15.3181 5.66869L13.939 4.28963C13.8277 4.17986 13.6794 4.11577 13.5232 4.10998C13.367 4.1042 13.2143 4.15714 13.0953 4.25838C12.9114 4.41486 12.6755 4.49656 12.4343 4.4873C12.193 4.47804 11.9641 4.37849 11.7928 4.20838C11.6227 4.03709 11.5232 3.80819 11.514 3.56703C11.5047 3.32586 11.5864 3.09001 11.7428 2.90619C11.844 2.78711 11.8969 2.63442 11.8911 2.47824C11.8854 2.32205 11.8213 2.1737 11.7115 2.06244L10.3312 0.681813C10.2145 0.565388 10.0565 0.5 9.89166 0.5C9.72685 0.5 9.56877 0.565388 9.45213 0.681813L7.25369 2.87994C7.11796 3.01615 7.0156 3.18194 6.95463 3.36431C6.94275 3.39938 6.92296 3.43123 6.89678 3.45741C6.87061 3.48359 6.83875 3.50338 6.80369 3.51525C6.62124 3.57622 6.45543 3.6787 6.31931 3.81463L0.681813 9.45212C0.565388 9.56877 0.5 9.72685 0.5 9.89166C0.5 10.0565 0.565388 10.2145 0.681813 10.3312L2.06244 11.7102C2.1737 11.82 2.32205 11.8841 2.47824 11.8899C2.63442 11.8957 2.78711 11.8427 2.90619 11.7415C3.08959 11.5838 3.32583 11.5011 3.56757 11.5102C3.80931 11.5193 4.03869 11.6194 4.20974 11.7904C4.3808 11.9615 4.48089 12.1909 4.48997 12.4326C4.49905 12.6744 4.41643 12.9106 4.25869 13.094C4.15746 13.2131 4.10451 13.3658 4.1103 13.5219C4.11608 13.6781 4.18017 13.8265 4.28994 13.9377L5.669 15.3168C5.78565 15.4332 5.94372 15.4986 6.10853 15.4986C6.27334 15.4986 6.43141 15.4332 6.54806 15.3168L12.1856 9.67931C12.3214 9.54325 12.4239 9.37757 12.4849 9.19525C12.4968 9.16007 12.5166 9.12811 12.5428 9.10187C12.569 9.07563 12.601 9.05582 12.6362 9.044C12.8185 8.98302 12.9841 8.88065 13.1203 8.74494L15.3184 6.5465C15.4344 6.42986 15.4995 6.27203 15.4994 6.10753C15.4994 5.94303 15.4341 5.78524 15.3181 5.66869ZM8.1815 4.74213C8.13507 4.78857 8.07995 4.82541 8.01927 4.85054C7.9586 4.87568 7.89358 4.88861 7.82791 4.88861C7.76224 4.88861 7.69721 4.87568 7.63654 4.85054C7.57587 4.82541 7.52074 4.78857 7.47431 4.74213L7.11463 4.38244C7.02314 4.2882 6.97241 4.16174 6.9734 4.0304C6.97439 3.89907 7.02702 3.77339 7.11991 3.68054C7.2128 3.58768 7.3385 3.53511 7.46984 3.53418C7.60118 3.53325 7.72761 3.58404 7.82181 3.67556L8.1815 4.03494C8.22794 4.08137 8.26478 4.13649 8.28992 4.19716C8.31505 4.25783 8.32799 4.32286 8.32799 4.38853C8.32799 4.4542 8.31505 4.51923 8.28992 4.5799C8.26478 4.64057 8.22794 4.69569 8.1815 4.74213ZM9.5565 6.11713C9.46274 6.21082 9.33561 6.26346 9.20306 6.26346C9.07051 6.26346 8.94338 6.21082 8.84963 6.11713L8.50588 5.77338C8.4121 5.6796 8.35941 5.5524 8.35941 5.41978C8.35941 5.28716 8.4121 5.15997 8.50588 5.06619C8.59965 4.97241 8.72685 4.91972 8.85947 4.91972C8.99209 4.91972 9.11928 4.97241 9.21306 5.06619L9.55681 5.40994C9.60342 5.45637 9.6404 5.51153 9.66564 5.57228C9.69089 5.63302 9.7039 5.69815 9.70393 5.76394C9.70395 5.82972 9.691 5.89486 9.66581 5.95563C9.64062 6.01639 9.60369 6.07159 9.55713 6.11806L9.5565 6.11713ZM10.9315 7.49213C10.8851 7.53857 10.8299 7.57541 10.7693 7.60054C10.7086 7.62568 10.6436 7.63861 10.5779 7.63861C10.5122 7.63861 10.4472 7.62568 10.3865 7.60054C10.3259 7.57541 10.2707 7.53857 10.2243 7.49213L9.88056 7.14838C9.78908 7.05413 9.73835 6.92768 9.73934 6.79634C9.74033 6.665 9.79295 6.53933 9.88585 6.44647C9.97874 6.35362 10.1044 6.30105 10.2358 6.30012C10.3671 6.29919 10.4936 6.34997 10.5878 6.4415L10.9315 6.78525C10.9782 6.8316 11.0154 6.88672 11.0407 6.94745C11.0661 7.00818 11.0793 7.07333 11.0794 7.13914C11.0795 7.20496 11.0667 7.27016 11.0416 7.33101C11.0165 7.39185 10.9796 7.44713 10.9331 7.49369L10.9315 7.49213ZM12.3199 8.884C12.2735 8.93044 12.2184 8.96728 12.1577 8.99242C12.097 9.01755 12.032 9.03049 11.9663 9.03049C11.9007 9.03049 11.8356 9.01755 11.775 8.99242C11.7143 8.96728 11.6592 8.93044 11.6128 8.884L11.2553 8.52462C11.2078 8.47833 11.1701 8.42308 11.1442 8.36207C11.1184 8.30106 11.1049 8.23552 11.1045 8.16925C11.1042 8.10298 11.1171 8.03731 11.1424 7.97606C11.1677 7.91481 11.2049 7.85919 11.2518 7.81245C11.2988 7.76571 11.3546 7.72876 11.416 7.70377C11.4774 7.67879 11.5431 7.66625 11.6094 7.66688C11.6756 7.66752 11.7411 7.68133 11.802 7.7075C11.8629 7.73366 11.9179 7.77167 11.964 7.81931L12.3218 8.17837C12.3682 8.22483 12.405 8.27997 12.4302 8.34065C12.4553 8.40133 12.4682 8.46636 12.4681 8.53203C12.4681 8.5977 12.4551 8.66273 12.43 8.72338C12.4048 8.78404 12.368 8.83915 12.3215 8.88556L12.3199 8.884Z" fill="#525252" />
            </svg>
            Ticketing
          </a>
        </div>
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
          <span id="greting" class=""></span>
          Welcome to MillionDox!
        </h2>
        <div class="tic_tet">
          <a href="{{url('/user/tickting')}}">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M15.3181 5.66869L13.939 4.28963C13.8277 4.17986 13.6794 4.11577 13.5232 4.10998C13.367 4.1042 13.2143 4.15714 13.0953 4.25838C12.9114 4.41486 12.6755 4.49656 12.4343 4.4873C12.193 4.47804 11.9641 4.37849 11.7928 4.20838C11.6227 4.03709 11.5232 3.80819 11.514 3.56703C11.5047 3.32586 11.5864 3.09001 11.7428 2.90619C11.844 2.78711 11.8969 2.63442 11.8911 2.47824C11.8854 2.32205 11.8213 2.1737 11.7115 2.06244L10.3312 0.681813C10.2145 0.565388 10.0565 0.5 9.89166 0.5C9.72685 0.5 9.56877 0.565388 9.45213 0.681813L7.25369 2.87994C7.11796 3.01615 7.0156 3.18194 6.95463 3.36431C6.94275 3.39938 6.92296 3.43123 6.89678 3.45741C6.87061 3.48359 6.83875 3.50338 6.80369 3.51525C6.62124 3.57622 6.45543 3.6787 6.31931 3.81463L0.681813 9.45212C0.565388 9.56877 0.5 9.72685 0.5 9.89166C0.5 10.0565 0.565388 10.2145 0.681813 10.3312L2.06244 11.7102C2.1737 11.82 2.32205 11.8841 2.47824 11.8899C2.63442 11.8957 2.78711 11.8427 2.90619 11.7415C3.08959 11.5838 3.32583 11.5011 3.56757 11.5102C3.80931 11.5193 4.03869 11.6194 4.20974 11.7904C4.3808 11.9615 4.48089 12.1909 4.48997 12.4326C4.49905 12.6744 4.41643 12.9106 4.25869 13.094C4.15746 13.2131 4.10451 13.3658 4.1103 13.5219C4.11608 13.6781 4.18017 13.8265 4.28994 13.9377L5.669 15.3168C5.78565 15.4332 5.94372 15.4986 6.10853 15.4986C6.27334 15.4986 6.43141 15.4332 6.54806 15.3168L12.1856 9.67931C12.3214 9.54325 12.4239 9.37757 12.4849 9.19525C12.4968 9.16007 12.5166 9.12811 12.5428 9.10187C12.569 9.07563 12.601 9.05582 12.6362 9.044C12.8185 8.98302 12.9841 8.88065 13.1203 8.74494L15.3184 6.5465C15.4344 6.42986 15.4995 6.27203 15.4994 6.10753C15.4994 5.94303 15.4341 5.78524 15.3181 5.66869ZM8.1815 4.74213C8.13507 4.78857 8.07995 4.82541 8.01927 4.85054C7.9586 4.87568 7.89358 4.88861 7.82791 4.88861C7.76224 4.88861 7.69721 4.87568 7.63654 4.85054C7.57587 4.82541 7.52074 4.78857 7.47431 4.74213L7.11463 4.38244C7.02314 4.2882 6.97241 4.16174 6.9734 4.0304C6.97439 3.89907 7.02702 3.77339 7.11991 3.68054C7.2128 3.58768 7.3385 3.53511 7.46984 3.53418C7.60118 3.53325 7.72761 3.58404 7.82181 3.67556L8.1815 4.03494C8.22794 4.08137 8.26478 4.13649 8.28992 4.19716C8.31505 4.25783 8.32799 4.32286 8.32799 4.38853C8.32799 4.4542 8.31505 4.51923 8.28992 4.5799C8.26478 4.64057 8.22794 4.69569 8.1815 4.74213ZM9.5565 6.11713C9.46274 6.21082 9.33561 6.26346 9.20306 6.26346C9.07051 6.26346 8.94338 6.21082 8.84963 6.11713L8.50588 5.77338C8.4121 5.6796 8.35941 5.5524 8.35941 5.41978C8.35941 5.28716 8.4121 5.15997 8.50588 5.06619C8.59965 4.97241 8.72685 4.91972 8.85947 4.91972C8.99209 4.91972 9.11928 4.97241 9.21306 5.06619L9.55681 5.40994C9.60342 5.45637 9.6404 5.51153 9.66564 5.57228C9.69089 5.63302 9.7039 5.69815 9.70393 5.76394C9.70395 5.82972 9.691 5.89486 9.66581 5.95563C9.64062 6.01639 9.60369 6.07159 9.55713 6.11806L9.5565 6.11713ZM10.9315 7.49213C10.8851 7.53857 10.8299 7.57541 10.7693 7.60054C10.7086 7.62568 10.6436 7.63861 10.5779 7.63861C10.5122 7.63861 10.4472 7.62568 10.3865 7.60054C10.3259 7.57541 10.2707 7.53857 10.2243 7.49213L9.88056 7.14838C9.78908 7.05413 9.73835 6.92768 9.73934 6.79634C9.74033 6.665 9.79295 6.53933 9.88585 6.44647C9.97874 6.35362 10.1044 6.30105 10.2358 6.30012C10.3671 6.29919 10.4936 6.34997 10.5878 6.4415L10.9315 6.78525C10.9782 6.8316 11.0154 6.88672 11.0407 6.94745C11.0661 7.00818 11.0793 7.07333 11.0794 7.13914C11.0795 7.20496 11.0667 7.27016 11.0416 7.33101C11.0165 7.39185 10.9796 7.44713 10.9331 7.49369L10.9315 7.49213ZM12.3199 8.884C12.2735 8.93044 12.2184 8.96728 12.1577 8.99242C12.097 9.01755 12.032 9.03049 11.9663 9.03049C11.9007 9.03049 11.8356 9.01755 11.775 8.99242C11.7143 8.96728 11.6592 8.93044 11.6128 8.884L11.2553 8.52462C11.2078 8.47833 11.1701 8.42308 11.1442 8.36207C11.1184 8.30106 11.1049 8.23552 11.1045 8.16925C11.1042 8.10298 11.1171 8.03731 11.1424 7.97606C11.1677 7.91481 11.2049 7.85919 11.2518 7.81245C11.2988 7.76571 11.3546 7.72876 11.416 7.70377C11.4774 7.67879 11.5431 7.66625 11.6094 7.66688C11.6756 7.66752 11.7411 7.68133 11.802 7.7075C11.8629 7.73366 11.9179 7.77167 11.964 7.81931L12.3218 8.17837C12.3682 8.22483 12.405 8.27997 12.4302 8.34065C12.4553 8.40133 12.4682 8.46636 12.4681 8.53203C12.4681 8.5977 12.4551 8.66273 12.43 8.72338C12.4048 8.78404 12.368 8.83915 12.3215 8.88556L12.3199 8.884Z" fill="#525252" />
            </svg>
            Ticketing
          </a>
        </div>
      </div>

      <!-- first load animation dashboard pop start -->
      <div id="loading-overlay">
        <div class="loader-wrapper">
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"> </div>
          <div class="dot"></div>
        </div>
        <!-- Loader ends-->
      </div>



      @if($user->user_status == 0)
      <!-- organisation details pop start -->
      <button class="btn_command" style="border-radius:5px; display:none;" data-bs-toggle="modal" data-bs-target="#add_organistaion_details">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8.25 12V5.8875L6.3 7.8375L5.25 6.75L9 3L12.75 6.75L11.7 7.8375L9.75 5.8875V12H8.25ZM4.5 15C4.0875 15 3.7345 14.8533 3.441 14.5597C3.1475 14.2662 3.0005 13.913 3 13.5V11.25H4.5V13.5H13.5V11.25H15V13.5C15 13.9125 14.8533 14.2657 14.5597 14.5597C14.2662 14.8538 13.913 15.0005 13.5 15H4.5Z" fill="#7E7E7E" />
        </svg> Upload </button>

      <div class="modal fade drop_coman_file have_title user_orgniationn" id="add_organistaion_details" tabindex="-1" role="dialog" aria-labelledby="add_organistaion_details" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <!--<h5 class="modal-title" style="font-weight:700">Organisation Profile</h5>-->
              <!-- <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                                      <span aria-hidden="true">
                                        <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black" />
                                          <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black" />
                                        </svg>
                                      </span>
                                    </button> -->
            </div>
            <div class="modal-body">
              <!--<h3>Organisation Profile</h3>-->
              <div class="organion_profilee">
                  <div class="step_one_user">
                      <div class="steo_one_inn">
                          <div class="tick_bxo">
                              <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="16" cy="16" r="15" stroke="#5790FF" stroke-width="2"/>
<path d="M8.125 17.125L13.375 22.375L23.875 11.125" stroke="#5790FF" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                          </div>
                          <div class="tick_bo_text">
                              <h2>STEP 1</h2>
                              <span>Basic</span>
                          </div>
                      </div>
                      <div class="mail_go_box">
                          <span>Signed up with</span>
                          <strong>{{$user->email}}</strong>
                      </div>
                  </div>
                  
                  <div class="step_two_user">
                            <div class="steo_one_inn">
                          <div class="tick_bxo">
<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="16" cy="16" r="15" fill="#5790FF" stroke="white" stroke-width="2"/>
<circle cx="16" cy="16" r="9" fill="white"/>
</svg>
                          </div>
                          <div class="tick_bo_text">
                              <h2>STEP 2</h2>
                              <span>Organization*</span>
                          </div>
                      </div>
                      
                  </div>
              </div>

<div class="orgaing_formm">
    <div class="for_head">
        <h2>Enter organization details</h2>
        <span>STEP 2</span>
    </div>
              <form action="{{ route('updateuserprofile') }}" method="POST" enctype="multipart/form-data" class="upload-form">
                @csrf

<div class="image_upload_area">
    <div class="image_rouund">
        <div class="flow_imagge">
        <!--<img class="demo_image" src="../assets/images/Logo_profille.png" alt="img">-->
        <img class="demo_image" id="previewImage" src="../assets/images/Logo_profille.png" alt="Default Image">
        </div>
        <div class="iput_source">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 10.25V13.25C14.75 13.6478 14.592 14.0294 14.3107 14.3107C14.0294 14.592 13.6478 14.75 13.25 14.75H2.75C2.35218 14.75 1.97064 14.592 1.68934 14.3107C1.40804 14.0294 1.25 13.6478 1.25 13.25V10.25M11.75 5L8 1.25M8 1.25L4.25 5M8 1.25V10.25" stroke="#DFDFDF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
            <input type="hidden" id="user_id" name="user_id" value="{{$user->id}}">
           <input type="file" class="dragfile" id="profile_picture" name="profile_picture" >
            <input type="hidden" id="user_status" name="user_status" value="1">
        </div>
    </div>
</div>

                <div class="gropu_form">
                  <input placeholder="Company name" required type="text" id="name_of_the_business" name="name_of_the_business">
                </div>

                <div class="gropu_form">
                  <select id="legal_entity" name="legal_entity" required onchange="showInputField2()">
                    <option value="" disabled Selected>Legal Entity Type</option>
                    <option value="aop">AOP/ BOI</option>
                    <option value="Individuals">Individuals</option>
                    <option value="lc">Limited Company</option>
                    <option value="LLP">LLP</option>
                    <option value="opc">One-Person Company</option>
                    <option value="pf">Partnership firm</option>
                    <option value="Proprietor">Proprietor</option>
                    <option value="Trusts">Trusts</option>
                    <option value="plc">Private Limited Company</option>
                    <option value="Others">Others</option>
                  </select>
                </div>
                   <div class="gropu_form" id="other_legal_entitys" style="display: none;">
                  <label for="con_type">Enter Entity:</label>
                  <input type="text" id="other_legal_entitys" placeholder="Please specify designation" name="other_legal_entity">
                  <script>
                    function showInputField2() {
                      var select = document.getElementById("legal_entity");
                      var inputField = document.getElementById("other_legal_entitys");

                      if (select.value === "Others") {
                        inputField.style.display = "flex";
                      } else {
                        inputField.style.display = "none";
                      }
                    }
                  </script>
                </div>
                
                   <div class="gropu_form">
                  <select id="industry" name="industry" required onchange="showInputField1()">
                    <option value="" disabled Selected>Industry</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="Aggregator">Aggregator</option>
                    <option value="Automotive">Automotive</option>
                    <option value="Aviation">Aviation</option>
                    <option value="Baking">Baking</option>
                    <option value="Cement">Cement</option>
                    <option value="Chemicals">Chemicals</option>
                    <option value="Diary">Diary</option>
                    <option value="E-commerce">E-commerce</option>
                    <option value="FMCG">FMCG</option>
                    <option value="Food Industry">Food Industry</option>
                    <option value="Healthcare">Healthcare</option>
                    <option value="Iron&Steel">Iron & Steel</option>
                    <option value="IT">IT Industry</option>
                    <option value="Mining">Mining</option>
                    <option value="Poultry">Poultry</option>
                    <option value="Real Estate">Real Estate</option>
                    <option value="Textile">Textile</option>
                    <option value="Others">Others</option>
                  </select>
                </div>
                    <div class="gropu_form" id="other_industrys" style="display: none;">
                  <input type="text" id="other_industrys" placeholder="Please specify designation" name="other_industry">
                  <script>
                    function showInputField1() {
                      var select = document.getElementById("industry");
                      var inputField = document.getElementById("other_industrys");

                      if (select.value === "Others") {
                        inputField.style.display = "flex";
                      } else {
                        inputField.style.display = "none";
                      }
                    }
                  </script>
                </div>


              <div class="both_wraap">
                <div class="gropu_form">
<select id="Registered" name="Registered" required>
    <option value="" disabled selected>Select State/UT</option>
    <option value="Andhra Pradesh">Andhra Pradesh</option>
    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
    <option value="Assam">Assam</option>
    <option value="Bihar">Bihar</option>
    <option value="Chandigarh">Chandigarh</option>
    <option value="Chhattisgarh">Chhattisgarh</option>
    <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
    <option value="Delhi">Delhi</option>
    <option value="Goa">Goa</option>
    <option value="Gujarat">Gujarat</option>
    <option value="Haryana">Haryana</option>
    <option value="Himachal Pradesh">Himachal Pradesh</option>
    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
    <option value="Jharkhand">Jharkhand</option>
    <option value="Karnataka">Karnataka</option>
    <option value="Kerala">Kerala</option>
    <option value="Ladakh">Ladakh</option>
    <option value="Lakshadweep">Lakshadweep</option>
    <option value="Madhya Pradesh">Madhya Pradesh</option>
    <option value="Maharashtra">Maharashtra</option>
    <option value="Manipur">Manipur</option>
    <option value="Meghalaya">Meghalaya</option>
    <option value="Mizoram">Mizoram</option>
    <option value="Nagaland">Nagaland</option>
    <option value="Odisha">Odisha</option>
    <option value="Puducherry">Puducherry</option>
    <option value="Punjab">Punjab</option>
    <option value="Rajasthan">Rajasthan</option>
    <option value="Sikkim">Sikkim</option>
    <option value="Tamil Nadu">Tamil Nadu</option>
    <option value="Telangana">Telangana</option>
    <option value="Tripura">Tripura</option>
    <option value="Uttar Pradesh">Uttar Pradesh</option>
    <option value="Uttarakhand">Uttarakhand</option>
    <option value="West Bengal">West Bengal</option>
</select>

                </div>
                  <div class="gropu_form">
                  <input id="email" type="email" name="backupemail" required="" autocomplete="email" placeholder="Secondary E-mail">
                </div>
                </div>
                
                
                 <div class="both_wraap">
                <div class="gropu_form">
                  <select id="employees" name="employees" required>
                    <option value="" disabled Selected>Employee count</option>
                    <option value="0-5">0-5</option>
                    <option value="5-10">5-10</option>
                    <option value="10-25">10-25</option>
                    <option value="25-50">25-50</option>
                    <option value="50-100">50-100</option>
                    <option value="more than 100">more than 100</option>
                  </select>
                </div>
                   <div class="gropu_form fild_ntt form-group">
                  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
                  <input id="phone" class="form-control @error('phone') is-invalid @enderror" type="tel" pattern="[2-9]{1}[0-9]{9}" title="Phone number with 2-9 and remaing 9 digit with 0-9" placeholder="Contact no" name="phone" value="{{ old('phone') }}" required autocomplete="phone"> @error('phone') <span class="invalid-feedback" role="alert">

                    <strong>{{ $message }}</strong>
                  </span> @enderror
                  <script>
                    const phoneInputField = document.querySelector("#phone");
                    const phoneInput = window.intlTelInput(phoneInputField, {
                      utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                      initialCountry: "in" // Set initial country to India
                    });
                  </script>
                </div>
                 </div>



                <div class="root_btn">
                  <button type="submit" class="btn btn-primary btn-block btn-square" style="border-radius:5px;">Next <span>
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M14.0625 9.5625L2.8125 9.5625C2.66332 9.5625 2.52024 9.50324 2.41475 9.39775C2.30926 9.29226 2.25 9.14918 2.25 9C2.25 8.85082 2.30926 8.70774 2.41475 8.60225C2.52024 8.49676 2.66332 8.4375 2.8125 8.4375L14.0625 8.4375C14.2117 8.4375 14.3548 8.49676 14.4602 8.60225C14.5657 8.70774 14.625 8.85082 14.625 9C14.625 9.14918 14.5657 9.29226 14.4602 9.39775C14.3548 9.50324 14.2117 9.5625 14.0625 9.5625Z" fill="white"></path>
                          <path d="M13.8296 8.99999L9.16422 4.33574C9.0586 4.23012 8.99926 4.08686 8.99926 3.93749C8.99926 3.78812 9.0586 3.64486 9.16422 3.53924C9.26984 3.43362 9.4131 3.37428 9.56247 3.37428C9.71184 3.37428 9.8551 3.43362 9.96072 3.53924L15.0232 8.60174C15.0756 8.65399 15.1172 8.71607 15.1455 8.7844C15.1739 8.85274 15.1885 8.926 15.1885 8.99999C15.1885 9.07398 15.1739 9.14724 15.1455 9.21558C15.1172 9.28392 15.0756 9.34599 15.0232 9.39824L9.96072 14.4607C9.8551 14.5664 9.71184 14.6257 9.56247 14.6257C9.4131 14.6257 9.26984 14.5664 9.16422 14.4607C9.0586 14.3551 8.99926 14.2119 8.99926 14.0625C8.99926 13.9131 9.0586 13.7699 9.16422 13.6642L13.8296 8.99999Z" fill="white"></path>
                        </svg>
                      </span>
                    </button>
                    
                </div>


              </form>
</div>

            </div>
          </div>
        </div>
      </div>


      <!-- organisation done pop end -->
      @elseif($user->user_status == "1" && $user->user_onboard == "0")
      <button class="btn_command " style="border-radius:5px; display:none;" data-bs-toggle="modal" data-bs-target="#aniation_dash_status">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8.25 12V5.8875L6.3 7.8375L5.25 6.75L9 3L12.75 6.75L11.7 7.8375L9.75 5.8875V12H8.25ZM4.5 15C4.0875 15 3.7345 14.8533 3.441 14.5597C3.1475 14.2662 3.0005 13.913 3 13.5V11.25H4.5V13.5H13.5V11.25H15V13.5C15 13.9125 14.8533 14.2657 14.5597 14.5597C14.2662 14.8538 13.913 15.0005 13.5 15H4.5Z" fill="#7E7E7E" />
        </svg> Upload </button>
      <div class="modal fade show" id="aniation_dash_status" tabindex="-1" role="dialog" aria-labelledby="aniation_dash_status" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body">

<div class="onbard_tick">
    <div class="image_onbarrd">
        <img src="../assets/images/tick_onboard.png" alt="img">
    </div>
    <div class="text_onboard">
        <h2>
            Done!👏 <br>We’re glad to have you onboard...
        </h2>
    </div>
</div>
<div class="slip_go_head">
              <button class="btn_command close" style="border-radius:5px;" id="skip_bttn">Skip</button>
                  <a id="skip_bttna"><svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M12.9984 3.40039C12.9984 4.19604 12.6824 4.9591 12.1198 5.52171C11.5571 6.08432 10.7941 6.40039 9.99844 6.40039C9.20279 6.40039 8.43973 6.08432 7.87712 5.52171C7.31451 4.9591 6.99844 4.19604 6.99844 3.40039C6.99844 2.60474 7.31451 1.84168 7.87712 1.27907C8.43973 0.716461 9.20279 0.400391 9.99844 0.400391C10.7941 0.400391 11.5571 0.716461 12.1198 1.27907C12.6824 1.84168 12.9984 2.60474 12.9984 3.40039ZM18.9984 4.00039C18.9984 4.63691 18.7456 5.24736 18.2955 5.69745C17.8454 6.14753 17.235 6.40039 16.5984 6.40039C15.9619 6.40039 15.3515 6.14753 14.9014 5.69745C14.4513 5.24736 14.1984 4.63691 14.1984 4.00039C14.1984 3.36387 14.4513 2.75342 14.9014 2.30333C15.3515 1.85325 15.9619 1.60039 16.5984 1.60039C17.235 1.60039 17.8454 1.85325 18.2955 2.30333C18.7456 2.75342 18.9984 3.36387 18.9984 4.00039ZM3.39844 6.40039C4.03496 6.40039 4.64541 6.14753 5.09549 5.69745C5.54558 5.24736 5.79844 4.63691 5.79844 4.00039C5.79844 3.36387 5.54558 2.75342 5.09549 2.30333C4.64541 1.85325 4.03496 1.60039 3.39844 1.60039C2.76192 1.60039 2.15147 1.85325 1.70138 2.30333C1.25129 2.75342 0.998437 3.36387 0.998437 4.00039C0.998437 4.63691 1.25129 5.24736 1.70138 5.69745C2.15147 6.14753 2.76192 6.40039 3.39844 6.40039ZM5.19844 9.10039C5.19844 8.27239 5.87044 7.60039 6.69844 7.60039H13.2984C13.6493 7.60022 13.9892 7.72308 14.2589 7.9476C14.5286 8.17211 14.711 8.48407 14.7744 8.82919C13.5821 8.94217 12.4429 9.37747 11.4791 10.0885C10.5152 10.7994 9.76303 11.7593 9.30308 12.8652C8.84312 13.971 8.69276 15.1812 8.86811 16.366C9.04345 17.5508 9.53789 18.6656 10.2984 19.5908C9.64412 19.6318 8.98835 19.5383 8.37156 19.3161C7.75477 19.0939 7.19003 18.7477 6.71218 18.2988C6.23433 17.85 5.85349 17.308 5.59314 16.7063C5.3328 16.1046 5.19847 15.456 5.19844 14.8004V9.10039ZM15.9852 8.82559C17.352 8.94559 18.5988 9.48319 19.5984 10.3088V9.10039C19.5984 8.27239 18.9264 7.60039 18.0984 7.60039H15.5436C15.7836 7.95799 15.9396 8.37559 15.984 8.82559M3.99844 9.10039C3.99844 8.54479 4.16644 8.02999 4.45324 7.60039H1.89844C1.07044 7.60039 0.398438 8.27239 0.398438 9.10039V13.6004C0.398382 14.1141 0.508284 14.6219 0.72076 15.0897C0.933235 15.5574 1.24336 15.9743 1.6303 16.3122C2.01724 16.6502 2.47203 16.9014 2.96412 17.049C3.4562 17.1966 3.97417 17.2372 4.48324 17.168C4.16272 16.4198 3.99778 15.6143 3.99844 14.8004V9.10039ZM20.7984 15.4004C20.7984 16.8326 20.2295 18.2061 19.2168 19.2188C18.2041 20.2315 16.8306 20.8004 15.3984 20.8004C13.9663 20.8004 12.5928 20.2315 11.5801 19.2188C10.5674 18.2061 9.99844 16.8326 9.99844 15.4004C9.99844 13.9682 10.5674 12.5947 11.5801 11.582C12.5928 10.5693 13.9663 10.0004 15.3984 10.0004C16.8306 10.0004 18.2041 10.5693 19.2168 11.582C20.2295 12.5947 20.7984 13.9682 20.7984 15.4004ZM15.9984 13.0004C15.9984 12.8413 15.9352 12.6886 15.8227 12.5761C15.7102 12.4636 15.5576 12.4004 15.3984 12.4004C15.2393 12.4004 15.0867 12.4636 14.9742 12.5761C14.8616 12.6886 14.7984 12.8413 14.7984 13.0004V14.8004H12.9984C12.8393 14.8004 12.6867 14.8636 12.5742 14.9761C12.4617 15.0886 12.3984 15.2413 12.3984 15.4004C12.3984 15.5595 12.4617 15.7121 12.5742 15.8247C12.6867 15.9372 12.8393 16.0004 12.9984 16.0004H14.7984V17.8004C14.7984 17.9595 14.8616 18.1121 14.9742 18.2247C15.0867 18.3372 15.2393 18.4004 15.3984 18.4004C15.5576 18.4004 15.7102 18.3372 15.8227 18.2247C15.9352 18.1121 15.9984 17.9595 15.9984 17.8004V16.0004H17.7984C17.9576 16.0004 18.1102 15.9372 18.2227 15.8247C18.3352 15.7121 18.3984 15.5595 18.3984 15.4004C18.3984 15.2413 18.3352 15.0886 18.2227 14.9761C18.1102 14.8636 17.9576 14.8004 17.7984 14.8004H15.9984V13.0004Z" fill="white"/>
</svg>
 Add your team
 <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.175 11L6.0865 5.9135L1 1.0015" stroke="white" stroke-width="1.66"/>
</svg>
 </a>
</div>

            </div>
          </div>
        </div>
      </div>
      
      

      <!-- organisation details pop end -->
      @elseif($user->user_status == "1" && $user->video_status == "0" && $user->user_onboard == "1")
      <button class="btn_command " style="border-radius:5px; display:none;" data-bs-toggle="modal" data-bs-target="#aniation_dash">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8.25 12V5.8875L6.3 7.8375L5.25 6.75L9 3L12.75 6.75L11.7 7.8375L9.75 5.8875V12H8.25ZM4.5 15C4.0875 15 3.7345 14.8533 3.441 14.5597C3.1475 14.2662 3.0005 13.913 3 13.5V11.25H4.5V13.5H13.5V11.25H15V13.5C15 13.9125 14.8533 14.2657 14.5597 14.5597C14.2662 14.8538 13.913 15.0005 13.5 15H4.5Z" fill="#7E7E7E" />
        </svg> Upload </button>
      <div class="modal fade show" id="aniation_dash" tabindex="-1" role="dialog" aria-labelledby="aniation_dash" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" style="font-weight:700"></h5>
              <button class="btn_command close" style="border-radius:5px;" id="videobtn">
                <span aria-hidden="true">
                  <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black" />
                    <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black" />
                  </svg>
                </span>
              </button>
            </div>
            <div class="modal-body">

              <iframe width="1903" height="784" src="https://www.youtube.com/embed/NqWP-pl1CfQ?autoplay=1&mute=1&loop=1&playlist=NqWP-pl1CfQ&modestbranding=1&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>

            </div>
          </div>
        </div>
      </div>


      <!-- first load animation dashboard pop start -->
      @endif

      <!-- Include this script in your HTML file -->
      <script>
        document.getElementById('videobtn').addEventListener('click', function() {
          var csrfTokenElement = document.head.querySelector('meta[name="csrf-token"]');
          if (csrfTokenElement) {
            var csrfToken = csrfTokenElement.content;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '{{ route("updateVideoStatus") }}', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            xhr.onreadystatechange = function() {
              if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                  console.log('Video status updated successfully');
                  // Reload the page after successfully updating the status
                  window.location.reload();
                } else {
                  console.error('Failed to update video status');
                }
              }
            };
            xhr.send(JSON.stringify({
              video_status: 1
            }));
          } else {
            console.error('CSRF token meta tag not found');
          }
        });
      </script>
      
            <script>
        document.getElementById('skip_bttn').addEventListener('click', function() {
          var csrfTokenElement = document.head.querySelector('meta[name="csrf-token"]');
          if (csrfTokenElement) {
            var csrfToken = csrfTokenElement.content;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '{{ route("updateskipdemo") }}', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            xhr.onreadystatechange = function() {
              if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                  console.log('skip demo onbaord status updated successfully');
                  // Reload the page after successfully updating the status
                  window.location.reload();
                } else {
                  console.error('Failed to update skip demo onbaord status');
                }
              }
            };
            xhr.send(JSON.stringify({
              user_onboard: 1
            }));
          } else {
            console.error('CSRF token meta tag not found');
          }
        });
      </script>
      
      
      
      <script>
        document.getElementById('skip_bttna').addEventListener('click', function() {
          var csrfTokenElement = document.head.querySelector('meta[name="csrf-token"]');
          if (csrfTokenElement) {
            var csrfToken = csrfTokenElement.content;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '{{ route("updateskipdemo") }}', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            xhr.onreadystatechange = function() {
              if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                  console.log('skip demo onbaord status updated successfully');
                  // Reload the page after successfully updating the status
                  window.location.href = '{{ url("/user/rolemanagement") }}';
                //   window.location.reload();
                
                // Use sessionStorage to indicate that the previous page should be reloaded
                sessionStorage.setItem('reloadPreviousPage', 'true');
                var user_onboard_local = 1;
                console.log(user_onboard_local);
                        
                } else {
                  console.error('Failed to update skip demo onbaord status');
                }
              }
            };
            xhr.send(JSON.stringify({
              user_onboard: 1
            }));
          } else {
            console.error('CSRF token meta tag not found');
          }
        });
        
        // Check if the previous page should be reloaded
        if (sessionStorage.getItem('reloadPreviousPage') === 'true') {
            sessionStorage.removeItem('reloadPreviousPage'); // Remove the flag after checking
            window.location.reload(); // Reload the current page
        }
      </script>
      





      <!-- Container-fluid start-->

      <!-- Container-fluid banner start-->
      <div class="container-fluid  dash-banner_ain">
        <div class="row">
          <div class="col-sm-12">

            <div class="mmaiin_wallet_wrap">

              <!--repeat div start-->
              <div class="mmaiin_wallet">
                <div class="loker_image">
                  <img src="../assets/images/dashobard_banner_1.png" alt="img">
                </div>
                <div class="loker_text" style="display:none;">
                  <h2>Ditch the Ordinary!</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                </div>
              </div>
              <!--repeat div end-->

              <!--repeat div start-->
              <!--<div class="mmaiin_wallet">-->
              <!--  <div class="loker_image">-->
              <!--    <img src="../assets/images/dashobard_banner_2.png" alt="img">-->
              <!--  </div>-->
              <!--  <div class="loker_text" style="display:none;">-->
              <!--    <h2>Ditch the Ordinary!</h2>-->
              <!--    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>-->
              <!--  </div>-->
              <!--</div>-->
              <!--repeat div end-->

              <!--repeat div start-->
              <div class="mmaiin_wallet">
                <div class="loker_image">
                  <img src="../assets/images/dashobard_banner_3.png" alt="img">
                </div>
                <div class="loker_text" style="display:none;">
                  <h2>Ditch the Ordinary!</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                </div>
              </div>
              <!--repeat div end-->

              <!--repeat div start-->
              <div class="mmaiin_wallet">
                <div class="loker_image">
                  <img src="../assets/images/dashobard_banner_4.png" alt="img">
                </div>
                <div class="loker_text" style="display:none;">
                  <h2>Ditch the Ordinary!</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                </div>
              </div>
              <!--repeat div end-->



            </div>

          </div>
        </div>
      </div>

      <!-- Container-fluid banner start-->


      <div class="container-fluid  nt_dashboard_head">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <div class="head_profile nt_profile">
              <div class="left_profile">
                <h2><span>Profile Completion</span>0%</h2>
              </div>
              <div class="right_pro_icon">
                <div id="wrapper_progress" class="center">
                  <!--<svg class="progresss" data-progresss="65" x="0px" y="0px" viewBox="0 0 80 80">-->
                  <!--  <path class="track" d="M5,40a35,35 0 1,0 70,0a35,35 0 1,0 -70,0" />-->
                  <!--  <path class="fill" d="M5,40a35,35 0 1,0 70,0a35,35 0 1,0 -70,0" />-->
                  <!--</svg>-->
                  
                  <svg class="progresss" data-progresss="0" x="0px" y="0px" viewBox="0 0 80 80">
    <path class="track" d="M5,40a35,35 0 1,0 70,0a35,35 0 1,0 -70,0" />
    <path class="fill" d="M5,40a35,35 0 1,0 70,0a35,35 0 1,0 -70,0" />
</svg>
                  <span class="span_dott"></span>
                </div>

              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6">
            <div class="head_profile key">
              <div class="left_profile">
                <h2><span>Credential Repository</span>View all</h2>
              </div>
              <div class="right_pro_icon">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M17.4994 34.615C18.7827 34.615 19.8727 34.1667 20.7694 33.27C21.666 32.3717 22.1144 31.2817 22.1144 30C22.1144 28.7183 21.666 27.6283 20.7694 26.73C19.871 25.8333 18.781 25.385 17.4994 25.385C16.2177 25.385 15.1277 25.8333 14.2294 26.73C13.3327 27.6283 12.8844 28.7183 12.8844 30C12.8844 31.2817 13.3327 32.3717 14.2294 33.27C15.1277 34.1667 16.2177 34.615 17.4994 34.615ZM17.4994 41.8275C14.166 41.8275 11.3619 40.6892 9.08687 38.4125C6.81021 36.1375 5.67188 33.3333 5.67188 30C5.67188 26.6667 6.81021 23.8625 9.08687 21.5875C11.3619 19.3108 14.166 18.1725 17.4994 18.1725C20.3294 18.1725 22.7802 18.9708 24.8519 20.5675C26.9252 22.1642 28.2535 24.0583 28.8369 26.25H51.4569L55.1919 29.985L48.9919 36.5725L44.4219 33.125L39.8544 36.73L35.9619 33.75H28.8369C28.2435 35.98 26.9035 37.8842 24.8169 39.4625C22.7302 41.0392 20.291 41.8275 17.4994 41.8275Z" fill="url(#paint0_linear_78_3773)" />
                  <defs>
                    <linearGradient id="paint0_linear_78_3773" x1="14.15" y1="18.1725" x2="56.5655" y2="34.0301" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#81ACFF" />
                      <stop offset="0.704835" stop-color="#5790FF" />
                    </linearGradient>
                  </defs>
                </svg>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6">
              @if($user->View_Exception_Reports == 1)
            <div class="head_profile bell">
              <div class="left_profile">
                <h2><span>Exception Reporting</span>
                  @if($user->View_Exception_Reports == 1)
                0
                @else
                Not Authorized
                @endif
                </h2>
              </div>
              <div class="right_pro_icon">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M20 1.66663C19.5222 1.66656 19.05 1.76921 18.6154 1.9676C18.1807 2.166 17.7938 2.45551 17.4809 2.81652C17.1679 3.17753 16.9362 3.6016 16.8015 4.05998C16.6668 4.51837 16.6322 5.00036 16.7 5.47329C14.2844 6.1865 12.1643 7.66199 10.6563 9.67941C9.14836 11.6968 8.33347 14.1479 8.33333 16.6666V30H6.66667C6.22464 30 5.80072 30.1756 5.48816 30.4881C5.17559 30.8007 5 31.2246 5 31.6666C5 32.1087 5.17559 32.5326 5.48816 32.8451C5.80072 33.1577 6.22464 33.3333 6.66667 33.3333H33.3333C33.7754 33.3333 34.1993 33.1577 34.5118 32.8451C34.8244 32.5326 35 32.1087 35 31.6666C35 31.2246 34.8244 30.8007 34.5118 30.4881C34.1993 30.1756 33.7754 30 33.3333 30H31.6667V16.6666C31.6665 14.1479 30.8516 11.6968 29.3437 9.67941C27.8357 7.66199 25.7156 6.1865 23.3 5.47329C23.3678 5.00036 23.3332 4.51837 23.1985 4.05998C23.0638 3.6016 22.8321 3.17753 22.5191 2.81652C22.2062 2.45551 21.8193 2.166 21.3846 1.9676C20.95 1.76921 20.4778 1.66656 20 1.66663ZM23.3333 36.6666C23.3333 37.1087 23.1577 37.5326 22.8452 37.8451C22.5326 38.1577 22.1087 38.3333 21.6667 38.3333H18.3333C17.8913 38.3333 17.4674 38.1577 17.1548 37.8451C16.8423 37.5326 16.6667 37.1087 16.6667 36.6666C16.6667 36.2246 16.8423 35.8007 17.1548 35.4881C17.4674 35.1755 17.8913 35 18.3333 35H21.6667C22.1087 35 22.5326 35.1755 22.8452 35.4881C23.1577 35.8007 23.3333 36.2246 23.3333 36.6666Z" fill="url(#paint0_linear_78_3775)" />
                  <defs>
                    <linearGradient id="paint0_linear_78_3775" x1="10.1362" y1="1.66663" x2="38.8116" y2="5.85665" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#81ACFF" />
                      <stop offset="0.704835" stop-color="#5790FF" />
                    </linearGradient>
                  </defs>
                </svg>
              </div>
            </div>
            
            @else
            
                        <div class="head_profile bell accress_denied_blur">
              <div class="left_profile">
                <h2><span>Exception Reporting</span>
                  @if($user->View_Exception_Reports == 1)
                0
                @else
                Not Authorized
                @endif
                </h2>
              </div>
              <div class="right_pro_icon">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M20 1.66663C19.5222 1.66656 19.05 1.76921 18.6154 1.9676C18.1807 2.166 17.7938 2.45551 17.4809 2.81652C17.1679 3.17753 16.9362 3.6016 16.8015 4.05998C16.6668 4.51837 16.6322 5.00036 16.7 5.47329C14.2844 6.1865 12.1643 7.66199 10.6563 9.67941C9.14836 11.6968 8.33347 14.1479 8.33333 16.6666V30H6.66667C6.22464 30 5.80072 30.1756 5.48816 30.4881C5.17559 30.8007 5 31.2246 5 31.6666C5 32.1087 5.17559 32.5326 5.48816 32.8451C5.80072 33.1577 6.22464 33.3333 6.66667 33.3333H33.3333C33.7754 33.3333 34.1993 33.1577 34.5118 32.8451C34.8244 32.5326 35 32.1087 35 31.6666C35 31.2246 34.8244 30.8007 34.5118 30.4881C34.1993 30.1756 33.7754 30 33.3333 30H31.6667V16.6666C31.6665 14.1479 30.8516 11.6968 29.3437 9.67941C27.8357 7.66199 25.7156 6.1865 23.3 5.47329C23.3678 5.00036 23.3332 4.51837 23.1985 4.05998C23.0638 3.6016 22.8321 3.17753 22.5191 2.81652C22.2062 2.45551 21.8193 2.166 21.3846 1.9676C20.95 1.76921 20.4778 1.66656 20 1.66663ZM23.3333 36.6666C23.3333 37.1087 23.1577 37.5326 22.8452 37.8451C22.5326 38.1577 22.1087 38.3333 21.6667 38.3333H18.3333C17.8913 38.3333 17.4674 38.1577 17.1548 37.8451C16.8423 37.5326 16.6667 37.1087 16.6667 36.6666C16.6667 36.2246 16.8423 35.8007 17.1548 35.4881C17.4674 35.1755 17.8913 35 18.3333 35H21.6667C22.1087 35 22.5326 35.1755 22.8452 35.4881C23.1577 35.8007 23.3333 36.2246 23.3333 36.6666Z" fill="url(#paint0_linear_78_3775)" />
                  <defs>
                    <linearGradient id="paint0_linear_78_3775" x1="10.1362" y1="1.66663" x2="38.8116" y2="5.85665" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#81ACFF" />
                      <stop offset="0.704835" stop-color="#5790FF" />
                    </linearGradient>
                  </defs>
                </svg>
              </div>
            </div>
            
            @endif
            
            
          </div>

          <div class="col-md-3 col-sm-6">
            <!-- <div class="head_profile gradine_reppo">
  <h2>Document <span>Repository</span></h2>
  <div class="nt_accress">
    <a href="{{url('/docurepo')}}">Access
    <svg width="5" height="7" viewBox="0 0 5 7" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.45094 0.350098L0.960938 0.875098L3.55094 3.5001L0.960938 6.1251L1.45094 6.6501L4.60094 3.5001L1.45094 0.350098Z" fill="white"/>
</svg>
  </a>
  </div>
        </div> -->

            <div class="botm_tkt_section">
                 <a href="https://milliondox.com/contact.html" target="_blank">
              <div class="head_profile feedbak_nt">
                <div class="left_profile">
                  <h2><span>Customize your way?</span>MakerSpace</h2>
                </div>
                <div class="right_pro_icon">
                  <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M35.5013 5.49991C35.4974 4.20333 34.989 2.95918 34.0837 2.03094C33.1785 1.1027 31.9475 0.563265 30.6514 0.526871C29.3553 0.490476 28.096 0.959983 27.1401 1.83596C26.1841 2.71194 25.6067 3.92559 25.5301 5.21991L9.98381 8.32866C9.62033 7.57318 9.07228 6.92152 8.3903 6.43391C7.70832 5.9463 6.91443 5.63846 6.082 5.53886C5.24957 5.43925 4.40546 5.5511 3.6277 5.86405C2.84993 6.177 2.1636 6.68095 1.63214 7.32935C1.10068 7.97774 0.741237 8.74963 0.587039 9.5737C0.432841 10.3978 0.48886 11.2474 0.749919 12.0441C1.01098 12.8408 1.46865 13.5588 2.08064 14.1318C2.69263 14.7048 3.43919 15.1143 4.25131 15.3224V25.6774C3.39832 25.896 2.61835 26.3364 1.99061 26.9539C1.36288 27.5714 0.909724 28.3441 0.677169 29.1934C0.444613 30.0427 0.440938 30.9384 0.666515 31.7895C0.892092 32.6407 1.33889 33.417 1.96154 34.0397C2.58419 34.6623 3.36051 35.1091 4.21168 35.3347C5.06286 35.5603 5.95857 35.5566 6.80786 35.3241C7.65715 35.0915 8.42979 34.6383 9.0473 34.0106C9.66482 33.3829 10.1052 32.6029 10.3238 31.7499H20.6788C20.8866 32.5626 21.296 33.3097 21.869 33.9223C22.4421 34.5348 23.1603 34.993 23.9573 35.2544C24.7544 35.5158 25.6045 35.572 26.429 35.4178C27.2535 35.2637 28.0258 34.9041 28.6745 34.3723C29.3233 33.8406 29.8275 33.1539 30.1405 32.3757C30.4535 31.5974 30.5652 30.7529 30.4653 29.92C30.3654 29.0872 30.0572 28.293 29.569 27.6109C29.0809 26.9287 28.4286 26.3807 27.6726 26.0174L30.7813 10.4712C32.0538 10.4013 33.2515 9.84755 34.129 8.92333C35.0065 7.9991 35.4975 6.77435 35.5013 5.49991ZM30.5013 2.99991C30.9958 2.99991 31.4791 3.14653 31.8902 3.42123C32.3014 3.69594 32.6218 4.08638 32.811 4.5432C33.0002 5.00001 33.0497 5.50268 32.9533 5.98763C32.8568 6.47259 32.6187 6.91804 32.2691 7.26767C31.9194 7.61731 31.474 7.85541 30.989 7.95187C30.5041 8.04833 30.0014 7.99883 29.5446 7.80961C29.0878 7.62039 28.6973 7.29996 28.4226 6.88883C28.1479 6.47771 28.0013 5.99436 28.0013 5.49991C28.0013 4.83687 28.2647 4.20098 28.7335 3.73214C29.2024 3.2633 29.8383 2.99991 30.5013 2.99991ZM3.00131 10.4999C3.00131 10.0055 3.14794 9.52211 3.42264 9.11098C3.69734 8.69986 4.08779 8.37943 4.5446 8.19021C5.00142 8.00099 5.50409 7.95148 5.98904 8.04794C6.47399 8.14441 6.91945 8.38251 7.26908 8.73214C7.61871 9.08177 7.85681 9.52723 7.95328 10.0122C8.04974 10.4971 8.00023 10.9998 7.81101 11.4566C7.62179 11.9134 7.30136 12.3039 6.89024 12.5786C6.47912 12.8533 5.99577 12.9999 5.50131 12.9999C4.83827 12.9999 4.20239 12.7365 3.73355 12.2677C3.26471 11.7988 3.00131 11.1629 3.00131 10.4999ZM5.50131 32.9999C5.00686 32.9999 4.52351 32.8533 4.11239 32.5786C3.70127 32.3039 3.38083 31.9134 3.19161 31.4566C3.0024 30.9998 2.95289 30.4971 3.04935 30.0122C3.14581 29.5272 3.38392 29.0818 3.73355 28.7321C4.08318 28.3825 4.52864 28.1444 5.01359 28.0479C5.49854 27.9515 6.00121 28.001 6.45802 28.1902C6.91484 28.3794 7.30528 28.6999 7.57999 29.111C7.85469 29.5221 8.00131 30.0055 8.00131 30.4999C8.00131 31.163 7.73792 31.7988 7.26908 32.2677C6.80024 32.7365 6.16435 32.9999 5.50131 32.9999ZM20.6788 29.2499H10.3238C10.0992 28.3909 9.64985 27.6071 9.02198 26.9792C8.39411 26.3514 7.61037 25.902 6.75131 25.6774V15.3224C7.77234 15.0562 8.68265 14.4731 9.35131 13.6569C10.02 12.8406 10.4125 11.8334 10.4726 10.7799L26.0188 7.67116C26.5083 8.67921 27.3223 9.49361 28.3301 9.98366L25.2213 25.5287C24.1679 25.5887 23.1606 25.9812 22.3444 26.6499C21.5281 27.3186 20.945 28.2289 20.6788 29.2499ZM25.5013 32.9999C25.0069 32.9999 24.5235 32.8533 24.1124 32.5786C23.7013 32.3039 23.3808 31.9134 23.1916 31.4566C23.0024 30.9998 22.9529 30.4971 23.0494 30.0122C23.1458 29.5272 23.3839 29.0818 23.7335 28.7321C24.0832 28.3825 24.5286 28.1444 25.0136 28.0479C25.4985 27.9515 26.0012 28.001 26.458 28.1902C26.9148 28.3794 27.3053 28.6999 27.58 29.111C27.8547 29.5221 28.0013 30.0055 28.0013 30.4999C28.0013 31.163 27.7379 31.7988 27.2691 32.2677C26.8002 32.7365 26.1644 32.9999 25.5013 32.9999Z" fill="url(#paint0_linear_3276_2974)" />
                    <defs>
                      <linearGradient id="paint0_linear_3276_2974" x1="6.49244" y1="0.524906" x2="39.6051" y2="6.44245" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#81ACFF" />
                        <stop offset="0.704835" stop-color="#5790FF" />
                      </linearGradient>
                    </defs>
                  </svg>
                </div>

              </div>
              </a>
            </div>
          </div>


        </div>
      </div>
      <!-- Container-fluid Ends-->

      <!-- Container-fluid start-->
      <!-- <div class="container-fluid  nt_cypherock">
            <div class="row"> 
<div class="col-md-12">
<div class="gold_wrapp">
<div class="cyp_text">
<style>
    .capitalize {
        text-transform: capitalize;
    }
</style>

<h2 class="capitalize">{{$user->name_of_the_business}}</h2>
    <p>{{$user->dece}}</p>
    <div class="gold_nt_btn"> <a class="hvr-rotate" href="{{url('/user/companyprofile')}}">View more</a></div>
	</div>
<div class="gold_wire">


@if($user->profile_picture == NULL)
      
<img src="../assets/images/gold-logo.png" class="mtt">
   @else

    <img  src="{{asset('/' . $user->profile_picture)}}" class="mtt" alt="Profile Image">
 @endif  
</div>
</div>
</div> -->

      <!-- <div class="col-md-3 col_strch">

<div class="ticket_nt">
    <div class="inner_tickets">
        <h2>Open Tickets</h2>
        <div class="tickt_ntn">
            <a class="hvr-rotate" href="#">open<span>3</span></a> 
</div>
<div class="main_paid">
    <div class="paid_ico">
    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M18.25 0.875H1.75002C1.45165 0.875 1.1655 0.993526 0.954526 1.2045C0.743548 1.41548 0.625022 1.70163 0.625022 2V17C0.623689 17.2145 0.684278 17.4248 0.799518 17.6058C0.914758 17.7867 1.07975 17.9305 1.27471 18.02C1.42375 18.0888 1.58588 18.1246 1.75002 18.125C2.01418 18.1248 2.26967 18.0308 2.47096 17.8597L2.47658 17.8541L5.48971 15.2131C5.55815 15.1555 5.64493 15.1242 5.7344 15.125H18.25C18.5484 15.125 18.8345 15.0065 19.0455 14.7955C19.2565 14.5845 19.375 14.2984 19.375 14V2C19.375 1.70163 19.2565 1.41548 19.0455 1.2045C18.8345 0.993526 18.5484 0.875 18.25 0.875ZM18.625 14C18.625 14.0995 18.5855 14.1948 18.5152 14.2652C18.4449 14.3355 18.3495 14.375 18.25 14.375H5.7344C5.46685 14.3758 5.20817 14.4711 5.00408 14.6441L1.98908 17.2878C1.93433 17.3331 1.86783 17.3619 1.79732 17.3709C1.72682 17.3799 1.65522 17.3686 1.59087 17.3384C1.52652 17.3083 1.47206 17.2605 1.43385 17.2005C1.39563 17.1406 1.37523 17.0711 1.37502 17V2C1.37502 1.90054 1.41453 1.80516 1.48486 1.73484C1.55518 1.66451 1.65057 1.625 1.75002 1.625H18.25C18.3495 1.625 18.4449 1.66451 18.5152 1.73484C18.5855 1.80516 18.625 1.90054 18.625 2V14ZM10.75 8C10.75 8.14834 10.706 8.29334 10.6236 8.41668C10.5412 8.54001 10.4241 8.63614 10.287 8.69291C10.15 8.74968 9.99919 8.76453 9.8537 8.73559C9.70822 8.70665 9.57458 8.63522 9.46969 8.53033C9.3648 8.42544 9.29337 8.2918 9.26443 8.14632C9.23549 8.00083 9.25035 7.85003 9.30711 7.71299C9.36388 7.57594 9.46001 7.45881 9.58334 7.3764C9.70668 7.29399 9.85169 7.25 10 7.25C10.1989 7.25 10.3897 7.32902 10.5304 7.46967C10.671 7.61032 10.75 7.80109 10.75 8ZM6.62502 8C6.62502 8.14834 6.58103 8.29334 6.49862 8.41668C6.41621 8.54001 6.29908 8.63614 6.16203 8.69291C6.02499 8.74968 5.87419 8.76453 5.7287 8.73559C5.58322 8.70665 5.44958 8.63522 5.34469 8.53033C5.2398 8.42544 5.16837 8.2918 5.13943 8.14632C5.11049 8.00083 5.12535 7.85003 5.18211 7.71299C5.23888 7.57594 5.33501 7.45881 5.45834 7.3764C5.58168 7.29399 5.72669 7.25 5.87502 7.25C6.07393 7.25 6.2647 7.32902 6.40535 7.46967C6.546 7.61032 6.62502 7.80109 6.62502 8ZM14.875 8C14.875 8.14834 14.831 8.29334 14.7486 8.41668C14.6662 8.54001 14.5491 8.63614 14.412 8.69291C14.275 8.74968 14.1242 8.76453 13.9787 8.73559C13.8332 8.70665 13.6996 8.63522 13.5947 8.53033C13.4898 8.42544 13.4184 8.2918 13.3894 8.14632C13.3605 8.00083 13.3753 7.85003 13.4321 7.71299C13.4889 7.57594 13.585 7.45881 13.7083 7.3764C13.8317 7.29399 13.9767 7.25 14.125 7.25C14.3239 7.25 14.5147 7.32902 14.6554 7.46967C14.796 7.61032 14.875 7.80109 14.875 8Z" fill="#9E9E9E"/>
</svg>
</div>
<div class="paid_text">
    <h2>Paid with another mode...</h2>
    <div class="opm_btnn">
        <a class="hvr-rotate" href="#">open</a>
        <span>Mon, 27 Mar 23</span>
</div>
</div>
</div>

<div class="main_paid">
    <div class="paid_ico">
    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M18.25 0.875H1.75002C1.45165 0.875 1.1655 0.993526 0.954526 1.2045C0.743548 1.41548 0.625022 1.70163 0.625022 2V17C0.623689 17.2145 0.684278 17.4248 0.799518 17.6058C0.914758 17.7867 1.07975 17.9305 1.27471 18.02C1.42375 18.0888 1.58588 18.1246 1.75002 18.125C2.01418 18.1248 2.26967 18.0308 2.47096 17.8597L2.47658 17.8541L5.48971 15.2131C5.55815 15.1555 5.64493 15.1242 5.7344 15.125H18.25C18.5484 15.125 18.8345 15.0065 19.0455 14.7955C19.2565 14.5845 19.375 14.2984 19.375 14V2C19.375 1.70163 19.2565 1.41548 19.0455 1.2045C18.8345 0.993526 18.5484 0.875 18.25 0.875ZM18.625 14C18.625 14.0995 18.5855 14.1948 18.5152 14.2652C18.4449 14.3355 18.3495 14.375 18.25 14.375H5.7344C5.46685 14.3758 5.20817 14.4711 5.00408 14.6441L1.98908 17.2878C1.93433 17.3331 1.86783 17.3619 1.79732 17.3709C1.72682 17.3799 1.65522 17.3686 1.59087 17.3384C1.52652 17.3083 1.47206 17.2605 1.43385 17.2005C1.39563 17.1406 1.37523 17.0711 1.37502 17V2C1.37502 1.90054 1.41453 1.80516 1.48486 1.73484C1.55518 1.66451 1.65057 1.625 1.75002 1.625H18.25C18.3495 1.625 18.4449 1.66451 18.5152 1.73484C18.5855 1.80516 18.625 1.90054 18.625 2V14ZM10.75 8C10.75 8.14834 10.706 8.29334 10.6236 8.41668C10.5412 8.54001 10.4241 8.63614 10.287 8.69291C10.15 8.74968 9.99919 8.76453 9.8537 8.73559C9.70822 8.70665 9.57458 8.63522 9.46969 8.53033C9.3648 8.42544 9.29337 8.2918 9.26443 8.14632C9.23549 8.00083 9.25035 7.85003 9.30711 7.71299C9.36388 7.57594 9.46001 7.45881 9.58334 7.3764C9.70668 7.29399 9.85169 7.25 10 7.25C10.1989 7.25 10.3897 7.32902 10.5304 7.46967C10.671 7.61032 10.75 7.80109 10.75 8ZM6.62502 8C6.62502 8.14834 6.58103 8.29334 6.49862 8.41668C6.41621 8.54001 6.29908 8.63614 6.16203 8.69291C6.02499 8.74968 5.87419 8.76453 5.7287 8.73559C5.58322 8.70665 5.44958 8.63522 5.34469 8.53033C5.2398 8.42544 5.16837 8.2918 5.13943 8.14632C5.11049 8.00083 5.12535 7.85003 5.18211 7.71299C5.23888 7.57594 5.33501 7.45881 5.45834 7.3764C5.58168 7.29399 5.72669 7.25 5.87502 7.25C6.07393 7.25 6.2647 7.32902 6.40535 7.46967C6.546 7.61032 6.62502 7.80109 6.62502 8ZM14.875 8C14.875 8.14834 14.831 8.29334 14.7486 8.41668C14.6662 8.54001 14.5491 8.63614 14.412 8.69291C14.275 8.74968 14.1242 8.76453 13.9787 8.73559C13.8332 8.70665 13.6996 8.63522 13.5947 8.53033C13.4898 8.42544 13.4184 8.2918 13.3894 8.14632C13.3605 8.00083 13.3753 7.85003 13.4321 7.71299C13.4889 7.57594 13.585 7.45881 13.7083 7.3764C13.8317 7.29399 13.9767 7.25 14.125 7.25C14.3239 7.25 14.5147 7.32902 14.6554 7.46967C14.796 7.61032 14.875 7.80109 14.875 8Z" fill="#9E9E9E"></path>
</svg>
</div>
<div class="paid_text">
    <h2>Paid with another mode...</h2>
    <div class="opm_btnn">
        <a class="hvr-rotate" href="#">open</a>
        <span>Mon, 27 Mar 23</span>
</div>
</div>
</div>


</div>
</div> -->

      <!-- <div class="botm_tkt_section">
            <div class="head_profile feedbak_nt">
        <div class="left_profile">
    <h2><span>Feedback Section</span>Give feedback</h2>    
    </div>
<div class="right_pro_icon">
<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M33.334 3.33337H6.66732C4.83398 3.33337 3.33398 4.83337 3.33398 6.66671V26.6667C3.33398 28.5 4.83398 30 6.66732 30H13.334V35C13.334 36 14.0007 36.6667 15.0007 36.6667H15.834C16.1673 36.6667 16.6673 36.5 17.0007 36.1667L23.1673 30H33.334C35.1673 30 36.6673 28.5 36.6673 26.6667V6.66671C36.6673 4.83337 35.1673 3.33337 33.334 3.33337ZM18.334 21.6667H11.6673V14.6667L13.834 10H17.1673L14.834 15H18.334V21.6667ZM28.334 21.6667H21.6673V14.6667L23.834 10H27.1673L24.834 15H28.334V21.6667Z" fill="url(#paint0_linear_78_3777)"/>
<defs>
<linearGradient id="paint0_linear_78_3777" x1="9.04086" y1="3.33338" x2="40.5769" y2="8.96539" gradientUnits="userSpaceOnUse">
<stop stop-color="#81ACFF"/>
<stop offset="0.704835" stop-color="#5790FF"/>
</linearGradient>
</defs>
</svg>
</div> 

</div>
</div> 

 </div>-->

      <!-- </div>
        </div> -->
      <!-- Container-fluid Ends-->

      <!-- Container-fluid start-->

      <div class="container-fluid nt_calanderr">
        <div class="row">
          <div class="col-md-9">
            <div class="date_clander">
              <div class="left_date col-md-6">
                <!-- <div id="calendar"></div> -->
                <div class="top_date_cal">
                 
                  <div class="cla_dtae_today">
                  
                    <div class="fl_same_row">
                        <span class="only_today">Today</span>
                   <div class="calender_round">
                         <div class="svg_caldr">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <circle cx="14" cy="14" r="13.25" stroke="black" stroke-width="1.5" />
                          <path d="M18.9 7.46652H17.7333V6.29985C17.7333 6.1142 17.6596 5.93615 17.5283 5.80488C17.397 5.6736 17.219 5.59985 17.0333 5.59985C16.8477 5.59985 16.6696 5.6736 16.5384 5.80488C16.4071 5.93615 16.3333 6.1142 16.3333 6.29985V7.46652H12.1333V6.29985C12.1333 6.1142 12.0596 5.93615 11.9283 5.80488C11.797 5.6736 11.619 5.59985 11.4333 5.59985C11.2477 5.59985 11.0696 5.6736 10.9384 5.80488C10.8071 5.93615 10.7333 6.1142 10.7333 6.29985V7.46652H9.56667C8.88594 7.46652 8.2331 7.73694 7.75176 8.21828C7.27042 8.69962 7 9.35246 7 10.0332V20.2999C7 20.9806 7.27042 21.6334 7.75176 22.1148C8.2331 22.5961 8.88594 22.8665 9.56667 22.8665H18.9C19.5807 22.8665 20.2336 22.5961 20.7149 22.1148C21.1963 21.6334 21.4667 20.9806 21.4667 20.2999V10.0332C21.4667 9.35246 21.1963 8.69962 20.7149 8.21828C20.2336 7.73694 19.5807 7.46652 18.9 7.46652ZM9.56667 8.86652H10.7333V10.0332C10.7333 10.2188 10.8071 10.3969 10.9384 10.5282C11.0696 10.6594 11.2477 10.7332 11.4333 10.7332C11.619 10.7332 11.797 10.6594 11.9283 10.5282C12.0596 10.3969 12.1333 10.2188 12.1333 10.0332V8.86652H16.3333V10.0332C16.3333 10.2188 16.4071 10.3969 16.5384 10.5282C16.6696 10.6594 16.8477 10.7332 17.0333 10.7332C17.219 10.7332 17.397 10.6594 17.5283 10.5282C17.6596 10.3969 17.7333 10.2188 17.7333 10.0332V8.86652H18.9C19.2094 8.86652 19.5062 8.98944 19.725 9.20823C19.9438 9.42702 20.0667 9.72377 20.0667 10.0332V12.5999H8.4V10.0332C8.4 9.72377 8.52292 9.42702 8.74171 9.20823C8.9605 8.98944 9.25725 8.86652 9.56667 8.86652ZM18.9 21.4665H9.56667C9.25725 21.4665 8.9605 21.3436 8.74171 21.1248C8.52292 20.906 8.4 20.6093 8.4 20.2999V13.9999H20.0667V20.2999C20.0667 20.6093 19.9438 20.906 19.725 21.1248C19.5062 21.3436 19.2094 21.4665 18.9 21.4665Z" fill="black" />
                        </svg>
                      </div>
                         <span class="day_name">
                             {{ $currentDate->format('l') }}
                         </span>
                        <h2>
                        {{ $currentDate->format('d F') }}
                        <span>
                          {{ $currentDate->format('Y') }}
                        </span>
                      </h2>
                      
                   </div>
 



                    </div>
                    

                    <div class="botto_buton_event">
                      <button id="show_form_event">
                        <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M8 17.3334H2.16667C1.72464 17.3334 1.30072 17.1578 0.988155 16.8453C0.675595 16.5327 0.5 16.1088 0.5 15.6667L0.508333 4.00008C0.508333 3.08341 1.24167 2.33341 2.16667 2.33341H3V0.666748H4.66667V2.33341H11.3333V0.666748H13V2.33341H13.8333C14.75 2.33341 15.5 3.08341 15.5 4.00008V9.00008H13.8333V7.33341H2.16667V15.6667H8V17.3334ZM16.4417 13.1584L17.0333 12.5667C17.1106 12.4897 17.1719 12.3981 17.2137 12.2973C17.2555 12.1965 17.277 12.0884 17.277 11.9792C17.277 11.8701 17.2555 11.762 17.2137 11.6612C17.1719 11.5604 17.1106 11.4688 17.0333 11.3917L16.4417 10.8001C16.3646 10.7228 16.273 10.6615 16.1722 10.6197C16.0714 10.5779 15.9633 10.5564 15.8542 10.5564C15.745 10.5564 15.637 10.5779 15.5361 10.6197C15.4353 10.6615 15.3438 10.7228 15.2667 10.8001L14.675 11.3917L16.4417 13.1584ZM15.85 13.7501L11.4333 18.1667H9.66667V16.4001L14.0833 11.9834L15.85 13.7501Z" fill="white" />
                        </svg>
                        Add Events & Tasks</button>

                          

                    </div>

                    <!-- sidebar calander start-->
                    <div class="calander_overlay_fix"></div>
                    <div class="calander_fix">


                      <h2 class="calander_title">Manage Calendar</h2>
                      <div class="calander_tabs">

                        <div class="column-tabs">

                          <div class="tabs">
                            <button class="tab-link active" onclick="openTabbb('kyc')">Tasks</button>
                            <button class="tab-link" onclick="openTabbb('dsc')">Events</button>
                          </div>

                          <div id="tab-kyc" class="tab active">

                            <div class="add_events">
                              <button id="show_formm">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M17.7416 4.90817L9.40827 13.2415C9.33118 13.3188 9.2396 13.38 9.13879 13.4219C9.03798 13.4637 8.92991 13.4852 8.82077 13.4852C8.71163 13.4852 8.60356 13.4637 8.50275 13.4219C8.40194 13.38 8.31037 13.3188 8.23327 13.2415L5.87494 10.8832C5.79779 10.806 5.73659 10.7144 5.69483 10.6136C5.65308 10.5128 5.63159 10.4048 5.63159 10.2957C5.63159 10.1866 5.65308 10.0785 5.69483 9.97771C5.73659 9.87691 5.79779 9.78532 5.87494 9.70817C5.95209 9.63101 6.04368 9.56981 6.14449 9.52806C6.24529 9.48631 6.35333 9.46482 6.46244 9.46482C6.57155 9.46482 6.67959 9.48631 6.78039 9.52806C6.8812 9.56981 6.97279 9.63101 7.04994 9.70817L8.81661 11.4748L16.5583 3.73317C16.6354 3.65591 16.7269 3.59462 16.8278 3.55281C16.9286 3.51099 17.0366 3.48946 17.1458 3.48946C17.2549 3.48946 17.363 3.51099 17.4638 3.55281C17.5646 3.59462 17.6562 3.65591 17.7333 3.73317C18.0666 4.05817 18.0666 4.58317 17.7416 4.90817ZM9.99994 16.6665C6.07494 16.6665 2.93327 13.2582 3.37494 9.24983C3.69994 6.3165 5.97494 3.90817 8.88327 3.42483C10.3916 3.17483 11.8249 3.4415 13.0416 4.07483C13.2383 4.1776 13.4678 4.19803 13.6795 4.13161C13.8913 4.06519 14.068 3.91737 14.1708 3.72067C14.2735 3.52396 14.294 3.29449 14.2275 3.08273C14.1611 2.87097 14.0133 2.69427 13.8166 2.5915C12.5916 1.9665 11.2083 1.62483 9.73327 1.6665C5.44994 1.79983 1.89161 5.28317 1.67494 9.55817C1.43327 14.3665 5.24994 18.3332 9.99994 18.3332C10.9999 18.3332 11.9499 18.1582 12.8416 17.8332C13.4083 17.6248 13.5666 16.8915 13.1333 16.4582C13.0227 16.3461 12.882 16.2683 12.7283 16.2343C12.5745 16.2003 12.4142 16.2115 12.2666 16.2665C11.5583 16.5248 10.7916 16.6665 9.99994 16.6665ZM15.8333 12.4998H14.1666C13.7083 12.4998 13.3333 12.8748 13.3333 13.3332C13.3333 13.7915 13.7083 14.1665 14.1666 14.1665H15.8333V15.8332C15.8333 16.2915 16.2083 16.6665 16.6666 16.6665C17.1249 16.6665 17.4999 16.2915 17.4999 15.8332V14.1665H19.1666C19.6249 14.1665 19.9999 13.7915 19.9999 13.3332C19.9999 12.8748 19.6249 12.4998 19.1666 12.4998H17.4999V10.8332C17.4999 10.3748 17.1249 9.99983 16.6666 9.99983C16.2083 9.99983 15.8333 10.3748 15.8333 10.8332V12.4998Z" fill="white" />
                                </svg>
                                Add a Task</button>

<script>
  $(document).ready(function() {
    // Handle form submission
    $('#eventFormdddd').submit(function(e) {
      e.preventDefault();

      let form = $('#eventFormdddd')[0];
      const formData = new FormData(form);

      // Send an AJAX request
      $.ajax({
        type: 'POST',
        url: '{{ route('addTask') }}',
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',

        success: function(response) {
          if (response.success) {
            toastr.success(response.success); // Display success message

            // Store flag in localStorage to indicate form submission
            localStorage.setItem('formSubmitted', 'true');

            // Reload the page after success
            setTimeout(function() {
              window.location.reload();
            }, 500); // Adjust the delay if needed
          } else {
            toastr.error(response.error); // Display error message
          }
        },
        error: function() {
          toastr.error('Failed to Add Task!'); // Display error message
        }
      });

      form.reset(); // Reset the form after submission
    });

    // On page load, check if the form was submitted successfully
    if (localStorage.getItem('formSubmitted') === 'true') {
      // Wait for the full page to load before triggering the button click
      $(window).on('load', function() {
        // Trigger the button click after the page is fully loaded
        $('#show_form_event').click();

        // Clear the localStorage flag to prevent future unintended triggers
        localStorage.removeItem('formSubmitted');
      });
    }
  });
</script>





                           

                              <form id="eventFormdddd" action="{{ route('addTask') }}" method="POST" class="upload-form">
                                @csrf
                                <button  type="button" id="closee">
                                  <span aria-hidden="true">
                                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"></rect>
                                      <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"></rect>
                                    </svg>
                                  </span>
                                </button>

                                <div class="for_group">
                                  <label for="taskName">Task name</label>
                                  <input type="text" id="taskName" name="taskName" required="">
                                </div>
                                <div class="for_group">
                                  <label for="taskDeadline">Task deadline</label>
                                  <input type="date" id="taskDeadline" name="taskDeadline" required="">
                                </div>

                                <div class="for_group">
                                  <label for="assignto">Assign to</label>
                                  <input type="text" id="assignto" name="assignto" required="">
                                </div>

                                <div class="for_group">
                                  <label for="eventnote">Notes</label>
                                  <textarea name="eventnote" required="" style="height: 58px;"> </textarea>
                                </div>

                                <div class="for_group bttn">
                                  <button type="submit" class="hvr-rotate">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M17.7416 4.90817L9.40827 13.2415C9.33118 13.3188 9.2396 13.38 9.13879 13.4219C9.03798 13.4637 8.92991 13.4852 8.82077 13.4852C8.71163 13.4852 8.60356 13.4637 8.50275 13.4219C8.40194 13.38 8.31037 13.3188 8.23327 13.2415L5.87494 10.8832C5.79779 10.806 5.73659 10.7144 5.69483 10.6136C5.65308 10.5128 5.63159 10.4048 5.63159 10.2957C5.63159 10.1866 5.65308 10.0785 5.69483 9.97771C5.73659 9.87691 5.79779 9.78532 5.87494 9.70817C5.95209 9.63101 6.04368 9.56981 6.14449 9.52806C6.24529 9.48631 6.35333 9.46482 6.46244 9.46482C6.57155 9.46482 6.67959 9.48631 6.78039 9.52806C6.8812 9.56981 6.97279 9.63101 7.04994 9.70817L8.81661 11.4748L16.5583 3.73317C16.6354 3.65591 16.7269 3.59462 16.8278 3.55281C16.9286 3.51099 17.0366 3.48946 17.1458 3.48946C17.2549 3.48946 17.363 3.51099 17.4638 3.55281C17.5646 3.59462 17.6562 3.65591 17.7333 3.73317C18.0666 4.05817 18.0666 4.58317 17.7416 4.90817ZM9.99994 16.6665C6.07494 16.6665 2.93327 13.2582 3.37494 9.24983C3.69994 6.3165 5.97494 3.90817 8.88327 3.42483C10.3916 3.17483 11.8249 3.4415 13.0416 4.07483C13.2383 4.1776 13.4678 4.19803 13.6795 4.13161C13.8913 4.06519 14.068 3.91737 14.1708 3.72067C14.2735 3.52396 14.294 3.29449 14.2275 3.08273C14.1611 2.87097 14.0133 2.69427 13.8166 2.5915C12.5916 1.9665 11.2083 1.62483 9.73327 1.6665C5.44994 1.79983 1.89161 5.28317 1.67494 9.55817C1.43327 14.3665 5.24994 18.3332 9.99994 18.3332C10.9999 18.3332 11.9499 18.1582 12.8416 17.8332C13.4083 17.6248 13.5666 16.8915 13.1333 16.4582C13.0227 16.3461 12.882 16.2683 12.7283 16.2343C12.5745 16.2003 12.4142 16.2115 12.2666 16.2665C11.5583 16.5248 10.7916 16.6665 9.99994 16.6665ZM15.8333 12.4998H14.1666C13.7083 12.4998 13.3333 12.8748 13.3333 13.3332C13.3333 13.7915 13.7083 14.1665 14.1666 14.1665H15.8333V15.8332C15.8333 16.2915 16.2083 16.6665 16.6666 16.6665C17.1249 16.6665 17.4999 16.2915 17.4999 15.8332V14.1665H19.1666C19.6249 14.1665 19.9999 13.7915 19.9999 13.3332C19.9999 12.8748 19.6249 12.4998 19.1666 12.4998H17.4999V10.8332C17.4999 10.3748 17.1249 9.99983 16.6666 9.99983C16.2083 9.99983 15.8333 10.3748 15.8333 10.8332V12.4998Z" fill="white" />
                                    </svg>
                                    Add</button>
                                    <p id="form-response-message"></p>
                                </div>
                              </form>
                              
                              
                              <!--edit form Task start-->
                              @foreach($tasks as $taskslist)
                                                   <form id="event_edit{{$taskslist->id}}" action="{{ route('editTask') }}" method="POST" class="event_edit_form" style="display: none;"> 
                                      @csrf
                                      <button class="close_form" id="closee_edit_event" data-event-id="{{$taskslist->id}}">
        <span aria-hidden="true">
            <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"></rect>
                <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"></rect>
            </svg>
        </span>
    </button>
    
    <div class="for_group">
    <label for="eventeditName">Task name</label>
    <input type="hidden" id="task_id" name="task_id" value="{{$taskslist->id}}" required="">
    <input type="text" id="taskName" name="taskName" value="{{$taskslist->taskName}}" required="">
</div>
<div class="for_group">
    <label for="eventeditDate">Task deadline</label>
    <input type="date" id="taskDeadline" name="taskDeadline" value="{{$taskslist->taskDeadline}}" required="">
</div>

<div class="for_group">
    <label for="assigntoedit">Assign to</label>
    <input type="text" id="assignto" name="assignto" value="{{$taskslist->assignto}}" required="">
</div>

<div class="for_group">
    <label for="eventnoteedit">Notes</label>
    <textarea name="eventnote"  required=""  style="height: 58px;"> {{$taskslist->eventnote}}</textarea>
</div>

    <div class="for_group bttn">
      <button type="submit" class="hvr-rotate">
      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M17.7416 4.90817L9.40827 13.2415C9.33118 13.3188 9.2396 13.38 9.13879 13.4219C9.03798 13.4637 8.92991 13.4852 8.82077 13.4852C8.71163 13.4852 8.60356 13.4637 8.50275 13.4219C8.40194 13.38 8.31037 13.3188 8.23327 13.2415L5.87494 10.8832C5.79779 10.806 5.73659 10.7144 5.69483 10.6136C5.65308 10.5128 5.63159 10.4048 5.63159 10.2957C5.63159 10.1866 5.65308 10.0785 5.69483 9.97771C5.73659 9.87691 5.79779 9.78532 5.87494 9.70817C5.95209 9.63101 6.04368 9.56981 6.14449 9.52806C6.24529 9.48631 6.35333 9.46482 6.46244 9.46482C6.57155 9.46482 6.67959 9.48631 6.78039 9.52806C6.8812 9.56981 6.97279 9.63101 7.04994 9.70817L8.81661 11.4748L16.5583 3.73317C16.6354 3.65591 16.7269 3.59462 16.8278 3.55281C16.9286 3.51099 17.0366 3.48946 17.1458 3.48946C17.2549 3.48946 17.363 3.51099 17.4638 3.55281C17.5646 3.59462 17.6562 3.65591 17.7333 3.73317C18.0666 4.05817 18.0666 4.58317 17.7416 4.90817ZM9.99994 16.6665C6.07494 16.6665 2.93327 13.2582 3.37494 9.24983C3.69994 6.3165 5.97494 3.90817 8.88327 3.42483C10.3916 3.17483 11.8249 3.4415 13.0416 4.07483C13.2383 4.1776 13.4678 4.19803 13.6795 4.13161C13.8913 4.06519 14.068 3.91737 14.1708 3.72067C14.2735 3.52396 14.294 3.29449 14.2275 3.08273C14.1611 2.87097 14.0133 2.69427 13.8166 2.5915C12.5916 1.9665 11.2083 1.62483 9.73327 1.6665C5.44994 1.79983 1.89161 5.28317 1.67494 9.55817C1.43327 14.3665 5.24994 18.3332 9.99994 18.3332C10.9999 18.3332 11.9499 18.1582 12.8416 17.8332C13.4083 17.6248 13.5666 16.8915 13.1333 16.4582C13.0227 16.3461 12.882 16.2683 12.7283 16.2343C12.5745 16.2003 12.4142 16.2115 12.2666 16.2665C11.5583 16.5248 10.7916 16.6665 9.99994 16.6665ZM15.8333 12.4998H14.1666C13.7083 12.4998 13.3333 12.8748 13.3333 13.3332C13.3333 13.7915 13.7083 14.1665 14.1666 14.1665H15.8333V15.8332C15.8333 16.2915 16.2083 16.6665 16.6666 16.6665C17.1249 16.6665 17.4999 16.2915 17.4999 15.8332V14.1665H19.1666C19.6249 14.1665 19.9999 13.7915 19.9999 13.3332C19.9999 12.8748 19.6249 12.4998 19.1666 12.4998H17.4999V10.8332C17.4999 10.3748 17.1249 9.99983 16.6666 9.99983C16.2083 9.99983 15.8333 10.3748 15.8333 10.8332V12.4998Z" fill="white"/>
</svg> 
      Save</button>    
    </div>
</form>
  <!--edit form Task end-->
@endforeach
                            </div>
                    <script>
  $(document).ready(function() {
    // Handle form submission using AJAX
    $('.event_edit_form').submit(function(e) {
      e.preventDefault(); // Prevent the default form submission

      // Get the form ID dynamically based on the task
      let formId = $(this).attr('id');
      let form = $('#' + formId)[0]; // Get the actual form element
      let formData = new FormData(form); // Create FormData object

      $.ajax({
        type: 'POST',
        url: '{{ route('editTask') }}', // Ensure this is the correct route for editing tasks
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',

        success: function(response) {
          if (response.success) {
            toastr.success(response.success); // Display success message

            // Store flag in localStorage to indicate form submission
            localStorage.setItem('formEditSubmitted', 'true');

            // Trigger the click event on the button
            $('#show_form_event').click(); // Simulate button click

            // Reload the page after success
            setTimeout(function() {
              window.location.reload();
            }, 500); // Adjust the delay if needed
          } else {
            toastr.error(response.error); // Display error message
          }
        },
        error: function() {
          toastr.error('Failed to edit the task!'); // Display error message
        }
      });

      form.reset(); // Reset the form after submission
    });

    // On page load, check if the edit form was submitted successfully
    if (localStorage.getItem('formEditSubmitted') === 'true') {
      // Wait for the full page to load before triggering the button click
      $(window).on('load', function() {
         $('#show_form_event').click();
        localStorage.removeItem('formEditSubmitted');
      });
    }
  });
</script>

<script>
  $(document).ready(function() {
    // Handle form submission using AJAX
    $('.eventsformedit').submit(function(e) {
      e.preventDefault(); // Prevent the default form submission

      // Get the form ID dynamically based on the task
      let formId = $(this).attr('id');
      let form = $('#' + formId)[0]; // Get the actual form element
      let formData = new FormData(form); // Create FormData object

      $.ajax({
        type: 'POST',
        url: '{{ route('editEvents') }}', // Ensure this is the correct route for editing tasks
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',

        success: function(response) {
          if (response.success) {
            toastr.success(response.success); // Display success message

            // Store flag in localStorage to indicate form submission
            localStorage.setItem('formEditSubmitted', 'true');

            // Trigger the click event on the button
            $('#show_form_event').click(); // Simulate button click

            // Reload the page after success
            setTimeout(function() {
              window.location.reload();
            }, 500); // Adjust the delay if needed
          } else {
            toastr.error(response.error); // Display error message
          }
        },
        error: function() {
          toastr.error('Failed to edit the Event!'); // Display error message
        }
      });

      form.reset(); // Reset the form after submission
    });

    // On page load, check if the edit form was submitted successfully
    if (localStorage.getItem('formEditSubmitted') === 'true') {
      // Wait for the full page to load before triggering the button click
      $(window).on('load', function() {
         $('#show_form_event').click();
        localStorage.removeItem('formEditSubmitted');
      });
    }
  });
</script>

<script>
$(document).on('click', '.his_edit_event', function() {
  const taskId = $(this).attr('id').replace('his_edit_event', '');
  const formId = `#event_edit${taskId}`;

  // Hide other forms if they're open
  $('.event_edit_form').hide();

  // Show the selected form
  $(formId).show();
});


$(document).on('click', '.close_form', function() {
  const taskId = $(this).data('event-id');
  const formId = `#event_edit${taskId}`;

  // Hide the form
  $(formId).hide();
});




</script>



   <script>
$(document.body).on('click', '.his_edit_event', function(e) {
    e.preventDefault(); // Prevent default link behavior
// alert('ghgfhgfhgf');
    // Get the ID of the task from the button's data attribute
    var taskId = $(this).data('task-id'); // Make sure you have data-task-id in your HTML

    // Show the corresponding form
    $('#event_edit' + taskId).show(); // Show the form for the clicked task
});


                              </script>
                            <div class="event_details_fl task_too">
                              <div class="deatils_heda">
                                <div class="chose_datte">
                                  <h2>Choose Date</h2>
                                </div>
                                <div class="svg_caldr">
                                  <div class="input_behidd">
                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <circle cx="14" cy="14" r="13.25" stroke="black" stroke-width="1.5"></circle>
                                      <path d="M18.9 7.46652H17.7333V6.29985C17.7333 6.1142 17.6596 5.93615 17.5283 5.80488C17.397 5.6736 17.219 5.59985 17.0333 5.59985C16.8477 5.59985 16.6696 5.6736 16.5384 5.80488C16.4071 5.93615 16.3333 6.1142 16.3333 6.29985V7.46652H12.1333V6.29985C12.1333 6.1142 12.0596 5.93615 11.9283 5.80488C11.797 5.6736 11.619 5.59985 11.4333 5.59985C11.2477 5.59985 11.0696 5.6736 10.9384 5.80488C10.8071 5.93615 10.7333 6.1142 10.7333 6.29985V7.46652H9.56667C8.88594 7.46652 8.2331 7.73694 7.75176 8.21828C7.27042 8.69962 7 9.35246 7 10.0332V20.2999C7 20.9806 7.27042 21.6334 7.75176 22.1148C8.2331 22.5961 8.88594 22.8665 9.56667 22.8665H18.9C19.5807 22.8665 20.2336 22.5961 20.7149 22.1148C21.1963 21.6334 21.4667 20.9806 21.4667 20.2999V10.0332C21.4667 9.35246 21.1963 8.69962 20.7149 8.21828C20.2336 7.73694 19.5807 7.46652 18.9 7.46652ZM9.56667 8.86652H10.7333V10.0332C10.7333 10.2188 10.8071 10.3969 10.9384 10.5282C11.0696 10.6594 11.2477 10.7332 11.4333 10.7332C11.619 10.7332 11.797 10.6594 11.9283 10.5282C12.0596 10.3969 12.1333 10.2188 12.1333 10.0332V8.86652H16.3333V10.0332C16.3333 10.2188 16.4071 10.3969 16.5384 10.5282C16.6696 10.6594 16.8477 10.7332 17.0333 10.7332C17.219 10.7332 17.397 10.6594 17.5283 10.5282C17.6596 10.3969 17.7333 10.2188 17.7333 10.0332V8.86652H18.9C19.2094 8.86652 19.5062 8.98944 19.725 9.20823C19.9438 9.42702 20.0667 9.72377 20.0667 10.0332V12.5999H8.4V10.0332C8.4 9.72377 8.52292 9.42702 8.74171 9.20823C8.9605 8.98944 9.25725 8.86652 9.56667 8.86652ZM18.9 21.4665H9.56667C9.25725 21.4665 8.9605 21.3436 8.74171 21.1248C8.52292 20.906 8.4 20.6093 8.4 20.2999V13.9999H20.0667V20.2999C20.0667 20.6093 19.9438 20.906 19.725 21.1248C19.5062 21.3436 19.2094 21.4665 18.9 21.4665Z" fill="black"></path>
                                    </svg>
                                    <input type="date" id="eventDate" name="eventDate">
                                  </div>

                                  <h2>
                                    {{ $currentDate->format('d F') }}
                                    <span>
                                      {{ $currentDate->format('Y') }}
                                    </span>
                                  </h2>
                                </div>

                              </div>

                              <div class="reinder_an_history">
                                <h3>Tasks</h3>
                                <ul class="main_repo_ul" id="re-render-list">

                                  <li class="pin-title-repo">
                                    <h6>Completed Tasks</h6>
                                  </li>
                                  <hr>
                                
                                @foreach($tasks as $taskslist)
                                    <li class="{{ $taskslist->status == 'completed' ? 'active' : '' }}">
                                   
                                    <div class="main_task_wraap">
                                      <div class="go_grenn">
                                         <button class="active_greenn" data-task-id="{{ $taskslist->id }}" >
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
                                        </button>
                                      </div>
                                      <div class="task_wraap">
                                        <div class="top_wrap_cievent">
                                          <div class="icon_his_ani">
                                            <span>{{ $taskslist->taskName }}</span>
                                          </div>
                                          <div class="his_edit_event" id="his_edit_event{{ $taskslist->id }}">
                                              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14.241 1.50879L16.491 3.75879L14.7758 5.47479L12.5258 3.22479L14.241 1.50879ZM6 11.9998H8.25L13.7153 6.53454L11.4653 4.28454L6 9.74979V11.9998Z" fill="#434343"></path>
                                                <path d="M14.25 14.25H6.1185C6.099 14.25 6.07875 14.2575 6.05925 14.2575C6.0345 14.2575 6.00975 14.2507 5.98425 14.25H3.75V3.75H8.88525L10.3853 2.25H3.75C2.92275 2.25 2.25 2.922 2.25 3.75V14.25C2.25 15.078 2.92275 15.75 3.75 15.75H14.25C14.6478 15.75 15.0294 15.592 15.3107 15.3107C15.592 15.0294 15.75 14.6478 15.75 14.25V7.749L14.25 9.249V14.25Z" fill="#434343"></path>
                                              </svg>
                                          </div>
                                        </div>
                                        <div class="task_details">
                                            <div class="task_dess">
                                          <p>{{ $taskslist->eventnote }}</p>
                                       
                                           </div>
                                                <button class="task_del" id="task_del" data-task-id="{{ $taskslist->id }}">
                                              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                   <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                                   </svg>

                                              </button>
                                        </div>
                                      </div>
                                    </div>
                                  </li>
                                @endforeach

                                

              
                                </ul>
                              </div>
                              
                              
                              

                            </div>


                          </div>
                          <!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- jQuery (if not already included) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

 <script>
$(document).ready(function() {
    // Set CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Handle click event for the delete button
    $('.task_del').click(function() {
        // Get the task ID from the data attribute
        let taskId = $(this).data('task-id');

        // Confirm deletion with SweetAlert
        Swal.fire({
            title: 'Are you sure?',
            text: 'This will permanently delete the task!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                // Send an AJAX request to delete the task
                $.ajax({
                    type: 'DELETE',
                    url: '{{ route('deleteTask', '') }}/' + taskId,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.success); // Show success message

                            // Store a flag in sessionStorage
                            sessionStorage.setItem('taskDeleted', 'true'); 
 $('#show_form_event').click();
                            setTimeout(function() {
                                window.location.reload(); // Reload the page after deletion
                            }, 500);
                        } else {
                            toastr.error(response.error); // Show error message
                        }
                    },
                    error: function() {
                        toastr.error('Failed to delete the task!'); // Show error message
                    }
                });
            }
        });
    });

    // Check if the task was deleted on page load
    if (sessionStorage.getItem('taskDeleted')) {
        // Simulate a click on the button
       $(window).on('load', function() {
         $('#show_form_event').click();
       sessionStorage.removeItem('taskDeleted');
      });

        // Remove the flag from sessionStorage
        
    }
});


    </script>
    
    <script>
$(document).ready(function() {
    // Set CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Handle click event for the delete button
    $('.task_edit_del').click(function() {
        // Get the task ID from the data attribute
        let taskId = $(this).data('eventtask-id');

        // Confirm deletion with SweetAlert
        Swal.fire({
            title: 'Are you sure?',
            text: 'This will permanently delete the task!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                // Send an AJAX request to delete the task
                $.ajax({
                    type: 'DELETE',
                    url: '{{ route('deleteeventTask', '') }}/' + taskId,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.success); // Show success message

                            // Store a flag in sessionStorage
                            sessionStorage.setItem('eventDeleted', 'true'); 
 $('#show_form_event').click();
                            setTimeout(function() {
                                window.location.reload(); // Reload the page after deletion
                            }, 500);
                        } else {
                            toastr.error(response.error); // Show error message
                        }
                    },
                    error: function() {
                        toastr.error('Failed to delete the task!'); // Show error message
                    }
                });
            }
        });
    });

    // Check if the task was deleted on page load
    if (sessionStorage.getItem('eventDeleted')) {
        // Simulate a click on the button
       $(window).on('load', function() {
         $('#show_form_event').click();
       sessionStorage.removeItem('eventDeleted');
      });

        // Remove the flag from sessionStorage
        
    }
});


    </script>


                          <div id="tab-dsc" class="tab">
                            <div class="add_events">
                              <button id="show_form">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M12.6667 12.6667V5.33341H3.33333V12.6667H12.6667ZM10.6667 0.666748H12V2.00008H12.6667C13.0203 2.00008 13.3594 2.14056 13.6095 2.39061C13.8595 2.64065 14 2.97979 14 3.33341V12.6667C14 13.4067 13.4067 14.0001 12.6667 14.0001H3.33333C2.97971 14.0001 2.64057 13.8596 2.39052 13.6096C2.14048 13.3595 2 13.0204 2 12.6667V3.33341C2 2.59341 2.59333 2.00008 3.33333 2.00008H4V0.666748H5.33333V2.00008H10.6667V0.666748ZM7.33333 6.33341H8.66667V8.33341H10.6667V9.66675H8.66667V11.6667H7.33333V9.66675H5.33333V8.33341H7.33333V6.33341Z" fill="white"></path>
                                </svg>
                                Add an Event</button>


                              <form id="eventFormddd" action="{{ route('addEvents') }}" method="POST" class="upload-form">
                                <!-- <input type="hidden" name="_token" value="#" autocomplete="off"> -->
                                 @csrf
                                <button type="button" id="close">
                                  <span aria-hidden="true">
                                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"></rect>
                                      <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"></rect>
                                    </svg>
                                  </span>
                                </button>

                                <div class="for_group">
                                  <label for="eventName">Event Name</label>
                                  <input type="text" id="eventName" name="eventName" required="">
                                </div>
                                <div class="for_group">
                                  <label for="eventDate">Event Date</label>
                                  <input type="date" id="eventDate" name="eventDate" required="">
                                </div>
                                <div class="group_radio">
                                  <div class="for_group radio">
                                    <input type="radio" id="repeatYearly1" name="repeat" value="yearly">
                                    <label for="repeatYearly1">Every Year</label><br>
                                  </div>
                                  <div class="for_group radio">
                                    <input type="radio" id="repeatMonthly1" name="repeat" value="monthly">
                                    <label for="repeatMonthly1">Every Month</label><br>
                                  </div>
                                  <div class="for_group radio">
                                    <input type="radio" id="repeatDaily1" name="repeat" value="daily">
                                    <label for="repeatDaily1">Every Day</label><br>
                                  </div>
                                </div>
                                <div class="for_group an_re">
                                  <button type="button" class="event-type-btn active" name="eventType" value="Anniversary" data-value="anniversary">Anniversary</button>
                                  <button type="button" class="event-type-btn" name="eventType" value="Reminder" data-value="reminder">Reminder</button>
                                  <input type="hidden" id="eventType" name="eventType" value="anniversary"> <!-- Hidden input to store selected event type -->
                                </div>
                                <div class="for_group bttn">
                                  <button type="submit" class="hvr-rotate">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M12.6667 12.6667V5.33341H3.33333V12.6667H12.6667ZM10.6667 0.666748H12V2.00008H12.6667C13.0203 2.00008 13.3594 2.14056 13.6095 2.39061C13.8595 2.64065 14 2.97979 14 3.33341V12.6667C14 13.4067 13.4067 14.0001 12.6667 14.0001H3.33333C2.97971 14.0001 2.64057 13.8596 2.39052 13.6096C2.14048 13.3595 2 13.0204 2 12.6667V3.33341C2 2.59341 2.59333 2.00008 3.33333 2.00008H4V0.666748H5.33333V2.00008H10.6667V0.666748ZM7.33333 6.33341H8.66667V8.33341H10.6667V9.66675H8.66667V11.6667H7.33333V9.66675H5.33333V8.33341H7.33333V6.33341Z" fill="white"></path>
                                    </svg>
                                    Add</button>
                                </div>
                              </form>
                              
                                 <!--edit form start for event-->
                                 @foreach($eventsData as $eventsDataList)
                                 
                                  <form id="eventFormddd_edit{{$eventsDataList->id}}" action="{{ route('editEvents') }}" method="POST" class="upload-form eventsformedit">
                                <!-- <input type="hidden" name="_token" value="#" autocomplete="off"> -->
                                 @csrf
                                <button type="button" id="close_event_edit_ar{{ $eventsDataList->id }}" class="close_form">
                                  <span aria-hidden="true">
                                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"></rect>
                                      <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"></rect>
                                    </svg>
                                  </span>
                                </button>

                                <div class="for_group">
                                  <label for="eventName">Event Name</label>
                                  <input type="text" id="eventName" name="eventName" value="{{$eventsDataList->eventName}}" required="">
                                  <input type="hidden" id="event_id" name="event_id" value="{{$eventsDataList->id}}" required="">
                                </div>
                                <div class="for_group">
                                  <label for="eventDate">Event Date</label>
                                  <input type="date" id="eventDate" name="eventDate" value="{{$eventsDataList->eventDate}}"  required="">
                                </div>
                                <div class="group_radio">
    <div class="for_group radio">
        <input type="radio" id="repeatYearly1{{ $eventsDataList->id }}" name="repeat" value="yearly" 
               @if($eventsDataList->eventRepeat == 'yearly') checked @endif>
        <label for="repeatYearly1{{ $eventsDataList->id }}">Every Year</label><br>
    </div>
    <div class="for_group radio">
        <input type="radio" id="repeatMonthly1{{ $eventsDataList->id }}" name="repeat" value="monthly" 
               @if($eventsDataList->eventRepeat == 'monthly') checked @endif>
        <label for="repeatMonthly1{{ $eventsDataList->id }}">Every Month</label><br>
    </div>
    <div class="for_group radio">
        <input type="radio" id="repeatDaily1{{ $eventsDataList->id }}" name="repeat" value="daily" 
               @if($eventsDataList->eventRepeat == 'daily') checked @endif>
        <label for="repeatDaily1{{ $eventsDataList->id }}">Every Day</label><br>
    </div>
</div>

                                <div class="for_group an_re">
                                  <button type="button" class="event-type-btn active" name="eventType" value="Anniversary" data-value="anniversary">Anniversary</button>
                                  <button type="button" class="event-type-btn" name="eventType" value="Reminder" data-value="reminder">Reminder</button>
                                  <input type="hidden" id="eventType" name="eventType" value="anniversary"> <!-- Hidden input to store selected event type -->
                                </div>
                                <div class="for_group bttn">
                                  <button type="submit" class="hvr-rotate">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M12.6667 12.6667V5.33341H3.33333V12.6667H12.6667ZM10.6667 0.666748H12V2.00008H12.6667C13.0203 2.00008 13.3594 2.14056 13.6095 2.39061C13.8595 2.64065 14 2.97979 14 3.33341V12.6667C14 13.4067 13.4067 14.0001 12.6667 14.0001H3.33333C2.97971 14.0001 2.64057 13.8596 2.39052 13.6096C2.14048 13.3595 2 13.0204 2 12.6667V3.33341C2 2.59341 2.59333 2.00008 3.33333 2.00008H4V0.666748H5.33333V2.00008H10.6667V0.666748ZM7.33333 6.33341H8.66667V8.33341H10.6667V9.66675H8.66667V11.6667H7.33333V9.66675H5.33333V8.33341H7.33333V6.33341Z" fill="white"></path>
                                    </svg>
                                    Save</button>
                                </div>
                              </form>
                              <script>
  $(document).ready(function() {
    // When the anchor tag is clicked, show the form
    $('#his_edit_event_ar{{ $eventsDataList->id }}').click(function() {
      $('#eventFormddd_edit{{ $eventsDataList->id }}').slideDown(); // Show the form
    });

    // Optionally, you can hide the form when the "close" button is clicked
    $('#close_event_edit_ar{{ $eventsDataList->id }}').click(function() {
      $('#eventFormddd_edit{{ $eventsDataList->id }}').slideUp(); // Hide the form
    });
  });
</script>
                              @endforeach
                              
                                 
                                 <!--edit form end for event-->
                              
<script>
  $(document).ready(function() {
    // Form submission handler
    $('#eventFormddd').submit(function(e) {
      e.preventDefault(); // Prevent default form submission behavior

      let form = $('#eventFormddd')[0];
      const formData = new FormData(form);

      $.ajax({
        type: 'POST',
        url: '{{ route('addEvents') }}',
        data: formData,
        processData: false, // Ensure files are handled properly
        contentType: false, // Ensure files are handled properly
        dataType: 'json',

        success: function(response) {
          if (response.success) {
            toastr.success(response.success); // Show success message

            // Store a flag in localStorage to trigger actions after page reload
            localStorage.setItem('triggerShowButton', 'true');

            // Reload the page after a short delay
            setTimeout(function() {
              window.location.reload(); // Reload the page
              openTabbb('dsc');
            }, 500);
          } else {
            toastr.error(response.error); // Show error message
          }
        },
        error: function() {
          toastr.error('Failed to add the event!'); // Show error message
        }
      });
    });

    // Check if the flag exists in localStorage after reload
    if (localStorage.getItem('triggerShowButton')) {
      // Trigger the click on the button after the page has reloaded
      $('#show_form_event').click();

      // Remove the flag after clicking to avoid repeating the action
      localStorage.removeItem('triggerShowButton');
    }
  });
</script>




                            </div>

                            <div class="event_details_fl">
                              <div class="deatils_heda">
                                <div class="chose_datte">
                                  <h2>Choose Date</h2>
                                </div>
                                <div class="svg_caldr">
                                  <div class="input_behidd">
                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <circle cx="14" cy="14" r="13.25" stroke="black" stroke-width="1.5"></circle>
                                      <path d="M18.9 7.46652H17.7333V6.29985C17.7333 6.1142 17.6596 5.93615 17.5283 5.80488C17.397 5.6736 17.219 5.59985 17.0333 5.59985C16.8477 5.59985 16.6696 5.6736 16.5384 5.80488C16.4071 5.93615 16.3333 6.1142 16.3333 6.29985V7.46652H12.1333V6.29985C12.1333 6.1142 12.0596 5.93615 11.9283 5.80488C11.797 5.6736 11.619 5.59985 11.4333 5.59985C11.2477 5.59985 11.0696 5.6736 10.9384 5.80488C10.8071 5.93615 10.7333 6.1142 10.7333 6.29985V7.46652H9.56667C8.88594 7.46652 8.2331 7.73694 7.75176 8.21828C7.27042 8.69962 7 9.35246 7 10.0332V20.2999C7 20.9806 7.27042 21.6334 7.75176 22.1148C8.2331 22.5961 8.88594 22.8665 9.56667 22.8665H18.9C19.5807 22.8665 20.2336 22.5961 20.7149 22.1148C21.1963 21.6334 21.4667 20.9806 21.4667 20.2999V10.0332C21.4667 9.35246 21.1963 8.69962 20.7149 8.21828C20.2336 7.73694 19.5807 7.46652 18.9 7.46652ZM9.56667 8.86652H10.7333V10.0332C10.7333 10.2188 10.8071 10.3969 10.9384 10.5282C11.0696 10.6594 11.2477 10.7332 11.4333 10.7332C11.619 10.7332 11.797 10.6594 11.9283 10.5282C12.0596 10.3969 12.1333 10.2188 12.1333 10.0332V8.86652H16.3333V10.0332C16.3333 10.2188 16.4071 10.3969 16.5384 10.5282C16.6696 10.6594 16.8477 10.7332 17.0333 10.7332C17.219 10.7332 17.397 10.6594 17.5283 10.5282C17.6596 10.3969 17.7333 10.2188 17.7333 10.0332V8.86652H18.9C19.2094 8.86652 19.5062 8.98944 19.725 9.20823C19.9438 9.42702 20.0667 9.72377 20.0667 10.0332V12.5999H8.4V10.0332C8.4 9.72377 8.52292 9.42702 8.74171 9.20823C8.9605 8.98944 9.25725 8.86652 9.56667 8.86652ZM18.9 21.4665H9.56667C9.25725 21.4665 8.9605 21.3436 8.74171 21.1248C8.52292 20.906 8.4 20.6093 8.4 20.2999V13.9999H20.0667V20.2999C20.0667 20.6093 19.9438 20.906 19.725 21.1248C19.5062 21.3436 19.2094 21.4665 18.9 21.4665Z" fill="black"></path>
                                    </svg>
                                    <input type="date" id="eventDate" name="eventDate">
                                  </div>
                                  <script>
                                    // $today = Carbon::now() -> toDateString(); // Get the current date in YYYY-MM-DD format
                                  </script>
                                  <h2>
                                    {{ $currentDate->format('d F') }} 
                                    <span>
                                      {{ $currentDate->format('Y') }} 
                                    </span>
                                  </h2>
                                </div>

                              </div>

                              <div class="reinder_an_history">
                                <h3>Events & Reminders</h3>
                                <ul id="re_render_events">
                                @foreach($eventsData as $eventsDataList)
                                  <li>
                                    <div class="icon_his_ani">
                                      @if($eventsDataList->eventType  == "anniversary")
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.35 0.283171C6.24903 0.207441 6.12622 0.166504 6 0.166504C5.87378 0.166504 5.75097 0.207441 5.65 0.283171C5.4068 0.469139 5.18267 0.678808 4.98092 0.909087C4.67583 1.25267 4.25 1.83192 4.25 2.49984C4.25 2.96397 4.43437 3.40909 4.76256 3.73727C5.09075 4.06546 5.53587 4.24984 6 4.24984H2.5C2.03587 4.24984 1.59075 4.43421 1.26256 4.7624C0.934375 5.09059 0.75 5.53571 0.75 5.99984V7.1665C0.75 7.8875 1.57308 8.29934 2.15 7.8665L2.53908 7.57484C2.64006 7.49911 2.76287 7.45817 2.88908 7.45817C3.0153 7.45817 3.13811 7.49911 3.23908 7.57484L3.39425 7.6915C3.69717 7.91869 4.0656 8.0415 4.44425 8.0415C4.8229 8.0415 5.19133 7.91869 5.49425 7.6915L5.65 7.57484C5.75097 7.49911 5.87378 7.45817 6 7.45817C6.12622 7.45817 6.24903 7.49911 6.35 7.57484L6.50575 7.6915C6.80867 7.91869 7.1771 8.0415 7.55575 8.0415C7.9344 8.0415 8.30283 7.91869 8.60575 7.6915L8.76092 7.57484C8.86189 7.49911 8.9847 7.45817 9.11092 7.45817C9.23713 7.45817 9.35994 7.49911 9.46092 7.57484L9.85 7.8665C10.4269 8.29934 11.25 7.8875 11.25 7.1665V5.99984C11.25 5.53571 11.0656 5.09059 10.7374 4.7624C10.4092 4.43421 9.96413 4.24984 9.5 4.24984H6C6.46413 4.24984 6.90925 4.06546 7.23744 3.73727C7.56563 3.40909 7.75 2.96397 7.75 2.49984C7.75 1.83192 7.32417 1.25267 7.01908 0.909087C6.81725 0.681587 6.59325 0.465754 6.35 0.283171ZM1.33333 9.15859V10.6665C1.33333 10.9759 1.45625 11.2727 1.67504 11.4915C1.89383 11.7103 2.19058 11.8332 2.5 11.8332H9.5C9.80942 11.8332 10.1062 11.7103 10.325 11.4915C10.5437 11.2727 10.6667 10.9759 10.6667 10.6665V9.15859C10.5309 9.20778 10.385 9.22207 10.2423 9.20016C10.0996 9.17825 9.96472 9.12082 9.85 9.03317L9.46092 8.7415C9.35994 8.66578 9.23713 8.62484 9.11092 8.62484C8.9847 8.62484 8.86189 8.66578 8.76092 8.7415L8.60575 8.85817C8.30283 9.08536 7.9344 9.20817 7.55575 9.20817C7.1771 9.20817 6.80867 9.08536 6.50575 8.85817L6.35 8.7415C6.24903 8.66578 6.12622 8.62484 6 8.62484C5.87378 8.62484 5.75097 8.66578 5.65 8.7415L5.49425 8.85817C5.19133 9.08536 4.8229 9.20817 4.44425 9.20817C4.0656 9.20817 3.69717 9.08536 3.39425 8.85817L3.23908 8.7415C3.13811 8.66578 3.0153 8.62484 2.88908 8.62484C2.76287 8.62484 2.64006 8.66578 2.53908 8.7415L2.15 9.03317C2.03528 9.12082 1.90038 9.17825 1.75768 9.20016C1.61498 9.22207 1.46907 9.20778 1.33333 9.15859Z" fill="#434343" />
                                      </svg>
                                      
                                      @else
                                      <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M11.25 10.0832V10.6665H0.75V10.0832L1.91667 8.9165V5.4165C1.91667 3.60817 3.10083 2.01567 4.83333 1.50234V1.33317C4.83333 1.02375 4.95625 0.727005 5.17504 0.508213C5.39383 0.28942 5.69058 0.166504 6 0.166504C6.30942 0.166504 6.60616 0.28942 6.82496 0.508213C7.04375 0.727005 7.16667 1.02375 7.16667 1.33317V1.50234C8.89917 2.01567 10.0833 3.60817 10.0833 5.4165V8.9165L11.25 10.0832ZM7.16667 11.2498C7.16667 11.5593 7.04375 11.856 6.82496 12.0748C6.60616 12.2936 6.30942 12.4165 6 12.4165C5.69058 12.4165 5.39383 12.2936 5.17504 12.0748C4.95625 11.856 4.83333 11.5593 4.83333 11.2498" fill="#434343"/>
                                      </svg> 

                                      @endif

                                                                        
                                      <span>{{ $eventsDataList->eventName }}</span>
                                    </div>
                                    <div class="his_edit_event{{ $eventsDataList->id }} his_edit_event_nt" id="edit_event_id{{ $eventsDataList->id }}">
                                        
                                        <button class="task_edit_del" id="his_edit_event_del" type="button" data-eventtask-id="{{ $eventsDataList->id }}">
                                              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                   <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                                   </svg>
                                              </button>
                                      <a id="his_edit_event_ar{{ $eventsDataList->id }}" class="his_edit_event_ar">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M14.241 1.50879L16.491 3.75879L14.7758 5.47479L12.5258 3.22479L14.241 1.50879ZM6 11.9998H8.25L13.7153 6.53454L11.4653 4.28454L6 9.74979V11.9998Z" fill="#434343" />
                                          <path d="M14.25 14.25H6.1185C6.099 14.25 6.07875 14.2575 6.05925 14.2575C6.0345 14.2575 6.00975 14.2507 5.98425 14.25H3.75V3.75H8.88525L10.3853 2.25H3.75C2.92275 2.25 2.25 2.922 2.25 3.75V14.25C2.25 15.078 2.92275 15.75 3.75 15.75H14.25C14.6478 15.75 15.0294 15.592 15.3107 15.3107C15.592 15.0294 15.75 14.6478 15.75 14.25V7.749L14.25 9.249V14.25Z" fill="#434343" />
                                        </svg>
                                      </a>
                                    </div>
                                  </li>

                                  @endforeach
                                  

                                </ul>
                              </div>

                            </div>

                          </div>

                        </div>


                      </div>

                    </div>
                    <!-- sidebar calander end -->

                  </div>
                </div>

              </div>

              <div class="right_event col-md-6">

                <div class="event_repet">
                  <h2>Events & Reminders</h2>
                  <div class="cake_et">
                    <!-- <div class="cake_icon">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_285_1341)">
<path d="M15.75 2.75C15.5336 2.58772 15.2705 2.5 15 2.5C14.7295 2.5 14.4664 2.58772 14.25 2.75C13.7288 3.1485 13.2486 3.59779 12.8162 4.09125C12.1625 4.8275 11.25 6.06875 11.25 7.5C11.25 8.49456 11.6451 9.44839 12.3483 10.1517C13.0516 10.8549 14.0054 11.25 15 11.25H7.5C6.50544 11.25 5.55161 11.6451 4.84835 12.3483C4.14509 13.0516 3.75 14.0054 3.75 15V17.5C3.75 19.045 5.51375 19.9275 6.75 19L7.58375 18.375C7.80012 18.2127 8.06329 18.125 8.33375 18.125C8.60421 18.125 8.86738 18.2127 9.08375 18.375L9.41625 18.625C10.0654 19.1118 10.8549 19.375 11.6663 19.375C12.4776 19.375 13.2671 19.1118 13.9163 18.625L14.25 18.375C14.4664 18.2127 14.7295 18.125 15 18.125C15.2705 18.125 15.5336 18.2127 15.75 18.375L16.0837 18.625C16.7329 19.1118 17.5224 19.375 18.3337 19.375C19.1451 19.375 19.9346 19.1118 20.5837 18.625L20.9163 18.375C21.1326 18.2127 21.3958 18.125 21.6663 18.125C21.9367 18.125 22.1999 18.2127 22.4163 18.375L23.25 19C24.4862 19.9275 26.25 19.045 26.25 17.5V15C26.25 14.0054 25.8549 13.0516 25.1517 12.3483C24.4484 11.6451 23.4946 11.25 22.5 11.25H15C15.9946 11.25 16.9484 10.8549 17.6517 10.1517C18.3549 9.44839 18.75 8.49456 18.75 7.5C18.75 6.06875 17.8375 4.8275 17.1838 4.09125C16.7512 3.60375 16.2713 3.14125 15.75 2.75ZM5 21.7688V25C5 25.663 5.26339 26.2989 5.73223 26.7678C6.20107 27.2366 6.83696 27.5 7.5 27.5H22.5C23.163 27.5 23.7989 27.2366 24.2678 26.7678C24.7366 26.2989 25 25.663 25 25V21.7688C24.7091 21.8742 24.3965 21.9048 24.0907 21.8578C23.7849 21.8109 23.4958 21.6878 23.25 21.5L22.4163 20.875C22.1999 20.7127 21.9367 20.625 21.6663 20.625C21.3958 20.625 21.1326 20.7127 20.9163 20.875L20.5837 21.125C19.9346 21.6118 19.1451 21.875 18.3337 21.875C17.5224 21.875 16.7329 21.6118 16.0837 21.125L15.75 20.875C15.5336 20.7127 15.2705 20.625 15 20.625C14.7295 20.625 14.4664 20.7127 14.25 20.875L13.9163 21.125C13.2671 21.6118 12.4776 21.875 11.6663 21.875C10.8549 21.875 10.0654 21.6118 9.41625 21.125L9.08375 20.875C8.86738 20.7127 8.60421 20.625 8.33375 20.625C8.06329 20.625 7.80012 20.7127 7.58375 20.875L6.75 21.5C6.50418 21.6878 6.2151 21.8109 5.90932 21.8578C5.60353 21.9048 5.29085 21.8742 5 21.7688Z" fill="#A3AED0"/>
</g>
<defs>
<clipPath id="clip0_285_1341">
<rect width="30" height="30" fill="white"/>
</clipPath>
</defs>
</svg>
</div> -->
                    <div class="cake_text marquee-container">
@if(count($upcomingevent) > 6)
    <div class="marquee">
          <ul id="marquee-list">
                            
                           @foreach($upcomingevent as $upevent)
                                @if($upevent->eventType == "anniversary")

                          <li class="brday"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0_285_1341)">
                                <path d="M15.75 2.75C15.5336 2.58772 15.2705 2.5 15 2.5C14.7295 2.5 14.4664 2.58772 14.25 2.75C13.7288 3.1485 13.2486 3.59779 12.8162 4.09125C12.1625 4.8275 11.25 6.06875 11.25 7.5C11.25 8.49456 11.6451 9.44839 12.3483 10.1517C13.0516 10.8549 14.0054 11.25 15 11.25H7.5C6.50544 11.25 5.55161 11.6451 4.84835 12.3483C4.14509 13.0516 3.75 14.0054 3.75 15V17.5C3.75 19.045 5.51375 19.9275 6.75 19L7.58375 18.375C7.80012 18.2127 8.06329 18.125 8.33375 18.125C8.60421 18.125 8.86738 18.2127 9.08375 18.375L9.41625 18.625C10.0654 19.1118 10.8549 19.375 11.6663 19.375C12.4776 19.375 13.2671 19.1118 13.9163 18.625L14.25 18.375C14.4664 18.2127 14.7295 18.125 15 18.125C15.2705 18.125 15.5336 18.2127 15.75 18.375L16.0837 18.625C16.7329 19.1118 17.5224 19.375 18.3337 19.375C19.1451 19.375 19.9346 19.1118 20.5837 18.625L20.9163 18.375C21.1326 18.2127 21.3958 18.125 21.6663 18.125C21.9367 18.125 22.1999 18.2127 22.4163 18.375L23.25 19C24.4862 19.9275 26.25 19.045 26.25 17.5V15C26.25 14.0054 25.8549 13.0516 25.1517 12.3483C24.4484 11.6451 23.4946 11.25 22.5 11.25H15C15.9946 11.25 16.9484 10.8549 17.6517 10.1517C18.3549 9.44839 18.75 8.49456 18.75 7.5C18.75 6.06875 17.8375 4.8275 17.1838 4.09125C16.7512 3.60375 16.2713 3.14125 15.75 2.75ZM5 21.7688V25C5 25.663 5.26339 26.2989 5.73223 26.7678C6.20107 27.2366 6.83696 27.5 7.5 27.5H22.5C23.163 27.5 23.7989 27.2366 24.2678 26.7678C24.7366 26.2989 25 25.663 25 25V21.7688C24.7091 21.8742 24.3965 21.9048 24.0907 21.8578C23.7849 21.8109 23.4958 21.6878 23.25 21.5L22.4163 20.875C22.1999 20.7127 21.9367 20.625 21.6663 20.625C21.3958 20.625 21.1326 20.7127 20.9163 20.875L20.5837 21.125C19.9346 21.6118 19.1451 21.875 18.3337 21.875C17.5224 21.875 16.7329 21.6118 16.0837 21.125L15.75 20.875C15.5336 20.7127 15.2705 20.625 15 20.625C14.7295 20.625 14.4664 20.7127 14.25 20.875L13.9163 21.125C13.2671 21.6118 12.4776 21.875 11.6663 21.875C10.8549 21.875 10.0654 21.6118 9.41625 21.125L9.08375 20.875C8.86738 20.7127 8.60421 20.625 8.33375 20.625C8.06329 20.625 7.80012 20.7127 7.58375 20.875L6.75 21.5C6.50418 21.6878 6.2151 21.8109 5.90932 21.8578C5.60353 21.9048 5.29085 21.8742 5 21.7688Z" fill="#A3AED0" />
                              </g>
                              <defs>
                                <clipPath id="clip0_285_1341">
                                  <rect width="30" height="30" fill="white" />
                                </clipPath>
                              </defs>
                            </svg>  {{ $upevent->eventName }} {{ $upevent->eventDate}}</li>
                            
                            
                       

                         @elseif($upevent->eventType == "reminder")

                          <li class="reindr"> <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M26.25 23.75V25H3.75V23.75L6.25 21.25V13.75C6.25 9.875 8.7875 6.4625 12.5 5.3625V5C12.5 4.33696 12.7634 3.70107 13.2322 3.23223C13.7011 2.76339 14.337 2.5 15 2.5C15.663 2.5 16.2989 2.76339 16.7678 3.23223C17.2366 3.70107 17.5 4.33696 17.5 5V5.3625C21.2125 6.4625 23.75 9.875 23.75 13.75V21.25L26.25 23.75ZM17.5 26.25C17.5 26.913 17.2366 27.5489 16.7678 28.0178C16.2989 28.4866 15.663 28.75 15 28.75C14.337 28.75 13.7011 28.4866 13.2322 28.0178C12.7634 27.5489 12.5 26.913 12.5 26.25" fill="#A3AED0" />
                            </svg> {{ $upevent->eventName}} {{ $upevent->eventDate}}</li>
                            
                            @endif
                            
                            @endforeach
@foreach($upcomingevent as $upevent)
                                @if($upevent->eventType == "anniversary")

                          <li class="brday"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0_285_1341)">
                                <path d="M15.75 2.75C15.5336 2.58772 15.2705 2.5 15 2.5C14.7295 2.5 14.4664 2.58772 14.25 2.75C13.7288 3.1485 13.2486 3.59779 12.8162 4.09125C12.1625 4.8275 11.25 6.06875 11.25 7.5C11.25 8.49456 11.6451 9.44839 12.3483 10.1517C13.0516 10.8549 14.0054 11.25 15 11.25H7.5C6.50544 11.25 5.55161 11.6451 4.84835 12.3483C4.14509 13.0516 3.75 14.0054 3.75 15V17.5C3.75 19.045 5.51375 19.9275 6.75 19L7.58375 18.375C7.80012 18.2127 8.06329 18.125 8.33375 18.125C8.60421 18.125 8.86738 18.2127 9.08375 18.375L9.41625 18.625C10.0654 19.1118 10.8549 19.375 11.6663 19.375C12.4776 19.375 13.2671 19.1118 13.9163 18.625L14.25 18.375C14.4664 18.2127 14.7295 18.125 15 18.125C15.2705 18.125 15.5336 18.2127 15.75 18.375L16.0837 18.625C16.7329 19.1118 17.5224 19.375 18.3337 19.375C19.1451 19.375 19.9346 19.1118 20.5837 18.625L20.9163 18.375C21.1326 18.2127 21.3958 18.125 21.6663 18.125C21.9367 18.125 22.1999 18.2127 22.4163 18.375L23.25 19C24.4862 19.9275 26.25 19.045 26.25 17.5V15C26.25 14.0054 25.8549 13.0516 25.1517 12.3483C24.4484 11.6451 23.4946 11.25 22.5 11.25H15C15.9946 11.25 16.9484 10.8549 17.6517 10.1517C18.3549 9.44839 18.75 8.49456 18.75 7.5C18.75 6.06875 17.8375 4.8275 17.1838 4.09125C16.7512 3.60375 16.2713 3.14125 15.75 2.75ZM5 21.7688V25C5 25.663 5.26339 26.2989 5.73223 26.7678C6.20107 27.2366 6.83696 27.5 7.5 27.5H22.5C23.163 27.5 23.7989 27.2366 24.2678 26.7678C24.7366 26.2989 25 25.663 25 25V21.7688C24.7091 21.8742 24.3965 21.9048 24.0907 21.8578C23.7849 21.8109 23.4958 21.6878 23.25 21.5L22.4163 20.875C22.1999 20.7127 21.9367 20.625 21.6663 20.625C21.3958 20.625 21.1326 20.7127 20.9163 20.875L20.5837 21.125C19.9346 21.6118 19.1451 21.875 18.3337 21.875C17.5224 21.875 16.7329 21.6118 16.0837 21.125L15.75 20.875C15.5336 20.7127 15.2705 20.625 15 20.625C14.7295 20.625 14.4664 20.7127 14.25 20.875L13.9163 21.125C13.2671 21.6118 12.4776 21.875 11.6663 21.875C10.8549 21.875 10.0654 21.6118 9.41625 21.125L9.08375 20.875C8.86738 20.7127 8.60421 20.625 8.33375 20.625C8.06329 20.625 7.80012 20.7127 7.58375 20.875L6.75 21.5C6.50418 21.6878 6.2151 21.8109 5.90932 21.8578C5.60353 21.9048 5.29085 21.8742 5 21.7688Z" fill="#A3AED0" />
                              </g>
                              <defs>
                                <clipPath id="clip0_285_1341">
                                  <rect width="30" height="30" fill="white" />
                                </clipPath>
                              </defs>
                            </svg>  {{ $upevent->eventName }} {{ $upevent->eventDate}}</li>
                            
                            
                       

                         @elseif($upevent->eventType == "reminder")

                          <li class="reindr"> <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M26.25 23.75V25H3.75V23.75L6.25 21.25V13.75C6.25 9.875 8.7875 6.4625 12.5 5.3625V5C12.5 4.33696 12.7634 3.70107 13.2322 3.23223C13.7011 2.76339 14.337 2.5 15 2.5C15.663 2.5 16.2989 2.76339 16.7678 3.23223C17.2366 3.70107 17.5 4.33696 17.5 5V5.3625C21.2125 6.4625 23.75 9.875 23.75 13.75V21.25L26.25 23.75ZM17.5 26.25C17.5 26.913 17.2366 27.5489 16.7678 28.0178C16.2989 28.4866 15.663 28.75 15 28.75C14.337 28.75 13.7011 28.4866 13.2322 28.0178C12.7634 27.5489 12.5 26.913 12.5 26.25" fill="#A3AED0" />
                            </svg> {{ $upevent->eventName}} {{ $upevent->eventDate}}</li>
                            
                            @endif
                            
                            @endforeach
                          
                        </ul>
                      </div>
@elseif(count($upcomingevent) >= 1 && count($upcomingevent) <= 6)
   <div class="marquee noanimation">
          <ul id="marquee-list">
                            
                           @foreach($upcomingevent as $upevent)
                                @if($upevent->eventType == "anniversary")

                          <li class="brday"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0_285_1341)">
                                <path d="M15.75 2.75C15.5336 2.58772 15.2705 2.5 15 2.5C14.7295 2.5 14.4664 2.58772 14.25 2.75C13.7288 3.1485 13.2486 3.59779 12.8162 4.09125C12.1625 4.8275 11.25 6.06875 11.25 7.5C11.25 8.49456 11.6451 9.44839 12.3483 10.1517C13.0516 10.8549 14.0054 11.25 15 11.25H7.5C6.50544 11.25 5.55161 11.6451 4.84835 12.3483C4.14509 13.0516 3.75 14.0054 3.75 15V17.5C3.75 19.045 5.51375 19.9275 6.75 19L7.58375 18.375C7.80012 18.2127 8.06329 18.125 8.33375 18.125C8.60421 18.125 8.86738 18.2127 9.08375 18.375L9.41625 18.625C10.0654 19.1118 10.8549 19.375 11.6663 19.375C12.4776 19.375 13.2671 19.1118 13.9163 18.625L14.25 18.375C14.4664 18.2127 14.7295 18.125 15 18.125C15.2705 18.125 15.5336 18.2127 15.75 18.375L16.0837 18.625C16.7329 19.1118 17.5224 19.375 18.3337 19.375C19.1451 19.375 19.9346 19.1118 20.5837 18.625L20.9163 18.375C21.1326 18.2127 21.3958 18.125 21.6663 18.125C21.9367 18.125 22.1999 18.2127 22.4163 18.375L23.25 19C24.4862 19.9275 26.25 19.045 26.25 17.5V15C26.25 14.0054 25.8549 13.0516 25.1517 12.3483C24.4484 11.6451 23.4946 11.25 22.5 11.25H15C15.9946 11.25 16.9484 10.8549 17.6517 10.1517C18.3549 9.44839 18.75 8.49456 18.75 7.5C18.75 6.06875 17.8375 4.8275 17.1838 4.09125C16.7512 3.60375 16.2713 3.14125 15.75 2.75ZM5 21.7688V25C5 25.663 5.26339 26.2989 5.73223 26.7678C6.20107 27.2366 6.83696 27.5 7.5 27.5H22.5C23.163 27.5 23.7989 27.2366 24.2678 26.7678C24.7366 26.2989 25 25.663 25 25V21.7688C24.7091 21.8742 24.3965 21.9048 24.0907 21.8578C23.7849 21.8109 23.4958 21.6878 23.25 21.5L22.4163 20.875C22.1999 20.7127 21.9367 20.625 21.6663 20.625C21.3958 20.625 21.1326 20.7127 20.9163 20.875L20.5837 21.125C19.9346 21.6118 19.1451 21.875 18.3337 21.875C17.5224 21.875 16.7329 21.6118 16.0837 21.125L15.75 20.875C15.5336 20.7127 15.2705 20.625 15 20.625C14.7295 20.625 14.4664 20.7127 14.25 20.875L13.9163 21.125C13.2671 21.6118 12.4776 21.875 11.6663 21.875C10.8549 21.875 10.0654 21.6118 9.41625 21.125L9.08375 20.875C8.86738 20.7127 8.60421 20.625 8.33375 20.625C8.06329 20.625 7.80012 20.7127 7.58375 20.875L6.75 21.5C6.50418 21.6878 6.2151 21.8109 5.90932 21.8578C5.60353 21.9048 5.29085 21.8742 5 21.7688Z" fill="#A3AED0" />
                              </g>
                              <defs>
                                <clipPath id="clip0_285_1341">
                                  <rect width="30" height="30" fill="white" />
                                </clipPath>
                              </defs>
                            </svg>  {{ $upevent->eventName }} {{ $upevent->eventDate}}</li>
                            
                            
                       

                         @elseif($upevent->eventType == "reminder")

                          <li class="reindr"> <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M26.25 23.75V25H3.75V23.75L6.25 21.25V13.75C6.25 9.875 8.7875 6.4625 12.5 5.3625V5C12.5 4.33696 12.7634 3.70107 13.2322 3.23223C13.7011 2.76339 14.337 2.5 15 2.5C15.663 2.5 16.2989 2.76339 16.7678 3.23223C17.2366 3.70107 17.5 4.33696 17.5 5V5.3625C21.2125 6.4625 23.75 9.875 23.75 13.75V21.25L26.25 23.75ZM17.5 26.25C17.5 26.913 17.2366 27.5489 16.7678 28.0178C16.2989 28.4866 15.663 28.75 15 28.75C14.337 28.75 13.7011 28.4866 13.2322 28.0178C12.7634 27.5489 12.5 26.913 12.5 26.25" fill="#A3AED0" />
                            </svg> {{ $upevent->eventName}} {{ $upevent->eventDate}}</li>
                            
                            @endif
                            
                            @endforeach

                          
                        </ul>
                      </div>
                     @elseif(count($upcomingevent) < 1)
<div class="khaliclass">
    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F"></path>
                                <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F"></circle>
                              </svg>
                              <p>No upcoming events</p>
                              </div>
                  
@endif
                      
                      


                    </div>
                  </div>
                </div>

                <script>
                  document.addEventListener("DOMContentLoaded", function() {
                    const marqueeList = document.getElementById('marquee-list');
                    const items = marqueeList.getElementsByTagName('li');
                    const itemHeight = items[0].offsetHeight; // Height of each list item
                    const numItems = items.length;

                    // Adjust the animation duration based on the number of items and their height
                    const animationDuration = (numItems / 2) * itemHeight / 10; // Adjust 10 based on your desired speed
                    marqueeList.parentElement.style.animationDuration = `${animationDuration}s`;
                  });
                </script>

                <!-- <div class="event_repet">
        <h2>Reminders</h2>
        <div class="cake_et">
            <div class="cake_icon">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M26.25 23.75V25H3.75V23.75L6.25 21.25V13.75C6.25 9.875 8.7875 6.4625 12.5 5.3625V5C12.5 4.33696 12.7634 3.70107 13.2322 3.23223C13.7011 2.76339 14.337 2.5 15 2.5C15.663 2.5 16.2989 2.76339 16.7678 3.23223C17.2366 3.70107 17.5 4.33696 17.5 5V5.3625C21.2125 6.4625 23.75 9.875 23.75 13.75V21.25L26.25 23.75ZM17.5 26.25C17.5 26.913 17.2366 27.5489 16.7678 28.0178C16.2989 28.4866 15.663 28.75 15 28.75C14.337 28.75 13.7011 28.4866 13.2322 28.0178C12.7634 27.5489 12.5 26.913 12.5 26.25" fill="#A3AED0"/>
</svg>

</div>
<div class="cake_text">
    <ul>
        <li>Assign tasks to the team</li>
        <li>GST Filing deadline</li>
    </ul>
</div>
</div>
</div> -->

              </div>
            </div>

          </div>
       
          <div class="col-md-3">
              
            @if($user->Document_Repository_Access == 1)
            
            <div class="new_file_reppo_wrap">
            <div class="new_file_reppo">
              <div class="rpo_svg_file">
                <svg width="127" height="127" viewBox="0 0 127 127" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <rect width="127" height="127" fill="url(#pattern0_2983_7156)" />
                  <defs>
                    <pattern id="pattern0_2983_7156" patternContentUnits="objectBoundingBox" width="1" height="1">
                      <use xlink:href="#image0_2983_7156" transform="scale(0.00148148)" />
                    </pattern>
                    <image id="image0_2983_7156" width="675" height="675" xlink:href="data:image/png;base64,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" />
                  </defs>
                </svg>
              </div>
              <div class="repo_new_text">
                <h2>document <span>repository</span></h2>
                <div class="nt_accress">
                  <a href="{{url('/docurepo')}}" target="_blank">Access
                    <svg width="5" height="7" viewBox="0 0 5 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1.45094 0.350098L0.960938 0.875098L3.55094 3.5001L0.960938 6.1251L1.45094 6.6501L4.60094 3.5001L1.45094 0.350098Z" fill="white"></path>
                    </svg>
                  </a>
                </div>

              </div>
            </div>
            <div class="new_rep_pre_defined">
                <div class="top_defined">
                    <div class="add_patth">
                        <svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M12.5396 2.49356C12.1348 2.42492 11.5821 2.41964 10.5859 2.41964C8.89895 2.41964 7.69948 2.4214 6.7913 2.54284C5.90072 2.66164 5.38943 2.88605 5.01718 3.25742C4.64493 3.62967 4.42141 4.14008 4.30261 5.02538C4.18116 5.93004 4.1794 7.12158 4.1794 8.80066V12.3207C4.1794 13.9981 4.18116 15.1896 4.30261 16.0943C4.42141 16.9796 4.64493 17.49 5.01718 17.8631C5.38943 18.2345 5.89984 18.458 6.78514 18.5768C7.6898 18.6991 8.88135 18.7 10.5595 18.7H14.0796C15.7578 18.7 16.9502 18.6982 17.8549 18.5768C18.7393 18.458 19.2497 18.2345 19.622 17.8622C19.9942 17.49 20.2178 16.9796 20.3366 16.0943C20.458 15.1905 20.4598 13.9981 20.4598 12.3199V11.9353C20.4598 10.5836 20.451 9.94293 20.3066 9.45979H17.5522C16.5551 9.45979 15.7411 9.45979 15.0969 9.37355C14.4255 9.28291 13.8429 9.08755 13.3774 8.62202C12.9118 8.15649 12.7165 7.57479 12.6258 6.90158C12.5396 6.25916 12.5396 5.44427 12.5396 4.44632V2.49356ZM13.8596 3.17646V4.39968C13.8596 5.45571 13.8614 6.18084 13.9344 6.72557C14.0048 7.25183 14.1315 7.50967 14.3111 7.68832C14.4897 7.86784 14.7476 7.99456 15.2738 8.06496C15.8185 8.13801 16.5437 8.13977 17.5997 8.13977H19.3773C19.0396 7.8182 18.6964 7.50252 18.3477 7.19286L14.8637 4.05736C14.535 3.75692 14.2003 3.46323 13.8596 3.17646ZM10.7135 1.09961C11.9324 1.09961 12.72 1.09961 13.4442 1.37682C14.1685 1.6549 14.7511 2.17939 15.6531 2.99165L15.7473 3.07613L19.2304 6.21164L19.3404 6.3102C20.3823 7.24743 21.0564 7.85376 21.4181 8.6669C21.7807 9.48004 21.7807 10.3865 21.7798 11.7874V12.3691C21.7798 13.9866 21.7798 15.2679 21.6451 16.2703C21.5061 17.3016 21.2139 18.1368 20.5557 18.7959C19.8966 19.4542 19.0614 19.7463 18.03 19.8854C17.0268 20.02 15.7464 20.02 14.1289 20.02H10.5103C8.89279 20.02 7.61148 20.02 6.60914 19.8854C5.57776 19.7463 4.74262 19.4542 4.08348 18.7959C3.42523 18.1368 3.13306 17.3016 2.99402 16.2703C2.85938 15.267 2.85938 13.9866 2.85938 12.3691V8.75138C2.85938 7.1339 2.85938 5.85259 2.99402 4.85025C3.13306 3.81887 3.42523 2.98373 4.08348 2.3246C4.7435 1.66546 5.58039 1.37418 6.61618 1.23513C7.62292 1.10049 8.91039 1.10049 10.5367 1.10049H10.5859L10.7135 1.09961Z" fill="white"/>
<path d="M17 11C14.2385 11 12 13.2385 12 16C12 18.7615 14.2385 21 17 21C19.7615 21 22 18.7615 22 16C22 13.2385 19.7615 11 17 11ZM19.5 16.5H17.5V18.5H16.5V16.5H14.5V15.5H16.5V13.5H17.5V15.5H19.5V16.5Z" fill="white"/>
<ellipse cx="5.28012" cy="15.8387" rx="5.28012" ry="5.28012" fill="white"/>
<path d="M3.61418 17.7988V13.4788H4.15418L6.40718 16.8538V13.4788H6.94718V17.7988H6.40718L4.15418 14.4208V17.7988H3.61418Z" fill="#5D5D5D"/>
</svg>
<span>Add a Pre-Defined path?</span>
                    </div>
                    <div class="pre_button_add">
                        <a href="#"><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.25 6.75H0.75V5.25H5.25V0.75H6.75V5.25H11.25V6.75H6.75V11.25H5.25V6.75Z" fill="#CEFFA8"/>
</svg> ADD</a>
                    </div>
                </div>
                <div class="pre_messagee">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.25 4.25H8.75V5.75H7.25V4.25ZM7.25 7.25H8.75V11.75H7.25V7.25ZM8 0.5C3.86 0.5 0.5 3.86 0.5 8C0.5 12.14 3.86 15.5 8 15.5C12.14 15.5 15.5 12.14 15.5 8C15.5 3.86 12.14 0.5 8 0.5ZM8 14C4.6925 14 2 11.3075 2 8C2 4.6925 4.6925 2 8 2C11.3075 2 14 4.6925 14 8C14 11.3075 11.3075 14 8 14Z" fill="#ABABAB"/>
</svg>
                    <span>Pre-Defined paths are fixed paths where users have to upload ‘n’ no. of files</span>
                </div>
            </div>
            </div>
            
            @else
            
            <div class="new_file_reppo_wrap accress_denied">
            <div class="new_file_reppo">
              <div class="rpo_svg_file">
                <svg width="127" height="127" viewBox="0 0 127 127" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <rect width="127" height="127" fill="url(#pattern0_2983_7156)" />
                  <defs>
                    <pattern id="pattern0_2983_7156" patternContentUnits="objectBoundingBox" width="1" height="1">
                      <use xlink:href="#image0_2983_7156" transform="scale(0.00148148)" />
                    </pattern>
                    <image id="image0_2983_7156" width="675" height="675" xlink:href="data:image/png;base64,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" />
                  </defs>
                </svg>
              </div>
              <div class="repo_new_text">
                <h2>document <span>repository</span></h2>
                <div class="nt_accress">
                   <a class="nt_cl_accress">Access
                    <svg width="5" height="7" viewBox="0 0 5 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1.45094 0.350098L0.960938 0.875098L3.55094 3.5001L0.960938 6.1251L1.45094 6.6501L4.60094 3.5001L1.45094 0.350098Z" fill="white"></path>
                    </svg>
                  </a>
                </div>

              </div>
            </div>
            <div class="new_rep_pre_defined">
                <div class="top_defined">
                    <div class="add_patth">
                        <svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M12.5396 2.49356C12.1348 2.42492 11.5821 2.41964 10.5859 2.41964C8.89895 2.41964 7.69948 2.4214 6.7913 2.54284C5.90072 2.66164 5.38943 2.88605 5.01718 3.25742C4.64493 3.62967 4.42141 4.14008 4.30261 5.02538C4.18116 5.93004 4.1794 7.12158 4.1794 8.80066V12.3207C4.1794 13.9981 4.18116 15.1896 4.30261 16.0943C4.42141 16.9796 4.64493 17.49 5.01718 17.8631C5.38943 18.2345 5.89984 18.458 6.78514 18.5768C7.6898 18.6991 8.88135 18.7 10.5595 18.7H14.0796C15.7578 18.7 16.9502 18.6982 17.8549 18.5768C18.7393 18.458 19.2497 18.2345 19.622 17.8622C19.9942 17.49 20.2178 16.9796 20.3366 16.0943C20.458 15.1905 20.4598 13.9981 20.4598 12.3199V11.9353C20.4598 10.5836 20.451 9.94293 20.3066 9.45979H17.5522C16.5551 9.45979 15.7411 9.45979 15.0969 9.37355C14.4255 9.28291 13.8429 9.08755 13.3774 8.62202C12.9118 8.15649 12.7165 7.57479 12.6258 6.90158C12.5396 6.25916 12.5396 5.44427 12.5396 4.44632V2.49356ZM13.8596 3.17646V4.39968C13.8596 5.45571 13.8614 6.18084 13.9344 6.72557C14.0048 7.25183 14.1315 7.50967 14.3111 7.68832C14.4897 7.86784 14.7476 7.99456 15.2738 8.06496C15.8185 8.13801 16.5437 8.13977 17.5997 8.13977H19.3773C19.0396 7.8182 18.6964 7.50252 18.3477 7.19286L14.8637 4.05736C14.535 3.75692 14.2003 3.46323 13.8596 3.17646ZM10.7135 1.09961C11.9324 1.09961 12.72 1.09961 13.4442 1.37682C14.1685 1.6549 14.7511 2.17939 15.6531 2.99165L15.7473 3.07613L19.2304 6.21164L19.3404 6.3102C20.3823 7.24743 21.0564 7.85376 21.4181 8.6669C21.7807 9.48004 21.7807 10.3865 21.7798 11.7874V12.3691C21.7798 13.9866 21.7798 15.2679 21.6451 16.2703C21.5061 17.3016 21.2139 18.1368 20.5557 18.7959C19.8966 19.4542 19.0614 19.7463 18.03 19.8854C17.0268 20.02 15.7464 20.02 14.1289 20.02H10.5103C8.89279 20.02 7.61148 20.02 6.60914 19.8854C5.57776 19.7463 4.74262 19.4542 4.08348 18.7959C3.42523 18.1368 3.13306 17.3016 2.99402 16.2703C2.85938 15.267 2.85938 13.9866 2.85938 12.3691V8.75138C2.85938 7.1339 2.85938 5.85259 2.99402 4.85025C3.13306 3.81887 3.42523 2.98373 4.08348 2.3246C4.7435 1.66546 5.58039 1.37418 6.61618 1.23513C7.62292 1.10049 8.91039 1.10049 10.5367 1.10049H10.5859L10.7135 1.09961Z" fill="white"/>
<path d="M17 11C14.2385 11 12 13.2385 12 16C12 18.7615 14.2385 21 17 21C19.7615 21 22 18.7615 22 16C22 13.2385 19.7615 11 17 11ZM19.5 16.5H17.5V18.5H16.5V16.5H14.5V15.5H16.5V13.5H17.5V15.5H19.5V16.5Z" fill="white"/>
<ellipse cx="5.28012" cy="15.8387" rx="5.28012" ry="5.28012" fill="white"/>
<path d="M3.61418 17.7988V13.4788H4.15418L6.40718 16.8538V13.4788H6.94718V17.7988H6.40718L4.15418 14.4208V17.7988H3.61418Z" fill="#5D5D5D"/>
</svg>
<span>Add a Pre-Defined path?</span>
                    </div>
                    <div class="pre_button_add">
                        <a href="#" style="pointer-events: none;"><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.25 6.75H0.75V5.25H5.25V0.75H6.75V5.25H11.25V6.75H6.75V11.25H5.25V6.75Z" fill="#CEFFA8"/>
</svg> ADD</a>
                    </div>
                </div>
                <div class="pre_messagee">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.25 4.25H8.75V5.75H7.25V4.25ZM7.25 7.25H8.75V11.75H7.25V7.25ZM8 0.5C3.86 0.5 0.5 3.86 0.5 8C0.5 12.14 3.86 15.5 8 15.5C12.14 15.5 15.5 12.14 15.5 8C15.5 3.86 12.14 0.5 8 0.5ZM8 14C4.6925 14 2 11.3075 2 8C2 4.6925 4.6925 2 8 2C11.3075 2 14 4.6925 14 8C14 11.3075 11.3075 14 8 14Z" fill="#ABABAB"/>
</svg>
                    <span>Pre-Defined paths are fixed paths where users have to upload ‘n’ no. of files</span>
                </div>
            </div>
            </div>
            
            @endif

          </div>
         
        </div>
      </div>
      
    
      
   
      
      
      <!-- Container-fluid Ends-->

      <!-- Container-fluid start-->
      <!-- <div class="container-fluid  Bottom_role">
        <div class="row">

        <div class="col-md-4">
    <div class="repeat_eup pattern">
        <h2 class="in_title">Shareholding Pattern</h2>
        <div class="company_valuation">
<h2><span>Company Valuation</span>$256million</h2>
<div class="three_docts">
<svg width="16" height="4" viewBox="0 0 16 4" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2 0C0.9 0 0 0.9 0 2C0 3.1 0.9 4 2 4C3.1 4 4 3.1 4 2C4 0.9 3.1 0 2 0ZM14 0C12.9 0 12 0.9 12 2C12 3.1 12.9 4 14 4C15.1 4 16 3.1 16 2C16 0.9 15.1 0 14 0ZM8 0C6.9 0 6 0.9 6 2C6 3.1 6.9 4 8 4C9.1 4 10 3.1 10 2C10 0.9 9.1 0 8 0Z" fill="white"/>
</svg>

</div>
        </div>
        <ul>
            <li>
                <div class="img_round">
                    <span class="img_spn"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M4.66667 3.83333C4.66667 2.94928 5.01786 2.10143 5.64298 1.47631C6.2681 0.851189 7.11594 0.5 8 0.5C8.88406 0.5 9.7319 0.851189 10.357 1.47631C10.9821 2.10143 11.3333 2.94928 11.3333 3.83333C11.3333 4.71739 10.9821 5.56523 10.357 6.19036C9.7319 6.81548 8.88406 7.16667 8 7.16667C7.11594 7.16667 6.2681 6.81548 5.64298 6.19036C5.01786 5.56523 4.66667 4.71739 4.66667 3.83333ZM4.66667 8.83333C3.5616 8.83333 2.50179 9.27232 1.72039 10.0537C0.938987 10.8351 0.5 11.8949 0.5 13C0.5 13.663 0.763392 14.2989 1.23223 14.7678C1.70107 15.2366 2.33696 15.5 3 15.5H13C13.663 15.5 14.2989 15.2366 14.7678 14.7678C15.2366 14.2989 15.5 13.663 15.5 13C15.5 11.8949 15.061 10.8351 14.2796 10.0537C13.4982 9.27232 12.4384 8.83333 11.3333 8.83333H4.66667Z" fill="#525252"/>
</svg>
</span>
                    <h2>Binny Bansal<span>Promoter</span></h2>
            </div>
            <div class="nt_position">
                <span>7.32%</span>
            </div>
            </li>

            <li>
                <div class="img_round">
                    <span class="img_spn"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M4.66667 3.83333C4.66667 2.94928 5.01786 2.10143 5.64298 1.47631C6.2681 0.851189 7.11594 0.5 8 0.5C8.88406 0.5 9.7319 0.851189 10.357 1.47631C10.9821 2.10143 11.3333 2.94928 11.3333 3.83333C11.3333 4.71739 10.9821 5.56523 10.357 6.19036C9.7319 6.81548 8.88406 7.16667 8 7.16667C7.11594 7.16667 6.2681 6.81548 5.64298 6.19036C5.01786 5.56523 4.66667 4.71739 4.66667 3.83333ZM4.66667 8.83333C3.5616 8.83333 2.50179 9.27232 1.72039 10.0537C0.938987 10.8351 0.5 11.8949 0.5 13C0.5 13.663 0.763392 14.2989 1.23223 14.7678C1.70107 15.2366 2.33696 15.5 3 15.5H13C13.663 15.5 14.2989 15.2366 14.7678 14.7678C15.2366 14.2989 15.5 13.663 15.5 13C15.5 11.8949 15.061 10.8351 14.2796 10.0537C13.4982 9.27232 12.4384 8.83333 11.3333 8.83333H4.66667Z" fill="#525252"/>
</svg>
</span>
                    <h2>Sequoia India<span>Non promoter</span></h2>
            </div>
            <div class="nt_position">
                <span>23.0%</span>
            </div>
            </li>

            <li>
                <div class="img_round">
                    <span class="img_spn"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M4.66667 3.83333C4.66667 2.94928 5.01786 2.10143 5.64298 1.47631C6.2681 0.851189 7.11594 0.5 8 0.5C8.88406 0.5 9.7319 0.851189 10.357 1.47631C10.9821 2.10143 11.3333 2.94928 11.3333 3.83333C11.3333 4.71739 10.9821 5.56523 10.357 6.19036C9.7319 6.81548 8.88406 7.16667 8 7.16667C7.11594 7.16667 6.2681 6.81548 5.64298 6.19036C5.01786 5.56523 4.66667 4.71739 4.66667 3.83333ZM4.66667 8.83333C3.5616 8.83333 2.50179 9.27232 1.72039 10.0537C0.938987 10.8351 0.5 11.8949 0.5 13C0.5 13.663 0.763392 14.2989 1.23223 14.7678C1.70107 15.2366 2.33696 15.5 3 15.5H13C13.663 15.5 14.2989 15.2366 14.7678 14.7678C15.2366 14.2989 15.5 13.663 15.5 13C15.5 11.8949 15.061 10.8351 14.2796 10.0537C13.4982 9.27232 12.4384 8.83333 11.3333 8.83333H4.66667Z" fill="#525252"/>
</svg>
</span>
                    <h2>Lightspeed VP<span>Promoter</span></h2>
            </div>
            <div class="nt_position">
                <span>27.6%</span>
            </div>
            </li>

        </ul>
        <div class="btm_view">
<a class="hvr-rotate" href="#">View all <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M4.37114e-07 7L14.17 7L10.59 10.59L12 12L18 6L12 -5.24537e-07L10.59 1.41L14.17 5L6.11959e-07 5L4.37114e-07 7Z" fill="#5790FF"/>
</svg>
</a>
</div>
</div>
</div>


<div class="col-md-4">
    <div class="repeat_eup role">
        <h2 class="in_title">Escalation roles</h2>
        <ul>
            <li>
                <div class="img_round">
                    <span class="img_spn"><img src="../assets/images/alok.png" alt="img"></span>
                    <h2>Bhavish Agarwal<span>Product Manager</span></h2>
            </div>
            <div class="nt_position">
                <span><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5 4.076C4.025 4.172 3.369 4.389 2.879 4.879C2 5.757 2 7.172 2 10V14C2 16.828 2 18.243 2.879 19.121C3.369 19.611 4.025 19.828 5 19.924M19 4.076C19.975 4.172 20.631 4.389 21.121 4.879C22 5.757 22 7.172 22 10V14C22 16.828 22 18.243 21.121 19.121C20.631 19.611 19.975 19.828 19 19.924M5 8C5 5.172 5 3.757 5.879 2.879C6.757 2 8.172 2 11 2H13C15.828 2 17.243 2 18.121 2.879C19 3.757 19 5.172 19 8V16C19 18.828 19 20.243 18.121 21.121C17.243 22 15.828 22 13 22H11C8.172 22 6.757 22 5.879 21.121C5 20.243 5 18.828 5 16V8Z" stroke="#A3AED0" stroke-width="1.5"/>
<path d="M9 13H15M9 9H15M9 17H12" stroke="#A3AED0" stroke-width="1.5" stroke-linecap="round"/>
</svg>
</span>
            </div>
            </li>

            <li>
                <div class="img_round">
                    <span class="img_spn"><img src="../assets/images/priya.png" alt="img"></span>
                    <h2>Nitpreet Kaur<span>VP - Human Resources</span></h2>
            </div>
            <div class="nt_position">
                <span><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M12.2795 10.8733C11.5297 10.8655 10.799 10.6359 10.1794 10.2136C9.55975 9.79126 9.07893 9.19506 8.79744 8.50005C8.51595 7.80503 8.44638 7.04226 8.59749 6.30779C8.7486 5.57332 9.11363 4.89997 9.64663 4.37252C10.1796 3.84508 10.8568 3.48712 11.5928 3.34371C12.3288 3.20029 13.0908 3.27785 13.7828 3.5666C14.4749 3.85535 15.066 4.34239 15.4818 4.9664C15.8976 5.59041 16.1195 6.32349 16.1195 7.07335C16.1125 8.08593 15.7044 9.05444 14.9846 9.7667C14.2649 10.479 13.2921 10.8769 12.2795 10.8733ZM12.2795 4.60668C11.7935 4.61457 11.3205 4.76591 10.9202 5.0417C10.5199 5.31749 10.2099 5.70542 10.0293 6.15679C9.84877 6.60815 9.80559 7.1028 9.90524 7.57863C10.0049 8.05445 10.2429 8.49021 10.5894 8.83119C10.9359 9.17217 11.3755 9.40316 11.8528 9.49514C12.3302 9.58712 12.8241 9.53599 13.2725 9.34818C13.7209 9.16036 14.1038 8.84424 14.3731 8.43951C14.6424 8.03478 14.7861 7.55949 14.7862 7.07335C14.7792 6.41439 14.5115 5.78502 14.0418 5.32281C13.5721 4.86059 12.9385 4.60312 12.2795 4.60668Z" fill="#A3AED0"/>
<path d="M12.2792 10.8734C11.5294 10.8655 10.7987 10.6359 10.1791 10.2136C9.55944 9.79126 9.07861 9.19506 8.79712 8.50005C8.51564 7.80503 8.44607 7.04226 8.59718 6.30779C8.74829 5.57332 9.11332 4.89997 9.64632 4.37252C10.1793 3.84508 10.8564 3.48712 11.5925 3.34371C12.3285 3.20029 13.0905 3.27785 13.7825 3.5666C14.4745 3.85535 15.0657 4.34239 15.4815 4.9664C15.8973 5.59041 16.1192 6.32349 16.1192 7.07335C16.1122 8.08593 15.7041 9.05444 14.9843 9.7667C14.2645 10.479 13.2918 10.8769 12.2792 10.8734ZM12.2792 4.60668C11.7931 4.61457 11.3202 4.76591 10.9199 5.0417C10.5195 5.31749 10.2096 5.70542 10.029 6.15679C9.84846 6.60815 9.80528 7.1028 9.90492 7.57863C10.0046 8.05445 10.2426 8.49022 10.5891 8.83119C10.9356 9.17217 11.3752 9.40316 11.8525 9.49514C12.3299 9.58712 12.8238 9.53599 13.2722 9.34818C13.7206 9.16036 14.1035 8.84424 14.3728 8.43951C14.6421 8.03478 14.7858 7.55949 14.7859 7.07335C14.7788 6.41439 14.5112 5.78502 14.0415 5.32281C13.5718 4.86059 12.9382 4.60312 12.2792 4.60668ZM14.6059 11.7667C11.6489 11.2521 8.60479 11.7205 5.93922 13.1C5.75 13.2051 5.59332 13.3602 5.48632 13.5483C5.37932 13.7364 5.32613 13.9504 5.33255 14.1667V16.54C5.33255 16.7168 5.40279 16.8864 5.52781 17.0114C5.65284 17.1364 5.82241 17.2067 5.99922 17.2067C6.17603 17.2067 6.3456 17.1364 6.47062 17.0114C6.59565 16.8864 6.66588 16.7168 6.66588 16.54V14.2534C9.13766 13.0131 11.9485 12.6196 14.6659 13.1334L14.6059 11.7667Z" fill="#A3AED0"/>
<path d="M21.9993 14.6666H17.5327V13.68C17.5327 13.5032 17.4624 13.3336 17.3374 13.2086C17.2124 13.0835 17.0428 13.0133 16.866 13.0133C16.6892 13.0133 16.5196 13.0835 16.3946 13.2086C16.2696 13.3336 16.1993 13.5032 16.1993 13.68V14.6666H11.3327C11.1559 14.6666 10.9863 14.7369 10.8613 14.8619C10.7363 14.9869 10.666 15.1565 10.666 15.3333V22C10.666 22.1768 10.7363 22.3464 10.8613 22.4714C10.9863 22.5964 11.1559 22.6666 11.3327 22.6666H21.9993C22.1762 22.6666 22.3457 22.5964 22.4708 22.4714C22.5958 22.3464 22.666 22.1768 22.666 22V15.3333C22.666 15.1565 22.5958 14.9869 22.4708 14.8619C22.3457 14.7369 22.1762 14.6666 21.9993 14.6666ZM21.3327 21.3333H11.9993V16H16.1993V16.2733C16.1993 16.4501 16.2696 16.6197 16.3946 16.7447C16.5196 16.8697 16.6892 16.94 16.866 16.94C17.0428 16.94 17.2124 16.8697 17.3374 16.7447C17.4624 16.6197 17.5327 16.4501 17.5327 16.2733V16H21.3327V21.3333Z" fill="#A3AED0"/>
<path d="M14.5407 18.28H18.514V19.2133H14.5407V18.28ZM7.22732 8.16C5.38161 8.19088 3.56792 8.64715 1.92732 9.49333C1.74889 9.58758 1.59944 9.72854 1.49493 9.90116C1.39042 10.0738 1.33479 10.2715 1.33398 10.4733V12.54C1.33398 12.7168 1.40422 12.8864 1.52925 13.0114C1.65427 13.1364 1.82384 13.2067 2.00065 13.2067C2.17746 13.2067 2.34703 13.1364 2.47206 13.0114C2.59708 12.8864 2.66732 12.7168 2.66732 12.54V10.6067C4.23485 9.82641 5.97036 9.44405 7.72065 9.49333C7.49165 9.07551 7.32542 8.62625 7.22732 8.16ZM22.074 9.48666C20.6026 8.7148 18.9854 8.26056 17.3273 8.15333C17.2297 8.61876 17.0658 9.06777 16.8407 9.48666C18.4027 9.52405 19.9371 9.90652 21.334 10.6067V12.54C21.334 12.7168 21.4042 12.8864 21.5292 13.0114C21.6543 13.1364 21.8238 13.2067 22.0007 13.2067C22.1775 13.2067 22.347 13.1364 22.4721 13.0114C22.5971 12.8864 22.6673 12.7168 22.6673 12.54V10.4733C22.6677 10.2704 22.6127 10.0712 22.5081 9.89735C22.4035 9.72345 22.2534 9.58144 22.074 9.48666ZM7.10732 7.07333V6.62666C6.58506 6.55677 6.10988 6.28815 5.7807 5.87673C5.45151 5.4653 5.29369 4.94277 5.34007 4.4179C5.38646 3.89304 5.63349 3.40628 6.02973 3.05897C6.42597 2.71165 6.9409 2.53054 7.46732 2.55333C8.01486 2.55234 8.54114 2.76524 8.93398 3.14666C9.28058 2.86078 9.66126 2.61894 10.0673 2.42666C9.61373 1.9051 9.01274 1.53322 8.34357 1.36004C7.67441 1.18686 6.96847 1.22051 6.31881 1.45656C5.66915 1.6926 5.10626 2.11996 4.70434 2.6823C4.30241 3.24464 4.08031 3.91557 4.06732 4.60666C4.08131 5.4525 4.41012 6.26274 4.98952 6.87913C5.56892 7.49551 6.3573 7.87376 7.20065 7.94C7.1441 7.65442 7.11287 7.3644 7.10732 7.07333ZM16.514 1.22C16.0558 1.2201 15.6023 1.31153 15.1799 1.48896C14.7575 1.66639 14.3748 1.92624 14.054 2.25333C14.5047 2.41664 14.9309 2.64095 15.3207 2.92C15.6319 2.70395 15.9959 2.57642 16.3739 2.551C16.7519 2.52559 17.1298 2.60324 17.4671 2.77568C17.8045 2.94812 18.0887 3.20888 18.2895 3.53016C18.4903 3.85144 18.6001 4.2212 18.6073 4.6C18.6031 4.98909 18.4888 5.36903 18.2776 5.69585C18.0664 6.02266 17.767 6.28298 17.414 6.44666C17.4408 6.65224 17.4542 6.85935 17.454 7.06666C17.4522 7.33464 17.4299 7.60209 17.3873 7.86666C18.1136 7.67995 18.7577 7.25838 19.2195 6.66757C19.6813 6.07676 19.9349 5.34985 19.9407 4.6C19.9319 3.6982 19.5665 2.83653 18.9245 2.20322C18.2824 1.56991 17.4158 1.21643 16.514 1.22Z" fill="#A3AED0"/>
</svg></span>
            </div>
            </li>

            <li>
                <div class="img_round">
                    <span class="img_spn"><img src="../assets/images/akshay.png" alt="img"></span>
                    <h2>Harsh Khandelwal<span>CFO</span></h2>
            </div>
            <div class="nt_position">
                <span><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M20.5 7L12 2L3.5 7V17L12 22L20.5 17V7Z" stroke="#A3AED0" stroke-width="2" stroke-linejoin="round"/>
<path d="M12 11V15M16 9V15M8 13V15" stroke="#A3AED0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg></span>
            </div>
            </li>

        </ul>
        <div class="btm_view">
<a class="hvr-rotate" href="#">View all <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M4.37114e-07 7L14.17 7L10.59 10.59L12 12L18 6L12 -5.24537e-07L10.59 1.41L14.17 5L6.11959e-07 5L4.37114e-07 7Z" fill="#5790FF"/>
</svg>
</a>
        </div>
</div>
</div>

<div class="col-md-4">
    <div class="repeat_eup matrixx">
        <h2 class="in_title">Escalation Matrix</h2>
        <ul>
            <li>
                <div class="img_round">
                    <span class="img_spn"><img src="../assets/images/alok.png" alt="img"></span>
                    <h2>Alok Hiranandani<span>Sr. Accountant</span></h2>
            </div>
            <div class="nt_position">
                <span>Finance</span>
            </div>
            </li>

            <li>
                <div class="img_round">
                    <span class="img_spn"><img src="../assets/images/priya.png" alt="img"></span>
                    <h2>Priya Khurana<span>Head - Talent Acquisition</span></h2>
            </div>
            <div class="nt_position">
                <span>HR</span>
            </div>
            </li>

            <li>
                <div class="img_round">
                    <span class="img_spn"><img src="../assets/images/akshay.png" alt="img"></span>
                    <h2>Akshay Bindra<span>Sr. Software Engineer</span></h2>
            </div>
            <div class="nt_position">
                <span>Tech</span>
            </div>
            </li>

        </ul>
        <div class="btm_view">
<a class="hvr-rotate" href="#">View all <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M4.37114e-07 7L14.17 7L10.59 10.59L12 12L18 6L12 -5.24537e-07L10.59 1.41L14.17 5L6.11959e-07 5L4.37114e-07 7Z" fill="#5790FF"/>
</svg>
</a>
        </div>
</div>
</div>

        </div>
        </div> -->
      <!-- Container-fluid end-->


      <!-- Container-fluid start-->
      
    

      <div class="container-fluid nt_proottr">
        <div class="row">

          <div class="col-md-4">
            <div class="main_thumb y_organistaion">
              <div class="in_thumb">
                @if($user->profile_picture == NULL)
                <h2>
    <?php 
        // Get the first and last name
        $nameParts = explode(' ', $user->name);
        $firstLetter = strtoupper(substr($nameParts[0], 0, 1)); // First letter of first name
        $secondLetter = strtoupper(substr($nameParts[1], 0, 1)); // First letter of last name
        
        // Display the initials
        echo $firstLetter . $secondLetter;
    ?>
</h2>
                <!-- <img src="../assets/images/gold-logo.png" class="mtt"> -->
                @else

                <img src="{{asset('/' . $user->profile_picture)}}" class="mtt" alt="Profile Image">
                @endif
              </div>
              <p>My Organization</p>
              <h2>{{$user->name_of_the_business}}</h2>

              <div class="thub_nt_btn">
                <a class="hvr-rotate" href="{{url('/user/companyprofile')}}">View More</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
                @if($user->Promoters_Vault_Access == 1)
            <div class="main_thumb">
              <div class="in_thumb">
                <img src="../assets/images/thub.png" class="tm">
              </div>
              <h2>Promoter’s Vault</h2>
              <p>Your Documents’<br> Safe Haven</p>
              <div class="thub_nt_btn">
                <a class="hvr-rotate" href="{{url('/user/wallet')}}">Access</a>
              </div>
            </div>
            @else
            
                <div class="main_thumb accress_denied">
              <div class="in_thumb">
                <img src="../assets/images/thub.png" class="tm">
              </div>
              <h2>Promoter’s Vault</h2>
              <p>Your Documents’<br> Safe Haven</p>
              <div class="thub_nt_btn">
                <a class="nt_cl_accress">Access</a>
              </div>
            </div>
            
            @endif
            
          </div>
          <div class="col-md-4">
            <div class="main_thumb blog_imagee_mainn">

              <div class="blog_imagee">
                <img src="../assets/images/blog_dash.png" class="tm">
              </div>
              <div class="blog_textt">
                <h2>What makes MillionDox so secure?</h2>
                <div class="date_blog_read">
                  <span>11th May, 2024</span>
                  <a target="_blank" href="https://milliondox.com/blogs/">read blog <svg width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1 1L5 5L1 9" stroke="#5790FF" stroke-width="1.6" />
                    </svg>
                  </a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      
     
      
    
      
      <!-- Container-fluid end-->

    </div>
  </div>
</div>
@endsection


<style>
  /***pop dasbord animation css start***/
  #loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.8);
    /* White background with 80% opacity */
    z-index: 9999;
    /* Make sure the overlay is on top of everything */
    display: flex;
    justify-content: center;
    align-items: center;
  }

  #aniation_dash .modal-dialog {
    min-width: 90%;
  }

  #aniation_dash .modal-dialog .modal-content {
    background: transparent;
    border: 0;
    height: 90vh;
    position: relative;
  }

  #aniation_dash .modal-dialog .modal-header {
    border: 0;
    padding: 0;
  }

  #aniation_dash .modal-dialog iframe {
    height: 100% !important;
    width: 100% !important;
  }

  #aniation_dash {
    background: rgba(255, 255, 255, 0.8);
  }

  #aniation_dash button.close {
    position: absolute;
    right: 0;
    top: 0;
    z-index: 9;
    border-radius: 50px !IMPORTANT;
    width: 30px;
    height: 30px;
    background: #FFF;
    border: 0;
    padding: 10px;
  }

  #aniation_dash button.close svg {
    width: 100%;
    height: 100%;
  }


    
.khaliclass {
    max-width: 100%;
    display: flex;
    margin: 60px auto 0;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 15px 0px;
}

.khaliclass p {
    display: block;
    padding: 0;
    margin: 0;
    color: #c5c5c5;
    font-size: 16px;
    text-transform: capitalize;
}

.khaliclass svg {
    width: 40px;
    height: 40px;
}

.khaliclass svg path {
    fill: #c5c5c5;
}

.khaliclass circle {
    stroke: #c5c5c5;
}


  /***pop dasbord animation css end***/
</style>

