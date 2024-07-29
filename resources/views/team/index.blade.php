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
            <h1>Employee</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee</li>
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
                    <th>Email</th>                
                    <th>city</th>
                    <th>Image</th>
                    <th>Status</th>
                    
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>              
             
               
                   @php $i = 1;@endphp
                   @foreach ($team as $services)
                   <tr>
                        <td>{{ $i++ }}</td>
                      
                        
                                
                        <td>{{ $services->name }}</td>     
                        <td>{{ $services->email }}</td>     
                        <td>{{ $services->city }}</td>      
                 
                        <td>
                          @if($services->image)
                              <img src="{{ asset('images/' . $services->image) }}" alt="{{ $services->name }}" style="max-width: 50px; max-height: 50px;">
                          @else
                              No Image
                          @endif
                      </td>
                    
                        <td class="project-state">
                                @if ($services->status == 1)
                                <span class="badge badge-success">Success</span>
                                @elseif ($services->status == 0)
                                <span class="badge badge-warning">Pending</span>
                                @elseif ($services->status == 2)
                                <span class="badge badge-danger">Bock</span>
                                @endif
            
                          </td>
                      
                  

                        <td>
                        <a href="{{ route('emp.show', $services->id) }}" class="btn btn-info">View</a>
                        @can('admin-access')
                        <a href="{{ route('teacher_edit', $services->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('user_delete', $services->id) }}" method="POST" style="display:inline;">
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
