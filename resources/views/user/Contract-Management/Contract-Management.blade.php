@extends('user.includes.Contract-Management') @section('content')
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session('error') }}',
        });
    </script>
@endif

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
             <div class="container-fluid mian_director main_contractt">
          <div class="row">  

<div class="col-md-6">
<div class="kyc-infoo">

<div class="kyc-info">
<div class="column-tabs">

<div class="tabs">
  <button class="tab-link active" onclick="openTabbb('kyc')">Vendor Contracts</button>
  <button class="tab-link" onclick="openTabbb('dsc')">Customer Contracts</button>
</div>

<div id="tab-kyc" class="tab active">
  <!-- Content for Vendor Contracts tab -->
  <div class="manage_co_nt">
  
   <div class="manage_co_wrap">
   
  <div class="hearder-entres">    
                      <div class="volt_headd-filter">

                     
                      <div class="filter-container">
    <h3>Filter by Status</h3>
    <select id="status-filter" onchange="filterContracts()">
        <option value="all">All</option>
        <option value="active">Active</option>
        <option value="expired">Expired</option>
    </select>
</div>



                          
                          <a href="{{ route('export.contracts') }}" class="exprot_master"><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9.58073 5.00008L7.91406 3.33341V4.58341H4.16406V5.41675H7.91406V6.66675M0.414062 7.50008V2.50008C0.414062 2.27907 0.50186 2.06711 0.65814 1.91083C0.814421 1.75455 1.02638 1.66675 1.2474 1.66675H6.2474C6.46841 1.66675 6.68037 1.75455 6.83665 1.91083C6.99293 2.06711 7.08073 2.27907 7.08073 2.50008V3.75008H6.2474V2.50008H1.2474V7.50008H6.2474V6.25008H7.08073V7.50008C7.08073 7.72109 6.99293 7.93306 6.83665 8.08934C6.68037 8.24562 6.46841 8.33341 6.2474 8.33341H1.2474C1.02638 8.33341 0.814421 8.24562 0.65814 8.08934C0.50186 7.93306 0.414063 7.72109 0.414062 7.50008Z" fill="#898989"/>
</svg>Export Contract Master</a>
                      </div>
                    </div>

<div class="data_tabs">
<div class="tabs">
@foreach($contract as $cont)
@if($cont->contracttype == 'normalcontract')
<button class="tablinks active" onclick="openTab(event, 'tab1{{$cont->id}}')" data-status="{{ strtotime(date('Y-m-d')) < strtotime($cont->startend) ? 'active' : 'expired' }}">


<div class="btn_up_cont">
    <div class="up_lleft">
        <h2>{{$cont->contract_name}} <span>{{$cont->divison}}</span></h2>
        <span>{{$cont->contract_type}}</span>
</div>
<div class="up_right">
<span class="date">{{ date('F d, Y', strtotime($cont->startdate)) }} - {{ date('F d, Y', strtotime($cont->startend)) }}</span>

@if(strtotime(date('Y-m-d')) < strtotime($cont->startend))
    <h3 class="status ac">ACTIVE</h3>
@else
    <h3 class="status ex">EXPIRED</h3>
@endif
</div>
</div>
<div class="btn_btm_cont">
    <div class="cont_icon">
    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6 1C5.46957 1 4.96086 1.21071 4.58579 1.58579C4.21071 1.96086 4 2.46957 4 3C4 3.53043 4.21071 4.03914 4.58579 4.41421C4.96086 4.78929 5.46957 5 6 5C6.53043 5 7.03914 4.78929 7.41421 4.41421C7.78929 4.03914 8 3.53043 8 3C8 2.46957 7.78929 1.96086 7.41421 1.58579C7.03914 1.21071 6.53043 1 6 1ZM8.5 6H3.5C3.10218 6 2.72064 6.15804 2.43934 6.43934C2.15804 6.72064 2 7.10218 2 7.5C2 8.616 2.459 9.51 3.212 10.115C3.953 10.71 4.947 11 6 11C7.053 11 8.047 10.71 8.788 10.115C9.54 9.51 10 8.616 10 7.5C10 7.10218 9.84196 6.72064 9.56066 6.43934C9.27936 6.15804 8.89782 6 8.5 6Z" fill="#434959"/>
</svg>
</div>
<div class="cont_text">
    <h3>{{$cont->vendor_name}}</h3>
    <span>{{$cont->legal_entity_status}}</span>
</div>
</div>

</button>

@endif
@endforeach
</div>
</div>
</div>
<script>
  function filterContracts() {
    const selectedStatus = document.getElementById("status-filter").value;
    
    const contracts = document.querySelectorAll("button.tablinks");
    
    contracts.forEach(contract => {
        const contractStatus = contract.getAttribute("data-status");
        
        // Show the contract if it matches the selected status
        if (selectedStatus === 'all' || contractStatus === selectedStatus) {
            contract.style.display = "block"; // Show matching contracts
        } else {
            contract.style.display = "none"; // Hide non-matching contracts
        }
    });
}

</script>

<script>
  function filterContracts1() {
    const selectedStatus = document.getElementById("status-filters").value;
    
    const contracts = document.querySelectorAll("button.tablinks");
    
    contracts.forEach(contract => {
        const contractStatus = contract.getAttribute("data-status");
        
        // Show the contract if it matches the selected status
        if (selectedStatus === 'all' || contractStatus === selectedStatus) {
            contract.style.display = "block"; // Show matching contracts
        } else {
            contract.style.display = "none"; // Hide non-matching contracts
        }
    });
}

</script>
  <div class="hearder-entress enteries_bottom">
                      <div class="sadd_filds">
                      <button class="hvr-rotate" id="addCustomDocButton" data-bs-toggle="modal" data-bs-target="#add_contract1"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.41797 7.58341H2.91797V6.41675H6.41797V2.91675H7.58464V6.41675H11.0846V7.58341H7.58464V11.0834H6.41797V7.58341Z" fill="#7E7E7E"></path>
</svg> Upload Contract</button>

<!-- model start -->
<div class="modal fade drop_coman_file have_title" id="add_contract1" tabindex="-1" role="dialog" aria-labelledby="add_contract1" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" style="font-weight:700">Upload Contract</h5>
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
                                    <h3>upload contract</h3>


                                    <form id="contractForm" action="{{ route('storecontract') }}" method="POST" enctype="multipart/form-data" class="upload-form rers_pages_hide"> 
                                      @csrf
									  
									    <div class="rers_pages">
										<div class="page page1">
                                                                          
                                    <div class="file-area">      
                                    <input type="file" class="dragfile" id="contractfile" name="file" accept=".pdf,.doc,.docx" required>    
                          
  <div class="file-dummy">
    <div class="success">Great, your files are selected. Keep on.</div>
    <div class="default">
    <span class="upload_icon">
      
                          <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88"><title>file-upload</title><path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z"/></svg>
                          </span>  
                          Upload a file <span class="fille">Choose File</span>
  </div>
  </div>
  <br><div class="selected-file"></div>
</div> 
                          <span class="basic-file">Note:- file|mimes:pdf,doc,docx|max size:2048kb</span>    
<hr class="cusrom_hr"/>
                          <div class="gropu_form">
                          <label for="fname">Contract name <span class="red_star">*</span></label>
                           <input placeholder="Type" required type="text" id="contract_name" name="contract_name">
                           <input  required type="hidden" id="contracttype" name="contracttype" value="normalcontract">
                          </div>

                          <div class="gropu_form">
                          <label for="con_type">Contract type <span class="red_star">*</span></label>
  <select id="contract_type" name="contract_type" required>
  <option value="" disabled Selected>select</option>
    <option value="Non-disclosure Agreement (NDA)">Non-disclosure Agreement (NDA)</option>
    <option value="Service Agreement">Service Agreement</option>
    <option value="Employment Contract">Employment Contract</option>
    <option value="Partnership Agreement">Partnership Agreement</option>
    <option value="Vendor Agreement">Vendor Agreement</option>
    <option value="Purchase Agreement">Purchase Agreement</option>
    <option value="Lease Agreement">Lease Agreement</option>
    <option value="Licensing Agreement">Licensing Agreement</option>
    <option value="Consultancy Agreement">Consultancy Agreement</option>
    <option value="Master Service Agreement (MSA)">Master Service Agreement (MSA)</option>
    <option value="Sales Agreement">Sales Agreement</option>
    <option value="Joint Venture Agreement">Joint Venture Agreement</option>
    <option value="Distribution Agreement">Distribution Agreement</option>
    <option value="Subcontractor Agreement">Subcontractor Agreement</option>
    <option value="Termination Agreement">Termination Agreement</option>
    <option value="Software License Agreement">Software License Agreement</option>
    <option value="Supply Agreement">Supply Agreement</option>
  </select>
                          </div>

                          <div class="gropu_form">
                          <label for="Division">Division</label>
  <select id="divison" name="divison" required>
  <option value="" disabled Selected>select</option>
    <option value="Human Resources">Human Resources</option>
    <option value="Finance">Finance</option>
    <option value="Legal">Legal</option>
    <option value="Operations">Operations</option>
    <option value="IT/Technology">IT/Technology</option>
    <option value="Sales & Marketing">Sales & Marketing</option>
    <option value="Procurement">Procurement</option>
    <option value="Administration">Administration</option>
    <option value="Research & Development">Research & Development</option>
    <option value="Customer Support">Customer Support</option>
    <option value="Compliance">Compliance</option>
    <option value="Risk Management">Risk Management</option>
    <option value="Logistics">Logistics</option>
    <option value="Corporate Affairs">Corporate Affairs</option>
    <option value="Public Relations">Public Relations</option>
  </select>
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Vendor name <span class="red_star">*</span></label>
                           <input placeholder="Type" type="text" required id="vendor_name" name="vendor_name">
                          </div>

                          
                          <div class="gropu_form">
                          <label for="les">Legal entity status <span class="red_star">*</span></label>
  <select id="legal_entity_status" name="legal_entity_status" required>
  <option value="" disabled Selected>select</option>
    <option value="Sole Proprietorship">Sole Proprietorship</option>
    <option value="Partnership">Partnership</option>
    <option value="Limited Liability Company (LLC)">Limited Liability Company (LLC)</option>
    <option value="Private Limited Company (Pvt Ltd)">Private Limited Company (Pvt Ltd)</option>
    <option value="Public Limited Company (Ltd)">Public Limited Company (Ltd)</option>
    <option value="Corporation">Corporation</option>
    <option value="Non-Profit Organization (NGO)">Non-Profit Organization (NGO)</option>
    <option value="Trust">Trust</option>
    <option value="Government Entity">Government Entity</option>
    <option value="Joint Venture">Joint Venture</option>
    <option value="Association">Association</option>
    <option value="Cooperative Society">Cooperative Society</option>
  </select>
                          </div>

                          <div class="gropu_form">
                          <label for="start">Date of commencement <span class="red_star">*</span></label>
