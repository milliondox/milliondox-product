@extends('admin.includes.template') @section('content')
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
                  <h3>Template</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">Template</li>
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

                <h5 style="font-weight:700;font-size:16px;">Upload Template</h5><br>

                   <div class="alert p-2 inpt_wrap">
                   @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                   <form action="{{ route('upload-template') }}" method="POST" enctype="multipart/form-data">
                            @csrf  

                            <div class="file-area">          
    <input type="file" name="template[]"" id="images" required="required"/>
    <div class="file-dummy">
      <div class="success">Great, your files are selected. Keep on.</div>
      <div class="default">
      <span class="upload_icon">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88"><title>file-upload</title><path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z"/></svg>
                            </span>  
                            Drag and Drop files here or <span class="fille">Choose File</span>
    </div>
    </div>
  </div> 
                            <span class="basic-file">Note:- file|mimes:pdf,doc,docx|max size:2048kb</span> 
                            <input type="text" name="file_name" Placeholder="Please Enter the file name" class="form-control" required> <br>
                            <select id="template_type" name="template_type" class="form-control">
                              <option value="" selected>Select Template Type</option>
    <option value="Bills">Bills</option>
    <option value="Projections">Projections</option>
    <option value="Financials">Financials</option>
    <option value="Survey Forms">Survey Forms</option>
    <option value="Presentation">Presentation</option>
    <option value="Letterhead">Letterhead</option>
    <option value="Invoice">Invoice</option>
    <option value="Electronic Legalities">Electronic Legalities</option>
</select><br>

                            <button class="btn btn-primary btn-sm"  style="border-radius:5px;" type="submit">Upload</button>
                            <br>
                        </form>
                        
                   


                </div>

                </div>

              </div>


              {{-- END --}}

                <div class="col-sm-12">
                  <div class="card">

                    <div class="card-body">

                    <h5 style="font-weight:700;font-size:16px;">List of Uploaded Templates </h5><br>
                    

                    <div class="table-responsive theme-scrollbar">
                    <div class="pol_nt">
                                                <table class="display ddd" id="basic-1">
    <thead>
        <tr>
            <th>File Name</th>
            <th>Template Type </th>
            <th>Download</th>
            <th>Action</th>
        </tr>
    </thead>
   <tbody>
        @foreach($template as $pol)
            <tr>
                <td>{{ $pol->file_name }}</td>
                <td>{{ $pol->template_type }}</td>
                 <td>
                    @php
                        $fileNameWithoutPlus = str_replace('+', '', $pol->file_name);
                    @endphp
                    <a href="{{ route('download-template-file', ['id' => $pol->id, 'fileName' => $fileNameWithoutPlus]) }}">
                        <i class="icon-download"></i>
                    </a>
                </td>
                <td>
                    <ul class="action">
                        <li class="delete" id="delete-{{ $pol->id }}">
                            <form method="POST" action="{{ route('temp.delete', ['id' => $pol->id]) }}">
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
    </tbody>
</table>
</div>
<!-- Include jQuery -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->

<!-- Include Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Include Bootstrap CSS (for modal styling) -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

                                          <script>
                            $(document).ready( function() {
    $('#basic-1').DataTable( {
        // dom: 'Bfrtip',
        //  buttons: [
        //     {
        //         extend: 'excelHtml5',
        //         customize: function (xlsx) {
        //             var sheet = xlsx.xl.worksheets['sheet1.xml'];
        //             $('row c[r^="C"]', sheet).attr('s', '2');
        //         },
        //          text: '<i class="fa fa-download"></i> Download As Excel',
        //     },
        //     {
        //         extend: 'csvHtml5',
        //         text: '<i class="fa fa-download"></i> Download As CSV', // Custom HTML content
        //     }
        // ]
        });
        $("#basic-1").resizableColumns({
    store: window.store
  });
    });
                                    </script>
   

<!-- Delete Confirmation Modal -->



                    </div>





                     </div>
                  </div>

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
.file-area {
  width: 100%;
  position: relative;
  
   input[type=file] {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    opacity: 0;
    cursor: pointer;
  }
  
  .file-dummy {
    width: 100%;
    padding: 30px;
    background: rgba(255,255,255,0.2);
    border: 2px dashed rgba(255,255,255,0.2);
    text-align: center;
    transition: background 0.3s ease-in-out;
    
    .success {
      display: none;
    }
  }
  
  input[type=file]:valid + .file-dummy {
    border-color: none;
    background-color: transparent;

    .success {
      display: inline-block;
    }
    .default {
      display: none;
    }
  }
}

</style>

<style>
    a.dt-button.buttons-csv.buttons-html5 {
    background: transparent;
    color: #333333 !important;
    font-size: 12px !important;
    border-radius: 7px !important;
    font-weight: 500 !important;
    border: none;
    box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.3);
}
a.dt-button.buttons-excel.buttons-html5 {
background: transparent;
    color: #333333 !important;
    font-size: 12px !important;
    border-radius: 7px !important;
    font-weight: 500 !important;
    border: none;
    box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.3);
}
i.icon-trash {
    color: #f81f58 !important;
}
</style>
<link rel="stylesheet" type="text/css" href="https://dobtco.github.io/jquery-resizable-columns/dist/jquery.resizableColumns.css">
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/store.js/1.3.14/store.min.js"></script>
<script src="https://dobtco.github.io/jquery-resizable-columns/dist/jquery.resizableColumns.js"></script>
<style>
    .ddd{
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

    <!-- login js-->
    @endsection
