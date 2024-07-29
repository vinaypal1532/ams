@include('layouts.app')
@include('layouts.sidebar')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
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

                        <form action="{{ route('add_teacherData') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                </div>                                                             
   
                                <div class="form-group">
                                    <label for="image">Image (64x64)</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>
                                <div class="form-group">
                                    <label for="details">Email</label>
                                    <input type="text" class="form-control" name="email" id="designation" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="details">Mobile No</label>
                                    <input type="text" class="form-control" name="mobile_no" id="mobile_no" Placeholder="Mobile No">
                                </div>

                                <div class="form-group">
                                    <label for="details">Password</label>
                                    <input type="text" class="form-control" name="password" id="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="details">City</label>
                                    <input type="text" class="form-control" name="city" id="city" placeholder="City">
                                </div>
                                <div class="form-group">
                                    <label for="details">Basic Salary</label>
                                    <input type="text" class="form-control" name="basic_salary" id="basic_salary" placeholder="Basic Salary">
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" name="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Pending</option>
                                        <option value="2">Rejected</option>
                                    </select>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('layouts.footer')
