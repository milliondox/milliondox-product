<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="tivo admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Tivo admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <title>User - Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/feather-icon.css">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/client-custom.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
         <!-- darkmode remove js-->
    <script>
window.onload = function() {
    document.body.classList.remove('dark-only');
};
    </script>
    <!-- darkmode remove js-->
  
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
    <!-- aos animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
    </div>
    <!-- Loader ends-->
    <!-- login page start-->
    <div id="toaster" class="toaster"></div>
    <div class="container-fluid login_board">
      <div class="row">
        <div class="col-sm-5" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1000">
          <div class="loginn_nt_form">
            <div class="fomr_head">
              <!-- <div class="back_nt"><buttton id="back_nt"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
																												xmlns="http://www.w3.org/2000/svg"><path d="M4.375 9.375H16.875C17.0408 9.375 17.1997 9.44085 17.3169 9.55806C17.4342 9.67527 17.5 9.83424 17.5 10C17.5 10.1658 17.4342 10.3247 17.3169 10.4419C17.1997 10.5592 17.0408 10.625 16.875 10.625H4.375C4.20924 10.625 4.05027 10.5592 3.93306 10.4419C3.81585 10.3247 3.75 10.1658 3.75 10C3.75 9.83424 3.81585 9.67527 3.93306 9.55806C4.05027 9.44085 4.20924 9.375 4.375 9.375Z" fill="black" /><path d="M4.63365 10L9.8174 15.1825C9.93475 15.2999 10.0007 15.459 10.0007 15.625C10.0007 15.791 9.93475 15.9501 9.8174 16.0675C9.70004 16.1849 9.54087 16.2508 9.3749 16.2508C9.20893 16.2508 9.04975 16.1849 8.9324 16.0675L3.3074 10.4425C3.24919 10.3844 3.20301 10.3155 3.17151 10.2395C3.14 10.1636 3.12378 10.0822 3.12378 10C3.12378 9.91779 3.14 9.83639 3.17151 9.76046C3.20301 9.68453 3.24919 9.61556 3.3074 9.5575L8.9324 3.9325C9.04975 3.81515 9.20893 3.74921 9.3749 3.74921C9.54087 3.74921 9.70004 3.81515 9.8174 3.9325C9.93475 4.04986 10.0007 4.20903 10.0007 4.375C10.0007 4.54097 9.93475 4.70015 9.8174 4.8175L4.63365 10Z" fill="black" /></svg></button></div> -->
              <p>Already have an account? <a href="{{url('/login')}}">Login</a>
              </p>
              <div class="login_logo">
                <a href="https://milliondox.com/" class="logo">
                <img src="https://milliondox.com/assets/img/logo.webp" alt="logo" class="img-fluid">
                </a>
                </div>
            </div>
            <div class="login_forrm regestirr">
              <div class="last_flid">
              <h2>Sign Up</h2>

              <!-- <div class="or_login">
                      <span>or</span>
                      <div class="two_option">
                        <a href="{{url('/auth/google')}}">
                          <img src="../assets/images/sign-google.png" alt="img">
                        </a>
                      </div>
                    </div> -->

</div>
              <div class="comman_loderr" id="customLoader">
              <div class="loder_wraper_inn_pos">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"> </div>
      <div class="dot"></div>
    </div>
                            </div>
                            
                            



  <form id="myForm" action="{{ route('storeregister') }}" method="POST">
    @csrf
    <div class="rers_pages">
        <div class="page page1">
            <div class="form-group fild_ntt">
            <label for="fname">First Name <span class="red_star">*</span></label>
                <input type="text" id="first_name" name="first_name" placeholder="" autofocus>
                <span id="first_name_error" style="display:none; color:red;"></span>
            </div>
            <div class="form-group fild_ntt">
            <label for="lname">Last Name <span class="red_star">*</span></label>
                <input type="text" id="last_name" name="last_name" placeholder="">
                <span id="last_name_error" style="display:none; color:red;"></span>
            </div>
            <div class="form-group fild_ntt">
            <label for="emailotp">E-mail <span class="red_star">*</span></label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" placeholder="" >

                @error('email') <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span> @enderror
                <span id="email_error" style="display:none; color:red;"></span>
            </div>
            <div class="form-group fild_ntt">
                <div class="form-input position-relative">
                <label for="password">Password <span class="red_star">*</span></label>
                 <div class="form-group fild_ntt">
                <b class="toggle-password"><i class="fas fa-eye"></i></b>
                    <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="" placeholder="">

<span id="password-strength-text" style="display: block; margin-top: 5px; color: red;"></span>
        
                    @error('password') <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> @enderror
                    <span id="password_error" style="display:none; color:red;"></span>
                </div>
                </div>
            </div>
            <div class="form-group fild_ntt">
                <div class="form-input position-relative">
                <label for="password-confirm">Confirm Password <span class="red_star">*</span></label>
                 <div class="form-group fild_ntt">
                <b class="toggle-password"><i class="fas fa-eye"></i></b>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="">
 <span id="password-confirm-strength-text" style="display: block; margin-top: 5px; color: red;"></span>
        
                    <span id="password-confirm_error" style="display:none; color:red;"></span> <!-- Corrected ID -->
                    </div>
                </div>
            </div>
        </div>

        <div class="page page3 hidden">
            <div class="form-group fild_ntt">
    <label for="Enter_OTP">Enter OTP sent to your E-mail <span class="red_star">*</span></label>
    <input type="text" id="email_otp" name="email_otp" placeholder="">
    <button type="button" class="send_otp" id="sendEmailOtp">Send OTP</button>
    <button type="button" class="resend_otp hidden" id="resendEmailOtp">Resend OTP</button>
    <span id="otp-timer" style="color: red;"></span> <!-- Timer display -->
    <span id="emailOtpError" class="text-danger"></span>
