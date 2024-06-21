@extends('Layouts.HomePageLayout')
@section('content')
    <div class="container-fluid">
        <div class="row p-3 p-md-5">
            <div class="col-12 p-3 rounded-4" style="background-color: #093B3B">
                <div class="row mt-5 mb-3">
                    <div class="col-md-6 d-flex justify-content-center align-items-center p-4">
                        <div class="row p-4">
                            <div class="col-12">
                                <p style="font-size: 2rem;color: #FFF;font-weight: 300;font-family:sans-serif;line-height: 0.7;">
                                    IOCL</p>
                            </div>
                            <div class="col-12">
                                <p style="font-size: 3rem;color: #FFF;font-weight: 700;font-family:sans-serif;line-height: 1.2;">
                                    Knowledge Meets Innovation</p>
                            </div>
                            <div class="col-12">
                                <p style="font-size: 1rem;color: #FFF;font-weight: 400;font-family:sans-serif;line-height: 1.2;">
                                    We are here to help you to learn and grow. We provide you the best courses and the
                                    best
                                    teachers to help you to achieve your goals.
                                </p>
                            </div>
                            <div class="col-12">
                                <div class="row px-2">
                                    <div class="col-md-9 p-0 border border-0">
                                        <input style="background-color: #E8F6F3" type="text"
                                               class="rounded-0 w-100 form-control" placeholder="Search Course">
                                    </div>
                                    <div class=" col-md-3 p-0 border border-0">
                                        <select style="background-color: #E8F6F3" class="rounded-0 w-100 form-select">
                                            <option value="1">Search</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center align-items-center p-4">
                        <img src="{{asset('assets/images/BG/mainCardImage.png')}}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="background-color: #FFF">
        <div class="row p-5">
            <div class="col-12">
                <p class="text-center"
                   style="font-size: 1.5rem;color: #093B3B;font-weight: 700;font-family:sans-serif;line-height: 1.1;">
                    Connect with us to learn and grow together with IOCL Community.
                </p>
            </div>
            <div class="col-12">
                <div class="row mt-2">
                    <div class="col-md-4 d-flex justify-content-center align-items-center p-4">
                        <div class="row p-4">
                            <div class="col-12 d-flex justify-content-center align-items-center">
                                <img src="{{asset('assets/images/Icons/teacher.png')}}" class="img-fluid" alt="">
                            </div>
                            <div class="col-12">
                                <p class="text-center"
                                   style="font-size: 1.5rem;color: #093B3B;font-weight: 700;font-family:sans-serif;line-height: 1.1;">
                                    Best Teachers
                                </p>
                            </div>
                            <div class="col-12">
                                <p class="text-center"
                                   style="font-size: 1rem;color: #093B3B;font-weight: 400;font-family:sans-serif;line-height: 1.1;">
                                    We provide you the best teachers to help you to achieve your goals.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center align-items-center p-4">
                        <div class="row p-4">
                            <div class="col-12 d-flex justify-content-center align-items-center">
                                <img src="{{asset('assets/images/Icons/course.png')}}" class="img-fluid" alt="">
                            </div>
                            <div class="col-12">
                                <p class="text-center"
                                   style="font-size: 1.5rem;color: #093B3B;font-weight: 700;font-family:sans-serif;line-height: 1.1;">
                                    Best Courses
                                </p>
                            </div>
                            <div class="col-12">
                                <p class="text-center"
                                   style="font-size: 1rem;color: #093B3B;font-weight: 400;font-family:sans-serif;line-height: 1.1;">
                                    We provide you the best courses to help you to achieve your goals.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center align-items-center p-4">
                        <div class="row p-4">
                            <div class="col-12 d-flex justify-content-center align-items-center">
                                <img src="{{asset('assets/images/Icons/learn.png')}}" class="img-fluid" alt="">
                            </div>
                            <div class="col-12">
                                <p class="text-center"
                                   style="font-size: 1.5rem;color: #093B3B;font-weight: 700;font-family:sans-serif;line-height: 1.1;">
                                    Learn and Grow
                                </p>
                            </div>
                            <div class="col-12">
                                <p class="text-center"
                                   style="font-size: 1rem;color: #093B3B;font-weight: 400;font-family:sans-serif;line-height: 1.1;">
                                    We are here to help you to learn and grow with the best teachers to help you to
                                    achieve your goals.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row p-5">
            <div class="col-12">
                <p class="text-center"
                   style="font-size: 1.5rem;color: #093B3B;font-weight: 700;font-family:sans-serif;line-height: 1.1;">
                    Our Courses
                </p>
            </div>
            <div class="col-12">
                <div class="row">
                    @foreach($courses as $course)
                        <div class="col-12 col-md-3">
                            <div class="row p-1">
                                <div class="col-12 rounded rounded-3">
                                    <div class="row rounded rounded-3">
                                        <div
                                            class="col-12 d-flex justify-content-center align-items-center p-0 m-0 rounded-3">
                                            <img src="{{asset($course->image_path)}}"
                                                 class="w-100 rounded-top-3 " alt="">
                                        </div>
                                        <div class="col-12" style="background-color: #FFF">
                                            <div class="row p-2">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div
                                                            class="col-2 d-flex justify-content-center align-items-center">
                                                            <img style="width: 35px; height: 35px;"
                                                                 class="rounded-circle"
                                                                 src="{{asset($course->instructor->img_path)}}" alt="">
                                                        </div>
                                                        <div
                                                            class="col-10 d-flex align-items-center justify-content-start m-0 p-0">
                                                            <div>
                                                                <p style="font-weight: 700; margin: 0;line-height: 1">{{$course->instructor->name}}</p>
                                                                <p style="font-weight: 400; margin: 0;line-height: 1;color: #0a3622">{{$course->category->name}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12 mt-3">
                                                            <p class="p-0 py-1 m-0"
                                                               style="color: #0f5132;font-size: 1.2rem;font-weight: 700;font-family:'SF Pro Display' ">{{$course->title}}</p>
                                                            <p class="p-0 py-1 m-0"
                                                               style="color: #093B3B;font-size: 1rem;font-weight: 400;font-family:'SF Pro Display';line-height: 1">{{$course->description}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 p-1">
                                                    <hr>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div
                                                            class="col-12 d-flex justify-content-between align-items-center">
                                                            <div class="col-6">
                                                                <p class="p-0 py-1 m 0" style="color: #093B3B;font-size: 1rem;font-weight: 400;font-family:'SF Pro Display';line-height: 1">
                                                                    {{$course->videos->count()}} Videos
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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

    <div class="container-fluid" style="background-color: #FFF">
        <div class="row p-3 p-md-5">
            <div class="col-12 col-md-4">
                <div class="row p-4">
                    <div class="col-12">
                        <p class="text-start"
                           style="font-size: 3rem;color: #093B3B;font-weight: 700;font-family:sans-serif;line-height: 1;">
                            Why choose our classes
                        </p>
                        <p style="font-size: 1rem;color: #093B3B;font-weight: 400;font-family:sans-serif;line-height: 1.1;">
                            Comfort reached gay perhaps chamber his six detract besides add. Moonlight
                            newspaper up its
                            enjoyment agreeable depending.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 ">
                <div class="row p-1">
                    <div class="col-12  rounded-3" style="background-color: #E8F6F3">
                        <div class="row p-4">
                            <div class="col-12">
                                <div class="col-12 py-3">
                                    <svg width="28" height="30" viewBox="0 0 28 30" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M0.693001 2.26946C0.739914 1.87194 0.879006 1.49086 1.0992 1.15659C1.31939 0.822315 1.6146 0.544078 1.96131 0.34404C2.30802 0.144002 2.69665 0.0276896 3.09625 0.00436756C3.49585 -0.0189544 3.89537 0.0513582 4.263 0.209705C6.1215 1.00421 10.2865 2.89246 15.5715 5.94271C20.8582 8.99471 24.577 11.66 26.1922 12.8692C27.5713 13.9035 27.5747 15.9545 26.194 16.9922C24.5945 18.1945 20.9212 20.8247 15.5715 23.9152C10.2165 27.0057 6.1005 28.8712 4.2595 29.6552C2.674 30.3325 0.899501 29.3052 0.693001 27.5955C0.451501 25.597 0 21.0592 0 14.9307C0 8.80571 0.449751 4.26971 0.693001 2.26946Z"
                                              fill="#093B3B"/>
                                    </svg>
                                </div>
                                <p class="text-start"
                                   style="font-size: 1.5rem;color: #0f5132;font-weight: 700;font-family:sans-serif;line-height: 1;">
                                    Occasional Video Update
                                </p>
                                <p style="font-size: 1rem;color: #093B3B;font-weight: 400;font-family:sans-serif;line-height: 1.1;">
                                    We provide regular video updates to keep our users informed about the
                                    latest courses
                                    and
                                    features. Stay tuned for more exciting updates!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 ">
                <div class="row p-1">
                    <div class="col-12  rounded-3" style="background-color: #E8F6F3">
                        <div class="row p-4">
                            <div class="col-12">
                                <div class="col-12 py-3">
                                    <svg width="28" height="30" viewBox="0 0 28 30" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M0.693001 2.26946C0.739914 1.87194 0.879006 1.49086 1.0992 1.15659C1.31939 0.822315 1.6146 0.544078 1.96131 0.34404C2.30802 0.144002 2.69665 0.0276896 3.09625 0.00436756C3.49585 -0.0189544 3.89537 0.0513582 4.263 0.209705C6.1215 1.00421 10.2865 2.89246 15.5715 5.94271C20.8582 8.99471 24.577 11.66 26.1922 12.8692C27.5713 13.9035 27.5747 15.9545 26.194 16.9922C24.5945 18.1945 20.9212 20.8247 15.5715 23.9152C10.2165 27.0057 6.1005 28.8712 4.2595 29.6552C2.674 30.3325 0.899501 29.3052 0.693001 27.5955C0.451501 25.597 0 21.0592 0 14.9307C0 8.80571 0.449751 4.26971 0.693001 2.26946Z"
                                              fill="#093B3B"/>
                                    </svg>
                                </div>
                                <p class="text-start"
                                   style="font-size: 1.5rem;color: #0f5132;font-weight: 700;font-family:sans-serif;line-height: 1;">
                                    Online Course From Experts
                                </p>
                                <p style="font-size: 1rem;color: #093B3B;font-weight: 400;font-family:sans-serif;line-height: 1.1;">
                                    We provide online courses from experts to help you to achieve your
                                    goals. We provide
                                    the best courses to help you to achieve your goals.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 ">
                <div class="row p-1">
                    <div class="col-12  rounded-3" style="background-color: #E8F6F3">
                        <div class="row p-4">
                            <div class="col-12">
                                <div class="col-12 py-3">
                                    <svg width="28" height="30" viewBox="0 0 28 30" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M0.693001 2.26946C0.739914 1.87194 0.879006 1.49086 1.0992 1.15659C1.31939 0.822315 1.6146 0.544078 1.96131 0.34404C2.30802 0.144002 2.69665 0.0276896 3.09625 0.00436756C3.49585 -0.0189544 3.89537 0.0513582 4.263 0.209705C6.1215 1.00421 10.2865 2.89246 15.5715 5.94271C20.8582 8.99471 24.577 11.66 26.1922 12.8692C27.5713 13.9035 27.5747 15.9545 26.194 16.9922C24.5945 18.1945 20.9212 20.8247 15.5715 23.9152C10.2165 27.0057 6.1005 28.8712 4.2595 29.6552C2.674 30.3325 0.899501 29.3052 0.693001 27.5955C0.451501 25.597 0 21.0592 0 14.9307C0 8.80571 0.449751 4.26971 0.693001 2.26946Z"
                                              fill="#093B3B"/>
                                    </svg>
                                </div>
                                <p class="text-start"
                                   style="font-size: 1.5rem;color: #0f5132;font-weight: 700;font-family:sans-serif;line-height: 1;">
                                    Class Program Options
                                </p>
                                <p style="font-size: 1rem;color: #093B3B;font-weight: 400;font-family:sans-serif;line-height: 1.1;">
                                    We provide you the best class program options to help you to achieve
                                    your goals. We
                                    provide the best courses to help you to achieve your goals.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 ">
                <div class="row p-1">
                    <div class="col-12  rounded-3" style="background-color: #E8F6F3">
                        <div class="row p-4">
                            <div class="col-12">
                                <div class="col-12 py-3">
                                    <svg width="28" height="30" viewBox="0 0 28 30" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M0.693001 2.26946C0.739914 1.87194 0.879006 1.49086 1.0992 1.15659C1.31939 0.822315 1.6146 0.544078 1.96131 0.34404C2.30802 0.144002 2.69665 0.0276896 3.09625 0.00436756C3.49585 -0.0189544 3.89537 0.0513582 4.263 0.209705C6.1215 1.00421 10.2865 2.89246 15.5715 5.94271C20.8582 8.99471 24.577 11.66 26.1922 12.8692C27.5713 13.9035 27.5747 15.9545 26.194 16.9922C24.5945 18.1945 20.9212 20.8247 15.5715 23.9152C10.2165 27.0057 6.1005 28.8712 4.2595 29.6552C2.674 30.3325 0.899501 29.3052 0.693001 27.5955C0.451501 25.597 0 21.0592 0 14.9307C0 8.80571 0.449751 4.26971 0.693001 2.26946Z"
                                              fill="#093B3B"/>
                                    </svg>
                                </div>
                                <p class="text-start"
                                   style="font-size: 1.5rem;color: #0f5132;font-weight: 700;font-family:sans-serif;line-height: 1;">
                                    50+ High Quality Courses
                                </p>
                                <p style="font-size: 1rem;color: #093B3B;font-weight: 400;font-family:sans-serif;line-height: 1.1;">
                                    We provide 50+ high quality courses and validated certificates to help
                                    you to
                                    achieve your goals. We provide the
                                    best courses to help you to achieve your goals.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 h-auto">
                <div class="row p-1">
                    <div class="col-12 rounded-3" style="background-color: #E8F6F3">
                        <div class="row p-4">
                            <div class="col-12">
                                <div class="col-12 py-3">
                                    <svg width="28" height="30" viewBox="0 0 28 30" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M0.693001 2.26946C0.739914 1.87194 0.879006 1.49086 1.0992 1.15659C1.31939 0.822315 1.6146 0.544078 1.96131 0.34404C2.30802 0.144002 2.69665 0.0276896 3.09625 0.00436756C3.49585 -0.0189544 3.89537 0.0513582 4.263 0.209705C6.1215 1.00421 10.2865 2.89246 15.5715 5.94271C20.8582 8.99471 24.577 11.66 26.1922 12.8692C27.5713 13.9035 27.5747 15.9545 26.194 16.9922C24.5945 18.1945 20.9212 20.8247 15.5715 23.9152C10.2165 27.0057 6.1005 28.8712 4.2595 29.6552C2.674 30.3325 0.899501 29.3052 0.693001 27.5955C0.451501 25.597 0 21.0592 0 14.9307C0 8.80571 0.449751 4.26971 0.693001 2.26946Z"
                                              fill="#093B3B"/>
                                    </svg>
                                </div>
                                <p class="text-start"
                                   style="font-size: 1.5rem;color: #0f5132;font-weight: 700;font-family:sans-serif;line-height: 1;">
                                    Earn a Certificate
                                </p>
                                <p style="font-size: 1rem;color: #093B3B;font-weight: 400;font-family:sans-serif;line-height: 1.1;">
                                    We provide you the best class program options to help you to achieve
                                    your goals. We
                                    provide the best courses to help you to achieve your goals.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
