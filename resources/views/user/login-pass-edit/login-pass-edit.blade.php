@extends('user.includes.login-pass-edit') @section('content')
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
           <h2>
           
          </h2>
            </div>
        </div>
        <div class="nav-right col-1 pull-right right-header p-0">
                    <!-- Header Right Icon Start-->
        @include('user/includes.header-details')
       <!-- Header Right Icon Start-->
        </div>
         </div>
</div>

      <!-- Page Header Ends-->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        @include('user/includes.client-sidebar')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <!-- greeting -->
          <div class="mlb-menu-header container-fluid" style="display:none;">
           <h2>
           
          </h2>
            </div>
            

      
              <!-- Container-fluid start-->
      <div class="container-fluid login_ediit_pass Role_Management">
        <div class="row">
          <div class="col-md-12">
         
            <div class="Inc_table">

                <div class=" tba_history_rap">
				
                  <div class="filtr_tabble">
				  <div class="table_title">
                        <h2>Change Password</h2>
</div>
				  <div class="mmanage_wrap">
                  <div class="row">
                    <div class="col-sm-5">
<div class="login_form_editfl">
<form action="{{ route('changeemppassword') }}" method="POST" enctype="multipart/form-data" class="upload-form"> 
@csrf
    <div class="gropu_form">
        <label for="old_password">Enter Old Password</label>
        <div class="gropu_form_input">
        <input type="hidden" id="user_id" name="user_id" value="{{$user->id}}">
        <input placeholder="Enter Old Password" type="password" id="old_password" name="old_password">
        <b class="toggle-password"><i class="fas fa-eye-slash"></i></b>
    </div>
    </div>

    <div class="gropu_form">
        <label for="new_password">Enter New Password</label>
        <div class="gropu_form_input">
        <input placeholder="Enter New Password" type="password" id="new_password" name="new_password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" 
        title="Password must be at least 8 characters long, contain at least 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character (@, $, !, %, *, ?, &)." required>
        <b class="toggle-password"><i class="fas fa-eye-slash"></i></b>
    </div>
    </div>

    <div class="gropu_form">
        <label for="confirm_password">Confirm New Password</label>
        <div class="gropu_form_input">
        <input placeholder="Confirm New Password" type="password" id="confirm_password" name="confirm_password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" 
        title="Password must be at least 8 characters long, contain at least 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character (@, $, !, %, *, ?, &)." required>
        <b class="toggle-password"><i class="fas fa-eye-slash"></i></b>
    </div>
    </div>

    <div class="gropu_form">
        <button type="submit">Confirm</button>
    </div>
</form>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        @if(session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    });
    </script>
</div>
			
</div>

			  
<div class="col-sm-7">
    <div class="sure_passward">
      <div class="vg_passward">
      <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M25 -0.00488281C38.81 -0.00488281 50.005 11.1901 50.005 25.0001C50.005 38.8076 38.81 50.0001 25 50.0001C11.19 50.0001 4.18726e-07 38.8076 4.18726e-07 25.0001C-0.00249958 11.1901 11.19 -0.00488281 25 -0.00488281ZM24.99 20.6201C24.3773 20.621 23.7863 20.8467 23.3291 21.2546C22.8719 21.6625 22.5805 22.224 22.51 22.8326L22.4925 23.1226L22.5025 36.8776L22.5175 37.1676C22.5874 37.7774 22.8791 38.3402 23.3371 38.7487C23.7952 39.1573 24.3875 39.383 25.0013 39.383C25.615 39.383 26.2073 39.1573 26.6654 38.7487C27.1234 38.3402 27.4151 37.7774 27.485 37.1676L27.5 36.8751L27.49 23.1201L27.4725 22.8276C27.4002 22.2195 27.1073 21.6591 26.6492 21.2526C26.1912 20.8462 25.5999 20.622 24.9875 20.6226M25 11.2501C24.1702 11.2501 23.3744 11.5798 22.7876 12.1665C22.2009 12.7533 21.8713 13.5491 21.8713 14.3789C21.8713 15.2087 22.2009 16.0045 22.7876 16.5912C23.3744 17.178 24.1702 17.5076 25 17.5076C25.8298 17.5076 26.6256 17.178 27.2124 16.5912C27.7991 16.0045 28.1288 15.2087 28.1288 14.3789C28.1288 13.5491 27.7991 12.7533 27.2124 12.1665C26.6256 11.5798 25.8298 11.2501 25 11.2501Z" fill="#C6D9FF"/>
</svg>
      </div>
      <h2>Make sure your password:</h2>
      <ul>
        <li>Has atleast 1 Uppercase & 1 Lowercase character</li>
        <li>Has atleast 1 special character (eg. @,#,$, etc.)</li>
        <li>Isn’t common and follows any pattern (eg. Company123)</li>
      </ul>
      
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
        <!-- Container-fluid start-->



        </div>
      </div>
    </div>
    

    @endsection
    
   

   
