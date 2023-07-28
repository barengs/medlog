<header class="header_section">
    <div class="header_top">
        <div class="container">
            <div class="contact_nav">
                <a href="">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>
                        Call : +01 123455678990
                    </span>
                </a>
                <a href="">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span>
                        Email : demo@gmail.com
                    </span>
                </a>
                <a href="">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <span>
                        Location
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="header_bottom">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('landing/images/logo.png') }}" alt="">
                </a>


                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class=""> </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="d-flex mr-auto flex-column flex-lg-row align-items-center">
                        <ul class="navbar-nav  ">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('landingpage') }}">Beranda <span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.html"> Tentang</a>
                            </li>
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.antrian') }}">Antrian</a>
                                </li>
                            @endauth
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Kontak Kami</a>
                            </li>
                        </ul>
                    </div>
                    <div class="quote_btn-container">
                        @if (Route::has('user.login'))
                            @auth
                                <a href="{{ route('user.profil') }}">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span>
                                        Profil
                                    </span>
                                </a>
                                <a href="">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                    <span>
                                        Keluar
                                    </span>
                                </a>
                            @else
                                <a href="{{ route('user.login') }}">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span>
                                        Masuk
                                    </span>
                                </a>
                                <a href="{{ route('user.register') }}">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span>
                                        Daftar
                                    </span>
                                @endauth
                        @endif
                        </a>
                        <form class="form-inline">
                            <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
