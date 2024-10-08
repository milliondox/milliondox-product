@extends('user.includes.profile') @section('content')
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
           Profile
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
           Profile
          </h2>
            </div>
             <!-- Container-fluid start-->
             <div class="container-fluid prooter_profille">
          <div class="row">     
        <div class="col-sm-6">
            <div class="pro_promoter">
                <div class="manage_co_wrap">
                <h2>Promoters</h2>

                <div class="tab">
    <button class="tablinks active" onclick="openTab(event, 'tab1')" id="defaultOpen">
<div class="left_ig_pro">
<div class="inn_in_ig">
    <img src="http://127.0.0.1:8000/assets/images/alok.png" alt="img">
</div>
<div class="pro_dtext">
    <h3>Jay Malhotra</h3>
    <span>CEO</span>
</div>
</div>

<div class="view_profile">
    <a class="hvr-rotate">View Profile</a>
</div>
</button>

    <button class="tablinks" onclick="openTab(event, 'tab2')">
    <div class="left_ig_pro">
<div class="inn_in_ig">
    <img src="http://127.0.0.1:8000/assets/images/alok.png" alt="img">
</div>
<div class="pro_dtext">
    <h3>Karan Hundal</h3>
    <span>CEO</span>
</div>
</div>

<div class="view_profile">
    <a class="hvr-rotate">View Profile</a>
</div>
</button>
</div>
</div>

<div class="hearder-entress enteries_bottom">
                      <div class="sadd_filds">
                      <button class="hvr-rotate" id="addCustomDocButton" data-bs-toggle="modal" data-bs-target="#add_contract1"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.41797 7.58341H2.91797V6.41675H6.41797V2.91675H7.58464V6.41675H11.0846V7.58341H7.58464V11.0834H6.41797V7.58341Z" fill="#7E7E7E"></path>
</svg> Add a promoter</button>

<!-- model start -->
<div class="modal fade drop_coman_file have_title" id="add_contract1" tabindex="-1" role="dialog" aria-labelledby="add_contract1" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" style="font-weight:700">Add a promoter</h5>
                                    <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                                      <span aria-hidden="true">
                                        <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"></rect>
                                          <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"></rect>
                                        </svg>
                                      </span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <h3>Add a promoter</h3>


                                    <form action="" method="POST" enctype="multipart/form-data" class="upload-form rers_pages_hide"> 
                                      <input type="hidden" name="_token" value="we3i8vaszV3hzh9xwhqYc7REjy5zlDtR69uBxKWK" autocomplete="off">									  
									    <div class="rers_pages first-set">
										<div class="page page1">
                                               
                                        <div class="color_arrpw">
                          <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<line x1="-8.74228e-08" y1="6" x2="16" y2="6" stroke="#4D4D4D" stroke-width="2"/>
<path d="M18 6L9.75 11.1962L9.75 0.803848L18 6Z" fill="#5790FF"/>
</svg> <h2>Basic</h2>
                          </div>

<div class="gropu_form ivoice-upload">
                          <label for="fname">Profile Picture*</label>

                          <div class="file-area">      
                                    <input type="file" class="dragfile" id="aoa-file" name="file" accept="" required>    
  <div class="file-dummy">
    <div class="success">Great, your files are selected. Keep on.</div>
    <div class="default">
    <span class="upload_icon">
      
                          <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88"><title>file-upload</title><path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z"/></svg>
                          </span>  
                          Upload Picture
  </div>
  </div>
  <br><div class="selected-file"></div>
</div> 
                          </div>


                          <div class="gropu_form">
                          <label for="fname">Promoter’s Full Name*</label>
                           <input placeholder="Type" type="text" id="fname" name="fname">
                          </div>                          

                          <div class="gropu_form">
                          <label for="fname">Promoter’s Position*</label>
                           <input placeholder="Type" type="text" id="fname" name="fname">
                          </div>
                          
                          <div class="gropu_form test-areaa">
                          <label for="fname">Bio</label>
                          <textarea name="textarea" style="height: 58px;"> </textarea>
                          </div>

                          <hr class="cusrom_hr">
                          
                          <div class="color_arrpw">
                          <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<line x1="-8.74228e-08" y1="6" x2="16" y2="6" stroke="#4D4D4D" stroke-width="2"/>
<path d="M18 6L9.75 11.1962L9.75 0.803848L18 6Z" fill="#5790FF"/>
</svg> <h2>Social Links</h2>
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Linkedin</label>
                           <input placeholder="Type" type="text" id="fname" name="fname">
                          </div>

                          <div class="gropu_form">
                          <label for="fname">X (formerly Twitter)</label>
                           <input placeholder="Type" type="text" id="fname" name="fname">
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Other URL</label>
                           <input placeholder="Type" type="text" id="fname" name="fname">
                          </div>
                                                   
</div>
  <div class="page page2 hidden">
  <div class="color_arrpw">
                          <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<line x1="-8.74228e-08" y1="6" x2="16" y2="6" stroke="#4D4D4D" stroke-width="2"/>
