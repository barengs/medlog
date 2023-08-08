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
                    <li class="breadcrumb-item"><a href="{{ route('checkup.semua') }}">Pemeriksaan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Semua Antrian</li>
                </ol>
            </nav>
        </div>
        <div class="content-wrapper">
            <div class="row same-height">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h4 class="card-title">RESEP DOKTER</h4>
                                </div>
                                <div class="col">
                                    <div class="btn-group float-end" role="group" aria-label="Basic mixed styles example">
                                        <a class="btn btn-secondary btn-sm icon-left" onclick="window.history.back()"
                                            href="javascript:void(0)"><i class="ti-home"></i>Kembali</a>
                                        <a class="btn btn-primary btn-sm icon-left" href="{{ route('cetak.resep') }}"><i
                                                class="ti-printer"></i>Cetak</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" id="printArea">
                            <div class="table-responsive">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h5>PONKENDES PALENGAAN LAOK</h5>
                                        <h6>RESEP DOKTER</h6>
                                    </div>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA OBAT</th>
                                            <th>DOSIS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->aturan . ' x ' . $item->satuan }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-8">
                                        <p>Obat harus di habiskan</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p>Pamekasan</p>
                                        <p>Dr. Nama Dokter</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <script>
        function printPage() {
            printJS('printArea', 'html');
        }
    </script>
@endpush
