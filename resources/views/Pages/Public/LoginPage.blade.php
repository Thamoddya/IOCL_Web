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
                                <div>
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
                                        <button onclick="login()" type="button"
                                                class="btn btn-primary">Login
                                        </button>
                                    </div>
                                    <div class="d-grid gap 2 mt-3">
                                        <p class="text-white fw-normal text-decoration-none">Don't have an account ?
                                            <a class="text-primary fw-normal text-decoration-none"
                                               href="{{route('register')}}">Click Here
                                            </a>
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


    <script>
        let timerInterval;
        function login() {
            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;
            let rememberMe = document.getElementById('rememberMe').checked;
            let token = '{{csrf_token()}}';
            let xhr = new XMLHttpRequest();
            xhr.open('POST', '{{route('auth.login')}}', true);
            xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
            xhr.setRequestHeader('X-CSRF-TOKEN', token);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        let response = JSON.parse(xhr.responseText);
                        if (response.attempt == "success") {
                            setCookie('IOCL_ID', response.student.iocl_id, 30);
                            Swal.fire({
                                title: `Login Success`,
                                html: `Hello ${response.student.firstName} ${response.student.lastName}.You will redirect to your Dashboard in seconds.`,
                                timer: 1300,
                                timerProgressBar: true,
                                didOpen: () => {Swal.showLoading();},
                                willClose: () => {clearInterval(timerInterval);}
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    if (response.role[0] == "Student") {
                                        window.location.href = '{{route('student.dashboard')}}';
                                    } else if (response.role[0] == "Admin") {
                                        window.location.href = '{{route('admin.dashboard')}}';
                                    } else {swal("Error", "Invalid Role", "error")}}
                            });
                        } else {Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Invalid Credentials!',
                            });}}}};
            let data = JSON.stringify({
                LOG_Email: email, LOG_Password: password, rememberMe: rememberMe, _token: token});
            xhr.send(data);
        }
    </script>
@endsection
