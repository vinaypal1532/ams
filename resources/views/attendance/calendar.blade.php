@include('layouts.app')
@include('layouts.sidebar')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" />
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Attendance</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Attendance</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
    <div class="card">
        <div class="card-body">
            <div id="calendar"></div>
            <h2>Indicate:</h2>
            <ul style="list-style-type: none; padding-left: 0;">
                <li style="margin-bottom: 10px;">
                    <span style="display: inline-block; width: 20px; height: 20px; background-color: blue; margin-right: 10px;"></span>
                    Blue  - Half Day
                </li>
                <li style="margin-bottom: 10px;">
                    <span style="display: inline-block; width: 20px; height: 20px; background-color: green; margin-right: 10px;"></span>
                    Green  - Full Day
                </li>
                <li style="margin-bottom: 10px;">
                    <span style="display: inline-block; width: 20px; height: 20px; background-color: red; margin-right: 10px;"></span>
                    Red  - Absent Day
                </li>
            </ul>
        </div>
    </div>
</div>

            </div>
        </div>
    </section>
</div>

<!-- Load FullCalendar v5 -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var events = {!! $events !!};

        console.log(events); // Debug line to check events data in the browser console

        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: events
        });

        calendar.render();
    });
</script>
@include('layouts.footer')
