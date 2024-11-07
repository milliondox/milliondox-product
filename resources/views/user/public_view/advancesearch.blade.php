@extends('user.includes.advancesearch') @section('content')
   
   <!-- tap on top starts-->
     
    <div class="tap-top">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-up"><polyline points="17 11 12 6 7 11"></polyline><polyline points="17 18 12 13 7 18"></polyline></svg>
    </div>
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
      <!-- Page Body Start-->
      <div class="page-body-wrapper publiklink advance_search">
        <div class="container">
            
            <div class="public_header">
                <div class="pu_head">
                <a href="{{url('/docurepo')}}" class="go_back_dashboard">
<div class="mill"><span class="milliondox">
<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M11 6H1M1 6L5.5 1.5M1 6L5.5 10.5" stroke="#C5C5C5"/>
</svg>   
BACK TO DASHBOARD</span></div>
</a>    
                <h2>Advanced Search</h2>
                </div>
 
 <div class="search-box">
  <input type="text" placeholder="Search anything" class="search-input" id="search-input">
    <button type="submit" class="search-btn" id="search-btn">
     <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_3297_4025)">
<path d="M11.4038 13.4883L16.4038 18.4883M7.23714 15.1549C8.00319 15.1549 8.76173 15.0041 9.46946 14.7109C10.1772 14.4178 10.8203 13.9881 11.3619 13.4464C11.9036 12.9047 12.3333 12.2617 12.6264 11.5539C12.9196 10.8462 13.0705 10.0877 13.0705 9.32161C13.0705 8.55557 12.9196 7.79703 12.6264 7.08929C12.3333 6.38156 11.9036 5.7385 11.3619 5.19682C10.8203 4.65515 10.1772 4.22547 9.46946 3.93232C8.76173 3.63916 8.00319 3.48828 7.23714 3.48828C5.69005 3.48828 4.20631 4.10286 3.11235 5.19682C2.01839 6.29079 1.40381 7.77452 1.40381 9.32161C1.40381 10.8687 2.01839 12.3524 3.11235 13.4464C4.20631 14.5404 5.69005 15.1549 7.23714 15.1549Z" stroke="#CEFFA8" stroke-width="1.5"/>
<path d="M16.8932 -0.0390625V3.02912H19.9614V4.39276H16.8932V7.46094H15.5296V4.39276H12.4614V3.02912H15.5296V-0.0390625H16.8932Z" fill="#CEFFA8"/>
</g>
<defs>
<clipPath id="clip0_3297_4025">
<rect width="20" height="20" fill="white" transform="translate(0.153809 0.154297)"/>
</clipPath>
</defs>
</svg>
    </button>
</div>

            </div>
            
            
        <div class="filters">
            <div class="filter_wrap">
        <div class="dropdown properties">
            <div class="dorp_actvee" onclick="toggleDropdown('properties-dropdown')">
            <svg width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.5 8.125C5.5 7.95924 5.56585 7.80027 5.68306 7.68306C5.80027 7.56585 5.95924 7.5 6.125 7.5H9.875C10.0408 7.5 10.1997 7.56585 10.3169 7.68306C10.4342 7.80027 10.5 7.95924 10.5 8.125C10.5 8.29076 10.4342 8.44973 10.3169 8.56694C10.1997 8.68415 10.0408 8.75 9.875 8.75H6.125C5.95924 8.75 5.80027 8.68415 5.68306 8.56694C5.56585 8.44973 5.5 8.29076 5.5 8.125ZM3 4.375C3 4.20924 3.06585 4.05027 3.18306 3.93306C3.30027 3.81585 3.45924 3.75 3.625 3.75H12.375C12.5408 3.75 12.6997 3.81585 12.8169 3.93306C12.9342 4.05027 13 4.20924 13 4.375C13 4.54076 12.9342 4.69973 12.8169 4.81694C12.6997 4.93415 12.5408 5 12.375 5H3.625C3.45924 5 3.30027 4.93415 3.18306 4.81694C3.06585 4.69973 3 4.54076 3 4.375ZM0.5 0.625C0.5 0.45924 0.565848 0.300269 0.683058 0.183058C0.800269 0.0658481 0.95924 0 1.125 0H14.875C15.0408 0 15.1997 0.0658481 15.3169 0.183058C15.4342 0.300269 15.5 0.45924 15.5 0.625C15.5 0.79076 15.4342 0.949731 15.3169 1.06694C15.1997 1.18415 15.0408 1.25 14.875 1.25H1.125C0.95924 1.25 0.800269 1.18415 0.683058 1.06694C0.565848 0.949731 0.5 0.79076 0.5 0.625Z" fill="#CEFFA8"/>
</svg>
Properties <span><svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5 6.00033L0 0.666992H10L5 6.00033Z" fill="#AAAAAA"/>
</svg>
</span>
</div>

              <div id="properties-dropdown" class="dropdown-content">
                  
<div class="rap_repaert">
        <h2 class="app_tile">FILE TYPE</h2>
