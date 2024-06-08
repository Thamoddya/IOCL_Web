@extends('Layouts.HomePageLayout')
@section('content')
    <div class="container-fluid">
        <div class="row p-3 p-md-5">
            <div class="col-12 p-3 rounded-4" style="background-color: #093B3B">
                <div class="row mt-2 mb-3">
                    <div class="col-12">
                        <p class="p-0 lh-1  m 0"
                           style="color: #FFF;font-size: 2rem;font-weight: 400;font-family:'SF Pro Display',serif;">
                            Create New Account
                        </p>
                        <p class="p-0 lh-1 m 0" style="color: #FFF;font-size: 1rem;font-family:'SF Pro Display',serif">
                            Please fill in the form to create a new account.
                        </p>
                    </div>
                </div>
                <div class="row mt-2 mb-3">
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
                                           placeholder="Enter Your Password" name="REG_Password" required value="{{ old('REG_Password') }}">
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
                                           placeholder="Enter Your Password" name="REG_ConfirmPassword" required value="{{ old('REG_ConfirmPassword') }}">
                                    @if ($errors->has('REG_ConfirmPassword'))
                                        <div class="text-danger">{{ $errors->first('REG_ConfirmPassword') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3 form-check">
                                    <input type="checkbox" required name="REG_Terms" class="form-check-input"
                                           id="REG_Terms" {{ old('REG_Terms') ? 'checked' : '' }}>
                                    <label class="form-check label text-white" for="REG_Terms">I agree to the terms and
                                        conditions</label>
                                    @if ($errors->has('REG_Terms'))
                                        <div class="text-danger">{{ $errors->first('REG_Terms') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary rounded-0 px-5 py-2">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        //Swal if php session has success
        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{session('success')}}',
        });
        @endif(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{session('error')}}',
        });
    </script>
@endsection
