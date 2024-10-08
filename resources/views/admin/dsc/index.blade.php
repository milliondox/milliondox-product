@include('user/includes.header')
@extends('admin.includes.dsc') @section('content')
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
        @include('admin.includes.sidebar')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>DSC</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href=""><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Admin</li>
                                <li class="breadcrumb-item active">DSC</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <!-- Zero Configuration  Starts-->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <h4 class="">All DSC Status

                                <button class="btn btn-primary pull-right btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalCenter1" style="border-radius:5px;"><i class="fa fa-plus"></i> Add DSC</button></h4>
                                <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" style="font-weight:700">Add DSC</h5>
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
                                        <h3>Add DSC</h3>
                                        <form class="theme-form" id="myForm" method="POST" action="{{ route('storedse') }}" enctype="multipart/form-data">
                                            @csrf
                                                <label for="clientSelect">Client Name:</label>
                                                <select class="form-control" id="clientSelect" name="client_id" >
                                                <option value="" disabled Selected>Select Client</option>
                                                
                                                @foreach($clients  as $client)
                                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                                                @endforeach
                                                </select><br>
                                        

                                        

                                        

                                        <label for="clientSelect">Non Client:</label>
                                        <input type="text" class="form-control mt-2" name="Nonclient" id="Nonclient"  placeholder="Non Client Name"><br>
                                        <label for="clientSelect">DSC Holder's Name <span class="error-msg">*</span>:</label>
                                        <input type="text" class="form-control mt-2 " name="directorname" id="directorname" required placeholder="DSC Holder's Name *"><br>
                                        
                                        <label for="clientSelect">DIN Number:</label>
                                        <input type="text" class="form-control mt-2" name="din_number" id="din_number"  placeholder="DIN Number"><br>
                                        <label for="clientSelect">Valid from <span class="error-msg">*</span>:</label>
                                        <input type="text" class="form-control mt-2 " id="valid_from" name="valid_from" required placeholder="Valid from *"><br>
                                        <label for="clientSelect">Valid till <span class="error-msg">*</span>:</label>
                                        <input type="text" class="form-control mt-2 " id="valid_till" name="valid_till" required placeholder="Valid till *"><br>
                                        <label for="clientSelect">Expiry Status:</label>
                                        <select class="form-control mt-2" id="expiry_status" name="expiry_status" >
                                                <option value="" disabled Selected>Select Expiry Status</option>
                                               
                                                <option value="Stay Relaxed">Stay Relaxed</option>
                                                <option value="Expiring Soon">Expiring Soon</option>
                                                <option value="Expired">Expired</option>
                                                
                                                </select><br>
                                            <label for="clientSelect">Renewal:</label>
                                                <select class="form-control mt-2" id="renewal" name="renewal" >
                                                <option value="" disabled Selected>Select Renewal</option>
                                               
                                                <option value="N/A">N/A</option>
                                                <option value="Get in touch">Get in touch</option>
                                                
                                                
                                                </select><br>
                                                 <label for="clientSelect">Mobile No:</label>
<input type="text" class="form-control mt-2" name="mobile_no" id="mobile_no" placeholder="Mobile No" ><br>
<label for="clientSelect">Email:</label>
                                        <input type="email" class="form-control mt-2" name="email" id="email" placeholder="Email" ><br>
                                        <label for="clientSelect">Father Name:</label>
                                        <input type="text" class="form-control mt-2" name="father_name" id="father_name" placeholder="Father Name" ><br>
                                        <label>Pan Card</label>
                                        <input type="file" class="form-control mt-2" name="pan_file" id="pan_file" ><br>
                                        <label>Aadhar Card</label>
                                        <input type="file" class="form-control mt-2" name="aadhar_file" id="aadhar_file"  ><br>
                                        <label>Passport Size Picture</label>
                                        <input type="file" class="form-control mt-2" name="profile_file" id="profile_file" ><br>
                                         <label for="clientSelect">DSC location <span class="error-msg">*</span>:</label>
                                                <select class="form-control mt-2" id="dsc_location" name="dsc_location" required >
                                                <option value="" disabled Selected>Select DSC location</option>
                                               
                                                <option value="PC Office">PC Office</option>
                                                <option value="Client Office">Client Office</option>
                                                <option value="Third Party Consultant Office">Third Party Consultant Office</option>
                                                
                                                
                                                </select>
                                        </div>
                                        <script>
                                            // Calculate today's date
                                            const today = new Date();
                                            const todayFormatted = today.getFullYear() + "-" + (today.getMonth() + 1).toString().padStart(2, '0') + "-" + today.getDate().toString().padStart(2, '0');

                                            // Initialize Flatpickr for Tenure Start Date
                                            flatpickr("#valid_from", {
                                                dateFormat: "Y-m-d", // Set the date format to match the server-side format
                                               // Set the minimum selectable date to today
                                            });

                                            flatpickr("#valid_till", {
                                                dateFormat: "Y-m-d", // Set the date format to match the server-side format
                                               // Set the minimum selectable date to today
                                            });
                                            
                                        </script>

                                        
                                        <div class="modal-footer">
                                        <button class="btn btn-primary btn-sm"  style="border-radius:5px;" type="submit">Add</button>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive theme-scrollbar">
                                <div class="all-issue">
                                    <table id="example111" class="display nowrap">
                                        <thead>
                                        <tr>
                                            
                                            <th>Client Name </th>
                                            <th>Non Client </th>
                                            <th>DSC Holder's Name </th>
                                            <th>Father Name </th>
                                            <th>Email </th>
                                            <th>Mobile Number </th>
                                            <th>DIN Number </th>
                                            <th>Valid From </th>
                                            <th>Valid Till </th>
                                            <th>Expiry Status </th>
                                            <th>Renewal </th>
                                            <th>DSC Location </th>
                                            <th>Action </th>
                                            

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($dataModels as $dsc)

