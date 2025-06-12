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

        .container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
            padding: 30px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
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
        }

        .product-price {
            color: #d34242;
            font-weight: 700;
            font-size: 1.1rem;
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

        .log-payment {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        .log-payment h4 {
            font-size: 1.5rem;
            color: #444;
            font-weight: 600;
        }

        .log-payment .log-item {
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            margin: 10px 0;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        .log-payment .log-item p {
            font-size: 1rem;
            color: #555;
            margin: 5px 0;
        }

        .logout-btn {
            background-color: #e85d5d;
            border: none;
            padding: 8px 12px;
            color: white;
            font-weight: 600;
            border-radius: 6px;
            margin-left: 10px;
        }

        .logout-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>

<nav>
    <div class="navbar">
        <div class="logo">
            <a href="#">Payment</a>
        </div>
        <div class="menu">
        <a href="{{ route('Content/dashboard') }}">Dashboard</a>
        </div>
    </div>
</nav>

<div class="container">
    <!-- All Products Section -->
    <div class="product-grid">
        @foreach ($payment as $product)
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
            <button class="details-btn add-btn"
                data-id="{{ $product->id }}"
                data-name="{{ $product->productName }}"
                data-price="{{ number_format($product->price, 0, ',', '.') }}">
                Add
            </button>
        </div>
        @endforeach
    </div>

    <!-- Log Payment Section -->
    <div class="log-payment d-flex flex-column" id="logPayment">
        <h4>Log Payment</h4>

        <!-- Penanda posisi untuk menyisipkan log item -->
        <div id="logItemsContainer"></div>

        <!-- Total dan tombol bayar -->
        <div class="d-flex flex-column mt-3" id="totalSection">
            <div class="mb-2">
                <h5 id="grandTotal" style="color: red; font-weight: bold;">Rp 0</h5>
            </div>
            <button class="details-btn w-100" id="payBtn">Sudah Bayar</button>
        </div>
    </div>
</div>

</div>

<script>
    const logContainer = document.getElementById('logPayment');
    const cart = {};

    function formatRupiah(number) {
        return 'Rp ' + number.toLocaleString('id-ID');
    }

    function updateLogUI() {
    const logItemsContainer = document.getElementById('logItemsContainer');
    logItemsContainer.innerHTML = ''; // clear all previous items

    let grandTotal = 0;

    Object.keys(cart).forEach(id => {
        const item = cart[id];
        const total = item.qty * item.price;
        grandTotal += total;

        const logItem = document.createElement('div');
        logItem.className = 'log-item d-flex justify-content-between align-items-start';
        logItem.innerHTML = `
            <div>
                <p style="font-weight: 700; color: black; margin-bottom: 6px;">${item.name}</p>
                <p style="margin-bottom: 6px;">Rp ${item.price.toLocaleString('id-ID')}</p>
                <p style="margin-bottom: 0;"><strong style="color:red;">Rp <span id="total-${id}">${total.toLocaleString('id-ID')}</span></strong></p>
            </div>
            <div class="d-flex flex-column align-items-end">
                <div class="btn-group mb-2" role="group">
                    <button class="btn btn-sm btn-outline-secondary qty-btn" data-id="${id}" data-action="minus">-</button>
                    <span class="px-2 align-self-center" id="qty-${id}">${item.qty}</span>
                    <button class="btn btn-sm btn-outline-secondary qty-btn" data-id="${id}" data-action="plus">+</button>
                </div>
            </div>
        `;

        logItemsContainer.appendChild(logItem);
    });

    // Update grand total
    document.getElementById('grandTotal').innerText = formatRupiah(grandTotal);

    addQtyButtonListeners();
}


    function addQtyButtonListeners() {
        document.querySelectorAll('.qty-btn').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                const action = this.dataset.action;

                if (action === 'plus') {
                    cart[id].qty++;
                } else if (action === 'minus') {
                    cart[id].qty--;
                    if (cart[id].qty === 0) {
                        delete cart[id];
                    }
                }

                updateLogUI();
            });
        });
    }


    // Tombol ADD di kartu produk
    document.querySelectorAll('.details-btn').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.dataset.id;
            const name = this.dataset.name;
            const price = parseInt(this.dataset.price.replace(/\./g, ''));

            if (cart[id]) {
                cart[id].qty++;
            } else {
                cart[id] = { name: name, price: price, qty: 1 };
            }

            updateLogUI();
        });
    });

    // Tombol Sudah Bayar
    document.getElementById('payBtn').addEventListener('click', function () {
        if (Object.keys(cart).length === 0) {
            alert('Belum ada produk yang ditambahkan.');
            return;
        }

        // Konversi cart ke array
        const cartArray = Object.entries(cart).map(([id, item]) => ({
            id: id,
            qty: item.qty
        }));

        fetch("{{ route('product.sell') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ cart: cartArray })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert('Pembayaran berhasil!');
                for (const key in cart) {
                    delete cart[key];
                }
                updateLogUI();
                location.reload(); // untuk menampilkan stok terbaru
            } else {
                alert(data.message || 'Gagal melakukan pembayaran.');
            }
        })
        .catch(err => {
            console.error(err);
            alert('Terjadi kesalahan saat memproses pembayaran.');
        });
    });

</script>

</body>
</html>