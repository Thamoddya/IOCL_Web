@extends('Pages.Student.Layouts.StudentLayout')
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
                            <label for="course_id" class="col-sm-2 col-form-label">Course Title</label>
                            <div class="col-sm-10">
                                <p>{{$course->title}}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="course_id" class="col-sm-2 col-form-label">Enrolled Date</label>
                            <div class="col-sm-10">
                                <p>{{\Carbon\Carbon::parse($enrollDetails->created_at)->format('d M Y')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-0 g-0 m-0">
                        <div class="card activities">
                            <div class="header">
                                <h2 class="text-bold">VIDEOS</h2>
                            </div>
                            <div class="body " id="timeline">
                                <div class="timeline-body">
                                    <div class="timeline m-border" id="timeline">
                                        @foreach($videos as $video)
                                            <div class="timeline-item">
                                                <div class="item-content p-2">
                                                    <div class="panel">
                                                        <div class="panel-heading p-2" role="tab" id="headingOne_1"
                                                             style="background-color: #0a58ca">
                                                            <a style="text-decoration: none;font-weight: 600"
                                                               role="button" class="p-2 text-white panel-title h6"
                                                               data-toggle="collapse" href="#collapse{{$video->id}}"
                                                               aria-expanded="true"
                                                               aria-controls="collapseOne_1">{{$video->video_title}}
                                                            </a>
                                                        </div>
                                                        <div id="collapse{{$video->id}}"
                                                             class="panel-collapse collapse in"
                                                             role="tabpanel" aria-labelledby="headingOne_1">
                                                            <div class="panel-body p-3">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <video
                                                                                controlsList="nodownload noremoteplayback"
                                                                                id="course_video" width="100%"
                                                                                height="240" controls>
                                                                                <source
                                                                                    src="{{asset($video->video_path)}}"
                                                                                    type="video/mp4">
                                                                                Your browser does not support the video
                                                                                tag.
                                                                            </video>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <p>{{$video->video_description}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-0 g-0 m-0">
                        <div class="card activities">
                            <div class="header">
                                <h2 class="text-bold">Materials</h2>
                            </div>
                            <div class="body " id="timeline">
                                <div class="timeline-body">
                                    <div class="timeline m-border" id="timeline">
                                        @foreach($materials as $material)
                                            <div class="timeline-item">
                                                <div class="item-content p-2">
                                                    <div class="panel">
                                                        <div class="panel-heading p-2" role="tab" id="headingOne_1"
                                                             style="background-color: #085d2b">
                                                            <a style="text-decoration: none;font-weight: 600"
                                                               role="button" class="p-2 text-white panel-title h6"
                                                               data-toggle="collapse"
                                                               href="#collapse{{$material->materials_id}}"
                                                               aria-expanded="true"
                                                               aria-controls="collapseOne_1">{{$material->material_title}}
                                                            </a>
                                                        </div>
                                                        <div id="collapse{{$material->materials_id}}"
                                                             class="panel-collapse collapse in"
                                                             role="tabpanel" aria-labelledby="headingOne_1">
                                                            <div class="panel-body p-3">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            @if($material->material_doc_path)
                                                                                <a onclick="openPdfModal('{{asset($material->material_doc_path)}}')"
                                                                                   class="btn btn-primary bg-primary text-white">Open Document</a>
                                                                            @endif
                                                                            @if($material->material_yt_link)
                                                                                <a target="_blank" href="{{asset($material->material_yt_link)}}"
                                                                                   class="btn btn-primary bg-primary text-white">GO To Youtube</a>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
