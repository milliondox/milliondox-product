@extends('user.includes.role-management') @section('content')
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
           
          </h2>
            </div>
            
          @if(isset($user->video_status) && $user->video_status == "0")

      <button class="btn_command " style="border-radius:5px; display:none;" data-bs-toggle="modal" data-bs-target="#aniation_dash">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8.25 12V5.8875L6.3 7.8375L5.25 6.75L9 3L12.75 6.75L11.7 7.8375L9.75 5.8875V12H8.25ZM4.5 15C4.0875 15 3.7345 14.8533 3.441 14.5597C3.1475 14.2662 3.0005 13.913 3 13.5V11.25H4.5V13.5H13.5V11.25H15V13.5C15 13.9125 14.8533 14.2657 14.5597 14.5597C14.2662 14.8538 13.913 15.0005 13.5 15H4.5Z" fill="#7E7E7E" />
        </svg> Upload </button>
      <div class="modal fade show" id="aniation_dash" tabindex="-1" role="dialog" aria-labelledby="aniation_dash" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" style="font-weight:700"></h5>
              <button class="btn_command close" style="border-radius:5px;" id="videobtn">
                <span aria-hidden="true">
                  <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black" />
                    <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black" />
                  </svg>
                </span>
              </button>
            </div>
            <div class="modal-body">

              <iframe width="1903" height="784" src="https://www.youtube.com/embed/NqWP-pl1CfQ?autoplay=1&mute=1&loop=1&playlist=NqWP-pl1CfQ&modestbranding=1&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>

            </div>
          </div>
        </div>
      </div>
      @endif
      
   <script>
$(document).ready(function() {
  $('#videobtn').on('click', function() {
    // Get the CSRF token from the meta tag
    var csrfTokenElement = $('meta[name="csrf-token"]');
    if (csrfTokenElement.length) {
      var csrfToken = csrfTokenElement.attr('content');

      // Initialize the XMLHttpRequest object
      var xhr = new XMLHttpRequest();
      xhr.open('POST', '{{ route("updateVideoStatus") }}', true);
      xhr.setRequestHeader('Content-Type', 'application/json');
      xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

      // Define the callback function to handle the response
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            console.log('Video status updated successfully');
            // Reload the page after successfully updating the status
            window.location.reload();
          } else {
            console.error('Failed to update video status', xhr.responseText);
          }
        }
      };

      // Send the AJAX request with the data
      xhr.send(JSON.stringify({
        video_status: 1
      }));
    } else {
      console.error('CSRF token meta tag not found');
    }
  });
});
</script>



      
              <!-- Container-fluid start-->
      <div class="container-fluid Compliance-Regulatory Role_Management">
        <div class="row">
          <div class="col-md-12">
         
            <div class="Inc_table">

                <div class=" tba_history_rap">
				
                  <div class="filtr_tabble">
				  <div class="table_title">
                        <h2>Role Management</h2>
</div>
				  <div class="mmanage_wrap">
                  <div class="row">
                    <div class="col-sm-2">
				  	<div class="left_management">

            <div class="top_role">
				<h2>Role</h2>

        <!-- tabs start -->
                <div class="tabs">
                    
                  <!-- tab button left start -->
                  @foreach($roles as $role)
           
    <button class="tablinks" onclick="fetchUsersByRole('{{ $role->role }}', 'tab-dsc1{{ $role->id }}'); openTab(event, 'tab1{{ $role->id }}')">
        <span class="dott"></span>{{ $role->role }}
    </button>
   
@endforeach

 <!-- This is where the user list will be displayed -->
                
      <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>

               var permission_html = '';

