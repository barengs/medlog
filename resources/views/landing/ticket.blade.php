@extends('landing.index')

@section('content')
    <section class="book_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <form class="" method="POST" action="">
                        @csrf
                        <h4>
                            AMBIL <span>ANTRIAN</span>
                        </h4>
                        <div class="form-row ">
                            <div class="form-group col-lg-4">
                                <label for="nik">NOMOR ANGGOTA/NIK </label>
                                <div class="input-group">
                                    <input type="text" name="nik" class="form-control"
                                        placeholder="tulis nomor peserta / nik" required>
                                    <span class="input-group-addon date_icon">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" placeholder="" disabled>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="jenis_kelamin" placeholder="" disabled>
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group col-lg-4">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="number" name="tempat_lahir" class="form-control" id="tempat_lahir"
                                    placeholder="" disabled>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="text" name="tanggl_lahir" class="form-control" id="tanggal_lahir"
                                    placeholder="" disabled>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="inputDate">Choose Date </label>
                                <div class="input-group date" id="inputDate" data-date-format="mm-dd-yyyy">
                                    <input type="text" class="form-control" readonly>
                                    <span class="input-group-addon date_icon">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="btn-box">
                            <button type="submit" class="btn " disabled>BUAT ANTRIAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