<input type="date" id="start" name="startdate"  required/>
                          </div>

                          
                          <div class="gropu_form">
                          <label for="start">Date of expiry <span class="red_star">*</span></label>
<input type="date" id="start" name="startend" required />
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Contract Value <span class="red_star">*</span></label>
                           <input placeholder="Type" required type="text" id="contract_value" name="contract_value">
                          </div>

                          <div class="gropu_form">
                          <label for="ss">Signing Status <span class="red_star">*</span></label>
  <select id="signing_status" name="signing_status" required>
  <option value="" disabled Selected>select</option>
    <option value="Draft">Draft</option>
    <option value="Pending Signature">Pending Signature</option>
    <option value="Signed">Signed</option>
    <option value="Signed with Amendments">Signed with Amendments</option>
    <option value="Partially Signed">Partially Signed</option>
    <option value="Awaiting Counterparty Signature">Awaiting Counterparty Signature</option>
    <option value="Rejected">Rejected</option>
    <option value="Expired">Expired</option>
    <option value="Revoked">Revoked</option>
    <option value="In Review">In Review</option>
    <option value="Terminated">Terminated</option>
  </select>
                          </div>


</div>
  <div class="page page2 hidden">
  
  <div class="gropu_form test-areaa">
                          <label for="fname">Renewal Terms <span class="red_star">*</span></label>
                          <textarea name="renewal_terms" required style="height: 58px;"> </textarea>
                          </div>

                          <div class="gropu_form test-areaa">
                          <label for="fname">Payment Terms <span class="red_star">*</span></label>
                          <textarea name="payment_terms" required style="height: 58px;"> </textarea>
                          </div>

                          <div class="gropu_form test-areaa">
                          <label for="fname">Fee Escalation Clause <span class="red_star">*</span></label>
                          <textarea name="fee_escalation_clause" required style="height: 58px;"> </textarea>
                          </div>




  </div>
</div>

                          <div class="wrpa_bbtn">
                          <div class="next_pre">
                  <button type="button" id="backBtn" class="hidden">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="0.5" y="-0.5" width="29" height="29" rx="14.5" transform="matrix(1 0 0 -1 0 29)" stroke="black" />
                      <path d="M9.21345 15.5415H21.3339C21.4947 15.5415 21.6488 15.4776 21.7624 15.3639C21.8761 15.2502 21.9399 15.0959 21.9399 14.9351C21.9399 14.7742 21.8761 14.62 21.7624 14.5063C21.6488 14.3925 21.4947 14.3287 21.3339 14.3287H9.21345C9.05272 14.3287 8.89857 14.3925 8.78492 14.5063C8.67127 14.62 8.60742 14.7742 8.60742 14.9351C8.60742 15.0959 8.67127 15.2502 8.78492 15.3639C8.89857 15.4776 9.05272 15.5415 9.21345 15.5415Z" fill="black" />
                      <path d="M9.46402 14.9349L14.4904 9.90645C14.6042 9.79264 14.6681 9.63817 14.6681 9.47711C14.6681 9.31614 14.6042 9.16167 14.4904 9.04775C14.3766 8.93394 14.2222 8.87 14.0613 8.87C13.9004 8.87 13.746 8.93394 13.6322 9.04775L8.17804 14.5056C8.1216 14.562 8.07682 14.6289 8.04627 14.7026C8.01573 14.7762 8 14.8552 8 14.9349C8 15.0147 8.01573 15.0937 8.04627 15.1674C8.07682 15.2411 8.1216 15.308 8.17804 15.3643L13.6322 20.8222C13.746 20.936 13.9004 21 14.0613 21C14.2222 21 14.3766 20.936 14.4904 20.8222C14.6042 20.7083 14.6681 20.5538 14.6681 20.3928C14.6681 20.2318 14.6042 20.0773 14.4904 19.9635L9.46402 14.9349Z" fill="black" />
                    </svg>
                  </button>

                <button type="button" id="nextBtn">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="29.5" y="29.5" width="29" height="29" rx="14.5" transform="rotate(180 29.5 29.5)" stroke="black" />
                      <path d="M20.7866 15.5415H8.66608C8.50532 15.5415 8.35124 15.4776 8.2376 15.3639C8.12386 15.2502 8.06006 15.0959 8.06006 14.9351C8.06006 14.7742 8.12386 14.62 8.2376 14.5063C8.35124 14.3925 8.50532 14.3287 8.66608 14.3287H20.7866C20.9473 14.3287 21.1014 14.3925 21.2151 14.5063C21.3287 14.62 21.3926 14.7742 21.3926 14.9351C21.3926 15.0959 21.3287 15.2502 21.2151 15.3639C21.1014 15.4776 20.9473 15.5415 20.7866 15.5415Z" fill="black" />
                      <path d="M20.536 14.9349L15.5096 9.90645C15.3958 9.79264 15.3319 9.63817 15.3319 9.47711C15.3319 9.31614 15.3958 9.16167 15.5096 9.04775C15.6234 8.93394 15.7778 8.87 15.9387 8.87C16.0996 8.87 16.254 8.93394 16.3678 9.04775L21.822 14.5056C21.8784 14.562 21.9232 14.6289 21.9537 14.7026C21.9843 14.7762 22 14.8552 22 14.9349C22 15.0147 21.9843 15.0937 21.9537 15.1674C21.9232 15.2411 21.8784 15.308 21.822 15.3643L16.3678 20.8222C16.254 20.936 16.0996 21 15.9387 21C15.7778 21 15.6234 20.936 15.5096 20.8222C15.3958 20.7083 15.3319 20.5538 15.3319 20.3928C15.3319 20.2318 15.3958 20.0773 15.5096 19.9635L20.536 14.9349Z" fill="black" />
                    </svg>
                  </button> 
                </div>

                <div class="root_btn">                        
                          <button class="btn btn-primary"  style="border-radius:5px;" type="submit">Upload</button>
</div>
</div>
				
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
<!-- model end -->

                      </div>
                    </div>
					

</div>
</div>

<div id="tab-dsc" class="tab">
  <!-- Content for Customer Contracts tab -->
  <div class="manage_co_nt">
    
	   <div class="manage_co_wrap">
  <div class="hearder-entres">
    
                      <div class="volt_headd-filter">
                      <div class="filter-container">
    <h3>Filter by Status</h3>
    <select id="status-filters" onchange="filterContracts1()">
        <option value="all">All</option>
        <option value="active">Active</option>
        <option value="expired">Expired</option>
    </select>
</div>
                          <a href="{{ route('export.contractsss') }}" class="exprot_master"><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9.58073 5.00008L7.91406 3.33341V4.58341H4.16406V5.41675H7.91406V6.66675M0.414062 7.50008V2.50008C0.414062 2.27907 0.50186 2.06711 0.65814 1.91083C0.814421 1.75455 1.02638 1.66675 1.2474 1.66675H6.2474C6.46841 1.66675 6.68037 1.75455 6.83665 1.91083C6.99293 2.06711 7.08073 2.27907 7.08073 2.50008V3.75008H6.2474V2.50008H1.2474V7.50008H6.2474V6.25008H7.08073V7.50008C7.08073 7.72109 6.99293 7.93306 6.83665 8.08934C6.68037 8.24562 6.46841 8.33341 6.2474 8.33341H1.2474C1.02638 8.33341 0.814421 8.24562 0.65814 8.08934C0.50186 7.93306 0.414063 7.72109 0.414062 7.50008Z" fill="#898989"/>
</svg>Export Contract Master</a>
                      </div>
                    </div>

<div class="data_tabs">
<div class="tabs">
@foreach($contract as $cont)
@if($cont->contracttype == 'customercontract')
<button class="tablinks active" onclick="openTab(event, 'tab3{{$cont->id}}')" data-status="{{ strtotime(date('Y-m-d')) < strtotime($cont->startend) ? 'active' : 'expired' }}">
<div class="btn_up_cont">
    <div class="up_lleft">
    <h2>{{$cont->contract_name}} <span>{{$cont->divison}}</span></h2>
        <span>{{$cont->contract_type}}</span>
</div>
<div class="up_right">
<span class="date">{{ date('F d, Y', strtotime($cont->startdate)) }} - {{ date('F d, Y', strtotime($cont->startend)) }}</span>
@if(strtotime(date('Y-m-d')) < strtotime($cont->startend))
    <h3 class="status ac">ACTIVE</h3>
@else
    <h3 class="status ex">EXPIRED</h3>
@endif
</div>
</div>
<div class="btn_btm_cont">
    <div class="cont_icon">
    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6 1C5.46957 1 4.96086 1.21071 4.58579 1.58579C4.21071 1.96086 4 2.46957 4 3C4 3.53043 4.21071 4.03914 4.58579 4.41421C4.96086 4.78929 5.46957 5 6 5C6.53043 5 7.03914 4.78929 7.41421 4.41421C7.78929 4.03914 8 3.53043 8 3C8 2.46957 7.78929 1.96086 7.41421 1.58579C7.03914 1.21071 6.53043 1 6 1ZM8.5 6H3.5C3.10218 6 2.72064 6.15804 2.43934 6.43934C2.15804 6.72064 2 7.10218 2 7.5C2 8.616 2.459 9.51 3.212 10.115C3.953 10.71 4.947 11 6 11C7.053 11 8.047 10.71 8.788 10.115C9.54 9.51 10 8.616 10 7.5C10 7.10218 9.84196 6.72064 9.56066 6.43934C9.27936 6.15804 8.89782 6 8.5 6Z" fill="#434959"/>
</svg>
</div>
<div class="cont_text">
<h3>{{$cont->vendor_name}}</h3>
    <span>{{$cont->legal_entity_status}}</span>
</div>
</div>
</button>
@endif
@endforeach
</div>
</div>
</div>


<div class="hearder-entress enteries_bottom">
                      <div class="sadd_filds">
                      <button class="hvr-rotate" id="addCustomDocButton" data-bs-toggle="modal" data-bs-target="#add_contract2"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.41797 7.58341H2.91797V6.41675H6.41797V2.91675H7.58464V6.41675H11.0846V7.58341H7.58464V11.0834H6.41797V7.58341Z" fill="#7E7E7E"></path>
