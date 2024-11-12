@extends('user.includes.company-profile') @section('content')
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
           Company Profile
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
           Company Profile
          </h2>
            </div>
             <!-- Container-fluid start-->
             <div class="container-fluid nt_companyprofile">
          <div class="row">   
<div class=col-sm-12">
<div class="mmain_background">
    <div class="crist_bck">
    <img src="../assets/images/cristal_back.png" src="img">
</div>
<div class="row wid_nt">
    <div class="col-md-8">
        <div class="pro_inner">
      <!-- Add a container div for the popup -->
<!-- Add a container div for the popup -->


<!-- Image div -->
<!-- Image div -->
<div class="img_widgt cpmy-profiike" id="round_uplad_image" data-bs-toggle="modal" data-bs-target="#profileModal">
    <div class="inner_file_edit">	      
     <div class="dont_show">
     
@if($user->profile_picture == NULL)
      
     <img id="profile-image" src="../assets/images/logo_wingdart.png" alt="Add Image">
   @else

    <img id="profile-image" src="{{asset('/' . $user->profile_picture)}}" alt="Profile Image">
 @endif    

    <div class="EAyyHe"><div class="EzQmEf"></div></div>
  </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade drop_coman_file" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" style="font-weight:700"></h5>
                                    <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
            <span aria-hidden="true"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"/>
<rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"/>
</svg>
</span>
          </button>
                                  </div>
                                  <div class="modal-body">
    <h3>Upload image</h3>
    <form action="{{ route('userimg') }}" method="POST" id="profile-form" enctype="multipart/form-data">
        @csrf
        <div class="file-area">
        <input type="file" class="dragfile" id="profile-image-input" name="profile_image" accept="image/*" required>
                    <input type="hidden" id="use_id" name="use_id" value="{{$user->id}}">
            <div class="file-dummy">
                <div class="success">Great, your files are selected. Keep on.</div>
                <div class="default">
                    <span class="upload_icon">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88"><title>file-upload</title><path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z"/></svg>
                    </span>  
                    Drag and Drop files here or
                    <span class="fille">  Choose File</span>
                </div>
            </div><br>
            <div class="selected-file"></div>
        </div>
        <span class="basic-file">Note:- file|mimes:pdf,doc,docx|max size:2048kb</span>

        <button id="update-profile-btn" class="btn" style="border-radius:5px;" type="submit">Update Logo</button>
    </form>
</div>
                                </div>
                              </div>
                            </div>

<!-- model end -->

<div class="widgt_title">
 

  
    <h2 >{{$user->name_of_the_business}}</h2>

    <div class="share_width">
        <a onclick="openToast('info')" >Share Profile
        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_689_3408)">
<path d="M7 1.5H10.5V5M10.5 7.3685V9.75C10.5 9.94891 10.421 10.1397 10.2803 10.2803C10.1397 10.421 9.94891 10.5 9.75 10.5H2.25C2.05109 10.5 1.86032 10.421 1.71967 10.2803C1.57902 10.1397 1.5 9.94891 1.5 9.75V2.25C1.5 2.05109 1.57902 1.86032 1.71967 1.71967C1.86032 1.57902 2.05109 1.5 2.25 1.5H4.5M6.45 5.55L10.275 1.725" stroke="#8C8C8C" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round"/>
</g>
<defs>
<clipPath id="clip0_689_3408">
<rect width="12" height="12" fill="white"/>
</clipPath>
</defs>
</svg>
</a>
</div>

<div class="tost_wrap">
<section id="toast" class="info">
  <div id="icon-wrapper">
    <div id="icon"></div>
  </div>
  <div id="toast-message">
<h4>Stay Tuned!</h4>
<p>Share profile is coming soon.</p>
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


<div class="pro_description">
    <p>{{$user->dece}}</p>
</div>

</div>
<div class="width_pro_complete">
   <span>Profile Completion</span>
   <div class="progress-bar_wrap">
   <div class="progress-bar">
    <div class="progress" id="progress" style="width: {{ $progressPercentage }}%;"></div>
</div>
<span class="progress-precentage">{{ $progressPercentage }}%</span>
</div>
<!-- helloo -->

</div>
</div>
</div>
<div class="col-md-4">
    <div class="suscription_nt">
    <h2>Beta Access<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9.33425 3.33333C9.33425 3.68666 9.19691 4.008 8.97225 4.24666L10.7216 6.43333C10.7454 6.46317 10.7786 6.48395 10.8159 6.4922C10.8531 6.50045 10.8921 6.49567 10.9262 6.47866L12.6929 5.59466C12.6547 5.40125 12.6599 5.20178 12.7079 5.01057C12.7559 4.81936 12.8456 4.64115 12.9707 4.48872C13.0957 4.33629 13.2529 4.21342 13.431 4.12892C13.6092 4.04442 13.8038 4.0004 14.0009 4C14.3287 4.00006 14.645 4.12087 14.8893 4.33935C15.1337 4.55782 15.289 4.85866 15.3256 5.18439C15.3622 5.51013 15.2776 5.83794 15.0878 6.10521C14.8981 6.37248 14.6165 6.56049 14.2969 6.63333L13.0942 13.0487C13.044 13.3161 12.9019 13.5575 12.6926 13.7312C12.4832 13.9049 12.2196 14 11.9476 14H4.05425C3.78218 14 3.51866 13.9049 3.30927 13.7312C3.09989 13.5575 2.9578 13.3161 2.90758 13.0487L1.70491 6.63333C1.44932 6.57505 1.21658 6.44273 1.03578 6.25289C0.854989 6.06306 0.734168 5.82414 0.688424 5.56601C0.642681 5.30788 0.674047 5.04199 0.778599 4.80159C0.883151 4.56119 1.05625 4.35694 1.27625 4.21439C1.49626 4.07184 1.7534 3.9973 2.01554 4.0001C2.27768 4.0029 2.53317 4.08291 2.75008 4.23013C2.96699 4.37735 3.13569 4.58525 3.23508 4.82783C3.33448 5.0704 3.36016 5.3369 3.30891 5.594L5.07558 6.478C5.10973 6.49501 5.14868 6.49978 5.18593 6.49153C5.22318 6.48328 5.25647 6.4625 5.28025 6.43266L7.02958 4.246C6.88054 4.0875 6.77254 3.89494 6.71502 3.68511C6.6575 3.47529 6.6522 3.25458 6.69958 3.04223C6.74696 2.82989 6.84559 2.63237 6.98685 2.4669C7.12811 2.30143 7.30771 2.17304 7.50999 2.09293C7.71228 2.01283 7.93109 1.98344 8.14734 2.00733C8.36359 2.03123 8.57071 2.10767 8.75062 2.23001C8.93054 2.35234 9.07778 2.51684 9.17951 2.70916C9.28124 2.90147 9.33436 3.11576 9.33425 3.33333ZM8.00091 11.3333C8.35454 11.3333 8.69367 11.1929 8.94372 10.9428C9.19377 10.6928 9.33425 10.3536 9.33425 10C9.33425 9.64637 9.19377 9.30723 8.94372 9.05719C8.69367 8.80714 8.35454 8.66666 8.00091 8.66666C7.64729 8.66666 7.30815 8.80714 7.0581 9.05719C6.80806 9.30723 6.66758 9.64637 6.66758 10C6.66758 10.3536 6.80806 10.6928 7.0581 10.9428C7.30815 11.1929 7.64729 11.3333 8.00091 11.3333Z" fill="#393939"/>
</svg>
</h2>
<div class="work_plan">
    <p>Your account was created on <b>{{ \Carbon\Carbon::parse($user->created_at)->format('M d, Y') }}</b></p>
</div>
<div class="pay_edit">
    <a class="hvr-rotate" target="_blank" href="https://milliondox.com/blogs/beta-test-user-guide/">Guide for Beta Testers<svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.33203 5H10.6654M10.6654 5L6.66536 9M10.6654 5L6.66536 1" stroke="#5790FF" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
</a>
</div>
</div>
</div>

</div>

<!-- table sectioon start -->
<div class="row cmpy_info"> 
<div class="col-md-8">
  
  <!-- save mode code start -->
    <div class="cmpy_content save_start">
        <div class="cpmpany_head">
            <h2>Company Information</h2>
            <a class="hide_save hvr-rotate">Edit<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.75 12.25V9.77083L9.45 2.08542C9.56667 1.97847 9.69558 1.89583 9.83675 1.8375C9.97792 1.77917 10.1261 1.75 10.2812 1.75C10.4368 1.75 10.5875 1.77917 10.7333 1.8375C10.8792 1.89583 11.0056 1.98333 11.1125 2.1L11.9146 2.91667C12.0312 3.02361 12.1164 3.15 12.1701 3.29583C12.2238 3.44167 12.2504 3.5875 12.25 3.73333C12.25 3.88889 12.2234 4.03725 12.1701 4.17842C12.1168 4.31958 12.0316 4.44831 11.9146 4.56458L4.22917 12.25H1.75ZM10.2667 4.55L11.0833 3.73333L10.2667 2.91667L9.45 3.73333L10.2667 4.55Z" fill="#E3E3E3"/>
</svg>
</a>
</div>
<div class="cpy_table table-responsive theme-scrollbar">


<table>
  <tr>
      <th>State of Registration :</th>
    <td id="state" >{{$user->state ?? 'N/A'}} <button class="copy"><svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.96484 2.69067H1.96484C1.27449 2.69067 0.714844 3.16237 0.714844 3.74425V10.7681C0.714844 11.3499 1.27449 11.8216 1.96484 11.8216H6.96484C7.6552 11.8216 8.21484 11.3499 8.21484 10.7681V3.74425C8.21484 3.16237 7.6552 2.69067 6.96484 2.69067Z" stroke="#BCBCBC"/>
<path d="M2.37891 2.33934C2.37891 2.05991 2.5106 1.79193 2.74502 1.59435C2.97944 1.39677 3.29739 1.28577 3.62891 1.28577H8.62891C8.96043 1.28577 9.27837 1.39677 9.51279 1.59435C9.74721 1.79193 9.87891 2.05991 9.87891 2.33934V9.36315C9.87891 9.64257 9.74721 9.91055 9.51279 10.1081C9.27837 10.3057 8.96043 10.4167 8.62891 10.4167" stroke="#BCBCBC"/>
</svg>
</button></td>
  </tr>
    <tr>
      <th>Industry :</th>
    <td id="industry" >{{$user->industry ?? 'N/A'}} <button class="copy"><svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.96484 2.69067H1.96484C1.27449 2.69067 0.714844 3.16237 0.714844 3.74425V10.7681C0.714844 11.3499 1.27449 11.8216 1.96484 11.8216H6.96484C7.6552 11.8216 8.21484 11.3499 8.21484 10.7681V3.74425C8.21484 3.16237 7.6552 2.69067 6.96484 2.69067Z" stroke="#BCBCBC"/>
<path d="M2.37891 2.33934C2.37891 2.05991 2.5106 1.79193 2.74502 1.59435C2.97944 1.39677 3.29739 1.28577 3.62891 1.28577H8.62891C8.96043 1.28577 9.27837 1.39677 9.51279 1.59435C9.74721 1.79193 9.87891 2.05991 9.87891 2.33934V9.36315C9.87891 9.64257 9.74721 9.91055 9.51279 10.1081C9.27837 10.3057 8.96043 10.4167 8.62891 10.4167" stroke="#BCBCBC"/>
</svg>
</button></td>
  </tr>
      <tr>
      <th>Employee Count :</th>
    <td id="employee-count" >{{$user->employees ?? 'N/A'}} <button class="copy"><svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.96484 2.69067H1.96484C1.27449 2.69067 0.714844 3.16237 0.714844 3.74425V10.7681C0.714844 11.3499 1.27449 11.8216 1.96484 11.8216H6.96484C7.6552 11.8216 8.21484 11.3499 8.21484 10.7681V3.74425C8.21484 3.16237 7.6552 2.69067 6.96484 2.69067Z" stroke="#BCBCBC"/>
<path d="M2.37891 2.33934C2.37891 2.05991 2.5106 1.79193 2.74502 1.59435C2.97944 1.39677 3.29739 1.28577 3.62891 1.28577H8.62891C8.96043 1.28577 9.27837 1.39677 9.51279 1.59435C9.74721 1.79193 9.87891 2.05991 9.87891 2.33934V9.36315C9.87891 9.64257 9.74721 9.91055 9.51279 10.1081C9.27837 10.3057 8.96043 10.4167 8.62891 10.4167" stroke="#BCBCBC"/>
</svg>
</button></td>
  </tr>
        <tr>
      <th>Date of Incorporation :</th>
    <td id="DOI" >{{$user->joining_date ?? 'N/A'}} <button class="copy"><svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.96484 2.69067H1.96484C1.27449 2.69067 0.714844 3.16237 0.714844 3.74425V10.7681C0.714844 11.3499 1.27449 11.8216 1.96484 11.8216H6.96484C7.6552 11.8216 8.21484 11.3499 8.21484 10.7681V3.74425C8.21484 3.16237 7.6552 2.69067 6.96484 2.69067Z" stroke="#BCBCBC"/>
