@extends('pages.index')

@section('content')
<div class="main-content">
    <div class="d-flex mx-1 justify-content-between">
        <h4 class="title">
            Rekam Medis
        </h4>
        <nav class="float-end" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('pasien.semua') }}">Pasien</a></li>
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
                            <dv class="col">
                                <h4 class="card-title">Data Pasien</h4>

                            </dv>
                            <dv class="col">
                                <div class="btn-group float-end" role="group" aria-label="Basic mixed styles example">
                                    <a class="btn btn-primary btn-sm" href="{{ route('pasien.tambah') }}">Daftarkan Pasien</a>
                                    <a class="btn btn-secondary btn-sm" href="{{ route('dashboard') }}">Kembali</a>
                                </div>

                            </dv>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="data">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nomor Anggota</th>
                                        <th scope="col">Nama Pasien</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Usia Tahun Berjalan</th>
                                        <th scope="col">Riwayat Kesehatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ $item->no_pasien }}</td>
                                        <td>{{ $item->nama_depan . ' ' . $item->nama_belakang }}</td>
                                        <td>{{ $item->jenis_kelamin }}</td>
                                        <td>Cell</td>
                                        <td><a class="btn btn-secondary btn-sm" href="{{ route('checkup.lihat', $item->id) }}">Riwayat Medis</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection