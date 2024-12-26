@extends('user.includes.contract-manage') @section('content')
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
            Contract Management
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
          Contract Management
        </h2>
      </div>

      <!-- Container-fluid start-->
      <div class="container-fluid contract_manage_new">
        <div class="row">
          <div class="col-md-12">

            <div class="Inc_table">
              <div class="row">
                <div class="col-sm-12 tba_history_rap">
                  <div class="filtr_tabble">
                    <div class="contact_header">
                      <div class="table_title">
                        <h2>Customer List</h2>
                        <span>{{$customercount}} Customers</span>
                      </div>

                      <div class="header_filterrs">
                        <div class="inner_filter">
                          <button type="button">
                            <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M0.25 1C0.25 0.801088 0.329018 0.610322 0.46967 0.46967C0.610322 0.329018 0.801088 0.25 1 0.25H16C16.1989 0.25 16.3897 0.329018 16.5303 0.46967C16.671 0.610322 16.75 0.801088 16.75 1C16.75 1.19891 16.671 1.38968 16.5303 1.53033C16.3897 1.67098 16.1989 1.75 16 1.75H1C0.801088 1.75 0.610322 1.67098 0.46967 1.53033C0.329018 1.38968 0.25 1.19891 0.25 1ZM2.75 6C2.75 5.80109 2.82902 5.61032 2.96967 5.46967C3.11032 5.32902 3.30109 5.25 3.5 5.25H13.5C13.6989 5.25 13.8897 5.32902 14.0303 5.46967C14.171 5.61032 14.25 5.80109 14.25 6C14.25 6.19891 14.171 6.38968 14.0303 6.53033C13.8897 6.67098 13.6989 6.75 13.5 6.75H3.5C3.30109 6.75 3.11032 6.67098 2.96967 6.53033C2.82902 6.38968 2.75 6.19891 2.75 6ZM5.75 11C5.75 10.8011 5.82902 10.6103 5.96967 10.4697C6.11032 10.329 6.30109 10.25 6.5 10.25H10.5C10.6989 10.25 10.8897 10.329 11.0303 10.4697C11.171 10.6103 11.25 10.8011 11.25 11C11.25 11.1989 11.171 11.3897 11.0303 11.5303C10.8897 11.671 10.6989 11.75 10.5 11.75H6.5C6.30109 11.75 6.11032 11.671 5.96967 11.5303C5.82902 11.3897 5.75 11.1989 5.75 11Z" fill="#535862" />
                            </svg>
                          </button>
                        </div>
                        <div class="add_custoer">
                          <button type="button" id="addacustomer" data-bs-toggle="modal" data-bs-target="#threeStepModal">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M1 6H11M6 11V1" stroke="#5790FF" stroke-width="1.66" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            Add Customer
                          </button>
                        </div>
                      </div>
                    </div>


                    <div class="modal fade drop_coman_file have_title custom_add_customer" id="threeStepModal" tabindex="-1" role="dialog" aria-labelledby="threeStepModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" style="font-weight:700">Add Customer</h5>
                            <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                              <span aria-hidden="true">
                                <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black" />
                                  <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black" />
                                </svg>
                              </span>
                            </button>
                          </div>

                          <div class="modal-body">
                            <!-- Progress Bar -->
                            <div class="progress-bar-container_step">
                              <div class="step" data-step="1">
                                <span class="number">1</span>
                                <span class="tick d-none">✓</span>
                              </div>
                              <div class="step" data-step="2">
                                <span class="number">2</span>
                                <span class="tick d-none">✓</span>
                              </div>
                              <div class="step" data-step="3">
                                <span class="number">3</span>
                                <span class="tick d-none">✓</span>
                              </div>
                            </div>
                            <!-- Step Forms -->
                            <form id="customerForm" action="{{ route('customerstore') }}" method="POST" enctype="multipart/form-data" class="upload-form">
                              @csrf
                              <!-- Step 1 -->
                              <div class="step-form step-1">
                                <h4>Business Details:</h4>

                                <!-- Profile Picture Upload -->
                                <div class="gropu_form ivoice-upload">
                                  <div class="file-area" id="round_uplad_image">
                                    <div class="inner_file_edit">
                                      <input type="file" id="emppicd" class="emppicd" name="profile_picture">
                                      <div class="dont_show">
                                        <img id="previewd" class="previewd" src="../assets/images/image_placeholder.png" alt="Profile Picture">
                                        <div class="EAyyHe">
                                          <div class="EzQmEf"></div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <label for="profile_picture">Company Logo</label>
                                </div>

                                <!-- Legal Entity Name -->
                                <div class="gropu_form">
                                  <label for="lename">Legal Entity Name</label>
                                  <input placeholder="Legal Entity Name" type="text" id="lename" name="lename" value="" required>
                                </div>

                                <div class="gropu_form">
                                  <label for="brandname">Brand Name</label>
                                  <input placeholder="Brand Name" type="text" id="brandname" name="brandname" value="">
                                </div>

                                <div class="gropu_form">
                                  <label for="email">Email</label>
                                  <input placeholder="Email" type="email" id="email" name="email" value="" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}"
                                    title="Please enter a valid email address (e.g., example@domain.com)" required>
                                </div>

                                <div class="gropu_form custo_phonne">
                                  <label for="phone">Phone</label>
                                  <div class="phone_country">
                                    <div class="flag_cnty">

                                      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
                                      <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
                                      <!-- Updated input field -->
                                      <input id="phoneNumber" type="tel" name="phone" required inputmode="numeric"
                                        placeholder="Phone" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                        title="Please enter a valid phone number, e.g., +1-123-456-7890" />

                                    </div>
                                  </div>

                                </div>

                                <!-- Type of Entity -->
                                <div class="gropu_form">
                                  <label for="type_of_entity">Type Of Entity</label>
                                  <select id="type_of_entity" name="type_of_entity" required>
                                    <option value="" disabled selected>Legal Entity Type</option>
                                    <option value="AOP/ BOI">AOP/ BOI</option>
                                    <option value="Individuals">Individuals</option>
                                    <option value="Limited Company">Limited Company</option>
                                    <option value="LLP">LLP</option>
                                    <option value="One-Person Company">One-Person Company</option>
                                    <option value="Partnership Firm">Partnership Firm</option>
                                    <option value="Proprietor">Proprietor</option>
                                    <option value="Trusts">Trusts</option>
                                    <option value="Private Limited Company">Private Limited Company</option>
                                    <option value="Others">Others</option>
                                  </select>
                                </div>

                                <!-- CIN No with File Upload -->
                                <div class="gropu_form">
                                  <label for="CinNo">CIN No</label>
                                  <div class="file_coman_wrap">
                                    <input placeholder="CIN No" type="text" id="CinNo" name="CinNo" value="" required>
                                    <div class="coman_file_uplaodd" id="cin-file-upload" style="display: none;">
                                      <label for="cin_file">Attach CIN File</label>
                                      <input type="file" id="cin_file" name="cin_file" required>
                                    </div>
                                  </div>
                                </div>

                                <!-- GSTIN No with File Upload -->
                                <div class="gropu_form">
                                  <label for="GSTINNo">GSTIN No</label>
                                  <div class="file_coman_wrap">
                                    <input placeholder="GSTIN No" type="text" id="GSTINNo" name="GSTINNo" value="" required>
                                    <div class="coman_file_uplaodd" id="gstin-file-upload" style="display: none;">
                                      <label for="gstin_file">Attach GSTIN File</label>
                                      <input type="file" id="gstin_file" name="gstin_file" required>
                                    </div>
                                  </div>
                                </div>


                                <div class="btn-group">
                                  <div class="btn-container">
                                    <button type="button" class="btn btn-primary next-step" data-next-step="2"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="29.5" y="29.5" width="29" height="29" rx="14.5" transform="rotate(180 29.5 29.5)" stroke="black"></rect>
                                        <path d="M20.7866 15.5415H8.66608C8.50532 15.5415 8.35124 15.4776 8.2376 15.3639C8.12386 15.2502 8.06006 15.0959 8.06006 14.9351C8.06006 14.7742 8.12386 14.62 8.2376 14.5063C8.35124 14.3925 8.50532 14.3287 8.66608 14.3287H20.7866C20.9473 14.3287 21.1014 14.3925 21.2151 14.5063C21.3287 14.62 21.3926 14.7742 21.3926 14.9351C21.3926 15.0959 21.3287 15.2502 21.2151 15.3639C21.1014 15.4776 20.9473 15.5415 20.7866 15.5415Z" fill="black"></path>
                                        <path d="M20.536 14.9349L15.5096 9.90645C15.3958 9.79264 15.3319 9.63817 15.3319 9.47711C15.3319 9.31614 15.3958 9.16167 15.5096 9.04775C15.6234 8.93394 15.7778 8.87 15.9387 8.87C16.0996 8.87 16.254 8.93394 16.3678 9.04775L21.822 14.5056C21.8784 14.562 21.9232 14.6289 21.9537 14.7026C21.9843 14.7762 22 14.8552 22 14.9349C22 15.0147 21.9843 15.0937 21.9537 15.1674C21.9232 15.2411 21.8784 15.308 21.822 15.3643L16.3678 20.8222C16.254 20.936 16.0996 21 15.9387 21C15.7778 21 15.6234 20.936 15.5096 20.8222C15.3958 20.7083 15.3319 20.5538 15.3319 20.3928C15.3319 20.2318 15.3958 20.0773 15.5096 19.9635L20.536 14.9349Z" fill="black"></path>
                                      </svg></button>
                                  </div>
                                </div>
                              </div>

                              <!-- Step 2 -->
                              <div class="step-form step-2 d-none">
                                <h4>Business Location:</h4>
                                <div class="gropu_form">
                                  <label for="roa">Registered Office Address</label>
                                  <textarea placeholder="Registered Office Address" id="roa" name="roa" required></textarea>
                                </div>
                                <div class="gropu_form">
                                  <label for="pincode">Pin Code</label>

                                  <input placeholder="Pin Code" type="text" id="pincode" name="pincode" value="" maxlength="6" required>
                                  <ul id="pincode-suggestions" class="suggestions-list"></ul>
                                </div>
                                <div class="gropu_form">
                                  <label for="city">City</label>

                                  <input placeholder="City" type="text" id="city" name="city" value="" required>
                                  <ul id="city-suggestions" class="suggestions-list"></ul>
                                </div>

                                <div class="gropu_form">
                                  <label for="state">State</label>
                                  <input placeholder="State" type="text" id="state" name="state" value="" required>
                                  <div id="state-suggestions" class="autocomplete-suggestions"></div>
                                </div>

                                <div class="btn-group">
                                  <div class="btn-container">
                                    <button type="button" class="btn btn-secondary prev-step" data-prev-step="1">
                                      <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0.5" y="-0.5" width="29" height="29" rx="14.5" transform="matrix(1 0 0 -1 0 29)" stroke="black"></rect>
                                        <path d="M9.21345 15.5415H21.3339C21.4947 15.5415 21.6488 15.4776 21.7624 15.3639C21.8761 15.2502 21.9399 15.0959 21.9399 14.9351C21.9399 14.7742 21.8761 14.62 21.7624 14.5063C21.6488 14.3925 21.4947 14.3287 21.3339 14.3287H9.21345C9.05272 14.3287 8.89857 14.3925 8.78492 14.5063C8.67127 14.62 8.60742 14.7742 8.60742 14.9351C8.60742 15.0959 8.67127 15.2502 8.78492 15.3639C8.89857 15.4776 9.05272 15.5415 9.21345 15.5415Z" fill="black"></path>
                                        <path d="M9.46402 14.9349L14.4904 9.90645C14.6042 9.79264 14.6681 9.63817 14.6681 9.47711C14.6681 9.31614 14.6042 9.16167 14.4904 9.04775C14.3766 8.93394 14.2222 8.87 14.0613 8.87C13.9004 8.87 13.746 8.93394 13.6322 9.04775L8.17804 14.5056C8.1216 14.562 8.07682 14.6289 8.04627 14.7026C8.01573 14.7762 8 14.8552 8 14.9349C8 15.0147 8.01573 15.0937 8.04627 15.1674C8.07682 15.2411 8.1216 15.308 8.17804 15.3643L13.6322 20.8222C13.746 20.936 13.9004 21 14.0613 21C14.2222 21 14.3766 20.936 14.4904 20.8222C14.6042 20.7083 14.6681 20.5538 14.6681 20.3928C14.6681 20.2318 14.6042 20.0773 14.4904 19.9635L9.46402 14.9349Z" fill="black"></path>
                                      </svg>
                                    </button>
                                    <button type="button" class="btn btn-primary next-step" data-next-step="3"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="29.5" y="29.5" width="29" height="29" rx="14.5" transform="rotate(180 29.5 29.5)" stroke="black"></rect>
                                        <path d="M20.7866 15.5415H8.66608C8.50532 15.5415 8.35124 15.4776 8.2376 15.3639C8.12386 15.2502 8.06006 15.0959 8.06006 14.9351C8.06006 14.7742 8.12386 14.62 8.2376 14.5063C8.35124 14.3925 8.50532 14.3287 8.66608 14.3287H20.7866C20.9473 14.3287 21.1014 14.3925 21.2151 14.5063C21.3287 14.62 21.3926 14.7742 21.3926 14.9351C21.3926 15.0959 21.3287 15.2502 21.2151 15.3639C21.1014 15.4776 20.9473 15.5415 20.7866 15.5415Z" fill="black"></path>
                                        <path d="M20.536 14.9349L15.5096 9.90645C15.3958 9.79264 15.3319 9.63817 15.3319 9.47711C15.3319 9.31614 15.3958 9.16167 15.5096 9.04775C15.6234 8.93394 15.7778 8.87 15.9387 8.87C16.0996 8.87 16.254 8.93394 16.3678 9.04775L21.822 14.5056C21.8784 14.562 21.9232 14.6289 21.9537 14.7026C21.9843 14.7762 22 14.8552 22 14.9349C22 15.0147 21.9843 15.0937 21.9537 15.1674C21.9232 15.2411 21.8784 15.308 21.822 15.3643L16.3678 20.8222C16.254 20.936 16.0996 21 15.9387 21C15.7778 21 15.6234 20.936 15.5096 20.8222C15.3958 20.7083 15.3319 20.5538 15.3319 20.3928C15.3319 20.2318 15.3958 20.0773 15.5096 19.9635L20.536 14.9349Z" fill="black"></path>
                                      </svg></button>
                                  </div>
                                </div>
                              </div>

                              <!-- Step 3 -->
                              <div class="step-form step-3 d-none">
                                <h4>Director Details:</h4>

                                <!-- Director Name with Add/Remove Buttons -->
                                <div class="gropu_form" id="directors-container">
                                  <div class="director_field_wrap">
                                    <div class="director-field">
                                      <div class="director-field_input_wrap">
                                        <div class="director-field_input">
                                          <label for="dname">Director Name:</label>
                                          <input placeholder="Director Name" type="text" id="dname" name="dname[]" required>
                                        </div>
                                        <div class="director-field_input">
                                          <label for="dname">Director Email:</label>
                                          <input placeholder="Director Email" type="text" id="dmail" name="dmail[]" required>
                                        </div>
                                        <div class="director-field_input">
                                          <label for="dname">Director Mobile:</label>
                                          <input placeholder="Director Mobile" type="text" id="dphone" name="dphone[]" required>
                                        </div>
                                      </div>

                                      <button type="button" class="add-director"><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M1 6H11M6 11V1" stroke="#5790FF" stroke-width="1.66" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg></button>
                                    </div>
                                  </div>
                                </div>

                                <div class="btn-group">
                                  <div class="btn-container">
                                    <button type="button" class="btn btn-secondary prev-step" data-prev-step="2">
                                      <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0.5" y="-0.5" width="29" height="29" rx="14.5" transform="matrix(1 0 0 -1 0 29)" stroke="black"></rect>
                                        <path d="M9.21345 15.5415H21.3339C21.4947 15.5415 21.6488 15.4776 21.7624 15.3639C21.8761 15.2502 21.9399 15.0959 21.9399 14.9351C21.9399 14.7742 21.8761 14.62 21.7624 14.5063C21.6488 14.3925 21.4947 14.3287 21.3339 14.3287H9.21345C9.05272 14.3287 8.89857 14.3925 8.78492 14.5063C8.67127 14.62 8.60742 14.7742 8.60742 14.9351C8.60742 15.0959 8.67127 15.2502 8.78492 15.3639C8.89857 15.4776 9.05272 15.5415 9.21345 15.5415Z" fill="black"></path>
                                        <path d="M9.46402 14.9349L14.4904 9.90645C14.6042 9.79264 14.6681 9.63817 14.6681 9.47711C14.6681 9.31614 14.6042 9.16167 14.4904 9.04775C14.3766 8.93394 14.2222 8.87 14.0613 8.87C13.9004 8.87 13.746 8.93394 13.6322 9.04775L8.17804 14.5056C8.1216 14.562 8.07682 14.6289 8.04627 14.7026C8.01573 14.7762 8 14.8552 8 14.9349C8 15.0147 8.01573 15.0937 8.04627 15.1674C8.07682 15.2411 8.1216 15.308 8.17804 15.3643L13.6322 20.8222C13.746 20.936 13.9004 21 14.0613 21C14.2222 21 14.3766 20.936 14.4904 20.8222C14.6042 20.7083 14.6681 20.5538 14.6681 20.3928C14.6681 20.2318 14.6042 20.0773 14.4904 19.9635L9.46402 14.9349Z" fill="black"></path>
                                      </svg>
                                    </button>
                                    <button type="submit" class="btn btn-success submit-btn" id="submitButton">
                                      <span id="submitText">Submit</span>
                                      <span id="submitSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                    </button>
                                    
                                  </div>
                                </div>
                              </div>

                            </form>
                          </div>
                        </div>
                      </div>
                    </div>



                    <script>
                      $(document).ready(function () {
                        function validateStep(step) {
                          const form = $(`.step-form.step-${step}`);
                          const inputs = form.find('input:not([type="file"])'); // Exclude file input from mandatory validation
                          
                          // Validate all inputs except the file input
                          return inputs.toArray().every(input => $(input).val().trim() !== '');
                        }
                    
                        function updateProgress(step) {
                          $('.step').each(function () {
                            const stepNum = $(this).data('step');
                            const isValid = validateStep(stepNum);
                    
                            if (stepNum < step) {
                              $(this).addClass('active');
                              if (isValid) {
                                $(this).find('.number').addClass('d-none');
                                $(this).find('.tick').removeClass('d-none');
                              } else {
                                $(this).find('.number').removeClass('d-none');
                                $(this).find('.tick').addClass('d-none');
                              }
                            } else {
                              $(this).removeClass('active');
                              $(this).find('.number').removeClass('d-none');
                              $(this).find('.tick').addClass('d-none');
                            }
                          });
                        }
                    
                        $('.next-step').on('click', function () {
                          const currentStep = $(this).data('next-step') - 1;
                          const nextStep = $(this).data('next-step');
                    
                          if (!validateStep(currentStep)) return; // Proceed only if current step inputs are valid
                    
                          $(`.step-form.step-${currentStep}`).addClass('d-none');
                          $(`.step-form.step-${nextStep}`).removeClass('d-none');
                          updateProgress(nextStep);
                        });
                    
                        $('.prev-step').on('click', function () {
                          const prevStep = $(this).data('prev-step');
                          const currentStep = prevStep + 1;
                    
                          $(`.step-form.step-${currentStep}`).addClass('d-none');
                          $(`.step-form.step-${prevStep}`).removeClass('d-none');
                          updateProgress(prevStep);
                        });
                    
                        $('#customerForm').on('submit', function (e) {
                          e.preventDefault();
                          if (validateStep(3)) {
                            $('#threeStepModal').modal('hide');
                          }
                        });
                    
                        $('input').on('input', function () {
                          const step = $(this).closest('.step-form').attr('class').match(/step-(\d)/)[1];
                          updateProgress(parseInt(step));
                        });
                      });
                    </script>
                    


                    <script>
                      const phoneInputField = document.querySelector("#phoneNumber");
                      const phoneInput = window.intlTelInput(phoneInputField, {
                        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                        initialCountry: "in", // Default country (India)
                        separateDialCode: true, // Show the country code separately
                      });

                      // Ensure the full phone number is stored in the input field before form submission
                      document.querySelector("#customerForm").addEventListener("submit", (e) => {
                        if (!phoneInput.isValidNumber()) {
                          e.preventDefault();
                          alert("Please enter a valid phone number.");
                        } else {
                          // Update the input field with the full phone number
                          phoneInputField.value = phoneInput.getNumber();
                        }
                      });
                    </script>
                    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/smoothness/jquery-ui.css">
                    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
                    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

                    <script>
                      const states = [
                        "Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar",
                        "Chhattisgarh", "Goa", "Gujarat", "Haryana",
                        "Himachal Pradesh", "Jharkhand", "Karnataka", "Kerala",
                        "Madhya Pradesh", "Maharashtra", "Manipur", "Meghalaya",
                        "Mizoram", "Nagaland", "Odisha", "Punjab",
                        "Rajasthan", "Sikkim", "Tamil Nadu", "Telangana",
                        "Tripura", "Uttar Pradesh", "Uttarakhand", "West Bengal",
                        "Andaman and Nicobar Islands", "Chandigarh", "Dadra and Nagar Haveli and Daman and Diu",
                        "Delhi", "Jammu and Kashmir", "Ladakh", "Lakshadweep", "Puducherry"
                      ];

                      $(document).ready(function() {
                        $("#state").autocomplete({
                          source: states,
                          minLength: 1,
                          autoFocus: true,
                          appendTo: "#state-suggestions", // Ensures suggestions are shown inside the defined div
                        });
                      });
                    </script>


                    <script>
                      // // Add/Remove Director Fields
                      // document.querySelector('.add-director').addEventListener('click', function () {
                      //   const container = document.getElementById('directors-container');
                      //   const newField = document.createElement('div');
                      //   newField.className = 'director-field';
                      //   newField.innerHTML = `<input placeholder="Director Name" type="text" name="dname[]">
                      //                         <button type="button" class="remove-director">-</button>`;
                      //   container.appendChild(newField);
                      //   newField.querySelector('.remove-director').addEventListener('click', function () {
                      //     container.removeChild(newField);
                      //   });
                      // });

                      // Show/Hide CIN and GSTIN File Upload
                      document.getElementById('CinNo').addEventListener('input', function() {
                        const cinFileUpload = document.getElementById('cin-file-upload');
                        cinFileUpload.style.display = this.value ? 'block' : 'none';
                      });

                      document.getElementById('GSTINNo').addEventListener('input', function() {
                        const gstinFileUpload = document.getElementById('gstin-file-upload');
                        gstinFileUpload.style.display = this.value ? 'block' : 'none';
                      });


                      document.querySelector('body').addEventListener('click', function(event) {
                        if (event.target.closest('.add-director')) {
                          // Locate the parent .director_field_wrap
                          const container = document.querySelector('.director_field_wrap');

                          // Create the new director-field element
                          const newField = document.createElement('div');
                          newField.className = 'director-field';
                          newField.innerHTML = `
                                    <div class="director-field_input_wrap">
                                      <div class="director-field_input">
                                        <label for="dname">Director Name:</label>
                                        <input placeholder="Director Name" type="text" id="dname" name="dname[]" required>
                                        </div>
                                        <div class="director-field_input">
                                        <label for="dname">Director Email:</label>
                                        <input placeholder="Director Email" type="text" id="dmail" name="dmail[]" required>
                                        </div>
                                        <div class="director-field_input">
                                        <label for="dname">Director Mobile:</label>
                                        <input placeholder="Director Mobile" type="text" id="dphone" name="dphone[]" required>
                                        </div>
                                        </div>
      <button type="button" class="remove-director">
<svg width="12" height="2" viewBox="0 0 12 2" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1 1H11H10.873" stroke="#5790FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
      </button>
    `;

                          // Append the newField inside the existing .director_field_wrap
                          container.appendChild(newField);
                        }

                        if (event.target.closest('.remove-director')) {
                          // Remove the specific .director-field
                          const field = event.target.closest('.director-field');
                          field.parentNode.removeChild(field);
                        }
                      });
                    </script>


                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


                    <script>
                      // Clear related fields when one is cleared
                      document.getElementById('state').addEventListener('input', clearFields);
                      document.getElementById('city').addEventListener('input', clearFields);
                      document.getElementById('pincode').addEventListener('input', clearFields);
                    
                      function clearFields() {
                        if (this.value.trim() === "") {
                          document.getElementById('state').value = "";
                          document.getElementById('city').value = "";
                          document.getElementById('pincode').value = "";
                        }
                      }
                    
                      // Fetch State and City based on Pin Code
                      document.getElementById('pincode').addEventListener('input', function () {
                        const pincode = this.value.trim();
                        const suggestionList = document.getElementById('pincode-suggestions');
                    
                        if (pincode.length === 6) {
                          // Show the suggestion list
                          suggestionList.style.display = 'block';
                          fetch(`https://api.postalpincode.in/pincode/${pincode}`)
                            .then(response => response.json())
                            .then(data => {
                              if (data[0].Status === "Success") {
                                suggestionList.innerHTML = ""; // Clear previous suggestions
                                const postOffices = data[0].PostOffice;
                    
                                postOffices.forEach(office => {
                                  const li = document.createElement('li');
                                  li.textContent = `${office.Name}, ${office.District}, ${office.State}`;
                                  li.addEventListener('click', function () {
                                    // Auto-fill inputs
                                    document.getElementById('pincode').value = pincode;
                                    document.getElementById('city').value = office.District;
                                    document.getElementById('state').value = office.State;
                                    suggestionList.innerHTML = ""; // Clear suggestions after selection
                                    suggestionList.style.display = 'none'; // Hide the list after selection
                                  });
                                  suggestionList.appendChild(li);
                                });
                              } else {
                                suggestionList.innerHTML = "<li class='no-suggestions'>No suggestions available. Click to Enter Manually.</li>";
                              }
                            })
                            .catch(error => console.error("Error fetching pincode details:", error));
                        } else {
                          suggestionList.innerHTML = ""; // Clear suggestions if input is invalid
                          suggestionList.style.display = 'none';
                        }
                      });
                    
                      // Hide "No suggestions available" message on click
                      document.getElementById('pincode-suggestions').addEventListener('click', function (event) {
                        if (event.target && event.target.classList.contains('no-suggestions')) {
                          this.innerHTML = ""; // Clear the suggestions list
                          this.style.display = 'none'; // Hide the list
                        }
                      });
                    
                      // Fetch Pin Code and State based on City Name
                      document.getElementById('city').addEventListener('input', function () {
                        const city = this.value.trim();
                        const suggestionList = document.getElementById('city-suggestions');
                    
                        if (city.length > 1) {
                          // Show the suggestion list
                          suggestionList.style.display = 'block';
                          fetch(`https://api.postalpincode.in/postoffice/${city}`)
                            .then(response => response.json())
                            .then(data => {
                              if (data[0].Status === "Success") {
                                suggestionList.innerHTML = ""; // Clear previous suggestions
                                const postOffices = data[0].PostOffice;
                    
                                postOffices.forEach(office => {
                                  const li = document.createElement('li');
                                  li.textContent = `${office.Name}, ${office.State} - ${office.Pincode}`;
                                  li.addEventListener('click', function () {
                                    // Auto-fill inputs
                                    document.getElementById('city').value = city;
                                    document.getElementById('state').value = office.State;
                                    document.getElementById('pincode').value = office.Pincode;
                                    suggestionList.innerHTML = ""; // Clear suggestions after selection
                                    suggestionList.style.display = 'none'; // Hide the list after selection
                                  });
                                  suggestionList.appendChild(li);
                                });
                              } else {
                                suggestionList.innerHTML = "<li class='no-suggestions'>No suggestions available. Click to Enter Manually.</li>";
                              }
                            })
                            .catch(error => console.error("Error fetching city details:", error));
                        } else {
                          suggestionList.innerHTML = ""; // Clear suggestions if input is invalid
                          suggestionList.style.display = 'none';
                        }
                      });
                    
                      // Hide "No suggestions available" message on click
                      document.getElementById('city-suggestions').addEventListener('click', function (event) {
                        if (event.target && event.target.classList.contains('no-suggestions')) {
                          this.innerHTML = ""; // Clear the suggestions list
                          this.style.display = 'none'; // Hide the list
                        }
                      });
                    </script>
                    
                    