</div>

            <div id="sessionMessage" class="alert" role="alert">
                <!-- Session messages will appear here -->
            </div>
            
            <div class="rop_regseter">
<input type="checkbox" id="check_regs" name="check_reg" value="1" disabled  required>
<label for="">
Read the policy <a data-bs-toggle="modal" data-bs-target="#term_regester">Click here</a>
</label>
</div>
<div class="term_sshoww" style="display:none;">
    <p>You must agree to the terms and conditions before continuing</p>
</div>

            
            <div class="form-group mb-0 last_flid">
                <div class="botto_btn_nt">
                    <button type="submit" class="btn btn-primary btn-block btn-square" style="border-radius:5px;"><b>Sign Up </b><span>
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.0625 9.5625L2.8125 9.5625C2.66332 9.5625 2.52024 9.50324 2.41475 9.39775C2.30926 9.29226 2.25 9.14918 2.25 9C2.25 8.85082 2.30926 8.70774 2.41475 8.60225C2.52024 8.49676 2.66332 8.4375 2.8125 8.4375L14.0625 8.4375C14.2117 8.4375 14.3548 8.49676 14.4602 8.60225C14.5657 8.70774 14.625 8.85082 14.625 9C14.625 9.14918 14.5657 9.29226 14.4602 9.39775C14.3548 9.50324 14.2117 9.5625 14.0625 9.5625Z" fill="white" />
                                <path d="M13.8296 8.99999L9.16422 4.33574C9.0586 4.23012 8.99926 4.08686 8.99926 3.93749C8.99926 3.78812 9.0586 3.64486 9.16422 3.53924C9.26984 3.43362 9.4131 3.37428 9.56247 3.37428C9.71184 3.37428 9.8551 3.43362 9.96072 3.53924L15.0232 8.60174C15.0756 8.65399 15.1172 8.71607 15.1455 8.7844C15.1739 8.85274 15.1885 8.926 15.1885 8.99999C15.1885 9.07398 15.1739 9.14724 15.1455 9.21558C15.1172 9.28392 15.0756 9.34599 15.0232 9.39824L9.96072 14.4607C9.8551 14.5664 9.71184 14.6257 9.56247 14.6257C9.4131 14.6257 9.26984 14.5664 9.16422 14.4607C9.0586 14.3551 8.99926 14.2119 8.99926 14.0625C8.99926 13.9131 9.0586 13.7699 9.16422 13.6642L13.8296 8.99999Z" fill="white" />
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
            <div class="last-message">
                <p>By clicking “Sign Up” or “Continue with Google” above, you acknowledge that you have read and understood, and agree to Milliondox's Terms & Conditions and Privacy Policy.</p>
            </div>
        </div>
    </div>
    <div class="next_pre">
        <button type="button" id="backBtn" class="hidden">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0.5" y="-0.5" width="29" height="29" rx="14.5" transform="matrix(1 0 0 -1 0 29)" stroke="black" />
                <path d="M9.21345 15.5415H21.3339C21.4947 15.5415 21.6488 15.4776 21.7624 15.3639C21.8761 15.2502 21.9399 15.0959 21.9399 14.9351C21.9399 14.7742 21.8761 14.62 21.7624 14.5063C21.6488 14.3925 21.4947 14.3287 21.3339 14.3287H9.21345C9.05272 14.3287 8.89857 14.3925 8.78492 14.5063C8.67127 14.62 8.60742 14.7742 8.60742 14.9351C8.60742 15.0959 8.67127 15.2502 8.78492 15.3639C8.89857 15.4776 9.05272 15.5415 9.21345 15.5415Z" fill="black" />
                <path d="M9.46402 14.9349L14.4904 9.90645C14.6042 9.79264 14.6681 9.63817 14.6681 9.47711C14.6681 9.31614 14.6042 9.16167 14.4904 9.04775C14.3766 8.93394 14.2222 8.87 14.0613 8.87C13.9004 8.87 13.746 8.93394 13.6322 9.04775L8.17804 14.5056C8.1216 14.562 8.07682 14.6289 8.04627 14.7026C8.01573 14.7762 8 14.8552 8 14.9349C8 15.0147 8.01573 15.0937 8.04627 15.1674C8.07682 15.2411 8.1216 15.308 8.17804 15.3643L13.6322 20.8222C13.746 20.936 13.9004 21 14.0613 21C14.2222 21 14.3766 20.936 14.4904 20.8222C14.6042 20.7083 14.6681 20.5538 14.6681 20.3928C14.6681 20.2318 14.6042 20.0773 14.4904 19.9635L9.46402 14.9349Z" fill="black" />
            </svg>
        </button>
        <button type="button" id="nextBtn" >
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="29.5" y="29.5" width="29" height="29" rx="14.5" transform="rotate(180 29.5 29.5)" stroke="black" />
                <path d="M20.7866 15.5415H8.66608C8.50532 15.5415 8.35124 15.4776 8.2376 15.3639C8.12386 15.2502 8.06006 15.0959 8.06006 14.9351C8.06006 14.7742 8.12386 14.62 8.2376 14.5063C8.35124 14.3925 8.50532 14.3287 8.66608 14.3287H20.7866C20.9473 14.3287 21.1014 14.3925 21.2151 14.5063C21.3287 14.62 21.3926 14.7742 21.3926 14.9351C21.3926 15.0959 21.3287 15.2502 21.2151 15.3639C21.1014 15.4776 20.9473 15.5415 20.7866 15.5415Z" fill="black" />
                <path d="M20.536 14.9349L15.5096 9.90645C15.3958 9.79264 15.3319 9.63817 15.3319 9.47711C15.3319 9.31614 15.3958 9.16167 15.5096 9.04775C15.6234 8.93394 15.7778 8.87 15.9387 8.87C16.0996 8.87 16.254 8.93394 16.3678 9.04775L21.822 14.5056C21.8784 14.562 21.9232 14.6289 21.9537 14.7026C21.9843 14.7762 22 14.8552 22 14.9349C22 15.0147 21.9843 15.0937 21.9537 15.1674C21.9232 15.2411 21.8784 15.308 21.822 15.3643L16.3678 20.8222C16.254 20.936 16.0996 21 15.9387 21C15.7778 21 15.6234 20.936 15.5096 20.8222C15.3958 20.7083 15.3319 20.5538 15.3319 20.3928C15.3319 20.2318 15.3958 20.0773 15.5096 19.9635L20.536 14.9349Z" fill="black" />
            </svg>
        </button>
    </div>
