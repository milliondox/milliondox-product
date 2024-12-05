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
                        <div class="col-sm-4">
                            <div class="contract_deatols">

                                <div class="contract_detail_top">
                                    <div class="con_image_wrap">
                                        <div class="inner_tp_img">
                                            <div class="mini_iage_wrap">
                                                <img src="../assets/images/jay_malhotra.png" alt="img">
                                            </div>
                                            <div class="text_cos_tp">
                                                <span>Legal Entity Name</span>
                                                <h2>Orange XT LLP</h2>
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
                                                    <img src="../assets/images/jay_malhotra.png" alt="img">
                                                </div>
                                                <h2>Anurag Srivastava</h2>
                                                <div class="tool_tip">
                                                    <div class="tip_icon">
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5.41406 8.91797H6.58073V5.41797H5.41406V8.91797ZM5.9974 4.2513C6.16267 4.2513 6.30131 4.1953 6.41331 4.0833C6.52531 3.9713 6.58112 3.83286 6.58073 3.66797C6.58034 3.50308 6.52434 3.36464 6.41273 3.25264C6.30112 3.14064 6.16267 3.08464 5.9974 3.08464C5.83212 3.08464 5.69367 3.14064 5.58206 3.25264C5.47045 3.36464 5.41445 3.50308 5.41406 3.66797C5.41367 3.83286 5.46967 3.9715 5.58206 4.08389C5.69445 4.19627 5.8329 4.25208 5.9974 4.2513ZM5.9974 11.8346C5.19045 11.8346 4.43212 11.6814 3.7224 11.375C3.01267 11.0685 2.39531 10.653 1.87031 10.1284C1.34531 9.60377 0.929785 8.98641 0.62373 8.2763C0.317674 7.56619 0.164452 6.80786 0.164063 6.0013C0.163674 5.19475 0.316897 4.43641 0.62373 3.7263C0.930563 3.01619 1.34609 2.39883 1.87031 1.87422C2.39454 1.34961 3.0119 0.93408 3.7224 0.627635C4.4329 0.321191 5.19123 0.167969 5.9974 0.167969C6.80356 0.167969 7.5619 0.321191 8.2724 0.627635C8.9829 0.93408 9.60026 1.34961 10.1245 1.87422C10.6487 2.39883 11.0644 3.01619 11.3716 3.7263C11.6789 4.43641 11.8319 5.19475 11.8307 6.0013C11.8296 6.80786 11.6763 7.56619 11.3711 8.2763C11.0658 8.98641 10.6503 9.60377 10.1245 10.1284C9.5987 10.653 8.98134 11.0687 8.2724 11.3756C7.56345 11.6824 6.80512 11.8354 5.9974 11.8346ZM5.9974 10.668C7.30017 10.668 8.40365 10.2159 9.30781 9.31172C10.212 8.40755 10.6641 7.30408 10.6641 6.0013C10.6641 4.69852 10.212 3.59505 9.30781 2.69089C8.40365 1.78672 7.30017 1.33464 5.9974 1.33464C4.69462 1.33464 3.59115 1.78672 2.68698 2.69089C1.78281 3.59505 1.33073 4.69852 1.33073 6.0013C1.33073 7.30408 1.78281 8.40755 2.68698 9.31172C3.59115 10.2159 4.69462 10.668 5.9974 10.668Z" fill="#535862" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="auth_image">
                                                    <img src="../assets/images/jay_malhotra.png" alt="img">
                                                </div>
                                                <h2>Devanshu Kumar</h2>
                                                <div class="tool_tip">
                                                    <div class="tip_icon">
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5.41406 8.91797H6.58073V5.41797H5.41406V8.91797ZM5.9974 4.2513C6.16267 4.2513 6.30131 4.1953 6.41331 4.0833C6.52531 3.9713 6.58112 3.83286 6.58073 3.66797C6.58034 3.50308 6.52434 3.36464 6.41273 3.25264C6.30112 3.14064 6.16267 3.08464 5.9974 3.08464C5.83212 3.08464 5.69367 3.14064 5.58206 3.25264C5.47045 3.36464 5.41445 3.50308 5.41406 3.66797C5.41367 3.83286 5.46967 3.9715 5.58206 4.08389C5.69445 4.19627 5.8329 4.25208 5.9974 4.2513ZM5.9974 11.8346C5.19045 11.8346 4.43212 11.6814 3.7224 11.375C3.01267 11.0685 2.39531 10.653 1.87031 10.1284C1.34531 9.60377 0.929785 8.98641 0.62373 8.2763C0.317674 7.56619 0.164452 6.80786 0.164063 6.0013C0.163674 5.19475 0.316897 4.43641 0.62373 3.7263C0.930563 3.01619 1.34609 2.39883 1.87031 1.87422C2.39454 1.34961 3.0119 0.93408 3.7224 0.627635C4.4329 0.321191 5.19123 0.167969 5.9974 0.167969C6.80356 0.167969 7.5619 0.321191 8.2724 0.627635C8.9829 0.93408 9.60026 1.34961 10.1245 1.87422C10.6487 2.39883 11.0644 3.01619 11.3716 3.7263C11.6789 4.43641 11.8319 5.19475 11.8307 6.0013C11.8296 6.80786 11.6763 7.56619 11.3711 8.2763C11.0658 8.98641 10.6503 9.60377 10.1245 10.1284C9.5987 10.653 8.98134 11.0687 8.2724 11.3756C7.56345 11.6824 6.80512 11.8354 5.9974 11.8346ZM5.9974 10.668C7.30017 10.668 8.40365 10.2159 9.30781 9.31172C10.212 8.40755 10.6641 7.30408 10.6641 6.0013C10.6641 4.69852 10.212 3.59505 9.30781 2.69089C8.40365 1.78672 7.30017 1.33464 5.9974 1.33464C4.69462 1.33464 3.59115 1.78672 2.68698 2.69089C1.78281 3.59505 1.33073 4.69852 1.33073 6.0013C1.33073 7.30408 1.78281 8.40755 2.68698 9.31172C3.59115 10.2159 4.69462 10.668 5.9974 10.668Z" fill="#535862" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="customer_status cmn_authh">
                                        <h2>Customer Status</h2>
                                        <span class="active">Active</span>
                                    </div>
                                    <div class="divisions_associated cmn_authh">
                                        <h2>Divisions Associated</h2>
                                        <div class="divi_ass_wrap">
                                            <span>Accounts</span>
                                            <span>HR</span>
                                            <span>Marketing</span>
                                            <span>Tech</span>
                                            <span>Legal</span>
                                            <span>Accounts</span>
                                            <span>HR</span>
                                            <span>Marketing</span>
                                            <span>Tech</span>
                                            <span>Legal</span>
                                            <span>Accounts</span>
                                            <span>HR</span>
                                            <span>Marketing</span>
                                            <span>Tech</span>
                                            <span>Legal</span>
                                            <span>Accounts</span>
                                            <span>HR</span>
                                            <span>Marketing</span>
                                            <span>Tech</span>
                                            <span>Legal</span>
                                        </div>
                                    </div>

                                </div>

                                <div class="contract_detail_bottom">
                                    <div class="registration_documents">
                                        <h2>Registration Documents</h2>
                                        <div class="registration_documents_wrap">
                                            <span>LLPIN <svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 7C6.10457 7 7 6.10457 7 5C7 3.89543 6.10457 3 5 3C3.89543 3 3 3.89543 3 5C3 6.10457 3.89543 7 5 7Z" fill="#414651" />
                                                    <path d="M9.5 5C9.5 5 9 1 5 1C1 1 0.5 5 0.5 5" stroke="#414651" />
                                                </svg>
                                            </span>
                                            <span>PAN <svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 7C6.10457 7 7 6.10457 7 5C7 3.89543 6.10457 3 5 3C3.89543 3 3 3.89543 3 5C3 6.10457 3.89543 7 5 7Z" fill="#414651" />
                                                    <path d="M9.5 5C9.5 5 9 1 5 1C1 1 0.5 5 0.5 5" stroke="#414651" />
                                                </svg>
                                            </span>
                                            <span>GSTIN <svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 7C6.10457 7 7 6.10457 7 5C7 3.89543 6.10457 3 5 3C3.89543 3 3 3.89543 3 5C3 6.10457 3.89543 7 5 7Z" fill="#414651" />
                                                    <path d="M9.5 5C9.5 5 9 1 5 1C1 1 0.5 5 0.5 5" stroke="#414651" />
                                                </svg>
                                            </span>
                                            <span>Doc <svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 7C6.10457 7 7 6.10457 7 5C7 3.89543 6.10457 3 5 3C3.89543 3 3 3.89543 3 5C3 6.10457 3.89543 7 5 7Z" fill="#414651" />
                                                    <path d="M9.5 5C9.5 5 9 1 5 1C1 1 0.5 5 0.5 5" stroke="#414651" />
                                                </svg>
                                            </span>
                                            <span>Doc 5 <svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 7C6.10457 7 7 6.10457 7 5C7 3.89543 6.10457 3 5 3C3.89543 3 3 3.89543 3 5C3 6.10457 3.89543 7 5 7Z" fill="#414651" />
                                                    <path d="M9.5 5C9.5 5 9 1 5 1C1 1 0.5 5 0.5 5" stroke="#414651" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="type_entity enty_cmnn">
                                        <span>Type of Entity</span>
                                        <h2>Limited Liability Partnership</h2>
                                    </div>

                                    <div class="registered_ffice enty_cmnn">
                                        <span>Registered Office</span>
                                        <p>343, Blob Co-Working, Lake Town, Kolkata, West Bengal, India 700028</p>
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

                        <div class="col-sm-8">
                            <div class="contract_uploadd">
                                <h2>Contracts uploaded</h2>
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