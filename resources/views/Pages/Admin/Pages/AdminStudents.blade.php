@extends('Pages.Admin.AdminLayout.AdminLayout')
@section('content')
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>IOCL Instructors</h2>
                <small class="text-muted">See the list of instructors</small>
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
                    <h2>Instructor Details</h2>
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
                    <div class="body table-responsive">
                        <table id="studentTable" class="table table-bordered table-striped table-hover dataTable m-0 p-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>IOCL ID</th>
                                <th>NAME</th>
                                <th>Email</th>
                                <th>MOBILE</th>
                                <th>CITY</th>
                                <th>STATUS</th>
                                <th>OPTIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$student->iocl_id}}</td>
                                    <td>{{$student->firstName}} {{$student->lastName}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->mobile_no}}</td>
                                    @if($student->studentDetails)
                                        <td>{{$student->studentDetails->city->name}}</td>
                                    @else
                                        <td>Not Updated</td>
                                    @endif
                                    <td>
                                        @if($student->status_id == 1)
                                            <span class="label bg-green">Active</span>
                                        @else
                                            <span class="label bg-red">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="m-0 p-0 gap-0 g-0">
                                        <button class="btn btn-raised btn-primary btn-sm"
                                                onclick="DO_ViewStudent('{{$student->iocl_id}}')">
                                            View
                                        </button>
                                        @if($student->status_id == 1)
                                            <button onclick="DO_DeleteInstructor('{{$student->iocl_id}}')" class="btn btn-raised btn-danger btn-sm">Deactive</button>
                                        @else
                                            <button onclick="DO_DeleteInstructor('{{$student->iocl_id}}')" class="btn btn-raised btn-danger btn-sm">Active</button>
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
