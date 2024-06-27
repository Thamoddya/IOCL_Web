@extends('Pages.Student.Layouts.StudentLayout')
@section('content')

    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>Dashboard</h2>
                <small class="text-muted">Welcome to IOCL Admin Dashboard</small>
            </div>
            <div>
                <a href="#" class="btn btn-raised btn-defualt">Download Report</a>
                <a href="#" class="btn btn-raised btn-primary">Export</a>
            </div>
        </div>
    </div>

    @if($student->studentDetails == null)
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Complete Your Profile</h2>
                    </div>
                    <div class="body">
                        <form class="row clearfix" method="POST" enctype="multipart/form-data" action="{{ route('student.complete') }}">
                            @csrf
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" value="{{ old('firstName', $student->firstName ?? '') }}" name="firstName"  class="form-control" placeholder="First Name">
                                        @error('firstName')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input value="{{ old('lastName', $student->lastName ?? '') }}" type="text" name="lastName" class="form-control" placeholder="Last Name">
                                        @error('lastName')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <label for="inputGroupFile01" class="form-label">Profile Image</label>
                                    <input type="file" name="profileImage" class="form-control input-group col-cyan" accept=".jpg, .jpeg, .png">
                                    @error('profileImage')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group drop-custum">
                                    <select class="form-control show-tick" name="cityID">
                                        <option value="">-- City --</option>
                                        @foreach($cities as $city )
                                            <option value="{{ $city->city_id }}" {{ old('cityID', $student->cityID ?? '') == $city->city_id ? 'selected' : '' }}>{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('cityID')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="addressLine1" class="form-control" placeholder="Address Line 1" value="{{ old('addressLine1', $student->addressLine1 ?? '') }}">
                                        @error('addressLine1')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="addressLine2" class="form-control" placeholder="Address Line 2" value="{{ old('addressLine2', $student->addressLine2 ?? '') }}">
                                        @error('addressLine2')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="addressLine3" class="form-control" placeholder="Address Line 3" value="{{ old('addressLine3', $student->addressLine3 ?? '') }}">
                                        @error('addressLine3')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-raised g-bg-cgreen">Submit</button>
                                <button type="reset" class="btn btn-raised btn-default">Cancel</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row clearfix top-report row-deck">
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="card">
                    <div class="body">
                        <h3>{{$enrolledCourseCount}}</h3>
                        <p class="text-muted">Enrolled Courses</p>
                        <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="68"
                                 aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="card">
                    <div class="body">
                        <h3>{{$enrolledActiveCourses}}</h3>
                        <p class="text-muted">Active Courses</p>
                        <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="68"
                                 aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="card">
                    <div class="body">
                        <h3>{{$studentCompletedCourses}}</h3>
                        <p class="text-muted">Completed Courses</p>
                        <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="68"
                                 aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="card">
                    <div class="body">
                        <h3>{{$enrolledActiveCourses}}</h3>
                        <p class="text-muted">Ongoing Courses</p>
                        <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="68"
                                 aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
