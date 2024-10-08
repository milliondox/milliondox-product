@extends('employee.includes.timesheet') @section('content')
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
                <div class="col-sm-6">
                  <h3>Timesheets</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Employee</li>
                    <li class="breadcrumb-item active">Timesheets</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid basic_table">
            <div class="row">

            <div class="col-sm-12">
<div class="card">
<div class="card-header pb-0">
<h4 class="pull-left">All Timesheets</h4>
<button class="btn btn-primary pull-right btn-sm" style="border-radius:5px;" data-bs-toggle="modal" data-bs-target="#TimesheetModal">
<i class="fa fa-plus"></i> Timesheet</button>
   <div class="modal fade" id="TimesheetModal" tabindex="-1" role="dialog" aria-labelledby="TimesheetModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title" style="font-weight:700">Timesheet</h5>
     <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
<span aria-hidden="true">
<svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"/>
<rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"/>
</svg>
</span>
</button>
     </div>
     
     <div class="modal-body">
        <h3>Add Timesheet</h3>
	                    <h4 style="font-weight:700; margin-bottom:15px;">{{$user->name}}</h4>
                   <form class="theme-form" method="POST" action="{{ route('updatetimesheet') }}" enctype="multipart/form-data">
                    @csrf
                    <label for="clientSelect">Select Client:</label>
                    <select class="form-control" id="clientSelect" name="client_id" >
                      <option value="" disabled Selected>Select Client</option>
                      @foreach($clients as $client)
                      <option value="{{ $client->client_id }}">{{ $client->name }}</option>
                      @endforeach
                    

                    </select><br>
                    <label for="clientSelect">Non Client:</label>
                   <input type="text"  name="non_client" class="form-control" ><br>
                    <label for="clientSelect">Time Spent (In Min.):</label>
                   <input type="number" min="0" max="1440" name="spenttime" class="form-control" required><br>
                   <label for="clientSelect">Date of Work:</label>
                   <input type="text"  name="date_of_work" id="date_of_work" class="form-control" required><br>
                 <script>
    // Get the current date
    const currentDate = new Date();

    // Calculate the start of the current week (Monday)
    const currentWeekStart = new Date(currentDate);
    const dayOfWeek = currentDate.getDay();
    currentWeekStart.setDate(currentDate.getDate() - (dayOfWeek - 1 + 7) % 7);

    // Calculate the end of the current week (Sunday)
    const currentWeekEnd = new Date(currentWeekStart);
    currentWeekEnd.setDate(currentWeekStart.getDate() + 6);

    // Initialize Flatpickr for Tenure Start Date
    flatpickr("#date_of_work", {
        dateFormat: "Y-m-d", // Set the date format to match the server-side format
        // minDate: currentWeekStart,
        maxDate: currentWeekEnd,
        locale: {
            firstDayOfWeek: 1 // Set Monday as the first day of the week
        }
    });

    
</script>


                    <label for="clientSelect">Work Description (Max 25 words):</label>
                   <textarea type="textarea" name="timesheettxt"  id="wordLimitInput" class="form-control"  required></textarea><br>
                   
                        <p id="wordCount">0 words</p>
                   <script>
  const input = document.getElementById("wordLimitInput");
  const wordCount = document.getElementById("wordCount");
  const wordLimit = 25;

  input.addEventListener("input", () => {
    const words = input.value.split(/\s+/).filter(word => word !== "").length;
    wordCount.textContent = `${words} words`;

    if (words > wordLimit) {
      input.value = input.value
        .split(/\s+/)
        .slice(0, wordLimit)
        .join(" ");
      wordCount.textContent = `${wordLimit} words`;
    }
  });
</script>
                   <input type="hidden" name="employee_id" value="{{$user->id}}">
                   <button type="submit" class="btn btn-primary btn-sm pull-left" style="border-radius:5px;"> Add</button>
                    </form>
                   </div>	                                    
    </div>
   </div>
   </div>
   </div>
   <div class="card-body">
                     <div class="timesheetdata">
                       <div id="loader">
                        <div class="inner_load">
                        <img src="../assets/images/loading.gif" class="loading">
                       </div>                                        
                    </div>
                       <div class="table-responsive theme-scrollbar time_nt client_nt all-issue">           
                       <table class="display aaa" id="basic1111122">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Client Name </th>
                                                            <th>Time Spent (In Min.) </th>
                                                            <th>Work description </th>
                                                            <th>Date of Work</th>
                                                            <th>Created At</th>
                                                            <th>Action</th>
                                                            
                                                            

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($results  as $index => $cli)

                                                        <tr>
                                                            
                                                      
                                                       
                                                         <td>{{ $loop->iteration }}</td>
                                                        <td>{{$cli->client_name}}</td>
                                                        <td>{{$cli->spenttime}}</td>
                                                        <td>{{$cli->timesheet_txt }}</td>
                                                        <td> {{ $cli->date_of_work }}</td>
                                                        <td>{{$cli->created_date   }}</td>
                                                        <td> <ul class="action">
                                                    <li class="edit"> <a href="#"><i class="icon-pencil-alt text-primary " onclick="openModal({{$cli->id}})"></i></a></li>
                                                  <li class="delete" id="delete-{{ $cli->id }}">
    <form method="POST" action="{{ route('time.delete', ['id' => $cli->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?')">
            <i class="icon-trash"></i>
        </button>
    </form>
