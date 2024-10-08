@extends('user.includes.sale-manage') @section('content')
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
           Sales Management
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
           Sales Management
          </h2>
            </div>

             <!-- Container-fluid start-->
      <div class="container-fluid sale_managementt">
        <div class="row">
          <div class="col-md-12">
         
            <div class="Inc_table">
              <div class="row">
                <div class="col-sm-12 tba_history_rap">
                  <div class="filtr_tabble">
                    <div class="table_title">
                        <h2>Sales Management</h2>

                        <form method="POST" action="">
    <select id="status_type" name="status" class="form-select" required>
    <option disabled="" selected="">select</option>
    <option value="" >Last 30 Days</option>
    <option value="">6 months</option>
    <option value="">1 Year</option>
    <option value="">custom date</option>
  </select>
  </form> 

</div>


<!-- sale feature start -->
<div class="main_sale_feature">

    <!--  -->
    <div class="sale_repeat">
        <h3>Total Income</h3>
        <div class="sale_profit">
            <div class="sale_sign">
            <svg width="17" height="24" viewBox="0 0 17 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_2321_3947)">
<path d="M16.2826 5.82955V7.56818C16.2826 7.72727 16.2308 7.85795 16.1274 7.96023C16.0239 8.0625 15.8918 8.11364 15.7308 8.11364H12.8343C12.5699 9.75 11.8285 11.0795 10.6102 12.1023C9.39176 13.125 7.80555 13.75 5.85153 13.9773C7.77107 16 10.409 19.0455 13.7653 23.1136C13.9262 23.2955 13.9492 23.4886 13.8343 23.6932C13.7423 23.8977 13.5757 24 13.3343 24H9.97222C9.78831 24 9.64463 23.9318 9.54119 23.7955C6.02394 19.625 3.16187 16.3807 0.954977 14.0625C0.851529 13.9602 0.799805 13.8352 0.799805 13.6875V11.5227C0.799805 11.375 0.854402 11.2472 0.963598 11.1392C1.07279 11.0312 1.2021 10.9773 1.35153 10.9773H3.28256C4.79981 10.9773 6.02107 10.733 6.94636 10.2443C7.87164 9.75568 8.46072 9.04545 8.7136 8.11364H1.35153C1.19061 8.11364 1.05843 8.0625 0.954977 7.96023C0.851529 7.85795 0.799805 7.72727 0.799805 7.56818V5.82955C0.799805 5.67045 0.851529 5.53977 0.954977 5.4375C1.05843 5.33523 1.19061 5.28409 1.35153 5.28409H8.47222C7.81705 4 6.27682 3.35795 3.85153 3.35795H1.35153C1.2021 3.35795 1.07279 3.30398 0.963598 3.19602C0.854402 3.08807 0.799805 2.96023 0.799805 2.8125V0.545455C0.799805 0.386364 0.851529 0.255682 0.954977 0.153409C1.05843 0.0511364 1.19061 0 1.35153 0H15.6964C15.8573 0 15.9895 0.0511364 16.0929 0.153409C16.1964 0.255682 16.2481 0.386364 16.2481 0.545455V2.28409C16.2481 2.44318 16.1964 2.57386 16.0929 2.67614C15.9895 2.77841 15.8573 2.82955 15.6964 2.82955H11.6791C12.2193 3.52273 12.5872 4.34091 12.7826 5.28409H15.7308C15.8918 5.28409 16.0239 5.33523 16.1274 5.4375C16.2308 5.53977 16.2826 5.67045 16.2826 5.82955Z" fill="#E7E7E7"/>
</g>
<defs>
<clipPath id="clip0_2321_3947">
<rect width="16" height="24" fill="white" transform="translate(0.799805)"/>
</clipPath>
</defs>
</svg>

</div>
<div class="sale_text">
<h2>40,35,000</h2>
<span><b class="sale_plus">+12%</b> from last month</span>
</div>

</div>
</div>
<!--  -->

    <!--  -->
    <div class="sale_repeat">
        <h3>Total Leads Captured</h3>
        <div class="sale_profit">
            <div class="sale_sign">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M11.6663 4.6665C14.233 4.6665 16.333 6.7665 16.333 9.33317C16.333 11.8998 14.233 13.9998 11.6663 13.9998C9.09967 13.9998 6.99967 11.8998 6.99967 9.33317C6.99967 6.7665 9.09967 4.6665 11.6663 4.6665ZM19.833 24.4998L21.933 26.5648C22.5163 27.1482 23.333 26.6815 23.333 25.9932V20.9998L26.5997 17.0332C26.7297 16.8598 26.8088 16.6537 26.8283 16.4379C26.8478 16.2222 26.8067 16.0052 26.7098 15.8114C26.6129 15.6176 26.464 15.4547 26.2797 15.3407C26.0954 15.2268 25.883 15.1665 25.6663 15.1665H17.4997C16.5663 15.1665 15.983 16.3332 16.5663 17.0332L19.833 20.9998V24.4998ZM17.4997 21.8165L14.8163 18.5498C14.3497 17.9665 14.1163 17.2665 14.1163 16.5665C13.2997 16.3332 12.483 16.3332 11.6663 16.3332C6.53301 16.3332 2.33301 18.4332 2.33301 20.9998V23.3332H17.4997V21.8165Z" fill="#E7E7E7"/>