<tr>

<td value="{{$dsc->id}}">{{$dsc->name}}</td>
<td value="{{$dsc->Nonclient}}">{{$dsc->Nonclient}}</td>
<td value="{{$dsc->directorname}}">{{$dsc->directorname}}</td>
<td value="{{$dsc->father_name}}">{{$dsc->father_name}}</td>
<td value="{{$dsc->email}}">{{$dsc->email}}</td>
<td value="{{$dsc->mobile_no}}">{{$dsc->mobile_no}}</td>
<td value="{{$dsc->din_number}}">{{$dsc->din_number}}</td>

<td>{{ \Carbon\Carbon::parse($dsc->valid_from)->format('d-m-Y') }}</td>
<td>{{ \Carbon\Carbon::parse($dsc->valid_till)->format('d-m-Y') }}</td>

<td value="{{$dsc->expiry_status}}">{{$dsc->expiry_status}}</td>
<td value="{{$dsc->renewal}}">{{$dsc->renewal}}</td>
<td value="{{$dsc->dsc_location}}">{{$dsc->dsc_location}}</td>
<td>
<ul class="action">
 <li class="edit"> <a href="#"><i class="icon-pencil-alt text-primary" onclick="openModal({{$dsc->id}})"></i></a></li>
                                                        <li class="delete" id="delete-{{ $dsc->id }}">
                                                        <form method="POST" action="{{ route('dsc.delete', ['id' => $dsc->id]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?')">
                                                                <i class="icon-trash"></i>
                                                            </button>
                                                        </form>
                                                    </li>
                                                    
                                            </ul>

</td>


                                        
                      

                                       
                                        </tr>




                                       
                                     @endforeach 
                      
                    </div>
                </div>
            </div>
        </div>
    </div>

  

                                        </tbody>
                                    </table>
                                        </div>

                                    <script>
                                    var selectedEmployeeNames = [];

$(document).ready(function() {
    var table = $('#example111').DataTable({
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
                        return selectedEmployeeNames.join('_') + '_dsc_file';
                    } else {
                        return 'all_client_dsc_file';
                    }
                },
            },
            {
                extend: 'csvHtml5',
                text: '<i class="fa fa-download"></i> Download As CSV',
                filename: function () {
                    // Check if there is any filter applied
                    if (table && table.search()) {
                        return selectedEmployeeNames.join('_') + '_dsc_file';
                    } else {
                        return 'all_client_dsc_file';
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
            .column(0, { search: 'applied' }) // Assuming 'Employee Name' is the second column (index 1)
            .data()
            .unique()
            .toArray();

        // Update selectedEmployeeNames
        selectedEmployeeNames = uniqueEmployeeNames;
    });
});

</script>
                                    <!-- Add Flatpickr library -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

                                </div>
                            </div>
                           
                    
                    <!-- Zero Configuration  Ends-->

                </div>
            </div>
            <!-- Container-fluid Ends-->
        </div>
</div>
</div>
      @foreach($dataModels as $dsc)