<path d="M18 6L9.75 11.1962L9.75 0.803848L18 6Z" fill="#5790FF"/>
</svg> <h2>Experience</h2>
                          </div>

                          <div class="promoter_exp">

                        <div class="repeat_exp" style="display:none;">
                          <div class="gropu_form">
                          <label for="fname">Company Name</label>
                           <input placeholder="Type" type="text" id="fname" name="fname">
                          </div>
                          <div class="gropu_form">
                          <label for="fname">Position</label>
                           <input placeholder="Type" type="text" id="fname" name="fname">
                          </div>
                          <a class="minus_minn" id="minus_min"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="9" cy="9" r="9" fill="#FF0101"/>
<rect x="5" y="8" width="8" height="2" fill="white"/>
</svg>
</a>
                          </div>

                          <div class="plus_more">
                            <a class="plus_moree" id="plus_more"><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.16797 6.83335H0.167969V5.16669H5.16797V0.166687H6.83464V5.16669H11.8346V6.83335H6.83464V11.8334H5.16797V6.83335Z" fill="#8F97A8"/>
</svg>
</a>
</div>

</div>

  </div>
</div>
                          <div class="wrpa_bbtn">
                          <div class="next_pre">
                  <button type="button" id="backBtn" class="hidden">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="0.5" y="-0.5" width="29" height="29" rx="14.5" transform="matrix(1 0 0 -1 0 29)" stroke="black"></rect>
                      <path d="M9.21345 15.5415H21.3339C21.4947 15.5415 21.6488 15.4776 21.7624 15.3639C21.8761 15.2502 21.9399 15.0959 21.9399 14.9351C21.9399 14.7742 21.8761 14.62 21.7624 14.5063C21.6488 14.3925 21.4947 14.3287 21.3339 14.3287H9.21345C9.05272 14.3287 8.89857 14.3925 8.78492 14.5063C8.67127 14.62 8.60742 14.7742 8.60742 14.9351C8.60742 15.0959 8.67127 15.2502 8.78492 15.3639C8.89857 15.4776 9.05272 15.5415 9.21345 15.5415Z" fill="black"></path>
                      <path d="M9.46402 14.9349L14.4904 9.90645C14.6042 9.79264 14.6681 9.63817 14.6681 9.47711C14.6681 9.31614 14.6042 9.16167 14.4904 9.04775C14.3766 8.93394 14.2222 8.87 14.0613 8.87C13.9004 8.87 13.746 8.93394 13.6322 9.04775L8.17804 14.5056C8.1216 14.562 8.07682 14.6289 8.04627 14.7026C8.01573 14.7762 8 14.8552 8 14.9349C8 15.0147 8.01573 15.0937 8.04627 15.1674C8.07682 15.2411 8.1216 15.308 8.17804 15.3643L13.6322 20.8222C13.746 20.936 13.9004 21 14.0613 21C14.2222 21 14.3766 20.936 14.4904 20.8222C14.6042 20.7083 14.6681 20.5538 14.6681 20.3928C14.6681 20.2318 14.6042 20.0773 14.4904 19.9635L9.46402 14.9349Z" fill="black"></path>
                    </svg>
                  </button>

                <button type="button" id="nextBtn">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="29.5" y="29.5" width="29" height="29" rx="14.5" transform="rotate(180 29.5 29.5)" stroke="black"></rect>
                      <path d="M20.7866 15.5415H8.66608C8.50532 15.5415 8.35124 15.4776 8.2376 15.3639C8.12386 15.2502 8.06006 15.0959 8.06006 14.9351C8.06006 14.7742 8.12386 14.62 8.2376 14.5063C8.35124 14.3925 8.50532 14.3287 8.66608 14.3287H20.7866C20.9473 14.3287 21.1014 14.3925 21.2151 14.5063C21.3287 14.62 21.3926 14.7742 21.3926 14.9351C21.3926 15.0959 21.3287 15.2502 21.2151 15.3639C21.1014 15.4776 20.9473 15.5415 20.7866 15.5415Z" fill="black"></path>
                      <path d="M20.536 14.9349L15.5096 9.90645C15.3958 9.79264 15.3319 9.63817 15.3319 9.47711C15.3319 9.31614 15.3958 9.16167 15.5096 9.04775C15.6234 8.93394 15.7778 8.87 15.9387 8.87C16.0996 8.87 16.254 8.93394 16.3678 9.04775L21.822 14.5056C21.8784 14.562 21.9232 14.6289 21.9537 14.7026C21.9843 14.7762 22 14.8552 22 14.9349C22 15.0147 21.9843 15.0937 21.9537 15.1674C21.9232 15.2411 21.8784 15.308 21.822 15.3643L16.3678 20.8222C16.254 20.936 16.0996 21 15.9387 21C15.7778 21 15.6234 20.936 15.5096 20.8222C15.3958 20.7083 15.3319 20.5538 15.3319 20.3928C15.3319 20.2318 15.3958 20.0773 15.5096 19.9635L20.536 14.9349Z" fill="black"></path>
                    </svg>
                  </button> 
                </div>

                <div class="root_btn">                        
                          <button class="btn btn-primary" style="border-radius:5px;" type="submit">Save</button>