</svg> Upload Contract</button>

<!-- model start -->
<div class="modal fade drop_coman_file have_title" id="add_contract2" tabindex="-1" role="dialog" aria-labelledby="add_contract2" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" style="font-weight:700">Upload Contract</h5>
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
                                    <h3>upload contract</h3>


                                    <form action="{{ route('storecontract') }}" method="POST" enctype="multipart/form-data" class="upload-form rers_pages_hide"> 
                                      @csrf
									  
									    <div class="rers_pages">
										<div class="pagee pagee1">
                                                                          
                                     <div class="file-area">      
                                    <input type="file" class="dragfile" id="contractfile" name="file" accept=".pdf,.doc,.docx" required>    
                          
  <div class="file-dummy">
    <div class="success">Great, your files are selected. Keep on.</div>
    <div class="default">
    <span class="upload_icon">
      
                          <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88"><title>file-upload</title><path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z"/></svg>
                          </span>  
                          Upload a file <span class="fille">Choose File</span>
  </div>
  </div>
  <br><div class="selected-file"></div>
</div> 
                          <span class="basic-file">Note:- file|mimes:pdf,doc,docx|max size:2048kb</span>    
<hr class="cusrom_hr"/>
                          <div class="gropu_form">
                          <label for="fname">Contract name <span class="red_star">*</span></label>
                           <input placeholder="Type" required type="text" id="contract_name" name="contract_name">
                           <input  required type="hidden" id="contracttype" name="contracttype" value="customercontract">
                          </div>

                          <div class="gropu_form">
                          <label for="con_type">Contract type <span class="red_star">*</span></label>
  <select id="contract_type" name="contract_type" required>
  <option value="" disabled Selected>select</option>
    <option value="Non-disclosure Agreement (NDA)">Non-disclosure Agreement (NDA)</option>
    <option value="Service Agreement">Service Agreement</option>
    <option value="Employment Contract">Employment Contract</option>
    <option value="Partnership Agreement">Partnership Agreement</option>
    <option value="Vendor Agreement">Vendor Agreement</option>
    <option value="Purchase Agreement">Purchase Agreement</option>
    <option value="Lease Agreement">Lease Agreement</option>
    <option value="Licensing Agreement">Licensing Agreement</option>
    <option value="Consultancy Agreement">Consultancy Agreement</option>
    <option value="Master Service Agreement (MSA)">Master Service Agreement (MSA)</option>
    <option value="Sales Agreement">Sales Agreement</option>
    <option value="Joint Venture Agreement">Joint Venture Agreement</option>
    <option value="Distribution Agreement">Distribution Agreement</option>
    <option value="Subcontractor Agreement">Subcontractor Agreement</option>
    <option value="Termination Agreement">Termination Agreement</option>
    <option value="Software License Agreement">Software License Agreement</option>
    <option value="Supply Agreement">Supply Agreement</option>
  </select>
                          </div>

                          <div class="gropu_form">
                          <label for="Division">Division</label>
  <select id="divison" name="divison" required>
  <option value="" disabled Selected>select</option>
    <option value="Human Resources">Human Resources</option>
    <option value="Finance">Finance</option>
    <option value="Legal">Legal</option>
    <option value="Operations">Operations</option>
    <option value="IT/Technology">IT/Technology</option>
    <option value="Sales & Marketing">Sales & Marketing</option>
    <option value="Procurement">Procurement</option>
    <option value="Administration">Administration</option>
    <option value="Research & Development">Research & Development</option>
    <option value="Customer Support">Customer Support</option>
    <option value="Compliance">Compliance</option>
    <option value="Risk Management">Risk Management</option>
    <option value="Logistics">Logistics</option>
    <option value="Corporate Affairs">Corporate Affairs</option>
    <option value="Public Relations">Public Relations</option>
  </select>
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Vendor name <span class="red_star">*</span></label>
                           <input placeholder="Type" type="text" required id="vendor_name" name="vendor_name">
                          </div>

                          
                          <div class="gropu_form">
                          <label for="les">Legal entity status <span class="red_star">*</span></label>
  <select id="legal_entity_status" name="legal_entity_status" required>
  <option value="" disabled Selected>select</option>
    <option value="Sole Proprietorship">Sole Proprietorship</option>
    <option value="Partnership">Partnership</option>
    <option value="Limited Liability Company (LLC)">Limited Liability Company (LLC)</option>
    <option value="Private Limited Company (Pvt Ltd)">Private Limited Company (Pvt Ltd)</option>
    <option value="Public Limited Company (Ltd)">Public Limited Company (Ltd)</option>
    <option value="Corporation">Corporation</option>
    <option value="Non-Profit Organization (NGO)">Non-Profit Organization (NGO)</option>
    <option value="Trust">Trust</option>
    <option value="Government Entity">Government Entity</option>
    <option value="Joint Venture">Joint Venture</option>
    <option value="Association">Association</option>
    <option value="Cooperative Society">Cooperative Society</option>
  </select>
                          </div>

                          <div class="gropu_form">
                          <label for="start">Date of commencement <span class="red_star">*</span></label>
<input type="date" id="start" name="startdate"  required/>
                          </div>

                          
                          <div class="gropu_form">
                          <label for="start">Date of expiry <span class="red_star">*</span></label>
<input type="date" id="start" name="startend" required />
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Contract Value <span class="red_star">*</span></label>
                           <input placeholder="Type" required type="text" id="contract_value" name="contract_value">
                          </div>

                          <div class="gropu_form">
                          <label for="ss">Signing Status <span class="red_star">*</span></label>
  <select id="signing_status" name="signing_status" required>
  <option value="" disabled Selected>select</option>
    <option value="Draft">Draft</option>
    <option value="Pending Signature">Pending Signature</option>
    <option value="Signed">Signed</option>
    <option value="Signed with Amendments">Signed with Amendments</option>
    <option value="Partially Signed">Partially Signed</option>
    <option value="Awaiting Counterparty Signature">Awaiting Counterparty Signature</option>
    <option value="Rejected">Rejected</option>
    <option value="Expired">Expired</option>
    <option value="Revoked">Revoked</option>
    <option value="In Review">In Review</option>
    <option value="Terminated">Terminated</option>
  </select>
                          </div>


</div>
  <div class="pagee pagee2 hidden">
  
  <div class="gropu_form test-areaa">
                          <label for="fname">Renewal Terms <span class="red_star">*</span></label>
                          <textarea name="renewal_terms" required style="height: 58px;"> </textarea>
                          </div>

                          <div class="gropu_form test-areaa">
                          <label for="fname">Payment Terms <span class="red_star">*</span></label>
                          <textarea name="payment_terms" required style="height: 58px;"> </textarea>
                          </div>

                          <div class="gropu_form test-areaa">
                          <label for="fname">Fee Escalation Clause <span class="red_star">*</span></label>
                          <textarea name="fee_escalation_clause" required style="height: 58px;"> </textarea>
                          </div>




  </div>
</div>

                          <div class="wrpa_bbtnn">
                          <div class="next_pre">
                  <button type="button" id="backBtnn" class="hidden">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="0.5" y="-0.5" width="29" height="29" rx="14.5" transform="matrix(1 0 0 -1 0 29)" stroke="black" />
                      <path d="M9.21345 15.5415H21.3339C21.4947 15.5415 21.6488 15.4776 21.7624 15.3639C21.8761 15.2502 21.9399 15.0959 21.9399 14.9351C21.9399 14.7742 21.8761 14.62 21.7624 14.5063C21.6488 14.3925 21.4947 14.3287 21.3339 14.3287H9.21345C9.05272 14.3287 8.89857 14.3925 8.78492 14.5063C8.67127 14.62 8.60742 14.7742 8.60742 14.9351C8.60742 15.0959 8.67127 15.2502 8.78492 15.3639C8.89857 15.4776 9.05272 15.5415 9.21345 15.5415Z" fill="black" />
                      <path d="M9.46402 14.9349L14.4904 9.90645C14.6042 9.79264 14.6681 9.63817 14.6681 9.47711C14.6681 9.31614 14.6042 9.16167 14.4904 9.04775C14.3766 8.93394 14.2222 8.87 14.0613 8.87C13.9004 8.87 13.746 8.93394 13.6322 9.04775L8.17804 14.5056C8.1216 14.562 8.07682 14.6289 8.04627 14.7026C8.01573 14.7762 8 14.8552 8 14.9349C8 15.0147 8.01573 15.0937 8.04627 15.1674C8.07682 15.2411 8.1216 15.308 8.17804 15.3643L13.6322 20.8222C13.746 20.936 13.9004 21 14.0613 21C14.2222 21 14.3766 20.936 14.4904 20.8222C14.6042 20.7083 14.6681 20.5538 14.6681 20.3928C14.6681 20.2318 14.6042 20.0773 14.4904 19.9635L9.46402 14.9349Z" fill="black" />
                    </svg>
                  </button>

                <button type="button" id="nextBtnn">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="29.5" y="29.5" width="29" height="29" rx="14.5" transform="rotate(180 29.5 29.5)" stroke="black" />
                      <path d="M20.7866 15.5415H8.66608C8.50532 15.5415 8.35124 15.4776 8.2376 15.3639C8.12386 15.2502 8.06006 15.0959 8.06006 14.9351C8.06006 14.7742 8.12386 14.62 8.2376 14.5063C8.35124 14.3925 8.50532 14.3287 8.66608 14.3287H20.7866C20.9473 14.3287 21.1014 14.3925 21.2151 14.5063C21.3287 14.62 21.3926 14.7742 21.3926 14.9351C21.3926 15.0959 21.3287 15.2502 21.2151 15.3639C21.1014 15.4776 20.9473 15.5415 20.7866 15.5415Z" fill="black" />
                      <path d="M20.536 14.9349L15.5096 9.90645C15.3958 9.79264 15.3319 9.63817 15.3319 9.47711C15.3319 9.31614 15.3958 9.16167 15.5096 9.04775C15.6234 8.93394 15.7778 8.87 15.9387 8.87C16.0996 8.87 16.254 8.93394 16.3678 9.04775L21.822 14.5056C21.8784 14.562 21.9232 14.6289 21.9537 14.7026C21.9843 14.7762 22 14.8552 22 14.9349C22 15.0147 21.9843 15.0937 21.9537 15.1674C21.9232 15.2411 21.8784 15.308 21.822 15.3643L16.3678 20.8222C16.254 20.936 16.0996 21 15.9387 21C15.7778 21 15.6234 20.936 15.5096 20.8222C15.3958 20.7083 15.3319 20.5538 15.3319 20.3928C15.3319 20.2318 15.3958 20.0773 15.5096 19.9635L20.536 14.9349Z" fill="black" />
                    </svg>
                  </button> 
                </div>

                <div class="root_btn">                        
                          <button class="btn btn-primary"  style="border-radius:5px;" type="submit">Upload</button>
