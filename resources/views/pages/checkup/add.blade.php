@extends('pages.index')

@section('content')
    <div class="main-content">
        <div class="d-flex mx-1 justify-content-between">
            <h4 class="title">
                Pemeriksaan
            </h4>
            <nav class="float-end"
                style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('checkup.semua') }}">Checkup</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Antrian</li>
                </ol>
            </nav>
        </div>
        <div class="content-wrapper">
            {{-- perhatikan bagian ini, alamat atau route --}}
            <form action="{{ route('checkup.simpan') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>ANTRIAN</h4>
                        <div class="btn-group float-end" role="group" aria-label="Basic mixed styles example">
                            <a class="btn icon-left btn-warning btn-sm" onclick="window.history.back()"
                                href="javascript:void(0)"><i class="ti-close"></i>Batal</a>
                            <button type="submit" class="btn icon-left btn-primary btn-sm"><i class="ti-save"></i>Buat
                                Antrian</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="cari" class="form-label">Nomor KTP atau Anggota</label>
                                    <input type="text" name="cari" id="cari" class="form-control"
                                        placeholder="tulis nomor ktp atau nomor anggota">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="ktp" class="form-label">Nomor KTP</label>
                                    <input type="text" name="no_ktp" placeholder="masukan nomor KTP"
                                        class="form-control" id="ktp" readonly>
                                </div>
                                <!-- input id pasien -->
                                <input type="hidden" name="pasien_id" id="pasien_id" />
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" id="nama" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <input type="text" name="jenis_kelamin" class="form-control" id="jenis_kelamin"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>Keluhan Pasien</h5>
                        <div id="boxKeluhan">
                            <div id="kotak" class="row">
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="keluhan[]" id="keluhan"
                                        placeholder="Tulis keluhan pasien disini..">
                                </div>
                                <div class="col-md-1">
                                    <input class="form-control" type="number" name="lama_keluhan[]" id="lama_keluhan"
                                        placeholder="Masa?">
                                </div>
                                <div class="col-md-1">
                                    <select name="satuan[]" id="satuan" class="form-control">
                                        <option value="jam">Jam</option>
                                        <option value="hari">Hari</option>
                                        <option value="minggu">Miggu</option>
                                        <option value="bulan">Bulan</option>
                                    </select>
                                </div>
                                <div class="col-md-1 text-center justify-center">
                                    <button type="button" id="addKeluhan" class="btn btn-primary btn-sm icon-left"><i
                                            class="ti-plus"></i>Tambah</button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>Rekam Medis Sebelum</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Keluhan</th>
                                            <th>Lama Kejadian</th>
                                            <th>Tanggal Periksa</th>
                                            <th>Diagnosis</th>
                                        </tr>
                                    </thead>
                                    <tbody id="kotakKeluhan">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="btn-group float-end" role="group" aria-label="Basic mixed styles example">
                            <a class="btn icon-left btn-warning btn-sm" onclick="window.history.back()"
                                href="javascript:void(0)"><i class="ti-close"></i>Batal</a>
                            <button type="submit" class="btn icon-left btn-primary btn-sm"><i class="ti-save"></i>Buat
                                Antrian</button>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}">
@endpush

