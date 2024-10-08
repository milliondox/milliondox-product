@extends('user.includes.tickting') @section('content')
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
           Ticketing
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
           Ticketing
          </h2>
            </div>

             <!-- Container-fluid start-->
             <div class="container-fluid tickting_details">
        <div class="row">
          <div class="col-md-12">
         
            <div class="Inc_table">
              <div class="row">
                <div class="col-sm-12">
                  <div class="filtr_tabble">
                    <div class="table_title">
                        <div class="tick_headd">
                        <h2>Ticket# 09896355221 <a class="tick_status">OPEN</a></h2>
                        <span class="datte">Mon, 27 Mar 2023</span>
</div>
<div class="mark_as_read">
    <button>
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20ZM16.59 7.58L10 14.17L7.41 11.59L6 13L10 17L18 9L16.59 7.58Z" fill="#5790FF"/>
</svg> Mark as resolved</button>
</div>
</div>

                <div class="entery_body table-responsive">

                <div class="ticket_chat_box">
                
                </div>

                <div class="ticket_coent">
                <form action="" method="POST" enctype="multipart/form-data" class="for_check"> 
                    <label>Add a Comment</label>
                <div class="textara_ann">
<textarea placeholder="Write down your message" name="textarea" > </textarea>

<div class="uploadfile_ann_main">
<div class="uploadfile_ann">
<div class="attach_ann">
<input type="file" id="aoa-file" name="file" accept="" required="">
<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="14" cy="14" r="13.5" stroke="#6A6A6A"/>
<g clip-path="url(#clip0_181_14)">
<path d="M8.67801 22.1112C7.75923 22.1113 6.87726 21.7501 6.22245 21.1056L6.15023 21.0334C5.82123 20.7123 5.55982 20.3287 5.3814 19.9051C5.20297 19.4814 5.11115 19.0264 5.11134 18.5667C5.11018 18.0691 5.20779 17.5761 5.39852 17.1165C5.58924 16.6568 5.8693 16.2396 6.22245 15.8889L14.8336 7.37226C15.7085 6.4613 16.9062 5.93046 18.1688 5.89409C19.4313 5.85772 20.6576 6.31873 21.5836 7.17782C22.0012 7.59437 22.3317 8.08988 22.5558 8.63546C22.7799 9.18104 22.8933 9.76578 22.8891 10.3556C22.8842 11.0143 22.7491 11.6656 22.4917 12.2719C22.2343 12.8783 21.8596 13.4278 21.3891 13.8889L13.6502 21.5556C13.6021 21.6203 13.5405 21.6738 13.4697 21.7123C13.3988 21.7508 13.3204 21.7734 13.24 21.7786C13.1595 21.7837 13.0789 21.7713 13.0037 21.7422C12.9285 21.7131 12.8605 21.6679 12.8046 21.6099C12.7486 21.5519 12.7059 21.4823 12.6795 21.4062C12.6531 21.33 12.6435 21.2489 12.6516 21.1687C12.6596 21.0885 12.685 21.011 12.7261 20.9415C12.7671 20.8721 12.8227 20.8125 12.8891 20.7667L20.6058 13.1C20.9723 12.7423 21.2645 12.3157 21.4656 11.8447C21.6668 11.3738 21.7729 10.8677 21.778 10.3556C21.782 9.9124 21.6976 9.47285 21.5297 9.06267C21.3618 8.65248 21.1138 8.27989 20.8002 7.96671C20.0823 7.31274 19.1364 6.96672 18.166 7.00308C17.1956 7.03945 16.2783 7.4553 15.6113 8.16115L7.02801 16.6778C6.77507 16.9234 6.57357 17.2169 6.43526 17.5412C6.29695 17.8656 6.22461 18.2141 6.22245 18.5667C6.22126 18.8763 6.28154 19.183 6.3998 19.4691C6.51805 19.7552 6.69193 20.015 6.91134 20.2334L6.98356 20.3056C7.48064 20.7633 8.13759 21.0076 8.81298 20.9858C9.48836 20.9639 10.1282 20.6778 10.5947 20.1889L18.0113 12.8556C18.1516 12.7138 18.2622 12.5454 18.3366 12.3604C18.411 12.1753 18.4477 11.9773 18.4447 11.7778C18.4459 11.6046 18.4126 11.4329 18.3468 11.2726C18.281 11.1124 18.184 10.9668 18.0613 10.8445C17.7808 10.5872 17.4103 10.4506 17.0299 10.4641C16.6495 10.4776 16.2896 10.6402 16.028 10.9167L10.9169 15.9834C10.8123 16.0873 10.6707 16.1453 10.5233 16.1448C10.3758 16.1443 10.2347 16.0852 10.1308 15.9806C10.0269 15.876 9.96884 15.7344 9.96936 15.587C9.96988 15.4395 10.0289 15.2984 10.1336 15.1945L15.2669 10.1112C15.7374 9.62911 16.3786 9.35137 17.0521 9.33786C17.7256 9.32435 18.3774 9.57615 18.8669 10.0389C19.092 10.2681 19.2689 10.54 19.3873 10.8387C19.5056 11.1373 19.5629 11.4567 19.5558 11.7778C19.5552 12.1237 19.4856 12.4659 19.3511 12.7845C19.2166 13.1031 19.0199 13.3917 18.7725 13.6334L11.378 20.9889C10.6613 21.7045 9.6908 22.1079 8.67801 22.1112Z" fill="#6A6A6A"/>
</g>
<defs>
<clipPath id="clip0_181_14">
<rect width="20" height="20" fill="white" transform="translate(4 4)"/>
</clipPath>
</defs>
</svg>
</div>
</div>

<div class="root_btn">                        
<button class="btn" style="border-radius:5px;" type="submit">Send 
<svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M12.7252 5.555L1.72519 0.0550032C1.63897 0.0118866 1.54213 -0.00538936 1.44633 0.00525571C1.35052 0.0159008 1.25983 0.0540129 1.18519 0.115003C1.1139 0.174749 1.06069 0.253196 1.03154 0.341525C1.00239 0.429854 0.99846 0.524562 1.02019 0.615003L2.34519 5.5H8.00019V6.5H2.34519L1.00019 11.37C0.9798 11.4455 0.97742 11.5248 0.993238 11.6014C1.00906 11.678 1.04263 11.7499 1.09127 11.8111C1.1399 11.8724 1.20223 11.9214 1.27325 11.9542C1.34427 11.987 1.422 12.0027 1.50019 12C1.57846 11.9995 1.65553 11.9807 1.72519 11.945L12.7252 6.445C12.8071 6.40304 12.8758 6.3393 12.9238 6.26078C12.9718 6.18226 12.9972 6.09203 12.9972 6C12.9972 5.90798 12.9718 5.81774 12.9238 5.73923C12.8758 5.66071 12.8071 5.59696 12.7252 5.555Z" fill="white"/>
</svg>
</button>
</div>
</div>
</div>
</form>
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
   
