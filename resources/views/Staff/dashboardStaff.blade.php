<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medware Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f3f4f6;
            color: #333;
            padding-top: 60px;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.5rem 1rem;
            background-color: #FFF;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            height: 10px;
        }

        .navbar .logo {
            font-size: 1.2rem;
            color: #FF6B6B;
            font-weight: bold;
            margin-right: auto;
        }

        .navbar .search-bar {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 1rem;
        }

        .navbar .search-bar input {
            padding: 0.4rem;
            border: 1px solid #ccc;
            border-radius: 20px 0 0 20px;
            outline: none;
            height: 30px;
            width: 200px;
        }

        .navbar .search-bar button {
            padding: 0.4rem 0.8rem;
            background-color: #FF6B6B;
            color: #FFF;
            border: none;
            border-radius: 0 20px 20px 0;
            cursor: pointer;
            height: 30px;
        }

        .navbar .profile {
            display: flex;
            align-items: center;
            margin-left: auto;
        }

        .logout-button {
            background-color: #FF6B6B;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .logout-button:hover {
            background-color: #c74d4d;
            transform: scale(1.05);
        }

        .content {
            padding: 2rem;
            padding-top: 3rem;
        }

        .dashboard-cards {
            display: flex;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .card {
            width: 320px;
            height: 150px;
            color: #FFF;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: left;
            position: relative;
        }

        .card.red { background-color: #FF6666; }
        .card.blue { background-color: #525FE1; }
        .card.purple { background-color: #B741A4; }

        .card h2 { font-size: 3rem; margin-bottom: 0.5rem; }
        .card p { font-size: 0.7rem; }

        .card-icon {
            position: absolute;
            bottom: 10px;
            right: 2px;
            width: 160px;
            height: auto;
        }

        .card-link { text-decoration: none; }

        .recent-products h2 {
            color: #ff6b6b;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .recent-products-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        .product-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            text-align: center;
            border: 1px solid #f3f4f6;
        }

        .product-card img {
            max-width: 100%;
            height: 120px;
            object-fit: contain;
            border-radius: 8px;
            margin-bottom: 0.5rem;
        }

        .product-card h3 {
            font-size: 1rem;
            color: #ff6b6b;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .product-card p {
            font-size: 0.85rem;
            margin-bottom: 0.3rem;
            color: #555;
        }

        .details-btn {
            display: inline-block;
            background-color: #ff6b6b;
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            text-decoration: none;
            font-size: 0.85rem;
            margin-top: 0.5rem;
        }

        .details-btn:hover {
            background-color: #e55b5b;
        }
    </style>
</head>
<body>
    <header class="navbar">
        <div class="logo">Medware</div>
        <div class="search-bar">
            <input type="text" placeholder="Search">
            <button>Search</button>
        </div>
        <div class="profile">
            <span>Username</span>
        </div>
        <div class="logout">
            <button class="logout-button">Log out</button>
        </div>
    </header>

    <main class="content">
        <section class="dashboard-cards">
            <div class="card red">
                <h2>0</h2>
                <p>Products are </p>
                <p>in Your Ware</p>
                <img src="{{ asset('img/chart.png') }}" alt="Warehouse Icon" class="card-icon">
            </div>
            <a href="#" class="card-link">
                <div class="card blue">
                    <h2>ADD</h2>
                    <p>Add new products</p>
                    <img src="{{ asset('img/giving-box.png') }}" alt="Add Icon" class="card-icon">
                </div>
            </a>
            <a href="#" class="card-link">
                <div class="card purple">
                    <h2>VIEW</h2>
                    <p>View all products</p>
                    <img src="{{ asset('img/box-list.png') }}" alt="View Icon" class="card-icon">
                </div>
            </a>
        </section>

        <section class="recent-products">
            <h2>Recent Products</h2>
            <div class="recent-products-list">
                <div class="product-card">
                    <img src="{{ asset('img/sample-product.jpg') }}" alt="Product 1">
                    <h3>Paramex</h3>
                    <p>Rp 15.000</p>
                    <p>Stock: 40</p>
                    <a href="#" class="details-btn">Details</a>
                </div>
                <div class="product-card">
                    <img src="{{ asset('img/sample-product2.jpg') }}" alt="Product 2">
                    <h3>Bodrex</h3>
                    <p>Rp 12.000</p>
                    <p>Stock: 30</p>
                    <a href="#" class="details-btn">Details</a>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
