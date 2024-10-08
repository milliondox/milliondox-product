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
    <title>Milliondox - Calendar</title><link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
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
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/calendar.css">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/custom.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
  </head>
  <body>
  @yield('content')
  <!-- latest jquery-->
  <script src="../assets/js/jquery-3.6.0.min.js"></script>
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
    <script src="../assets/js/calendar/fullcalendar.min.js"></script>
    <script src="../assets/js/calendar/fullcalendar-custom.js"></script>
    <!-- Template js-->
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/theme-customizer/customizer.js">  </script>
    <script src="https://cdn.jsdelivr.net/npm/exceljs@4.3.1/dist/exceljs.min.js"></script>


    <script>
    var calendarEvents = <?php echo json_encode($calendarEvents); ?>;
</script>


    <!-- login js-->
    <script>
 document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            // ... other FullCalendar options ...
        });

        // Get the month selection dropdown
        var monthSelect = document.getElementById('month-select');

        // Function to update the calendar when the month dropdown changes
        function updateCalendarMonth() {
            var selectedMonth = monthSelect.value;
            if (selectedMonth) {
                // Change the calendar view to the selected month
                calendar.gotoDate(selectedMonth);
            }
        }

        // Add an event listener to the month selection dropdown
        monthSelect.addEventListener('change', updateCalendarMonth);

        // Populate the month dropdown with options for the next 6 months in the future
        var currentDate = new Date();
        for (var i = -24; i < 24; i++) { // Show 6 months in the future
            var nextMonth = new Date(currentDate);
            nextMonth.setMonth(currentDate.getMonth() + i);
            var monthOption = document.createElement('option');
            monthOption.value = nextMonth.toISOString();
            monthOption.text = nextMonth.toLocaleDateString('en-US', { month: 'long', year: 'numeric' });
            monthSelect.appendChild(monthOption);
        }

        // Set the default selected option to the current month
        var currentMonthOption = document.querySelector('option[value="' + currentDate.toISOString() + '"]');
        if (currentMonthOption) {
            currentMonthOption.selected = true;
        }

        // Trigger the change event on page load to set the initial calendar month
        updateCalendarMonth();

        // Get the client selection dropdown
        var clientSelect = document.getElementById('clientSelect');

        // Add an event listener to the client selection dropdown
        clientSelect.addEventListener('change', function () {
            var selectedClientId = this.value;
            if (selectedClientId) {
                // Filter events based on the selected client
                var filteredEvents = {!! json_encode($calendarEvents) !!}.filter(function (event) {
                    return event.client_id == selectedClientId;
                });
                // Set the filtered events as the calendar's event source
                calendar.removeAllEvents();
                calendar.addEventSource(filteredEvents);
            } else {
                // If no client is selected, reset the calendar to show all events
                calendar.removeAllEvents();
                calendar.addEventSource({!! json_encode($calendarEvents) !!});
            }
            // Render the calendar
            calendar.render();
        });

        // Trigger the change event on page load to filter events based on the default selection
        var defaultSelectedClientId = clientSelect.value;
        if (defaultSelectedClientId) {
            var changeEvent = new Event('change');
            clientSelect.dispatchEvent(changeEvent);
        }

        // Event click handler to display event details in a modal
        calendar.setOption('eventClick', function (info) {
            var event = info.event;
            var eventDetails = "Title: " + event.title + "<br>" +
                "Start: " + event.start.toLocaleDateString() + "<br>" +
                "Description: " + event.extendedProps.description;

            // Use Bootstrap's Modal to display the popup
            $('#event-details-modal .modal-body').html(eventDetails);
            $('#event-details-modal').modal('show');
        });

        calendar.render();
      
        var filteredCalendarEvents = [];

// Event listener for the "Export CSV" button
document.getElementById('export-csv').addEventListener('click', function () {
    // Check if a client is selected
    var selectedClientId = clientSelect.value;
    if (selectedClientId) {
        // Filter events based on the selected client
        filteredCalendarEvents = calendarEvents.filter(function (event) {
            return event.client_id == selectedClientId;
        });

        // Check if there are filtered events to export
        if (filteredCalendarEvents.length > 0) {
            // Convert filteredCalendarEvents to CSV format
            var csvContent = 'data:text/csv;charset=utf-8,';
            csvContent += 'Title,Start,Description,Client ID,Employee ID\n'; // CSV header

            filteredCalendarEvents.forEach(function (event) {
                csvContent += `${event.title},${event.start},${event.description},${event.client_id},${event.employee_id}\n`;
            });

            // Create a Blob containing the CSV data and trigger the download
            var encodedUri = encodeURI(csvContent);
            var link = document.createElement('a');
            link.setAttribute('href', encodedUri);
            link.setAttribute('download', 'calendar_events.csv');
            document.body.appendChild(link); // Required for Firefox
            link.click();
        } else {
            // No events for the selected client
            alert('No events found for the selected client.');
        }
    } else {
        // No client selected
        alert('Please select a client to export events.');
    }
});
    });
</script>
</body>
</html>