<style>
  .spinner-border {
    vertical-align: middle;
    margin-left: 10px;
  }
</style>
                    <script>
                      $(document).on('submit', '#customerForm', function(e) {
                        e.preventDefault();
                        const formData = new FormData(this);
  const submitButton = $('#submitButton');

  submitButton.prop('disabled', true);
  $('#submitSpinner').removeClass('d-none');
  $('#submitText').text('Processing...');

  $.ajax({
    url: $(this).attr('action'),
    method: $(this).attr('method'),
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      // Handle success
      $('#submitText').text('Submit');
      $('#submitSpinner').addClass('d-none');
      submitButton.prop('disabled', false);

      // Display success message
      Swal.fire('Success', response.message, 'success');
    },
    error: function (error) {
      // Handle error
      $('#submitText').text('Submit');
      $('#submitSpinner').addClass('d-none');
      submitButton.prop('disabled', false);

      // Display error message
      Swal.fire('Error', 'Something went wrong. Please try again.', 'error');
    }
  });
});
                    </script>





                    <div class="entery_body table-responsive">
                      <table id="contarct_table" class="table table-striped">
                        <thead>
                          <tr>
                            <th>Entity Name</th>
                            <th>Status</th>
                            <!-- <th>
                              <div class="sign_athh">
                                Director Name
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M6.0626 5.99967C6.21934 5.55412 6.52871 5.17841 6.93591 4.9391C7.34311 4.69978 7.82187 4.6123 8.28739 4.69215C8.75291 4.772 9.17515 5.01402 9.47932 5.37536C9.7835 5.7367 9.94997 6.19402 9.94927 6.66634C9.94927 7.99967 7.94927 8.66634 7.94927 8.66634M8.0026 11.333H8.00927M14.6693 7.99967C14.6693 11.6816 11.6845 14.6663 8.0026 14.6663C4.32071 14.6663 1.33594 11.6816 1.33594 7.99967C1.33594 4.31778 4.32071 1.33301 8.0026 1.33301C11.6845 1.33301 14.6693 4.31778 14.6693 7.99967Z" stroke="#A4A7AE" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                              </div>
                            </th> -->
                            <th>Divisions</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($customer as $cust)
                          <tr>
                            <td>
                              <div class="image_naess">
                                <a href="{{ url('/user/contractmanagedetail/' . $cust->id) }}">
                                  <div class="image_table">

                                    <?php
                                    // Extract initials
                                    $nameParts = explode(' ', $cust->lename);
                                    $firstLetter = strtoupper(substr($nameParts[0], 0, 1)); // First letter of first name
                                    $secondLetter = isset($nameParts[1]) ? strtoupper(substr($nameParts[1], 0, 1)) : ''; // First letter of last name (if exists)

                                    // Path to the profile picture
                                    $profilePicturePath = public_path($cust->profile_picture);

                                    // Check if the profile picture exists
                                    if ($cust->profile_picture === NULL || !file_exists($profilePicturePath)) {
                                      echo '<h2>' . $firstLetter . $secondLetter . '</h2>';
                                    } else {
                                      echo '<img id="profile-image" src="' . asset('/' . $cust->profile_picture) . '" class="mtt" alt="Profile Image">';
                                    }
                                    ?>

                                  </div>
                                  <span>{{$cust->lename}}</span>
                                </a>
                              </div>
                            </td>
                            <td>
                              <div class="user_status">
                                @if($cust->status == 'Active')
                                <span class="active">Active</span>
                                @else
                                <span class="inactive">Inactive</span>
                                @endif
                              </div>
                            </td>
                            <!-- <td>
                              <div class="signing_ath">
                                <div class="signing_ath_rpt">

                                  <span>
                                    {{ $cust->dname[0] ?? '' }}
                                  </span>
                                  @if(count($cust->dname) > 1)
                                  <b class="count" style="cursor: pointer;">
                                    +{{ count($cust->dname) - 1 }}
                                  </b>
                                  <div class="custom-tooltip">
                                    {{ implode(', ', array_slice($cust->dname, 1)) }}
                                  </div>
                                  @endif



                                  <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                      document.querySelectorAll('.signing_ath_rpt .count').forEach(countElement => {
                                        // Select the tooltip element that is next to the count element
                                        const tooltip = countElement.nextElementSibling;

                                        if (tooltip && tooltip.classList.contains('custom-tooltip')) {
                                          // Show the tooltip on hover
                                          countElement.addEventListener('mouseenter', () => {
                                            tooltip.style.opacity = '1';
                                            tooltip.style.visibility = 'visible';
                                          });

                                          // Hide the tooltip when not hovering
                                          countElement.addEventListener('mouseleave', () => {
                                            tooltip.style.opacity = '0';
                                            tooltip.style.visibility = 'hidden';
                                          });
                                        }
                                      });
                                    });
                                  </script>
                                </div>

                              </div>
                            </td> -->
                            <td>
                              @if($cust->customerContracts->isEmpty())
                              <span class="no-contract-message">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#9d9d9d"></path>
                                  <circle cx="7.5" cy="7.5" r="7" stroke="#9d9d9d"></circle>
                                </svg> No contract created yet
                              </span>
                              @else
                              <div class="divisn_only">

                                @foreach($cust->customerContracts as $contract)
                                <span>{{ $contract->division }}</span>
                                @endforeach
                                @endif
                                <span class="count_divison"></span>
                              </div>
                            </td>
                            <td>
                              <div class="dropdown">
                                <button onclick="toggleDropdown()" class="dropbtn show_pp">
                                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D"></path>
                                    <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D"></path>
                                    <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D"></path>
                                  </svg>
                                </button>
                                <div id="myDropdown3" class="dropdown-content">

                                  <a class="dropdown-itemm ediit" data-bs-toggle="modal" data-bs-target="#add_contarct_edit">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M1.68029 10.5673C1.70709 10.3261 1.7205 10.2055 1.75699 10.0928C1.78936 9.99277 1.83511 9.89759 1.89298 9.80983C1.9582 9.71092 2.04401 9.62512 2.21561 9.45351L9.91929 1.74985C10.5636 1.10552 11.6083 1.10552 12.2526 1.74985C12.897 2.39418 12.897 3.43885 12.2526 4.08319L4.54894 11.7868C4.37734 11.9585 4.29154 12.0443 4.19262 12.1095C4.10487 12.1673 4.00969 12.2131 3.90968 12.2455C3.79696 12.282 3.67635 12.2954 3.43515 12.3222L1.46094 12.5415L1.68029 10.5673Z" stroke="#414651" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg> Edit Details </a>

                                  <a class="dropdown-itemm delle" data-bs-toggle="modal" data-bs-target="#add_contarct_dele">
                                    <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M8.33333 3.50033V3.03366C8.33333 2.38026 8.33333 2.05357 8.20617 1.804C8.09432 1.58448 7.91584 1.406 7.69632 1.29415C7.44676 1.16699 7.12006 1.16699 6.46667 1.16699H5.53333C4.87994 1.16699 4.55324 1.16699 4.30368 1.29415C4.08416 1.406 3.90568 1.58448 3.79383 1.804C3.66667 2.05357 3.66667 2.38026 3.66667 3.03366V3.50033M4.83333 6.70866V9.62533M7.16667 6.70866V9.62533M0.75 3.50033H11.25M10.0833 3.50033V10.0337C10.0833 11.0138 10.0833 11.5038 9.89259 11.8781C9.72482 12.2074 9.4571 12.4751 9.12782 12.6429C8.75347 12.8337 8.26342 12.8337 7.28333 12.8337H4.71667C3.73657 12.8337 3.24653 12.8337 2.87218 12.6429C2.5429 12.4751 2.27518 12.2074 2.10741 11.8781C1.91667 11.5038 1.91667 11.0138 1.91667 10.0337V3.50033" stroke="#FA4A4A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg> Delete </a>
                                </div>
                              </div>
                            </td>
                          </tr>

                          @endforeach

                        </tbody>
                      </table>


                      <!--  customer edit  model start -->

                      <div class="modal fade drop_coman_file have_title request_nerrow" id="add_contarct_edit" tabindex="-1" role="dialog" aria-labelledby="add_contarct_edit" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" style="font-weight:700">Request Edit Access</h5>
                              <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                                <span aria-hidden="true">
                                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L13 13M13 1L1 13" stroke="#535862" stroke-linecap="round" />
                                  </svg>
                                </span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form id="" action="" method="POST" enctype="multipart/form-data">

                                <div class="gropu_form_request">
                                  <h2>Request Access from your Organization’s Signing Authority</h2>
                                </div>

                                <div class="root_btn">
                                  <button class="btn btn-primary" style="border-radius:5px;" type="submit">Request </button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--  customer edit  model end -->


                      <!-- customer delete model start -->

                      <div class="modal fade drop_coman_file have_title request_nerrow" id="add_contarct_dele" tabindex="-1" role="dialog" aria-labelledby="add_contarct_dele" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" style="font-weight:700">Request Customer Deletion</h5>
                              <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                                <span aria-hidden="true">
                                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L13 13M13 1L1 13" stroke="#535862" stroke-linecap="round" />
                                  </svg>
                                </span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form id="" action="" method="POST" enctype="multipart/form-data">

                                <div class="gropu_form_request">
                                  <h2>Request Access from your Organization’s Signing Authority</h2>
                                </div>

                                <div class="gropu_form_request red_alret">
                                  <h2>Note: On successful approval, all the contracts of this customer will be erased.</h2>
                                </div>

                                <div class="root_btn root_btn_alert">
                                  <button class="btn btn-primary" style="border-radius:5px;" type="submit">Request
                                  </button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--  customer delete  model end -->

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