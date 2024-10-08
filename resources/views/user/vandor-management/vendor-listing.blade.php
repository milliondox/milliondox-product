@extends('user.includes.vendor-listing') @section('content')
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
           Vendor Listing
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
           Vendor Listing
          </h2>
            </div>

             <!-- Container-fluid start-->
      <div class="container-fluid vander_listing">
        <div class="row">
          <div class="col-md-12">
         
            <div class="Inc_table">
              <div class="row">
                <div class="col-sm-12 tba_history_rap">
                  <div class="filtr_tabble">
                    <div class="hearder-entres">
                      <div class="volt_headd-filter">
                      <div class="table_title">
                        <h2>Vendor Listing</h2>
</div>  
                        <button>
                          <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.59282 11.625H4.5V5.94909L0.5625 1.26159V0.375H11.25V1.25653L7.5 5.94403V9.71782L5.59282 11.625ZM5.25 10.875H5.28218L6.75 9.40718V5.68097L10.3948 1.125H1.42734L5.25 5.67591V10.875Z" fill="#868686" />
                          </svg> Apply Filter </button>
                      </div>
                      <div class="sadd_filds">
                        <button class="hvr-rotate" id="add_bankdoc" data-bs-toggle="modal" data-bs-target="#vandor_reges"> 
                        <svg class="white_btn" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M12.6875 12C12.6875 13.5084 12.0883 14.9551 11.0217 16.0217C9.95506 17.0883 8.50842 17.6875 7 17.6875C5.49158 17.6875 4.04494 17.0883 2.97833 16.0217C1.91172 14.9551 1.3125 13.5084 1.3125 12C1.3125 10.4916 1.91172 9.04494 2.97833 7.97833C4.04494 6.91172 5.49158 6.3125 7 6.3125C8.50842 6.3125 9.95506 6.91172 11.0217 7.97833C12.0883 9.04494 12.6875 10.4916 12.6875 12ZM14 12C14 13.8565 13.2625 15.637 11.9497 16.9497C10.637 18.2625 8.85652 19 7 19C5.14348 19 3.36301 18.2625 2.05025 16.9497C0.737498 15.637 0 13.8565 0 12C0 10.1435 0.737498 8.36301 2.05025 7.05025C3.36301 5.7375 5.14348 5 7 5C8.85652 5 10.637 5.7375 11.9497 7.05025C13.2625 8.36301 14 10.1435 14 12ZM7 13.9688C7 14.3168 6.86172 14.6507 6.61558 14.8968C6.36944 15.143 6.0356 15.2812 5.6875 15.2812C5.3394 15.2812 5.00556 15.143 4.75942 14.8968C4.51328 14.6507 4.375 14.3168 4.375 13.9688C4.375 13.6207 4.51328 13.2868 4.75942 13.0407C5.00556 12.7945 5.3394 12.6563 5.6875 12.6562C6.0356 12.6563 6.36944 12.7945 6.61558 13.0407C6.86172 13.2868 7 13.6207 7 13.9688ZM3.9515 12C3.63824 12.2764 3.39548 12.6236 3.24338 13.0126C3.09128 13.4017 3.03424 13.8215 3.077 14.2371C3.11976 14.6526 3.26109 15.052 3.48924 15.4019C3.71738 15.7519 4.02576 16.0423 4.38874 16.2492C4.75171 16.456 5.15881 16.5731 5.57619 16.591C5.99356 16.6088 6.40917 16.5268 6.78846 16.3517C7.16775 16.1766 7.49977 15.9135 7.75693 15.5842C8.01409 15.255 8.18896 14.8692 8.267 14.4588C8.66409 14.6072 9.09123 14.6573 9.51189 14.6047C9.93256 14.5522 10.3342 14.3985 10.6826 14.1568C11.0309 13.9152 11.3155 13.5928 11.5121 13.2172C11.7087 12.8416 11.8113 12.4239 11.8113 12C11.8113 11.5761 11.7087 11.1584 11.5121 10.7828C11.3155 10.4072 11.0309 10.0848 10.6826 9.84316C10.3342 9.60152 9.93256 9.44784 9.51189 9.39527C9.09123 9.34269 8.66409 9.39278 8.267 9.54125C8.18896 9.13085 8.01409 8.745 7.75693 8.41577C7.49977 8.08654 7.16775 7.82344 6.78846 7.64834C6.40917 7.47324 5.99356 7.3912 5.57619 7.40903C5.15881 7.42686 4.75171 7.54404 4.38874 7.75085C4.02576 7.95766 3.71738 8.24811 3.48924 8.59807C3.26109 8.94802 3.11976 9.34738 3.077 9.76294C3.03424 10.1785 3.09128 10.5983 3.24338 10.9874C3.39548 11.3764 3.63824 11.7236 3.9515 12ZM5.6875 11.3438C6.0356 11.3438 6.36944 11.2055 6.61558 10.9593C6.86172 10.7132 7 10.3793 7 10.0312C7 9.68315 6.86172 9.34931 6.61558 9.10317C6.36944 8.85703 6.0356 8.71875 5.6875 8.71875C5.3394 8.71875 5.00556 8.85703 4.75942 9.10317C4.51328 9.34931 4.375 9.68315 4.375 10.0312C4.375 10.3793 4.51328 10.7132 4.75942 10.9593C5.00556 11.2055 5.3394 11.3438 5.6875 11.3438ZM9.1875 13.3125C9.5356 13.3125 9.86944 13.1742 10.1156 12.9281C10.3617 12.6819 10.5 12.3481 10.5 12C10.5 11.6519 10.3617 11.3181 10.1156 11.0719C9.86944 10.8258 9.5356 10.6875 9.1875 10.6875C8.8394 10.6875 8.50556 10.8258 8.25942 11.0719C8.01328 11.3181 7.875 11.6519 7.875 12C7.875 12.3481 8.01328 12.6819 8.25942 12.9281C8.50556 13.1742 8.8394 13.3125 9.1875 13.3125Z" fill="#7E7E7E"/>
