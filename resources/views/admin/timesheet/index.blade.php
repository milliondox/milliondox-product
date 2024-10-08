@extends('admin.includes.timesheet') @section('content')
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
                    <li class="breadcrumb-item">Employee</li>
                    <li class="breadcrumb-item active">Timesheet</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
          <div class="row">
    <div class="col-lg-6">
        <label for="employeeFilter">Select Employee:</label>
        <select class="form-control" id="employeeFilter">
            <option value="">All Employees</option>
            @foreach($employees as $emp)
                <option value="{{ $emp->name }}">{{ $emp->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-6">
        <label for="clientFilter">Select Client:</label>
        <select class="form-control" id="clientFilter">
            <option value="">All Clients</option>
            @foreach($clients as $cli)
                <option value="{{ $cli->name }}">{{ $cli->name }}</option>
            @endforeach
        </select>
    </div>
</div>
          </div>
        <br>
          <div class="container-fluid calendar-basic">
            <div class="card">
              <div class="card-body">
                <div class="row" id="wrap">
                  
                  <div class="col-xxl-12 box-col-70">
                  <div class="timesheetdata table-responsive">
                  <div id="loader">
                        <div class="inner_load">
                        <img src="../assets/images/loading.gif" class="loading">
                       </div>                                        
                    </div>
                  <table class="display" id="basic311">
    <thead>
        <tr>
            <th>Employee Name</th>
            <th>Client Name</th>
            <th>Spent Time</th>
            <th>Timesheet Text</th>
            <th>Date Of Work</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($results as $result)
            @if(isset($result->client_id) && isset($result->employee_id) && isset($result->employee_name))
                <tr data-client="{{ $result->client_id }}" data-employee="{{ $result->employee_id }}">
                    <td>{{ $result->employee_name }}</td>
                    <td>{{ $result->client_name }}</td>
                    <td>{{ $result->spenttime }}</td>
                    <td>{{ $result->timesheet_txt }}</td>
                    <td>{{ \Carbon\Carbon::parse($result->date_of_work)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($result->created_date)->format('d-m-Y') }}</td>
                </tr>
            @endif
        @endforeach
        @foreach ($results3 as $result)
           <!---->
                <tr>
                    <td>{{ $result->employee_name }}</td>
                    <td>{{ $result->client_name }}</td>
                    <td>{{ $result->non_client }}</td>
                    <td>{{ $result->spenttime }}</td>
                    <td>{{ $result->timesheet_txt }}</td>
                    <td>{{ \Carbon\Carbon::parse($result->date_of_work)->format('d-m-Y') }}</td>
                    <td>>{{ \Carbon\Carbon::parse($result->created_date)->format('d-m-Y') }}</td>
                </tr>
            
        @endforeach
        @foreach ($results2 as $result)
           <!---->
                <tr>
                    <td>{{ $result->employee_name }}</td>
                    <td>{{ $result->client_name }}</td>
                    <td>{{ $result->non_client }}</td>
                    <td>{{ $result->spenttime }}</td>
                    <td>{{ $result->timesheet_txt }}</td>
                    <td>{{ \Carbon\Carbon::parse($result->date_of_work)->format('d-m-Y') }}</td>
                    <td>>{{ \Carbon\Carbon::parse($result->created_at)->format('d-m-Y') }}</td>
                </tr>
            
        @endforeach
    </tbody>
</table>

    <script>
  // Display loader initially
  document.getElementById('loader').style.display = 'block';

  // Simulate an asynchronous operation (e.g., fetching data) with a delay of 3 seconds
  setTimeout(function () {
    // Hide the loader
    document.getElementById('loader').style.display = 'none';

    // Display the table
    document.getElementById('basic311').style.display = 'table';
  }, 3000);
</script>

<style>
    #loader {
      display: none;
    }

    #basic311 {
      display: none;
    }
  </style>
   

<script src="https://cdn.datatables.net/1.11.7/js/jquery.dataTables.min.js"></script>
<script>
 $(document).ready(function () {
    var selectedEmployeeNames = []; // Initialize an array to store selected employee names

    var table = $('#basic311').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'collection',
                text: '<i class="fa fa-download"></i> Download',
                
                buttons: [
            {
                extend: 'excelHtml5',
                customize: function (xlsx) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    $('row c[r^="C"]', sheet).attr('s', '2');
                },
                text: '<i class="fa fa-download"></i> Download As Excel',
                filename: function () {
                    // Check if there is any filter applied
                    if (table && table.search()) {
                        return selectedEmployeeNames.join('_') + '_time_sheet_file';
                    } else {
                        return 'all_employee_time_sheet_file';
                    }
                },
            },
            {
                extend: 'csvHtml5',
                text: '<i class="fa fa-download"></i> Download As CSV',
                filename: function () {
                    // Check if there is any filter applied
                    if (table && table.search()) {
                        return selectedEmployeeNames.join('_') + '_time_sheet_file';
                    } else {
                        return 'all_employee_time_sheet_file';
                    }
                },
            }
        ]
            }
        ]
        
    });
  table.on('draw.dt', function () {
        // Extract unique employee names from the filtered data
        var uniqueEmployeeNames = table
            .column(0, { search: 'applied' }) // Assuming 'Employee Name' is the first column (index 0)
            .data()
            .unique()
            .toArray();

        // Update selectedEmployeeNames
        selectedEmployeeNames = uniqueEmployeeNames;
    });
    // Event listener for employeeFilter dropdown
    $('#employeeFilter').on('change', function () {
        var selectedEmployee = $(this).val();
        table.column(0).search(selectedEmployee).draw();
if (table.column(0).search(selectedEmployee).draw()) {
                        return selectedEmployeeNames.join('_') + '_time_sheet_file';
                    } else {
                        return 'all_employee_time_sheet_file';
                    }
        // Update the selectedEmployeeNames array
        selectedEmployeeNames = selectedEmployee ? [selectedEmployee] : [];
    });

    // Event listener for clientFilter dropdown
    $('#clientFilter').on('change', function () {
        var selectedClient = $(this).val();
        table.column(1).search(selectedClient).draw();
        if (table.column(1).search(selectedClient).draw()) {
                        return selectedEmployeeNames.join('_') + '_time_sheet_file';
                    } else {
                        return 'all_employee_time_sheet_file';
                    }
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
    
<style>
    a.dt-button.buttons-csv.buttons-html5 {
    background: #000000;
    color: #333333 ;
    font-size: 12px !important;
    border-radius: 7px !important;
    font-weight: 500 !important;
    border: none;
    box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.3);
}
a.dt-button.buttons-excel.buttons-html5 {
background: #000000;
    color: #333333 ;
    font-size: 12px !important;
    border-radius: 7px !important;
    font-weight: 500 !important;
    border: none;
    box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.3);
}
</style>
<style>
   /* table{
 table-layout: fixed;
 td, th{*/
    overflow: hidden;
   white-space: nowrap;
    -moz-text-overflow: ellipsis;        
       -ms-text-overflow: ellipsis;
       -o-text-overflow: ellipsis;
        text-overflow: ellipsis
 }
} */
div.dt-button-collection {
    position: absolute;
    top: 0;
    left: 0;
    width: 190px !important;
    margin-top: 3px;
    padding: 8px 8px 4px 8px;
    border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,0.4);
    background-color: white;
    overflow: hidden;
    z-index: 2002;
    border-radius: 5px;
    box-shadow: 3px 3px 5px rgba(0,0,0,0.3);
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
</style>

@endsection