@extends('component.main')
@section('conten')
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <h4 class="card-title text-warning"> Haiii.. {{ Auth::user()->name }}</h4>
                        <h5>Selamat Datang..<br> Di Canteen SMAN 1 Mataram </h5>
                        <p class="mb-0">
                            Di sini, kami dengan bangga menyajikan hidangan-hidangan istimewa yang akan memanjakan lidah
                            Anda dan menyenangkan hati Anda.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-4 order-0">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExample" data-bs-slide-to="0" class=""></li>
                <li data-bs-target="#carouselExample" data-bs-slide-to="1" class=""></li>
                <li data-bs-target="#carouselExample" data-bs-slide-to="2" class="active" aria-current="true"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('template') }}/img/elements/hero1.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>First slide</h3>
                        <p>Eos mutat malis maluisset et, agam ancillae quo te, in vim congue pertinacia.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('template') }}/img/elements/hero2.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Second slide</h3>
                        <p>In numquam omittam sea.</p>
                    </div>
                </div>
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('template') }}/img/elements/hero3.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Third slide</h3>
                        <p>Lorem ipsum dolor sit amet, virtute consequat ea qui, minim graeco mel no.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>
@endsection
