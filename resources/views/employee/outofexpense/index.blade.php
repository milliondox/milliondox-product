@extends('employee.includes.outofexpense') @section('content')

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
                  <h3>OPE</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Employee</li>
                    <li class="breadcrumb-item active">OPE</li>
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
<h4 class="pull-left">All OPE</h4>
<button class="btn btn-primary pull-right btn-sm" style="border-radius:5px;" data-bs-toggle="modal" data-bs-target="#OPEModal">
<i class="fa fa-plus"></i> Add OPE</button>
   <div class="modal fade" id="OPEModal" tabindex="-1" role="dialog" aria-labelledby="OPEModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title" style="font-weight:700">OPE</h5>
     <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
<span aria-hidden="true">
<svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"/>
<rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"/>
</svg>
</span>
</button>
     </div>
     <div class="modal-body custon_row_nt">
        <h3>Add OPE</h3>
<h4 style="font-weight:700; margin-bottom:15px;">{{$user->name}}</h4>
<div class="row">
                   <div class="col-lg-12">
                       <form class="theme-form" method="POST" action="{{ route('storeoutofexpense') }}" enctype="multipart/form-data">
                    @csrf
                    <label for="clientSelect">Select Client:</label>
                    <select class="form-control" id="clientSelect" name="client_id" >
                      <option value="" disabled Selected>Select Client</option>
                      @foreach($clients as $client)
                      <option value="{{ $client->client_id }}">{{ $client->name }}</option>
                      @endforeach
                    </select>
                    
                   </div>
                   <div class="col-lg-12">
                       <label for="clientSelect">Date of Expense:</label>
                    <input type="date"  name="date" id="date" required class="form-control">
                       
                   </div>
                   
                   </div>
               
<div class="row">
    <div class="col-lg-12">
        <label for="clientSelect">Description of expense:</label>
                   <input type="text"  name="reason" id="reason" required class="form-control">
        
    </div>
    
    <div class="col-lg-12">
        <label for="clientSelect">Amount:</label>
                   <input type="number"  name="amount" id="amount" min="0" required class="form-control">
                   <input type="hidden" name="employee_id" value="{{$user->id}}">
                  
                   <input type="hidden" name="status" value="pending">
      
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <label for="clientSelect">Category of Expense:</label>
                    <select class="form-control" id="category_of_expense" name="category_of_expense" required>
                      <option value="" disabled Selected>Select Category of Expense</option>
                     
                      <option value="Client">Client</option>
                      <option value="Non-client">Non-client</option>
                     
                    </select>
    </div>
    <div class="col-lg-12">
         <label for="clientSelect">Nature of Expense:</label>
                    <select class="form-control" id="nature_of_expense" name="nature_of_expense" required>
                      <option value="" disabled Selected>Select Nature of Expense</option>
                     
                      <option value="Local conveyance">Local conveyance</option>
                      <option value="Printing & Stationary">Printing & Stationary</option>
                      <option value="Telephone & internet">Telephone & internet</option>
                      <option value="Notary and stamping">Notary and stamping</option>
                      <option value="Statutory duties & taxes">Statutory duties & taxes</option>
                      <option value="Postage & courier">Postage & courier</option>
                      <option value="Others">Others</option>
                     
                    </select>
        
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <label for="clientSelect">Supporting documents:</label>
                    <select class="form-control" id="supporting_documents" name="supporting_documents" required>
                      <option value="" disabled Selected>Select Supporting Documents</option>
                     
                      <option value="Available">Available</option>
                      <option value="Not available">Not available</option>
                     
                    </select>
    </div>
    <div class="col-lg-12">
         <label for="clientSelect">Attach supporting documents:</label>
                     <input type="file" class="form-control mt-2" name="attach_supporting_documents" id="attach_supporting_documents" placeholder="Please Attach supporting documents here..." >
        
    </div>
</div>

<div class="row">
    <!--<div class="col-lg-6">-->
    <!--                   <label for="clientSelect">Date of Submission Expense:</label>-->
    <!--                <input type="datetime-local"  name="date_of_submission_expense" id="date_of_submission_expense" required class="form-control">-->
                       
    <!--               </div>-->
    <div class="col-lg-12">
         <button type="submit" class="btn btn-primary btn-sm pull-left" style="border-radius:5px;"> Add</button>
                    </form>
    </div>