<!-- repeat me -->
<!--<div class="rop_check">-->
<!--<input type="checkbox" id="check1" name="check1" value="">-->
<!--<label for="check1">-->
<!--<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--<path fill-rule="evenodd" clip-rule="evenodd" d="M0.5525 2.9435C0.5 3.2195 0.5 3.551 0.5 4.2125V9.5C0.5 12.3282 0.5 13.7427 1.379 14.621C2.25725 15.5 3.67175 15.5 6.5 15.5H9.5C12.3282 15.5 13.7427 15.5 14.621 14.621C15.5 13.7427 15.5 12.3282 15.5 9.5V7.8485C15.5 5.8745 15.5 4.88675 14.9225 4.2455C14.8695 4.18631 14.8135 4.12998 14.7545 4.07675C14.1132 3.5 13.1255 3.5 11.1515 3.5H10.871C10.0062 3.5 9.5735 3.5 9.17 3.38525C8.94857 3.32195 8.73516 3.23337 8.534 3.12125C8.168 2.918 7.862 2.61125 7.25 2L6.8375 1.5875C6.632 1.382 6.53 1.28 6.422 1.19C5.9575 0.80498 5.3877 0.568958 4.787 0.51275C4.6475 0.5 4.502 0.5 4.2125 0.5C3.55025 0.5 3.2195 0.5 2.9435 0.5525C2.35088 0.664418 1.80575 0.952352 1.37923 1.37874C0.952709 1.80512 0.664604 2.35091 0.5525 2.9435ZM8.1875 6.5C8.1875 6.35082 8.24676 6.20774 8.35225 6.10225C8.45774 5.99676 8.60081 5.9375 8.75 5.9375H12.5C12.6492 5.9375 12.7923 5.99676 12.8977 6.10225C13.0032 6.20774 13.0625 6.35082 13.0625 6.5C13.0625 6.64918 13.0032 6.79226 12.8977 6.89775C12.7923 7.00324 12.6492 7.0625 12.5 7.0625H8.75C8.60081 7.0625 8.45774 7.00324 8.35225 6.89775C8.24676 6.79226 8.1875 6.64918 8.1875 6.5Z" fill="#E7E7E7"/>-->
<!--</svg>-->
<!--Folder-->
<!--</label>-->
<!--</div>-->
<!-- repeat me -->

<!-- repeat me -->
<div class="rop_check custfile">
<input type="checkbox" id="check2" name="check2" value="">
<label for="check2">
<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_3297_3790)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M9.1875 2.1255C8.8425 2.067 8.3715 2.0625 7.5225 2.0625C6.08475 2.0625 5.0625 2.064 4.2885 2.1675C3.5295 2.26875 3.09375 2.46 2.7765 2.7765C2.45925 3.09375 2.26875 3.52875 2.1675 4.28325C2.064 5.05425 2.0625 6.06975 2.0625 7.50075V10.5008C2.0625 11.9303 2.064 12.9457 2.1675 13.7167C2.26875 14.4712 2.45925 14.9062 2.7765 15.2242C3.09375 15.5407 3.52875 15.7313 4.28325 15.8325C5.05425 15.9368 6.06975 15.9375 7.5 15.9375H10.5C11.9303 15.9375 12.9465 15.936 13.7175 15.8325C14.4713 15.7313 14.9062 15.5408 15.2235 15.2235C15.5408 14.9062 15.7313 14.4712 15.8325 13.7167C15.936 12.9465 15.9375 11.9303 15.9375 10.5V10.1722C15.9375 9.02025 15.93 8.47425 15.807 8.0625H13.4595C12.6097 8.0625 11.916 8.0625 11.367 7.989C10.7948 7.91175 10.2983 7.74525 9.9015 7.3485C9.50475 6.95175 9.33825 6.456 9.261 5.88225C9.1875 5.33475 9.1875 4.64025 9.1875 3.78975V2.1255ZM10.3125 2.7075V3.75C10.3125 4.65 10.314 5.268 10.3763 5.73225C10.4362 6.18075 10.5442 6.4005 10.6972 6.55275C10.8495 6.70575 11.0693 6.81375 11.5177 6.87375C11.982 6.936 12.6 6.9375 13.5 6.9375H15.015C14.7272 6.66345 14.4346 6.3944 14.1375 6.1305L11.1683 3.45825C10.8881 3.20221 10.6028 2.9519 10.3125 2.7075ZM7.63125 0.9375C8.67 0.9375 9.34125 0.9375 9.9585 1.17375C10.5758 1.41075 11.0723 1.85775 11.841 2.55L11.9213 2.622L14.8898 5.29425L14.9835 5.37825C15.8715 6.177 16.446 6.69375 16.7543 7.38675C17.0632 8.07975 17.0632 8.85225 17.0625 10.0463V10.542C17.0625 11.9205 17.0625 13.0125 16.9478 13.8668C16.8293 14.7458 16.5802 15.4575 16.0192 16.0192C15.4575 16.5802 14.7458 16.8293 13.8668 16.9478C13.0118 17.0625 11.9205 17.0625 10.542 17.0625H7.458C6.0795 17.0625 4.9875 17.0625 4.13325 16.9478C3.25425 16.8293 2.5425 16.5802 1.98075 16.0192C1.41975 15.4575 1.17075 14.7458 1.05225 13.8668C0.9375 13.0118 0.9375 11.9205 0.9375 10.542V7.45875C0.9375 6.08025 0.9375 4.98825 1.05225 4.134C1.17075 3.255 1.41975 2.54325 1.98075 1.9815C2.54325 1.41975 3.2565 1.1715 4.13925 1.053C4.99725 0.93825 6.0945 0.93825 7.4805 0.93825H7.5225L7.63125 0.9375Z" fill="#E7E7E7"/>
<path d="M4.78932 11.75V6.71H6.39582C6.43782 6.71 6.52065 6.71117 6.64432 6.7135C6.77032 6.71583 6.89165 6.724 7.00832 6.738C7.40732 6.78933 7.74448 6.93167 8.01982 7.165C8.29748 7.396 8.50748 7.69117 8.64982 8.0505C8.79215 8.40983 8.86332 8.803 8.86332 9.23C8.86332 9.657 8.79215 10.0502 8.64982 10.4095C8.50748 10.7688 8.29748 11.0652 8.01982 11.2985C7.74448 11.5295 7.40732 11.6707 7.00832 11.722C6.89398 11.736 6.77382 11.7442 6.64782 11.7465C6.52182 11.7488 6.43782 11.75 6.39582 11.75H4.78932ZM5.64682 10.9555H6.39582C6.46582 10.9555 6.55448 10.9532 6.66182 10.9485C6.77148 10.9438 6.86832 10.9333 6.95232 10.917C7.19032 10.8727 7.38398 10.7665 7.53332 10.5985C7.68265 10.4305 7.79232 10.2263 7.86232 9.986C7.93465 9.74567 7.97082 9.49367 7.97082 9.23C7.97082 8.957 7.93465 8.70033 7.86232 8.46C7.78998 8.21967 7.67798 8.01783 7.52632 7.8545C7.37698 7.69117 7.18565 7.58733 6.95232 7.543C6.86832 7.52433 6.77148 7.51383 6.66182 7.5115C6.55448 7.50683 6.46582 7.5045 6.39582 7.5045H5.64682V10.9555Z" fill="#ABABAB"/>
</g>
<defs>
<clipPath id="clip0_3297_3790">
<rect width="18" height="18" fill="white"/>
</clipPath>
</defs>
</svg>
Custom Files
</label>
</div>
<!-- repeat me -->