<path d="M18 4.5H15.5V7C15.5 7.275 15.275 7.5 15 7.5C14.725 7.5 14.5 7.275 14.5 7V4.5H12C11.725 4.5 11.5 4.275 11.5 4C11.5 3.725 11.725 3.5 12 3.5H14.5V1C14.5 0.725 14.725 0.5 15 0.5C15.275 0.5 15.5 0.725 15.5 1V3.5H18C18.275 3.5 18.5 3.725 18.5 4C18.5 4.275 18.275 4.5 18 4.5Z" fill="#7E7E7E"/>
</svg>    
<svg class="dark_btn" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M12.6875 11.5C12.6875 13.0084 12.0883 14.4551 11.0217 15.5217C9.95506 16.5883 8.50842 17.1875 7 17.1875C5.49158 17.1875 4.04494 16.5883 2.97833 15.5217C1.91172 14.4551 1.3125 13.0084 1.3125 11.5C1.3125 9.99158 1.91172 8.54494 2.97833 7.47833C4.04494 6.41172 5.49158 5.8125 7 5.8125C8.50842 5.8125 9.95506 6.41172 11.0217 7.47833C12.0883 8.54494 12.6875 9.99158 12.6875 11.5ZM14 11.5C14 13.3565 13.2625 15.137 11.9497 16.4497C10.637 17.7625 8.85652 18.5 7 18.5C5.14348 18.5 3.36301 17.7625 2.05025 16.4497C0.737498 15.137 0 13.3565 0 11.5C0 9.64348 0.737498 7.86301 2.05025 6.55025C3.36301 5.2375 5.14348 4.5 7 4.5C8.85652 4.5 10.637 5.2375 11.9497 6.55025C13.2625 7.86301 14 9.64348 14 11.5ZM7 13.4688C7 13.8168 6.86172 14.1507 6.61558 14.3968C6.36944 14.643 6.0356 14.7812 5.6875 14.7812C5.3394 14.7812 5.00556 14.643 4.75942 14.3968C4.51328 14.1507 4.375 13.8168 4.375 13.4688C4.375 13.1207 4.51328 12.7868 4.75942 12.5407C5.00556 12.2945 5.3394 12.1563 5.6875 12.1562C6.0356 12.1563 6.36944 12.2945 6.61558 12.5407C6.86172 12.7868 7 13.1207 7 13.4688ZM3.9515 11.5C3.63824 11.7764 3.39548 12.1236 3.24338 12.5126C3.09128 12.9017 3.03424 13.3215 3.077 13.7371C3.11976 14.1526 3.26109 14.552 3.48924 14.9019C3.71738 15.2519 4.02576 15.5423 4.38874 15.7492C4.75171 15.956 5.15881 16.0731 5.57619 16.091C5.99356 16.1088 6.40917 16.0268 6.78846 15.8517C7.16775 15.6766 7.49977 15.4135 7.75693 15.0842C8.01409 14.755 8.18896 14.3692 8.267 13.9588C8.66409 14.1072 9.09123 14.1573 9.51189 14.1047C9.93256 14.0522 10.3342 13.8985 10.6826 13.6568C11.0309 13.4152 11.3155 13.0928 11.5121 12.7172C11.7087 12.3416 11.8113 11.9239 11.8113 11.5C11.8113 11.0761 11.7087 10.6584 11.5121 10.2828C11.3155 9.90722 11.0309 9.58481 10.6826 9.34316C10.3342 9.10152 9.93256 8.94784 9.51189 8.89527C9.09123 8.84269 8.66409 8.89278 8.267 9.04125C8.18896 8.63085 8.01409 8.245 7.75693 7.91577C7.49977 7.58654 7.16775 7.32344 6.78846 7.14834C6.40917 6.97324 5.99356 6.8912 5.57619 6.90903C5.15881 6.92686 4.75171 7.04404 4.38874 7.25085C4.02576 7.45766 3.71738 7.74811 3.48924 8.09807C3.26109 8.44802 3.11976 8.84738 3.077 9.26294C3.03424 9.67851 3.09128 10.0983 3.24338 10.4874C3.39548 10.8764 3.63824 11.2236 3.9515 11.5ZM5.6875 10.8438C6.0356 10.8438 6.36944 10.7055 6.61558 10.4593C6.86172 10.2132 7 9.87935 7 9.53125C7 9.18315 6.86172 8.84931 6.61558 8.60317C6.36944 8.35703 6.0356 8.21875 5.6875 8.21875C5.3394 8.21875 5.00556 8.35703 4.75942 8.60317C4.51328 8.84931 4.375 9.18315 4.375 9.53125C4.375 9.87935 4.51328 10.2132 4.75942 10.4593C5.00556 10.7055 5.3394 10.8438 5.6875 10.8438ZM9.1875 12.8125C9.5356 12.8125 9.86944 12.6742 10.1156 12.4281C10.3617 12.1819 10.5 11.8481 10.5 11.5C10.5 11.1519 10.3617 10.8181 10.1156 10.5719C9.86944 10.3258 9.5356 10.1875 9.1875 10.1875C8.8394 10.1875 8.50556 10.3258 8.25942 10.5719C8.01328 10.8181 7.875 11.1519 7.875 11.5C7.875 11.8481 8.01328 12.1819 8.25942 12.4281C8.50556 12.6742 8.8394 12.8125 9.1875 12.8125Z" fill="#DBDBDB"/>
<path d="M18 4H15.5V6.5C15.5 6.775 15.275 7 15 7C14.725 7 14.5 6.775 14.5 6.5V4H12C11.725 4 11.5 3.775 11.5 3.5C11.5 3.225 11.725 3 12 3H14.5V0.5C14.5 0.225 14.725 0 15 0C15.275 0 15.5 0.225 15.5 0.5V3H18C18.275 3 18.5 3.225 18.5 3.5C18.5 3.775 18.275 4 18 4Z" fill="#DBDBDB"/>
</svg>
                        New Vendor Registration </button>
                      </div>

                      <!-- model start -->