</div>
</div>
				
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
<!-- model end -->
                      </div>
                    </div>

</div>

</div>


</div>
</div>
</div>
</div>


<div class="col-md-6">
<div class="director-info management-infoo">

<!-- tab1 start -->
@foreach($contract as $cont)
@if($cont->contracttype == 'normalcontract')
<div id="tab1{{$cont->id}}" class="tabcontent">
<div class="contract-details">

<div class="btn_up_cont">
    <div class="up_lleft">
    <h2>{{$cont->contract_name}} <span>{{$cont->divison}}</span></h2>
        <span>{{$cont->contract_type}}</span>
</div>
<div class="up_right">
<a href="{{ route('download-contract-file', ['id' => $cont->id]) }}" class="view-cont">View Contract<svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.3691 4.38178C5.53296 4.54584 5.625 4.76824 5.625 5.00011C5.625 5.23199 5.53296 5.45438 5.3691 5.61845L2.06977 8.91895C1.98849 9.00019 1.89201 9.06462 1.78583 9.10857C1.67965 9.15252 1.56586 9.17513 1.45094 9.1751C1.33602 9.17508 1.22224 9.15242 1.11608 9.10841C1.00992 9.06441 0.913467 8.99993 0.832229 8.91866C0.750989 8.83738 0.686554 8.7409 0.642603 8.63472C0.598651 8.52854 0.576044 8.41474 0.576071 8.29982C0.576097 8.18491 0.59876 8.07112 0.642761 7.96496C0.686763 7.8588 0.751243 7.76235 0.83252 7.68111L3.51294 5.00011L0.831936 2.31911C0.748328 2.23844 0.681623 2.14192 0.635716 2.03518C0.589808 1.92845 0.565618 1.81365 0.564554 1.69747C0.56349 1.58129 0.585575 1.46606 0.62952 1.3585C0.673465 1.25095 0.738389 1.15322 0.820507 1.07103C0.902624 0.988832 1.00029 0.923815 1.1078 0.879768C1.21531 0.835722 1.33052 0.813528 1.4467 0.814483C1.56289 0.815437 1.67772 0.839521 1.78449 0.885327C1.89126 0.931134 1.98785 0.997747 2.0686 1.08128L5.3691 4.38178Z" fill="#5790FF"/>
</svg></a>
<!-- <a href="#" class="sharre"><svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M11.25 5.00008L7.16667 0.916748V3.25008C3.08333 3.83341 1.33333 6.75008 0.75 9.66675C2.20833 7.62508 4.25 6.69175 7.16667 6.69175V9.08341L11.25 5.00008Z" fill="#858585"/>
</svg>Share</a> -->
</div>
</div>
<div class="form_data">
    <div class="row align-dtat">
        <div class= "col-sm-9">
            <div class="for_roow">

 <div class="row">
 <div class="col-sm-6">
    <div class="form_group">
        <label>Name of the vendor</label>
        <span>{{$cont->vendor_name}}</span>
</div>
</div>
<div class="col-sm-6">
<div class="form_group">
        <label>Legal entity status</label>
        <span>{{$cont->legal_entity_status}}</span>
</div>
</div>
</div>

<div class="row">
 <div class="col-sm-6">
 <div class="form_group">
        <label>Date of commencement</label>
        <span>{{ date('F d, Y', strtotime($cont->startdate)) }}</span>
</div>
</div>
<div class="col-sm-6">
<div class="form_group">
        <label>Date of expiry</label>
        <span>{{ date('F d, Y', strtotime($cont->startend)) }}</span>
</div>
</div>
</div>

<div class="row">
 <div class="col-sm-6">
 <div class="form_group">
        <label>Total Contract Value</label>
        <span>{{$cont->contract_value}}</span>
</div>
</div>
<div class="col-sm-6">
<div class="form_group">
        <label>Signing Status</label>
        <span>{{$cont->signing_status}}</span>
</div>
</div>
</div>



</div>
</div>
<div class="col-sm-3">
@if(strtotime(date('Y-m-d')) < strtotime($cont->startend))
    <h3 class="status ac">ACTIVE</h3>
@else
    <h3 class="status ex">EXPIRED</h3>
@endif
</div>
</div>
</div>

<div class="accordion">
  <div class="accordion-item">
    <div class="accordion-header">Renewal Terms<svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.70431 5.70657C5.51681 5.89384 5.26264 5.99902 4.99764 5.99902C4.73264 5.99902 4.47847 5.89384 4.29097 5.70657L0.518971 1.9359C0.426126 1.84302 0.352488 1.73275 0.302258 1.6114C0.252027 1.49005 0.22619 1.36 0.22622 1.22867C0.226251 1.09733 0.252151 0.967293 0.302438 0.845969C0.352725 0.724645 0.426416 0.614415 0.519304 0.52157C0.612193 0.428725 0.722459 0.355085 0.843807 0.304855C0.965155 0.254625 1.09521 0.228787 1.22654 0.228818C1.35787 0.228849 1.48792 0.254748 1.60924 0.305036C1.73056 0.355323 1.84079 0.429015 1.93364 0.521903L4.99764 3.58524L8.06164 0.521236C8.15384 0.425683 8.26415 0.34945 8.38613 0.296984C8.50811 0.244518 8.63931 0.216872 8.77209 0.215656C8.90487 0.21444 9.03656 0.23968 9.15948 0.289903C9.2824 0.340126 9.39409 0.414325 9.48802 0.508173C9.58196 0.602022 9.65627 0.713638 9.7066 0.83651C9.75694 0.959382 9.78231 1.09105 9.78122 1.22383C9.78013 1.35661 9.7526 1.48784 9.70025 1.60987C9.6479 1.7319 9.57177 1.84228 9.47631 1.93457L5.70431 5.70657Z" fill="#858585"/>
</svg></div>
    <div class="accordion-content">
      <p>{{$cont->renewal_terms}}</p>
    </div>
  </div>
  <div class="accordion-item">
    <div class="accordion-header">Payment Terms<svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.70431 5.70657C5.51681 5.89384 5.26264 5.99902 4.99764 5.99902C4.73264 5.99902 4.47847 5.89384 4.29097 5.70657L0.518971 1.9359C0.426126 1.84302 0.352488 1.73275 0.302258 1.6114C0.252027 1.49005 0.22619 1.36 0.22622 1.22867C0.226251 1.09733 0.252151 0.967293 0.302438 0.845969C0.352725 0.724645 0.426416 0.614415 0.519304 0.52157C0.612193 0.428725 0.722459 0.355085 0.843807 0.304855C0.965155 0.254625 1.09521 0.228787 1.22654 0.228818C1.35787 0.228849 1.48792 0.254748 1.60924 0.305036C1.73056 0.355323 1.84079 0.429015 1.93364 0.521903L4.99764 3.58524L8.06164 0.521236C8.15384 0.425683 8.26415 0.34945 8.38613 0.296984C8.50811 0.244518 8.63931 0.216872 8.77209 0.215656C8.90487 0.21444 9.03656 0.23968 9.15948 0.289903C9.2824 0.340126 9.39409 0.414325 9.48802 0.508173C9.58196 0.602022 9.65627 0.713638 9.7066 0.83651C9.75694 0.959382 9.78231 1.09105 9.78122 1.22383C9.78013 1.35661 9.7526 1.48784 9.70025 1.60987C9.6479 1.7319 9.57177 1.84228 9.47631 1.93457L5.70431 5.70657Z" fill="#858585"/>
</svg></div>
    <div class="accordion-content">
    <p>{{$cont->payment_terms}}</p>
    </div>
  </div>
  <div class="accordion-item">
    <div class="accordion-header">Fee Escalation Clause<svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.70431 5.70657C5.51681 5.89384 5.26264 5.99902 4.99764 5.99902C4.73264 5.99902 4.47847 5.89384 4.29097 5.70657L0.518971 1.9359C0.426126 1.84302 0.352488 1.73275 0.302258 1.6114C0.252027 1.49005 0.22619 1.36 0.22622 1.22867C0.226251 1.09733 0.252151 0.967293 0.302438 0.845969C0.352725 0.724645 0.426416 0.614415 0.519304 0.52157C0.612193 0.428725 0.722459 0.355085 0.843807 0.304855C0.965155 0.254625 1.09521 0.228787 1.22654 0.228818C1.35787 0.228849 1.48792 0.254748 1.60924 0.305036C1.73056 0.355323 1.84079 0.429015 1.93364 0.521903L4.99764 3.58524L8.06164 0.521236C8.15384 0.425683 8.26415 0.34945 8.38613 0.296984C8.50811 0.244518 8.63931 0.216872 8.77209 0.215656C8.90487 0.21444 9.03656 0.23968 9.15948 0.289903C9.2824 0.340126 9.39409 0.414325 9.48802 0.508173C9.58196 0.602022 9.65627 0.713638 9.7066 0.83651C9.75694 0.959382 9.78231 1.09105 9.78122 1.22383C9.78013 1.35661 9.7526 1.48784 9.70025 1.60987C9.6479 1.7319 9.57177 1.84228 9.47631 1.93457L5.70431 5.70657Z" fill="#858585"/>
</svg></div>
    <div class="accordion-content">
    <p>{{$cont->fee_escalation_clause}}</p>
    </div>
  </div>
</div>


<div class="edit_del">
    <div class="main_frooog">
<a class="dropdown-itemm rename_nt" data-bs-toggle="modal" data-bs-target="#edit_contract1{{ $cont->id }}">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M8.75 9.33323L6.41667 11.6666H12.25V9.33323H8.75ZM7.035 4.19406L1.75 9.47906V11.6666H3.9375L9.2225 6.38156L7.035 4.19406ZM10.9142 4.6899C11.1417 4.4624 11.1417 4.08323 10.9142 3.8674L9.54917 2.5024C9.4398 2.39389 9.29198 2.33301 9.13792 2.33301C8.98385 2.33301 8.83604 2.39389 8.72667 2.5024L7.65917 3.5699L9.84667 5.7574L10.9142 4.6899Z" fill="#8D8D8D"></path>
                                    </svg> Edit </a>

                                    <!-- model start -->