<!-- repeat me -->
<div class="rop_check prefile">
<input type="checkbox" id="check3" name="check3" value="">
<label for="check3">
<svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M10.2597 2.04085C9.92852 1.98469 9.47637 1.98037 8.66134 1.98037C7.28112 1.98037 6.29978 1.98181 5.55675 2.08117C4.82812 2.17837 4.40981 2.36197 4.10525 2.6658C3.8007 2.97036 3.61782 3.38795 3.52062 4.11226C3.42127 4.85241 3.41983 5.82727 3.41983 7.20101V10.081C3.41983 11.4533 3.42127 12.4281 3.52062 13.1683C3.61782 13.8926 3.8007 14.3102 4.10525 14.6154C4.40981 14.9193 4.8274 15.1022 5.55171 15.1994C6.29186 15.2994 7.26672 15.3002 8.63974 15.3002H11.5197C12.8927 15.3002 13.8683 15.2987 14.6084 15.1994C15.332 15.1022 15.7496 14.9193 16.0542 14.6147C16.3587 14.3102 16.5416 13.8926 16.6388 13.1683C16.7382 12.4288 16.7396 11.4533 16.7396 10.0802V9.76561C16.7396 8.6597 16.7324 8.13555 16.6143 7.74028H14.3608C13.545 7.74028 12.879 7.74028 12.352 7.66972C11.8026 7.59556 11.326 7.43573 10.9451 7.05485C10.5643 6.67398 10.4044 6.19806 10.3303 5.64727C10.2597 5.12168 10.2597 4.45497 10.2597 3.63851V2.04085ZM11.3397 2.59956V3.60035C11.3397 4.46433 11.3411 5.0576 11.4009 5.50328C11.4585 5.93383 11.5622 6.14479 11.7091 6.29094C11.8552 6.43782 12.0662 6.5415 12.4967 6.5991C12.9424 6.65886 13.5357 6.6603 14.3996 6.6603H15.854C15.5777 6.39721 15.2969 6.13893 15.0116 5.88559L12.1612 3.32027C11.8923 3.07447 11.6184 2.83419 11.3397 2.59956ZM8.76574 0.900391C9.76292 0.900391 10.4073 0.900391 10.9999 1.12719C11.5924 1.3547 12.069 1.78382 12.807 2.44837L12.8841 2.51748L15.7338 5.0828L15.8238 5.16344C16.6762 5.93023 17.2278 6.4263 17.5237 7.09157C17.8203 7.75684 17.8203 8.49843 17.8196 9.64465V10.1206C17.8196 11.4439 17.8196 12.4922 17.7094 13.3123C17.5957 14.1561 17.3566 14.8394 16.8181 15.3786C16.2788 15.9172 15.5955 16.1562 14.7517 16.27C13.9309 16.3801 12.8834 16.3801 11.56 16.3801H8.59942C7.27608 16.3801 6.22778 16.3801 5.40771 16.27C4.56389 16.1562 3.88062 15.9172 3.34135 15.3786C2.8028 14.8394 2.56376 14.1561 2.45 13.3123C2.33984 12.4915 2.33984 11.4439 2.33984 10.1206V7.16069C2.33984 5.83735 2.33984 4.78905 2.45 3.96898C2.56376 3.12515 2.8028 2.44189 3.34135 1.90261C3.88134 1.36334 4.56605 1.12503 5.41347 1.01127C6.23714 0.901111 7.29048 0.901111 8.62102 0.901111H8.66134L8.76574 0.900391Z" fill="#E7E7E7"/>
<ellipse cx="4.31993" cy="12.9586" rx="4.31993" ry="4.31993" fill="#515151"/>
<path d="M2.65399 15.1992V10.8792H3.19399L5.44699 14.2542V10.8792H5.98699V15.1992H5.44699L3.19399 11.8212V15.1992H2.65399Z" fill="#E7E7E7"/>
</svg>
Pre-Defined Files
</label>
</div>
<!-- repeat me -->

