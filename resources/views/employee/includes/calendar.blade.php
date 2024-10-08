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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    <script>
    // Wait for the document to be fully loaded
    document.addEventListener('DOMContentLoaded', function () {
        // Find the "Close" button with the "reload" class
        var reloadButton = document.querySelector('#close_md');

        // Add a click event listener to the button
        reloadButton.addEventListener('click', function () {
            // Reload the page
            location.reload();
        });
    });
</script>

<script>
    // Wait for the document to be fully loaded
    document.addEventListener('DOMContentLoaded', function () {
        // Find the "Close" button with the "reload" class
        var reloadButton = document.querySelector(' .reload');

        // Add a click event listener to the button
        reloadButton.addEventListener('click', function () {
            // Reload the page
            location.reload();
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            dayCellDidMount: function (info) {
                // Create a new DOM element for the plus icon
                var plusIcon = document.createElement('span');
                plusIcon.classList.add('plus-icon');
                plusIcon.innerHTML = '+';

                // Append the plus icon to the day cell
                info.el.appendChild(plusIcon);

                // Add a click event listener to the day cell
                info.el.addEventListener('click', function () {
                    // Get the date of the clicked cell
                    var clickedDate = info.date;

                    // Check if there are events on the clicked date
                    var eventsOnClickedDate = calendar.getEvents().filter(function(event) {
                        return event.start.toDateString() === clickedDate.toDateString();
                    });

                    // If there are events on the clicked date, show the modal
                    if (eventsOnClickedDate.length > 0) {
                        // Display event details in a popup
                        var eventDetails = "<hr>"  +
                            "<h2>Event Details</h2>";
                            
                        eventsOnClickedDate.forEach(function(event) {
                            
                            eventDetails += "<div>" +
                                "Title: " + event.title + "," +
                                "Start: " + event.start.toLocaleDateString() + "," +
                                "Description: " + event.extendedProps.description +
                                "</div>";
                        });

                        // Use Bootstrap's Modal to display the popup
                        $('#eventModal .modal-bodys').html(eventDetails);
                        $('#eventModal').modal('show');
                    } else {
                        // Handle case when there are no events on the clicked date
                        console.log('No events on this date:', clickedDate);
                    }
                });
            },
            events: {!! json_encode($calendarEvents) !!}, // Use the PHP array as the event source

            eventRender: function (info) {
                var event = info.event;
                var backgroundColor = '';

                // Check the event title and set the background color accordingly
                switch (event.title) {
                    case 'General Compliances':
                        backgroundColor = 'green';
                        break;
                    case 'Financial Compliances':
                        backgroundColor = 'lightblue';
                        break;
                    case 'Missed Compliances':
                        backgroundColor = 'lightcoral';
                        break;
                    // Add more cases for other event titles if needed
                }

                // Apply the background color to the event
                event.setProp('backgroundColor', backgroundColor);
            },

            eventClick: function (info) {
                // Display event details in a popup
                var event = info.event;
                var eventDetails = "<hr>"  +
                    "<h2>Event Details  </h2>"  +
                    "Title: " + event.title + "," + " " +
                    "Start: " + event.start.toLocaleDateString() + "," + " " +
                    "Description: " + event.extendedProps.description;

                // Use Bootstrap's Modal to display the popup
                $('#eventModal .modal-bodys').html(eventDetails);
                $('#eventModal').modal('show');
            },
        });

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

        calendar.render();
    });

    $('#calendar').on('click', '.fc-day', function () {
        $('#eventModal').modal('show');
    });
    
</script>



<!-- <script type="text/javascript">
        $('#close_md').modal('hide');
</script> -->
<style>
    .modal-bodys {
    position: relative;
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1rem;
}
/* .calendar-default td .fc-daygrid-day-frame {
    position: relative;
}

.calendar-default td .fc-daygrid-day-frame:before {
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    top: 50%;
    transform: translate(-50%, -50%);
    left: 50%;
    content: "+";
    
    cursor: pointer;
    opacity: 0.5;
    font-size:25px;
}
    */
    /* .plus-icon {
    position: relative;
    float: right;
    margin-top: -100px;
    margin-right: 100px;
    font-size: 30px;
    cursor: pointer;
    color: #007bff;
} */
      

</style>
</body>

</html>