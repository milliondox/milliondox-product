@include('user/includes.header')

@extends('admin.includes.client') @section('content')
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

                            <button class="btn btn-primary pull-right btn-sm" style="border-radius:5px;" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fa fa-plus"></i> Add Client</button></h4>

                      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" style="font-weight:700">Add Client</h5>
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
                                <h3>Add Client</h3>
                            <form class="theme-form" method="POST" action="{{ route('storeclients') }}">
                                @csrf
                              <input type="text" class="form-control" name="name" id="name" placeholder="Legal Entity Name *" required>
                              <input type="text" class="form-control mt-2" name="phone" id="phone" placeholder="Mobile Number *" required>

                              

                              <input type="email" class="form-control mt-2" name="email" id="email" placeholder="Login Email *" required>

                              <input type="password" class="form-control mt-2" id="password" name="password" placeholder="Password *" required>
                              <input id="password-confirm" type="password" class="form-control mt-2" name="password_confirmation" required  placeholder="Confirm Password *">
                              <input type="hidden" class="form-control mt-2" name="role" id="role" value="Client">

                              <input type="text" class="form-control mt-2" name="brand_name" id="brand_name" placeholder="Brand name *" required>

                              <input type="text" class="form-control mt-2" name="client_correspondence_address" id="client_correspondence_address" required placeholder="Correspondence address *">


                              <input type="text" class="form-control mt-2" name="client_registered_office_address" id="client_registered_office_address" required placeholder="Registered office address *">

                              <select id="plan_type" class="form-select mt-2" placeholder="Plan type" name="plan_type" required>
                                <option  disabled>Select Your Plan *</option>
                                <option value="Basic">Basic</option>
                                <option value="Gold">Gold</option>
                                <option value="Premium">Premium</option>
                              </select>


                              <input type="text" class="form-control mt-2" name="authorised_signatory_name" required id="authorised_signatory_name" placeholder="Authorised Signatory Name *">


                            </div>
                           


                            <div class="modal-footer">
                              <button class="btn btn-primary btn-sm"  style="border-radius:5px;" type="submit">Add</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                            </div>
                            
                            <div class="card-body">
                            
                                <div class="table-responsive theme-scrollbar">
        <div class="all-issue">
                                    <table id="example11" class="display nowrap">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Legal Entity Name </th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Brand Name </th>
                                            <th>Correspondence Address </th>
                                            <th>Registered Office Address </th>
                                            <th>Authorised Signatory Name </th>
                                         
                                            <th>Plan</th>
                                           
                                            <th>Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($clients as $client)

                                        <tr>
                                        <td >{{ $loop->iteration }}</td>
                                        <td class="break-after-two-words" value="{{$client->name}}">
        {{ $client->name }}
    </td>
                                        <td value="{{$client->phone}}">{{$client->phone}}</td>
                                        <td value="{{$client->email}}">{{$client->email}}</td>
                                         <td value="{{$client->password}}">{{$client->password}}</td>
                                        <td class="break-after-two-words" value="{{$client->brand_name}}">{{$client->brand_name}}</td>
                                        <td value="{{$client->client_correspondence_address}}"> <?php
    $address = $client->client_correspondence_address;
    $lines = explode(",", $address);
    foreach ($lines as $line) {
        echo trim($line) . "<br>";
    }
    ?></td>
                                        <td value="{{$client->client_registered_office_address}}"> <?php
    $address1 = $client->client_registered_office_address;
    $lines1 = explode(",", $address1);
    foreach ($lines1 as $line1) {
        echo trim($line1) . "<br>";
    }
    ?></td>
                                        <td class="break-after-two-words" value="{{$client->authorised_signatory_name}}">{{$client->authorised_signatory_name}}</td>
                                        
                                         <td value="{{$client->plan_type}}">{{$client->plan_type}}</td>
                                       
                                         <td><ul class="action">
                                             <li class="edit">
                                                            <a href="#" class=" edit-button" data-client-id="{{ $client->user_id }}" data-toggle="modal" data-target="#editModal{{ $client->user_id }}" data-plan_type="{{$client->plan_type}}" data-authorised_signatory_name="{{$client->authorised_signatory_name}}" data-name="{{$client->name}}" data-client_registered_office_address="{{$client->client_registered_office_address}}" data-phone="{{$client->phone}}" data-email="{{$client->email}}" data-password="{{$client->password}}" data-brand_name="{{$client->brand_name}}" data-client_correspondence_address="{{$client->client_correspondence_address}}" data-id="{{$client->user_id}}">
                                                            <i class="icon-pencil-alt text-primary"></i>
                                                            </a>
                                                        </li>
                                                        <li class="delete" id="delete-{{ $client->user_id }}">
                                                        <form method="POST" action="{{ route('client.delete', ['id' => $client->user_id]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this client?')">
                                                                <i class="icon-trash"></i>
                                                            </button>
                                                        </form>
                                                    </li>
                                                    
                                            </ul>
                            </td>
                                        </tr>
 
 <!-- Delete Confirmation Modal -->
