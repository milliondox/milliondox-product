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
                <div class="container-fluid  nt_client_management_datails">
                    <div class="client_management_back">
                        <div class="row">
                            <div class="table_warapp">
                                <div class="table_head_wrapp">
                                    <div class="client_left_por">
                                        {{-- <div class="iamge_client">
                                              <img src="../assets/images/clinet_user_profile.png" alt="img">
                                          </div> --}}
                                        @php
                                            $imagePath = public_path($client->profile_picture);
                                            $imageExists = $client->profile_picture && file_exists($imagePath);
                                        @endphp

                                        @php
                                            $words = explode(' ', $client->name_of_the_business);
                                            $placeholder =
                                                count($words) > 1
                                                    ? strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1))
                                                    : strtoupper(substr($client->name_of_the_business, 0, 2));
                                        @endphp

                                        <div class="iamge_client">
                                            @if ($imageExists)
                                                <img src="{{ asset($client->profile_picture) }}" alt="Profile Picture">
                                            @else
                                                <div class="image-placeholder">
                                                    {{ $placeholder }}
                                                </div>
                                            @endif
                                        </div>


                                        <div class="client_title">
                                            <div class="client_name">
                                                <h2>{{ $client->name_of_the_business }}</h2>
                                            </div>
                                            <div class="client_designation">
                                                <span>{{ $client->industry }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="suspend_account">
                                        <button type="button">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.75 13.125C9.75 13.3239 9.67098 13.5147 9.53033 13.6553C9.38968 13.796 9.19891 13.875 9 13.875C8.80109 13.875 8.61032 13.796 8.46967 13.6553C8.32902 13.5147 8.25 13.3239 8.25 13.125C8.25 12.9261 8.32902 12.7353 8.46967 12.5947C8.61032 12.454 8.80109 12.375 9 12.375C9.19891 12.375 9.38968 12.454 9.53033 12.5947C9.67098 12.7353 9.75 12.9261 9.75 13.125ZM9.5625 6.9375C9.5625 6.78832 9.50324 6.64524 9.39775 6.53975C9.29226 6.43426 9.14918 6.375 9 6.375C8.85082 6.375 8.70774 6.43426 8.60225 6.53975C8.49676 6.64524 8.4375 6.78832 8.4375 6.9375V10.3125C8.4375 10.4617 8.49676 10.6048 8.60225 10.7102C8.70774 10.8157 8.85082 10.875 9 10.875C9.14918 10.875 9.29226 10.8157 9.39775 10.7102C9.50324 10.6048 9.5625 10.4617 9.5625 10.3125V6.9375Z"
                                                    fill="#FA4A4A" />
                                                <path
                                                    d="M7.37808 2.43266C8.10033 1.18391 9.90183 1.18391 10.6241 2.43266L17.3493 14.0607C18.0716 15.3109 17.1693 16.8747 15.7256 16.8747H2.27658C0.832078 16.8747 -0.0694219 15.3109 0.652828 14.0607L7.37808 2.43266ZM9.65058 2.99591C9.58444 2.88228 9.48966 2.78799 9.37569 2.72246C9.26172 2.65692 9.13255 2.62243 9.00108 2.62243C8.86961 2.62243 8.74044 2.65692 8.62647 2.72246C8.51249 2.78799 8.41771 2.88228 8.35158 2.99591L1.62708 14.6239C1.56155 14.738 1.52713 14.8673 1.52726 14.9989C1.52739 15.1305 1.56207 15.2597 1.62783 15.3737C1.69358 15.4877 1.78812 15.5824 1.90197 15.6484C2.01582 15.7143 2.14499 15.7493 2.27658 15.7497H15.7256C15.8571 15.7492 15.9861 15.7143 16.0999 15.6483C16.2136 15.5824 16.3081 15.4878 16.3738 15.3739C16.4395 15.26 16.4742 15.1309 16.4745 14.9995C16.4747 14.868 16.4404 14.7387 16.3751 14.6247L9.65058 2.99591Z"
                                                    fill="#FA4A4A" />
                                            </svg>
                                            Suspend Account
                                        </button>
                                    </div>
                                </div>

                                <div class="table_body_warp">
                                    <div class="grid_tablle">
                                        <div class="activity crd1">
                                            <!-- Daily Activity Card -->
                                            <div class="cardd">
                                                <div class="title">Daily Activity</div>
                                                <div class="can_warp">
                                                    <canvas id="dailyActivityChart"></canvas>
                                                    <div class="subtitle">
                                                        <h2>Average Activity (last 14 days)</h2>
                                                        <span>1h 38m</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="activity crd2">
                                            <!-- Daily Transactions Card -->
                                            <div class="cardd">
                                                <div class="title">Daily Transactions</div>
                                                <div class="can_warp">
                                                    <canvas id="dailyTransactionsChart"></canvas>
                                                    <div class="subtitle">
                                                        <h2>Average Transactions (last 14 days)</h2>
                                                        <span>33m</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        


                                        <div class="percentage_baar crd3">
                                            <div class="progress-container"
                                                style="width: 100%; background: #FFF; border-radius: 20px; overflow: hidden;">
                                                <div class="progress-bar"
                                                    style="width: 0%; transition: width 1s ease-in-out;"></div>
                                            </div>
                                            <div class="priofess_wrap">
                                                <div class="percentage">0%</div>
                                                <div class="storage-info">0/0 GB</div>
                                            </div>
                                        </div>
                                        @php
                                            $class = '';
                                            if ($client->user_plan == 1) {
                                                $class = 'gold';
                                            } elseif ($client->user_plan == 2) {
                                                $class = 'silver';
                                            } elseif ($client->user_plan == 3) {
                                                $class = 'platinum';
                                            } else {
                                                $class = 'basic';
                                            }
                                        @endphp

                                        <div class="gold_barr crd4 {{ $class }}">
                                            <div class="top_bar">

                                                <h2>{{ strtoupper($class) }} <span>Plan</span></h2>
                                            </div>
                                            <div class="bar_bottom">
                                                <h2><span>since</span>{{ \Carbon\Carbon::parse($client->created_at)->format('d M, Y') }}</h2>
                                                <a href="#">View billings <svg width="6" height="10"
                                                        viewBox="0 0 6 10" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.47221 4.52876C5.59719 4.65378 5.6674 4.82332 5.6674 5.0001C5.6674 5.17687 5.59719 5.34641 5.47221 5.47143L1.70088 9.24276C1.63938 9.30644 1.56582 9.35723 1.48448 9.39216C1.40315 9.4271 1.31567 9.44549 1.22715 9.44626C1.13863 9.44703 1.05084 9.43017 0.968911 9.39664C0.88698 9.36312 0.812545 9.31362 0.749949 9.25103C0.687354 9.18843 0.637852 9.114 0.604332 9.03207C0.570811 8.95014 0.553943 8.86235 0.554713 8.77383C0.555482 8.68531 0.573873 8.59783 0.608812 8.51649C0.643751 8.43516 0.694539 8.36159 0.758213 8.3001L4.05821 5.0001L0.758213 1.7001C0.636774 1.57436 0.569578 1.40596 0.571097 1.23116C0.572616 1.05637 0.642728 0.889156 0.766334 0.765551C0.889939 0.641946 1.05715 0.571833 1.23195 0.570313C1.40674 0.568794 1.57515 0.635991 1.70088 0.757429L5.47221 4.52876Z"
                                                            fill="white" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>

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

    {{-- script for storage progress start  sandeep 21 Nov 2024 --}}
    
<script>
  // Dynamic progress update function
  const progressBar = document.querySelector('.progress-bar');
  const percentageText = document.querySelector('.percentage');
  const storageInfo = document.querySelector('.storage-info');
  
  function updateProgress(percentage, usedStorage, totalStorage) {
    // Use a timeout to simulate smooth progress on load
    setTimeout(() => {
      progressBar.style.width = `${percentage}%`;
      percentageText.textContent = `${percentage}%`;
      storageInfo.textContent = `${usedStorage}/${totalStorage} GB`;
    }, 100); // Delay to allow for animation
  }
  
  // Example: Updating the progress to 60%
  updateProgress(60, 1.8, 3.0);
</script>

{{-- script for storage progress end    sandeep 21 Nov 2024 --}}


@endsection