<div class="modal fade drop_coman_file have_title" id="vandor_reges" tabindex="-1" role="dialog" aria-labelledby="vandor_reges" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" style="font-weight:700">New Vendor Registration</h5>
                                    <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                                      <span aria-hidden="true">
                                        <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black" />
                                          <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black" />
                                        </svg>
                                      </span>
                                    </button>
                                  </div>
                                  <div class="modal-body vendor_resestration">
                                    <h3>New Vendor Registration</h3>


                         <form action="" method="POST" enctype="multipart/form-data" class="upload-form"> 
									
						<div class="select_group row round_select">
                          <div class="gropu_form col-sm-6">
  <select id="vandor_approve" name="vandor_approve" required>
  <option value="" disabled Selected>Vendor select</option>
    <option value="volvo">Volvo</option>
    <option value="saab">Saab</option>
    <option value="fiat">Fiat</option>
    <option value="audi">Audi</option>
  </select>
                          </div>

                          <div class="gropu_form col-sm-6">
  <select id="contarct_signed" name="contarct_signed" required>
  <option value="" disabled Selected>Contract select</option>
    <option value="volvo">Volvo</option>
    <option value="saab">Saab</option>
    <option value="fiat">Fiat</option>
    <option value="audi">Audi</option>
  </select>
                          </div>