function fetchUsersByRole(role, tabId) {
    $.ajax({
        url: '{{ route('fetchUsers') }}', // Replace with your route
        type: 'GET',
        data: { role: role },
        success: function(response) {
            if (response.success) {
               updateUserList(response.users, tabId);
               if (response.users && response.users.length > 0 && response.users[0]) {
                permission_html = `
                    <div class="inn_ger_menu gernal_main">
                        <h2>GENERAL PERMISSIONS</h2>
                        <ul>
                            <input type="hidden" name="role_id" value="${response.users[0].role }">
                            <input type="hidden" name="role_name" value="${response.users[0].main_role_id }">
                            
                           <li>
                                <div class="left_gernal">
                                    <h3>Edit Password</h3>
                                    <p>Allows members to edit login password</p>
                                </div>
                                <div class="right_toglle">
                                    <div class="toggle-btn">
                                        <label class="switch">
                                            <input type="checkbox" name="Edit_Password" value="1" ${response.users[0].Edit_Password ? 'checked' : ''} 
                                                 data-role-name="${response.users[0].role }" 
                                                data-role-id="${response.users[0].main_role_id }" 
                                                onchange="updateRolePermission(this, 'Edit_Password')">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </li> 
                            
                            <li>
                                <div class="left_gernal">
                                    <h3>View Exception Reports</h3>
                                    <p>Allows members to view exception reports</p>
                                </div>
                                <div class="right_toglle">
                                    <div class="toggle-btn">
                                        <label class="switch">
                                            <input type="checkbox" name="View_Exception_Reports" value="1" ${response.users[0].View_Exception_Reports ? 'checked' : ''} 
                                                data-role-name="${response.users[0].role }" 
                                                data-role-id="${response.users[0].main_role_id }" 
                                                onchange="updateRolePermission(this, 'View_Exception_Reports')">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                             <li>
        <div class="left_gernal">
            <h3>Document Repository Access</h3>
            <p>By selecting the options you will be able to provide permission to members to interact with documents under the document repository.</p>
        </div>
        <div class="right_toglle">
            <div class="toggle-btn">
                <label class="switch">
                 <input type="checkbox" name="Document_Repository_Access" value="1" ${response.users[0].Document_Repository_Access ? 'checked' : ''} 
                                                data-role-name="${response.users[0].role }" 
                                                data-role-id="${response.users[0].main_role_id }" 
                                                onchange="updateRolePermission(this, 'Document_Repository_Access')">
                   
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </li>
    
       
    
    <li>
        <div class="left_gernal">
            <h3>Promoters Vault</h3>
            <p>Provides access to members for viewing and managing documents within the Promoters Vault.</p>
        </div>
        <div class="right_toglle">
            <div class="toggle-btn">
                <label class="switch">
                <input type="checkbox" name="Promoters_Vault_Access" value="1" ${response.users[0].Promoters_Vault_Access ? 'checked' : ''} 
                                                data-role-name="${response.users[0].role }" 
                                                data-role-id="${response.users[0].main_role_id }" 
                                                onchange="updateRolePermission(this, 'Promoters_Vault_Access')">
                    
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </li>
    
    <li>
        <div class="left_gernal">
            <h3>Coming Soon Features</h3>
            <p>Enables members to view upcoming features and developments that are currently in the pipeline.</p>
        </div>
        <div class="right_toglle">
            <div class="toggle-btn">
                <label class="switch">
                <input type="checkbox" name="Coming_Soon_Access" value="1" ${response.users[0].Coming_Soon_Access ? 'checked' : ''} 
                                                data-role-name="${response.users[0].role }" 
                                                data-role-id="${response.users[0].main_role_id }" 
                                                onchange="updateRolePermission(this, 'Coming_Soon_Access')">
                    
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </li>
    
    <li>
        <div class="left_gernal">
            <h3>Trash Panel</h3>
            <p>Allows members to access and manage deleted items within the Trash panel, including restoration and permanent deletion options.</p>
        </div>
        <div class="right_toglle">
            <div class="toggle-btn">
                <label class="switch">
                <input type="checkbox" name="Trash_Panel_Access" value="1" ${response.users[0].Trash_Panel_Access ? 'checked' : ''} 
                                                data-role-name="${response.users[0].role }" 
                                                data-role-id="${response.users[0].main_role_id }" 
                                                onchange="updateRolePermission(this, 'Trash_Panel_Access')">
                    
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </li>
    
    
     <li>
        <div class="left_gernal">
            <h3>Role Panel</h3>
            <p>Allows members to access and manage role  including restoration and permanent deletion options.</p>
        </div>
        <div class="right_toglle">
            <div class="toggle-btn">
                <label class="switch">
                <input type="checkbox" name="Role_Access" value="1" ${response.users[0].Role_Access ? 'checked' : ''} 
                                                data-role-name="${response.users[0].role }" 
                                                data-role-id="${response.users[0].main_role_id }" 
                                                onchange="updateRolePermission(this, 'Role_Access')">
                    
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </li>
                            <!-- Repeat for other permissions -->
                            
                            <li class="delete_role">
                                <div class="left_gernal">
                                    <p>*Delete This Role</p>
                                </div>
                                <div class="right_toglle">
                                    <div class="toggle-btn">
                                        <button class="delete_role" id="delete_role" data-mainrole-id="${response.users[0].main_role_id}">Delete</button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                `;
               }
               else {
    // Display a message if response.users[0] is empty
    permission_html = `
        <div class="gerneal_emptty">
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F"></path>
                                <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F"></circle>
                              </svg>
            <p>Please add members to set permissions.</p>
            <span>Try adding a member first, in order to delete the role.</span>
        </div>
    `;
}
                
                // console.log("Generated permission HTML: ", permission_html);

                // Append the dynamically generated HTML to the .permissionhtmldiv element
                $('.permissionhtmldiv').html(permission_html);
                
                // Add event listener to the delete button
                // console.log('#delete_role' + response.users[0].main_role_id);
 $('.delete_role').click(function() {
    // Fetch the role ID from the button's data attribute
   let roleId = response.users[0].main_role_id;

    // Show SweetAlert confirmation dialog
    Swal.fire({
        title: 'Are you sure?',
        text: "This will mark the role as deleted.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Proceed with the AJAX request to update the is_deleted status to 1
            $.ajax({
                url: `/roles/updatestatusrole/${roleId}`,  // Use the roleId in the URL
                type: 'POST',  // Or 'DELETE' if you prefer
                data: {
                    _token: '{{ csrf_token() }}',  // Include CSRF token for security
                    is_deleted: 1  // Set the `is_deleted` status to 1
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire(
                            'Deleted!',
                            'Role has been marked as deleted.',
                            'success'
                        ).then(() => {
                            location.reload();  // Reload the page to reflect changes
                        });
                    } else {
                        Swal.fire(
                            'Failed!',
                            'Failed to update the role status.',
                            'error'
                        );
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    Swal.fire(
                        'Error!',
                        'An error occurred while updating the role status.',
                        'error'
                    );
                }
            });
        }
    });
});


                
            } else {
                alert('Failed to fetch users.');
            }
        },
        error: function() {
            alert('An error occurred.');
        }
    });
}