</div>

<!--<div class="rap_repaert">-->
<!--<h2 class="app_tile">LAST MODIFIED</h2>-->
<!--<div class="last_modi">-->
<!--    <div class="from_date">-->
<!--<label for="start">From Date</label>-->
<!--         <input type="date" id="start" name="startdate" required="">-->
<!--    </div>-->
    
<!--        <div class="from_date">-->
<!--<label for="end">Upto Date</label>-->
<!--         <input type="date" id="end" name="enddate" required="">-->
<!--    </div>-->
   

<!--</div>-->
        
<!--  </div>-->
                </div>
                
</div>

<script>
    $(document).ready(function() {
    // Function to update the selected filters
    function updateSelectedFilters() {
        let selectedFilters = [];
        
        // Iterate through each checkbox and collect the labels of checked ones
        $('#properties-dropdown input[type="checkbox"]:checked').each(function() {
            selectedFilters.push($(this).next('label').text());
        });

        // Display selected filters
        if (selectedFilters.length > 0) {
            $('#selected-filters').html('<strong>Selected Filters:</strong> ' + selectedFilters.join(', '));
        } else {
            $('#selected-filters').html('<em>No filters selected</em>');
        }
    }

    // Bind change event to checkboxes
    $('#properties-dropdown input[type="checkbox"]').change(function() {
        updateSelectedFilters();
    });

    // Initialize selected filters display
    updateSelectedFilters();
});
// $(document).ready(function () {
//     // Function to update the selected filters
//     function updateSelectedFilters() {
//         let selectedFilters = [];

//         // Get selected financial year
//         let selectedYear = $('#fyear_one_f1').find('option:selected').text();
//         if (selectedYear && selectedYear !== 'Financial Year') {
//             selectedFilters.push(selectedYear);
//         }

//         // Get selected period radio button
//         let selectedPeriod = $('input[name="period"]:checked').next('label').text();
//         if (selectedPeriod) {
//             selectedFilters.push(selectedPeriod);
//         }

//         // Get selected half-yearly or quarterly
//         let activeHalfYear = $('.list_month ul li.active').text();
//         if (activeHalfYear) {
//             selectedFilters.push(activeHalfYear.trim());
//         }

//         let activeQuarter = $('.repate_quoter_calander.active span').text();
//         if (activeQuarter) {
//             selectedFilters.push(activeQuarter);
//         }

//         // Get selected calendar option
//         let selectedCalendar = $('input[name="calendar"]:checked').next('label').text();
//         if (selectedCalendar) {
//             selectedFilters.push(selectedCalendar);
//         }

//         // Display selected filters
//         if (selectedFilters.length > 0) {
//             $('#selected-filters').html('<strong>Selected Filters:</strong> ' + selectedFilters.join(', '));
//         } else {
//             $('#selected-filters').html('<em>No filters selected</em>');
//         }
//     }

//     // Bind change event to dropdown and radio buttons
//     $('#fyear_one_f1').change(function () {
//         updateSelectedFilters();
//     });

//     $('input[type="radio"]').change(function () {
//         updateSelectedFilters();
//     });

//     // Initialize selected filters display
//     updateSelectedFilters();
// });

// function toggleDropdown(dropdownId) {
//     const dropdown = document.getElementById(dropdownId);
//     dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
// }

// function clearFilter() {
//     // Reset the dropdown selection
//     $('#fyear_one_f1').prop('selectedIndex', 0);

//     // Clear all radio button selections
//     $('input[type="radio"]').prop('checked', false);

//     // Reset the active classes
//     $('.list_month ul li, .repate_quoter_calander').removeClass('active');

