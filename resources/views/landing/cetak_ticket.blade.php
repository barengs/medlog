<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            size: 10cm 20cm portrait;
        }

        .container {
            margin: 5px;
            padding: 5px;
        }

        #header h4 {
            text-align: center;
            justify-content: center;
        }

        table,
        tr,
        td {
            border-width: 1px solid;
            border-color: 'black';
            padding: 10px;
            border-collapse: collapse;

        }

        table {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header" id="header">
            <h4>KLINIK RSCM</h4>
        </div>
        <div class="body">
            <table class="table">
                <tr>
                    <td>Nama</td>
                    <td>{{ $pasien->nama_depan }} {{ $pasien->nama_belakang }}</td>
                </tr>
                <tr>
                    <td>No Antrian</td>
                    <td>{{ $data->antrian }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
