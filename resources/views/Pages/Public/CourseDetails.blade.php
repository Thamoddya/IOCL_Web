@extends('Layouts.HomePageLayout')
@section('content')
    @if($course->status_id != '1')
        <div class="container-fluid p-3">
            <div class="alert alert-warning" role="alert">
                <h5>Course Not Published or Activated yet</h5>
                <a href="{{url()->previous()}}">Go Back</a>
            </div>
        </div>
    @else
        <div class="container-fluid">
            <div class="row p-3 p-md-5 justify-content-center">
                <div class="col-12 p-1 bg-white rounded-3">
                    <div class="row p-2 p-md-4">
                        <div
                            class="col-md-6 border border-right-1 border-top-0 border-bottom-0 border-left-0 border-start-0 ">
                            <h4 class="text-primary" style="font-weight: 600;font-family:SF Pro Display,serif;">Course
                                Description</h4>
                            <p style="font-family:SF Pro Display,serif;" class="course-description">
                                    <?php
                                    $description = $course->description;
                                    echo implode(' ', array_slice(explode(' ', nl2br(e($description))), 0, 70));
                                    ?>...
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h4 class="text-primary" style="font-weight: 600;font-family:SF Pro Display,serif;">Course
                                Details</h4>
                            <div class="row p-2">
                                <p style="font-family:SF Pro Display,serif;" class="fw-bold">Course Name : <span
                                        style="font-weight: 400">{{$course->title}}</span></p>
                                <h3 style="font-family:SF Pro Display,serif;" class="fw-bold">
                                    Rs.{{$course->total_price}}.00
                                    <sup class="text-primary"> {{$course->price - $course->total_price}} OFF</sup>
                                </h3>
                                <div class="col-12 p-2">
                                    @if($course->is_enrolled)
                                        <p>You are enrolled in this course.</p>
                                    @else
                                        <a href="#" class="btn btn-primary text-white rounded-0">Enroll Now</a>
                                        @if(auth()->user())
                                            @php
                                                $cart = session()->get('cart', []);
                                                $inCart = array_key_exists($course->course_no, $cart);
                                            @endphp
                                            @if($inCart)
                                                <button class="btn btn-secondary text-white rounded-0" disabled>Already
                                                    in Cart
                                                </button>
                                            @else
                                                <a href="{{ route('cart.add', $course->course_no) }}" class="btn btn-secondary text-white rounded-0">Add To Cart</a>
                                            @endif
                                        @else
                                            <a href="{{ route('login') }}" class="btn btn-secondary text-white rounded-0">Add To Cart</a>
                                        @endif
                                    @endif
                                </div>
                                <hr>
                                <div class="p-2 col-6 d-flex gap-2 align-items-center">
                                    <i class="fa-solid fa-users text-primary"></i>
                                    <h6 style="gap: 0;padding: 0;margin: 0" class="text-primary"> {{$course->student_count}}Enrolled</h6>
                                </div>
                                <div class="p-2 col-6 d-flex gap-2  align-items-center">
                                    <i class="fa-solid fa-user text-primary"></i>
                                    <h6 style="gap: 0;padding: 0;margin: 0" class="text-primary"> {{$course->instructor->name}}</h6>
                                </div>
                                <div class="p-2 col-6 d-flex gap-2  align-items-center">
                                    <i class="fa-solid fa-clock text-primary"></i>
                                    <h6 style="gap: 0;padding: 0;margin: 0" class="text-primary"> {{$course->courseMaterial->count()}} Materials</h6>
                                </div>
                                <div class="p-2 col-6 d-flex gap-2  align-items-center">
                                    <i class="fa-solid fa-video text-primary"></i>
                                    <h6 style="gap: 0;padding: 0;margin: 0" class="text-primary"> {{$course->videos->count()}} Videos</h6>
                                </div>
                                <div class="p-2 col-6 d-flex gap-2  align-items-center">
                                    <i class="fa-solid fa-infinity text-primary"></i>
                                    <h6 style="gap: 0;padding: 0;margin: 0" class="text-primary"> Lifetime Access</h6>
                                </div>
                                <div class="p-2 col-6 d-flex gap-2  align-items-center">
                                    <i class="fa-solid fa-sign-language text-primary"></i>
                                    <h6 style="gap: 0;padding: 0;margin: 0" class="text-primary"> English</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-2 p-1 bg-white rounded-3">
                    <div class="row p-2 p-md-4">
                        <div class="col-12 p-2">
                            <h4 class="text-primary" style="font-weight: 600;font-family:SF Pro Display,serif;">Course
                                Curriculum</h4>
                        </div>
                        <div class="col-12 p-2">
                            <div class="row p-3">
                                @foreach($course->videos as $video)
                                    <div class="col-12 col-md-3 rounded-3 p-2"
                                         style="background-color: rgba(185,185,185,0.18)">
                                        <div class="row p-2">
                                            <div class="col-12 p-2">
                                                <h5 class="text-primary"
                                                    style="font-weight: 600;font-family:SF Pro Display,serif;">{{$video->video_title}}</h5>
                                            </div>
                                            <div class="col-12 p-2">
                                                <p style="font-family:SF Pro Display,serif;" class="course-description">
                                                        <?php
                                                        $description = $video->video_description;
                                                        echo implode(' ', array_slice(explode(' ', nl2br(e($description))), 0, 70));
                                                        ?>...
                                                </p>
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
    @endif
@endsection