</div>
</div>
				
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
<!-- model end -->

                      </div>
                    </div>
                    <!--  -->

            </div>
        </div>

        <div class="col-sm-6">
   <div class="pro_details">

   <div id="tab1" class="tabcontent show">
<div class="all_deatills">

    <div class="details_edit">
        <button data-bs-toggle="modal" data-bs-target="#edit_contract1"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M17.2583 5.86667C17.5833 5.54167 17.5833 5.00001 17.2583 4.69167L15.3083 2.74167C15 2.41667 14.4583 2.41667 14.1333 2.74167L12.6 4.26667L15.725 7.39167M2.5 14.375V17.5H5.625L14.8417 8.27501L11.7167 5.15001L2.5 14.375Z" fill="#6A6A6A"/>
</svg></button>

<!-- model start -->
<div class="modal fade drop_coman_file have_title" id="edit_contract1" tabindex="-1" role="dialog" aria-labelledby="edit_contract1" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" style="font-weight:700">Edit Profile <span class="clinet_name">Jay Malhotra</span></h5>
                                    <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                                      <span aria-hidden="true">
                                        <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"></rect>
                                          <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"></rect>
                                        </svg>
                                      </span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <h3>Edit Profile</h3>


                                    <form action="" method="POST" enctype="multipart/form-data" class="upload-form rers_pages_hide"> 
                                      <input type="hidden" name="_token" value="we3i8vaszV3hzh9xwhqYc7REjy5zlDtR69uBxKWK" autocomplete="off">									  
									    <div class="rers_pages">
										<div class="pagee page1">
                                               
                                        <div class="color_arrpw">
                          <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<line x1="-8.74228e-08" y1="6" x2="16" y2="6" stroke="#4D4D4D" stroke-width="2"/>
<path d="M18 6L9.75 11.1962L9.75 0.803848L18 6Z" fill="#5790FF"/>
</svg> <h2>Basic</h2>
                          </div>

<div class="gropu_form ivoice-upload">
                          <label for="fname">Profile Picture*</label>

                          <div class="file-area" id="round_uplad_image">  
                          <div class="inner_file_edit">	    
                                    <input type="file" id="aoa-file" name="file" accept="" required>   
                                    <div class="dont_show"> 
                                    <img src="http://127.0.0.1:8000/assets/images/alok.png" alt="img">
                                    <div class="EAyyHe"><div class="EzQmEf"></div></div>
  </div>
  </div>
</div> 
                          </div>


                          <div class="gropu_form">
                          <label for="fname">Promoter’s Full Name*</label>
                           <input placeholder="Type" type="text" id="fname" name="fname">
                          </div>                          

                          <div class="gropu_form">
                          <label for="fname">Promoter’s Position*</label>
                           <input placeholder="Type" type="text" id="fname" name="fname">
                          </div>
                          
                          <div class="gropu_form test-areaa">
                          <label for="fname">Bio</label>
                          <textarea name="textarea" style="height: 58px;"> </textarea>
                          </div>

                          <hr class="cusrom_hr">
                          
                          <div class="color_arrpw">
                          <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<line x1="-8.74228e-08" y1="6" x2="16" y2="6" stroke="#4D4D4D" stroke-width="2"/>
<path d="M18 6L9.75 11.1962L9.75 0.803848L18 6Z" fill="#5790FF"/>
</svg> <h2>Social Links</h2>
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Linkedin</label>
                           <input placeholder="Type" type="text" id="fname" name="fname">
                          </div>

                          <div class="gropu_form">
                          <label for="fname">X (formerly Twitter)</label>
                           <input placeholder="Type" type="text" id="fname" name="fname">
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Other URL</label>
                           <input placeholder="Type" type="text" id="fname" name="fname">
                          </div>
                                                   
</div>
  <div class="pagee page2 hidden">
  <div class="color_arrpw">
                          <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<line x1="-8.74228e-08" y1="6" x2="16" y2="6" stroke="#4D4D4D" stroke-width="2"/>
<path d="M18 6L9.75 11.1962L9.75 0.803848L18 6Z" fill="#5790FF"/>
</svg> <h2>Experience</h2>
                          </div>

                          <div class="promoter_exp">

                        <div class="repeat_exp" style="display:none;">
                          <div class="gropu_form">
                          <label for="fname">Company Name</label>
                           <input placeholder="Type" type="text" id="fname" name="fname">
                          </div>
                          <div class="gropu_form">
                          <label for="fname">Position</label>
                           <input placeholder="Type" type="text" id="fname" name="fname">
                          </div>
                          <a class="minus_minn" id="minus_min1"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="9" cy="9" r="9" fill="#FF0101"/>
<rect x="5" y="8" width="8" height="2" fill="white"/>
</svg>
</a>
                          </div>

                          <div class="plus_more">
                            <a class="plus_moree" id="plus_more1"><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.16797 6.83335H0.167969V5.16669H5.16797V0.166687H6.83464V5.16669H11.8346V6.83335H6.83464V11.8334H5.16797V6.83335Z" fill="#8F97A8"/>
</svg>
</a>
</div>