<div class="modal fade" id="statusModal{{$dsc->id}}" tabindex="-1" aria-labelledby="statusModal{{$dsc->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusModal{{$dsc->id}}Label">Update </h5>
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
                <h3>Update DSC</h3>
                <!-- Display user data here -->
               <form class="theme-form" method="POST" action="{{ route('updatedsc') }}" enctype="multipart/form-data">
                                @csrf
                               <label for="clientSelect">Client Name:</label>
                               <input type="text" class="form-control mt-2" name="client_id" value="{{$dsc->name}}"  id="client_id" readonly><br>
                               <label for="clientSelect">Non Client:</label>
                               <input type="text" class="form-control mt-2" name="Nonclient" id="Nonclient" value="{{$dsc->Nonclient}}" placeholder="Non Client Name"><br>
                                <label for="clientSelect">DSC Holder's Name:</label>
                               <input type="text" class="form-control mt-2" name="directorname" id="directorname" value="{{$dsc->directorname}}" required placeholder="DSC Holder's Name"><br>
                               
                                    <label for="clientSelect">DIN Number:</label>
                               <input type="text" class="form-control mt-2" name="din_number" id="din_number" value="{{$dsc->din_number}}"  placeholder="DIN Number"><br>
                                <label for="clientSelect">Valid from:</label>
                              <input type="date" class="form-control mt-2" id="valid_from" name="valid_from" value="{{$dsc->valid_from}}" required placeholder="Valid from"><br>
                               <label for="clientSelect">Valid till:</label>
                              <input type="date" class="form-control mt-2" id="valid_till" name="valid_till" value="{{$dsc->valid_till}}" required placeholder="Valid till"><br>
                                    <label for="clientSelect">Expiry Status:</label>
                                <select class="form-control mt-2" id="expiry_status" name="expiry_status" >
                                                <option value="" disabled Selected>Select Expiry Status</option>
                                               
                                                <option value="Stay Relaxed" {{ $dsc->expiry_status === 'Stay Relaxed' ? ' selected' : '' }}>Stay Relaxed</option>
                                                <option value="Expiring Soon" {{ $dsc->expiry_status === 'Expiring Soon' ? ' selected' : '' }}>Expiring Soon</option>
                                                <option value="Expired" {{ $dsc->expiry_status === 'Expired' ? ' selected' : '' }}>Expired</option>
                                                
                                                </select><br>
                    <label for="clientSelect">Renewal:</label>
                    <select class="form-control mt-2" id="renewal" name="renewal" >
                                                <option value="" disabled Selected>Select Renewal</option>
                                               
                                                <option value="N/A" {{ $dsc->renewal === 'N/A' ? ' selected' : '' }}>N/A</option>
                                                <option value="Get in touch" {{ $dsc->renewal === 'Get in touch' ? ' selected' : '' }}>Get in touch</option>
                                                
                                                
                                                </select><br>
                                                <label for="clientSelect">Mobile No:</label>
                              <input type="text" class="form-control mt-2" name="mobile_no" id="mobile_no" value="{{$dsc->mobile_no}}" placeholder="Mobile No" ><br>
                              <label for="clientSelect">Email:</label>
                              <input type="email" class="form-control mt-2" name="email" id="email" value="{{$dsc->email}}" placeholder="Email" ><br>
                              <label for="clientSelect">Father Name:</label>
                              <input type="text" class="form-control mt-2" name="father_name" id="father_name" value="{{$dsc->father_name}}" placeholder="Father Name" ><br>
                    <label for="clientSelect">Pan Card:</label>
                     <input type="file" class="form-control mt-2" name="pan_file" id="pan_file" >
                              @if($dsc->pan_file_path)
                   
                    <a class="download_nt" href="{{ asset('/' . $dsc->pan_file_path) }}" download>Download Now</a>
                @else
                    <p>No Documents available.</p>
                @endif <br>
                <label for="clientSelect">Aadhar Card:</label>
                     <input type="file" class="form-control mt-2" name="aadhar_file" id="aadhar_file"  >
                              @if($dsc->aadhar_file_path)
                   
                    <a class="download_nt" href="{{ asset('/' . $dsc->aadhar_file_path) }}" download>Download Now</a>
                @else
                    <p>No Documents available.</p>
                @endif <br>
                
                <label for="clientSelect">Passport Size Profile Picture:</label>
                   <input type="file" class="form-control mt-2" name="profile_file" id="profile_file" >
                              @if($dsc->profile_file_path)
                   
                    <a class="download_nt" href="{{ asset('/' . $dsc->profile_file_path) }}" download>Download Now</a>
                @else
                    <p>No Documents available.</p>
                @endif<br>
                <label for="clientSelect">DSC location <span class="error-msg">*</span>:</label>
                                                <select class="form-control mt-2" id="dsc_location" name="dsc_location" required >
                                                <option value="" disabled Selected>Select DSC location</option>
                                               
                                                <option value="PC Office" {{ $dsc->dsc_location === 'PC Office' ? ' selected' : '' }}>PC Office</option>
                                                <option value="Client Office" {{ $dsc->dsc_location === 'Client Office' ? ' selected' : '' }}>Client Office</option>
                                                <option value="Third Party Consultant Office" {{ $dsc->dsc_location === 'Third Party Consultant Office' ? ' selected' : '' }}>Third Party Consultant Office</option>
                                                
                                                
                                                </select>
                
                
                
                              <input type="hidden" class="form-control mt-2" name="dsc_id"  id="dsc_id" value="{{$dsc->id}}" >
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
        <!-- footer start-->
        @include('admin.includes.footer')
    </div>
</div>

<style>
   
.error-msg {
    color: red;
    
}
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