//     // Reset default radio button selections
//     $('#single').prop('checked', true);
//     $('.list_month ul li:first-child').addClass('active');
//     $('.repate_quoter_calander:first-child').addClass('active');

//     // Hide the dropdown
//     $('#period-dropdown').hide();

//     // Update the displayed filters
//     updateSelectedFilters();
// }

</script>
        <div class="dropdown period">
            <div class="dorp_actvee" onclick="toggleDropdown('period-dropdown')">
            <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10.6667 12.667H1.33333V5.33366H10.6667M8.66667 0.666992V2.00033H3.33333V0.666992H2V2.00033H1.33333C0.593333 2.00033 0 2.59366 0 3.33366V12.667C0 13.0206 0.140476 13.3598 0.390524 13.6098C0.640573 13.8598 0.979711 14.0003 1.33333 14.0003H10.6667C11.0203 14.0003 11.3594 13.8598 11.6095 13.6098C11.8595 13.3598 12 13.0206 12 12.667V3.33366C12 2.98004 11.8595 2.6409 11.6095 2.39085C11.3594 2.1408 11.0203 2.00033 10.6667 2.00033H10V0.666992M9.33333 8.00033H6V11.3337H9.33333V8.00033Z" fill="#CEFFA8"/>
</svg> Period <span><svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5 6.00033L0 0.666992H10L5 6.00033Z" fill="#AAAAAA"/>
</svg>
</span>
</div>
  <div id="period-dropdown" class="dropdown-content">
      
      <!---->
      <div class="new_sllert">
  <select id="fyear_one_f1" name="fyear_one">
            <option value="" disabled="" selected="">Financial Year</option>
            <option value="2013-2014">2013-2014</option>
              <option value="2014-2015">2014-2015</option>
               <option value="2015-2016">2015-2016</option>
                <option value="2016-2017">2016-2017</option>
                 <option value="2017-2018">2017-2018</option>
                  <option value="2018-2019">2018-2019</option>
                   <option value="2019-2020">2019-2020</option>
                  
            <option value="2020-2021">2020-2021</option>
            <option value="2021-2022">2021-2022</option>
            <option value="2022-2023">2022-2023</option>
            <option value="2023-2024">2023-2024</option>
            <option value="2024-2025">2024-2025</option>
            <option value="2025-2026">2025-2026</option>
             <option value="2026-2027">2026-2027</option>

              <option value="2027-2028">2027-2028</option>
               <option value="2028-2029">2028-2029</option>
                <option value="2029-2030">2029-2030</option>
                 <option value="2030-2031">2030-2031</option>
                  <option value="2031-2032">2031-2032</option>
                   <option value="2032-2033">2032-2033</option>
                    <option value="2033-2034">2033-2034</option>
                     <option value="2034-2035">2034-2035</option>
                      <option value="2035-2036">2035-2036</option>
                       <option value="2036-2037">2036-2037</option>
        </select>
  </div>
  
  
        <div class="radio_on select">
            <input type="radio" id="half-yearly" name="period" value="half-yearly">
            <label for="half-yearly">HALF YEARLY</label>
        </div>
        <div class="list_month">
            <ul>
                <li class="active">HY1 <span>April-September</span></li>
                <li>HY2 <span>October-March</span></li>
            </ul>
        </div>

        <div class="radio_on select">
            <input type="radio" id="quarterly" name="period" value="quarterly">
            <label for="quarterly">QUARTERLY</label>
        </div>
        <div class="main_quatot_calander">
            <div class="repate_quoter_calander active">
                <span>Q1</span>
            </div>
            <div class="repate_quoter_calander">
                <span>Q2</span>
            </div>
            <div class="repate_quoter_calander">
                <span>Q3</span>
            </div>
            <div class="repate_quoter_calander">
                <span>Q4</span>
            </div>
        </div>

        <div class="radio_on select">
            <input type="radio" id="custom-dates" name="period" value="custom-dates">
            <label for="custom-dates">CUSTOM DATES</label>
        </div>
        <div class="radio_two_calander">
            <div class="two_radio_repeat">
                <input type="radio" id="single" name="calendar" value="single" checked>
                <label for="single">Select Single</label>
            </div>
            <div class="two_radio_repeat">
                <input type="radio" id="range" name="calendar" value="range">
                <label for="range">Select Range</label>
            </div>
        </div>
        <div id="calendar-container" class="calendar-container new_range_custom_calander"></div>

    <!-- Include jQuery and Flatpickr JS from CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // Script for enabling/disabling sections based on radio button selection
        document.addEventListener('DOMContentLoaded', function() {
            const halfYearlyRadio = document.getElementById('half-yearly');
            const quarterlyRadio = document.getElementById('quarterly');
            const customDatesRadio = document.getElementById('custom-dates');

            const halfYearlyContent = document.querySelector('.list_month');
            const quarterlyContent = document.querySelector('.main_quatot_calander');
            const customDatesContent = document.querySelector('.radio_two_calander');
            const calendarContainer = document.getElementById('calendar-container');

            function handlePeriodChange() {
                halfYearlyContent.classList.remove('active-section');
                quarterlyContent.classList.remove('active-section');
                customDatesContent.classList.remove('active-section');
                calendarContainer.classList.remove('active-section');

                if (halfYearlyRadio.checked) {
                    halfYearlyContent.classList.add('active-section');
                } else if (quarterlyRadio.checked) {
                    quarterlyContent.classList.add('active-section');
                } else if (customDatesRadio.checked) {
                    customDatesContent.classList.add('active-section');
                    calendarContainer.classList.add('active-section');
                }
            }

            halfYearlyRadio.addEventListener('change', handlePeriodChange);
            quarterlyRadio.addEventListener('change', handlePeriodChange);
            customDatesRadio.addEventListener('change', handlePeriodChange);

            handlePeriodChange();
        });

        // Separate script for handling custom date picker
        document.addEventListener('DOMContentLoaded', function() {
            const singleRadio = document.getElementById('single');
            const rangeRadio = document.getElementById('range');
            const calendarContainer = document.getElementById('calendar-container');

            function loadSingleCalendar() {
                calendarContainer.innerHTML = '';

                const singleCalendar = document.createElement('div');
                singleCalendar.id = 'single-calendar';
                calendarContainer.appendChild(singleCalendar);

                flatpickr('#single-calendar', {
                    inline: true
                });
            }

            function loadRangeCalendar() {
                calendarContainer.innerHTML = '';

                const rangeCalendar = document.createElement('div');
                rangeCalendar.id = 'range-calendar';
                calendarContainer.appendChild(rangeCalendar);

                flatpickr('#range-calendar', {
                    mode: 'range',
                    inline: true
                });
            }

            singleRadio.addEventListener('change', function() {
                if (this.checked) {
                    loadSingleCalendar();
                }
            });

            rangeRadio.addEventListener('change', function() {
                if (this.checked) {
                    loadRangeCalendar();
                }
            });

            loadSingleCalendar();
        });
    </script>

      <!---->
      
    </div>
