@extends('user.includes.rep-calander') @section('content')
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
           Calender
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
           Calender
          </h2>
            </div>
             <!-- Container-fluid start-->
             <div class="container-fluid calnder_event_nt rep-calander">
          <div class="row reverse">   
<div class="col-sm-9">
    <div class="event-sidebar">
        <!--  -->

        <div id="calendar-container">
    <button id="prevYear"><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.50312 9.5L7.20312 8.75L3.50312 5L7.20313 1.25L6.50312 0.5L2.00312 5L6.50312 9.5Z" fill="#BFCAEC"/>
</svg></button>
    <div id="monthYear"></div>
    <button id="nextYear"><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M3.49688 0.5L2.79688 1.25L6.49688 5L2.79688 8.75L3.49688 9.5L7.99688 5L3.49688 0.5Z" fill="#BFCAEC"/>
</svg></button>
</div>

<div id="calendar"></div>

    <!--  -->
    </div>
</div>

<div class="col-sm-3">
<button id="show_form" data-bs-toggle="modal" data-bs-target="#addtask">
      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M12.6667 12.6667V5.33341H3.33333V12.6667H12.6667ZM10.6667 0.666748H12V2.00008H12.6667C13.0203 2.00008 13.3594 2.14056 13.6095 2.39061C13.8595 2.64065 14 2.97979 14 3.33341V12.6667C14 13.4067 13.4067 14.0001 12.6667 14.0001H3.33333C2.97971 14.0001 2.64057 13.8596 2.39052 13.6096C2.14048 13.3595 2 13.0204 2 12.6667V3.33341C2 2.59341 2.59333 2.00008 3.33333 2.00008H4V0.666748H5.33333V2.00008H10.6667V0.666748ZM7.33333 6.33341H8.66667V8.33341H10.6667V9.66675H8.66667V11.6667H7.33333V9.66675H5.33333V8.33341H7.33333V6.33341Z" fill="white"></path>
</svg>  
Add a Task</button>

<!--  -->
							  
                            <div class="modal fade drop_coman_file have_title director_cosutom_des " id="addtask" tabindex="-1" role="dialog" aria-labelledby="addtask" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" style="font-weight:700">Add a Task</h5>
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
                                    <h3>Add a Task</h3>

                                    <form id="eventFormddd" action="{{ route('admin_event_calendar') }}" method="POST" class="upload-form"> 
                                      @csrf
    
    <div class="gropu_form">
    <label for="taskName">Task Name</label>
    <input type="text" id="taskName" name="taskName" required>
</div>
<div class="gropu_form">
    <label for="taskdes">Task Description</label>
    <input type="text" id="taskdes" name="taskdes" required>
</div>
<div class="assign_status">
<div class="gropu_form">
    <label for="taskby">Assigned by</label>
    <input type="text" id="taskby" name="taskby" required>
</div>
<div class="gropu_form">
    <label for="taskto">Assigned to</label>
    <input type="text" id="taskto" name="taskto" required>
</div>
</div>
<div class="gropu_form group_radio">
<label for="Repeat">Repeat</label>
<div class="for_group radio">
    <input type="radio" id="repeatonce" name="repeat" value="once">
    <label for="repeatonce">Once</label><br>    
</div>
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
<hr class="cusrom_hr">

<div class="gropu_form">
    <label for="eventName">Task Name</label>
    <input type="text" id="eventName" name="eventName" required>
</div>
<div class="gropu_form">
    <label for="eventDate">Task Description</label>
    <input type="date" id="eventDate" name="eventDate" required>
</div>

    <div class="for_group bttn">
      <button type="submit" class="hvr-rotate"> 
      Add</button>    
    </div>
</form>

                                  </div>
                                </div>
                              </div>
                            </div>

<!--  -->

    <div class="form_evennt">

    <div class="ve_head">
        <h3>Tasks</h3>
        <span></span>
</div>

<div class="acc_tabs">
    <div class="acc_wrap">
