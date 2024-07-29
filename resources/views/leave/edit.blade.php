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
                            <form action="{{ route('leave.update', $leave->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="no_day">Number of Days</label>
                                    <input type="number" name="no_day" class="form-control" id="no_day" value="{{ $leave->no_day }}" placeholder="Number of Days" required>
                                </div>

                                <div class="form-group">
                                    <label for="reason">Reason</label>
                                    <textarea name="reason" class="form-control" id="reason" placeholder="Reason for Leave" required>{{ $leave->reason }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" name="start_date" class="form-control" id="start_date" value="{{ $leave->start_date }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select id="type" name="type" class="form-control" required>
                                        <option value="sick" {{ $leave->type == 'sick' ? 'selected' : '' }}>Sick Leave</option>
                                        <option value="paid" {{ $leave->type == 'paid' ? 'selected' : '' }}>Paid Leave</option>
                                        <option value="other" {{ $leave->type == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" name="status" class="form-control" required>
                                    <option value="1" {{ $leave->status == 1 ? 'selected' : '' }}>Approved</option>
                                    <option value="0" {{ $leave->status == 0 ? 'selected' : '' }}>Pending</option>
                                    <option value="2" {{ $leave->status == 2 ? 'selected' : '' }}>Rejected</option>
                                </select>
                            </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('layouts.footer')
