<!-- Top Bar -->
<nav class="navbar clearHeader">
    <div class="col-12">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="#">IOCL STUDENT</a>
        </div>
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
            <div class="admin-image">
                @if($student->profile_pic_path == "")
                    <img src="{{asset('systemUploads/Admin/Images/logo.jpg')}}" alt="">
                @else
                    <img src="{{asset($student->profile_pic_path)}}" alt="">
                @endif
            </div>
            <div class="admin-action-info"><span>Welcome</span>
                <h3>{{$student->firstName." ".$student->lastName}}</h3>
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
                <li class="header">OPTIONS</li>
                <li class="{{ Route::currentRouteName() == 'student.dashboard' ? 'active' : '' }}"><a
                        href="{{route('student.dashboard')}}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a>
                </li>
                <li class="{{ in_array(Route::currentRouteName(), ['student.courses','student.course.details']) ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="zmdi zmdi-graduation-cap"></i>
                        <span>Courses</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{ Route::currentRouteName() == 'student.courses' ? 'active' : '' }}">
                            <a href="{{route('student.courses')}}">All Courses</a>
                        </li>
                        @if(Route::currentRouteName() == 'student.course.details')
                            <li class="{{ Route::currentRouteName() == 'student.course.details' ? 'active' : '' }}">
                                <a href="{{url("")}}">Ongoing Courses</a>
                            </li>
                        @endif
                        <li class="{{ Route::currentRouteName() == 'admin.course.videos' ? 'active' : '' }}">
                            <a href="{{route('admin.course.videos')}}">Completed Courses</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ Route::currentRouteName() == 'student.reports' ? 'active' : '' }}">
                    <a href="{{route('student.reports')}}">
                        <i class="zmdi zmdi-file-text"></i><span>Reports</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>
<!--Side menu and right menu -->