<path d="M2.37891 2.33934C2.37891 2.05991 2.5106 1.79193 2.74502 1.59435C2.97944 1.39677 3.29739 1.28577 3.62891 1.28577H8.62891C8.96043 1.28577 9.27837 1.39677 9.51279 1.59435C9.74721 1.79193 9.87891 2.05991 9.87891 2.33934V9.36315C9.87891 9.64257 9.74721 9.91055 9.51279 10.1081C9.27837 10.3057 8.96043 10.4167 8.62891 10.4167" stroke="#BCBCBC"/>
</svg>
</button></td>
  </tr>
  
  
    <th>CIN :</th>
    <td id="cin" >{{$user->CIN ?? 'N/A'}} <button class="copy"><svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.96484 2.69067H1.96484C1.27449 2.69067 0.714844 3.16237 0.714844 3.74425V10.7681C0.714844 11.3499 1.27449 11.8216 1.96484 11.8216H6.96484C7.6552 11.8216 8.21484 11.3499 8.21484 10.7681V3.74425C8.21484 3.16237 7.6552 2.69067 6.96484 2.69067Z" stroke="#BCBCBC"/>
<path d="M2.37891 2.33934C2.37891 2.05991 2.5106 1.79193 2.74502 1.59435C2.97944 1.39677 3.29739 1.28577 3.62891 1.28577H8.62891C8.96043 1.28577 9.27837 1.39677 9.51279 1.59435C9.74721 1.79193 9.87891 2.05991 9.87891 2.33934V9.36315C9.87891 9.64257 9.74721 9.91055 9.51279 10.1081C9.27837 10.3057 8.96043 10.4167 8.62891 10.4167" stroke="#BCBCBC"/>
</svg>
</button></td>
  </tr>
  
  <tr>
    <th>PAN :</th>
    <td id="pan">{{$user->PAN ?? 'N/A'}} <button class="copy"><svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.96484 2.69067H1.96484C1.27449 2.69067 0.714844 3.16237 0.714844 3.74425V10.7681C0.714844 11.3499 1.27449 11.8216 1.96484 11.8216H6.96484C7.6552 11.8216 8.21484 11.3499 8.21484 10.7681V3.74425C8.21484 3.16237 7.6552 2.69067 6.96484 2.69067Z" stroke="#BCBCBC"/>
<path d="M2.37891 2.33934C2.37891 2.05991 2.5106 1.79193 2.74502 1.59435C2.97944 1.39677 3.29739 1.28577 3.62891 1.28577H8.62891C8.96043 1.28577 9.27837 1.39677 9.51279 1.59435C9.74721 1.79193 9.87891 2.05991 9.87891 2.33934V9.36315C9.87891 9.64257 9.74721 9.91055 9.51279 10.1081C9.27837 10.3057 8.96043 10.4167 8.62891 10.4167" stroke="#BCBCBC"/>
</svg>
</button></td>
  </tr>
  <tr>
    <th>Email :</th>
    <td id="mail">{{$user->backupemail ?? 'N/A'}} <button class="copy"><svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.96484 2.69067H1.96484C1.27449 2.69067 0.714844 3.16237 0.714844 3.74425V10.7681C0.714844 11.3499 1.27449 11.8216 1.96484 11.8216H6.96484C7.6552 11.8216 8.21484 11.3499 8.21484 10.7681V3.74425C8.21484 3.16237 7.6552 2.69067 6.96484 2.69067Z" stroke="#BCBCBC"/>
<path d="M2.37891 2.33934C2.37891 2.05991 2.5106 1.79193 2.74502 1.59435C2.97944 1.39677 3.29739 1.28577 3.62891 1.28577H8.62891C8.96043 1.28577 9.27837 1.39677 9.51279 1.59435C9.74721 1.79193 9.87891 2.05991 9.87891 2.33934V9.36315C9.87891 9.64257 9.74721 9.91055 9.51279 10.1081C9.27837 10.3057 8.96043 10.4167 8.62891 10.4167" stroke="#BCBCBC"/>
</svg>
</button></td>
  </tr>
  <tr>
    <th>Phone :</th>
    <td id="phn">{{$user->phone ?? 'N/A'}} <button class="copy"><svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.96484 2.69067H1.96484C1.27449 2.69067 0.714844 3.16237 0.714844 3.74425V10.7681C0.714844 11.3499 1.27449 11.8216 1.96484 11.8216H6.96484C7.6552 11.8216 8.21484 11.3499 8.21484 10.7681V3.74425C8.21484 3.16237 7.6552 2.69067 6.96484 2.69067Z" stroke="#BCBCBC"/>
<path d="M2.37891 2.33934C2.37891 2.05991 2.5106 1.79193 2.74502 1.59435C2.97944 1.39677 3.29739 1.28577 3.62891 1.28577H8.62891C8.96043 1.28577 9.27837 1.39677 9.51279 1.59435C9.74721 1.79193 9.87891 2.05991 9.87891 2.33934V9.36315C9.87891 9.64257 9.74721 9.91055 9.51279 10.1081C9.27837 10.3057 8.96043 10.4167 8.62891 10.4167" stroke="#BCBCBC"/>
</svg>
</button></td>
  </tr>
  
      <th>Authorized Capital :</th>
    <td id="authorized-capital">{{$user->authorized_capital ?? 'N/A'}} <button class="copy"><svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.96484 2.69067H1.96484C1.27449 2.69067 0.714844 3.16237 0.714844 3.74425V10.7681C0.714844 11.3499 1.27449 11.8216 1.96484 11.8216H6.96484C7.6552 11.8216 8.21484 11.3499 8.21484 10.7681V3.74425C8.21484 3.16237 7.6552 2.69067 6.96484 2.69067Z" stroke="#BCBCBC"/>
<path d="M2.37891 2.33934C2.37891 2.05991 2.5106 1.79193 2.74502 1.59435C2.97944 1.39677 3.29739 1.28577 3.62891 1.28577H8.62891C8.96043 1.28577 9.27837 1.39677 9.51279 1.59435C9.74721 1.79193 9.87891 2.05991 9.87891 2.33934V9.36315C9.87891 9.64257 9.74721 9.91055 9.51279 10.1081C9.27837 10.3057 8.96043 10.4167 8.62891 10.4167" stroke="#BCBCBC"/>
</svg>
</button></td>
  </tr>
      <th>Paid-up Capital :</th>
    <td id="paid-up-capital">{{$user->paid_up_capital ?? 'N/A'}} <button class="copy"><svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.96484 2.69067H1.96484C1.27449 2.69067 0.714844 3.16237 0.714844 3.74425V10.7681C0.714844 11.3499 1.27449 11.8216 1.96484 11.8216H6.96484C7.6552 11.8216 8.21484 11.3499 8.21484 10.7681V3.74425C8.21484 3.16237 7.6552 2.69067 6.96484 2.69067Z" stroke="#BCBCBC"/>
<path d="M2.37891 2.33934C2.37891 2.05991 2.5106 1.79193 2.74502 1.59435C2.97944 1.39677 3.29739 1.28577 3.62891 1.28577H8.62891C8.96043 1.28577 9.27837 1.39677 9.51279 1.59435C9.74721 1.79193 9.87891 2.05991 9.87891 2.33934V9.36315C9.87891 9.64257 9.74721 9.91055 9.51279 10.1081C9.27837 10.3057 8.96043 10.4167 8.62891 10.4167" stroke="#BCBCBC"/>
</svg>
</button></td>
  </tr>
</table>



</div>
</div>

<!-- save mode code start -->

<!-- edit mode code start -->
    <div class="cmpy_content edit_start" style="display:none;">
        <div class="cpmpany_head">
            <h2>Company Information</h2>
            <a class="hide_cancle hvr-rotate">Cancel</a>
