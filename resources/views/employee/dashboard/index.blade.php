@extends('employee.includes.dashboard') @section('content')
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
                <i data-feather="bell"></i></div>
                <ul class="notification-dropdown onhover-show-div">
               <li>
               @include('employee.notification.notification')
          </li>
</ul>
              </li>
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
        @include('employee.includes.sidebar')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
              <!-- <div class="col-sm-12">
                    <div class="alert alert-danger">You have missed and important financial compliance. Click here to Know more  <span style="float:right">&times;</span></div>
              </div> -->
                <div class="col-sm-6">
                <h3>
                  <span id="greeting" class=""></span>, {{ $user->name }}! 👋
              </h3>
                  @php
        use Carbon\Carbon;
        $currentDate = Carbon::now()->format('Y-m-d');
    @endphp

    @foreach ($results as $result)
        @if ($result->date == $currentDate && ($result->timespent < 480 || is_null($result->timespent)))
        <!--<div class="alertdata">-->
        <!--    <div class="alert alert-danger">-->
        <!--        Reminder for Filing Timesheet for your Client: {{ $result->client_name }}-->
        <!--    </div>-->
        <!--    </div>-->
          <script>
        var alertData = @json($results);
        
        // Wait for the document to be ready
        $(document).ready(function () {
            alertData.forEach(function (result) {
                if (result.date === '{{$currentDate}}' && (result.timespent < 480 || result.timespent === null)) {
                    // Show a SweetAlert2 popup
                    Swal.fire({
                        title: 'Reminder',
                        text: `Reminder for Filing Timesheet for your Client: ${result.client_name}`,
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    </script>
        @endif
    @endforeach
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid basic_table main_nt_wrapp">
            <div class="row">
                {{-- Documents --}}
               <div class="col-sm-6">
                <div class="card">        
                <div class="card-header">
                              <h5 class="modal-title">Timesheet Reminders</h5>
                            </div>

                <div class="card-body">
                <div class="alert_wrap">
                  <div class="danger_image hvr-wobble-bottom">
                    
                            <img src="../assets/images/alert.png">
      </div>
                            <p class="text-danger text-center">Please make sure to fill up the timesheets for your clients within the next three days or before friday.</p> 
                            <div class="btn_time">
                            <a href="{{url('/employee/timesheet')}}"><button class="btn btn-primary btn-block" type="button">View Timesheets</button></a>
                </div>
                </div>
                 </div>
                 </div>
              </div>

<div class="col-sm-6">
<div class="card"> 
<div class="card-header">
   <h5 class="modal-title">Download Policy Manuals</h5>
  </div>
  <div class="card-body">
<div class="table-responsive theme-scrollbar">
<table class="display asd" id="basic-1">
<thead>
  <tr>
      <th>File Name</th>
      <th>Download</th>
      
  </tr>
</thead>
<tbody>
  @foreach($policy as $pol)
    <tr>
        <td>{{ $pol->file_name }}</td>
        <td>
        <a href="{{ route('download-policy-file', ['id' => $pol->id, 'fileName' => urlencode($pol->file_name)]) }}">
    <i class="icon-download"></i>
</a>
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

          <!-- founder or team section start -->

          <div class="container  main_founder main_ft_wrap">
            <div class="row">
            <div class="col-md-6 col-sm-6">
<div class="col_text">
  <h2>Our Team</h2>
  <p>What started as a journey in 1972 has reached a milestone where we look back and can proudly offer to stand firmly
                            for our clients. Being a full service chartered accountancy firm with sound principles and values we felt the need
                             to re-born in this new era to be able to work closest to our clients and businesses of this century and hence
                              decided to segregate the advisory & consulting arm to work with the most amazing CXO’s and teams in the name of
                               Plutus Consulting. This would give us an opportunity to innovate and digitise our services to meet the client
                                needs faster and better than earlier and create more value for them.</p>
      </div>
      </div>

      <div class="col-md-6 col-sm-6">
<div class="col_iamge">
<img src="../assets/images/founder.png" class="mt-4">
      </div>
      </div>

      </div>
      </div>

      <div class="container  main_team main_ft_wrap">
            <div class="row">
            <div class="col-md-6 col-sm-6">
<div class="col_text">
  <h2>Our Team</h2>
  <p>With over 55 years of man experience at leadership level our team comprises CA, DISA, CS, LLB etc. Each division is being led by competent professionals with average experience of more than 12 years each. A strong network of experts in all areas enable us to cater to different needs of the clients at one place. With deep rooted professional ethics and focus on quality our clients have good things to say about us.
Expertise and control over our domain of services makes us stand apart from others.</p>
      </div>
      </div>

      <div class="col-md-6 col-sm-6">
<div class="col_iamge">
<img src="../assets/images/founder-team.png" class="mt-4">
      </div>
      </div>

      </div>
      </div>

          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        @include('admin.includes.footer')
      </div>
    </div>
 
    
    <style>
        .alertdata {
    padding: 20px 0 0 0;
}
.page-wrapper .page-body-wrapper .page-title {
     padding-bottom: 0px !important; 
}
    .asd{
  table-layout: fixed;
  td, th{
    overflow: hidden;
    white-space: nowrap;
    -moz-text-overflow: ellipsis;        
       -ms-text-overflow: ellipsis;
        -o-text-overflow: ellipsis;
           text-overflow: ellipsis;
  }
}
</style>
@endsection
