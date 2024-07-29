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
      @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div> 
      @endif

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Attendance   <a href="{{ route('attendance.download') }}" class="btn btn-primary">Download Attendance PDF</a></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Attendance </li>
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
                   <th>Sr. No</th>                 
                    <th>User</th>             
                    <th>Date</th>   
                    <th>status</th>  
                    <th>Attendance Time</th>       
                    <th>Created Date</th>                      
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>              
             
               
                   @php $i = 1;@endphp
                   @foreach ($attendances as $attendance)
                   <tr>
                        <td>{{ $i++ }}</td>
                      
                       
                        <td>{{ $attendance->user->name }}</td>               
                        <td>{{ $attendance->date }}</td>                       
                    
                        <td class="project-state">
                        @php
                            $time = strtotime($attendance->created_at);
                            $lateTime = strtotime(date('Y-m-d') . ' 11:00:00');
                            $formattedTime = date('g:i A', $time);
                        @endphp

                        @if ($time > $lateTime)
                     <span class="badge badge-danger">Late</span>
                        @else
                       <span class="badge badge-success">On Time</span>
                        @endif
                    </td>

                    <td>{{ $formattedTime }}</td>
                          <td>{{ $attendance->created_at }}</td>
                        
                        <td class="text-right py-0 align-middle">
                        @can('admin-access')
                        <a class="btn btn-info btn-sm" href="{{ route('edit_attendence', $attendance->id) }}">
                            <i class="fas fa-pencil-alt"></i>
                            Edit
                        </a>

                        <form action="{{ route('attendance.destroy', $attendance->id) }}" method="POST" style="display: inline-block;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Attendance record?')">Delete</button>
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
