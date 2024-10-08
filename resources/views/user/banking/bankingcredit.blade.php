@extends('user.includes.bankingcredit') @section('content')
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
           Credit Score
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
           Credit Score
          </h2>
            </div>
            <div class="container-fluid real_credit_main">
        <div class="row">
          <div class="col-sm-12">
            <div class="mmaiin_wallet">
              <div class="loker_image">
                <img src="../assets/images/credit-score-back.png" alt="img">
              </div>
              <div class="loker_text">
                <h2>Real-Time Credit Scores</h2>
                <p>Know your latest score instantly with MillionDox</p>                
              </div>
            </div>
          </div>
        </div>
      </div>

             <!-- Container-fluid start-->
             <div class="container-fluid">
          <div class="row">   
          <div class="show_crie_main">

          <div class="manage_co_wrap">
                <h2>Check Credit Score</h2>

                <div class="tab">
    <div class="cerit_tab">
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
    <a class="hvr-rotate">Fetch score</a>
</div>
</div>

<div class="cerit_tab">
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
    <a class="hvr-rotate">Fetch score</a>
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
   
