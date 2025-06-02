<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
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
            font-size: 40px;
            font-weight: bold;
            color: #e85d5d;
            text-decoration: none;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 100px;
        }

        .menu a {
            font-size: 18px;
            margin: 0 12px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        .search-bar {
            display: flex;
            align-items: center;
        }

        .search-bar input {
            padding: 6px 10px;
            border-radius: 20px 0 0 20px;
            border: 1px solid #ccc;
            width: 180px;
            outline: none;
        }

        .search-btn {
            padding: 6px 12px;
            border-radius: 0 20px 20px 0;
            border: none;
            background: #ff6b6b;
            color: #fff;
            cursor: pointer;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 20px;
        }

        .user-info span {
            font-size: 14px;
            font-weight: 500;
            color: #444;
        }

        .role-badge {
            font-size: 13px;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 20px;
            color: white !important;
            margin-left: 8px;
            display: inline-block;
        }
        .role-badge.admin {
            background-color: #525FE1;
        }

        .role-badge.staff {
            background-color: #53BF63;
        }

        .logout-btn {
            background-color: transparent;
            color: #ff6b6b;
            border: 1px solid #ff6b6b;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 13px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #ff6b6b;
            color: #fff;
        }

        .section {
            padding: 60px 40px;
        }

        .card {
            padding: 20px;
            margin: 15px 0;
            border-radius: 10px;
            background: #eee;
            font-size: 16px;
            font-weight: 500;
        }

        .admin {
            background: #ffdddd;
        }

        .staff {
            background: #ddf3ff;
        }

        h2 {
            color: #333;
            font-weight: 600;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin: 0px;
        }

        .dashboard-card {
            border-radius: 20px;
            padding: 20px;
            color: white !important;
            position: relative;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            min-height: 160px;
            overflow: hidden;
        }

        .dashboard-card h2 {
            font-size: 40px;
            color: white !important;
            margin-bottom: 6px;
            font-weight: 800;
        }

        .dashboard-card p {
            font-size: 18px;
            margin: 0;
            line-height: 1.4;
        }

        .dashboard-card img {
            position: absolute;
            top: 16px;
            right: 16px;
            width: 150px;
            height: auto;
            max-width: 35%;
            opacity: 0.95;
            transition: transform 0.2s ease;
        }

        .dashboard-card img:hover {
            transform: scale(1.05);
        }

        /* Warna latar sesuai kategori */
        .card-red { background-color: #FF6666; }
        .card-blue { background-color: #4465EB; }
        .card-purple { background-color: #B741A4; }
        .card-orange { background-color: #FAA82E; }
    </style>
</head>
<body>

<nav>
    <div class="navbar">
        <div class="logo">
            <a href="#dashboard">MedWare</a>
        </div>

        <div class="menu">
            <a href="#dashboard">Dashboard</a>
            <a href="#products">All Products</a>
        </div>

        <div class="search-bar">
            <input type="text" placeholder=Search">
            <button class="search-btn">Search</button>
        </div>

        <div class="user-info">
            <span>Hello, {{ Auth::user()->name }}</span>
                <span class="role-badge {{ Auth::user()->role }}">{{ ucfirst(Auth::user()->role) }}</span>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button class="logout-btn">Logout</button>
            </form>
        </div>
    </div>
</nav>

<section id="dashboard" class="section">

    @if(session('success'))
        <div style="padding: 12px 20px; background-color: #d4edda; color: #155724; border-radius: 6px; margin-bottom: 20px; font-weight: 600;">
            {{ session('success') }}
        </div>
    @endif

    <div class="dashboard-grid">

        <div class="dashboard-card card-red">
            <h2>{{ \App\Models\Product::count() }}</h2>
            <p>Products are in</p>
            <p>Your Ware</p>
            <img src="{{ asset('images/chart.png') }}" alt="Chart Icon">
        </div>

        @if(Auth::user()->role === 'admin')
            <a href="{{ route('products.create') }}" style="text-decoration: none;">
                <div class="dashboard-card card-blue">
                    <h2>ADD</h2>
                    <p>Add new products</p>
                    <img src="{{ asset('images/giving-box.png') }}" alt="Add Icon">
                </div>
            </a>

            <div class="dashboard-card card-purple">
                <h2>VIEW</h2>
                <p>View all products</p>
                <img src="{{ asset('images/box-list.png') }}" alt="View Icon">
            </div>

            <div class="dashboard-card card-orange">
                <h2>LOG</h2>
                <p>view activity history</p>
                <img src="{{ asset('images/board.png') }}" alt="Log Icon">
            </div>

        @elseif(Auth::user()->role === 'staff')
            <div class="dashboard-card card-purple">
                <h2>VIEW</h2>
                <p>View all products</p>
                <img src="{{ asset('images/box-list.png') }}" alt="View Icon">
            </div>

            <div class="dashboard-card card-orange">
                <h2>PAY</h2>
                <p>Make a payment</p>
                <img src="{{ asset('images/pay.png') }}" alt="Payment Icon">
            </div>
        @endif
    </div>
</section>

<section id="products" class="section">
    <h2>All Products</h2>
    <p>Contoh produk atau tautan ke halaman produk bisa diletakkan di sini.</p>
</section>

</body>
</html>
