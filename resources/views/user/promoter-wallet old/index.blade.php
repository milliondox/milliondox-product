@include('user/includes.header');

<link rel="stylesheet" type="text/css" href="/../assets/css/vendors/scrollbar.css">
<link rel="stylesheet" type="text/css" href="/../assets/css/vendors/datatables.css">
<link rel="stylesheet" type="text/css" href="/../assets/css/vendors/sweetalert2.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<!-- App css-->
<link rel="stylesheet" type="text/css" href="/../assets/css/style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.min.css">
<style>
 td{
        font-weight:500;
    }
    </style>
</head>
<body>

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
                <div class="notification-box"><i data-feather="bell"></i></div>
                <ul class="notification-dropdown onhover-show-div">
                  <li><i data-feather="bell">            </i>
                    <h6 class="f-18 mb-0">Notitications</h6>
                  </li>
                  <li>
                    <div class="d-flex align-items-center">
                      <!-- <div class="flex-shrink-0"></div> -->
                      <div class="flex-grow-1">
                      <span>Client Announcements</span>
                      <ul class="announcement-list">
    <div class="col-lg-12">
    @forelse($cli_announcements as $announcement)
        @if($announcement->role == 'Client')
            <div class="announcement-row mb-3">
                <img src="https://thumbs.dreamstime.com/b/red-admin-sign-pc-laptop-vector-illustration-administrator-icon-screen-controller-man-system-box-88756468.jpg" alt="Image Description" style="max-width: 100%; height: auto;">
                <div style="display: inline-block; margin-left: 20px;">
                    <li><strong>{{ $announcement->announcements_for_clients }}</strong></li>
                    @if($announcement->created_at)
                        <span>{{ $announcement->created_at }}</span>
                    @endif
                </div>
            </div>
             <hr>
        @endif
    @empty
        <!-- Optional: Show a message when there is no data -->
        <p>No announcements available for clients.</p>
    @endforelse
</div>

    </ul>
                      </div>
                      <style>
    .announcement-list {
        max-height: 150px; /* Adjust the height as needed */
        overflow-y: auto;
        border: 1px solid #ccc; /* Add a border for aesthetics */
        padding: 5px;
    }
    .page-wrapper .page-header .header-wrapper .nav-right .onhover-show-div li .d-flex img {
    width: 100px !important;
    position: relative;
    margin-top: -50px !important;
}
.page-wrapper .page-header .header-wrapper .nav-right .onhover-show-div:not(.profile-dropdown) li:first-child {
    padding: 20px;
    background-color: white !important;
    border-radius: 0 !important;
}
</style>
                    </div>
                  </li>
              
                </ul>
              </li>


<!-- 
                <li class="profile-nav onhover-dropdown">
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
        @include('user/includes.sidebar');
        <!-- Page Sidebar Ends-->
        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Promoter Wallet</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href=""><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">User</li>
                                <li class="breadcrumb-item active">Promoter Wallet</li>
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
                            

                            <div class="card-body">
                            


@if (!$keyDownload || $keyDownload->file_status === 0 || $keyDownload->file_status === null)

<h2>Key File Download</h2>
<p>Click the button below to download the key file:</p>
<form class="theme-form" method="POST" id="downloadForm" action="{{ route('downloadKeyFile') }}" enctype="multipart/form-data">
    @csrf
    <a href="{{ route('downloadKeyFile') }}" class="btn btn-primary"><button type="submit" name="submit" class="btn btn-primary reload">Download Key File</button></a><br>
    <span>Note:- Please save the file in your system; you will never download it again</span>
</form>
@else
<div class="row">
   
<!--@if(session('otp'))-->
<!--    <p>OTP: {{ session('otp') }}</p>-->
<!--@endif-->

 
<form id="submitForm" action="{{ route('submitForm') }}" method="POST" enctype="multipart/form-data">
    @csrf
     @if(session('message'))
    <div class="alert alert-{{ session('alertType') }}">
        {{ session('message') }}
    </div>
@endif
    @if(session('otp'))
    <p>OTP: {{ session('otp') }}</p>
@endif
    <div class="col-lg-6">
        <p>Enter Your OTP:</p>
        <input type="text" name="otp" id="otp" class="form-control" placeholder="Enter your OTP">
    </div>
    <div class="col-lg-6">
        <p>Please upload Your Key File:</p>
        <input type="file" name="keyfile" id="keyfile" class="form-control">
    </div>
    <br>
    <button type="button" onclick="submitForm()" class="btn btn-primary">Submit</button>
</form>


<div id="tableAndForm" style="display: none;">
    
  <div class="card-body">
                                <div class="table-responsive theme-scrollbar xzz">
