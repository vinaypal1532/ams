@include('layouts.app')
@include('layouts.sidebar')

<div class="content-wrapper">    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
   
    <section class="content">
        <div class="container-fluid">     
            <div class="row">              
                <div class="col-lg-3 col-6">
                    <a href="{{ route('emp-list') }}">
                        <div class="small-box bg-info">
                            <div class="inner">
                            <h3>{{ $user }}</h3>
                                <p>Employee</p>
                            </div>
                        </div>
                    </a>
                </div>
            
                <div class="col-lg-3 col-6">
                <a href="{{ route('leave') }}">
                    <div class="small-box bg-success">
                        <div class="inner">
                        <h3>{{ $leave }}</h3>
                            <p>Leave Application</p>
                        </div>
                    </div>
                </a>
                </div>
                
                <div class="col-lg-3 col-6">
                <a href="">
                    <div class="small-box bg-warning">
                        <div class="inner">
                        <h3>{{ $payslip }}</h3>
                            <p>Payslip</p>
                        </div>
                    </div>
                </a>
                </div>
                
                <div class="col-lg-3 col-6">
                <a href="{{ route('attendance') }}">
                    <div class="small-box bg-danger">
                        <div class="inner">
                        <h3>{{ $attendance }}</h3>
                            <p>Attendance </p>
                        </div>
                    </div>
                </a>
                </div>

                <div class="col-lg-3 col-6">
                <a href="{{ route('leave') }}">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ $leave_approve }}</h3>
                            <p>Leave Approved </p>
                        </div>
                    </div>
                </a>
                </div> 

               <div class="col-lg-3 col-6">
               <a href="{{ route('leave') }}">
                    <div class="small-box bg-primary">
                        <div class="inner">
                        <h3>{{ $leave_rejected }}</h3>
                            <p>Leave Rejected </p>
                        </div>
                    </div>
                </a>
                </div>                
               
            </div>
          
            <div class="row">
         
            </div>
        </div>
    </section>
</div>

@include('layouts.footer')
