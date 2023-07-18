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
    <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" >
    Launch demo modal
  </button> --}}
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Informasi</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed ad, minima aspernatur esse excepturi impedit ex, eligendi sapiente minus dignissimos consectetur voluptas at laudantium perferendis assumenda molestiae, repellendus nesciunt veritatis.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
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
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Information</a>
                        </li>
                        @Auth
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/{{ auth()->user()->role }}"><i class="fa fa-home"aria-hidden="true"></i> Dashboard</a>
                        </li>   

                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                        @endauth
                    </ul>
                   
                </div>
            </nav>
        </div>
        <!-- banner section start -->
        <div class="banner_section layout_padding">
            <div class="container">
                <div id="banner_slider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="banner_img"><img src="{{ asset('home page') }}/images/banner-img.png">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="banner_taital_main">
                                        <h1 class="banner_taital">SMAN 1 Mataram</h1>
                                        <h5 class="tasty_text">Kantin Sehat</h5>
                                        <p class="banner_text">Kantin sehat adalah sebuah konsep kantin di sekolah
                                            yang menawarkan makanan dan minuman sehat kepada para
                                            siswa. Konsep ini bertujuan untuk mempromosikan gaya
                                            hidup sehat dan memastikan bahwa siswa memiliki akses
                                            terhadap makanan yang bergizi dan bermanfaat bagi
                                            kesehatan mereka. </p>
                                        <div class="btn_main">
                                            @auth

                                            @else

                                            <div class="about_bt"><a href="/register">REGISTER</a></div>
                                            <div class="callnow_bt active"><a href="/login">LOGIN</a></div>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner section end -->
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
                                @foreach ($product->slice(0,8) as $item)
                                    <div class="col-lg-3 col-md-6 mt-3">
                                        <div class="coffee_img"><img src="{{ asset('storage/' . $item->image) }}">
                                        </div>
                                        <h3 class="types_text">{{ $item->name }}</h3>
                                        <p class="owner_text text-warning">Tenant {{ $item->user->name }}</p>
                                        <p class="looking_text">Rp. {{ $item->price }}</p>
                                        @auth
                                        
                                        <div class="read_bt"><a href="transaction/{{ $item->id }}">Pesan</a></div>    
                                        @else
                                        <div class="read_bt"><a href="login">Pesan</a></div>    
                                        
                                        @endauth
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- coffee section end -->

    <!-- footer section start -->
    <div class="footer_section layout_padding mt-2">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <h1 class="address_text">Address</h1>
                    <p class="footer_text">Jln. Pendidikan No. 21 Mataram, Kota Mataram, Nusa Tenggara Barat</p>
                    <div class="location_text">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa fa-phone" aria-hidden="true"></i><span class="padding_left_10">(0370) 621803</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-envelope" aria-hidden="true"></i><span
                                        class="padding_left_10">sman1mtr@yahoo.com</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="form-group">
                        <textarea class="update_mail" placeholder="Your Email" rows="5" id="comment" name="Your Email"></textarea>
                        <div class="subscribe_bt"><a href="#"><img
                                    src="{{ asset('home page') }}/images/teligram-icon.png"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer section end -->
    <!-- copyright section start -->
    <div class="copyright_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <p class="copyright_text"> 
                        ©Copyright mhsdev.sabri
                        <script>
                        document.write(new Date().getFullYear());
                    </script>                 
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
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
