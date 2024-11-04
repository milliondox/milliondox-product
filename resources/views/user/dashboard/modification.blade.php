$(document).ready(function() {
$('.EventDatePick').on('change', function() {
let eventDate = $(this).val(); // Get the selected date

// Show a loading indicator
$('#re_render_events').html('<li>Loading...</li>');

$.ajax({
url: '{{ route('getEventWithDate') }}',
type: 'POST',
data: { eventDate: eventDate },
success: function(response) {
if (response.success) {
// Clear the loading message
$('#re_render_events').empty();

// Loop through the taskEvents array and append each item
response.taskEvents.forEach(function(event) {
let listItem = `
<li role="listitem" aria-labelledby="event-${event.id}">
    <div class="icon_his_ani" id="event-${event.id}">
        ${event.eventType === "Other" ? `
        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M9.5 5V8.5C9.5 8.76522 9.39464 9.01957 9.20711 9.20711C9.01957 9.39464 8.76522 9.5 8.5 9.5H1.5C1.23478 9.5 0.98043 9.39464 0.792893 9.20711C0.605357 9.01957 0.5 8.76522 0.5 8.5V5H9.5ZM7 0.5C7.13261 0.5 7.25979 0.552678 7.35355 0.646447C7.44732 0.740215 7.5 0.867392 7.5 1V1.5H8.5C8.76522 1.5 9.01957 1.60536 9.20711 1.79289C9.39464 1.98043 9.5 2.23478 9.5 2.5V4H0.5V2.5C0.5 2.23478 0.605357 1.98043 0.792893 1.79289C0.98043 1.60536 1.23478 1.5 1.5 1.5H2.5V1C2.5 0.867392 2.55268 0.740215 2.64645 0.646447C2.74021 0.552678 2.86739 0.5 3 0.5C3.13261 0.5 3.25979 0.552678 3.35355 0.646447C3.44732 0.740215 3.5 0.867392 3.5 1V1.5H6.5V1C6.5 0.867392 6.55268 0.740215 6.64645 0.646447C6.74021 0.552678 6.86739 0.5 7 0.5Z"
                fill="#434343" />
        </svg>
        ` : `
        <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M11.25 10.0832V10.6665H0.75V10.0832L1.91667 8.9165V5.4165C1.91667 3.60817 3.10083 2.01567 4.83333 1.50234V1.33317C4.83333 1.02375 4.95625 0.727005 5.17504 0.508213C5.39383 0.28942 5.69058 0.166504 6 0.166504C6.30942 0.166504 6.60616 0.28942 6.82496 0.508213C7.04375 0.727005 7.16667 1.02375 7.16667 1.33317V1.50234C8.89917 2.01567 10.0833 3.60817 10.0833 5.4165V8.9165L11.25 10.0832ZM7.16667 11.2498C7.16667 11.5593 7.04375 11.856 6.82496 12.0748C6.60616 12.2936 6.30942 12.4165 6 12.4165C5.69058 12.4165 5.39383 12.2936 5.17504 12.0748C4.95625 11.856 4.83333 11.5593 4.83333 11.2498"
                fill="#434343" />
        </svg>
        `}
        <span>${event.eventName}</span>
    </div>
    <div class="his_edit_event${event.id} his_edit_event_nt" id="edit_event_id${event.id}">
        <butto class="task_edit_del" id="his_edit_event_del" type="button" data-eventtask-id="${event.id}"
            aria-label="Delete event ${event.eventName}">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M5.07536 13.3334C4.77759 13.3334 4.52359 13.2285 4.31336 13.0187C4.10359 12.809 3.9987 12.555 3.9987 12.2567V4.00007H3.33203V3.3334H5.9987V2.82007H9.9987V3.3334H12.6654V4.00007H11.9987V12.2567C11.9987 12.5634 11.896 12.8194 11.6907 13.0247C11.4849 13.2305 11.2287 13.3334 10.922 13.3334H5.07536ZM11.332 4.00007H4.66536V12.2567C4.66536 12.3763 4.70381 12.4745 4.7807 12.5514C4.85759 12.6283 4.95581 12.6667 5.07536 12.6667H10.922C11.0243 12.6667 11.1183 12.6241 11.204 12.5387C11.2894 12.453 11.332 12.359 11.332 12.2567V4.00007ZM6.53736 11.3334H7.20403V5.3334H6.53736V11.3334ZM8.79337 11.3334H9.46003V5.3334H8.79337V11.3334Z"
                    fill="#FA4A4A"></path>
            </svg>
        </butto n>
        <a id="his_edit_event_ar${event.id}" class="his_edit_event_ar" aria-label="Edit event ${event.eventName}">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M14.241 1.50879L16.491 3.75879L14.7758 5.47479L12.5258 3.22479L14.241 1.50879ZM6 11.9998H8.25L13.7153 6.53454L11.4653 4.28454L6 9.74979V11.9998Z"
                    fill="#434343" />
                <path
                    d="M14.25 14.25H6.1185C6.099 14.25 6.07875 14.2575 6.05925 14.2575C6.0345 14.2575 6.00975 14.2507 5.98425 14.25H3.75V3.75H8.88525L10.3853 2.25H3.75C2.92275 2.25 2.25 2.922 2.25 3.75V14.25C2.25 15.078 2.92275 15.75 3.75 15.75H14.25C14.6478 15.75 15.0294 15.592 15.3107 15.3107C15.592 15.0294 15.75 14.6478 15.75 14.25V7.749L14.25 9.249V14.25Z"
                    fill="#434343" />
            </svg>
        </a>
    </div>
</li>
`;
$('#re_render_events').append(listItem); // Append the new list item
// working here for datepick edit form creation

@foreach ($eventsData as $eventsDataList)
    <form id="eventFormddd_edit${event.id}" action="{{ route('editEvents') }}" method="POST"
        class="upload-form eventsformedit">
        <!-- <input type="hidden" name="_token" value="#" autocomplete="off"> -->
        @csrf
        <button type="button" id="close_event_edit_ar${event.id}" class="close_form">
            <span aria-hidden="true">
                <svg width="50" height="50" viewBox="0 0 50 50" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect width="4.27093" height="66.172"
                        transform="matrix(0.702074 -0.712104 0.709324 0.704883 0 3.31244)" fill="black"></rect>
                    <rect width="4.27086" height="66.3713"
                        transform="matrix(-0.704896 -0.70931 0.706518 -0.707695 3.10742 50)" fill="black"></rect>
                </svg>
            </span>
        </button>

        <div class="for_group">
            <label for="eventName">Event Name</label>
            <input type="text" id="eventName" name="eventName" value="${event.eventName}" required="">
            <input type="hidden" id="event_id" name="event_id" value="${event.id}" required="">
        </div>
        <div class="for_group">
            <label for="eventDate">Event Date</label>
            <input type="date" id="eventDate" name="eventDate" value="{{ $eventsDataList->eventDate }}"
                required="">
        </div>
        <div class="group_radio">
            <div class="for_group radio">
                <input type="radio" id="repeatYearly1${event.id}" name="repeat" value="yearly"
                    @if ($eventsDataList->eventRepeat == 'yearly') checked @endif>
                <label for="repeatYearly1${event.id}">Every Year</label><br>
            </div>
            <div class="for_group radio">
                <input type="radio" id="repeatMonthly1${event.id}" name="repeat" value="monthly"
                    @if ($eventsDataList->eventRepeat == 'monthly') checked @endif>
                <label for="repeatMonthly1${event.id}">Every Month</label><br>
            </div>
            <div class="for_group radio">
                <input type="radio" id="repeatDaily1${event.id}" name="repeat" value="daily"
                    @if ($eventsDataList->eventRepeat == 'daily') checked @endif>
                <label for="repeatDaily1${event.id}">Every Day</label><br>
            </div>
            <div class="for_group radio">
                <input type="radio" id="repeatonce1${event.id}" name="repeat" value="Once"
                    @if ($eventsDataList->eventRepeat == 'Once') checked @endif>
                <label for="repeatonce1${event.id}">Once Only</label><br>

            </div>

            {{-- <div class="for_group radio">
                                            <input type="radio" id="repeatonce1" name="repeat" value="Once">
                                            <label for="repeatonce1">Once Only</label><br>
                                            </div> --}}

        </div>

        <div class="for_group an_re">
            <button type="button" class="event-type-btn <?php echo $eventsDataList->eventType == 'reminder' ? 'active' : ''; ?>" name="eventType" value="reminder"
                data-value="reminder">Reminder</button>
            <button type="button" class="event-type-btn <?php echo $eventsDataList->eventType == 'Other' ? 'active' : ''; ?>" name="eventType" value="Other"
                data-value="Other">Other</button>
            <input type="hidden" id="eventType" name="eventType" value="<?php echo htmlspecialchars($eventsDataList->eventType); ?>">
            <!-- Hidden input to store selected event type -->
        </div>
        <div class="for_group bttn">
            <button type="submit" class="hvr-rotate">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.6667 12.6667V5.33341H3.33333V12.6667H12.6667ZM10.6667 0.666748H12V2.00008H12.6667C13.0203 2.00008 13.3594 2.14056 13.6095 2.39061C13.8595 2.64065 14 2.97979 14 3.33341V12.6667C14 13.4067 13.4067 14.0001 12.6667 14.0001H3.33333C2.97971 14.0001 2.64057 13.8596 2.39052 13.6096C2.14048 13.3595 2 13.0204 2 12.6667V3.33341C2 2.59341 2.59333 2.00008 3.33333 2.00008H4V0.666748H5.33333V2.00008H10.6667V0.666748ZM7.33333 6.33341H8.66667V8.33341H10.6667V9.66675H8.66667V11.6667H7.33333V9.66675H5.33333V8.33341H7.33333V6.33341Z"
                        fill="white"></path>
                </svg>
                Update</button>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            // When the anchor tag is clicked, show the form
            $('#his_edit_event_ar${event.id}').click(function() {
                $('#eventFormddd_edit${event.id}').slideDown(); // Show the form
            });

            // Optionally, you can hide the form when the "close" button is clicked
            $('#close_event_edit_ar${event.id}').click(function() {
                $('#eventFormddd_edit${event.id}').slideUp(); // Hide the form
            });

        });
    </script>
@endforeach

});
} else {
$('#re_render_events').html('<li>No events found for this date.</li>');
}
},
error: function(xhr) {
$('#re_render_events').html('<li>Error loading events. Please try again.</li>');
console.error(xhr.responseText); // Handle any errors here
}
});
});
});



