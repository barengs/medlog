@extends('pages.index')

@section('content')
    <div class="main-content">
        <div class="d-flex mx-1 justify-content-between">
            <h4 class="title">
                Data Pasien
            </h4>
            <nav class="float-end" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('pasien.semua') }}">Checkup</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                </ol>
            </nav>
        </div>
        <div class="content-wrapper">
            {{-- perhatikan bagian ini, alamat atau route --}}

        </div>
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
        });

        $(document).ready(function() {
            $('#alamat').on('input', function() {
                let ktp = $('#no_ktp').val();
                let nama = $('#nama_depan');
                let tempat = $('#tampat_lahir').val();
                let tgl = $('#tanggal_lahir').val();
                let alamat = $('#alamat').val();
                if (ktp !== '' && nama !== '' && tempat !== '' && tgl !== '' && alamat) {
                    $('.btn').attr("disabled", false);
                } else {
                    $('.btn').attr("disabled", true);
                }
            })

        })
    </script>
@endpush