// Add click event listener to the delete_role button




    
    
// document.getElementById(`delete_role${response.users[0].main_role_id}`).addEventListener('click', function() {
//     // Show SweetAlert confirmation
//     Swal.fire({
//         title: 'Are you sure?',
//         text: "You won't be able to revert this!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Yes, delete it!'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             // Dynamically build the route URL in JavaScript
//             let deleteUrl = `/roles/deleterole/${response.users[0].main_role_id}`;

//             fetch(deleteUrl, {
//                 method: 'DELETE',
//                 headers: {
//                     'X-CSRF-TOKEN': '{{ csrf_token() }}',
//                     'Content-Type': 'application/json'
//                 }
//             })
//             .then(response => response.json())
//             .then(data => {
//                 if (data.success) {
//                     Swal.fire(
//                         'Deleted!',
//                         'Role has been deleted.',
//                         'success'
//                     ).then(() => {
//                         location.reload(); // Reload the page after deletion
//                     });
//                 } else {
//                     Swal.fire(
//                         'Failed!',
//                         'Failed to delete the role.',
//                         'error'
//                     );
//                 }
//             })
//             .catch(error => {
//                 console.error('Error:', error);
//                 Swal.fire(
//                     'Error!',
//                     'An error occurred while deleting the role.',
//                     'error'
//                 );
//             });
//         }
//     });
// });

    
    
    
    
    
    
    

    function updateUserList(users, tabId) {
        var userList = $(`#${tabId} #userList`);
        userList.empty(); // Clear the existing list

        if (users.length > 0) {
            var userHtml = '';
            $.each(users, function(index, user) {
                userHtml += `
                <li><div class="left_embers_detail">
        <div class="ig_mem">
         <img src="${user.profile_picture ? '{{ asset('uploads/profile_images/') }}'+'/' + user.profile_picture : '{{ asset('assets/images/default.png') }}'}" alt="Profile Picture">
</div>
<h3>${user.name}</h3>
<b>|</b>
<span>${user.role}</span>
</div> 
<div class="dropdown" >
                              <button onclick="toggleDropdown()" class="dropbtn show_pp">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M10.3994 4.19166C10.3994 4.37562 10.3632 4.55779 10.2929 4.72778C10.2226 4.89776 10.1194 5.05222 9.98937 5.18234C9.85934 5.31246 9.70494 5.4157 9.535 5.48615C9.36507 5.55661 9.18292 5.5929 8.99896 5.59296C8.81499 5.59302 8.63282 5.55684 8.46284 5.4865C8.29286 5.41615 8.1384 5.31302 8.00827 5.18298C7.87815 5.05294 7.77492 4.89854 7.70446 4.72861C7.63401 4.55867 7.59772 4.37652 7.59766 4.19256C7.59754 3.82103 7.74501 3.46467 8.00764 3.20188C8.27026 2.93908 8.62653 2.79138 8.99806 2.79126C9.36958 2.79114 9.72594 2.93862 9.98874 3.20124C10.2515 3.46387 10.3992 3.82013 10.3994 4.19166Z" fill="#8D8D8D" />
                                  <path d="M8.99806 10.3999C9.77148 10.3999 10.3985 9.77294 10.3985 8.99952C10.3985 8.2261 9.77148 7.59912 8.99806 7.59912C8.22464 7.59912 7.59766 8.2261 7.59766 8.99952C7.59766 9.77294 8.22464 10.3999 8.99806 10.3999Z" fill="#8D8D8D" />
                                  <path d="M8.99806 15.2085C9.77148 15.2085 10.3985 14.5815 10.3985 13.8081C10.3985 13.0347 9.77148 12.4077 8.99806 12.4077C8.22464 12.4077 7.59766 13.0347 7.59766 13.8081C7.59766 14.5815 8.22464 15.2085 8.99806 15.2085Z" fill="#8D8D8D" />
                                </svg>
                              </button>
                              <div id="myDropdown" class="dropdown-content"> <div class="down_del">
                                
                                  <a class="dropdown-itemm delet_nt" id="delete${user.id}">
                                 
                                                            
                                                            <button type="submit" class="delete-button" onclick="deleteUser(${user.id})">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A" />
                                    </svg> Delete
                                                            </button>
                                             
                                                       
                                                 </a>
                                </div>
                                <a class="dropdown-itemm rename_nt" data-bs-toggle="modal" data-bs-target="#edit_role_nt${user.id}">
                                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.75 9.33323L6.41667 11.6666H12.25V9.33323H8.75ZM7.035 4.19406L1.75 9.47906V11.6666H3.9375L9.2225 6.38156L7.035 4.19406ZM10.9142 4.6899C11.1417 4.4624 11.1417 4.08323 10.9142 3.8674L9.54917 2.5024C9.4398 2.39389 9.29198 2.33301 9.13792 2.33301C8.98385 2.33301 8.83604 2.39389 8.72667 2.5024L7.65917 3.5699L9.84667 5.7574L10.9142 4.6899Z" fill="#8D8D8D" />
                                  </svg> Edit </a>
                               
                              </div>
                            </div>
</li>
            <!-- model start -->
<div class="modal fade drop_coman_file have_title" id="edit_role_nt${user.id}" tabindex="-1" role="dialog" aria-labelledby="edit_role_nt${user.id}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" style="font-weight:700">Edit Role Member</h5>

                                                <button class="close" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
            <span aria-hidden="true"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"/>
<rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"/>
</svg>
</span>
          </button>
                                            </div>
                                            <div class="modal-body ediit_nnt">
                                            <h3>Edit Role Member</h3>
                                             <form id="memberForm" action="{{ route('updatemembers') }}" method="POST" enctype="multipart/form-data" class="upload-form">
        @csrf
        <div class="gropu_form ivoice-upload">
            <label for="profile_picture">Employee Picture*</label>
            

            <div class="file-area" id="round_uplad_image">  
            
                <div class="inner_file_edit">    
    <input type="file" id="emppicd" class="emppicd" name="profile_picture" >
    <div class="dont_show">
       
        <img id="previewd" class="previewd" src="${user.profile_picture ? '{{ asset('uploads/profile_images/') }}'+'/' + user.profile_picture : '{{ asset('assets/images/default.png') }}'}" alt="Profile Picture">
        <div class="EAyyHe"><div class="EzQmEf"></div></div>
    </div>
</div>

            </div>
        </div>
        <div class="gropu_form">
            <label for="fname"> Name </label>
            <input placeholder="First Name" type="text" id="fname" name="fname" value="${user.name}" >
             <input type="hidden" id="mem_id" name="mem_id" value="${user.id}" >
        </div>
       
        <div class="gropu_form">
            <label for="email"> Email ( professional ) </label>
            <input placeholder="email( professional )" type="text" id="email" value="${user.email}" name="email" >
        </div>
        <div class="gropu_form">
            <label for="password">Password  </label>
            <input placeholder="Password" type="password" id="password" name="password" value="${user.password}" >
            <b class="toggle-password"><i class="fas fa-eye-slash"></i></b>
        </div>
      
        <div class="gropu_form">
            <label for="phone">Phone  </label>
            <input placeholder="phone" type="text" id="phone" name="phone" value="${user.phone}" >
        </div>
        <div class="gropu_form">
            <label for="personal_email_id"> Email ( personal ) </label>
            <input placeholder="email( personal )" type="text" id="personal_email_id" value="${user.personal_email_id}" name="personal_email_id" >
        </div>
      <input  type="hidden" id="Role" value="${user.role}" name="Role"   readonly>
        <div class="root_btn">                        
            <button class="btn btn-primary" style="border-radius:5px;" type="submit">Update</button>
        </div>
    </form>
                                            </div>
                                        </div>
                                    </div>
                             </div>

                             <!-- model end -->
`;
            });
            userList.append(userHtml);
        }else {
    userList.append(`
        <div class="gerneal_emptty">
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F"></path>
                <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F"></circle>
            </svg>
            <p>click on add member to add new user.</p>
            <span>Try adding a member first, in order to delete the role.</span>
        </div>
    `);
}
    }
     document.getElementById('emppics').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previews').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function deleteUser(userId) {
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
            // Send the AJAX request
            fetch(`/delete-user/${userId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire(
                        'Deleted!',
                        'The user has been deleted.',
                        'success'
                    ).then(() => {
                        location.reload(); // Reload the page
                    });
                } else {
                    Swal.fire(
                        'Failed!',
                        'There was an issue deleting the user.',
                        'error'
                    );
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire(
                    'Error!',
                    'An error occurred while deleting the user.',
                    'error'
                );
            });
        }
    });
}
</script>
                   <!-- tab button left end -->
            </div>
            

                             
                 <!-- tabs end -->
            </div>

            <div class="bottom_ad_role">
            <div class="sadd_filds">
                      <button class="hvr-rotate" data-bs-toggle="modal" data-bs-target="#role_namee">+ Add a role</button>
                      </div>
</div>
	<!-- model start -->
<div class="modal fade drop_coman_file have_title" id="role_namee" tabindex="-1" role="dialog" aria-labelledby="role_namee" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" style="font-weight:700">Add Role Name</h5>
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
                                    <h3>Add Role Name</h3>


                                    <form action="{{ route('addroles') }}" method="POST" enctype="multipart/form-data" class="upload-form" id="roleForm"> 
                                      @csrf
								<div class="gropu_form">
                          <label for="fname">Role name </label>
                           <input placeholder="Type" type="text" required id="role_name" name="role">
                          </div>

                <div class="root_btn">                        
                 <button class="btn btn-primary"  style="border-radius:5px;" type="submit">Upload</button>
</div>
				
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <script>
    $(document).ready(function() {
        // Intercept the form submission
        $('#roleForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            let roleName = $('#role_name').val();

            // Send AJAX request to check if the role already exists for the user
            $.ajax({
                url: '{{ route("checkRoleExistence") }}',  // This route should check for role existence
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    role: roleName
                },
                success: function(response) {
                    if (response.exists) {
                        // Show error if role already exists
                        toastr.error('This role already exists for your account.');
                    } else {
                        // Proceed with form submission if role does not exist
                        $('#roleForm')[0].submit();
                    }
                },
                error: function() {
                    toastr.error('An error occurred while checking the role.');
                }
            });
        });
    });
</script>
<!-- model end -->
				</div>
			
</div>

			  
<div class="col-sm-10">
     @if($rolesexit->isNotEmpty())	
<div class="column-tabs">
@foreach($roles as $role)
<!-- main tab content start -->
<div id="tab1{{$role->id}}" class="tabcontent">
<div class="tabs">
  {{-- <button class="tab-link active" onclick="openTabbb('kyc')">Basic</button> --}}
  <button class="tab-link active" onclick="openTabbb('dsc{{$role->id}}')">Permissions</button>
  <button class="tab-link" onclick="openTabbb('dsc1{{$role->id}}')">Members</button>
</div>

{{--
<!-- first tab start -->
<div id="tab-kyc" class="tab active">

<div class="role_name">
<form action="" method="POST" enctype="multipart/form-data" class="upload-form"> 
    <div class="wrap_form">
<div class="gropu_form">
                          <label for="fname">Role Name</label>
                           <input placeholder="Type" type="text" id="fname" name="fname">
                          </div>

                          <div class="root_btn">                        
                          <button class="btn hvr-rotate">VIEW SERVER AS ROLE <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.0026 8.66659C8.47536 8.66659 9.66927 7.47268 9.66927 5.99992C9.66927 4.52716 8.47536 3.33325 7.0026 3.33325C5.52984 3.33325 4.33594 4.52716 4.33594 5.99992C4.33594 7.47268 5.52984 8.66659 7.0026 8.66659Z" fill="#787878"/>
<path d="M13 5.99996C13 5.99996 12.3333 0.666626 7 0.666626C1.66667 0.666626 1 5.99996 1 5.99996" stroke="#787878" stroke-width="1.33333"/>
</svg>
</button>
</div>
</div>

<div class="down_del">
<a class="dropdown-itemm rename_nt" href="#" onclick="">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M8.75 9.33323L6.41667 11.6666H12.25V9.33323H8.75ZM7.035 4.19406L1.75 9.47906V11.6666H3.9375L9.2225 6.38156L7.035 4.19406ZM10.9142 4.6899C11.1417 4.4624 11.1417 4.08323 10.9142 3.8674L9.54917 2.5024C9.4398 2.39389 9.29198 2.33301 9.13792 2.33301C8.98385 2.33301 8.83604 2.39389 8.72667 2.5024L7.65917 3.5699L9.84667 5.7574L10.9142 4.6899Z" fill="#8D8D8D"></path>
                                    </svg> Edit </a>
                                    <a class="dropdown-itemm delet_nt" href="#">
                                      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z" fill="#FA4A4A"></path>
                                      </svg> Delete </a>
                                  </div>

</form>

</div>
                
                  </div>
                 
<!-- first tab end -->

--}}

<!-- second tab start -->
<div id="tab-dsc{{$role->id}}" class="tab active">

<div class="main_grnal_menu">

  <!-- gernal start -->
  <div class="permissionhtmldiv"></div>
  


<!-- gernal end -->
{{--
 <!-- MENU-WISE PERMISSIONS start -->
 <div class="inn_ger_menu menu_wise">
<h2>MENU-WISE PERMISSIONS</h2>

<ul>
    <!-- li start -->
  <li>
    <div class="left_gernal">
      <h3>Administration > Director’s Info</h3>
      <p>Select members’ accessibility</p>
</div>
<div class="right_toglle">
<select id="con_type" name="cars">
  <option value="select">select</option>
    <option value="view">can view</option>
    <option value="edit">can edit</option>
  </select>
</div>
  </li>
  <!-- li end -->

  <!-- li start -->
  <li>
    <div class="left_gernal">
      <h3>Administration > Calendar</h3>
      <p>Select members’ accessibility</p>
</div>
<div class="right_toglle">
<select id="con_type" name="cars">
  <option value="select">select</option>
    <option value="view">can view</option>
    <option value="edit">can edit</option>
  </select>
</div>
  </li>
  <!-- li end -->

    <!-- li start -->
    <li>
    <div class="left_gernal">
      <h3>Administration > Company Profile</h3>
      <p>Select members’ accessibility</p>
</div>
<div class="right_toglle">
<select id="con_type" name="cars">
  <option value="select">select</option>
    <option value="view">can view</option>
    <option value="edit">can edit</option>
  </select>
</div>
  </li>
  <!-- li end -->

</ul>
</div>
<!-- MENU-WISE PERMISSIONS end -->

--}}

</div>
                  </div>
                 

<!-- second tab end -->
<script>
    document.getElementById('emppic').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

</script>

<!-- third tab start -->
<div id="tab-dsc1{{$role->id}}" class="tab">
 
<div class="main_member">
  <div class="top_search">
  <div class="main_tep">
                <div class="find_par">                    
                    <div class="search_nt">
                        <div class="svg_srch">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.75 14.75L10.25 10.25M1.25 6.5C1.25 7.18944 1.3858 7.87213 1.64963 8.50909C1.91347 9.14605 2.30018 9.7248 2.78769 10.2123C3.2752 10.6998 3.85395 11.0865 4.49091 11.3504C5.12787 11.6142 5.81056 11.75 6.5 11.75C7.18944 11.75 7.87213 11.6142 8.50909 11.3504C9.14605 11.0865 9.7248 10.6998 10.2123 10.2123C10.6998 9.7248 11.0865 9.14605 11.3504 8.50909C11.6142 7.87213 11.75 7.18944 11.75 6.5C11.75 5.81056 11.6142 5.12787 11.3504 4.49091C11.0865 3.85395 10.6998 3.2752 10.2123 2.78769C9.7248 2.30018 9.14605 1.91347 8.50909 1.64963C7.87213 1.3858 7.18944 1.25 6.5 1.25C5.81056 1.25 5.12787 1.3858 4.49091 1.64963C3.85395 1.91347 3.2752 2.30018 2.78769 2.78769C2.30018 3.2752 1.91347 3.85395 1.64963 4.49091C1.3858 5.12787 1.25 5.81056 1.25 6.5Z" stroke="#BFBFBF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</div>
                    <input type="search" class="search-input" placeholder="Search members" aria-controls="basic-1" list="suggestions-list">
</div>
</div>
<div class="left_fav">
    <a class="hvr-rotate" data-bs-toggle="modal" data-bs-target="#add_member{{$role->id}}">Add Members</a>
</div>

 <!-- model start -->
 <div class="modal fade drop_coman_file have_title" id="add_member{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="add_member{{$role->id}}" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" style="font-weight:700">Add Members</h5>
                                    <button class="close clearform" style="border-radius:5px;" type="button" data-bs-dismiss="modal">
                                      <span aria-hidden="true">
                                        <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect width="4.27093" height="66.172" transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black" />
                                          <rect width="4.27086" height="66.3713" transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black" />
                                        </svg>
                                      </span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <h3>Add Members</h3>

    <form id="memberForm" action="{{ route('members') }}" method="POST" enctype="multipart/form-data" class="upload-form">
        @csrf
        <div class="gropu_form ivoice-upload">
            <label for="profile_picture">Employee Picture*</label>
            <div class="file-area" id="round_uplad_image">  
                <div class="inner_file_edit">    
    <input type="file" id="emppicd" class="emppicd" name="profile_picture" >
    <div class="dont_show">
        <img id="previewd" class="previewd" src="../assets/images/image_placeholder.png" alt="img">
        <div class="EAyyHe"><div class="EzQmEf"></div></div>
    </div>
</div>

            </div>
        </div>
        <div class="gropu_form">
            <label for="fname">First Name </label>
            <input placeholder="First Name" type="text" id="fname" name="fname" value="" minlength="3" maxlength="50" required>
            
            <input type="hidden" id="createdby_id" name="createdby_id" value="{{$user->id}}" required>
            <input type="hidden" id="main_role_id" name="main_role_id" value="{{$role->id}}" required>
        </div>
        <div class="gropu_form">
            <label for="lname">Last Name </label>
            <input placeholder="Last Name" type="text" id="lname" name="lname" value="" minlength="3" maxlength="50" required>
        </div>
        <div class="gropu_form">
            <label for="email"> Email ( professional ) </label>
            <input placeholder="email( professional )" type="text" id="email" value="" name="email" required>
        </div>
        <div class="gropu_form">
            <label for="password">Password  </label>
            <div class="pasward_wrap">
            <input placeholder="Password" type="password" id="password" name="password" value="" class="password-field" required>
            <span class="password-strength-text" style="display: block; margin-top: 5px; color: red;"></span>
            <b class="toggle-password"><i class="fas fa-eye-slash"></i></b>
            </div>
        </div>
      
        <div class="gropu_form">
            <label for="phone">Phone  </label>
            <input placeholder="phone" type="text" id="phone" name="phone" value="" required>
        </div>
        <div class="gropu_form">
            <label for="personal_email_id"> Email ( personal ) </label>
            <input placeholder="email( personal )" type="text" id="personal_email_id" value="" name="personal_email_id" >
        </div>
        <!--<div class="gropu_form">-->
        <!--    <label for="Role">Role </label>-->
        <!--    <select id="Role" name="Role" required>-->
        <!--        <option value="" disabled selected>select</option>-->
                
        <!--            <option value="{{ $role->role }}">{{ $role->role }}</option>-->
              
        <!--    </select>-->
        <!--</div>-->
<input  type="hidden" id="Role" value="{{ $role->role }}" name="Role"   readonly>
        <div class="root_btn">                        
            <button class="btn btn-primary" style="border-radius:5px;" type="submit">Add</button>
        </div>
    </form>



                                  </div>
                                </div>
                              </div>
                            </div>
<!-- model end -->
                </div>

</div>
<script>
    $(document).ready(function() {
        // Clear form on clear button click
        $('.clearform').on('click', function() {
            // Clear form fields
            $('#memberForm').find('input:text, input:password, input:file, select, textarea').val(''); 
            $('#memberForm').find('input:checkbox, input:radio').prop('checked', false); 
           

            // Reset the preview image
            $('#previewd').attr('src', '../assets/images/image_placeholder.png');

            // Hide the password strength message
            $('.password-strength-text').hide();
        });

        // Show password strength text when typing in the password field
        $('#password').on('input', function() {
            if ($(this).val().length > 0) {
                $('.password-strength-text').show(); // Show when typing
            } else {
                $('.password-strength-text').hide(); // Hide if the input is empty
            }
        });
    });
</script>


<script>
// Select all input elements with the class 'emppicd'
document.querySelectorAll('.emppicd').forEach(function(input) {
    input.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // Find the closest .dont_show div and update the .previewd image inside it
                const previewImg = event.target.closest('.inner_file_edit').querySelector('.previewd');
                if (previewImg) {
                    previewImg.src = e.target.result;
                }
            };
            reader.readAsDataURL(file);
        }
    });
});

</script>

<div class="member_list">
<ul id="userList"></ul>
</div>
</div>
                  </div>
      <!-- third tab end -->           
</div>
<!-- main tab content end -->
@endforeach
<script>
    function openTab(evt, roleId) {
        // Hide all tab contents
        document.querySelectorAll('.tabcontent').forEach(tab => {
            tab.style.display = 'none';
        });

        // Remove active class from all tab links
        document.querySelectorAll('.tablinks').forEach(link => {
            link.classList.remove('active');
        });

        // Show the current tab and add an active class to the button
        document.getElementById(`tab1${roleId}`).style.display = 'block';
        evt.currentTarget.classList.add('active');

        // Fetch and display data for the selected role
        fetchRoleData(roleId);
    }

    function fetchRoleData(roleId) {
        fetch(`/get-users-by-role/${roleId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok.');
                }
                return response.json();
            })
            .then(data => {
                const container = document.getElementById(`role-users-container${roleId}`);
                container.innerHTML = ''; // Clear previous content

                if (data.users && Array.isArray(data.users)) {
                    data.users.forEach(user => {
                        const userDiv = document.createElement('div');
                        userDiv.className = 'left_embers_detail';
                        userDiv.innerHTML = `
                            <div class="ig_mem">
                               <img src="${user.profile_picture ? '{{ asset('uploads/profile_images/') }}'+'/' + user.profile_picture : '{{ asset('assets/images/default.png') }}'}" alt="Profile Picture">
                            </div>
                            <h3>${user.name}</h3>
                            <b>|</b>
                            <span>${user.role}</span>
                        `;
                        container.appendChild(userDiv);
                    });
                } else {
    container.innerHTML = `
        <div class="gerneal_emptty">
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F"></path>
                <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F"></circle>
            </svg>
            <p>Please add members to set permissions.</p>
            <span>Try adding a member first, in order to delete the role.</span>
        </div>
    `;
}
            })
            .catch(error => {
                console.error('Error fetching user data:', error);
            });
    }