</div>
<div class="cpy_table table-responsive theme-scrollbar">
<form action="{{ route('companystoreprofile') }}" method="POST" id="companystore" enctype="multipart/form-data" class="upload-form"> 
@csrf
<table>
 <tr>
    <th>State of Registration :</th>
    <td><select id="state" name="state" class="state-field" required>
        <option value="">Select State</option>
        <option value="Andhra Pradesh" {{ $user->state === 'Andhra Pradesh' ? ' selected' : '' }}>Andhra Pradesh</option>
    <option value="Arunachal Pradesh" {{ $user->state === 'Arunachal Pradesh' ? ' selected' : '' }}>Arunachal Pradesh</option>
    <option value="Assam" {{ $user->state === 'Assam' ? ' selected' : '' }}>Assam</option>
    <option value="Bihar" {{ $user->state === 'Bihar' ? ' selected' : '' }}>Bihar</option>
    <option value="Chandigarh" {{ $user->state === 'Chandigarh' ? ' selected' : '' }}>Chandigarh</option>
    <option value="Chhattisgarh" {{ $user->state === 'Chhattisgarh' ? ' selected' : '' }}>Chhattisgarh</option>
    <option value="Dadra and Nagar Haveli and Daman and Diu" {{ $user->state === 'Dadra and Nagar Haveli and Daman and Diu' ? ' selected' : '' }}>Dadra and Nagar Haveli and Daman and Diu</option>
    <option value="Delhi" {{ $user->state === 'Delhi' ? ' selected' : '' }}>Delhi</option>
    <option value="Goa" {{ $user->state === 'Goa' ? ' selected' : '' }}>Goa</option>
    <option value="Gujarat" {{ $user->state === 'Gujarat' ? ' selected' : '' }}>Gujarat</option>
    <option value="Haryana" {{ $user->state === 'Haryana' ? ' selected' : '' }}>Haryana</option>
    <option value="Himachal Pradesh" {{ $user->state === 'Himachal Pradesh' ? ' selected' : '' }}>Himachal Pradesh</option>
    <option value="Jammu and Kashmir" {{ $user->state === 'Jammu and Kashmir' ? ' selected' : '' }}>Jammu and Kashmir</option>
    <option value="Jharkhand" {{ $user->state === 'Jharkhand' ? ' selected' : '' }}>Jharkhand</option>
    <option value="Karnataka" {{ $user->state === 'Karnataka' ? ' selected' : '' }}>Karnataka</option>
    <option value="Kerala" {{ $user->state === 'Kerala' ? ' selected' : '' }}>Kerala</option>
    <option value="Ladakh" {{ $user->state === 'Ladakh' ? ' selected' : '' }}>Ladakh</option>
    <option value="Lakshadweep" {{ $user->state === 'Lakshadweep' ? ' selected' : '' }}>Lakshadweep</option>
    <option value="Madhya Pradesh" {{ $user->state === 'Madhya Pradesh' ? ' selected' : '' }}>Madhya Pradesh</option>
    <option value="Maharashtra" {{ $user->state === 'Maharashtra' ? ' selected' : '' }}>Maharashtra</option>
    <option value="Manipur" {{ $user->state === 'Manipur' ? ' selected' : '' }}>Manipur</option>
    <option value="Meghalaya" {{ $user->state === 'Meghalaya' ? ' selected' : '' }}>Meghalaya</option>
    <option value="Mizoram" {{ $user->state === 'Mizoram' ? ' selected' : '' }}>Mizoram</option>
    <option value="Nagaland" {{ $user->state === 'Nagaland' ? ' selected' : '' }}>Nagaland</option>
    <option value="Odisha" {{ $user->state === 'Odisha' ? ' selected' : '' }}>Odisha</option>
    <option value="Puducherry" {{ $user->state === 'Puducherry' ? ' selected' : '' }}>Puducherry</option>
    <option value="Punjab" {{ $user->state === 'Punjab' ? ' selected' : '' }}>Punjab</option>
    <option value="Rajasthan" {{ $user->state === 'Rajasthan' ? ' selected' : '' }}>Rajasthan</option>
    <option value="Sikkim" {{ $user->state === 'Sikkim' ? ' selected' : '' }}>Sikkim</option>
    <option value="Tamil Nadu" {{ $user->state === 'Tamil Nadu' ? ' selected' : '' }}>Tamil Nadu</option>
    <option value="Telangana" {{ $user->state === 'Telangana' ? ' selected' : '' }}>Telangana</option>
    <option value="Tripura" {{ $user->state === 'Tripura' ? ' selected' : '' }}>Tripura</option>
    <option value="Uttar Pradesh" {{ $user->state === 'Uttar Pradesh' ? ' selected' : '' }}>Uttar Pradesh</option>
    <option value="Uttarakhand" {{ $user->state === 'Uttarakhand' ? ' selected' : '' }}>Uttarakhand</option>
    <option value="West Bengal" {{ $user->state === 'West Bengal' ? ' selected' : '' }}>West Bengal</option>
        
    </select></td>
  </tr>
    <tr>
    <th>Industry :</th>
    <td><select id="industry" name="industry" class="industry-field" required>
        <option value="">Select Industry</option>
        <option value="Agriculture">Agriculture</option>
                    <option value="Aggregator" {{ $user->	industry === 'Aggregator' ? ' selected' : '' }}>Aggregator</option>
                    <option value="Automotive" {{ $user->	industry === 'Automotive' ? ' selected' : '' }}>Automotive</option>
                    <option value="Aviation" {{ $user->industry === 'Aviation' ? ' selected' : '' }}>Aviation</option>
                    <option value="Baking" {{ $user->	industry === 'Baking' ? ' selected' : '' }}>Baking</option>
                    <option value="Cement" {{ $user->	industry === 'Cement' ? ' selected' : '' }}>Cement</option>
                    <option value="Chemicals" {{ $user->	industry === 'Chemicals' ? ' selected' : '' }}>Chemicals</option>
                    <option value="Diary" {{ $user->	industry === 'Diary' ? ' selected' : '' }}>Diary</option>
                    <option value="E-commerce" {{ $user->	industry === 'E-commerce' ? ' selected' : '' }}>E-commerce</option>
                    <option value="FMCG"  {{ $user->	industry === 'FMCG' ? ' selected' : '' }}>FMCG</option>
                    <option value="Food Industry" {{ $user->	industry === 'Food Industry' ? ' selected' : '' }}>Food Industry</option>
                    <option value="Healthcare" {{ $user->	industry === 'Healthcare' ? ' selected' : '' }}>Healthcare</option>
                    <option value="Iron&Steel" {{ $user->	industry === 'Iron&Steel' ? ' selected' : '' }}>Iron & Steel</option>
                    <option value="IT" {{ $user->	industry === 'IT' ? ' selected' : '' }}>IT Industry</option>
                    <option value="Mining" {{ $user->	industry === 'Mining' ? ' selected' : '' }}>Mining</option>
                    <option value="Poultry" {{ $user->	industry === 'Poultry' ? ' selected' : '' }}>Poultry</option>
                    <option value="Real Estate" {{ $user->	industry === 'Real Estate' ? ' selected' : '' }}>Real Estate</option>
                    <option value="Textile" {{ $user->	industry === 'Textile' ? ' selected' : '' }}>Textile</option>
                    <option value="Others" {{ $user->	industry === 'Others' ? ' selected' : '' }}>Others</option>
       
    </select></td>
  </tr>
  <tr>
    <th>Employee Count :</th>
    <td>    <select id="employee-count" name="employee_count" class="employee-count-field" required>
        <option value="">Select Employee Count</option>
        <option value="0-5" {{ $user->employees === '0-5' ? ' selected' : '' }}>0-5</option>
                    <option value="5-10" {{ $user->employees === '5-10' ? ' selected' : '' }}>5-10</option>
                    <option value="10-25" {{ $user->employees === '10-25' ? ' selected' : '' }}>10-25</option>
                    <option value="25-50" {{ $user->employees === '25-50' ? ' selected' : '' }}>25-50</option>
                    <option value="50-100" {{ $user->employees === '50-100' ? ' selected' : '' }}>50-100</option>
                    <option value="more than 100" {{ $user->employees === 'more than 100' ? ' selected' : '' }}>more than 100</option>
        
    </select></td>
  </tr>
    <tr>
    <th>Date of Incorporation :</th>
    <td><input type="date" id="DOI" name="DOI"  value="{{$user->joining_date}}"></td>
  </tr>
  <tr>
    <th>CIN :</th>
    <td><input type="text" id="CIN" name="CIN" value="{{$user->CIN}}" pattern="^[A-Z]{1}[0-9]{5}[A-Z]{2}[0-9]{4}[A-Z]{3}[0-9]{6}$" 
           title="Please enter a valid CIN number (e.g., L01631KA2010PTC096843)" 
           maxlength="21" required></td>
  </tr>
  <tr>
    <th>PAN :</th>
    <td><input type="text" id="PAN" name="PAN"  value="{{$user->PAN}}" pattern="^[A-Z]{5}[0-9]{4}[A-Z]{1}$" 
           title="Please enter a valid PAN number (e.g., ABCDE1234F)" 
           required> </td>
  </tr>
  <tr>
    <th>Email :</th>
    <td><input type="text" id="Email" name="Email" value="{{$user->backupemail}}" pattern="^[a-zA-Z0-9][a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" 
       title="Please enter a valid email address (e.g., user@example.com)" 
       required> </td>
  </tr>
  <tr>
    <th>Phone :</th>
    <td>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

<!-- Phone input field -->
<input id="phone" class="form-control @error('phone') is-invalid @enderror" type="tel" placeholder="Contact no" name="phone" value="{{ $user->phone }}">
@error('phone')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
<script>
  $(document).on('click', '.hvr-rotate', function() {
    // Get the value from the input field
    var phoneValue = $('#phone').val();
    
    // Remove all spaces and leading zeros
    phoneValue = phoneValue.replace(/^0+|\s+/g, '');
    
    // Update the input field with the cleaned value
    $('#phone').val(phoneValue);
  });
</script>
<script>
  // Initialize the intl-tel-input plugin
  const phoneInputField = document.querySelector("#phone");
  const phoneInput = window.intlTelInput(phoneInputField, {
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    initialCountry: "in",  // Set initial country to India
    nationalMode: false,   // Ensures the number is always international
    formatOnDisplay: true, // Optional: display the formatted version on the input
  });

  // On form submission
  document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault();  // Prevent default form submission

    // Get the full international number without spaces
    const phoneNumber = phoneInput.getNumber(intlTelInputUtils.numberFormat.E164);
    
    // Check if the phone number is valid
    if (phoneInput.isValidNumber()) {
      console.log('Valid phone number:', phoneNumber);
      
      // Optionally set this phone number into a hidden input or handle the form submission
      // You can directly update the input field value if you want:
      phoneInputField.value = phoneNumber;

      // Submit the form
      this.submit();
    } else {
      console.error('Invalid phone number');
      alert('Please enter a valid phone number.');
    }
  });
</script> 
    <!-- <input type="text" id="Phone" name="Phone"  value="{{$user->Phone}}"> </td> -->
    <input type="hidden" id="user_id" name="user_id" value="{{$user->id}}"  >
  </tr>
  <tr>
    <th>Authorized Capital :</th>
    <td>
        <div class="captial_rs">
            <span style="margin-right: 5px;">₹</span>
            <input type="text" id="authorized-capital" name="authorized_capital" value="{{$user->authorized_capital}}" >
        </div>
    </td>
</tr>

<tr>
    <th>Paid-up Capital :</th>
    <td>
        <div class="captial_rs">
            <span style="margin-right: 5px;">₹</span>
            <input type="text" id="paid-up-capital" name="paid_up_capital" value="{{$user->paid_up_capital}}">
        </div>
    </td>
</tr>
  <tr>
    <td><button type="submit" value="Submit" class="hvr-rotate">Save</button> </td>
  </tr>
</table>

</form>

</div>
</div>
<!-- edit mode code start -->

   <!-- save mode code start -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script>
$(document).ready(function() {
    let emailExists = false;
    let phoneExists = false;

    // Check email on blur
    $('#Email').on('blur', function() {
        let email = $(this).val();

        // Make AJAX request to check email existence
        $.ajax({
            url: "{{ route('checkUserExistence') }}",
            method: "POST",
            data: {
                email: email,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.emailExists) {
                    toastr.error("Email already exists!");  // Toastr error notification
                    $('#Email').addClass('is-invalid');  // Add invalid class for styling
                    emailExists = true;  // Set flag to true if email exists
                } else {
                    $('#Email').removeClass('is-invalid');  // Remove invalid class if valid
                    emailExists = false;  // Set flag to false if email is valid
                }
            }
        });
    });

    // Check phone on blur
    $('#phone').on('blur', function() {
        let phone = $(this).val();

        // Make AJAX request to check phone existence
        $.ajax({
            url: "{{ route('checkUserExistence') }}",
            method: "POST",
            data: {
                phone: phone,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.phoneExists) {
                    toastr.error("Phone number already exists!");  // Toastr error notification
                    $('#phone').addClass('is-invalid');  // Add invalid class for styling
                    phoneExists = true;  // Set flag to true if phone exists
                } else {
                    $('#phone').removeClass('is-invalid');  // Remove invalid class if valid
                    phoneExists = false;  // Set flag to false if phone is valid
                }
            }
        });
    });

    // Prevent form submission if email or phone exists
    $('#companystore').on('submit', function(event) {
        if (emailExists || phoneExists) {
            event.preventDefault();  // Prevent form submission
            toastr.error("Please fix the errors before submitting the form.");
        }
    });
});
</script>



</div>
<div class="col-md-4">
    <div class="invest_rec">
        
    <div class="invest_top">
<div class="main_gstin_Details">
    <!---->
    <div class="gst_header">
        <div class="gst_left_head">
            <span>GSTIN Details</span>
            <h2>{{$gstnocount}} GSTINs</h2>
        </div>
        <div class="gst_right_head">
            <button class="Add_GSTIN" id="Add_GSTIN">Add GSTIN</button>
        </div>
    </div>
    <!---->
    
    <!---->
    <div class="save_and_edit_gst">
        <div class="gst_saved_data">
            <ul>
                
                <!--new li_append to fill data start-->
                <form id="gstForm"> 
@csrf
                <li class="new_addpned">
                    <span class="edit_new_filed">
                         <input type="hidden" id="user_id" name="user_id" value="{{$user->id}}"  required>
                    <select id="statee_new" name="statee_new" class="state-field" required>
        <option value="">Select State</option>
        <option value="Andhra Pradesh">Andhra Pradesh</option>
        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
        <option value="Assam">Assam</option>
        <option value="Bihar">Bihar</option>
        <option value="Chhattisgarh">Chhattisgarh</option>
        <option value="Goa">Goa</option>
        <option value="Gujarat">Gujarat</option>
        <option value="Haryana">Haryana</option>
        <option value="Himachal Pradesh">Himachal Pradesh</option>
        <option value="Jharkhand">Jharkhand</option>
        <option value="Karnataka">Karnataka</option>
        <option value="Kerala">Kerala</option>
        <option value="Madhya Pradesh">Madhya Pradesh</option>
        <option value="Maharashtra">Maharashtra</option>
        <option value="Manipur">Manipur</option>
        <option value="Meghalaya">Meghalaya</option>
        <option value="Mizoram">Mizoram</option>
        <option value="Nagaland">Nagaland</option>
        <option value="Odisha">Odisha</option>
        <option value="Punjab">Punjab</option>
        <option value="Rajasthan">Rajasthan</option>
        <option value="Sikkim">Sikkim</option>
        <option value="Tamil Nadu">Tamil Nadu</option>
        <option value="Telangana">Telangana</option>
        <option value="Tripura">Tripura</option>
        <option value="Uttar Pradesh">Uttar Pradesh</option>
        <option value="Uttarakhand">Uttarakhand</option>
        <option value="West Bengal">West Bengal</option>
        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
        <option value="Chandigarh">Chandigarh</option>
        <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
        <option value="Daman and Diu">Daman and Diu</option>
        <option value="Lakshadweep">Lakshadweep</option>
        <option value="Delhi">Delhi</option>
        <option value="Puducherry">Puducherry</option>
        <option value="Ladakh">Ladakh</option>
        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
    </select>
                    </span>
                    
                    <div class="gst_nomver">
                    <h3 class="edit_new_filed"><input type="text" id="add_gstt" name="add_gstt" placeholder="Enter GSTINs" value="" pattern="^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[A-Z0-9]{3}$" 
                    title="GST must be 15 characters: 2 digits for state code, 5 letters for PAN, 4 digits for PAN, 1 letter for PAN, and 3 alphanumeric characters for PAN." required></h3>
                     
                    <div class="copy_save">

                        <button class="add_gst_no" id="add_gst_no" type="submit">
                            <svg width="76" height="57" viewBox="0 0 76 57" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5 30L26.875 51.875L70.625 5" stroke="white" stroke-width="10" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                        </button>
                        
                    </div>
                    </div>
                    <button class="cross_gst" id="cross_gst">X</button>
                </li>
                </form>
                 <!--new li_append to fill data end-->
                  
                
                <!--data append li start-->
              @if($gstno && $gstno->isNotEmpty())
              
    @foreach($gstno as $gst)
    <li>
    <form id="gsteditForm"  action="{{ route('updateGST') }}" method="POST" enctype="multipart/form-data" class="gsteditForm" style="display:block; width:100%;"> 
