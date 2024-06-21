@extends('Pages.Admin.AdminLayout.AdminLayout')
@section('content')
    <div class="block-header">
        <h2>Add Course</h2>
        <small class="text-muted">Welcome to Swift application</small>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2>Course Basic Information </h2>
                    <ul class="header-dropdown">
                        <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle"
                                                data-toggle="dropdown" role="button" aria-haspopup="true"
                                                aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <form class="row clearfix" method="POST" action="{{ route('courses.store') }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="title" placeholder="Course Title"
                                           value="{{ old('title') }}">
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="input-group mb-3">
                                <label for="inputGroupFile01" class="form-label">Course Image</label>
                                <input type="file" class="form-control input-group col-cyan" name="course_image"
                                       accept=".jpg,.png">
                                @error('course_image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <span class="text-danger" id="error_profile_image"></span>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="form-group drop-custum">
                                <select class="form-control show-tick" name="instructor_id">
                                    <option value="">-- Instructor --</option>
                                    @foreach($instructors as $instructor )
                                        <option
                                            value="{{ $instructor->instructor_id }}" {{ old('instructor_id') == $instructor->instructor_id ? 'selected' : '' }}>{{ $instructor->name }}</option>
                                    @endforeach
                                </select>
                                @error('instructor_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="form-group drop-custum">
                                <select class="form-control show-tick" name="category_id">
                                    <option value="">-- Category --</option>
                                    @foreach($categories as $category )
                                        <option
                                            value="{{ $category->category_id }}" {{ old('category_id') == $category->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="datepicker form-control" name="expire_date"
                                           placeholder="Expire Date" value="{{ old('expire_date') }}">
                                    @error('expire_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="price" placeholder="Course Price"
                                           value="{{ old('price') }}">
                                    @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="total_price"
                                           placeholder="Total Price" value="{{ old('total_price') }}">
                                    @error('total_price')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="30" class="form-control" name="description"
                                              placeholder="Course Description">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-raised waves-effect g-bg-cgreen">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
