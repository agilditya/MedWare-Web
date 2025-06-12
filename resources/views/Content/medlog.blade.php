<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>medlogh</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        h2 {
            font-weight: bold;
            margin-bottom: 20px;
            color: #e85d5d;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        thead {
            background-color: #ffeaea;
        }

        th {
            color: #d34242;
            font-weight: 600;
        }

        tbody tr:nth-child(even) {
            background-color: #fafafa;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        .back-link {
            margin-bottom: 20px;
            display: inline-block;
            text-decoration: none;
            color: #d34242;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <a href="{{ route('Content/dashboard') }}" class="back-link">&larr; Kembali ke Dashboard</a>
    <h2>Riwayat Aktivitas Produk (medlogh)</h2>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Produk</th>
                <th>Aksi</th>
                <th>User</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $log->product_name }}</td>
                    <td>{{ $log->action }}</td>
                    <td>{{ $log->user->name ?? 'System' }}</td>
                    <td>{{ \Carbon\Carbon::parse($log->created_at)->format('d-m-Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
