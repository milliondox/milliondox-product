@extends('user.includes.promoter-wallet') @section('content')
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
        <div class="left-menu-header">
          <h2> Promoter Wallet </h2>
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
    <!-- Page Sidebar Start--> @include('user/includes.client-sidebar')
    <!-- Page Sidebar Ends-->
    <div class="page-body">
      <!-- greeting -->
      <div class="mlb-menu-header container-fluid" style="display:none;">
        <h2> Promoter Wallet </h2>
      </div>
      <!-- Container-fluid start-->
      <!-- <div class="bredcrum"><div class="container-fluid"><div class="row"><div class="col-sm-12"></div></div></div></div> -->
      <!-- Container-fluid start-->
      <div class="container-fluid"> 
        <div class="row">
          <div class="col-sm-12">
            <div class="mmaiin_wallet">
              <div class="loker_image">
                <img src="../assets/images/lokker.png" alt="img">
              </div>
              <div class="loker_text">
                <h2>Security shouldn’t be negotiable</h2>
                <p>Choose Vault</p>
                <a href="#">Learn more</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Container-fluid start-->
      <!-- Container-fluid start-->
      <div class="container">
        <div class="row raw_valut">
          <div class="col-sm-7">
            <div class="your_wallet">


            <!-- Zero step start -->
            <div class="volt_round_zero" id="loginverify">
                            <!-- Loader starts-->
                            <div class="comman_loderr" id="customLoader">
      <div class="loder_wraper_inn_pos">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"> </div>
      <div class="dot"></div>
    </div>

                            </div>

              <h2>Login your Vault <span>
                  <svg width="40" height="32" viewBox="0 0 40 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 19C24.7956 19 25.5587 18.6839 26.1213 18.1213C26.6839 17.5587 27 16.7956 27 16C27 15.2044 26.6839 14.4413 26.1213 13.8787C25.5587 13.3161 24.7956 13 24 13C23.2044 13 22.4413 13.3161 21.8787 13.8787C21.3161 14.4413 21 15.2044 21 16C21 16.7956 21.3161 17.5587 21.8787 18.1213C22.4413 18.6839 23.2044 19 24 19ZM0 7.5C0 5.51088 0.790176 3.60322 2.1967 2.1967C3.60322 0.790176 5.51088 0 7.5 0H32.5C34.4891 0 36.3968 0.790176 37.8033 2.1967C39.2098 3.60322 40 5.51088 40 7.5V24.5C40 26.4891 39.2098 28.3968 37.8033 29.8033C36.3968 31.2098 34.4891 32 32.5 32H7.5C5.51088 32 3.60322 31.2098 2.1967 29.8033C0.790176 28.3968 0 26.4891 0 24.5V7.5ZM7.5 6C7.10218 6 6.72064 6.15804 6.43934 6.43934C6.15804 6.72064 6 7.10218 6 7.5V24.5C6 24.8978 6.15804 25.2794 6.43934 25.5607C6.72064 25.842 7.10218 26 7.5 26C7.89782 26 8.27936 25.842 8.56066 25.5607C8.84196 25.2794 9 24.8978 9 24.5V7.5C9 7.10218 8.84196 6.72064 8.56066 6.43934C8.27936 6.15804 7.89782 6 7.5 6ZM18.56 8.44C18.4227 8.29263 18.2571 8.17442 18.0731 8.09244C17.8891 8.01045 17.6905 7.96637 17.489 7.96282C17.2876 7.95926 17.0876 7.99631 16.9008 8.07175C16.714 8.1472 16.5444 8.25949 16.4019 8.40192C16.2595 8.54436 16.1472 8.71403 16.0718 8.9008C15.9963 9.08758 15.9593 9.28764 15.9628 9.48904C15.9664 9.69045 16.0105 9.88908 16.0924 10.0731C16.1744 10.2571 16.2926 10.4227 16.44 10.56L18.83 12.952C18.2847 13.875 17.998 14.9279 18 16C18 17.112 18.302 18.154 18.83 19.048L16.44 21.44C16.2926 21.5773 16.1744 21.7429 16.0924 21.9269C16.0105 22.1109 15.9664 22.3095 15.9628 22.511C15.9593 22.7124 15.9963 22.9124 16.0718 23.0992C16.1472 23.286 16.2595 23.4556 16.4019 23.5981C16.5444 23.7405 16.714 23.8528 16.9008 23.9282C17.0876 24.0037 17.2876 24.0407 17.489 24.0372C17.6905 24.0336 17.8891 23.9895 18.0731 23.9076C18.2571 23.8256 18.4227 23.7074 18.56 23.56L20.952 21.17C21.846 21.698 22.888 22 24 22C25.112 22 26.154 21.698 27.048 21.17L29.44 23.56C29.5773 23.7074 29.7429 23.8256 29.9269 23.9076C30.1109 23.9895 30.3095 24.0336 30.511 24.0372C30.7124 24.0407 30.9124 24.0037 31.0992 23.9282C31.286 23.8528 31.4556 23.7405 31.5981 23.5981C31.7405 23.4556 31.8528 23.286 31.9282 23.0992C32.0037 22.9124 32.0407 22.7124 32.0372 22.511C32.0336 22.3095 31.9895 22.1109 31.9076 21.9269C31.8256 21.7429 31.7074 21.5773 31.56 21.44L29.17 19.048C29.698 18.154 30 17.112 30 16C30 14.888 29.698 13.846 29.17 12.952L31.56 10.56C31.825 10.2757 31.9692 9.89956 31.9623 9.51096C31.9555 9.12235 31.7981 8.75158 31.5232 8.47676C31.2484 8.20193 30.8776 8.04451 30.489 8.03765C30.1004 8.03079 29.7243 8.17504 29.44 8.44L27.048 10.83C26.1249 10.2848 25.0721 9.99806 24 10C22.888 10 21.846 10.302 20.952 10.83L18.56 8.44Z" fill="#575757" />
                  </svg>
                </span>
              </h2>

                <div class="phone_country">
                  <span>Phone</span>
                  <div class="flag_cnty">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
                    <form id="registration-form" class="formpaddsettingss logss" method="POST"  action="{{ route('sendOtp') }}">
                        	@csrf
                          <input id="phoneNumber" type="text" readonly name="phone" value="{{$user->phone}}" Placeholder="9988776655"  onkeyup="if (event.keyCode === 13)" />