</div>

									
						<div class="gropu_form ivoice-upload">
                          <label for="fname">Entity Name</label>

<div class="input_upload">
<div class="upload_int">
                      <input placeholder="Type" type="text" id="entity_name" name="entity_name" required>
					  </div>
					  
                         <div class="file-area">      
                         <input type="file" class="dragfile" id="inovice_file" name="inovice_file" accept=".pdf,.doc,.docx" required>                             
                        <div class="file-dummy">
                        <div class="success">Great, your files are selected. Keep on.</div>
                        <div class="default">
                        <span class="upload_icon">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88"><title>file-upload</title><path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z"/></svg>
                        </span>  
                        Upload
  </div>
  </div>
  <br><div class="selected-file"></div>
</div> 
</div> 

 </div>


 <div class="gropu_form">
   <label for="les">Entity Type</label>
  <select id="entity_type" name="entity_type" required="">
  <option value="" disabled="" selected="">select</option>
    <option value="Volvo">Volvo</option>
    <option value="Saab">Saab</option>
    <option value="Fiat">Fiat</option>
    <option value="Audi">Audi</option>
  </select>
                          </div>


                          <div class="gropu_form ivoice-upload">
                          <label for="fname">GSTIN*</label>

<div class="input_upload">
<div class="upload_int">
                      <input placeholder="Type" type="text" id="gst" name="gst" required>
					  </div>
					  
                         <div class="file-area">      
                         <input type="file" class="dragfile" id="inovice_file" name="inovice_file" accept=".pdf,.doc,.docx" required>                             
                        <div class="file-dummy">
                        <div class="success">Great, your files are selected. Keep on.</div>
                        <div class="default">
                        <span class="upload_icon">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88"><title>file-upload</title><path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z"/></svg>
                        </span>  
                         Upload
  </div>
  </div>
  <br><div class="selected-file"></div>
</div> 
</div> 

 </div>

 <div class="gropu_form ivoice-upload">
                          <label for="fname">PAN*</label>

<div class="input_upload">
<div class="upload_int">
                      <input placeholder="Type" type="text" id="pan" name="pan" required>
					  </div>
					  
                         <div class="file-area">      
                         <input type="file" class="dragfile" id="inovice_file" name="inovice_file" accept=".pdf,.doc,.docx" required>                             
                        <div class="file-dummy">
                        <div class="success">Great, your files are selected. Keep on.</div>
                        <div class="default">
                        <span class="upload_icon">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88"><title>file-upload</title><path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z"/></svg>
                        </span>  
                         Upload
  </div>
  </div>
  <br><div class="selected-file"></div>
</div> 
</div> 

 </div>


 <div class="gropu_form test-areaa">
                          <label for="fname">Permanent Address</label>
                          <textarea name="permanent" required> </textarea>
                          </div>

                          <div class="gropu_form test-areaa">
                          <label for="fname">Communicationt Address</label>
                          <textarea name="communicationt" required> </textarea>
                          </div>
						  
                                                                                                                       
                          <div class="gropu_form">
                          <label for="fname">Email</label>
                           <input placeholder="Type" type="text" id="email" name="email" required>
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Contact</label>
                           <input placeholder="Type" type="text" id="contact" name="contact" required>
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Authorized Signatory Name</label>
                           <input placeholder="Type" type="text" id="asn" name="asn" required>
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Authorized Signatory Designation</label>
                           <input placeholder="Type" type="text" id="asd" name="asd" required>
                          </div>

                <div class="root_btn">                        
                          <button class="btn btn-primary"  style="border-radius:5px;" type="submit">Add</button>
</div>


                                    </form>

                                </div>
                              </div>
                            </div>
							 </div>