@push('js')
    <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment-with-locales.js') }}"></script>
    <script>
        $('.date').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'dd-mm-yyyy'
        }).on('changeDate', function(e) {
            console.log(e.target.value);
        });
        $(document).ready(function() {
            $('#cari').on('input', function(e) {
                let value = $(this).val();
                let dataURL = `/pasien/${value}/cari`;
                let token = $("meta[name='csrf-token']").attr("content");

                moment.locale('id');

                if (value.length === 10 || value.length === 16) {
                    setTimeout(function() {
                        $.ajax({
                            url: dataURL,
                            type: 'GET',
                            cache: false,
                            data: {
                                '_token': token,
                            },
                            success: function(res) {
                                if (res.status === false) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Data tidak ditemukan!',
                                        text: 'Gunakan nomor lain atau daftarkan Pasien baru!',
                                        showConfirmButton: false,
                                        timer: 2000,
                                    });
                                    $('#cari').blur();
                                    // $('#ktp').val('');
                                    // $('#nama').val('')
                                    // $('#jenis_kelamin').val('')
                                    // $('#alamat').val('')
                                } else if (new Date(res.checkup.created_at)
                                    .toLocaleDateString(
                                        "id-ID") === new Date().toLocaleDateString(
                                        "id-ID")) {
                                    Swal.fire({
                                        title: 'Peringatan!',
                                        text: 'Tidak dapat mendaftarkan di waktu yang sama!',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        cancelButtonText: 'TIDAK',
                                        confirmButtonText: 'YA!'
                                    }).then((res) => {
                                        if (!res.isConfirmed) {
                                            $('#ktp').val('');
                                            $('#nama').val('')
                                            $('#jenis_kelamin').val('')
                                            $('#alamat').val('')
                                            $('#cari').val('')
                                        }
                                    })

                                } else {
                                    console.log(res);
                                    $('#pasien_id').val(res.pasien.id);
                                    $('#ktp').val(res.pasien.no_ktp);
                                    $('#nama').val(
                                        `${res.pasien.nama_depan.toUpperCase()} ${res.pasien.nama_belakang.toUpperCase()}`
                                    )
                                    $('#jenis_kelamin').val(res.pasien.jenis_kelamin
                                        .toUpperCase())

                                    if (res.riwayat.length > 0) {
                                        $.each(res.riwayat, function(index, item) {

                                            $('#kotakKeluhan').append(
                                                `<tr><td class="text-center">${index+1}</td><td>${item.keluhan}</td><td>${item.lama_keluhan} ${item.satuan}</td><td>${moment(item.created_at).format('LLL')}</td><td></td></tr>`
                                            );

                                        })
                                    } else {
                                        $('#kotakKeluhan').append(
                                            '<tr><td colspan="3" class="text-center">Belum ada data</td></tr>'
                                        );
                                    }
                                }
                            },
                        })
                    }, 2000);
                }

                // setTimeout(() => {
                //     Swal.fire({
                //         title: 'Peringatan!',
                //         text: 'kamu akan melanjutkan mengisi data?',
                //         icon: 'warning',
                //         showCancelButton: true,
                //         cancelButtonText: 'TIDAK',
                //         confirmButtonText: 'YA!'
                //     }).then((res) => {
                //         if (!res.isConfirmed) {
                //             $('#ktp').val('');
                //             $('#nama').val('')
                //             $('#jenis_kelamin').val('')
                //             $('#alamat').val('')
                //             $('#cari').val('')
                //         }
                //     })
                // }, 10000);
            });
        });

        $(document).ready(function() {
            let maxField = 10;
            let addButton = ('#addKeluhan');
            let kotak = ('#boxKeluhan');
            let newHTML = "<div id='kotak' class='row mt-2'>" +
                "<div class='col-md-8'>" +
                "<input class='form-control' type='text' name='keluhan[]' id='keluhan' placeholder='Tulis keluhan pasien disini..'>" +
                "</div>" +
                "<div class='col-md-1'>" +
                "<input class='form-control' type='number' name='lama_keluhan[]' id='lama_keluhan'>" +
                "</div>" +
                "<div class='col-md-1'>" +
                "<select name='satuan[]' id='satuan' class='form-control'>" +
                "<option value='jam'>Jam</option>" +
                "<option value='hari'>Hari</option>" +
                "<option value='minggu'>Miggu</option>" +
                "<option value='bulan'>Bulan</option>" +
                "</select>" +
                "</div>" +
                "<div class='col-md-1 text-center justify-center'>" +
                "<a href='javascript:void(0)' id='delKeluhan' class='btn btn-danger btn-sm icon-left'><i class='ti-close'></i>Hapus</a>" +
                "</div>" +
                "</div>";
            let x = 1; // jumlah baris input pertama

            $(addButton).click(function() {
                if (x < maxField) {
                    x++; // perulangan untuk jumlah baris input
                    $(kotak).append(newHTML); // tambah input baru
                }
            });

            $(kotak).on('click', '#delKeluhan', function(e) {
                e.preventDefault();
                $(this).parent('div').parent('div').remove();
                x--;
            });
        });
    </script>
@endpush