</div>

  </div>
</div>
                          <div class="wrpa_bbtnn">
                          <div class="next_pre">
                  <button type="button" id="backBtnn" class="hidden">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="0.5" y="-0.5" width="29" height="29" rx="14.5" transform="matrix(1 0 0 -1 0 29)" stroke="black"></rect>
                      <path d="M9.21345 15.5415H21.3339C21.4947 15.5415 21.6488 15.4776 21.7624 15.3639C21.8761 15.2502 21.9399 15.0959 21.9399 14.9351C21.9399 14.7742 21.8761 14.62 21.7624 14.5063C21.6488 14.3925 21.4947 14.3287 21.3339 14.3287H9.21345C9.05272 14.3287 8.89857 14.3925 8.78492 14.5063C8.67127 14.62 8.60742 14.7742 8.60742 14.9351C8.60742 15.0959 8.67127 15.2502 8.78492 15.3639C8.89857 15.4776 9.05272 15.5415 9.21345 15.5415Z" fill="black"></path>
                      <path d="M9.46402 14.9349L14.4904 9.90645C14.6042 9.79264 14.6681 9.63817 14.6681 9.47711C14.6681 9.31614 14.6042 9.16167 14.4904 9.04775C14.3766 8.93394 14.2222 8.87 14.0613 8.87C13.9004 8.87 13.746 8.93394 13.6322 9.04775L8.17804 14.5056C8.1216 14.562 8.07682 14.6289 8.04627 14.7026C8.01573 14.7762 8 14.8552 8 14.9349C8 15.0147 8.01573 15.0937 8.04627 15.1674C8.07682 15.2411 8.1216 15.308 8.17804 15.3643L13.6322 20.8222C13.746 20.936 13.9004 21 14.0613 21C14.2222 21 14.3766 20.936 14.4904 20.8222C14.6042 20.7083 14.6681 20.5538 14.6681 20.3928C14.6681 20.2318 14.6042 20.0773 14.4904 19.9635L9.46402 14.9349Z" fill="black"></path>
                    </svg>
                  </button>

                <button type="button" id="nextBtnn">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="29.5" y="29.5" width="29" height="29" rx="14.5" transform="rotate(180 29.5 29.5)" stroke="black"></rect>
                      <path d="M20.7866 15.5415H8.66608C8.50532 15.5415 8.35124 15.4776 8.2376 15.3639C8.12386 15.2502 8.06006 15.0959 8.06006 14.9351C8.06006 14.7742 8.12386 14.62 8.2376 14.5063C8.35124 14.3925 8.50532 14.3287 8.66608 14.3287H20.7866C20.9473 14.3287 21.1014 14.3925 21.2151 14.5063C21.3287 14.62 21.3926 14.7742 21.3926 14.9351C21.3926 15.0959 21.3287 15.2502 21.2151 15.3639C21.1014 15.4776 20.9473 15.5415 20.7866 15.5415Z" fill="black"></path>
                      <path d="M20.536 14.9349L15.5096 9.90645C15.3958 9.79264 15.3319 9.63817 15.3319 9.47711C15.3319 9.31614 15.3958 9.16167 15.5096 9.04775C15.6234 8.93394 15.7778 8.87 15.9387 8.87C16.0996 8.87 16.254 8.93394 16.3678 9.04775L21.822 14.5056C21.8784 14.562 21.9232 14.6289 21.9537 14.7026C21.9843 14.7762 22 14.8552 22 14.9349C22 15.0147 21.9843 15.0937 21.9537 15.1674C21.9232 15.2411 21.8784 15.308 21.822 15.3643L16.3678 20.8222C16.254 20.936 16.0996 21 15.9387 21C15.7778 21 15.6234 20.936 15.5096 20.8222C15.3958 20.7083 15.3319 20.5538 15.3319 20.3928C15.3319 20.2318 15.3958 20.0773 15.5096 19.9635L20.536 14.9349Z" fill="black"></path>
                    </svg>
                  </button> 
                </div>

                <div class="root_btn">                        
                          <button class="btn btn-primary" style="border-radius:5px;" type="submit">Save</button>
</div>
</div>
				
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
<!-- model end -->

</div>
<div class="all_deatills_wraper">

<div class="full_warp_de">
<div class="left_ig_pro">
<div class="inn_in_ig">
    <img src="../assets/images/jay_malhotra.png" alt="img">
</div>
<div class="pro_dtext">
    <h3>Jay Malhotra</h3>
    <span>CEO</span>
</div>
</div>

