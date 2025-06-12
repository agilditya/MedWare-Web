<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Aktivitas Produk</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            overflow-x: hidden;
        }

        nav {
            background: #fff;
            border-bottom: 1px solid #eee;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 40px;
        }

        .logo a {
            font-size: 28px;
            font-weight: bold;
            color: #e85d5d;
            text-decoration: none;
        }

        .menu {
            display: flex;
            align-items: center;
        }

        .menu a {
            font-size: 18px;
            margin-left: 30px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        .container {
            max-width: 1100px;
            margin: 20px auto;
            padding: 0 40px;
        }

        h2 {
            font-weight: bold;
            color: #e85d5d;
            margin-bottom: 20px;
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

<nav>
    <div class="navbar">
        <div class="logo">
            <a href="#">Medlog</a>
        </div>
        <div class="menu">
            <a href="{{ route('Content/dashboard') }}">Dashboard</a>
        </div>
    </div>
</nav>

<div class="container">
    <h2>Riwayat Aktivitas Produk</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Product</th>
                <th>Action</th>
                <th>User</th>
                <th>Time</th>
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
</div>

</body>
</html>
