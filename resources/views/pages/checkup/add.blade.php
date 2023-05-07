@extends('pages.index')

@section('content')
<div class="main-content">
  <div class="d-flex mx-1 justify-content-between">
    <h4 class="title">
        Pemeriksaan
    </h4>
    <nav class="float-end" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('checkup.semua') }}">Checkup</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
        </ol>
    </nav>
</div>
    <div class="content-wrapper">
      {{-- perhatikan bagian ini, alamat atau route --}}
      <form action="{{ route('checkup.simpan') }}" method="POST">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <h4>PROSES PEMERIKSAAN</h4>
          <div class="btn-group float-end" role="group" aria-label="Basic mixed styles example">
              <a class="btn icon-left btn-warning btn-sm" href="{{ route('checkup.semua') }}"><i class="ti-close"></i>Batal</a>
          </div>
        </div>
          <div class="card-body">
              @csrf
              <div class="row">
                  <div class="col-md-4">
                      <div class="mb-3">
                          <label for="basicInput" class="form-label">KTP</label>
                          <input type="text" name="no_ktp" placeholder="masukan nomor KTP" class="form-control" id="basicInput">
                      </div>
                      
                  </div>
                  <div class="col-md-4">
                    <div class="mb-3">
                        <label for="basicInput" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="basicInput" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="mb-3">
                        <label for="basicInput" class="form-label">Jenis Kelamin</label>
                        <input type="text" name="jenis_kelamin" class="form-control" id="basicInput" readonly>
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                        <textarea class="form-control" readonly name="alamat" placeholder="informasi alamat" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <hr>
            <h5>Keluhan Pasien</h5>
            </div>
          <div class="card-footer">
            <div class="btn-group float-end" role="group" aria-label="Basic mixed styles example">
              <a class="btn icon-left btn-warning btn-sm" href="{{ route('checkup.semua') }}"><i class="ti-close"></i>Batal</a>
              <button type="submit" class="btn icon-left btn-primary btn-sm"><i class="ti-save"></i>Simpan</button>
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
    }).on('changeDate', function (e) {
        console.log(e.target.value);
    });

</script>    
@endpush