<div class="socail_pro">
    <ul>
        <li><a href=#"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M15.8333 2.5C16.2754 2.5 16.6993 2.67559 17.0118 2.98816C17.3244 3.30072 17.5 3.72464 17.5 4.16667V15.8333C17.5 16.2754 17.3244 16.6993 17.0118 17.0118C16.6993 17.3244 16.2754 17.5 15.8333 17.5H4.16667C3.72464 17.5 3.30072 17.3244 2.98816 17.0118C2.67559 16.6993 2.5 16.2754 2.5 15.8333V4.16667C2.5 3.72464 2.67559 3.30072 2.98816 2.98816C3.30072 2.67559 3.72464 2.5 4.16667 2.5H15.8333ZM15.4167 15.4167V11C15.4167 10.2795 15.1304 9.5885 14.621 9.07903C14.1115 8.56955 13.4205 8.28333 12.7 8.28333C11.9917 8.28333 11.1667 8.71667 10.7667 9.36667V8.44167H8.44167V15.4167H10.7667V11.3083C10.7667 10.6667 11.2833 10.1417 11.925 10.1417C12.2344 10.1417 12.5312 10.2646 12.75 10.4834C12.9688 10.7022 13.0917 10.9989 13.0917 11.3083V15.4167H15.4167ZM5.73333 7.13333C6.10464 7.13333 6.46073 6.98583 6.72328 6.72328C6.98583 6.46073 7.13333 6.10464 7.13333 5.73333C7.13333 4.95833 6.50833 4.325 5.73333 4.325C5.35982 4.325 5.0016 4.47338 4.73749 4.73749C4.47338 5.0016 4.325 5.35982 4.325 5.73333C4.325 6.50833 4.95833 7.13333 5.73333 7.13333ZM6.89167 15.4167V8.44167H4.58333V15.4167H6.89167Z" fill="black"/>
</svg></a></li>
        <li><a href=#"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M14.3906 14.25L9.39234 6.96477L9.40088 6.97159L13.9076 1.75H12.4015L8.73028 6L5.81484 1.75H1.86511L6.53148 8.55172L6.53092 8.55114L1.60938 14.25H3.11539L7.19698 9.52159L10.4409 14.25H14.3906ZM5.21812 2.88636L12.231 13.1136H11.0376L4.01902 2.88636H5.21812Z" fill="black"/>
</svg></a></li>
        <li><a href=#"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_920_3026)">
<path d="M8 0C8.73438 0 9.44271 0.09375 10.125 0.28125C10.8073 0.46875 11.4453 0.736979 12.0391 1.08594C12.6328 1.4349 13.1719 1.85156 13.6562 2.33594C14.1406 2.82031 14.5573 3.36198 14.9062 3.96094C15.2552 4.5599 15.5234 5.19792 15.7109 5.875C15.8984 6.55208 15.9948 7.26042 16 8C16 8.73438 15.9062 9.44271 15.7188 10.125C15.5312 10.8073 15.263 11.4453 14.9141 12.0391C14.5651 12.6328 14.1484 13.1719 13.6641 13.6562C13.1797 14.1406 12.638 14.5573 12.0391 14.9062C11.4401 15.2552 10.8021 15.5234 10.125 15.7109C9.44792 15.8984 8.73958 15.9948 8 16C7.26562 16 6.55729 15.9062 5.875 15.7188C5.19271 15.5312 4.55469 15.263 3.96094 14.9141C3.36719 14.5651 2.82812 14.1484 2.34375 13.6641C1.85938 13.1797 1.44271 12.638 1.09375 12.0391C0.744792 11.4401 0.476562 10.8047 0.289062 10.1328C0.101562 9.46094 0.00520833 8.75 0 8C0 7.26562 0.09375 6.55729 0.28125 5.875C0.46875 5.19271 0.736979 4.55469 1.08594 3.96094C1.4349 3.36719 1.85156 2.82812 2.33594 2.34375C2.82031 1.85938 3.36198 1.44271 3.96094 1.09375C4.5599 0.744792 5.19531 0.476562 5.86719 0.289062C6.53906 0.101562 7.25 0.00520833 8 0ZM8 15C8.64062 15 9.25781 14.9167 9.85156 14.75C10.4453 14.5833 11.0026 14.349 11.5234 14.0469C12.0443 13.7448 12.5182 13.3776 12.9453 12.9453C13.3724 12.513 13.737 12.0417 14.0391 11.5312C14.3411 11.0208 14.5781 10.4635 14.75 9.85938C14.9219 9.25521 15.0052 8.63542 15 8C15 7.35938 14.9167 6.74219 14.75 6.14844C14.5833 5.55469 14.349 4.9974 14.0469 4.47656C13.7448 3.95573 13.3776 3.48177 12.9453 3.05469C12.513 2.6276 12.0417 2.26302 11.5312 1.96094C11.0208 1.65885 10.4635 1.42188 9.85938 1.25C9.25521 1.07812 8.63542 0.994792 8 1C7.35938 1 6.74219 1.08333 6.14844 1.25C5.55469 1.41667 4.9974 1.65104 4.47656 1.95312C3.95573 2.25521 3.48177 2.6224 3.05469 3.05469C2.6276 3.48698 2.26302 3.95833 1.96094 4.46875C1.65885 4.97917 1.42188 5.53646 1.25 6.14062C1.07812 6.74479 0.994792 7.36458 1 8C1 8.64062 1.08333 9.25781 1.25 9.85156C1.41667 10.4453 1.65104 11.0026 1.95312 11.5234C2.25521 12.0443 2.6224 12.5182 3.05469 12.9453C3.48698 13.3724 3.95833 13.737 4.46875 14.0391C4.97917 14.3411 5.53646 14.5781 6.14062 14.75C6.74479 14.9219 7.36458 15.0052 8 15ZM12.6641 8.125L13.0391 7H13.625L12.9609 9H12.375L12 7.875L11.625 9H11.0391L10.375 7H10.9609L11.3359 8.125L11.7109 7H12.2891L12.6641 8.125ZM9.03906 7H9.625L8.96094 9H8.375L8 7.875L7.625 9H7.03906L6.375 7H6.96094L7.33594 8.125L7.71094 7H8.28906L8.66406 8.125L9.03906 7ZM5.03906 7H5.625L4.96094 9H4.375L4 7.875L3.625 9H3.03906L2.375 7H2.96094L3.33594 8.125L3.71094 7H4.28906L4.66406 8.125L5.03906 7Z" fill="black"/>
</g>
<defs>
<clipPath id="clip0_920_3026">
<rect width="16" height="16" fill="white"/>
</clipPath>
</defs>
</svg></a></li>
    </ul>
