@extends('Pages.Student.Layouts.StudentLayout')
@section('content')
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>Courses</h2>
                <small class="text-muted ">Welcome to IOCL Student Dashboard</small>
            </div>
            <div>
                <a href="#" class="btn btn-raised btn-defualt">Download Report</a>
                <a href="#" class="btn btn-raised btn-primary">Export</a>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover js-basic-example dataTable table-custom">
                            <thead>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Course Code</th>
                                    <th>Course Duration</th>
                                    <th>Course Status</th>
                                    <th>Course Progress</th>
                                    <th>Course Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                    <tr class="align-items-center">
                                        <td>{{$course->title}}</td>
                                        <td>{{$course->course_no}}</td>
                                        <td>{{$course->videos->count()}} Days</td>
                                        <td>
                                            @if ($course->status_id == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: {{$course->course_progress}}%" aria-valuenow="{{$course->course_progress}}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{route('student.course.details',$course->course_no)}}" class="btn btn-raised btn-primary btn-sm">View Course</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
