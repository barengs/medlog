@extends('pages.index')

@section('content')
    <div class="main-content">
        <div class="title">
            Dashboard
        </div>
        <div class="content-wrapper">
            <div class="row same-height">
                <div class="card">
                    <div class="card-body">
                        <h5>SELAMAT DATANG!!</h5>
                        <p>Selamat datang {{ Auth::user()->name }}, saat ini anda berada pada sistem klinik</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pasien Bulanan</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <canvas id="lineChart" height="842" width="1388"></canvas>
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
    <link rel="stylesheet" href="{{ asset('vendor/chart.js/dist/Chart.min.css') }}">
@endpush

@push('js')
    <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    {{-- <script src="{{ asset('assets/js/page/charts.js') }}"></script> --}}
    <script src="{{ asset('assets/js/page/index.js') }}"></script>
    <script>
        $(document).ready(function() {
            let ctx = $('#lineChart');
            let token = $("meta[name='csrf-token']").attr("content");
            let data = null;

            $.ajax({
                url: "{{ route('global.data.pasien') }}",
                type: 'GET',
                success: function(res) {
                    data = res.map(dt => dt.total);
                    console.log(data);
                }
            })
        })
        var ctx = document.getElementById('lineChart');
        var lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Jumlah Pengunjung',
                    data: [0, 0, 0, 0, 0, 2],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1,
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                legend: {
                    display: true,
                    position: 'bottom',
                    align: 'start',
                    labels: {
                        boxWidth: 40,
                        padding: 20
                    }
                }


            }
        });
    </script>
@endpush
