@extends('Pages.Admin.AdminLayout.AdminLayout')
@section('content')
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>Ongoing Courses</h2>
                <small class="text-muted">See the list of Courses</small>
            </div>
            <div>
                <a href="#" class="btn btn-raised btn-defualt">Download Report</a>
                <a href="#" class="btn btn-raised btn-primary">Export</a>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <!-- Task Info -->
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Courses Details</h2>
                    <ul class="header-dropdown">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="zmdi zmdi-more-vert"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Report</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="body table-responsive m-0 p-0">
                        <table id="studentDataTable"
                               class="table table-bordered table-striped table-hover dataTable m-0 p-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>COURSE ID</th>
                                <th>STUDENT COUNT</th>
                                <th>TITLE</th>
                                <th>TOTAL PRICE (PRICE)</th>
                                <th>STATUS</th>
                                <th>OPTIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$course->course_no}}</td>
                                    <td>{{$course->student_count}}</td>
                                    <td>{{$course->title}}</td>
                                    <td>Rs.{{$course->total_price}}<small> (Rs.{{$course->price}})</small></td>
                                    <td>
                                        @if($course->status_id == 1)
                                            <span class="label bg-green">Published</span>
                                        @else
                                            <span class="label bg-red">concealed</span>
                                        @endif
                                    </td>
                                    <td class="m-0 p-1 gap-0 g-0">
                                        @if($course->status_id == 1)
                                            <button onclick="DO_CourseStateChange('{{$course->course_no}}')"
                                                    class="btn btn-raised btn-danger btn-sm">conceal
                                            </button>
                                        @else
                                            <button onclick="DO_CourseStateChange('{{$course->course_no}}')"
                                                    class="btn btn-raised btn-danger btn-sm">Publish
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Task Info -->
    </div>

@endsection