<script>
  const phoneInputField = document.querySelector("#phoneNumber");
  const phoneInput = window.intlTelInput(phoneInputField, {
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    initialCountry: "in" // Set initial country to India
  });

</script>
<script>
    // Function to clean the phone number value
    function cleanPhoneNumber() {
        // Get the input field
        var phoneNumberField = document.getElementById('phoneNumber');
        
        // Get the current value of the input
        var phoneValue = phoneNumberField.value;

        // Remove leading zeros and spaces from the phone number
        var cleanedPhoneValue = phoneValue.replace(/^0+|\s+/g, '');

        // Update the input field with the cleaned value
        phoneNumberField.value = cleanedPhoneValue;
    }

    // Run the function every second
    setInterval(cleanPhoneNumber, 1000);
</script>

                  </div>
                </div>
                <!-- <div id="recaptcha-container"></div> -->
                <div class="botto_btn_nt">
                  <!-- <button type="button" onclick="sendOTP()" id="submit-button" class="btn btn-primary btn-block btn-square" style="border-radius:5px;">Send OTP <span> -->
                  <button type="button"  id="submit-button" class="btn btn-primary btn-block btn-square" style="border-radius:5px;">Send OTP <span>
                      <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.0625 9.5625L2.8125 9.5625C2.66332 9.5625 2.52024 9.50324 2.41475 9.39775C2.30926 9.29226 2.25 9.14918 2.25 9C2.25 8.85082 2.30926 8.70774 2.41475 8.60225C2.52024 8.49676 2.66332 8.4375 2.8125 8.4375L14.0625 8.4375C14.2117 8.4375 14.3548 8.49676 14.4602 8.60225C14.5657 8.70774 14.625 8.85082 14.625 9C14.625 9.14918 14.5657 9.29226 14.4602 9.39775C14.3548 9.50324 14.2117 9.5625 14.0625 9.5625Z" fill="white"></path>
                        <path d="M13.8296 8.99999L9.16422 4.33574C9.0586 4.23012 8.99926 4.08686 8.99926 3.93749C8.99926 3.78812 9.0586 3.64486 9.16422 3.53924C9.26984 3.43362 9.4131 3.37428 9.56247 3.37428C9.71184 3.37428 9.8551 3.43362 9.96072 3.53924L15.0232 8.60174C15.0756 8.65399 15.1172 8.71607 15.1455 8.7844C15.1739 8.85274 15.1885 8.926 15.1885 8.99999C15.1885 9.07398 15.1739 9.14724 15.1455 9.21558C15.1172 9.28392 15.0756 9.34599 15.0232 9.39824L9.96072 14.4607C9.8551 14.5664 9.71184 14.6257 9.56247 14.6257C9.4131 14.6257 9.26984 14.5664 9.16422 14.4607C9.0586 14.3551 8.99926 14.2119 8.99926 14.0625C8.99926 13.9131 9.0586 13.7699 9.16422 13.6642L13.8296 8.99999Z" fill="white"></path>
                      </svg>
                    </span>
                  </button>
                    </form>
                </div>
              </div>
    

              <!-- second step start -->
              <div class="volt_round_second" id="otpVerification" style="display: none;">
              <div class="comman_loderr" id="customLoader">
              <div class="loder_wraper_inn_pos">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"> </div>
      <div class="dot"></div>
    </div>
                            </div>
              <h2>Setting up your Vault <span>
              <svg width="40" height="32" viewBox="0 0 40 32" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M29.17 19.048C29.698 18.154 30 17.112 30 16C30 14.888 29.698 13.846 29.17 12.952L31.56 10.56C31.825 10.2757 31.9692 9.89956 31.9623 9.51096C31.9555 9.12235 31.7981 8.75158 31.5232 8.47676C31.2484 8.20193 30.8776 8.04451 30.489 8.03765C30.1004 8.03079 29.7243 8.17504 29.44 8.44L27.048 10.83C26.1249 10.2848 25.0721 9.99806 24 10C22.888 10 21.846 10.302 20.952 10.83L18.56 8.44C18.4227 8.29263 18.2571 8.17442 18.0731 8.09244C17.8891 8.01045 17.6905 7.96637 17.489 7.96282C17.2876 7.95926 17.0876 7.99631 16.9008 8.07175C16.714 8.1472 16.5444 8.25949 16.4019 8.40192C16.2595 8.54436 16.1472 8.71403 16.0718 8.9008C15.9963 9.08758 15.9593 9.28764 15.9628 9.48904C15.9664 9.69045 16.0105 9.88908 16.0924 10.0731C16.1744 10.2571 16.2926 10.4227 16.44 10.56L18.83 12.952C18.2847 13.875 17.998 14.9279 18 16C18 17.112 18.302 18.154 18.83 19.048L16.44 21.44C16.2926 21.5773 16.1744 21.7429 16.0924 21.9269C16.0105 22.1109 15.9664 22.3095 15.9628 22.511C15.9593 22.7124 15.9963 22.9124 16.0718 23.0992C16.1472 23.286 16.2595 23.4556 16.4019 23.5981C16.5444 23.7405 16.714 23.8528 16.9008 23.9282C17.0876 24.0037 17.2876 24.0407 17.489 24.0372C17.6905 24.0336 17.8891 23.9895 18.0731 23.9076C18.2571 23.8256 18.4227 23.7074 18.56 23.56L20.952 21.17C21.846 21.698 22.888 22 24 22C25.112 22 26.154 21.698 27.048 21.17L29.44 23.56C29.5773 23.7074 29.7429 23.8256 29.9269 23.9076C30.1109 23.9895 30.3095 24.0336 30.511 24.0372C30.7124 24.0407 30.9124 24.0037 31.0992 23.9282C31.286 23.8528 31.4556 23.7405 31.5981 23.5981C31.7405 23.4556 31.8528 23.286 31.9282 23.0992C32.0037 22.9124 32.0407 22.7124 32.0372 22.511C32.0336 22.3095 31.9895 22.1109 31.9076 21.9269C31.8256 21.7429 31.7074 21.5773 31.56 21.44L29.17 19.048ZM24 19C23.2044 19 22.4413 18.6839 21.8787 18.1213C21.3161 17.5587 21 16.7956 21 16C21 15.2044 21.3161 14.4413 21.8787 13.8787C22.4413 13.3161 23.2044 13 24 13C24.7956 13 25.5587 13.3161 26.1213 13.8787C26.6839 14.4413 27 15.2044 27 16C27 16.7956 26.6839 17.5587 26.1213 18.1213C25.5587 18.6839 24.7956 19 24 19ZM9 7.5C9 7.10218 8.84196 6.72064 8.56066 6.43934C8.27936 6.15804 7.89782 6 7.5 6C7.10218 6 6.72064 6.15804 6.43934 6.43934C6.15804 6.72064 6 7.10218 6 7.5V24.5C6 24.8978 6.15804 25.2794 6.43934 25.5607C6.72064 25.842 7.10218 26 7.5 26C7.89782 26 8.27936 25.842 8.56066 25.5607C8.84196 25.2794 9 24.8978 9 24.5V7.5ZM0 7.5C0 5.51088 0.790176 3.60322 2.1967 2.1967C3.60322 0.790176 5.51088 0 7.5 0H32.5C34.4891 0 36.3968 0.790176 37.8033 2.1967C39.2098 3.60322 40 5.51088 40 7.5V24.5C40 26.4891 39.2098 28.3968 37.8033 29.8033C36.3968 31.2098 34.4891 32 32.5 32H7.5C5.51088 32 3.60322 31.2098 2.1967 29.8033C0.790176 28.3968 0 26.4891 0 24.5V7.5ZM7.5 3C6.30653 3 5.16193 3.47411 4.31802 4.31802C3.47411 5.16193 3 6.30653 3 7.5V24.5C3 25.6935 3.47411 26.8381 4.31802 27.682C5.16193 28.5259 6.30653 29 7.5 29H32.5C33.6935 29 34.8381 28.5259 35.682 27.682C36.5259 26.8381 37 25.6935 37 24.5V7.5C37 6.30653 36.5259 5.16193 35.682 4.31802C34.8381 3.47411 33.6935 3 32.5 3H7.5Z" fill="#575757"/>
              </svg>
              </span>
              </h2>
              <div class="fomt_oppt">
              <div id="timer"><span>Resend OTP</span> in 1:00</div>
             
                <div class="formm">
               
                <input type="text" class="form-control" id="otp" placeholder="Enter OTP">
   
              </div>

                    <div class="botto_btn_nt">
                  <button type="button" class="btn btn-primary btn-block btn-square ootpbtn" id="veri_fy_otp"  onclick="verifyOTP()" style="border-radius:5px;">Verify <span>
                      <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.0625 9.5625L2.8125 9.5625C2.66332 9.5625 2.52024 9.50324 2.41475 9.39775C2.30926 9.29226 2.25 9.14918 2.25 9C2.25 8.85082 2.30926 8.70774 2.41475 8.60225C2.52024 8.49676 2.66332 8.4375 2.8125 8.4375L14.0625 8.4375C14.2117 8.4375 14.3548 8.49676 14.4602 8.60225C14.5657 8.70774 14.625 8.85082 14.625 9C14.625 9.14918 14.5657 9.29226 14.4602 9.39775C14.3548 9.50324 14.2117 9.5625 14.0625 9.5625Z" fill="white"></path>
                        <path d="M13.8296 8.99999L9.16422 4.33574C9.0586 4.23012 8.99926 4.08686 8.99926 3.93749C8.99926 3.78812 9.0586 3.64486 9.16422 3.53924C9.26984 3.43362 9.4131 3.37428 9.56247 3.37428C9.71184 3.37428 9.8551 3.43362 9.96072 3.53924L15.0232 8.60174C15.0756 8.65399 15.1172 8.71607 15.1455 8.7844C15.1739 8.85274 15.1885 8.926 15.1885 8.99999C15.1885 9.07398 15.1739 9.14724 15.1455 9.21558C15.1172 9.28392 15.0756 9.34599 15.0232 9.39824L9.96072 14.4607C9.8551 14.5664 9.71184 14.6257 9.56247 14.6257C9.4131 14.6257 9.26984 14.5664 9.16422 14.4607C9.0586 14.3551 8.99926 14.2119 8.99926 14.0625C8.99926 13.9131 9.0586 13.7699 9.16422 13.6642L13.8296 8.99999Z" fill="white"></path>
                      </svg>
                    </span>
                  </button>
                </div>
                <div id="verificationResult" style="display: none;"></div>


    </div>
              </div>

              <script>
  $(document).ready(function() {
    // Send OTP on button click
    $('#submit-button').on('click', function() {
      var phoneNumber = $('#phoneNumber').val();
      
      // AJAX request to send OTP
      $.ajax({
        url: '{{ route("sendOtp") }}',
        type: 'POST',
        data: {
          _token: '{{ csrf_token() }}',
          phone: phoneNumber
        },
        success: function(response) {
          Swal.fire({
            icon: 'success',
            title: 'OTP Sent',
            text: response.message
          });
        },
        error: function(xhr) {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: xhr.responseJSON.message
          });
        }
      });
    });
  });