</form>

            </div>
          </div>
        </div>




        
        <div class="col-sm-7" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="1000">
          <div class="main_voltt">
            <div class="volt_heead">
              <h2>Vault for your business docs</h2>
              <p>Manage all your business documents from a single repository</p>
            </div>
            <div class="bottm_drag_image">
              <div class="volt_image">
                <div class="main_thumb">
                  <img src="../assets/images/Medium_Security.png" alt="img">
                </div>
                <div class="single_volt_image">
                  <img src="../assets/images/MacBook_Pro.png" alt="img">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
 
      <!-- login page end-->
      <!-- login page css start-->
      


<script>

    let userInteracted = false;

    document.body.addEventListener('click', () => {
        userInteracted = true;
    });

    document.body.addEventListener('input', () => {
        userInteracted = true;
    });

    document.body.addEventListener('scroll', () => {
        userInteracted = true;
    });

    async function checkEmailExists(email) {
    try {
        let response = await fetch('{{ route("email.exists") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ email: emailotp })
        });
        let data = await response.json();
        return data.exists;
    } catch (error) {
        console.error('Error checking email:', error);
        return false;
    }
}

    function showError(fieldId, message) {
        if (userInteracted) {
            const errorElement = document.getElementById(`${fieldId}_error`);
            if (errorElement) {
                errorElement.textContent = message;
                errorElement.style.display = 'inline'; // Show error message
            }
        }
    }

    function hideError(fieldId) {
        const errorElement = document.getElementById(`${fieldId}_error`);
        if (errorElement) {
            errorElement.style.display = 'none'; // Hide error message
        }
    }

    function validateField(field) {
        const value = field.value.trim();
        const errorElement = document.getElementById(`${field.id}_error`);

        if (value === '') {
            showError(field.id, 'This field is required');
            return false;
        } else {
            hideError(field.id);
            return true;
        }
    }

    function validateForm() {
        const fields = document.querySelectorAll('#myForm .page1 input');
        let valid = true;

        fields.forEach(field => {
            if (!validateField(field)) {
                valid = false;
            }
        });

        return valid;
    }

    document.getElementById('myForm').addEventListener('submit', function(event) {
        if (!validateForm()) {
            event.preventDefault();
        } else {
            // Proceed to page 3
            document.querySelector('.page.page3').classList.remove('hidden');
        }
    });

    const nextBtn = document.getElementById('nextBtn');
    if (nextBtn) {
        nextBtn.addEventListener('click', function() {
            if (validateForm()) {
                // Proceed to page 3
                document.querySelector('.page.page3').classList.remove('hidden');
            }
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        const inputs = document.querySelectorAll('#myForm .page1 input');

        inputs.forEach(input => {
            input.addEventListener('blur', () => validateField(input));
            input.addEventListener('input', validateForm);
        });

        validateForm();
    });
</script>

      <style>
        /* .hidden {
          display: none;
        } */

        .next_pre button svg rect {
          stroke: #0066FF;
        }
        .iti.iti--allow-dropdown {
    position: relative !important;
    display: block !important;
}
.regestirr .page .iti input#phone {
    padding: 12px 10px 12px 50px;
}
.regestirr .page .resend_otp {
    position: absolute;
    border: 0;
    font-size: 12px;
    background: transparent;
    box-shadow: none;
    outline: none;
    white-space: nowrap;
    right: 3px;
    bottom: 13px;
    color: #0066FF;
    padding: 0;
     opacity: 1;
}
.regestirr .page .resend_otp[disabled] {
    opacity: 0.5;
}

