@extends('pages.index')

@section('content')
<div class="main-content">
    <div class="d-flex mx-1 justify-content-between">
        <h4 class="title">
            Kategori Obat-Obatan
        </h4>
        <nav class="float-end" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Obat</a></li>
              <li class="breadcrumb-item active" aria-current="page">Semua</li>
            </ol>
        </nav>
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>DATA KATEGORI OBAT-OBATAN</h4>
                        <div class="btn-group float-end" role="group" aria-label="Basic mixed styles example">
                            {{-- perhatikan disini --}}
                            <a class="btn icon-left btn-primary btn-sm" href="{{ route('kategori.tambah') }}"><i class="ti-list"></i>Tambah Kategori</a>
                            <a class="btn icon-left btn-info btn-sm" href="{{ route('dashboard') }}"><i class="ti-printer"></i>Cetak Laporan</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.dataTables.min.css') }}">
@endpush

@push('js')
    <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush