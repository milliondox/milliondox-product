@extends('user.includes.manage-division') @section('content')
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
                        Manage Divisions
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
                    Manage Divisions
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
                                            <h2>Divisions</h2>
                                        </div>
                                        <div class="hearder-entres">
                                            <div class="volt_headd-filter">
                                                <button>
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5.59282 11.625H4.5V5.94909L0.5625 1.26159V0.375H11.25V1.25653L7.5 5.94403V9.71782L5.59282 11.625ZM5.25 10.875H5.28218L6.75 9.40718V5.68097L10.3948 1.125H1.42734L5.25 5.67591V10.875Z" fill="#868686" />
                                                    </svg> Apply Filter </button>
                                            </div>
                                            <div class="sadd_filds">
                                                <button class="hvr-rotate" id="add_divisions" data-bs-toggle="modal" data-bs-target="#adddivision"> + Add </button>


                                            </div>
                                        </div>
                                        <div class="entery_body table-responsive">

                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Division</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($division as $div )
                                                    <tr class="active">

                                                        <td>{{$div->id}}</td>
                                                        <td>{{$div->division_name}}</td>
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

                                            <!-- The divisionModal start -->

                                            <div class="modal fade drop_coman_file have_title" id="adddivision" tabindex="-1" role="dialog" aria-labelledby="adddivision" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" style="font-weight:700">Add Division</h5>
                                                            <button class="close closeed" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                                                                <span aria-hidden="true">
                                                                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"></rect>
                                                                        <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"></rect>
                                                                    </svg>
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h3>Add Dvision</h3>


                                                            <form action="{{ route('adddivision') }}" method="POST" enctype="multipart/form-data" class="upload-form" id="divisionForm">
                                                                @csrf
                                                                <div class="gropu_form">
                                                                    <label for="fname">Division name </label>
                                                                    <input placeholder="Type" type="text" required="" id="division_name" name="division_name" required>
                                                                </div>

                                                                <div class="root_btn">
                                                                    <button class="btn btn-primary" style="border-radius:5px;" type="submit">Add</button>
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- The divisionModal end -->


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