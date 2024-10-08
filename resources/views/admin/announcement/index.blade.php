@extends('admin.includes.announcement') @section('content')
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
              <h3>Announcement</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">
                    <i data-feather="home"></i>
                  </a>
                </li>
                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item active">Announcement</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- Container-fluid starts-->
      <div class="container-fluid basic_table">
        <div class="row">
          {{-- Another --}}
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <h5 style="font-weight:700;font-size:16px;">Make Announcement (max 100 characters)</h5>
                <br>
                <div class="alert p-2 " style="border:solid 1px lightgrey;font-weight:500">
                  <form class="theme-form" method="POST" action="{{ route('storeannouncementofclients') }}"> @csrf <textarea type="text" name="announcements_for_clients" class="form-control" placeholder="Publish Announcements for clients " maxlength="100"></textarea>
                    <input type="hidden" name="role" value="Client">
                    <span class="pull-left">
                      <button class="btn btn-primary btn-sm" style="border-radius:5px;">
                        <i class="icon-announcement"></i> Make Announcement </button>
                    </span>
                </div>
                </form>
                <div class="alert p-2 " style="border:solid 1px lightgrey;font-weight:500">
                  <form class="theme-form" method="POST" action="{{ route('storeannouncementofemployees') }}"> @csrf <textarea type="text" name="announcements_for_employee" class="form-control" placeholder="Publish Announcements for employees " maxlength="100"></textarea>
                    <input type="hidden" name="role" value="Employee">
                    <span class="pull-left">
                      <button class="btn btn-primary btn-sm" style="border-radius:5px;">
                        <i class="icon-announcement"></i> Make Announcement </button>
                    </span>
                </div>
                </form>
              </div>
            </div>
          </div>
          {{-- END --}}
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <h5 style="font-weight:700;font-size:16px;">Published Announcements </h5>
                <br>
                <h5>Clients</h5>
                <div class="table-responsive theme-scrollbar">
                  <table class="display bbb table-bordered table-striped table" id="basic111">
                    <thead>
                      <tr>
                        <th>Announcements for Clients</th>
                        <th>Created at</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody> @foreach($clientsannouncements as $client) <tr>
                        <td>{{$client->announcements_for_clients}}</td>
                        <td>{{$client->created_at}}</td>
                        <td>
                          <ul class="action">
                            <li class="delete">
                              <a href="#" class="deletess-button" data-announcement-id="{{ $client->id }}" data-toggle="modal" data-target="#deletessModal">
                                <i class="icon-trash"></i>
                              </a>
                            </li>
                          </ul>
                        </td>
                      </tr> @endforeach </tbody>
                  </table>
                  <!-- Include jQuery -->
                  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
                  <!-- Include Bootstrap JavaScript -->
                  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                  <!-- Include Bootstrap CSS (for modal styling) -->
                  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                  <script>
                    $(document).ready(function() {
                      $('#basic111').DataTable({
                        dom: 'Bfrtip',
                        buttons: [{
                          extend: 'collection',
                          text: ' < i class = "fa fa-download" > < /i> Download',
                          buttons: [{
                            extend: 'excelHtml5',
                            customize: function(xlsx) {
                              var sheet = xlsx.xl.worksheets['sheet1.xml'];
                              $('row c[r^="C"]', sheet).attr('s', '2');
                            },
                            text: ' < i class = "fa fa-download" > < /i> Download As Excel',
                          }, {
                            extend: 'csvHtml5',
                            text: ' < i class = "fa fa-download" > < /i> Download As CSV', / / Custom HTML content
                          }]
                        }]
                      });
                      $("#basic111").resizableColumns({
                        store: window.store
                      });
                    });
                  </script>
                  <script>
                    $(document).ready(function() {
                      var announcementIdToDelete;
                      // Listen for a click on a delete button with the "delete-button" class
                      $('.deletess-button').on('click', function() {
                        announcementIdToDelete = $(this).data('announcement-id');
                        $('#deleteForm').attr('action', '/announcements/' + announcementIdToDelete);
                      });
                      // Reset the announcementIdToDelete when the modal is closed
                      $('#deleteModal').on('hidden.bs.modal', function() {
                        announcementIdToDelete = null;
                      });
                    });
                  </script>
                  <!-- Delete Confirmation Modal -->
                  <div class="modal fade" id="deletessModal" tabindex="-1" role="dialog" aria-labelledby="deletessModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="deletessModalLabel">Confirm Deletion</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body"> Are you sure you want to delete this announcement? </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          <form id="deleteForm" method="POST" action=""> @csrf @method('DELETE') <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <h5>Employees</h5>
                <div class="table-responsive theme-scrollbar">
                  <table id="myTable" class="table table-bordered table-striped display ccc">
                    <thead>
                      <tr>
                        <th>Announcements for Employees</th>
                        <th>Created at</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody> @foreach($employeesannouncements as $employee) <tr>
                        <td>{{$employee->announcements_for_employee}}</td>
                        <td>{{$employee->created_at}}</td>
                        <td>
                          <ul class="action">
                            <a href="#" class=" deletessd-button" data-announcements-id="{{ $employee->id }}" data-toggle="modal" data-target="#deletessdModal">
                              <i class="icon-trash"></i>
                            </a>
                          </ul>
                        </td>
                      </tr> @endforeach </tbody>
                  </table>
                  <script>
                    $(document).ready(function() {
                      $('#myTable').DataTable({
                        dom: 'Bfrtip',
                        buttons: [{
                          extend: 'collection',
                          text: ' < i class = "fa fa-download" > < /i> Download',
                          buttons: [{
                            extend: 'excelHtml5',
                            customize: function(xlsx) {
                              var sheet = xlsx.xl.worksheets['sheet1.xml'];
                              $('row c[r^="C"]', sheet).attr('s', '2');
                            },
                            text: ' < i class = "fa fa-download" > < /i> Download As Excel',
                          }, {
                            extend: 'csvHtml5',
                            text: ' < i class = "fa fa-download" > < /i> Download As CSV', / / Custom HTML content
                          }]
                        }]
                      });
                      $("#myTable").resizableColumns({
                        store: window.store
                      });
                    });
                  </script>
                  <script>
                    $(document).ready(function() {
                      var announcementIdToDeleted;
                      // Listen for a click on a delete button with the "delete-button" class
                      $('.deletessd-button').on('click', function() {
                        announcementIdToDeleted = $(this).data('announcements-id');
                        $('#deletedForm').attr('action', '/announcementsd/' + announcementIdToDeleted);
                      });
                      // Reset the announcementIdToDelete when the modal is closed
                      $('#deletedModal').on('hidden.bs.modal', function() {
                        announcementIdToDelete = null;
                      });
                    });
                  </script>
                  <!-- Delete Confirmation Modal -->
                  <div class="modal fade" id="deletessdModal" tabindex="-1" role="dialog" aria-labelledby="deletessdModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="deletessdModalLabel">Confirm Deletion</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body"> Are you sure you want to delete this announcement? </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          <form id="deletedForm" method="POST" action=""> @csrf @method('DELETE') <button type="submit" class="btn btn-danger">Delete</button>
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
      <!-- Container-fluid Ends-->
    </div>
    <!-- footer start--> @include('admin.includes.footer')
  </div>
