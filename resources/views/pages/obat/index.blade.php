@extends('pages.index')

@section('content')
<div class="main-content">
    <div class="title">
        Obat-Obatan
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>DATA OBAT-OBATAN</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="data">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kode Obat</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Tanggal Kadaluwarsa</th>
                                        <th scope="col">Stok</th>
                                        <th scope="col">Status</th>
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
                                        <td>Cell</td>
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