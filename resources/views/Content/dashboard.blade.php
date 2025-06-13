<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

        .search-input {
            padding: 6px 10px;
            border-radius: 20px 0 0 20px;
            border: 1px solid #ccc;
            width: 300px;
            outline: none;
        }

        .search-btn {
            padding: 6px 12px;
            border-radius: 0 20px 20px 0;
            border: none;
            background: #ff6b6b;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-btn:hover {
            background-color: #e04e4e;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .profile-link {
            display: flex;
            align-items: center;
            gap: 5px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
            padding: 8px 15px;
            border-radius: 20px;
            transition: background-color 0.3s;
        }

        .profile-link:hover {
            background-color: #f5f5f5;
        }

        .profile-icon {
            width: 24px;
            height: 24px;
        }

        .role-badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
        }

        .role-badge.admin {
            background-color: #525FE1;
            color: white;
        }

        .role-badge.staff {
            background-color: #4CAF50;
            color: white;
        }

        .logout-btn {
            background: none;
            border: none;
            color: #e85d5d;
            cursor: pointer;
            font-weight: 500;
            padding: 8px 15px;
            border-radius: 20px;
            transition: background-color 0.3s;
        }

        .logout-btn:hover {
            background-color: #f5f5f5;
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
            color: white !important;
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

        .top-products {
            margin-top: 40px;
            padding: 0 40px;
        }

        .top-products h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .top-products-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
        }

        .product-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-image {
            width: 100%;
            height: 150px;
            object-fit: contain;
            margin-bottom: 15px;
        }

        .product-name {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            font-size: 16px;
        }

        .product-stock {
            color: #666;
            font-size: 14px;
        }

        .stock-high {
            color: #4CAF50;
        }

        .stock-medium {
            color: #FAA82E;
        }

        .stock-low {
            color: #e85d5d;
        }
    </style>
</head>
<body>

<nav>
    <div class="navbar">
        <div class="logo">
            <a href="{{ route('Content/dashboard') }}">MedWare</a>
        </div>

        <div class="menu">
            <a href="{{ route('Content/dashboard') }}">Dashboard</a>
            <a href="{{ route('Content/allProduct') }}">All Product</a>
        </div>

        <div class="search-bar">
            <input type="text" placeholder="Search" class="search-input" />
            <button class="search-btn">Search</button>
        </div>

        <div class="user-info">
            <a href="{{ route('profile') }}" class="profile-link">
                <svg class="profile-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M20.5899 22C20.5899 18.13 16.7399 15 11.9999 15C7.25991 15 3.40991 18.13 3.40991 22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                {{ Auth::user()->name }}
            </a>
            <span class="role-badge {{ Auth::user()->role }}">{{ ucfirst(Auth::user()->role) }}</span>
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

        <a href="{{ route('Content/allProduct') }}" style="text-decoration: none;">
            <div class="dashboard-card card-purple">
                <h2>VIEW</h2>
                <p>View all products</p>
                <img src="{{ asset('images/box-list.png') }}" alt="View Icon">
            </div>
        </a>

        @if(Auth::user()->role === 'admin')
            <a href="{{ route('products.create') }}" style="text-decoration: none;">
                <div class="dashboard-card card-blue">
                    <h2>ADD</h2>
                    <p>Add new products</p>
                    <img src="{{ asset('images/giving-box.png') }}" alt="Add Icon">
                </div>
            </a>

            <a href="{{ route('product.log') }}" style="text-decoration: none;">
                <div class="dashboard-card card-orange">
                    <h2>LOG</h2>
                    <p>view activity history</p>
                    <img src="{{ asset('images/board.png') }}" alt="Log Icon">
                </div>
            </a>

        @elseif(Auth::user()->role === 'staff')
            <div class="dashboard-card card-orange">
                <a href="{{ route('payment') }}" style="text-decoration: none;">
                    <h2>PAY</h2>
                    <p>Make a payment</p>
                    <img src="{{ asset('images/pay.png') }}" alt="Payment Icon">
                </a>
            </div>
        @endif
    </div>
</section>

    <section id="products" class="section">
        <h2>Recent Products</h2>
        </div>
    </section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
