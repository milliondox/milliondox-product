@extends('user.includes.login-pass-edit') @section('content')
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
           
          </h2>
            </div>
            

      
              <!-- Container-fluid start-->
      <div class="container-fluid login_ediit_pass Role_Management">
        <div class="row">
          <div class="col-md-12">
         
            <div class="Inc_table">

                <div class=" tba_history_rap">
				
                  <div class="filtr_tabble">
				  <div class="table_title">
                        <h2>Change Password</h2>
</div>
				  <div class="mmanage_wrap">
                  <div class="row">
                    <div class="col-sm-5">
<div class="login_form_editfl">
    
</div>
			
</div>

			  
<div class="col-sm-7">
    
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
    
   

   
