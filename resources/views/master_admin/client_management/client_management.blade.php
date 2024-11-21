@extends('master_admin.includes.client_management') @section('content')
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
                    <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i>
                    </div>
                    <div class="logo-header-main"><a href="#">Milliondox</a></div>
                </div>
                <div class="left-header col horizontal-wrapper ps-0">
                    <div class="left-menu-header">
                        <h2>Client Management</h2>
                    </div>

                </div>
                <div class="nav-right col-1 pull-right right-header p-0 adminn_pannel">

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
            @include('master_admin/includes.masterclient_sidebar')
            <!-- Page Sidebar Ends-->
            <div class="page-body">
                <!-- greeting -->
                <div class="mlb-menu-header container-fluid" style="display:none;">
                    <h2>
                        <span id="greting" class=""></span>
                        Welcome to MillionDox!
                    </h2>
                </div>

                <!-- first load animation dashboard pop start -->
                <div id="loading-overlay">
                    <div class="loader-wrapper">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"> </div>
                        <div class="dot"></div>
                    </div>
                    <!-- Loader ends-->
                </div>


                <!-- Container-fluid start-->
                <div class="container-fluid  nt_client_management">
                    <div class="client_management_back">
                        <div class="row">
                            <div class="table_warapp">
                                <div class="table_head_wrapp">
                                    <div class="wrapp_left">
                                        <span><svg width="16" height="12" viewBox="0 0 16 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.66927 7.33366H1.33594M5.33594 4.66699H1.33594M4.0026 2.00033H1.33594M8.0026 10.0003H1.33594M12.6693 11.3337V0.666992M12.6693 11.3337L14.6693 9.33366M12.6693 11.3337L10.6693 9.33366M12.6693 0.666992L14.6693 2.66699M12.6693 0.666992L10.6693 2.66699"
                                                    stroke="#9C9C9C" stroke-width="1.33" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            <select name="acc-des">
                                                <option value="" disabled selected>Select Order</option>
                                                <option value="assen">Name (a-z)</option>
                                                <option value="des">Name (z-a)</option>
                                            </select>
                                        </span>
                                    </div>
                                    <div class="right_wrapp">
                                        <div class="search_nt">
                                            <div class="svg_srch">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.75 14.75L10.25 10.25M1.25 6.5C1.25 7.18944 1.3858 7.87213 1.64963 8.50909C1.91347 9.14605 2.30018 9.7248 2.78769 10.2123C3.2752 10.6998 3.85395 11.0865 4.49091 11.3504C5.12787 11.6142 5.81056 11.75 6.5 11.75C7.18944 11.75 7.87213 11.6142 8.50909 11.3504C9.14605 11.0865 9.7248 10.6998 10.2123 10.2123C10.6998 9.7248 11.0865 9.14605 11.3504 8.50909C11.6142 7.87213 11.75 7.18944 11.75 6.5C11.75 5.81056 11.6142 5.12787 11.3504 4.49091C11.0865 3.85395 10.6998 3.2752 10.2123 2.78769C9.7248 2.30018 9.14605 1.91347 8.50909 1.64963C7.87213 1.3858 7.18944 1.25 6.5 1.25C5.81056 1.25 5.12787 1.3858 4.49091 1.64963C3.85395 1.91347 3.2752 2.30018 2.78769 2.78769C2.30018 3.2752 1.91347 3.85395 1.64963 4.49091C1.3858 5.12787 1.25 5.81056 1.25 6.5Z"
                                                        stroke="#D9DFEC" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <input type="search" class="" aria-controls="basic-1">
                                        </div>

                                        <div class="add_client">
                                            <button type="button"><svg width="16" height="16" viewBox="0 0 16 16"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.16667 14.6667C7.16667 14.8877 7.25446 15.0996 7.41074 15.2559C7.56702 15.4122 7.77899 15.5 8 15.5C8.22101 15.5 8.43297 15.4122 8.58926 15.2559C8.74554 15.0996 8.83333 14.8877 8.83333 14.6667V8.83333H14.6667C14.8877 8.83333 15.0996 8.74554 15.2559 8.58926C15.4122 8.43297 15.5 8.22101 15.5 8C15.5 7.77899 15.4122 7.56702 15.2559 7.41074C15.0996 7.25446 14.8877 7.16667 14.6667 7.16667H8.83333V1.33333C8.83333 1.11232 8.74554 0.900358 8.58926 0.744078C8.43297 0.587797 8.22101 0.5 8 0.5C7.77899 0.5 7.56702 0.587797 7.41074 0.744078C7.25446 0.900358 7.16667 1.11232 7.16667 1.33333V7.16667H1.33333C1.11232 7.16667 0.900358 7.25446 0.744078 7.41074C0.587797 7.56702 0.5 7.77899 0.5 8C0.5 8.22101 0.587797 8.43297 0.744078 8.58926C0.900358 8.74554 1.11232 8.83333 1.33333 8.83333H7.16667V14.6667Z"
                                                        fill="#6B7280" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="table_body_warp">
                                    <div class="list_clients">
                                        @foreach($clients as $client)
                                            <div class="repeat_clientt">
                                                <a href="{{ url('/master_admin/masterclientanagementdetail', ['id' => $client->id]) }}">
                                                    <div class="client_left_por">
                                                        @php
                                                            $imagePath = public_path($client->profile_picture);
                                                            $imageExists = $client->profile_picture && file_exists($imagePath);
                                                        @endphp

                                                        @php
                                                        $words = explode(' ', $client->name_of_the_business);
                                                        $placeholder = count($words) > 1 
                                                            ? strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1)) 
                                                            : strtoupper(substr($client->name_of_the_business, 0, 2));
                                                        @endphp

                                                        <div class="iamge_client">
                                                        @if($imageExists)
                                                            <img src="{{ asset($client->profile_picture) }}" alt="Profile Picture">
                                                        @else
                                                            <div class="image-placeholder">
                                                                {{ $placeholder }}
                                                            </div>
                                                        @endif
                                                        </div>


                                                        <div class="client_title">
                                                            <div class="client_name">
                                                                <h2>{{ $client->name_of_the_business ?? 'N/A' }}</h2>
                                                                <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M7.09222 5.41071C7.24845 5.56698 7.33621 5.77891 7.33621 5.99988C7.33621 6.22085 7.24845 6.43277 7.09222 6.58904L2.37805 11.3032C2.30118 11.3828 2.20923 11.4463 2.10756 11.49C2.00589 11.5336 1.89654 11.5566 1.78589 11.5576C1.67524 11.5585 1.5655 11.5375 1.46309 11.4956C1.36068 11.4537 1.26763 11.3918 1.18939 11.3135C1.11115 11.2353 1.04927 11.1423 1.00737 11.0398C0.965467 10.9374 0.944382 10.8277 0.945344 10.717C0.946305 10.6064 0.969294 10.497 1.01297 10.3954C1.05664 10.2937 1.12013 10.2017 1.19972 10.1249L5.32472 5.99988L1.19972 1.87488C1.04792 1.71771 0.963925 1.50721 0.965824 1.28871C0.967723 1.07021 1.05536 0.861201 1.20987 0.706695C1.36438 0.552188 1.57339 0.464546 1.79188 0.462647C2.01038 0.460749 2.22088 0.544744 2.37805 0.696543L7.09222 5.41071Z"
                                                                        fill="#303030" />
                                                                </svg>
                                                            </div>
                                                            <div class="client_designation">
                                                                <span>{{ $client->industry ?? 'N/A' }}</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="client_right_por">
                                                        <div class="daily_activity">
                                                            <span>Average Daily Activity</span>
                                                            <h2>1h 38m</h2> <!-- Placeholder for activity; update dynamically if available -->
                                                        </div>
                                                        <hr>
                                                        <div class="user_since">
                                                            @php
                                                                $class = '';
                                                                if ($client->user_plan == 1) {
                                                                    $class = 'gold';
                                                                } elseif ($client->user_plan == 2) {
                                                                    $class = 'silver';
                                                                } elseif ($client->user_plan == 3) {
                                                                    $class = 'platinum';
                                                                }
                                                                else{
                                                                    $class='gold';
                                                                }
                                                            @endphp
                                                            <div class="user_grade  {{ $class }}">
                                                                <span>{{ strtoupper($class) }}</span>
                                                            </div>
                                                            <h2>
                                                                <span>User since</span>
                                                                {{ \Carbon\Carbon::parse($client->created_at)->format('d M, Y') }}
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach


                                        <!-- div repeat start -->
                                        <div class="repeat_clientt">
                                            <a href="{{ url('/master_admin/masterclientanagementdetail') }}">
                                                <div class="client_left_por">
                                                    <div class="iamge_client">
                                                        <img src="../assets/images/clinet_user_profile.png" alt="img">
                                                    </div>
                                                    <div class="client_title">
                                                        <div class="client_name">
                                                            <h2>Plutus Consulting</h2>
                                                            <svg width="8" height="12" viewBox="0 0 8 12"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M7.09222 5.41071C7.24845 5.56698 7.33621 5.77891 7.33621 5.99988C7.33621 6.22085 7.24845 6.43277 7.09222 6.58904L2.37805 11.3032C2.30118 11.3828 2.20923 11.4463 2.10756 11.49C2.00589 11.5336 1.89654 11.5566 1.78589 11.5576C1.67524 11.5585 1.5655 11.5375 1.46309 11.4956C1.36068 11.4537 1.26763 11.3918 1.18939 11.3135C1.11115 11.2353 1.04927 11.1423 1.00737 11.0398C0.965467 10.9374 0.944382 10.8277 0.945344 10.717C0.946305 10.6064 0.969294 10.497 1.01297 10.3954C1.05664 10.2937 1.12013 10.2017 1.19972 10.1249L5.32472 5.99988L1.19972 1.87488C1.04792 1.71771 0.963925 1.50721 0.965824 1.28871C0.967723 1.07021 1.05536 0.861201 1.20987 0.706695C1.36438 0.552188 1.57339 0.464546 1.79188 0.462647C2.01038 0.460749 2.22088 0.544744 2.37805 0.696543L7.09222 5.41071Z"
                                                                    fill="#303030" />
                                                            </svg>
                                                        </div>
                                                        <div class="client_designation">
                                                            <span>Consulting</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="client_right_por">
                                                    <div class="daily_activity">
                                                        <span>Average Daily Activity</span>
                                                        <h2>1h 38m</h2>
                                                    </div>
                                                    <hr>
                                                    <div class="user_since">
                                                        <div class="user_grade gold">
                                                            <span>GOLD</span>
                                                        </div>
                                                        <h2>
                                                            <span>User since</span>
                                                            30 Sep, 2023
                                                        </h2>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- div repeat end -->

                                        <!-- div repeat start -->
                                        <div class="repeat_clientt">
                                            <a href="{{ url('/master_admin/masterclientanagementdetail') }}">
                                                <div class="client_left_por">
                                                    <div class="iamge_client">
                                                        <img src="../assets/images/clinet_user_profile.png"
                                                            alt="img">
                                                    </div>
                                                    <div class="client_title">
                                                        <div class="client_name">
                                                            <h2>SeeHorse Private Limited</h2>
                                                            <svg width="8" height="12" viewBox="0 0 8 12"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M7.09222 5.41071C7.24845 5.56698 7.33621 5.77891 7.33621 5.99988C7.33621 6.22085 7.24845 6.43277 7.09222 6.58904L2.37805 11.3032C2.30118 11.3828 2.20923 11.4463 2.10756 11.49C2.00589 11.5336 1.89654 11.5566 1.78589 11.5576C1.67524 11.5585 1.5655 11.5375 1.46309 11.4956C1.36068 11.4537 1.26763 11.3918 1.18939 11.3135C1.11115 11.2353 1.04927 11.1423 1.00737 11.0398C0.965467 10.9374 0.944382 10.8277 0.945344 10.717C0.946305 10.6064 0.969294 10.497 1.01297 10.3954C1.05664 10.2937 1.12013 10.2017 1.19972 10.1249L5.32472 5.99988L1.19972 1.87488C1.04792 1.71771 0.963925 1.50721 0.965824 1.28871C0.967723 1.07021 1.05536 0.861201 1.20987 0.706695C1.36438 0.552188 1.57339 0.464546 1.79188 0.462647C2.01038 0.460749 2.22088 0.544744 2.37805 0.696543L7.09222 5.41071Z"
                                                                    fill="#303030" />
                                                            </svg>
                                                        </div>
                                                        <div class="client_designation">
                                                            <span>Asset Management</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="client_right_por">
                                                    <div class="daily_activity">
                                                        <span>Average Daily Activity</span>
                                                        <h2>1h 38m</h2>
                                                    </div>
                                                    <hr>
                                                    <div class="user_since">
                                                        <div class="user_grade silver">
                                                            <span>SILVER</span>
                                                        </div>
                                                        <h2>
                                                            <span>User since</span>
                                                            30 Sep, 2023
                                                        </h2>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- div repeat end -->

                                        <!-- div repeat start -->
                                        <div class="repeat_clientt">
                                            <a href="{{ url('/master_admin/masterclientanagementdetail') }}">
                                                <div class="client_left_por">
                                                    <div class="iamge_client">
                                                        <img src="../assets/images/clinet_user_profile.png"
                                                            alt="img">
                                                    </div>
                                                    <div class="client_title">
                                                        <div class="client_name">
                                                            <h2>Asck Group Limited</h2>
                                                            <svg width="8" height="12" viewBox="0 0 8 12"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M7.09222 5.41071C7.24845 5.56698 7.33621 5.77891 7.33621 5.99988C7.33621 6.22085 7.24845 6.43277 7.09222 6.58904L2.37805 11.3032C2.30118 11.3828 2.20923 11.4463 2.10756 11.49C2.00589 11.5336 1.89654 11.5566 1.78589 11.5576C1.67524 11.5585 1.5655 11.5375 1.46309 11.4956C1.36068 11.4537 1.26763 11.3918 1.18939 11.3135C1.11115 11.2353 1.04927 11.1423 1.00737 11.0398C0.965467 10.9374 0.944382 10.8277 0.945344 10.717C0.946305 10.6064 0.969294 10.497 1.01297 10.3954C1.05664 10.2937 1.12013 10.2017 1.19972 10.1249L5.32472 5.99988L1.19972 1.87488C1.04792 1.71771 0.963925 1.50721 0.965824 1.28871C0.967723 1.07021 1.05536 0.861201 1.20987 0.706695C1.36438 0.552188 1.57339 0.464546 1.79188 0.462647C2.01038 0.460749 2.22088 0.544744 2.37805 0.696543L7.09222 5.41071Z"
                                                                    fill="#303030" />
                                                            </svg>
                                                        </div>
                                                        <div class="client_designation">
                                                            <span>Conglomerate</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="client_right_por">
                                                    <div class="daily_activity">
                                                        <span>Average Daily Activity</span>
                                                        <h2>1h 38m</h2>
                                                    </div>
                                                    <hr>
                                                    <div class="user_since">
                                                        <div class="user_grade platinum">
                                                            <span>PLATINUM</span>
                                                        </div>
                                                        <h2>
                                                            <span>User since</span>
                                                            30 Sep, 2023
                                                        </h2>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- div repeat end -->


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

        </div>
    </div>
    </div>
@endsection
