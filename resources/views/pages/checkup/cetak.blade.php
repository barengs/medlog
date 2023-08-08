<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RESEP</title>
    <style type="text/css" media="all">
        @page {
            size: 10cm 20cm portrait;
            margin: 10px;
        }

        .header {
            text-align: center;
            justify-content: center;
            margin: 5px;
        }

        h4,
        h5,
        p {
            margin: 2px;
        }


        table,
        th,
        td {
            border: 1px solid;
            padding: 5px;
            border-collapse: collapse;
        }

        table {
            width: 100%;
        }

        .akhir {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h4>KLINIK RSCM</h4>
            <h5>RESEP DOKTER</h5>
        </div>
        <div style="padding: 5px">
            <p>Nama Pasien: {{ $checkup->pasien->nama_depan . ' ' . $checkup->pasien->nama_belakang }}</p>
            <p>Tanggal Cek: {{ date('d M Y h:m', strtotime($checkup->created_at)) }}</p>
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>Nama / Merk Obat</th>
                    <th>Dosis</th>
                </tr>
                @foreach ($data as $item)
                    <tr>
                        <td class="akhir">{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td class="akhir">{{ $item->aturan }} / {{ $item->satuan }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>
