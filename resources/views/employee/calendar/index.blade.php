@extends('employee.includes.calendar') @section('content')
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

    // Filter announcements where the role is 'Employee' and user_id does not match the authenticated user's ID
    $unreadAnnouncementsCount = App\Models\Announcement::where('role', 'Employee')
        ->where(function ($query) use ($userId) {
            $query->whereNull('user_id') // Where user_id is null
                ->orWhereJsonDoesntContain('user_id', $userId); // Where user_id does not contain the authenticated user's ID
        })
        ->count();
@endphp

<span class="counter_list">{{ $unreadAnnouncementsCount }}</span>
                <!-- <spans=" clascounter_list">{{ $empl_announcements->count() }}</span>       -->
                <i data-feather="bell"></i></div>
                <ul class="notification-dropdown onhover-show-div">
               <li>
               @include('employee.notification.notification')
          </li>
</ul>
              </li>



                
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
        @include('employee/includes.sidebar')
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
          <div class="container-fluid">
            <div class="row">
              <div class="col-xxl-12 col-lg-12 mb-4 ">
              <form action="{{ route('eventsstore') }}" id="event-form-content" method="POST">
                @csrf
                <label for="clientSelect">Select Client:</label>
                    <select class="form-control" id="clientSelect" name="client_id">
                      <option value="" disabled Selected>Select Client</option>
                      @foreach($clients as $client)
                      <option value="{{ $client->client_id }}" {{ $loop->first ? 'selected' : '' }}>{{ $client->name }}</option>
                      @endforeach
                    </select>
                    <input type="hidden" name="employee_id" value="{{$user->id}}">
                                                  
              </div>
              <br>
              <div class="modal" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
                <div class="event_wrap">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="eventModalLabel">Add Event</h5>
          <button type="button" class="close reload uiuyiyui"  data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"/>
<rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"/>
</svg>
</span>
          </button>
        </div>
        <div class="modal-body gvfdg">
          
        <h3>Add Event</h3>
                     <div class="form-group">
                            <label for="event-start">Event Date:</label>
                            <input type="date" class="form-control" id="event_start" name="event_start" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="event-title">Select Event Compliances:</label>
                            <select class="form-control" id="compliances" name="compliances">
                                <option value="" disabled Selected>Select Event Compliances</option>
                               
                                <option value="General Compliances">General Compliances</option>
                                <option value="Financial Compliances">Financial Compliances</option>
                                <option value="Missed Compliences">Missed Compliences</option>
                               
                              </select>
                            
                        </div>
                       
                        
                        <div class="form-group">
                            <label for="event-description">Event Description:</label>
                            <textarea class="form-control" id="event_description" name="event_description"></textarea>
                        </div>
                       
                        <button type="submit" class="btn btn-primary">Save Event</button>
                    </form>
        </div>


        <div class="modal-bodys">
          
        
                     
        </div>
      </div>
    </div>
    </div>
  </div> 
            </div>

           

            <div class="card">
              <div class="card-body">
                <div class="row" id="wrap">                  
                  <div class="col-xxl-12 box-col-70">
               <div id="calendar" class="calendar-default"></div>
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
   
<style>
    .col-lg-12.cscs {
    padding: 0 0 25px 0;
}

#eventModal {
    position: fixed;
}
#eventModal .event_wrap {
    display: flex;
    width: 100%;
    height: 100%;
    flex-wrap: wrap;
    align-items: center;
}
#eventModal .event_wrap .modal-dialog {
    width: 100%;
}
.calendar-default table .fc-daygrid-day-events {
    position: absolute !important;
    right: 0;
    cursor: pointer;}

.calendar-default table  .fc-daygrid-day-frame {
    position: relative;
    overflow: hidden;
}

.calendar-default table td.fc-daygrid-day {
    position: relative;
}
.calendar-default table .fc-daygrid-day .plus-icon {
    color: #ccc;
    position: absolute;
    font-size: 30px;
    cursor: pointer;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.modal .modal-content  .modal-bodys {
    padding-top: 0;
    color: #9d9a9a;
    text-align: center;
    padding-bottom: 20px;
}
#eventModal .modal-content {
    max-height: 500px;
    overflow: auto;
}

#eventModal .modal-content::-webkit-scrollbar {
  width: 1px;
}

#eventModal .modal-content::-webkit-scrollbar-track {
  background: #f1f1f1;
}

#eventModal .modal-content::-webkit-scrollbar-thumb {
  background: #888;
}

.modal .modal-content .modal-bodys h2 {
    font-weight: 600;
    text-transform: uppercase;
    text-align: center;
    font-size: 20px;
    margin-bottom: 12px;
    margin-top: 20px;
    color: #000;
}
@media(max-width:1024px)
{
  .calendar-default table .fc-daygrid-day .plus-icon {
    font-size: 12px;
}
.calendar-default table .fc-daygrid-event {
  width: 5px;
  height: 5px;
  overflow: hidden;
  padding: 0;
  border-radius: 50%;
}

.calendar-default table .fc-daygrid-event .fc-event-title.fc-sticky {
    font-size: 0;
}
}
.fc .fc-daygrid-event-harness {
    display: none;
}

.fc .fc-daygrid-event-harness:first-child {
    display: block;
}
</style>
    <!-- login js-->

    @endsection