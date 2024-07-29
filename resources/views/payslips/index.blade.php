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

      @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Payslips</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Payslips</li>
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
            <div class="card-body" style="overflow-x:auto;">
               <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>ID</th>
                <th>Employee</th>
                <th>Month</th>
                <th>No of Work Day</th>
                <th>Basic Salary</th>
                <th>Advance Salary</th>
                <th>Net Salary</th>
                <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
            @foreach($payslips as $payslip)
                <tr>
                    <td>{{ $payslip->id }}</td>
                    <td>{{ $payslip->user->name }}</td>
                    <td>{{ $payslip->month }}</td>
                    <td>{{ $payslip->days_worked }}</td>
                    <td>{{ $payslip->basic_salary }}</td>
                    <td>{{ $payslip->advance_salary }}</td>                   
                    <td>{{ $payslip->net_salary }}</td>
                    <td>
                        <a href="{{ route('payslips.show', $payslip->id) }}" class="btn btn-info">View</a>
                        @can('admin-access')
                        <a href="{{ route('payslips.edit', $payslip->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('payslips.destroy', $payslip->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
                  <tfoot>
                
                  </tfoot>
                </table>
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
