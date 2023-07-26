@extends('landing.index')

@section('content')
<section class="book_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <form class="was-validated">
                    <h4>
                        AMBIL <span>ANTRIAN</span>
                    </h4>
                    <div class="form-row ">
                        <div class="form-group col-lg-4">
                            <label for="inputPatientName">NOMOR ANGGOTA/NIK </label>
                            <input type="text" class="form-control" id="inputPatientName" placeholder="masukan no anggota / nik" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="" disabled>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="inputDepartmentName">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="nama" placeholder="" disabled>
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-lg-4">
                            <label for="inputPhone">Tempat Lahir</label>
                            <input type="number" class="form-control" id="inputPhone" placeholder="" disabled>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="inputSymptoms">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="inputSymptoms" placeholder="" disabled>
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
                        <button type="submit" class="btn ">BUAT ANTRIAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection