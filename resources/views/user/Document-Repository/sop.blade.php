@extends('user.includes.sop') @section('content')
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
           SOP
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
           SOP
          </h2>
            </div>

             <!-- Container-fluid start-->
      <div class="container-fluid soop">
        <div class="row">
          <div class="col-md-12">
         
            <div class="Inc_table">
              <div class="row">
                <div class="col-sm-12 tba_history_rap">
                  <div class="filtr_tabble">
                    <div class="table_title">
                        <h2>Standard Operating Procedures</h2>
</div>
                    <div class="hearder-entres">
                      <div class="volt_headd-filter">
                        <button>
                          <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.59282 11.625H4.5V5.94909L0.5625 1.26159V0.375H11.25V1.25653L7.5 5.94403V9.71782L5.59282 11.625ZM5.25 10.875H5.28218L6.75 9.40718V5.68097L10.3948 1.125H1.42734L5.25 5.67591V10.875Z" fill="#868686" />
                          </svg> Apply Filter </button>
                      </div>
                      <div class="sadd_filds">
                        <button class="hvr-rotate"> + Add </button>
                      </div>
                    </div>
                    <div class="entery_body table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th></th>
                            <th>File name</th>
                            <th>Type</th>
                            <th>Size</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>



                          
                  
    <tr class="" >
                          
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
                          <td>SOP - Employee Onboarding </td>
                          <td>
                           
                            <button class="btn btn-primary" style="border-radius:5px;" data-bs-toggle="modal" data-bs-target="#ArticleofAssociation">
                              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.25 12V5.8875L6.3 7.8375L5.25 6.75L9 3L12.75 6.75L11.7 7.8375L9.75 5.8875V12H8.25ZM4.5 15C4.0875 15 3.7345 14.8533 3.441 14.5597C3.1475 14.2662 3.0005 13.913 3 13.5V11.25H4.5V13.5H13.5V11.25H15V13.5C15 13.9125 14.8533 14.2657 14.5597 14.5597C14.2662 14.8538 13.913 15.0005 13.5 15H4.5Z" fill="#7E7E7E" />
                              </svg> Upload </button>
                            <div class="modal fade" id="ArticleofAssociation" tabindex="-1" role="dialog" aria-labelledby="ArticleofAssociation" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" style="font-weight:700"></h5>
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
                                    <h3>SOP - Employee Onboarding</h3>


                                    <form action="" method="POST" enctype="multipart/form-data" class="upload-form"> 
                                      @csrf
                                                                          
                                    <div class="file-area">      
                                    <input type="file" class="dragfile" id="aoa-file" name="file" accept=".pdf,.doc,.docx" required>    
                          <input type="hidden" id="real_file_name" name="real_file_name" value="AoA (Article of Association)">
                          <input type="hidden" id="file_status" name="file_status" value="0">
  <div class="file-dummy">
    <div class="success">Great, your files are selected. Keep on.</div>
    <div class="default">
    <span class="upload_icon">
                          <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88"><title>file-upload</title><path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z"/></svg>
                          </span>  
                          Drag and Drop files here or <span class="fille">Choose File</span>
  </div>
  </div>
  <br><div class="selected-file"></div>
</div> 
                          <span class="basic-file">Note:- file|mimes:pdf,doc,docx|max size:2048kb</span>                             
                          <button class="btn btn-primary"  style="border-radius:5px;" type="submit">Upload</button>

                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                          </td>
                         
                          <td> 	12.95 KB</td>

