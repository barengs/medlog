@extends('landing.index')

@section('content')
    <section class="book_section layout_padding">
        <div class="container">
            <div class="row">
                <h4>
                    Profil <span>PESERTA</span>
                </h4>
                <table class="table striped">
                    <tr>
                        <td>Nomor Peserta</td>
                        <th>{{ $data->no_pasien }}</th>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>{{ $data->nama_depan }} {{ $data->nama_belakang }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Induk</td>
                        <th>{{ $data->no_ktp }}</th>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{ $data->alamat }}</td>
                    </tr>
                    <tr>
                        <td>Tempat Tanggal Lahir</td>
                        <td>{{ $data->tempat_lahir }} {{ $data->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>{{ $data->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <td>No Handphone</td>
                        <td>{{ $data->no_hp }}</td>
                    </tr>
                    <tr>
                        <td>Surel (E-Mail)</td>
                        <td>{{ $data->email }}</td>
                    </tr>
                </table>
            </div>
            <div class="row">
                <div class="col">
                    <h4>
                        Nomor <span>Antrian</span>
                    </h4>
                    <div class="form-row">
                        <h4>00000</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
