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
                          <button type="button" data-bs-toggle="modal" data-bs-target="#addacustomer">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M1 6H11M6 11V1" stroke="#5790FF" stroke-width="1.66" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            Add Customer
                          </button>
                        </div>
                      </div>
                    </div>

                    <div class="modal fade drop_coman_file have_title" id="addacustomer" tabindex="-1" role="dialog" aria-labelledby="addacustomer" aria-hidden="true">
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

                            <form id="customerForm" action="{{ route('customerstore') }}" method="POST" enctype="multipart/form-data" class="upload-form">
                              @csrf
                              <!-- Profile Picture Upload -->
                              <div class="gropu_form ivoice-upload">
                                <label for="profile_picture">Profile Picture</label>
                                <div class="file-area" id="round_uplad_image">
                                  <div class="inner_file_edit">
                                    <input type="file" id="emppicd" class="emppicd" name="profile_picture">
                                    <div class="dont_show">
                                      <img id="previewd" class="previewd" src="" alt="Profile Picture">
                                      <div class="EAyyHe">
                                        <div class="EzQmEf"></div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <!-- Legal Entity Name -->
                              <div class="gropu_form">
                                <label for="lename">Legal Entity Name</label>
                                <input placeholder="Legal Entity Name" type="text" id="lename" name="lename" value="" required>
                              </div>

                              <div class="gropu_form">
                                <label for="lename">Brand Name</label>
                                <input placeholder="Brand Name" type="text" id="brandname" name="brandname" value="">
                              </div>

                              <!-- Director Name with Add/Remove Buttons -->
                              <div class="gropu_form" id="directors-container">
                                <label for="dname">Director Name</label>
                                <div class="director_field_wrap">
                                  <div class="director-field">
                                    <input placeholder="Director Name" type="text" id="dname" name="dname[]" value="" required>
                                    <button type="button" class="add-director">
                                      <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 6H11M6 11V1" stroke="#5790FF" stroke-width="1.66" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                      </svg>
                                    </button>
                                  </div>
                                </div>
                              </div>

                              <!-- Registered Office Address -->
                              <div class="gropu_form">
                                <label for="roa">Registered Office Address</label>
                                <textarea placeholder="Registered Office Address" id="roa" name="roa" required></textarea>
                              </div>
                              <!-- Pin Code with Auto-fill State and City -->
                              <div class="gropu_form">
                                <label for="pincode">Pin Code</label>
                                <input placeholder="Pin Code" type="text" id="pincode" name="pincode" value="" maxlength="6" required>
                              </div>
                               <!-- City with Auto-fill State and Pin Code -->
                               <div class="gropu_form">
                                <label for="city">City</label>
                                <input placeholder="City" type="text" id="city" name="city" value="" required>
                              </div>

                              

                              <!-- State Dropdown -->
                              <div class="gropu_form">
                                <label for="state">State</label>
                                <input placeholder="State" type="text" id="state" name="state" value="" required>
                                <div id="state-suggestions" class="autocomplete-suggestions"></div>
                              </div>
                             
                             

                              <!-- CIN No with File Upload -->
                              <div class="gropu_form">
                                <label for="CinNo">CIN No</label>
                                <div class="file_coman_wrap">
                                <input placeholder="CIN No" type="text" id="CinNo" name="CinNo" value=""   required>
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
                                <input placeholder="GSTIN No" type="text" id="GSTINNo" name="GSTINNo" value=""   required>
                                <div class="coman_file_uplaodd" id="gstin-file-upload" style="display: none;">
                                  <label for="gstin_file">Attach GSTIN File</label>
                                  <input type="file" id="gstin_file" name="gstin_file" required>
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

                              <!-- Submit Button -->
                              <div class="root_btn">
                                <button class="btn btn-primary" style="border-radius:5px;" type="submit">Update</button>
                              </div>
                            </form>
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
                            
                              $(document).ready(function () {
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
                              document.getElementById('CinNo').addEventListener('input', function () {
                                const cinFileUpload = document.getElementById('cin-file-upload');
                                cinFileUpload.style.display = this.value ? 'block' : 'none';
                              });

                              document.getElementById('GSTINNo').addEventListener('input', function () {
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
      <input placeholder="Director Name" type="text" name="dname[]" value="">
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
document.getElementById('state').addEventListener('input', function () {
  if (this.value.trim() === "") {
    document.getElementById('city').value = "";
    document.getElementById('pincode').value = "";
  }
});

document.getElementById('city').addEventListener('input', function () {
  if (this.value.trim() === "") {
    document.getElementById('state').value = "";
    document.getElementById('pincode').value = "";
  }
});

document.getElementById('pincode').addEventListener('input', function () {
  if (this.value.trim() === "") {
    document.getElementById('state').value = "";
    document.getElementById('city').value = "";
  }
});

// Fetch State and City based on Pin Code
document.getElementById('pincode').addEventListener('input', function () {
  const pincode = this.value.trim();

  if (pincode.length === 6) {
    fetch(`https://api.postalpincode.in/pincode/${pincode}`)
      .then(response => response.json())
      .then(data => {
        if (data[0].Status === "Success") {
          const postOffice = data[0].PostOffice[0];
          document.getElementById('state').value = postOffice.State;
          document.getElementById('city').value = postOffice.District;
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Invalid Pincode',
            text: 'Please try again with a valid pincode.',
          });
          document.getElementById('state').value = "";
          document.getElementById('city').value = "";
        }
      })
      .catch(error => {
        console.error("Error fetching pincode details:", error);
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Unable to fetch details. Please try again later.',
        });
      });
  } else {
    document.getElementById('state').value = "";
    document.getElementById('city').value = "";
  }
});

