
@extends('admin.includes.calendar') @section('content')
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
           
 



            </div>
        </div>
        <div class="nav-right col-1 pull-right right-header p-0">
            <ul class="nav-menus">

                <li>
                    <div class="mode" ><i class="fa fa-moon-o"></i></div>
                </li>

                      <li class="onhover-dropdown">
                <div class="notification-box">
                @php
    // Get the authenticated user's ID
    $userId = auth()->user()->id;

    // Filter announcements where user_id does not match the authenticated user's ID
    $unreadAnnouncementsCount = App\Models\Announcement::where(function ($query) use ($userId) {
            $query->whereNull('user_id') // Where user_id is null
                ->orWhereJsonDoesntContain('user_id', $userId); // Where user_id does not contain the authenticated user's ID
        })
        ->count();
@endphp


<span class="counter_list">{{ $unreadAnnouncementsCount }}</span>
                <i data-feather="bell"></i></div>                     
                <ul class="notification-dropdown onhover-show-div">
               <li>
               @include('admin.notification.notification')
          </li>

                </ul>
             



                <!-- <li class="profile-nav onhover-dropdown">
                    <div class="account-user"><i data-feather="user"></i></div>
                    <ul class="profile-dropdown onhover-show-div">
                        
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf 
                                <button type="submit" class="logbtn"><i data-feather="log-out"></i><span>Logout</span></button>
                            </form>
                        </li>
                       
                    </ul>
                </li> -->
            </ul>
        </div>
        <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">
                <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
                <div class="ProfileCard-details">
                    <div class="ProfileCard-realName">Vaibhav</div>
                </div>
            </div>
        </script>
        <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
    </div>
</div>

      <!-- Page Header Ends-->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        @include('admin/includes.sidebar')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <!-- <h3>Calendar For Satyam Parekh</h3> -->
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Calender</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-6">
                <label for="clientSelect">Select Client:</label>
                    <select class="form-control" id="clientSelect" name="client_id">
                      <option value="" disabled Selected>Select Client</option>
                      @foreach($clients  as $client)
                      <option value="{{ $client->id }}" {{ $loop->first ? 'selected' : '' }}>{{ $client->name }}</option>
                      @endforeach
                    </select>
             </div>
             <div class="col-lg-6">
             <label for="month-select">Select a Month:</label>
              <select class="form-control" id="month-select"></select>                           
              </div>
            </div>
          </div>
          <br>
          <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="btn-group mb-3">
                    
                    <button class="btn btn-primary" id="export-csv">Export CSV</button>
                </div>
            </div>
        </div>
    </div>
    <br>
          <div class="container-fluid calendar-basic">
            <div class="card">
              <div class="card-body">
                <div class="row" id="wrap">
                  
                  <div class="col-xxl-12 box-col-70">
                    <div class="calendar-default" id="calendar-container">
                      <div id="calendar">
                      
                      </div>

                          <div class="modal fade" id="event-details-modal" tabindex="-1" role="dialog" aria-labelledby="event-details-modal-label" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                          <div class="modal-content">
                          <div class="modal-header">
                          <h5 class="modal-title" id="event-details-modal-label">Event Details</h5>
                          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button> -->
                          </div>
                          <div class="modal-body">
                          <!-- Event details will be displayed here -->
                          </div>
                          <div class="modal-footer">
                          <button type="button" class="btn btn-secondary reload" data-dismiss="modal">Close</button>
                          </div>
                          </div>
                          </div>
                          </div>

                          </div>

                                                      <script>
                                                      // Wait for the document to be fully loaded
                                                      document.addEventListener('DOMContentLoaded', function () {
                                                      // Find the "Close" button with the "reload" class
                                                      var reloadButton = document.querySelector('.modal-footer .reload');

                                                      // Add a click event listener to the button
                                                      reloadButton.addEventListener('click', function () {
                                                      // Reload the page
                                                      location.reload();
                                                      });
                                                      });
                                                      </script>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        @include('user/includes.footer')
      </div>
    </div>
    @endsection