</div>
<script>
  @if(session('success'))
  Swal.fire({
    title: 'Success',
    text: '{{ session('
    success ') }}',
    icon: 'success',
  }).then(() => {
    window.location.href = '/admin/announcement'; // Redirect after clicking OK
  });
  @endif
</script>
<script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  });
</script>
<style>
  i.icon-trash {
    color: #f81f58 !important;
  }
</style>
<link rel="stylesheet" type="text/css" href="https://dobtco.github.io/jquery-resizable-columns/dist/jquery.resizableColumns.css">
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/store.js/1.3.14/store.min.js"></script>
<script src="https://dobtco.github.io/jquery-resizable-columns/dist/jquery.resizableColumns.js"></script>
<style>
  .bbb {
    table-layout: fixed;

    td,
    th {
      overflow: hidden;
      white-space: nowrap;
      -moz-text-overflow: ellipsis;
      -ms-text-overflow: ellipsis;
      -o-text-overflow: ellipsis;
      text-overflow: ellipsis;
    }
  }

  .ccc {
    table-layout: fixed;

    td,
    th {
      overflow: hidden;
      white-space: nowrap;
      -moz-text-overflow: ellipsis;
      -ms-text-overflow: ellipsis;
      -o-text-overflow: ellipsis;
      text-overflow: ellipsis;
    }
  }

  body {
    font-family: "Montserrat", sans-serif !important;
  }

  div.dt-button-collection {
    position: absolute;
    top: 0;
    left: 0;
    width: 190px !important;
    margin-top: 3px;
    padding: 8px 8px 4px 8px;
    border: 1px solid #ccc;
    border: 1px solid rgba(0, 0, 0, 0.4);
    background-color: white;
    overflow: hidden;
    z-index: 2002;
    border-radius: 5px;
    box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3);
    z-index: 2002;
    -webkit-column-gap: 8px;
    -moz-column-gap: 8px;
    -ms-column-gap: 8px;
    -o-column-gap: 8px;
    column-gap: 8px;
  }
</style>
<style>
  a.dt-button.buttons-collection {
    background: #0d0a0a !important;
    color: white;
    border-radius: 10px;
    font-weight: 600;
  }

  /* buttonspace css start */
  .basic_table span.pull-left {
    margin-top: 10px;
}
</style>
<!-- login js--> @endsection