@csrf
                <div class="gst_appeddn">
                    <span class="saved_filed">{{$gst->statee_new}}</span>
                    <input type="hidden" id="gst_id" name="gst_id" value="{{$gst->id}}">
                    <span class="edit_mode_filed" style="display:none;">
                    <select id="statee" name="statee_new" class="state-field" required>
        <option value="">Select State</option>
        <option value="Andhra Pradesh" {{ $gst->statee_new === 'Andhra Pradesh' ? ' selected' : '' }}>Andhra Pradesh</option>
        <option value="Arunachal Pradesh" {{ $gst->statee_new === 'Arunachal Pradesh' ? ' selected' : '' }}>Arunachal Pradesh</option>
        <option value="Assam" {{ $gst->statee_new === 'Assam' ? ' selected' : '' }}>Assam</option>
        <option value="Bihar" {{ $gst->statee_new === 'Bihar' ? ' selected' : '' }}>Bihar</option>
        <option value="Chhattisgarh" {{ $gst->statee_new === 'Chhattisgarh' ? ' selected' : '' }}>Chhattisgarh</option>
        <option value="Goa" {{ $gst->statee_new === 'Goa' ? ' selected' : '' }}>Goa</option>
        <option value="Gujarat" {{ $gst->statee_new === 'Gujarat' ? ' selected' : '' }}>Gujarat</option>
        <option value="Haryana" {{ $gst->statee_new === 'Haryana' ? ' selected' : '' }}>Haryana</option>
        <option value="Himachal Pradesh" {{ $gst->industry === 'Himachal Pradesh' ? ' selected' : '' }}>Himachal Pradesh</option>
        <option value="Jharkhand" {{ $gst->statee_new === 'Jharkhand' ? ' selected' : '' }}>Jharkhand</option>
        <option value="Karnataka" {{ $gst->statee_new === 'Karnataka' ? ' selected' : '' }}>Karnataka</option>
        <option value="Kerala" {{ $gst->statee_new === 'Kerala' ? ' selected' : '' }}>Kerala</option>
        <option value="Madhya Pradesh" {{ $gst->statee_new === 'Madhya Pradesh' ? ' selected' : '' }}>Madhya Pradesh</option>
        <option value="Maharashtra" {{ $gst->statee_new === 'Maharashtra' ? ' selected' : '' }}>Maharashtra</option>
        <option value="Manipur" {{ $gst->statee_new === 'Manipur' ? ' selected' : '' }}>Manipur</option>
        <option value="Meghalaya" {{ $gst->statee_new === 'Meghalaya' ? ' selected' : '' }}>Meghalaya</option>
        <option value="Mizoram" {{ $gst->statee_new === 'Mizoram' ? ' selected' : '' }}>Mizoram</option>
        <option value="Nagaland" {{ $gst->statee_new === 'Nagaland' ? ' selected' : '' }}>Nagaland</option>
        <option value="Odisha" {{ $gst->statee_new === 'Odisha' ? ' selected' : '' }}>Odisha</option>
        <option value="Punjab" {{ $gst->statee_new === 'Punjab' ? ' selected' : '' }}>Punjab</option>
        <option value="Rajasthan" {{ $gst->statee_new === 'Rajasthan' ? ' selected' : '' }}>Rajasthan</option>
        <option value="Sikkim" {{ $gst->statee_new === 'Sikkim' ? ' selected' : '' }}>Sikkim</option>
        <option value="Tamil Nadu" {{ $gst->statee_new === 'Tamil Nadu' ? ' selected' : '' }}>Tamil Nadu</option>
        <option value="Telangana" {{ $gst->statee_new === 'Telangana' ? ' selected' : '' }}>Telangana</option>
        <option value="Tripura" {{ $gst->statee_new === 'Tripura' ? ' selected' : '' }}>Tripura</option>
        <option value="Uttar Pradesh" {{ $gst->statee_new === 'Uttar Pradesh' ? ' selected' : '' }}>Uttar Pradesh</option>
        <option value="Uttarakhand" {{ $gst->statee_new === 'Uttarakhand' ? ' selected' : '' }}>Uttarakhand</option>
        <option value="West Bengal" {{ $gst->statee_new === 'West Bengal' ? ' selected' : '' }}>West Bengal</option>
        <option value="Andaman and Nicobar Islands" {{ $gst->statee_new === 'Andaman and Nicobar Islands' ? ' selected' : '' }}>Andaman and Nicobar Islands</option>
        <option value="Chandigarh" {{ $gst->statee_new === 'Chandigarh' ? ' selected' : '' }}>Chandigarh</option>
        <option value="Dadra and Nagar Haveli" {{ $gst->statee_new === 'Dadra and Nagar Haveli' ? ' selected' : '' }}>Dadra and Nagar Haveli</option>
        <option value="Daman and Diu" {{ $gst->statee_new === 'Daman and Diu' ? ' selected' : '' }}>Daman and Diu</option>
        <option value="Lakshadweep" {{ $gst->statee_new === 'Lakshadweep' ? ' selected' : '' }}>Lakshadweep</option>
        <option value="Delhi" {{ $gst->statee_new === 'Retail' ? ' Delhi' : '' }}>Delhi</option>
        <option value="Puducherry" {{ $gst->statee_new === 'Puducherry' ? ' selected' : '' }}>Puducherry</option>
        <option value="Ladakh" {{ $gst->statee_new === 'Ladakh' ? ' selected' : '' }}>Ladakh</option>
        <option value="Jammu and Kashmir" {{ $gst->statee_new === 'Jammu and Kashmir' ? ' selected' : '' }}>Jammu and Kashmir</option>
    </select>
                    </span>
                    
                    <div class="gst_nomver">
                    <h3 class="saved_filed">{{$gst->add_gstt}}</h3>
                    <h3 class="edit_mode_filed" style="display:none;"><input type="text" id="edit_gstt" name="add_gstt" value="{{$gst->add_gstt}}" pattern="^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[A-Z0-9]{3}$" 
                    title="GST must be 15 characters: 2 digits for state code, 5 letters for PAN, 4 digits for PAN, 1 letter, and 3 alphanumeric characters."></h3>
                     
                    <div class="copy_save">
                        <button class="copy_gst_no" type="button">
                            <svg width="13" height="15" viewBox="0 0 13 15" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8.35938 2.82812H2.35938C1.53095 2.82812 0.859375 3.39416 0.859375 4.09241V12.521C0.859375 13.2192 1.53095 13.7853 2.35938 13.7853H8.35938C9.1878 13.7853 9.85938 13.2192 9.85938 12.521V4.09241C9.85938 3.39416 9.1878 2.82812 8.35938 2.82812Z" stroke="#393939"/>
<path d="M2.85156 2.40686C2.85156 2.07155 3.0096 1.74998 3.2909 1.51288C3.57221 1.27578 3.95374 1.14258 4.35156 1.14258H10.3516C10.7494 1.14258 11.1309 1.27578 11.4122 1.51288C11.6935 1.74998 11.8516 2.07155 11.8516 2.40686V10.8354C11.8516 11.1707 11.6935 11.4923 11.4122 11.7294C11.1309 11.9665 10.7494 12.0997 10.3516 12.0997" stroke="#393939"/>
</svg>
                        </button>
                        
                                                <button class="save_gst_no" id="save_gst_no" type="submit" style="display:none;">
                            <svg width="76" height="57" viewBox="0 0 76 57" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5 30L26.875 51.875L70.625 5" stroke="white" stroke-width="10" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                        </button>
                        
                        <button class="cick_edit_gstin" id="cick_edit_gstin" type="button" style="display:none;">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.75 12.25V9.77083L9.45 2.08542C9.56667 1.97847 9.69558 1.89583 9.83675 1.8375C9.97792 1.77917 10.1261 1.75 10.2812 1.75C10.4368 1.75 10.5875 1.77917 10.7333 1.8375C10.8792 1.89583 11.0056 1.98333 11.1125 2.1L11.9146 2.91667C12.0312 3.02361 12.1164 3.15 12.1701 3.29583C12.2238 3.44167 12.2504 3.5875 12.25 3.73333C12.25 3.88889 12.2234 4.03725 12.1701 4.17842C12.1168 4.31958 12.0316 4.44831 11.9146 4.56458L4.22917 12.25H1.75ZM10.2667 4.55L11.0833 3.73333L10.2667 2.91667L9.45 3.73333L10.2667 4.55Z" fill="#E3E3E3"></path>
</svg>
                        </button>
                        
                        
                    </div>
                    </div>
                 
                </div>
                </form>
                   <button class="delete_gstin" id="delete_gstin" data-gst-id="{{$gst->id}}">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.5 2.75H9.5C9.5 2.35218 9.34196 1.97064 9.06066 1.68934C8.77936 1.40804 8.39782 1.25 8 1.25C7.60218 1.25 7.22064 1.40804 6.93934 1.68934C6.65804 1.97064 6.5 2.35218 6.5 2.75ZM5.375 2.75C5.375 2.40528 5.4429 2.06394 5.57482 1.74546C5.70673 1.42698 5.90009 1.1376 6.14384 0.893845C6.3876 0.650091 6.67698 0.456735 6.99546 0.324816C7.31394 0.192898 7.65528 0.125 8 0.125C8.34472 0.125 8.68606 0.192898 9.00454 0.324816C9.32302 0.456735 9.6124 0.650091 9.85616 0.893845C10.0999 1.1376 10.2933 1.42698 10.4252 1.74546C10.5571 2.06394 10.625 2.40528 10.625 2.75H14.9375C15.0867 2.75 15.2298 2.80926 15.3352 2.91475C15.4407 3.02024 15.5 3.16332 15.5 3.3125C15.5 3.46168 15.4407 3.60476 15.3352 3.71025C15.2298 3.81574 15.0867 3.875 14.9375 3.875H13.9475L13.07 12.9583C13.0027 13.6542 12.6785 14.3002 12.1608 14.7701C11.643 15.2401 10.9687 15.5003 10.2695 15.5H5.7305C5.0314 15.5001 4.35733 15.2398 3.83971 14.7699C3.3221 14.3 2.99805 13.6541 2.93075 12.9583L2.0525 3.875H1.0625C0.913316 3.875 0.770242 3.81574 0.664752 3.71025C0.559263 3.60476 0.5 3.46168 0.5 3.3125C0.5 3.16332 0.559263 3.02024 0.664752 2.91475C0.770242 2.80926 0.913316 2.75 1.0625 2.75H5.375ZM6.875 6.3125C6.875 6.16332 6.81574 6.02024 6.71025 5.91475C6.60476 5.80926 6.46168 5.75 6.3125 5.75C6.16332 5.75 6.02024 5.80926 5.91475 5.91475C5.80926 6.02024 5.75 6.16332 5.75 6.3125V11.9375C5.75 12.0867 5.80926 12.2298 5.91475 12.3352C6.02024 12.4407 6.16332 12.5 6.3125 12.5C6.46168 12.5 6.60476 12.4407 6.71025 12.3352C6.81574 12.2298 6.875 12.0867 6.875 11.9375V6.3125ZM9.6875 5.75C9.83668 5.75 9.97976 5.80926 10.0852 5.91475C10.1907 6.02024 10.25 6.16332 10.25 6.3125V11.9375C10.25 12.0867 10.1907 12.2298 10.0852 12.3352C9.97976 12.4407 9.83668 12.5 9.6875 12.5C9.53832 12.5 9.39524 12.4407 9.28975 12.3352C9.18426 12.2298 9.125 12.0867 9.125 11.9375V6.3125C9.125 6.16332 9.18426 6.02024 9.28975 5.91475C9.39524 5.80926 9.53832 5.75 9.6875 5.75ZM4.0505 12.8502C4.09095 13.2677 4.28543 13.6552 4.59603 13.9371C4.90662 14.219 5.31106 14.3751 5.7305 14.375H10.2695C10.6889 14.3751 11.0934 14.219 11.404 13.9371C11.7146 13.6552 11.909 13.2677 11.9495 12.8502L12.818 3.875H3.182L4.0505 12.8502Z" fill="black"/>
</svg>
                    </button>
                    </li>
                @endforeach
@else
<div class="khaliclass">
    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F"></path>
                                <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F"></circle>
                              </svg>
                              <p>No information available.</p>
                              </div>
@endif

            </ul>
        </div>
        
        
        <div class="show_edit_btns">
            <button class="show_ediits" id="show_ediits">
                Edit GSTINs
            </button>
        </div>
    </div>
    <!---->
