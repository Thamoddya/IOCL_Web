<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>IOCL ADMIN</title>
    {{--    <link rel="icon" href="favicon.ico" type="image/x-icon">--}}
    <link rel="stylesheet" href="{{asset('adminAssets/plugins/bootstrap/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('adminAssets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('adminAssets/css/themes/all-themes.css')}}"/>

    @if(in_array(Route::currentRouteName(),['admin.instructors','admin.students','admin.courses']))
        <link href="{{asset('adminAssets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    @endif
    @if(in_array(Route::currentRouteName(),['admin.add.course']))
        <link
            href="{{asset('adminAssets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}"
            rel="stylesheet"/>
        <link href="{{asset('adminAssets/plugins/waitme/waitMe.css')}}" rel="stylesheet"/>
        <link href="{{asset('adminAssets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet"/>
    @endif

    @if(in_array(Route::currentRouteName(),['admin.course.videos']))

        <link href="https://vjs.zencdn.net/8.10.0/video-js.css" rel="stylesheet"/>
        <script src="https://vjs.zencdn.net/8.10.0/video.min.js"></script>

        <!-- Video.js base CSS -->
        <link
            href="https://unpkg.com/video.js@7/dist/video-js.min.css"
            rel="stylesheet"
        />

        <!-- City -->
        <link
            href="https://unpkg.com/@videojs/themes@1/dist/city/index.css"
            rel="stylesheet"
        />

    @endif
    <script>
        let BASE_URL = "{{url("")}}/";
    </script>

    <style>
        .text-box {
            overflow-wrap: break-word;
            word-wrap: break-word;
            hyphens: auto;
            max-width: 100%;
        }
    </style>
</head>
<body class="theme-green">

@include('Pages.Admin.Components.AdminHeader')
<section class="content home">
    <div class="container-fluid">
        @yield('content')
    </div>
</section>
<div class="color-bg"></div>

@if(Route::currentRouteName() == 'admin.course.videos')
    <!-- Modals -->
    <div class="modal fade" id="VIEW_VIDEOMODAL" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">VIDEO</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <video id="course-video" class="video-js vjs-fluid" controls preload="auto"
                                   data-setup='{}'>
                                <source src="" id="video-source" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="updModal_CloseBtn" class="btn btn-link waves-effect" data-dismiss="modal">
                        CLOSE
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->
    <div class="modal fade" id="VIEW_VIDEOMODAL" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">VIDEO</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <video id="course-video" class="video-js vjs-fluid" controls preload="auto"
                                   data-setup='{}'>
                                <source src="" id="video-source" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="updModal_CloseBtn" class="btn btn-link waves-effect" data-dismiss="modal">
                        CLOSE
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif

@if(Route::currentRouteName() == 'admin.instructors')
    <!-- Modals -->
    <div class="modal fade" id="EDIT_INSTRUCTORMODAL" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Edit Instructor</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <p class="form-label">Instructor ID : <span id="EDIT_InstructorId"></span></p>
                 -           </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <label for="EDIT_InstructorName" class="form-label">Instructor Name</label>
                                <div class="form-line">
                                    <input id="EDIT_InstructorName" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="EDIT_InstructorMobile" class="form-label">Instructor Mobile</label>
                                <div class="form-line">
                                    <input id="EDIT_InstructorMobile" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <label for="EDIT_InstructorEmail" class="form-label">Instructor Email</label>
                                <div class="form-line">
                                    <input id="EDIT_InstructorEmail" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <label for="EDIT_InstructorBio" class="form-label">Instructor Bio</label>
                                <div class="form-line">
                                    <input id="EDIT_InstructorBio" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="DO_UpdateInstructor();" type="button"
                            class="btn btn-link waves-effect text-primary">
                        SAVE
                        CHANGES
                    </button>
                    <button type="button" id="updModal_CloseBtn" class="btn btn-link waves-effect" data-dismiss="modal">
                        CLOSE
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif

@if(Route::currentRouteName() == 'admin.students')
    <!-- Modals -->
    <div class="modal text-wrap fade" id="VIEWSTUDENTMODAL" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Student Details</h4>
                </div>
                <div class="modal-body p-0 m-0 d-flex justify-content-center align-items-center">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center align-items-center p-2 profile-image">
                            <img style="width: 50px;height: 50px;border-radius: 100px"
                                 src="{{asset('systemUploads/Admin/Images/logo.jpg')}}" alt="">
                        </div>
                        <hr>
                        <div class="col-12 d-flex justify-content-center align-items-center">
                            <div class="p-0">
                                <div class="row ml-2">
                                    <div class="col-md-6">
                                        <p><strong>IOCL ID</strong></p>
                                        <p><strong>Name</strong></p>
                                        <p><strong>Email</strong></p>
                                        <p><strong>Contact Number</strong></p>
                                        <p><strong>Last Updated @</strong></p>
                                    </div>
                                    <div class="col-md-6 text-wrap">
                                        <p id="STD_IoclID" class="text-box"></p>
                                        <p id="STD_Name" class="text-box"></p>
                                        <p id="STD_Email" class="text-box"></p>
                                        <p id="STD_Mobile" class="text-box"></p>
                                        <p id="STD_UpdateTime" class="text-box"></p>
                                    </div>
                                    <hr>
                                    <div class="col-md-6 text-wrap">
                                        <p><strong>City</strong></p>
                                        <p><strong>Address Line 1</strong></p>
                                        <p><strong>Address Line 2</strong></p>
                                        <p><strong>Address Line 3</strong></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p id="STD_City" class="text-box"></p>
                                        <p id="STD_AddressLineOne" class="text-box"></p>
                                        <p id="STD_AddressLineTwo" class="text-box"></p>
                                        <p id="STD_AddressLineThree" class="text-box"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="updModal_CloseBtn" class="btn btn-link waves-effect" data-dismiss="modal">
                        CLOSE
                    </button>
                </div>
            </div>
        </div>
    </div>

@endif

<script src="{{asset("adminAssets/bundles/libscripts.bundle.js")}}"></script>
<script src="{{asset("adminAssets/bundles/vendorscripts.bundle.js")}}"></script>
<script src="{{asset('adminAssets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

<script src="{{asset('adminAssets/bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js -->
<script src="{{asset('adminAssets/js/pages/index.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('adminAssets/js/pages/ui/modals.js')}}"></script>

@if(in_array(Route::currentRouteName(),['admin.instructors','admin.students','admin.courses']))
    <script src="{{asset('adminAssets/bundles/datatablescripts.bundle.js')}}"></script>
    <script src="{{asset('adminAssets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('adminAssets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adminAssets/plugins/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('adminAssets/plugins/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
    <script src="{{asset('adminAssets/plugins/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
    <script src="{{asset('adminAssets/plugins/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
    <script src="{{asset('adminAssets/js/pages/tables/jquery-datatable.js')}}"></script>
@endif

@if(in_array(Route::currentRouteName(),['admin.add.course']))

    <script src="{{asset('adminAssets/plugins/autosize/autosize.js')}}"></script>
    <script src="{{asset('adminAssets/plugins/momentjs/moment.js')}}"></script>
    <script src="{{asset('adminAssets/plugins/dropzone/dropzone.js')}}"></script>
    <script
        src="{{asset('adminAssets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
    <script src="{{asset('adminAssets/js/pages/forms/basic-form-elements.js')}}"></script>

@endif

{{--Custom Admin Scripts--}}
<script src="{{asset('adminAssets/js/AdminScript.js')}}"></script>
</body>
</html>