</div>


        <div class="dropdown keywords">
                        <div class="dorp_actvee" onclick="toggleDropdown('keywords-dropdown')">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8 0.5C3.858 0.5 0.5 3.85775 0.5 8C0.5 12.1423 3.858 15.5 8 15.5C12.142 15.5 15.5 12.142 15.5 8C15.5 3.85775 12.142 0.5 8 0.5ZM9.79175 11.627L9.31325 10.1357H6.64175L6.15 11.627H4.5645L7.154 4.373H8.86875L11.4353 11.627H9.79175Z" fill="#CEFFA8"/>
</svg> Keywords <span><svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5 6.00033L0 0.666992H10L5 6.00033Z" fill="#AAAAAA"/>
</svg>
</span>

</div>
  <div id="keywords-dropdown" class="dropdown-content">
      <div class="keybrd_main">
        <h2 class="app_tile">CHOOSE TAGS</h2>
        
    <select id="choose_tags" name="choose_tags">
    <option value="" disabled="" selected="">Choose</option>
    <option value="Workings">Workings</option>
    <option value="Challan">Challan</option>
    <option value="Workings">Workings</option>
    <option value="Return">Return</option>
    <option value="Acknowledgement">Acknowledgement</option>
    <option value="Notices">Notices</option>
    <option value="Responses">Responses</option>
    <option value="Orders">Orders</option>
    <option value="Quarter (Q1-Q4)">Quarter (Q1-Q4)</option>
    <option value="GSTR-1">GSTR-1</option>
    <option value="GSTR 3B">GSTR 3B</option>
    <option value="GSTR 9">GSTR 9</option>
    <option value="GSTR 9C">GSTR 9C</option>
    <option value="Acceptance Letter">Acceptance Letter</option>
    <option value="Employment Agreement">Employment Agreement</option>
    <option value="Non Disclosure Agreement">Non Disclosure Agreement</option>
    <option value="Non-compete">Non-compete</option>
    <option value="Contractual Bond">Contractual Bond</option>
    <option value="Form 11 - EPF">Form 11 - EPF</option>
    <option value="Form 12BB - Income Tax">Form 12BB - Income Tax</option>
    <option value="Resignation letter">Resignation letter</option>
    <option value="Experience Letter">Experience Letter</option>
    <option value="No Dues certificate">No Dues certificate</option>
  </select>
  
         </div>
         
    </div>
    