</div>
</div>

<div class="up_right">
<a href="#" class="view-cont">KYC Details<svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.3691 4.38178C5.53296 4.54584 5.625 4.76824 5.625 5.00011C5.625 5.23199 5.53296 5.45438 5.3691 5.61845L2.06977 8.91895C1.98849 9.00019 1.89201 9.06462 1.78583 9.10857C1.67965 9.15252 1.56586 9.17513 1.45094 9.1751C1.33602 9.17508 1.22224 9.15242 1.11608 9.10841C1.00992 9.06441 0.913467 8.99993 0.832229 8.91866C0.750989 8.83738 0.686554 8.7409 0.642603 8.63472C0.598651 8.52854 0.576044 8.41474 0.576071 8.29982C0.576097 8.18491 0.59876 8.07112 0.642761 7.96496C0.686763 7.8588 0.751243 7.76235 0.83252 7.68111L3.51294 5.00011L0.831936 2.31911C0.748328 2.23844 0.681623 2.14192 0.635716 2.03518C0.589808 1.92845 0.565618 1.81365 0.564554 1.69747C0.56349 1.58129 0.585575 1.46606 0.62952 1.3585C0.673465 1.25095 0.738389 1.15322 0.820507 1.07103C0.902624 0.988832 1.00029 0.923815 1.1078 0.879768C1.21531 0.835722 1.33052 0.813528 1.4467 0.814483C1.56289 0.815437 1.67772 0.839521 1.78449 0.885327C1.89126 0.931134 1.98785 0.997747 2.0686 1.08128L5.3691 4.38178Z" fill="#5790FF"></path>
</svg></a>
</div>

<div class="profile_bio">
    <span class="biio">Bio</span>
    <div class="bio_conntent">
        <p>Hi, my name is Jay Malhotra and I am the Chief Executive Officer at Wingdart.</p>
        <br>
        <p>You can reach out to me at +91 98765 43210 or jay@wingdart.com</p>
    </div>
</div>

<div class="profile_bio profile_xperience">
    <span class="biio">Experience</span>
    <div class="bio_conntent pos_ition">
        <ul>
            <li>
                <h4>Sr. Product Manager</h4>
                <span>Meta Inc.</span>
        </li>
        <li>
                <h4>CEO</h4>
                <span>Medial</span>
        </li>
        <li>
                <h4>SDE III</h4>
                <span>Google</span>
        </li>
        <li>
                <h4>SDE I</h4>
                <span>Kapture CX</span>
        </li>
        </ul>
    </div>
</div>


</div>
</div>

</div>

<div id="tab2" class="tabcontent">

<div class="all_deatills">

    <div class="details_edit">
        <button><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M17.2583 5.86667C17.5833 5.54167 17.5833 5.00001 17.2583 4.69167L15.3083 2.74167C15 2.41667 14.4583 2.41667 14.1333 2.74167L12.6 4.26667L15.725 7.39167M2.5 14.375V17.5H5.625L14.8417 8.27501L11.7167 5.15001L2.5 14.375Z" fill="#6A6A6A"/>
</svg></button>
</div>
<div class="all_deatills_wraper">

<div class="full_warp_de">
<div class="left_ig_pro">
<div class="inn_in_ig">
    <img src="../assets/images/jay_malhotra.png" alt="img">
</div>
<div class="pro_dtext">
    <h3>Karan Hundal</h3>
    <span>CEO</span>
</div>
</div>

