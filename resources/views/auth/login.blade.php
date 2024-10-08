
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
    <title>User - Login</title><link rel="preconnect" href="https://fonts.googleapis.com/">
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
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
    <!-- aos animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

     <!-- darkmode remove js-->
    <script>
window.onload = function() {
    document.body.classList.remove('dark-only');
};
    </script>
    <!-- darkmode remove js-->
  </head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"> </div>
      <div class="dot"></div>
    </div>
    <!-- Loader ends-->

    <!-- login page start-->
    <div class="container-fluid login_board">
      <div class="row">
        <div class="col-sm-5" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1000">
          <div class="loginn_nt_form">
            <div class="fomr_head">
                <div class="login_logo">
                <a href="https://milliondox.com/" class="logo">
                <img src="https://milliondox.com/assets/img/logo.webp" alt="logo" class="img-fluid">
                </a>
                </div>
              <!--<div class="back_nt">-->
              <!--  <buttton id="back_nt">-->
              <!--    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">-->
              <!--      <path d="M4.375 9.375H16.875C17.0408 9.375 17.1997 9.44085 17.3169 9.55806C17.4342 9.67527 17.5 9.83424 17.5 10C17.5 10.1658 17.4342 10.3247 17.3169 10.4419C17.1997 10.5592 17.0408 10.625 16.875 10.625H4.375C4.20924 10.625 4.05027 10.5592 3.93306 10.4419C3.81585 10.3247 3.75 10.1658 3.75 10C3.75 9.83424 3.81585 9.67527 3.93306 9.55806C4.05027 9.44085 4.20924 9.375 4.375 9.375Z" fill="black" />-->
              <!--      <path d="M4.63365 10L9.8174 15.1825C9.93475 15.2999 10.0007 15.459 10.0007 15.625C10.0007 15.791 9.93475 15.9501 9.8174 16.0675C9.70004 16.1849 9.54087 16.2508 9.3749 16.2508C9.20893 16.2508 9.04975 16.1849 8.9324 16.0675L3.3074 10.4425C3.24919 10.3844 3.20301 10.3155 3.17151 10.2395C3.14 10.1636 3.12378 10.0822 3.12378 10C3.12378 9.91779 3.14 9.83639 3.17151 9.76046C3.20301 9.68453 3.24919 9.61556 3.3074 9.5575L8.9324 3.9325C9.04975 3.81515 9.20893 3.74921 9.3749 3.74921C9.54087 3.74921 9.70004 3.81515 9.8174 3.9325C9.93475 4.04986 10.0007 4.20903 10.0007 4.375C10.0007 4.54097 9.93475 4.70015 9.8174 4.8175L4.63365 10Z" fill="black" />-->
              <!--    </svg>-->
              <!--    </button>-->
              <!--</div>-->
              <!--<p>Don’t have an account? <a href="{{route('userregister')}}">Sign Up</a>-->
              <!--    </p>-->
            </div>
            <div class="login_forrm">
              <h2>Login</h2>
              <form method="POST" action="{{ route('login') }}"> @csrf 
              
              <label for="email">E-mail <span class="red_star">*</span></label>
              <div class="form-group fild_ntt">
                  <label class="col-form-label">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.6668 4.00001C14.6668 3.26667 14.0668 2.66667 13.3335 2.66667H2.66683C1.9335 2.66667 1.3335 3.26667 1.3335 4.00001V12C1.3335 12.7333 1.9335 13.3333 2.66683 13.3333H13.3335C14.0668 13.3333 14.6668 12.7333 14.6668 12V4.00001ZM13.3335 4.00001L8.00016 7.33334L2.66683 4.00001H13.3335ZM13.3335 12H2.66683V5.33334L8.00016 8.66667L13.3335 5.33334V12Z" fill="#DADADA"/>
</svg>
                  </label>                  
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email" autofocus placeholder=""> @error('email') <span class="invalid-feedback" role="alert" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    <strong>{{ $message }}</strong>
                  </span> @enderror

                </div>

                <label for="password">Password <span class="red_star">*</span></label>
                <div class="form-group fild_ntt">
                  <label class="col-form-label">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8 6.66666V9.33332M6.66667 8.66666L9.33333 7.33332M6.66667 7.33332L9.33333 8.66666M3.33333 6.66666V9.33332M2 8.66666L4.66667 7.33332M2 7.33332L4.66667 8.66666M12.6667 6.66666V9.33332M11.3333 8.66666L14 7.33332M11.3333 7.33332L14 8.66666" stroke="#DADADA" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                  </label>
                  <div class="form-input position-relative">
                  <b class="toggle-password"><i class="fas fa-eye"></i></b>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder=""> @error('password') <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span> @enderror                    
                  </div>
                </div>
                            @if ($errors->has('role'))
    <div class="alert alert-danger">
        {{ $errors->first('role') }}
    </div>
