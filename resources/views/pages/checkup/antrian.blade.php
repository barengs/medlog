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
                    <li class="breadcrumb-item active" aria-current="page">Proses</li>
                </ol>
            </nav>
        </div>
        <div class="content-wrapper">
            {{-- perhatikan bagian ini, alamat atau route --}}
            <form action="{{ route('checkup.ganti', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>PROSES PEMERIKSAAN</h4>
                        <div class="btn-group float-end" role="group" aria-label="Basic mixed styles example">
                            <a class="btn icon-left btn-warning btn-sm" href="javascript:void(0)"
                                onclick="window.history.back()"><i class="ti-close"></i>Batal</a>
                            <button type="submit" class="btn icon-left btn-primary btn-sm"><i
                                    class="ti-save"></i>Proses</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <h5>No Antrian : {{ $data->antrian }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="ktp" class="form-label">Nomor Anggota</label>
                                    <input type="text" value="{{ $data->pasien->no_pasien }}" name="no_ktp"
                                        placeholder="masukan nomor KTP" class="form-control" id="ktp" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="ktp" class="form-label">Nomor KTP</label>
                                    <input type="text" value="{{ $data->pasien->no_ktp }}" name="no_ktp"
                                        placeholder="masukan nomor KTP" class="form-control" id="ktp" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text"
                                        value="{{ $data->pasien->nama_depan . ' ' . $data->pasien->nama_belakang }}"
                                        name="nama" class="form-control" id="nama" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <input type="text" value="{{ ucfirst($data->pasien->jenis_kelamin) }}"
                                        name="jenis_kelamin" class="form-control" id="jenis_kelamin" readonly>
                                </div>
                            </div>
                        </div>
                        {{-- <hr>
                        <h5>Keluhan Pasien</h5>
                        <div id="boxKeluhan">
                            <div id="kotak" class="row">
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="keluhan[]" id="keluhan"
                                        placeholder="Tulis keluhan pasien disini..">
                                </div>
                                <div class="col-md-1">
                                    <input class="form-control" type="number" name="lama_keluhan[]" id="lama_keluhan">
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
                        </div> --}}
                        <hr>
                        <h5>Riwayat Medis</h5>
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
                                    <tbody>
                                        @if (!$data->keluhan)
                                            <tr>
                                                <td colspan="3" class="text-center">--- Belum ada data ---</td>
                                            </tr>
                                        @else
                                            @foreach ($data->keluhan as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ ucfirst($item->keluhan) }}</td>
                                                    <td>{{ $item->lama_keluhan . ' ' . $item->satuan }}</td>
                                                    <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                                                    <td>{{ $data->diagnosa->diagnosa }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <h5>Hasil Diagnosis</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea name="diagnosa" class="form-control" id="" cols="10" rows="3" required></textarea>
                            </div>
                        </div>
                        <hr>
                        <h5>Resep Obat</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nama Obat</th>
                                            <th>Dosis</th>
                                            <th>Saran</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="boxObat">
                                        <tr>
                                            <td class="col-md-8">
                                                <select class="form-control" name="obat[]" id="" required>
                                                    @foreach ($obat as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="col-md-1">
                                                <input type="number" name="dosis_obat[]" id=""
                                                    class="form-control" required>
                                            </td>
                                            <td class="col-md-2">
                                                <select name="satuan_obat[]" id="" class="form-control" required>
                                                    <option value="jam">Jam</option>
                                                    <option value="hari">Hari</option>
                                                    <option value="minggu">Miggu</option>
                                                    <option value="bulan">Bulan</option>
                                                </select>
                                            </td>
                                            <td class="text-center justify-center">
                                                <a href="javascript:void(0)" id="addResep"
                                                    class="btn btn-primary btn-sm icon-left"><i
                                                        class="ti-plus"></i>Tambah</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- <hr> --}}
                        <h5>Rekomendasi</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <select name="" id="" class="form-control" required>
                                    <option value="">---Pilih---</option>
                                    <option value="rujuk">Rujuk ke RS</option>
                                    <option value="rawat inap">Rawat Inap</option>
                                    <option value="rawat jalan">Rawat Jalan</option>
                                    <option value="rawat mandiri">Rawat Mandiri</option>
                                </select>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="keterangan" id="" class="form-control"
                                    placeholder="Keterangan lain">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="btn-group float-end" role="group" aria-label="Basic mixed styles example">
                            <a class="btn icon-left btn-warning" href="javascript:void(0)"
                                onclick="window.history.back()"><i class="ti-close"></i>Batal</a>
                            <button type="submit" class="btn icon-left btn-primary"><i
                                    class="ti-save"></i>Proses</button>
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
                                    $('#ktp').val('');
                                    $('#nama').val('')
                                    $('#jenis_kelamin').val('')
                                    $('#alamat').val('')
                                } else {
                                    console.log(res);
                                    $('#ktp').val(res.no_ktp);
                                    $('#nama').val(
                                        `${res.nama_depan.toUpperCase()} ${res.nama_belakang.toUpperCase()}`
                                    )
                                    $('#jenis_kelamin').val(res.jenis_kelamin
                                        .toUpperCase())
                                }
                            },
                        })
                    }, 2000);
                } else {
                    setTimeout(() => {
                        Swal.fire({
                            title: 'Peringatan!',
                            text: 'kamu akan melanjutkan mengisi data?',
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
                    }, 10000);
                }
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

        $(document).ready(function() {
            let totalField = 10;
            let addResep = $('#addResep');
            let boxResep = $('#boxObat');
            let resepHTML = "<tr>" +
                "<td class='col-md-8'>" +
                "<select name='obat[]' class='form-control'>" +
                "@foreach ($obat as $item)" +
                "<option value='{{ $item->id }}'>{{ $item->nama }}</option>" +
                "@endforeach" +
                "</select>" +
                "</td>" +
                "<td class='col-md-1'>" +
                "<input type='number' name='dosis_obat[]' class='form-control'>" +
                "</td>" +
                "<td class='col-md-2'>" +
                "<select name='satuan_obat[]' class='form-control'>" +
                "<option value='jam'>Jam</option>" +
                "<option value='hari'>Hari</option>" +
                "<option value='minggu'>Minggu</option>" +
                "<option value='bulan'>Bulan</option>" +
                "</select>" +
                "</td>" +
                "<td class='text-center'><a href='javascript:void(0)' id='delResep' class='btn btn-danger btn-sm icon-left'><i class='ti-close'></i>Hapus</a></td>" +
                "</tr>";
            let i = 1;

            $(addResep).click(function() {
                if (i < totalField) {
                    i++;
                    $(boxResep).append(resepHTML);
                }
            });

            $(boxResep).on('click', '#delResep', function(e) {
                e.preventDefault();
                $(this).parent('td').parent('tr').remove();
                i--;
            });

        });
    </script>
@endpush
