@extends('user.includes.employee-lifecycle') @section('content')
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
           Employee Lifecycle
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
           Employee Lifecycle
          </h2>
            </div>

              <!-- Container-fluid start-->
      <div class="container-fluid  employee-lifecycle">
        <div class="row">
          <div class="col-md-12">
         
            <div class="Inc_table">
              <div class="row">
                <div class="col-sm-12 tba_history_rap">
                  <div class="filtr_tabble">
                    <div class="table_title">
                        <h2>Employee Lifecycle</h2>
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
                      <div class="sadd_filds">

                      <button class="hvr-rotate" id="addCustomDocButton" data-bs-toggle="modal" data-bs-target="#add_contract1">+ Add an Employee</button>
                      </div>

                      <!-- model start -->
<div class="modal fade drop_coman_file have_title" id="add_contract1" tabindex="-1" role="dialog" aria-labelledby="add_contract1" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" style="font-weight:700">Add an Employee</h5>
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
                                    <h3>Add an Employee</h3>


                                    <form action="{{ route('storeemployeeprofile') }}" method="POST" enctype="multipart/form-data" class="upload-form rers_pages_hide"> 
                                      @csrf
                                               
    
                                      <div class="gropu_form ivoice-upload">
                          <label for="fname">Employee Picture*</label>

                          <div class="file-area">      
                                    <input type="file" class="dragfile" id="emppic" name="file"  required>    
                          
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
                          <label for="fname">Full Name*</label>
                           <input placeholder="Full Name" type="text" id="fname" name="fname">
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Position*</label>
                           <input placeholder="Job Position" type="text" id="position" name="position">
                          </div>

                          <div class="gropu_form">
                          <label for="con_type">Division</label>
                          <select id="division" name="division">
  <option value="" disabled Selected>select</option>
    <option value="Human Resources">Human Resources</option>
    <option value="Admin">Admin</option>
    <option value="Sales">Sales</option>
    <option value="Development">Development</option>
    <option value="Security">Security</option>
    <option value="Financial accounting">Financial accounting</option>
    <option value="IT">IT</option>
    <option value="Business Development">Business Development</option>
    <option value="Marketing">Marketing</option>
    <option value="Purchasing">Purchasing</option>
    <option value="Research and development">Research and development</option>
    <option value="Finance">Finance</option>
    <option value="Accounts">Accounts</option>
    <option value="Asset management">Asset management</option>
    <option value="Communication">Communication</option>
    <option value="Human resource development">Human resource development</option>
    <option value="Quality">Quality</option>
    <option value="Technical Support">Technical Support</option>
    <option value="CTO">CTO</option>
    <option value="Customer service">Customer service</option>
    <option value="Database administration">Database administration</option>
    <option value="Design">Design</option>
    <option value="Dispatch department">Dispatch department</option>
    <option value="Helpdesk">Helpdesk</option>
    

  </select>
                          </div>



<div class="gropu_form">
                          <label for="start">Start Date</label>
<input type="date" id="start" name="startdate"   />
                          </div>

                          
                          <div class="gropu_form">
                          <label for="start">Exit Date</label>
<input type="date" id="start" name="startend"   />
                          </div>


                          <div class="root_btn">                        
                          <button class="btn btn-primary" style="border-radius:5px;" type="submit">Add</button>
</div>
                          

                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
<!-- model end -->


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
            <a class="go_view" href="{{url('/user/Employeedetails', ['id' => $emp->id])}}">View more </a>
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
   
