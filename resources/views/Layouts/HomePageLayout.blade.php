<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IOCL HOME</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/HomePage.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-icons.css')}}">
    <script src="https://kit.fontawesome.com/3840ac106f.js" crossorigin="anonymous"></script>
    <style>
        @font-face {
            font-family: 'SF Pro Display';
            font-style: normal;
            font-weight: 400;
            src: url('{{asset('assets/fonts/SFPRODISPLAYREGULAR.OTF')}}') format('woff2')
        }
    </style>

    @if(Route::currentRouteName() == 'cart.index')
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

    @endif
</head>
<body style="background-color: #E8F6F3">
<nav class="navbar navbar-expand-lg bg-transparent">
    <div class="container-fluid px-md-5">
        <a class="navbar-brand" href="{{route('home')}}">
            <h3 class="text-primary fw-bold">IOCL</h3>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <br class="d-flex d-md-none">
            <form class="d-flex ms-auto d-flex justify-content-center align-items-start">
                <div class="input-group mb-3 ">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fas fa-search text-primary"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                           aria-describedby="basic-addon1">
                </div>
            </form>
            <ul class="navbar-nav ms-auto d-flex justify-content-center align-items-start">
                <li class="nav-item d-flex justify-content-center align-items-start">
                    <a class="nav-link text-primary fw-medium" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item d-flex justify-content-center align-items-start">
                    <a class="nav-link text-primary fw-medium" href="#">Courses</a>
                </li>
                <li class="nav-item d-flex justify-content-center align-items-start">
                    <a class="nav-link text-primary fw-medium" href="#">About</a>
                </li>
                <li class="nav-item d-flex justify-content-center align-items-start">
                    <a class="nav-link text-primary fw-medium" href="#">Contact</a>
                </li>
                @if(auth()->user())
                    <li class="nav-item d-flex justify-content-center align-items-start">
                        <a class="nav-link text-primary fw-medium" href="{{route('cart.index')}}">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-flex justify-content-center align-items-start">
                        <button type="button" class="btn btn-primary rounded rounded-0">DASHBOARD</button>
                    </li>
                    <li class="nav-item d-none d-md-flex justify-content-center align-items-start">
                        <button type="button" class="border border-0 bg-transparent" onclick="openDetailModal();">
                            <img style="width: 35px; height: 35px;" class="rounded-circle"
                                 src="{{asset('assets/images/Icons/user.jpg')}}" alt="">
                        </button>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-primary fw-medium" href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary fw-medium" href="{{route('register')}}">Register</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="loggedStudentDetailsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Logout</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Done</button>
            </div>
        </div>
    </div>
</div>

@yield('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('assets/scripts/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/scripts/jquery.js')}}"></script>
<script src="{{asset('assets/scripts/HomePage.js')}}"></script>
<script src="{{asset('assets/scripts/script.js')}}"></script>

<script>
    $(document).ready(function () {
        $('#search-course').on('keyup', function () {
            var query = $(this).val();
            if (query.length > 1) {
                $.ajax({
                    url: "{{ route('search.courses') }}",
                    type: "GET",
                    data: {'query': query},
                    success: function (data) {
                        $('#suggestion-box').html('');
                        if (data.length > 0) {
                            $.each(data, function (key, value) {
                                $('#suggestion-box').append('<li class="list-group-item list-group-item-action" data-id="' + value.course_no + '">' + value.title + '</li>');
                            });
                        } else {
                            $('#suggestion-box').html('<li class="list-group-item list-group-item-action">No results found</li>');
                        }
                    }
                });
            } else {
                $('#suggestion-box').html('');
            }
        });

        $(document).on('click', '#suggestion-box li', function () {
            var courseId = $(this).data('course_no');
            window.location.href = '/course/' + courseId;
        });
    });

</script>
</body>
</html>