@endif
                <div class="form-group mb-0 last_flid">
                  <div class="botto_btn_nt">
                    <button type="submit" class="btn btn-primary btn-block btn-square" style="border-radius:5px;">Login <span>
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M14.0625 9.5625L2.8125 9.5625C2.66332 9.5625 2.52024 9.50324 2.41475 9.39775C2.30926 9.29226 2.25 9.14918 2.25 9C2.25 8.85082 2.30926 8.70774 2.41475 8.60225C2.52024 8.49676 2.66332 8.4375 2.8125 8.4375L14.0625 8.4375C14.2117 8.4375 14.3548 8.49676 14.4602 8.60225C14.5657 8.70774 14.625 8.85082 14.625 9C14.625 9.14918 14.5657 9.29226 14.4602 9.39775C14.3548 9.50324 14.2117 9.5625 14.0625 9.5625Z" fill="white" />
                          <path d="M13.8296 8.99999L9.16422 4.33574C9.0586 4.23012 8.99926 4.08686 8.99926 3.93749C8.99926 3.78812 9.0586 3.64486 9.16422 3.53924C9.26984 3.43362 9.4131 3.37428 9.56247 3.37428C9.71184 3.37428 9.8551 3.43362 9.96072 3.53924L15.0232 8.60174C15.0756 8.65399 15.1172 8.71607 15.1455 8.7844C15.1739 8.85274 15.1885 8.926 15.1885 8.99999C15.1885 9.07398 15.1739 9.14724 15.1455 9.21558C15.1172 9.28392 15.0756 9.34599 15.0232 9.39824L9.96072 14.4607C9.8551 14.5664 9.71184 14.6257 9.56247 14.6257C9.4131 14.6257 9.26984 14.5664 9.16422 14.4607C9.0586 14.3551 8.99926 14.2119 8.99926 14.0625C8.99926 13.9131 9.0586 13.7699 9.16422 13.6642L13.8296 8.99999Z" fill="white" />
                        </svg>
                      </span>
                    </button>
                  </div>
      
                  <!-- <div class="or_login">
                    <span>or</span>
                    <div class="two_option">
                      <a href="{{url('/auth/google')}}">
                    <img src="../assets/images/sign-google.png" alt="img">
                    </a>
                    <a href=#">
                    <img src="../assets/images/sign-apple.png" alt="img">
                    </a>
                    </div>
                    </div> -->
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
<style>
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
    left: 5px;
}

.form-group.fild_ntt label.col-form-label svg {
    width: 100%;
    height: 100%;
}

.login_board .row {
    max-width: 1300px;
    margin: 0 auto;
    align-items: center;
    width:100%;
    justify-content: center;
}

.login_board {
    padding: 30px;
    position: fixed;
    height: 100%;
    display: flex;
    align-items: center;
}

.login_board .loginn_nt_form {
    box-shadow: 0px 1px 62px 0px #DFDFDF24;
    background: #FFFFFF;
    border-radius: 20px;
    padding: 40px 70px;
}

.login_board .loginn_nt_form .fomr_head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 40px;
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
}

.login_board .loginn_nt_form .fomr_head .back_nt buttton {
    display: flex;
}

.login_board .loginn_nt_form .login_forrm h2 {
    font-size: 2.7vw;
    letter-spacing: normal;
    color: #000;
    line-height: normal;
    margin-bottom: 40px;
}

.login_board .loginn_nt_form .login_forrm form .form-group input {
    border: 1px solid #DADADA;
    border-radius: 0;
    padding: 12px 15px 12px 25px;
}

.red_star {
    color: #ff0000;
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
    margin: 40px 0px 30px;
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
    0% { transform: translateY(0); }
    100% { transform: translateY(-30px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-30px); }
}

.login_forrm .last_flid {
    display: flex;
    align-items: center;
    padding: 0px 10px;
}

.login_forrm .last_flid .or_login {
    display: flex;
    align-items: center;
    padding: 10px 0px 0px 20px;
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
    margin:  0 auto;
}

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
    max-width: 150px;
}

/* media start */

@media(max-width:1566px) 
{
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
    margin-bottom: 50px;
}

.login_board .loginn_nt_form .login_forrm h2 {
    margin-bottom: 60px;
}
}

@media(max-width:1450px)
{
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
    margin-bottom: 40px;
}

.login_board .loginn_nt_form .fomr_head {
    margin-bottom: 50px;
}
}

@media(max-width:1199px)
{
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
@media(max-width:992px)
{
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
    margin-bottom: 50px;
}
.login_forrm .last_flid {
    display: block;
    padding: 0;
}

.login_forrm .last_flid .or_login {
    padding: 0;
}

.login_forrm .last_flid .or_login span {
    display: none;
}
.login_board {
    position: fixed;
}
}
</style>

<!-- login page css end-->


      <!-- latest jquery-->
      <script src="../assets/js/jquery-3.6.0.min.js"></script>
      <!-- Aos animation-->
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>      
      <script>
      AOS.init();
      </script>

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


    </div>
  </body>

</html>
