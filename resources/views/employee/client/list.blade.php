@include('user/includes.header')
@extends('employee.includes.client') @section('content')

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
                            <h3>Clients</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href=""><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Admin</li>
                                <li class="breadcrumb-item active">Clients</li>
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
                                <h4 class="">All Clients

                            
</div>
                      

                            <div class="card-body">
                                <div class="table-responsive theme-scrollbar client_nt all-issue">
                                    <table class="display qwe" id="basic-1">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name </th>
                                            <th>Email </th>
                                            <th>Phone</th>
                                           
                                            
                                            <th></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($employeeProfile as $cli)

                                        <tr >
                                        <td>{{ $loop->iteration }}</td>
                                       <td>{{  $cli->name }}</td>
                                        <td >{{ $cli->email }}</td>
                                        <td >{{$cli->phone }}</td>
                                         
                                            
                                        
                                       
                                        
                                         <td class="update-client"><ul class="action">
                                             <li class="edit">
                                                            <a href="#" class=" edit-button" >
                                                            <i class="icon-pencil-alt text-primary" onclick="openModal({{$cli->client_id}})"></i>
                                                            </a>
                                                        </li>
                                                       
                                                        
                                                    
                                            </ul></td>
                                        </tr>


                                        @endforeach




                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Zero Configuration  Ends-->

                </div>
            </div>
            <!-- Container-fluid Ends-->
        </div>
  @foreach($employeeProfile as $cli)
<div class="modal fade" id="statusempclientModal{{$cli->client_id}}" tabindex="-1" aria-labelledby="statusempclientModal{{$cli->client_id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusempclientModal{{$cli->client_id}}Label">Update </h5>
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
                <h3>Update client</h3>
                <!-- Display user data here -->
               <form class="theme-form" method="POST" action="{{ route('updateclientprofile') }}" enctype="multipart/form-data">
                                @csrf
                              
                            <label>GST Document:-</label>
                              <input type="file" class="form-control mt-2" name="gst_document" id="gst_document" placeholder="please upload gst document here..." >
                            <br>
                            <label>PAN Document:-</label>
                              <input type="file" class="form-control mt-2" name="pan_document" id="pan_document" placeholder="please upload pan document here..." >
                                <br>
                                <label>TAN Document:-</label>
                              <input type="file" class="form-control mt-2" name="tan_document" id="tan_document" placeholder="please upload tan document here..." >
                                <br>
                                <label>Address Proof Document:-</label>
                                <input type="file" class="form-control mt-2" name="address_proof_document" id="address_proof_document" placeholder="please upload address proof document here..." >
                              <label>Name:-</label>
                              <input type="text" class="form-control" name="name" value="{{$cli->name}}" id="name" placeholder="Name"><br>
                              <label>Mobile Number:-</label>
                              <input type="text" class="form-control mt-2" name="phone"  id="phone" value="{{$cli->phone}}" placeholder="Mobile Number"><br>

                              
<label>Email:-</label>
                              <input type="email" class="form-control mt-2" name="email" id="email" value="{{$cli->email}}"  placeholder="Login Email" disabled><br>
                              <input type="hidden" class="form-control mt-2" name="password" id="password" value="{{$cli->password}}" placeholder="Password">
                              
                              <input type="hidden" class="form-control mt-2" name="client_id" value="{{$cli->client_id}}" id="client_id" >

                           

                             

                                        
                              <input type="hidden" class="form-control mt-2" name="role" id="role" value="Client">
<label>Brand name:-</label>
                              <input type="text" class="form-control mt-2" name="brand_name" id="brand_name" value="{{$cli->brand_name}}"  placeholder="Brand name"><br>

                                        
<label>Correspondence address:-</label>
                              <input type="text" class="form-control mt-2" name="client_correspondence_address" value="{{$cli->client_correspondence_address}}" id="client_correspondence_address" placeholder="Correspondence address"><br>

<label>Registered office address:-</label>
                                <input type="text" class="form-control mt-2" name="client_registered_office_address" value="{{$cli->client_registered_office_address}}" id="client_registered_office_address"  placeholder="Registered office address"><br>
<label>Your Plan:-</label>
                                <select id="plan_type" class="form-select mt-2" placeholder="Plan type" name="plan_type">
                                <option  disabled Selected>Select Your Plan</option>
                                <option value="Basic" {{ $cli->plan_type === 'Basic' ? ' selected' : '' }}>Basic</option>
                                <option value="Gold" {{ $cli->plan_type === 'Gold' ? ' selected' : '' }}>Gold</option>
                                <option value="Premium" {{ $cli->plan_type === 'Premium' ? ' selected' : '' }}>Premium</option>
                              </select><br>

                        
<label>Authorised Signatory Name:-</label>
<input type="text" class="form-control mt-2" name="authorised_signatory_name" id="authorised_signatory_name" value="{{$cli->authorised_signatory_name}}" value="" placeholder="Authorised Signatory Name"><br>


                                        <label>Passport Size Profile Picture:-</label>
                                        <input type="file" class="form-control mt-2" name="profile_picture" id="profile_picture">

                            </div>
                           


                            <div class="modal-footer">                     
                              <button class="btn btn-primary btn-sm"  style="border-radius:5px;" type="submit">Add</button>
                        </form>
                            </div>
        </div>
    </div>
</div>
@endforeach
<script>
    // Function to open the modal when the edit button is clicked
    function openModal(employeeId) {
        $('#statusempclientModal' + employeeId).modal('show');
    }
</script>
        <script>
            $(document).ready(function (){
                @if(Session::has('success'))
                showToast('{{Session::get('success')}}','success');
                @endif

                $(".delete").click(function (){
                    var id = $(this).attr('id');

                    var tr = $(this).closest('tr');

                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to revert this!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                            if (willDelete) {

                                const url = "/admin/vendors/" + id;

                                $.ajax({
                                    url: url,
                                    type: "GET",
                                    success: function (response) {

                                        tr.remove();
                                        showToast('Vendor Deleted Successfully..','success');
                                        swal.close();

                                    },
                                    error: function (jqXHR, textStatus, errorThrown) {
                                        console.error(errorThrown);

                                        showToast('Error while deleting vendor..','danger');
                                        swal.close();

                                    }
                                });


                            } else {

                                //do nothing

                            }
                        })


                });
            });
        </script>
        <!-- footer start-->
        @include('admin.includes.footer')
    </div>
</div>
@endsection
