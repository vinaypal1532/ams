<aside class="main-sidebar sidebar-dark-primary elevation-4">
  
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('asset/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        @can('admin-access')
            <span class="brand-text font-weight-light">Admin</span>
        @endcan
        @can('user-access')
            <span class="brand-text font-weight-light">User Panel</span>
        @endcan
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @can('user-access')
                    <li class="nav-item menu-open">
                        <a href="{{ route('employee-dashboard') }}" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                @endcan
                @can('admin-access')
                    <li class="nav-item menu-open">
                        <a href="{{ route('home') }}" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-sitemap"></i>
                            <p>
                                Employee
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('emp-list') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Employee List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('add_emp') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Employee</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-image"></i>
                            <p>
                                Leave Management
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('leave') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Leave List</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file-invoice-dollar"></i>
                            <p>
                                Pay slip
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('payslips.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Payslips List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('payslips.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create Payslip</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>
                                Attendance
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('attendance') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Attendance List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                <!-- Common items for both admin and user access -->
                <li class="nav-item">
                    <a href="{{ route('profile') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profile</p>
                    </a>
                </li>

                @can('user-access')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-image"></i>
                            <p>
                                Leave Management
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('leave') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Leave List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('add_leave') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Apply Leave</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>
                                Attendance
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('attendance') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Attendance List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('attendance_calender') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Attendance in Calendar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('add_attendance') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Attendance</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file-invoice-dollar"></i>
                            <p>
                                Pay slip
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('payslips.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Payslips List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                    @can('admin-access')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file-invoice-dollar"></i>
                            <p>
                              List of Holiday
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('listofholiday.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Holiday List</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('holiday.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create Holiday</p>
                                </a>
                            </li>
                        </ul>
                    </li>
             
                    @endcan
                <!-- Logout -->
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