</div>
    </div>

<div class="invest_botom">
<div class="pop_directorss" data-bs-toggle="modal" data-bs-target="#add_directorrs">
    <div class="left_pop_directorss">
        <span>Director Details</span>
        <h2>{{$directorcount}} Directors</h2>
    </div>
    <div class="right_pop_directorss">
    <button ><svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2 2L12 12L2 22" stroke="white" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
</button>
    </div>
</div>
</div>

<!--------->
<div class="invest_botom inverst_employes">
<div class="pop_directorss" data-bs-toggle="modal" data-bs-target="#employees_master_details">
    <div class="left_pop_directorss">
        <span>Employee Details</span>
        <h2>{{$employeescount}} Employees</h2>
    </div>
    <div class="right_pop_directorss">
    <button ><svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2 2L12 12L2 22" stroke="white" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
</button>
    </div>
</div>
</div>


<!--director info pop start-->

                            <div class="modal fade add_directorrs" id="add_directorrs" tabindex="-1" role="dialog" aria-labelledby="add_directorrs" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Director’s Info</h5>
                                   <a class="add_dir_pop">
                                       <svg width="25" height="14" viewBox="0 0 25 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.41406 7.58366H2.91406V6.41699H6.41406V2.91699H7.58073V6.41699H11.0807V7.58366H7.58073V11.0837H6.41406V7.58366Z" fill="#7E7E7E"/>
<path d="M18.0026 1.16699C17.3838 1.16699 16.7903 1.41282 16.3527 1.85041C15.9151 2.28799 15.6693 2.88149 15.6693 3.50033C15.6693 4.11916 15.9151 4.71266 16.3527 5.15024C16.7903 5.58783 17.3838 5.83366 18.0026 5.83366C18.6214 5.83366 19.2149 5.58783 19.6525 5.15024C20.0901 4.71266 20.3359 4.11916 20.3359 3.50033C20.3359 2.88149 20.0901 2.28799 19.6525 1.85041C19.2149 1.41282 18.6214 1.16699 18.0026 1.16699ZM20.9193 7.00033H15.0859C14.6218 7.00033 14.1767 7.1847 13.8485 7.51289C13.5203 7.84108 13.3359 8.2862 13.3359 8.75033C13.3359 10.0523 13.8714 11.0953 14.7499 11.8012C15.6144 12.4953 16.7741 12.8337 18.0026 12.8337C19.2311 12.8337 20.3908 12.4953 21.2553 11.8012C22.1326 11.0953 22.6693 10.0523 22.6693 8.75033C22.6693 8.2862 22.4849 7.84108 22.1567 7.51289C21.8285 7.1847 21.3834 7.00033 20.9193 7.00033Z" fill="#7E7E7E"/>
</svg>
                                       Add a director</a>
                                  </div>
                                  <div class="modal-body">
                                      
 

<div class="accordion">
    
<form action="{{ route('storecompanydirector') }}" method="POST" enctype="multipart/form-data" class="upload-form stempcom storedirector">
    <!--new append form accordian start-->
    @csrf 
    <div class="accordion-item open_default">
    <div class="accordion-header">
        <div class="ac_round_wrap">
        <div class="ac_round">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M11.994 1.52266C11.2338 0.701953 10.1721 0.25 9.00022 0.25C7.8221 0.25 6.75686 0.699219 6.00022 1.51484C5.23538 2.33945 4.86272 3.46016 4.95022 4.67031C5.12366 7.05781 6.94046 9 9.00022 9C11.06 9 12.8737 7.0582 13.0498 4.67109C13.1385 3.47187 12.7635 2.35352 11.994 1.52266ZM15.8752 17.75H2.12522C1.94525 17.7523 1.76702 17.7145 1.60349 17.6393C1.43997 17.5641 1.29526 17.4534 1.17991 17.3152C0.926005 17.0117 0.823661 16.5973 0.899442 16.1781C1.22913 14.3492 2.25804 12.8129 3.87522 11.7344C5.31194 10.777 7.13186 10.25 9.00022 10.25C10.8686 10.25 12.6885 10.7773 14.1252 11.7344C15.7424 12.8125 16.7713 14.3488 17.101 16.1777C17.1768 16.5969 17.0744 17.0113 16.8205 17.3148C16.7052 17.4531 16.5605 17.5639 16.397 17.6391C16.2335 17.7144 16.0552 17.7523 15.8752 17.75Z" fill="#4B4B4B"/>
        </svg>
        </div>
        <h2><input type="text" id="name" name="name"></h2>
        </div>

    </div>
    <div class="accordion-content">
 <div class="thhree_fields">
     
<div class="thhree_fieldswraoo">
<div class="gropu_form">
<label for="start">Start Date</label>
<input type="date" id="start" name="startdate">
</div>
<div class="gropu_form">
<label for="end">End Date</label>
<input type="date" id="end" name="enddate">
</div>
</div>
<div class="gropu_form">
<label for="DIN">DIN</label>
<input type="text" id="DIN" name="DIN">
</div>

 </div>
 <div class="two_edit_del_button">
     <a class="director_full_del_row clearempform" id="director_full_del_row">
         <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.42969 2.67871H9.42969C9.42969 2.28089 9.27165 1.89936 8.99035 1.61805C8.70904 1.33675 8.32751 1.17871 7.92969 1.17871C7.53186 1.17871 7.15033 1.33675 6.86903 1.61805C6.58772 1.89936 6.42969 2.28089 6.42969 2.67871ZM5.30469 2.67871C5.30469 2.33399 5.37259 1.99265 5.5045 1.67417C5.63642 1.35569 5.82978 1.06631 6.07353 0.822556C6.31729 0.578802 6.60666 0.385446 6.92514 0.253527C7.24362 0.121609 7.58497 0.0537109 7.92969 0.0537109C8.27441 0.0537109 8.61575 0.121609 8.93423 0.253527C9.25271 0.385446 9.54209 0.578802 9.78584 0.822556C10.0296 1.06631 10.223 1.35569 10.3549 1.67417C10.4868 1.99265 10.5547 2.33399 10.5547 2.67871H14.8672C15.0164 2.67871 15.1594 2.73797 15.2649 2.84346C15.3704 2.94895 15.4297 3.09203 15.4297 3.24121C15.4297 3.3904 15.3704 3.53347 15.2649 3.63896C15.1594 3.74445 15.0164 3.80371 14.8672 3.80371H13.8772L12.9997 12.887C12.9324 13.5829 12.6082 14.2289 12.0904 14.6988C11.5727 15.1688 10.8984 15.429 10.1992 15.4287H5.66019C4.96109 15.4288 4.28701 15.1685 3.7694 14.6986C3.25179 14.2287 2.92774 13.5828 2.86044 12.887L1.98219 3.80371H0.992188C0.843003 3.80371 0.699929 3.74445 0.59444 3.63896C0.488951 3.53347 0.429688 3.3904 0.429688 3.24121C0.429688 3.09203 0.488951 2.94895 0.59444 2.84346C0.699929 2.73797 0.843003 2.67871 0.992188 2.67871H5.30469ZM6.80469 6.24121C6.80469 6.09203 6.74542 5.94895 6.63994 5.84346C6.53445 5.73797 6.39137 5.67871 6.24219 5.67871C6.093 5.67871 5.94993 5.73797 5.84444 5.84346C5.73895 5.94895 5.67969 6.09203 5.67969 6.24121V11.8662C5.67969 12.0154 5.73895 12.1585 5.84444 12.264C5.94993 12.3694 6.093 12.4287 6.24219 12.4287C6.39137 12.4287 6.53445 12.3694 6.63994 12.264C6.74542 12.1585 6.80469 12.0154 6.80469 11.8662V6.24121ZM9.61719 5.67871C9.76637 5.67871 9.90945 5.73797 10.0149 5.84346C10.1204 5.94895 10.1797 6.09203 10.1797 6.24121V11.8662C10.1797 12.0154 10.1204 12.1585 10.0149 12.264C9.90945 12.3694 9.76637 12.4287 9.61719 12.4287C9.468 12.4287 9.32493 12.3694 9.21944 12.264C9.11395 12.1585 9.05469 12.0154 9.05469 11.8662V6.24121C9.05469 6.09203 9.11395 5.94895 9.21944 5.84346C9.32493 5.73797 9.468 5.67871 9.61719 5.67871ZM3.98019 12.779C4.02064 13.1964 4.21512 13.5839 4.52571 13.8658C4.83631 14.1477 5.24075 14.3038 5.66019 14.3037H10.1992C10.6186 14.3038 11.0231 14.1477 11.3337 13.8658C11.6443 13.5839 11.8387 13.1964 11.8792 12.779L12.7477 3.80371H3.11169L3.98019 12.779Z" fill="#1C1C1C"/>
</svg>
     </a>

          <button class="director_full_submit_row" id="director_full_submit_row" type="submit">
<svg width="76" height="57" viewBox="0 0 76 57" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5 30L26.875 51.875L70.625 5" stroke="white" stroke-width="10" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
     </button>
     
 </div>
 
    </div>
  </div>
    <!--new append form accordian end-->
    </form>
    @foreach($directorcompany as $dir)
  <form action="{{ route('updatecompanydirector') }}" method="POST" enctype="multipart/form-data" class="upload-form">
  @csrf
  <div class="accordion-item">
    <div class="accordion-header">
        <div class="ac_round_wrap">
        <div class="ac_round">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M11.994 1.52266C11.2338 0.701953 10.1721 0.25 9.00022 0.25C7.8221 0.25 6.75686 0.699219 6.00022 1.51484C5.23538 2.33945 4.86272 3.46016 4.95022 4.67031C5.12366 7.05781 6.94046 9 9.00022 9C11.06 9 12.8737 7.0582 13.0498 4.67109C13.1385 3.47187 12.7635 2.35352 11.994 1.52266ZM15.8752 17.75H2.12522C1.94525 17.7523 1.76702 17.7145 1.60349 17.6393C1.43997 17.5641 1.29526 17.4534 1.17991 17.3152C0.926005 17.0117 0.823661 16.5973 0.899442 16.1781C1.22913 14.3492 2.25804 12.8129 3.87522 11.7344C5.31194 10.777 7.13186 10.25 9.00022 10.25C10.8686 10.25 12.6885 10.7773 14.1252 11.7344C15.7424 12.8125 16.7713 14.3488 17.101 16.1777C17.1768 16.5969 17.0744 17.0113 16.8205 17.3148C16.7052 17.4531 16.5605 17.5639 16.397 17.6391C16.2335 17.7144 16.0552 17.7523 15.8752 17.75Z" fill="#4B4B4B"/>
        </svg>
        </div>
        <h2 class="name_form_rj">{{$dir->name}}</h2>
        </div>
        <div class="less_morre">
            <span class="lless">Less</span>
            <span class="mmore">More</span>
            <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9.16406 0.916992L4.9974 5.08366L0.830729 0.916992" stroke="#707EAE"/>
</svg>
        </div>
    </div>
    <div class="accordion-content">
 <div class="thhree_fields">
     
<div class="thhree_fieldswraoo">
<div class="gropu_form">
<label for="start">Start Date</label>
<input type="hidden" id="dir_id" name="dir_id" value="{{$dir->id}}" readonly>
<input type="date" id="start" name="startdate" value="{{$dir->startdate}}" readonly>
</div>
<div class="gropu_form">
<label for="end">End Date</label>
<input type="date" id="end" name="enddate" value="{{$dir->enddate}}" readonly>
</div>
</div>

