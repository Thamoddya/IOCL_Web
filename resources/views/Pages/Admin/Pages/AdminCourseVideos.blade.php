@extends('Pages.Admin.AdminLayout.AdminLayout')
@section('content')
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>Course Details</h2>
                <small class="text-muted">Course Details</small>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
        </div>
    @endif
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="body">
                    <div class="col-12">
                        <div class="form-group row">
                            <label for="course_id" class="col-sm-2 col-form-label">Select Course</label>
                            <div class="col-sm-10">
                                <select onchange="loadCourseDetails()" class="form-control" id="selectedCourseID">
                                    <option value="">Select Course</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->course_id}}">{{ $course->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{--                        Course Details--}}
                        <div class="form-group row">
                            <label for="course_id" class="col-sm-2 col-form-label">Course Title</label>
                            <div class="col-sm-10">
                                <input type="text" value="N/A" class="form-control" id="course_title" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="course_id" class="col-sm-2 col-form-label">Course Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" value="N/A" id="course_description" readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="course_id" class="col-sm-2 col-form-label">Course Price</label>
                            <div class="col-sm-10">
                                <input type="text" value="N/A" class="form-control" id="course_price" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" id="loadButtons">
                    </div>
                    <hr>
                    <div class="col-12">
                        <div class="row" style="display: flex; flex-wrap: wrap;">
                            <div class="col-6 col-lg-3 col-sm-6 col-md-6" style="display: flex;">
                                <div class="card"
                                     style="border-color: #0a53be; border-width: 2px; border-style: solid; flex: 1;">
                                    <div class="body" style="padding: 10px; text-align: center;">
                                        <h3 style="margin: 0; word-wrap: break-word;" id="videoCount">N/A</h3>
                                        <p class="text-muted" style="margin: 0;">Videos</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-sm-6 col-md-6" style="display: flex;">
                                <div class="card"
                                     style="border-color: #0a53be; border-width: 2px; border-style: solid; flex: 1;">
                                    <div class="body" style="padding: 10px; text-align: center;">
                                        <h3 style="margin: 0; word-wrap: break-word;" id="studentCount">N/A</h3>
                                        <p class="text-muted" style="margin: 0;">Students</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-sm-6 col-md-6" style="display: flex;">
                                <div class="card"
                                     style="border-color: #0a53be; border-width: 2px; border-style: solid; flex: 1;">
                                    <div class="body" style="padding: 10px; text-align: center;">
                                        <h3 style="margin: 0; word-wrap: break-word;" id="materialCount">N/A</h3>
                                        <p class="text-muted" style="margin: 0;">Materials</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-sm-6 col-md-6" style="display: flex;">
                                <div class="card"
                                     style="border-color: #0a53be; border-width: 2px; border-style: solid; flex: 1;">
                                    <div class="body" style="padding: 10px; text-align: center;">
                                        <h3 style="margin: 0; word-wrap: break-word;" id="earnedCount">N/A</h3>
                                        <p class="text-muted" style="margin: 0;">Earned</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-12 p-0 g-0 m-0">
                        <div class="card activities">
                            <div class="header">
                                <h2>VIDEOS</h2>
                            </div>
                            <div class="body " id="timeline">
                                <div class="timeline-body">
                                    <div class="timeline m-border" id="timeline">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-center">Course Materials</h4>
                            </div>
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table
                                        class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                        <tr>
                                            <th>Video Title</th>
                                            <th>Video</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody id="course_videos">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
