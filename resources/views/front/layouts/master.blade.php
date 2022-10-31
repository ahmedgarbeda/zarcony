<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('assets/front/')}}/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets/front/')}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/front/')}}/css/style.css" rel="stylesheet">
</head>

<body>
<!-- Topbar Start -->
<div class="container-fluid">

    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
            </a>
        </div>
        <div class="col-lg-9 col-6 text-right pull-right">
            <a href="" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
            </a>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid">
    <div class="row border-top px-xl-5">
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="{{url('/')}}" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{route('products')}}" class="nav-item nav-link">Home</a>
                        <a href="{{route('brands')}}" class="nav-item nav-link active">Brands</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0 pull-right">
                        @if(auth()->check() && !auth()->user()->is_admin)
                            <a href="javascript:;" class="nav-item nav-link">{{auth()->user()->name}}</a>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                            <input type="submit" class="btn btn-primary mt-2" value="Logout">
                            </form>
                        @else
                        <a href="{{route('login')}}" class="nav-item nav-link">Login</a>
                        <a href="{{route('register')}}" class="nav-item nav-link">Register</a>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar End -->

@yield('content')




<!-- Footer Start -->
<div class="container-fluid bg-secondary text-dark">

    <div class="row border-top border-light mx-xl-5 py-4">
        <div class="col-md-6 px-xl-0">
            <p class="mb-md-0 text-center text-md-left text-dark">
                &copy; <a class="text-dark font-weight-semi-bold" href="#">Your Site Name</a>. All Rights Reserved. Designed
                by
                <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a><br>
                Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
            </p>
        </div>
        <div class="col-md-6 px-xl-0 text-center text-md-right">
            <img class="img-fluid" src="{{asset('assets/front/')}}/img/payments.png" alt="">
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/front/')}}/lib/easing/easing.min.js"></script>
<script src="{{asset('assets/front/')}}/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="{{asset('assets/front/')}}/mail/jqBootstrapValidation.min.js"></script>
<script src="{{asset('assets/front/')}}/mail/contact.js"></script>

<!-- Template Javascript -->
<script src="{{asset('assets/front/')}}/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

@include('sweetalert::alert')

</body>

</html>