</div>

      {{--   <div class="dropdown location">
                        <div class="dorp_actvee" onclick="toggleDropdown('location-dropdown')">
            <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2.49994 0.250002C1.96858 0.249211 1.45409 0.436499 1.04758 0.778694C0.641082 1.12089 0.368803 1.59591 0.278973 2.11962C0.189143 2.64333 0.287558 3.18193 0.556789 3.64004C0.826019 4.09814 1.24869 4.44617 1.74994 4.6225V10.75C1.74994 11.3467 1.98699 11.919 2.40895 12.341C2.83091 12.7629 3.4032 13 3.99994 13H9.37744C9.55437 13.5006 9.90259 13.9226 10.3605 14.1913C10.8185 14.46 11.3567 14.5581 11.88 14.4684C12.4034 14.3786 12.8781 14.1067 13.2203 13.7008C13.5626 13.2948 13.7503 12.781 13.7503 12.25C13.7503 11.719 13.5626 11.2052 13.2203 10.7992C12.8781 10.3933 12.4034 10.1214 11.88 10.0316C11.3567 9.94189 10.8185 10.04 10.3605 10.3087C9.90259 10.5774 9.55437 10.9994 9.37744 11.5H3.99994C3.80103 11.5 3.61026 11.421 3.46961 11.2803C3.32896 11.1397 3.24994 10.9489 3.24994 10.75V7.75H9.37744C9.55437 8.25062 9.90259 8.67257 10.3605 8.94127C10.8185 9.20997 11.3567 9.30812 11.88 9.21836C12.4034 9.1286 12.8781 8.85673 13.2203 8.45078C13.5626 8.04484 13.7503 7.53097 13.7503 7C13.7503 6.46904 13.5626 5.95517 13.2203 5.54922C12.8781 5.14328 12.4034 4.8714 11.88 4.78164C11.3567 4.69189 10.8185 4.79003 10.3605 5.05873C9.90259 5.32743 9.55437 5.74938 9.37744 6.25H3.24994V4.6225C3.7503 4.44539 4.17197 4.09714 4.44046 3.63928C4.70895 3.18141 4.80699 2.64339 4.71726 2.12025C4.62753 1.5971 4.3558 1.12251 3.95007 0.780286C3.54434 0.438067 3.03072 0.250246 2.49994 0.250002Z" fill="#CEFFA8"/>
</svg>
 Location <span><svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5 6.00033L0 0.666992H10L5 6.00033Z" fill="#AAAAAA"/>
</svg>
</span>
</div>
  <div id="location-dropdown" class="dropdown-content">
   <div class="location_main">
      <h2 class="app_tile">
        @if($category && $section && $subsection)
            {{ $category }} / {{ $section }} / {{ $subsection }}
        @else
            SELECT PATH
        @endif
    </h2>
         </div>
    </div>
    
</div> --}}


        </div>
        <button id="apply-filter" class="apply-filter">Apply Filter</button>
    </div>
       <div id="selected-filters" style="margin-top: 20px; color:white;"></div>    
       <!--<button onclick="clearFilter()">Clear Filter</button>-->
      <div class="entery_body table-responsive">
          
           <div id="search-results"></div>
          <div id="exact-match-results"></div>
          <div id="no-data" style="display:none;">No data found</div>



</div>
      

</div>
        </div>
		</div>
