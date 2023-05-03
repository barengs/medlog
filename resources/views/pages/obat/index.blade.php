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
              <li class="breadcrumb-item active" aria-current="page">Semua</li>
            </ol>
        </nav>
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>DATA OBAT-OBATAN</h4>
                        <div class="btn-group float-end" role="group" aria-label="Basic mixed styles example">
                            <a class="btn icon-left btn-primary btn-sm" href="{{ route('obat.tambah') }}"><i class="ti-plus"></i>Tambah Obat</a>
                            <a class="btn icon-left btn-info btn-sm" href="{{ route('dashboard') }}"><i class="ti-printer"></i>Cetak Laporan</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="data">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kode Obat</th>
                                        <th scope="col">Nama</th>
                                        <th class="text-center" scope="col">Tanggal Kadaluwarsa</th>
                                        <th class="text-center" scope="col">Stok</th>
                                        <th class="text-center" scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td class="text-center">{{ $item->kadaluwarsa ? $item->kadaluwarsa : '-' }}</td>
                                        <td class="text-center">{{ $item->stok }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a class="btn icon-left btn-info btn-sm" href="{{ route('obat.lihat', $item->id) }}"><i class="ti-eye"></i>Lihat</a>
                                                <a class="btn icon-left btn-warning btn-sm" href="{{ route('obat.ubah', $item->id) }}"><i class="ti-pencil-alt"></i>Ubah</a>
                                                <a class="btn icon-left btn-danger btn-sm" href="{{ route('obat.hapus', $item->id) }}"><i class="ti-trash"></i>Hapus</a>
                                            </div>
                                        </td>
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