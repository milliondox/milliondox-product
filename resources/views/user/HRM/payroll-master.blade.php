@extends('user.includes.payroll-master') @section('content')
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
           Payroll Master
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
           Payroll Master
          </h2>
            </div>

              <!-- Container-fluid start-->
      <div class="container-fluid  employee-lifecycle payroll_master">
        <div class="row">
          <div class="col-md-12">
         
            <div class="Inc_table">
              <div class="row">
                <div class="col-sm-12 tba_history_rap">
                  <div class="filtr_tabble">
                    <div class="table_title">
                        <h2>Payroll Master</h2>
</div>
                    <div class="hearder-entres">
                      <div class="volt_headd-filter">
                      <div class="find_par">                    
                    <div class="search_nt">
                        <div class="svg_srch">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 14.75L10.25 10.25M1.25 6.5C1.25 7.18944 1.3858 7.87213 1.64963 8.50909C1.91347 9.14605 2.30018 9.7248 2.78769 10.2123C3.2752 10.6998 3.85395 11.0865 4.49091 11.3504C5.12787 11.6142 5.81056 11.75 6.5 11.75C7.18944 11.75 7.87213 11.6142 8.50909 11.3504C9.14605 11.0865 9.7248 10.6998 10.2123 10.2123C10.6998 9.7248 11.0865 9.14605 11.3504 8.50909C11.6142 7.87213 11.75 7.18944 11.75 6.5C11.75 5.81056 11.6142 5.12787 11.3504 4.49091C11.0865 3.85395 10.6998 3.2752 10.2123 2.78769C9.7248 2.30018 9.14605 1.91347 8.50909 1.64963C7.87213 1.3858 7.18944 1.25 6.5 1.25C5.81056 1.25 5.12787 1.3858 4.49091 1.64963C3.85395 1.91347 3.2752 2.30018 2.78769 2.78769C2.30018 3.2752 1.91347 3.85395 1.64963 4.49091C1.3858 5.12787 1.25 5.81056 1.25 6.5Z" stroke="#BFBFBF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</div>
                    <input type="search" class="" placeholder="Search employee name..." aria-controls="basic-1">
</div>
</div>
                        <button>
                          <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.59282 11.625H4.5V5.94909L0.5625 1.26159V0.375H11.25V1.25653L7.5 5.94403V9.71782L5.59282 11.625ZM5.25 10.875H5.28218L6.75 9.40718V5.68097L10.3948 1.125H1.42734L5.25 5.67591V10.875Z" fill="#868686" />
                          </svg> Apply Filter </button>
                      </div>

                    </div>
                    <div class="entery_body table-responsive">
                      <table class="table table-striped">
                        <!-- <thead>
                          <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead> -->
                        <tbody>                                            
                        @foreach($emplife as $emp)                                          
    <tr class="" >                          
                <td>
<div class="life_role_img">
    <div class="role_iimg">
    <img src="{{  asset('/' . $emp->file_path)  }}" alt="img">
</div>
<div class="role_name">
    <h2>{{$emp->fname}}</h2>
    <span>{{$emp->position}}</span>
</div>
</div>
                          </td>
                          <td>                           
                            <span class="fn">{{$emp->division}}</span>
                          </td>                         
                          <td>
                @php
                    $today = \Carbon\Carbon::now()->toDateString(); // Get today's date
                    $startend = \Carbon\Carbon::parse($emp->startend)->toDateString(); // Parse the $emp->startend date to a string
                @endphp
                
                @if($startend == $today || $startend <= $today)
                    <span class="emp_stst EX">EXITED</span>
                @else
                    <span class="emp_stst">EMPLOYEED</span>
                @endif
            </td>
        <td>
            <a class="go_view" href="{{url('/user/payrolldetails', ['id' => $emp->id])}}">View more </a>
        </td>

                        </tr>

                        
                          @endforeach   
                                                                                                                                                                                                          
                        </tbody>
                      </table>
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
   
