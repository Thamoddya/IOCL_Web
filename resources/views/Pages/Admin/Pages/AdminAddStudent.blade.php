@extends('Pages.Admin.AdminLayout.AdminLayout')
@section('content')
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>Register a Student</h2>
                <small class="text-muted">Enter the required fields.</small>
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
                <div class="header">
                    <h2>Student Information</h2>
                </div>
                <div class="body">
                    <div class="col-12">
                        <form class="row m-0 p-0" action="{{route('auth.register')}}" method="post">
                            @csrf
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="REG_FirstName" class="form-label text-white">First Name</label>
                                    <input placeholder="Your First Name" type="text" class="form-control rounded-0"
                                           id="REG_FirstName" name="REG_FirstName" value="{{ old('REG_FirstName') }}"
                                           required>
                                    @if ($errors->has('REG_FirstName'))
                                        <div class="text-danger">{{ $errors->first('REG_FirstName') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="REG_LastName" class="form-label text-white">Last Name</label>
                                    <input placeholder="Your Last Name" type="text" class="form-control rounded-0"
                                           id="REG_LastName" name="REG_LastName" value="{{ old('REG_LastName') }}"
                                           required>
                                    @if ($errors->has('REG_LastName'))
                                        <div class="text-danger">{{ $errors->first('REG_LastName') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="REG_Email" class="form-label text-white">Email</label>
                                    <input placeholder="Your Email Address" type="email" class="form-control rounded-0"
                                           id="REG_Email" name="REG_Email" value="{{ old('REG_Email') }}" required>
                                    @if ($errors->has('REG_Email'))
                                        <div class="text-danger">{{ $errors->first('REG_Email') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="REG_Mobile" class="form-label text-white">Mobile Number</label>
                                    <input id="REG_Mobile" type="number" class="form-control rounded-0"
                                           placeholder="Enter Your Mobile" name="REG_Mobile"
                                           value="{{ old('REG_Mobile') }}" required>
                                    @if ($errors->has('REG_Mobile'))
                                        <div class="text-danger">{{ $errors->first('REG_Mobile') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="REG_Password" class="form-label text-white">Password</label>
                                    <input id="REG_Password" type="password" class="form-control rounded-0"
                                           placeholder="Enter Your Password" name="REG_Password" required
                                           value="{{ old('REG_Password') }}">
                                    @if ($errors->has('REG_Password'))
                                        <div class="text-danger">{{ $errors->first('REG_Password') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="REG_ConfirmPassword" class="form-label text-white">Confirm
                                        Password</label>
                                    <input id="REG_ConfirmPassword" type="password" class="form-control rounded-0"
                                           placeholder="Enter Your Password" name="REG_ConfirmPassword" required
                                           value="{{ old('REG_ConfirmPassword') }}">
                                    @if ($errors->has('REG_ConfirmPassword'))
                                        <div class="text-danger">{{ $errors->first('REG_ConfirmPassword') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3 form-check">
                                    <input required name="REG_Terms" {{ old('REG_Terms') ? 'checked' : '' }} type="checkbox" id="basic_checkbox_1" />
                                    <label for="REG_Terms">I agree to the terms and conditions</label>
                                    @if ($errors->has('REG_Terms'))
                                        <div class="text-danger">{{ $errors->first('REG_Terms') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn bg-cyan rounded-0 px-5 py-2">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