<button class="accordion">
<svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9.6 0.2C9.4269 0.0701779 9.21637 0 9 0C8.78363 0 8.5731 0.0701779 8.4 0.2C7.98308 0.518804 7.59886 0.878235 7.253 1.273C6.73 1.862 6 2.855 6 4C6 4.79565 6.31607 5.55871 6.87868 6.12132C7.44129 6.68393 8.20435 7 9 7H3C2.20435 7 1.44129 7.31607 0.87868 7.87868C0.316071 8.44129 0 9.20435 0 10V12C0 13.236 1.411 13.942 2.4 13.2L3.067 12.7C3.2401 12.5702 3.45063 12.5 3.667 12.5C3.88337 12.5 4.0939 12.5702 4.267 12.7L4.533 12.9C5.05229 13.2895 5.68389 13.5 6.333 13.5C6.98211 13.5 7.61371 13.2895 8.133 12.9L8.4 12.7C8.5731 12.5702 8.78363 12.5 9 12.5C9.21637 12.5 9.4269 12.5702 9.6 12.7L9.867 12.9C10.3863 13.2895 11.0179 13.5 11.667 13.5C12.3161 13.5 12.9477 13.2895 13.467 12.9L13.733 12.7C13.9061 12.5702 14.1166 12.5 14.333 12.5C14.5494 12.5 14.7599 12.5702 14.933 12.7L15.6 13.2C16.589 13.942 18 13.236 18 12V10C18 9.20435 17.6839 8.44129 17.1213 7.87868C16.5587 7.31607 15.7956 7 15 7H9C9.79565 7 10.5587 6.68393 11.1213 6.12132C11.6839 5.55871 12 4.79565 12 4C12 2.855 11.27 1.862 10.747 1.273C10.401 0.883 10.017 0.513 9.6 0.2ZM1 15.415V18C1 18.5304 1.21071 19.0391 1.58579 19.4142C1.96086 19.7893 2.46957 20 3 20H15C15.5304 20 16.0391 19.7893 16.4142 19.4142C16.7893 19.0391 17 18.5304 17 18V15.415C16.7673 15.4993 16.5172 15.5238 16.2725 15.4863C16.0279 15.4487 15.7967 15.3503 15.6 15.2L14.933 14.7C14.7599 14.5702 14.5494 14.5 14.333 14.5C14.1166 14.5 13.9061 14.5702 13.733 14.7L13.467 14.9C12.9477 15.2895 12.3161 15.5 11.667 15.5C11.0179 15.5 10.3863 15.2895 9.867 14.9L9.6 14.7C9.4269 14.5702 9.21637 14.5 9 14.5C8.78363 14.5 8.5731 14.5702 8.4 14.7L8.133 14.9C7.61371 15.2895 6.98211 15.5 6.333 15.5C5.68389 15.5 5.05229 15.2895 4.533 14.9L4.267 14.7C4.0939 14.5702 3.88337 14.5 3.667 14.5C3.45063 14.5 3.2401 14.5702 3.067 14.7L2.4 15.2C2.20334 15.3503 1.97208 15.4487 1.72745 15.4863C1.48283 15.5238 1.23268 15.4993 1 15.415Z" fill="#FF005C"/>
</svg>
Karan’s Birthday<div class="droop">

</div></button>

</div>

