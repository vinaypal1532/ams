@include('layouts.app')
@include('layouts.sidebar')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
<div class="content-wrapper">
    <section class="content-header">

        <div class="container-fluid">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Payslip Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Payslip Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9">
                    <div class="card">

                        <div class="container">
                            <h2></h2>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Employee</th>
                                    <td>{{ $payslip->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Month</th>
                                    <td>{{ $payslip->month }}</td>
                                </tr>
                                <tr>
                                    <th>Basic Salary</th>
                                    <td>{{ $payslip->basic_salary }}</td>
                                </tr>
                                <tr>
                                    <th>Allowances</th>
                                    <td>{{ $payslip->allowances }}</td>
                                </tr>
                                <tr>
                                    <th>Deductions</th>
                                    <td>{{ $payslip->deductions }}</td>
                                </tr>
                                <tr>
                                    <th>Total Days</th>
                                    <td>{{ $payslip->total_days }}</td>
                                </tr>
                                <tr>
                                    <th>Advance Salary</th>
                                    <td>{{ $payslip->advance_salary }}</td>
                                </tr>
                                <tr>
                                    <th>Days Worked</th>
                                    <td>{{ $payslip->days_worked }}</td>
                                </tr>
                                <tr>
                                    <th>Net Salary</th>
                                    <td>{{ $payslip->net_salary }}</td>
                                </tr>
                            </table>                            
                         
                            <a href="{{ route('payslip.download', $payslip->id) }}" class="btn btn-primary">Download Payslip PDF</a>

                            <a href="{{ route('payslips.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script>
    $.noConflict();
    jQuery(document).ready(function ($) {
        $('#example1').DataTable();
    });
</script>
@include('layouts.footer')