<div class="thhree_fieldswraoo">
<div class="gropu_form">
<label for="DIN">DIN</label>
<input type="text" id="DIN" name="DIN" value="{{$dir->DIN}}" readonly>
</div>
<div class="gropu_form f_nname">
<label for="f_name">Name</label>
<input type="text" id="f_name" name="f_name" value="{{$dir->name}}" readonly>
</div>
</div>

 </div>
 <div class="two_edit_del_button">
     <button class="director_full_del delcompdir" id="director_full_del_{{ $dir->id }}"  data-id="{{ $dir->id }}">
         <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.42969 2.67871H9.42969C9.42969 2.28089 9.27165 1.89936 8.99035 1.61805C8.70904 1.33675 8.32751 1.17871 7.92969 1.17871C7.53186 1.17871 7.15033 1.33675 6.86903 1.61805C6.58772 1.89936 6.42969 2.28089 6.42969 2.67871ZM5.30469 2.67871C5.30469 2.33399 5.37259 1.99265 5.5045 1.67417C5.63642 1.35569 5.82978 1.06631 6.07353 0.822556C6.31729 0.578802 6.60666 0.385446 6.92514 0.253527C7.24362 0.121609 7.58497 0.0537109 7.92969 0.0537109C8.27441 0.0537109 8.61575 0.121609 8.93423 0.253527C9.25271 0.385446 9.54209 0.578802 9.78584 0.822556C10.0296 1.06631 10.223 1.35569 10.3549 1.67417C10.4868 1.99265 10.5547 2.33399 10.5547 2.67871H14.8672C15.0164 2.67871 15.1594 2.73797 15.2649 2.84346C15.3704 2.94895 15.4297 3.09203 15.4297 3.24121C15.4297 3.3904 15.3704 3.53347 15.2649 3.63896C15.1594 3.74445 15.0164 3.80371 14.8672 3.80371H13.8772L12.9997 12.887C12.9324 13.5829 12.6082 14.2289 12.0904 14.6988C11.5727 15.1688 10.8984 15.429 10.1992 15.4287H5.66019C4.96109 15.4288 4.28701 15.1685 3.7694 14.6986C3.25179 14.2287 2.92774 13.5828 2.86044 12.887L1.98219 3.80371H0.992188C0.843003 3.80371 0.699929 3.74445 0.59444 3.63896C0.488951 3.53347 0.429688 3.3904 0.429688 3.24121C0.429688 3.09203 0.488951 2.94895 0.59444 2.84346C0.699929 2.73797 0.843003 2.67871 0.992188 2.67871H5.30469ZM6.80469 6.24121C6.80469 6.09203 6.74542 5.94895 6.63994 5.84346C6.53445 5.73797 6.39137 5.67871 6.24219 5.67871C6.093 5.67871 5.94993 5.73797 5.84444 5.84346C5.73895 5.94895 5.67969 6.09203 5.67969 6.24121V11.8662C5.67969 12.0154 5.73895 12.1585 5.84444 12.264C5.94993 12.3694 6.093 12.4287 6.24219 12.4287C6.39137 12.4287 6.53445 12.3694 6.63994 12.264C6.74542 12.1585 6.80469 12.0154 6.80469 11.8662V6.24121ZM9.61719 5.67871C9.76637 5.67871 9.90945 5.73797 10.0149 5.84346C10.1204 5.94895 10.1797 6.09203 10.1797 6.24121V11.8662C10.1797 12.0154 10.1204 12.1585 10.0149 12.264C9.90945 12.3694 9.76637 12.4287 9.61719 12.4287C9.468 12.4287 9.32493 12.3694 9.21944 12.264C9.11395 12.1585 9.05469 12.0154 9.05469 11.8662V6.24121C9.05469 6.09203 9.11395 5.94895 9.21944 5.84346C9.32493 5.73797 9.468 5.67871 9.61719 5.67871ZM3.98019 12.779C4.02064 13.1964 4.21512 13.5839 4.52571 13.8658C4.83631 14.1477 5.24075 14.3038 5.66019 14.3037H10.1992C10.6186 14.3038 11.0231 14.1477 11.3337 13.8658C11.6443 13.5839 11.8387 13.1964 11.8792 12.779L12.7477 3.80371H3.11169L3.98019 12.779Z" fill="#1C1C1C"/>
</svg>
     </button>
          <a class="director_full_edit" id="director_full_edit">
         <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0 12V9.16667L8.8 0.383333C8.93333 0.261111 9.08067 0.166667 9.242 0.1C9.40333 0.0333334 9.57267 0 9.75 0C9.92778 0 10.1 0.0333334 10.2667 0.1C10.4333 0.166667 10.5778 0.266667 10.7 0.4L11.6167 1.33333C11.75 1.45556 11.8473 1.6 11.9087 1.76667C11.97 1.93333 12.0004 2.1 12 2.26667C12 2.44444 11.9696 2.614 11.9087 2.77533C11.8478 2.93667 11.7504 3.08378 11.6167 3.21667L2.83333 12H0ZM9.73333 3.2L10.6667 2.26667L9.73333 1.33333L8.8 2.26667L9.73333 3.2Z" fill="white"/>
</svg>
     </a>
          <button class="director_full_submit" id="director_full_submit" type="submit">
<svg width="76" height="57" viewBox="0 0 76 57" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5 30L26.875 51.875L70.625 5" stroke="white" stroke-width="10" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
     </button>
     
 </div>
 
    </div>
  </div>
  </form>
@endforeach

</div>

<script>
  $(document).on('click', '.delcompdir', function() {
    const id = $(this).data('id');
    
    $.ajax({
        url: '/updatedirstatus', // The URL for the update request
        method: 'POST',
        data: {
            id: id,
            _token: '{{ csrf_token() }}' // Include CSRF token for Laravel
        },
        success: function(response) {
            // Handle the success response
            if (response.success) {
                // Show success message with Toastr
                toastr.success('Status updated successfully!');
            } else {
                // Show error message with Toastr
                toastr.error('Error updating status.');
            }
        },
        error: function(xhr) {
            // Show error message with Toastr
            toastr.error('An error occurred: ' + xhr.responseText);
        }
    });
});
</script>
  
</div>
                                </div>
                              </div>
                            </div>
                            
<!--director info pop end-->

<!--Eployees master details start-->

                            <div class="modal fade add_directorrs employees_master_details" id="employees_master_details" tabindex="-1" role="dialog" aria-labelledby="employees_master_details" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Employee Master Details</h5>
<button class="download_allexcel">
    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.33594 12.1663V13.833C1.33594 14.275 1.51153 14.699 1.82409 15.0115C2.13665 15.3241 2.56058 15.4997 3.0026 15.4997H13.0026C13.4446 15.4997 13.8686 15.3241 14.1811 15.0115C14.4937 14.699 14.6693 14.275 14.6693 13.833V12.1663M3.83594 7.16634L8.0026 11.333M8.0026 11.333L12.1693 7.16634M8.0026 11.333V1.33301" stroke="#7E7E7E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
    Download Master Data
</button>
<script>
    $(document).ready(function() {
        $('.download_allexcel').on('click', function() {
            window.location.href = '{{ route('downloadCsv') }}';
        });
    });
</script>

                                  </div>
                                  <div class="modal-body">
                                      


<div class="accordion">
    
           <form action="{{ route('storecompanyemployee') }}" class="upload-form stempcom employ_master_top_form" method="POST" enctype="multipart/form-data">

                    @csrf 
    <!--new append form accordian start-->
    <div class="accordion-item open_default">
    <div class="accordion-header">
        <div class="ac_round_wrap">
        <div class="ac_round">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M11.994 1.52266C11.2338 0.701953 10.1721 0.25 9.00022 0.25C7.8221 0.25 6.75686 0.699219 6.00022 1.51484C5.23538 2.33945 4.86272 3.46016 4.95022 4.67031C5.12366 7.05781 6.94046 9 9.00022 9C11.06 9 12.8737 7.0582 13.0498 4.67109C13.1385 3.47187 12.7635 2.35352 11.994 1.52266ZM15.8752 17.75H2.12522C1.94525 17.7523 1.76702 17.7145 1.60349 17.6393C1.43997 17.5641 1.29526 17.4534 1.17991 17.3152C0.926005 17.0117 0.823661 16.5973 0.899442 16.1781C1.22913 14.3492 2.25804 12.8129 3.87522 11.7344C5.31194 10.777 7.13186 10.25 9.00022 10.25C10.8686 10.25 12.6885 10.7773 14.1252 11.7344C15.7424 12.8125 16.7713 14.3488 17.101 16.1777C17.1768 16.5969 17.0744 17.0113 16.8205 17.3148C16.7052 17.4531 16.5605 17.5639 16.397 17.6391C16.2335 17.7144 16.0552 17.7523 15.8752 17.75Z" fill="#4B4B4B"/>
        </svg>
        </div>
        <h2><input type="text" id="name" name="name"></h2>
        </div>

    </div>
    <div class="accordion-content">
 <div class="thhree_fields">
     
<div class="thhree_fieldswraoo">
<div class="gropu_form">
<label for="app_date">Appointment Date</label>
<input type="date" id="app_date" name="app_dates">
</div>
<div class="gropu_form">
<label for="termi_date">Termination Date</label>
<input type="date" id="termi_date" name="termi_dates">
</div>
</div>
<div class="gropu_form">
<label for="emp_count">Employee Code</label>
<input type="text" id="emp_count" name="emp_code">
</div>

 </div>
 <div class="two_edit_del_button">
     <a class="director_full_del_row clearempform" id="director_full_del_row">
         <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.42969 2.67871H9.42969C9.42969 2.28089 9.27165 1.89936 8.99035 1.61805C8.70904 1.33675 8.32751 1.17871 7.92969 1.17871C7.53186 1.17871 7.15033 1.33675 6.86903 1.61805C6.58772 1.89936 6.42969 2.28089 6.42969 2.67871ZM5.30469 2.67871C5.30469 2.33399 5.37259 1.99265 5.5045 1.67417C5.63642 1.35569 5.82978 1.06631 6.07353 0.822556C6.31729 0.578802 6.60666 0.385446 6.92514 0.253527C7.24362 0.121609 7.58497 0.0537109 7.92969 0.0537109C8.27441 0.0537109 8.61575 0.121609 8.93423 0.253527C9.25271 0.385446 9.54209 0.578802 9.78584 0.822556C10.0296 1.06631 10.223 1.35569 10.3549 1.67417C10.4868 1.99265 10.5547 2.33399 10.5547 2.67871H14.8672C15.0164 2.67871 15.1594 2.73797 15.2649 2.84346C15.3704 2.94895 15.4297 3.09203 15.4297 3.24121C15.4297 3.3904 15.3704 3.53347 15.2649 3.63896C15.1594 3.74445 15.0164 3.80371 14.8672 3.80371H13.8772L12.9997 12.887C12.9324 13.5829 12.6082 14.2289 12.0904 14.6988C11.5727 15.1688 10.8984 15.429 10.1992 15.4287H5.66019C4.96109 15.4288 4.28701 15.1685 3.7694 14.6986C3.25179 14.2287 2.92774 13.5828 2.86044 12.887L1.98219 3.80371H0.992188C0.843003 3.80371 0.699929 3.74445 0.59444 3.63896C0.488951 3.53347 0.429688 3.3904 0.429688 3.24121C0.429688 3.09203 0.488951 2.94895 0.59444 2.84346C0.699929 2.73797 0.843003 2.67871 0.992188 2.67871H5.30469ZM6.80469 6.24121C6.80469 6.09203 6.74542 5.94895 6.63994 5.84346C6.53445 5.73797 6.39137 5.67871 6.24219 5.67871C6.093 5.67871 5.94993 5.73797 5.84444 5.84346C5.73895 5.94895 5.67969 6.09203 5.67969 6.24121V11.8662C5.67969 12.0154 5.73895 12.1585 5.84444 12.264C5.94993 12.3694 6.093 12.4287 6.24219 12.4287C6.39137 12.4287 6.53445 12.3694 6.63994 12.264C6.74542 12.1585 6.80469 12.0154 6.80469 11.8662V6.24121ZM9.61719 5.67871C9.76637 5.67871 9.90945 5.73797 10.0149 5.84346C10.1204 5.94895 10.1797 6.09203 10.1797 6.24121V11.8662C10.1797 12.0154 10.1204 12.1585 10.0149 12.264C9.90945 12.3694 9.76637 12.4287 9.61719 12.4287C9.468 12.4287 9.32493 12.3694 9.21944 12.264C9.11395 12.1585 9.05469 12.0154 9.05469 11.8662V6.24121C9.05469 6.09203 9.11395 5.94895 9.21944 5.84346C9.32493 5.73797 9.468 5.67871 9.61719 5.67871ZM3.98019 12.779C4.02064 13.1964 4.21512 13.5839 4.52571 13.8658C4.83631 14.1477 5.24075 14.3038 5.66019 14.3037H10.1992C10.6186 14.3038 11.0231 14.1477 11.3337 13.8658C11.6443 13.5839 11.8387 13.1964 11.8792 12.779L12.7477 3.80371H3.11169L3.98019 12.779Z" fill="#1C1C1C"/>
</svg>
     </a>

          <button class="director_full_submit_row" id="director_full_submit_row" type="submit">
