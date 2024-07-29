@include('layouts.app')
@include('layouts.sidebar')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Employee</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Employee</li>
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

                        <form action="{{ route('update_teacher', $teacher->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $teacher->name }}" placeholder="name">
                                </div>

                                                          
                                <div class="form-group">
                                    <label for="details">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ $teacher->email }}" placeholder="Details">
                                </div>

                                <div class="form-group">
                                    <label for="details">Mobile No</label>
                                    <input type="text" class="form-control" name="mobile_no" id="mobile_no" value="{{ $teacher->mobile_no }}" placeholder="mobile_no">
                                </div>
                                                             
                                <div class="form-group">
                                    <label for="details">Password</label>
                                    <input type="text" class="form-control" name="password" id="password" value="{{ $teacher->password }}" placeholder="Password">
                                </div>
                                
                                <div class="form-group">
                                    <label for="image">Image (64x64)</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                    @if ($teacher->image)
                                        <img src="{{ asset('images/' . $teacher->image) }}" alt="Teacher Image" width="64" height="64">
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="details">City</label>
                                    <input type="text" class="form-control" name="city" id="city" value="{{ $teacher->city }}" placeholder="City">
                                </div>
                                <div class="form-group">
                                    <label for="details">Basic Salary</label>
                                    <input type="text" class="form-control" name="basic_salary" id="basic_salary" value="{{ $teacher->basic_salary }}" placeholder="Basic Salary">
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" name="status" class="form-control">
                                        <option value="1" {{ $teacher->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $teacher->status == 0 ? 'selected' : '' }}>Pending</option>
                                        <option value="2" {{ $teacher->status == 2 ? 'selected' : '' }}>Blocked</option>
                                    </select>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('layouts.footer')