<div id="documentsContainer">
    @if($documents->isNotEmpty())
        <table class="display cvx2" id="btb">
            <thead>
                <tr>
                    <th>Document Name</th>
                    <th>Date of Creation</th>
                    <th>Action</th>
                </tr>
            </thead>
            
            <tbody id="document-table-body">
                @foreach($documents as $document)
                    <tr>
                        <td>{{ $document->name }}</td>
                        <td>{{ $document->created_at }}</td>
                        <td>
<a href="/documents/{{ $document->id }}/download">Download</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No documents found.</p>
    @endif
</div>

</div>
</div>

<form id="anotherForm" action="{{ route('submitDocu') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-6">
        <p>Please upload your document here:</p>
        <input type="file" name="anotherFile" id="anotherFile" class="form-control" required>
        <label>Document Type</label>
        <input type="text" name="document_name" class="form-control" id="docu_name" required>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Upload</button>
</form>
</div>



@endif
<!--</div>-->


@if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif
<script>
    document.getElementById('downloadForm').addEventListener('submit', function() {
        setTimeout(function() {
            location.reload();
        }, 1000); // Reload after 1 second (1000 milliseconds)
    });
</script>
 

<script>
    function submitForm() {
        var form = document.getElementById('submitForm');
        var formData = new FormData(form);

        $.ajax({
            type: 'POST',
            url: '{{ route('submitForm') }}',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    alert(response.message);
                    // Hide the OTP and key file upload form
                    $('#submitForm').hide();
                    // Show the table and additional form
                    $('#tableAndForm').show();
                } else {
                    alert(response.message);
                }
            }
        });
    }

    var match = {{ session('match', 0) }};

    function toggleFormAndTable() {
        if (match === 1) {
            $('#submitForm').hide();
            $('#tableAndForm').show();
        } else {
            $('#submitForm').show();
            $('#tableAndForm').hide();
        }
    }

    // Call the function on page load
    toggleFormAndTable();
</script>



                            </div>
                        </div>
                    </div>
                    <!-- Zero Configuration  Ends-->

                </div>
            </div>
            <!-- Container-fluid Ends-->
        </div>

       </div>
        <!-- footer start-->
        @include('user/includes.footer');
    </div>
</div>
<!-- latest jquery-->
<script src="/../assets/js/jquery-3.6.0.min.js"></script>
<!-- Bootstrap js-->
<script src="/../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<!-- feather icon js-->
<script src="/../assets/js/icons/feather-icon/feather.min.js"></script>
<script src="/../assets/js/icons/feather-icon/feather-icon.js"></script>
<!-- scrollbar js-->
<script src="/../assets/js/scrollbar/simplebar.js"></script>
<script src="/../assets/js/scrollbar/custom.js"></script>
<!-- Sidebar jquery-->
<script src="/../assets/js/config.js"></script>
<script src="/../assets/js/sidebar-menu.js"></script>
<script src="/../assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
<script src="/../assets/js/datatable/datatables/datatable.custom.js"></script>
<script src="/../assets/js/tooltip-init.js"></script>

<script src="/../assets/js/notify/bootstrap-notify.min.js"></script>
<script src="/../assets/js/notify/notify-script.js"></script>


<script src="/../assets/js/sweet-alert/sweetalert.min.js"></script>
<script src="/../assets/js/sweet-alert/app.js"></script>
<!-- Template js-->
<script src="/../assets/js/script.js"></script>
<script src="/../assets/js/theme-customizer/customizer.js">  </script>
<!-- login js-->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
    $(document).ready(function() {
        
  
       function fetchDocuments() {
            $.ajax({
                type: 'GET',
                url: '{{ route('fetchDocuments') }}',
                success: function(response) {
                    // Clear existing table rows
                    $('#document-table-body').empty();

                    // Iterate over the documents in the response and append rows to the table
                    response.documents.forEach(function(document) {
                        var newRow = '<tr>' +
                            '<td>' + document.name + '</td>' +
                            '<td>' + document.created_at + '</td>' +
                            '<td>' +
                            '<a href="/documents/' + document.id + '/download">Download</a>' +
                            '</td>' +
                            '</tr>';
                        $('#document-table-body').append(newRow);
                    });
                },
                error: function(xhr, status, error) {
                    // Handle error (optional)
                    console.error(error);
                }
            });
        }

        // Initial call to fetch and display documents
        fetchDocuments();

        // Set interval to fetch and update documents every 5 seconds
        setInterval(fetchDocuments, 1000);

        // Handle form submission
        $('#anotherForm').submit(function(event) {
            event.preventDefault();
            
            var formData = new FormData($(this)[0]);
            
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        // Clear the form fields
                        $('#anotherForm')[0].reset();
                        alert(response.message); // Move this line outside the if block if you want the alert to show regardless of success
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert(error);
                }
            });
        });
    });
</script>







</body>

</html>
