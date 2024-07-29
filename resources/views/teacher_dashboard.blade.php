@include('layouts.app')
@include('layouts.sidebar')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">  
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $attendance }}</h3>
                            <p>Attendance</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $leave }}</h3>
                            <p>Leave</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $payslip }}</h3>
                            <p>Payslip</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="attendanceChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div id="calendar" style="width: 100%; height: 500px;"></div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('layouts.footer')

<!-- Load FullCalendar CSS -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">

<!-- Load FullCalendar v5 -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var events = {!! json_encode($events) !!};

        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: events,
        });

        calendar.render();
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Attendance Chart
    var ctx1 = document.getElementById('attendanceChart').getContext('2d');
    var attendanceChart = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: ['Attendance'],
            datasets: [{
                label: '# of Attendances',
                data: [{{ $attendance }}],
                backgroundColor: ['rgba(54, 162, 235, 0.2)'],
                borderColor: ['rgba(54, 162, 235, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Leave Chart
    var ctx2 = document.getElementById('leaveChart').getContext('2d');
    var leaveChart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Leave'],
            datasets: [{
                label: '# of Leaves',
                data: [{{ $leave }}],
                backgroundColor: ['rgba(75, 192, 192, 0.2)'],
                borderColor: ['rgba(75, 192, 192, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
