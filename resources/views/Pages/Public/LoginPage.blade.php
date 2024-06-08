@extends('Layouts.HomePageLayout')
@section('content')
    <div class="container-fluid">
        <div class="row p-3 p-md-5">
            <div class="col-12 p-3 rounded-4" style="background-color: #093B3B">
                <div class="row mt-5 mb-3">
                    <div class="col-md-6 d-flex justify-content-center align-items-center p-4">
                        <img src="{{asset('assets/images/BG/mainCardImage.png')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="text-white text-center">Login</h1>
                            </div>
                            <div class="col-12">
                                <form action="#" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label text-white">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label text-white">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                               required>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="rememberMe">
                                        <label class="form-check label text-white" for="rememberMe">Remember me</label>
                                    </div>
                                    <div class="d-grid gap 2">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                    <div class="d-grid gap 2 mt-3">
                                        <p class="text-white fw-normal text-decoration-none">Don't have an account ?
                                            <a class="text-primary fw-normal text-decoration-none"
                                               href="{{route('register')}}">Click Here
                                            </a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