<svg width="76" height="57" viewBox="0 0 76 57" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5 30L26.875 51.875L70.625 5" stroke="white" stroke-width="10" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
     </button>
     
 </div>
 
    </div>
  </div>
    <!--new append form accordian end-->
      </form>
    @foreach($employeescompany as $emp)
        <form action="{{ route('updatecompanyemployee') }}" class="upload-form" method="POST" enctype="multipart/form-data">

                    @csrf 
    
  <div class="accordion-item">
    <div class="accordion-header">
        <div class="ac_round_wrap">
        <div class="ac_round">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M11.994 1.52266C11.2338 0.701953 10.1721 0.25 9.00022 0.25C7.8221 0.25 6.75686 0.699219 6.00022 1.51484C5.23538 2.33945 4.86272 3.46016 4.95022 4.67031C5.12366 7.05781 6.94046 9 9.00022 9C11.06 9 12.8737 7.0582 13.0498 4.67109C13.1385 3.47187 12.7635 2.35352 11.994 1.52266ZM15.8752 17.75H2.12522C1.94525 17.7523 1.76702 17.7145 1.60349 17.6393C1.43997 17.5641 1.29526 17.4534 1.17991 17.3152C0.926005 17.0117 0.823661 16.5973 0.899442 16.1781C1.22913 14.3492 2.25804 12.8129 3.87522 11.7344C5.31194 10.777 7.13186 10.25 9.00022 10.25C10.8686 10.25 12.6885 10.7773 14.1252 11.7344C15.7424 12.8125 16.7713 14.3488 17.101 16.1777C17.1768 16.5969 17.0744 17.0113 16.8205 17.3148C16.7052 17.4531 16.5605 17.5639 16.397 17.6391C16.2335 17.7144 16.0552 17.7523 15.8752 17.75Z" fill="#4B4B4B"/>
        </svg>
        </div>
        <h2 class="name_form_rj">{{$emp->name}}</h2>
        </div>
        <div class="less_morre">
            <span class="lless">Less</span>
            <span class="mmore">More</span>
            <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9.16406 0.916992L4.9974 5.08366L0.830729 0.916992" stroke="#707EAE"/>
</svg>
        </div>
    </div>
    <div class="accordion-content">
 <div class="thhree_fields">
     
<div class="thhree_fieldswraoo">
<div class="gropu_form">
<label for="app_date">Appointment Date</label>
<input type="date" id="app_date" name="app_date" value="{{$emp->app_date}}" readonly>
<input type="hidden" id="emp_id" name="emp_id" value="{{$emp->id}}" readonly>
</div>
<div class="gropu_form">
<label for="termi_date">Termination Date</label>
<input type="date" id="termi_date" name="termi_date" value="{{$emp->termi_date}}" readonly>
</div>
</div>

<div class="thhree_fieldswraoo">
<div class="gropu_form">
<label for="emp_count">Employee Code</label>
<input type="text" id="emp_count" name="emp_code" value="{{$emp->emp_code}}" readonly>
</div>
<div class="gropu_form f_nname">
<label for="emp_f_name">Name</label>
<input type="text" id="emp_f_name" name="name" value="{{$emp->name}}" readonly>
</div>
</div>

 </div>
 <div class="two_edit_del_button">
     <button class="director_full_del compempdel" id="director_full_del_{{ $emp->id }}" type="button">
         <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.42969 2.67871H9.42969C9.42969 2.28089 9.27165 1.89936 8.99035 1.61805C8.70904 1.33675 8.32751 1.17871 7.92969 1.17871C7.53186 1.17871 7.15033 1.33675 6.86903 1.61805C6.58772 1.89936 6.42969 2.28089 6.42969 2.67871ZM5.30469 2.67871C5.30469 2.33399 5.37259 1.99265 5.5045 1.67417C5.63642 1.35569 5.82978 1.06631 6.07353 0.822556C6.31729 0.578802 6.60666 0.385446 6.92514 0.253527C7.24362 0.121609 7.58497 0.0537109 7.92969 0.0537109C8.27441 0.0537109 8.61575 0.121609 8.93423 0.253527C9.25271 0.385446 9.54209 0.578802 9.78584 0.822556C10.0296 1.06631 10.223 1.35569 10.3549 1.67417C10.4868 1.99265 10.5547 2.33399 10.5547 2.67871H14.8672C15.0164 2.67871 15.1594 2.73797 15.2649 2.84346C15.3704 2.94895 15.4297 3.09203 15.4297 3.24121C15.4297 3.3904 15.3704 3.53347 15.2649 3.63896C15.1594 3.74445 15.0164 3.80371 14.8672 3.80371H13.8772L12.9997 12.887C12.9324 13.5829 12.6082 14.2289 12.0904 14.6988C11.5727 15.1688 10.8984 15.429 10.1992 15.4287H5.66019C4.96109 15.4288 4.28701 15.1685 3.7694 14.6986C3.25179 14.2287 2.92774 13.5828 2.86044 12.887L1.98219 3.80371H0.992188C0.843003 3.80371 0.699929 3.74445 0.59444 3.63896C0.488951 3.53347 0.429688 3.3904 0.429688 3.24121C0.429688 3.09203 0.488951 2.94895 0.59444 2.84346C0.699929 2.73797 0.843003 2.67871 0.992188 2.67871H5.30469ZM6.80469 6.24121C6.80469 6.09203 6.74542 5.94895 6.63994 5.84346C6.53445 5.73797 6.39137 5.67871 6.24219 5.67871C6.093 5.67871 5.94993 5.73797 5.84444 5.84346C5.73895 5.94895 5.67969 6.09203 5.67969 6.24121V11.8662C5.67969 12.0154 5.73895 12.1585 5.84444 12.264C5.94993 12.3694 6.093 12.4287 6.24219 12.4287C6.39137 12.4287 6.53445 12.3694 6.63994 12.264C6.74542 12.1585 6.80469 12.0154 6.80469 11.8662V6.24121ZM9.61719 5.67871C9.76637 5.67871 9.90945 5.73797 10.0149 5.84346C10.1204 5.94895 10.1797 6.09203 10.1797 6.24121V11.8662C10.1797 12.0154 10.1204 12.1585 10.0149 12.264C9.90945 12.3694 9.76637 12.4287 9.61719 12.4287C9.468 12.4287 9.32493 12.3694 9.21944 12.264C9.11395 12.1585 9.05469 12.0154 9.05469 11.8662V6.24121C9.05469 6.09203 9.11395 5.94895 9.21944 5.84346C9.32493 5.73797 9.468 5.67871 9.61719 5.67871ZM3.98019 12.779C4.02064 13.1964 4.21512 13.5839 4.52571 13.8658C4.83631 14.1477 5.24075 14.3038 5.66019 14.3037H10.1992C10.6186 14.3038 11.0231 14.1477 11.3337 13.8658C11.6443 13.5839 11.8387 13.1964 11.8792 12.779L12.7477 3.80371H3.11169L3.98019 12.779Z" fill="#1C1C1C"/>
</svg>
     </button>
          <a class="director_full_edit" id="director_full_edit">
         <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0 12V9.16667L8.8 0.383333C8.93333 0.261111 9.08067 0.166667 9.242 0.1C9.40333 0.0333334 9.57267 0 9.75 0C9.92778 0 10.1 0.0333334 10.2667 0.1C10.4333 0.166667 10.5778 0.266667 10.7 0.4L11.6167 1.33333C11.75 1.45556 11.8473 1.6 11.9087 1.76667C11.97 1.93333 12.0004 2.1 12 2.26667C12 2.44444 11.9696 2.614 11.9087 2.77533C11.8478 2.93667 11.7504 3.08378 11.6167 3.21667L2.83333 12H0ZM9.73333 3.2L10.6667 2.26667L9.73333 1.33333L8.8 2.26667L9.73333 3.2Z" fill="white"/>
</svg>
     </a>
          <button class="director_full_submit" id="director_full_submit" type="submit">
<svg width="76" height="57" viewBox="0 0 76 57" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5 30L26.875 51.875L70.625 5" stroke="white" stroke-width="10" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
     </button>
     
 </div>
 
    </div>
  </div>
   </form>
   @endforeach

</div>


 
</div>
    <div class="modal-footer">
        <div class="main_one_go">
            <div class="one_go_top">
                <h2>Upload All your Employees’ Data in One Go!</h2>
                <a class="add_dir_pop">+ Add an Employee Manually</a>
            </div>
            <div class="three_upload_bttn">
                <button class="emmp_go_download_tem" type="button">
                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1 14V16C1 16.5304 1.21071 17.0391 1.58579 17.4142C1.96086 17.7893 2.46957 18 3 18H15C15.5304 18 16.0391 17.7893 16.4142 17.4142C16.7893 17.0391 17 16.5304 17 16V14M4 8L9 13M9 13L14 8M9 13V1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
<span>
    <b>STEP 1</b>
    Download Template
</span>
                </button>
                <span><svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1 1L7 7L1 13" stroke="#AEAEAE" stroke-width="2"/>
</svg></span>
<div class="go_step_2">
    <b>STEP 2</b>
    <span>Fill in Employee Data according to the given format</span>
</div>
                <span><svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1 1L7 7L1 13" stroke="#AEAEAE" stroke-width="2"/>
</svg></span>

<form class="btnns_gren_upload" action="{{ route('uploadempcsv') }}"  method="POST" enctype="multipart/form-data">

                    @csrf 
<button class="emmp_go_upload_tem" type="button">
<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M19 13V17C19 17.5304 18.7893 18.0391 18.4142 18.4142C18.0391 18.7893 17.5304 19 17 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V13M15 6L10 1M10 1L5 6M10 1V13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
<span>
    <b>STEP 3</b>
    Upload Template
</span>
<input type="file" id="emmp_go_upload_tem" name="csv_file" class="emmp_go_upload_tem_file">
                </button>
                
                <button class="emmp_go_upload_tem ggrn" type="submit">
<svg width="76" height="57" viewBox="0 0 76 57" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5 30L26.875 51.875L70.625 5" stroke="white" stroke-width="10" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
<span>
    <b>STEP 3</b>
    Save Template
</span>
                </button>
                </form>
                
                
            </div>
        </div>
        </div>
                                </div>
                              </div>
                            </div>
                            
<!--Eployees master details end-->


</div>
</div>
</div>
<!-- table sectioon end -->

<!-- download  sectioon start -->
<!--<div class="row compy_download"> -->
<!--<div class="col-sm-12">-->
<!--<div class="grid_down">-->
<!--<div class="a_downn">-->
<!--    <a href="#">Pitch Deck<svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--<path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#6A6A6A"/>-->
<!--<path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#6A6A6A"/>-->
<!--</svg></a>-->
<!--</div>-->
<!--<div class="a_downn">-->
<!--    <a href="#">Financial Projection<svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--<path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#6A6A6A"/>-->
<!--<path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#6A6A6A"/>-->
<!--</svg></a>-->
<!--</div>-->
<!--<div class="a_downn">-->
<!--    <a href="#">Latest Balance Sheet<svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--<path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#6A6A6A"/>-->
<!--<path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#6A6A6A"/>-->
<!--</svg></a>-->
<!--</div>-->
<!--<div class="a_downn">-->
<!--    <a href="#">Pitch Deck<svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--<path d="M1.53125 11.1562C1.12514 11.1563 0.735658 10.9949 0.448493 10.7078C0.161328 10.4206 0 10.0311 0 9.625V7.4375C2.59352e-09 7.26345 0.0691404 7.09653 0.192211 6.97346C0.315282 6.85039 0.482202 6.78125 0.65625 6.78125C0.830298 6.78125 0.997218 6.85039 1.12029 6.97346C1.24336 7.09653 1.3125 7.26345 1.3125 7.4375V9.625C1.3125 9.74575 1.4105 9.84375 1.53125 9.84375H10.7188C10.7768 9.84375 10.8324 9.8207 10.8734 9.77968C10.9145 9.73866 10.9375 9.68302 10.9375 9.625V7.4375C10.9375 7.26345 11.0066 7.09653 11.1297 6.97346C11.2528 6.85039 11.4197 6.78125 11.5938 6.78125C11.7678 6.78125 11.9347 6.85039 12.0578 6.97346C12.1809 7.09653 12.25 7.26345 12.25 7.4375V9.625C12.25 10.0311 12.0887 10.4206 11.8015 10.7078C11.5143 10.9949 11.1249 11.1563 10.7188 11.1562H1.53125Z" fill="#6A6A6A"/>-->
<!--<path d="M5.46834 5.63413V0.65625C5.46834 0.482202 5.53748 0.315282 5.66055 0.192211C5.78362 0.0691404 5.95054 0 6.12459 0C6.29864 0 6.46556 0.0691404 6.58863 0.192211C6.7117 0.315282 6.78084 0.482202 6.78084 0.65625V5.63413L8.50459 3.91125C8.56549 3.85035 8.63779 3.80204 8.71736 3.76908C8.79693 3.73612 8.88222 3.71916 8.96834 3.71916C9.05447 3.71916 9.13975 3.73612 9.21932 3.76908C9.29889 3.80204 9.37119 3.85035 9.43209 3.91125C9.49299 3.97215 9.5413 4.04445 9.57426 4.12402C9.60722 4.20359 9.62418 4.28887 9.62418 4.375C9.62418 4.46113 9.60722 4.54641 9.57426 4.62598C9.5413 4.70555 9.49299 4.77785 9.43209 4.83875L6.58834 7.6825C6.52747 7.74346 6.45518 7.79181 6.37561 7.82481C6.29603 7.8578 6.21074 7.87478 6.12459 7.87478C6.03845 7.87478 5.95315 7.8578 5.87357 7.82481C5.794 7.79181 5.72171 7.74346 5.66084 7.6825L2.81709 4.83875C2.75619 4.77785 2.70788 4.70555 2.67492 4.62598C2.64196 4.54641 2.625 4.46113 2.625 4.375C2.625 4.28887 2.64196 4.20359 2.67492 4.12402C2.70788 4.04445 2.75619 3.97215 2.81709 3.91125C2.87799 3.85035 2.95029 3.80204 3.02986 3.76908C3.10943 3.73612 3.19472 3.71916 3.28084 3.71916C3.36697 3.71916 3.45225 3.73612 3.53182 3.76908C3.61139 3.80204 3.68369 3.85035 3.74459 3.91125L5.46834 5.63413Z" fill="#6A6A6A"/>-->
<!--</svg></a>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!-- download  sectioon end -->

