<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
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

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .product-card {
            background-color: #ffeaea;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 3px 6px rgb(0 0 0 / 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .image-wrapper {
            background-color: #f7f7f7;
            border-radius: 16px;
            padding: 20px;
            height: 180px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-wrapper img {
            max-height: 140px;
            max-width: 100%;
            object-fit: contain;
            border-radius: 12px;
        }

        .product-info {
            margin-top: 15px;
        }

        .product-info h6 {
            margin: 0 0 4px 0;
            font-weight: 600;
            color: #444;
            font-size: 1rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .product-price {
            color: #d34242;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .product-stock-expired {
            margin-top: 10px;
            font-size: 0.85rem;
            color: #666;
            line-height: 1.4;
        }

        .details-btn {
            margin-top: 18px;
            background-color: #d34242;
            border: none;
            border-radius: 30px;
            color: white;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 8px 0;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .details-btn:hover {
            background-color: #b92f2f;
        }

        .modal-title-red {
            color: #d34242;
            font-weight: 700;
        }

        .max-img-size {
            max-width: 100%;
            max-height: 300px;
            object-fit: contain; 
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
            <form action="{{ route('products.search') }}" method="GET">
                <input type="text" name="query" placeholder="Search" class="search-input" value="{{ request('query') }}" />
                <button type="submit" class="search-btn">Search</button>
            </form>
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

<div class="container">
    <div class="product-grid">
        @foreach ($products as $product)
        <div class="product-card">
            <div class="image-wrapper">
                @if ($product->image)
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->productName }}">
                @else
                    <img src="{{ asset('images/no-image.png') }}" alt="No Image">
                @endif
            </div>
            <div class="product-info">
                <h6>{{ $product->productName }}</h6>
                <div class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                <div class="product-stock-expired">
                    Stock: {{ $product->stock }}<br />
                    Expired: {{ \Carbon\Carbon::parse($product->expired)->format('d-m-Y') }}
                </div>
            </div>
            <button class="details-btn" data-bs-toggle="modal" data-bs-target="#productModal{{ $product->id }}">View Details</button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" aria-labelledby="productModalLabel{{ $product->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title modal-title-red" id="productModalLabel{{ $product->id }}">Product Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->productName }}" class="img-fluid max-img-size mb-3">
                            <h5>{{ $product->productName }}</h5>
                            <div class="product-price text-danger">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </div>
                            <div class="product-category">
                                <strong>Category: </strong>{{ $product->category }}
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <strong>Description:</strong> {{ $product->description }}<br />
                            <strong>Composition:</strong> {{ $product->composition }}<br />
                            <strong>Side Effects:</strong> {{ $product->sideEffects }}<br />
                            <strong>Expired:</strong> {{ \Carbon\Carbon::parse($product->expired)->format('d-m-Y') }}<br />
                            <strong>Code:</strong> {{ $product->code }}<br />
                            <strong>Stock:</strong> {{ $product->stock }}<br />
                        </div>
                    </div>
                    <div class="modal-footer">
                        @if(Auth::user()->role === 'admin')
                            <button type="button" class="btn btn-warning" onclick="window.location='{{ route('products.edit', $product->id) }}'">Edit Product</button>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure want to delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete Product</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        @elseif(Auth::user()->role === 'staff')
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        @endif  
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