<!-- model end -->


                    </div>
                    <div class="entery_body table-responsive">
                    
                    <div class="main_accordiann">

                    <div class="accordion">

  <div class="accordion-item">

    <!-- button start -->
    <div class="accordion-header">
    <div class="one_button_pannel">

    <div class="top_one_panel">
        <div class="svg_iage">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_2477_3789)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M18.125 10C18.125 12.1549 17.269 14.2215 15.7452 15.7452C14.2215 17.269 12.1549 18.125 10 18.125C7.84512 18.125 5.77849 17.269 4.25476 15.7452C2.73102 14.2215 1.875 12.1549 1.875 10C1.875 7.84512 2.73102 5.77849 4.25476 4.25476C5.77849 2.73102 7.84512 1.875 10 1.875C12.1549 1.875 14.2215 2.73102 15.7452 4.25476C17.269 5.77849 18.125 7.84512 18.125 10ZM20 10C20 12.6522 18.9464 15.1957 17.0711 17.0711C15.1957 18.9464 12.6522 20 10 20C7.34784 20 4.8043 18.9464 2.92893 17.0711C1.05357 15.1957 0 12.6522 0 10C0 7.34784 1.05357 4.8043 2.92893 2.92893C4.8043 1.05357 7.34784 0 10 0C12.6522 0 15.1957 1.05357 17.0711 2.92893C18.9464 4.8043 20 7.34784 20 10ZM10 12.8125C10 13.3098 9.80246 13.7867 9.45083 14.1383C9.09919 14.49 8.62228 14.6875 8.125 14.6875C7.62772 14.6875 7.15081 14.49 6.79917 14.1383C6.44754 13.7867 6.25 13.3098 6.25 12.8125C6.25 12.3152 6.44754 11.8383 6.79917 11.4867C7.15081 11.135 7.62772 10.9375 8.125 10.9375C8.62228 10.9375 9.09919 11.135 9.45083 11.4867C9.80246 11.8383 10 12.3152 10 12.8125ZM5.645 10C5.19749 10.3948 4.85068 10.8908 4.6334 11.4466C4.41611 12.0025 4.33463 12.6021 4.39571 13.1958C4.4568 13.7895 4.6587 14.36 4.98462 14.8599C5.31055 15.3598 5.75108 15.7748 6.26962 16.0702C6.78816 16.3657 7.36973 16.5331 7.96598 16.5585C8.56223 16.584 9.15596 16.4668 9.6978 16.2167C10.2396 15.9665 10.714 15.5907 11.0813 15.1203C11.4487 14.65 11.6985 14.0988 11.81 13.5125C12.3773 13.7246 12.9875 13.7962 13.5884 13.721C14.1894 13.6459 14.7632 13.4264 15.2608 13.0812C15.7584 12.736 16.165 12.2754 16.4458 11.7388C16.7267 11.2022 16.8733 10.6056 16.8733 10C16.8733 9.39437 16.7267 8.79776 16.4458 8.26118C16.165 7.72459 15.7584 7.26401 15.2608 6.91881C14.7632 6.57361 14.1894 6.35406 13.5884 6.27895C12.9875 6.20384 12.3773 6.2754 11.81 6.4875C11.6985 5.90121 11.4487 5.35 11.0813 4.87967C10.714 4.40934 10.2396 4.03349 9.6978 3.78335C9.15596 3.53321 8.56223 3.416 7.96598 3.44147C7.36973 3.46694 6.78816 3.63435 6.26962 3.92978C5.75108 4.22522 5.31055 4.64015 4.98462 5.14009C4.6587 5.64003 4.4568 6.21054 4.39571 6.8042C4.33463 7.39787 4.41611 7.99753 4.6334 8.55337C4.85068 9.10921 5.19749 9.60516 5.645 10ZM8.125 9.0625C8.62228 9.0625 9.09919 8.86496 9.45083 8.51333C9.80246 8.16169 10 7.68478 10 7.1875C10 6.69022 9.80246 6.21331 9.45083 5.86167C9.09919 5.51004 8.62228 5.3125 8.125 5.3125C7.62772 5.3125 7.15081 5.51004 6.79917 5.86167C6.44754 6.21331 6.25 6.69022 6.25 7.1875C6.25 7.68478 6.44754 8.16169 6.79917 8.51333C7.15081 8.86496 7.62772 9.0625 8.125 9.0625ZM13.125 11.875C13.6223 11.875 14.0992 11.6775 14.4508 11.3258C14.8025 10.9742 15 10.4973 15 10C15 9.50272 14.8025 9.02581 14.4508 8.67417C14.0992 8.32254 13.6223 8.125 13.125 8.125C12.6277 8.125 12.1508 8.32254 11.7992 8.67417C11.4475 9.02581 11.25 9.50272 11.25 10C11.25 10.4973 11.4475 10.9742 11.7992 11.3258C12.1508 11.6775 12.6277 11.875 13.125 11.875Z" fill="#4D4D4D"/>