</div>
     </div>	                                    
    </div>
    </div>
   </div>
   </div>

   <div class="card-body">

  <div class="table-responsive theme-scrollbar client_nt all-issue">
                  <div class="timesheetdata">
                                  <table class="display" id="basic11111">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Client Name </th>
                                                            <th>Date of Expense </th>
                                                            <th>Date of Expense Submission</th>
                                                            <th>Description of expense </th>
                                                            <th>Amount </th>
                                                            <th>Category of Expense </th>
                                                            <th>Nature of Expense </th>
                                                            <th>Supporting Documents </th>
                                                            <th>Attach Supporting Documents </th>
                                                            <th>Status</th>
                                                            <th>Remarks</th>
                                                            <!--<th>Created At</th>-->
                                                            <th>Updated At</th>
                                                            <th>Action</th>
                                                            
                                                            

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                    @foreach($OutOfExpense  as $index => $cli)


                                                        <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                         <td>{{$cli->client_name}}</td>

                                                        <td>{{ \Carbon\Carbon::parse($cli->date)->format('d-m-Y') }}</td>
<td>{{ \Carbon\Carbon::parse($cli->date_of_submission_expense)->format('d-m-Y') }}</td>

                                                        <td>{{$cli->reason}}</td>
                                                        <td>{{$cli->amount}}</td>
                                                        <td>{{$cli->category_of_expense}}</td>
                                                        <td>{{$cli->nature_of_expense}}</td>
                                                        <td>{{$cli->supporting_documents}}</td>
                                                        <td>
                                                            @if($cli->attach_supporting_documents)
                   
                    <a href="{{ asset('/' . $cli->attach_supporting_documents) }}" download>Download Now</a>
                @else
                    <p>No Documents available.</p>
                @endif
                                                            </td>
                                                        <td style="background-color: 
    @if($cli->status == 'pending') orange;
    @elseif($cli->status == 'approved') green;
    @elseif($cli->status == 'rejected') red;
    @endif
    ; color: white;">
    {{$cli->status}}