.regestirr .page #otp-timer {
    position: absolute;
    border: 0;
    font-size: 12px;
    background: transparent;
    box-shadow: none;
    outline: none;
    white-space: nowrap;
    right: 3px;
    bottom: 13px;
    color: #0066FF !IMPORTANT;
    padding: 0;
    opacity: 0.5;
    left: unset;
        width: auto;
}



.regestirr .page .alert {
    padding: 0;
    text-align: center;
        margin: 0;
}
        .next_pre button svg path {
          fill: #0066FF;
        }

        .login_board .loginn_nt_form .login_forrm form .botto_btn_nt button b {
          font-weight: inherit;
          display: flex;
          white-space: nowrap;
        }

        .form-group.fild_ntt {
          position: relative;
        }

        .form-group.fild_ntt label.col-form-label {
          position: absolute;
          top: 50%;
          transform: translateY(-50%);
          width: 18px;
          height: 18px;
          padding: 0;
          z-index: 1;
          display: flex;
          align-items: center;
        }

        .next_pre {
          display: block;
          text-align: end;
        }

        .next_pre button {
          background: transparent;
          box-shadow: none;
          outline: none;
          border: 0;
          font-size: 16px;
          text-decoration: underline;
          color: #0066FF;
        }

        .next_pre button.hidden {
    display: none;
}


        .form-group.fild_ntt label.col-form-label svg {
          width: 100%;
          height: 100%;
        }

        .login_board .row {
          max-width: 1300px;
          margin: 0 auto;
          align-items: center;
          width: 100%;
          justify-content: center;
        }

        .login_board {
          padding: 30px;
          position: fixed;
          height: 100%;
          display: flex;
          align-items: center;
        }

        .last-message p {
          margin: 0;
          font-size: 11px;
          font-weight: 400;
          line-height: 1.5em;
          letter-spacing: 0em;
          text-align: left;
          color: #B3B3B3;
          margin-bottom: 10px;
        }

        .login_board .loginn_nt_form {
          box-shadow: 0px 1px 62px 0px #DFDFDF24;
          background: #FFFFFF;
          border-radius: 20px;
          padding: 40px 70px;
        }

        .login_board .loginn_nt_form .fomr_head {
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    margin-bottom: 30px;
    flex-direction: column;
    gap: 15px 0px;
}

        .login_board .loginn_nt_form .fomr_head p {
          margin: 0;
          color: #000;
          letter-spacing: normal;
          font-size: 14px;
        }

        .login_board .loginn_nt_form .fomr_head p a {
          color: #0066FF;
          letter-spacing: normal;
          border-bottom: 2px solid #DADADA;
          padding-bottom: 5px;
          transition: all .25s ease-out;
        }

        .login_board .loginn_nt_form .fomr_head p a:hover {
          padding-bottom: 3px;
          border-color: #0066FF;
        }

        .login_board .loginn_nt_form .fomr_head .back_nt {
          width: 40px;
          height: 40px;
          border: 1px solid #DADADA;
          display: flex;
          align-items: center;
          justify-content: center;
          border-radius: 50%;
          opacity: 0;
          visibility: hidden;
        }

        .login_board .loginn_nt_form .fomr_head .back_nt buttton {
          display: flex;
        }

        .login_board .loginn_nt_form .login_forrm h2 {
    font-size: 2.3vw;
    letter-spacing: normal;
    color: #000;
    line-height: normal;
    margin-bottom: 0;
}

        .login_board .loginn_nt_form .login_forrm form .form-group input {
          border: 1px solid #DADADA;
          border-radius: 0;
          padding: 12px 10px 12px 10px;
          width: 100%;
          outline: none;
        }

    .form-group.fild_ntt span {
    position: absolute;
    bottom: -17px;
    width: 100%;
    left: 0;
    font-size: 11px;
}