</g>
<defs>
<clipPath id="clip0_2477_3789">
<rect width="20" height="20" fill="white"/>
</clipPath>
</defs>
</svg>
</div>
<h2>Wingdart Venture Pvt. Ltd.</h2>
<div class="to_hide_btn">
<span class="icon">
<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect x="0.5" y="0.5" width="13" height="13" rx="6.5" fill="#F1F3F8" stroke="#FBC926"/>
<path d="M6 10.005C6 9.87368 6.02587 9.74364 6.07612 9.62232C6.12638 9.50099 6.20003 9.39075 6.29289 9.29789C6.38575 9.20503 6.49599 9.13138 6.61732 9.08112C6.73864 9.03087 6.86868 9.005 7 9.005C7.13132 9.005 7.26136 9.03087 7.38268 9.08112C7.50401 9.13138 7.61425 9.20503 7.70711 9.29789C7.79997 9.39075 7.87362 9.50099 7.92388 9.62232C7.97413 9.74364 8 9.87368 8 10.005C8 10.2702 7.89464 10.5246 7.70711 10.7121C7.51957 10.8996 7.26522 11.005 7 11.005C6.73478 11.005 6.48043 10.8996 6.29289 10.7121C6.10536 10.5246 6 10.2702 6 10.005ZM6.098 4C6.08468 3.87384 6.09804 3.74629 6.1372 3.62563C6.17636 3.50496 6.24045 3.39388 6.32532 3.29959C6.41018 3.20529 6.51392 3.12989 6.62981 3.07828C6.7457 3.02667 6.87114 3 6.998 3C7.12486 3 7.2503 3.02667 7.36619 3.07828C7.48208 3.12989 7.58582 3.20529 7.67068 3.29959C7.75555 3.39388 7.81964 3.50496 7.8588 3.62563C7.89796 3.74629 7.91132 3.87384 7.898 4L7.548 7.507C7.53378 7.64296 7.4697 7.76884 7.36813 7.86034C7.26657 7.95184 7.13471 8.00248 6.998 8.00248C6.86129 8.00248 6.72943 7.95184 6.62787 7.86034C6.5263 7.76884 6.46222 7.64296 6.448 7.507L6.098 4Z" fill="#FBC926"/>
</svg>
</span>
<button>
<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="11" cy="11" r="10.5" fill="#F1F3F8" stroke="#4D4D4D"/>
<g clip-path="url(#clip0_2477_3848)">
<path d="M5.3999 5V8.6C5.3999 9.02435 5.56847 9.43131 5.86853 9.73137C6.16859 10.0314 6.57556 10.2 6.9999 10.2C7.42425 10.2 7.83121 10.0314 8.13127 9.73137C8.43133 9.43131 8.5999 9.02435 8.5999 8.6V6.2C8.5999 5.98783 8.51562 5.78434 8.36559 5.63431C8.21556 5.48429 8.01208 5.4 7.7999 5.4C7.58773 5.4 7.38425 5.48429 7.23422 5.63431C7.08419 5.78434 6.9999 5.98783 6.9999 6.2V9M9.7999 5.4H14.9999C15.2121 5.4 15.4156 5.48429 15.5656 5.63431C15.7156 5.78434 15.7999 5.98783 15.7999 6.2V15.8C15.7999 16.0122 15.7156 16.2157 15.5656 16.3657C15.4156 16.5157 15.2121 16.6 14.9999 16.6H6.9999C6.78773 16.6 6.58425 16.5157 6.43422 16.3657C6.28419 16.2157 6.1999 16.0122 6.1999 15.8V11.4M13.7999 8.6H10.5999M13.7999 11H10.5999M13.7999 13.4H8.1999" stroke="#4D4D4D"/>
</g>
<defs>
<clipPath id="clip0_2477_3848">
<rect width="12" height="12" fill="white" transform="translate(5 5)"/>
</clipPath>
</defs>
</svg>
</button>
</div>

</div>

<div class="company_namme">
    <span>Private Limited Company</span>
</div>
<div class="access_portal">
    <a href="#">Access Portal
    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="10" cy="10" r="10" fill="#4D4D4D"/>
<g clip-path="url(#clip0_317_21)">
<path d="M5.8335 10H14.1668M14.1668 10L10.4168 6.25M14.1668 10L10.4168 13.75" stroke="white" stroke-width="1.1"/>
</g>
<defs>
<clipPath id="clip0_317_21">
<rect width="10" height="10" fill="white" transform="translate(5 5)"/>
</clipPath>
</defs>
</svg>
    </a>
</div>

</div>

