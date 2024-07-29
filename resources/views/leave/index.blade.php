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
        <div class="col-12">
            <div class="card">
           
            <div class="card-body" style="overflow-x:auto;">
               <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   <th>Sr. No</th>                 
                    <th>User</th>             
                    <th>Leave Start Date</th>            
                    <th>Reason</th>      
                    <th>No of Days</th>
                    <th>Type</th>      
                    <th>status</th>    
                    <th>Created Date</th>                      
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>              
             
               
                   @php $i = 1;@endphp
                   @foreach ($leaves as $leave)
                   <tr>
                        <td>{{ $i++ }}</td>
                      
                       
                        <td>{{ $leave->user->name }}</td>               
                        <td>{{ $leave->start_date }}</td>     
                    
                        <td>{{ $leave->reason }}</td>
                      
                        <td>{{ $leave->no_day }}</td>
                        <td>{{ $leave->type }}</td>
                      <td class="project-state">
                                @if ($leave->status == 1)
                                <span class="badge badge-success">Approved</span>
                                @elseif ($leave->status == 0)
                                <span class="badge badge-warning">Pending</span>
                                @elseif ($leave->status == 2)
                                <span class="badge badge-danger">Rejected</span>
                                @endif
            
                          </td>
                          <td>{{ $leave->created_at }}</td>
                        
                          <td>
                        @can('admin-access')
                 
                        <a class="btn btn-warning" href="{{ route('leave_edit', $leave->id) }}">
                            <i class="fas fa-pencil-alt"></i>
                            Edit
                        </a>

                        <form action="{{ route('leave.destroy', $leave->id) }}" method="POST" style="display: inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this leave record?')">Delete</button>
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