</div>
</div>
</div>
</div>
<!-- Container-fluid start-->

        </div>
      </div>
    </div>
    <script>
        $(document).ready(function() {
    // Event listener for the clear button click
    $('.clearempform').on('click', function(e) {
        e.preventDefault(); // Prevent default link behavior

        // Clear all input fields within the form
        $('.stempcom').find('input[type="text"], input[type="date"]').val('');
    });
});

    </script>
    <script>
    $(document).ready(function() {
        $('.emmp_go_download_tem').on('click', function() {
            // Define the path to the CSV file
            var filePath = '/assets/images/emptemplate.csv'; // Adjust this path if needed
            
            // Create a temporary anchor element to initiate download
            var a = document.createElement('a');
            a.href = filePath;
            a.download = 'emptemplate.csv'; // Name of the downloaded file
            document.body.appendChild(a);
            a.click(); // Simulate click
            document.body.removeChild(a); // Clean up
        });
    });
</script>
<style>
  h2.busiimage {
    padding: 30px 20px 30px 20px;
    margin: auto;
}
h2.busiimage {
    background: #a7dfa7;
}

#round_uplad_image .inner_file_edit .EAyyHe {
    transition: opacity .2s ease-in-out;
    background-color: rgba(0, 0, 0, 0.32);
    bottom: 0;
    height: 42%;
    left: 0;
    opacity: 0;
    position: absolute;
    right: 0;
}
#round_uplad_image .inner_file_edit .EAyyHe .EzQmEf {
    background-image: url(https://www.gstatic.com/images/icons/material/system/2x/photo_camera_white_24dp.png);
    background-position: center;
    background-repeat: no-repeat;
    background-size: 25px 25px;
    height: 100%;
    opacity: .8;
}

#round_uplad_image .inner_file_edit:hover .EAyyHe {
    opacity: 1;
}
#profile-form {
    justify-content: center;
    display: flex;
    flex-wrap: wrap;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        $('#gstForm').on('submit', function(e) {
            e.preventDefault(); // Prevent form submission

            // Get form data
            var formData = {
                _token: '{{ csrf_token() }}', // Include the CSRF token
                user_id: $('input[name=user_id]').val(),
                statee_new: $('#statee_new').val(),
                add_gstt: $('#add_gstt').val()
            };

            // Send AJAX request
            $.ajax({
                url: "{{ route('storegst') }}", // Update this to match your route for storegst
                method: 'POST',
                data: formData,
                success: function(response) {
                    // Show success message using Toastr
                    toastr.success(response.message);

                    // Reload the page after a short delay
                    setTimeout(function() {
                        location.reload(); // Reload the page
                    }, 1000); // Delay in milliseconds (1 second)
                },
                error: function(xhr, status, error) {
                    // Handle validation or server errors
                    var errors = xhr.responseJSON.errors;
                    if (errors) {
                        $.each(errors, function(key, value) {
                            toastr.error(value[0]); // Show the first error using Toastr
                        });
                    } else {
                        toastr.error('An error occurred while submitting the data.'); // General error message
                    }
                }
            });
        });
    });
</script>
<script>
    // Check if there's a success message in the session and display it
    @if(session('success'))
        toastr.success('{{ session('success') }}');
    @endif
    @if(session('error'))
        toastr.error('{{ session('error') }}');
    @endif
</script>
<!-- Include SweetAlert2 CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<!-- Include jQuery (if not already included) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    $(document).ready(function() {
        $('.delete_gstin').on('click', function() {
            var gstId = $(this).data('gst-id'); // Get the GST ID from data attribute

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/deleteGST/' + gstId, // Set the correct URL for the delete request
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}', // Include CSRF token
                        },
                        success: function(response) {
                            // Handle success response
                            toastr.success('GST record deleted successfully!'); // Show success notification
                            // Optionally, remove the deleted record from the UI
                            setTimeout(function() {
                                location.reload(); // Reload the page
                            }, 1000); // Delay in milliseconds (1 second)
                        },
                        error: function(xhr) {
                            // Handle error response
                            toastr.error('Error deleting GST record. Please try again.'); // Show error notification
                        }
                    });
                }
            });
        });
    });
</script>

<style>
    
.khaliclass {
    max-width: 100%;
    display: flex;
    margin: 160px auto 0;
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
    width: 60px;
    height: 60px;
}

.khaliclass svg path {
    fill: #c5c5c5;
}

.khaliclass circle {
    stroke: #c5c5c5;
}

.gst_saved_data .khaliclass {
    margin: 0px auto 0;
    gap: 10px 0px;
}

.gst_saved_data .khaliclass svg {
    width: 35px;
    height: 35px;
}

/******advance search coming soon start******/
.tost_wrap.active {
    display: flex;
}

.tost_wrap {
    position: fixed;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    background: rgba(255,255,255,0.5);
    z-index: 999;
    display: none;
    align-items: flex-start;
    justify-content: end;
    padding: 70px 130px;
}

.tost_wrap #toast {
  display: flex;
  align-items: center;
  max-width: 400px;
  width: fit-content;
  padding: 10px 14px;
  position: absolute;
  border-radius: 5px;
  overflow: hidden;
  background: #1e1e1e;
  box-shadow: 0 2px 15px rgba(0,0,0,0.1);
  z-index: 5;
  top: 5px;
  left: 50%;
  transform: translateX(-50%);
}

.tost_wrap #icon-wrapper {
  width: 30px;
  height: 30px;
  background: #d0ffad;
  border-radius: 5px;
  box-sizing: border-box;
  padding: 5px;
}

.tost_wrap #icon {
  background: #1e1e1e;
  border-radius: 50%;
  height: 100%;
  width: 100%;
  position: relative;
}
.tost_wrap #icon::before, .tost_wrap #icon::after {
  position: absolute;
  content: "";
  background: #d1ffb2;
  border-radius: 5px;
  top: 50%;
  left: 50%;
}

.tost_wrap #toast-message {
  padding: 5px 20px 5px 10px;
}
.tost_wrap #toast-message h4, .tost_wrap #toast-message p {
  margin: 0;
  line-height: 1.2em;
}
.tost_wrap #toast-message h4 {
  font-size: 14px;
  font-weight: 600;
  letter-spacing: .05em;
  color: #e0e0e0;
}
.tost_wrap #toast-message p {
  font-size: 10px;
  font-weight: 300;
  letter-spacing: .05em;
  color: #e0e0e0;
}

.tost_wrap #toast-close {
  position: relative;
  padding: 12px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  background: rgba(0,0,0,0);
  transition: background 0.2s ease-in-out;
}
.tost_wrap #toast-close:hover {
  background: rgba(255,255,2555,0.1);
}
.tost_wrap #toast-close::before, .tost_wrap #toast-close::after {
  position: absolute;
  content: '';
  height: 12px;
  width: 1px;
  border-radius: 5px;
  background: #e0e0e0;
  top: 50%;
  left: 50%;
  transition: background 0.2s ease-in-out;
}
.tost_wrap #toast-close:hover::before, .tost_wrap #toast-close:hover::after {
  background: #e0e0e0;
}
.tost_wrap #toast-close::before {
  transform: translate(-50%, -50%) rotate(45deg);
}
.tost_wrap #toast-close::after {
  transform: translate(-50%, -50%) rotate(-45deg);
}

@keyframes close {
  from {
    top: 5px;
    opacity: 1;
    transform: translateX(-50%) scale(1);
    visibility: visible;
  }
  to {
    top: -25px;
    opacity: 0;
    transform: translateX(-50%) scale(0.5);
    visibility: hidden;
  }
}

@keyframes open {
  from {
    top: -25px;
    opacity: 0;
    transform: translateX(-50%) scale(0.5);
    visibility: hidden;
  }
  to {
    top: 5px;
    opacity: 1;
    transform: translateX(-50%) scale(1);
    visibility: visible;
  }
}

.tost_wrap #timer {
  width: 0%;
  height: 4px;
  background: #d1ffb2;
  position: absolute;
  bottom: 0;
  left: 0;
  border-top-right-radius: 5px;
  box-shadow: 0 0 8px #d1ffb2;
}

.tost_wrap .timer-animation {
  animation: countdown 5s linear forwards;
}
@keyframes countdown {
  from {
    width: 100%;
  } 
  to {
    width: 0%;
  } 
}


.tost_wrap .info #icon::before {
  width: 3px;
  height: 7px;
  transform: translate(-50%, calc(-50% + 2px));
}
.tost_wrap .info #icon::after {
  width: 3px;
  height: 3px;
  transform: translate(-50%, calc(-50% - 4px));
}
/******advance search coming soon end******/

</style>
<script>
  $(document).ready(function () {
      $('.stempcom').on('submit', function (e) {
          e.preventDefault(); // Prevent the default form submission

          let formData = new FormData(this); // Create a FormData object for file upload handling

          $.ajax({
              url: $(this).attr('action'), // Get the action URL from the form
              method: $(this).attr('method'), // Get the form method (POST)
              data: formData,
              processData: false,
              contentType: false,
              success: function (response) {
                  // Handle success response with Toastr
                  toastr.success(response.message, 'Success');

                  // Optionally, clear the form or update the UI as needed
                  $('.stempcom')[0].reset(); // Reset the form
                  setTimeout(function() {
                      location.reload(); // Reload the page
                  }, 1000); // Delay in milliseconds (1 second)
              },
              error: function (xhr, status, error) {
                  // Check if there are validation errors
                  if (xhr.status === 422) {
                      let errors = xhr.responseJSON.errors;
                      $.each(errors, function (key, value) {
                          toastr.error(value, 'Validation Error');
                      });
                  } else {
                      // Handle other errors
                      toastr.error('Something went wrong. Please try again.', 'Error');
                  }

                  // Log error to the console for debugging
                  console.error(xhr.responseText);
              }
          });
      });
  });
</script>

<script>
    $(document).on('click', '.compempdel', function(e) {
    e.preventDefault(); // Prevent the form from submitting

    var button = $(this);
    var form = button.closest('form'); // Find the closest form
    var empId = form.find('input[name="emp_id"]').val(); // Get employee ID
    var empName = form.find('input[name="name"]').val(); // Get employee name

    // Use SweetAlert for confirmation
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to delete " + empName + "'s data.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Send AJAX request to delete the employee
            $.ajax({
                url: '/delcompemp', // Your route to delete employee
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF protection
                    emp_id: empId // Pass employee ID
                },
                success: function(response) {
                    if (response.success) {
                        // Show success notification
                        toastr.success('The employee has been deleted.');
                        form.remove(); // Optionally remove the form from the DOM
                        setTimeout(function() {
                                location.reload(); // Reload the page
                            }, 1000); // Delay in milliseconds (1 second)
                    } else {
                        // Show error notification
                        toastr.error(response.message || 'An error occurred.');
                    }
                },
                error: function(xhr) {
                    // Show error notification for AJAX error
                    toastr.error('An error occurred while deleting the employee.');
                }
            });
        }
    });
});

</script>

<script>
    document.querySelector('#emmp_go_upload_tem').addEventListener('change', function() {
    if (this.files.length > 0) {
        // Select the elements
        const original = document.querySelector('.emmp_go_upload_tem');
        const afterUpload = document.querySelector('.emmp_go_upload_tem.ggrn');
        
        // Add the hide class to the original content
        original.classList.add('hide');
        original.classList.remove('show');
        
        // Add the show class to the after-upload content
        afterUpload.classList.remove('hide');
        afterUpload.classList.add('show');
    }
});
</script>

    @endsection
   
