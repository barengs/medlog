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
                    <li class="breadcrumb-item active" aria-current="page">Semua</li>
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
                                    <h4 class="card-title">Data Pemeriksaan</h4>
                                </div>
                                <div class="col">
                                    <div class="btn-group float-end" role="group" aria-label="Basic mixed styles example">
                                        <a class="btn btn-secondary btn-sm icon-left" href="{{ route('dashboard') }}"><i
                                                class="ti-home"></i>Kembali</a>
                                        <a class="btn btn-info btn-sm icon-left" href="{{ route('pasien.tambah') }}"><i
                                                class="ti-list"></i>Daftarkan Pasien</a>
                                        <a class="btn btn-primary btn-sm icon-left" href="{{ route('checkup.tambah') }}"><i
                                                class="ti-list"></i>Buat Antrian</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                {{-- {{ $dataTable->table() }} --}}
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal</th>
                                            <th>No Antrian</th>
                                            <th>No Anggota</th>
                                            <th>Nama</th>
                                            <th>No KTP</th>
                                            <th>Status</th>
                                            <th>Diagnosa</th>
                                            <th>Rekom</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
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
    {{-- {{ $dataTable->scripts(attributes: ['type' => 'module']) }} --}}
    <script type="text/javascript">
        $(function() {
            $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                "bDestroy": true,
                ajax: "{{ route('checkup.semua') }}",
                // dom: 'Bfrtip',
                buttons: ['copy', 'excel', 'pdf'],
                columns: [{
                        data: 'DT_RowIndex',
                        'orderable': false,
                        'searchable': false,
                        class: 'text-center'
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal'
                    },
                    {
                        data: 'antrian',
                        name: 'antrian'
                    },
                    {
                        data: 'no_pasien',
                        name: 'no_pasien'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'no_ktp',
                        name: 'no_ktp'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        className: 'text-center',
                    },
                    {
                        data: 'diagnosa',
                        name: 'diagnosa'
                    },
                    {
                        data: 'penanganan',
                        name: 'penanganan'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        className: 'text-center',
                        orderable: false,
                        searchable: false
                    },
                ]
            })
        })
        $(document).ready(function() {
            $('table').on('click', '#cetak', function() {
                // console.log('tes');
                window.location.reload();
            })
        })
    </script>
@endpush
