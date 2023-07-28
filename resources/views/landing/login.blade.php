@extends('landing.index')

@section('content')
    <section class="book_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <form class="was-validated" method="POST" action="{{ route('login') }}">
                        @csrf
                        <h4>
                            SILAHKAN <span>MASUK</span>
                        </h4>
                        <div class="form-row ">
                            <div class="form-group col-lg-4">
                                <label for="username">Nama Akun (username)</label>
                                <input type="text" name="email" class="form-control" id="username"
                                    placeholder="masukan username atau email" required>
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group col-lg-4">
                                <label for="password">Kata kunci (password)</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder=""
                                    required>
                            </div>
                        </div>
                        <div class="btn-box">
                            <button type="submit" class="btn btn-primary">MASUK</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