</li>


                                                   
                                            </ul></td>    
                                                        
                                                      
                                                        
                                                        </tr>


                                                        @endforeach



                                                      

                                                        </tbody>
                                                    </table>
</div>
                                                    <script>
  // Display loader initially
  document.getElementById('loader').style.display = 'block';

  // Simulate an asynchronous operation (e.g., fetching data) with a delay of 3 seconds
  setTimeout(function () {
    // Hide the loader
    document.getElementById('loader').style.display = 'none';

    // Display the table
    document.getElementById('basic1111122').style.display = 'table';
  }, 3000);
</script>
                                  </div>
   </div>
   </div>
   </div>

                        
						


                                  
                  </div>


                     

            </div>

           </div>
 @foreach($results  as $index => $cli)

<div class="modal fade" id="statustimeModal{{$cli->id}}" tabindex="-1" aria-labelledby="statustimeModal{{$cli->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statustimeModal{{$cli->id}}Label">Update </h5>
                <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
<span aria-hidden="true">
<svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"/>
<rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"/>
</svg>
</span>
</button>
            </div>
            <div class="modal-body">
                <h3>Edit Timesheet</h3>
                <!-- Display user data here -->
               <form class="theme-form" method="POST" action="{{ route('empupdatetimesheet') }}" enctype="multipart/form-data">
                                @csrf
                               <label for="clientSelect">Client Name:</label>
                               <input type="text" class="form-control" name="client_id" value="{{$cli->client_name}}"  id="client_id" readonly><br>
                               <label for="clientSelect">Time Spent (In Min.):</label>
                               <input type="number" min="0" max="1440" name="spenttime" class="form-control" value="{{$cli->spenttime}}" required><br>
                               <label for="clientSelect">Date of Work:</label>
                              <input type="date" name="date_of_work" id="date_of_work{{$cli->id}}" class="form-control" required value="{{$cli->date_of_work}}"><br>
                               
                                             <label for="clientSelect">Work description (Max 25 Words):</label>
                               <textarea type="textarea" name="timesheettxt" id="wordLimitInputs" class="form-control"  required> {{$cli->timesheet_txt}}</textarea><br>
                                <!--<p id="wordCounts">0 words</p>-->
                 <script>
  const textarea = document.getElementById("wordLimitInputs");
  const wordCount = document.getElementById("wordCounts");
  const wordLimit = 25;

  textarea.addEventListener("input", () => {
    const words = textarea.value.split(/\s+/).filter(word => word !== "").length;
    wordCount.textContent = `${words} words`;

    if (words > wordLimit) {
      // Split the text content of the textarea and slice it to the word limit.
      textarea.textContent = textarea.textContent
        .split(/\s+/)
        .slice(0, wordLimit)
        .join(" ");
      wordCount.textContent = `${wordLimit} words`;
    }
  });
</script>
                               <input type="hidden" class="form-control mt-2" name="time_id"  id="time_id" value="{{$cli->id}}">
                               
                                    
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm"  style="border-radius:5px;" type="submit">Save</button>
            </div>
             </form>
        </div>
    </div>
</div>
@endforeach

<script>
// Function to initialize the date input for the current week
function initializeDateInput(element) {
    const currentDate = new Date();
    const dayOfWeek = currentDate.getDay(); // 0 for Sunday, 1 for Monday, etc.
    
    // Calculate the start of the current week (Monday)
    const currentWeekStart = new Date(currentDate);
    currentWeekStart.setDate(currentDate.getDate() - (dayOfWeek - 1 + 7) % 7);
    
    // Calculate the end of the current week (Sunday)
    const currentWeekEnd = new Date(currentWeekStart);
    currentWeekEnd.setDate(currentWeekStart.getDate() + 6);
    
    // Format the start and end dates to yyyy-mm-dd
    const startDateFormatted = currentWeekStart.toISOString().slice(0, 10);
    const endDateFormatted = currentWeekEnd.toISOString().slice(0, 10);
    
    // Set the min and max attributes of the date input
    // element.min = startDateFormatted;
    element.max = endDateFormatted;
}

// Get all date input elements by class or other means
const dateInputs = document.querySelectorAll('input[type="date"]');

// Initialize each date input element
dateInputs.forEach(function(input) {
    initializeDateInput(input);
});
</script>


<script>
    // Function to open the modal when the edit button is clicked
    function openModal(employeeId) {
        $('#statustimeModal' + employeeId).modal('show');
    }
</script>
<script>
    var selectedEmployeeNames = [];

    $(document).ready(function () {
        var table = $('#basic1111122').DataTable({
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

        // Listen for the DataTables draw event to update selectedEmployeeNames
        table.on('draw.dt', function () {
            // Extract unique employee names from the filtered data
            var uniqueEmployeeNames = table
                .column(1, { search: 'applied' }) // Assuming 'Employee Name' is the first column (index 0)
                .data()
                .unique()
                .toArray();

            // Update selectedEmployeeNames
            selectedEmployeeNames = uniqueEmployeeNames;
        });
    });
</script>

            {{-- END --}}

   <!-- footer start-->
   @include('employee.includes.footer')
              </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
     
      </div>
    </div>
    @endsection