</svg>
</div>
<div class="sale_text">
<h2>148 Leads</h2>
<span><b class="sale_minus">-2%</b> from last month</span>
</div>

</div>
</div>
<!--  -->

    <!--  -->
    <div class="sale_repeat">
        <h3>Total Conversions</h3>
        <div class="sale_profit">
            <div class="sale_sign">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M20.4984 1.40625L9.50156 15.9047L3 9.40781L0 12.4078L9.99844 22.4062L24 4.40625L20.4984 1.40625Z" fill="#E7E7E7"/>
</svg>  
</div>
<div class="sale_text">
<h2>32 Converted</h2>
<span><b class="sale_plus">+6%</b> from last month</span>
</div>

</div>
</div>
<!--  -->

</div>
<!-- sale feature end -->

                    <div class="hearder-entres">
                      <div class="volt_headd-filter">
<h2>Leads & Conversions</h2>
                      </div>
                      <div class="sadd_filds">
                        <button class="hvr-rotate" id="add_trade"> + Add Leads </button>


                      </div>
                    </div>
                    <div class="entery_body table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Lead Name</th>
                            <th> Status</th>
                            <th>Date of Generation</th>
                            <th>Date of Closure</th>
                            <th>Expected Income</th>
                            <th>Realized  Income</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>


                                                    
    <tr class="active" >
                        
                          <td>
                            <div class="finish">
                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_511_3356)">
                                  <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black" />
                                </g>
                                <defs>
                                  <clipPath id="clip0_511_3356">
                                    <rect width="15" height="15" fill="white" />
                                  </clipPath>
                                </defs>
                              </svg>
                            </div>
                            <div class="unfinish">
                              <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F" />
                                <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F" />
                              </svg>
                            </div>
                          </td>
                          <td>A&A Private Limited Registration</td>

                          <td>Lined-up</td>

                          <td> 13 May, 2024  </td>
                       
            <td>28 May, 2024</td>
            <td>₹2.5 L</td>
            <td>₹35 L</td>

<td>
                            <div class="dropdown" >
                              <button onclick="toggleDropdown()" class="dropbtn show_pp">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D" />
                                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D" />
                                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D" />
                                </svg>
                              </button>
                              <div id="myDropdown" class="dropdown-content"> 
                                <div class="down_del">

                                  <a class="dropdown-itemm delet_nt" id="">
                                  <form method="POST" action="">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?')">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A" />
                                    </svg> Delete
                                                            </button>
                                                        </form>
                                                       
                                                 </a>
                                   
                                </div>
                                <a class="dropdown-itemm rename_nt" data-bs-toggle="modal" data-bs-target="#edit_histry_1" data-bs-toggle="modal" data-bs-target="#edit_histry_1">
                                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.75 9.33323L6.41667 11.6666H12.25V9.33323H8.75ZM7.035 4.19406L1.75 9.47906V11.6666H3.9375L9.2225 6.38156L7.035 4.19406ZM10.9142 4.6899C11.1417 4.4624 11.1417 4.08323 10.9142 3.8674L9.54917 2.5024C9.4398 2.39389 9.29198 2.33301 9.13792 2.33301C8.98385 2.33301 8.83604 2.39389 8.72667 2.5024L7.65917 3.5699L9.84667 5.7574L10.9142 4.6899Z" fill="#8D8D8D" />
                                  </svg> Edit </a>
                                
                              </div>
                            </div>
                          </td> 

                        </tr>
                       
                            <!-- data save field tr end-->



                                                             
                                           <!-- model start -->
<div class="modal fade" id="edit_histry_1" tabindex="-1" role="dialog" aria-labelledby="edit_histry_1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" style="font-weight:700">Edit Leads & Conversions</h5>

                                                <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
            <span aria-hidden="true"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"/>
<rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"/>
</svg>
</span>
          </button>
                                            </div>
                                            <div class="modal-body ediit_nnt">
                                            <h3>Edit Leads & Conversions</h3>
                                            <form action="" method="POST" enctype="multipart/form-data" class="upload-form"> 
                                      @csrf
                                      <input type="hidden" name="record_id1" value="">
                                              <div class="form-grouup">