<div class="two_button_pannel">
<div class="gst_in pan_gst">
<span>GSTIN</span>
<div class="numver_btnn">
<b>29NZKPS1314R9Z6</b>
<a class="down_gst_pan" href=#">
<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="11" cy="11" r="10.5" fill="#F1F3F8" stroke="#4D4D4D"></circle>
<g clip-path="url(#clip0_2477_3848)">
<path d="M5.3999 5V8.6C5.3999 9.02435 5.56847 9.43131 5.86853 9.73137C6.16859 10.0314 6.57556 10.2 6.9999 10.2C7.42425 10.2 7.83121 10.0314 8.13127 9.73137C8.43133 9.43131 8.5999 9.02435 8.5999 8.6V6.2C8.5999 5.98783 8.51562 5.78434 8.36559 5.63431C8.21556 5.48429 8.01208 5.4 7.7999 5.4C7.58773 5.4 7.38425 5.48429 7.23422 5.63431C7.08419 5.78434 6.9999 5.98783 6.9999 6.2V9M9.7999 5.4H14.9999C15.2121 5.4 15.4156 5.48429 15.5656 5.63431C15.7156 5.78434 15.7999 5.98783 15.7999 6.2V15.8C15.7999 16.0122 15.7156 16.2157 15.5656 16.3657C15.4156 16.5157 15.2121 16.6 14.9999 16.6H6.9999C6.78773 16.6 6.58425 16.5157 6.43422 16.3657C6.28419 16.2157 6.1999 16.0122 6.1999 15.8V11.4M13.7999 8.6H10.5999M13.7999 11H10.5999M13.7999 13.4H8.1999" stroke="#4D4D4D"></path>
</g>
<defs>
<clipPath id="clip0_2477_3848">
<rect width="12" height="12" fill="white" transform="translate(5 5)"></rect>
</clipPath>
</defs>
</svg>
</a>
</div>
</div>
<div class="gst_in pan_gst">

<span>PAN</span>
<div class="numver_btnn">
<b>NZKPS1314R</b>
<a class="down_gst_pan" href=#">
<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="11" cy="11" r="10.5" fill="#F1F3F8" stroke="#4D4D4D"></circle>
<g clip-path="url(#clip0_2477_3848)">
<path d="M5.3999 5V8.6C5.3999 9.02435 5.56847 9.43131 5.86853 9.73137C6.16859 10.0314 6.57556 10.2 6.9999 10.2C7.42425 10.2 7.83121 10.0314 8.13127 9.73137C8.43133 9.43131 8.5999 9.02435 8.5999 8.6V6.2C8.5999 5.98783 8.51562 5.78434 8.36559 5.63431C8.21556 5.48429 8.01208 5.4 7.7999 5.4C7.58773 5.4 7.38425 5.48429 7.23422 5.63431C7.08419 5.78434 6.9999 5.98783 6.9999 6.2V9M9.7999 5.4H14.9999C15.2121 5.4 15.4156 5.48429 15.5656 5.63431C15.7156 5.78434 15.7999 5.98783 15.7999 6.2V15.8C15.7999 16.0122 15.7156 16.2157 15.5656 16.3657C15.4156 16.5157 15.2121 16.6 14.9999 16.6H6.9999C6.78773 16.6 6.58425 16.5157 6.43422 16.3657C6.28419 16.2157 6.1999 16.0122 6.1999 15.8V11.4M13.7999 8.6H10.5999M13.7999 11H10.5999M13.7999 13.4H8.1999" stroke="#4D4D4D"></path>
</g>
<defs>
<clipPath id="clip0_2477_3848">
<rect width="12" height="12" fill="white" transform="translate(5 5)"></rect>
</clipPath>
</defs>
</svg>
</a>
</div>
</div>

</div>