</script>
<script>
function showLoader() {
  document.getElementById('customLoader').style.display = 'block';
}

// Function to hide the loader
function hideLoader() {
  document.getElementById('customLoader').style.display = 'none';
}
document.getElementById('phoneNumber').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        // Prevent the default form submission behavior
        event.preventDefault();
       
    }
});
document.getElementById('phoneNumbers').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        // Prevent the default form submission behavior
        event.preventDefault();
       
    }
});





  function showToaster(message) {
    var toaster = document.getElementById("toaster");
    toaster.innerText = message;
    toaster.className = "toaster show";
    setTimeout(function() {
      toaster.className = toaster.className.replace("show", "");
    }, 3000);
  }

  function verifyOTP() {
    document.getElementById('veri_fy_otp').disabled = true;
    // Change the button color
    document.getElementById('veri_fy_otp').style.backgroundColor = 'gray';
    const otp = document.getElementById('otp').value;
    window.confirmationResult.confirm(otp)
      .then((result) => {
        // OTP verified successfully
        console.log('OTP verified successfully');
        showToaster('OTP verified successfully');
        // Redirect after a short delay to allow the toaster to show
        setTimeout(() => {
          window.location.href = '/user/welcomewallet';
        }, 3000);
      }).catch((error) => {
        // OTP verification failed
        console.error('Error verifying OTP:', error);
        showToaster('Error verifying OTP');
      }).finally(() => {
        setTimeout(hideLoader, 3000);
      });
  }