// Fetch Pin Code and State based on City Name
document.getElementById('city').addEventListener('input', function () {
  const city = this.value.trim();

  if (city.length > 2) { // Start searching after at least 3 characters
    fetch(`https://api.postalpincode.in/postoffice/${city}`)
      .then(response => response.json())
      .then(data => {
        if (data[0].Status === "Success") {
          const postOffice = data[0].PostOffice[0];
          document.getElementById('state').value = postOffice.State;
          document.getElementById('pincode').value = postOffice.Pincode;
        } else {
          Swal.fire({
            icon: 'error',
            title: 'City Not Found',
            text: 'Please try again with a valid city name.',
          });
          document.getElementById('state').value = "";
          document.getElementById('pincode').value = "";
        }
      })
      .catch(error => {
        console.error("Error fetching city details:", error);
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Unable to fetch details. Please try again later.',
        });
      });
  }
});

</script>
<script>
  $(document).on('submit', '#customerForm', function (e) {
      e.preventDefault();
      let formData = new FormData(this);

      $.ajax({
          url: "{{ route('customerstore') }}",
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          success: function (response) {
              Swal.fire({
                  title: 'Success!',
                  text: response.message,
                  icon: 'success',
              }).then(() => {
                  // Redirect to 'user/contractmanage' after the SweetAlert confirmation
                  window.location.href = "/user/contractmanage";
              });
          },
          error: function (xhr) {
              let errorMessage = 'An error occurred while saving the data.';
              
              // Extract error message from server response if available
              if (xhr.responseJSON && xhr.responseJSON.message) {
                  errorMessage = xhr.responseJSON.message;
              }
              
              Swal.fire({
                  title: 'Error!',
                  text: errorMessage,
                  icon: 'error',
              });
          }
      });
  });
