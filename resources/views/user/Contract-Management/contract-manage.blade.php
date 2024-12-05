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
                        <span>86 Customers</span>
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
                          <button type="button">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M1 6H11M6 11V1" stroke="#5790FF" stroke-width="1.66" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            Add Customer
                          </button>
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
                                Signing Authority
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

                          <tr>
                            <td>
                              <div class="image_naess">
                                <a href="{{url('/user/contractmanagedetail')}}">
                                  <div class="image_table">
                                    <img src="../assets/images/jay_malhotra.png" alt="img">
                                  </div>
                                  <span>Orange XT LLP</span>
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
                                  <div class="image_table">
                                    <img src="../assets/images/jay_malhotra.png" alt="img">
                                  </div>
                                  <span>Anurag Srivastava</span>
                                </div>
                                <div class="signing_ath_rpt">
                                  <div class="image_table">
                                    <img src="../assets/images/jay_malhotra.png" alt="img">
                                  </div>
                                  <span>Devanshu Kumar</span>
                                </div>
                              </div>
                            </td>
                            <td>
                              <div class="divisn_only">
                                <span>Tech</span>
                                <span>Legal</span>
                                <span>Marketing</span>
                                <span>Finance</span>
                                <span>HR</span>
                                <span>Finance</span>
                                <span>HR</span>
                                <span>Finance</span>
                                <span>HR</span>
                                <span>Finance</span>
                                <span>HR</span>
                                <span>Finance</span>
                                <span>HR</span>
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

                          <tr>
                            <td>
                              <div class="image_naess">
                                <a href="#">
                                  <div class="image_table">
                                    <img src="../assets/images/jay_malhotra.png" alt="img">
                                  </div>
                                  <span>Orange XT LLP</span>
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
                                  <div class="image_table">
                                    <img src="../assets/images/jay_malhotra.png" alt="img">
                                  </div>
                                  <span>Anurag Srivastava</span>
                                </div>
                                <div class="signing_ath_rpt">
                                  <div class="image_table">
                                    <img src="../assets/images/jay_malhotra.png" alt="img">
                                  </div>
                                  <span>Devanshu Kumar</span>
                                </div>
                              </div>
                            </td>
                            <td>
                              <div class="divisn_only">
                                <span>Tech</span>
                                <span>Legal</span>
                                <span>Marketing</span>
                                <span>Finance</span>
                                <span>HR</span>
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