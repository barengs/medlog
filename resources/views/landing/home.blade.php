@extends('landing.index')

@section('slider')
    <section class="slider_section ">
        <div class="dot_design">
            <img src="{{ asset('landing/images/dots.png') }}" alt="">
        </div>
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-box">
                                    <div class="play_btn">
                                        <button>
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <h1>
                                        Klinik <br>
                                        <span>
                                            RSCM
                                        </span>
                                    </h1>
                                    <p>
                                        Klinik terbaik dan terpercaya dengan tenaga medis profesional dan berpengalaman
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="{{ asset('landing/images/slider-img.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-box">
                                    <div class="play_btn">
                                        <button>
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <h1>
                                        Klinik <br>
                                        <span>
                                            RSCM
                                        </span>
                                    </h1>
                                    <p>
                                        Klinik RSCM dengan fasilitas terkini dan teknologi paling canggih.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="{{ asset('landing/images/slider-img.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-box">
                                    <div class="play_btn">
                                        <button>
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <h1>
                                        Klinik <br>
                                        <span>
                                            RSCM
                                        </span>
                                    </h1>
                                    <p>
                                        Klinik RSCM sudah dipercaya sejak 2010 dalam penanganan berbagai macam keluhan
                                        medis.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="{{ asset('landing/images/slider-img.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel_btn-box">
                <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
                    <img src="images/prev.png" alt="">
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
                    <img src="images/next.png" alt="">
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    </section>
@endsection

@section('content')
    <section class="treatment_section layout_padding">
        <div class="side_img">
            <img src="{{ asset('landing/images/treatment-side-img.jpg') }}" alt="">
        </div>
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Layanan <span>Klinik</span>
                </h2>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="box ">
                        <div class="img-box">
                            <img src="{{ asset('landing/images/t1.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                Nephrologist Care
                            </h4>
                            <p>
                                alteration in some form, by injected humour, or randomised words which don't look even
                                slightly e sure there isn't anything
                            </p>
                            <a href="">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="box ">
                        <div class="img-box">
                            <img src="{{ asset('landing/images/t2.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                Eye Care
                            </h4>
                            <p>
                                alteration in some form, by injected humour, or randomised words which don't look even
                                slightly e sure there isn't anything
                            </p>
                            <a href="">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="box ">
                        <div class="img-box">
                            <img src="{{ asset('landing/images/t3.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                Pediatrician Clinic
                            </h4>
                            <p>
                                alteration in some form, by injected humour, or randomised words which don't look even
                                slightly e sure there isn't anything
                            </p>
                            <a href="">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="box ">
                        <div class="img-box">
                            <img src="{{ asset('landing/images/t4.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                Parental Care
                            </h4>
                            <p>
                                alteration in some form, by injected humour, or randomised words which don't look even
                                slightly e sure there isn't anything
                            </p>
                            <a href="">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end treatment section -->
@endsection
