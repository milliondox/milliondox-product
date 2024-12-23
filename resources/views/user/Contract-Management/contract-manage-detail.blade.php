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
                                        <h2>Authrized Signatory</h2>

                                        <ul>

                                            <li>
                                                <div class="auth_image">
                                                    <img src="https://f-dev.milliondox.in/profile_pictures/V21JjJbUitpBjn45II8C6qqCtvj1ljfRyaOO2nfo.webp" alt="img">
                                                </div>
                                                <h2>Anurag Srivastava</h2>

                                                <div class="Authrized_Signatory">
                                                    <b>Anurag 1</b>
                                                    <b>Anurag 2</b>
                                                    <b>Anurag 3</b>
                                                    <b>Anurag 4</b>
                                                    <b>Anurag 5</b>
                                                    <b class="count"></b>
                                                </div>

                                            </li>

                                            <li>
                                                <div class="auth_image">
                                                    <img src="https://f-dev.milliondox.in/profile_pictures/V21JjJbUitpBjn45II8C6qqCtvj1ljfRyaOO2nfo.webp" alt="img">
                                                </div>
                                                <h2>Devanshu Kumar</h2>

                                                <div class="Authrized_Signatory">
                                                    <b>Devanshu 1</b>
                                                    <b>Devanshu 2</b>
                                                    <b class="count"></b>
                                                </div>

                                            </li>

                                        </ul>

                                        <!-- <ul>
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
                                        </ul> -->

                                    </div>
                                    <div class="customer_status cmn_authh">
                                        <h2>Customer Status</h2>

                                        <span class="{{ strtolower($overallStatus) }}">{{ $overallStatus }}</span>

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
                                <div class="cpllape_btn">
                                    <h2>More information</h2>
                                    <span class="line"></span>
                                    <a class="show_content">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_676_11)">
                                                <path d="M11 21C5.477 21 1 16.523 1 11C1 5.477 5.477 1 11 1C16.523 1 21 5.477 21 11C21 16.523 16.523 21 11 21Z" stroke="#D5D7DA" stroke-linejoin="round" />
                                                <path d="M6.5 9.5L11 14L15.5 9.5" stroke="#D5D7DA" stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_676_11">
                                                    <rect width="22" height="22" fill="white" transform="matrix(1 0 0 -1 0 22)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>

                                </div>

                                <div class="contract_detail_bottom" id="contract_detail_bottom">
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
                        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                // Function to check if any checkbox is checked
                                function toggleDownloadButton() {
                                    if ($('.sleect_all:checked, .sleect_individual:checked').length > 0) {
                                        $('.download').show(); // Show the download button
                                    } else {
                                        $('.download').hide(); // Hide the download button
                                    }
                                }

                                // Function to append "checked" to the value of selected inputs
                                function updateCheckedValues() {
                                    $('.sleect_all, .sleect_individual').each(function() {
                                        if ($(this).is(':checked')) {
                                            $(this).val($(this).val().replace(' checked', '') + ' checked'); // Append "checked"
                                        } else {
                                            $(this).val($(this).val().replace(' checked', '')); // Remove "checked"
                                        }
                                    });
                                }

                                // Event listener for changes in checkboxes
                                $(document).on('change', '.sleect_all, .sleect_individual', function() {
                                    toggleDownloadButton();
                                    updateCheckedValues();
                                });

                                // Optional: Select all functionality for .sleect_all
                                $('.sleect_all').on('change', function() {
                                    $('.sleect_individual').prop('checked', $(this).prop('checked'));
                                    toggleDownloadButton();
                                    updateCheckedValues();
                                });
                            });
                        </script>
                        <div class="col-md-8">
                            <div class="contract_uploadd">
                                <div class="contract_up_head">
                                    <div class="left_con_hhead">
                                        <h2>Contracts uploaded</h2>
                                    </div>
                                    <div class="right_btn_contt">
                                        <button type="button" id="downloadBtn" class="download opload" style="display: none;">
                                            <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_669_662)">
                                                    <path d="M6.66406 5.6667L9.9974 9M9.9974 9L13.3307 5.6667M9.9974 9V1.5M16.6641 5.0476C17.682 5.8883 18.3307 7.1601 18.3307 8.58333C18.3307 11.1146 16.2787 13.1667 13.7474 13.1667C13.5653 13.1667 13.3949 13.2617 13.3025 13.4186C12.2158 15.2626 10.2094 16.5 7.91406 16.5C4.46228 16.5 1.66406 13.7018 1.66406 10.25C1.66406 8.52825 2.36027 6.9691 3.48652 5.8387" stroke="#bdbfc1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_669_662">
                                                        <rect width="20" height="18" fill="white" transform="matrix(1 0 0 -1 0 18)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <span class="button-text">Download</span>
                                        </button>
                                        <div class="opload_wrap">
                                            <button type="button" class="opload">
                                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.66406 12.3333L9.9974 9M9.9974 9L13.3307 12.3333M9.9974 9V16.5M16.6641 12.9524C17.682 12.1117 18.3307 10.8399 18.3307 9.41667C18.3307 6.88536 16.2787 4.83333 13.7474 4.83333C13.5653 4.83333 13.3949 4.73833 13.3025 4.58145C12.2158 2.73736 10.2094 1.5 7.91406 1.5C4.46228 1.5 1.66406 4.29822 1.66406 7.75C1.66406 9.47175 2.36027 11.0309 3.48652 12.1613" stroke="white" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <span class="button-text">Upload</span>
                                            </button>

                                            <ul class="opload_wrap_opt">

                                                <li class="oplod_inner">
                                                    <a id="addacustomer">
                                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.3359 5.50098C12.7859 5.50898 13.5713 5.57364 14.0833 6.08564C14.6693 6.67164 14.6693 7.61431 14.6693 9.49964V10.1663C14.6693 12.0523 14.6693 12.995 14.0833 13.581C13.4979 14.1663 12.5546 14.1663 10.6693 14.1663H5.33594C3.4506 14.1663 2.50727 14.1663 1.92194 13.581C1.33594 12.9943 1.33594 12.0523 1.33594 10.1663V9.49964C1.33594 7.61431 1.33594 6.67164 1.92194 6.08564C2.43394 5.57364 3.21927 5.50898 4.66927 5.50098" stroke="#5790FF" stroke-width="1.2" stroke-linecap="round" />
                                                            <path d="M8 9.49967V0.833008M8 0.833008L10 3.16634M8 0.833008L6 3.16634" stroke="#5790FF" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        Upload Contract
                                                    </a>
                                                </li>

                                                <li class="oplod_inner">
                                                    <a>
                                                        <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M3.5 10.5H3V11.5H3.5V10.5ZM9.5 11.5H10V10.5H9.5V11.5ZM3.5 7.5H3V8.5H3.5V7.5ZM5.5 8.5H6V7.5H5.5V8.5ZM9.5 4L9.854 3.646L9.707 3.5H9.5V4ZM12.5 7H13V6.793L12.854 6.646L12.5 7ZM6.5 15L6.724 15.447L6.764 15.427L6.8 15.4L6.5 15ZM3.5 11.5H9.5V10.5H3.5V11.5ZM3.5 8.5H5.5V7.5H3.5V8.5ZM11.5 17.5H1.5V18.5H11.5V17.5ZM1 17V5H0V17H1ZM1.5 4.5H9.5V3.5H1.5V4.5ZM12 7V17H13V7H12ZM9.146 4.354L12.146 7.354L12.854 6.646L9.854 3.646L9.146 4.354ZM1.5 17.5C1.36739 17.5 1.24021 17.4473 1.14645 17.3536C1.05268 17.2598 1 17.1326 1 17H0C0 17.3978 0.158035 17.7794 0.43934 18.0607C0.720644 18.342 1.10218 18.5 1.5 18.5V17.5ZM11.5 18.5C11.8978 18.5 12.2794 18.342 12.5607 18.0607C12.842 17.7794 13 17.3978 13 17H12C12 17.1326 11.9473 17.2598 11.8536 17.3536C11.7598 17.4473 11.6326 17.5 11.5 17.5V18.5ZM1 5C1 4.86739 1.05268 4.74021 1.14645 4.64645C1.24021 4.55268 1.36739 4.5 1.5 4.5V3.5C1.10218 3.5 0.720644 3.65804 0.43934 3.93934C0.158035 4.22064 0 4.60218 0 5H1ZM4.474 15.158C4.585 14.825 4.901 14.516 5.304 14.408C5.681 14.307 6.166 14.373 6.646 14.854L7.354 14.146C6.634 13.426 5.785 13.243 5.045 13.442C4.332 13.634 3.748 14.175 3.525 14.842L4.474 15.158ZM6.646 14.854C6.67402 14.8814 6.70039 14.9105 6.725 14.941L7.515 14.327C7.46501 14.2638 7.41124 14.2037 7.354 14.147L6.646 14.854ZM6.725 14.941C6.803 15.041 6.785 15.073 6.788 15.051C6.79 15.037 6.794 15.06 6.734 15.114C6.64755 15.1863 6.5495 15.2434 6.444 15.283C6.31719 15.3338 6.18501 15.3701 6.05 15.391C5.96741 15.4048 5.88342 15.4081 5.8 15.401C5.783 15.397 5.818 15.401 5.87 15.438C5.93353 15.4874 5.98023 15.5552 6.00368 15.6322C6.02714 15.7092 6.0262 15.7916 6.001 15.868C5.99542 15.8846 5.98769 15.9004 5.978 15.915C5.976 15.917 5.993 15.895 6.05 15.848C6.164 15.756 6.374 15.622 6.724 15.448L6.276 14.553C5.9 14.741 5.61533 14.9133 5.422 15.07C5.32382 15.147 5.23638 15.2368 5.162 15.337C5.06734 15.4631 5.01801 15.6174 5.022 15.775C5.02632 15.8672 5.05151 15.9573 5.09568 16.0383C5.13986 16.1194 5.20185 16.1894 5.277 16.243C5.39 16.327 5.515 16.363 5.607 16.382C5.794 16.419 6.007 16.409 6.2 16.38C6.58 16.322 7.072 16.158 7.407 15.854C7.581 15.695 7.746 15.467 7.781 15.168C7.817 14.862 7.707 14.575 7.514 14.328L6.725 14.941ZM6.8 15.4C6.96019 15.278 7.13403 15.1749 7.318 15.093L6.921 14.175C6.681 14.2783 6.44067 14.42 6.2 14.6L6.8 15.4ZM7.318 15.093C7.968 14.812 8.549 14.96 9.144 15.243C9.29267 15.3157 9.44067 15.3923 9.588 15.473C9.732 15.551 9.884 15.634 10.028 15.708C10.304 15.847 10.646 16 11 16V15C10.906 15 10.752 14.953 10.48 14.816C10.352 14.75 10.218 14.676 10.064 14.593C9.914 14.512 9.748 14.423 9.574 14.341C8.876 14.008 7.963 13.725 6.921 14.175L7.318 15.093Z" fill="#5790FF" />
                                                            <path d="M12.7531 1.362C12.9026 0.9245 13.5071 0.91125 13.6843 1.32225L13.6993 1.36225L13.9011 1.95225C13.9473 2.08756 14.022 2.21138 14.1202 2.31536C14.2184 2.41933 14.3377 2.50105 14.4701 2.555L14.5243 2.57525L15.1143 2.77675C15.5518 2.92625 15.5651 3.53075 15.1543 3.708L15.1143 3.723L14.5243 3.92475C14.389 3.97096 14.2651 4.04566 14.1611 4.14381C14.0571 4.24197 13.9753 4.3613 13.9213 4.49375L13.9011 4.54775L13.6996 5.138C13.5501 5.5755 12.9456 5.58875 12.7686 5.178L12.7531 5.138L12.5516 4.548C12.5054 4.41265 12.4307 4.28878 12.3325 4.18475C12.2344 4.08073 12.115 3.99897 11.9826 3.945L11.9286 3.92475L11.3386 3.72325C10.9008 3.57375 10.8876 2.96925 11.2986 2.79225L11.3386 2.77675L11.9286 2.57525C12.0639 2.52901 12.1877 2.4543 12.2917 2.35614C12.3957 2.25799 12.4774 2.13867 12.5313 2.00625L12.5516 1.95225L12.7531 1.362ZM15.2263 0.5C15.2731 0.5 15.3189 0.51312 15.3586 0.537868C15.3983 0.562616 15.4303 0.598001 15.4508 0.64L15.4628 0.66925L15.5503 0.92575L15.8071 1.01325C15.854 1.02917 15.8951 1.05865 15.9252 1.09795C15.9552 1.13725 15.973 1.1846 15.9762 1.23401C15.9793 1.28341 15.9677 1.33263 15.9429 1.37545C15.9181 1.41826 15.8811 1.45273 15.8366 1.4745L15.8071 1.4865L15.5506 1.574L15.4631 1.83075C15.4471 1.87761 15.4176 1.91867 15.3783 1.94875C15.339 1.97882 15.2917 1.99655 15.2423 1.99968C15.1929 2.00281 15.1436 1.99121 15.1008 1.96634C15.058 1.94148 15.0236 1.90447 15.0018 1.86L14.9898 1.83075L14.9023 1.57425L14.6456 1.48675C14.5987 1.47083 14.5576 1.44135 14.5275 1.40205C14.4974 1.36275 14.4797 1.3154 14.4765 1.26599C14.4734 1.21659 14.4849 1.16737 14.5098 1.12455C14.5346 1.08174 14.5716 1.04727 14.6161 1.0255L14.6456 1.0135L14.9021 0.926L14.9896 0.66925C15.0065 0.619856 15.0383 0.576977 15.0808 0.546625C15.1233 0.516272 15.1742 0.499969 15.2263 0.5Z" fill="#5790FF" />
                                                        </svg>
                                                        Create Smart Contract
                                                    </a>
                                                </li>
                                                <li class="oplod_inner">
                                                    <a data-bs-toggle="modal" data-bs-target="#contract_master_details">
                                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.3359 5.50098C12.7859 5.50898 13.5713 5.57364 14.0833 6.08564C14.6693 6.67164 14.6693 7.61431 14.6693 9.49964V10.1663C14.6693 12.0523 14.6693 12.995 14.0833 13.581C13.4979 14.1663 12.5546 14.1663 10.6693 14.1663H5.33594C3.4506 14.1663 2.50727 14.1663 1.92194 13.581C1.33594 12.9943 1.33594 12.0523 1.33594 10.1663V9.49964C1.33594 7.61431 1.33594 6.67164 1.92194 6.08564C2.43394 5.57364 3.21927 5.50898 4.66927 5.50098" stroke="#5790FF" stroke-width="1.2" stroke-linecap="round" />
                                                            <path d="M8 9.49967V0.833008M8 0.833008L10 3.16634M8 0.833008L6 3.16634" stroke="#5790FF" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        Bulk Upload Contract
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="addcustomer_overlay_fix"></div>
                                <div class="addcustomer_fix">
                                    <h2 class="addcustomer_title">Upload Contract</h2>
                                    <div class="customer_wrap customer_details">
                                        <form id="customerContractForm" action="{{ route('storecustomercontract') }}" method="POST" enctype="multipart/form-data" class="upload-form">
                                            @csrf

                                            <input type="hidden" name="is_drafted" id="is_drafted" value="0">
                                            <div class="file-area">
                                                <input type="file" class="dragfile" id="contractfile" name="file" accept=".pdf,.doc,.docx" required>

                                                <div class="file-dummy">
                                                    <div class="default">
                                                        <span class="upload_icon">
                                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.9974 0.041504C9.08764 0.0414466 9.17682 0.0609324 9.25882 0.0986218C9.34082 0.136311 9.41368 0.19131 9.47239 0.259837L11.9724 3.1765C12.0802 3.30248 12.1336 3.46615 12.1208 3.63149C12.108 3.79683 12.03 3.95032 11.9041 4.05817C11.7781 4.16603 11.6144 4.21942 11.4491 4.2066C11.2837 4.19379 11.1303 4.11581 11.0224 3.98984L9.6224 2.3565V11.4998C9.6224 11.6656 9.55655 11.8246 9.43934 11.9418C9.32213 12.059 9.16316 12.1248 8.9974 12.1248C8.83164 12.1248 8.67266 12.059 8.55545 11.9418C8.43824 11.8246 8.3724 11.6656 8.3724 11.4998V2.35567L6.9724 3.98984C6.91899 4.05222 6.85382 4.10346 6.78061 4.14066C6.7074 4.17785 6.62758 4.20026 6.54571 4.2066C6.46384 4.21295 6.38153 4.20311 6.30346 4.17764C6.22539 4.15217 6.15311 4.11157 6.09073 4.05817C6.02835 4.00477 5.9771 3.9396 5.93991 3.86639C5.90272 3.79318 5.88031 3.71336 5.87396 3.63149C5.86762 3.54962 5.87746 3.4673 5.90293 3.38923C5.9284 3.31117 5.96899 3.23888 6.0224 3.1765L8.5224 0.259837C8.58111 0.19131 8.65398 0.136311 8.73597 0.0986218C8.81797 0.0609324 8.90715 0.0414466 8.9974 0.041504ZM4.8274 5.8765C4.99316 5.87562 5.15248 5.94062 5.27031 6.05721C5.38815 6.17379 5.45484 6.33241 5.45573 6.49817C5.45661 6.66393 5.39161 6.82325 5.27503 6.94109C5.15844 7.05892 4.99982 7.12562 4.83406 7.1265C3.92323 7.1315 3.2774 7.15484 2.78656 7.24484C2.3149 7.33234 2.04073 7.4715 1.83823 7.674C1.6074 7.90484 1.4574 8.229 1.3749 8.84067C1.29073 9.46984 1.28906 10.304 1.28906 11.4998V12.3332C1.28906 13.5298 1.29073 14.364 1.3749 14.9932C1.4574 15.6048 1.60823 15.9282 1.83823 16.1598C2.06906 16.3898 2.3924 16.5398 3.0049 16.6223C3.63323 16.7073 4.46823 16.7082 5.66406 16.7082H12.3307C13.5266 16.7082 14.3607 16.7073 14.9907 16.6223C15.6024 16.5398 15.9257 16.3898 16.1566 16.159C16.3874 15.9282 16.5374 15.6048 16.6199 14.9932C16.7041 14.364 16.7057 13.5298 16.7057 12.3332V11.4998C16.7057 10.304 16.7041 9.46984 16.6199 8.83984C16.5374 8.229 16.3866 7.90484 16.1566 7.674C15.9532 7.4715 15.6799 7.33234 15.2082 7.24484C14.7174 7.15484 14.0716 7.1315 13.1607 7.1265C13.0787 7.12607 12.9975 7.10947 12.9218 7.07765C12.8461 7.04584 12.7775 6.99943 12.7198 6.94109C12.662 6.88274 12.6164 6.8136 12.5854 6.7376C12.5544 6.66161 12.5386 6.58025 12.5391 6.49817C12.5395 6.41609 12.5561 6.33491 12.5879 6.25925C12.6197 6.18359 12.6661 6.11493 12.7245 6.05721C12.7828 5.99948 12.852 5.95381 12.928 5.9228C13.004 5.8918 13.0853 5.87607 13.1674 5.8765C14.0691 5.8815 14.8199 5.90317 15.4341 6.01567C16.0657 6.13234 16.6032 6.35317 17.0407 6.79067C17.5424 7.2915 17.7574 7.924 17.8591 8.674C17.9557 9.39567 17.9557 10.3148 17.9557 11.454V12.379C17.9557 13.519 17.9557 14.4373 17.8591 15.1598C17.7574 15.9098 17.5424 16.5415 17.0407 17.0432C16.5391 17.5448 15.9074 17.7598 15.1574 17.8615C14.4349 17.9582 13.5157 17.9582 12.3766 17.9582H5.61823C4.47906 17.9582 3.5599 17.9582 2.8374 17.8615C2.0874 17.7607 1.45573 17.5448 0.954063 17.0432C0.452396 16.5415 0.237396 15.9098 0.136562 15.1598C0.0390625 14.4373 0.0390625 13.5182 0.0390625 12.379V11.454C0.0390625 10.3148 0.0390625 9.39567 0.136562 8.67317C0.236562 7.92317 0.453229 7.2915 0.954063 6.78984C1.39156 6.35317 1.92906 6.1315 2.56073 6.01567C3.1749 5.90317 3.92573 5.8815 4.8274 5.8765Z" fill="#ABABAB" />
                                                            </svg>
                                                            Upload a file
                                                        </span>
                                                        <span class="fille">Choose File</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="gropu_form">
                                                <label for="fname">Contract name <span class="red_star">*</span></label>
                                                <input placeholder="Type" required type="text" id="contract_name" name="contract_name" pattern="^[A-Za-z\s]+$"
                                                    title="Only alphabets and spaces are allowed">
                                                <input required type="hidden" id="contracttype" name="contracttype" value="customer contract">
                                                <input required type="hidden" id="customer_id" name="customer_id" value="{{$customerrecord->id}}">
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
                                                <label for="Division">Division<span class="red_star">*</span></label>
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
                                                    title="Only alphabets and spaces are allowed">
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
                                                <input type="date" id="start" name="startdate" required />
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

                                            <div class="gropu_form">
                                                <label for="renewal_terms">Renewal Terms <span class="red_star">*</span></label>
                                                <textarea name="renewal_terms[]" style="height: 58px;" required></textarea>
                                            </div>

                                            <div class="gropu_form">
                                                <label for="payment_terms">Payment Terms <span class="red_star">*</span></label>
                                                <textarea name="payment_terms[]" style="height: 58px;" required></textarea>
                                            </div>

                                            <div class="gropu_form">
                                                <label for="fee_escalation_clause">Fee Escalation Clause <span class="red_star">*</span></label>
                                                <textarea name="fee_escalation_clause[]" style="height: 58px;" required></textarea>
                                            </div>


                                            <div class="root_btn btn_draft">
                                                <button type="button" id="draftButton">Save as Draft</button>
                                                <button class="btn" id="submitButton" type="submit">Upload</button>
                                            </div>


                                        </form>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const form = document.getElementById('customerContractForm');

                                                if (form) {
                                                    // Remove the 'required' attribute from all input and select elements for draft
                                                    document.getElementById('draftButton').addEventListener('click', function() {
                                                        const isDrafted = document.getElementById('is_drafted');
                                                        if (isDrafted) {
                                                            isDrafted.value = '1'; // Mark as draft
                                                        }
                                                        Array.from(form.elements).forEach(element => {
                                                            if (element.hasAttribute('required')) {
                                                                element.removeAttribute('required');
                                                            }
                                                        });
                                                        form.submit(); // Submit the form
                                                    });

                                                    // Handle final submission
                                                    document.getElementById('submitButton').addEventListener('click', function() {
                                                        const isDrafted = document.getElementById('is_drafted');
                                                        if (isDrafted) {
                                                            isDrafted.value = '0'; // Mark as final submission
                                                        }
                                                    });
                                                } else {
                                                    console.error('Form with ID "customerContractForm" not found.');
                                                }
                                            });
                                        </script>


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
                                                <td><input class="sleect_individual" type="checkbox" name="sleect_individual" value="{{ $contract->id }}"></td>
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



                                                    {{-- <div class="person_status">
                                                        @php
                                                            $startDate = \Carbon\Carbon::parse($contract->startdate);
                                                            $endDate = \Carbon\Carbon::parse($contract->startend);
                                                            $currentDate = \Carbon\Carbon::now();
                                                            $remainingDays = $currentDate->diffInDays($endDate, false); // Negative if the end date is in the past
                                                        @endphp
                                                    
                                                     
                                                    
                                                        @if($remainingDays > 0)
                                                            <span class="active">Active</span>
                                                            <p>Expiring in {{ $remainingDays }}d</p>
                                                    @else
                                                    <span class="expire">Expired</span>
                                                    <p>Expired {{ abs($remainingDays) }}d ago</p>
                                                    @endif
                                </div> --}}


                                <div class="person_status">
                                    @php
                                    $startDate = $contract->startdate ? \Carbon\Carbon::parse($contract->startdate) : null;
                                    $endDate = $contract->startend ? \Carbon\Carbon::parse($contract->startend) : null;
                                    $currentDate = \Carbon\Carbon::now();
                                    $remainingDays = $endDate ? $currentDate->diffInDays($endDate, false) : null; // Calculate only if endDate exists
                                    @endphp

                                    @if(is_null($startDate) || is_null($endDate))
                                    <span class="draft">Draft</span>
                                    <p>In Draft</p>
                                    @else
                                    @if($remainingDays > 0)
                                    <span class="active">Active</span>
                                    <p>Expiring in {{ $remainingDays }}d</p>
                                    @else
                                    <span class="expire">Expired</span>
                                    <p>Expired {{ abs($remainingDays) }}d ago</p>
                                    @endif
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

                                            @php
                                            $renewalTermsArray = json_decode($contract->renewal_terms, true);
                                            $feeEscalationArray = json_decode($contract->fee_escalation_clause, true);
                                            $paymentTermsArray = json_decode($contract->payment_terms, true);

                                            $lastRenewalTerm = is_array($renewalTermsArray) && !empty($renewalTermsArray) ? end($renewalTermsArray) : null;
                                            $lastFeeEscalation = is_array($feeEscalationArray) && !empty($feeEscalationArray) ? end($feeEscalationArray) : null;
                                            $lastPaymentTerm = is_array($paymentTermsArray) && !empty($paymentTermsArray) ? end($paymentTermsArray) : null;
                                            @endphp
                                            <a class="dropdown-itemm notify" data-bs-toggle="modal" data-id="{{ $contract->id }}" data-amount="{{ $contract->contract_value }}" data-bs-toggle="modal" data-bs-target="#notify_customer" data-file-name="{{ $contract->file_name }}" data-startend="{{ $contract->startend }}" data-cname="{{$customerrecord->lename}}" data-vname="{{$contract->vendor_name}}">

                                                <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.980729 9.90006L11.1599 5.53673C11.2651 5.49191 11.3548 5.41713 11.4179 5.32172C11.481 5.2263 11.5146 5.11444 11.5146 5.00007C11.5146 4.88569 11.481 4.77383 11.4179 4.67842C11.3548 4.583 11.2651 4.50823 11.1599 4.4634L0.980729 0.100066C0.892588 0.0616207 0.796263 0.0457239 0.700443 0.0538091C0.604623 0.0618942 0.512323 0.093707 0.43187 0.146378C0.351417 0.199048 0.285342 0.270919 0.239607 0.355507C0.193871 0.440095 0.169914 0.534739 0.169896 0.630899L0.164062 3.32007C0.164062 3.61173 0.379896 3.86257 0.671562 3.89757L8.91406 5.00007L0.671562 6.09673C0.379896 6.13757 0.164062 6.3884 0.164062 6.68007L0.169896 9.36923C0.169896 9.7834 0.595729 10.0692 0.980729 9.90006Z" fill="#414651" />
                                                </svg>
                                                Notify </a>

                                            <a class="dropdown-itemm Renew">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.500004 7.00043C0.500111 5.75106 0.860275 4.5282 1.53738 3.47823C2.21449 2.42826 3.17984 1.59568 4.31788 1.08015C5.45592 0.564621 6.71843 0.387992 7.95425 0.571407C9.19008 0.754823 10.3469 1.29051 11.2861 2.11434C12.2254 2.93818 12.9073 4.01524 13.2503 5.21661C13.5933 6.41797 13.5827 7.69273 13.22 8.88827C12.8572 10.0838 12.1576 11.1495 11.2049 11.9577C10.2522 12.7659 9.08669 13.2824 7.848 13.4454C7.74922 13.4606 7.6484 13.456 7.55145 13.4316C7.45451 13.4073 7.3634 13.3639 7.28348 13.3039C7.20356 13.2439 7.13645 13.1685 7.08608 13.0821C7.03571 12.9958 7.0031 12.9003 6.99017 12.8012C6.97724 12.7021 6.98425 12.6014 7.01078 12.505C7.03732 12.4087 7.08285 12.3186 7.14469 12.2401C7.20654 12.1616 7.28345 12.0962 7.37091 12.0478C7.45838 11.9995 7.55463 11.9691 7.654 11.9584C8.77538 11.8109 9.81364 11.2877 10.5993 10.4741C11.385 9.66048 11.8717 8.60457 11.9799 7.47873C12.0881 6.3529 11.8116 5.22361 11.1953 4.27522C10.579 3.32683 9.65947 2.61535 8.58674 2.25691C7.51401 1.89847 6.35145 1.91425 5.28884 2.30167C4.22623 2.68908 3.32633 3.42526 2.73602 4.39002C2.14572 5.35479 1.89988 6.49116 2.03863 7.61365C2.17739 8.73614 2.69254 9.77844 3.5 10.5704V9.25043C3.5 9.05151 3.57902 8.86075 3.71967 8.7201C3.86033 8.57944 4.05109 8.50043 4.25 8.50043C4.44892 8.50043 4.63968 8.57944 4.78033 8.7201C4.92099 8.86075 5 9.05151 5 9.25043V12.2504C5 12.4493 4.92099 12.6401 4.78033 12.7808C4.63968 12.9214 4.44892 13.0004 4.25 13.0004H1.25C1.05109 13.0004 0.860327 12.9214 0.719674 12.7808C0.579022 12.6401 0.500004 12.4493 0.500004 12.2504C0.500004 12.0515 0.579022 11.8608 0.719674 11.7201C0.860327 11.5794 1.05109 11.5004 1.25 11.5004H2.31C1.14687 10.2913 0.498033 8.67818 0.500004 7.00043ZM7 3.25043C7.19892 3.25043 7.38968 3.32944 7.53033 3.4701C7.67099 3.61075 7.75 3.80151 7.75 4.00043V6.62543L8.783 7.40043C8.8618 7.45952 8.92818 7.53356 8.97836 7.61831C9.02854 7.70306 9.06154 7.79686 9.07547 7.89436C9.0894 7.99186 9.08398 8.09115 9.05954 8.18656C9.0351 8.28197 8.9921 8.37163 8.933 8.45043C8.87391 8.52922 8.79987 8.5956 8.71513 8.64578C8.63038 8.69596 8.53657 8.72896 8.43907 8.74289C8.34157 8.75682 8.24228 8.75141 8.14687 8.72696C8.05146 8.70252 7.9618 8.65952 7.883 8.60043L6.55 7.60043C6.45686 7.53057 6.38125 7.43998 6.32918 7.33584C6.27711 7.2317 6.25 7.11686 6.25 7.00043V4.00043C6.25 3.90194 6.2694 3.80441 6.30709 3.71341C6.34479 3.62242 6.40003 3.53974 6.46967 3.4701C6.53932 3.40045 6.622 3.34521 6.71299 3.30752C6.80399 3.26983 6.90151 3.25043 7 3.25043Z" fill="#414651" />
                                                </svg>

                                                Renew </a>

                                            <a class="dropdown-itemm Addend" id="Addend{{ $contract->id }}" data-id="{{ $contract->id }}" data-file-name="{{ $contract->file_name }}" data-renewal="{{ $lastRenewalTerm }}" data-fee="{{ $lastFeeEscalation }}" data-payment="{{ $lastPaymentTerm }}" data-custid="{{$contract->customer_id}}">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.68029 10.5673C1.70709 10.3261 1.7205 10.2055 1.75699 10.0928C1.78936 9.99277 1.83511 9.89759 1.89298 9.80983C1.9582 9.71092 2.04401 9.62512 2.21561 9.45351L9.91929 1.74985C10.5636 1.10552 11.6083 1.10552 12.2526 1.74985C12.897 2.39418 12.897 3.43885 12.2526 4.08319L4.54894 11.7868C4.37734 11.9585 4.29154 12.0443 4.19262 12.1095C4.10487 12.1673 4.00969 12.2131 3.90968 12.2455C3.79696 12.282 3.67635 12.2954 3.43515 12.3222L1.46094 12.5415L1.68029 10.5673Z" stroke="#414651" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg> Addend </a>

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
                                                <form id="" action="{{ route('customernotification') }}" method="POST" enctype="multipart/form-data">

                                                    <div class="gropu_form_set defaultoption">
                                                        @csrf
                                                        <label for="read_onlyy">Selected Contract</label>
                                                        <h2 class="read_onlyy" id="filename"></h2>
                                                    </div>
                                                    <div class="gropu_form_set defaultoption">
                                                        <label for="expiring_opm">Select an option</label>
                                                        <select id="expiring_opm" name="expiring_opm" required="">
                                                            <option value="" disabled="" selected="">Please select any option</option>
                                                            <option value="Upcoming Expiry Alert">Upcoming Expiry Alert</option>
                                                            <option value="Upcoming Renewal Alert">Upcoming Renewal Alert</option>
                                                            <option value="Missing Documentation">Missing Documentation</option>
                                                            <option value="Payment Due Alert">Payment Due Alert</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                        <input type="hidden" name="email" value="{{$customerrecord->email}}">
                                                    </div>

                                                    <div class="gropu_form_set option0">
                                                        <label for="Message">Message</label>
                                                        <div class="read_onlyy">Please Select any option from above options</div>
                                                    </div>

                                                    <div class="gropu_form_set option1">
                                                        <label for="Message">Message</label>
                                                        <div class="read_onlyy result editable" id="message1">Your contract <span id="filenames" class="bolddata"></span>/<span id="custname" class="bolddata"></span> with <span id="venname" class="bolddata"></span> is set to expire on <span id="enddate" class="bolddata"></span>. Please take the necessary action to renew or terminate the contract before the expiry date.</div>
                                                    </div>

                                                    <div class="gropu_form_set option2">
                                                        <label for="Message">Message</label>
                                                        <div class="read_onlyy result editable" id="message2">Your contract <span id="fileName1" class="bolddata"></span>/<span id="custname1" class="bolddata"></span> with <span id="venname1" class="bolddata"></span> is due for renewal on <span id="renewDate" class="bolddata"></span>. Kindly review the terms and confirm the renewal process to avoid any disruptions.</div>
                                                    </div>

                                                    <div class="gropu_form_set option3">
                                                        <label for="Message">Message</label>
                                                        <div class="read_onlyy result editable" id="message3">Some required documents for [Contract ID/Name] are missing or incomplete. Please upload the following documents to ensure compliance: [Document Name 1], [Document Name 2], [Document Name 3]</div>
                                                    </div>

                                                    <div class="gropu_form_set option4">
                                                        <label for="Message">Message</label>
                                                        <div class="read_onlyy result editable" id="message4">A payment of ₹<span id="amount" class="bolddata"></span> for contract <span id="fileName2" class="bolddata"></span>/<span id="custname2" class="bolddata"></span> with <span id="venname2" class="bolddata"></span> is due on <span id="renewDate1" class="bolddata"></span>. Kindly process the payment to avoid penalties or disruptions in services.</div>
                                                    </div>
                                                    <div class="gropu_form_set option5">
                                                        <label for="Message">Message</label>
                                                        <div class="read_onlyy result editable" id="message5"><span>Write Here......</span></div>
                                                    </div>
                                                    <input type="hidden" id="selectedMessage" name="message">
                                                    <input type="hidden" id="contractFilename" name="contractFilename">
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





                                <!-- Addend sidebar start -->
                                <div class="addend_overlay_fix"></div>
                                <div class="addendcustomer_fix">
                                    <h2 class="addcustomer_title">Addend</h2>
                                    <div class="customer_wrap">

                                        <form id="" action="{{ route('customeraddend') }}" method="POST" enctype="multipart/form-data" class="upload-form">
                                            @csrf
                                            <div class="gropu_form name_svg_top">
                                                <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.41927 17.4167H9.58594V13.9167H13.0859V12.75H9.58594V9.25H8.41927V12.75H4.91927V13.9167H8.41927V17.4167ZM2.72127 21.5C2.18383 21.5 1.73544 21.3203 1.3761 20.961C1.01677 20.6017 0.836715 20.1533 0.835938 19.6158V2.38417C0.835938 1.8475 1.01599 1.3995 1.3761 1.04017C1.73622 0.680833 2.1846 0.500778 2.72127 0.5H11.9193L17.1693 5.75V19.6158C17.1693 20.1525 16.9896 20.6009 16.6303 20.961C16.2709 21.3211 15.8222 21.5008 15.2839 21.5H2.72127ZM11.3359 6.33333H16.0026L11.3359 1.66667V6.33333Z" fill="#4D4D4D" />
                                                </svg>
                                                <h2 id="AddendfileNamefilename"></h2>
                                            </div>


                                            <div class="gropu_form">
                                                <label for="con_type">Area of Addendum </label>
                                                <select id="Addendum_type" name="Addendum_type" required>
                                                    <option value="" disabled Selected>Select Area of Addendum</option>
                                                    <option value="Payment Terms Addendum">Payment Terms Addendum</option>
                                                    <option value="Renewal Terms Addendum">Renewal Terms Addendum</option>
                                                    <option value="Fee Exclusion Matrix Addendum">Fee Exclusion Matrix Addendum</option>
                                                </select>
                                            </div>
                                            <!-- Payment Terms Addendum Group -->
                                            <div class="group_payment_terms" style="display:none;">
                                                <div class="gropu_form">
                                                    <label for="con_term">Current Payment Terms </label>
                                                    <div class="renui_term">
                                                        <p id="contractpayment"></p>
                                                    </div>
                                                </div>
                                                <div class="gropu_form">
                                                    <label for="con_add_term">Add to Payment Terms </label>
                                                    <textarea name="con_add_payment_term" style="height: 150px;"></textarea>
                                                </div>
                                            </div>

                                            <!-- Renewal Terms Addendum Group -->
                                            <div class="group_renewal_terms" style="display:none;">
                                                <div class="gropu_form">
                                                    <label for="con_term">Current Renewal Terms </label>
                                                    <div class="renui_term">
                                                        <p id="contractrenewal"></p>
                                                    </div>
                                                </div>
                                                <div class="gropu_form">
                                                    <label for="con_add_term">Add to Renewal Terms </label>
                                                    <textarea name="con_add_renew_term" style="height: 150px;"></textarea>
                                                </div>
                                            </div>

                                            <!-- Fee Exclusion Matrix Addendum Group -->
                                            <div class="group_fee_exclusion" style="display:none;">
                                                <div class="gropu_form">
                                                    <label for="con_term">Current Fee Exclusion Matrix </label>
                                                    <div class="renui_term">
                                                        <p id="contractfee"></p>
                                                    </div>
                                                </div>
                                                <div class="gropu_form">
                                                    <label for="con_add_term">Add to Fee Exclusion Matrix </label>
                                                    <textarea name="con_add_fee_term" style="height: 150px;"></textarea>
                                                </div>

                                            </div>

                                            <input type="hidden" name="contractid" id="contractid">
                                            <input type="hidden" name="contractcustid" id="contractcustid">


                                            <div class="root_btn btn_draft">
                                                <button class="btn" id="addcontarctt" type="submit">Add to Exisitng Contract</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Addend sidebar end -->


                                <script>
                                    $(document).ready(function() {
                                        // Handle "Select All" checkbox click
                                        $('.select_all').on('click', function() {
                                            $('.select_individual').prop('checked', this.checked);
                                        });

                                        // Handle individual checkbox click
                                        $('.select_individual').on('change', function() {
                                            var allChecked = $('.select_individual').length === $('.select_individual:checked').length;
                                            $('.select_all').prop('checked', allChecked);
                                        });

                                        // Trigger download based on selected checkboxes
                                        $('#downloadBtn').on('click', function() {
                                            var selectedIds = [];
                                            $('.select_individual:checked').each(function() {
                                                selectedIds.push($(this).val());
                                            });

                                            // If "Select All" is checked, download all contracts
                                            if ($('.select_all').prop('checked')) {
                                                selectedIds = $('.select_individual').map(function() {
                                                    return $(this).val();
                                                }).get();
                                            }

                                            if (selectedIds.length > 0) {
                                                // Trigger AJAX request to download data
                                                $.ajax({
                                                    url: '/download-contracts', // Endpoint to download contracts
                                                    method: 'POST',
                                                    data: {
                                                        ids: selectedIds,
                                                        _token: '{{ csrf_token() }}',
                                                    },
                                                    success: function(response) {
                                                        // Handle the file download
                                                        if (response.success) {
                                                            window.location.href = response.download_url;
                                                        } else {
                                                            alert('Error downloading files');
                                                        }
                                                    }
                                                });
                                            } else {
                                                alert('Please select at least one contract to download.');
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid start-->



        <!--Eployees master details start-->

        <div class="modal fade add_directorrs employees_master_details" id="contract_master_details" tabindex="-1" role="dialog" aria-labelledby="contract_master_details" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Contracts Master Details</h5>
                    </div>

                    <div class="modal-footer">
                        <div class="main_one_go">
                            <div class="one_go_top">
                                <h2>Upload All your contracts Data in One Go!</h2>

                            </div>
                            <div class="three_upload_bttn">
                                <button class="emmp_go_download_tem downloadcontracttemp" type="button">
                                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 14V16C1 16.5304 1.21071 17.0391 1.58579 17.4142C1.96086 17.7893 2.46957 18 3 18H15C15.5304 18 16.0391 17.7893 16.4142 17.4142C16.7893 17.0391 17 16.5304 17 16V14M4 8L9 13M9 13L14 8M9 13V1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <span>
                                        <b>STEP 1</b>
                                        Download Contract Template
                                    </span>
                                </button>
                                <span><svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L7 7L1 13" stroke="#AEAEAE" stroke-width="2" />
                                    </svg></span>
                                <div class="go_step_2">
                                    <b>STEP 2</b>
                                    <span>Fill in Contract Data according to the given format</span>
                                </div>
                                <span><svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L7 7L1 13" stroke="#AEAEAE" stroke-width="2" />
                                    </svg></span>


                                <button class="emmp_go_upload_tem" type="button" id="upload_contact_managge">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19 13V17C19 17.5304 18.7893 18.0391 18.4142 18.4142C18.0391 18.7893 17.5304 19 17 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V13M15 6L10 1M10 1L5 6M10 1V13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <span>
                                        <b>STEP 3</b>
                                        Upload Contract Template
                                    </span>

                                </button>
                            </div>
                            </div>
                            <div class="append_bootm_contarct">
                                <form action="{{ route('contracts.import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="append_bootm_contarct_wrap">

                                    <div class="rept_cont_nt">
                                        <label for="excel_filee">Upload Excel File:</label>                                      
                                        <div class="file-area_cover">
                                      <div class="file-area">
                                                <input type="file" class="drag_file" id="excel_file" name="excel_file" required>
                                                <div class="file-dummy">
                                                    <div class="default">
                                                        <span class="upload_icon">
                                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.9974 0.041504C9.08764 0.0414466 9.17682 0.0609324 9.25882 0.0986218C9.34082 0.136311 9.41368 0.19131 9.47239 0.259837L11.9724 3.1765C12.0802 3.30248 12.1336 3.46615 12.1208 3.63149C12.108 3.79683 12.03 3.95032 11.9041 4.05817C11.7781 4.16603 11.6144 4.21942 11.4491 4.2066C11.2837 4.19379 11.1303 4.11581 11.0224 3.98984L9.6224 2.3565V11.4998C9.6224 11.6656 9.55655 11.8246 9.43934 11.9418C9.32213 12.059 9.16316 12.1248 8.9974 12.1248C8.83164 12.1248 8.67266 12.059 8.55545 11.9418C8.43824 11.8246 8.3724 11.6656 8.3724 11.4998V2.35567L6.9724 3.98984C6.91899 4.05222 6.85382 4.10346 6.78061 4.14066C6.7074 4.17785 6.62758 4.20026 6.54571 4.2066C6.46384 4.21295 6.38153 4.20311 6.30346 4.17764C6.22539 4.15217 6.15311 4.11157 6.09073 4.05817C6.02835 4.00477 5.9771 3.9396 5.93991 3.86639C5.90272 3.79318 5.88031 3.71336 5.87396 3.63149C5.86762 3.54962 5.87746 3.4673 5.90293 3.38923C5.9284 3.31117 5.96899 3.23888 6.0224 3.1765L8.5224 0.259837C8.58111 0.19131 8.65398 0.136311 8.73597 0.0986218C8.81797 0.0609324 8.90715 0.0414466 8.9974 0.041504ZM4.8274 5.8765C4.99316 5.87562 5.15248 5.94062 5.27031 6.05721C5.38815 6.17379 5.45484 6.33241 5.45573 6.49817C5.45661 6.66393 5.39161 6.82325 5.27503 6.94109C5.15844 7.05892 4.99982 7.12562 4.83406 7.1265C3.92323 7.1315 3.2774 7.15484 2.78656 7.24484C2.3149 7.33234 2.04073 7.4715 1.83823 7.674C1.6074 7.90484 1.4574 8.229 1.3749 8.84067C1.29073 9.46984 1.28906 10.304 1.28906 11.4998V12.3332C1.28906 13.5298 1.29073 14.364 1.3749 14.9932C1.4574 15.6048 1.60823 15.9282 1.83823 16.1598C2.06906 16.3898 2.3924 16.5398 3.0049 16.6223C3.63323 16.7073 4.46823 16.7082 5.66406 16.7082H12.3307C13.5266 16.7082 14.3607 16.7073 14.9907 16.6223C15.6024 16.5398 15.9257 16.3898 16.1566 16.159C16.3874 15.9282 16.5374 15.6048 16.6199 14.9932C16.7041 14.364 16.7057 13.5298 16.7057 12.3332V11.4998C16.7057 10.304 16.7041 9.46984 16.6199 8.83984C16.5374 8.229 16.3866 7.90484 16.1566 7.674C15.9532 7.4715 15.6799 7.33234 15.2082 7.24484C14.7174 7.15484 14.0716 7.1315 13.1607 7.1265C13.0787 7.12607 12.9975 7.10947 12.9218 7.07765C12.8461 7.04584 12.7775 6.99943 12.7198 6.94109C12.662 6.88274 12.6164 6.8136 12.5854 6.7376C12.5544 6.66161 12.5386 6.58025 12.5391 6.49817C12.5395 6.41609 12.5561 6.33491 12.5879 6.25925C12.6197 6.18359 12.6661 6.11493 12.7245 6.05721C12.7828 5.99948 12.852 5.95381 12.928 5.9228C13.004 5.8918 13.0853 5.87607 13.1674 5.8765C14.0691 5.8815 14.8199 5.90317 15.4341 6.01567C16.0657 6.13234 16.6032 6.35317 17.0407 6.79067C17.5424 7.2915 17.7574 7.924 17.8591 8.674C17.9557 9.39567 17.9557 10.3148 17.9557 11.454V12.379C17.9557 13.519 17.9557 14.4373 17.8591 15.1598C17.7574 15.9098 17.5424 16.5415 17.0407 17.0432C16.5391 17.5448 15.9074 17.7598 15.1574 17.8615C14.4349 17.9582 13.5157 17.9582 12.3766 17.9582H5.61823C4.47906 17.9582 3.5599 17.9582 2.8374 17.8615C2.0874 17.7607 1.45573 17.5448 0.954063 17.0432C0.452396 16.5415 0.237396 15.9098 0.136562 15.1598C0.0390625 14.4373 0.0390625 13.5182 0.0390625 12.379V11.454C0.0390625 10.3148 0.0390625 9.39567 0.136562 8.67317C0.236562 7.92317 0.453229 7.2915 0.954063 6.78984C1.39156 6.35317 1.92906 6.1315 2.56073 6.01567C3.1749 5.90317 3.92573 5.8815 4.8274 5.8765Z" fill="#ABABAB"></path>
                                                            </svg>
                                                            Upload a file
                                                        </span>
                                                        <span class="fille">Choose File</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="file-list"></div>
                                            </div>
                                            </div>
                                            


                                    <div class="rept_cont_nt">
                                        <label for="contractss">Upload Contract Files:</label>
                                      
                                        <div class="file-area_cover">
                                        <div class="file-area">
                                                <input type="file" class="file_drag" id="contracts" name="contracts[]" multiple>
                                                <div class="file-dummy">
                                                    <div class="default">
                                                        <span class="upload_icon">
                                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.9974 0.041504C9.08764 0.0414466 9.17682 0.0609324 9.25882 0.0986218C9.34082 0.136311 9.41368 0.19131 9.47239 0.259837L11.9724 3.1765C12.0802 3.30248 12.1336 3.46615 12.1208 3.63149C12.108 3.79683 12.03 3.95032 11.9041 4.05817C11.7781 4.16603 11.6144 4.21942 11.4491 4.2066C11.2837 4.19379 11.1303 4.11581 11.0224 3.98984L9.6224 2.3565V11.4998C9.6224 11.6656 9.55655 11.8246 9.43934 11.9418C9.32213 12.059 9.16316 12.1248 8.9974 12.1248C8.83164 12.1248 8.67266 12.059 8.55545 11.9418C8.43824 11.8246 8.3724 11.6656 8.3724 11.4998V2.35567L6.9724 3.98984C6.91899 4.05222 6.85382 4.10346 6.78061 4.14066C6.7074 4.17785 6.62758 4.20026 6.54571 4.2066C6.46384 4.21295 6.38153 4.20311 6.30346 4.17764C6.22539 4.15217 6.15311 4.11157 6.09073 4.05817C6.02835 4.00477 5.9771 3.9396 5.93991 3.86639C5.90272 3.79318 5.88031 3.71336 5.87396 3.63149C5.86762 3.54962 5.87746 3.4673 5.90293 3.38923C5.9284 3.31117 5.96899 3.23888 6.0224 3.1765L8.5224 0.259837C8.58111 0.19131 8.65398 0.136311 8.73597 0.0986218C8.81797 0.0609324 8.90715 0.0414466 8.9974 0.041504ZM4.8274 5.8765C4.99316 5.87562 5.15248 5.94062 5.27031 6.05721C5.38815 6.17379 5.45484 6.33241 5.45573 6.49817C5.45661 6.66393 5.39161 6.82325 5.27503 6.94109C5.15844 7.05892 4.99982 7.12562 4.83406 7.1265C3.92323 7.1315 3.2774 7.15484 2.78656 7.24484C2.3149 7.33234 2.04073 7.4715 1.83823 7.674C1.6074 7.90484 1.4574 8.229 1.3749 8.84067C1.29073 9.46984 1.28906 10.304 1.28906 11.4998V12.3332C1.28906 13.5298 1.29073 14.364 1.3749 14.9932C1.4574 15.6048 1.60823 15.9282 1.83823 16.1598C2.06906 16.3898 2.3924 16.5398 3.0049 16.6223C3.63323 16.7073 4.46823 16.7082 5.66406 16.7082H12.3307C13.5266 16.7082 14.3607 16.7073 14.9907 16.6223C15.6024 16.5398 15.9257 16.3898 16.1566 16.159C16.3874 15.9282 16.5374 15.6048 16.6199 14.9932C16.7041 14.364 16.7057 13.5298 16.7057 12.3332V11.4998C16.7057 10.304 16.7041 9.46984 16.6199 8.83984C16.5374 8.229 16.3866 7.90484 16.1566 7.674C15.9532 7.4715 15.6799 7.33234 15.2082 7.24484C14.7174 7.15484 14.0716 7.1315 13.1607 7.1265C13.0787 7.12607 12.9975 7.10947 12.9218 7.07765C12.8461 7.04584 12.7775 6.99943 12.7198 6.94109C12.662 6.88274 12.6164 6.8136 12.5854 6.7376C12.5544 6.66161 12.5386 6.58025 12.5391 6.49817C12.5395 6.41609 12.5561 6.33491 12.5879 6.25925C12.6197 6.18359 12.6661 6.11493 12.7245 6.05721C12.7828 5.99948 12.852 5.95381 12.928 5.9228C13.004 5.8918 13.0853 5.87607 13.1674 5.8765C14.0691 5.8815 14.8199 5.90317 15.4341 6.01567C16.0657 6.13234 16.6032 6.35317 17.0407 6.79067C17.5424 7.2915 17.7574 7.924 17.8591 8.674C17.9557 9.39567 17.9557 10.3148 17.9557 11.454V12.379C17.9557 13.519 17.9557 14.4373 17.8591 15.1598C17.7574 15.9098 17.5424 16.5415 17.0407 17.0432C16.5391 17.5448 15.9074 17.7598 15.1574 17.8615C14.4349 17.9582 13.5157 17.9582 12.3766 17.9582H5.61823C4.47906 17.9582 3.5599 17.9582 2.8374 17.8615C2.0874 17.7607 1.45573 17.5448 0.954063 17.0432C0.452396 16.5415 0.237396 15.9098 0.136562 15.1598C0.0390625 14.4373 0.0390625 13.5182 0.0390625 12.379V11.454C0.0390625 10.3148 0.0390625 9.39567 0.136562 8.67317C0.236562 7.92317 0.453229 7.2915 0.954063 6.78984C1.39156 6.35317 1.92906 6.1315 2.56073 6.01567C3.1749 5.90317 3.92573 5.8815 4.8274 5.8765Z" fill="#ABABAB"></path>
                                                            </svg>
                                                            Upload a file
                                                        </span>
                                                        <span class="fille">Choose File</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="file-list"></div>
                                            </div>


                                    </div>
                                    </div>

                                    <div class="rept_cont_bbtn">
                                        <button type="submit">Upload</button>
                                    </div>
                                   
                                </form>
                            </div>

                    </div>
                </div>
            </div>
        </div>

        <!--Eployees master details end-->

        @if(session('success'))
        <p>{{ session('success') }}</p>
        @endif
        <script>
            $(document).ready(function() {
                $('.downloadcontracttemp').on('click', function() {
                    // Define the path to the CSV file
                    var filePath = '/assets/images/contracttemp.xlsx'; // Adjust this path if needed

                    // Create a temporary anchor element to initiate download
                    var a = document.createElement('a');
                    a.href = filePath;
                    a.download = 'contracttemp.xlsx'; // Name of the downloaded file
                    document.body.appendChild(a);
                    a.click(); // Simulate click
                    document.body.removeChild(a); // Clean up
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                // When the button is clicked, open the modal
                $('.emmp_go_upload_tem').on('click', function() {
                    $('#uploadModal').modal('show'); // Open the modal
                });
            });
        </script>
    </div>
</div>
</div>
<style>
    .contract_uploadd .person_status span.draft:before {
        background: #edc80a;
    }

    .drop_coman_file.have_title .modal-content .root_btn button {
        background: #5790ff !important;
        color: #fff;
        border-radius: 10px !important;
        padding: 10px 30px;
        margin: auto;
    }

    .bolddata {

        font-weight: 900;
        text-transform: capitalize;
        margin: 5px;
    }

    [contenteditable="true"] {
        border: 1px dashed #ccc;
        padding: 5px;
        outline: none;
        background-color: #f9f9f9;
    }
</style>

<script>
    $(document).ready(function() {
        // Initially hide all option divs except the defaultoption
        $('.gropu_form_set').not('.defaultoption').hide();

        // On change event for the dropdown
        $('#expiring_opm').on('change', function() {
            // Get the selected option value
            const selectedValue = $(this).val();

            // Hide all non-default option divs
            $('.gropu_form_set').not('.defaultoption').hide();

            // Show the corresponding div based on the selected value
            if (selectedValue === "Upcoming Expiry Alert") {
                $('.option1').show();
            } else if (selectedValue === "Upcoming Renewal Alert") {
                $('.option2').show();
            } else if (selectedValue === "Missing Documentation") {
                $('.option3').show();
            } else if (selectedValue === "Payment Due Alert") {
                $('.option4').show();
            } else {
                // Show option0 for unselected or disabled state
                $('.option0').show();
            }
        });

        // Trigger change event on page load to show option0 by default
        $('#expiring_opm').trigger('change');
    });
</script>

<script>
    $(document).on('click', '.notify', function() {
        // Get the file name from the data attribute
        const fileName = $(this).data('file-name');
        const contractid = $(this).data('id');
        const enddate = $(this).data('startend');
        const custname = $(this).data('cname');
        const venname = $(this).data('vname');
        const fileNames = $(this).data('file-name');


        if (enddate) {
            const [year, month, day] = enddate.split('-'); // Split the date
            const formattedDate = `${day}-${month}-${year}`; // Reformat to dd-mm-yyyy
            $('#enddate').text(formattedDate); // Set the formatted date
        }


        $('#filename').text(fileName);
        $('#filenames').text(fileNames);

        $('#contractid').text(contractid);
        $('#custname').text(custname);
        $('#venname').text(venname);

    });
</script>
<script>
    $(document).ready(function() {
        // On click, make the div editable
        $('.editable').on('click', function() {
            const $this = $(this);

            // If it's already editable, return
            if ($this.attr('contenteditable') === 'true') return;

            // Make the div editable
            $this.attr('contenteditable', 'true').focus();
        });

        // Save changes when the user clicks outside or presses Enter
        $('.editable').on('blur keydown', function(e) {
            const $this = $(this);

            // If Enter key is pressed or blur occurs
            if (e.type === 'blur' || (e.type === 'keydown' && e.key === 'Enter')) {
                // Remove the editable attribute
                $this.removeAttr('contenteditable');

                // Log the updated content
                console.log('Updated content:', $this.html());
            }
        });

        // Update the message field dynamically on #expiring_opm change
        $('#expiring_opm').on('change', function() {
            const selectedOption = $(this).val();
            let selectedMessage = '';

            // Select the corresponding message based on the selected option
            switch (selectedOption) {
                case 'Upcoming Expiry Alert':
                    selectedMessage = $('#message1').html();
                    break;
                case 'Upcoming Renewal Alert':
                    selectedMessage = $('#message2').html();
                    break;
                case 'Missing Documentation':
                    selectedMessage = $('#message3').html();
                    break;
                case 'Payment Due Alert':
                    selectedMessage = $('#message4').html();
                    break;
                case 'Other':
                    selectedMessage = $('#message5').html();
                    break;
            }

            // Clean the message to remove <span> tags and ensure no unwanted markup
            selectedMessage = selectedMessage.replace(/<span[^>]*>([^<]*)<\/span>/g, '$1');

            // Set the cleaned message in the hidden field
            $('#selectedMessage').val(selectedMessage);
            const filename = $('#filename').text();
            $('#contractFilename').val(filename);
            // Log the updated message for debugging
            console.log('Selected Message:', selectedMessage);
        });

        // Update form data dynamically before submission
        $('form').on('submit', function() {
            const selectedOption = $('#expiring_opm').val();
            let selectedMessage = '';

            // Dynamically fetch the current editable content
            switch (selectedOption) {
                case 'Upcoming Expiry Alert':
                    selectedMessage = $('#message1').html();
                    break;
                case 'Upcoming Renewal Alert':
                    selectedMessage = $('#message2').html();
                    break;
                case 'Missing Documentation':
                    selectedMessage = $('#message3').html();
                    break;
                case 'Payment Due Alert':
                    selectedMessage = $('#message4').html();
                    break;
                case 'Other':
                    selectedMessage = $('#message5').html();
                    break;
            }

            // Clean the message to remove <span> tags
            selectedMessage = selectedMessage.replace(/<span[^>]*>([^<]*)<\/span>/g, '$1');

            // Update the hidden field with the latest message
            $('#selectedMessage').val(selectedMessage);
            const filename = $('#filename').text();
            $('#contractFilename').val(filename);
            // Log the form submission data
            console.log('Form Submitted with Message:', selectedMessage);
        });
    });
</script>

<style>
    .option0 {
        display: none !important;
    }

    .option {
        display: block !important;
    }
</style>

<script>
    $('#expiring_opm').on('change', function() {
        const selectedValue = $(this).val().trim();
        console.log("Selected Value:", selectedValue);

        // Reset: Hide all visible `gropu_form_set` except `defaultoption`, and remove the `option` class
        $('.gropu_form_set:visible').not('.defaultoption').hide().removeClass('option');

        // Show the selected option only
        if (selectedValue === "Other") {
            $('.option5').show().addClass('option');
        } else if (selectedValue === "Upcoming Expiry Alert") {
            $('.option1').show().addClass('option');
        } else if (selectedValue === "Upcoming Renewal Alert") {
            $('.option2').show().addClass('option');
        } else if (selectedValue === "Missing Documentation") {
            $('.option3').show().addClass('option');
        } else if (selectedValue === "Payment Due Alert") {
            $('.option4').show().addClass('option');
        } else {
            $('.option0').show().addClass('option'); // Default case
        }
    });
</script>









<script>
    $(document).on('click', '.notify', function() {
        // Get the file name from the data attribute
        const fileName = $(this).data('file-name');
        const contractid = $(this).data('id');
        const enddate = $(this).data('startend');
        const custname = $(this).data('cname');
        const venname = $(this).data('vname');
        const fileNames = $(this).data('file-name');
        const venname1 = $(this).data('vname');

        const fileName1 = $(this).data('file-name');
        const custname1 = $(this).data('cname');


        const venname2 = $(this).data('vname');

        const fileName2 = $(this).data('file-name');
        const custname2 = $(this).data('cname');
        const amount = $(this).data('amount');

        const startendDate = $(this).data('startend'); // Assuming this is in 'YYYY-MM-DD' format

        // Parse it into a Date object
        const date = new Date(startendDate);

        // Add one day to the date
        date.setDate(date.getDate() + 1);

        // Format the updated date back to 'YYYY-MM-DD'
        const renewDate = date.toISOString().split('T')[0];

        if (renewDate) {
            const [year, month, day] = renewDate.split('-'); // Split the date
            const formattedDates = `${day}-${month}-${year}`; // Reformat to dd-mm-yyyy
            $('#renewDate').text(formattedDates); // Set the formatted date
        }


        if (enddate) {
            const [year, month, day] = enddate.split('-'); // Split the date
            const formattedDate = `${day}-${month}-${year}`; // Reformat to dd-mm-yyyy
            $('#enddate').text(formattedDate); // Set the formatted date
        }


        const startendDate1 = $(this).data('startend'); // Assuming this is in 'YYYY-MM-DD' format

        // Parse it into a Date object
        const date1 = new Date(startendDate1);

        // Add one day to the date
        date1.setDate(date1.getDate() + 1);

        // Format the updated date back to 'YYYY-MM-DD'
        const renewDate1 = date1.toISOString().split('T')[0];

        if (renewDate1) {
            const [year, month, day] = renewDate1.split('-'); // Split the date
            const formattedDates1 = `${day}-${month}-${year}`; // Reformat to dd-mm-yyyy
            $('#renewDate1').text(formattedDates1); // Set the formatted date
        }


        $('#filename').text(fileName);
        $('#filenames').text(fileNames);

        $('#contractid').text(contractid);
        $('#custname').text(custname);
        $('#venname').text(venname);

        $('#fileName1').text(fileName1);
        $('#custname1').text(custname1);
        $('#venname1').text(venname1);


        $('#fileName2').text(fileName2);
        $('#custname2').text(custname2);
        $('#venname2').text(venname2);


        $('#amount').text(amount);



    });
</script>
<script>
    // Ensure this is inside the $(document).ready() or $(window).on('load')
    $(document).on('click', '[id^="Addend"]', function() {
        // Get the specific contract ID dynamically
        var contractId = $(this).attr('id').replace('Addend', ''); // Extract contract ID from the element ID

        // You can use this contractId to fetch data if needed, or just toggle the modal visibility
        $('.addendcustomer_fix').addClass('active');
        $('.addend_overlay_fix').addClass('active');
    });

    // Close the modal when clicking on the overlay
    $('.addend_overlay_fix').on('click', function() {
        $('.addendcustomer_fix').removeClass('active');
        $('.addend_overlay_fix').removeClass('active');
    });
</script>

<script>
    $(document).on('click', '.Addend', function() {
        // Get the file name from the data attribute
        const AddendfileName = $(this).data('file-name');
        const contractid = $(this).data('id');
        const contractrenewal = $(this).data('renewal');
        const contractfee = $(this).data('fee');
        const contractpayment = $(this).data('payment');
        const contractcustid = $(this).data('custid');

        $('#AddendfileNamefilename').text(AddendfileName);
        $('#contractrenewal').text(contractrenewal);
        $('#contractfee').text(contractfee);
        $('#contractpayment').text(contractpayment);
        $('#contractid').val(contractid);
        $('#contractcustid').val(contractcustid);





    });
</script>
<script>
    $(document).ready(function() {
        // Listen for changes in the "Addendum_type" select field
        $('#Addendum_type').on('change', function() {
            var selectedAddendum = $(this).val();

            // Hide all groups initially
            $('.group_payment_terms').hide();
            $('.group_renewal_terms').hide();
            $('.group_fee_exclusion').hide();

            // Show the corresponding group based on selected addendum type
            if (selectedAddendum === 'Payment Terms Addendum') {
                $('.group_payment_terms').show();
            } else if (selectedAddendum === 'Renewal Terms Addendum') {
                $('.group_renewal_terms').show();
            } else if (selectedAddendum === 'Fee Exclusion Matrix Addendum') {
                $('.group_fee_exclusion').show();
            }
        });
    });
</script>
@endsection