</script>

</div>
@else

<div class="gerneal_emptty">
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.0277 8.93L6.9077 4H8.0477L7.9277 8.93H7.0277ZM7.5077 11.06C7.30103 11.06 7.13103 10.9967 6.9977 10.87C6.87103 10.7367 6.8077 10.58 6.8077 10.4C6.8077 10.2133 6.87103 10.0567 6.9977 9.93C7.13103 9.79667 7.30103 9.73 7.5077 9.73C7.70103 9.73 7.86103 9.79667 7.9877 9.93C8.12103 10.0567 8.1877 10.2133 8.1877 10.4C8.1877 10.58 8.12103 10.7367 7.9877 10.87C7.86103 10.9967 7.70103 11.06 7.5077 11.06Z" fill="#FFDE2F"></path>
                <circle cx="7.5" cy="7.5" r="7" stroke="#FFDE2F"></circle>
            </svg>
            <p>Please add role first.</p>
            <span>Try adding a role first, in order to delete the role.</span>
        </div>

@endif
</div>




</div>
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
.member_list .dropdown {
    display: inline-block;
}

.member_list .dropdown button.dropbtn {
    background: transparent;
    border: 0;
    outline: none;
    box-shadow: none;
    display: flex;
    align-items: center;
    padding: 0;
    pointer-events: none;
}

