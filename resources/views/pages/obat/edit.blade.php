@extends('pages.index')

@section('content')
<div class="main-content">
  <div class="d-flex mx-1 justify-content-between">
    <h4 class="title">
        Obat-Obatan
    </h4>
    <nav class="float-end" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('obat.semua') }}">Obat</a></li>
          <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
        </ol>
    </nav>
</div>
    <div class="content-wrapper">
      {{-- perhatikan bagian route --}}
      <form action="{{ route('obat.ganti', $data->id) }}" method="POST">
        @method('PUT')
          @csrf
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <h4>UBAH DATA</h4>
          <div class="btn-group float-end" role="group" aria-label="Basic mixed styles example">
              <a class="btn icon-left btn-warning btn-sm" href="{{ route('obat.semua') }}"><i class="ti-close"></i>Batal</a>
          </div>
        </div>
          <div class="card-body">
              <div class="row">
                  <div class="col-md-4">
                      <div class="mb-3">
                          <label for="basicInput" class="form-label">Kode Obat</label>
                          <input type="text" value="{{ $data->kode }}" name="kode" placeholder="Tulis Kode Obat" class="form-control" id="basicInput">
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="mb-3">
                          <label for="withHelperText" class="form-label">Nama Obat</label>
                          <small class="text-muted">(merek)</small>
                          <input type="text" value="{{ $data->nama }}" name="nama" placeholder="Tulis Nama atau merek" class="form-control" id="withHelperText">
                      </div>
                  </div>
              </div>
              <div class="row"> 
                  <div class="col-md-4">
                      <div class="mb-3">
                          <label for="withHelperTextBottom" class="form-label">Tanggal Kadaluwarsa</label>
                          <input type="text" value="{{ $data->kadaluwarsa }}" name="kadaluwarsa" class="form-control date" id="withHelperTextBottom"
                              aria-describedby="withHelperTextBottomHelp">
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="mb-3">
                        <label for="basicInput" class="form-label">Stok Obat</label>
                        <input type="number" value="{{ $data->stok }}" name="stok" placeholder="Tulis Stok Obat" class="form-control" id="basicInput">
                    </div>
                </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <div class="mb-3">
                          <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                          <textarea class="form-control" name="keterangan" placeholder="tulis infomasi obat" id="exampleFormControlTextarea1" rows="3">{{ $data->keterangan }}</textarea>
                      </div>
                  </div>
              </div>
            </div>
          <div class="card-footer">
            <div class="btn-group float-end" role="group" aria-label="Basic mixed styles example">
              <a class="btn icon-left btn-warning btn-sm" href="{{ route('obat.semua') }}"><i class="ti-close"></i>Batal</a>
              <button type="submit" class="btn icon-left btn-primary btn-sm"><i class="ti-save"></i>Simpan Perubahan</button>
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