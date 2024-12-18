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
                          <button type="button" id="addacustomer">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M1 6H11M6 11V1" stroke="#5790FF" stroke-width="1.66" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            Add Customer
                          </button>
                        </div>
                      </div>
                    </div>

                    <div class="addcustomer_overlay_fix"></div>
                    <div class="addcustomer_fix">
                      <h2 class="addcustomer_title">Add Customer</h2>
                      <div class="customer_wrap">
                        <form id="customerForm" action="{{ route('customerstore') }}" method="POST" enctype="multipart/form-data" class="upload-form">
                          @csrf
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
                            <ul id="pincode-suggestions" class="suggestions-list"></ul>
                          </div>
                          <!-- City with Auto-fill State and Pin Code -->
                          <div class="gropu_form">
                            <label for="city">City</label>
                            <input placeholder="City" type="text" id="city" name="city" value="" required>
                            <ul id="city-suggestions" class="suggestions-list"></ul>
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
                            <button class="btn" type="submit">Add Customer</button>
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
                          document.getElementById('pincode').addEventListener('input', function() {
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
                                      li.addEventListener('click', function() {
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
                                    suggestionList.innerHTML = "<li>No suggestions available</li>";
                                  }
                                })
                                .catch(error => console.error("Error fetching pincode details:", error));
                            } else {
                              suggestionList.innerHTML = ""; // Clear suggestions if input is invalid
                              suggestionList.style.display = 'none';
                            }
                          });

                          // Fetch Pin Code and State based on City Name
                          document.getElementById('city').addEventListener('input', function() {
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
                                      li.addEventListener('click', function() {
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
                                    suggestionList.innerHTML = "<li>No suggestions available</li>";
                                  }
                                })
                                .catch(error => console.error("Error fetching city details:", error));
                            } else {
                              suggestionList.innerHTML = ""; // Clear suggestions if input is invalid
                              suggestionList.style.display = 'none';
                            }
                          });
                        </script>

                        <script>
                          $(document).on('submit', '#customerForm', function(e) {
                            e.preventDefault();
                            let formData = new FormData(this);

                            $.ajax({
                              url: "{{ route('customerstore') }}",
                              type: "POST",
                              data: formData,
                              contentType: false,
                              processData: false,
                              success: function(response) {
                                Swal.fire({
                                  title: 'Success!',
                                  text: response.message,
                                  icon: 'success',
                                }).then(() => {
                                  // Redirect to 'user/contractmanage' after the SweetAlert confirmation
                                  window.location.href = "/user/contractmanage";
                                });
                              },
                              error: function(xhr) {
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
                                  <a class="dropdown-itemm notify" data-bs-toggle="modal" data-bs-target="#notify_customer">
                                    <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M0.980729 9.90006L11.1599 5.53673C11.2651 5.49191 11.3548 5.41713 11.4179 5.32172C11.481 5.2263 11.5146 5.11444 11.5146 5.00007C11.5146 4.88569 11.481 4.77383 11.4179 4.67842C11.3548 4.583 11.2651 4.50823 11.1599 4.4634L0.980729 0.100066C0.892588 0.0616207 0.796263 0.0457239 0.700443 0.0538091C0.604623 0.0618942 0.512323 0.093707 0.43187 0.146378C0.351417 0.199048 0.285342 0.270919 0.239607 0.355507C0.193871 0.440095 0.169914 0.534739 0.169896 0.630899L0.164062 3.32007C0.164062 3.61173 0.379896 3.86257 0.671562 3.89757L8.91406 5.00007L0.671562 6.09673C0.379896 6.13757 0.164062 6.3884 0.164062 6.68007L0.169896 9.36923C0.169896 9.7834 0.595729 10.0692 0.980729 9.90006Z" fill="#414651" />
                                    </svg>
                                    Notify </a>

                                  <a class="dropdown-itemm ediit">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M1.68029 10.5673C1.70709 10.3261 1.7205 10.2055 1.75699 10.0928C1.78936 9.99277 1.83511 9.89759 1.89298 9.80983C1.9582 9.71092 2.04401 9.62512 2.21561 9.45351L9.91929 1.74985C10.5636 1.10552 11.6083 1.10552 12.2526 1.74985C12.897 2.39418 12.897 3.43885 12.2526 4.08319L4.54894 11.7868C4.37734 11.9585 4.29154 12.0443 4.19262 12.1095C4.10487 12.1673 4.00969 12.2131 3.90968 12.2455C3.79696 12.282 3.67635 12.2954 3.43515 12.3222L1.46094 12.5415L1.68029 10.5673Z" stroke="#414651" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg> Edit Details </a>

                                  <a class="dropdown-itemm delle">
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

                      <!-- notify model start -->

                      <div class="modal fade drop_coman_file have_title" id="notify_customer" tabindex="-1" role="dialog" aria-labelledby="notify_customer" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" style="font-weight:700">Notify Customer</h5>
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

                                <div class="gropu_form_set">
                                  <label for="read_onlyy">Selected Contract</label>
                                  <h2 class="read_onlyy">OrangeXT Contract 245</h2>

                                </div>
                                <div class="gropu_form_set">
                                  <label for="expiring_opm">Select an option</label>
                                  <select id="expiring_opm" name="expiring_opm" required="">
                                    <option value="" disabled="" selected="">select</option>
                                    <option value="Upcoming Expiry Alert">Upcoming Expiry Alert</option>
                                    <option value="Upcoming Renewal Alert">Upcoming Renewal Alert</option>
                                    <option value="Missing Documentation">Missing Documentation</option>
                                    <option value="Payment Due Alert">Payment Due Alert</option>
                                    <option value="Other">Other</option>
                                  </select>
                                </div>
                                <div class="gropu_form_set">
                                  <label for="Message">Message</label>
                                  <textarea placeholder="Your contract [Contract ID/Name] with [Vendor/Client Name] is set to expire on [Expiry Date]. Please take the necessary action to renew or terminate the contract before the expiry date." id="" name="" readonly></textarea>
                                </div>


                                <div class="root_btn">
                                  <button class="btn btn-primary" style="border-radius:5px;" type="submit">Send
                                    <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M0.980729 9.90006L11.1599 5.53673C11.2651 5.49191 11.3548 5.41713 11.4179 5.32172C11.481 5.2263 11.5146 5.11444 11.5146 5.00007C11.5146 4.88569 11.481 4.77383 11.4179 4.67842C11.3548 4.583 11.2651 4.50823 11.1599 4.4634L0.980729 0.100066C0.892588 0.0616207 0.796263 0.0457239 0.700443 0.0538091C0.604623 0.0618942 0.512323 0.093707 0.43187 0.146378C0.351417 0.199048 0.285342 0.270919 0.239607 0.355507C0.193871 0.440095 0.169914 0.534739 0.169896 0.630899L0.164062 3.32007C0.164062 3.61173 0.379896 3.86257 0.671562 3.89757L8.91406 5.00007L0.671562 6.09673C0.379896 6.13757 0.164062 6.3884 0.164062 6.68007L0.169896 9.36923C0.169896 9.7834 0.595729 10.0692 0.980729 9.90006Z" fill="white" />
                                    </svg>
                                  </button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- notify model end -->


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