.dropdown-content .down_del .delet_nt button {
    background: transparent;
    border: none;
    display: inline-flex;
}

    </style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    function updateRolePermission(checkbox, permissionName) {
        const isChecked = checkbox.checked ? 1 : 0;
        const roleId = checkbox.getAttribute('data-role-id');
        const roleName = checkbox.getAttribute('data-role-name');

        // Alert the role ID for debugging
        // alert('Role ID: ' + roleId);

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to update this permission?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const formData = new FormData();
                formData.append('role_id', roleId);
                formData.append('role_name',roleName);
                formData.append(permissionName, isChecked);
                
                // console.log('Permission Name:', permissionName); // Debugging
                // console.log('Checked Value:', isChecked); // Debugging

                fetch('{{ route('update.user.role') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        toastr.success('Permission has been updated.');
                    } else {
                        toastr.error('There was an error updating the permission.');
                    }
                })
                .catch(error => {
                    toastr.error('There was an error updating the permission.');
                });
            } else {
                checkbox.checked = !isChecked;
            }
        });
    }
</script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>
    $(document).ready(function() {
    $('#memberForm').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        var isValid = true;
        var requiredFields = ['#fname', '#lname', '#email', '#password', '#phone', '#Role'];

        // Check if all required fields are filled
        requiredFields.forEach(function(field) {
            if ($(field).val().trim() === '') {
                isValid = false;
                $(field).addClass('is-invalid');
            } else {
                $(field).removeClass('is-invalid');
            }
        });

        if (!isValid) {
            toastr.error('Please fill all required fields.');
            return;
        }

        var formData = new FormData(this);
        var submitButton = $(this).find('button[type="submit"]');

        submitButton.prop('disabled', true); // Disable the submit button

        $.ajax({
            url: "{{ route('members') }}",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                submitButton.prop('disabled', false); // Enable the submit button

                if (response.status === 'success') {
                    toastr.success(response.message);
                    setTimeout(function() {
                        location.reload(); // Refresh the page after a short delay
                    }, 1000); // 1 second delay
                } else {
                    toastr.error(response.message);
                }
            },
            error: function(xhr) {
                submitButton.prop('disabled', false); // Enable the submit button

                // Get the error message from the response
                var errorMessage = xhr.responseJSON ? xhr.responseJSON.message : 'An error occurred. Please try again.';
                toastr.error(errorMessage);
                setTimeout(function() {
                        location.reload(); // Refresh the page after a short delay
                    }, 1000); // 1 second delay
            }
        });
    });



        // Real-time validation for enabling/disabling the submit button
        $('input, select').on('input change', function() {
            var allFieldsFilled = requiredFields.every(function(field) {
                return $(field).val().trim() !== '';
            });

            $('#memberForm').find('button[type="submit"]').prop('disabled', !allFieldsFilled);
        });
    });