.form-group.fild_ntt label .red_star {
    position: relative;
    bottom: unset;
}

        .login_board .loginn_nt_form .login_forrm form .botto_btn_nt button {
          text-align: center;
          display: flex;
          align-items: center;
          position: relative;
          border-radius: 50px !important;
          padding: 10px 65px;
          height: 50px;
          font-size: 16px;
          letter-spacing: normal;
          background: linear-gradient(100.13deg, #81ACFF 14.53%, #5790FF 72.91%) !important;
          transition: all .25s ease-out;
        }

        .login_board .loginn_nt_form .login_forrm form .botto_btn_nt button:hover {
          padding: 10px 85px 10px 65px;
        }

        .login_board .loginn_nt_form .login_forrm form .botto_btn_nt button span {
          width: 40px;
          height: 40px;
          position: absolute;
          right: 3px;
          top: 50%;
          transform: translateY(-50%);
          border-radius: 50%;
          background: #FFFFFF33;
          display: flex;
          align-items: center;
          justify-content: center;
        }

        .login_board .loginn_nt_form .login_forrm .botto_btn_nt {
          margin: 20px 0px 30px;
          display: block;
        }

        .main_voltt {
          border-radius: 20px;
          padding: 140px 50px 40px;
          background: linear-gradient(100.13deg, #81ACFF 14.53%, #5790FF 72.91%);
          box-shadow: 0px 1px 5px 0px #B4B4B424;
        }

        .volt_heead {
          position: relative;
          padding-bottom: 10px;
          margin-bottom: 120px;
        }

        .volt_heead h2 {
          font-size: 40px;
          font-weight: 700;
          letter-spacing: -0.04em;
          text-align: center;
          color: #FFFFFF;
          margin-bottom: 20px;
        }

        .volt_heead p {
          font-size: 16px;
          font-weight: 400;
          line-height: 24px;
          letter-spacing: -0.04em;
          text-align: center;
          color: #E1EAFF;
          max-width: 50%;
          margin: 0 auto;
        }

        .volt_heead:before {
          content: "";
          border: 1px solid #FFFFFF87;
          width: 120px;
          position: absolute;
          bottom: 0;
          height: 1px;
          left: 0;
          right: 0;
          margin: 0 auto;
        }

        .volt_image {
          position: relative;
        }

        .volt_image .single_volt_image img {
          max-width: 100%;
          display: block;
        }

        .volt_image .main_thumb {
          display: inline-block;
          position: absolute;
          right: -4.5%;
          top: -12%;
          -webkit-animation: mover 1.5s infinite alternate;
          animation: mover 1.5s infinite alternate;
        }

        .volt_image .main_thumb img {
          max-width: 100%;
          display: block;
        }

        @-webkit-keyframes mover {
          0% {
            transform: translateY(0);
          }

          100% {
            transform: translateY(-30px);
          }
        }

        @keyframes mover {
          0% {
            transform: translateY(0);
          }

          100% {
            transform: translateY(-30px);
          }
        }




.login_forrm.regestirr .rers_pages {
    display: flex;
}
.regestirr .page {
    flex: 0 0 100%;
    transition: all 0.5s ease;
}
.regestirr .page {
    margin: 0;
    opacity: 1;
}

.regestirr .rers_pages  .next.hidden {
    margin-left: 0;
    opacity: 0;
}
.regestirr .rers_pages .prev.hidden {
    margin-left: -100%;
    opacity: 0;
}
.login_forrm.regestirr {
    overflow: hidden;
}


.login_forrm .last_flid {
    display: flex;
    align-items: center;
    padding: 0px 0px;
    margin-bottom: 40px;
}

        .login_forrm .last_flid .or_login {
          display: flex;
          align-items: center;
          padding: 6px 0px 0px 20px;
        }

        .login_forrm .last_flid .or_login span {
          font-weight: 400;
          color: #B4B4B4;
          font-size: 16px;
          padding: 0px 20px 0px 0px;
        }

        .login_forrm .last_flid .or_login .two_option {
          display: flex;
          align-items: center;
          gap: 0px 20px;
        }

        .login_forrm .last_flid .or_login .two_option a {
          width: 42px;
          height: 42px;
          display: flex;
          align-items: center;
          border: 1px solid #DADADA;
          border-radius: 50%;
          justify-content: center;
        }

        .login_forrm .last_flid .or_login .two_option a img {
          max-width: 100%;
          display: block;
          margin: 0 auto;
        }

        .login_board .loginn_nt_form .login_forrm form .page.page3 .fild_ntt input {
          padding-right: 65px;
        }

        .page.page3 .fild_ntt .send_otp {
          position: absolute;
          border: 0;
          font-size: 12px;
          background: transparent;
          box-shadow: none;
          outline: none;
          white-space: nowrap;
          right: 5px;
          bottom: 13px;
          color: #0066FF;
          padding: 0;
          opacity: 0;
          visibility: hidden;
        }
        
        /****pop start*****/
        #term_regester .modal-header {
    justify-content: center;
    background: #5b91fb;
    padding: 12px 1rem;
    border: 0;
}

#term_regester .modal-header .modal-title {
    font-size: 18px;
    text-transform: capitalize;
    font-weight: 500;
    color: #FFF;
    letter-spacing: 1px;
}

#term_regester .modal-dialog {
    max-width: 680px;
}

#term_regester .modal-dialog .modal-content {
    border: 0;
}


.form-group.mb-0.last_flid {
    padding: 0;
}

.rop_regseter {
    display: flex;
    margin: 20px 0px 0px;
    align-items: center;
    gap: 0px 5px;
}

.rop_regseter label {
    margin: 0;
    color: #B3B3B3;
    font-size: 13px;
}

.rop_regseter input {
    width: 17px;
    height: 17px;
    opacity: 0.5;
    /*pointer-events: none;*/
    position: relative;
    top: -1px;
}

.term_sshoww p {
    color: #bc0b0b;
    line-height: 1em;
    font-size: 12px;
    margin: 9px 0px 0px;
}

.rop_regseter label a {
    text-decoration: underline !IMPORTANT;
    display: inline-block;
    color: #a29a9a !important;
}

.rop_regseter input[type=checkbox]:checked {
    opacity: 1;
    pointer-events: auto;
}

#term_regester .modal-body {
    height: 70vh;
    overflow: auto;
    padding: 0;
}

