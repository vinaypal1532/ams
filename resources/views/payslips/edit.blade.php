@include('layouts.app')
@include('layouts.sidebar')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Payslip </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Payslip</li>
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
                        <form method="POST" action="{{ route('payslips.update', $payslip->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="user_id">Employee</label>
                                <select class="form-control" id="user_id" name="user_id" required>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ $user->id == $payslip->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="month">Month</label>
                                <input type="month" class="form-control" id="month" name="month" value="{{ $payslip->month }}" required>
                            </div>
                            <div class="form-group">
                                <label for="basic_salary">Basic Salary</label>
                                <input type="number" class="form-control" id="basic_salary" name="basic_salary" value="{{ $payslip->basic_salary }}" required>
                            </div>
                            <div class="form-group">
                                <label for="allowances">Allowances</label>
                                <input type="number" class="form-control" id="allowances" name="allowances" value="{{ $payslip->allowances }}">
                            </div>
                            <div class="form-group">
                                <label for="deductions">Deductions</label>
                                <input type="number" class="form-control" id="deductions" name="deductions" value="{{ $payslip->deductions }}">
                            </div>
                            <div class="form-group">
                                    <label for="deductions">Advance Salary</label>
                                    <input type="number" class="form-control" id="advance_salary" name="advance_salary" value="{{ $payslip->advance_salary }}">
                                </div>
                            <button type="submit" class="btn btn-primary">Update Payslip</button>
                            <a href="{{ route('payslips.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('layouts.footer')