<div class="socail_pro">
    <ul>
        <li><a href=#"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M15.8333 2.5C16.2754 2.5 16.6993 2.67559 17.0118 2.98816C17.3244 3.30072 17.5 3.72464 17.5 4.16667V15.8333C17.5 16.2754 17.3244 16.6993 17.0118 17.0118C16.6993 17.3244 16.2754 17.5 15.8333 17.5H4.16667C3.72464 17.5 3.30072 17.3244 2.98816 17.0118C2.67559 16.6993 2.5 16.2754 2.5 15.8333V4.16667C2.5 3.72464 2.67559 3.30072 2.98816 2.98816C3.30072 2.67559 3.72464 2.5 4.16667 2.5H15.8333ZM15.4167 15.4167V11C15.4167 10.2795 15.1304 9.5885 14.621 9.07903C14.1115 8.56955 13.4205 8.28333 12.7 8.28333C11.9917 8.28333 11.1667 8.71667 10.7667 9.36667V8.44167H8.44167V15.4167H10.7667V11.3083C10.7667 10.6667 11.2833 10.1417 11.925 10.1417C12.2344 10.1417 12.5312 10.2646 12.75 10.4834C12.9688 10.7022 13.0917 10.9989 13.0917 11.3083V15.4167H15.4167ZM5.73333 7.13333C6.10464 7.13333 6.46073 6.98583 6.72328 6.72328C6.98583 6.46073 7.13333 6.10464 7.13333 5.73333C7.13333 4.95833 6.50833 4.325 5.73333 4.325C5.35982 4.325 5.0016 4.47338 4.73749 4.73749C4.47338 5.0016 4.325 5.35982 4.325 5.73333C4.325 6.50833 4.95833 7.13333 5.73333 7.13333ZM6.89167 15.4167V8.44167H4.58333V15.4167H6.89167Z" fill="black"/>
</svg></a></li>
        <li><a href=#"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M14.3906 14.25L9.39234 6.96477L9.40088 6.97159L13.9076 1.75H12.4015L8.73028 6L5.81484 1.75H1.86511L6.53148 8.55172L6.53092 8.55114L1.60938 14.25H3.11539L7.19698 9.52159L10.4409 14.25H14.3906ZM5.21812 2.88636L12.231 13.1136H11.0376L4.01902 2.88636H5.21812Z" fill="black"/>
</svg></a></li>
        <li><a href=#"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_920_3026)">
<path d="M8 0C8.73438 0 9.44271 0.09375 10.125 0.28125C10.8073 0.46875 11.4453 0.736979 12.0391 1.08594C12.6328 1.4349 13.1719 1.85156 13.6562 2.33594C14.1406 2.82031 14.5573 3.36198 14.9062 3.96094C15.2552 4.5599 15.5234 5.19792 15.7109 5.875C15.8984 6.55208 15.9948 7.26042 16 8C16 8.73438 15.9062 9.44271 15.7188 10.125C15.5312 10.8073 15.263 11.4453 14.9141 12.0391C14.5651 12.6328 14.1484 13.1719 13.6641 13.6562C13.1797 14.1406 12.638 14.5573 12.0391 14.9062C11.4401 15.2552 10.8021 15.5234 10.125 15.7109C9.44792 15.8984 8.73958 15.9948 8 16C7.26562 16 6.55729 15.9062 5.875 15.7188C5.19271 15.5312 4.55469 15.263 3.96094 14.9141C3.36719 14.5651 2.82812 14.1484 2.34375 13.6641C1.85938 13.1797 1.44271 12.638 1.09375 12.0391C0.744792 11.4401 0.476562 10.8047 0.289062 10.1328C0.101562 9.46094 0.00520833 8.75 0 8C0 7.26562 0.09375 6.55729 0.28125 5.875C0.46875 5.19271 0.736979 4.55469 1.08594 3.96094C1.4349 3.36719 1.85156 2.82812 2.33594 2.34375C2.82031 1.85938 3.36198 1.44271 3.96094 1.09375C4.5599 0.744792 5.19531 0.476562 5.86719 0.289062C6.53906 0.101562 7.25 0.00520833 8 0ZM8 15C8.64062 15 9.25781 14.9167 9.85156 14.75C10.4453 14.5833 11.0026 14.349 11.5234 14.0469C12.0443 13.7448 12.5182 13.3776 12.9453 12.9453C13.3724 12.513 13.737 12.0417 14.0391 11.5312C14.3411 11.0208 14.5781 10.4635 14.75 9.85938C14.9219 9.25521 15.0052 8.63542 15 8C15 7.35938 14.9167 6.74219 14.75 6.14844C14.5833 5.55469 14.349 4.9974 14.0469 4.47656C13.7448 3.95573 13.3776 3.48177 12.9453 3.05469C12.513 2.6276 12.0417 2.26302 11.5312 1.96094C11.0208 1.65885 10.4635 1.42188 9.85938 1.25C9.25521 1.07812 8.63542 0.994792 8 1C7.35938 1 6.74219 1.08333 6.14844 1.25C5.55469 1.41667 4.9974 1.65104 4.47656 1.95312C3.95573 2.25521 3.48177 2.6224 3.05469 3.05469C2.6276 3.48698 2.26302 3.95833 1.96094 4.46875C1.65885 4.97917 1.42188 5.53646 1.25 6.14062C1.07812 6.74479 0.994792 7.36458 1 8C1 8.64062 1.08333 9.25781 1.25 9.85156C1.41667 10.4453 1.65104 11.0026 1.95312 11.5234C2.25521 12.0443 2.6224 12.5182 3.05469 12.9453C3.48698 13.3724 3.95833 13.737 4.46875 14.0391C4.97917 14.3411 5.53646 14.5781 6.14062 14.75C6.74479 14.9219 7.36458 15.0052 8 15ZM12.6641 8.125L13.0391 7H13.625L12.9609 9H12.375L12 7.875L11.625 9H11.0391L10.375 7H10.9609L11.3359 8.125L11.7109 7H12.2891L12.6641 8.125ZM9.03906 7H9.625L8.96094 9H8.375L8 7.875L7.625 9H7.03906L6.375 7H6.96094L7.33594 8.125L7.71094 7H8.28906L8.66406 8.125L9.03906 7ZM5.03906 7H5.625L4.96094 9H4.375L4 7.875L3.625 9H3.03906L2.375 7H2.96094L3.33594 8.125L3.71094 7H4.28906L4.66406 8.125L5.03906 7Z" fill="black"/>
</g>
<defs>
<clipPath id="clip0_920_3026">
<rect width="16" height="16" fill="white"/>
</clipPath>
</defs>
</svg></a></li>
    </ul>
