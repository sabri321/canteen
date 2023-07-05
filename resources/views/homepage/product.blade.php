<!DOCTYPE html>
<html>

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Canteen</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home page') }}/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home page') }}/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('home page') }}/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- font css -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('home page') }}/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

</head>

<body>
    <div class="header_section">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand"href="index.html"><img src="{{ asset('home page') }}/images/logo1.gif"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="list/product">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.html">Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blog.html">About</a>
                        </li>
                        @Auth
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard"><i class="fa fa-home"aria-hidden="true"></i> Dashboard</a>
                        </li>   

                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="/login"><span class="user_icon">
                                <i class="fa fa-user"aria-hidden="true"></i></span>Login</a>
                        </li>
                        @endauth
                    </ul>
                   
                </div>
            </nav>
        </div>

    </div>
    <!-- header section end -->
    <!-- coffee section start -->
    <div class="coffee_section layout_padding">
        <div class="container">
            <div class="row">
                <h1 class="coffee_taital">PRODUCT</h1>
                <div class="bulit_icon"><img src="{{ asset('home page') }}/images/bulit-icon.png"></div>
            </div>
        </div>
        <div class="coffee_section_2">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container-fluid">
                            <div class="row">
                                @foreach ($product as $item)      
                                <div class="col-lg-3 col-md-6">
                                    <div class="coffee_img"><img src="{{ asset('storage/' . $item->image) }}">
                                    </div>
                                    <h3 class="types_text">{{ $item->name }}</h3>
                                    <p class="looking_text">Rp. {{ $item->price }}</p>
                                    <div class="read_bt"><a href="#">Pesan</a></div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- coffee section end -->

    <!-- copyright section start -->
    <div class="copyright_section mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <p class="copyright_text">2020 All Rights Reserved. Design by <a href="https://html.design">Free
                            Html Templates</a></p>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="footer_social_icon">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- copyright section end -->
    <!-- Javascript files-->
    <script src="{{ asset('home page') }}/js/jquery.min.js"></script>
    <script src="{{ asset('home page') }}/js/popper.min.js"></script>
    <script src="{{ asset('home page') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('home page') }}/js/jquery-3.0.0.min.js"></script>
    <script src="{{ asset('home page') }}/js/plugin.js"></script>
    <!-- sidebar -->
    <script src="{{ asset('home page') }}/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="{{ asset('home page') }}/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>