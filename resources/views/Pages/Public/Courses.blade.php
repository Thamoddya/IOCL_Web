@extends('Layouts.HomePageLayout')
@section('content')
    <div class="container-fluid">
        <div class="row p-3 p-md-5 justify-content-center">
            <div class="col-12 p-1 bg-white rounded-3">
                <div class="row p-2 p-md-4">
                    <div class="col-12 border border-right-1 border-top-0 border-bottom-0 border-left-0 border-start-0">
                        <h4 class="text-primary" style="font-weight: 600;font-family:SF Pro Display,serif;">All Courses</h4>
                    </div>
                    <div class="col-12">
                        <!-- Search Form -->
                        <form action="{{ route('courses') }}" method="GET" class="mb-4">
                            <div class="row">
                                <div class="col-md-3 py-3">
                                    <select name="category" class="form-select">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->category_id }}" {{ request('category') == $category->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 py-3">
                                    <input type="number" name="min_price" class="form-control" placeholder="Min Price" value="{{ request('min_price') }}">
                                </div>
                                <div class="col-md-3 py-3">
                                    <input type="number" name="max_price" class="form-control" placeholder="Max Price" value="{{ request('max_price') }}">
                                </div>
                                <div class="col-md-3 py-3">
                                    <button type="submit" class="btn btn-primary w-100">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if($courses->isEmpty())
                        <div class="col-12">
                            <p>No courses found.</p>
                        </div>
                    @else
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
                                                                <div class="col-12">
                                                                    <a href="{{route('get.course',$course->course_no)}}" class="p-0 py-1 m-0 text-decoration-none"
                                                                       style="color: #0f5132;font-size: 1.2rem;font-weight: 700;font-family:'SF Pro Display' ">{{$course->title}}</a>
                                                                </div>
                                                                <a href="{{route('get.course',$course->course_no)}}" class="p-0 py-1 m-0 text-decoration-none"
                                                                   style="color: #093B3B;font-size: 1rem;font-weight: 400;font-family:'SF Pro Display';line-height: 1">{{Str::limit($course->description,40)}}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 p-1">
                                                        <hr>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div
                                                                class=" col-12 d-flex justify-content-between align-items-center">
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
                    @endif
                </div>
                <div class="row p-2 p-md-4">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $courses->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