.iframe_contennt {
    height: 100vh;
    position: relative;
}
.iframe_contennt embed {
    height: 100%;
    width: 100%;
    position: absolute;
    left: 0;
    top: 0;
}

#term_regester .modal-body::-webkit-scrollbar {
  display: none;
}

.btn_access_reg {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 0px;
    gap: 0px 10px;
}

.btn_access_reg button {
    box-shadow: none;
    outline: none;
    background: #5f92f7;
    color: #FFF;
    font-weight: 500;
    padding: 9px 10px;
    border-radius: 5px;
    letter-spacing: 1px;
    border: 1px solid #5f92f7;
}

.btn_access_reg button.close {
    background: transparent;
    border-color: #5f92f7;
    color: #5f92f7;
}


/****strong strenth css start****/
#password-confirm-strength-text, #password-strength-text {
    right: 0;
    text-align: right;
    font-size: 10px;
    bottom: -15px;
}
span#password-confirm-strength-text {
    display: none !IMPORTANT;
}

#password-strength-bar, #password-confirm-strength-bar {
    border-radius: 50px;
}

#password-strength-indicator, #password-confirm-strength-indicator {
    border-radius: 50px;
}

/****pop end*****/

b.toggle-password {
    position: absolute;
    right: 10px;
    top: 12px;
    cursor: pointer;
    user-select: none;
}
b.toggle-password i {
    font-size: 11px;
    color: #333;
}

.login_board .login_logo {
    display: block;
}

.login_board .login_logo a {
    display: flex;
}