<div class="modal fade drop_coman_file have_title" id="edit_contract1{{ $cont->id }}" tabindex="-1" role="dialog" aria-labelledby="edit_contract1{{ $cont->id }}" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" style="font-weight:700">Edit Contract</h5>
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
                                    <h3>Edit contract</h3>


                                    <form action="{{ route('upstorecontract') }}" method="POST" enctype="multipart/form-data" class="upload-form rers_pages_hide edit_full_scrool"> 
                                      @csrf
									  
									    <div class="rers_pagesa">
										<div class="pagea">
                                                                          
                                    <div class="file-area">      
                                    <input type="file" class="dragfile" id="contractfile" name="file" accept=".pdf,.doc,.docx" >    
                          
  <div class="file-dummy">
    <div class="success">Great, your files are selected. Keep on.</div>
    <div class="default">
    <span class="upload_icon">
      
                          <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88"><title>file-upload</title><path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z"/></svg>
                          </span>  
                          Upload a file <span class="fille">Choose File</span>
  </div>
  </div>
  <br><div class="selected-file"></div>
</div> 
                          <span class="basic-file">Note:- file|mimes:pdf,doc,docx|max size:2048kb</span>    
                          <div class="doenload_previous">
                            <a href="{{ route('download-contract-file', ['id' => $cont->id]) }}">Download Previous Contract</a>
</div>
<hr class="cusrom_hr"/>
                          <div class="gropu_form">
                          <label for="fname">Contract name <span class="red_star">*</span></label>
                           <input placeholder="Type" required type="text" value="{{$cont->contract_name}}" id="contract_name" name="contract_name">
                           <input  required type="hidden" id="contracttype" name="contracttype" value="normalcontract">
                           <input  required type="hidden" id="contid" name="contid" value="{{$cont->id}}">
                          </div>

                          <div class="gropu_form">
                          <label for="con_type">Contract type <span class="red_star">*</span></label>
  <select id="contract_type" name="contract_type" required>
  <option value="" disabled Selected>select</option>
    
    <option value="Non-disclosure Agreement (NDA)" {{ $cont->contract_type === 'Non-disclosure Agreement (NDA)' ? ' selected' : '' }}>Non-disclosure Agreement (NDA)</option>
    <option value="Service Agreement" {{ $cont->contract_type === 'Service Agreement' ? ' selected' : '' }}>Service Agreement</option>
    <option value="Employment Contract" {{ $cont->contract_type === 'Employment Contract' ? ' selected' : '' }}>Employment Contract</option>
    <option value="Partnership Agreement" {{ $cont->contract_type === 'Partnership Agreement' ? ' selected' : '' }}>Partnership Agreement</option>
    <option value="Vendor Agreement" {{ $cont->contract_type === 'Vendor Agreement' ? ' selected' : '' }}>Vendor Agreement</option>
    <option value="Purchase Agreement" {{ $cont->contract_type === 'Purchase Agreement' ? ' selected' : '' }}>Purchase Agreement</option>
    <option value="Lease Agreement" {{ $cont->contract_type === 'Lease Agreement' ? ' selected' : '' }}>Lease Agreement</option>
    <option value="Licensing Agreement" {{ $cont->contract_type === 'Licensing Agreement' ? ' selected' : '' }}>Licensing Agreement</option>
    <option value="Consultancy Agreement" {{ $cont->contract_type === 'Consultancy Agreement' ? ' selected' : '' }}>Consultancy Agreement</option>
    <option value="Master Service Agreement (MSA)" {{ $cont->contract_type === 'Master Service Agreement (MSA)' ? ' selected' : '' }}>Master Service Agreement (MSA)</option>
    <option value="Sales Agreement" {{ $cont->contract_type === 'Sales Agreement' ? ' selected' : '' }}>Sales Agreement</option>
    <option value="Joint Venture Agreement" {{ $cont->contract_type === 'Joint Venture Agreement' ? ' selected' : '' }}>Joint Venture Agreement</option>
    <option value="Distribution Agreement" {{ $cont->contract_type === 'Distribution Agreement' ? ' selected' : '' }}>Distribution Agreement</option>
    <option value="Subcontractor Agreement" {{ $cont->contract_type === 'Subcontractor Agreement' ? ' selected' : '' }}>Subcontractor Agreement</option>
    <option value="Termination Agreement" {{ $cont->contract_type === 'Termination Agreement' ? ' selected' : '' }}>Termination Agreement</option>
    <option value="Software License Agreement" {{ $cont->contract_type === 'Software License Agreement' ? ' selected' : '' }}>Software License Agreement</option>
    <option value="Supply Agreement" {{ $cont->contract_type === 'Supply Agreement' ? ' selected' : '' }}>Supply Agreement</option>
  </select>
                          </div>

                          <div class="gropu_form">
                          <label for="Division">Division</label>
  <select id="divison" name="divison" required>
  <option value="" disabled Selected>select</option>
    
<option value="Human Resources" {{ $cont->divison === 'Human Resources' ? ' selected' : '' }}>Human Resources</option>
    <option value="Finance" {{ $cont->divison === 'Finance' ? ' selected' : '' }}>Finance</option>
    <option value="Legal" {{ $cont->divison === 'Legal' ? ' selected' : '' }}>Legal</option>
    <option value="Operations" {{ $cont->divison === 'Operations' ? ' selected' : '' }}>Operations</option>
    <option value="IT/Technology" {{ $cont->divison === 'IT/Technology' ? ' selected' : '' }}>IT/Technology</option>
    <option value="Sales & Marketing" {{ $cont->divison === 'Sales & Marketing' ? ' selected' : '' }}>Sales & Marketing</option>
    <option value="Procurement" {{ $cont->divison === 'Procurement' ? ' selected' : '' }}>Procurement</option>
    <option value="Administration" {{ $cont->divison === 'Administration' ? ' selected' : '' }}>Administration</option>
    <option value="Research & Development" {{ $cont->divison === 'Research & Development' ? ' selected' : '' }}>Research & Development</option>
    <option value="Customer Support" {{ $cont->divison === 'Customer Support' ? ' selected' : '' }}>Customer Support</option>
    <option value="Compliance" {{ $cont->divison === 'Compliance' ? ' selected' : '' }}>Compliance</option>
    <option value="Risk Management" {{ $cont->divison === 'Risk Management' ? ' selected' : '' }}>Risk Management</option>
    <option value="Logistics" {{ $cont->divison === 'Logistics' ? ' selected' : '' }}>Logistics</option>
    <option value="Corporate Affairs" {{ $cont->divison === 'Corporate Affairs' ? ' selected' : '' }}>Corporate Affairs</option>
    <option value="Public Relations" {{ $cont->divison === 'Public Relations' ? ' selected' : '' }}>Public Relations</option>
  </select>
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Vendor name <span class="red_star">*</span></label>
                           <input placeholder="Type" type="text" value="{{$cont->vendor_name}}" required id="vendor_name" name="vendor_name">
                          </div>

                          
                          <div class="gropu_form">
                          <label for="les">Legal entity status <span class="red_star">*</span></label>
  <select id="legal_entity_status" name="legal_entity_status" required>
  <option value="" disabled Selected>select</option>
    
<option value="Sole Proprietorship" {{ $cont->legal_entity_status === 'Sole Proprietorship' ? ' selected' : '' }}>Sole Proprietorship</option>
    <option value="Partnership" {{ $cont->legal_entity_status === 'Partnership' ? ' selected' : '' }}>Partnership</option>
    <option value="Limited Liability Company (LLC)" {{ $cont->legal_entity_status === 'Limited Liability Company (LLC)' ? ' selected' : '' }}>Limited Liability Company (LLC)</option>
    <option value="Private Limited Company (Pvt Ltd)" {{ $cont->legal_entity_status === 'Private Limited Company (Pvt Ltd)' ? ' selected' : '' }}>Private Limited Company (Pvt Ltd)</option>
    <option value="Public Limited Company (Ltd)" {{ $cont->legal_entity_status === 'Public Limited Company (Ltd)' ? ' selected' : '' }}>Public Limited Company (Ltd)</option>
    <option value="Corporation" {{ $cont->legal_entity_status === 'Corporation' ? ' selected' : '' }}>Corporation</option>
    <option value="Non-Profit Organization (NGO)" {{ $cont->legal_entity_status === 'Non-Profit Organization (NGO)' ? ' selected' : '' }}>Non-Profit Organization (NGO)</option>
    <option value="Trust" {{ $cont->legal_entity_status === 'Trust' ? ' selected' : '' }}>Trust</option>
    <option value="Government Entity" {{ $cont->legal_entity_status === 'Government Entity' ? ' selected' : '' }}>Government Entity</option>
    <option value="Joint Venture" {{ $cont->legal_entity_status === 'Joint Venture' ? ' selected' : '' }}>Joint Venture</option>
    <option value="Association" {{ $cont->legal_entity_status === 'Association' ? ' selected' : '' }}>Association</option>
    <option value="Cooperative Society" {{ $cont->legal_entity_status === 'Cooperative Society' ? ' selected' : '' }}>Cooperative Society</option>
  </select>
                          </div>

                          <div class="gropu_form">
                          <label for="start">Date of commencement <span class="red_star">*</span></label>
<input type="date" id="start" name="startdate" value="{{$cont->startdate}}"  required/>
                          </div>

                          
                          <div class="gropu_form">
                          <label for="start">Date of expiry <span class="red_star">*</span></label>
<input type="date" id="start" name="startend" value="{{$cont->startend}}" required />
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Contract Value <span class="red_star">*</span></label>
                           <input placeholder="Type" required type="text" value="{{$cont->contract_value}}" id="contract_value" name="contract_value">
                          </div>

                          <div class="gropu_form">
                          <label for="ss">Signing Status <span class="red_star">*</span></label>
  <select id="signing_status" name="signing_status" required>
  <option value="" disabled Selected>select</option>
    
 <option value="Draft" {{ $cont->signing_status === 'Draft' ? ' selected' : '' }}>Draft</option>
    <option value="Pending Signature" {{ $cont->signing_status === 'Pending Signature' ? ' selected' : '' }}>Pending Signature</option>
    <option value="Signed" {{ $cont->signing_status === 'Signed' ? ' selected' : '' }}>Signed</option>
    <option value="Signed with Amendments" {{ $cont->signing_status === 'Signed with Amendments' ? ' selected' : '' }}>Signed with Amendments</option>
    <option value="Partially Signed" {{ $cont->signing_status === 'Partially Signed' ? ' selected' : '' }}>Partially Signed</option>
    <option value="Awaiting Counterparty Signature" {{ $cont->signing_status === 'Awaiting Counterparty Signature' ? ' selected' : '' }}>Awaiting Counterparty Signature</option>
    <option value="Rejected" {{ $cont->signing_status === 'Rejected' ? ' selected' : '' }}>Rejected</option>
    <option value="Expired" {{ $cont->signing_status === 'Expired' ? ' selected' : '' }}>Expired</option>
    <option value="Revoked" {{ $cont->signing_status === 'Revoked' ? ' selected' : '' }}>Revoked</option>
    <option value="In Review" {{ $cont->signing_status === 'In Review' ? ' selected' : '' }}>In Review</option>
    <option value="Terminated" {{ $cont->signing_status === 'Terminated' ? ' selected' : '' }}>Terminated</option>
  </select>
                          </div>