<div class="modal fade" id="editModal{{ $client->user_id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Client</h5>
                <button type="button" class="close" data-dismiss="modal">
<span aria-hidden="true">
<svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"/>
<rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"/>
</svg>
</span>
</button>
            </div>
            <div class="modal-body">
                <h3>Edit Client</h3>
                <form class="theme-form" method="POST" action="{{ route('updateclientprofiles') }}" enctype="multipart/form-data">
                                @csrf
                               
                              <input type="text" class="form-control" name="name" value="{{$client->name}}" id="name" placeholder="Name">
                              <input type="text" class="form-control mt-2" name="phone" value="{{$client->phone}}" id="phone" placeholder="Mobile Number">

                              

                              <input type="email" class="form-control mt-2" name="email" id="email" value="{{$client->email}}" placeholder="Login Email" disabled>
                              <input type="text" class="form-control mt-2" name="password" id="password" value="{{$client->password}}">
                              
                              <input type="hidden" class="form-control mt-2" name="client_id" id="client_id" value="{{$client->user_id}}">

                           

                             

                                        
                              <input type="hidden" class="form-control mt-2" name="role" id="role" value="Client">

                              <input type="text" class="form-control mt-2" name="brand_name" id="brand_name" value="{{$client->brand_name}}" placeholder="Brand name">

                                        

                              <input type="text" class="form-control mt-2" name="client_correspondence_address" value="{{$client->client_correspondence_address}}" id="client_correspondence_address" placeholder="Correspondence address">


                                <input type="text" class="form-control mt-2" name="client_registered_office_address" id="client_registered_office_address" value="{{$client->client_registered_office_address}}" placeholder="Registered office address">

                                <select id="plan_type" class="form-select mt-2" placeholder="Plan type" name="plan_type">
                                <option  disabled Selected>Select Your Plan</option>
                                <option value="Basic" {{ $client->plan_type === 'Basic' ? ' selected' : '' }}>Basic</option>
                                <option value="Gold" {{ $client->plan_type === 'Gold' ? ' selected' : '' }}>Gold</option>
                                <option value="Premium" {{ $client->plan_type === 'Premium' ? ' selected' : '' }}>Premium</option>
                              </select>

                        

<input type="text" class="form-control mt-2" name="authorised_signatory_name" id="authorised_signatory_name" value="{{$client->authorised_signatory_name}}" placeholder="Authorised Signatory Name">


                                        
                                        <input type="file" class="form-control mt-2" name="profile_picture" id="profile_picture">
                          
                            
                                  
                         
                               
            </div>
            <div class="modal-footer">          
            
                 <button class="btn btn-primary btn-sm"  style="border-radius:5px;" type="submit">Submit</button>
               
            </div>
            
                                          </form>
        </div>
    </div>
</div>


                                        
                                        @endforeach




                                        </tbody>
                                    </table>
</div>
<script>
    $(document).ready(function () {
        // Find all <td> elements with the class "break-after-two-words"
        $('.break-after-two-words').each(function () {
            // Get the text content of the <td> element
            var text = $(this).text();
            // Split the text into words
            var words = text.split(' ');
            // Create an array to store groups of two words
            var groups = [];
            for (var i = 0; i < words.length; i += 2) {
                groups.push(words.slice(i, i + 2).join(' '));
            }
            // Join the groups with line breaks and set it as the new content of the <td> element
            $(this).html(groups.join('<br>'));
        });
    });
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 


<script>
                                        $(document).ready( function() {
    $('#example11').DataTable( {
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
            },
            {
                extend: 'csvHtml5',
                text: '<i class="fa fa-download"></i> Download As CSV', // Custom HTML content
            }
        ]
            }
        ]
        });
    });
                                    </script>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Zero Configuration  Ends-->

                </div>
            </div>
            <!-- Container-fluid Ends-->
        </div>



        
        <!-- footer start-->
        @include('admin.includes.footer');
    </div>
</div>

<style>
 
tr.odd {
    font-size: 14px !important;
}
tr.even {
    font-size: 14px !important;
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
<!-- login js-->
@endsection