</script>


    @endsection
    
    <style>
  /***pop dasbord animation css start***/
  #loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.8);
    /* White background with 80% opacity */
    z-index: 9999;
    /* Make sure the overlay is on top of everything */
    display: flex;
    justify-content: center;
    align-items: center;
  }

  #aniation_dash .modal-dialog {
    min-width: 90%;
  }

  #aniation_dash .modal-dialog .modal-content {
    background: transparent;
    border: 0;
    height: 90vh;
    position: relative;
  }

  #aniation_dash .modal-dialog .modal-header {
    border: 0;
    padding: 0;
  }

  #aniation_dash .modal-dialog iframe {
    height: 100% !important;
    width: 100% !important;
  }

  #aniation_dash {
    background: rgba(255, 255, 255, 0.8);
  }

  #aniation_dash button.close {
    position: absolute;
    right: 0;
    top: 0;
    z-index: 9;
    border-radius: 50px !IMPORTANT;
    width: 30px;
    height: 30px;
    background: #FFF;
    border: 0;
    padding: 10px;
  }

  #aniation_dash button.close svg {
    width: 100%;
    height: 100%;
  }
  
  .pasward_wrap {
    flex: 2;
    position: relative;
}

.pasward_wrap .password-strength-text {
    font-size: 9px;
    text-align: left;
}


  /***pop dasbord animation css end***/
  </style>
   

   