</script>

<style>
  .volt_round_zero,
   {
    display: block;
  }
</style>
<style>
    .toaster {
      visibility: hidden;
      min-width: 250px;
      margin-left: -125px;
      background-color: #333;
      color: #fff;
      text-align: center;
      border-radius: 2px;
      padding: 16px;
      position: fixed;
      z-index: 1;
      left: 50%;
      bottom: 30px;
      font-size: 17px;
    }

    .toaster.show {
      visibility: visible;
      -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
      animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @-webkit-keyframes fadein {
      from {bottom: 0; opacity: 0;} 
      to {bottom: 30px; opacity: 1;}
    }

    @keyframes fadein {
      from {bottom: 0; opacity: 0;}
      to {bottom: 30px; opacity: 1;}
    }

    @-webkit-keyframes fadeout {
      from {bottom: 30px; opacity: 1;} 
      to {bottom: 0; opacity: 0;}
    }

    @keyframes fadeout {
      from {bottom: 30px; opacity: 1;}
      to {bottom: 0; opacity: 0;}
    }
  </style>
<div id="toaster" class="toaster">OTP verified successfully</div>

         
             
              <div class="volt_round_fourth" id="downloadSection1"  style="display: none;">
              <div class="comman_loderr" id="customLoader">
              <div class="loder_wraper_inn_pos">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"> </div>
      <div class="dot"></div>
    </div>
                            </div>

              <h2>Continue to your Vault <span>
              <svg width="40" height="32" viewBox="0 0 40 32" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M29.17 19.048C29.698 18.154 30 17.112 30 16C30 14.888 29.698 13.846 29.17 12.952L31.56 10.56C31.825 10.2757 31.9692 9.89956 31.9623 9.51096C31.9555 9.12235 31.7981 8.75158 31.5232 8.47676C31.2484 8.20193 30.8776 8.04451 30.489 8.03765C30.1004 8.03079 29.7243 8.17504 29.44 8.44L27.048 10.83C26.1249 10.2848 25.0721 9.99806 24 10C22.888 10 21.846 10.302 20.952 10.83L18.56 8.44C18.4227 8.29263 18.2571 8.17442 18.0731 8.09244C17.8891 8.01045 17.6905 7.96637 17.489 7.96282C17.2876 7.95926 17.0876 7.99631 16.9008 8.07175C16.714 8.1472 16.5444 8.25949 16.4019 8.40192C16.2595 8.54436 16.1472 8.71403 16.0718 8.9008C15.9963 9.08758 15.9593 9.28764 15.9628 9.48904C15.9664 9.69045 16.0105 9.88908 16.0924 10.0731C16.1744 10.2571 16.2926 10.4227 16.44 10.56L18.83 12.952C18.2847 13.875 17.998 14.9279 18 16C18 17.112 18.302 18.154 18.83 19.048L16.44 21.44C16.2926 21.5773 16.1744 21.7429 16.0924 21.9269C16.0105 22.1109 15.9664 22.3095 15.9628 22.511C15.9593 22.7124 15.9963 22.9124 16.0718 23.0992C16.1472 23.286 16.2595 23.4556 16.4019 23.5981C16.5444 23.7405 16.714 23.8528 16.9008 23.9282C17.0876 24.0037 17.2876 24.0407 17.489 24.0372C17.6905 24.0336 17.8891 23.9895 18.0731 23.9076C18.2571 23.8256 18.4227 23.7074 18.56 23.56L20.952 21.17C21.846 21.698 22.888 22 24 22C25.112 22 26.154 21.698 27.048 21.17L29.44 23.56C29.5773 23.7074 29.7429 23.8256 29.9269 23.9076C30.1109 23.9895 30.3095 24.0336 30.511 24.0372C30.7124 24.0407 30.9124 24.0037 31.0992 23.9282C31.286 23.8528 31.4556 23.7405 31.5981 23.5981C31.7405 23.4556 31.8528 23.286 31.9282 23.0992C32.0037 22.9124 32.0407 22.7124 32.0372 22.511C32.0336 22.3095 31.9895 22.1109 31.9076 21.9269C31.8256 21.7429 31.7074 21.5773 31.56 21.44L29.17 19.048ZM24 19C23.2044 19 22.4413 18.6839 21.8787 18.1213C21.3161 17.5587 21 16.7956 21 16C21 15.2044 21.3161 14.4413 21.8787 13.8787C22.4413 13.3161 23.2044 13 24 13C24.7956 13 25.5587 13.3161 26.1213 13.8787C26.6839 14.4413 27 15.2044 27 16C27 16.7956 26.6839 17.5587 26.1213 18.1213C25.5587 18.6839 24.7956 19 24 19ZM9 7.5C9 7.10218 8.84196 6.72064 8.56066 6.43934C8.27936 6.15804 7.89782 6 7.5 6C7.10218 6 6.72064 6.15804 6.43934 6.43934C6.15804 6.72064 6 7.10218 6 7.5V24.5C6 24.8978 6.15804 25.2794 6.43934 25.5607C6.72064 25.842 7.10218 26 7.5 26C7.89782 26 8.27936 25.842 8.56066 25.5607C8.84196 25.2794 9 24.8978 9 24.5V7.5ZM0 7.5C0 5.51088 0.790176 3.60322 2.1967 2.1967C3.60322 0.790176 5.51088 0 7.5 0H32.5C34.4891 0 36.3968 0.790176 37.8033 2.1967C39.2098 3.60322 40 5.51088 40 7.5V24.5C40 26.4891 39.2098 28.3968 37.8033 29.8033C36.3968 31.2098 34.4891 32 32.5 32H7.5C5.51088 32 3.60322 31.2098 2.1967 29.8033C0.790176 28.3968 0 26.4891 0 24.5V7.5ZM7.5 3C6.30653 3 5.16193 3.47411 4.31802 4.31802C3.47411 5.16193 3 6.30653 3 7.5V24.5C3 25.6935 3.47411 26.8381 4.31802 27.682C5.16193 28.5259 6.30653 29 7.5 29H32.5C33.6935 29 34.8381 28.5259 35.682 27.682C36.5259 26.8381 37 25.6935 37 24.5V7.5C37 6.30653 36.5259 5.16193 35.682 4.31802C34.8381 3.47411 33.6935 3 32.5 3H7.5Z" fill="#575757"/>
              </svg>
              </span>
              </h2>

              <div class="only_continue">
              <div class="botto_btn_nt">
                  <a href="{{url('/user/welcomewallet')}}"><button type="submit" class="btn btn-primary btn-block btn-square" style="border-radius:5px;">Continue <span>
                      <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.0625 9.5625L2.8125 9.5625C2.66332 9.5625 2.52024 9.50324 2.41475 9.39775C2.30926 9.29226 2.25 9.14918 2.25 9C2.25 8.85082 2.30926 8.70774 2.41475 8.60225C2.52024 8.49676 2.66332 8.4375 2.8125 8.4375L14.0625 8.4375C14.2117 8.4375 14.3548 8.49676 14.4602 8.60225C14.5657 8.70774 14.625 8.85082 14.625 9C14.625 9.14918 14.5657 9.29226 14.4602 9.39775C14.3548 9.50324 14.2117 9.5625 14.0625 9.5625Z" fill="white"></path>
                        <path d="M13.8296 8.99999L9.16422 4.33574C9.0586 4.23012 8.99926 4.08686 8.99926 3.93749C8.99926 3.78812 9.0586 3.64486 9.16422 3.53924C9.26984 3.43362 9.4131 3.37428 9.56247 3.37428C9.71184 3.37428 9.8551 3.43362 9.96072 3.53924L15.0232 8.60174C15.0756 8.65399 15.1172 8.71607 15.1455 8.7844C15.1739 8.85274 15.1885 8.926 15.1885 8.99999C15.1885 9.07398 15.1739 9.14724 15.1455 9.21558C15.1172 9.28392 15.0756 9.34599 15.0232 9.39824L9.96072 14.4607C9.8551 14.5664 9.71184 14.6257 9.56247 14.6257C9.4131 14.6257 9.26984 14.5664 9.16422 14.4607C9.0586 14.3551 8.99926 14.2119 8.99926 14.0625C8.99926 13.9131 9.0586 13.7699 9.16422 13.6642L13.8296 8.99999Z" fill="white"></path>
                      </svg>
                    </span>
                  </button></a>
                </div>
                    </div>


              </div>
          
              <!-- fourth step end -->
            </div>
          </div>
          <div class="col-sm-5">
            <div class="ss-image">
              <img src="../assets/images/ss-speed.png" alt="img">
            </div>
          </div>
        </div>
      </div>
      <!-- Container-fluid end-->
    </div>
  </div>
</div> 



@endsection