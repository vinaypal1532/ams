@include('layouts.app')
@include('layouts.sidebar')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
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
                <div class="col-md-6">      
                    <div class="card card-primary">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body">         
                            <form action="{{ route('attendance.store') }}" method="POST" id="attendance-form">
                                @csrf

                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" class="form-control" id="date" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" name="status" class="form-control" required>
                                        <option value="present">Present</option>
                                        <option value="absent">Absent</option>
                                    </select>
                                </div>

                                <!-- Hidden fields for location data -->
                                <input type="hidden" name="latitude" id="latitude">
                                <input type="hidden" name="longitude" id="longitude">
                                <input type="hidden" name="area" id="area">
                                <input type="hidden" name="sub_area" id="sub_area">

                                <button type="submit" class="btn btn-primary" id="submit-button">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('layouts.footer')

<script>
document.addEventListener('DOMContentLoaded', function() {
    const latitudeInput = document.getElementById('latitude');
    const longitudeInput = document.getElementById('longitude');
    const areaInput = document.getElementById('area');
    const subAreaInput = document.getElementById('sub_area');
    const attendanceForm = document.getElementById('attendance-form');
    const submitButton = document.getElementById('submit-button');

    function setLocation(position) {
        const { latitude, longitude } = position.coords;
        console.log(`Latitude: ${latitude}, Longitude: ${longitude}`);
        latitudeInput.value = latitude;
        longitudeInput.value = longitude;

        fetch(`https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${latitude}&longitude=${longitude}&localityLanguage=en`)
            .then(response => response.json())
            .then(data => {
                console.log('Response data:', data);
                console.log('Area:', data.locality || data.principalSubdivision);
                console.log('Sub-area:', data.localityInfo?.administrative?.[3]?.name || '');
                areaInput.value = data.locality || data.principalSubdivision || '';
                subAreaInput.value = data.localityInfo?.administrative?.[3]?.name || '';
            })
            .catch(error => {
                console.error('Error fetching area:', error);
                alert('Unable to retrieve area information.');
            });
    }

    function showError(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                alert('User denied the request for Geolocation.');
                break;
            case error.POSITION_UNAVAILABLE:
                alert('Location information is unavailable.');
                break;
            case error.TIMEOUT:
                alert('The request to get user location timed out.');
                break;
            case error.UNKNOWN_ERROR:
                alert('An unknown error occurred.');
                break;
        }
    }

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(setLocation, showError);
        } else {
            alert('Geolocation is not supported by this browser.');
        }
    }

    // Call getLocation to set the geolocation data as soon as the page loads
    getLocation();

    attendanceForm.addEventListener('submit', function(e) {
        console.log('Latitude:', latitudeInput.value);
        console.log('Longitude:', longitudeInput.value);
        console.log('Area:', areaInput.value);
        console.log('Sub-area:', subAreaInput.value);

        if (!latitudeInput.value || !longitudeInput.value || !areaInput.value) {
            e.preventDefault();
            alert('Geolocation data is not available. Please allow location access.');
        }
    });

    submitButton.addEventListener('click', function(e) {
        if (!latitudeInput.value || !longitudeInput.value || !areaInput.value) {
            e.preventDefault();
            alert('Geolocation data is not available. Please allow location access.');
        }
    });
});
</script>
