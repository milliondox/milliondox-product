@extends('admin.includes.dashboard') @section('content')
<!-- tap on top starts-->
<div class="tap-top">
  <i data-feather="chevrons-up"></i>
</div>
<!-- tap on tap ends-->
<!-- Loader starts-->
<div class="loader-wrapper">
  <div class="dot"></div>
  <div class="dot"></div>
  <div class="dot"></div>
  <div class="dot"></div>
  <div class="dot"></div>
</div>
<!-- Loader ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
  <!-- Page Header Start-->
  <div class="page-header">
    <div class="header-wrapper row m-0">
      <div class="header-logo-wrapper col-auto p-0">
        <div class="toggle-sidebar">
          <i class="status_toggle middle sidebar-toggle" data-feather="grid"></i>
        </div>
        <div class="logo-header-main">
          <a href="#">Milliondox</a>
        </div>
      </div>
      <div class="left-header col horizontal-wrapper ps-0">
        <div class="left-menu-header"></div>
      </div>
      <div class="nav-right col-1 pull-right right-header p-0">
        <ul class="nav-menus">
          <li>
            <div class="mode">
              <i class="fa fa-moon-o"></i>
            </div>
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
              <i data-feather="bell"></i>
            </div>

            <ul class="notification-dropdown onhover-show-div">
               <li>
               @include('admin.notification.notification')
          </li>
</ul>
          <!-- <li class="profile-nav onhover-dropdown"><div class="account-user"><i data-feather="user"></i></div><ul class="profile-dropdown onhover-show-div"><li><form action="{{ route('logout') }}" method="POST">
                                @csrf 
                                <button type="submit" class="logbtn"><i data-feather="log-out"></i><span>Logout</span></button></form></li></ul></li> -->
        </ul>
      </div>
      <script class="result-template" type="text/x-handlebars-template"> <div class="ProfileCard u-cf">
									<div class="ProfileCard-avatar">
										<svg
											xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0">
											<path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
											<polygon points="12 15 17 21 7 21 12 15"></polygon>
										</svg>
									</div>
									<div class="ProfileCard-details">
										<div class="ProfileCard-realName">Vaibhav</div>
									</div>
								</div>
							</script>
      <script class="empty-template" type="text/x-handlebars-template"> <div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div>
							</script>
    </div>
  </div>
  <!-- Page Header Ends-->
  <!-- Page Body Start-->
  <div class="page-body-wrapper">
    <!-- Page Sidebar Start--> @include('admin.includes.sidebar')
    <!-- Page Sidebar Ends-->
    <div class="page-body">
      <div class="container-fluid">
        <div class="page-title">
          <div class="row">
            <div class="col-sm-6">
            <h3>
                  <span id="greeting" class=""></span>, {{ $user->name }}! 👋
              </h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">
                    <i data-feather="home"></i>
                  </a>
                </li>
                <li class="breadcrumb-item">User</li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- Container-fluid starts-->
      <div class="container-fluid basic_table dashboard">
        <div class="row">
          {{-- Documents --}}
          <div class="col-md-7 col-sm-12">
            <div class="card" style="max-height: 72.5vh; overflow-y: auto;">
              <div class="card-body">
                <h5 style="font-weight:700;font-size:16px;">Employees</h5>
                <br> @foreach($employees as $emp) <div class="alert bg-light-info text-dark" style="font-weight:600">
                  <span>{{$emp->name}}</span>
                  <span class="pull-right">
                    <span style="font-size:12px;"></span>
                    <li class="d-inline-block">
                      <img class="img-30 rounded-circle" src="{{ asset('/' . $emp->profile_picture) }}" alt="" data-original-title="" title="">
                    </li>
                  </span>
                </div> @endforeach
              </div>
            </div>
          </div>
          {{-- Clients --}}
          <div class="col-md-5 col-sm-12">
            <div class="card" style="max-height: 72.5vh; overflow-y: auto;">
              <div class="card-body">
                <h5 style="font-weight: 700; font-size: 16px;">Clients</h5>
                <br> @foreach($clients as $cli) <div class="alert bg-light-info text-dark" style="font-weight: 600;">
                  <span>{{$cli->name}}</span>
                  <span class="pull-right">
                    <span style="font-size: 12px;"></span>
                    <li class="d-inline-block">
                      <img class="img-30 rounded-circle" src="{{ asset('/' . $cli->profile_picture) }}" alt="" data-original-title="" title="">
                    </li>
                  </span>
                </div> @endforeach
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="row">
													<div class="col-lg-6">
														<h3>Upload Policy Manuals</h3>
														<form action="{{ route('upload-policy') }}" method="POST" enctype="multipart/form-data"> @csrf <input type="file" name="policy[]" multiple>
        <br>
        <span>Note:- file|mimes:pdf,doc,docx|max size:2048kb</span>
        <br>
        <button class="btn btn-primary btn-sm" style="border-radius:5px;" type="submit">Upload</button>
        <br>
        </form> @if (session('success')) <div class="alert alert-success">
          {{ session('success') }}
        </div> @endif @if (session('error')) <div class="alert alert-danger">
          {{ session('error') }}
        </div> @endif
      </div>
      <div class="col-lg-6">
        <div class="table-responsive theme-scrollbar">
          <table class="display" id="basic-1">
            <thead>
              <tr>
                <th>File Name</th>
                <th>Download</th>
              </tr>
            </thead>
            <tbody> @foreach($policy as $pol) <tr>
                <td>{{ $pol->filename }}</td>
                <td>
                  <a href="{{ asset($pol->file_path) }}" download>
                    <i class="fas fa-download"></i>
                  </a>
                </td>
              </tr> @endforeach </tbody>
          </table>
        </div>
      </div>
    </div>--}}
  </div>
  <!-- Container-fluid Ends-->
</div>
<!-- footer start--> @include('admin.includes.footer') </div>
</div> @endsection