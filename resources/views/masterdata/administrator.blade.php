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
                        <img class="d-flex"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAAAXNSR0IArs4c6QAAA2ZJREFUaEPtmknIjVEYx3+fhZIiMmUeMkQZy1SkrLAwhLAx9KUMWWChlHEhC1MW2GBFklBsKKEUGUNkliEWEiUsTP05n66+7973vOd9znu77j311q17zv/5/+7z3vOe85y3jiprdVXGSw34f894LcMRMzwdmA0MAbq6OK+AW8AR4GTE2H+lY2e4ObAYWAt0SgB6DWwC9gPfYsHHBO4DnAb6pzR/E5gGvEg5zqt7LOARwAWgpZeLxp0+AmOA+4Hjiw6LAdwWuAN0zmj2CTAU+JRR55/hMYAPAAuMTG4HVhlp/ZaxBtb/9R7QzMjkV6AX8NZIzxx4N7DcypzTWQdsttK0zLC03gAdrcw5ndvu2W0iawncLdajxM32ny2ILYGHATcsTDWhMdDqEWUJPAq4HAl4NHDFQtsSuCfwzMJUExo9rP4ulsDy+TMSsJlPMyEHegqYYgx9HJhhpWkNPBc4ZGXO6QhW0CbNGlgrrEdAbxN3f9bkg420oiwtJToVOGFkciJwzkgrGrCEdwErMhrdCGzIqNFouPUtXRhgn6t2hHjeBqwOGZg0JiawYs8DdgLtk4y475+7zYcqJVFabGCZbgEsBeqBAUUorgLaR++JQlkgmgdwIYMqloJW1VKLlJfAdeBpbNAG/byB8+IqGqcGXPYURDZQy7DRD6z9axdAJVtdmql92hfgvbt0EmG+v7bMsPasi4D5gD5bNO2vD7pHlmb0zM0CWOWX9cCsCGXfBsAfwGG31HychToLcGtgLzAni4GAscr4MiCoqBcK3B04C/QLMGwxREesk0IK9CHAWi2dATpYOM+gobNlbR8fptFIC6xCnda97dIEidhX0CoPv/ONkQa4FXAN6OsrnlM/eRoP6JGW2NIAHwVmJiqWp4MmzyU+oX2Bh7tdjY9mOfp8BwYBD5KC+wJfAsYmiZX5+2M+d6AP8DjgYplhfMNrfim5MPEBtijI+RrO2m8NsLWUiA+wznyTXjnKatRqvDYbehmmaEsC1kRw18pNTjptgA/FYiUBT3bvWuXk1STMSLc4alIsCXihezPOxElOIloraMYOAtYksCUno1ZhVgI7QoF11KG9biW1kkc0Sbd01QFPAHRVUjsP6Ar6D1cSqJfXpFvaS6SSOtWAKylbIV5rGQ751SppTNVl+BdQdXA9FsQhDQAAAABJRU5ErkJggg==" />
                        <span class="fw-semibold d-block mb-1" class="fas fa-user">MEMBER</span>
                        <h4 class="card-title text-warning mb-2">0</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAAAXNSR0IArs4c6QAAA2ZJREFUaEPtmknIjVEYx3+fhZIiMmUeMkQZy1SkrLAwhLAx9KUMWWChlHEhC1MW2GBFklBsKKEUGUNkliEWEiUsTP05n66+7973vOd9znu77j311q17zv/5/+7z3vOe85y3jiprdVXGSw34f894LcMRMzwdmA0MAbq6OK+AW8AR4GTE2H+lY2e4ObAYWAt0SgB6DWwC9gPfYsHHBO4DnAb6pzR/E5gGvEg5zqt7LOARwAWgpZeLxp0+AmOA+4Hjiw6LAdwWuAN0zmj2CTAU+JRR55/hMYAPAAuMTG4HVhlp/ZaxBtb/9R7QzMjkV6AX8NZIzxx4N7DcypzTWQdsttK0zLC03gAdrcw5ndvu2W0iawncLdajxM32ny2ILYGHATcsTDWhMdDqEWUJPAq4HAl4NHDFQtsSuCfwzMJUExo9rP4ulsDy+TMSsJlPMyEHegqYYgx9HJhhpWkNPBc4ZGXO6QhW0CbNGlgrrEdAbxN3f9bkg420oiwtJToVOGFkciJwzkgrGrCEdwErMhrdCGzIqNFouPUtXRhgn6t2hHjeBqwOGZg0JiawYs8DdgLtk4y475+7zYcqJVFabGCZbgEsBeqBAUUorgLaR++JQlkgmgdwIYMqloJW1VKLlJfAdeBpbNAG/byB8+IqGqcGXPYURDZQy7DRD6z9axdAJVtdmql92hfgvbt0EmG+v7bMsPasi4D5gD5bNO2vD7pHlmb0zM0CWOWX9cCsCGXfBsAfwGG31HychToLcGtgLzAni4GAscr4MiCoqBcK3B04C/QLMGwxREesk0IK9CHAWi2dATpYOM+gobNlbR8fptFIC6xCnda97dIEidhX0CoPv/ONkQa4FXAN6OsrnlM/eRoP6JGW2NIAHwVmJiqWp4MmzyU+oX2Bh7tdjY9mOfp8BwYBD5KC+wJfAsYmiZX5+2M+d6AP8DjgYplhfMNrfim5MPEBtijI+RrO2m8NsLWUiA+wznyTXjnKatRqvDYbehmmaEsC1kRw18pNTjptgA/FYiUBT3bvWuXk1STMSLc4alIsCXihezPOxElOIloraMYOAtYksCUno1ZhVgI7QoF11KG9biW1kkc0Sbd01QFPAHRVUjsP6Ar6D1cSqJfXpFvaS6SSOtWAKylbIV5rGQ751SppTNVl+BdQdXA9FsQhDQAAAABJRU5ErkJggg=="/>
                        <span class="fw-semibold d-block mb-1">TENANT</span>
                        <h4 class="card-title text-warning mb-2">0</h4>
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
