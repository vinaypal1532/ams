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
            <h1>List of Holiday</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List of Holiday</li>
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
                     
                    <th>Name</th>                 
                    <th>Date</th>             
                 
                    <th>Status</th>
                    
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>              
             
               
                   @php $i = 1;@endphp
                   @foreach ($holiday as $holidays)
                   <tr>
                        <td>{{ $i++ }}</td>
                      
                        
                                
                        <td>{{ $holidays->name }}</td>     
                        <td>{{ $holidays->date }}</td>    
                     
                 
                      
                        <td class="project-state">
                                @if ($holidays->status == 'Active')
                                <span class="badge badge-success">Active</span>
                                @elseif ($holidays->status == 'Pending')
                                <span class="badge badge-warning">Pending</span>                               
                                @endif
            
                          </td>
                      
                  

                        <td>
                   
                        @can('admin-access')
                        <a href="{{ route('holiday_edit', $holidays->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('holiday.destroy', $holidays->id) }}" method="POST" style="display:inline;">
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