</div>
</div>

<div class="up_right">
<a href="#" class="view-cont">KYC Details<svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.3691 4.38178C5.53296 4.54584 5.625 4.76824 5.625 5.00011C5.625 5.23199 5.53296 5.45438 5.3691 5.61845L2.06977 8.91895C1.98849 9.00019 1.89201 9.06462 1.78583 9.10857C1.67965 9.15252 1.56586 9.17513 1.45094 9.1751C1.33602 9.17508 1.22224 9.15242 1.11608 9.10841C1.00992 9.06441 0.913467 8.99993 0.832229 8.91866C0.750989 8.83738 0.686554 8.7409 0.642603 8.63472C0.598651 8.52854 0.576044 8.41474 0.576071 8.29982C0.576097 8.18491 0.59876 8.07112 0.642761 7.96496C0.686763 7.8588 0.751243 7.76235 0.83252 7.68111L3.51294 5.00011L0.831936 2.31911C0.748328 2.23844 0.681623 2.14192 0.635716 2.03518C0.589808 1.92845 0.565618 1.81365 0.564554 1.69747C0.56349 1.58129 0.585575 1.46606 0.62952 1.3585C0.673465 1.25095 0.738389 1.15322 0.820507 1.07103C0.902624 0.988832 1.00029 0.923815 1.1078 0.879768C1.21531 0.835722 1.33052 0.813528 1.4467 0.814483C1.56289 0.815437 1.67772 0.839521 1.78449 0.885327C1.89126 0.931134 1.98785 0.997747 2.0686 1.08128L5.3691 4.38178Z" fill="#5790FF"></path>
</svg></a>
</div>

<div class="profile_bio">
    <span class="biio">Bio</span>
    <div class="bio_conntent">
        <p>Hi, my name is Jay Malhotra and I am the Chief Executive Officer at Wingdart.</p>
        <br>
        <p>You can reach out to me at +91 98765 43210 or jay@wingdart.com</p>
    </div>
</div>

<div class="profile_bio profile_xperience">
    <span class="biio">Experience</span>
    <div class="bio_conntent pos_ition">
        <ul>
            <li>
                <h4>Sr. Product Manager</h4>
                <span>Meta Inc.</span>
        </li>
        <li>
                <h4>CEO</h4>
                <span>Medial</span>
        </li>
        <li>
                <h4>SDE III</h4>
                <span>Google</span>
        </li>
        <li>
                <h4>SDE I</h4>
                <span>Kapture CX</span>
        </li>
        </ul>
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
   
    <style>
      .rers_pages_hide {
    padding: 0px;
    overflow: hidden;
}
 .rers_pages {
    display: flex;
}
.rers_pages .page, .rers_pages .pagee {
    flex: 0 0 100%;
    transition: all 0.5s ease;
}

.rers_pages .page, .rers_pages .pagee {
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
.drop_coman_file.have_title .rers_pages .page .gropu_form.test-areaa, .drop_coman_file.have_title .rers_pages .pagee .gropu_form.test-areaa {
    display: flex;
    gap: 0;
}

.drop_coman_file.have_title .rers_pages .page .gropu_form.test-areaa label, .drop_coman_file.have_title .rers_pages .pagee .gropu_form.test-areaa label {
    flex: 1;
    padding: 0;
}

.drop_coman_file.have_title .rers_pages .page .gropu_form.test-areaa textarea, .drop_coman_file.have_title .rers_pages .pagee .gropu_form.test-areaa textarea {
    flex: 2;
    width: 100%;
}
.wrpa_bbtn, .wrpa_bbtnn {
    display: flex;
    align-items: center;
    justify-content: end;
    gap: 0px 20px;
    padding: 20px 0px 0px;
}

.wrpa_bbtn .root_btn, .wrpa_bbtnn .root_btn {
    padding: 0 !important;
}

.wrpa_bbtn .next_pre, .wrpa_bbtnn .next_pre {
    padding: 0;
}
.wrpa_bbtn .root_btn, .wrpa_bbtnn .root_btn {
    display: none !important;
}

.wrpa_bbtn.active .root_btn, .wrpa_bbtnn.active .root_btn {
    display: block !IMPORTANT;
}
      </style>
