@extends('pages.index')

@section('content')
    <div class="main-content">
        <div class="d-flex mx-1 justify-content-between">
            <h4 class="title">
                Profil
            </h4>
            <nav class="float-end" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('karyawan.semua') }}">Karyawan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profil</li>
                </ol>
            </nav>
        </div>
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header border d-flex justify-content-between">
                    <h4>PROFIL</h4>
                    <div class="btn-group float-end" role="group" aria-label="Basic mixed styles example">
                        <a class="btn icon-left btn-secondary btn-sm" onclick="window.history.back()"
                            href="javascript:void(0)"><i class="ti-home"></i>Kembali</a>
                        <a class="btn icon-left btn-warning btn-sm" href="{{ route('user.edit', $profil->user_id) }}"><i
                                class="ti-pencil-alt"></i>Ubah Profil</a>
                    </div>
                </div>
                <div class="card-body border">
                    <div class="row mt-2">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Nama Lengkap</label>
                            <div class="col-md-8">
                                <label for="" class="col-form-label">:
                                    {{ ucfirst($profil->nama_depan) . ' ' . ucfirst($profil->nama_belakang) }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Jabatan</label>
                            <div class="col-md-8">
                                <label for="" class="col-form-label">:
                                    {{ ucfirst($data->roles->pluck('name')[0]) }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-md-8">
                                <label for="" class="col-form-label">:
                                    {{ $profil->alamat }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                            <div class="col-md-8">
                                <label for="" class="col-form-label">:
                                    {{ ucfirst($profil->jenis_kelamin) }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Tempat Lahir</label>
                            <div class="col-md-8">
                                <label for="" class="col-form-label">:
                                    {{ $profil->tempat_lahir ? $profil->tempat_lahir . ' - ' . date('d M Y', strtotime($profil->tanggal_lahir)) : '-' }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Nomor Kontak</label>
                            <div class="col-md-8">
                                <label for="" class="col-form-label">:
                                    {{ $profil->no_handphone }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Nomor KTP</label>
                            <div class="col-md-8">
                                <label for="" class="col-form-label">:
                                    {{ $profil->no_ktp }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">E-Mail</label>
                            <div class="col-md-8">
                                <label for="" class="col-form-label">:
                                    {{ $data->email }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-md-8">
                                : <a href="{{ route('pass.reset', $profil->user_id) }}"
                                    class="btn btn-warning btn-sm">Ganti
                                    Password</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