<td>
                            <div class="dropdown" >
                              <button onclick="toggleDropdown()" class="dropbtn show_pp">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D" />
                                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D" />
                                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D" />
                                </svg>
                              </button>
                              <div id="myDropdown" class="dropdown-content"> <div class="down_del">
                                  <a class=" dropdown-itemm dnlod_nt" href="#">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M2.40625 12.25C2.00014 12.25 1.61066 12.0887 1.32349 11.8015C1.03633 11.5143 0.875 11.1249 0.875 10.7188V8.53125C0.875 8.3572 0.94414 8.19028 1.06721 8.06721C1.19028 7.94414 1.3572 7.875 1.53125 7.875C1.7053 7.875 1.87222 7.94414 1.99529 8.06721C2.11836 8.19028 2.1875 8.3572 2.1875 8.53125V10.7188C2.1875 10.8395 2.2855 10.9375 2.40625 10.9375H11.5938C11.6518 10.9375 11.7074 10.9145 11.7484 10.8734C11.7895 10.8324 11.8125 10.7768 11.8125 10.7188V8.53125C11.8125 8.3572 11.8816 8.19028 12.0047 8.06721C12.1278 7.94414 12.2947 7.875 12.4688 7.875C12.6428 7.875 12.8097 7.94414 12.9328 8.06721C13.0559 8.19028 13.125 8.3572 13.125 8.53125V10.7188C13.125 11.1249 12.9637 11.5143 12.6765 11.8015C12.3893 12.0887 11.9999 12.25 11.5938 12.25H2.40625Z" fill="white" />
                                      <path d="M6.34334 6.72788V1.75C6.34334 1.57595 6.41248 1.40903 6.53555 1.28596C6.65862 1.16289 6.82554 1.09375 6.99959 1.09375C7.17364 1.09375 7.34056 1.16289 7.46363 1.28596C7.5867 1.40903 7.65584 1.57595 7.65584 1.75V6.72788L9.37959 5.005C9.44049 4.9441 9.51279 4.89579 9.59236 4.86283C9.67193 4.82987 9.75722 4.81291 9.84334 4.81291C9.92947 4.81291 10.0148 4.82987 10.0943 4.86283C10.1739 4.89579 10.2462 4.9441 10.3071 5.005C10.368 5.0659 10.4163 5.1382 10.4493 5.21777C10.4822 5.29734 10.4992 5.38262 10.4992 5.46875C10.4992 5.55488 10.4822 5.64016 10.4493 5.71973C10.4163 5.7993 10.368 5.8716 10.3071 5.9325L7.46334 8.77625C7.40247 8.83721 7.33018 8.88556 7.25061 8.91856C7.17103 8.95155 7.08574 8.96853 6.99959 8.96853C6.91345 8.96853 6.82815 8.95155 6.74857 8.91856C6.669 8.88556 6.59671 8.83721 6.53584 8.77625L3.69209 5.9325C3.63119 5.8716 3.58288 5.7993 3.54992 5.71973C3.51696 5.64016 3.5 5.55488 3.5 5.46875C3.5 5.38262 3.51696 5.29734 3.54992 5.21777C3.58288 5.1382 3.63119 5.0659 3.69209 5.005C3.75299 4.9441 3.82529 4.89579 3.90486 4.86283C3.98443 4.82987 4.06972 4.81291 4.15584 4.81291C4.24197 4.81291 4.32725 4.82987 4.40682 4.86283C4.48639 4.89579 4.55869 4.9441 4.61959 5.005L6.34334 6.72788Z" fill="white" />
                                    </svg> Download </a>
                                  <a class="dropdown-itemm delet_nt" href="#">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A" />
                                    </svg> Delete </a>
                                   
                                </div>
                                <a class="dropdown-itemm rename_nt" data-bs-toggle="modal" data-bs-target="#edit_histry_1">
                                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.75 9.33323L6.41667 11.6666H12.25V9.33323H8.75ZM7.035 4.19406L1.75 9.47906V11.6666H3.9375L9.2225 6.38156L7.035 4.19406ZM10.9142 4.6899C11.1417 4.4624 11.1417 4.08323 10.9142 3.8674L9.54917 2.5024C9.4398 2.39389 9.29198 2.33301 9.13792 2.33301C8.98385 2.33301 8.83604 2.39389 8.72667 2.5024L7.65917 3.5699L9.84667 5.7574L10.9142 4.6899Z" fill="#8D8D8D" />
                                  </svg> Edit </a>
                                
                              </div>
                            </div>
                          </td>

                        </tr>

                                                             
                                           <!-- model start -->
<div class="modal fade" id="edit_histry_1" tabindex="-1" role="dialog" aria-labelledby="edit_histry_1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" style="font-weight:700">Edit Doc</h5>

                                                <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
            <span aria-hidden="true"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"/>
<rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"/>
</svg>
</span>
          </button>
                                            </div>
                                            <div class="modal-body ediit_nnt">
                                            <h3>Edit Doc</h3>
                                            <form action="" method="POST" enctype="multipart/form-data" class="upload-form"> 
                                      @csrf
                                      <input type="hidden" name="record_id1" value="">
                                              <div class="form-grouup">
<label for="fname">File  name:</label>
<input type="text" id="file_name" name="file_name" value="">
</div>
<div class="form-grouup">
<label for="lname">Doc File:</label>
<input type="file" id="aoa-file" name="file" accept=".pdf,.doc,.docx" >

</div>
<div class="form-grouup">
<label for="lname">Reason for Change :</label>
<input type="textarea" id="reasons_for_change" name="reasons_for_change" value="" accept=".pdf,.doc,.docx" required>
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

    $(document).ready(function(){
    $('.dropdown-itemm.history_nt').click(function(){
    $('.history_main').addClass('highlight');
  });

  $('#closeBtn').click(function(){
    $('.history_main').removeClass('highlight');
  });

});

  </script>

    @endsection
   