</div>
  <div class="pagea">
  
  <div class="gropu_form test-areaa">
                          <label for="fname">Renewal Terms <span class="red_star">*</span></label>
                          <textarea name="renewal_terms" placeholder="{{$cont->renewal_terms}}"  style="height: 58px;">{{$cont->renewal_terms}} </textarea>
                          </div>

                          <div class="gropu_form test-areaa">
                          <label for="fname">Payment Terms <span class="red_star">*</span></label>
                          <textarea name="payment_terms" placeholder="{{$cont->payment_terms}}"  style="height: 58px;"> {{$cont->payment_terms}}</textarea>
                          </div>

                          <div class="gropu_form test-areaa">
                          <label for="fname">Fee Escalation Clause <span class="red_star">*</span></label>
                          <textarea name="fee_escalation_clause" placeholder="{{$cont->fee_escalation_clause}}"  style="height: 58px;"> {{$cont->fee_escalation_clause}}</textarea>
                          </div>




  </div>
</div>

                          <div class="wrpa_bbtna">
                <div class="root_btn">                        
                          <button class="btn btn-primary"  style="border-radius:5px;" type="submit">Save</button>
</div>
</div>
				
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
<!-- model end -->

</div>
<div class="main_frooog">
                                    <a class="dropdown-itemm delet_nt"  id="delete-{{ $cont ->id }}">
                                    <form method="POST" action="{{ route('filecontract.delete', ['id' => $cont->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-button" onclick="confirmDelete(event)">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A" />
                                    </svg> Delete
                                                            </button>
                                                        </form>  </a>
</div>
</div>

</div>
</div>
@endif
@endforeach
<!-- tab1 end -->
<script>
    function confirmDelete(event) {
        event.preventDefault(); // Prevent the default form submission

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Proceed with the delete action, e.g., submit a form or make an AJAX request
                event.target.closest('form').submit(); // Assuming the button is inside a form
            }
        });
    }
</script>

<!-- tab3 start -->
@foreach($contract as $cont)
@if($cont->contracttype == 'customercontract')
<div id="tab3{{$cont->id}}" class="tabcontent">
<div class="contract-details">

<div class="btn_up_cont">
    <div class="up_lleft">
    <h2>{{$cont->contract_name}} <span>{{$cont->divison}}</span></h2>
        <span>{{$cont->contract_type}}</span>
</div>
<div class="up_right">
<a href="{{ route('download-contract-file', ['id' => $cont->id]) }}" class="view-cont">View Contract<svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.3691 4.38178C5.53296 4.54584 5.625 4.76824 5.625 5.00011C5.625 5.23199 5.53296 5.45438 5.3691 5.61845L2.06977 8.91895C1.98849 9.00019 1.89201 9.06462 1.78583 9.10857C1.67965 9.15252 1.56586 9.17513 1.45094 9.1751C1.33602 9.17508 1.22224 9.15242 1.11608 9.10841C1.00992 9.06441 0.913467 8.99993 0.832229 8.91866C0.750989 8.83738 0.686554 8.7409 0.642603 8.63472C0.598651 8.52854 0.576044 8.41474 0.576071 8.29982C0.576097 8.18491 0.59876 8.07112 0.642761 7.96496C0.686763 7.8588 0.751243 7.76235 0.83252 7.68111L3.51294 5.00011L0.831936 2.31911C0.748328 2.23844 0.681623 2.14192 0.635716 2.03518C0.589808 1.92845 0.565618 1.81365 0.564554 1.69747C0.56349 1.58129 0.585575 1.46606 0.62952 1.3585C0.673465 1.25095 0.738389 1.15322 0.820507 1.07103C0.902624 0.988832 1.00029 0.923815 1.1078 0.879768C1.21531 0.835722 1.33052 0.813528 1.4467 0.814483C1.56289 0.815437 1.67772 0.839521 1.78449 0.885327C1.89126 0.931134 1.98785 0.997747 2.0686 1.08128L5.3691 4.38178Z" fill="#5790FF"/>
</svg></a>
<!-- <a href="#" class="sharre"><svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M11.25 5.00008L7.16667 0.916748V3.25008C3.08333 3.83341 1.33333 6.75008 0.75 9.66675C2.20833 7.62508 4.25 6.69175 7.16667 6.69175V9.08341L11.25 5.00008Z" fill="#858585"/>
</svg>Share</a> -->
</div>
</div>
<div class="form_data">
    <div class="row align-dtat">
        <div class= "col-sm-9">
            <div class="for_roow">

 <div class="row">
 <div class="col-sm-6">
    <div class="form_group">
        <label>Name of the vendor</label>
        <span>{{$cont->vendor_name}}</span>
</div>
</div>
<div class="col-sm-6">
<div class="form_group">
        <label>Legal entity status</label>
        <span>{{$cont->legal_entity_status}}</span>
</div>
</div>
</div>

<div class="row">
 <div class="col-sm-6">
 <div class="form_group">
        <label>Date of commencement</label>
        <span>{{ date('F d, Y', strtotime($cont->startdate)) }}</span>
</div>
</div>
<div class="col-sm-6">
<div class="form_group">
        <label>Date of expiry</label>
        <span>{{ date('F d, Y', strtotime($cont->startend)) }}</span>
</div>
</div>
</div>

<div class="row">
 <div class="col-sm-6">
 <div class="form_group">
        <label>Total Contract Value</label>
        <span>{{$cont->contract_value}}</span>
</div>
</div>
<div class="col-sm-6">
<div class="form_group">
        <label>Signing Status</label>
        <span>{{$cont->signing_status}}</span>
</div>
</div>
</div>



</div>
</div>
<div class="col-sm-3">
@if(strtotime(date('Y-m-d')) < strtotime($cont->startend))
    <h3 class="status ac">ACTIVE</h3>
@else
    <h3 class="status ex">EXPIRED</h3>
@endif
</div>
</div>
</div>

<div class="accordion">
  <div class="accordion-item">
    <div class="accordion-header">Renewal Terms<svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.70431 5.70657C5.51681 5.89384 5.26264 5.99902 4.99764 5.99902C4.73264 5.99902 4.47847 5.89384 4.29097 5.70657L0.518971 1.9359C0.426126 1.84302 0.352488 1.73275 0.302258 1.6114C0.252027 1.49005 0.22619 1.36 0.22622 1.22867C0.226251 1.09733 0.252151 0.967293 0.302438 0.845969C0.352725 0.724645 0.426416 0.614415 0.519304 0.52157C0.612193 0.428725 0.722459 0.355085 0.843807 0.304855C0.965155 0.254625 1.09521 0.228787 1.22654 0.228818C1.35787 0.228849 1.48792 0.254748 1.60924 0.305036C1.73056 0.355323 1.84079 0.429015 1.93364 0.521903L4.99764 3.58524L8.06164 0.521236C8.15384 0.425683 8.26415 0.34945 8.38613 0.296984C8.50811 0.244518 8.63931 0.216872 8.77209 0.215656C8.90487 0.21444 9.03656 0.23968 9.15948 0.289903C9.2824 0.340126 9.39409 0.414325 9.48802 0.508173C9.58196 0.602022 9.65627 0.713638 9.7066 0.83651C9.75694 0.959382 9.78231 1.09105 9.78122 1.22383C9.78013 1.35661 9.7526 1.48784 9.70025 1.60987C9.6479 1.7319 9.57177 1.84228 9.47631 1.93457L5.70431 5.70657Z" fill="#858585"/>
</svg></div>
    <div class="accordion-content">
    <p>{{$cont->renewal_terms}}</p>    </div>
  </div>
  <div class="accordion-item">
    <div class="accordion-header">Payment Terms<svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.70431 5.70657C5.51681 5.89384 5.26264 5.99902 4.99764 5.99902C4.73264 5.99902 4.47847 5.89384 4.29097 5.70657L0.518971 1.9359C0.426126 1.84302 0.352488 1.73275 0.302258 1.6114C0.252027 1.49005 0.22619 1.36 0.22622 1.22867C0.226251 1.09733 0.252151 0.967293 0.302438 0.845969C0.352725 0.724645 0.426416 0.614415 0.519304 0.52157C0.612193 0.428725 0.722459 0.355085 0.843807 0.304855C0.965155 0.254625 1.09521 0.228787 1.22654 0.228818C1.35787 0.228849 1.48792 0.254748 1.60924 0.305036C1.73056 0.355323 1.84079 0.429015 1.93364 0.521903L4.99764 3.58524L8.06164 0.521236C8.15384 0.425683 8.26415 0.34945 8.38613 0.296984C8.50811 0.244518 8.63931 0.216872 8.77209 0.215656C8.90487 0.21444 9.03656 0.23968 9.15948 0.289903C9.2824 0.340126 9.39409 0.414325 9.48802 0.508173C9.58196 0.602022 9.65627 0.713638 9.7066 0.83651C9.75694 0.959382 9.78231 1.09105 9.78122 1.22383C9.78013 1.35661 9.7526 1.48784 9.70025 1.60987C9.6479 1.7319 9.57177 1.84228 9.47631 1.93457L5.70431 5.70657Z" fill="#858585"/>
