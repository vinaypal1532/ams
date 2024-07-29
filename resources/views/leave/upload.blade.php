@include('layouts.app')
@include('layouts.sidebar')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Leave Application</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Leave Application</li>
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
                            <form action="{{ route('leave.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="no_day">Number of Days</label>
                                    <input type="number" name="no_day" class="form-control" id="no_day" placeholder="Number of Days" required>
                                </div>

                                <div class="form-group">
                                    <label for="reason">Reason</label>
                                    <textarea name="reason" class="form-control" id="reason" placeholder="Reason for Leave" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" name="start_date" class="form-control" id="start_date" min="{{ date('Y-m-d') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select id="type" name="type" class="form-control" required>
                                        <option value="sick">Sick Leave</option>
                                        <option value="paid">Paid Leave</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                                         
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('layouts.footer')
