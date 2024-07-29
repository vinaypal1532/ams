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
                    <h1>Employee Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Employee Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="container">
                            
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td>{{ $user->role }}</td>
                                </tr>
                                <tr>
                                    <th>Mobile No</th>
                                    <td>{{ $user->mobile_no }}</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{ $user->city }}</td>
                                </tr>
                                <tr>
                                    <th>Basic Salary</th>
                                    <td>{{ $user->basic_salary }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $user->status }}</td>
                                </tr>
                                <tr>
                                    <th>Image</th>
                                    <td><img src="{{ asset('images/' . $user->image) }}" alt="{{ $user->name }}" width="64" height="64"></td>
                                </tr>
                            </table>
                            <a href="{{ route('emp-list') }}" class="btn btn-secondary">Back</a>
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