</svg></div>
    <div class="accordion-content">
    <p>{{$cont->payment_terms}}</p>    </div>
  </div>
  <div class="accordion-item">
    <div class="accordion-header">Fee Escalation Clause<svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.70431 5.70657C5.51681 5.89384 5.26264 5.99902 4.99764 5.99902C4.73264 5.99902 4.47847 5.89384 4.29097 5.70657L0.518971 1.9359C0.426126 1.84302 0.352488 1.73275 0.302258 1.6114C0.252027 1.49005 0.22619 1.36 0.22622 1.22867C0.226251 1.09733 0.252151 0.967293 0.302438 0.845969C0.352725 0.724645 0.426416 0.614415 0.519304 0.52157C0.612193 0.428725 0.722459 0.355085 0.843807 0.304855C0.965155 0.254625 1.09521 0.228787 1.22654 0.228818C1.35787 0.228849 1.48792 0.254748 1.60924 0.305036C1.73056 0.355323 1.84079 0.429015 1.93364 0.521903L4.99764 3.58524L8.06164 0.521236C8.15384 0.425683 8.26415 0.34945 8.38613 0.296984C8.50811 0.244518 8.63931 0.216872 8.77209 0.215656C8.90487 0.21444 9.03656 0.23968 9.15948 0.289903C9.2824 0.340126 9.39409 0.414325 9.48802 0.508173C9.58196 0.602022 9.65627 0.713638 9.7066 0.83651C9.75694 0.959382 9.78231 1.09105 9.78122 1.22383C9.78013 1.35661 9.7526 1.48784 9.70025 1.60987C9.6479 1.7319 9.57177 1.84228 9.47631 1.93457L5.70431 5.70657Z" fill="#858585"/>
</svg></div>
    <div class="accordion-content">
    <p>{{$cont->fee_escalation_clause}}</p>    </div>
  </div>
</div>

<div class="edit_del">
    <div class="main_frooog">
    <a class="dropdown-itemm rename_nt" data-bs-toggle="modal" data-bs-target="#edit_contract2{{$cont->id}}">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M8.75 9.33323L6.41667 11.6666H12.25V9.33323H8.75ZM7.035 4.19406L1.75 9.47906V11.6666H3.9375L9.2225 6.38156L7.035 4.19406ZM10.9142 4.6899C11.1417 4.4624 11.1417 4.08323 10.9142 3.8674L9.54917 2.5024C9.4398 2.39389 9.29198 2.33301 9.13792 2.33301C8.98385 2.33301 8.83604 2.39389 8.72667 2.5024L7.65917 3.5699L9.84667 5.7574L10.9142 4.6899Z" fill="#8D8D8D"></path>
                                    </svg> Edit </a>

                                    <!-- model start -->
<div class="modal fade drop_coman_file have_title" id="edit_contract2{{$cont->id}}" tabindex="-1" role="dialog" aria-labelledby="edit_contract2{{$cont->id}}" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" style="font-weight:700">Edit Contract</h5>
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
                                    <h3>Edit contract</h3>


                                    <form action="{{ route('upstorecontract') }}" method="POST" enctype="multipart/form-data" class="upload-form rers_pages_hide edit_full_scrool"> 
                                      @csrf
									  
									    <div class="rers_pagesa">
										<div class="pagea">
                                                                          
                                    <div class="file-area">      
                                    <input type="file" class="dragfile" id="contractfile" name="file" accept=".pdf,.doc,.docx" >    
                          
  <div class="file-dummy">
    <div class="success">Great, your files are selected. Keep on.</div>
    <div class="default">
    <span class="upload_icon">
      
                          <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.09 122.88"><title>file-upload</title><path d="M64.64,13,86.77,36.21H64.64V13ZM42.58,71.67a3.25,3.25,0,0,1-4.92-4.25l9.42-10.91a3.26,3.26,0,0,1,4.59-.33,5.14,5.14,0,0,1,.4.41l9.3,10.28a3.24,3.24,0,0,1-4.81,4.35L52.8,67.07V82.52a3.26,3.26,0,1,1-6.52,0V67.38l-3.7,4.29ZM24.22,85.42a3.26,3.26,0,1,1,6.52,0v7.46H68.36V85.42a3.26,3.26,0,1,1,6.51,0V96.14a3.26,3.26,0,0,1-3.26,3.26H27.48a3.26,3.26,0,0,1-3.26-3.26V85.42ZM99.08,39.19c.15-.57-1.18-2.07-2.68-3.56L63.8,1.36A3.63,3.63,0,0,0,61,0H6.62A6.62,6.62,0,0,0,0,6.62V116.26a6.62,6.62,0,0,0,6.62,6.62H92.46a6.62,6.62,0,0,0,6.62-6.62V39.19Zm-7.4,4.42v71.87H7.4V7.37H57.25V39.9A3.71,3.71,0,0,0,61,43.61Z"/></svg>
                          </span>  
                          Upload a file <span class="fille">Choose File</span>
  </div>
  </div>
  <br><div class="selected-file"></div>
</div> 
                          <span class="basic-file">Note:- file|mimes:pdf,doc,docx|max size:2048kb</span>    
                          <div class="doenload_previous">
                            <a href="{{ route('download-contract-file', ['id' => $cont->id]) }}">Download Previous Contract</a>
</div>
<hr class="cusrom_hr"/>
                          <div class="gropu_form">
                          <label for="fname">Contract name <span class="red_star">*</span></label>
                           <input placeholder="Type" required type="text" id="contract_name" value="{{$cont->contract_name}}" name="contract_name">
                           <input  required type="hidden" id="contracttype" name="contracttype" value="customercontract">
                           <input  required type="hidden" id="contid" name="contid" value="{{$cont->id}}">
                          </div>

                          <div class="gropu_form">
                          <label for="con_type">Contract type <span class="red_star">*</span></label>
  <select id="contract_type" name="contract_type" required>
  <option value="" disabled Selected>select</option>
    
    <option value="Non-disclosure Agreement (NDA)" {{ $cont->contract_type === 'Non-disclosure Agreement (NDA)' ? ' selected' : '' }}>Non-disclosure Agreement (NDA)</option>
    <option value="Service Agreement" {{ $cont->contract_type === 'Service Agreement' ? ' selected' : '' }}>Service Agreement</option>
    <option value="Employment Contract" {{ $cont->contract_type === 'Employment Contract' ? ' selected' : '' }}>Employment Contract</option>
    <option value="Partnership Agreement" {{ $cont->contract_type === 'Partnership Agreement' ? ' selected' : '' }}>Partnership Agreement</option>
    <option value="Vendor Agreement" {{ $cont->contract_type === 'Vendor Agreement' ? ' selected' : '' }}>Vendor Agreement</option>
    <option value="Purchase Agreement" {{ $cont->contract_type === 'Purchase Agreement' ? ' selected' : '' }}>Purchase Agreement</option>
    <option value="Lease Agreement" {{ $cont->contract_type === 'Lease Agreement' ? ' selected' : '' }}>Lease Agreement</option>
    <option value="Licensing Agreement" {{ $cont->contract_type === 'Licensing Agreement' ? ' selected' : '' }}>Licensing Agreement</option>
    <option value="Consultancy Agreement" {{ $cont->contract_type === 'Consultancy Agreement' ? ' selected' : '' }}>Consultancy Agreement</option>
    <option value="Master Service Agreement (MSA)" {{ $cont->contract_type === 'Master Service Agreement (MSA)' ? ' selected' : '' }}>Master Service Agreement (MSA)</option>
    <option value="Sales Agreement" {{ $cont->contract_type === 'Sales Agreement' ? ' selected' : '' }}>Sales Agreement</option>
    <option value="Joint Venture Agreement" {{ $cont->contract_type === 'Joint Venture Agreement' ? ' selected' : '' }}>Joint Venture Agreement</option>
    <option value="Distribution Agreement" {{ $cont->contract_type === 'Distribution Agreement' ? ' selected' : '' }}>Distribution Agreement</option>
    <option value="Subcontractor Agreement" {{ $cont->contract_type === 'Subcontractor Agreement' ? ' selected' : '' }}>Subcontractor Agreement</option>
    <option value="Termination Agreement" {{ $cont->contract_type === 'Termination Agreement' ? ' selected' : '' }}>Termination Agreement</option>
    <option value="Software License Agreement" {{ $cont->contract_type === 'Software License Agreement' ? ' selected' : '' }}>Software License Agreement</option>
    <option value="Supply Agreement" {{ $cont->contract_type === 'Supply Agreement' ? ' selected' : '' }}>Supply Agreement</option>
    
  </select>
                          </div>

                          <div class="gropu_form">
                          <label for="Division">Division</label>
  <select id="divison" name="divison" required>
  <option value="" disabled Selected>select</option>
    
<option value="Human Resources" {{ $cont->divison === 'Human Resources' ? ' selected' : '' }}>Human Resources</option>
    <option value="Finance" {{ $cont->divison === 'Finance' ? ' selected' : '' }}>Finance</option>
    <option value="Legal" {{ $cont->divison === 'Legal' ? ' selected' : '' }}>Legal</option>
    <option value="Operations" {{ $cont->divison === 'Operations' ? ' selected' : '' }}>Operations</option>
    <option value="IT/Technology" {{ $cont->divison === 'IT/Technology' ? ' selected' : '' }}>IT/Technology</option>
    <option value="Sales & Marketing" {{ $cont->divison === 'Sales & Marketing' ? ' selected' : '' }}>Sales & Marketing</option>
    <option value="Procurement" {{ $cont->divison === 'Procurement' ? ' selected' : '' }}>Procurement</option>
    <option value="Administration" {{ $cont->divison === 'Administration' ? ' selected' : '' }}>Administration</option>
    <option value="Research & Development" {{ $cont->divison === 'Research & Development' ? ' selected' : '' }}>Research & Development</option>
    <option value="Customer Support" {{ $cont->divison === 'Customer Support' ? ' selected' : '' }}>Customer Support</option>
    <option value="Compliance" {{ $cont->divison === 'Compliance' ? ' selected' : '' }}>Compliance</option>
    <option value="Risk Management" {{ $cont->divison === 'Risk Management' ? ' selected' : '' }}>Risk Management</option>
    <option value="Logistics" {{ $cont->divison === 'Logistics' ? ' selected' : '' }}>Logistics</option>
    <option value="Corporate Affairs" {{ $cont->divison === 'Corporate Affairs' ? ' selected' : '' }}>Corporate Affairs</option>
    <option value="Public Relations" {{ $cont->divison === 'Public Relations' ? ' selected' : '' }}>Public Relations</option>
    
  </select>
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Vendor name <span class="red_star">*</span></label>
                           <input placeholder="Type" type="text" value="{{$cont->vendor_name}}" required id="vendor_name" name="vendor_name">
                          </div>

                          
                          <div class="gropu_form">
                          <label for="les">Legal entity status <span class="red_star">*</span></label>
  <select id="legal_entity_status" name="legal_entity_status" required>
  <option value="" disabled Selected>select</option>
    