<label for="fname">Name:</label>
<input type="text" id="file_name" name="file_name" value="">
</div>

<div class="form-grouup">
<label for="lname">Status:</label>
<select id="status_type" name="status" class="form-select" required>
  <option disabled="" selected="">select</option>
    <option value="Linedup" >Lined-up</option>
    <option value="Success">Success</option>
    <option value="Failed">Failed</option>
  </select>
</div>

<div class="form-grouup">
<label for="lname">Date of Generation :</label>
<input type="text" id="generation_edit" name="generation_edit" placeholder="Choose Date">
</div>

<div class="form-grouup">
<label for="lname">Date of Generation :</label>
<input type="text" id="closure_edit" name="closure_edit" placeholder="Choose Date">
</div>

<div class="form-grouup">
<button type="submit" value="Submit">Submit</button>
</div>
</form>
                                            </div>
                                        </div>
                                    </div>
                             </div>

                             <!-- model end -->                             

                             
                             <tr class="next-table" id="template-row" style="display:none">

<td>
    <div class="finish">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_511_3356)">
                <path d="M4 7.5L7 10L11 5M7.5 14.5C6.58075 14.5 5.6705 14.3189 4.82122 13.9672C3.97194 13.6154 3.20026 13.0998 2.55025 12.4497C1.90024 11.7997 1.38463 11.0281 1.03284 10.1788C0.68106 9.32951 0.5 8.41925 0.5 7.5C0.5 6.58075 0.68106 5.6705 1.03284 4.82122C1.38463 3.97194 1.90024 3.20026 2.55025 2.55025C3.20026 1.90024 3.97194 1.38463 4.82122 1.03284C5.6705 0.68106 6.58075 0.5 7.5 0.5C9.35652 0.5 11.137 1.2375 12.4497 2.55025C13.7625 3.86301 14.5 5.64348 14.5 7.5C14.5 9.35652 13.7625 11.137 12.4497 12.4497C11.137 13.7625 9.35652 14.5 7.5 14.5Z" stroke="black"></path>
            </g>
            <defs>
                <clipPath id="clip0_511_3356">
                    <rect width="15" height="15" fill="white"></rect>
                </clipPath>
            </defs>
        </svg>
    </div>
    <div class="unfinish">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F"></path>
            <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F"></circle>
        </svg>
    </div>
</td>
<td>
<form action="" method="POST" enctype="multipart/form-data" class="upload-form">
 @csrf
<input type="text" id="file_name" name="file_name"  required placeholder="Enter Name "><br>
 
</td>

<td>
<select id="status_type" name="status" class="form-select" required>
  <option disabled="" selected="">select</option>
    <option value="Linedup" >Lined-up</option>
    <option value="Success">Success</option>
    <option value="Failed">Failed</option>
  </select>
</td>


<td>
<input type="text" id="generation" name="generation" placeholder="Choose Date">
</td>

<td>
<input type="text" id="closure" name="closure" placeholder="Choose Date">
</td>


<td>
<input type="text" id="amount_expected" name="amount_expected"  required placeholder="Enter Amount">  
</td>

<td>
<input type="text" id="amount_income" name="amount_income"  required placeholder="Enter Amount">  
</td>
                            <td class="btnset">
                            
                            <button class="btn" type="submit" value="Submit"> Save</button>

                            <button class="btn" id="cancelbtn" type="button" value="Cancel">
    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 1L15 15M1 15L15 1" stroke="black" stroke-width="2"/>
    </svg>
</button>

</form> 
                            </td>



</tr>          
         <!-- new table tr end --> 

         <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the template row
        var templateRow = document.getElementById('template-row');

        // Add event listener to the "Add Leads" button
        document.getElementById('add_trade').addEventListener('click', function() {
            if (templateRow) {
                // Show the template row
                templateRow.style.display = 'table-row';
            } else {
                console.error("Template row element not found.");
            }
        });

        // Add event listener to the "Cancel" button in each row
        document.addEventListener('click', function(event) {
    // Check if the clicked element or its parent has the id 'cancelbtn'
    if (event.target.closest('#cancelbtn')) {
        // Hide the row when the "Cancel" button is clicked
        event.target.closest('.next-table').style.display = 'none';
    }
});

    });