.login_board .login_logo a img {
    max-width: 130px;
}

        /* media start */
        @media(max-width:1566px) {
          .main_voltt {
            padding: 50px 50px 40px;
          }

          .volt_heead h2 {
            font-size: 35px;
            margin-bottom: 15px;
          }

          .volt_heead {
            margin-bottom: 65px;
          }

          .login_board .loginn_nt_form .fomr_head {
            margin-bottom: 30px;
          }

          .login_board .loginn_nt_form .login_forrm h2 {
            margin-bottom: 0px;
          }
        }

        @media(max-width:1450px) {
          .login_board {
            position: relative;
          }

          .main_voltt {
            padding: 40px 50px 40px;
          }

          .volt_heead {
            margin-bottom: 60px;
          }

          .volt_heead h2 {
            font-size: 28px;
          }

          .volt_heead p {
            font-size: 15px;
          }

          .login_board .loginn_nt_form .login_forrm h2 {
            margin-bottom: 0px;
          }

          .login_board .loginn_nt_form .fomr_head {
            margin-bottom: 30px;
          }
        }

        @media(max-width:1199px) {
          .login_board .loginn_nt_form {
            padding: 40px 20px;
          }

          .main_voltt {
            padding: 90px 20px 40px;
          }

          .volt_heead p {
            max-width: 70%;
          }

          .volt_heead h2 {
            font-size: 30px;
          }

          .volt_image .main_thumb {
            right: -17%;
            top: -15%;
          }

          .volt_image .main_thumb img {
            max-width: 80%;
          }

          .login_board .loginn_nt_form .login_forrm form .botto_btn_nt button {
            padding: 10px 55px;
          }

          .login_board .loginn_nt_form .login_forrm form .botto_btn_nt button:hover {
            padding: 10px 60px 10px 65px;
          }
        }

        @media(max-width:992px) {
          .login_board .row .col-sm-7 {
            display: none;
          }

          .login_board {
            padding: 20px;
            background: linear-gradient(1deg, #81ACFF 14.53%, #5790FF 72.91%);
          }

          .login_board .col-sm-5 {
            padding: 0;
          }

          .login_board .loginn_nt_form .login_forrm h2 {
            font-size: 35px;
          }

          .login_board .loginn_nt_form .fomr_head {
            margin-bottom: 30px;
          }

          .login_forrm .last_flid {
            padding: 0;
          }

          .login_board {
            position: fixed;
          }

          .last-message p {
            margin: 10px 0px;
          }     
        }

        @media(max-width:576px)
        {
          .login_board .loginn_nt_form .fomr_head {
    flex-direction: row-reverse;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 15px;
}

.login_board .login_logo a img {
    max-width: 110px;
}

.login_forrm .last_flid {
    margin-bottom: 20px;
}

.login_board .loginn_nt_form {
    padding: 30px 20px 20px;
}

.login_board .loginn_nt_form .fomr_head p {
    font-size: 12px;
}

.login_board .loginn_nt_form .login_forrm h2 {
    font-size: 28px;
}

.form-group.fild_ntt {
    margin-bottom: 10px;
}

 
}
      </style>
      <!-- login page css end-->
      <!-- latest jquery-->
      <!-- <script src="../assets/js/jquery-3.6.0.min.js"></script> -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <!-- Aos animation-->
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <script>
        AOS.init();
      </script>

<script>
    $(document).ready(function() {
        var pageCount = $('.page').length;
        var currentPageIndex = 0;

        $('#nextBtn').click(async function() {
            if (await validateForm()) { // Check if form is valid before proceeding
                var email = $('#email').val().trim();
                var emailExists = await checkEmailExists(email);
                if (!emailExists) {
                    if (currentPageIndex < pageCount - 1) {
                        $('.page').eq(currentPageIndex).addClass('prev').removeClass('next');
                        currentPageIndex++;
                        updatePageVisibility();
                    }
                } else {
                    showErrorToast('User with this email already exists.');
                }
            } else {
                // Show toast message for error
                showErrorToast('Please fill in all fields correctly before proceeding.');
            }
        });

        $('#backBtn').click(function() {
            if (currentPageIndex > 0) {
                $('.page').eq(currentPageIndex).addClass('next').removeClass('prev');
                currentPageIndex--;
                updatePageVisibility();
            }
        });

        function updatePageVisibility() {
            var marginLeft = -currentPageIndex * 100;
            $('.page').removeClass('show').addClass('hidden');
            $('.page').eq(currentPageIndex).removeClass('hidden').addClass('show');
            $('.page-container').css('margin-left', marginLeft + '%');
            $('#backBtn').toggleClass('hidden', currentPageIndex === 0);
            $('#nextBtn').toggleClass('hidden', currentPageIndex === pageCount - 1);
        }

        async function validateForm() {
            // Get required fields in current page
            var fields = $('.page').eq(currentPageIndex).find('input[required]');
            var isValid = true;

            fields.each(function() {
                var field = $(this);
                var value = field.val().trim();

                // Check if field is empty
                if (value === '') {
                    showError(field.attr('id'), 'This field is required');
                    isValid = false;
                    return false; // Exit loop if any field is empty
                } else {
                    hideError(field.attr('id'));
                }

                // Additional validation for email
                if (field.attr('type') === 'email') {
                    if (!isValidEmail(value)) {
                        showError(field.attr('id'), 'Please enter a valid email address');
                        isValid = false;
                        return false; // Exit loop if email is invalid
                    }
                }

                // Additional validation for password confirmation
                if (field.attr('id') === 'password-confirm') {
                    var password = $('#password').val().trim();
                    if (password !== value) {
                        showError(field.attr('id'), 'Passwords do not match');
                        isValid = false;
                        return false; // Exit loop if passwords don't match
                    }
                }
            });

            return isValid;
        }

        function isValidEmail(email) {
            // Regular expression for email validation
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        function showError(fieldId, message) {
            if (userInteracted) {
                var errorElement = document.getElementById(`${fieldId}_error`);
                if (errorElement) {
                    errorElement.textContent = message;
                    errorElement.style.display = 'inline'; // Show error message
                }
            }
        }

        function hideError(fieldId) {
            var errorElement = document.getElementById(`${fieldId}_error`);
            if (errorElement) {
                errorElement.style.display = 'none'; // Hide error message
            }
        }

        function showErrorToast(message) {
            Toastify({
                text: message,
                duration: 3000, // Duration in milliseconds
                gravity: 'top', // Display position: 'top', 'center', 'bottom'
                backgroundColor: '#ff6347', // Toast background color
                stopOnFocus: true // Stop timeout when toast is focused
            }).showToast();
        }

        async function checkEmailExists(email) {
            try {
                let response = await fetch('{{ route("email.exists") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ email: email })
                });
                let data = await response.json();
                return data.exists;
            } catch (error) {
                console.error('Error checking email:', error);
                return false;
            }
        }
    });
</script>



<!--<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>-->


      <!-- Bootstrap js-->
      <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
      <!-- feather icon js-->
      <script src="../assets/js/icons/feather-icon/feather.min.js"></script>
      <script src="../assets/js/icons/feather-icon/feather-icon.js"></script>
      <!-- scrollbar js-->
      <!-- Sidebar jquery-->
      <script src="../assets/js/config.js"></script>
      <!-- Template js-->
      <script src="../assets/js/script.js"></script>
      <!-- login js-->
     

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Handle 'Next' button click to verify email and send OTP
    $('#nextBtn').on('click', function() {
        var email = $('#email').val();
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        
        // Check if email already exists
        $.ajax({
            url: "{{ route('checkEmailExistence') }}",
            method: "POST",
            data: {
                email: email,
            },
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(response) {
                if (response.exists) {
                    toastr.options = {
    "timeOut": 2000,  
  
};

toastr.error('Email already exists.');

// Reload the window after 5 seconds (same duration as the Toastr message)
setTimeout(function() {
    window.location.reload(true);
}, 2000);
                } else {
                    // Email does not exist, proceed to send OTP
                    sendOtp(email, first_name, last_name);
                }
            },
            error: function(xhr) {
                toastr.error(xhr.responseJSON.message);
            }
        });
    });

    // Function to send OTP
    function sendOtp(email, first_name, last_name) {
        $.ajax({
            url: "{{ route('sendOtpd') }}",
            method: "POST",
            data: {
                email: email,
                first_name: first_name,
                last_name: last_name,
            },
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(response) {
                toastr.success(response.message);
                startOtpTimer();
            },
            error: function(xhr) {
                toastr.error(xhr.responseJSON.message);
            }
        });
    }

    // Function to start OTP timer
    function startOtpTimer() {
        let timer = 60;
        const resendBtn = document.getElementById('resendEmailOtp');
        const sendBtn = document.getElementById('sendEmailOtp');
        
        resendBtn.style.display = 'none';
        sendBtn.style.display = 'none';

        const interval = setInterval(function () {
            timer--;
            document.getElementById('otp-timer').innerText = `Resend OTP in ${timer}s`;

            if (timer <= 0) {
                clearInterval(interval);
                document.getElementById('otp-timer').innerText = '';
                resendBtn.style.display = 'inline-block';
            }
        }, 1000);
    }

    // Event listener for 'Send OTP' button
    $('#sendEmailOtp').on('click', function() {
        var email = $('#email').val();
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        sendOtp(email, first_name, last_name);
    });

    // Event listener for 'Resend OTP' button
    $('#resendEmailOtp').on('click', function() {
        var email = $('#email').val();
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        sendOtp(email, first_name, last_name);
    });

    // Handle form submission for OTP verification
    $('#myForm').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        
        $.ajax({
            url: "{{ route('storeregister') }}",
            method: "POST",
            data: formData,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message);
                    setTimeout(function() {
                        window.location.href = response.redirect; // Redirect after success
                    }, 2000);
                } else {
                    toastr.error(response.message);
                }
            },
            error: function(xhr) {
                toastr.error(xhr.responseJSON.message);
            }
        });
    });
});



