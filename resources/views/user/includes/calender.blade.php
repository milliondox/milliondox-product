<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="tivo admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Tivo admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <title>Milliondox</title>
    
    <!-- website font start -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <!-- website font end -->
    
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/scrollbar.css">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.css">
    <!-- Add the Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Add the Flatpickr JavaScript -->
     <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" type="text/css" href="/../assets/css/vendors/datatables.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/client-custom.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>

    #calendar-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }
    #calendar table {
        width: 100%;
        border-collapse: collapse;
    }
    #calendar th,
    #calendar td {
        text-align: center;
        padding: 10px;
        border: 1px solid #ccc;
    }
    #calendar th {
        background-color: #f2f2f2;
    }
    #calendar td {
        cursor: pointer;
    }

    .calnder_event_nt input[type="text"], .calnder_event_nt input[type="date"], .calnder_event_nt input[type="submit"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }
    .calnder_event_nt input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .calnder_event_nt input[type="submit"]:hover {
        background-color: #45a049;
    }
    .event-type-btn {
        display: inline-block;
        margin-right: 10px;
        padding: 8px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .event-item {
        margin-bottom: 5px;
    }

    .calnder_event_nt .reverse {
    flex-direction: row-reverse;
}
</style>

  </head>
  <body>
   @yield('content')
   <!-- latest jquery-->
    <!-- <script src="../assets/js/jquery-3.6.0.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
    <!-- Bootstrap js-->
    <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="../assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="../assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="../assets/js/scrollbar/simplebar.js"></script>
    <script src="../assets/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="../assets/js/config.js"></script>
    <script src="../assets/js/sidebar-menu.js"></script>
    <!-- <script src="../assets/js/tooltip-init.js"></script> -->
    <!-- Template js-->
    <script src="/../assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="/../assets/js/datatable/datatables/datatable.custom.js"></script>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/comon_toggle_theme.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
<script>
    // Function to generate calendar
//     function generateCalendar(year, month, events) {
//         var daysInMonth = new Date(year, month + 1, 0).getDate();
//         var firstDayOfMonth = new Date(year, month, 1).getDay();
//         var calendarHTML = '<table><tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr><tr>';

//         var dayCounter = 1;
//         for (var i = 0; i < 42; i++) { // 42 cells for 6 weeks
//             if (i >= firstDayOfMonth && dayCounter <= daysInMonth) {
//                 var cellClass = '';
//                 if (events[dayCounter]) {
//                     var event = events[dayCounter];
//                     cellClass = 'event-marker';
//                     calendarHTML += '<td class="' + cellClass + '" data-day="' + dayCounter + '" data-type="' + event.type + '" data-title="' + event.title + '">';
//                     calendarHTML += dayCounter + '<span class="event-title">' + event.title + '</span>';
//                     calendarHTML += '<span class="event-type ' + (event.type === "anniversary" ? 'event-marker-anniversary' : 'event-marker-reminder') + '">' + event.type + '</span>';
//                     calendarHTML += '</td>';
//                 } else {
//                     calendarHTML += '<td>' + dayCounter + '</td>';
//                 }
//                 dayCounter++;
//             } else {
//                 calendarHTML += '<td></td>';
//             }
//             if (i % 7 === 6) {
//                 calendarHTML += '</tr><tr>';
//             }
//         }
//         calendarHTML += '</tr></table>';
//         return calendarHTML;
//     }

//     // Event listeners to toggle selected state of event type buttons
//     $(document).on('click', '.event-type-btn', function() {
//         $('.event-type-btn.active').removeClass('active');
//         $(this).addClass('active');
//         $('#eventType').val($(this).attr('data-value'));
//     });

//     // Event listener for form submission
//     $(document).on('submit', '#eventForm', function(event) {
//         event.preventDefault();

//         var eventName = $('#eventName').val();
//         var eventDate = $('#eventDate').val();
//         var repeatType = $('input[name="repeat"]:checked').val();
//         var eventType = $('#eventType').val();

//         // Get the date from input
//         var date = new Date(eventDate);
//         var day = date.getDate();

//         // Check if calendar already exists
//         var calendar = $('#calendar').find('table');
//         var events = {};
//         if (calendar.length) {
//             // Get the events already in the calendar
//             var eventMarkers = calendar.find('.event-marker');
//             eventMarkers.each(function() {
//                 var dayAttr = parseInt($(this).attr('data-day'));
//                 var title = $(this).attr('data-title');
//                 var type = $(this).attr('data-type');
//                 events[dayAttr] = { title: title, type: type };
//             });
//         }

//         // Add the event to the list of events
//         events[day] = { title: eventName, type: eventType };

//         // Generate the new calendar with events
//         var year = date.getFullYear();
//         var month = date.getMonth();
//         var newCalendarHTML = generateCalendar(year, month, events);
//         $('#calendar').html(newCalendarHTML);

//         // Clear form fields
//         $('#eventName').val('');
//         $('#eventDate').val('');
//         $('#repeatYearly, #repeatMonthly, #repeatDaily').prop('checked', false);
//         $('.event-type-btn.active').removeClass('active');
//         $('.event-type-btn[data-value="' + eventType + '"]').addClass('active');
//         $('#eventType').val('anniversary');
//     });

//     // Generate calendar for the current month initially
//     var currentDate = new Date();
//     var currentYear = currentDate.getFullYear();
//     var currentMonth = currentDate.getMonth();
//     var initialCalendarHTML = generateCalendar(currentYear, currentMonth, {});
//     $('#calendar').html(initialCalendarHTML);

//     // Event listener for clicking event markers
//     $(document).on('click', '#calendar .event-marker', function(event) {
//         $(".acc_tabs").addClass("active");
//     });

//     // Event listener for previous year button
//     $(document).on('click', '#prevYear', function() {
//         currentYear--;
//         updateMonthYearText();
//         updateCalendar(currentYear, currentMonth);
//     });

//     // Event listener for next year button
//     $(document).on('click', '#nextYear', function() {
//         currentYear++;
//         updateMonthYearText();
//         updateCalendar(currentYear, currentMonth);
//     });

// // Function to update the month and year text
// function updateMonthYearText() {
//     const monthNames = ["January", "February", "March", "April", "May", "June",
//                         "July", "August", "September", "October", "November", "December"];
//     $('#monthYear').text(monthNames[currentMonth] + " " + currentYear);
// }

//     // Function to update the calendar
//     function updateCalendar(year, month) {
//         var updatedCalendarHTML = generateCalendar(year, month, {});
//         $('#calendar').html(updatedCalendarHTML);
//     }

//     // Initialize the calendar with current month and year
//     updateMonthYearText();


 // Function to generate calendar
    // function generateCalendar(year, month, events) {
    //     var daysInMonth = new Date(year, month + 1, 0).getDate();
    //     var firstDayOfMonth = new Date(year, month, 1).getDay();
    //     var calendarHTML = '<table><tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr><tr>';

    //     var currentDate = new Date(); // Get current date
    //     var currentDay = currentDate.getDate();
    //     var currentMonth = currentDate.getMonth();
    //     var currentYear = currentDate.getFullYear();

    //     var dayCounter = 1;
    //     for (var i = 0; i < 42; i++) { // 42 cells for 6 weeks
    //         if (i >= firstDayOfMonth && dayCounter <= daysInMonth) {
    //             var cellClass = '';
    //             if (events[dayCounter]) {
    //                 var event = events[dayCounter];
    //                 cellClass = 'event-marker';
    //                 calendarHTML += '<td class="' + cellClass + '" data-day="' + dayCounter + '" data-type="' + event.type + '" data-title="' + event.title + '">';
    //                 calendarHTML += dayCounter + '<span class="event-title">' + event.title + '</span>';
    //                 calendarHTML += '<span class="event-type ' + (event.type === "anniversary" ? 'event-marker-anniversary' : 'event-marker-reminder') + '">' + event.type + '</span>';
    //                 calendarHTML += '</td>';
    //             } else {
    //                 if (year === currentYear && month === currentMonth && dayCounter === currentDay) {
    //                     calendarHTML += '<td class="current-date">' + dayCounter + '</td>'; // Highlight current date
    //                 } else {
    //                     calendarHTML += '<td>' + dayCounter + '</td>';
    //                 }
    //             }
    //             dayCounter++;
    //         } else {
    //             calendarHTML += '<td></td>';
    //         }
    //         if (i % 7 === 6) {
    //             calendarHTML += '</tr><tr>';
    //         }
    //     }
    //     calendarHTML += '</tr></table>';
    //     return calendarHTML;
    // }
    function generateCalendar(year, month, events) {
    var daysInMonth = new Date(year, month + 1, 0).getDate();
    var firstDayOfMonth = new Date(year, month, 1).getDay();
    var calendarHTML = '<table><tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr><tr>';

    var currentDate = new Date(); // Get current date
    var currentDay = currentDate.getDate();
    var currentMonth = currentDate.getMonth();
    var currentYear = currentDate.getFullYear();

    var dayCounter = 1;
    for (var i = 0; i < 42; i++) { // 42 cells for 6 weeks
        if (i >= firstDayOfMonth && dayCounter <= daysInMonth) {
            var cellClass = '';
            if (events[dayCounter]) {
                var event = events[dayCounter];
                cellClass = 'event-marker';
                if (year === currentYear && month === currentMonth && dayCounter === currentDay) {
                    cellClass += ' current-date'; // Add current-date class if it's the current date
                }
                calendarHTML += '<td class="' + cellClass + '" data-day="' + dayCounter + '" data-type="' + event.type + '" data-title="' + event.title + '">';
                calendarHTML += dayCounter + '<span class="event-title">' + event.title + '</span>';
                calendarHTML += '<span class="event-type ' + (event.type === "anniversary" ? 'event-marker-anniversary' : 'event-marker-reminder') + '">' + event.type + '</span>';
                calendarHTML += '</td>';
            } else {
                if (year === currentYear && month === currentMonth && dayCounter === currentDay) {
                    calendarHTML += '<td class="current-date">' + dayCounter + '</td>'; // Highlight current date
                } else {
                    calendarHTML += '<td>' + dayCounter + '</td>';
                }
            }
            dayCounter++;
        } else {
            calendarHTML += '<td></td>';
        }
        if (i % 7 === 6) {
            calendarHTML += '</tr><tr>';
        }
    }
    calendarHTML += '</tr></table>';
    return calendarHTML;
}

        var eventName = $('#eventName').val();
        var eventDate = $('#eventDate').val();
        var repeatType = $('input[name="repeat"]:checked').val();
        var eventType = $('#eventType').val();

        // Get the date from input
        var date = new Date(eventDate);
        var day = date.getDate();

        // Check if calendar already exists
        var calendar = $('#calendar').find('table');
        var events = {};
        if (calendar.length) {
            // Get the events already in the calendar
            var eventMarkers = calendar.find('.event-marker');
            eventMarkers.each(function() {
                var dayAttr = parseInt($(this).attr('data-day'));
                var title = $(this).attr('data-title');
                var type = $(this).attr('data-type');
                events[dayAttr] = { title: title, type: type };
            });
        }

        // Add the event to the list of events
        events[day] = { title: eventName, type: eventType };

        // Generate the new calendar with events
        var year = date.getFullYear();
        var month = date.getMonth();
        var newCalendarHTML = generateCalendar(year, month, events);
        $('#calendar').html(newCalendarHTML);

        // Clear form fields
        $('#eventName').val('');
        $('#eventDate').val('');
        $('#repeatYearly, #repeatMonthly, #repeatDaily').prop('checked', false);
        $('.event-type-btn.active').removeClass('active');
        $('.event-type-btn[data-value="' + eventType + '"]').addClass('active');
        $('#eventType').val('anniversary');
    

    // Generate calendar for the current month initially
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    var currentMonth = currentDate.getMonth();
    var initialCalendarHTML = generateCalendar(currentYear, currentMonth, {});
    $('#calendar').html(initialCalendarHTML);

    // Event listener for clicking event markers
    $(document).on('click', '#calendar .event-marker', function(event) {
        $(".acc_tabs").addClass("active");
    });

// Event listener for previous year button
// Function to update the calendar
function updateCalendar(year, month) {
    // Fetch events for the new month and year
    $.ajax({
        url: "{{ route('calendar.events') }}",
        type: "GET",
        success: function(response) {
            // Filter events for the new month and year
            var eventsForCurrentMonth = response.filter(function(event) {
                var eventDate = new Date(event.eventDate);
                return eventDate.getFullYear() === year && eventDate.getMonth() === month;
            });

            // Process the filtered events and update the calendar
            var events = {};
            eventsForCurrentMonth.forEach(function(event) {
                var eventDate = new Date(event.eventDate);
                var day = eventDate.getDate();
                events[day] = { title: event.eventName, type: event.eventType };
            });

            // Update calendar with fetched events
            var updatedCalendarHTML = generateCalendar(year, month, events);
            $('#calendar').html(updatedCalendarHTML);

            // Update the accordion tabs with event data for the new month
            updateAccordionTabs(eventsForCurrentMonth);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
    // Update month and year text after updating the calendar
    updateMonthYearText(year, month);
}

// Function to update the month and year text
function updateMonthYearText(year, month) {
    const monthNames = ["January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"];
    $('#monthYear').text(monthNames[month] + " " + year);
}

// Event listener for previous year button
$(document).on('click', '#prevYear', function() {
    if (currentMonth === 0) {
        currentYear--;
        currentMonth = 11;
    } else {
        currentMonth--;
    }
    updateCalendar(currentYear, currentMonth);
});

// Event listener for next year button
$(document).on('click', '#nextYear', function() {
    if (currentMonth === 11) {
        currentYear++;
        currentMonth = 0;
    } else {
        currentMonth++;
    }
    updateCalendar(currentYear, currentMonth);
});


// Initialize the calendar with current month and year
var currentDate = new Date();
var currentYear = currentDate.getFullYear();
var currentMonth = currentDate.getMonth();
updateMonthYearText();
updateCalendar(currentYear, currentMonth);
    // Event listeners to toggle selected state of event type buttons
    $(document).on('click', '.event-type-btn', function() {
        $('.event-type-btn.active').removeClass('active');
        $(this).addClass('active');
        $('#eventType').val($(this).attr('data-value'));
    });

    // Event listener for form submission
   
</script>
<script>
// Define month names array
const monthNames = ["January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"];

// Function to update accordion tabs with event data
function updateAccordionTabs(events, selectedDate) {
    // Clear the accordion tabs content
    $('.acc_tabs').html('');

    // Filter events based on the selected date
    var eventsForSelectedDate = events.filter(function(event) {
        var eventDate = new Date(event.eventDate);
        return eventDate.getDate() === selectedDate.getDate() &&
            eventDate.getMonth() === selectedDate.getMonth() &&
            eventDate.getFullYear() === selectedDate.getFullYear();
    });

    // Loop through each event and append its data to the accordion tabs
    eventsForSelectedDate.forEach(function(event) {
        var eventType = event.eventType;
        var eventTitle = event.eventName;
        var eventId = event.id;

        // Append event data to the accordion tabs based on event type
        if (eventType === 'anniversary') {
            $('.acc_tabs').append('<div class="acc_wrap  anniversay"><button class="accordion"><div class="droop">' + eventTitle + ' - Anniversary ' + eventId + '</div></button><span class="delete-icon" data-event-id="' + eventId + '">Delete</span></div>');
        } else if (eventType === 'reminder') {
            $('.acc_tabs').append('<div class="acc_wrap  reminder"><button class="accordion"><div class="droop">' + eventTitle + ' - Reminder ' + eventId + '</div></button><span class="delete-icon" data-event-id="' + eventId + '">Delete</span></div>');
        }
    });
    $('.delete-icon').click(function() {
        var eventId = $(this).data('event-id');
        deleteEvent(eventId);
    });
    function deleteEvent(eventId) {
    // Perform AJAX request to delete event from the database
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
    url: '/delete-event', // Replace with your delete event endpoint
    type: 'POST',
    data: { eventId: eventId },
    success: function(response) {
        // Handle success response
        console.log('Event deleted successfully');
        // Optionally, you can update the UI to reflect the deletion
        // For example, you can remove the deleted event from the accordion tabs
        
        // Reload the page after successful deletion
        location.reload();
    },
    error: function(xhr, status, error) {
        // Handle error response
        console.error('Error deleting event:', error);
        
        // Reload the page in case of error
        location.reload();
    }
});



}
}

$(document).ready(function() {
    // Function to fetch events and update calendar
    function fetchEventsAndUpdateCalendar() {
        $.ajax({
            url: "{{ route('calendar.events') }}",
            type: "GET",
            success: function(response) {
                // Store events data globally
                eventsData = response;

                // Get current month and year
                var currentDate = new Date();
                var currentYear = currentDate.getFullYear();
                var currentMonth = currentDate.getMonth();

                // Filter events for the current month and year
                var eventsForCurrentMonth = response.filter(function(event) {
                    var eventDate = new Date(event.eventDate);
                    return eventDate.getFullYear() === currentYear && eventDate.getMonth() === currentMonth;
                });

                // Process the filtered events and update the calendar
                var events = {};
                eventsForCurrentMonth.forEach(function(event) {
                    var eventDate = new Date(event.eventDate);
                    var day = eventDate.getDate();
                    events[day] = { title: event.eventName, type: event.eventType };
                });

                // Update calendar with fetched events
                var updatedCalendarHTML = generateCalendar(currentYear, currentMonth, events);
                $('#calendar').html(updatedCalendarHTML);

                // Update the accordion tabs with event data for the current month
                updateAccordionTabs(eventsForCurrentMonth);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    // Call the function to fetch events and update calendar on page load
    fetchEventsAndUpdateCalendar();
});



// Event listener for clicking on a date in the calendar
$(document).on('click', '#calendar td', function() {
    var day = $(this).data('day');
    var monthYearText = $('#monthYear').text().split(' ');
    var month = monthNames.indexOf(monthYearText[0]) + 1; // Convert month name to numeric value
    var year = parseInt(monthYearText[1]);

    console.log('Extracted Day:', day);
    console.log('Extracted Month:', month);
    console.log('Extracted Year:', year);

    // Construct the selected date
    var selectedDate = new Date(year, month - 1, day); // Subtract 1 from month value

    console.log('Selected Date:', selectedDate);

    // Check if the date is valid
    if (!isNaN(selectedDate.getTime())) {
        // Update the accordion tabs with event data for the selected date
        updateAccordionTabs(eventsData, selectedDate);

        // Update the clicked date in the header
        $('.ve_head span').text(day + ' ' + monthYearText[0] + ', ' + year);
    } else {
        console.error('Invalid Date:', selectedDate);
    }
});








</script>

<script>
$(document).ready(function(){
    $("#show_form").click(function(){
        $("#eventFormddd").addClass("active");
        $(this).hide();
    });

    $("#close").click(function(){
        $("#eventFormddd").removeClass("active");
        $("#show_form").css("display", "flex");
    });
});
</script>


<!-- <script>
  var acc = document.getElementsByClassName("accordion");
  var i;

  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.display === "block") {
        panel.style.display = "none";
      } else {
        panel.style.display = "block";
      }
    });
  }
</script> -->

<style>
    span.delete-icon {
    cursor: pointer;
}
</style>
    <script src="../assets/js/theme-customizer/customizer.js">  </script>
    <!-- login js-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/store.js/1.3.14/store.min.js"></script>
  </body>
</html>