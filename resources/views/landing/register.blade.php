@extends('landing.index')

@section('content')
    <section class="book_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <form class="was-validated" method="POST" action="{{ route('user.store') }}">
                        @csrf
                        <h4>
                            PENDAFTARAN <span>PESERTA</span>
                        </h4>
                        <div class="form-row ">
                            <div class="form-group col-lg-4">
                                <label for="inputPatientName">NIK </label>
                                <input type="text" name="no_nik" class="form-control" id="inputPatientName"
                                    placeholder="masukan no nik" required>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="nama">Nama Depan</label>
                                <input type="text" class="form-control" id="nama" placeholder="tulis nama depan"
                                    required>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="nama">Nama Belakang</label>
                                <input type="text" class="form-control" id="nama"
                                    placeholder="nama belakang bila ada">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-8">
                                <label for="inputDepartmentName">Alamat</label>
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="inputDepartmentName">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" id="" required>
                                    <option value="pria">Pria</option>
                                    <option value="wanita">Wanita</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group col-lg-4">
                                <label for="inputPhone">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" id="inputPhone"
                                    placeholder="tempat lahir" required>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="inputDate">Tanggal Lahir </label>
                                <div class="input-group date" id="inputDate" data-date-format="mm-dd-yyyy">
                                    <input type="text" name="tgl_lahir" class="form-control" required>
                                    <span class="input-group-addon date_icon">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="inputSymptoms">Nomor HP</label>
                                <input type="text" name="no_hp" class="form-control" id="inputSymptoms"
                                    placeholder="Nomor Handphone">
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group col-lg-4">
                                <label for="inputPatientName">Nama Akun (username) </label>
                                <input type="text" name="name" class="form-control" id="inputPatientName"
                                    placeholder="masukan username" required>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="nama">E-mail</label>
                                <input type="text" name="email" class="form-control" id="nama"
                                    placeholder="masukan email" required>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="inputDepartmentName">Kata Kunci (password)</label>
                                <input type="text" name="password" class="form-control" id="nama"
                                    placeholder="masukan password" required>
                            </div>
                        </div>
                        <div class="btn-box">
                            <button type="submit" class="btn ">LANJUT DAFTAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
