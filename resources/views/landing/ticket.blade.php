@extends('landing.index')

@section('content')
    <section class="book_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <form class="" method="POST" action="{{ route('user.antrian') }}">
                        @csrf
                        <h4>
                            AMBIL <span>ANTRIAN</span>
                        </h4>
                        <div class="form-row ">
                            <div class="form-group col-lg-4">
                                <label for="nik">NOMOR ANGGOTA/NIK </label>
                                <div class="input-group">
                                    <input type="text" name="nik" class="form-control"
                                        placeholder="tulis nomor peserta / nik" id="cari" required>
                                    <span class="input-group-addon date_icon">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                            <!-- input id pasien -->
                            <input type="hidden" name="pasien_id" id="pasien_id" />
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
                        </div>
                        <hr>
                        <h5>Keluhan Pasien</h5>
                        <table class="table" id="kotak">
                            <tr id="kolom">
                                <td class="col-lg-6">
                                    <input class="form-control" type="text" name="keluhan[]" id="keluhan"
                                        placeholder="Tulis keluhan anda disini.." required>
                                </td>
                                <td class="col-lg-2">
                                    <input class="form-control" type="number" name="lama_keluhan[]" id="lama_keluhan"
                                        placeholder="Masa?">
                                </td>
                                <td class="col-lg-2">
                                    <select name="satuan[]" id="satuan" class="form-control" required>
                                        <option>---</option>
                                        <option value="hari">Hari</option>
                                        <option value="jam">Jam</option>
                                        <option value="minggu">Miggu</option>
                                        <option value="bulan">Bulan</option>
                                    </select>
                                </td>
                                <td class="justify-content-center d-flex align-items-start">
                                    <a href="javascript:void(0)" id="addKeluhan" class="btn btn-success">Tambah</a>
                                </td>
                            </tr>
                        </table>
                        <div class="btn-box">
                            <button type="submit" id="btnSave" class="btn btn-primary" disabled>BUAT ANTRIAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}">
@endpush


@push('javascript')
    <script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment-with-locales.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#cari').on('keydown', function(e) {
                let value = $(this).val();
                let dataURL = `/user/${value}/cari`;
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
                                        text: 'Gunakan nomor lain!',
                                        showConfirmButton: false,
                                        timer: 2000,
                                    });
                                    $('#cari').blur();
                                } else if (res.checkup !== null && new Date(res.checkup
                                        .created_at)
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
                                        if (res.isConfirmed) {
                                            $('#ktp').val('');
                                            $('#nama').val('')
                                            $('#jenis_kelamin').val('')
                                            $('#alamat').val('')
                                            $('#cari').val('')
                                            $('#btnSave').attr('disabled',
                                                true);

                                        }
                                    })

                                } else {
                                    // console.log(res);
                                    $('#pasien_id').val(res.pasien.id);
                                    $('#ktp').val(res.pasien.no_ktp);
                                    $('#nama').val(
                                        `${res.pasien.nama_depan.toUpperCase()} ${res.pasien.nama_belakang.toUpperCase()}`
                                    )
                                    $('#jenis_kelamin').val(res.pasien.jenis_kelamin
                                        .toUpperCase());
                                    // aktifkan tombol simpan
                                    $('#btnSave').attr('disabled', false);

                                }
                            },
                        })
                    }, 2000);
                }
            });
        });
        // buat kolom baru
        $(document).ready(function() {
            let maxField = 10;
            let addButton = ('#addKeluhan');
            let kotak = ('#kotak');
            let newHTML = '<tr id="kolom">' +
                '<td class="col-lg-6">' +
                '<input class="form-control" type="text" name="keluhan[]" id="keluhan" placeholder="Tulis keluhan anda disini.." required>' +
                '</td>' +
                '<td class="col-lg-2">' +
                '<input class="form-control" type="number" name="lama_keluhan[]" id="lama_keluhan" placeholder="Masa?">' +
                '</td>' +
                '<td class="col-lg-2">' +
                '<select name="satuan[]" id="satuan" class="form-control" required>' +
                '<option>---</option>' +
                '<option value="hari">Hari</option>' +
                '<option value="jam">Jam</option>' +
                '<option value="minggu">Miggu</option>' +
                '<option value="bulan">Bulan</option>' +
                '</select>' +
                '</td>' +
                '<td class="justify-content-center d-flex align-items-start">' +
                '<a href="javascript:void(0)" id="delKeluhan" class="btn btn-danger">HAPUS</a>' +
                '</td>' +
                '</tr>';
            let x = 1; // jumlah baris input pertama

            $(addButton).click(function() {
                if (x < maxField) {
                    x++; // perulangan untuk jumlah baris input
                    $(kotak).append(newHTML); // tambah input baru
                }
            });

            $(kotak).on('click', '#delKeluhan', function(e) {
                e.preventDefault();
                $(this).parent('td').parent('tr').remove();
                x--;
            });
        });
    </script>
@endpush
