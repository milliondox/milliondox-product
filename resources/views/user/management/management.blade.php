@extends('user.includes.management') @section('content')
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
           Management
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
      <div class="page-body-wrapper hierarchy_of_management">
        <!-- Page Sidebar Start-->
        @include('user/includes.client-sidebar')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <!-- greeting -->
          <div class="mlb-menu-header container-fluid" style="display:none;">
           <h2>
           Management
          </h2>
            </div>
             <!-- Container-fluid start-->
             <div class="container-fluid chart-backgrounnd">
              <img src="../assets/images/chart_background.png" class="light_back" alt="img">
              <img src="../assets/images/chart_background-dark.png" class="dark_back" alt="img">
          <div class="row"> 
              
            <div class="organisation_chart">
            <div id="orgChartContainer">
      <div id="orgChart"></div>
    </div>
</div>
<script type="text/javascript">
  

  $(function(){
    var testData = [
        {id: '{{ $user->id }}', name: '{{ $user->name }}', description: '{{ $user->role }}', parent: 0},
    ];

    var org_chart = $('#orgChart').orgChart({
        data: testData,
        showControls: true,
        allowEdit: true,
        onAddNode: function(node){ 
            var userId = generateUniqueId();
            var data = {
                user_id: userId,
                parent_id: node.data.parent,
                name: node.data.name,
                description: node.data.description
            };

            // Send AJAX request to store the data
            $.ajax({
                url: '{{ route("orgchart.managestore") }}',
                type: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log('Data stored successfully:', response);
                    // Optionally, you can handle success here
                },
                error: function(xhr, status, error) {
                    console.error('Error storing data:', error);
                    // Optionally, you can handle errors here
                }
            });

            log('Created new node on node '+node.data.id);
            org_chart.newNode(node.data.id); 
        },
        onDeleteNode: function(node){
            log('Deleted node '+node.data.id);
            org_chart.deleteNode(node.data.id); 
        },
        onClickNode: function(node){
            log('Clicked node '+node.data.id);
        }
    });
    function generateUniqueId() {
            return Math.floor(Math.random() * 1000000) + 1; // Generate a random number between 1 and 1,000,000
        }
    // Function to log messages
    function log(text){
        $('#consoleOutput').append('<p>'+text+'</p>')
    }
});


    </script>
    
</div>
</div>
<!-- Container-fluid start-->

        </div>
      </div>
    </div>


    @endsection
   