<div class="three_button_pannel">
<div class="dropdown">
              <button onclick="toggleDropdown()" class="dropbtn show_pp">
              <svg width="4" height="14" viewBox="0 0 4 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.315443 12.2554V11.8836C0.323646 11.8535 0.337318 11.8261 0.342787 11.7961C0.463099 11.014 1.11388 10.3961 1.87676 10.3441C2.72988 10.284 3.45176 10.7707 3.68691 11.5636C3.71699 11.6675 3.73887 11.7769 3.76621 11.8836V12.2554C3.75801 12.28 3.74434 12.3019 3.7416 12.3292C3.62402 13.0511 3.10449 13.6007 2.39355 13.7566C2.33887 13.7675 2.28418 13.7839 2.22949 13.7976H1.85762C1.83301 13.7894 1.8084 13.7757 1.78379 13.773C1.07285 13.6581 0.531459 13.1523 0.367383 12.4496C0.350976 12.3812 0.331849 12.3183 0.315443 12.2554ZM3.76622 1.74452L3.76621 2.11642C3.75801 2.1465 3.74434 2.17384 3.7416 2.20392C3.61855 2.99142 2.96504 3.60665 2.19394 3.65587C1.34355 3.71056 0.624414 3.21837 0.391992 2.42267C0.361914 2.32148 0.340039 2.21759 0.31543 2.11641V1.74453C0.323633 1.71992 0.337305 1.69805 0.342773 1.67344C0.474023 0.9625 0.886914 0.497656 1.57598 0.276172C1.66621 0.246094 1.76191 0.229687 1.85488 0.205078H2.22676C2.25137 0.213281 2.27598 0.226953 2.30059 0.229688C3.01426 0.347266 3.55293 0.850391 3.71699 1.55312C3.73341 1.61875 3.74982 1.68164 3.76622 1.74452ZM3.76621 6.81406V7.18594C3.75801 7.21602 3.74434 7.24336 3.73887 7.27344C3.61582 8.0582 2.9377 8.68984 2.17207 8.72266C1.31074 8.76094 0.580664 8.24141 0.375586 7.44023C0.353711 7.35547 0.33457 7.2707 0.31543 7.18594V6.81406C0.323633 6.78398 0.337305 6.75664 0.342773 6.72656C0.463086 5.9418 1.14394 5.31014 1.90957 5.27461C2.7709 5.23359 3.50098 5.75586 3.70605 6.55703C3.72793 6.64453 3.74707 6.7293 3.76621 6.81406Z" fill="#747474"/>
</svg>
              </button>
              <div id="myDropdown3" class="dropdown-content"> <div class="down_del">
                  <a class="dropdown-itemm delet_nt" id="delete-3">
                  <form method="POST" action="http://127.0.0.1:8000/delete-moadoc/3">
                                            <input type="hidden" name="_token" value="BgRwwRsDTBCucrrNVHC0TbaphLjB7sUSYUE5lndX" autocomplete="off">                                            <input type="hidden" name="_method" value="DELETE">                                            <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?')">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                    </svg> Delete
                                                            </button>
                                                        </form>
                                                       
                                                 </a>
                    
                   
                </div>
                <a class="dropdown-itemm rename_nt">
                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.75 9.33323L6.41667 11.6666H12.25V9.33323H8.75ZM7.035 4.19406L1.75 9.47906V11.6666H3.9375L9.2225 6.38156L7.035 4.19406ZM10.9142 4.6899C11.1417 4.4624 11.1417 4.08323 10.9142 3.8674L9.54917 2.5024C9.4398 2.39389 9.29198 2.33301 9.13792 2.33301C8.98385 2.33301 8.83604 2.39389 8.72667 2.5024L7.65917 3.5699L9.84667 5.7574L10.9142 4.6899Z" fill="#8D8D8D"></path>
                  </svg> Edit </a>

              </div>
            </div>
            <div class="active_page_drop">
            <svg class="inactove" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8.5 11L12 14.5L15.5 11" stroke="#747474" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M12 22C17.523 22 22 17.523 22 12C22 6.477 17.523 2 12 2C6.477 2 2 6.477 2 12C2 17.523 6.477 22 12 22Z" stroke="#747474" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                  </div>
</div>

    </div>
    <!-- button end -->
    
    <div class="accordion-content">
 <div class="acc_cont_wrapp">
    <div class="address_deatils">
        <div class="permanent pc_coan">
<span>Permanent Address</span>
<p>6A, 4th Floor, Tower B, DLF CyberCity, Gurugram, Haryana 122002</p>
                  </div>

                  <div class="communication pc_coan">
                  <span>Communication Address</span>
<p>6A, 4th Floor, Tower B, DLF CyberCity, Gurugram, Haryana 122002</p>
                  </div>

                  </div>

                  <div class="bussiness_deatils">
                    <div class="email_details_wrap">
                  <div class="email_details">
<span>Email</span>
<b>business@wingdart.com</b>
</div>

<div class="email_details">
<span>Contact</span>
<b>+91 98765 98110</b>
</div>
</div>

<div class="authorized">
<span>Authorized Signatory</span>
<b>Armaan Sachdeva <span class="desigantion">General Manager</span></b>
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
            </div> 
          </div>
        </div>
        <!-- Container-fluid start-->


        </div>
      </div>
    </div>



    @endsection
   
