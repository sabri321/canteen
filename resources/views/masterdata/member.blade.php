@extends('component.main')
@section('conten')
    <div class="col-lg-8 mb-4 order-0">
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
    <div class="col-lg-4 col-md-4 order-0">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body ">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAAAXNSR0IArs4c6QAAAZBJREFUaEPtmrFKA0EURU9sBRt/xF5EsdHORvIPNlaKpdpqLfgLVoqNRBAV7P0TG21FGdgU7mbMzDCQ93bv1m8m97zzZslmM2Jg12hgvAi478ZlWIZ71gGNdM+EdnBkuNWSfeAA2HZi/gm4Am5jef8zfAkcOQFtxzwDzmdljwGPgRunsNPYO8BjmyEG/A6sOQcOsAH6zxUD/gaWnAN/AKupwD/OYafxO0JjhgXs1LgMa6Sdjm5ybH2XTm6V00IZdiouObYMJ7fKaaEMOxWXHFuGm1bpaSl5ZmwV6mlJT0s6w7bOZG4aneGSM/wKvOS2uqnfAjYL15Ysq2I4vMIIrzJKrrDutGRh4RoBl4y0DGeMm8uRHtxNK0Powkur3LQWTpERIBn4C1jO2Nhi6Sew0g4Wu0u/AesWKTIyPc/6b0oMeA+4y9jcYukuMEk1HOougGOLJAmZTpr8ndJ5v2mFvy0dAhsJH2Kh5B64Bh5iYeYBW4ComkHAVdtpcDMZNiilaiQZrtpOg5vJsEEpVSMNzvAvwM42PcJDPsYAAAAASUVORK5CYII="/>
                       <span class="fw-semibold d-block mb-1" class="fas fa-user">DEPOSIT</span>
                        <h4 class="card-title text-warning mb-2">{{ auth()->user()->deposit }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAAAXNSR0IArs4c6QAAA6xJREFUaEPtmUnozVEUxz9myhBLyrCRZIhCipJ5WJhKkrKgkDlDkTEWCGUMCwuykMiCDKFEosyUIQllqUzJTN+6r57r99471/sN/+F3lu937j3f7z33nuk1oJ5Jg3rGl5xwXfd47uHcw3XsBPIrXccc+g+d3MPuSLoBe4BhtdTjl4B5wFMffykP3wT611KyBdg3gIFWwr9rOdkC/H8cWsrDOeFa6vHEPDwbOJjwocjG/kAbiRHuB9wKBBOqriCqYBoiiRD+BTQHvocg+Q/dJsAXoGHA2kQI7wCWBoCoRnUXsCBgg9gJ3wMGAN8CQFSj2tQ9nZ7GTWIlfAeYCLw2GG8GTAZGA72BzoBS30tAh3YWOGl8Fl2AE0Afg91YCAuorvFKI8AxwD5HshzG58AcQGVhJdF73gwsgbJjqqoIqzZ9CNwHPlRC5L6vB9YZdaWmALgC2G5c08bdGF1x1f6+VEU4tLPaAKw1AvfVFgM7A9dGVYepER4HnA4EXKwuTw8GrgfskRnhlq4tax8BVsFG7/my+6b2cz4wIUL3ibuu1gyQGeG5jpTPYVmZt6l3rvfui7LAKaOXMyN8BhjrgTwGTK0A/BwwytNRfa4a2iKZEX4D+NdZOVP5tpyMBM57Clpjybdalhnhz0ALD3gjl3LKEW4HvPUU3gFtLe7NkvBHQIGrWFoBnyoAbw2893S0l363SGYe1uCsq4dQKeZaBdRDI6qsx0B3C9ssPXwUmOaBVKRVxC0ner96x8VyGJhR0wlPB45EgFwObCsBfosrKf3PU4DjNZ2wApaKho4RQFV4qGS86r6Nd2lHDYYvz4BewNeaTlj4RgAXjECj1FRaDik6GMtWmQWtArjVwEYL0gidhcDuwLWxE1Z7+Mi1h376KIVtDaCuydpp/XTjImunVGgPewB7I0BU1S0V9tNJql9dZRwAqHM6AHSo4DENAGYBVwye1QBgK7AoyQGAj0Nln7qcVwaAmmpOcjW2AlEnlzdfuBmV3rtS1w/DXhoPSVejokoSi4eLjWj60ddQNlYCZv3eGLjtordlTeyEZVTvdJPFegw6oSOjRAhrvqXgkbRoAK9mQnW5VRIhLOOqd1X3Jika1D0INJAY4ZnAoUAwoeo16s+0UPBp6Sfm4bQIhNrJCZcq+fS/kXWWFHrqaenfdTXCX/ZKER7u/iIZlBa6mO1ouqIa/qK/r7WojxlPdtvlhLM7+3Qs5x5O55yzs5J7OLuzT8dy7uF0zjk7K/XOw38AyMq3PbViaEwAAAAASUVORK5CYII="/>
                        <span class="fw-semibold d-block mb-1">TRANSAKSI</span>
                        <h3 class="card-title text-warning mb-2">0</h3>
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
