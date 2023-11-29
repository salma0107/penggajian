<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak Jabatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<style>
    .custom-container {
        margin: 0px 50px;
        max-width: 100%;
        background: white;
        text-align: center;
    }

    .custom-container-up {
        margin: 50px 50px 10px 50px;
        /* top-right-bottom-left */
        max-width: 100%;
    }

    /* Style the table */
    .table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 10px;
    }

    .table th,
    .table td {
        border: 1px solid #e3e3e3;
        padding: 10px;
        text-align: center;
    }

    .table th {
        background-color: #f2f2f2;
    }

    .table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table tr:hover {
        background-color: #e6e6e6;
    }

    h1 {
        margin-top: 20px;
    }
</style>

<body>
    <div class="custom-container">

        <h1>DATA JABATAN</h1>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">JABATAN</th>
                    <th scope="col">GAJI POKOK</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1 @endphp
                @foreach ($positions as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->jabatan }}</td>
                    <td>{{ $data->gaji_pokok }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>