</script>                                                                                              
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

    <style>
    .upload-btn {
      background-color: #4CAF50;
      color: white;
      padding: 6px 10px;
      border: none;
      cursor: pointer;
    }
    button.delete-button {
    background: transparent;
    border: none;
    display: inline-flex;
}

    .file-name {
      cursor: pointer;
    }

    .filess {
      background: #5790FF;
      border: 2px solid #5790FF;
      border-radius: 7px;
      font-weight: 600;
      color: white;
      padding: 8px;
    }

    /* Dropdown button */
    .dropbtn {
      background-color: #3498db;
      color: white;
      padding: 10px;
      font-size: 16px;
      border: none;
    }

    /* Dropdown content (hidden by default) */
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 180px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
      right: 0;
      border: 1px solid #CCD4E5;
      border-radius: 10px;
      padding: 10px;
    }

    .dropdown-content .down_del {
      border-bottom: 1px solid #CCD4E5;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown-content .down_del .dnlod_nt {
      background: #5790FF;
      border-radius: 10px;
      color: #FFF !important;
    }

    .dropdown-content a.dropdown-itemm {
      padding: 10px 10px;
      color: #707070;
      font-weight: 500;
      display: flex;
      align-items: center;
      letter-spacing: normal;
    }

    .dropdown-content a.dropdown-itemm svg {
      margin: 0px 7px 0px 0px;
      display: flex;
      width: 16px;
      height: 16px;
    }


    .filtr_tabble table tr td button.btn {
    background: #E6EBF6 !important;
    color: #7E7E7E;
    border: 0;
    display: flex;
    align-items: center;
    padding: 7px 15px;
}
.file-area {
    width: 100%;
    min-height: 200px;
    border: 2px dashed #D2DBE5;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 15px;
    padding: 20px;
    position: relative;
}
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
    z-index: 1;
}
.filtr_tabble .modal-body button.btn {
    padding: 10px 30px;
    margin: 15px 0px 0px;
}

.file-dummy {
    width: 100%;
    padding: 30px;
    background: rgba(255,255,255,0.2);
    border: 2px dashed rgba(255,255,255,0.2);
    text-align: center;
    transition: background 0.3s ease-in-out;
}
.success {
    display: none;
}
.file-dummy .default {
    font-weight: 600;
    color: #9f9f9f;
    font-size: 16px;
}
.file-dummy .upload_icon {
    display: flex;
    justify-content: center;
    margin: 0px 0px 3px;
}
.file-area .upload_icon svg {
    position: relative;
    margin: 0;
    width: 40px;
    height: 40px;
    top: unset;
    fill: #9f9f9f;
}
.file-dummy .default .fille {
    border-bottom: 1px solid #9f9f9f;
}

.filtr_tabble .modal-body h3 {
    font-size: 14px;
    margin: 0px 0px 14px 0px;
}

.filtr_tabble .modal-header button.close {
    background: transparent;
    width: 35px;
    height: 35px;
}

.filtr_tabble .modal-header button.close span svg {
    width: 100%;
    height: 100%;
}
.filtr_tabble .entery_body::-webkit-scrollbar {
  width: 1px;
}

.filtr_tabble .entery_body::-webkit-scrollbar-track {
  background: #f1f1f1;
}

.filtr_tabble .entery_body::-webkit-scrollbar-thumb {
  background: #888;
}
.dark-only .filtr_tabble .modal-header button.close {
    background: transparent;
    box-shadow: none;
    outline: none;
    border: 0;
}

.dark-only .filtr_tabble .modal-header button.close svg {
    filter: invert(1);
}

.dark-only .dropdown-content {
    background-color: #282d3b;
    border-color: #A3AED0;
}

.dark-only .dropdown-content a.dropdown-itemm {
    color: #A3AED0;
}
.ediit_nnt input[type=file] {
    position: relative;
    opacity: 1;
    visibility: visible;
    left: unset;
    bottom: unset;
    top: unset;
    right: unset;
}

  </style>
 <script>
    function toggleDropdown() {
      var dropdown = document.getElementById("myDropdown");
      if (dropdown.style.display === "block") {
        dropdown.style.display = "none";
      } else {
        dropdown.style.display = "block";
      }
    }


  </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
<script>
$("#closure").flatpickr({
    enableTime: false,
    dateFormat: "Y-m-d", // Set the date format to "YYYY-MM-DD"
    maxDate: "today"
});

$("#generation").flatpickr({
  enableTime: false,
    dateFormat: "Y-m-d", // Set the date format to "YYYY-MM-DD"
    minDate: "today" // Disable dates before today
});
</script>

<script>
$("#closure_edit").flatpickr({
    enableTime: false,
    dateFormat: "Y-m-d", // Set the date format to "YYYY-MM-DD"
    maxDate: "today"
});

$("#generation_edit").flatpickr({
  enableTime: false,
    dateFormat: "Y-m-d", // Set the date format to "YYYY-MM-DD"
    minDate: "today" // Disable dates before today
});
</script>



    @endsection
   