</script>





\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
///////////////////////////////////////////

<script>
    $(document).ready(function() {
        // Event listener for date selection
        $('.EventDatePick').on('change', function() {
            let eventDate = $(this).val(); // Get the selected date

            // Show a loading message
            $('#re_render_events').html('<li>Loading...</li>');

            $.ajax({
                url: '{{ route('getEventWithDate') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token
                },
                data: {
                    eventDate: eventDate
                },
                success: function(response) {
                    if (response.success) {
                        $('#re_render_events').empty(); // Clear loading message

                        response.taskEvents.forEach(function(event) {
                            let eventIcon = event.eventType === "Other" ?
                                getOtherIcon() : getReminderIcon();
                            let listItem = `
                            <li role="listitem" aria-labelledby="event-${event.id}">
                                <div class="icon_his_ani" id="event-${event.id}">
                                    ${eventIcon}
                                    <span>${event.eventName}</span>
                                </div>
                                ${getEditDeleteButtons(event)}
                            </li>
                        `;

                            // Append each list item to #re_render_events
                            $('#re_render_events').append(listItem);

                            // Append form to .add_events
                            $('.tab .active .add_events').append(getEditForm(
                                event));
                            // $('.add_events').append(getEditForm(event));


                            setupFormActions(
                                event); // Setup actions for form display and hide
                        });
                    } else {
                        $('#re_render_events').html(
                            '<li>No events found for this date.</li>');
                    }
                },
                error: function(xhr) {
                    $('#re_render_events').html(
                        '<li>Error loading events. Please try again.</li>');
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
