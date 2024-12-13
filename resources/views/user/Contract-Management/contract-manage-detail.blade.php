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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- page-wrapper Start-->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    @if(session('success'))
    <script>
        toastr.success("{{ session('success') }}", "Success", {
            closeButton: true,
            progressBar: true,
            timeOut: 5000,
            positionClass: "toast-top-right"
        });
    </script>
@endif

@if(session('error'))
    <script>
        toastr.error("{{ session('error') }}", "Error", {
            closeButton: true,
            progressBar: true,
            timeOut: 5000,
            positionClass: "toast-top-right"
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
                        Contract Detail
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
                    Contract Detail
                </h2>
            </div>
            <!-- Container-fluid start-->
            <div class="container-fluid">
                <div class="main_contractt_detail">
                    <div class="row">
                        <div class="col-md-4">
                            
                            <div class="contract_deatols">

                                <div class="contract_detail_top">
                                    <div class="con_image_wrap">
                                        <div class="inner_tp_img">
                                            <div class="mini_iage_wrap">
                                                <?php 
                                                // Extract initials
                                                $nameParts = explode(' ', $customerrecord->lename);
                                                $firstLetter = strtoupper(substr($nameParts[0], 0, 1)); // First letter of first name
                                                $secondLetter = isset($nameParts[1]) ? strtoupper(substr($nameParts[1], 0, 1)) : ''; // First letter of last name (if exists)
                                        
                                                // Path to the profile picture
                                                $profilePicturePath = public_path($customerrecord->profile_picture);
                                        
                                                // Check if the profile picture exists
                                                if ($customerrecord->profile_picture === NULL || !file_exists($profilePicturePath)) {
                                                    echo '<h2>' . $firstLetter . $secondLetter . '</h2>';
                                                } else {
                                                    echo '<img id="profile-image" src="' . asset('/' . $customerrecord->profile_picture) . '" class="mtt" alt="Profile Image">';
                                                }
                                            ?>
                                               
                                            </div>
                                            <div class="text_cos_tp">
                                                <span>Legal Entity Name</span>
                                              
                                                <h2>{{ $customerrecord->lename }}</h2>
                                            </div>
                                        </div>
                                        <div class="con_tp_icon">
                                            <button class="ediit" type="button">
                                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.3993 15.0963C1.43759 14.7517 1.45673 14.5794 1.50887 14.4184C1.55512 14.2755 1.62046 14.1396 1.70314 14.0142C1.79632 13.8729 1.91889 13.7503 2.16404 13.5052L13.1693 2.49992C14.0898 1.57945 15.5822 1.57945 16.5026 2.49993C17.4231 3.4204 17.4231 4.91279 16.5026 5.83326L5.49738 16.8385C5.25222 17.0836 5.12965 17.2062 4.98834 17.2994C4.86298 17.3821 4.72701 17.4474 4.58414 17.4937C4.42311 17.5458 4.25082 17.5649 3.90624 17.6032L1.08594 17.9166L1.3993 15.0963Z" stroke="#535862" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                            <button class="delet" type="button">
                                                <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.3333 5.00033V4.33366C12.3333 3.40024 12.3333 2.93353 12.1517 2.57701C11.9919 2.2634 11.7369 2.00844 11.4233 1.84865C11.0668 1.66699 10.6001 1.66699 9.66667 1.66699H8.33333C7.39991 1.66699 6.9332 1.66699 6.57668 1.84865C6.26308 2.00844 6.00811 2.2634 5.84832 2.57701C5.66667 2.93353 5.66667 3.40024 5.66667 4.33366V5.00033M7.33333 9.58366V13.7503M10.6667 9.58366V13.7503M1.5 5.00033H16.5M14.8333 5.00033V14.3337C14.8333 15.7338 14.8333 16.4339 14.5608 16.9686C14.3212 17.439 13.9387 17.8215 13.4683 18.0612C12.9335 18.3337 12.2335 18.3337 10.8333 18.3337H7.16667C5.76654 18.3337 5.06647 18.3337 4.53169 18.0612C4.06129 17.8215 3.67883 17.439 3.43915 16.9686C3.16667 16.4339 3.16667 15.7338 3.16667 14.3337V5.00033" stroke="#FA4A4A" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="top_cont_btn">
                                        <a href="#">Send Notification
                                            <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.980729 9.90006L11.1599 5.53673C11.2651 5.49191 11.3548 5.41713 11.4179 5.32172C11.481 5.2263 11.5146 5.11444 11.5146 5.00007C11.5146 4.88569 11.481 4.77383 11.4179 4.67842C11.3548 4.583 11.2651 4.50823 11.1599 4.4634L0.980729 0.100066C0.892588 0.0616207 0.796263 0.0457239 0.700443 0.0538091C0.604623 0.0618942 0.512323 0.093707 0.43187 0.146378C0.351417 0.199048 0.285342 0.270919 0.239607 0.355507C0.193871 0.440095 0.169914 0.534739 0.169896 0.630899L0.164062 3.32007C0.164062 3.61173 0.379896 3.86257 0.671562 3.89757L8.91406 5.00007L0.671562 6.09673C0.379896 6.13757 0.164062 6.3884 0.164062 6.68007L0.169896 9.36923C0.169896 9.7834 0.595729 10.0692 0.980729 9.90006Z" fill="#414651" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>

                                <div class="contract_detail_middle">
                                    <div class="authrized_signatory cmn_authh">
                                        <h2>Director List</h2>
                                       
                                        <ul>
                                            @if(is_array($customerrecord->dname))
                                                @foreach($customerrecord->dname as $name)
                                                    <li>
                                                        <h2>{{ $name }}</h2>
                                                        <div class="tool_tip">
                                                            <div class="tip_icon">
                                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M5.41406 8.91797H6.58073V5.41797H5.41406V8.91797ZM5.9974 4.2513C6.16267 4.2513 6.30131 4.1953 6.41331 4.0833C6.52531 3.9713 6.58112 3.83286 6.58073 3.66797C6.58034 3.50308 6.52434 3.36464 6.41273 3.25264C6.30112 3.14064 6.16267 3.08464 5.9974 3.08464C5.83212 3.08464 5.69367 3.14064 5.58206 3.25264C5.47045 3.36464 5.41445 3.50308 5.41406 3.66797C5.41367 3.83286 5.46967 3.9715 5.58206 4.08389C5.69445 4.19627 5.8329 4.25208 5.9974 4.2513ZM5.9974 11.8346C5.19045 11.8346 4.43212 11.6814 3.7224 11.375C3.01267 11.0685 2.39531 10.653 1.87031 10.1284C1.34531 9.60377 0.929785 8.98641 0.62373 8.2763C0.317674 7.56619 0.164452 6.80786 0.164063 6.0013C0.163674 5.19475 0.316897 4.43641 0.62373 3.7263C0.930563 3.01619 1.34609 2.39883 1.87031 1.87422C2.39454 1.34961 3.0119 0.93408 3.7224 0.627635C4.4329 0.321191 5.19123 0.167969 5.9974 0.167969C6.80356 0.167969 7.5619 0.321191 8.2724 0.627635C8.9829 0.93408 9.60026 1.34961 10.1245 1.87422C10.6487 2.39883 11.0644 3.01619 11.3716 3.7263C11.6789 4.43641 11.8319 5.19475 11.8307 6.0013C11.8296 6.80786 11.6763 7.56619 11.3711 8.2763C11.0658 8.98641 10.6503 9.60377 10.1245 10.1284C9.5987 10.653 8.98134 11.0687 8.2724 11.3756C7.56345 11.6824 6.80512 11.8354 5.9974 11.8346ZM5.9974 10.668C7.30017 10.668 8.40365 10.2159 9.30781 9.31172C10.212 8.40755 10.6641 7.30408 10.6641 6.0013C10.6641 4.69852 10.212 3.59505 9.30781 2.69089C8.40365 1.78672 7.30017 1.33464 5.9974 1.33464C4.69462 1.33464 3.59115 1.78672 2.68698 2.69089C1.78281 3.59505 1.33073 4.69852 1.33073 6.0013C1.33073 7.30408 1.78281 8.40755 2.68698 9.31172C3.59115 10.2159 4.69462 10.668 5.9974 10.668Z" fill="#535862"></path>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @elseif(is_string($customerrecord->dname))
                                                @foreach(json_decode($customerrecord->dname) as $name)
                                                    <li>
                                                        <h2>{{ $name }}</h2>
                                                        <div class="tool_tip">
                                                            <div class="tip_icon">
                                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M5.41406 8.91797H6.58073V5.41797H5.41406V8.91797ZM5.9974 4.2513C6.16267 4.2513 6.30131 4.1953 6.41331 4.0833C6.52531 3.9713 6.58112 3.83286 6.58073 3.66797C6.58034 3.50308 6.52434 3.36464 6.41273 3.25264C6.30112 3.14064 6.16267 3.08464 5.9974 3.08464C5.83212 3.08464 5.69367 3.14064 5.58206 3.25264C5.47045 3.36464 5.41445 3.50308 5.41406 3.66797C5.41367 3.83286 5.46967 3.9715 5.58206 4.08389C5.69445 4.19627 5.8329 4.25208 5.9974 4.2513ZM5.9974 11.8346C5.19045 11.8346 4.43212 11.6814 3.7224 11.375C3.01267 11.0685 2.39531 10.653 1.87031 10.1284C1.34531 9.60377 0.929785 8.98641 0.62373 8.2763C0.317674 7.56619 0.164452 6.80786 0.164063 6.0013C0.163674 5.19475 0.316897 4.43641 0.62373 3.7263C0.930563 3.01619 1.34609 2.39883 1.87031 1.87422C2.39454 1.34961 3.0119 0.93408 3.7224 0.627635C4.4329 0.321191 5.19123 0.167969 5.9974 0.167969C6.80356 0.167969 7.5619 0.321191 8.2724 0.627635C8.9829 0.93408 9.60026 1.34961 10.1245 1.87422C10.6487 2.39883 11.0644 3.01619 11.3716 3.7263C11.6789 4.43641 11.8319 5.19475 11.8307 6.0013C11.8296 6.80786 11.6763 7.56619 11.3711 8.2763C11.0658 8.98641 10.6503 9.60377 10.1245 10.1284C9.5987 10.653 8.98134 11.0687 8.2724 11.3756C7.56345 11.6824 6.80512 11.8354 5.9974 11.8346ZM5.9974 10.668C7.30017 10.668 8.40365 10.2159 9.30781 9.31172C10.212 8.40755 10.6641 7.30408 10.6641 6.0013C10.6641 4.69852 10.212 3.59505 9.30781 2.69089C8.40365 1.78672 7.30017 1.33464 5.9974 1.33464C4.69462 1.33464 3.59115 1.78672 2.68698 2.69089C1.78281 3.59505 1.33073 4.69852 1.33073 6.0013C1.33073 7.30408 1.78281 8.40755 2.68698 9.31172C3.59115 10.2159 4.69462 10.668 5.9974 10.668Z" fill="#535862"></path>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                                                                                                    
                                    </div>
                                    <div class="customer_status cmn_authh">
                                        <h2>Customer Status</h2>
                                        <span class="active">Active</span>
                                    </div>
                                    <div class="divisions_associated cmn_authh">
                                        <h2>Divisions Associated</h2>
                                        <div class="divi_ass_wrap">
                                            @foreach($divisions as $division)
                                            <span>{{ $division }}</span>
                                            @endforeach
                                            
                                        </div>
                                    </div>

                                </div>

                                <div class="contract_detail_bottom">
                                    <div class="registration_documents">
                                        <h2>Registration Documents</h2>
                                        <div class="registration_documents_wrap">
                                            {{-- <span>LLPIN <svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 7C6.10457 7 7 6.10457 7 5C7 3.89543 6.10457 3 5 3C3.89543 3 3 3.89543 3 5C3 6.10457 3.89543 7 5 7Z" fill="#414651" />
                                                    <path d="M9.5 5C9.5 5 9 1 5 1C1 1 0.5 5 0.5 5" stroke="#414651" />
                                                </svg>
                                            </span> --}}
                                            {{-- <span>PAN <svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 7C6.10457 7 7 6.10457 7 5C7 3.89543 6.10457 3 5 3C3.89543 3 3 3.89543 3 5C3 6.10457 3.89543 7 5 7Z" fill="#414651" />
                                                    <path d="M9.5 5C9.5 5 9 1 5 1C1 1 0.5 5 0.5 5" stroke="#414651" />
                                                </svg>
                                            </span> --}}
                                            <span>
                                                <a href="{{ asset('/' . $customerrecord->gstin_file) }}" target="_blank">
                                                    GSTIN 
                                                    <svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5 7C6.10457 7 7 6.10457 7 5C7 3.89543 6.10457 3 5 3C3.89543 3 3 3.89543 3 5C3 6.10457 3.89543 7 5 7Z" fill="#414651" />
                                                        <path d="M9.5 5C9.5 5 9 1 5 1C1 1 0.5 5 0.5 5" stroke="#414651" />
                                                    </svg>
                                                </a>
                                            </span>
                                            
                                            <span>
                                                <a href="{{ asset('/' . $customerrecord->cin_file) }}" target="_blank">
                                                    CIN 
                                                    <svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5 7C6.10457 7 7 6.10457 7 5C7 3.89543 6.10457 3 5 3C3.89543 3 3 3.89543 3 5C3 6.10457 3.89543 7 5 7Z" fill="#414651" />
                                                        <path d="M9.5 5C9.5 5 9 1 5 1C1 1 0.5 5 0.5 5" stroke="#414651" />
                                                    </svg>
                                                </a>
                                            </span>
                                            
                                            
                                            {{-- <span>Doc <svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 7C6.10457 7 7 6.10457 7 5C7 3.89543 6.10457 3 5 3C3.89543 3 3 3.89543 3 5C3 6.10457 3.89543 7 5 7Z" fill="#414651" />
                                                    <path d="M9.5 5C9.5 5 9 1 5 1C1 1 0.5 5 0.5 5" stroke="#414651" />
                                                </svg>
                                            </span> --}}
                                            {{-- <span>Doc 5 <svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 7C6.10457 7 7 6.10457 7 5C7 3.89543 6.10457 3 5 3C3.89543 3 3 3.89543 3 5C3 6.10457 3.89543 7 5 7Z" fill="#414651" />
                                                    <path d="M9.5 5C9.5 5 9 1 5 1C1 1 0.5 5 0.5 5" stroke="#414651" />
                                                </svg>
                                            </span> --}}
                                        </div>
                                    </div>

                                    <div class="type_entity enty_cmnn">
                                        <span>Type of Entity</span>
                                        <h2>{{ $customerrecord->type_of_entity }}</h2>
                                    </div>

                                    <div class="registered_ffice enty_cmnn">
                                        <span>Registered Office</span>
                                        <p>{{ $customerrecord->roa }}, {{ $customerrecord->city }}, {{ $customerrecord->state }}, {{ $customerrecord->pincode }}</p>
                                    </div>

                                    <div class="partners enty_cmnn">
                                        <span>Partners</span>
                                        <div class="partner_count">
                                            <b>Anurag Srivastava</b>
                                            <b>Anurag Srivastava</b>
                                            <b>Anurag Srivastava</b>
                                            <b>Anurag Srivastava</b>
                                            <b>Anurag Srivastava</b>
                                            <b class="count"></b>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            
                        </div>

                        <div class="col-md-8">
                            <div class="contract_uploadd">
                                <div class="contract_up_head">
                                    <div class="left_con_hhead">
                                        <h2>Contracts uploaded</h2>
                                    </div>
                                    <div class="right_btn_contt">
                                        <button type="button" class="download">Download</button>
                                        <button type="button" class="opload" data-bs-toggle="modal" data-bs-target="#add_contract1">
                                            <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.66406 12.3333L9.9974 9M9.9974 9L13.3307 12.3333M9.9974 9V16.5M16.6641 12.9524C17.682 12.1117 18.3307 10.8399 18.3307 9.41667C18.3307 6.88536 16.2787 4.83333 13.7474 4.83333C13.5653 4.83333 13.3949 4.73833 13.3025 4.58145C12.2158 2.73736 10.2094 1.5 7.91406 1.5C4.46228 1.5 1.66406 4.29822 1.66406 7.75C1.66406 9.47175 2.36027 11.0309 3.48652 12.1613" stroke="white" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>Upload</button>
                                    </div>
                                </div>


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


                                        <form id="customercontractForm" action="{{ route('storecustomercontract') }}" method="POST" enctype="multipart/form-data" class="upload-form rers_pages_hide"> 
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
                                        <input placeholder="Type" required type="text" id="contract_name" name="contract_name" pattern="^[A-Za-z\s]+$" 
                                        title="Only alphabets and spaces are allowed" >
                                        <input  required type="hidden" id="contracttype" name="contracttype" value="customer contract">
                                        <input  required type="hidden" id="customer_id" name="customer_id" value="{{$customerrecord->id}}">
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
                                        <input placeholder="Type" type="text" required id="vendor_name" name="vendor_name" pattern="^[A-Za-z\s]+$" 
                                        title="Only alphabets and spaces are allowed" >
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
                                        <input placeholder="Type" required type="text" id="contract_value" pattern="^\d+(\.\d+)?$" title="Please enter a valid value" name="contract_value">
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
                                        <div class="page page2 ">

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
                                        

                                        <div class="root_btn">                        
                                        <button class="btn btn-primary" id="submitButton" style="border-radius:5px;" type="submit">Upload</button>
                                        </div>
                                        </div>

                                                </form>
                                         
                                                
                                                
                                                <script>
                                                    $(document).ready(function() {
                                        // Disable submit button initially
                                        $('#submitButton').prop('disabled', true);

                                        // Function to check if all required fields are filled
                                        function checkRequiredFields() {
                                        let allFilled = true;

                                        // Iterate over each required field
                                        $('form#customercontractForm [required]').each(function() {
                                        if ($(this).val() === '') {
                                        allFilled = false;
                                        }
                                        });

                                        // Enable or disable the submit button based on field validity
                                        $('#submitButton').prop('disabled', !allFilled);
                                        }

                                        // Run the check on page load
                                        checkRequiredFields();

                                        // Bind the change and input events to required fields to check when values are updated
                                        $('form#customercontractForm [required]').on('input change', function() {
                                        checkRequiredFields();
                                        });
                                        });

                                                </script>
                                                </div>
                                            </div>
                                            </div>
                                </div>
<!-- model end -->


                                <div class="cont_body entery_body table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th><input class="sleect_all" type="checkbox" name="sleect_all" value=""></th>
                                                <th>File name</th>
                                                <th>Status</th>
                                                <th>Last updated</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($customercontract as $contract)
                                            <tr>
                                                <td><input class="sleect_individual" type="checkbox" name="sleect_individual" value=""></td>
                                                <td>
                                                    <div class="file_name">
                                                        <div class="file_iconn">
                                                            <svg width="32" height="40" viewBox="0 0 32 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M0.75 4C0.75 2.20508 2.20508 0.75 4 0.75H20C20.1212 0.75 20.2375 0.798159 20.3232 0.883885L31.1161 11.6768C31.2018 11.7625 31.25 11.8788 31.25 12V36C31.25 37.7949 29.7949 39.25 28 39.25H4C2.20507 39.25 0.75 37.7949 0.75 36V4Z" fill="white" stroke="#D0D5DD" stroke-width="1.5" />
                                                                <path d="M20 0.5V8C20 10.2091 21.7909 12 24 12H31.5" stroke="#D0D5DD" stroke-width="1.5" />
                                                            </svg>
                                                        </div>
                                                        <div class="text_file">
                                                            <h2>{{$contract->file_name}}</h2>
                                                            <span>{{$contract->file_size}} KB</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="person_status">
                                                        @php
                                                            $startDate = \Carbon\Carbon::parse($contract->startdate);
                                                            $endDate = \Carbon\Carbon::parse($contract->startend);
                                                            $currentDate = \Carbon\Carbon::now();
                                                            $remainingDays = $currentDate->diffInDays($endDate, false); // Negative if the end date is in the past
                                                        @endphp
                                                    
                                                        {{-- {{ $startDate->format('F d, Y') }} - {{ $endDate->format('F d, Y') }} --}}
                                                    
                                                        @if($remainingDays > 0)
                                                            <span class="active">Active</span>
                                                            <p>Expiring in {{ $remainingDays }}d</p>
                                                        @else
                                                            <span class="expire">Expired</span>
                                                            <p>Expired {{ abs($remainingDays) }}d ago</p>
                                                        @endif
                                                    </div>
                                                    
                                                    
                                                </td>
                                                <td>{{ $contract->updated_at->format('M j, Y') }}</td>

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

                                                        </div>
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
            <!-- Container-fluid start-->

        </div>
    </div>
</div>

@endsection