</script>


  

                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="entery_body table-responsive">
                      <table id="contarct_table" class="table table-striped">
                        <thead>
                          <tr>
                            <th>Entity Name</th>
                            <th>Status</th>
                            <th>
                              <div class="sign_athh">
                                Director Name
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M6.0626 5.99967C6.21934 5.55412 6.52871 5.17841 6.93591 4.9391C7.34311 4.69978 7.82187 4.6123 8.28739 4.69215C8.75291 4.772 9.17515 5.01402 9.47932 5.37536C9.7835 5.7367 9.94997 6.19402 9.94927 6.66634C9.94927 7.99967 7.94927 8.66634 7.94927 8.66634M8.0026 11.333H8.00927M14.6693 7.99967C14.6693 11.6816 11.6845 14.6663 8.0026 14.6663C4.32071 14.6663 1.33594 11.6816 1.33594 7.99967C1.33594 4.31778 4.32071 1.33301 8.0026 1.33301C11.6845 1.33301 14.6693 4.31778 14.6693 7.99967Z" stroke="#A4A7AE" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                              </div>
                            </th>
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
                                <span class="active">Active</span>
                              </div>
                            </td>
                            <td>
                              <div class="signing_ath">
                                <div class="signing_ath_rpt">
                                  
                                  <span>
                                    {{ $cust->dname[0] ?? '' }}
                                    @if(count($cust->dname) > 1)
                                        <b class="count" style="cursor: pointer;">
                                            +{{ count($cust->dname) - 1 }}
                                        </b>
                                        <div class="custom-tooltip">
                                            {{ implode(', ', array_slice($cust->dname, 1)) }}
                                        </div>
                                    @endif
                                </span>
                                
                                
                                <script>
document.addEventListener('DOMContentLoaded', function () {
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
                            </td>
                            <td>
                              @if($cust->customerContracts->isEmpty())
                              <span class="no-contract-message">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#9d9d9d"></path>
                                  <circle cx="7.5" cy="7.5" r="7" stroke="#9d9d9d"></circle>
                                </svg>  No contract created yet
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
                              <div class="edit_options">
                                <button class="delet_opton" type="button">
                                  <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.3333 5.00033V4.33366C12.3333 3.40024 12.3333 2.93353 12.1517 2.57701C11.9919 2.2634 11.7369 2.00844 11.4233 1.84865C11.0668 1.66699 10.6001 1.66699 9.66667 1.66699H8.33333C7.39991 1.66699 6.9332 1.66699 6.57668 1.84865C6.26308 2.00844 6.00811 2.2634 5.84832 2.57701C5.66667 2.93353 5.66667 3.40024 5.66667 4.33366V5.00033M7.33333 9.58366V13.7503M10.6667 9.58366V13.7503M1.5 5.00033H16.5M14.8333 5.00033V14.3337C14.8333 15.7338 14.8333 16.4339 14.5608 16.9686C14.3212 17.439 13.9387 17.8215 13.4683 18.0612C12.9335 18.3337 12.2335 18.3337 10.8333 18.3337H7.16667C5.76654 18.3337 5.06647 18.3337 4.53169 18.0612C4.06129 17.8215 3.67883 17.439 3.43915 16.9686C3.16667 16.4339 3.16667 15.7338 3.16667 14.3337V5.00033" stroke="#535862" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                                  </svg>
                                </button>
                                <button class="edit_opton" type="button">
                                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.3993 15.0963C2.43759 14.7517 2.45673 14.5794 2.50887 14.4184C2.55512 14.2755 2.62046 14.1396 2.70314 14.0142C2.79632 13.8729 2.91889 13.7503 3.16404 13.5052L14.1693 2.49992C15.0898 1.57945 16.5822 1.57945 17.5026 2.49993C18.4231 3.4204 18.4231 4.91279 17.5026 5.83326L6.49738 16.8385C6.25222 17.0836 6.12965 17.2062 5.98834 17.2994C5.86298 17.3821 5.72701 17.4474 5.58414 17.4937C5.42311 17.5458 5.25082 17.5649 4.90624 17.6032L2.08594 17.9166L2.3993 15.0963Z" stroke="#535862" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                                  </svg>
                                </button>
                              </div>
                            </td>
                          </tr>

                         @endforeach

                        </tbody>
                      </table>
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