<option value="Sole Proprietorship" {{ $cont->legal_entity_status === 'Sole Proprietorship' ? ' selected' : '' }}>Sole Proprietorship</option>
    <option value="Partnership" {{ $cont->legal_entity_status === 'Partnership' ? ' selected' : '' }}>Partnership</option>
    <option value="Limited Liability Company (LLC)" {{ $cont->legal_entity_status === 'Limited Liability Company (LLC)' ? ' selected' : '' }}>Limited Liability Company (LLC)</option>
    <option value="Private Limited Company (Pvt Ltd)" {{ $cont->legal_entity_status === 'Private Limited Company (Pvt Ltd)' ? ' selected' : '' }}>Private Limited Company (Pvt Ltd)</option>
    <option value="Public Limited Company (Ltd)" {{ $cont->legal_entity_status === 'Public Limited Company (Ltd)' ? ' selected' : '' }}>Public Limited Company (Ltd)</option>
    <option value="Corporation" {{ $cont->legal_entity_status === 'Corporation' ? ' selected' : '' }}>Corporation</option>
    <option value="Non-Profit Organization (NGO)" {{ $cont->legal_entity_status === 'Non-Profit Organization (NGO)' ? ' selected' : '' }}>Non-Profit Organization (NGO)</option>
    <option value="Trust" {{ $cont->legal_entity_status === 'Trust' ? ' selected' : '' }}>Trust</option>
    <option value="Government Entity" {{ $cont->legal_entity_status === 'Government Entity' ? ' selected' : '' }}>Government Entity</option>
    <option value="Joint Venture" {{ $cont->legal_entity_status === 'Joint Venture' ? ' selected' : '' }}>Joint Venture</option>
    <option value="Association" {{ $cont->legal_entity_status === 'Association' ? ' selected' : '' }}>Association</option>
    <option value="Cooperative Society" {{ $cont->legal_entity_status === 'Cooperative Society' ? ' selected' : '' }}>Cooperative Society</option>
  </select>
                          </div>

                          <div class="gropu_form">
                          <label for="start">Date of commencement <span class="red_star">*</span></label>
<input type="date" id="start" name="startdate" value="{{$cont->startdate}}" required/>
                          </div>

                          
                          <div class="gropu_form">
                          <label for="start">Date of expiry <span class="red_star">*</span></label>
<input type="date" id="start" name="startend" value="{{$cont->startend}}" required />
                          </div>

                          <div class="gropu_form">
                          <label for="fname">Contract Value <span class="red_star">*</span></label>
                           <input placeholder="Type" required type="text" value="{{$cont->contract_value}}" id="contract_value" name="contract_value">
                          </div>

                          <div class="gropu_form">
                          <label for="ss">Signing Status <span class="red_star">*</span></label>
  <select id="signing_status" name="signing_status" required>
  <option value="" disabled Selected>select</option>
    
 <option value="Draft" {{ $cont->signing_status === 'Draft' ? ' selected' : '' }}>Draft</option>
    <option value="Pending Signature" {{ $cont->signing_status === 'Pending Signature' ? ' selected' : '' }}>Pending Signature</option>
    <option value="Signed" {{ $cont->signing_status === 'Signed' ? ' selected' : '' }}>Signed</option>
    <option value="Signed with Amendments" {{ $cont->signing_status === 'Signed with Amendments' ? ' selected' : '' }}>Signed with Amendments</option>
    <option value="Partially Signed" {{ $cont->signing_status === 'Partially Signed' ? ' selected' : '' }}>Partially Signed</option>
    <option value="Awaiting Counterparty Signature" {{ $cont->signing_status === 'Awaiting Counterparty Signature' ? ' selected' : '' }}>Awaiting Counterparty Signature</option>
    <option value="Rejected" {{ $cont->signing_status === 'Rejected' ? ' selected' : '' }}>Rejected</option>
    <option value="Expired" {{ $cont->signing_status === 'Expired' ? ' selected' : '' }}>Expired</option>
    <option value="Revoked" {{ $cont->signing_status === 'Revoked' ? ' selected' : '' }}>Revoked</option>
    <option value="In Review" {{ $cont->signing_status === 'In Review' ? ' selected' : '' }}>In Review</option>
    <option value="Terminated" {{ $cont->signing_status === 'Terminated' ? ' selected' : '' }}>Terminated</option>
  </select>
                          </div>


</div>
  <div class="pagea">
  
  <div class="gropu_form test-areaa">
                          <label for="fname">Renewal Terms <span class="red_star">*</span></label>
                          <textarea name="renewal_terms"  style="height: 58px;" placeholder="{{$cont->renewal_terms}}">{{$cont->renewal_terms}} </textarea>
                          </div>

                          <div class="gropu_form test-areaa">
                          <label for="fname">Payment Terms <span class="red_star">*</span></label>
                          <textarea name="payment_terms"  style="height: 58px;" placeholder="{{$cont->payment_terms}}">{{$cont->payment_terms}} </textarea>
                          </div>

                          <div class="gropu_form test-areaa">
                          <label for="fname">Fee Escalation Clause <span class="red_star">*</span></label>
                          <textarea name="fee_escalation_clause"  style="height: 58px;" placeholder="{{$cont->fee_escalation_clause}}">{{$cont->fee_escalation_clause}} </textarea>
                          </div>

                          <script>
    document.querySelectorAll('textarea').forEach(function(textarea) {
        textarea.addEventListener('focus', function() {
            this.setAttribute('data-placeholder', this.getAttribute('placeholder'));
            this.setAttribute('placeholder', '');
        });
        
        textarea.addEventListener('blur', function() {
            this.setAttribute('placeholder', this.getAttribute('data-placeholder'));
        });
    });
</script>


  </div>
</div>

                          <div class="wrpa_bbtna">
                <div class="root_btn">                        
                          <button class="btn btn-primary"  style="border-radius:5px;" type="submit">Save</button>
</div>
</div>
				
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
<!-- model end -->

</div>
<div class="main_frooog">
<a class="dropdown-itemm delet_nt"  id="delete-{{ $cont ->id }}">
                                    <form method="POST" action="{{ route('filecontract.delete', ['id' => $cont->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-button" onclick="confirmDelete1(event)">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A" />
                                    </svg> Delete
                                                            </button>
                                                        </form>  </a>
</div>
</div>

</div>
</div>
<!-- tab3 end -->
@endif
@endforeach
</div>
</div>
<script>
    function confirmDelete1(event) {
        event.preventDefault(); // Prevent the default form submission

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Proceed with the delete action, e.g., submit a form or make an AJAX request
                event.target.closest('form').submit(); // Assuming the button is inside a form
            }
        });
    }
</script>

</div>
</div>
<!-- Container-fluid start-->

        </div>
      </div>
    </div>

    @endsection
   
    <style>
      .rers_pages_hide {
    padding: 0px;
    overflow: hidden;
}
button.delete-button {
    background: transparent;
    border: none;
    display: inline-flex;
    align-items: center;
    color: #707070;
}

.dark-only button.delete-button {
    color: #A3AED0;
}
 .rers_pages {
    display: flex;
}
.rers_pages .page, .rers_pages .pagee, .rers_pages .pageee, .rers_pages .pageeee {
    flex: 0 0 100%;
    transition: all 0.5s ease;
}

.rers_pages .page, .rers_pages .pagee, .rers_pages .pageee, .rers_pages .pageeee {
    margin: 0;
    opacity: 1;
}

.rers_pages .prev.hidden {
    margin-left: -100%;
    opacity: 0;
}
 .rers_pages  .next.hidden {
    margin-left: 0;
    opacity: 0;
}
.next_pre {
    display: block;
    text-align: end;
    padding: 20px 0px 0px;
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
.next_pre button {
    background: transparent !important;
    box-shadow: none !IMPORTANT;
    outline: none;
    border: 0 !IMPORTANT;
    font-size: 16px !important;
    text-decoration: underline;
    color: #0066FF !IMPORTANT;
    padding: 0 !important;
    display: inline-block !IMPORTANT;
}

.next_pre button svg {
    width: 30px !IMPORTANT;
    height: 30px !important;
    opacity: 1 !important;
    margin: 0 !important;
}
.next_pre button svg path {
    fill: #0066FF;
}
.next_pre button svg rect {
    stroke: #0066FF;
}

.next_pre button.hidden {
    display: none !important;
}
.drop_coman_file.have_title .rers_pages .page .gropu_form.test-areaa, .drop_coman_file.have_title .rers_pages .pagee .gropu_form.test-areaa, .drop_coman_file.have_title .rers_pages .pageee .gropu_form.test-areaa, .drop_coman_file.have_title .rers_pages .pageeee .gropu_form.test-areaa {
    display: flex;
    gap: 0;
}

.drop_coman_file.have_title .rers_pages .page .gropu_form.test-areaa label, .drop_coman_file.have_title .rers_pages .pagee .gropu_form.test-areaa label, .drop_coman_file.have_title .rers_pages .pageee .gropu_form.test-areaa label, .drop_coman_file.have_title .rers_pages .pageeee .gropu_form.test-areaa label {
    flex: 1;
    padding: 0;
}

.drop_coman_file.have_title .rers_pages .page .gropu_form.test-areaa textarea, .drop_coman_file.have_title .rers_pages .pagee .gropu_form.test-areaa textarea, .drop_coman_file.have_title .rers_pages .pageee .gropu_form.test-areaa textarea, .drop_coman_file.have_title .rers_pages .pageeee .gropu_form.test-areaa textarea {
    flex: 2;
    width: 100%;
}
.wrpa_bbtn, .wrpa_bbtnn, .wrpa_bbtn, .wrpa_bbtnnn, .wrpa_bbtnnnn {
    display: flex;
    align-items: center;
    justify-content: end;
    gap: 0px 20px;
    padding: 20px 0px 0px;
}

.wrpa_bbtn .root_btn, .wrpa_bbtnn .root_btn, .wrpa_bbtnnn .root_btn, .wrpa_bbtnnnn .root_btn {
    padding: 0 !important;
}

.wrpa_bbtn .next_pre, .wrpa_bbtnn .next_pre, .wrpa_bbtnnn .next_pre, .wrpa_bbtnnnn .next_pre {
    padding: 0;
}
.wrpa_bbtn .root_btn, .wrpa_bbtnn .root_btn, .wrpa_bbtnnn .root_btn, .wrpa_bbtnnnn .root_btn {
    display: none !important;
}

.wrpa_bbtn.active .root_btn, .wrpa_bbtnn.active .root_btn, .wrpa_bbtnnn.active .root_btn, .wrpa_bbtnnnn.active .root_btn {
    display: block !IMPORTANT;
}
      </style>




