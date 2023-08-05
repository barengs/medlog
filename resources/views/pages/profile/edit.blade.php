@extends('pages.index')

@section('content')
    <div class="main-content">
        <div class="d-flex mx-1 justify-content-between">
            <h4 class="title">
                PROFIL
            </h4>
            <nav class="float-end"
                style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('karyawan.semua') }}">Profil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
                </ol>
            </nav>
        </div>
        <div class="content-wrapper">
            {{-- perhatikan bagian ini, alamat atau route --}}
            <form action="{{ route('karyawan.ganti', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header border d-flex justify-content-between">
                        <h4>UBAH DATA</h4>
                        <div class="btn-group float-end" role="group" aria-label="Basic mixed styles example">
                            <a class="btn icon-left btn-warning btn-sm" onclick="window.history.back()"
                                href="javascript:void(0)"><i class="ti-close"></i>Batal</a>
                            <button type="submit" class="btn icon-left btn-primary btn-sm"><i class="ti-save"></i>Simpan
                                Perubahan</button>
                        </div>
                    </div>
                    <div class="card-body border">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="basicInput" class="form-label">Nama Depan</label>
                                    <input value="{{ $data->nama_depan }}" type="text" name="nama_depan"
                                        placeholder="Tulis Nama depan" class="form-control" id="basicInput">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="withHelperText" class="form-label">Nama Belakang</label>
                                    <small class="text-muted">(opsional)</small>
                                    <input value="{{ $data->nama_belakang }}" type="text" name="nama_belakang"
                                        placeholder="Tulis Nama belakang" class="form-control" id="withHelperText">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="basicInput" class="form-label">Tempat Lahir</label>
                                    <input value="{{ $data->tempat_lahir }}" type="tempat_lahir" name="tempat_lahir"
                                        placeholder="Tulis tempat lahir" class="form-control" id="basicInput">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="withHelperTextBottom" class="form-label">Tanggal Lahir</label>
                                    <input value="{{ $data->tanggal_lahir }}" type="text" name="tanggal_lahir"
                                        class="form-control date" placeholder="isi tanggal lahir" id="withHelperTextBottom"
                                        aria-describedby="withHelperTextBottomHelp">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="basicInput" class="form-label">E-Mail</label>
                                    <input value="{{ $data->user->email }}" type="email" name="email"
                                        placeholder="Tulis alamat email" class="form-control" id="basicInput">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="basicInput" class="form-label">Nomor Hand Phone</label>
                                    <input value="{{ $data->no_handphone }}" type="text" name="no_handphone"
                                        placeholder="Tulis Nomor Seluler (HP)" class="form-control" id="basicInput">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Jenis Kelamin</label>
                                    <select id="status" name="jenis_kelamin"
                                        class="js-example-basic-single form-select">
                                        @if ($data->jenis_kelamin == 'pria')
                                            <option value="pria" selected>Pria</option>
                                            <option value="wanita">Wanita</option>
                                        @else
                                            <option value="pria">Pria</option>
                                            <option value="wanita" selected>Wanita</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="basicInput" class="form-label">Nomor KTP</label>
                                    <input value="{{ $data->no_ktp }}" type="text" name="no_ktp"
                                        placeholder="Tulis Nomor KTP" class="form-control" id="basicInput">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                        <textarea class="form-control" name="alamat" placeholder="tulis alamat lengkap" id="exampleFormControlTextarea1"
                                            rows="2">{{ $data->alamat }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="basicInput" class="form-label">Foto</label>
                                        <input type="file" value="{{ $data->foto }}" name="foto"
                                            placeholder="Pilih foto dari file..." class="form-control" id="basicInput">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body border">

                        <div class="btn-group float-end" role="group">
                            <a class="btn icon-left btn-warning btn-sm" onclick="window.history.back()"
                                href="javascript:void(0)"><i class="ti-close"></i>Batal</a>
                            <button type="submit" class="btn icon-left btn-primary btn-sm"><i class="ti-save"></i>Simpan
                                Perubahan</button>
                        </div>
                    </div>
                </div>
            </form>
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
        }).on('changeDate', function(e) {
            console.log(e.target.value);
        });
    </script>
@endpush
