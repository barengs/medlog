@extends('pages.index')

@section('content')
    <div class="main-content">
        <div class="d-flex mx-1 justify-content-between">
            <h4 class="title">
                Data Pasien
            </h4>
            <nav class="float-end" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('pasien.semua') }}">Checkup</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
                </ol>
            </nav>
        </div>
        <div class="content-wrapper">
            {{-- perhatikan bagian ini, alamat atau route --}}
            <form action="{{ route('pasien.ganti', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header border d-flex justify-content-between">
                        <h4>TAMBAH PASIEN</h4>
                        <div class="btn-group float-end" role="group" aria-label="Basic mixed styles example">
                            <a class="btn icon-left btn-warning btn-sm" href="{{ route('pasien.semua') }}"><i
                                    class="ti-close"></i>Batal</a>
                            <button type="submit" class="btn icon-left btn-primary btn-sm" disabled><i
                                    class="ti-save"></i>Simpan Perubahan</button>
                        </div>
                    </div>
                    <div class="card-body border">
                        <h5 class="mt-2">Data Pasien</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="no_ktp" class="form-label">KTP</label>
                                    <input value="{{ $data->no_ktp }}" type="text" name="no_ktp"
                                        placeholder="masukan nomor KTP" class="form-control" id="no_ktp">
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="nama_depan" class="form-label">Nama Depan</label>
                                    <input value="{{ $data->nama_depan }}" type="text" name="nama_depan"
                                        placeholder="isi nama depan" class="form-control" id="nama_depan">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="nama_belakang" class="form-label">Nama Belakang</label>
                                    <small class="text-muted">(bila ada)</small>
                                    <input value="{{ $data->nama_belakang }}" type="text" name="nama_belakang"
                                        placeholder="isi nama belakang bila ada" class="form-control" id="nama_belakang">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input value="{{ $data->tempat_lahir }}" type="text" name="tempat_lahir"
                                        placeholder="isi kota kelahiran" class="form-control" id="tempat_lahir">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input value="{{ $data->tanggal_lahir }}" type="text" name="tanggal_lahir"
                                        placeholder="isi tanggal kelahiran" class="form-control date" id="tanggal_lahir">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select id="jenis_kelamin" name="jenis_kelamin"
                                        class="js-example-basic-single form-select">
                                        <option value="pria" {{ $data->jenis_kelamin === 'pria' ? 'selected' : '' }}>Pria
                                        </option>
                                        <option value="wanita" {{ $data->jenis_kelamin === 'pria' ? '' : 'selected' }}>
                                            Wanita</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" name="alamat" placeholder="alamat lengkap pasien..." id="alamat" rows="2">{{ $data->alamat }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">Nomor HP</label>
                                    <small class="text-muted">(bila ada)</small>
                                    <input value="{{ $data->no_hp }}" type="text" name="no_handphone"
                                        placeholder="isi nomor hp pasien" class="form-control" id="no_hp">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Alamat E-Mail</label>
                                    <small class="text-muted">(bila ada)</small>
                                    <input type="text" name="email" placeholder="isi alamat surel (email) pasien"
                                        class="form-control" id="email">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>Kerabat Pasien</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="basicInput" class="form-label">Nama Kerabat</label>
                                    <small class="text-muted">(bila ada)</small>
                                    <input value="{{ $data->nama_kerabat }}" type="text" name="nama_famili"
                                        placeholder="isi nama kerabat" class="form-control" id="basicInput">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="basicInput" class="form-label">Jenis Kelamin</label>
                                    <small class="text-muted">(bila ada)</small>
                                    <select id="status" name="jenis_kelamin_famili"
                                        class="js-example-basic-single form-select">
                                        <option value="pria"
                                            {{ $data->jenis_kelamin_kerabat === 'pria' ? 'selected' : '' }}>Pria
                                        </option>
                                        <option value="wanita"
                                            {{ $data->jenis_kelamin_kerabat === 'pria' ? '' : 'selected' }}>
                                            Wanita
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="basicInput" class="form-label">Nomor Kontak</label>
                                    <small class="text-muted">(bila ada)</small>
                                    <input value="{{ $data->no_kontak_kerabat }}" type="text" name="kontak_famili"
                                        placeholder="isi nama kerabat" class="form-control" id="basicInput">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border">
                        <div class="ms-2">
                            <button type="submit" class="btn icon-left btn-primary btn-sm float-end"><i
                                    class="ti-pencil-alt"></i>Simpan dan Periksa</button>
                        </div>
                        <div class="btn-group float-end me-2" role="group" aria-label="Basic mixed styles example">
                            <a class="btn icon-left btn-warning btn-sm" href="{{ route('pasien.semua') }}"><i
                                    class="ti-close"></i>Batal</a>
                            <button type="submit" class="btn icon-left btn-primary btn-sm"><i class="ti-save"></i>Simpan
                                Perubahan</button>
                        </div>
                    </div>
                </div>
        </div>
        </form>
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

        // $(document).ready(function() {
        //     $('#alamat').on('keyup', function() {
        //         let ktp = $('#no_ktp').val();
        //         let nama = $('#nama_depan');
        //         let tempat = $('#tampat_lahir').val();
        //         let tgl = $('#tanggal_lahir').val();
        //         let alamat = $('#alamat').val();
        //         if (ktp !== '' && nama !== '' && tempat !== '' && tgl !== '' && alamat) {
        //             $('.btn').attr("disabled", false);
        //         } else {
        //             $('.btn').attr("disabled", true);
        //         }
        //     })

        // })
    </script>
@endpush