<div class="acc_wrap">
<button class="accordion">
<svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9.6 0.2C9.4269 0.0701779 9.21637 0 9 0C8.78363 0 8.5731 0.0701779 8.4 0.2C7.98308 0.518804 7.59886 0.878235 7.253 1.273C6.73 1.862 6 2.855 6 4C6 4.79565 6.31607 5.55871 6.87868 6.12132C7.44129 6.68393 8.20435 7 9 7H3C2.20435 7 1.44129 7.31607 0.87868 7.87868C0.316071 8.44129 0 9.20435 0 10V12C0 13.236 1.411 13.942 2.4 13.2L3.067 12.7C3.2401 12.5702 3.45063 12.5 3.667 12.5C3.88337 12.5 4.0939 12.5702 4.267 12.7L4.533 12.9C5.05229 13.2895 5.68389 13.5 6.333 13.5C6.98211 13.5 7.61371 13.2895 8.133 12.9L8.4 12.7C8.5731 12.5702 8.78363 12.5 9 12.5C9.21637 12.5 9.4269 12.5702 9.6 12.7L9.867 12.9C10.3863 13.2895 11.0179 13.5 11.667 13.5C12.3161 13.5 12.9477 13.2895 13.467 12.9L13.733 12.7C13.9061 12.5702 14.1166 12.5 14.333 12.5C14.5494 12.5 14.7599 12.5702 14.933 12.7L15.6 13.2C16.589 13.942 18 13.236 18 12V10C18 9.20435 17.6839 8.44129 17.1213 7.87868C16.5587 7.31607 15.7956 7 15 7H9C9.79565 7 10.5587 6.68393 11.1213 6.12132C11.6839 5.55871 12 4.79565 12 4C12 2.855 11.27 1.862 10.747 1.273C10.401 0.883 10.017 0.513 9.6 0.2ZM1 15.415V18C1 18.5304 1.21071 19.0391 1.58579 19.4142C1.96086 19.7893 2.46957 20 3 20H15C15.5304 20 16.0391 19.7893 16.4142 19.4142C16.7893 19.0391 17 18.5304 17 18V15.415C16.7673 15.4993 16.5172 15.5238 16.2725 15.4863C16.0279 15.4487 15.7967 15.3503 15.6 15.2L14.933 14.7C14.7599 14.5702 14.5494 14.5 14.333 14.5C14.1166 14.5 13.9061 14.5702 13.733 14.7L13.467 14.9C12.9477 15.2895 12.3161 15.5 11.667 15.5C11.0179 15.5 10.3863 15.2895 9.867 14.9L9.6 14.7C9.4269 14.5702 9.21637 14.5 9 14.5C8.78363 14.5 8.5731 14.5702 8.4 14.7L8.133 14.9C7.61371 15.2895 6.98211 15.5 6.333 15.5C5.68389 15.5 5.05229 15.2895 4.533 14.9L4.267 14.7C4.0939 14.5702 3.88337 14.5 3.667 14.5C3.45063 14.5 3.2401 14.5702 3.067 14.7L2.4 15.2C2.20334 15.3503 1.97208 15.4487 1.72745 15.4863C1.48283 15.5238 1.23268 15.4993 1 15.415Z" fill="#FF005C"/>
</svg>
1 year on Twitter & Youtube
<div class="droop">
</div></button>

</div>

<div class="acc_wrap">
<button class="accordion">
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M21 19V20H3V19L5 17V11C5 7.9 7.03 5.17 10 4.29V4C10 3.46957 10.2107 2.96086 10.5858 2.58579C10.9609 2.21071 11.4696 2 12 2C12.5304 2 13.0391 2.21071 13.4142 2.58579C13.7893 2.96086 14 3.46957 14 4V4.29C16.97 5.17 19 7.9 19 11V17L21 19ZM14 21C14 21.5304 13.7893 22.0391 13.4142 22.4142C13.0391 22.7893 12.5304 23 12 23C11.4696 23 10.9609 22.7893 10.5858 22.4142C10.2107 22.0391 10 21.5304 10 21" fill="#869FF8"/>
</svg>
Assign tasks to the team<div class="droop">
</div></button>

</div>

<div class="acc_wrap">
<button class="accordion">
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M21 19V20H3V19L5 17V11C5 7.9 7.03 5.17 10 4.29V4C10 3.46957 10.2107 2.96086 10.5858 2.58579C10.9609 2.21071 11.4696 2 12 2C12.5304 2 13.0391 2.21071 13.4142 2.58579C13.7893 2.96086 14 3.46957 14 4V4.29C16.97 5.17 19 7.9 19 11V17L21 19ZM14 21C14 21.5304 13.7893 22.0391 13.4142 22.4142C13.0391 22.7893 12.5304 23 12 23C11.4696 23 10.9609 22.7893 10.5858 22.4142C10.2107 22.0391 10 21.5304 10 21" fill="#869FF8"/>
</svg>
GST Filing Deadline<div class="droop">
</div></button>

</div>

</div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


</div>
</div>
</div>


</div>



<!-- Container-fluid start-->

        </div>
      </div>
    </div>

    @endsection
   