<script>
    $(document).ready(function() {
        function formatFileSize(size) {
            if (size === null || size === undefined) {
                return 'N/A';
            }
            if (size < 1024) {
                return size + ' B'; // Bytes
            } else if (size < 1024 * 1024) {
                return (size / 1024).toFixed(2) + ' KB'; // Kilobytes
            } else {
                return (size / (1024 * 1024)).toFixed(2) + ' MB'; // Megabytes
            }
        }
         document.addEventListener('DOMContentLoaded', function() {
        // Load notices when the page loads
        loadNotices();
    });

    function loadNotices() {
        // Fetch the URL parameters to ensure it's the right section
        const urlParams = new URLSearchParams(window.location.search);
        const category = urlParams.get('category');
        const section = urlParams.get('section');
        const subsection = urlParams.get('subsection');

        // Only load if the correct category, section, and subsection are provided
        if (category === 'Secretarial' && section === 'Board Meetings' && subsection === 'Notices') {
            fetch('{{ url("/showAdvSearch") }}?category=Secretarial&section=Board Meetings&subsection=Notices', {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest' // Ensure AJAX request
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log('Notice Data:', data.boardNotices);
                renderResults(data.boardNotices, '#search-results');
            })
            .catch(error => {
                console.error('Fetch Error:', error);
            });
        }
    }

           function renderResults(data, target) {
            if (!Array.isArray(data)) {
                console.error('Invalid data format:', data);
                $(target).empty().html('<p>No data available</p>');
                return;
            }

            let tableHtml = '<table class="table table-striped"><thead><tr><th>File Name</th><th>Owner</th><th>Tag</th><th>Size</th><th>Date Created</th><th>Path</th><th>Year</th><th>Action</th></tr></thead><tbody>';

            data.forEach(item => {
                let path = item.source_table ? `/board-details/${item.id}` : `/download-file/${item.id}`;
                let size = formatFileSize(item.file_size);
                // Change created_date to created_at to match the returned JSON property
                let createdDate = item.created_at ? new Date(item.created_at).toLocaleDateString() : 'N/A';
                let location = item.real_file_name ? item.real_file_name : 'N/A';
                let filePath = item.location ? item.location : 'N/A'; 
                let userName = item.user_name ? item.user_name : 'N/A';
                let tag = item.Tags ? (Array.isArray(item.Tags) ? item.Tags : [item.Tags]) : ['N/A']; 
                console.log(typeof(tag));
                let newtag = '';
tag.forEach((element, index) => {
  newtag += element;
  if (index < tag.length - 1) {
    newtag += ', ';
  }
});
                let fyear = item.fyear ? item.fyear : 'N/A';

                tableHtml += `<tr>
                                <td>${location}</td>
                                <td>${userName}</td>
                                <td>${newtag} </td>
                                <td>${size}</td>
                                <td>${createdDate}</td>
                               
                                <td>${filePath}</td>
                                <td>${fyear}</td>
                                <td><a class="dropdown-item buttonss delete" data-id="${item.id}">
                               Delete</a>
                               <a class="dropdown-item buttonss view"  data-id="${item.id}">
                               View</a>
                               <a class="dropdown-item buttonss download_nt" data-id="${item.id}">
                               Download</a></td>
                            </tr>`;
            });

            tableHtml += '</tbody></table>';
            $(target).html(tableHtml);
        }
  
 function loadNotices() {
        $.ajax({
            url: '{{ url("/showAdvSearch") }}',
            method: 'GET',
            dataType: 'json',
            data: {
            category: @json($category),
            section: @json($section),
            subsection: @json($subsection)
        },
        success: function(response) {
            renderResults(response.results, '#search-results');
        },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
                $('#search-results').html('<p>Error loading data</p>');
            }
        });
    }

    // Function to check if URL parameters are present
    function hasUrlParameters() {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.has('category') && urlParams.has('section') && urlParams.has('subsection');
    }

    // Load notices only if URL parameters are present
    $(document).ready(function() {
        if (hasUrlParameters()) {
            loadNotices();
        } else {
           
        }
    });
        function performSearch() {
            let query = $('#search-input').val().trim();
            let fyear = $('#fyear_one_f1').val(); // Get the selected financial year
            let preDefinedFilesOnly = $('#check3').is(':checked'); // Check the checkbox state

            if (query === '') {
                $('#search-results').empty();
                return;
            }

            $.ajax({
                url: '{{ route("live-search") }}',
                method: 'GET',
                data: { query: query, fyear: fyear, preDefinedFilesOnly: preDefinedFilesOnly }, // Include checkbox state in the request
                success: function(data) {
                    console.log('Live Search Data:', data); // Log the data to check its structure
                    renderResults(data, '#search-results');
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });
        }

        // Bind search functionality to the "Apply Filter" button
        $('#apply-filter').on('click', function() {
            performSearch();
        });

        // Optional: Bind search functionality to the Enter key press
        $('#search-btn').on('click', function() {
            performSearch();
        });
    });
</script>

<script>
    $(document).on('click', '.view', function(e) {
    e.preventDefault();
    let fileId = $(this).data('id');

    // Open the file in a new tab
    window.open(`/view-file/${fileId}`, '_blank');
});

</script>
<!-- SweetAlert CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Toastr CSS and JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

 <script>
$(document).on('click', '.delete', function(e) {
    e.preventDefault();
    let fileId = $(this).data('id');

    // Use SweetAlert for confirmation
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
            // Proceed with AJAX request if confirmed
            $.ajax({
                url: `/advancedelete-file/${fileId}`,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}' // Include CSRF token
                },
                success: function(response) {
                    if (response.success) {
                        // Show Toastr success message
                        toastr.success(response.message);
                        // Optionally remove the row or refresh the table
                        $(`.delete[data-id="${fileId}"]`).closest('tr').remove();
                    } else {
                        // Show Toastr error message
                        toastr.error(response.message || 'An error occurred.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Delete Error:', error);
                    // Show Toastr error message
                    toastr.error('An error occurred while deleting the file.');
                }
            });
        }
    });
});


 </script>
<script>
  // Click handler for download buttons
  $(document).on('click', '.download_nt', function(e) {
        e.preventDefault();
        let fileId = $(this).data('id');
        
        // AJAX call to initiate file download
        $.ajax({
            url: `/download-file/${fileId}`,
            method: 'GET',
            xhrFields: {
                responseType: 'blob' // Specify blob response for downloading file
            },
            success: function(blob) {
                // Create a link element to trigger file download
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = `file_${fileId}`; // Set download file name
                document.body.appendChild(a);
                a.click();
                a.remove();
                window.URL.revokeObjectURL(url);
            },
            error: function(xhr, status, error) {
                console.error('File Download Error:', error);
                alert('An error occurred while downloading the file.');
            }
        });
    });

</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Function to fetch file count
    function fetchFileCount() {
        fetch('/customfile-count') // Replace with your endpoint
            .then(response => response.json())
            .then(data => {
                // Show the alert with the total count of files
                // alert(`Total count of files: ${data.count}`);
            })
            .catch(error => {
                console.error('Error fetching file count:', error);
            });
    }

    // Add event listener to the checkbox
    document.getElementById('check2').addEventListener('change', function () {
        if (this.checked) {
            fetchFileCount();
        }
    });
});
</script>

<style>
.buttonss {
    color: white;
    background: black;
    margin: 10px;
    text-align: center;
}
</style>
		
@endsection