</td>
                                                        <td>{{$cli->remarks}}</td>
                                                        <!--<td>{{$cli->created_at}}</td>-->
                                                        <td>{{$cli->admin_update}}</td>
                                                        <td> <ul class="action">
                                                    <li class="edit"> <a href="#"><i class="icon-pencil-alt text-primary" onclick="openModal({{$cli->id}})"></i></a></li>
                                                    <!-- <li class="delete" id="delete-{{ $cli->id }}">-->
                                                    <!--    <form method="POST" action="{{ route('ope.delete', ['id' => $cli->id]) }}">-->
                                                    <!--        @csrf-->
                                                    <!--        @method('DELETE')-->
                                                    <!--        <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?')">-->
                                                    <!--            <i class="icon-trash"></i>-->
                                                    <!--        </button>-->
                                                    <!--    </form>-->
                                                    <!--</li>-->
                                                   
                                            </ul></td>
                                                        
                                                      
                                                        
                                                            
                                                        
                                                      
                                                        
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
@foreach($OutOfExpense as $index => $cli)
<div class="modal fade" id="statusModal{{$cli->id}}" tabindex="-1" aria-labelledby="statusModal{{$cli->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusModal{{$cli->id}}Label">Update </h5>
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
                <h3>Edit OPE</h3>
                <!-- Display user data here -->
               <form class="theme-form" method="POST" action="{{ route('empupdateoutofexpense') }}" enctype="multipart/form-data">
                                @csrf
                               <label for="clientSelect">Client Name:</label>
                               <input type="text" class="form-control mt-2" name="client_id" value="{{$cli->client_name}}"  id="client_id" readonly><br>
                               <label for="clientSelect">Date of Expense:</label>
                               <input type="date"  name="date" id="date" value="{{$cli->date}}" required class="form-control"><br>
                                <label for="clientSelect">Description of expense:</label>
                               <input type="text"  name="reason" id="reason" value="{{$cli->reason}}" required class="form-control"><br>
                               
                                    <label for="clientSelect">Amount:</label>
                               <input type="number"  name="amount" id="amount" min="0" value="{{$cli->amount}}" required class="form-control"><br>
                                <label for="clientSelect">Category of Expense:</label>
                               <select class="form-control" id="category_of_expense" name="category_of_expense" required>
                                      <option value="" disabled Selected>Select Category of Expense</option>
                                     
                                      <option value="Client" {{ $cli->category_of_expense === 'Client' ? ' selected' : '' }}>Client</option>
                                      <option value="Non-client" {{ $cli->category_of_expense === 'Non-client' ? ' selected' : '' }}>Non-client</option>
                                     
                                    </select><br>
                                    <label for="clientSelect">Nature of Expense:</label>
                               <select class="form-control" id="nature_of_expense" name="nature_of_expense" required>
                      <option value="" disabled Selected>Select Nature of Expense</option>
                     
                      <option value="Local conveyance" {{ $cli->nature_of_expense === 'Local conveyance' ? ' selected' : '' }}>Local conveyance</option>
                      <option value="Printing & Stationary" {{ $cli->nature_of_expense === 'Printing & Stationary' ? ' selected' : '' }}>Printing & Stationary</option>
                      <option value="Telephone & internet" {{ $cli->nature_of_expense === 'Telephone & internet' ? ' selected' : '' }}>Telephone & internet</option>
                      <option value="Notary and stamping" {{ $cli->nature_of_expense === 'Notary and stamping' ? ' selected' : '' }}>Notary and stamping</option>
                      <option value="Statutory duties & taxes" {{ $cli->nature_of_expense === 'Statutory duties & taxes' ? ' selected' : '' }}>Statutory duties & taxes</option>
                      <option value="Postage & courier" {{ $cli->nature_of_expense === 'Postage & courier' ? ' selected' : '' }}>Postage & courier</option>
                      <option value="Others" {{ $cli->nature_of_expense === 'Others' ? ' selected' : '' }}>Others</option>
                     
                    </select><br>
                    <label for="clientSelect">Supporting documents:</label>
                    <select class="form-control" id="supporting_documents" name="supporting_documents" required>
                      <option value="" disabled Selected>Select Supporting Documents</option>
                     
                      <option value="Available" {{ $cli->supporting_documents === 'Available' ? ' selected' : '' }}>Available</option>
                      <option value="Not available" {{ $cli->supporting_documents === 'Not available' ? ' selected' : '' }}> Not available</option>
                     
                    </select><br>
                    <label for="clientSelect">Attach supporting documents:</label>
                     <input type="file" class="form-control mt-2" name="attach_supporting_documents" id="attach_supporting_documents" value="{{ asset('/' . $cli->attach_supporting_documents) }}" placeholder="Please Attach supporting documents here..." >
                              @if($cli->attach_supporting_documents)
                   
                    <a href="{{ asset('/' . $cli->attach_supporting_documents) }}" download>Download Now</a>
                @else
                <br>
                    <p>No Documents available.</p>
                @endif 
                <!--<label for="clientSelect">Date of Submission Expense:</label>-->
                               <!--<input type="datetime-local"  name="date_of_submission_expense" id="date_of_submission_expense" value="{{$cli->date_of_submission_expense}}" required class="form-control">-->
                               <input type="hidden" class="form-control mt-2" name="created_at"  id="created_at" value="{{$cli->created_at}}" >
                              <input type="hidden" class="form-control mt-2" name="emp_id"  id="emp_id" value="{{$cli->id}}" placeholder="Add your remarks">
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
    // Function to open the modal when the edit button is clicked
    function openModal(employeeId) {
        $('#statusModal' + employeeId).modal('show');
    }
</script>

    

                     

            </div>

           </div>
<script>
var selectedEmployeeNames = [];

$(document).ready(function () {
    var dataTable = $('#basic11111').DataTable({
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
                    if (dataTable && dataTable.search()) {
                        return selectedEmployeeNames.join('_') + '_ope_file';
                    } else {
                        return 'all_employee_ope_file';
                    }
                },
            },
            {
                extend: 'csvHtml5',
                text: '<i class="fa fa-download"></i> Download As CSV',
                filename: function () {
                    // Check if there is any filter applied
                    if (dataTable && dataTable.search()) {
                        return selectedEmployeeNames.join('_') + '_ope_file';
                    } else {
                        return 'all_employee_ope_file';
                    }
                },
            }
        ]
            }
        ]
        
    });

    // Listen for the DataTables draw event to update selectedEmployeeNames
    $('#basic11111').DataTable().on('draw.dt', function () {
        // Extract unique employee names from the filtered data
        var uniqueEmployeeNames = $('#basic11111')
            .DataTable()
            .column(1, { search: 'applied' }) // Assuming 'Employee Name' is the second column (index 1)
            .data()
            .unique()
            .toArray();

        // Update selectedEmployeeNames
        selectedEmployeeNames = uniqueEmployeeNames;
    });
});
</script>

            {{-- END --}}


              </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        @include('employee.includes.footer')
      </div>
    </div>
    @endsection
   
