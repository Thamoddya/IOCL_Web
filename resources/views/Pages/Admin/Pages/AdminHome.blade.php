@extends('Pages.Admin.AdminLayout.AdminLayout')
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

    <div class="row clearfix top-report row-deck">
        <div class="col-lg-3 col-sm-6 col-md-6">
            <div class="card">
                <div class="body">
                    <h3>{{$studentsCreatedThisMonth}}</h3>
                    <p class="text-muted">New Students ({{date('F')}})</p>
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
                    <h3>{{$getTotalStudentsCount}}</h3>
                    <p class="text-muted">Total Students</p>
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
                    <h3>{{$getAllCourseCount}}</h3>
                    <p class="text-muted">Courses</p>
                    <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="68"
                             aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-md-6">
            <div class="card">
                <div class="body">
                    <h3>Rs.{{$totalTransactionPriceSum}}</h3>
                    <p class="text-muted">Total Earnings({{date('F')}})</p>
                    <div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="68"
                             aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
