@extends('pages.index')

@section('content')
<div class="main-content">
    <div class="title">
        Level Jabatan Karyawan
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>DATA LEVEL JABATAN</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="data">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Jabatan</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Cell</td>
                                        <td>Cell</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Cell</td>
                                        <td>Cell</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Cell</td>
                                        <td>Cell</td>
                                    </tr>
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

@push('css')
    
@endpush

@push('js')
    
@endpush