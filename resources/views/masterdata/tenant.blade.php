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
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAAAXNSR0IArs4c6QAAA6xJREFUaEPtmUnozVEUxz9myhBLyrCRZIhCipJ5WJhKkrKgkDlDkTEWCGUMCwuykMiCDKFEosyUIQllqUzJTN+6r57r99471/sN/+F3lu937j3f7z33nuk1oJ5Jg3rGl5xwXfd47uHcw3XsBPIrXccc+g+d3MPuSLoBe4BhtdTjl4B5wFMffykP3wT611KyBdg3gIFWwr9rOdkC/H8cWsrDOeFa6vHEPDwbOJjwocjG/kAbiRHuB9wKBBOqriCqYBoiiRD+BTQHvocg+Q/dJsAXoGHA2kQI7wCWBoCoRnUXsCBgg9gJ3wMGAN8CQFSj2tQ9nZ7GTWIlfAeYCLw2GG8GTAZGA72BzoBS30tAh3YWOGl8Fl2AE0Afg91YCAuorvFKI8AxwD5HshzG58AcQGVhJdF73gwsgbJjqqoIqzZ9CNwHPlRC5L6vB9YZdaWmALgC2G5c08bdGF1x1f6+VEU4tLPaAKw1AvfVFgM7A9dGVYepER4HnA4EXKwuTw8GrgfskRnhlq4tax8BVsFG7/my+6b2cz4wIUL3ibuu1gyQGeG5jpTPYVmZt6l3rvfui7LAKaOXMyN8BhjrgTwGTK0A/BwwytNRfa4a2iKZEX4D+NdZOVP5tpyMBM57Clpjybdalhnhz0ALD3gjl3LKEW4HvPUU3gFtLe7NkvBHQIGrWFoBnyoAbw2893S0l363SGYe1uCsq4dQKeZaBdRDI6qsx0B3C9ssPXwUmOaBVKRVxC0ner96x8VyGJhR0wlPB45EgFwObCsBfosrKf3PU4DjNZ2wApaKho4RQFV4qGS86r6Nd2lHDYYvz4BewNeaTlj4RgAXjECj1FRaDik6GMtWmQWtArjVwEYL0gidhcDuwLWxE1Z7+Mi1h376KIVtDaCuydpp/XTjImunVGgPewB7I0BU1S0V9tNJql9dZRwAqHM6AHSo4DENAGYBVwye1QBgK7AoyQGAj0Nln7qcVwaAmmpOcjW2AlEnlzdfuBmV3rtS1w/DXhoPSVejokoSi4eLjWj60ddQNlYCZv3eGLjtordlTeyEZVTvdJPFegw6oSOjRAhrvqXgkbRoAK9mQnW5VRIhLOOqd1X3Jika1D0INJAY4ZnAoUAwoeo16s+0UPBp6Sfm4bQIhNrJCZcq+fS/kXWWFHrqaenfdTXCX/ZKER7u/iIZlBa6mO1ouqIa/qK/r7WojxlPdtvlhLM7+3Qs5x5O55yzs5J7OLuzT8dy7uF0zjk7K/XOw38AyMq3PbViaEwAAAAASUVORK5CYII="/>
                         <span class="fw-semibold d-block mb-1" class="fas fa-user">SALE</span>
                        <h3 class="card-title text-warning mb-2">0</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <img src="data:image/png;base64,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"/>
                        <span class="fw-semibold d-block mb-1">PRODUCT</span>
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