</script>
<script>
$(document).ready(function() {
    // Handle click event for "I AGREE" button
    $('#i_agree').on('click', function() {
        // Enable and check the checkbox
        $('#check_regs').prop('disabled', false); // Enable the checkbox
        $('#check_regs').prop('checked', true);  // Check the checkbox
    });
});
</script>


<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    </div>
    
                             <!--term pop start-->
                            <div class="modal fade" id="term_regester" tabindex="-1" role="dialog" aria-labelledby="term_regester" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">terms of services</h5>

                                  </div>
                                  <div class="modal-body">

<div class="iframe_contennt">
     <embed src="../assets/images/tc.pdf#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="100%" style="border: none;">
</div>

     <div class="btn_access_reg">
         <button id="i_agree" class="i_agree">
             I AGREE
         </button>
         
       <button id="close_bbtn" class="close" type="button" data-bs-dismiss="modal">
           I DISAGREE
    </button>
         
     </div>

                                  </div>
                                </div>
                              </div>
                            </div>
<!--term pop end-->

    <script>
        document.getElementById('i_agree').addEventListener('click', function() {
            var checkbox = document.getElementById('check_reg');
             $('#term_regester').modal('hide');
            checkbox.checked = true;
            checkbox.disabled = false;
        });
        
            document.getElementById('close_bbtn').addEventListener('click', function() {
            var termShowElement = document.querySelector('.term_sshoww');
            termShowElement.style.display = 'block';
            
            setTimeout(function() {
                termShowElement.style.display = 'none';
            }, 5000); // 5000 milliseconds = 5 seconds
        });
        
    </script>
    
        <script>
$(document).ready(function() {
    // Password validation messages for the main password field
    $('#password').on('input', function() {
        let password = $(this).val();
        let message = getPasswordValidationMessage(password);
        $('#password-strength-text').text(message).css('color', message === '' ? 'green' : 'red');

        // Show or hide error if the password is not valid
        if (password.length === 0) {
            $('#password_error').text('This field is required').css('display', 'inline');
        } else {
            $('#password_error').text('').css('display', 'none');
        }

        validatePasswordMatch(); // Check if the passwords match whenever the user types in the password field
    });

    // Password validation messages for the confirm password field
    $('#password-confirm').on('input', function() {
        let confirmPassword = $(this).val();
        let mainPassword = $('#password').val();
        let message = getPasswordValidationMessage(confirmPassword);
        
        if (confirmPassword.length === 0) {
            $('#password-confirm-strength-text').text(''); // Clear the message if the field is empty
        } else if (message !== '') {
            $('#password-confirm-strength-text').text(message).css('color', 'red');
        } else {
            $('#password-confirm-strength-text').text('').css('display', 'none');
        }

        validatePasswordMatch(); // Check if the passwords match whenever the user types in the confirm password field
    });

    function validatePasswordMatch() {
        let password = $('#password').val();
        let confirmPassword = $('#password-confirm').val();

        if (confirmPassword.length > 0 && password !== confirmPassword) {
            $('#password-confirm-strength-text').text('Passwords do not match').css('color', 'red');
        } else if (confirmPassword.length > 0 && password === confirmPassword) {
            $('#password-confirm-strength-text').text('Passwords match').css('color', 'green');
        }
    }
});

function getPasswordValidationMessage(password) {
    if (password.length < 8) {
        return 'Password cannot be less than 8 characters.';
    }
    if (/([a-zA-Z])\1{2,}/.test(password)) {
        return 'Your password contains repetitive characters. Please use a different password.';
    }
    if (/(\d)\1{2,}/.test(password)) {
        return 'Your password contains continuous numbers. Please use a different password.';
    }
    if (!/[A-Z]/.test(password)) {
        return 'Your password must include at least one uppercase letter.';
    }
    if (!/[a-z]/.test(password)) {
        return 'Your password must include at least one lowercase letter.';
    }
    if (!/[0-9]/.test(password)) {
        return 'Your password must include at least one number.';
    }
    if (!/[^A-Za-z0-9]/.test(password)) {
        return 'Your password must include at least one special character.';
    }

    return ''; // No message means the password is strong
}


    </script>
    
    
  </body>
</html>