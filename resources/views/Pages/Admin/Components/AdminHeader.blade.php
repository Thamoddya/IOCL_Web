<!-- Top Bar -->
<nav class="navbar clearHeader">
    <div class="col-12">
        <div class="navbar-header"><a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="#">IOCL
                ADMIN</a></div>
        <ul class="nav navbar-nav navbar-right">
            <!-- Notifications -->
            <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                    role="button"><i class="zmdi zmdi-notifications"></i> <span
                        class="label-count">0</span> </a>
                <ul class="dropdown-menu">
                    <li class="header">NOTIFICATIONS</li>
                    <li class="body">
                        <ul class="menu">
                        </ul>
                    </li>
                    <li class="footer"><a href="javascript:void(0);">View All Notifications</a></li>
                </ul>
            </li>
            <!-- #END# Notifications -->
        </ul>
    </div>
</nav>
<!-- #Top Bar -->

<!--Side menu and right menu -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="admin-image"><img src="{{asset('systemUploads/Admin/Images/logo.jpg')}}" alt=""></div>
            <div class="admin-action-info"><span>Welcome</span>
                <h3>{{$admin->firstName." ".$admin->lastName}}</h3>
                <ul>
                    <li><a data-placement="bottom" title="Go to Inbox" href="#"><i class="zmdi zmdi-email"></i></a></li>
                    <li><a data-placement="bottom" title="Go to Profile" href="#"><i class="zmdi zmdi-account"></i></a>
                    </li>
                    <li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i
                                class="zmdi zmdi-settings"></i></a></li>
                    <li><a data-placement="bottom" title="Full Screen" href="#"><i class="zmdi zmdi-sign-in"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MENU</li>
                <li class="{{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}"><a
                        href="{{route('admin.dashboard')}}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a>
                </li>
                <li class="{{ in_array(Route::currentRouteName(), ['admin.instructors', 'admin.add.instructor']) ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="zmdi zmdi-account"></i>
                        <span>Instructors</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{ Route::currentRouteName() == 'admin.instructors' ? 'active' : '' }}">
                            <a href="{{ route('admin.instructors') }}">All Instructors</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'admin.add.instructor' ? 'active' : '' }}">
                            <a href="{{ route('admin.add.instructor') }}">Add Instructors</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ in_array(Route::currentRouteName(), ['admin.students','admin.add.student']) ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-accounts-outline"></i><span>Students</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{ Route::currentRouteName() == 'admin.students' ? 'active' : '' }}">
                            <a href="{{route('admin.students')}}">All Students</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'admin.add.student' ? 'active' : '' }}">
                            <a href="{{route('admin.add.student')}}">Add Students</a>
                        </li>
                        <li>
                            <a href="#">Students Profile</a>
                        </li>
                        <li>
                            <a href="#">Students Invoice</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ in_array(Route::currentRouteName(), ['admin.add.course','admin.courses','admin.course.videos']) ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="zmdi zmdi-graduation-cap"></i>
                        <span>Courses</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{ Route::currentRouteName() == 'admin.courses' ? 'active' : '' }}">
                            <a href="{{route('admin.courses')}}">All Courses</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'admin.add.course' ? 'active' : '' }}">
                            <a href="{{route('admin.add.course')}}">Add Courses</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'admin.course.videos' ? 'active' : '' }}">
                            <a href="{{route('admin.course.videos')}}">Course Videos</a>
                        </li>
                        <li><a href="#">Courses Info</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="zmdi zmdi-file-text"></i><span>Reports</span>
                    </a>
                </li>
                <li class="header">KEEP NOTE</li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="zmdi zmdi-chart-donut col-red"></i><span>SPECIAL</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="zmdi zmdi-chart-donut col-amber"></i><span>WARNING</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="zmdi zmdi-chart-donut col-blue"></i><span>Information</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>
<!--Side menu and right menu -->
