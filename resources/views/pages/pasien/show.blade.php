@extends('pages.index')

@section('content')
    <div class="main-content">
        <div class="d-flex mx-1 justify-content-between">
            <h4 class="title">
                Data Pasien
            </h4>
            <nav class="float-end" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('pasien.semua') }}">Pasien</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Riwayat Pasien</li>
                </ol>
            </nav>
        </div>
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header border d-flex justify-content-between">
                    <h4>DATA PASIEN</h4>
                    <div class="btn-group float-end" role="group" aria-label="Basic mixed styles example">
                        <a class="btn icon-left btn-secondary btn-sm" onclick="window.history.back()"
                            href="javascript:void(0)"><i class="ti-home"></i>Kembali</a>
                        <a class="btn icon-left btn-warning btn-sm" href="javascript:void(0)"><i
                                class="ti-pencil-alt"></i>Ubah
                            Data</a>
                    </div>
                </div>
                <div class="card-body border">
                    <div class="row">
                        <div class="col-sm-2 mt-2">
                            <img src="https://picsum.photos/200" class="img-thumbnail img-fluid rounded" alt="..." />
                        </div>
                        <div class="col-md-5 mt-2">
                            <div class="form-group row border">
                                <label for="" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-md-8">
                                    <label for="" class="col-form-label">:
                                        {{ $data->nama_depan . ' ' . $data->nama_belakang }}</label>
                                </div>
                            </div>
                            <div class="form-group row border">
                                <label for="" class="col-sm-4 col-form-label">Nomor Anggota</label>
                                <div class="col-md-8">
                                    <label for="" class="col-form-label">: {{ $data->no_pasien }}</label>
                                </div>
                            </div>
                            <div class="form-group row border">
                                <label for="" class="col-sm-4 col-form-label">Nomor KTP</label>
                                <div class="col-md-8">
                                    <label for="" class="col-form-label">: {{ $data->no_ktp }}</label>
                                </div>
                            </div>
                            <div class="form-group row border">
                                <label for="" class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-md-8">
                                    <label for="" class="col-form-label">: {{ $data->alamat }}</label>
                                </div>
                            </div>
                            <div class="form-group row border">
                                <label for="" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-md-8">
                                    <label for="" class="col-form-label">:
                                        {{ ucfirst($data->jenis_kelamin) }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="align-middle">Tanggal Periksa</th>
                                        <th colspan="2" class="text-center">Riwayat Keluhan</th>
                                        <th rowspan="2" class="align-middle">Diagnosis</th>
                                    </tr>
                                    <tr>
                                        <th>Keluhan</th>
                                        <th>Lama Sakit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($medis)
                                        @foreach ($medis as $item)
                                            <tr>
                                                <td rowspan="{{ count($item->keluhan) }}">
                                                    {{ date('d M Y H:m:s', strtotime($item->created_at)) }}</td>

                                                @foreach ($item->keluhan as $k)
                                                    <td>{{ $k->keluhan }}</td>
                                                    <td>{{ $k->lama_keluhan . ' ' . $k->satuan }}</td>
                                                @endforeach

                                                <td>{{ $item->diagnosa->diagnosa }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr colspan="4">
                                            <td>Belum Ada Data</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="card-footer border">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endpush

@push('js')
    <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $('.date').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'dd-mm-yyyy'
        });

        $(document).ready(function() {
            $('#alamat').on('input', function() {
                let ktp = $('#no_ktp').val();
                let nama = $('#nama_depan');
                let tempat = $('#tampat_lahir').val();
                let tgl = $('#tanggal_lahir').val();
                let alamat = $('#alamat').val();
                if (ktp !== '' && nama !== '' && tempat !== '' && tgl !== '' && alamat) {
                    $('.btn').attr("disabled", false);
                } else {
                    $('.btn').attr("disabled", true);
                }
            })

        })
    </script>
@endpush
